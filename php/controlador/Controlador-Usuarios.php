<?php

include('../modelo/Modelo-Usuarios.php') ;
// require_once "../modelo/Modelo-Usuarios.php";

$clases = new Registro;


    if (isset($_POST["registro"])) {

        if (!empty($_POST["dni"]) && !empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["telefono"]) && !empty($_POST["direccion"]) && !empty($_POST["correo"]) && !empty($_POST["contraseña"]) && !empty($_POST["rol"])) {
            
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
        
          else {
            echo "llene todos los campos";
            include_once "../vistas/usuarios/formulario_registro.php";
          }  
        
    }
    
    if (isset($_POST["modificar"])) {
        $id = $_REQUEST["id"];
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

    if (isset($_POST["borrar"])) {
        if (!empty($_GET["id"])) {

            $id = $_GET["id"];
        
            // $eliminar = new EliminarUsuarios();
        
            $clases->Eliminar($id);
        
           
        }
    }
// include ("../modelo/Modelo-Usuarios.php");

    
?>