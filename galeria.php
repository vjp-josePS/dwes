<?php
require_once __DIR__ . '/utils/utils.php';
require_once __DIR__ . '/utils/const.php';
require_once __DIR__ . '/entities/file.class.php';
require_once __DIR__ . '/entities/imagenGaleria.class.php';
// require_once __DIR__ . '/exceptions/FileException.class.php';
require_once __DIR__ . '/database/Connection.class.php';
require_once __DIR__ . '/database/QueryBuilder.class.php';
require_once __DIR__ . '/exceptions/QueryException.class.php';
require_once __DIR__ . '/exceptions/FileException.class.php';

// array para guardar los mensajes de los errores
$errores = [];
$descripcion = '';
$mensaje = '';

// Me las he tenido que apañar 
/*
try {
    $connection = Connection::make();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $descripcion = trim(htmlspecialchars($_POST['descripcion']));

        $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];
        // Tipologia MIME 'tipodearchivo/extension'
        $imagen = new File('imagen', $tiposAceptados);
        // el parametro fileName es 'imagen' porque así lo indicamos en el formulario (type='file' name='imagen')

        $imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);

        $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);

        // Consulta preparada con parámetros nombrados
        $sql = "INSERT INTO imagenes (nombre, descripcion) VALUES (:nombre, :descripcion)";
        $pdoStatement = $connection->prepare($sql);

        // Array de parámetros para la consulta preparada
        $parametros = [
            ':nombre' => $imagen->getFileName(),
            ':descripcion' => $descripcion
        ];

        // Ejecutar la consulta preparada
        if ($pdoStatement->execute($parametros) === false) {
            $errores[] = "No se ha podido guardar la imagen en la base de datos";
        } else {
            $descripcion = ''; // Reinicio de la variable para que no aparezca en el formulario
            $mensaje = 'Imagen guardada correctamente';
        }
    }

    $queryBuilder = new QueryBuilder($connection);
    $imagenes = $queryBuilder->findAll('imagenes', 'ImagenGaleria');
} catch (FileException $exception) {
    $errores[] = $exception->getMessage();
    // Guardo en un array los errores
} catch (QueryException $exception) {
    $errores[] = $exception->getMessage();
}
*/


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Ruta del archivo o carpeta que deseas verificar
    $ruta = '../images/index/gallery';

    try {
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));

        $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];
        // Tipologia MIME 'tipodearchivo/extension'
        $imagen = new File('imagen', $tiposAceptados);
        // el parametro fileName es 'imagen' porque así lo indicamos en el formulario (type='file' name='imagen')

        $imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);

        $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);

        $connection = Connection::make();

        // Consulta preparada con parámetros nombrados
        $sql = "INSERT INTO imagenes (nombre, descripcion) VALUES (:nombre, :descripcion)";
        $pdoStatement = $connection->prepare($sql);

        // Array de parámetros para la consulta preparada
        $parametros = [
            ':nombre' => $imagen->getFileName(),
            ':descripcion' => $descripcion
        ];

        // Ejecutar la consulta preparada
        if ($pdoStatement->execute($parametros) === false) {
            $errores[] = "No se ha podido guardar la imagen en la base de datos";
        } else {
            $descripcion = ''; // Reinicio de la variable para que no aparezca en el formulario
            $mensaje = 'Imagen guardada correctamente';
        }

    } catch (FileException $exception) {
        $errores[] = $exception->getMessage();
        // Guardo en un array los errores
    } catch (PDOException $exception) {
        $errores[] = "Error de base de datos: " . $exception->getMessage();
    }
}

// Cargar imágenes desde la base de datos para la tabla
try {
    $connection = Connection::make();
    $imagenes = [];
    $stmtImagenes = $connection->prepare("SELECT * FROM imagenes");
    $stmtImagenes->execute();
    while ($fila = $stmtImagenes->fetch(PDO::FETCH_ASSOC)) {
        // Si tu clase ImagenGaleria tiene un constructor con ID, pásalo aquí, si no, omite el ID
        $imagenes[] = new ImagenGaleria(
            $fila['nombre'],
            $fila['descripcion'],
            $fila['numVisualizaciones'] ?? rand(800, 1500),
            $fila['numLikes'] ?? rand(300, 800),
            $fila['numDescargas'] ?? rand(50, 200),
            $fila['id'] ?? null
        );
    }
} catch (PDOException $e) {
    $errores[] = "Error al cargar imágenes: " . $e->getMessage();
}

require 'views/galeria.view.php';
