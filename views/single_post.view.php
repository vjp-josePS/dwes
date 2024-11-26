<?php
// incluimos el archivo de inicio
include __DIR__ . '/partials/inicio-doc.part.php';

// incluimos el archivo de navegación
include __DIR__ . '/partials/nav.part.php';
?>

<!-- Principal Content Start -->
<div id="single">
  <div class="container">

    <!-- Full Article -->
    <div class="row"> <!-- Contenedor principal que utiliza la clase 'row' para el diseño de columnas -->
      <h2>Post Title</h2> <!-- Título del artículo -->
      <hr class="subtitle"> <!-- Línea horizontal que actúa como separador del título y el contenido -->

      <div class="block1"> <!-- División que contiene el contenido principal del artículo -->
        <div class="col-xs-12 col-sm-9"> <!-- Columna principal que ocupa 12 espacios en pantallas extra pequeñas y 9 en pantallas pequeñas -->
          <p>Nam luctus nunc ut orci posuere ultricies. Donec id ante nec nunc laoreet vestibulum. Nulla in tortor non risus pharetra suscipit. Suspendisse nec diam gravida, scelerisque magna eget, dignissim enim. Sed eget diam facilisis justo elementum aliquet quis ut felis. Vestibulum suscipit nibh consectetur massa volutpat, vel euismod lectus blandit.</p>
          <!-- Primer párrafo del contenido del artículo -->

          <p>Minima, earum fuga maiores unde quod quae aspernatur magnam quis adipisci ipsum maxime iusto quidem? Recusandae dolore ipsam eius alias quidem. Dignissimos, recusandae, saepe, omnis, non totam vero unde mollitia natus aliquam magni qui quibusdam incidunt ea nihil error facere ut libero blanditiis accusamus quasi facilis animi repellat consequuntur in sit rerum atque voluptatibus ipsa ullam voluptatum laborum praesentium nesciunt est iusto nulla earum ab tenetur!</p>
          <!-- Segundo párrafo del contenido del artículo -->

          <p>Aliquam elementum varius adipiscing. Phasellus vulputate arcu eu scelerisque egestas. Duis lacinia, tellus sed congue porta, tortor felis ornare mi, in eleifend dolor odio ac lacus. Curabitur id nisi ornare, viverra lorem sed, viverra ligula. Donec eu nibh tempus, semper velit sit amet, blandit odio. Phasellus id condimentum sapien, sit amet venenatis sem.</p>
          <!-- Tercer párrafo del contenido del artículo -->

          <p>Quod soluta corrupti earum officia vel inventore vitae quidem, consequuntur odit impedit, eaque dolorem odio praesentium iusto amet voluptatum distinctio iste dicta maiores doloremque porro. Ipsa doloremque illum animi laborum quo in nemo delectus veritatis, amet numquam doloribus a iure sequi nobis vero facere necessitatibus ipsam.</p>
          <!-- Cuarto párrafo del contenido del artículo -->

          <h4>- By Facere</h4> <!-- Autor del artículo -->
          <hr> <!-- Línea horizontal que actúa como separador entre el contenido y la información adicional -->

          <ul class="list-inline"> <!-- Lista en línea para mostrar información adicional -->
            <li>6 December |</li> <!-- Fecha de publicación -->
            <li><a class="page-scroll" href="#form">COMMENT</a> |</li> <!-- Enlace para comentar que se desplaza a la sección de comentarios -->
            <li><a href="">LIKE</a></li> <!-- Enlace para dar "me gusta" al artículo -->
          </ul>
        </div>

        <div class="col-xs-12 col-sm-3"> <!-- Columna lateral que ocupa 12 espacios en pantallas extra pequeñas y 3 en pantallas pequeñas -->
          <h4>Recent Post</h4> <!-- Título de la sección de publicaciones recientes -->
          <hr class="subtitle1"> <!-- Línea horizontal que actúa como separador de esta sección -->

          <div class="new new1"> <!-- Contenedor para una publicación reciente -->
            <hr> <!-- Línea horizontal separadora -->
            <a href="">Aliquam soluta</a> <!-- Título de la publicación reciente con enlace -->
            <h5> By <span>Quae</span></h5> <!-- Autor de la publicación reciente -->
            <p>10 April</p><i class="fa fa-clock-o sr-icons"></i> 8:00 AM
            <!-- Fecha y hora de la publicación reciente -->
            <hr> <!-- Línea horizontal separadora -->
          </div>

          <div class="new"> <!-- Contenedor para otra publicación reciente -->
            <hr> <!-- Línea horizontal separadora -->
            <a href="">Consequuntur</a> <!-- Título de la publicación reciente con enlace -->
            <h5> By <span>Omnis</span></h5> <!-- Autor de la publicación reciente -->
            <p>12 May</p><i class="fa fa-clock-o sr-icons"></i> 4:00 PM
            <!-- Fecha y hora de la publicación reciente -->
            <hr> <!-- Línea horizontal separadora -->
          </div>
        </div>
      </div>
    </div>
    <!-- End of Full Article -->

    <!-- Inicio de la sección de comentarios -->
    <div class="row"> <!-- Contenedor principal que utiliza Bootstrap para diseño responsivo -->

      <!-- Contenedor para el primer comentario -->
      <div class="col-xs-12 col-sm-12 block2">
        <div class="comment"> <!-- División que representa un comentario individual -->
          <h4>Young Papou</h4> <!-- Nombre del autor del comentario -->
          <span> <!-- Contenedor para las estrellas de calificación -->
            <!-- Iconos de estrellas llenas que representan la calificación -->
            <i class="fa fa-star sr-icons"></i>
            <i class="fa fa-star sr-icons"></i>
            <i class="fa fa-star sr-icons"></i>
            <i class="fa fa-star sr-icons"></i>
            <i class="fa fa-star sr-icons"></i>
          </span>
          <p class="time">9:00 AM</p> <!-- Hora en que se publicó el comentario -->
          <hr> <!-- Línea horizontal para separar el encabezado del texto del comentario -->
          <p>Perferendis recusandae consequuntur quasi, non culpa. Minus porro officiis veniam facilis praesentium expedita doloribus, recusandae aut dolore autem...</p> <!-- Texto del comentario -->
        </div>

        <!-- Contenedor para el segundo comentario -->
        <div class="comment alt-comment">
          <h4>Tom Junky</h4> <!-- Nombre del autor del comentario -->
          <span> <!-- Contenedor para las estrellas de calificación -->
            <!-- Cuatro estrellas llenas y una estrella vacía que representan la calificación -->
            <i class="fa fa-star sr-icons"></i>
            <i class="fa fa-star sr-icons"></i>
            <i class="fa fa-star sr-icons"></i>
            <i class="fa fa-star sr-icons"></i>
            <i class="fa fa-star-o sr-icons"></i>
          </span>
          <p class="time">5:00 AM</p> <!-- Hora en que se publicó el comentario -->
          <hr> <!-- Línea horizontal para separar el encabezado del texto del comentario -->
          <p>In felis ante, aliquet sit amet venenatis at, feugiat sed leo. Fusce pretium, velit in luctus ornare...</p> <!-- Texto del comentario -->
        </div>

        <!-- Contenedor para el tercer comentario -->
        <div class="comment">
          <h4>John Dark</h4> <!-- Nombre del autor del comentario -->
          <span> <!-- Contenedor para las estrellas de calificación -->
            <!-- Tres estrellas llenas y dos estrellas vacías que representan la calificación -->
            <i class="fa fa-star sr-icons"></i>
            <i class="fa fa-star sr-icons"></i>
            <i class="fa fa-star sr-icons"></i>
            <i class="fa fa-star-o sr-icons"></i>
            <i class="fa fa-star-o sr-icons"></i>
          </span>
          <p class="time">9:00 AM</p> <!-- Hora en que se publicó el comentario -->
          <hr> <!-- Línea horizontal para separar el encabezado del texto del comentario -->
          <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos...</p> <!-- Texto del comentario -->
        </div>

        <!-- Línea horizontal separadora entre los comentarios y el formulario -->
        <hr class="line">

        <!-- Contenedor para el formulario de envío de comentarios -->
        <div id="form" class="col-xs-12 col-sm-6 col-sm-push-3">
          <form class="form-horizontal"> <!-- Formulario con diseño horizontal utilizando Bootstrap -->

            <!-- Grupo de campos para nombre y correo electrónico -->
            <div class="form-group">
              <div class="col-xs-12 col-sm-6">
                <label class="label-control">Name</label> <!-- Etiqueta para el campo de nombre -->
                <input type="text" class="form-control"> <!-- Campo de entrada para el nombre -->
              </div>
              <div class="col-xs-12 col-sm-6">
                <label class="label-control">Email</label> <!-- Etiqueta para el campo de correo electrónico -->
                <input type="text" class="form-control"> <!-- Campo de entrada para el correo electrónico -->
              </div>
            </div>

            <!-- Grupo de campo para escribir un comentario -->
            <div class="form-group">
              <div class="col-xs-12">
                <label class="label-control">Type Your Comment</label> <!-- Etiqueta para el campo de comentarios -->
                <textarea class="form-control"></textarea> <!-- Área de texto para escribir un comentario -->
                <a href="" class="btn btn-lg btn-info sr-button">SEND</a> <!-- Botón para enviar el comentario (enlace simulado) -->
              </div>
            </div>

          </form>
        </div>
      </div>

    </div>
    <!-- Fin de la sección de comentarios -->
  </div>
