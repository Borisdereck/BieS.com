<?php
session_start();
if (isset($_SESSION["usuario"]) && isset($_SESSION["pass"]))
{

}else {
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">
    <title>BieS</title>
    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/form-elements.css">
    <link rel="stylesheet" href="assets/css/style.css">
      <!--<link rel="shortcut icon" href="assets/ico/polloico.ico">-->
</head>
<body>
    <!-- Top menu -->
    <nav class="navbar navbar-inverse navbar-no-bg" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="menu.html">BootZard - Bootstrap Wizard Template</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="top-navbar-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <span class="li-social">
            								<a href="cargarMapa.html" ><i class="fa fa-map"></i></a></span>
                              <span class="li-social">
            								<a href="" ><i class="fa fa-clock-o"></i></a></span>
                            <span class="li-social">
            								<a href="" ><i class="fa fa-heart"></i></a></span>
                            <span class="li-social">
            								<a href="" ><i class="fa fa-search"></i></a></span>
                            <span class="li-social">
                            <a href=""><i class="fa fa-bar-chart"></i></a></span>
                            <span class="li-social">
            								<a href="cerrar.php"><i class="fa fa-sign-out"></i></a>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Top content -->
    <div class="top-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">
                    <h1>Menú</h1>
                </div>
            </div>
            <div class="row">



                <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
					<div class="f1">
                        <div class="media feature">
                            <a class="pull-left" href="cargarMapa.html">
                                <i class="fa fa-map fa-2x"></i>
                            </a>
                            <div class="media-body">
                                <h3 class="media-heading">Ver Puntos Cerca</h3>
                          </div>
                        </div>

                        <div class="media feature">
                            <a class="pull-left" href="#">
                                <i class="fa fa-clock-o fa-2x"></i>
                            </a>
                            <div class="media-body">
                                <h3 class="media-heading">Historial de Sitios</h3>

                            </div>
                        </div>
                        <div class="media feature">
                            <a class="pull-left" href="#">
                                <i class="fa fa-heart fa-2x"></i>
                            </a>
                            <div class="media-body">
                                <h3 class="media-heading">Favoritos</h3>
                              </div>
                        </div>

                        <div class="media feature">
                            <a class="pull-left" href="#">
                                <i class="fa fa-search fa-2x"></i>
                            </a>
                            <div class="media-body">

                            <h3 class="media-heading">Buscar</h3>
                            </div>
                        </div>

                             <div class="media feature">
                            <a class="pull-left" href="#">
                                <i class="fa fa-bar-chart fa-2x"></i>
                            </a>
                            <div class="media-body">
                                <h3 class="media-heading">Estadisticas</h3>

                            </div>
                        </div>



        </div>
    </div>
    <!-- Javascript -->
    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.backstretch.min.js"></script>
    <script src="assets/js/retina-1.1.0.min.js"></script>
    <script src="assets/js/scripts.js"></script>

    <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

</body>

</html>
