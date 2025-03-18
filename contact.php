<?php
require_once __DIR__ . '/utils/utils.php';
// Inicializamos las variables
$errors = [];
$successMessage = '';
$firstName = '';
$lastName = '';
$email = '';
$subject = '';
$message = '';

// Validación del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recogemos los datos enviados por el formulario
    $firstName = trim($_POST['firstName'] ?? '');
    $lastName = trim($_POST['lastName'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Validamos los campos obligatorios
    if (empty($firstName)) {
        $errors[] = "El campo First Name no puede estar vacío.";
    }

    if (empty($email)) {
        $errors[] = "El campo Email no puede estar vacío.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email incorrecto.";
    }

    if (empty($subject)) {
        $errors[] = "El campo Subject no puede estar vacío.";
    }

    // Si no hay errores, mostramos la información recibida
    if (empty($errors)) {
        $successMessage = "<strong>First Name:</strong> " . htmlspecialchars($firstName) . "<br>";

        if (!empty($lastName)) {
            $successMessage .= "<strong>Last Name:</strong> " . htmlspecialchars($lastName) . "<br>";
        }

        $successMessage .= "<strong>Subject:</strong> " . htmlspecialchars($subject) . "<br>";
        $successMessage .= "<strong>Email:</strong> " . htmlspecialchars($email) . "<br>";

        if (!empty($message)) {
            $successMessage .= "<strong>Message:</strong> " . htmlspecialchars($message);
        }

        // Limpiamos los campos después de enviar correctamente
        $firstName = '';
        $lastName = '';
        $email = '';
        $subject = '';
        $message = '';
    }
}

require 'views/contact.view.php';
