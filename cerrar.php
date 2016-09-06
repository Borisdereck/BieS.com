<?php
session_start();
$_SESSION['usuario'] = array();
$_SESSION['pass'] = array();
session_destroy();
header("location:index.php");

 ?>
