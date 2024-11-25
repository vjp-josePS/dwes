<?php
require_once 'entities/queryException.class.php';
require_once 'utils/const.php';
abstract class QueryBuilder
{
    private $connection;
    private $table;
    private $classEntity;

    public function __construct(string $table, string $classEntity)
    {
        $this->connection = App::getConnection();
        $this->table = $table;
        $this->classEntity = $classEntity;
    }

    public function findAll()
    {
        $sql = "SELECT * from $this->table";

        $pdoStatement = $this->connection->prepare($sql);

        if ($pdoStatement->execute() === false) {
            throw new QueryException(ERROR_STRINGS[ERROR_EXECUTE_STATEMENT]);
        }

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classEntity);
    }

    public function save(IEntity $entity): void
    {
        try {
            $parameters = $entity->toArray();

            $sql = sprintf('insert into %s (%s) values (%s)', $this->table, implode(', ', array_keys($parameters)), ':' . implode(', :', array_keys($parameters)));

            $statement = $this->connection->prepare($sql);
            $statement->execute($parameters);
            if ($entity instanceof ImagenGaleria) {
                $this->incrementaNumCategorias($entity->getCategoria());
            }
        } catch (PDOException $exception) {
            throw new QueryException(ERROR_STRINGS[ERROR_INS_BD]);
        }
    }


    public function executeTransaction(callable $fnExecuteQuerys)
    {
        try {
            $this->connection->beginTransaction();
            $fnExecuteQuerys();
            $this->connection->commit();
        } catch (PDOException $pdoException) {
            $this->connection->rollBack();
            throw new PDOException($pdoException->getMessage());
        }
    }

    public function incrementaNumCategorias(int $categoria)
    {
        try {
            $this->connection->beginTransaction();
            $sql = "UPDATE categorias SET numImagenes = numImagenes+ 1 WHERE id=$categoria";
            $this->connection->exec($sql);
            $this->connection->commit();
        } catch (Exception $exception) {
            $this->connection->rollBack();
            throw new Exception($exception->getMessage());
        }
    }
}
