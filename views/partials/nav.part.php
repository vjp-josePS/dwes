<!-- Navegación Bar -->
<nav class="navbar navbar-fixed-top navbar-default">
    <!-- Contenedor principal que agrupa los elementos de la barra de navegación -->
    <div class="container">
        <!-- Cabecera de la barra de navegación -->
        <div class="navbar-header">
            <!-- Botón para alternar la navegación en dispositivos móviles -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                <!-- Texto alternativo para accesibilidad -->
                <span class="sr-only">Toggle navigation</span>
                <!-- Iconos que forman el botón de menú -->
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Enlace a la página principal -->
            <a class="navbar-brand page-scroll" href="#page-top">
                <span>[PHOTO]</span>
            </a>
        </div>
        <!-- Menú colapsable que se muestra en pantallas más grandes -->
        <div class="collapse navbar-collapse navbar-right" id="menu">
            <!-- Lista de elementos del menú -->
            <ul class="nav navbar-nav">
                <!-- Elemento del menú: Home -->
                <li class="<?php if (esOpcionMenuActiva('/index.php')) echo 'active' ?> lien">
                    <a href="index.php"><i class="fa fa-home sr-icons"></i> Home</a>
                </li>
                <!-- Elemento del menú: About -->
                <li class="<?php if (esOpcionMenuActiva('/about.php')) echo 'active' ?> lien">
                    <a href="about.php"><i class="fa fa-bookmark sr-icons"></i> About</a>
                </li>
                <!-- Elemento del menú: Blog -->
                <li class="<?php if (existeOpcionMenuActivaArray('/blog.php','/single_post.php')) echo 'active' ?> lien">
                    <a href="blog.php"><i class="fa fa-file-text sr-icons"></i> Blog</a>
                </li>
                <!-- Elemento del menú: Contact -->
                <li class="<?php if (esOpcionMenuActiva('/contact.php')) echo 'active' ?> lien">
                    <a href="contact.php"><i class="fa fa-phone-square sr-icons"></i> Contact</a>
                </li>
                <!-- Elemento del menú: Gallery -->
                <li class="<?php if (esOpcionMenuActiva('/gallery.php')) echo 'active' ?> lien">
                    <a href="gallery.php"><i class="fa fa-image sr-icons"></i> Gallery</a>
                </li>
                <!-- Elemento del menú: Asociates -->
                <li class="<?php if (esOpcionMenuActiva('/asociados.php')) echo 'active' ?> lien">
                    <a href="asociados.php"><i class="fa fa-hand-o-right sr-icons"></i> Asociates</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Fin de la Barra de Navegación -->