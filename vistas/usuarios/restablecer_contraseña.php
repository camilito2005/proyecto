<?php

$accion=$_REQUEST["accion"];

$token = $_REQUEST["token"];
//include_once("../../Librerias/lib_HTML-U.php");
include_once("../../Librerias/lib_usuarios.php");

if ($accion == "contraseña") {
    Formulario_restablecer_contraseña();
}
if($accion == "restablecer"){
    Restablecer();
}


?>