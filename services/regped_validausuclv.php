<?php
require_once('regped_accesobd.inc');
$pusuario = trim($_GET["usuario"]);
$pclave = trim($_GET["claveusu"]);

DB_Open();
$query = "SELECT idusuario, nombres, apellidos, tipousuario FROM usuarios WHERE codusuario = '$pusuario' and pswusuario= '$pclave'";
$resultado = mysql_query($query);
if (mysql_num_rows($resultado) == 0)
{
  $respuesta = "<usuarios><usuario><idusuario>0</idusuario></usuario></usuarios>";
} else
{
  $datos = mysql_fetch_assoc($resultado);
  $idusuario=$datos["idusuario"];
  $nombreusu=$datos["nombres"]." ".$datos["apellidos"];
  $tipousuario=$datos["tipousuario"];
  $respuesta = "<usuarios><usuario>";
  $respuesta = $respuesta."<idusuario>".$idusuario."</idusuario>";
  $respuesta = $respuesta."<tipousuario>".$tipousuario."</tipousuario>";
  $respuesta = $respuesta."<nombreusu>".$nombreusu."</nombreusu>";
  $respuesta = $respuesta."</usuario></usuarios>";
}
echo $respuesta;

?>