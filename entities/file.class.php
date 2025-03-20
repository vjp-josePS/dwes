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
        // CON $fileName obtendremos el fichero mediante el array $_FILES que contiene todos los ficheros que se suben al servidor mediante un formulario.

        $this->file = $_FILES[$fileName];
        $this->fileName = '';

        // Comprobamos que es array contiene el fichero
        if (!isset($this->file)) {
            throw new FileException(getErrorString('FILE_NOT_SELECTED'));
        }

        // Verificamos si ha habido algún error durante la subida del fichero
        if ($this->file['error'] !== UPLOAD_ERR_OK) {
            // Dentro del if vericaremos de que tipo ha sido el error
            throw new FileException(getErrorString($this->file['error']));
        }

        // Comprobamos si el fichero subido es de un tipo de los que tenemos soportados
        if (in_array($this->file['type'], $arrTypes) === false) {
            // Error, tipo no soportado
            throw new FileException(getErrorString('UNSUPPORTED_FILE_TYPE'));
        }
    }

    public function getFileName()
    {
        return $this->fileName;
    }

    public function saveUploadFile(string $rutaDestino){
        // Compruebo que el ficheor temporal con el que vamos a trabajar se haya subido previamente por peticion Post

        if(is_uploaded_file($this->file['tmp_name']) === false){
            throw new FileException(getErrorString('FILE_NOT_SELECTED'));
        }

        // Cargamos el nombre del fichero
        $this->fileName = $this->file['name'];
        $ruta=$rutaDestino.$this->fileName;
        
        // Comprobamos que la ruta no se corresponda con un fichero que ya exista
        if(is_file($ruta) == true){
            $fechaActual = date('dmYHis');
            $this->fileName=$this->fileName . '-' . $fechaActual;
            $ruta=$rutaDestino.$this->fileName;
        }

        // Muevo el fichero subido del directorio temporal(viene definido en php.ini)
        if(move_uploaded_file($this->file['tmp_name'], $ruta) === false){
            throw new FileException(getErrorString('MOVE_ERROR'));
        }
    }

    /**
     * @param string $rutaOrigen
     * @param string $rutaDestino
     * throws FileException
     */

    public function copyFile(string $rutaOrigen, string $rutaDestino) {
        $origen = $rutaOrigen . $this->fileName;
        $destino = $rutaDestino . $this->fileName;
    
        if (is_file($origen) === false) {
            throw new FileException(getErrorString('FILE_NOT_SELECTED'));
        }
    
        // Modificación: Si el archivo ya existe en el destino, generamos un nuevo nombre
        if (is_file($destino) === true) {
            $fechaActual = date('dmYHis');
            $nombreArchivo = pathinfo($this->fileName, PATHINFO_FILENAME);
            $extension = pathinfo($this->fileName, PATHINFO_EXTENSION);
            $nuevoNombre = "{$nombreArchivo}-{$fechaActual}.{$extension}";
            $destino = $rutaDestino . $nuevoNombre;
        }
    
        if (copy($origen, $destino) === false) {
            throw new FileException(getErrorString('COPY_ERROR'));
        }
    
        // Actualizar el nombre del archivo si se generó uno nuevo
        if (isset($nuevoNombre)) {
            $this->fileName = $nuevoNombre;
        }
    }
}
