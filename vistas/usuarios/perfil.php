<?php

include_once "../../Librerias/lib_HTML-U.php";
include_once "../../Librerias/lib_perfil.php";

$accion = $_POST["accion"];

Perfil();

if ($accion == "pop_up") {
    Pop_up();
}


?>