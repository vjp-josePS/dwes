<?php
// Importación de archivos necesarios
require_once __DIR__ . '/utils/utils.php';                    // Funciones de utilidad
require_once __DIR__ . '/entities/Mensaje.class.php';         // Clase para manejar mensajes
require_once __DIR__ . '/repository/MensajeRepository.class.php'; // Repositorio para guardar mensajes
require_once __DIR__ . '/core/App.class.php';                // Clase principal de la aplicación

// Cargamos la configuración del archivo config.php y la guardamos en el contenedor de servicios
$config = require __DIR__ . '/config.php';
App::bind('config', $config);

// Inicializamos las variables que usaremos en el formulario
$errors = [];           // Array para almacenar mensajes de error
$successMessage = '';   // Mensaje de éxito cuando se envía el formulario
$firstName = '';        // Nombre del usuario
$lastName = '';         // Apellidos del usuario
$email = '';           // Correo electrónico
$subject = '';         // Asunto del mensaje
$message = '';         // Contenido del mensaje

// Procesamiento del formulario cuando se envía (método POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recogemos los datos enviados por el formulario usando el operador de fusión null (??)
    // trim() elimina espacios en blanco al inicio y final
    $firstName = trim($_POST['firstName'] ?? '');
    $lastName = trim($_POST['lastName'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Validación de campos obligatorios
    if (empty($firstName)) {
        $errors[] = "El campo First Name no puede estar vacío.";
    }

    // Validación del email: que no esté vacío y que tenga formato correcto
    if (empty($email)) {
        $errors[] = "El campo Email no puede estar vacío.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email incorrecto.";
    }

    // Validación del asunto
    if (empty($subject)) {
        $errors[] = "El campo Subject no puede estar vacío.";
    }

    // Si no hay errores de validación, procesamos el mensaje
    if (empty($errors)) {
        // Obtenemos la fecha y hora actual
        $fechaActual = date('Y-m-d H:i:s');
        
        // Creamos un nuevo objeto Mensaje con los datos del formulario
        $mensaje = new Mensaje(
            $firstName,    // nombre del remitente
            $lastName,     // apellidos del remitente
            $subject,      // asunto del mensaje
            $email,        // email del remitente
            $message,      // texto del mensaje
            $fechaActual   // fecha de envío
        );

        // Guardamos el mensaje en la base de datos
        $repo = new MensajesRepository();
        $repo->save($mensaje);

        // Construimos el mensaje de éxito con la información enviada
        $successMessage = "<strong>First Name:</strong> " . htmlspecialchars($firstName) . "<br>";

        // Añadimos el apellido solo si se proporcionó
        if (!empty($lastName)) {
            $successMessage .= "<strong>Last Name:</strong> " . htmlspecialchars($lastName) . "<br>";
        }

        // Añadimos el resto de la información
        $successMessage .= "<strong>Subject:</strong> " . htmlspecialchars($subject) . "<br>";
        $successMessage .= "<strong>Email:</strong> " . htmlspecialchars($email) . "<br>";

        // Añadimos el mensaje solo si se proporcionó
        if (!empty($message)) {
            $successMessage .= "<strong>Message:</strong> " . htmlspecialchars($message);
        }

        // Limpiamos todos los campos del formulario después del envío exitoso
        $firstName = '';
        $lastName = '';
        $email = '';
        $subject = '';
        $message = '';
    }
}

// Cargamos la vista del formulario de contacto
require 'views/contact.view.php';
