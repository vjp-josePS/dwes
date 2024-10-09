<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $apellidos =
        trim(htmlspecialchars($_POST['apellidos']));
    $nombre = trim(htmlspecialchars($_POST['nombre']));
    $email = trim(htmlspecialchars($_POST['email']));
    $asunto = trim(htmlspecialchars($_POST['asunto']));
    $mensaje = trim(htmlspecialchars($_POST['mensaje']));

    $camposVacios = [];

    if (!empty($nombre) && !empty($email) && !empty($asunto)) {
        if (!empty($nombre)) {
            echo "Nombre: $nombre <br>";
        }else{
            echo "El campo Nombre no puede estar vacío. <br><br>";
            $camposVacios = array("El campo Nombre está vacío.");
        }
        
        echo "Apellidos: $apellidos <br>";

        if ((filter_var($email, FILTER_VALIDATE_EMAIL))) {
            echo "Gmail: $email <br>";
        } else {
            echo "El campo Email no puede estar vacío. <br><br>";
            $camposVacios = array("El campo Email está vacío.");
        }

        if (!empty($asunto)) {
            echo "Asunto: $asunto <br>";
        }else{
            echo "El campo Asunto no puede estar vacío. <br>";
            $camposVacios = array("El campo Asunto está vacío.");
        }
        
        echo "Mensaje: $mensaje <br>";
    } else {
        echo "No estan todos los campos obligatorios rellenos.";
    }
}

require 'views/contact.view.php';

?>