<?php
// Incluye el archivo de inicio del documento
include __DIR__ . '/partials/inicio-doc.part.php';

// Incluye el archivo de navegación
include __DIR__ . '/partials/nav.part.php';
?>

<!-- Principal Content Start -->
<div id="galeria">
    <div class="container">
        <div class="col-xs-12 col-sm-8 col-sm-push-2">
            <h1>ASOCIADOS</h1> <!-- Título principal de la sección -->
            <hr>

            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
                <!-- Verifica si se ha enviado un formulario mediante POST -->
                <div class="alert alert-<?= empty($errores) ? 'info' : 'danger'; ?> alert-dismissibre" role="alert">
                    <!-- Muestra un mensaje de alerta dependiendo de si hay errores -->
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"></span> <!-- Botón para cerrar la alerta -->
                    </button>
                    <?php if (empty($errores)) : ?>
                        <!-- Si no hay errores, muestra el mensaje de éxito -->
                        <p><?= $mensaje ?></p>
                    <?php else : ?>
                        <!-- Si hay errores, muestra una lista con los mismos -->
                        <ul>
                            <?php foreach ($errores as $error) : ?>
                                <li><?= $error ?></li> <!-- Cada error se muestra en un elemento de lista -->
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <!-- Formulario para agregar un nuevo asociado -->
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF'] ?>">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Nombre</label>
                        <input class="form-control" type="text" name="nombre"> <!-- Campo para el nombre del asociado -->
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Logo</label>
                        <input class="form-control-file" type="file" name="imagen"> <!-- Campo para subir un archivo de imagen -->
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Descripción</label>
                        <textarea class="form-control" name="descripcion"><?= $descripcion ?></textarea> <!-- Campo para la descripción del asociado -->
                        <button class="pull-right btn btn-lg sr-button">ENVIAR</button> <!-- Botón para enviar el formulario -->
                    </div>
                </div>
            </form>

            <hr class="divider">

            <!-- Sección que muestra la lista de asociados -->
            <div class="asociados">
                <table class="table"> <!-- Tabla para mostrar los asociados -->
                    <thead>
                        <tr>
                            <th scope="col">#</th> <!-- Encabezado para ID -->
                            <th scope="col">Nombre</th> <!-- Encabezado para Nombre -->
                            <th scope="col">Logo</th> <!-- Encabezado para Logo -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($asociados as $asociado): ?>
                            <!-- Itera sobre cada asociado y muestra sus datos en una fila de la tabla -->
                            <tr>
                                <th scope="row"><?= $asociado->getID() ?></th> <!-- Muestra el ID del asociado -->
                                <td><?= $asociado->getNombre() ?></td> <!-- Muestra el nombre del asociado -->
                                <td>
                                    <img src="<?= $asociado->getUrlLogo() ?>" alt="<?= $asociado->getDescripcion() ?>" title="<?= $asociado->getDescripcion() ?>" width="100px"> 
                                    <!-- Muestra el logo del asociado con atributos alt y title para accesibilidad y SEO -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
// Incluye el archivo de fin del documento
include __DIR__ . '/partials/fin-doc.part.php';
?>