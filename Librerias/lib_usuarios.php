<?php


$accion = $_GET["accion"];
function Guardar()
{
    if (!empty($_POST["dni"]) && !empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["telefono"]) && !empty($_POST["direccion"]) && !empty($_POST["correo"]) && !empty($_POST["contraseña"])) {
        $datos = [
            "dni" => $_POST['dni'],
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

        $consulta = pg_query(
            $conexion,
            <<<SQL
                    INSERT INTO usuarios (dni, nombre, apellido, telefono, direccion, correo, contraseña) 
                    VALUES ('{$dni}','{$nombre}','{$apellido}','{$telefono}','{$direccion}','{$correo}','{$contraseña}')
SQL
        );

        if ($consulta) {
            header("Location: ../vistas/usuarios/usuarios.php");
        } else {
            if (!$consulta) {
                echo "error";
            }
        }
    } else {
        echo "campos vacios, porfavor llene los campos";

    }

}

function Eliminar()
{
    include_once "../conexion.php";
    $conexion = Conexion();

    $id = $_GET["id"];

    $id = pg_escape_string($id); // Asegúrate de escapar el ID para evitar inyecciones SQL

    $consulta = <<<SQL
        DELETE FROM usuarios WHERE id = $id
SQL;
    $resultado = pg_query($conexion, $consulta);
    if ($resultado) {
        header("Location: ../vistas/usuarios/usuarios.php");
    } else {
        echo "error ";
    }

}




function Login(){

    include_once "../conexion.php";

    $conexion = Conexion();

    /*$datos = [
        "correo" => $_POST['correo'],
        "contraseña" => $_POST['contraseña'],
    ];*/

    $correo = $_POST["correo"];
    $contraseña = $_POST["contraseña"];

    $correo = pg_escape_string($correo);
    $contraseña = pg_escape_string($contraseña);

    $consulta = <<<SQL
        SELECT correo,contraseña FROM usuarios WHERE correo = $correo AND contraseña = $contraseña
SQL;
echo $consulta;

    $resultado = pg_query($conexion, $consulta);
    $filas = pg_fetch_array($resultado);

    if ($filas) {
        echo "inicisate sesion";
    }
    else{
        echo "error";
    }
}

if ($accion == "registrar") {
    Guardar();
}
if ($accion == "eliminar") {
    Eliminar();
}
if ($accion == "login") {
    Login();
}

?>