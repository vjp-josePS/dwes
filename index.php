<?php
require_once __DIR__ . '/utils/utils.php';
require_once __DIR__ . 'entities/imagenGaleria.class.php';
require_once __DIR__ . 'entities/asociados.class.php';


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

$asociados = [
    new Asociado("Asociado 1", "log1.png", "Descripción del asociado 1"),
    new Asociado("Asociado 2", "log2.png", "Descripción del asociado 2"),
    new Asociado("Asociado 3", "log3.png", "Descripción del asociado 3"),
    // Añade más asociados si lo deseas
];

$asociadosMostrar = obtenerTresElementosAleatorios($asociados);

require 'views/index.view.php';
