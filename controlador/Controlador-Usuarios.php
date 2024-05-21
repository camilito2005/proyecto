<?php

include('../modelo/Modelo-Usuarios.php') ;
// require_once "../modelo/Modelo-Usuarios.php";

$clases = new Registro;


    if (!empty($_POST["registro"])) {
        
            $dni = $_POST['dni'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $correo = $_POST['correo'];
            $contraseña = $_POST['contraseña'];
            $rol = $_POST["rol"];



            // $registro = new Registro();

            $clases->registrar($dni,$nombre,$apellido,$telefono,$direccion,$correo,$contraseña,$rol);
        
    }
    
    if (isset($_POST["modificar"])) {
        $id = $_REQUEST["id"];
        // $dni = $_POST["dni"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $telefono = $_POST["telefono"];
        $direccion = $_POST["direccion"];
        $correo = $_POST["correo"];
        $contraseña = $_POST["contraseña"];
        $rol = $_POST["rol"];

        // $actualizar = new Actualizar();

       
        $clases->actualizar_usuarios($id,$nombre,$apellido,$telefono,$direccion,$correo,$contraseña,$rol);
    }

    if (isset($_REQUEST["borrar"])) {
        if (!empty($_GET["id"])) {

            $id = $_GET["id"];
        
            // $eliminar = new EliminarUsuarios();
        
            $clases->Eliminar($id);
        
           
        }
    }
// include ("../modelo/Modelo-Usuarios.php");

    
?>