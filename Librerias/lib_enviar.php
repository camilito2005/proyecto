<?php

include_once "../conexion.php";

include './vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


try {


    $conexion = Conexion();

    if (!$conexion) {
        die('Error al conectar a la base de datos.');
    }

    if (!isset($_POST['correo'])) {
        die('Correo electrónico es requerido');
    }

    $correo = trim($_POST['correo']);

    $token = bin2hex(openssl_random_pseudo_bytes(32));
    $hora_expiracion = date('Y-m-d H:i:s', strtotime('+1 hour'));

                                        //Aquí, $1, $2 y $3 son los parámetros que se sustituyen con los valores de $correo, $token y $hora_expiracional ejecutar la consulta.
    $query = 'INSERT INTO password_reset (correo, token, expires_at) VALUES ($1, $2, $3)'; //son marcadores de posición que serán reemplazados por valores reales cuando se ejecute la consulta.
    $result = pg_query_params($conexion, $query, [$correo, $token, $hora_expiracion]); //ESTA ES MAS SEGURA EVITA INYERSIONES YA QUE NO LAS INGRESA DE UNA 

    if (!$result) {
        die('Error al insertar en la base de datos.');
    }

  
    

    $resetLink = "http://localhost/ti/vistas/usuarios/restablecer_contraseña.php?token=$token";


    $mail = new PHPMailer(true);
    
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPAuth = true;
    $mail->Username = 'camilitomarrugobarrios.02@gmail.com'; 
    $mail->Password = 'camilito'; 
    $mail->SMTPSecure = 'tls'; 
    $mail->Port = 587; 

    
    $mail->setFrom('no-reply@camilitomarrugobarrios.02@gmail.com', 'No Reply');
    $mail->addAddress($correo); 

    
    $mail->isHTML(true);
    $mail->Subject = 'Restablecer Contraseña';
    $mail->Body    = "Para restablecer tu contraseña, por favor haz clic en el siguiente enlace: <a href=\"$resetLink\">Restablecer contraseña</a>";
    $mail->AltBody = "Para restablecer tu contraseña, por favor haz clic en el siguiente enlace: $resetLink";

    
    $mail->send();
    echo 'Hemos enviado un enlace para restablecer tu contraseña...';
    echo ' <br>  <a href="../vistas/pagina-principal/login.php">volver </a>';
} catch (Exception $e) {
    echo "Hubo un problema al enviar el correo. Mailer Error: {$mail->ErrorInfo}";
}

pg_close($conexion);

?>