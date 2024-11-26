<?php
// Incluye el archivo de inicio
include __DIR__ . '/partials/inicio-doc.part.php';

// Incluye el archivo de navegación.
include __DIR__ . '/partials/nav.part.php';
?>

<!-- Inicio del contenido principal -->
<div id="index">

  <!-- Encabezado -->
  <div class="row">
    <div class="col-xs-12 intro">
      <div class="carousel-inner">
        <!-- Imagen activa del carrusel -->
        <div class="item active">
          <img class="img-responsive" src="images/index/woman.jpg" alt="header picture">
        </div>
        <div class="carousel-caption">
          <h1>FIND NICE PICTURES HERE</h1> <!-- Título principal -->
          <hr> <!-- Línea horizontal -->
        </div>
      </div>
    </div>
  </div>

  <div id="index-body">
    <!-- Tabla de navegación para las imágenes -->
    <div class="table-responsive">
      <table class="table text-center">
        <thead>
          <tr>
            <!-- Enlaces a las diferentes categorías de imágenes -->
            <td><a class="link active" href="#category1" data-toggle="tab">category I</a></td>
            <td><a class="link" href="#category2" data-toggle="tab">category II</a></td>
            <td><a class="link" href="#category3" data-toggle="tab">category III</a></td>
          </tr>
        </thead>
      </table>
      <hr>
    </div>

    <!-- Contenido de la tabla de navegación -->
    <div class="tab-content">

      <!-- Primer categoría de imágenes -->
      <?php
      $idCat = "category1"; // Identificador de la primera categoría
      $catActiva = 'active'; // Clase activa para la primera categoría
      shuffle($arrayImg); // Mezcla el array de imágenes
      include __DIR__ . '/partials/imagegallery.part.php'; // Incluye la galería de imágenes
      ?>
      <!-- Fin de la primera categoría de imágenes -->

      <!-- Segunda categoría de imágenes -->
      <?php
      $idCat = "category2"; // Identificador de la segunda categoría
      $catActiva = ''; // Sin clase activa para la segunda categoría
      shuffle($arrayImg); // Mezcla nuevamente el array de imágenes
      include __DIR__ . '/partials/imagegallery.part.php'; // Incluye la galería de imágenes
      ?>
      <!-- Fin de la segunda categoría de imágenes -->

      <!-- Tercera categoría de imágenes -->
      <?php
      $idCat = "category3"; // Identificador de la tercera categoría
      $catActiva = ''; // Sin clase activa para la tercera categoría
      shuffle($arrayImg); // Mezcla nuevamente el array de imágenes
      include __DIR__ . '/partials/imagegallery.part.php'; // Incluye la galería de imágenes
      ?>
      <!-- Fin de la tercera categoría de imágenes -->

    </div>
    <!-- Fin del contenido de la tabla de navegación -->
  </div><!-- Fin del contenedor principal -->

  <!-- Formulario para el boletín informativo -->
  <div class="index-form text-center">
    <h3>SUSCRIBE TO OUR NEWSLETTER</h3> <!-- Título del formulario -->
    <h5>Subscribe to receive our News and Gifts</h5> <!-- Subtítulo del formulario -->
    <form class="form-horizontal"> <!-- Formulario con diseño horizontal -->
      <div class="form-group">
        <div class="col-xs-12 col-sm-6 col-sm-push-3 col-md-4 col-md-push-4">
          <input class="form-control" type="text" placeholder="Type here your email address"> <!-- Campo para ingresar el correo electrónico -->
          <a href="" class="btn btn-lg sr-button">SUBSCRIBE</a> <!-- Botón para suscribirse -->
        </div>
      </div>
    </form>
  </div>
  <!-- Fin del formulario para el boletín informativo -->

  <!-- Caja con los nombres y logotipos de los socios -->
  <?php
  include __DIR__ . '/partials/asociados.part.php'; // Incluye el archivo que muestra los socios
  ?>
  <!-- Fin de la caja con los nombres y logotipos -->

</div><!-- Fin del contenedor principal -->

<!-- Pie de página -->
<footer class="home-page">
  <div class="container text-muted text-center">
    <div class="row">
      <ul class="nav col-sm-4"> <!-- Lista con información de contacto -->
        <li class="footer-number"><i class="fa fa-phone sr-icons"></i> (00228)92229954 </li>
        <li><i class="fa fa-envelope sr-icons"></i> kouvenceslas93@gmail.com</li>
        <li>Photography Fanatic Template &copy; 2017</li> <!-- Información sobre derechos de autor -->
      </ul>
      <ul class="list-inline social-buttons col-sm-4 col-sm-push-4"> <!-- Lista con botones sociales -->
        <li><a href="#"><i class="fa fa-facebook sr-icons"></i></a></li>
        <li><a href="#"><i class="fa fa-twitter sr-icons"></i></a></li>
        <li><a href="#"><i class="fa fa-google-plus sr-icons"></i></a></li>
      </ul>
    </div>
  </div>
</footer>

<?php
// Incluye el archivo que cierra el documento HTML.
include __DIR__ . '/partials/fin-doc.part.php';
?>