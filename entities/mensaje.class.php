<?php
// Importa la interfaz IEntity que define el comportamiento básico de las entidades
require_once __DIR__ . '/../database/IEntity.class.php';

/**
 * Clase Mensaje - Representa un mensaje de contacto en el sistema
 * Implementa IEntity para garantizar la compatibilidad con el sistema de persistencia
 */
class Mensaje implements IEntity
{
    // Propiedades privadas de la clase
    private ?int $id;           // ID único del mensaje (nullable)
    private string $nombre;     // Nombre del remitente
    private string $apellidos;  // Apellidos del remitente
    private string $asunto;     // Asunto del mensaje
    private string $email;      // Email del remitente
    private string $texto;      // Contenido del mensaje
    private ?string $fecha;     // Fecha de envío (nullable)

    /**
     * Constructor de la clase
     * Inicializa un nuevo mensaje con los datos proporcionados
     * Todos los parámetros son opcionales y tienen valores por defecto
     */
    public function __construct(
        string $nombre = '',
        string $apellidos = '',
        string $asunto = '',
        string $email = '',
        string $texto = '',
        ?string $fecha = null,
        ?int $id = null
    ) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->asunto = $asunto;
        $this->email = $email;
        $this->texto = $texto;
        $this->fecha = $fecha;
        $this->id = $id;
    }

    // Métodos getter - Permiten acceder a las propiedades privadas
    /**
     * @return int|null ID del mensaje
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string Nombre del remitente
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @return string Apellidos del remitente
     */
    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    /**
     * @return string Asunto del mensaje
     */
    public function getAsunto(): string
    {
        return $this->asunto;
    }

    /**
     * @return string Email del remitente
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string Contenido del mensaje
     */
    public function getTexto(): string
    {
        return $this->texto;
    }

    /**
     * @return string|null Fecha de envío del mensaje
     */
    public function getFecha(): ?string
    {
        return $this->fecha;
    }

    // Métodos setter - Permiten modificar las propiedades privadas
    /**
     * @param string $nombre Nuevo nombre del remitente
     */
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @param string $apellidos Nuevos apellidos del remitente
     */
    public function setApellidos(string $apellidos): void
    {
        $this->apellidos = $apellidos;
    }

    /**
     * @param string $asunto Nuevo asunto del mensaje
     */
    public function setAsunto(string $asunto): void
    {
        $this->asunto = $asunto;
    }

    /**
     * @param string $email Nuevo email del remitente
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param string $texto Nuevo contenido del mensaje
     */
    public function setTexto(string $texto): void
    {
        $this->texto = $texto;
    }

    /**
     * @param string|null $fecha Nueva fecha de envío del mensaje
     */
    public function setFecha(?string $fecha): void
    {
        $this->fecha = $fecha;
    }

    /**
     * Convierte el objeto a un array asociativo
     * Requerido por la interfaz IEntity para la persistencia
     * @return array Datos del mensaje en formato array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'apellidos' => $this->apellidos,
            'asunto' => $this->asunto,
            'email' => $this->email,
            'texto' => $this->texto,
            'fecha' => $this->fecha,
        ];
    }
}
