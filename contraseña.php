<?php
// Conectar a la base de datos
$pdo = new PDO('pgsql:host=localhost;dbname=pagina', 'postgres', 'camilo');
//include_once "./conexion.php";
//$conexion = Conexion();

if (!isset($_POST['correo'])) {
    die('Correo electrónico es requerido');
}

$correo = $_POST['correo'];

$token = bin2hex(random_bytes(32));
$hora_expiracion = date('Y-m-d H:i:s', strtotime('+1 hour'));

$stmt = $pdo->prepare('INSERT INTO Restablecer_contraseña (correo, token, expires_at) VALUES (?, ?, ?)');
$stmt->execute([$correo, $token, $hora_expiracion]);

$resetLink = "http://localhost/ti/vistas/usuarios/restablecer_contraseña.php?token=$token";

$to = $correo;
$subject = 'Restablecer Contraseña';
$message = "Para restablecer tu contraseña, por favor haz clic en el siguiente enlace: $resetLink";
$headers = 'From: no-reply@marrugobarrioscamilo2005@gmail.com' . "\r\n" .
           'Reply-To: no-reply@marrugobarrioscamilo2005@gmail.com' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
echo 'Hemos enviado un enlace para restablecer tu contraseña.';




$pdo = new PDO('pgsql:host=localhost;dbname=pagina', 'postgres', 'camilo');

//$conexion = Conexion();

if (!isset($_GET['token'])) {
    die('Token es requerido');
}

$token = $_GET['token'];

$stmt = $pdo->prepare('SELECT * FROM Restablecer_contraseña WHERE token = ? AND expires_at > NOW()');
$stmt->execute([$token]);
$reset = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$reset) {
    die('El token es inválido o ha expirado.');
}
?>

<form action="reset_password_action.php" method="post">
    <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
    <label for="password">Nueva Contraseña:</label>
    <input type="password" id="password" name="password" required>
    <button type="submit">Restablecer Contraseña</button>
</form>


<?php 

// Conectar a la base de datos
$pdo = new PDO('pgsql:host=localhost;dbname=pagina', 'postgres', 'camilo');

if (!isset($_POST['token']) || !isset($_POST['password'])) {
    die('Token y nueva contraseña son requeridos.');
}

$token = $_POST['token'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Verificar el token y obtener el correo
$stmt = $pdo->prepare('SELECT correo FROM Restablecer_contraseña WHERE token = ? AND expires_at > NOW()');
$stmt->execute([$token]);
$reset = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$reset) {
    die('El token es inválido o ha expirado.');
}

$correo = $reset['correo'];

// Actualizar la contraseña del usuario
$stmt = $pdo->prepare('UPDATE usuarios SET "contraseña" = ? WHERE correo = ?');
$stmt->execute([$password, $correo]);

// Eliminar el token
$stmt = $pdo->prepare('DELETE FROM Restablecer_contraseña WHERE token = ?');
$stmt->execute([$token]);

echo 'Contraseña actualizada exitosamente.';
// como hago un "restablecer contraseña " en php y postgres?
?>


