<div class="last-box row">
    <div class="col-xs-12 col-sm-4 col-sm-push-4 last-block">
        <div class="partner-box text-center">
            <p>
                <!-- Icono de ubicación utilizando Font Awesome -->
                <i class="fa fa-map-marker fa-2x sr-icons"></i>
                <!-- Dirección del socio principal -->
                <span class="text-muted">35 North Drive, Adroukpape, PY 88105, Agoe Telessou</span>
            </p>
            <!-- Título de la sección -->
            <h4>Nuestros Principales Socios</h4>
            <hr>
            <div class="text-muted text-left">
                <?php
                // $asociados es un array de objetos que representan a los socios
                foreach ($asociados as $asociado) {
                    // Para cada socio en el array, se genera un bloque de HTML
                    echo '<ul class="list-inline"><li>
                            <!-- Imagen del logotipo del socio -->
                            <img src="images/index/'.$asociado->getLogo().'" alt="'.$asociado->getDescripcion().'">
                          </li>
                          <li>'.$asociado->getNombre().'</li></ul>';
                }
                ?>
            </div>
        </div>
    </div>
</div>