<?php
    // Función que verifica si una opción de menú está activa
    function esOpcionMenuActiva(string $opcion): bool {
        // Compara la URI actual del servidor con la opción proporcionada
        if ($_SERVER['REQUEST_URI'] == $opcion) {
            // Si coinciden, devuelve verdadero
            return true;
        } else {
            // Si no coinciden, devuelve falso
            return false;
        }
    };

    // Función que verifica si alguna de las opciones de menú en un array está activa
    function existeOpcionMenuActivaArray(...$array) {
        // Recorre cada elemento del array de opciones
        foreach ($array as $key) {
            // Llama a la función esOpcionMenuActiva para verificar si la opción actual está activa
            if (esOpcionMenuActiva($key)) {
                // Si encuentra una opción activa, devuelve verdadero
                return true;
            } else {
                // Si no, continua al siguiente elemento
                return false;
            }
        }
        // Si ninguna opción está activa, devuelve falso al final del bucle
        return false; 
    }

    // Función que extrae hasta 3 elementos aleatorios de un array de asociados
    function extraerAsociados($asociados) {
        // Verifica si el número de elementos en el array es menor o igual a 3
        if (count($asociados) <= 3) {
            // Si es así, retorna el array completo sin cambios
            return $asociados;
        } else {
            // Si hay más de 3 elementos, mezcla el array aleatoriamente
            shuffle($asociados);
            // Devuelve los primeros 3 elementos del array mezclado
            return array_slice($asociados, 0, 3);
        }
    }
?>