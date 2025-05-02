<?php

class QueryBuilder
{
    /**
     * @var PDO
     */
    private $connection;

    public function __construct(PDO $connection){
        $this->connection = $connection;
    }

    public function findAll(string $table, string $classEntity){
        $sql = "SELECT * FROM {$table}";

        /*
        Una posibilidad que tenemos para ejecutar esta consulta es el método query de la clase PDO:

        $this->connection->query($sql);

        El problema de query es el mismo que el de exec, es vulnerable a ataques SQLInyection por lo que mejor vamos a usar prepare que devolvera un pdoStatement
        */
        $pdoStatement = $this->connection->prepare($sql);
        
        /*
        Una vez que tenog el pdoStatement ya puedo hacer el execute como la sentencia sql no tiene parámetros, no es necesario pasarle nada al método execute
        */
        if ($pdoStatement->execute() === false) {
            throw new QueryException("Error al ejecutar la consulta.");
        }

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, $classEntity);
    }
}