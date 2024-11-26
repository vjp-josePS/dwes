<?php

// Definición de una función llamada getErrorString.
function getErrorString() {}

// Definimos constantes para representar diferentes códigos de error personalizados.

define('ERROR_MV_UP_FILE', 9); // Error al mover un archivo subido
define('ERROR_EXECUTE_STATEMENT', 10); // Error al ejecutar una consulta SQL
define('ERROR_APP_CORE', 11); // Error relacionado con el núcleo de la aplicación
define('ERROR_CON_BD', 12); // Error al conectar con la base de datos
define('ERROR_INS_BD', 13); // Error al insertar datos en la base de datos

// Creación de un array asociativo llamado $errorStrings.
// Este array mapea códigos de error a mensajes descriptivos..

$errorStrings[UPLOAD_ERR_OK] = "No hay ningún error.";
$errorStrings[UPLOAD_ERR_INI_SIZE] = "El fichero es demasiado grande.";
$errorStrings[UPLOAD_ERR_FORM_SIZE] = "El fichero es demasiado grande.";
$errorStrings[UPLOAD_ERR_PARTIAL] = "No se ha podido subir el fichero.";
$errorStrings[UPLOAD_ERR_NO_FILE] = "No se ha encontrado ningún archivo.";
$errorStrings[UPLOAD_ERR_NO_TMP_DIR] = "No existe el directorio temporal.";
$errorStrings[UPLOAD_ERR_CANT_WRITE] = "No se puede escribir.";
$errorStrings[UPLOAD_ERR_EXTENSION] = "Error de extensión del archivo.";

//Mensajes para los errores personalizados definidos al principio del fichero

$errorStrings[ERROR_MV_UP_FILE] = "No se ha podido mover el archivo de destino.";
$errorStrings[ERROR_EXECUTE_STATEMENT] = "No se ha podido ejecutar la consulta";
$errorStrings[ERROR_APP_CORE] = "No se ha encontrado la clave en el contenedor";
$errorStrings[ERROR_CON_BD] = "No se ha podido crear la conexión a la BD";
$errorStrings[ERROR_INS_BD] = "Error al insertar en la BD";

// Definimos la constante ERROR_STRINGS que contiene el array $errorStrings.
// Esto permite acceder a los mensajes de error desde cualquier parte del script utilizando esta constante.

define('ERROR_STRINGS', $errorStrings);

?>