<?php
include __DIR__ . '/partials/inicio-doc.part.php';
include __DIR__ . '/partials/nav.part.php';
?>

<!-- Principal Content Start -->
<div id="contact">
	<div class="container">
		<div class="col-xs-12 col-sm-8 col-sm-push-2">
			<h1>CONTACT US</h1>
			<hr>
			<p>Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>

			<?php
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$errores = [];

				if (empty($_POST["first_name"])) {
					$errores['first_name'] = "El campo First Name no puede estar vacío";
				}

				if (empty($_POST["email"])) {
					$errores['email'] = "El campo Email no puede estar vacío";
				} else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
					$errores['email'] = "Formato de email no válido";
				}

				if (empty($_POST["subject"])) {
					$errores['subject'] = "El campo Subject no puede estar vacío";
				}

				if (empty($errores)) {
					echo '<div class="alert alert-info">';
					echo "<p style='color: green;'>First name: " . $_POST["first_name"] . "</p>";
					echo "<p style='color: green;'>Last name: " . $_POST["last_name"] . "</p>";
					echo "<p style='color: green;'>Email: " . $_POST["email"] . "</p>";
					echo "<p style='color: green;'>Subject: " . $_POST["subject"] . "</p>";
					echo "<p style='color: green;'>Message: " . $_POST["message"] . "</p>";
					echo '</div>';
				} else {
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
			<form class="form-horizontal" method="post">
				<div class="form-group">
					<div class="col-xs-6">
						<label class="label-control">First Name</label>
						<input class="form-control" type="text" name="first_name">
					</div>
					<div class="col-xs-6">
						<label class="label-control">Last Name</label>
						<input class="form-control" type="text" name="last_name">
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
						<input class="form-control" type="text" name="subject">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control">Message</label>
						<textarea class="form-control" name="message"></textarea>
						<button class="pull-right btn btn-lg sr-button">SEND</button>
					</div>
				</div>
			</form>
			<hr class="divider">
			<div class="address">
				<h3>GET IN TOUCH</h3>
				<hr>
				<p>Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero.</p>
				<div class="ending text-center">
					<ul class="list-inline social-buttons">
						<li><a href="#"><i class="fa fa-facebook sr-icons"></i></a>
						</li>
						<li><a href="#"><i class="fa fa-twitter sr-icons"></i></a>
						</li>
						<li><a href="#"><i class="fa fa-google-plus sr-icons"></i></a>
						</li>
					</ul>
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
<!-- Principal Content Start -->

<?php
include __DIR__ . '/partials/fin-doc.part.php';
?>