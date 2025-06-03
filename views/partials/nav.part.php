<?php
// Determina qué opción del menú está activa basándose en la página actual
// La clase 'active' se usa para resaltar la opción del menú correspondiente
$homeClass = esOpcionMenuActiva('index.php') ? 'active' : '';
$aboutClass = esOpcionMenuActiva('about.php') ? 'active' : '';
// Para el blog, verifica múltiples páginas relacionadas
$blogClass = existeOpcionMenuActivaEnArray(['blog.php', 'single_post.php']) ? 'active' : '';
$contactClass = esOpcionMenuActiva('contact.php') ? 'active' : '';

// Define las URLs para cada sección del sitio
$homeHref = 'index.php';
$aboutHref = 'about.php';
$blogHref = 'blog.php';
$contactHref = 'contact.php';
?>

<!-- Barra de Navegación Principal -->
<nav class="navbar navbar-fixed-top navbar-default">
    <div class="container">
        <!-- Cabecera de la barra de navegación -->
        <div class="navbar-header">
            <!-- Botón hamburguesa para menú móvil -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                <span class="sr-only">Toggle navigation</span>
                <!-- Tres líneas que forman el ícono hamburguesa -->
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Logo o nombre de la marca -->
            <a class="navbar-brand page-scroll" href="#page-top">
                <span>[PHOTO]</span>
            </a>
        </div>

        <!-- Menú de navegación principal -->
        <div class="collapse navbar-collapse navbar-right" id="menu">
            <ul class="nav navbar-nav">
                <!-- Elementos del menú con sus respectivos íconos y estados activos -->
                <!-- Home - Página principal -->
                <li class="lien <?php echo $homeClass; ?>">
                    <a href="<?php echo $homeHref; ?>"><i class="fa fa-home sr-icons"></i> Home</a>
                </li>
                <!-- About - Página de información -->
                <li class="lien <?php echo $aboutClass; ?>">
                    <a href="<?php echo $aboutHref; ?>"><i class="fa fa-bookmark sr-icons"></i> About</a>
                </li>
                <!-- Blog - Sección de artículos -->
                <li class="lien <?php echo $blogClass; ?>">
                    <a href="<?php echo $blogHref; ?>"><i class="fa fa-file-text sr-icons"></i> Blog</a>
                </li>
                <!-- Contact - Página de contacto -->
                <li class="lien <?php echo $contactClass; ?>">
                    <a href="<?php echo $contactHref; ?>"><i class="fa fa-phone-square sr-icons"></i> Contact</a>
                </li>
                <!-- Galería - Sección de imágenes -->
                <li class="lien <?php echo esOpcionMenuActiva('galeria.php') ? 'active' : ''; ?>">
                    <a href="galeria.php"><i class="fa fa-image"></i> Galería</a>
                </li>
                <!-- Asociados - Sección de partners -->
                <li class="lien <?php echo esOpcionMenuActiva('asociados.php') ? 'active' : ''; ?>">
                    <a href="asociados.php"><i class="fa fa-hand-o-right"></i> Asociados</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Fin de la Barra de Navegación -->