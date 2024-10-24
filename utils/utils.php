<?php
    function esOpcionMenuActiva(string $opcionMenu): bool {
        return str_contains($_SERVER['PHP_SELF'],$opcionMenu);
    }

    function existeOpcionMenuActivaEnArray(array $arrayOpcionesMenu): bool {
        return in_array(basename($_SERVER['PHP_SELF']), $arrayOpcionesMenu);
    }
?>