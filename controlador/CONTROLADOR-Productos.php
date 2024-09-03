<?php
include "../modelo/Modelo-Productos.php";

$clases = new Productos;

if (isset($_POST["enviar"])) {


    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $cantidad = $_POST["cantidad"];
    // $foto = $_POST["foto"];
    date_default_timezone_set('America/Bogota');
    $fecha_actual = date('d-m-y H:i:s');



    if (isset($_FILES['foto'])) {
        $foto_nombre = $_FILES["foto"]['name'];
        $archivo_temporal = $_FILES['foto']['tmp_name'];

        $directorio_destino = "../../pagina-mvc/fotos/";



        // $ruta_destino = $directorio_destino;

        if (move_uploaded_file($archivo_temporal, $directorio_destino . $foto_nombre)) {
            $foto = $directorio_destino . $foto_nombre;

            // $resultado = new Productos();



            $clases->registrarP($nombre, $descripcion, $precio, $cantidad, $foto, $fecha_actual);
            // echo "registro de producto exitoso";
            header("Location:../vistas/productos/productos.php");
            // else {
            //     echo "error";
            // }
        } else {
            echo "Error al subir la foto.";
        }
    }
}

if (isset($_REQUEST["modificar"])) {
    $id = $_REQUEST["id"];
    $nombre_producto = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $stok = $_POST["cantidad"];
    // $foto = $_POST["foto"];
    // date_default_timezone_set('America/Bogota');
    // $fecha_actualizacion = date('d-m-y H:i:s');

    // $actualizar = new ActualizarProductos();

    $clases->ActualizarP($id, $nombre_producto, $descripcion, $precio, $stok);
}
if (isset($_POST["eliminar"])) {
    if (($_GET["id"])) {

        $id = $_GET["id"];
    
        // $eliminar = new EliminarProductos();
    
        $clases->EliminarP($id);
    }
}

?>
