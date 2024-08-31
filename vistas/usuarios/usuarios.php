<?php
include_once "../../Librerias/lib_HTML-U.php";
include_once "../../Librerias/lib_usuarios.php";

Mostrar_usuarios();

$accion = $_GET["accion"];

if ($accion == "eliminar") {
    Eliminar();
}
if ($accion == "login") {
    Login();
}
?>

