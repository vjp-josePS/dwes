<?php
// Importación de archivos necesarios
require_once __DIR__ . '/utils/utils.php';           // Funciones de utilidad
require_once __DIR__ . '/entities/imagenGaleria.class.php';  // Clase para manejar imágenes
require_once __DIR__ . '/entities/asociados.class.php';      // Clase para manejar asociados
require_once __DIR__ . '/database/Connection.class.php';     // Clase para la conexión a BD
require_once __DIR__ . '/core/App.class.php';               // Clase principal de la aplicación

try {
    // Carga la configuración desde config.php y la almacena en el contenedor de servicios
    $config = require __DIR__ . '/config.php';
    App::bind('config', $config);

    // Crea una conexión a la base de datos
    $connection = Connection::make();

    // SECCIÓN DE IMÁGENES
    // Inicializa array para almacenar objetos de tipo ImagenGaleria
    $imagenes = [];
    // Prepara y ejecuta consulta para obtener todas las imágenes
    $stmtImagenes = $connection->prepare("SELECT * FROM imagenes");
    $stmtImagenes->execute();

    // Recorre los resultados y crea objetos ImagenGaleria
    while ($fila = $stmtImagenes->fetch(PDO::FETCH_ASSOC)) {
        $imagenes[] = new ImagenGaleria(
            $fila['nombre'],
            $fila['descripcion'],
            //Comentado: $fila['categoria'],
            0,  // Valor inicial para visualizaciones
            rand(800, 1500),  // Número aleatorio de likes
            rand(300, 850),   // Número aleatorio de descargas
            rand(50, 200)     // Número aleatorio adicional
        );
    }

    // Crea tres copias del array de imágenes para diferentes categorías
    $imagenesCategoria1 = $imagenes;
    $imagenesCategoria2 = $imagenes;
    $imagenesCategoria3 = $imagenes;
    
    // Mezcla aleatoriamente cada categoría de imágenes
    shuffle($imagenesCategoria1);
    shuffle($imagenesCategoria2);
    shuffle($imagenesCategoria3);

    // SECCIÓN DE ASOCIADOS
    // Inicializa array para almacenar objetos de tipo Asociado
    $asociados = [];
    // Prepara y ejecuta consulta para obtener todos los asociados
    $stmtAsociados = $connection->prepare("SELECT * FROM asociados");
    $stmtAsociados->execute();

    // Recorre los resultados y crea objetos Asociado
    while ($fila = $stmtAsociados->fetch(PDO::FETCH_ASSOC)) {
        $asociados[] = new Asociado(
            $fila['nombre'],
            $fila['logo'],
            $fila['descripcion']
        );
    }

    // Selecciona 3 asociados al azar para mostrar
    $asociadosMostrar = obtenerTresElementosAleatorios($asociados);

} catch (PDOException $e) {
    // Manejo de errores específicos de la base de datos
    die("Error de base de datos: " . $e->getMessage());
} catch (Exception $e) {
    // Manejo de errores generales
    die("Error general: " . $e->getMessage());
}

// Carga la vista principal de la aplicación
require 'views/index.view.php';
