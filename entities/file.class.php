<?php
/**
 * Clase para manejar la subida y manipulación de archivos
 * Incluye funcionalidades para validar, guardar y copiar archivos
 */

// Importación de dependencias necesarias
require __DIR__ . '/../exceptions/FileException.class.php';  // Clase para manejar errores de archivo
require_once __DIR__ . '/../utils/const.php';               // Constantes utilizadas en la aplicación

class File
{
    // Propiedades privadas de la clase
    private $file;      // Almacena la información del archivo subido ($_FILES)
    private $fileName;  // Almacena el nombre del archivo procesado

    /**
     * Constructor: Inicializa y valida un nuevo archivo
     * 
     * @param string $fileName Nombre del campo del formulario que contiene el archivo
     * @param array $arrTypes Array con los tipos MIME permitidos
     * @throws FileException Si hay problemas con el archivo
     */
    public function __construct(string $fileName, array $arrTypes)
    {
        $this->file = $_FILES[$fileName];
        $this->fileName = '';

        // Validación 1: Verifica si se seleccionó un archivo
        if (!isset($this->file)) {
            throw new FileException(getErrorString('FILE_NOT_SELECTED'));
        }

        // Validación 2: Verifica si hubo errores en la subida
        if ($this->file['error'] !== UPLOAD_ERR_OK) {
            throw new FileException(getErrorString($this->file['error']));
        }

        // Validación 3: Verifica si el tipo de archivo está permitido
        if (in_array($this->file['type'], $arrTypes) === false) {
            throw new FileException(getErrorString('UNSUPPORTED_FILE_TYPE'));
        }
    }

    /**
     * Obtiene el nombre actual del archivo
     * @return string Nombre del archivo
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * Guarda el archivo subido en el servidor
     * 
     * @param string $rutaDestino Directorio donde se guardará el archivo
     * @throws FileException Si hay problemas al guardar el archivo
     */
    public function saveUploadFile(string $rutaDestino)
    {
        // Crea el directorio destino si no existe
        if (!is_dir($rutaDestino)) {
            mkdir($rutaDestino, 0777, true);
        }

        // Verifica que el archivo sea válido
        if (is_uploaded_file($this->file['tmp_name']) === false) {
            throw new FileException(getErrorString('FILE_NOT_SELECTED'));
        }

        // Prepara el nombre del archivo y la ruta completa
        $this->fileName = $this->file['name'];
        $ruta = $rutaDestino . $this->fileName;

        // Si el archivo ya existe, genera un nombre único con timestamp
        if (is_file($ruta) == true) {
            $fechaActual = date('dmYHis');
            $nombreArchivo = pathinfo($this->fileName, PATHINFO_FILENAME);
            $extension = pathinfo($this->fileName, PATHINFO_EXTENSION);
            $this->fileName = "{$nombreArchivo}-{$fechaActual}.{$extension}";
            $ruta = $rutaDestino . $this->fileName;
        }

        // Intenta mover el archivo a su ubicación final
        if (move_uploaded_file($this->file['tmp_name'], $ruta) === false) {
            throw new FileException(getErrorString('MOVE_ERROR'));
        }

        // Actualiza el nombre del archivo con el nombre final
        $this->fileName = pathinfo($ruta, PATHINFO_BASENAME);
    }

    /**
     * Copia un archivo de una ubicación a otra
     * 
     * @param string $rutaOrigen Directorio donde está el archivo original
     * @param string $rutaDestino Directorio donde se copiará el archivo
     * @throws FileException Si hay problemas al copiar el archivo
     */
    public function copyFile(string $rutaOrigen, string $rutaDestino)
    {
        // Crea el directorio destino si no existe
        if (!is_dir($rutaDestino)) {
            mkdir($rutaDestino, 0777, true);
        }

        // Prepara las rutas completas de origen y destino
        $origen = $rutaOrigen . $this->fileName;
        $destino = $rutaDestino . $this->fileName;

        // Verifica que existe el archivo origen
        if (!file_exists($origen)) {
            throw new FileException("No existe el fichero $origen que intentas copiar");
        }

        // Si el archivo destino ya existe, genera un nombre único
        if (file_exists($destino)) {
            $fechaActual = date('dmYHis');
            $nombreArchivo = pathinfo($this->fileName, PATHINFO_FILENAME);
            $extension = pathinfo($this->fileName, PATHINFO_EXTENSION);
            $nuevoNombre = "{$nombreArchivo}-{$fechaActual}.{$extension}";
            $destino = $rutaDestino . $nuevoNombre;
        }

        // Intenta copiar el archivo
        if (!copy($origen, $destino)) {
            throw new FileException("No se ha podido copiar el fichero $origen a $destino");
        }

        // Actualiza el nombre si se generó uno nuevo
        if (isset($nuevoNombre)) {
            $this->fileName = $nuevoNombre;
        }
    }
}
