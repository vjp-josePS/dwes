<?php

class Connection
{
    /**
     * Método estático para establecer una conexión PDO con la base de datos.
     *
     * @return PDO La conexión establecida.
     */
    public static function make()
    {
        // Opciones de configuración para la conexión PDO
        $opciones = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", // Configuración de codificación UTF-8
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,      // Manejo de errores como excepciones
            PDO::ATTR_PERSISTENT => true                     // Conexión persistente para mejorar rendimiento
        ];

        try {
            // Crear una nueva conexión PDO
            $connection = new PDO(
                'mysql:host=localhost;dbname=proyecto;charset=utf8', // DSN (Data Source Name)
                'userProyecto',                                     // Usuario de la base de datos
                'userProyecto',                                     // Contraseña del usuario
                $opciones                                          // Opciones adicionales
            );

        } catch (PDOException $PDOException) {
            // Capturar excepciones y detener el script en caso de error
            die("Error al conectar con la base de datos: " . $PDOException->getMessage());
        }

        return $connection; // Retornar la conexión establecida
    }
}
