<?php
// Importación de archivos necesarios
require_once __DIR__ . '/utils/utils.php';                    // Funciones de utilidad
require_once __DIR__ . '/entities/asociados.class.php';       // Clase para manejar asociados
require_once __DIR__ . '/repository/AsociadosRepository.class.php'; // Repositorio para asociados
require_once __DIR__ . '/core/App.class.php';                // Clase principal de la aplicación

// Inicialización de variables
$errores = [];  // Array para almacenar mensajes de error
$mensaje = '';  // Variable para mensajes de éxito

try {
    // Carga la configuración y la almacena en el contenedor de servicios
    $config = require __DIR__ . '/config.php';
    App::bind('config', $config);

    // Inicializa el repositorio para manejar operaciones con asociados
    $asociadosRepository = new AsociadosRepository();

    // Procesa el formulario cuando se envía por POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Limpia y valida los datos del formulario
        $nombre = trim(htmlspecialchars($_POST['nombre']));        // Limpia el nombre
        $descripcion = trim(htmlspecialchars($_POST['descripcion'])); // Limpia la descripción

        // Procesa la subida del logo
        if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
            // Genera un nombre único para el archivo
            $logoNombre = uniqid() . '_' . $_FILES['logo']['name'];
            // Define la ruta donde se guardará el logo
            $logoRuta = 'images/asociados/' . $logoNombre;
            
            // Intenta mover el archivo subido a su ubicación final
            if (!move_uploaded_file($_FILES['logo']['tmp_name'], $logoRuta)) {
                throw new Exception("Error al subir el logo");
            }
        } else {
            // Si no se subió un logo válido, lanza una excepción
            throw new Exception("Debes seleccionar un logo válido");
        }

        // Crea un nuevo objeto Asociado con los datos validados
        $asociado = new Asociado($nombre, $logoRuta, $descripcion);
        // Guarda el asociado en la base de datos
        $asociadosRepository->save($asociado);
        // Establece el mensaje de éxito
        $mensaje = 'Asociado creado correctamente';
    }

    // Obtiene todos los asociados de la base de datos para mostrarlos
    $asociados = $asociadosRepository->findAll();

} catch (PDOException $e) {
    // Captura errores relacionados con la base de datos
    $errores[] = "Error de base de datos: " . $e->getMessage();
} catch (Exception $e) {
    // Captura errores generales
    $errores[] = $e->getMessage();
}

// Carga la vista de asociados
require 'views/asociados.view.php';
