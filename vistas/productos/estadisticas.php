<?php
/*include_once "../../Librerias/lib_estadisticas.php";
Estadisticas();*/

include_once "../../Librerias/html.php";
include_once "../../Librerias/lib_estadisticas.php";

$accion = $_REQUEST["accion"];

if ($accion=="filtro") {
    //Filtro();
    Ventasxmes($titulo="Productos Vendidos al dia",$subtitulo="Ventas diarias");
}

if ($accion=="pdf") {
        if (isset($_POST['fecha_inicio']) && isset($_POST['fecha_fin'])) {
            $fecha_inicio = $_POST['fecha_inicio'];
            $fecha_fin = $_POST['fecha_fin'];

            $tipo_info = $_POST["tipoinfo"];
            if ($tipo_info == "dia") {
                Pdf($fecha_inicio, $fecha_fin,$titulo="ventas al dia");
            }
            elseif ($tipo_info == "mes") {
                Pdf($fecha_inicio, $fecha_fin,$titulo="ventas por mes");

            }
    }
}

if ($accion=="masvendidos") {
    Masventas();
}
if ($accion=="ventasxmes") {
    Ventasxmes($titulo="Productos Vendidos por mes",$subtitulo="Ventas por mes");
}

?>