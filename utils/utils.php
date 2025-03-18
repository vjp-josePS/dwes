<?php

function esOpcionMenuActiva(string $opcionMenu): bool
{
    $uri = $_SERVER['REQUEST_URI'];
    return strpos($uri, $opcionMenu) !== false;
}

function existeOpcionMenuActivaEnArray(array $opcionesMenu): bool
{
    foreach ($opcionesMenu as $opcion) {
        if (esOpcionMenuActiva($opcion)) {
            return true;
        }
    }
    return false;
}
