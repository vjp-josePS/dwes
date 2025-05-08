<?php
require_once __DIR__ . '/../exceptions/AppException.class.php';

class App
{
    /**
     * @var array
     */

    private static $container = [];

    /**
     * @param $clave
     * @param $valor
     * recibe tanto la clave donde almacenar el objeto como el propio objeto
     */

    public static function bind($clave, $valor)
    {
        static::$container[$clave] = $valor;
    }

    /**
     * @param string $key
     * @return mixed
     * @throws AppException
     */

    public static function get(string $key)
    {
        // si existe el elemento lo devuelve o sino lanza excepción
        if (!array_key_exists($key, static::$container)) {
            throw new AppException("No se ha encontrado la clave en el contenedor.");
        }

        return static::$container[$key];
    }

    public static function getConnection()
    {
        if (!array_key_exists('connection', static::$container)) {
            static::$container['connection'] = Connection::make();
        }
        return static::$container['connection'];

        // En vez de pasarle el método make los parametros de conexión, editaremos el método make de la clase Connection para que sea el quien cojo los datos del container
    }
}
