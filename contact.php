<?php
require 'utils/utils.php';
require 'entities/mensaje.class.php'; // Clase Mensaje que representa un mensaje.
require 'entities/connection.class.php'; // Clase para manejar la conexión a la base de datos.
require_once 'entities/queryBuilder.class.php'; // Constructor de consultas para interactuar con la base de datos.
require_once 'entities/appException.class.php'; // Clase personalizada para manejar excepciones de la aplicación.
require_once 'entities/repository/mensajeRepositorio.class.php'; // Repositorio para manejar operaciones relacionadas con mensajes.

// Inicializamos un array para almacenar posibles errores.
$errores = [];

try {
    // Cargamos la configuración de la aplicación desde un archivo externo.
    $config = require_once 'app/config.php';
    App::bind('config', $config); // Vinculamos la configuración a la aplicación.

    // Creamos una instancia del repositorio de mensajes.
    $mensajeRepositorio = new MensajeRepositorio();

    // Verificamos si se ha enviado un formulario mediante el método POST.
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Limpiamos y procesamos los datos enviados por el formulario.
        $nombre = trim(htmlspecialchars($_POST['nombre'])); // Nombre del remitente.
        $apellidos = trim(htmlspecialchars($_POST['apellidos'])); // Apellidos del remitente.
        $email = $_POST['email']; // Email del remitente (sin limpieza adicional).
        $asunto = trim(htmlspecialchars($_POST['asunto'])); // Asunto del mensaje.
        $texto = trim(htmlspecialchars($_POST['texto'])); // Contenido del mensaje.

        // Creamos una nueva instancia de Mensaje con los datos procesados.
        $mensaje = new Mensaje($nombre, $apellidos, $email, $asunto, $texto);

        // Guardamos el mensaje utilizando el repositorio.
        $mensajeRepositorio->save($mensaje);
    }

    // Recuperamos todos los mensajes almacenados en la base de datos.
    $mensajes = $mensajeRepositorio->findAll();

} catch (QueryException $exception) {
    // Capturamos excepciones relacionadas con consultas a la base de datos y las almacenamos en el array de errores.
    $errores[] = $exception->getMessage();
} catch (AppException $exception) {
    // Capturamos excepciones específicas de la aplicación y las almacenamos en el array de errores.
    $errores[] = $exception->getMessage();
} catch (PDOException $exception) {
    // Capturamos excepciones relacionadas con PDO y las almacenamos en el array de errores.
    $errores[] = $exception->getMessage();
} finally {
    // En el bloque finally, aseguramos que siempre se recuperen todos los mensajes, incluso si hubo un error anterior.
    $mensajes = $mensajeRepositorio->findAll();
}

// Finalmente, se carga la vista que mostrará el formulario y los mensajes procesados.
require 'views/contact.view.php';