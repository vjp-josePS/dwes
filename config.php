<?php
return [
    'database' => [
        'name' => 'proyecto',
        'username' => 'userProyecto',
        'password' => 'userProyecto',
        'connection' => 'mysql:host=dwes.local',
        'options' => [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT => true
        ]
    ]
];
