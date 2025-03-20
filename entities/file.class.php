<?php

require __DIR__ . '/../exceptions/FileException.class.php';

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
            throw new FileException('Debes seleccionar un fichero');
        }

        // Verificamos si ha habido algún error durante la subida del fichero
        if ($this->file['error'] !== UPLOAD_ERR_OK) {
            // Dentro del if vericaremos de que tipo ha sido el error
            switch ($this->file['error']) {
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE: {
                        // Algún porblema con el tamaño del fichero php.ini
                        throw new Exception('El fichero es demasiado grande');
                        break;
                    }
                case UPLOAD_ERR_PARTIAL: {
                        // Error en la transferencia - subida incompleta
                        throw new Exception('El fichero no se ha subido completamente');
                        break;
                    }
                default: {
                        // Error en la subida del fichero
                        throw new FileException('Error al subir el fichero');
                        break;
                    }
            }
        }

        // Comprobamos si el fichero subido es de un tipo de los que tenemos soportados
        if (in_array($this->file['type'], $arrTypes) === false) {
            // Error, tipo no soportado
            throw new FileException('Tipo de fichero no soportado');
        }
    }

    public function getFileName()
    {
        return $this->fileName;
    }

    public function saveUploadFile(string $rutaDestino){
        // Compruebo que el ficheor temporal con el que vamos a trabajar se haya subido previamente por peticion Post

        if(is_uploaded_file($this->file['tmp_name']) === false){
            throw new FileException('El fichero no se ha subido mediante el formulario');
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
            throw new FileException('No se puede mover el fichero a su destino');
        }
    }

    /**
     * @param string $rutaOrigen
     * @param string $rutaDestino
     * throws FileException
     */

    // public function copyFile(string $rutaOrigen, string $rutaDestino){
    //     $origen = $rutaOrigen . $this->fileName;
    //     $destino = $rutaDestino . $this->fileName;

    //     if(is_file($origen) === false){
    //         throw new FileException("No existe el fichero $origen que intentas copiar");
    //     }

    //     if(is_file($origen) === true){
    //         throw new FileException("El fichero $destino ya existe y no se puede sobreescribirlo");
    //     }

    //     if(copy($origen, $destino) === false){
    //         throw new FileException("No se ha podido copiar el fichero $origen a $destino");
    //     }
    // }

    public function copyFile(string $rutaOrigen, string $rutaDestino) {
        $origen = $rutaOrigen . $this->fileName;
        $destino = $rutaDestino . $this->fileName;
    
        if (is_file($origen) === false) {
            throw new FileException("No existe el fichero $origen que intentas copiar");
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
            throw new FileException("No se ha podido copiar el fichero $origen a $destino");
        }
    
        // Actualizar el nombre del archivo si se generó uno nuevo
        if (isset($nuevoNombre)) {
            $this->fileName = $nuevoNombre;
        }
    }
    
}
