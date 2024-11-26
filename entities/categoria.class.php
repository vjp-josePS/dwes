<?php
// Incluye la interfaz IEntity que debe implementarse en esta clase.
require_once 'entities/database/IEntity.class.php';

// Define la clase Categoria que implementa la interfaz IEntity.
class Categoria implements IEntity
{
    private $id;
    private $nombre;
    private $numImagenes;

    // Constructor
    public function __construct(string $nombre = '', int $numImagenes = 0)
    {
        $this->nombre = $nombre;
        $this->numImagenes = $numImagenes;
    }

    // Métodos get
    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getNumImagenes()
    {
        return $this->numImagenes;
    }

    // Método set
    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    public function setNumImagenes($numImagenes): void
    {
        $this->numImagenes = $numImagenes;
    }

    // Método para convertir los atributos de la clase en un array asociativo.
    public function toArray(): array
    {
        return [
            'id'=> $this->getId(), // Asociamos el valor del id con la clave 'id'.
            'nombre'=> $this->getNombre(), // Asociamos el nombre con la clave 'nombre'.
            'numImagenes'=> $this->getNumImagenes() // Asociamos el número de imágenes con la clave 'numImagenes'.
        ];
    }
}