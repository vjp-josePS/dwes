<?php 
// Incluye la cabecera del documento HTML
include __DIR__ . '/partials/inicio-doc.part.php' ?>

<?php 
// Incluye la barra de navegación
include __DIR__ . '/partials/nav.part.php' ?>

<!-- Principal Content Start -->
<div id="blog">
  <div class="container">
    <div class="row">
      <!-- Sección principal con los posts del blog -->
      <div class="col-xs-12 col-sm-8 row">
        <!-- Primer post del blog -->
        <div class="col-xs-12 col-sm-12">
          <div class="post">
            <!-- Cabecera del post con fecha e imagen -->
            <div class="post-heading">
              <span>6 JANUARY</span>
              <img class="img-responsive" src="../images/blog/landscape.jpg" alt="post's picture">
            </div>
            <!-- Contenido del post -->
            <div class="post-body">
              <h3><a href="single_post.html"><strong>doloremque illum</strong></a></h3>
              <hr>
              <p>Duis ultrices tortor non felis convallis bibendum. Maecenas diam velit, sollicitudin at imperdiet ac, consectetur non nibh. Etiam eget dapibus nulla.
              </p>
            </div>
            <!-- Pie del post con botones de acción -->
            <div class="post-footer">
              <a class="btn" href="single_post.html">READ MORE...</a>
              <span>
                <i class="fa fa-heart sr-icons"></i> 10
                <i class="fa fa-comments sr-icons"></i> 10
              </span>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12">
          <div class="post">
            <div class="post-heading">
              <span>7 FEBRUARY</span>
              <img class="img-responsive" src="../images/blog/family.jpg" alt="post's picture">
            </div>
            <div class="post-body">
              <h3><a href="single_post.html"><strong>Lorem ipsum</strong></a></h3>
              <hr>
              <p>Nunc sit amet dapibus est, sit amet varius risus. Donec luctus lacinia mauris, at feugiat ligula facilisis ac. Class aptent taciti sociosqu ad litora torquent per conubia.
              </p>
            </div>
            <div class="post-footer">
              <a class="btn" href="single_post.html">READ MORE...</a>
              <span>
                <i class="fa fa-heart sr-icons"></i> 10
                <i class="fa fa-comments sr-icons"></i> 10
              </span>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12">
          <div class="post">
            <div class="post-heading">
              <span>8 MARCH</span>
              <img class="img-responsive" src="../images/blog/elephant.jpg" alt="post's picture">
            </div>
            <div class="post-body">
              <h3><a href="single_post.html"><strong>Aliquam soluta</strong></a></h3>
              <hr>
              <p>In felis ante, aliquet sit amet venenatis at, feugiat sed leo. Fusce pretium, velit in luctus ornare, elit lorem ultrices tortor, sed consectetur orci risus mollis ante.
              </p>
            </div>
            <div class="post-footer">
              <a class="btn" href="single_post.html">READ MORE...</a>
              <span>
                <i class="fa fa-heart sr-icons"></i> 10
                <i class="fa fa-comments sr-icons"></i> 10
              </span>
            </div>
          </div>
        </div>
        <!-- Sistema de paginación -->
        <nav class="text-left">
          <ul class="pagination">
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#" aria-label="siguiente">
                <span aria-hidden="true">&raquo;</span>
              </a></li>
          </ul>
        </nav>
      </div>
      <!-- Fin de la sección de posts -->

      <!-- Barra lateral -->
      <div class="col-xs-12 col-sm-4">
        <!-- Formulario de búsqueda -->
        <form class="form-horizontal">
          <div class="input-group">
            <input class="form-control" type="text" placeholder="Research">
            <span class="input-group-btn">
              <a href="" class="btn"><i class="fa fa-search"></i></a>
            </span>
          </div>
        </form>

        <!-- Panel de categorías -->
        <div class="panel">
          <div class="panel-heading">
            <h4>Categories</h4>
          </div>
          <div class="panel-body">
            <ul class="nav">
              <li><a href="#">Category I</a></li>
              <li><a href="#">Category II</a></li>
              <li><a href="#">Category III</a></li>
              <li><a href="#">Category IV</a></li>
              <li class="last"><a href="#">Category V</a></li>
            </ul>
          </div>
        </div>

        <!-- Sección de posts recientes -->
        <h3>Recent Posts</h3>
        <hr>
        <!-- Posts recientes con miniaturas -->
        <div class="post">
          <div class="post-heading">
            <span>10 APRIL</span>
            <img class="img-responsive" src="../images/blog/wedding.jpg" alt="post's picture">
          </div>
          <div class="post-body">
            <span>
              <i class="fa fa-heart sr-icons"></i> 10
              <i class="fa fa-comments sr-icons"></i> 10
            </span>
            <h4 class="text-left"><a href="single_post.html"><strong>Aliquam soluta</strong></a></h4>
          </div>
        </div>
        <div class="post">
          <div class="post-heading">
            <span>12 MAY</span>
            <img class="img-responsive" src="../images/blog/woman.jpg" alt="post's picture">
          </div>
          <div class="post-body">
            <span>
              <i class="fa fa-heart sr-icons"></i> 10
              <i class="fa fa-comments sr-icons"></i> 10
            </span>
            <h4 class="text-left"><a href="single_post.html"><strong>Consequuntur</strong></a></h4>
          </div>
        </div>
      </div>
      <!-- Fin de la barra lateral -->
    </div>
  </div>
</div>

<!-- Pie de página -->
<footer>
  <div class="container text-muted text-center">
    <!-- Botones de redes sociales -->
    <ul class="list-inline social-buttons">
      <li><a href="#"><i class="fa fa-facebook sr-icons"></i></a></li>
      <li><a href="#"><i class="fa fa-twitter sr-icons"></i></a></li>
      <li><a href="#"><i class="fa fa-google-plus sr-icons"></i></a></li>
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
// Incluye el pie del documento HTML
include __DIR__ . '/partials/fin-doc.part.php' ?>