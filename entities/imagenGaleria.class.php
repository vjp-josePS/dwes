<?php
require_once 'entities/database/IEntity.class.php';

class ImagenGaleria implements IEntity
{
    const RUTA_IMAGENES_PORTFOLIO = 'images/index/portfolio/';
    const RUTA_IMAGENES_GALLERY = 'images/index/gallery/';

    private $nombre;
    private $descripcion;
    private $numVisualizaciones;
    private $numLikes;
    private $numDownloads;
    private $id;
    private $categoria;

    public function __construct($nombre = '',  $descripcion = '',int $categoria = 0, $numVisualizaciones = 0,  $numLikes = 0,  $numDownloads = 0, $id = 0)
    {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->numVisualizaciones = $numVisualizaciones;
        $this->numLikes = $numLikes;
        $this->numDownloads = $numDownloads;
        $this->id = $id;
        $this->categoria = $categoria;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getNumVisualizaciones()
    {
        return $this->numVisualizaciones;
    }

    public function getNumLikes()
    {
        return $this->numLikes;
    }

    public function getNumDownloads()
    {
        return $this->numDownloads;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    public function setNumVisualizaciones($numVisualizaciones): void
    {
        $this->numVisualizaciones = $numVisualizaciones;
    }

    public function setNumLikes($numLikes): void
    {
        $this->numLikes = $numLikes;
    }

    public function setNumDownloads($numDownloads): void
    {
        $this->numDownloads = $numDownloads;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setCategoria($categoria): void
    {
        $this->categoria = $categoria;
    }

    public function getUrlPortfolio(): string
    {
        return self::RUTA_IMAGENES_PORTFOLIO . $this->getNombre();
    }

    public function getUrlGallery(): string
    {
        return self::RUTA_IMAGENES_GALLERY . $this->getNombre();
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'nombre' => $this->getNombre(),
            'descripcion' => $this->getDescripcion(),
            'categoria' => $this->getCategoria(),
            'numVisualizaciones' => $this->getNumVisualizaciones(),
            'numLikes' => $this->getNumLikes(),
            'numDescargas' => $this->getNumDownloads()
        ];
    }
}