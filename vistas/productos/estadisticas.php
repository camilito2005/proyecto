<?php
/*include_once "../../Librerias/lib_estadisticas.php";
Estadisticas();*/

include_once "../../Librerias/html.php";
include_once "../../Librerias/lib_estadisticas.php";

$accion = $_REQUEST["accion"];

if ($accion=="filtro") {
    Filtro();
}

if ($accion=="pdf") {
    Pdf();
}

if ($accion=="masvendidos") {
    Masventas();
}
if ($accion=="ventasxmes") {
    Ventasxmes();
}

?>