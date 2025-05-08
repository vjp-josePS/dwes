<?php
require_once __DIR__ . '/utils/utils.php';
require_once __DIR__ . '/entities/imagenGaleria.class.php';
require_once __DIR__ . '/entities/asociados.class.php';
require_once __DIR__ . '/database/Connection.class.php';
require_once __DIR__ . '/core/App.class.php';

try {

    // Cargar la configuración y guardarla en el contenedor de servicios
    $config = require __DIR__ . '/config.php';
    App::bind('config', $config);

    // Establecer conexión con la base de datos
    $connection = Connection::make();

    // Cargar imágenes desde la base de datos y asignar contadores aleatorios
    $imagenes = [];
    $stmtImagenes = $connection->prepare("SELECT * FROM imagenes");
    $stmtImagenes->execute();

    while ($fila = $stmtImagenes->fetch(PDO::FETCH_ASSOC)) {
        $imagenes[] = new ImagenGaleria(
            $fila['nombre'],
            $fila['descripcion'],
            rand(800, 1500), // Visualizaciones aleatorias
            rand(300, 800),  // Likes aleatorios
            rand(50, 200)    // Descargas aleatorias
        );
    }

    // Cargar asociados desde la base de datos
    $asociados = [];
    $stmtAsociados = $connection->prepare("SELECT * FROM asociados");
    $stmtAsociados->execute();

    while ($fila = $stmtAsociados->fetch(PDO::FETCH_ASSOC)) {
        $asociados[] = new Asociado(
            $fila['nombre'],
            $fila['logo'],
            $fila['descripcion']
        );
    }

    // Seleccionar 3 asociados aleatorios
    $asociadosMostrar = obtenerTresElementosAleatorios($asociados);
} catch (PDOException $e) {
    die("Error de base de datos: " . $e->getMessage());
} catch (Exception $e) {
    die("Error general: " . $e->getMessage());
}

require 'views/index.view.php';
