<?php

$accion = $_GET["accion"];
function CargarDatos(){

    include "../conexion.php";

    $nombre = $_GET['nombre'];
    $conexion = Conexion();

    $query = 'SELECT * FROM productos WHERE nombre = $1';
    $params = array($nombre);

    $result = pg_query_params($conexion, $query, $params);

    if (!$result) {
        echo json_encode(array('error' => 'Error en la consulta a la base de datos.'));
        exit;
    }

    $producto = pg_fetch_assoc($result);

    header('Content-Type: application/json');
    echo json_encode($producto);
}
function Factura (){

    date_default_timezone_set('America/Bogota');
    $fecha = date('Y-m-d g:i:s');
    echo $fecha;

    include_once "../conexion.php";
    $conexion = Conexion();

    session_start();

    $correo = isset($_SESSION["correo"]) ? htmlspecialchars($_SESSION["correo"]) : null;

    if ($_SERVER['REQUEST_METHOD']== 'POST') {

        if (isset($_POST["producto"])&& isset($_POST["cantidad"])) {
            $producto = $_POST["producto"];
            $cantidad = $_POST["cantidad"];
        }
        else {
            $producto = NULL;
            $cantidad = 0;
        }
    
        $consulta = pg_query_params($conexion, "SELECT id,precio, stock FROM productos WHERE nombre = $1", array($producto));
        $resultado_consulta = pg_fetch_assoc($consulta);
    
        if ($resultado_consulta) {
            $productoId =  $resultado_consulta['id'];
            $cantidad_actual =  (int)$resultado_consulta['stock'];
            $precioUnitario = (float)$resultado_consulta['precio'];

            if ($cantidad_actual >= $cantidad) {

                $nueva_cantidad = $cantidad_actual - $cantidad;
                pg_query_params($conexion,"UPDATE productos SET stock = $1 WHERE id = $2",array($nueva_cantidad,$productoId));

                $total = $precioUnitario * $cantidad;

                pg_query_params($conexion, "INSERT INTO facturas (producto_id, stock, precio, total, fecha, cliente_correo) VALUES ($1, $2, $3, $4, $5, $6)",
                array($productoId, $cantidad, $precioUnitario, $total,$fecha, $correo));
    
                echo "<div class='alert alert-success'>Factura procesada con éxito. Se han restado $cantidad del producto $producto.</div>";
    
            } else {
                echo "<div class='alert alert-danger'>No hay suficiente stock para el producto seleccionado.</div>";
            }
        }
        else {
            echo "<div class='alert alert-danger'>Producto no encontrado.</div>";
        }
    }
}






?>
