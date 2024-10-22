<?php
class imagenGaleria{

    const RUTA_IMAGENES_PORTFOLIO = '/images/index/portfolio/';
    const RUTA_IMAGENES_GALLERY = '/images/index/gallery/';

    private $nombre;

    private $descripcion;

    private $numVisualizaciones;

    private $numLikes;

    private $numDowloads;

    public function __construct(string $nombre, string $descripcion, int $numVisualizaciones = 0, int $numLikes = 0, int $numDowsloads = 0){
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->numVisualizaciones = $numVisualizaciones;
        $this->numLikes = $numLikes;
        $this->numDowloads = $numDowsloads;
    }

    public function getNombre() : string{
        return $this->nombre;
    }

    public function setNombre(string $nombre) : void{
        $this->nombre = $nombre;
    }

    public function getDescripcion() : string{
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion) : void{
        $this->descripcion = $descripcion;
    }

    public function getNumVisualizaciones() : int{
        return $this->numVisualizaciones;
    }

    public function setNumVisualizaciones(string $numVisualizaciones) : void{
        $this->numVisualizaciones = $numVisualizaciones;
    }

    public function getNumLikes() : int{
        return $this->numLikes;
    }

    public function setNumLikes(string $numLikes) : void{
        $this->numLikes = $numLikes;
    }

    public function getNumDowloads() : int{
        return $this->numDowloads;
    }

    public function setNumDowloads(string $numDowloads) : void{
        $this->numDowloads = $numDowloads;
    }

    public function getUrlPortfolio():string{
        return self::RUTA_IMAGENES_PORTFOLIO.$this->getNombre();
    }

    public function getUrlGallery():string{
        return self::RUTA_IMAGENES_GALLERY.$this->getNombre();
    }
}
?>