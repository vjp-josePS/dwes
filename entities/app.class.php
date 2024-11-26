<?php
// Se incluyen dos archivos necesarios para el funcionamiento de la clase.
// 'appException.class.php' para las excepciones
// 'const.php' probablemente para las constantes
require_once 'entities/appException.class.php';
require_once 'utils/const.php';

// Definición de la clase App.
class App
{
    // Declaración de $container.
    // Esta propiedad es un array que actuará como contenedor para almacenar claves y sus valores asociados.
    public static $container = [];

    // Para asociar un valor a una clave en el contenedor
    public static function bind($clave, $valor)
    {
        // Almacena el valor en el contenedor usando la clave
        static::$container[$clave] = $valor;
    }

    // Método para recuperar un valor del contenedor usando una clave.
    public static function get(string $key)
    {
        // Verifica si la clave existe en el contenedor.
        if (!array_key_exists($key, static::$container)) {
            // Si la clave no existe, lanza una excepción
            throw new AppException(ERROR_STRINGS[ERROR_APP_CORE]);
        }
        // Devuelve el valor asociado a la clave.
        return static::$container[$key];
    }

    // Método para obtener una conexión.
    public static function getConnection()
    {
        // Verifica si ya existe una conexión almacenada en el contenedor.
        if (!array_key_exists('connection', static::$container)) {
            // Si no existe, crea una nueva conexión utilizando un método estático Connection::make(). Inicializa y devuelve una instancia de conexión a base de datos
            static::$container['connection'] = Connection::make();
        }
        // Devuelve la conexión almacenada en el contenedor.
        return static::$container['connection'];
    }
}