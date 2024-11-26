<?php
// Incluye la interfaz IEntity
require_once 'entities/database/IEntity.class.php';

// Definimos la clase Mensaje que implementa la interfaz IEntity.
class Mensaje implements IEntity
{

    private $id; // Identificador único del mensaje.
    private $nombre; // Nombre del remitente.
    private $apellidos; // Apellidos del remitente.
    private $asunto; // Asunto del mensaje.
    private $email; // Dirección de correo electrónico del remitente.
    private $texto; // Contenido del mensaje.
    private $fecha; // Fecha y hora en que se creó el mensaje.

    public function __construct($nombre = '', $apellidos = '', $email = '', $asunto = '', $texto = '')
    {
        $this->id = 0; // Inicializa el ID a 0
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->asunto = $asunto;
        $this->email = $email;
        $this->texto = $texto;
        $this->fecha = date('Y-m-d H:i:s');
    }

    // Métodos getters
    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function getAsunto()
    {
        return $this->asunto;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getTexto()
    {
        return $this->texto;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    // Métodos setters

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    public function setApellidos($apellidos): void
    {
        $this->apellidos = $apellidos;
    }

    public function setAsunto($asunto): void
    {
        $this->asunto = $asunto;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function setTexto($texto): void
    {
        $this->texto = $texto;
    }

    public function setFecha($fecha): void
    {
        // Permite establecer una fecha específica
        $this->fecha = $fecha;
    }

    // Método para convertir las propiedades del objeto en un array asociativo.
    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'nombre' => $this->getNombre(),
            'apellidos' => $this->getApellidos(),
            'asunto' => $this->getAsunto(),
            'email' => $this->getEmail(),
            'texto' => $this->getTexto(),
            'fecha' => $this->getFecha()
        ];
        // Devuelve un array asociativo con las propiedades del objeto, para serialización o almacenamiento en bases de datos
   }
}