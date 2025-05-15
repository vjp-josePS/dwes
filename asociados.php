<?php
require_once __DIR__ . '/utils/utils.php';
require_once __DIR__ . '/entities/asociados.class.php';
require_once __DIR__ . '/repository/AsociadosRepository.class.php';
require_once __DIR__ . '/core/App.class.php';

$errores = [];
$mensaje = '';

try {
    $config = require __DIR__ . '/config.php';
    App::bind('config', $config);

    $asociadosRepository = new AsociadosRepository();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = trim(htmlspecialchars($_POST['nombre']));
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));

        // Procesar logo
        if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
            $logoNombre = uniqid() . '_' . $_FILES['logo']['name'];
            $logoRuta = 'images/asociados/' . $logoNombre;
            
            if (!move_uploaded_file($_FILES['logo']['tmp_name'], $logoRuta)) {
                throw new Exception("Error al subir el logo");
            }
        } else {
            throw new Exception("Debes seleccionar un logo válido");
        }

        $asociado = new Asociado($nombre, $logoRuta, $descripcion);
        $asociadosRepository->save($asociado);
        $mensaje = 'Asociado creado correctamente';
    }

    $asociados = $asociadosRepository->findAll();

} catch (PDOException $e) {
    $errores[] = "Error de base de datos: " . $e->getMessage();
} catch (Exception $e) {
    $errores[] = $e->getMessage();
}

require 'views/asociados.view.php';
