<?php
// Definimos la clase FileException extiendida de Exception
class FileException extends Exception
{
    public function __construct(string $mensaje)
    {
        // Llama al constructor de la clase Exception con el mensaje
        parent::__construct($mensaje);
    }
}