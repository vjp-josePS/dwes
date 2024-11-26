<?php
// Se requiere el archivo que contiene la clase QueryBuilder
require_once 'entities/queryBuilder.class.php';

// Definición de la clase CategoriaRepositorio que extiende de QueryBuilder
class CategoriaRepositorio extends QueryBuilder
{
    /**
     * Constructor de la clase CategoriaRepositorio
     * 
     * Nombre de la tabla en la base de datos (por defecto 'categorias')
     * Nombre de la clase entidad asociada (por defecto 'Categoria')
     */
    public function __construct(string $table = 'categorias', string $classEntity = 'Categoria')
    {
        // Llama al constructor de la clase padre QueryBuilder con los parámetros proporcionados
        parent::__construct($table, $classEntity);
    }
}