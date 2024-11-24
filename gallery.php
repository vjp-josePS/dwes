<?php
require 'utils/utils.php';
require 'entities/file.class.php';
require 'entities/imagenGaleria.class.php';
require 'entities/connection.class.php';
require_once 'entities/queryBuilder.class.php';
require_once 'entities/appException.class.php';
require_once 'entities/repository/imagenGaleriaRepositorio.class.php';
require_once 'entities/repository/categoriaRepositorio.class.php';
require_once 'entities/categoria.class.php';

$errores = [];
$descripcion = "";
$mensaje = "";
try {
    $config = require_once 'app/config.php';
    App::bind('config', $config);
    $imagenRepositorio = new ImagenGaleriaRepositorio();
    $categoriaRepositorio = new CategoriaRepositorio();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $categoria = trim(htmlspecialchars($_POST['categoria']));
        $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];
        $imagen = new File('imagen', $tiposAceptados);
        $imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
        $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);


        // $sql = "INSERT INTO imagenes (nombre,descripcion) VALUES (:nombre, :descripcion)";
        // $pdoStatement = $connection->prepare($sql);
        // $parametersStatementArray = [':nombre' => $imagen->getFileName(), ':descripcion' => $descripcion];
        // $response = $pdoStatement->execute($parametersStatementArray);

        $imagenGaleria = new ImagenGaleria($imagen->getFileName(), $descripcion, $categoria);
        $imagenRepositorio->save($imagenGaleria);
        $descripcion = '';
        $mensaje = 'Imagen guardada';

        // if ($response === false) {
        //     $errores[] = "No se ha podido guardar la imagen en la BD";
        // } else {
        //     $descripcion = '';
        //     $mensaje = 'Imagen guardada';
        // }
        // $querySql = 'Select * from imagenes';
        // $queryStatement = $connection->query($querySql);
    }
    $imagenes = $imagenRepositorio->findAll();
} catch (FileException $exception) {
    $errores[] = $exception->getMessage();
} catch (QueryException $exception) {
    $errores[] = $exception->getMessage();
} catch (AppException $exception) {
    $errores[] = $exception->getMessage();
} catch (PDOException $exception) {
    $errores[] = $exception->getMessage();
} finally {
    $imagenes = $imagenRepositorio->findAll();
    $categorias = $categoriaRepositorio->findAll();
}


require 'views/gallery.view.php';