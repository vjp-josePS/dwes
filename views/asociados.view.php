<?php include __DIR__ . '/partials/inicio-doc.part.php' ?>
<?php include __DIR__ . '/partials/nav.part.php' ?>

<div id="asociados">
    <div class="container">
        <div class="col-xs-12 col-sm-8 col-sm-push-2">
            <h1>GESTIÓN DE ASOCIADOS</h1>
            <hr>
            
            <?php if (!empty($errores)): ?>
                <div class="alert alert-danger">
                    <?php foreach ($errores as $error): ?>
                        <p><?= $error ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if ($mensaje): ?>
                <div class="alert alert-success">
                    <?= $mensaje ?>
                </div>
            <?php endif; ?>

            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF'] ?>">
    <div class="form-group">
        <div class="col-xs-12">
            <label class="label-control">Nombre</label>
            <input class="form-control" type="text" name="nombre" value="<?= isset($nombre) ? htmlspecialchars($nombre) : '' ?>" required>
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-12">
            <label class="label-control">Logo</label>
            <input class="form-control-file" type="file" name="logo" required>
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-12">
            <label class="label-control">Descripción</label>
            <textarea class="form-control" name="descripcion" required><?= isset($descripcion) ? htmlspecialchars($descripcion) : '' ?></textarea>
            <button class="pull-right btn btn-lg sr-button" type="submit">ENVIAR</button>
        </div>
    </div>
</form>


            <hr class="divider">

            <h3>Listado de Asociados</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Logo</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($asociados as $asociado): ?>
                        <tr>
                            <td>
                                <img src="<?= $asociado->getLogo() ?>" 
                                     alt="<?= $asociado->getNombre() ?>" 
                                     style="max-height: 50px;">
                            </td>
                            <td><?= $asociado->getNombre() ?></td>
                            <td><?= $asociado->getDescripcion() ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include __DIR__ . '/partials/fin-doc.part.php' ?>
