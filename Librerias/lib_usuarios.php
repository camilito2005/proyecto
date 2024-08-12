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

        include_once "../../conexion.php";
        $conexion = Conexion();

        $dni = pg_escape_string($datos['dni']);
        $nombre = pg_escape_string($datos['nombre']);
        $apellido = pg_escape_string($datos['apellido']);
        $telefono = pg_escape_string($datos['telefono']);
        $direccion = pg_escape_string($datos['direccion']);
        $correo = pg_escape_string($datos['correo']);
        $contraseña = pg_escape_string($datos['contraseña']); // el pg_escape_string es para que la base de datos no tenga problemas con caracteres especiales como comillas y otros caracteres y para evitar que los datos del usuario puedan modificar la estructura de la consulta SQL de manera maliciosa.

        if (strlen($contraseña) < 6) {
            echo "La contraseña debe tener al menos 6 caracteres.";
            exit;
        }

        $consultadni =<<<SQL
        SELECT count(*) FROM usuarios WHERE dni = '$dni'
SQL;
        $querydni = pg_query($conexion, $consultadni);
        if ($querydni == FALSE) {
            echo "error al consultar el dni". pg_last_error($conexion);
            exit;
        }
        $resultadoDni = pg_fetch_result($querydni, 0, 0); //Es una función que se usa para recuperar un valor específico de un recurso de consulta obtenido a través de pg_query.
        if ($resultadoDni>0) {
            echo  "este dni "."'$dni'"." ya existe";
            exit;
        }

        $consultaContraseña = <<<SQL
        SELECT count(*) FROM usuarios WHERE contraseña = '$contraseña'
SQL;
        $resultadoContraseña=pg_query($conexion,$consultaContraseña);
        if ($resultadoContraseña==FALSE) {
            echo "error al consultar la contraseña". pg_last_error($conexion);
            exit;
        }
        $countcontraseña = pg_fetch_result($resultadoContraseña,0,0);
        if ($countcontraseña>0) {
            echo"la contraseña "."'$contraseña'" ." ya existe";
            
            exit;
        }

            $consulta = <<<SQL
            INSERT INTO usuarios (dni, nombre, apellido, telefono, direccion, correo, contraseña) VALUES ('$dni','$nombre','$apellido','$telefono','$direccion','$correo','$contraseña')
SQL;

        $resultadoc = pg_query($conexion, $consulta);

        if ($resultadoc) {
            header("Location: ./usuarios.php");
        } else {
            if (!$resultadoc) {
                echo "error";
            }
        }
    } else {
        echo "campos vacios, porfavor llene los campos";
    }
}


function Eliminar()
{
    include_once "../../conexion.php";
    $conexion = Conexion();

    $id = $_GET["id"];

    $id = pg_escape_string($id); // Asegúrate de escapar el ID para evitar inyecciones SQL

    $consulta = <<<SQL
        DELETE FROM usuarios WHERE id = $id
SQL;
    $resultado = pg_query($conexion, $consulta);
    if ($resultado) {
        echo "el registro de id ".$id." eliminado correctamente";
        exit;
    } else {
        echo "error ";
    }
}




function Login()
{
    session_start();

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
    $nombre = "";

    $consulta = <<<SQL
        SELECT correo,contraseña FROM usuarios WHERE correo = '$correo' AND contraseña = '$contraseña'
SQL;


    $resultado = pg_query($conexion, $consulta);
    $filas = pg_fetch_array($resultado);

    if ($filas) {
        $_SESSION["correo"] = $correo;

        header("Location: ../vistas/pagina-principal/usuario.php");
    } else {
        echo "contraseña incorrecta ";
    }
}
function Cerrar_sesion(){
    session_start();
    session_destroy();
    header("Location: ../vistas/pagina-principal/login.php");
}

if ($accion=="sesion") {
    Cerrar_sesion();
}
if ($accion =="login") {
    Login();
}


?>

