
<?php 
session_start();

require_once "../modelo/Modelocarrito.php";


$carrito = new Carrito();

$accion = isset($_GET['carri']) ? $_GET['carri'] : 'index';
switch ($accion){
    case 'index':
        echo '<a href="../vistas/catalogo/catalogo.php';
        break;
    case 'ver':
        header('Location: ../vistas/catalogo/carrito.php');
        break;
    case 'agregar':
        if ($_SERVER['REQUEST_METHOD'] === 'POST')  {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $foto = $_POST['foto'];
        // $imagen = $_POST['imagen'];
        
        $carrito->aggCarrito($id,$nombre,$descripcion,$precio,$stock,$foto);
        header('Location: ../vistas/catalogo/carrito.php');
    } else {
        
        $_SESSION['correo']['id']['stock'] += $stock;
    }
    break;
    case 'eliminarU':
        $id = $_POST['id'];
        $carrito->eliminarCarrito($id);
        header('Location: ../vistas/catalogo/carrito.php');
        break;
    case 'eliminarT':
        $carrito->eliminarTodo();
        header('Location:../vistas/catalogo/catalogo.php');
        break;
}

if (isset($_POST["cerrar"])) {
    session_start();
    session_destroy();
    header("Location:../vistas/pagina-principal/login.php");
}





?>