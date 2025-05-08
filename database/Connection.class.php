
<?php

// class Connection
// {
//     public static function make($config)
//     {
//         try {
//             return new PDO(
//                 $config['connection'] . ';dbname=' . $config['name'],
//                 $config['username'],
//                 $config['password'],
//                 $config['options']
//             );
//         } catch (PDOException $PDOException) {
//             die($PDOException->getMessage());
//         }
//         return $connection;
//     }
// }

class Connection {
    public static function make() {
        try {
            $config = App::get('config');
            if (!isset($config['database']) || !is_array($config['database'])) {
                throw new AppException('No se ha encontrado la configuración de la base de datos en el contenedor.');
            }
            $db = $config['database'];
            foreach (['connection', 'name', 'username', 'password', 'options'] as $key) {
                if (!isset($db[$key])) {
                    throw new AppException("Falta la clave '$key' en la configuración de la base de datos.");
                }
            }
            return new PDO(
                $db['connection'] . ';dbname=' . $db['name'],
                $db['username'],
                $db['password'],
                $db['options']
            );
        } catch (PDOException $PDOException) {
            throw new AppException('No se ha podido crear la conexión a la BD: ' . $PDOException->getMessage());
        }
    }
}