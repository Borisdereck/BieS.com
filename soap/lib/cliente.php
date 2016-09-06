<?php
error_reporting(E_ALL);
ini_set('display_errors','On');

        require_once('nusoap.php');
        $cliente = new nusoap_client('http://localhost/librerias/soap/lib//servicio.php');
        $resultado = $cliente->call('sumar', array ('x' => '3', 'y' => 4));
        print_r ($resultado);
?>
