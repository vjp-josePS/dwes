<?php
require_once 'entities/queryBuilder.class.php';

class AsociadoRepositorio extends QueryBuilder
{
    public function __construct(string $table = 'asociados', string $classEntity = 'Asociado')
    {
        parent::__construct($table, $classEntity);
    }
}
