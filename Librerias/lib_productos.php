<?php
$accion = $_GET["accion"];

function Insertar_productos()
{
    if (!empty($_POST["nombre"]) && !empty($_POST["descripcion"]) && !empty($_POST["precio"]) && !empty($_POST["cantidad"])) {
        date_default_timezone_set('America/Bogota');
        $datos = [
            "nombre" => $_POST["nombre"],
            "descripcion" => $_POST["descripcion"],
            "precio" => $_POST["precio"],
            "cantidad" => $_POST["cantidad"],
            "fecha" => date('d-m-y H:i:s')
        ];
        $nombre = pg_escape_string($datos["nombre"]);
        $descripcion = pg_escape_string($datos["descripcion"]);
        $precio = pg_escape_string($datos["precio"]);
        $cantidad = pg_escape_string($datos["cantidad"]);
        $fecha_actual = $datos["fecha"];


        if (isset($_FILES["foto"])) {
            if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
                $archivo_temporal = $_FILES["foto"]["tmp_name"];
                $foto_nombre = basename($_FILES["foto"]["name"]);
                $directorio_destino = "../../ti/fotos/";
                //include "/Applications/XAMPP/htdocs/ti/fotos";
                //Aquí se verifica si se ha subido un archivo con el nombre 'foto'. Si es así, se obtienen el nombre del archivo y su ruta temporal. Se define el directorio destino donde se guardará el archivo.

                if (move_uploaded_file($archivo_temporal, $directorio_destino . $foto_nombre)) {
                    $foto = $directorio_destino . $foto_nombre;

                    include "../conexion.php";
                    $conexion = Conexion();

                    $consulta = <<<SQL
                    INSERT INTO productos (nombre,descripcion,precio,stock,imagen,fecha_creacion)VALUES('$nombre','$descripcion','$precio','$cantidad','$foto','$fecha_actual')
SQL;
                    $resultado = pg_query($conexion, $consulta);
                    if ($resultado) {
                        header("Location: ../vistas/catalogo/catalogo.php");
                    } else {
                        if (!$resultado)
                            echo "error";
                    }

                } else {
                    echo "error al subir la foto";
                }
            }

        }
    } else {
        echo "campos vacios , por favor llene los campos";
    }
}

function Mostrar_productos()
{
    session_start();
    if (isset($_SESSION["correo"])) {
        echo $_SESSION["correo"];
        $html = <<<HTML
<form action='../../Librerias/lib_usuarios.php?accion=sesion' method='post'>
    <input type='submit' value="cerrar sesion">
</form>
HTML;
    }
    echo session_status();
    $html .= <<<HTML
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d6ecbc133f.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/busqueda.css">
    <title>Productos</title>
</head>

<body>
    <script src="../../js/busqueda.js" defer></script>

    <div class="input-search">
        <nav>
            <input  type="search" id="search" placeholder="search">
        </nav>
    </div>

    <div class="error">
        <p></p>
    </div>
    <h3 class="text-center text-secondary">productos</h3>
    <div class="mx-auto col-8 p-6" id="resultados-conainer">
        <table class="table" id="resultado">
            <thead class="bs-info">
                <tr>
                    <th scope="col">id</th>
                    <th>imagen</th>
                    <th>nombre del prodcuto</th>
                    <th>descripcion</th>
                    <th>precio</th>
                    <th>cantidad</th>
                    <th>EDITAR/ELIMINAR</th>
                </tr>
            </thead>
            <tbody>
                <div class="container">
HTML;
    include "../../conexion.php";
    $conexion = Conexion();
    $mostrar = pg_query($conexion, "SELECT * FROM productos");
    $numero = pg_num_rows($mostrar);

    while ($filas = pg_fetch_assoc($mostrar)) {
        $html .= <<<HTML
                            <tr>


<td>{$filas["id"]}</td>
<td>
    <div class="card mx-4 mt-4 mx-auto" style="width: 10rem;">
        <img src="/{$filas['imagen']}" height="70%" width="100%" class="card-img-top">
    </div>
</td>
<td>{$filas["nombre"]}</td>
<th>{$filas["descripcion"]}</th>
<td>{$filas["precio"]}</td>
<td>{$filas["stock"]}</td>

<td>
    <a href="./modificar-productos.php?id={$filas['id']}" class="btn btn-small btn-warning">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>
    <form action="/ti/librerias/lib_Productos.php?accion=eliminar&id={$filas['id']}" method="post">
        <button name="eliminar" class="btn btn-small btn-danger" type="submit" onclick="return Pregunta()">
            <i class="fa-solid fa-trash">

            </i>
        </button>
    </form>
    <!-- <a href="../../controlador/eliminar_productos.php?id={$filas['id']}"  >
        
    </a> -->
</td>



</tr>
</div>
</div>
HTML;
    }

    $html .= <<<HTML
    <p>{$numero}</p>
</tbody>
</table>
</div>
<button class="btn btn-secondary">
    <a href="../catalogo/catalogo.php">catalogo</a>
</button>
<button class="btn btn-secondary">
    <a href="../productos/productos.php">agregar productos</a>
</button>
HTML;
    echo $html;
}

function Eliminar_productos()
{
    include_once "../conexion.php";
    $conexion = Conexion();

    $id = $_GET["id"];

    $consulta = <<<SQL
        DELETE FROM productos WHERE id = '$id'
SQL;

    $resultado = pg_query($conexion, $consulta);
    if ($resultado) {
        header("Location: ../vistas/productos/verProductos.php");
        exit;
    }
    else {
        echo "error";
    }
}

if ($accion == "registrar_productos") {
    Insertar_productos();
}

if ($accion=="eliminar") {
    Eliminar_productos();
}


?>