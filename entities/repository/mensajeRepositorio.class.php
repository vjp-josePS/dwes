<?php
// Se requiere el archivo que contiene la clase QueryBuilder
require_once 'entities/queryBuilder.class.php';

// Definición de la clase MensajeRepositorio que extiende de QueryBuilder
class MensajeRepositorio extends QueryBuilder
{
    // Constructor de la clase
    public function __construct(string $table = 'mensajes', string $classEntity = 'Mensaje')
    {
        // Llama al constructor de la clase padre QueryBuilder
        parent::__construct($table, $classEntity);
    }
}