<?php

include_once "../../Librerias/lib_HTML-U.php";
include_once "../../Librerias/lib_perfil.php";
include_once "../../Librerias/lib_configuracion.php";

$accion = $_POST["accion"];

Perfil();

/*if ($accion == "pop_up") {
    Pop_up();
}*/
if ($accion == "actualizar") {
    Actualizar_usuarios($ruta = "./perfil.php");
}


?>