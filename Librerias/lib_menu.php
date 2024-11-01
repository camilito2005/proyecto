<?php
function Menus($ruta_css="./css/estilos7.css")
{
    session_start();
    echo <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link rel="stylesheet" href="$ruta_css">
    <link rel="shortcut icon" href="fotos/house.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Agregar Chart.js -->
    <title>P</title>
</head>

<body>
    <nav class="blue-grey darken-4">
        <div class="nav-wrapper">
            <ul id="nav-mobile" class="right hide-on-med-and-down">
HTML;

    // Mostrar el correo si el usuario está logueado
    if (isset($_SESSION["correo"])) {
        echo '<li>' . htmlspecialchars($_SESSION["correo"]) . '</li>';
    }

    // Menú para Administradores
    if (isset($_SESSION["descripcion"]) && $_SESSION["descripcion"] === "Administrador") {
        echo <<<HTML
            <li>
                <a href="./vistas/usuarios/perfil.php">Perfill</a>
            </li>
            <li>
                <a href="./vistas/productos/estadisticas.php">Estadisticas</a>
            </li>
            <li>
                <a href="./vistas/productos/estadisticas.php?accion=masvendidos">mas vendidos</a>
            </li>
            <li>
                <a href="./vistas/mapa.php">Mapa</a>
            </li>
            <li>
                <a href="./vistas/usuarios/usuarios.php">Usuarios</a>
                <ul class="dropdown-content">
                    <li><a href="./vistas/usuarios/formulario_registro.php">Registrar</a></li>
                </ul>
            </li>
            <li><a href="./vistas/catalogo/catalogo.php">Catálogo</a></li>
            <li><a href="./vistas/facturas.php">Facturas</a></li>
            <li>
                <li><a href="./vistas/productos/verProductos.php">Mis Productos</a></li>
                    
                    <li><a href="./vistas/productos/Productos.php">Agregar Productos</a></li>
            </li>
HTML;
    } elseif (isset($_SESSION["descripcion"]) && $_SESSION["descripcion"] === "Empleado") {
        // Menú para Empleados
        echo <<<HTML
            <li>
                <a href="./vistas/mapa.php">Mapa</a>
            </li>
            <li><a href="./vistas/catalogo/catalogo.php">Catálogo</a></li>
            <!--<li><a href="./vistas/facturas.php">Facturas</a></li>-->
HTML;
    } else {
        // Menú para Usuarios no logueados
        echo <<<HTML
            <li>
                <a href="./vistas/pagina-principal/login.php">Iniciar Sesión</a>
                <ul class="dropdown-content">
                    <li><a href="./vistas/usuarios/formulario_registro.php">Regístrate</a></li>
                </ul>
            </li>
            <li>
                <a href="./vistas/mapa.php">Mapa</a>
            </li>
            <li><a href="./vistas/catalogo/catalogo.php">Catálogo</a></li>
HTML;
    }

    // Botón de Cerrar Sesión
    if (isset($_SESSION["correo"])) {
        echo <<<HTML
            <li>
                <form action="./vistas/usuarios/usuarios.php?accion=cerrar" method="post" style="display:inline;">
                    <button type="submit" class="btn red" style="margin: 0;">Cerrar Sesión</button>
                </form>
            </li>
HTML;
    }

    echo <<<HTML
            </ul>
        </div>
    </nav>
</body>
</html>
HTML;
}



function Menus12($ruta_css = "./css/estilos7.css")
{
    session_start();
    include_once "./conexion.php";
    $conexion = Conexion();

    // Obtener todos los elementos del menú desde la base de datos
    $consulta_menu = "SELECT * FROM menu";
    $resultado_menu = pg_query($conexion, $consulta_menu);
    $menu_items = pg_fetch_all($resultado_menu);

    echo <<<HTML
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
        <link rel="stylesheet" href="$ruta_css">
        <link rel="shortcut icon" href="fotos/house.png" type="image/x-icon">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <title>P</title>
    </head>

    <body>
        <nav class="blue-grey darken-4">
            <div class="nav-wrapper">
                <ul id="nav-mobile" class="right hide-on-med-and-down">
HTML;

    if (isset($_SESSION["correo"])) {
        // Mostrar el correo si el usuario está logueado
        echo '<li>' . htmlspecialchars($_SESSION["correo"]) . '</li>';

        // Generar el menú de acuerdo con el rol del usuario
        foreach ($menu_items as $item) {
            if ($_SESSION["descripcion"] === "Administrador" && $item['rol'] === "Administrador") {
                echo <<<HTML
                    <li><a href="{$item['enlace']}">{$item['nombre']}</a></li>
HTML;
            } elseif ($_SESSION["descripcion"] === "Empleado" && $item['rol'] === "Empleado") {
                echo <<<HTML
                    <li><a href="{$item['enlace']}">{$item['nombre']}</a></li>
HTML;
            }
        }

        // Botón de Cerrar Sesión
        echo <<<HTML
            <li>
                <form action="./vistas/usuarios/usuarios.php?accion=cerrar" method="post" style="display:inline;">
                    <button type="submit" class="btn red" style="margin: 0;">Cerrar Sesión</button>
                </form>
            </li>
HTML;
    } else {
        // Mostrar opciones generales para usuarios no logueados
        foreach ($menu_items as $item) {
            if ($item['rol'] === "General") {
                echo <<<HTML
                    <li><a href="{$item['enlace']}">{$item['nombre']}</a></li>
HTML;
            }
        }
        // Agregar enlaces de inicio de sesión y registro
        echo <<<HTML
            <li><a href="./vistas/pagina-principal/login.php">Iniciar Sesión</a></li>
            <li><a href="./vistas/usuarios/formulario_registro.php">Registrarse</a></li>
HTML;
    }

    echo <<<HTML
                </ul>
            </div>
        </nav>
    </body>
    </html>
HTML;
}



function Menu(){
    session_start();

    echo <<<HTML
        <nav class="blue-grey darken-3">
        <div class="container">
            <!--<a href="#" class="brand-logo">Mi Aplicación</a>-->
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="#">Usuarios</a></li>
                <li><a href="#">Catálogo</a></li>
                <li><a href="#">Cerrar sesion</a></li>
                <li><a href="#">Productos</a></li>
                <li><a href="#">Catálogo</a></li>
            </ul>
        </div>
    </nav>
HTML;
    }

/*function Graficas(){
    require_once("pChart2.1.4/class/pData.class.php");
    require_once("pChart2.1.4/class/pDraw.class.php");
    require_once("pChart2.1.4/class/pImage.class.php");

    $categoria = ["enero","febrero", "marzo","abril","mayo","junio","julio"];
    $valores = [0,0,0,0,0,0,0]; 


    $data = new pData();
    $data->addPoints($valores, "Values");
    $data->addPoints($categoria, "Categories");
    $data->setSerieDescription("Categories", "Categories");
    $data->setAbscissa("Categories");

    $image = new pImage(700, 230, $data);
    $image->setFontProperties(["FontName" => "pChart2.1.4/fonts/Forgotte.ttf", "FontSize" => 10]);
    $image->setGraphArea(60, 40, 650, 190);
    $image->drawScale(["CycleBackground" => TRUE]);
    $image->drawBarChart();

    header("Content-Type: image/png");
    $image->render();
}*/
?>