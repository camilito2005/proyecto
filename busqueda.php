<?php
require_once 'conexion.php';

$busqueda = $_POST["search_criteria"];

$query = <<<SQL
"SELECT * FROM productos WHERE nombre LIKE '%"."$busqueda"."%'";
SQL;

$productos = [];
$error = ['data'=>false];

$getProductos = $conexion->query($query);
if ($getProductos->num_rows > 0) {
    while ($data = $getProductos->fetch_assoc()) {
        $productos []= $data;
    }
     echo json_encode($productos);
}
else {
    echo json_encode($error);
}

?>