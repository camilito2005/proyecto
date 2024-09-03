<?php
// Conectar a la base de datos
$pdo = new PDO('pgsql:host=localhost;dbname=tu_basedatos', 'usuario', 'contraseña');

// Verificar que el correo electrónico esté presente
if (!isset($_POST['correo'])) {
    die('Correo electrónico es requerido');
}

$correo = $_POST['correo'];

// Generar un token único
$token = bin2hex(random_bytes(32));
$expires_at = date('Y-m-d H:i:s', strtotime('+1 hour'));

// Guardar el token en la base de datos
$stmt = $pdo->prepare('INSERT INTO public.password_resets (correo, token, expires_at) VALUES (?, ?, ?)');
$stmt->execute([$correo, $token, $expires_at]);

// Construir el enlace de restablecimiento
$resetLink = "http://tu_dominio/reset_password.php?token=$token";

// Enviar el correo electrónico
$to = $correo;
$subject = 'Restablecer Contraseña';
$message = "Para restablecer tu contraseña, por favor haz clic en el siguiente enlace: $resetLink";
$headers = 'From: no-reply@tu_dominio.com' . "\r\n" .
           'Reply-To: no-reply@tu_dominio.com' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
echo 'Hemos enviado un enlace para restablecer tu contraseña.';





// Conectar a la base de datos
$pdo = new PDO('pgsql:host=localhost;dbname=tu_basedatos', 'usuario', 'contraseña');

if (!isset($_GET['token'])) {
    die('Token es requerido');
}

$token = $_GET['token'];

// Verificar el token
$stmt = $pdo->prepare('SELECT * FROM public.password_resets WHERE token = ? AND expires_at > NOW()');
$stmt->execute([$token]);
$reset = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$reset) {
    die('El token es inválido o ha expirado.');
}

// Mostrar formulario de restablecimiento
?>
<form action="reset_password_action.php" method="post">
    <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
    <label for="password">Nueva Contraseña:</label>
    <input type="password" id="password" name="password" required>
    <button type="submit">Restablecer Contraseña</button>
</form>




<?php
// Conectar a la base de datos
$pdo = new PDO('pgsql:host=localhost;dbname=tu_basedatos', 'usuario', 'contraseña');

if (!isset($_POST['token']) || !isset($_POST['password'])) {
    die('Token y nueva contraseña son requeridos.');
}

$token = $_POST['token'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Verificar el token y obtener el correo
$stmt = $pdo->prepare('SELECT correo FROM public.password_resets WHERE token = ? AND expires_at > NOW()');
$stmt->execute([$token]);
$reset = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$reset) {
    die('El token es inválido o ha expirado.');
}

$correo = $reset['correo'];

// Actualizar la contraseña del usuario
$stmt = $pdo->prepare('UPDATE public.usuarios SET "contraseña" = ? WHERE correo = ?');
$stmt->execute([$password, $correo]);

// Eliminar el token
$stmt = $pdo->prepare('DELETE FROM public.password_resets WHERE token = ?');
$stmt->execute([$token]);

echo 'Contraseña actualizada exitosamente.';
// como hago un "restablecer contraseña " en php y postgres?
?>


