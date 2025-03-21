<?php

function esOpcionMenuActiva(string $opcionMenu): bool
{
    $uri = $_SERVER['REQUEST_URI'];
    if ($opcionMenu === 'index.php' && ($uri === '/' || $uri === '/index.php')) {
        return true;
    }
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

function obtenerTresElementosAleatorios($array) {
    shuffle($array);
    return array_slice($array, 0, 3);
}
