<?php
// utils/const.php

// Definición de mensajes de error en un array asociativo
const ERROR_MESSAGES = [
    // Errores de core_d
    UPLOAD_ERR_INI_SIZE => 'El archivo subido excede la directiva upload_max_filesize en php.ini',
    UPLOAD_ERR_FORM_SIZE => 'El archivo subido excede el tamaño máximo especificado en el formulario HTML',
    UPLOAD_ERR_PARTIAL => 'El archivo se subió parcialmente',
    UPLOAD_ERR_NO_FILE => 'No se subió ningún archivo',
    UPLOAD_ERR_NO_TMP_DIR => 'Falta la carpeta temporal',
    UPLOAD_ERR_CANT_WRITE => 'No se pudo escribir el archivo en el disco',
    UPLOAD_ERR_EXTENSION => 'Una extensión de PHP detuvo la subida del archivo',
    
    // Errores personalizados
    'FILE_NOT_SELECTED' => 'Debes seleccionar un archivo',
    'UNSUPPORTED_FILE_TYPE' => 'Tipo de archivo no soportado',
    'FILE_ALREADY_EXISTS' => 'Ya existe un archivo con ese nombre',
    'COPY_ERROR' => 'Error al copiar el archivo',
    'MOVE_ERROR' => 'Error al mover el archivo',
];

/**
 * Obtiene el mensaje de error correspondiente al código proporcionado
 *
 * @param int|string $errorCode Código de error
 * @return string Mensaje de error correspondiente
 */
function getErrorString($errorCode): string
{
    return match ($errorCode) {
        UPLOAD_ERR_INI_SIZE => ERROR_MESSAGES[UPLOAD_ERR_INI_SIZE],
        UPLOAD_ERR_FORM_SIZE => ERROR_MESSAGES[UPLOAD_ERR_FORM_SIZE],
        UPLOAD_ERR_PARTIAL => ERROR_MESSAGES[UPLOAD_ERR_PARTIAL],
        UPLOAD_ERR_NO_FILE => ERROR_MESSAGES[UPLOAD_ERR_NO_FILE],
        UPLOAD_ERR_NO_TMP_DIR => ERROR_MESSAGES[UPLOAD_ERR_NO_TMP_DIR],
        UPLOAD_ERR_CANT_WRITE => ERROR_MESSAGES[UPLOAD_ERR_CANT_WRITE],
        UPLOAD_ERR_EXTENSION => ERROR_MESSAGES[UPLOAD_ERR_EXTENSION],
        'FILE_NOT_SELECTED' => ERROR_MESSAGES['FILE_NOT_SELECTED'],
        'UNSUPPORTED_FILE_TYPE' => ERROR_MESSAGES['UNSUPPORTED_FILE_TYPE'],
        'FILE_ALREADY_EXISTS' => ERROR_MESSAGES['FILE_ALREADY_EXISTS'],
        'COPY_ERROR' => ERROR_MESSAGES['COPY_ERROR'],
        'MOVE_ERROR' => ERROR_MESSAGES['MOVE_ERROR'],
        default => 'Error desconocido',
    };
}