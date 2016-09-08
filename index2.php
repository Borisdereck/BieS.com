<?php
session_start();
if (isset($_SESSION["usuario"]) && isset($_SESSION["pass"]))
{
	header("location:menu.php");
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>BieS.com</title>

	<!--<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">-->
	<link rel="STYLESHEET" type="text/css" href="css/regped_estilos.css">
	<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
	<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Montserrat:400,700'>
	<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
	<!--<link rel="stylesheet" href="css/bootstrap-responsive.css">-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="js/login.js"></script>
</head>
<body>
	<!-- Formulario Login-->
	<div id="area_login">
		<div class="container">
			<div class="info">
				<h1>BieS Advertising</h1>
			</div>
		</div>
		<div class="form">

			<form class="register-form">
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="glyphicon glyphicon-user"></i>
						</span>
						<input class="form-control" placeholder="Código usuario" id="cod_usuarion" name="loginname" type="text" autofocus required>
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="glyphicon glyphicon-lock"></i>
						</span>
						<input class="form-control" placeholder="Clave" id="clave_usuarion" name="password" type="password" value="" required>
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="glyphicon glyphicon-envelope"></i>
						</span>
						<input class="form-control" placeholder="Email" id="email"  type="text" value="" required>
					</div>
				</div>
				<button>Crear</button>
				<p class="message">Estas Registrado? <a href="#">Ingresa Ya!</a></p>
			</form>
			<form class="login-form" action="services/Procesar.php" method="post">
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="glyphicon glyphicon-user"></i>
						</span>
						<input class="form-control" placeholder="Código usuario" name="ud" id="cod_usuario" type="text" autofocus required>
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="glyphicon glyphicon-lock"></i>
						</span>
						<input class="form-control" placeholder="Clave usuario" name="pas" id="clave_usuario" type="password" value="" required>
					</div>
				</div>
				<button>Ingresar</button>
				<p class="message">No estas Registrado? <a href="#"> Crear una cuenta</a></p>
			</form>
		</div>
	</div>

	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src="js/index.js"></script>
</body>

</html>
