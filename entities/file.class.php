<?php

require __DIR__ . '/../exceptions/FileException.class.php';
require_once __DIR__ . '/../utils/const.php';

class File
{
    private $file;
    private $fileName;

    /**
     * File constructor.
     * @param string $fileName
     * @param array $arrTypes
     * @throws FileException
     */

    public function __construct(string $fileName, array $arrTypes)
    {
        $this->file = $_FILES[$fileName];
        $this->fileName = '';

        if (!isset($this->file)) {
            throw new FileException(getErrorString('FILE_NOT_SELECTED'));
        }

        if ($this->file['error'] !== UPLOAD_ERR_OK) {
            throw new FileException(getErrorString($this->file['error']));
        }

        if (in_array($this->file['type'], $arrTypes) === false) {
            throw new FileException(getErrorString('UNSUPPORTED_FILE_TYPE'));
        }
    }

    public function getFileName()
    {
        return $this->fileName;
    }

    public function saveUploadFile(string $rutaDestino)
    {
        if (!is_dir($rutaDestino)) {
            mkdir($rutaDestino, 0777, true);
        }

        if (is_uploaded_file($this->file['tmp_name']) === false) {
            throw new FileException(getErrorString('FILE_NOT_SELECTED'));
        }

        $this->fileName = $this->file['name'];
        $ruta = $rutaDestino . $this->fileName;

        if (is_file($ruta) == true) {
            $fechaActual = date('dmYHis');
            $nombreArchivo = pathinfo($this->fileName, PATHINFO_FILENAME);
            $extension = pathinfo($this->fileName, PATHINFO_EXTENSION);
            $this->fileName = "{$nombreArchivo}-{$fechaActual}.{$extension}";
            $ruta = $rutaDestino . $this->fileName;
        }

        if (move_uploaded_file($this->file['tmp_name'], $ruta) === false) {
            throw new FileException(getErrorString('MOVE_ERROR'));
        }

        $this->fileName = pathinfo($ruta, PATHINFO_BASENAME);
    }

    public function copyFile(string $rutaOrigen, string $rutaDestino)
    {
        if (!is_dir($rutaDestino)) {
            mkdir($rutaDestino, 0777, true);
        }

        $origen = $rutaOrigen . $this->fileName;
        $destino = $rutaDestino . $this->fileName;

        if (!file_exists($origen)) {
            throw new FileException("No existe el fichero $origen que intentas copiar");
        }

        if (file_exists($destino)) {
            $fechaActual = date('dmYHis');
            $nombreArchivo = pathinfo($this->fileName, PATHINFO_FILENAME);
            $extension = pathinfo($this->fileName, PATHINFO_EXTENSION);
            $nuevoNombre = "{$nombreArchivo}-{$fechaActual}.{$extension}";
            $destino = $rutaDestino . $nuevoNombre;
        }

        if (!copy($origen, $destino)) {
            throw new FileException("No se ha podido copiar el fichero $origen a $destino");
        }

        if (isset($nuevoNombre)) {
            $this->fileName = $nuevoNombre;
        }
    }
}
