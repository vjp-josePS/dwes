<?php
require_once __DIR__ . '/utils/utils.php';
require 'entity/ImagenGaleria.class.php';

$imagenes = [];
for ($i = 1; $i <= 12; $i++) {
    $imagenes[] = new ImagenGaleria(
        "$i.jpg",
        "Descripción imagen $i",
        rand(800, 1500), // Visualizaciones aleatorias
        rand(300, 800),  // Likes aleatorios
        rand(50, 200)    // Downloads aleatorios
    );
}

require 'views/index.view.php';
