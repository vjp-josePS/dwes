<?php
include __DIR__ . '/partials/inicio-doc.part.php';
include __DIR__ . '/partials/nav.part.php';
?>

<!-- Principal Content Start-->
<div id="about">

<!-- Header -->
<div class="row"> <!-- Inicia una nueva fila en un sistema de grid (rejilla) -->
  <div class="col-xs-12 intro"> <!-- Define una columna que ocupa todo el ancho en pantallas extra pequeñas (xs) -->
    <div class="carousel-inner"> <!-- Contenedor para los elementos del carrusel -->
      <div class="item active"> <!-- Elemento del carrusel que está activo (visible) -->
        <img class="img-responsive" src="images/about_us.jpg" alt="header picture"> <!-- Imagen del carrusel -->
      </div>
      <div class="carousel-caption"> <!-- Contenedor para el texto y subtítulos del carrusel -->
        <h1>ABOUT US</h1> <!-- Título principal del carrusel -->
        <p>About Us and our Services?</p> <!-- Descripción o subtítulo del carrusel -->
        <hr>
      </div>
    </div>
  </div>
</div>
<!-- End of header -->

  <!-- Contenedor principal -->
  <div class="container">
    <!-- Fila principal que contiene dos columnas -->
    <div class="row">
      <!-- Primera columna: Información sobre el estudio -->
      <div class="col-xs-12 col-sm-6">
        <div class="box-about">
          <!-- Icono representativo del estudio -->
          <i class="fa fa-institution fa-2x"></i>
          <h4>About Our Studio</h4>
          <p class="text-left text-muted">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Tempora ea ratione vel nisi, qui perferendis nulla, fugit aut, beatae, tempore modi. Minus sequi iste, nam nobis, excepturi.
            Ut enim ad enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure.
          </p>
        </div>
      </div>
      <!-- Segunda columna: Información sobre el equipo -->
      <div class="col-xs-12 col-sm-6">
        <div class="box-about">
          <!-- Icono representativo del equipo -->
          <i class="fa fa-group fa-2x"></i>
          <h4>About Our Team</h4>
          <p class="text-left text-muted">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Tempora ea ratione vel nisi, qui perferendis nulla, fugit aut, beatae, tempore modi. Minus sequi iste, nam nobis, excepturi.
            Ut enim ad enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure.
          </p>
        </div>
      </div>
    </div>

    <!-- Fila para mostrar servicios y habilidades -->
    <div class="row">
      <!-- Columna para los servicios -->
      <div class="col-xs-12 col-sm-6 row">
        <ul class="list-inline text-center">
          <!-- Línea decorativa antes del título -->
          <li class="line"></li>
          <!-- Icono representativo de los servicios -->
          <li><i class="fa fa-tasks fa-2x"></i></li>
          <li class="line"></li>
          <!-- Título de los servicios -->
          <li>
            <h4>Our Services</h4>
          </li>
          <li class="line"></li>
        </ul>
        <!-- Descripción de los servicios -->
        <p class="text-muted text-center">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
          Tempora ea ratione vel nisi, qui perferendis nulla, fugit aut, beatae, tempore modi.
        </p>
      </div>

      <!-- Columna para mostrar habilidades con barras de progreso -->
      <div class="col-xs-12 col-sm-6">
        <!-- Habilidad 1: Photoshop -->
        <p class="text-muted"><strong>PHOTOSHOP</strong> <span class="pull-right">80%</span></p>
        <div class="progress">
          <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%;"></div>
        </div>

        <!-- Habilidad 2: Fotografía -->
        <p class="text-muted"><strong>SHOOTING PHOTO</strong><span class="pull-right">95%</span></p>
        <div class="progress">
          <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width:95%;"></div>
        </div>

        <!-- Habilidad 3: Formación -->
        <p class="text-muted"><strong>FORMATION</strong><span class="pull-right">90%</span></p>
        <div class="progress">
          <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%;"></div>
        </div>
      </div>
    </div>

    <!-- Tablas de precios para formación -->
    <div class="row pricing text-center">
      <h3>FORMATION PRICING TABLES</h3>
      <hr>

      <!-- Tabla de precios para principiantes -->
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
          <!-- Botón de inscripción -->
          <a href="#" class="btn btn-lg sr-button">SIGN UP</a>
        </div>
      </div>

      <!-- Tabla de precios para intermedios -->
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
          <!-- Botón de inscripción -->
          <a href="#" class="btn btn-lg sr-button">SIGN UP</a>
        </div>
      </div>

      <!-- Tabla de precios para profesionales -->
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
          <!-- Botón de inscripción -->
          <a href="#" class="btn btn-lg sr-button">SIGN UP</a>
        </div>
      </div>
    </div>

    <!-- Sección de comentarios de clientes -->
    <div class="row feedback text-center">
      <h3>CLIENTS FEEDBACK</h3>
      <hr>

      <!-- Comentario del primer cliente -->
      <div class="col-xs-12 col-sm-3">
        <!-- Imagen del cliente -->
        <img class="img-responsive" src="images/clients/client1.jpg" alt="client's picture">
        <!-- Nombre del cliente y su comentario -->
        <h5>MISS BELLA</h5>
        <q>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</q>
      </div>

      <!-- Comentario del segundo cliente -->
      <div class="col-xs-12 col-sm-3">
        <!-- Imagen del cliente -->
        <img class="img-responsive" src="images/clients/client2.jpg" alt="client's picture">
        <!-- Nombre del cliente y su comentario -->
        <h5>DON PENO</h5>
        <q>Tempora ea ratione vel nisi, qui perferendis nulla, fugit aut, beatae, tempore modi.</q>
      </div>

      <!-- Comentario del tercer cliente -->
      <div class="col-xs-12 col-sm-3">
        <!-- Imagen del cliente -->
        <img class="img-responsive" src="images/clients/client3.jpg" alt="client's picture">
        <!-- Nombre del cliente y su comentario -->
        <h5>SWEETY</h5>
        <q>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</q>
      </div>

      <!-- Comentario del cuarto cliente -->
      <div class="col-xs-12 col-sm-3">
        <!-- Imagen del cliente -->
        <img class="img-responsive" src="images/clients/client4.jpg" alt="client's picture">
        <!-- Nombre del cliente y su comentario -->
        <h5>LADY</h5>
        <q>Tempora ea ratione vel nisi, qui perferendis nulla, fugit aut, beatae, tempore modi.</q>
      </div>
    </div>

    <!-- Fin de la sección de comentarios de clientes -->
  </div>
  <!-- End of container Box -->
