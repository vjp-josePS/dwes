<?php
// Se requiere el archivo que contiene la definición de la clase QueryBuilder
require_once 'entities/queryBuilder.class.php';

// Definición de la clase AsociadoRepositorio que extiende de QueryBuilder
class AsociadoRepositorio extends QueryBuilder
{
    /**
     * Constructor de la clase AsociadoRepositorio
     * 
     * Nombre de la tabla en la base de datos (por defecto 'asociados')
     * Nombre de la clase entidad asociada (por defecto 'Asociado')
     */
    public function __construct(string $table = 'asociados', string $classEntity = 'Asociado')
    {
        // Llama al constructor de la clase padre QueryBuilder con los parámetros proporcionados
        parent::__construct($table, $classEntity);
    }
}
