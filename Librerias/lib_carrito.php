<?php

session_start();

//require_once "../modelo/Modelocarrito.php";

$accion = $_GET["accion"];

if ($accion == "index") {
    header("Location: ../vistas/catalogo/catalogo.php");
}
if ($accion == "ver") {
    if (empty($_SESSION['carrito'])) {
        echo 'no hay nada en el carrito <br> <a href="../vistas/catalogo/catalogo.php">volver a la tienda </a>';
        //echo '<a href="../vistas/catalogo/catalogo.php">agregar al carrito</a>';
        exit;
        
        
        } else if(!empty($_SESSION['carrito'])) {
            header('Location: ../vistas/catalogo/carrito.php');
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

    if (isset($_SESSION['carrito'][$id])) {
        unset($_SESSION['carrito'][$id]);

        if (empty($_SESSION['carrito'])) {
            header('Location: ../vistas/catalogo/catalogo.php');
        } else {
            header('Location: ../vistas/catalogo/carrito.php');
        }
        exit; 
    } else {
        echo 'El artículo no está en el carrito.<br>';
        echo '<a href="../vistas/catalogo/carrito.php">Volver al carrito</a>';
    }
}  
if ($accion == "eliminarT") {
    //$carrito->eliminarTodo();
        unset($_SESSION['carrito']);
        header('Location: ../vistas/catalogo/catalogo.php');
        exit;
} 

if (isset($_POST["cerrar"])) {
    session_start();
    session_destroy();
    header("Location: ../vistas/pagina-principal/login.php");
}

if ($accion == "comprar") {
    if ($_SERVER['REQUEST_METHOD']=== 'POST') {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $precio = $_POST["precio"];
        $disponible = $_POST["stock"];
        //$imagen = $_POST["foto"];

        echo "<br>$id<br>";
        echo "<br>$nombre<br>";
        echo "<br>$descripcion<br>";
        echo "<br>$precio<br>";
        echo "<br>$disponible<br>";
        //echo "<img src='/$imagen' height='100%' width='100%' class='card-img-top' alt=''><br>";

    }

}
?>

