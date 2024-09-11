<?php

$accion=$_REQUEST["accion"];

$token = $_REQUEST["token"];
//include_once("../../Librerias/lib_HTML-U.php");
//include_once("../../Librerias/lib_usuarios.php");

if ($accion == "contraseña") {
    
    include_once "../../conexion.php";

    $conexion = conexion();

    if (!isset($_GET['token'])) {
        die('Token es requerido');
    }

    $token = $_GET['token'];

    //echo $token;

    // Usar parámetros de consulta para evitar inyecciones SQL
    $query = 'SELECT * FROM password_reset WHERE token = $1 AND expires_at > NOW()';
    $result = pg_query_params($conexion, $query, array($token));

    if (!$result) {
        die('Error en la consulta: ' . pg_last_error());
    }

    $reset = pg_fetch_assoc($result);

    if (!$reset) {
        die('El token es inválido o ha expirado.');
    }

    pg_free_result($result);
    pg_close($conexion);

    echo <<<HTML
    <form action="reset_password_action.php" method="post">
        <input type="hidden" name="token" value="$token">
        <label for="password">Nueva Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Restablecer Contraseña</button>
    </form>
HTML;
}


?>