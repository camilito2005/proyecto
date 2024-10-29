<?php
function Perfil() {
    session_start();
    include_once "../../conexion.php";
    $conexion = Conexion();

    $consulta_cargos = "SELECT id, descripcion FROM cargo";
    $resultado_cargos = pg_query($conexion, $consulta_cargos);
    $cargos = pg_fetch_all($resultado_cargos); // Convertimos a array para usar foreach
    

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

    // Variables de sesión
    $id = $_SESSION["id"];
    $dni = $_SESSION["dni"];
    $nombre = $_SESSION["nombre"];
    $apellido = $_SESSION["apellido"];
    $telefono = $_SESSION["telefono"];
    $direccion = $_SESSION["direccion"];
    $correo = $_SESSION["correo"];
    $contraseña = $_SESSION["contraseña"];
    $cargo_id = $_SESSION["cargo_id"];

    echo <<<HTML
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <h4>Editar Perfil</h4>
            <form action="../../librerias/lib_configuracion.php?accion=actualizar&id={$id}" method="POST">
            <!--<form action="perfil.php?accion=actualizar&id={$id}" method="POST">-->
                <div class="input-field">
                    <input disabled type="text" name="id" value="{$id}" required>
                    <label for="identificador">Identificador</label>
                </div>
                <div class="input-field">
                    <input type="hidden" name="id" value="{$id}" required>
                </div>
                <div class="input-field">
                    <input type="text" disabled name="dni" value="{$dni}" required>
                    <label for="dni">Documento</label>
                </div>
                <div class="input-field">
                    <input type="hidden" name="dni" value="{$dni}" required>
                </div>
                <div class="input-field">
                    <input type="text" name="nombre" value="{$nombre}" required>
                    <label for="nombre">Nombre</label>
                </div>
                <div class="input-field">
                    <input type="text" name="apellido" value="{$apellido}" required>
                    <label for="apellido">Apellidos</label>
                </div>
                <div class="input-field">
                    <input type="text" name="telefono" value="{$telefono}" required>
                    <label for="telefono">Teléfono</label>
                </div>
                <div class="input-field">
                    <input type="text" name="direccion" value="{$direccion}" required>
                    <label for="direccion">Dirección</label>
                </div>
                <div class="input-field">
                    <input type="email" name="correo" value="{$correo}" required>
                    <label for="correo">Correo</label>
                </div>
                <div class="input-field">
                    <input type="password" name="contraseña" value="{$contraseña}" required>
                    <label for="contraseña">Contraseña</label>
                </div>
HTML;

    echo '<div class="input-field">
    <label for="cargo">Cargo</label>
    <select class="browser-default" name="cargo_id">';

    // Usar foreach para iterar sobre los resultados
    foreach ($cargos as $cargo) {
    $id = $cargo['id'];
    $descripcion = $cargo['descripcion'];
    echo "<option value=\"$id\">$descripcion</option>"; // Crear opción
    }

    echo '    </select>
    </div>';
echo <<<HTML
                <!--<label for="cargo">Cargo</label>
                <div class="input-field">
                    
                    <select class="browser-default" name="cargo_id">
                        <option value="1">{$resultado_cargos}</option>
                        <option value="2">{$resultado_cargos}</option>
                    </select>
                </div>-->
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

//  {$cargo_id == 1 ? 'selected' : ''}   {$cargo_id == 2 ? 'selected' : ''}
?>