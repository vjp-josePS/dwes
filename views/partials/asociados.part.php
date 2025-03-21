<div class="asociados-section">
    <?php foreach ($asociadosMostrar as $asociado): ?>
        <div class="asociado">
            <img src="images/index/<?php echo $asociado->getLogo(); ?>" 
                 alt="<?php echo htmlspecialchars($asociado->getDescripcion()); ?>" 
                 title="<?php echo htmlspecialchars($asociado->getDescripcion()); ?>">
            <p><?php echo htmlspecialchars($asociado->getNombre()); ?></p>
        </div>
    <?php endforeach; ?>
</div>
