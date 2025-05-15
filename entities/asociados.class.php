<?php
require_once __DIR__ . '/../database/IEntity.class.php';

class Asociado implements IEntity
{
    private ?int $id;
    private string $nombre;
    private string $logo;
    private string $descripcion;

    public function __construct(
        string $nombre = '',
        string $logo = '',
        string $descripcion = '',
        ?int $id = null
    ) {
        $this->nombre = $nombre;
        $this->logo = $logo;
        $this->descripcion = $descripcion;
        $this->id = $id;
    }

    // Getters
    public function getId(): ?int {
        return $this->id;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getLogo(): string {
        return $this->logo;
    }

    public function getDescripcion(): string {
        return $this->descripcion;
    }

    // Setters
    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function setLogo(string $logo): void {
        $this->logo = $logo;
    }

    public function setDescripcion(string $descripcion): void {
        $this->descripcion = $descripcion;
    }

    public function toArray(): array {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'logo' => $this->logo,
            'descripcion' => $this->descripcion
        ];
    }
}
