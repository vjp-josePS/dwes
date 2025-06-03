<?php 
// Incluye la cabecera del documento HTML
include __DIR__ . '/partials/inicio-doc.part.php' ?>

<?php 
// Incluye la barra de navegación
include __DIR__ . '/partials/nav.part.php' ?>

<!-- Principal Content Start -->
<div id="contact">
    <div class="container">
        <div class="col-xs-12 col-sm-8 col-sm-push-2">
            <!-- Título y descripción de la página de contacto -->
            <h1>CONTACT US</h1>
            <hr>
            <p>Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>

            <!-- Sistema de mensajes de error -->
            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <!-- Sistema de mensajes de éxito -->
            <?php if (!empty($successMessage)): ?>
                <div class="alert alert-info">
                    <?= $successMessage ?>
                </div>
            <?php endif; ?>

            <!-- Formulario de contacto -->
            <form class="form-horizontal" method="post" action="">
                <!-- Campos de nombre y apellido -->
                <div class="form-group">
                    <div class="col-xs-6">
                        <label class="label-control">First Name</label>
                        <input class="form-control" type="text" name="firstName" 
                               value="<?= htmlspecialchars($firstName) ?>">
                    </div>
                    <div class="col-xs-6">
                        <label class="label-control">Last Name</label>
                        <input class="form-control" type="text" name="lastName" 
                               value="<?= htmlspecialchars($lastName) ?>">
                    </div>
                </div>
                
                <!-- Campo de email -->
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Email</label>
                        <input class="form-control" type="text" name="email" 
                               value="<?= htmlspecialchars($email) ?>">
                    </div>
                </div>

                <!-- Campo de asunto -->
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Subject</label>
                        <input class="form-control" type="text" name="subject" 
                               value="<?= htmlspecialchars($subject) ?>">
                    </div>
                </div>

                <!-- Campo de mensaje y botón de envío -->
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Message</label>
                        <textarea class="form-control" name="message"><?= htmlspecialchars($message) ?></textarea>
                        <button type="submit" class="pull-right btn btn-lg sr-button">SEND</button>
                    </div>
                </div>
            </form>

            <!-- Sección de información de contacto -->
            <hr class="divider">
            <div class="address">
                <h3>GET IN TOUCH</h3>
                <hr>
                <p>Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero.</p>
                
                <!-- Sección de redes sociales y contacto -->
                <div class="ending text-center">
                    <!-- Botones de redes sociales -->
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-facebook sr-icons"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter sr-icons"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus sr-icons"></i></a></li>
                    </ul>
                    
                    <!-- Información de contacto directa -->
                    <ul class="list-inline contact">
                        <li class="footer-number"><i class="fa fa-phone sr-icons"></i> (00228)92229954</li>
                        <li><i class="fa fa-envelope sr-icons"></i> kouvenceslas93@gmail.com</li>
                    </ul>
                    
                    <!-- Copyright -->
                    <p>Photography Fanatic Template &copy; 2017</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
// Incluye el pie del documento HTML
include __DIR__ . '/partials/fin-doc.part.php' ?>