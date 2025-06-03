<?php
// Importamos la interfaz que define el comportamiento básico de las entidades
require_once __DIR__ . '/../database/IEntity.class.php';

/**
 * Clase ImagenGaleria
 * Representa una imagen en la galería del sitio web
 * Implementa IEntity para permitir su persistencia en la base de datos
 */
class ImagenGaleria implements IEntity {
    /**
     * ID único de la imagen en la base de datos
     * @var int|null
     */
    private $id;
    
    /**
     * Nombre del archivo de la imagen
     * @var string
     */
    private $nombre;

    /**
     * Texto descriptivo de la imagen
     * @var string
     */
    private $descripcion;

    /**
     * Contador de veces que se ha visto la imagen
     * @var int
     */
    private $numVisualizaciones;

    /**
     * Contador de "me gusta" recibidos
     * @var int
     */
    private $numLikes;

    /**
     * Contador de descargas realizadas
     * @var int
     */
    private $numDownloads;

    /**
     * ID de la categoría a la que pertenece la imagen
     * @var int
     */
    private $categoria;

    // Rutas predefinidas donde se almacenan las imágenes
    const RUTA_IMAGENES_PORTFOLIO = 'images/index/portfolio/'; // Ruta para imágenes del portfolio
    const RUTA_IMAGENES_GALLERY = 'images/index/gallery/';    // Ruta para imágenes de la galería

    /**
     * Constructor: Inicializa una nueva imagen con los valores proporcionados
     * Todos los parámetros son opcionales y tienen valores por defecto
     *
     * @param string $nombre Nombre del archivo de imagen
     * @param string $descripcion Texto descriptivo de la imagen
     * @param int $categoria ID de la categoría
     * @param int $numVisualizaciones Número inicial de visualizaciones
     * @param int $numLikes Número inicial de likes
     * @param int $numDownloads Número inicial de descargas
     */
    public function __construct(string $nombre = '', string $descripcion = '', int $categoria = 0, 
                              int $numVisualizaciones = 0, int $numLikes = 0, int $numDownloads = 0) {
        // Inicializamos los atributos con los valores pasados al constructor
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->numVisualizaciones = $numVisualizaciones;
        $this->numLikes = $numLikes;
        $this->numDownloads = $numDownloads;
        $this->categoria = $categoria;
    }

    // Métodos getter y setter para cada propiedad

    /**
     * Obtiene el ID de la imagen
     * @return int|null ID de la imagen o null si no está guardada
     */
    public function getId(): ?int {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void {
        $this->id = $id;
    }

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

    /**
     * @return int
     */
    public function getCategoria(): int {
        return $this->categoria;
    }
    
    /**
     * @param int $categoria
     */
    public function setCategoria(int $categoria): void {
        $this->categoria = $categoria;
    }

    // Métodos para obtener las URLs de las imágenes

    /**
     * Obtiene la URL completa de la imagen en el portfolio
     * Combina la ruta base con el nombre del archivo
     * @return string URL completa de la imagen en la carpeta portfolio
     */
    public function getUrlPortfolio(): string {
        return self::RUTA_IMAGENES_PORTFOLIO . $this->getNombre();
    }

    /**
     * Obtiene la URL completa de la imagen en la galería
     * Combina la ruta base con el nombre del archivo
     * @return string URL completa de la imagen en la carpeta gallery
     */
    public function getUrlGallery(): string {
        return self::RUTA_IMAGENES_GALLERY . $this->getNombre();
    }

    /**
     * Convierte el objeto a un array asociativo para su almacenamiento
     * Método requerido por la interfaz IEntity
     * @return array Array con todas las propiedades de la imagen
     */
    public function toArray(): array{
        return [
            'id' => $this->getId(),
            'nombre' => $this->getNombre(),
            'descripcion' => $this->getDescripcion(),
            'numVisualizaciones' => $this->getNumVisualizaciones(),
            'numLikes' => $this->getNumLikes(),
            'numDescargas' => $this->getNumDownloads(),
            'categoria' => $this->getCategoria(),
        ];
    }
}
