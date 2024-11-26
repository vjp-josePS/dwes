<?php
// Incluye el archivo 'app.class.php'
require_once 'entities/app.class.php';

// Incluye el archivo 'const.php' que define constantes utilizadas
require_once 'utils/const.php';

// Define una clase llamada Connection que se encargará de gestionar la conexión a la base de datos.
class Connection
{
    // Define un método llamado make que se utiliza para crear una conexión a la base de datos.
    public static function make()
    {
        try {
            // Obtiene la configuración de la base de datos desde un método estático get de la clase App.
            // Este devuelve un array asociativo con los detalles de configuración.
            $config = App::get('config')['database'];

            // Crea una nueva instancia para establecer una conexión a la base de datos.
            // Utiliza los parámetros obtenidos del array de configuración.
            // - $config['connection']: tipo de conexión, por ejemplo, 'mysql:host=localhost'.
            // - $config['name']: nombre de la base de datos.
            // - $config['username']: nombre de usuario para la conexión.
            // - $config['password']: contraseña para la conexión.
            // - $config['options']: opciones adicionales para la conexión PDO.
            $connection = new PDO(
                $config['connection'] . ';dbname=' . $config['name'], 
                $config['username'], 
                $config['password'], 
                $config['options']
            );
        } catch (PDOException $error) {
            // Si ocurre un error al intentar conectar a la base de datos, se lanza una excepción
            throw new AppException(ERROR_STRINGS[ERROR_CON_BD]);
        }

        // Devuelve el objeto que representa la conexión a la base de datos si no hay errores.
        return $connection;
    }
}