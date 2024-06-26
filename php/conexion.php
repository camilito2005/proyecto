<?php
$conexion = new mysqli("localhost", "root", "", "pagina");
/* verificar la conexión */
if (mysqli_connect_errno()) {
    echo ("Falló la conexión failed: %s\n" + $mysqli->connect_error);
    exit();
}

// if ($conexion=mysqli_connect_error()) {

//     echo("error");
// } 
// else {
//     echo "no hay error";
// }

?>
