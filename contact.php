<?php
require 'utils/utils.php';
require 'entities/mensaje.class.php';
require 'entities/connection.class.php';
require_once 'entities/queryBuilder.class.php';
require_once 'entities/appException.class.php';
require_once 'entities/repository/mensajeRepositorio.class.php';

$errores = [];
try {
    $config = require_once 'app/config.php';
    App::bind('config', $config);
    $mensajeRepositorio = new MensajeRepositorio();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = trim(htmlspecialchars($_POST['nombre']));
        $apellidos = trim(htmlspecialchars($_POST['apellidos']));
        $email = $_POST['email'];
        $asunto = trim(htmlspecialchars($_POST['asunto']));
        $texto = trim(htmlspecialchars($_POST['texto']));
        $mensaje = new Mensaje($nombre,$apellidos,$email,$asunto,$texto);
        $mensajeRepositorio->save($mensaje);
    }
} catch (QueryException $exception) {
    $errores[] = $exception->getMessage();
} catch (AppException $exception) {
    $errores[] = $exception->getMessage();
} catch (PDOException $exception) {
    $errores[] = $exception->getMessage();
}

require 'views/contact.view.php';