</div>
<!-- End of Principal Content Start -->

<!-- Footer -->
<footer>
  <!-- Contenedor principal del pie de página -->
  <div class="container text-muted text-center">
    <!-- Lista de botones de redes sociales -->
    <ul class="list-inline social-buttons">
      <!-- Botón de Facebook -->
      <li>
        <a href="#">
          <i class="fa fa-facebook sr-icons"></i> <!-- Icono de Facebook -->
        </a>
      </li>
      <!-- Botón de Twitter -->
      <li>
        <a href="#">
          <i class="fa fa-twitter sr-icons"></i> <!-- Icono de Twitter -->
        </a>
      </li>
      <!-- Botón de Google Plus (Nota: Google Plus ha sido cerrado) -->
      <li>
        <a href="#">
          <i class="fa fa-google-plus sr-icons"></i> <!-- Icono de Google Plus -->
        </a>
      </li>
    </ul>
    <!-- Lista con información de contacto -->
    <ul class="list-inline">
      <!-- Número de teléfono -->
      <li class="footer-number">
        <i class="fa fa-phone sr-icons"></i> (00228)92229954 <!-- Icono de teléfono seguido del número -->
      </li>
      <!-- Correo electrónico -->
      <li>
        <i class="fa fa-envelope sr-icons"></i> kouvenceslas93@gmail.com <!-- Icono de correo electrónico seguido del email -->
      </li>
    </ul>
    <!-- Mensaje de derechos de autor -->
    <p>Photography Fanatic Template &copy; 2017</p> <!-- Indica que este es un template para fotografía y el año de copyright -->
  </div>
</footer>

<!-- Inclusión del archivo PHP que contiene el cierre del documento -->
<?php
include __DIR__ . '/partials/fin-doc.part.php'; // Incluye el archivo fin-doc.part.php desde la carpeta partials
?>