</div>
<!-- End of principal content -->

<!-- Footer -->
<footer>
  <!-- Contenedor principal que centra el contenido y aplica un estilo de texto atenuado -->
  <div class="container text-muted text-center">
    
    <!-- Lista de botones sociales, con iconos de redes sociales -->
    <ul class="list-inline social-buttons">
      <!-- Enlace a Facebook -->
      <li>
        <a href="#">
          <i class="fa fa-facebook sr-icons"></i> <!-- Icono de Facebook -->
        </a>
      </li>
      <!-- Enlace a Twitter -->
      <li>
        <a href="#">
          <i class="fa fa-twitter sr-icons"></i> <!-- Icono de Twitter -->
        </a>
      </li>
      <!-- Enlace a Google Plus (aunque Google Plus ya no está activo, se deja como ejemplo) -->
      <li>
        <a href="#">
          <i class="fa fa-google-plus sr-icons"></i> <!-- Icono de Google Plus -->
        </a>
      </li>
    </ul>

    <!-- Lista con información de contacto -->
    <ul class="list-inline">
      <!-- Número de teléfono con icono correspondiente -->
      <li class="footer-number">
        <i class="fa fa-phone sr-icons"></i> (00228)92229954 
      </li>
      <!-- Correo electrónico con icono correspondiente -->
      <li>
        <i class="fa fa-envelope sr-icons"></i> kouvenceslas93@gmail.com
      </li>
    </ul>

    <!-- Texto de derechos de autor -->
    <p>Photography Fanatic Template &copy; 2017</p>
  </div>
</footer>

<?php
include __DIR__ . '/partials/fin-doc.part.php';
?>