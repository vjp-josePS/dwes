<?php
require 'entities/imagenGaleria.class.php';
require 'entities/asociado.class.php';
require 'utils/utils.php';

$arrayImg = [];
for ($i = 1; $i < 13; $i++) {
    $r1 = rand(1000, 5000);
    $r2 = rand(100, 500);
    $r3 = rand(10, 200);
    $img = new ImagenGaleria($i . '.jpg', 'Descripción imagen ' . $i, $r1, $r2, $r3);

    array_push($arrayImg, $img);
}

$arrayAsociados = [
    new Asociado("Asociado1", "log1.jpg", "Desc1"),
    new Asociado("Asociado2", "log2.jpg", "Desc2"),
    new Asociado("Asociado3", "log3.jpg", "Desc3"),
    new Asociado("Asociado4", "log2.jpg", "Desc4"),
    new Asociado("Asociado5", "log3.jpg", "Desc5")
];

$asociados = extraerAsociados($arrayAsociados);

require 'views/index.view.php';