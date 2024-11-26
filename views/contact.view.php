<?php
// Incluye el archivo de inicio del documento
include __DIR__ . '/partials/inicio-doc.part.php';
// Incluye el archivo de navegación
include __DIR__ . '/partials/nav.part.php';
?>

<!-- Inicio del contenido principal -->
<div id="contact">
	<div class="container">
		<!-- Sección de contacto centrada -->
		<div class="col-xs-12 col-sm-8 col-sm-push-2">
			<h1>CONTACT US</h1>
			<hr>
			<p>Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>

			<?php
			// Verifica si el método de solicitud es POST
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				// Inicializa un array para almacenar errores
				$errores = [];

				// Valida el campo "nombre"
				if (empty($_POST["nombre"])) {
					$errores['nombre'] = "El campo First Name no puede estar vacío";
				}

				// Valida el campo "email"
				if (empty($_POST["email"])) {
					$errores['email'] = "El campo Email no puede estar vacío";
				} else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
					$errores['email'] = "Formato de email no válido";
				}

				// Valida el campo "asunto"
				if (empty($_POST["asunto"])) {
					$errores['asunto'] = "El campo Subject no puede estar vacío";
				}

				// Si no hay errores, muestra los datos ingresados
				if (empty($errores)) {
					echo '<div class="alert alert-info">';
					echo "<p style='color: green;'>First name: " . htmlspecialchars($_POST["nombre"]) . "</p>";
					echo "<p style='color: green;'>Last name: " . htmlspecialchars($_POST["apellidos"]) . "</p>";
					echo "<p style='color: green;'>Email: " . htmlspecialchars($_POST["email"]) . "</p>";
					echo "<p style='color: green;'>Subject: " . htmlspecialchars($_POST["asunto"]) . "</p>";
					echo "<p style='color: green;'>Message: " . htmlspecialchars($_POST["texto"]) . "</p>";
					echo '</div>';
				} else {
					// Si hay errores, muestra un mensaje de error
					echo '<div class="alert alert-danger">';
					echo "<ul>";
					foreach ($errores as $error => $mensaje) {
						echo "<li style='color: red;'>$mensaje</li>";
					}
					echo "</ul>";
					echo "</div>";
				}
			}
			?>
			<!-- Formulario de contacto -->
			<form class="form-horizontal" method="post">
				<div class="form-group">
					<div class="col-xs-6">
						<label class="label-control">First Name</label>
						<input class="form-control" type="text" name="nombre">
					</div>
					<div class="col-xs-6">
						<label class="label-control">Last Name</label>
						<input class="form-control" type="text" name="apellidos">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control">Email</label>
						<input class="form-control" type="text" name="email">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control">Subject</label>
						<input class="form-control" type="text" name="asunto">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control">Message</label>
						<textarea class="form-control" name="texto"></textarea>
						<button type="submit" class="pull-right btn btn-lg sr-button">SEND</button>
					</div>
				</div>
			</form>
			<hr class="divider">
			<!-- Información de contacto adicional -->
			<div class="address">
				<h3>GET IN TOUCH</h3>
				<hr>
				<p>Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero.</p>
				<div class="ending text-center">
				 <!-- Botones sociales -->
				 <ul class="list-inline social-buttons">
					 <li><a href="#"><i class="fa fa-facebook sr-icons"></i></a></li>
					 <li><a href="#"><i class="fa fa-twitter sr-icons"></i></a></li>
					 <li><a href="#"><i class="fa fa-google-plus sr-icons"></i></a></li>
				 </ul>
				 <!-- Información de contacto -->
				 <ul class="list-inline contact">
					 <li class="footer-number"><i class="fa fa-phone sr-icons"></i> (00228)92229954 </li>
					 <li><i class="fa fa-envelope sr-icons"></i> kouvenceslas93@gmail.com</li>
				 </ul>
				 <p>Photography Fanatic Template &copy; 2017</p>
			 </div>
		 </div>
	  </div>
   </div>
</div>
<!-- Fin del contenido principal -->

<?php
// Incluye el archivo de cierre del documento
include __DIR__ . '/partials/fin-doc.part.php';
?>