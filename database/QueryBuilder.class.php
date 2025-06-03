<?php
// Importación de dependencias necesarias
require_once __DIR__ . '/../exceptions/QueryException.class.php';    // Manejo de errores en consultas
require_once __DIR__ . '/../core/App.class.php';                    // Núcleo de la aplicación

/**
 * Clase abstracta QueryBuilder
 * Proporciona funcionalidad base para construir y ejecutar consultas SQL
 * Implementa el patrón Builder para construir consultas de forma segura
 */
abstract class QueryBuilder
{
    /**
     * Conexión a la base de datos
     * @var PDO
     */
    private $connection;

    /**
     * Nombre de la tabla en la base de datos
     * @var string
     */
    private $table;

    /**
     * Nombre de la clase entidad asociada
     * @var string
     */
    private $classEntity;

    /**
     * Constructor de la clase
     * @param string $table Nombre de la tabla
     * @param string $classEntity Nombre de la clase entidad
     */
    public function __construct(string $table, string $classEntity)
    {
        $this->connection = App::getConnection();    // Obtiene la conexión desde el contenedor
        $this->table = $table;                      // Almacena el nombre de la tabla
        $this->classEntity = $classEntity;          // Almacena el nombre de la clase entidad
    }

    /**
     * Ejecuta una consulta SQL y devuelve los resultados
     * @param string $sql Consulta SQL a ejecutar
     * @return array Resultados de la consulta
     * @throws QueryException Si hay error en la ejecución
     */
    private function executeQuery(string $sql): array
    {
        // Prepara la consulta para prevenir SQL Injection
        $pdoStatement = $this->connection->prepare($sql);

        // Ejecuta la consulta preparada
        if ($pdoStatement->execute() === false) {
            throw new QueryException("No se ha podido ejecutar la consulta");
        }

        // Devuelve los resultados como objetos de la clase entidad
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classEntity);
    }

    /**
     * Obtiene todos los registros de la tabla
     * @return array Lista de entidades
     */
    public function findAll(): array
    {
        $sql = "SELECT * FROM $this->table";
        return $this->executeQuery($sql);
    }

    /**
     * Encuentra una entidad por su ID
     * @param int $id ID de la entidad a buscar
     * @return IEntity Entidad encontrada
     * @throws NotFoundException Si no se encuentra la entidad
     */
    public function find(int $id): IEntity
    {
        $sql = "SELECT * from $this->table WHERE id=$id";
        $result = $this->executeQuery($sql);

        if (empty($result)) {
            throw new NotFoundException("No se ha encontrado ningún elemento con id $id");
        }

        return $result[0];
    }

    /**
     * Guarda una nueva entidad en la base de datos
     * @param IEntity $entity Entidad a guardar
     * @throws QueryException Si hay error en la inserción
     */
    public function save(IEntity $entity): void
    {
        try {
            $parameters = $entity->toArray();

            // Prepara las columnas y valores para la inserción
            $columns = implode(', ', array_keys($parameters));
            $placeholders = ':' . implode(', :', array_keys($parameters));

            // Construye la consulta SQL de inserción
            $sql = sprintf(
                'INSERT INTO %s (%s) VALUES (%s)',
                $this->table,
                $columns,
                $placeholders
            );

            // Ejecuta la inserción
            $statement = $this->connection->prepare($sql);
            $statement->execute($parameters);
        } catch (PDOException $exception) {
            throw new QueryException("Error al insertar en la Base de Datos: " . $exception->getMessage());
        }
    }

    /**
     * Ejecuta una transacción SQL
     * @param callable $fnExecuteQuerys Función que contiene las consultas a ejecutar
     * @throws QueryException Si hay error en la transacción
     */
    public function executeTransaction(callable $fnExecuteQuerys)
    {
        try {
            $this->connection->beginTransaction();   // Inicia la transacción
            $fnExecuteQuerys();                      // Ejecuta las consultas
            $this->connection->commit();             // Confirma los cambios
        } catch (PDOException $pdoException) {
            $this->connection->rollBack();           // Revierte los cambios si hay error
            throw new QueryException("No se ha podido realizar la operación");
        }
    }

    /**
     * Genera la parte SET de una consulta UPDATE
     * @param array $parameters Parámetros a actualizar
     * @return string Cadena con las actualizaciones
     */
    private function getUpdates(array $parameters)
    {
        $updates = '';
        foreach ($parameters as $key => $value) {
            if ($updates !== '') {
                $updates .= ', ';
            }
            $updates .= $key . ' = :' . $key;
        }
        return $updates;
    }

    /**
     * Actualiza una entidad existente
     * @param IEntity $entity Entidad a actualizar
     * @throws QueryException Si hay error en la actualización
     */
    public function update(IEntity $entity): void
    {
        try {
            $parametres = $entity->toArray();

            // Construye y ejecuta la consulta UPDATE
            $sql = sprintf(
                'UPDATE %s SET %s WHERE id =:id',
                $this->table,
                $this->getUpdates($parametres)
            );

            $statement = $this->connection->prepare($sql);
            $statement->execute($parametres);
        } catch (PDOException $exception) {
            throw new QueryException("Error al actualizar");
        }
    }
}
