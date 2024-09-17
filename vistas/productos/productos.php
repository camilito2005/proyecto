<?php
include_once "../../Librerias/lib_HTML-U.php";
include_once "../../Librerias/lib_productos.php";

$aciion = $_GET["accion"];


if (!$accion) {
    Formulario_productos();
}
if ($accion == "registrar_productos") {
    Insertar_productos();
}
if ($accion == "eliminar") {
    Eliminar_productos();
}

if ($accion== "modificar") {
    Modificar_Productos();
}
if ($accion == "actualizar") {
    Actualizar_productos();
}
if ($accion == "excel") {
    Mostrar_productos_excel();
    Excel();
}
if ($accion == "pdf") {
    Pdf();
}



?>