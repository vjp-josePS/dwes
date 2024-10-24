<?php
    require 'utils/utils.php';
    require 'entities/imagenGaleria.class.php';

    function generarGaleria(){
        $galeria = [];

        for ($i=1; $i < 12; $i++) { 
            $imagenGaleria = new imagenGaleria("$i.jpg", "descripción imagen $i", rand(1, 12000), rand(1, 1200), rand(1, 12000));
    
            $galeria[] = $imagenGaleria;
        }
    
    }
    
    $galeria = generarGaleria();

    require 'views/index.view.php';
?>