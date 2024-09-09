<?php

include "../conexion.php";

$nombre = $_GET['nombre'];
$conexion = Conexion();

// Usar marcador de posición para la consulta
$query = 'SELECT * FROM productos WHERE nombre = $1';
$params = array($nombre);

// Realizar la consulta
$result = pg_query_params($conexion, $query, $params);

if (!$result) {
    // Manejo de errores
    echo json_encode(array('error' => 'Error en la consulta a la base de datos.'));
    exit;
}

// Obtener los datos del producto
$producto = pg_fetch_assoc($result);

// Configuración de la respuesta JSON
header('Content-Type: application/json');
echo json_encode($producto);

?>
