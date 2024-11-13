<?php
include_once "../../Librerias/lib_HTML-U.php";
include_once "../../Librerias/lib_usuarios.php";

$accion = $_GET["accion"];

if ($accion == "aggusuarios") {
    Formulario_clientes();
}


?>