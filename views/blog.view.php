<?php
include __DIR__ . '/partials/inicio-doc.part.php';
include __DIR__ . '/partials/nav.part.php';
?>

<!-- Principal Content Start -->
<div id="blog">
  <div class="container">
    <div class="row">

      <!-- Bloques de Publicaciones -->
      <div class="col-xs-12 col-sm-8 row">
        <!-- Contenedor principal para las publicaciones -->

        <div class="col-xs-12 col-sm-12">
          <!-- Cada publicación ocupa toda la columna en dispositivos pequeños y grandes -->

          <div class="post">
            <!-- Contenedor para una publicación individual -->

            <div class="post-heading">
              <!-- Encabezado de la publicación -->
              <span>6 JANUARY</span>
              <!-- Fecha de la publicación -->
              <img class="img-responsive" src="images/blog/landscape.jpg" alt="post's picture">
              <!-- Imagen de la publicación, con clase para respuesta a diferentes tamaños de pantalla -->
            </div>

            <div class="post-body">
              <!-- Cuerpo de la publicación -->
              <h3><a href="single_post.php"><strong>doloremque illum</strong></a></h3>
              <!-- Título de la publicación, enlazado a una página individual -->
              <hr>
              <!-- Línea horizontal para separar el título del contenido -->
              <p>Duis ultrices tortor non felis convallis bibendum. Maecenas diam velit, sollicitudin at imperdiet ac, consectetur non nibh. Etiam eget dapibus nulla.</p>
              <!-- Contenido descriptivo de la publicación -->
            </div>

            <div class="post-footer">
              <!-- Pie de la publicación -->
              <a class="btn" href="single_post.php">READ MORE...</a>
              <!-- Botón que enlaza a la página individual de la publicación -->
              <span>
                <i class="fa fa-heart sr-icons"></i> 10
                <!-- Icono de corazón para "me gusta" con conteo -->
                <i class="fa fa-comments sr-icons"></i> 10
                <!-- Icono de comentarios con conteo -->
              </span>
            </div>
          </div>
        </div>

        <div class="col-xs-12 col-sm-12">
          <!-- Otra publicación similar a la anterior -->

          <div class="post">
            <div class="post-heading">
              <span>7 FEBRUARY</span>
              <img class="img-responsive" src="images/blog/family.jpg" alt="post's picture">
            </div>
            <div class="post-body">
              <h3><a href="single_post.php"><strong>Lorem ipsum</strong></a></h3>
              <hr>
              <p>Nunc sit amet dapibus est, sit amet varius risus. Donec luctus lacinia mauris, at feugiat ligula facilisis ac. Class aptent taciti sociosqu ad litora torquent per conubia.</p>
            </div>
            <div class="post-footer">
              <a class="btn" href="single_post.php">READ MORE...</a>
              <span>
                <i class="fa fa-heart sr-icons"></i> 10
                <i class="fa fa-comments sr-icons"></i> 10
              </span>
            </div>
          </div>
        </div>

        <div class="col-xs-12 col-sm-12">
          <!-- Otra publicación más -->

          <div class="post">
            <div class="post-heading">
              <span>8 MARCH</span>
              <img class="img-responsive" src="images/blog/elephant.jpg" alt="post's picture">
            </div>
            <div class="post-body">
              <h3><a href="single_post.php"><strong>Aliquam soluta</strong></a></h3>
              <hr>
              <p>In felis ante, aliquet sit amet venenatis at, feugiat sed leo. Fusce pretium, velit in luctus ornare, elit lorem ultrices tortor, sed consectetur orci risus mollis ante.</p>
            </div>
            <div class="post-footer">
              <a class="btn" href="single_post.php">READ MORE...</a>
              <span>
                <i class="fa fa-heart sr-icons"></i> 10
                <i class="fa fa-comments sr-icons"></i> 10
              </span>
            </div>
          </div>
        </div>

        <!-- Navegación para paginación -->
        <nav class="text-left">
          <ul class="pagination">
            <!-- Lista para los números de página -->
            <li class="active"><a href="#">1</a></li>
            <!-- Página actual resaltada como activa -->
            <li><a href="#">2</a></li>
            <!-- Enlace a la segunda página -->
            <li><a href="#">3</a></li>
            <!-- Enlace a la tercera página -->
            <li><a href="#" aria-label="suivant">
                <span aria-hidden="true">&raquo;</span>
                <!-- Enlace para avanzar a la siguiente página con icono -->
              </a></li>
          </ul>
        </nav>

      </div>
      <!-- Fin del bloque de publicaciones del blog -->

      <!-- Side bar -->
      <div class="col-xs-12 col-sm-4"> <!-- Contenedor principal para la barra lateral, ocupa 12 columnas en pantallas pequeñas y 4 en pantallas medianas -->

        <!-- Formulario de búsqueda -->
        <form class="form-horizontal"> <!-- Formulario con estilo horizontal -->
          <div class="input-group"> <!-- Grupo de entrada para combinar un campo de texto y un botón -->
            <input class="form-control" type="text" placeholder="Research"> <!-- Campo de texto para ingresar la búsqueda -->
            <span class="input-group-btn"> <!-- Contenedor para el botón de búsqueda -->
              <a href="" class="btn"><i class="fa fa-search"></i></a> <!-- Botón con ícono de búsqueda -->
            </span>
          </div>
        </form>

        <!-- Panel de categorías -->
        <div class="panel"> <!-- Panel que agrupa contenido relacionado -->
          <div class="panel-heading"> <!-- Encabezado del panel -->
            <h4>Categories</h4> <!-- Título del panel -->
          </div>
          <div class="panel-body"> <!-- Cuerpo del panel que contiene la lista de categorías -->
            <ul class="nav"> <!-- Lista de navegación para las categorías -->
              <li><a href="#">Category I</a></li> <!-- Enlace a la categoría I -->
              <li><a href="#">Category II</a></li> <!-- Enlace a la categoría II -->
              <li><a href="#">Category III</a></li> <!-- Enlace a la categoría III -->
              <li><a href="#">Category IV</a></li> <!-- Enlace a la categoría IV -->
              <li class="last"><a href="#">Category V</a></li> <!-- Enlace a la categoría V -->
            </ul>
          </div>
        </div>

        <!-- Sección de información adicional -->
        <div class="well"> <!-- Contenedor para destacar el contenido -->
          <h4>Soluta</h4> <!-- Título de la sección -->
          <p>Quod soluta corrupti earum officia vel inventore vitae quidem, consequuntur odit impedit.</p> <!-- Texto descriptivo o informativo -->
        </div>

        <!-- Título para las publicaciones recientes -->
        <h3>Recent Posts</h3>
        <hr>

        <!-- Publicación reciente 1 -->
        <div class="post">
          <div class="post-heading">
            <span>10 APRIL</span> <!-- Fecha de la publicación -->
            <img class="img-responsive" src="images/blog/wedding.jpg" alt="post's picture"> <!-- Imagen representativa de la publicación -->
          </div>
          <div class="post-body">
            <span>
              <i class="fa fa-heart sr-icons"></i> 10 <!-- Icono de corazón con contador de me gustas -->
              <i class="fa fa-comments sr-icons"></i> 10 <!-- Icono de comentarios con contador -->
            </span>
            <h4 class="text-left"><a href="single_post.php"><strong>Aliquam soluta</strong></a></h4> <!-- Título de la publicación con enlace a su contenido completo -->
          </div>
        </div>

        <!-- Publicación reciente 2 -->
        <div class="post">
          <div class="post-heading">
            <span>12 MAY</span> <!-- Fecha de la publicación -->
            <img class="img-responsive" src="images/blog/woman.jpg" alt="post's picture"> <!-- Imagen representativa de la publicación -->
          </div>
          <div class="post-body">
            <span>
              <i class="fa fa-heart sr-icons"></i> 10 <!-- Ícono de corazón con contador de me gustas -->
              <i class="fa fa-comments sr-icons"></i> 10 <!-- Ícono de comentarios con contador -->
            </span>
            <!-- Título de la publicación con enlace a su contenido completo -->
            <h4 class="text-left"><a href="single_post.php"><strong>Consequuntur</strong></a></h4> 
          </div>
        </div>

      </div>
      <!-- End of Side bar -->

    </div>
  </div>
