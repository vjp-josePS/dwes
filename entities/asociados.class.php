<?php
// Incluye la interfaz IEntity
require_once 'entities/database/IEntity.class.php';

// Definición de la clase Asociado que implementa la interfaz IEntity
class Asociado implements IEntity
{
    // Constante para definir la ruta de los logos
    const RUTA_LOGO = 'images/logo/';


    private $nombre;      
    private $logo;        
    private $descripcion; 
    private $id;          

    // Constructor de la clase
    // Permite inicializar un objeto Asociado con valores opcionales
    public function __construct($nombre = '',  $logo = '',  $descripcion = '', $id = 0)
    {
        $this->nombre = $nombre;
        $this->logo = $logo;
        $this->descripcion = $descripcion;
        $this->id = $id;
    }

    // Métodos getter para acceder a las propiedades privadas
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getLogo()
    {
        return $this->logo;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getId()
    {
        return $this->id;
    }

    // Métodos setter para modificar las propiedades privadas
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    public function setLogo($logo): void
    {
        $this->logo = $logo;
    }

    public function setDescripcion($descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    // Método para obtener la URL completa del logo
    public function getUrlLogo(): string
    {
        return self::RUTA_LOGO . $this->getLogo();
    }

    // Método para convertir el objeto Asociado en un array
    // Implementación requerida por la interfaz IEntity
    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'nombre' => $this->getNombre(),
            'logo' => $this->logo->getFileName(), //$logo es un objeto con método getFileName()
            'descripcion' => $this->getDescripcion()
        ];
    }
}