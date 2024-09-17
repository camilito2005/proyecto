<?php
include_once "../../Librerias/lib_HTML-U.php";
include_once "../../Librerias/lib_usuarios.php";



$accion = $_GET["accion"];


$token = $_REQUEST["token"];

if(!$accion){
    Mostrar_usuarios();
}

if ($accion == "eliminar") {
    Eliminar();
}
if ($accion == "login") {
    Login();
}
if ($accion == "cerrar") {
    Cerrar_sesion();
}
if ($accion == "registrar") {
    Guardar();
}

if ($accion=="modificar"){
    Modificar_usuarios();
}
if ($accion =="actualizar") {
    Actualizar_usuarios();
}

if ($accion== "recuperar") {
    Formulario_enviar_correo();
}

if ($accion == "correo_enviado") {
    restablecer_contraseña();
}

if ($accion == "contraseña") {
    Formulario_restablecer_contraseña();
}

if($accion == "restablecer"){
    Restablecer();
}

?>

