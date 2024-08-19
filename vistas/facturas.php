<!-- <?php
session_start();
if (isset($_SESSION["correo"])) {
   echo '<p class="text-center">Bienvenido, ' . htmlspecialchars($_SESSION["correo"]) . '</p>';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilo personalizado para limitar el ancho máximo del formulario */
        .form-container {
            max-width: 600px;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <?php if (isset($_SESSION["correo"])): ?>
            <form action="../controlador/carrito.php" method="post" class="mb-4">
                <button type="submit" name="cerrar" class="btn btn-danger">Cerrar sesión</button>
            </form>
        <?php endif; ?>

        <h4 class="text-center mb-4">Facturas</h4>

        <div class="form-container">
            <form action="" method="post" class="bg-light p-4 rounded shadow">
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono">
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" id="direccion" name="direccion">
                </div>
                <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="email" class="form-control" id="correo" name="correo">
                </div>
                <div class="form-group">
                    <label for="hora">Hora</label>
                    <input type="text" class="form-control" id="hora" name="hora">
                </div>
                <div class="form-group">
                    <label for="cliente">Cliente</label>
                    <input type="text" class="form-control" id="cliente" name="cliente">
                </div>
                <div class="form-group">
                    <label for="vendedor">Vendedor</label>
                    <input type="text" class="form-control" id="vendedor" name="vendedor">
                </div>
                <div class="form-group">
                    <label for="producto">Producto</label>
                    <select class="form-control" id="producto" name="producto">
                        <option value="" disabled selected>Seleccionar</option>
                        <?php 
                        $conexion = new mysqli("localhost", "root", "", "pagina");
                        $datos = mysqli_query($conexion, "SELECT * from productos");

                        while ($d = mysqli_fetch_assoc($datos)) {
                            echo '<option value="' . htmlspecialchars($d["nombre"]) . '">' . htmlspecialchars($d["nombre"]) . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Realizar Factura</button>
            </form>
        </div>

        <div class="mt-4 text-center">
            <a href="./pagina-principal/login.php" class="btn btn-secondary">Inicio de sesión</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html> -->

<?php

include_once "../conexion.php";
session_start();

// Verificar si el usuario está autenticado y mostrar el correo
$correo = isset($_SESSION["correo"]) ? htmlspecialchars($_SESSION["correo"]) : null;

// Generar el contenido HTML usando Heredoc
echo <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilo personalizado para limitar el ancho máximo del formulario */
        .form-container {
            max-width: 600px;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
HTML;

// Mostrar botón de cerrar sesión si el usuario está autenticado
if ($correo) {
    echo <<<HTML
        <form action="../controlador/carrito.php" method="post" class="mb-4">
            <button type="submit" name="cerrar" class="btn btn-danger">Cerrar sesión</button>
        </form>
        <p class="text-center">Bienvenido, $correo</p>
HTML;
}

// Mostrar formulario de facturación
echo <<<HTML
        <h4 class="text-center mb-4">Facturas</h4>

        <div class="form-container">
            <form action="" method="post" class="bg-light p-4 rounded shadow">
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono">
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" id="direccion" name="direccion">
                </div>
                <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="email" class="form-control" id="correo" name="correo">
                </div>
                <div class="form-group">
                    <label for="hora">Hora</label>
                    <input type="text" class="form-control" id="hora" name="hora">
                </div>
                <div class="form-group">
                    <label for="cliente">Cliente</label>
                    <input type="text" class="form-control" id="cliente" name="cliente">
                </div>
                <div class="form-group">
                    <label for="vendedor">Vendedor</label>
                    <input type="text" class="form-control" id="vendedor" name="vendedor">
                </div>
                <div class="form-group">
                    <label for="producto">Producto</label>
                    <select class="form-control" id="producto" name="producto">
                        <option value="" disabled selected>Seleccionar</option>
HTML;

// Conectar a la base de datos y mostrar opciones de productos
$conexion = Conexion();
$datos = pg_query($conexion, "SELECT * FROM productos");

while ($d = pg_fetch_array($datos)) {
    $nombre = htmlspecialchars($d["nombre"]);
    echo <<<HTML
                        <option value="$nombre">$nombre</option>
HTML;
}

echo <<<HTML
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Realizar Factura</button>
            </form>
        </div>
HTML;
if (!$correo) {
    echo <<<HTML
    <div class="mt-4 text-center">
            <a href="./pagina-principal/login.php" class="btn btn-secondary">Inicio de sesión</a>
        </div>
    </div>
HTML;
}
echo <<<HTML
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
HTML;
?>
