<?php
require_once __DIR__ . '/../database/IEntity.class.php';

class Categoria implements IEntity
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $nombre;
    /**
     * @var int
     */
    private $numImagenes;

    public function __construct($nombre = '', $numImagenes = 0)
    {
        $this->nombre = $nombre;
        $this->numImagenes = $numImagenes;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string
     */
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @param int
     */
    public function getNumImagenes(): int
    {
        return $this->numImagenes;
    }

    /**
     * @param int
     */
    public function setNumImagenes(int $numImagenes): void
    {
        $this->numImagenes = $numImagenes;
    }

    public function toArray(): array{
        return [
            'id' => $this->getId(),
            'nombre' => $this->getNombre(),
            'numImagenes' => $this->getNumImagenes()
        ];
    }
}