<?php
include_once "../Librerias/lib_facturas.php";
include_once "../Librerias/lib_HTML-U.php";

$accion = $_GET["accion"];

if ($accion == "verfacturas") {
    FormularioFactura();
}
if ($accion == "cargardatos") {
    CargarDatos();
}
if ($accion == "factura") {
    Factura();
}
?>
