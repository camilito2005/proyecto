<?php
session_start();

// Verifica si el usuario está autenticado
if (!isset($_SESSION["correo"])) {
    header("Location: ../pagina-principal/login.php"); // Redirige a la página de inicio de sesión si no está autenticado
    exit();
}

$correo = isset($_SESSION["correo"]) ? htmlspecialchars($_SESSION["correo"]) : null;
        $nombre_sesion = isset($_SESSION["nombre"]) ? htmlspecialchars($_SESSION["nombre"]) : null;
        $dni_sesion = isset($_SESSION["dni"]) ? htmlspecialchars($_SESSION["dni"]) : null;
        $contraseña = isset($_SESSION["contraseña"]) ? htmlspecialchars($_SESSION["contraseña"]) : null;
        
echo <<<HTML

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
        }
        .card {
            margin-top: 20px;
        }
        .btn-logout {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <nav class="blue-grey darken-3">
        <div class="container">
            <!--<a href="#" class="brand-logo">Mi Aplicación</a>-->
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="catalogo/catalogo.php">Catálogo</a></li>
                <li><a href="logout.php">Cerrar sesión</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1 class="center-align">Perfil de Usuario</h1>
        <div class="card">
            <div class="card-content">
                <span class="card-title">Información del Usuario</span>
                <p class="text-center">correo: $correo</p>
                <p class="text-center">nombre: $nombre_sesion</p>
                <p class="text-center">documento: $dni_sesion</p>
                <!-- Puedes agregar más información del usuario aquí -->
            </div>
            <div class="card-action">
                <a href="#" class="btn blue btn-logout">editar</a>
                <a href="logout.php" class="btn red btn-logout">Cerrar sesión</a>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
HTML;
?>
