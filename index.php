<?php
// Se incluyen las clases necesarias para el funcionamiento del script
require 'entities/imagenGaleria.class.php'; // Clase para manejar imágenes de la galería
require 'entities/asociado.class.php';      // Clase para manejar los asociados
require 'entities/connection.class.php';    // Clase para manejar la conexión a la base de datos
require 'entities/repository/asociadoRepositorio.class.php'; // Repositorio para operaciones relacionadas con asociados
require 'entities/repository/categoriaRepositorio.class.php'; // Repositorio para operaciones relacionadas con categorías
require 'entities/repository/imagenGaleriaRepositorio.class.php'; // Repositorio para operaciones relacionadas con imágenes de galería
require 'utils/utils.php'; // Utilidades generales

// Inicialización de arrays para almacenar errores y datos de imágenes
$erroresImagenes = [];
$arrayImg = [];

try {
    // Se carga la configuración de la aplicación
    $config = require_once 'app/config.php';
    App::bind('config', $config); // Se vincula la configuración a la aplicación

    // Se crea una instancia del repositorio de imágenes de galería
    $imagenRepositorio = new ImagenGaleriaRepositorio();
    
    // Se obtienen todas las imágenes a través del repositorio
    $arrayImg = $imagenRepositorio->findAll();
} catch (QueryException $exception) {
    // Captura excepciones específicas de consultas SQL y almacena el mensaje de error
    $erroresImagenes[] = $exception->getMessage();
} catch (PDOException $exception) {
    // Captura excepciones relacionadas con PDO y almacena el mensaje de error
    $erroresImagenes[] = $exception->getMessage();
} catch (AppException $exception) {
    // Captura excepciones generales de la aplicación y almacena el mensaje de error
    $erroresImagenes[] = $exception->getMessage();
}

// Inicialización de arrays para almacenar errores y datos de asociados
$erroresAsociados = [];
$arrayAsociados = [];

try {
    // Se carga nuevamente la configuración de la aplicación (podría optimizarse)
    $config = require_once 'app/config.php';
    App::bind('config', $config); // Se vincula nuevamente la configuración

    // Se crea una instancia del repositorio de asociados
    $asociadoRepositorio = new AsociadoRepositorio();
    
    // Se obtienen todos los asociados a través del repositorio
    $arrayAsociados = $asociadoRepositorio->findAll();
} catch (QueryException $exception) {
    // Captura excepciones específicas de consultas SQL y almacena el mensaje de error
    $erroresAsociados[] = $exception->getMessage();
} catch (PDOException $exception) {
    // Captura excepciones relacionadas con PDO y almacena el mensaje de error
    $erroresAsociados[] = $exception->getMessage();
} catch (AppException $exception) {
    // Captura excepciones generales de la aplicación y almacena el mensaje de error
    $erroresAsociados[] = $exception->getMessage();
}

// Se extraen los asociados desde el array obtenido, utilizando una función utilitaria 
$asociados = extraerAsociados($arrayAsociados);

// Se carga la vista principal, pasando los datos necesarios (imágenes y asociados)
require 'views/index.view.php';