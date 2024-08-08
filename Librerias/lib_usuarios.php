<?php
$accion = $_GET["accion"];

function Guardar(){
    $datos = [
        "dni"=>$_POST['dni'],
        "nombre" => $_POST["nombre"],
        "apellido" => $_POST["apellido"],
        "telefono" => $_POST["telefono"],
        "direccion" => $_POST["direccion"],
        "correo" => $_POST["correo"],
        "contraseña" => $_POST["contraseña"],
        "rol" => $_POST["rol"]
    ];

$dni = pg_escape_string($datos['dni']);
$nombre = pg_escape_string($datos['nombre']);
$apellido = pg_escape_string($datos['apellido']);
$telefono = pg_escape_string($datos['telefono']);
$direccion = pg_escape_string($datos['direccion']);
$correo = pg_escape_string($datos['correo']);
$contraseña = pg_escape_string($datos['contraseña']);
$rol= pg_escape_string($datos['rol']);



    include_once "../conexion.php";
    $conexion = Conexion();

    $consulta = pg_query($conexion, <<<SQL
    INSERT INTO usuarios (dni, nombre, apellido, telefono, direccion, correo, contraseña, id_rol) 
    VALUES ('{$dni}','{$nombre}','{$apellido}','{$telefono}','{$direccion}','{$correo}','{$contraseña}','{$rol}')
SQL
    );

    if ($consulta) {
        echo "insercion de datos exitosa";
    }
    else {
        if (!$consulta) {
            echo "error";
        }
    }


}

if ($accion == "registrar") {
    Guardar();
}
            $dni = $_POST['dni'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $correo = $_POST['correo'];
            $contraseña = $_POST['contraseña'];
            $rol = $_POST["rol"];
?>