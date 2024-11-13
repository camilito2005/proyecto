<?php
    include_once "../../Librerias/lib_HTML-U.php";
    $accion = $_REQUEST["accion"];

    if ($accion == "verproductos") {
        Mostrar_productos();
    }

?>