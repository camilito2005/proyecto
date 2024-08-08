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
        "contraseña" => $_POST["contraseña"]
    ];

$dni = pg_escape_string($datos['dni']);
$nombre = pg_escape_string($datos['nombre']);
$apellido = pg_escape_string($datos['apellido']);
$telefono = pg_escape_string($datos['telefono']);
$direccion = pg_escape_string($datos['direccion']);
$correo = pg_escape_string($datos['correo']);
$contraseña = pg_escape_string($datos['contraseña']); // el pg_escape_string es para que la base de datos no tenga problemas con caracteres especiales como comillas y otros caracteres y para evitar que los datos del usuario puedan modificar la estructura de la consulta SQL de manera maliciosa.



    include_once "../conexion.php";
    $conexion = Conexion();

    $consulta = pg_query($conexion, <<<SQL
    INSERT INTO usuarios (dni, nombre, apellido, telefono, direccion, correo, contraseña) 
    VALUES ('{$dni}','{$nombre}','{$apellido}','{$telefono}','{$direccion}','{$correo}','{$contraseña}')
SQL
    );

    if ($consulta) {
        echo "insercion correcta ";
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
?>