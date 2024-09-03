<?php
// conectar.php - archivo de conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    include_once('./conexion.php');
    $conexion = Conexion();
    
    // Buscar el usuario por correo electrónico
    $query = "SELECT id FROM usuarios WHERE correo = $1";
    $result = pg_query_params($conexion, $query, array($email));
    
    if (pg_num_rows($result) > 0) {
        // Generar un token único
        $token = bin2hex(random_bytes(32));
        $expiry = date("Y-m-d H:i:s", strtotime('+1 hour')); // El enlace es válido por 1 hora
        
        // Guardar el token en la base de datos
        $query = "INSERT INTO Restablecer_contraseña (correo, token, expire_at) VALUES ($1, $2, $3)";
        pg_query_params($conexion, $query, array($email, $token, $expiry));
        
        // Enviar correo electrónico con el enlace de restablecimiento
        $restablecimiento_url = "http://tu_dominio.com/restablecer_contrasena.php?token=$token";
        $asunto = "Restablecimiento de Contraseña";
        $mensaje = "Haz clic en el siguiente enlace para restablecer tu contraseña: $restablecimiento_url";
        $headers = "From: no-reply@tu_dominio.com";
        
        mail($email, $asunto, $mensaje, $headers);
        
        echo "Hemos enviado un enlace para restablecer tu contraseña a tu correo electrónico.";
    } else {
        echo "No encontramos un usuario con ese correo electrónico.";
    }
    
    pg_close($conexion);
}
?>
