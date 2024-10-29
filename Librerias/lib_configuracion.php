<?php


$accion = $_REQUEST["accion"];
function Actualizar_usuarios_perfil($ruta){



    $datos = [
        "id" => $_REQUEST["id"],
        "nombre" => $_POST["nombre"],
        "apellido" => $_POST["apellido"],
        "telefono" => $_POST["telefono"],
        "direccion" => $_POST["direccion"],
        "correo" => $_POST["correo"],
        "contraseña" => $_POST["contraseña"],
        "cargo_id" => $_POST["cargo_id"]
    ];

    include_once "../conexion.php";
    $conexion = Conexion();

    $consulta = <<<SQL
        UPDATE usuarios SET nombre = $1, apellido = $2, telefono = $3, direccion = $4, correo = $5, contraseña = $6, cargo_id = $7 WHERE id = $8
SQL;

    // Ejecutar la consulta
    $resultado_consulta = pg_query_params($conexion, $consulta, array($datos['nombre'], $datos['apellido'], $datos['telefono'], $datos['direccion'], $datos['correo'],$datos['contraseña'],$datos['cargo_id'], $datos['id']));

    if ($resultado_consulta) {
        header("Location: $ruta");
        //echo "supuestamente se actualizo correctamente ";
        //exit; // Es buena práctica usar exit después de redireccionar
    } else {
        echo "Error al realizar la operación.";
    }
}
if ($accion == "actualizar") {
    Actualizar_usuarios_perfil($ruta = "../vistas/usuarios/usuarios.php");
}

?>