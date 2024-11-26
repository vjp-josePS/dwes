<?php
// Se requiere el archivo que contiene la clase QueryBuilder
require_once 'entities/queryBuilder.class.php';

// Definición de la clase ImagenGaleriaRepositorio que extiende de QueryBuilder
class ImagenGaleriaRepositorio extends QueryBuilder
{
    // Constructor de la clase ImagenGaleriaRepositorio
    public function __construct(string $table = 'imagenes', string $classEntity = 'ImagenGaleria')
    {
        // Llamada al constructor de la clase padre QueryBuilder
        // Se pasan dos parámetros: el nombre de la tabla y el nombre de la entidad de clase
        parent::__construct($table, $classEntity);
    }
}