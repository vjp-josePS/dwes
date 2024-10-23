<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $apellidos =
        trim(htmlspecialchars($_POST['apellidos']));
    $nombre = trim(htmlspecialchars($_POST['nombre']));
    $email = trim(htmlspecialchars($_POST['email']));
    $asunto = trim(htmlspecialchars($_POST['asunto']));
    $mensaje = trim(htmlspecialchars($_POST['mensaje']));

    $camposVacios = [];
    $camposCompletos = [];

    if (!empty($nombre) || !empty($email) || !empty($asunto)) {
        if (!empty($nombre)) {
            $camposCompletos[] = "Nombre: $nombre";
        }else{
            
            $camposVacios[] = "El campo Nombre está vacío.";
        }
        
        $camposCompletos[] = "Apellidos: $apellidos";

        if ((filter_var($email, FILTER_VALIDATE_EMAIL))) {
            $camposCompletos[] = "Email: $email";
        } else {

            $camposVacios[] = "El campo Email está escrito incorrectamente.";
        }

        if (!empty($asunto)) {
            $camposCompletos[] = "Asunto: $asunto";
        }else{
            
            $camposVacios = "El campo Asunto está vacío.";
        }

            $camposCompletos[] = "Mensaje: $mensaje";

    }

    if (!empty($camposCompletos)) {
        foreach ($camposCompletos as $completos) {
            echo $completos . '<br>';
        }
    }else{
        foreach ($camposVacios as $vacios) {
            echo $vacios . '<br>';
        }
    }
}

function mostrarMensaje($nombre, $apellidos, $email, $asunto, $mensaje){
    if(!empty($camposCompletos)){
        foreach ($$camposCompletos as $completos) {
            echo $completos . "<br>";
        }
    }else{
foreach ($camposVacios as $vacios) {
    echo $vacios . "<br>";
}
    }
}

require 'views/contact.view.php';
?>