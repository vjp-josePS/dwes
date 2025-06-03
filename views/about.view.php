<?php 
// Incluye la cabecera del documento HTML con los elementos básicos
include __DIR__ . '/partials/inicio-doc.part.php' ?>

<?php 
// Incluye la barra de navegación común para todas las páginas
include __DIR__ . '/partials/nav.part.php' ?>

<!-- Principal Content Start -->
<div id="about">
    <!-- Header - Imagen principal con título -->
    <div class="row">
        <div class="col-xs-12 intro">
            <div class="carousel-inner">
                <!-- Imagen de cabecera -->
                <div class="item active">
                    <img class="img-responsive" src="../images/about_us.jpg" alt="header picture">
                </div>
                <!-- Texto superpuesto sobre la imagen -->
                <div class="carousel-caption">
                    <h1>ABOUT US</h1>
                    <p>About Us and our Services?</p>
                    <hr>
                </div>
            </div>
        </div>
    </div>

    <!-- Container Box - Contenido principal -->
    <div class="container">
        <!-- Sección de información sobre el estudio y el equipo -->
        <div class="row">
            <!-- Columna sobre el estudio -->
            <div class="col-xs-12 col-sm-6">
                <div class="box-about">
                    <i class="fa fa-institution fa-2x"></i>
                    <h4>About Our Studio</h4>
                    <p class="text-left text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Tempora ea ratione vel nisi, qui perferendis nulla, fugit aut, beatae, tempore modi. Minus sequi iste, nam nobis, excepturi.Ut enim ad enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure.</p>
                </div>
            </div>
            <!-- Columna sobre el equipo -->
            <div class="col-xs-12 col-sm-6">
                <div class="box-about">
                    <i class="fa fa-group fa-2x"></i>
                    <h4>About Our Team</h4>
                    <p class="text-left text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Tempora ea ratione vel nisi, qui perferendis nulla, fugit aut, beatae, tempore modi. Minus sequi iste, nam nobis, excepturi.Ut enim ad enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure.</p>
                </div>
            </div>
        </div>

        <!-- Sección de servicios y habilidades -->
        <div class="row">
            <!-- Descripción de servicios -->
            <div class="col-xs-12 col-sm-6 row">
                <ul class="list-inline text-center">
                    <li class="line"></li>
                    <li><i class="fa fa-tasks fa-2x"></i></li>
                    <li class="line"></li>
                    <li>
                        <h4>Our Services</h4>
                    </li>
                    <li class="line"></li>
                </ul>
                <p class="text-muted text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Tempora ea ratione vel nisi, qui perferendis nulla, fugit aut, beatae, tempore modi.</p>
            </div>
            <!-- Barras de progreso de habilidades -->
            <div class="col-xs-12 col-sm-6">
                <!-- Barra de progreso Photoshop -->
                <p class="text-muted"><strong>PHOTOSHOP</strong> <span class="pull-right">80%</span></p>
                <div class="progress">
                    <div class="progress-bar progress-bar-warning" role="progressbar" 
                         aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%;"></div>
                </div>
                <!-- Barra de progreso Shooting Photo -->
                <p class="text-muted"><strong>SHOOTING PHOTO </strong><span class="pull-right">95%</span></p>
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width:95%;"></div>
                </div>
                <!-- Barra de progreso Formation -->
                <p class="text-muted"><strong>FORMATION</strong><span class="pull-right">90%</span></p>
                <div class="progress">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%;"></div>
                </div>
            </div>
        </div>

        <!-- Sección de precios - Tablas de formación -->
        <div class="row pricing text-center">
            <h3>FORMATION PRICING TABLES</h3>
            <hr>
            <!-- Planes de precios (Beginner, Intermediary, Professional) -->
            <div class="col-xs-12 col-sm-4 first">
                <div class="beginner">
                    <h4>BEGINNER</h4>
                    <h5>$99.97</h5>
                    <ul class="nav">
                        <li>Beginner Option I</li>
                        <li>Beginner Option II</li>
                        <li>Beginner Option III</li>
                        <li>Beginner Option IV</li>
                        <li>Beginner Option V</li>
                    </ul>
                    <a href="#" class="btn btn-lg sr-button">SIGN UP</a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 middle">
                <div class="intermediary">
                    <h4>INTERMEDIARY</h4>
                    <h5>$199.97</h5>
                    <ul class="nav">
                        <li>Intermediary Option I</li>
                        <li>Intermediary Option II</li>
                        <li>Intermediary Option III</li>
                        <li>Intermediary Option IV</li>
                        <li>Intermediary Option V</li>
                    </ul>
                    <a href="#" class="btn btn-lg sr-button">SIGN UP</a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="higher">
                    <h4>PROFESSIONAL</h4>
                    <h5>$299.97</h5>
                    <ul class="nav">
                        <li>High Option I</li>
                        <li>High Option II</li>
                        <li>High Option III</li>
                        <li>High Option IV</li>
                        <li>High Option V</li>
                    </ul>
                    <a href="#" class="btn btn-lg sr-button">SIGN UP</a>
                </div>
            </div>
        </div>

        <!-- Sección de testimonios de clientes -->
        <div class="row feedback text-center">
            <h3>CLIENTS FEEDBACK</h3>
            <hr>
            <!-- Testimonios individuales -->
            <div class="col-xs-12 col-sm-3">
                <img class="img-responsive" src="../images/clients/client1.jpg" alt="client's picture">
                <h5>MISS BELLA</h5>
                <q>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</q>
            </div>
            <div class="col-xs-12 col-sm-3">
                <img class="img-responsive" src="../images/clients/client2.jpg" alt="client's picture">
                <h5>DON PENO</h5>
                <q>Tempora ea ratione vel nisi, qui perferendis nulla, fugit aut, beatae, tempore modi.</q>
            </div>
            <div class="col-xs-12 col-sm-3">
                <img class="img-responsive" src="../images/clients/client3.jpg" alt="client's picture">
                <h5>SWEETY</h5>
                <q>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</q>
            </div>
            <div class="col-xs-12 col-sm-3">
                <img class="img-responsive" src="../images/clients/client4.jpg" alt="client's picture">
                <h5>LADY</h5>
                <q>Tempora ea ratione vel nisi, qui perferendis nulla, fugit aut, beatae, tempore modi.</q>
            </div>
        </div>
    </div>
</div>

<!-- Pie de página -->
<footer>
    <div class="container text-muted text-center">
        <!-- Botones de redes sociales -->
        <ul class="list-inline social-buttons">
            <li><a href="#"><i class="fa fa-facebook sr-icons"></i></a>
            </li>
            <li><a href="#"><i class="fa fa-twitter sr-icons"></i></a>
            </li>
            <li><a href="#"><i class="fa fa-google-plus sr-icons"></i></a>
            </li>
        </ul>
        <!-- Información de contacto -->
        <ul class="list-inline">
            <li class="footer-number"><i class="fa fa-phone sr-icons"></i> (00228)92229954 </li>
            <li><i class="fa fa-envelope sr-icons"></i> kouvenceslas93@gmail.com</li>
        </ul>
        <!-- Copyright -->
        <p>Photography Fanatic Template &copy; 2017</p>
    </div>
</footer>

<?php 
// Incluye el cierre del documento HTML
include __DIR__ . '/partials/fin-doc.part.php' ?>