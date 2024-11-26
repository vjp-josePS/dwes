<?php
// Definimos la clase QueryException que extiende de Exception
class QueryException extends Exception {
    
    public function __construct(string $message){
        
        // Llama al constructor de la clase Exception con el mensaje proporcionado. Esto asegura que el mensaje de error se establezca correctamente en la excepción
        parent::__construct($message);
    }
}
?>