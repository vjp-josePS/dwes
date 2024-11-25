<?php
require_once 'entities/fileException.class.php';
require_once 'utils/const.php';
class File
{
    private $file;
    private $fileName;

    public function __construct(string $fileName, array $arrTypes)
    {
        $this->file = $_FILES[$fileName];
        $this->fileName = '';

        if (!isset($this->file)) {
            throw new FileException('Debes seleccionar un fichero');
        }

        if ($this->file['error'] !== UPLOAD_ERR_OK) {
            throw new FileException((ERROR_STRINGS[$this->file['error']]));
        }
        if (in_array($this->file['type'], $arrTypes) === false) {
            throw new FileException('Tipo de fichero no soportado');
        }
    }
    public function getFileName()
    {
        return $this->fileName;
    }

    public function saveUploadFile(string $rutaDestino)
    {
        if (is_uploaded_file($this->file['tmp_name']) === false) {
            throw new FileException("El archivo no se ha subido mediante el formulario");
        }

        $this->fileName = $this->file['name'];
        $ruta = $rutaDestino . $this->fileName;

        function renombrarImagen($ruta, $imagen)
        {
            $punto = strrpos($imagen, '.');
            $nombreImagen = substr($imagen, 0, $punto);
            $extensionImagen = substr($imagen, $punto + 1);
            $contador = 1;
            $nuevoNombre = $imagen;
            while (file_exists($ruta . '/' . $nuevoNombre)) {
                $nuevoNombre = $nombreImagen . "($contador)" . ($extensionImagen ? ".$extensionImagen" : '');
                $contador++;
            }

            return $nuevoNombre;
        }

        if (is_file($ruta) == true) {
            $this->fileName = renombrarImagen($rutaDestino, $this->fileName);
            $ruta = $rutaDestino . $this->fileName;
        }

        if (move_uploaded_file($this->file['tmp_name'], $ruta) === false) {
            throw new FileException("No se puede mover el fichero a su destino");
        }
    }

    public function copyFile(string $rutaOrigen, string $rutaDestino)
    {
        $origen = $rutaOrigen . $this->fileName;
        $destino = $rutaDestino . $this->fileName;

        if (is_file($origen) === false) {
            throw new FileException("No existe el fichero $origen que intentas copiar");
        }
        if (is_file($destino) === true) {
            throw new FileException("El fichero $destino ya existe y no se puede sobreescribir");
        }
        if (copy($origen, $destino) === false) {
            throw new FileException("No se ha podido copiar el fichero $origen a $destino");
        }
    }
}