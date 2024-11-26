<?php
// Incluye el archivo de inicio del documento
include __DIR__ . '/partials/inicio-doc.part.php';
// Incluye el archivo de navegación
include __DIR__ . '/partials/nav.part.php';
?>

<!-- Inicio del contenido principal -->
<div id="galeria">
    <div class="container">
        <div class="col-xs-12 col-sm-8 col-sm-push-2">
            <h1>GALERIA</h1> <!-- Título de la galería -->
            <hr>

            <!-- Verifica si se ha enviado un formulario -->
            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
                <div class="alert alert-<?= empty($errores) ? 'info' : 'danger'; ?> alert-dismissibre" role="alert">
                    <!-- Botón para cerrar la alerta -->
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                    <?php if (empty($errores)) : ?>
                        <!-- Muestra un mensaje si no hay errores -->
                        <p><?= $mensaje ?></p>
                    <?php else : ?>
                        <!-- Muestra una lista de errores si existen -->
                        <ul>
                            <?php foreach ($errores as $error) : ?>
                                <li><?= $error ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <!-- Formulario para subir imágenes -->
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF'] ?>">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Imagen</label>
                        <!-- Campo para seleccionar un archivo de imagen -->
                        <input class="form-control-file" type="file" name="imagen">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Categoría</label>
                        <!-- Selector para elegir la categoría de la imagen -->
                        <select class="form-control" name="categoria">
                            <?php foreach ($categorias as $categoria) : ?>
                                <option value="<?= $categoria->getId() ?>">
                                    <?= $categoria->getNombre() ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Descripción</label>
                        <!-- Campo de texto para la descripción de la imagen -->
                        <textarea class="form-control" name="descripcion"><?= $descripcion ?></textarea>
                        <!-- Botón para enviar el formulario -->
                        <button class="pull-right btn btn-lg sr-button">ENVIAR</button>
                    </div>
                </div>
            </form>

            <!-- Línea divisoria entre el formulario y la galería -->
            <hr class="divider">

            <!-- Sección donde se muestran las imágenes de la galería -->
            <div class="imagenes_galeria">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th> <!-- Encabezado para ID -->
                            <th scope="col">Imagen</th> <!-- Encabezado para la imagen -->
                            <th scope="col">Categoría</th> <!-- Encabezado para la categoría -->
                            <th scope="col">Visualizaciones</th> <!-- Encabezado para visualizaciones -->
                            <th scope="col">Likes</th> <!-- Encabezado para likes -->
                            <th scope="col">Descargas</th> <!-- Encabezado para descargas -->
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Itera sobre las imágenes y las muestra en una tabla -->
                        <?php foreach ($imagenes as $img): ?>
                            <tr>
                                <th scope="row"><?= $img->getID() ?></th> <!-- Muestra el ID de la imagen -->
                                <td>
                                    <!-- Muestra la imagen con su descripción como atributo alt y title -->
                                    <img src="<?= $img->getUrlGallery() ?>" alt="<?= $img->getDescripcion() ?>" title="<?= $img->getDescripcion() ?>" width="100px">
                                </td>
                                <!-- Muestra el nombre de la categoría correspondiente a la imagen -->
                                <td><?= $categorias[$img->getCategoria() - 1]->getNombre() ?></td>
                                <!-- Muestra el número de visualizaciones, likes y descargas de la imagen -->
                                <td><?= $img->getNumVisualizaciones() ?></td>
                                <td><?= $img->getNumLikes() ?></td>
                                <td><?= $img->getNumDownloads() ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
// Incluye el archivo de cierre del documento
include __DIR__ . '/partials/fin-doc.part.php';
?>