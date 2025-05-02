<?php
require_once __DIR__ . '/utils/utils.php';
require_once __DIR__ . '/database/Connection.class.php';

try {
    // Establecer conexión con la base de datos
    $connection = Connection::make();
} catch (PDOException $e) {
    die('Error de conexión a la base de datos: ' . $e->getMessage());
}

require 'views/asociados.view.php';
