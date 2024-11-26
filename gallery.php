<?php
require 'utils/utils.php'; // Utilidades generales.
require 'entities/file.class.php'; // Clase para manejar archivos.
require 'entities/imagenGaleria.class.php'; // Clase que representa una imagen en la galería.
require 'entities/connection.class.php'; // Clase para manejar la conexión a la base de datos.
require_once 'entities/queryBuilder.class.php'; // Clase para construir consultas SQL.
require_once 'entities/appException.class.php'; // Clase para manejar excepciones de la aplicación.
require_once 'entities/repository/imagenGaleriaRepositorio.class.php'; // Repositorio para manejar imágenes de galería.
require_once 'entities/repository/categoriaRepositorio.class.php'; // Repositorio para manejar categorías.
require_once 'entities/categoria.class.php'; // Clase que representa una categoría.

// Inicialización de variables para almacenar errores y mensajes.
$errores = [];
$descripcion = "";
$mensaje = "";

try {
    // Se carga la configuración de la aplicación desde un archivo.
    $config = require_once 'app/config.php';
    App::bind('config', $config); // Se vincula la configuración a la aplicación.

    // Se crean instancias de los repositorios necesarios.
    $imagenRepositorio = new ImagenGaleriaRepositorio();
    $categoriaRepositorio = new CategoriaRepositorio();

    // Se verifica si se ha enviado un formulario mediante el método POST.
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Se obtienen y limpian los datos del formulario.
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $categoria = trim(htmlspecialchars($_POST['categoria']));

        // Tipos de archivos aceptados para la carga de imágenes.
        $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];

        // Se crea una nueva instancia de la clase File para manejar la imagen cargada.
        $imagen = new File('imagen', $tiposAceptados);
        
        // Se guarda el archivo subido en la ruta especificada para imágenes de galería.
        $imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
        
        // Se copia el archivo a otra ubicación (por ejemplo, un portafolio).
        $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);
        
        // Se crea una nueva instancia de ImagenGaleria con los datos proporcionados.
        $imagenGaleria = new ImagenGaleria($imagen->getFileName(), $descripcion, $categoria);
        
        // Se guarda la nueva imagen en el repositorio de imágenes de galería.
        $imagenRepositorio->save($imagenGaleria);
        
        // Se reinicia la descripción y se establece un mensaje de éxito.
        $descripcion = '';
        $mensaje = 'Imagen guardada';
    }

    // Se obtienen todas las imágenes almacenadas en el repositorio.
    $imagenes = $imagenRepositorio->findAll();
} catch (FileException $exception) {
    // Manejo de excepciones relacionadas con archivos.
    $errores[] = $exception->getMessage();
} catch (QueryException $exception) {
    // Manejo de excepciones relacionadas con consultas a la base de datos.
    $errores[] = $exception->getMessage();
} catch (AppException $exception) {
    // Manejo de excepciones específicas de la aplicación.
    $errores[] = $exception->getMessage();
} catch (PDOException $exception) {
    // Manejo de excepciones relacionadas con PDO (PHP Data Objects).
    $errores[] = $exception->getMessage();
} finally {
    // En el bloque finally, se aseguran que se obtengan todas las imágenes y categorías,
    // independientemente de si hubo una excepción o no.
    $imagenes = $imagenRepositorio->findAll();
    $categorias = $categoriaRepositorio->findAll();
}

// Finalmente, se carga la vista correspondiente para mostrar las imágenes y categorías al usuario.
require 'views/gallery.view.php';