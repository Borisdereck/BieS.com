<?php
session_start();
if (isset($_SESSION["usuario"]) && isset($_SESSION["pass"]))
{
	header("location:menu.php");
}

 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BieS.com</title>
        <meta name="description" content="Custom Login Form Styling with CSS3" />
        <meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<script src="js/modernizr.custom.63321.js"></script>
		<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
		<style>
			@import url(http://fonts.googleapis.com/css?family=Raleway:400,700);
			body {
				background: #810682;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				background-size: cover;
			}
			.container > header h1,
			.container > header h2 {
				color: #fff;
				text-shadow: 0 1px 1px rgba(0,0,0,0.7);
			}
		</style>
    </head>
    <body>
        <div class="container">

			<!-- Codrops top bar -->
          <div class="codrops-top"></div><!--/ Codrops top bar -->

			<header>

				<h1>BieS Advertising</strong></h1>
						  <div class="support-note"><span class="note-ie">Sorry, only modern browsers.</span>
	  </div>

			</header>

		  <section class="main">
				<form class="form-4" action="services/Procesar.php" method="post">
				    <h1><img src="css/logo.png" width="108" height="136" alt=""/></h1>
				    <p>
				      <label for="login">Username or email</label>
			          <input type="text" name="ud" placeholder="Usuario" required>
			      </p>
			      <p>
			          <label for="password">Password</label>
		            <input type="password" name='pas' placeholder="Contraseña" required>
				    </p>

                  <p>  <input type="submit" name="submit" value="Iniciar Sesión">
			      </p>
		    </form>​
               <span style="font-size: 12px;"> <u style="color: #FFFFFF;">Olvidé mi contraseña</u></span>
               <br>
                <br>
                 <br>

               <span style="color: #9C9C9C;">No está registrado?</span> Registrarse
			</section>

        </div>
    </body>
</html>
