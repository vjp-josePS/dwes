<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $apellidos =
        trim(htmlspecialchars($_POST['apellidos']));
    $nombre = trim(htmlspecialchars($_POST['nombre']));
    $email = trim(htmlspecialchars($_POST['email']));
    $asunto = trim(htmlspecialchars($_POST['asunto']));
    $mensaje = trim(htmlspecialchars($_POST['mensaje']));

    $camposVacios = [];

    if (!empty($nombre) && !empty($gmail) && !empty($asunto)) {
        if (!empty($nombre)) {
            echo "Nombre: $nombre <br>";
        }else{
            echo "Nombre incorrecto. <br><br>";
            $camposVacios = array("nombre");
        }
        
        echo "Apellidos: $apellidos <br>";

        if ((filter_var($email, FILTER_VALIDATE_EMAIL)) === false) {
            echo "Gmail: $email <br>";
        } else {
            echo "Email incorrecto. <br><br>";
            $camposVacios = array("email");
        }

        if (!empty($asunto)) {
            echo "Asunto: $asunto <br>";
        }else{
            echo "Asunto incorrecto. <br>";
            $camposVacios = array("asunto");
        }
        
        echo "Mensaje: $mensaje <br>";
    } else {
        echo "No estan todos los campos obligatorios rellenos.";
    }
}

require 'views/contact.view.php';

?>