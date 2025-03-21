<?php
class Asociado {
    private $nombre;
    private $logo;
    private $descripcion;

    public function __construct($nombre, $logo, $descripcion) {
        $this->nombre = $nombre;
        $this->logo = $logo;
        $this->descripcion = $descripcion;
    }

    // Getters
    public function getNombre() { return $this->nombre; }
    public function getLogo() { return $this->logo; }
    public function getDescripcion() { return $this->descripcion; }
}
