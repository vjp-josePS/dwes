<?php
// Definición la clase AppException que extiende la clase Exception.
// AppException es una subclase de Exception y hereda todas sus propiedades y métodos.
class AppException extends Exception
{
    // Constructor de la clase AppException.
    // Este método se llama automáticamente cuando se crea una nueva instancia de AppException.
    public function __construct($message)
    {
        // Llama al constructor de la clase padre (Exception) utilizando 'parent::'.
        // Esto asegura que el mensaje proporcionado al crear una instancia de AppException se pase correctamente al constructor de Exception, que es el encargado de manejar los mensajes de error en las excepciones.
        parent::__construct($message);
    }
}