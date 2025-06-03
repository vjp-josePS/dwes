<?php
// Importación de las clases necesarias
require_once __DIR__ . '/../exceptions/AppException.class.php';  // Manejo de excepciones
require_once __DIR__ . '/../database/Connection.class.php';      // Conexión a base de datos

/**
 * Clase App
 * Implementa el patrón Service Container para gestionar las dependencias de la aplicación
 * Actúa como un contenedor global de servicios y configuraciones
 */
class App
{
    /**
     * Contenedor de servicios y configuraciones
     * Almacena objetos y valores que se utilizarán en toda la aplicación
     * @var array
     */
    private static $container = [];

    /**
     * Almacena un valor en el contenedor
     * 
     * @param string $clave Identificador único para el valor
     * @param mixed $valor Cualquier valor o objeto a almacenar
     * @return void
     */
    public static function bind($clave, $valor)
    {
        static::$container[$clave] = $valor;
    }

    /**
     * Recupera un valor del contenedor
     * 
     * @param string $key Clave del valor a recuperar
     * @return mixed El valor almacenado
     * @throws AppException Si la clave no existe en el contenedor
     */
    public static function get(string $key)
    {
        // Verifica si existe la clave en el contenedor
        if (!array_key_exists($key, static::$container)) {
            throw new AppException("No se ha encontrado la clave en el contenedor.");
        }

        return static::$container[$key];
    }

    /**
     * Obtiene la conexión a la base de datos
     * Implementa el patrón Singleton para la conexión
     * 
     * @return PDO Objeto de conexión a la base de datos
     */
    public static function getConnection()
    {
        // Si no existe la conexión, la crea y almacena
        if (!array_key_exists('connection', static::$container)) {
            static::$container['connection'] = Connection::make();
        }
        // Devuelve la conexión existente o recién creada
        return static::$container['connection'];
    }
}

/* Ejemplo de uso:
// Almacenar configuración
App::bind('config', [
    'database' => [
        'name' => 'mi_base_datos',
        'username' => 'usuario'
    ]
]);

// Recuperar configuración
$config = App::get('config');

// Obtener conexión a base de datos
$db = App::getConnection();
*/
