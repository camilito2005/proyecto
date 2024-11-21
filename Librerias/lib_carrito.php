<?php

session_start();

//require_once "../modelo/Modelocarrito.php";

$accion = $_GET["accion"];


function Index(){
    header("Location: ../vistas/catalogo/catalogo.php?accion=catalogo");
    exit;
}
function Ver(){
    if (empty($_SESSION['carrito'])) {
        echo 'no hay nada en el carrito <br> <a href="../vistas/catalogo/catalogo.php?accion=catalogo">volver a la tienda </a>';
        //echo '<a href="../vistas/catalogo/catalogo.php">agregar al carrito</a>';
        exit;
        
        
        } else if(!empty($_SESSION['carrito'])) {
            header('Location: ../vistas/catalogo/carrito.php?accion=catalogo');
            return  $_SESSION['carrito'];

        }
    //header('Location: ../vistas/catalogo/carrito.php');
}

function Ingresar(){
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
        header('Location: ../vistas/catalogo/carrito.php?accion=catalogo');
        exit;

    }
    else {
    $_SESSION['correo']['id']['stock'] += $stock;
}
}

/*if ($accion == "actualizar") {
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
        exit;
    }
}*/
function Actualizar(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $cantidad = $_POST['cantidad'];
    
            if (isset($_SESSION['carrito'][$id])) {
                $precioUnitario = $_SESSION['carrito'][$id]['precio'];  // Tomamos el precio unitario directamente
                $stock = $_SESSION['carrito'][$id]['stock'];
    
                // Verificamos que la cantidad sea válida
                if ($cantidad > 0 && $cantidad <= $stock) {
                    $_SESSION['carrito'][$id]['cantidad'] = $cantidad;
                    $_SESSION['carrito'][$id]['precio'] = $precioUnitario * $cantidad;  // Actualizamos el precio total
                }
            }
    
            header('Location: ../vistas/catalogo/carrito.php'); // Redirigimos de vuelta al carrito
            exit;
        }
}

function EliminarU(){
    $id = $_POST['id'];

    if (isset($_SESSION['carrito'][$id])) {
        unset($_SESSION['carrito'][$id]);

        if (empty($_SESSION['carrito'])) {
            header('Location: ../vistas/catalogo/catalogo.php?accion=catalogo');
            exit;
        } else {
            header('Location: ../vistas/catalogo/carrito.php');
            exit;
        }
        exit; 
    } else {
        echo 'El artículo no está en el carrito.<br>';
        echo '<a href="../vistas/catalogo/carrito.php">Volver al carrito</a>';
    }
}  
function EliminarT(){

    //$carrito->eliminarTodo();
        unset($_SESSION['carrito']);
        header('Location: ../vistas/catalogo/catalogo.php?accion=catalogo');
        exit;
} 

if (isset($_POST["cerrar"])) {
    session_start();
    session_destroy();
    header("Location: ../vistas/pagina-principal/login.php");
    exit;
}

if ($accion == "comprar") {
    if ($_SERVER['REQUEST_METHOD']=== 'POST') {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $precio = $_POST["precio"];
        $disponible = $_POST["stock"];
        //$imagen = $_POST["foto"];

        $productos = [];

        $productos = [
            "id" => $id,
            "nombre" => $nombre,
            "descripcion" => $descripcion,
            "precio" => $precio,
            "disponible" => $disponible,
        ];

        $productos_json = json_encode($productos);

        echo $productos_json;

    }

}

if ($accion == "actualizar") {
    Actualizar();
}
if ($accion == "eliminarT") {
    EliminarT();
}
if ($accion == "eliminarU") {
    EliminarU();
}
if ($accion == "agregar") {
    Ingresar();
}

if ($accion == "ver") {
    Ver();
}
if ($accion == "index") {
    Index();
}

?>

