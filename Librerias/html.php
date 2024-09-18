<?php
include_once "../conexion.php";
session_start();

$correo = isset($_SESSION["correo"]) ? htmlspecialchars($_SESSION["correo"]) : null;

echo <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <style>
        .form-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #fff;
        }
    </style>
</head>
<body>
    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo center">Facturas</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
HTML;

if ($correo) {
    echo <<<HTML
            <li><a href="./usuarios/usuarios.php?accion=cerrar" class="btn red">Cerrar sesión</a></li>
            <li><span class="white-text">Bienvenido, $correo</span></li>
HTML;
} else {
    echo <<<HTML
            <li><a href="./pagina-principal/login.php" class="btn grey">Iniciar sesión</a></li>
HTML;
}

echo <<<HTML
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h4 class="center-align">Realizar Factura</h4>
        <div class="form-container">
            <form action="" method="post" class="bg-light p-4">
                <div class="input-field">
                    <select id="producto" name="producto" onchange="cargarDatos()">
                        <option value="" disabled selected>Seleccionar</option>
HTML;

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
                    <label for="producto">Producto</label>
                </div>

                <div class="input-field">
                    <input type="text" id="nombre" name="nombre" readonly>
                    <label for="nombre">Nombre</label>
                </div>

                <div class="input-field">
                    <input type="text" id="descripcion" name="descripcion" readonly>
                    <label for="descripcion">Descripción</label>
                </div>

                <div class="input-field">
                    <input type="number" id="cantidad" name="cantidad" min="1" onchange="calcularTotal()">
                    <label for="cantidad">Cantidad</label>
                </div>

                <div class="input-field">
                    <input type="text" id="precio" name="precio" readonly>
                    <label for="precio">Precio</label>
                </div>

                <div class="input-field">
                    <input type="text" id="total" name="total" readonly>
                    <label for="total">Total</label>
                </div>

                <button type="submit" class="btn blue">Realizar Factura</button>
            </form>
        </div>
    </div>
</body>
</html>
HTML;

function FormularioFactura() {
        include_once "../conexion.php";
        session_start();
    
        date_default_timezone_set('America/Bogota');
        $fecha = date('Y-m-d g:i:s');
    
        $correo = isset($_SESSION["correo"]) ? htmlspecialchars($_SESSION["correo"]) : null;
    
        echo <<<HTML
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Facturas</title>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            <style>
                .form-container {
                    max-width: 600px;
                    margin: auto;
                    padding: 20px;
                    border: 1px solid #ccc;
                    border-radius: 10px;
                    background-color: #fff;
                }
            </style>
        </head>
        <body>
            <nav>
                <div class="nav-wrapper">
                    <a href="#" class="brand-logo center">Facturas</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
HTML;
    
        if ($correo) {
            echo <<<HTML
                    <li><form action="./usuarios/usuarios.php?accion=cerrar" onsubmit="showLoading()" method="post" class="mb-0">
                        <button type="submit" name="cerrar" class="btn red">Cerrar sesión</button>
                    </form></li>
                    <li><span class="white-text">Bienvenido, $correo</span></li>
                </ul>
            </nav>
    
            <div class="container mt-5">
                <h4 class="center-align">Realizar Factura</h4>
                <div class="form-container">
                    <form action="facturas.php?accion=factura" method="post" class="bg-light p-4">
                        <div class="input-field">
                        <select id="producto" name="producto" onchange="cargarDatos()">
                            <option value="" disabled selected>Seleccionar</option>
HTML;

    
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
                            <label for="producto">Producto</label>
                        </div>
    
                        <div class="input-field">
                        <input type="text" id="nombre" required name="nombre" readonly>
                        <label for="nombre">Nombre</label>
                    </div>
    
                        <div class="input-field">
                            <input type="text" id="descripcion" required name="descripcion" readonly>
                            <label for="descripcion">Descripción</label>
                        </div>
    
                        <div class="input-field">
                            <input type="number" id="cantidad" required name="cantidad" min="1" onchange="calcularTotal()">
                            <label for="cantidad">Cantidad</label>
                        </div>
    
                        <div class="input-field">
                            <input type="text" id="precio" required name="precio" readonly>
                            <label for="precio">Precio</label>
                        </div>
    
                        <div class="input-field">
                            <input type="text" id="total" required name="total" readonly>
                            <label for="total">Total</label>
                        </div>
    
                        <button type="submit" class="btn blue">Realizar Factura</button>
                    </form>
                </div>
                <form id="myForm" action="../index.php" onsubmit="showLoading()" method="post" class="mt-4">
                    <button class="btn btn-outline-secondary" value="inicio">
                        <i class="fa-solid fa-house"></i>
                    </button>
                </form>
            </div>
HTML;
    
        } else {
            // Mensaje para usuarios no autenticados
            echo <<<HTML
            </ul>
            </nav>
    
            <div class="container mt-5">
                <h4 class="center-align">Acceso Denegado</h4>
                <p class="center-align">Inicia sesión para continuar.</p>
                <div class="mt-4 text-center">
                    <a href="./pagina-principal/login.php" class="btn grey">Iniciar sesión</a>
                </div>
                <form id="myForm" action="../index.php" onsubmit="showLoading()" method="post">
                    <button class="btn btn-outline-secondary" value="inicio">
                        <i class="fa-solid fa-house"></i>
                    </button>
                </form>
            </div>
HTML;
    }
    
}
?>
