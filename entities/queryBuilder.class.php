<?php
// Incluimos las excepciones y constantes necesarias para manejar errores y configuraciones
require_once 'entities/queryException.class.php';
require_once 'utils/const.php';

// Define una clase abstracta QueryBuilder que serve como base para construir consultas a la base de datos
abstract class QueryBuilder
{
    private $connection;
    private $table;
    private $classEntity;

    // Constructor que inicializa la conexión, el nombre de la tabla y la clase de entidad
    public function __construct(string $table, string $classEntity)
    {
        // Obtiene la conexión a la base de datos desde la clase App
        $this->connection = App::getConnection();
        $this->table = $table;
        $this->classEntity = $classEntity;
    }

    // Método para obtener todos los registros de una tabla
    public function findAll()
    {
        // Crea una consulta SQL para seleccionar todos los registros de la tabla especificada
        $sql = "SELECT * from $this->table";

        // Prepara la consulta SQL
        $pdoStatement = $this->connection->prepare($sql);

        // Ejecuta la consulta y verifica si se ejecutó correctamente
        if ($pdoStatement->execute() === false) {
            // Lanza una excepción si hay un error en la ejecución del statement
            throw new QueryException(ERROR_STRINGS[ERROR_EXECUTE_STATEMENT]);
        }

        // Devuelve todos los registros como objetos de la clase especificada en $classEntity
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classEntity);
    }

    // Método para guardar una entidad en la base de datos
    public function save(IEntity $entity): void
    {
        try {
            // Convierte la entidad en un array de parámetros clave-valor
            $parameters = $entity->toArray();

            // Crea una consulta SQL para insertar un nuevo registro en la tabla
            $sql = sprintf(
                'insert into %s (%s) values (%s)',
                $this->table,
                implode(', ', array_keys($parameters)), // Nombres de las columnas
                ':' . implode(', :', array_keys($parameters)) // Marcadores de posición para los valores
            );

            // Prepara y ejecuta el statement con los parámetros proporcionados
            $statement = $this->connection->prepare($sql);
            $statement->execute($parameters);

            // Si la entidad es de tipo ImagenGaleria, incrementa el número de categorías asociadas
            if ($entity instanceof ImagenGaleria) {
                $this->incrementaNumCategorias($entity->getCategoria());
            }
        } catch (PDOException $exception) {
            // Lanza una excepción si hay un error al insertar en la base de datos
            throw new QueryException(ERROR_STRINGS[ERROR_INS_BD]);
        }
    }

    // Método para ejecutar transacciones con múltiples consultas SQL
    public function executeTransaction(callable $fnExecuteQuerys)
    {
        try {
            // Inicia una transacción en la base de datos
            $this->connection->beginTransaction();
            
            // Ejecuta las consultas proporcionadas por el usuario mediante un callable
            $fnExecuteQuerys();
            
            // Confirma los cambios realizados durante la transacción
            $this->connection->commit();
        } catch (PDOException $pdoException) {
            // Revierte los cambios si ocurre un error durante la transacción
            $this->connection->rollBack();
            
            // Lanza una excepción con el mensaje del error original
            throw new PDOException($pdoException->getMessage());
        }
    }

    // Método para incrementar el número de imágenes en una categoría específica
    public function incrementaNumCategorias(int $categoria)
    {
        try {
            // Inicia una transacción para asegurar que el incremento sea atómico
            $this->connection->beginTransaction();

            // Crea y ejecuta una consulta SQL para incrementar el contador numImagenes en 1 para una categoría dada
            $sql = "UPDATE categorias SET numImagenes = numImagenes + 1 WHERE id=$categoria";
            $this->connection->exec($sql);

            // Confirma los cambios realizados durante esta operación
            $this->connection->commit();
        } catch (Exception $exception) {
            // Revierte los cambios si ocurre un error durante el incremento
            $this->connection->rollBack();

            // Lanza una excepción con el mensaje del error original
            throw new Exception($exception->getMessage());
        }
    }
}