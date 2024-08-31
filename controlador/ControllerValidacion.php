<?php
require_once "../modelo/ModelValidacion.php";
if (isset($_POST['inicio'])) {
    session_start();
    
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    $vali = new Validacion;
    $vali->Validar($correo,$contraseña);
    
    
      
}
?>