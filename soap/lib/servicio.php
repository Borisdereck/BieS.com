<?php
error_reporting(E_ALL);
ini_set('display_errors','On');
        require_once('nusoap.php');
        require_once('sumar.php');
 
        $server = new nusoap_server();
        $server->register('sumar');
 
        $HTTP_RAW_POST_DATA = isset ($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
        $server->service($HTTP_RAW_POST_DATA);
?>