<?php
if (isset($_POST["ud"]) && isset($_POST["pas"]))
{
	$usuario = $_POST["ud"];
	$password = $_POST["pas"];

	$con = mysql_connect("127.0.0.1","root","");
	$base = mysql_select_db("bies",$con);

	$consulta = mysql_query("SELECT nombre, email from usuarios where username = '".$_POST["ud"]."' and password = '".$_POST["pas"]."' ");

	if (mysql_num_rows($consulta)>0)
	{
		session_start();
		$_SESSION["usuario"] = $_POST["ud"];
		$_SESSION["pass"] = $_POST["pas"];
			header("Location:../menu.php");
	}else{
		//echo "<script language='javascript'>alert('Datos Incorrectos');</script>";
			header("location:../index.php");
		}
}


?>
