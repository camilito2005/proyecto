<?php
require_once 'conexion.php';

$busqueda = $_POST["search_criteria"];

$query = <<<SQL
"SELECT * FROM productos WHERE nombre LIKE '%"."$busqueda"."%'";
SQL;

$productos = [];
$error = ['data'=>false];

$getProductos = $conexion->pg_query($query);
if ($getProductos->num_rows > 0) {
    while ($data = $getProductos->fetch_assoc()) {
        $productos []= $data;
    }
     echo json_encode($productos);
}
else {
    echo json_encode($error);
}

// consulta para el login 
/*SELECT u.id, u.nombre, u.correo, c.descripcion AS rol
FROM public.usuarios u
JOIN public.cargo c ON u.cargo_id = c.id
WHERE u.correo = 'email_del_usuario' AND u."contraseña" = 'password_del_usuario';*/

?>