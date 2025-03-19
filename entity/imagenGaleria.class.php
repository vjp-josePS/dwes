<?php

class ImagenGaleria {
    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var int
     */
    private $numVisualizaciones;

    /**
     * @var int
     */
    private $numLikes;

    /**
     * @var int
     */
    private $numDownloads;

    // Constantes para las rutas de las imágenes
    const RUTA_IMAGENES_PORTFOLIO = '../images/index/portfolio/';
    const RUTA_IMAGENES_GALLERY = '../images/index/gallery/';

    /**
     * Constructor de la clase.
     *
     * @param string $nombre
     * @param string $descripcion
     * @param int $numVisualizaciones
     * @param int $numLikes
     * @param int $numDownloads
     */
    public function __construct(string $nombre, string $descripcion, int $numVisualizaciones = 0, int $numLikes = 0, int $numDownloads = 0) {
        // Inicializamos los atributos con los valores pasados al constructor.
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->numVisualizaciones = $numVisualizaciones;
        $this->numLikes = $numLikes;
        $this->numDownloads = $numDownloads;
    }

    // Getters y Setters

    /**
     * @return string
     */
    public function getNombre(): string {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getDescripcion(): string {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     */
    public function setDescripcion(string $descripcion): void {
        $this->descripcion = $descripcion;
    }

    /**
     * @return int
     */
    public function getNumVisualizaciones(): int {
        return $this->numVisualizaciones;
    }

    /**
     * @param int $numVisualizaciones
     */
    public function setNumVisualizaciones(int $numVisualizaciones): void {
        $this->numVisualizaciones = $numVisualizaciones;
    }

    /**
     * @return int
     */
    public function getNumLikes(): int {
        return $this->numLikes;
    }

    /**
     * @param int $numLikes
     */
    public function setNumLikes(int $numLikes): void {
        $this->numLikes = $numLikes;
    }

    /**
     * @return int
     */
    public function getNumDownloads(): int {
        return $this->numDownloads;
    }

    /**
     * @param int $numDownloads
     */
    public function setNumDownloads(int $numDownloads): void {
        $this->numDownloads = $numDownloads;
    }

    // Métodos para obtener las URLs de las imágenes

    /**
     * Devuelve la URL de la imagen en el portfolio.
     *
     * @return string
     */
    public function getUrlPortfolio(): string {
        return self::RUTA_IMAGENES_PORTFOLIO . $this->getNombre();
    }

    /**
     * Devuelve la URL de la imagen en la galería.
     *
     * @return string
     */
    public function getUrlGallery(): string {
        return self::RUTA_IMAGENES_GALLERY . $this->getNombre();
    }
}
