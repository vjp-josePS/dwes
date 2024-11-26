<?php
// Definición de la interfaz IEntity
interface IEntity
{
    // Declaración del método toArray
    // Este método no recibe parámetros y debe devolver un array.
    public function toArray(): array;
}