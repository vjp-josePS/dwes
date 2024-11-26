<?php
// Se inicia la impresión de un contenedor div con un ID y clase dinámica
echo '<div id="' . $idCat . '" class="tab-pane ' . $catActiva . '">
<div class="row popup-gallery">';

// Se inicia un bucle que se repetirá 12 veces para generar las tarjetas de imagen
for ($i = 0; $i < 12; $i++) {
    // Cada tarjeta de imagen está contenida en un div con clases para el diseño responsivo
    echo '<div class="col-xs-12 col-sm-6 col-md-3">
        <div class="sol">'; // Comienza el contenedor de la tarjeta

    // Se imprime la imagen con una URL obtenida del objeto del array y se establece un texto alternativo
    echo '<img class="img-responsive" src="' . $arrayImg[$i]->getUrlPortfolio() . '" alt="' . $arrayImg[$i]->getDescripcion() . '">';

    // Comienza el contenedor "detrás" que contiene los elementos interactivos
    echo '<div class="behind">
                <div class="head text-center">
                    <ul class="list-inline">'; // Lista horizontal para los iconos de acción

    // Cada elemento de la lista proporciona una acción relacionada con la imagen
    echo '<li>
                            <a class="gallery" href="' . $arrayImg[$i]->getUrlGallery() . '" data-toggle="tooltip" data-original-title="Quick View">
                                <i class="fa fa-eye"></i> <!-- Icono para vista rápida -->
                            </a>
                        </li>
                        <li>
                            <a href="#" data-toggle="tooltip" data-original-title="Click if you like it">
                                <i class="fa fa-heart"></i> <!-- Icono para marcar como favorito -->
                            </a>
                        </li>
                        <li>
                            <a href="#" data-toggle="tooltip" data-original-title="Download">
                                <i class="fa fa-download"></i> <!-- Icono para descargar -->
                            </a>
                        </li>
                        <li>
                            <a href="#" data-toggle="tooltip" data-original-title="More information">
                                <i class="fa fa-info"></i> <!-- Icono para más información -->
                            </a>
                        </li>';

    // Cierra la lista de acciones
    echo '</ul>
                </div>';

    // Comienza una fila para mostrar estadísticas de la imagen
    echo '<div class="row box-content">
                    <ul class="list-inline text-center">';
    
    // Muestra el número de visualizaciones, likes y descargas utilizando iconos
    echo '<li><i class="fa fa-eye"></i> ' . $arrayImg[$i]->getNumVisualizaciones() . '</li>
                        <li><i class="fa fa-heart"></i> ' . $arrayImg[$i]->getNumLikes() . '</li>
                        <li><i class="fa fa-download"></i> ' . $arrayImg[$i]->getNumDownloads() . '</li>';

    // Cierra la lista y los contenedores abiertos
    echo '</ul>
                </div>
            </div>'; // Fin del contenedor "detrás"
    
    echo '</div>
    </div>'; // Fin del contenedor de tarjeta
}

// Cierra el contenedor de la galería
echo '</div>';

// Se añade un sistema de paginación al final del contenido
echo '<nav class="text-center">
    <ul class="pagination">
        <li class="active"><a href="#">1</a></li> <!-- Página activa -->
        <li><a href="#">2</a></li> <!-- Enlace a la página 2 -->
        <li><a href="#">3</a></li> <!-- Enlace a la página 3 -->
        <li><a href="#" aria-label="suivant"> <!-- Enlace para siguiente página -->
                <span aria-hidden="true">&raquo;</span> <!-- Icono de flecha hacia adelante -->
            </a></li>
    </ul>
</nav>
</div>';
?>