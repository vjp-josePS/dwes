<?php

require_once __DIR__ . '/../exceptions/QueryException.class.php';
require_once __DIR__ . '/../core/App.class.php';

abstract class QueryBuilder
{
    /**
     * @var PDO
     */
    private $connection;

    /**
     * @var string
     */

    private $table;

    /**
     * * @var string
     */
    private $classEntity;

    public function __construct(string $table, string $classEntity)
    {
        $this->connection = App::getConnection();
        $this->table = $table;
        $this->classEntity = $classEntity;
    }

    private function executeQuery(string $sql): array
    {
        /*
        Una posibilidad que tenemos para ejecutar esta consulta el método query de la clase PDO:
        $this->connection-<query($sql);
        El problema de query es el mismo que el de exec, es vulnerable a ataques SQLInyection por lo que mejor vamos a usar prepare que me devolvera un pdoStatement
        */

        $pdoStatement = $this->connection->prepare($sql);

        // Una vez que tengo el pdoStatement ya puedo hacer el execute como la sentencia SQL no tiene parámetrs, no es necesario pasarle nada al método execute
        if ($pdoStatement->execute() === false) {
            throw new QueryException("No se ha podido ejecutar la consulta");
        }
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classEntity);
    }

    // public function findAll(): array
    // {
    //     $sql = "SELECT * FROM $this->table";

    //     /*
    //     Una posibilidad que tenemos para ejecutar esta consulta es el método query de la clase PDO:

    //     $this->connection->query($sql);

    //     El problema de query es el mismo que el de exec, es vulnerable a ataques SQLInyection por lo que mejor vamos a usar prepare que devolvera un pdoStatement
    //     */
    //     $pdoStatement = $this->connection->prepare($sql);

    //     /*
    //     Una vez que tenog el pdoStatement ya puedo hacer el execute como la sentencia sql no tiene parámetros, no es necesario pasarle nada al método execute
    //     */
    //     if ($pdoStatement->execute() === false) {
    //         throw new QueryException("Error al ejecutar la consulta.");
    //     }

    //     return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classEntity);
    // }

    public function findAll(): array
    {
        $sql = "SELECT * FROM $this->table"; // Sentencia SQL a ejecutar
        return $this->executeQuery($sql);
    }

    // public function save (IEntity $entity) : void {

    //     try{
    //         $parameters = $entity->toArray();

    //         $sql = sprintf('insert into %o ($s) values (%s)', $this->table, implode(', ', array_keys(($parameters)), ': ', implode(',: ', array_keys($parameters))));

    //         $statement = $this->connection->prepare($sql);
    //         $statement->execute($parameters);
    //     } catch (PDOException $exception) {
    //         throw new QueryException("Error al insertar en la Base de Datos");
    //     }
    // }

    // public function find(int $id): IEntity
    // {
    //     $sql = "SELECT * from $this->table where id=$id"; // Sentencia SQL a ejecutar
    //     $pdoStatement = $this->connection->prepare($sql);
    //     if ($pdoStatement->execute() === false){
    //         throw new QueryException(("No se ha podido ejecutar la consulta"));
    //     }
    //     return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classEntity);
    // }

    public function find(int $id): IEntity
    {
        $sql = "SELECT * from $this->table WHERE id=$id"; // Sentencia SQL a ejecutar
        $result = $this->executeQuery($sql);

        if (empty($result)) {
            throw new NotFoundException("No se ha encontrado ningún elemento con id $id");
        }

        return $result[0];
    }

    public function save(IEntity $entity): void
    {
        try {
            $parameters = $entity->toArray();

            // Generar columnas y placeholders
            $columns = implode(', ', array_keys($parameters));
            $placeholders = ':' . implode(', :', array_keys($parameters));

            // Construir la consulta SQL
            $sql = sprintf(
                'INSERT INTO %s (%s) VALUES (%s)',
                $this->table,
                $columns,
                $placeholders
            );

            $statement = $this->connection->prepare($sql);
            $statement->execute($parameters);
        } catch (PDOException $exception) {
            throw new QueryException("Error al insertar en la Base de Datos: " . $exception->getMessage());
        }
    }

    public function executeTransaction(callable $fnExecuteQuerys)
    {
        try {
            $this->connection->beginTransaction();
            $fnExecuteQuerys(); // Llamo al callable para que ejecute todas las operaciones que sean necesarias realizar

            $this->connection->commit(); // Para confirma las operaciones pendientes y ejecutar.
        } catch (PDOException $pdoException) {
            $this->connection->rollBack(); // Deshace todos los cambios desde el beginTransaction
            throw new QueryException("No se ha podido realizar la operación");
        }
    }

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

    public function update(IEntity $entity): void
    {
        try {
            $parametres = $entity->toArray();

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
