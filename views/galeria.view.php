<?php 
// Incluye el encabezado del documento HTML y la barra de navegación
include __DIR__ . '/partials/inicio-doc.part.php' ?>
<?php include __DIR__ . '/partials/nav.part.php' ?>

<!-- Principal Content Start -->
<div id="galeria">
    <div class="container">
        <div class="col-xs-12 col-sm-8 col-sm-push-2">
            <h1>GALERIA</h1>
            <hr>
            <!-- Sistema de mensajes de error/éxito -->
            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                <!-- Muestra una alerta con estilo diferente según si hay errores o no -->
                <div class="alert alert-<?= empty($errores) ? 'info' : 'danger'; ?> alert-dismissibre" role="alert">
                    <!-- Botón para cerrar la alerta -->
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                    <?php if (empty($errores)) : ?>
                        <!-- Mensaje de éxito -->
                        <p><?= $mensaje ?></p>
                    <?php else: ?>
                        <!-- Lista de errores si los hay -->
                        <ul>
                            <?php foreach ($errores as $error) : ?>
                                <li><?= $error ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <!-- Formulario de subida de imágenes -->
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF'] ?>">
                <!-- Campo para seleccionar imagen -->
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Imagen</label>
                        <input class="form-control-file" type="file" name="imagen">
                    </div>
                </div>

                <!-- Selector de categoría -->
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Categoría</label>
                        <select name="categoria" class="form-control">
                            <?php foreach ($categorias as $categoria): ?>
                                <option value="<?= $categoria->getId() ?>">
                                    <?= $categoria->getNombre() ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <!-- Campo de descripción y botón de envío -->
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Descripción</label>
                        <textarea class="form-control" name="descripcion"><?= $descripcion ?></textarea>
                        <button class="pull-right btn btn-lg sr-button">ENVIAR</button>
                    </div>
                </div>
            </form>

            <hr class="divider">

            <!-- Tabla de imágenes en la galería -->
            <div class="imagenes_galeria">
                <table class="table">
                    <!-- Encabezados de la tabla -->
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Visualizaciones</th>
                            <th scope="col">Likes</th>
                            <th scope="col">Descargas</th>
                        </tr>
                    </thead>
                    <!-- Cuerpo de la tabla con las imágenes -->
                    <tbody>
                        <?php foreach (($imagenes ?? []) as $imagen): ?>
                            <tr>
                                <th scope="row"><?=$imagen->getId()?></th>
                                <td>
                                    <!-- Muestra la imagen con su descripción -->
                                    <img src="<?=$imagen->getUrlGallery() ?>" 
                                         alt="<?=$imagen->getDescripcion() ?>" 
                                         title="<?=$imagen->getDescripcion() ?>" 
                                         class="img-fluid" 
                                         style="max-height:200px;">
                                </td>
                                <!-- Muestra la categoría de la imagen -->
                                <td>
                                    <?=$imagenRepository->getCategoria($imagen)->getNombre() ?>
                                </td>
                                <!-- Estadísticas de la imagen -->
                                <td><?=$imagen->getNumVisualizaciones() ?></td>
                                <td><?=$imagen->getNumLikes() ?></td>
                                <td><?=$imagen->getNumDownloads() ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/partials/fin-doc.part.php' ?>
