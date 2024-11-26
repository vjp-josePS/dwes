<?php
require 'utils/utils.php'; // Utilidades generales.
require 'entities/file.class.php'; // Clase para manejar archivos.
require 'entities/asociado.class.php'; // Clase que representa a un asociado.
require 'entities/connection.class.php'; // Clase para manejar la conexión a la base de datos.
require_once 'entities/queryBuilder.class.php'; // Clase para construir consultas SQL.
require_once 'entities/appException.class.php'; // Clase para manejar excepciones específicas de la aplicación.
require_once 'entities/repository/asociadoRepositorio.class.php'; // Repositorio para manejar operaciones sobre asociados.

// Inicialización de variables para almacenar errores y mensajes
$errores = []; // Array para almacenar errores que puedan ocurrir durante la ejecución.
$descripcion = ""; // Variable para almacenar la descripción del asociado.
$mensaje = ""; // Variable para almacenar mensajes de éxito o error.

try {
    // Cargar la configuración de la aplicación
    $config = require_once 'app/config.php';
    App::bind('config', $config); // Vincular la configuración a la aplicación.

    // Crear una instancia del repositorio de asociados
    $asociadoRepositorio = new AsociadoRepositorio();

    // Comprobar si se ha recibido una solicitud POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener y limpiar los datos del formulario
        $descripcion = trim(htmlspecialchars($_POST['descripcion'])); // Descripción del asociado
        $nombre = trim(htmlspecialchars($_POST['nombre'])); // Nombre del asociado

        // Tipos de archivos aceptados para el logo
        $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];

        // Crear una nueva instancia de la clase File para manejar la carga del logo
        $logo = new File('imagen', $tiposAceptados);
        
        // Guardar el archivo subido en la ruta especificada
        $logo->saveUploadFile(Asociado::RUTA_LOGO);
        
        // Crear una nueva instancia de Asociado con los datos proporcionados
        $asociado = new Asociado($nombre, $logo, $descripcion);
        
        // Guardar el nuevo asociado en el repositorio
        $asociadoRepositorio->save($asociado);
        
        // Limpiar los campos después de guardar
        $descripcion = '';
        
        // Mensaje de éxito al guardar la imagen
        $mensaje = 'Imagen guardada';
    }

    // Recuperar todos los asociados existentes
    $asociados = $asociadoRepositorio->findAll();

} catch (FileException $exception) {
    // Capturar excepciones relacionadas con archivos y agregar el mensaje al array de errores
    $errores[] = $exception->getMessage();
} catch (QueryException $exception) {
    // Capturar excepciones relacionadas con consultas y agregar el mensaje al array de errores
    $errores[] = $exception->getMessage();
} catch (AppException $exception) {
    // Capturar excepciones específicas de la aplicación y agregar el mensaje al array de errores
    $errores[] = $exception->getMessage();
} catch (PDOException $exception) {
    // Capturar excepciones relacionadas con PDO y agregar el mensaje al array de errores
    $errores[] = $exception->getMessage();
} finally {
    // Asegurarse de que se obtienen todos los asociados al final, incluso si ocurre una excepción
    $asociados = $asociadoRepositorio->findAll();
}

// Cargar la vista correspondiente para mostrar los asociados y mensajes
require 'views/asociados.view.php';