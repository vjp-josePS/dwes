<?php
    function esOpcionMenuActiva(string $opcion): bool{
        if ($_SERVER['REQUEST_URI']==$opcion) {
            return true;
        } else {
            return false;
        }
        
    };

    function existeOpcionMenuActivaArray(...$array) {
        foreach ($array as $key) {
            if (esOpcionMenuActiva($key)) {
                return true;
            } else {
                return false;
            }
        }
    }

    function extraerAsociados($asociados) {
        if (count($asociados) <= 3) {
            return $asociados;
        } else {
            shuffle($asociados);
            return array_slice($asociados, 0, 3);
        }
    }
?>