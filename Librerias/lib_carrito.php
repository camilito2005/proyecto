<?php

session_start();

//require_once "../modelo/Modelocarrito.php";

$accion = $_GET["accion"];

if ($accion == "index") {
    header("Location: ../vistas/catalogo/catalogo.php");
    break;
}
if ($accion == "ver") {
    header('Location: ../vistas/catalogo/carrito.php');
        break;
}

if ($accion == "agregar") {
    if ($_SERVER['REQUEST_METHOD'] === 'POST')  {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $foto = $_POST['foto'];
        // $imagen = $_POST['imagen'];
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = array();
        }
        if (array_key_exists($id, $_SESSION['carrito'])) {
            $_SESSION['carrito'][$id]['stock'] += $stock;
            $_SESSION['carrito'][$id]['precio'] += $precio;
        } else {
            $_SESSION['carrito'][$id] = array(
                'nombre' => $nombre,
                'foto' => $foto,
                'descripcion' => $descripcion,
                'precio' => $precio,
                'stock' => $stock,
                // 'cantidad' => $cantidad,
            );
        }
        //$carrito->aggCarrito($id,$nombre,$descripcion,$precio,$stock,$foto);
        header('Location: ../vistas/catalogo/carrito.php');

    }
    else {
        
    $_SESSION['correo']['id']['stock'] += $stock;
}
break;
}
        
if ($accion == "eliminarU") {
    $id = $_POST['id'];
        //$carrito->eliminarCarrito($id);
        if (isset($_SESSION['carrito'][$id])) {
            unset($_SESSION['carrito'][$id]);
        }
        header('Location: ../vistas/catalogo/carrito.php');
        break;
}   
if ($accion == "eliminarT") {
    //$carrito->eliminarTodo();
        unset($_SESSION['carrito']);
        header('Location: ../vistas/catalogo/catalogo.php');
        break;
} 

if (isset($_POST["cerrar"])) {
    session_start();
    session_destroy();
    header("Location: ../vistas/pagina-principal/login.php");
}
?>

