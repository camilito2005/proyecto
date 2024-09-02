<?php

session_start();

//require_once "../modelo/Modelocarrito.php";

$accion = $_GET["accion"];

if ($accion == "index") {
    header("Location: ../vistas/catalogo/catalogo.php");
}
if ($accion == "ver") {
    if (empty($_SESSION['carrito'])) {
        echo 'no hay nada en el carrito';die;
        //echo '<a href="../vistas/catalogo/catalogo.php">agregar al carrito</a>';
        header('Location: ../vistas/catalogo/carrito.php');
        } else {
        return  $_SESSION['carrito'];
        }
    //header('Location: ../vistas/catalogo/carrito.php');
}

if ($accion == "agregar") {
    if ($_SERVER['REQUEST_METHOD'] === 'POST')  {

        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $foto = $_POST['foto'];
        $cantidad=$_POST['cantidad'];
        if (!isset($_SESSION['carrito'])) {

            $_SESSION['carrito'] = array();
        }
        if (array_key_exists($id, $_SESSION['carrito'])) {

            $precioF=$precio*$cantidad;
            $_SESSION['carrito'][$id]['cantidad'] += $cantidad;
            $_SESSION['carrito'][$id]['precio'] += $precio;
        } else {

            $_SESSION['carrito'][$id] = array(
                'id'=>$id,
                'nombre' => $nombre,
                'foto' => $foto,
                'descripcion' => $descripcion,
                'precio' => $precio,
                'stock' => $stock,
                'cantidad' => $cantidad,
            );
        }
        //$carrito->aggCarrito($id,$nombre,$descripcion,$precio,$stock,$foto);
        header('Location: ../vistas/catalogo/carrito.php');

    }
    else {
        
    $_SESSION['correo']['id']['stock'] += $stock;
}
}

if ($accion == "actualizar") {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $cantidad = $_POST['cantidad'];

        if (isset($_SESSION['carrito'][$id])) {
            $precioUnitario = $_SESSION['carrito'][$id]['precio'] / $_SESSION['carrito'][$id]['cantidad'];
            $stock = $_SESSION['carrito'][$id]['stock'];

            if ($cantidad > 0 && $cantidad <= $stock) {
                $_SESSION['carrito'][$id]['cantidad'] = $cantidad;
                $_SESSION['carrito'][$id]['precio'] = $precioUnitario * $cantidad;
            }
        }

        header('Location: ../vistas/catalogo/carrito.php');
    }
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

