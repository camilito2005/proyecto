<?php
$port = "5432";
$host ="localhost";
$dbname = "pagina";
$user = "postgres";
$contraseña = "camilo";

$conexion = pg_connect("dbname = $dbname user=$user password=$contraseña port= $port host=$host");
/* verificar la conexión */
if ($conexion) {
    echo "conexion exitosa";
}
else {
    if (!$conexion) {
        echo "error";
    }
}

// if ($conexion=mysqli_connect_error()) {

//     echo("error");
// } 
// else {
//     echo "no hay error";
// }

?>
