<?php
// Archivos necesarios
require_once 'entities/fileException.class.php';
require_once 'utils/const.php';

// Definición de la clase File
class File
{
    private $file;
    private $fileName;

    public function __construct(string $fileName, array $arrTypes)
    {
        // Obtener la información del archivo subido
        $this->file = $_FILES[$fileName];
        $this->fileName = '';

        // Verificar si se ha seleccionado un archivo
        if (!isset($this->file)) {
            throw new FileException('Debes seleccionar un fichero');
        }

        // Verificar si hubo algún error durante la subida
        if ($this->file['error'] !== UPLOAD_ERR_OK) {
            throw new FileException((ERROR_STRINGS[$this->file['error']]));
        }

        // Verificar si el tipo de archivo es soportado
        if (in_array($this->file['type'], $arrTypes) === false) {
            throw new FileException('Tipo de fichero no soportado');
        }
    }

    // Método para obtener el nombre del archivo
    public function getFileName()
    {
        return $this->fileName;
    }

    // Método para guardar el archivo subido
    public function saveUploadFile(string $rutaDestino)
    {
        // Verificar si el archivo se subió mediante el formulario
        if (is_uploaded_file($this->file['tmp_name']) === false) {
            throw new FileException("El archivo no se ha subido mediante el formulario");
        }

        // Asignar el nombre del archivo
        $this->fileName = $this->file['name'];
        $ruta = $rutaDestino . $this->fileName;

        // Función interna para renombrar la imagen si ya existe
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

        // Renombrar el archivo si ya existe en el destino
        if (is_file($ruta) == true) {
            $this->fileName = renombrarImagen($rutaDestino, $this->fileName);
            $ruta = $rutaDestino . $this->fileName;
        }

        // Mover el archivo subido a su destino final
        if (move_uploaded_file($this->file['tmp_name'], $ruta) === false) {
            throw new FileException("No se puede mover el fichero a su destino");
        }
    }

    // Método para copiar un archivo
    public function copyFile(string $rutaOrigen, string $rutaDestino)
    {
        $origen = $rutaOrigen . $this->fileName;
        $destino = $rutaDestino . $this->fileName;

        // Verificar si el archivo de origen existe
        if (is_file($origen) === false) {
            throw new FileException("No existe el fichero $origen que intentas copiar");
        }

        // Verificar si el archivo de destino ya existe
        if (is_file($destino) === true) {
            throw new FileException("El fichero $destino ya existe y no se puede sobreescribir");
        }

        // Copiar el archivo
        if (copy($origen, $destino) === false) {
            throw new FileException("No se ha podido copiar el fichero $origen a $destino");
        }
    }
}
