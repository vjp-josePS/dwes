<?php
// Importación de todas las clases y utilidades necesarias
require_once __DIR__ . '/utils/utils.php';           // Funciones de utilidad generales
require_once __DIR__ . '/utils/const.php';           // Constantes de la aplicación
require_once __DIR__ . '/entities/file.class.php';   // Clase para manejo de archivos
require_once __DIR__ . '/entities/imagenGaleria.class.php';  // Clase para las imágenes de la galería
require_once __DIR__ . '/database/Connection.class.php';      // Clase para la conexión a BD
require_once __DIR__ . '/database/QueryBuilder.class.php';    // Clase para construir consultas
require_once __DIR__ . '/exceptions/QueryException.class.php'; // Excepciones de consultas
require_once __DIR__ . '/exceptions/FileException.class.php';  // Excepciones de archivos
require_once __DIR__ . '/exceptions/AppException.class.php';   // Excepciones generales
require_once __DIR__ . '/core/App.class.php';                 // Núcleo de la aplicación
require_once __DIR__ . '/repository/ImagenGaleriaRepository.class.php'; // Repositorio de imágenes
require_once __DIR__ . '/repository/CategoriaRepository.class.php';     // Repositorio de categorías
require_once __DIR__ . '/entities/Categoria.class.php';       // Clase para las categorías

// Inicialización de variables
$errores = [];      // Array para almacenar mensajes de error
$descripcion = '';  // Variable para la descripción de la imagen
$mensaje = '';      // Variable para mensajes de éxito

try {
    // Carga la configuración y la almacena en el contenedor de servicios
    $config = require __DIR__ . '/config.php';
    App::bind('config', $config);

    // Inicializa los repositorios para manejar imágenes y categorías
    $imagenRepository = new ImagenGaleriaRepository();
    $categoriaRepository = new CategoriaRepository();

    // Procesa el formulario cuando se envía por POST
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Limpia y valida los datos del formulario
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $categoria = trim(htmlspecialchars($_POST['categoria']));

        // Debug: muestra la categoría seleccionada
        var_dump($categoria);

        // Define los tipos de archivos de imagen permitidos
        $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];
        
        // Crea un nuevo objeto File para manejar la imagen subida
        $imagen = new File('imagen', $tiposAceptados);

        // Guarda la imagen en la carpeta de la galería
        $imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);

        // Crea una copia de la imagen en la carpeta del portfolio
        $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);

        // Crea un nuevo objeto ImagenGaleria con los datos
        $imagenGaleria = new ImagenGaleria($imagen->getFileName(), $descripcion, $categoria);

        // Guarda la imagen en la base de datos
        $imagenRepository->guarda($imagenGaleria);

        // Limpia el formulario y muestra mensaje de éxito
        $descripcion = ''; 
        $mensaje = 'Imagen guardada correctamente';
    }
} catch (FileException $exception) {
    // Captura errores relacionados con el manejo de archivos
    $errores[] = $exception->getMessage();
} catch (QueryException $exception) {
    // Captura errores relacionados con las consultas a la base de datos
    $errores[] = $exception->getMessage();
} catch (AppException $exception) {
    // Captura errores generales de la aplicación
    $errores[] = $exception->getMessage();
} finally {
    // Siempre carga todas las imágenes y categorías para mostrar en la vista
    $imagenes = $imagenRepository->findAll();
    $categorias = $categoriaRepository->findAll();
}

// Carga la vista de la galería
require 'views/galeria.view.php';
