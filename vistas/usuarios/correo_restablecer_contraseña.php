<?php
$accion=$_GET["accion"];

include_once ("../../Librerias/lib_HTML-U.php");

if ($accion== "recuperar") {
    Formulario_enviar_correo();
}
?>