</div>
<!-- End of Principal Content Start -->

<!-- Footer -->
<footer>
  <!-- Contenedor principal del pie de página -->
  <div class="container text-muted text-center">
    <!-- Lista de botones de redes sociales -->
    <ul class="list-inline social-buttons">
      <li>
        <!-- Enlace a Facebook con un ícono -->
        <a href="#">
          <i class="fa fa-facebook sr-icons"></i>
        </a>
      </li>
      <li>
        <!-- Enlace a Twitter con un ícono -->
        <a href="#">
          <i class="fa fa-twitter sr-icons"></i>
        </a>
      </li>
      <li>
        <!-- Enlace a Google Plus con un ícono -->
        <a href="#">
          <i class="fa fa-google-plus sr-icons"></i>
        </a>
      </li>
    </ul>

    <!-- Lista de información de contacto -->
    <ul class="list-inline">
      <li class="footer-number">
        <!-- Icono de teléfono y número de contacto -->
        <i class="fa fa-phone sr-icons"></i> (00228)92229954 
      </li>
      <li>
        <!-- Icono de correo electrónico y dirección de correo -->
        <i class="fa fa-envelope sr-icons"></i> kouvenceslas93@gmail.com
      </li>
    </ul>

    <!-- Mensaje de derechos de autor -->
    <p>Photography Fanatic Template &copy; 2017</p>
  </div>
</footer>

<?php
// Incluir el archivo fin-doc.part.php
include __DIR__ . '/partials/fin-doc.part.php';
?>