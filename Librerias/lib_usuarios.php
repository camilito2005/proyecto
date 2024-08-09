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

function Eliminar (){
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
        }
        else{
            echo "error ";
        }

}


function Login(){
    $html=<<<HTML

    
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inicia sesion</title>
</head>

<body>
    <div class="mx-auto contenedor">
        <div class="formulario_registro">
            <form class="mx-auto col-4 p-3 " action="../../controlador/ControllerValidacion.php?accion=login" method="post">
                <h2 class="text-center text-secondary"> bienvenido </h2>
                <p class="text-center text-secondary"> inicia sesion </p>
                <input class="form-control" placeholder="correo" required type="text" name="correo"><br><br>
                <input class="form-control" placeholder="contraseña" required type="password" name="contraseña"><br><b>
                    <input class="btn btn-primary" name="inicio" class="btn" type="submit" value="entrar"><br><br>
                    <a class="mr-auto navbar-brand" href="../usuarios/formulario_registro.php">registro</a>
            </form>
        </div>
    </div>
    <a href="../pagina-principal/index.php">inicio</a>
</body>

</html>

HTML;

echo $html;
}

if ($accion == "registrar") {
    Guardar();
}
if ($accion == "eliminar") {
    Eliminar();
}

?>