<div id="category<?= $categoriaId ?>" class="tab-pane <?= $esActiva ? 'active' : '' ?>">
    <div class="row popup-gallery">
        <?php foreach ($imagenes as $imagen): ?>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="sol">
                    <img class="img-responsive" 
                         src="<?= $imagen->getUrlPortfolio() ?>" 
                         alt="<?= htmlspecialchars($imagen->getDescripcion()) ?>">
                    <div class="behind">
                        <div class="head text-center">
                            <ul class="list-inline">
                                <li>
                                    <a class="gallery" 
                                       href="<?= $imagen->getUrlGallery() ?>" 
                                       data-toggle="tooltip" 
                                       data-original-title="Vista Rápida">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="tooltip" data-original-title="¿Te gusta? ¡Dale click!">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="tooltip" data-original-title="Descargar">
                                        <i class="fa fa-download"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="tooltip" data-original-title="Más información">
                                        <i class="fa fa-info"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="row box-content">
                            <ul class="list-inline text-center">
                                <li><i class="fa fa-eye"></i> <?= $imagen->getNumVisualizaciones() ?></li>
                                <li><i class="fa fa-heart"></i> <?= $imagen->getNumLikes() ?></li>
                                <li><i class="fa fa-download"></i> <?= $imagen->getNumDownloads() ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
