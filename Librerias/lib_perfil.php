<?php
function Perfil(){
    session_start();

    echo <<<HTML
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Perfil de Usuario</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../../css/perfil.css">
    </head>
    <body>
HTML;

    Menu();

    if ($_SESSION["descripcion"] === "Administrador") {
        echo "hola admin";
    } elseif ($_SESSION["descripcion"] === "Empleado") {
        echo "hola empleado";
    }

    echo <<<HTML
    <div class="container">
        <h1 class="center-align">Perfil de Usuario</h1>
        <div class="card">
            <div class="card-content">
                <span class="card-title">Información del Usuario</span>
HTML;

    if (isset($_SESSION["correo"])) {
        echo <<<HTML
            <p><strong>Cargo/Rol: {$_SESSION["descripcion"]}</strong></p>
            <p><strong>Identificador: {$_SESSION["id"]}</strong></p>
            <p><strong>Correo: {$_SESSION["correo"]}</strong></p>
            <p><strong>Nombre: {$_SESSION["nombre"]}</strong></p>
            <p><strong>Documento: {$_SESSION["dni"]}</strong></p>
            <div class="card-action">
                <a class="btn blue modal-trigger" href="#editModal">Editar</a>
                <a href="../usuarios/usuarios.php?accion=cerrar" class="btn red">Cerrar sesión</a>
            </div>
HTML;
    } else {
        echo <<<HTML
            <p>Para continuar, inicia sesión.</p>
            <a href="../pagina-principal/login.php" class="btn blue btn-login">Iniciar sesión</a>
HTML;
    }

    echo <<<HTML
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <h4>Editar Perfil</h4>
            <form action="./usuarios.php?accion=actualizar" method="POST">
            <div class="input-field">
                    <input type="text" name="nombre" value="{$_SESSION['id']}" required>
                    <label for="nombre">Identificador</label>
                </div>
                <div class="input-field">
                    <input type="text" name="nombre" value="{$_SESSION['nombre']}" required>
                    <label for="nombre">Nombre</label>
                </div>
                <div class="input-field">
                    <input type="email" name="correo" value="{$_SESSION['correo']}" required>
                    <label for="correo">Correo</label>
                </div>
                <div class="input-field">
                    <input type="password" name="contraseña" value="{$_SESSION['contraseña']}" required>
                    <label for="dni">Contraseña</label>
                </div>
                <div class="input-field">
                    <input type="text" name="dni" value="{$_SESSION['dni']}" required>
                    <label for="dni">Documento</label>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="modal-close btn green">Guardar</button>
                    <a href="#!" class="modal-close btn red">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

    <form id="myForm" action="../../index.php" method="post">
        <button class="btn btn-outline-secondary">
            <i class="fa-solid fa-house"></i> Inicio
        </button>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);
        });
    </script>
</body>
</html>
HTML;
}
?>