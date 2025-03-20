<?php
require_once __DIR__ . '/utils/utils.php';
require_once __DIR__ . '/utils/const.php';
require_once __DIR__ . '/entities/file.class.php';
require_once __DIR__ . '/entities/imagenGaleria.class.php';
// require_once __DIR__ . '/exceptions/FileException.class.php';
// array para guardar los mensajes de los errores

$errores = [];
$descripcion = '';
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));

        $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];
        // Tipologia NIME 'tipodearchivo/extension'
        $imagen = new File('imagen', $tiposAceptados);
        // el parametro fileName es 'imagen' porque así lo indicamos en el formulario (type='file' name='imagen')

        $imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);

        $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);

        $mensaje = 'Datos enviados';

    } catch (FileException $exception) {
        $errores[] = $exception->getMessage();
        // Guardo en un array los errores
    }
}

require 'views/galeria.view.php';
