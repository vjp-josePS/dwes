<?php
// Este archivo retorna un array de configuración para la base de datos

return [
    // La clave principal 'database'
    'database' => [
        // Nombre base de datos
        'name' => 'proyecto',
        
        // Nombre de usuario
        'username' => 'userProyecto',
        
        // Contraseña
        'password' => 'userProyecto',
        
        // Cadena de conexión a la base de datos por 'dwes.local'
        'connection' => 'mysql:host=dwes.local',
        
        // Opciones adicionales para la conexión
        'options' => [
            // Establece el conjunto de caracteres a UTF-8
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            
            // Configura PDO para que lance excepciones en caso de errores
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            
            // Habilita las conexiones persistentes para mejorar el rendimiento
            PDO::ATTR_PERSISTENT => true
        ]
    ]
];