<?php
function Menus($ruta_css = "./css/estilos8.css")
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.dropdown-trigger');
            M.Dropdown.init(elems, { hover: true });
        });
    </script>
    <title>Inicio</title>
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
    if (!isset($_SESSION["correo"])) {
        echo <<<HTML
        <li><a href="./vistas/pagina-principal/login.php?accion=login">login</a></li>
HTML;
    }

    // Menú para Administradores
    //if (isset($_SESSION["descripcion"]) && $_SESSION["descripcion"] === "Administrador") {
        echo <<<HTML

            

            <li><a href="./vistas/usuarios/perfil.php?accion=perfil">Perfil</a></li>
            <li><a class="dropdown-trigger" href="" data-target="dropdownEstadisticas">Estadísticas<i class="material-icons right"></i></a></li>
            <ul id="dropdownEstadisticas" class="dropdown-content">
                <li><a href="./vistas/productos/estadisticas.php?accion=masvendidos">Mas Ventas</a></li>
                <li><a href="./vistas/productos/estadisticas.php?accion=ventasxmes">Ventas por mes</a></li>
                <li><a href="./vistas/productos/estadisticas.php?accion=filtro">Ventas por día</a></li>
            </ul>
            
            <li><a class="dropdown-trigger" href="#!" data-target="dropdownProductos">Productos<i class="material-icons right"></i></a></li>
            <ul id="dropdownProductos" class="dropdown-content">
                <li><a href="./vistas/productos/verProductos.php?accion=verproductos">Mostrar productos</a></li>
                <li><a href="./vistas/productos/Productos.php?accion=aggproductos">Agregar productos</a></li>
                <li><a href="./vistas/catalogo/catalogo.php?accion=catalogo">Catálogo</a></li>
            </ul>

            <li><a class="dropdown-trigger" href="#!" data-target="dropdownUsuarios">Usuarios<i class="material-icons right"></i></a></li>
            <ul id="dropdownUsuarios" class="dropdown-content">
                <li><a href="./vistas/usuarios/usuarios.php?accion=verusuarios">Ver usuarios</a></li>
                <li><a href="./vistas/usuarios/formulario_registro.php?accion=aggusuarios">Agregar usuarios</a></li>
            </ul>

            <li><a href="./vistas/mapa.php?accion=mapa">Mapa</a></li>
            <li><a href="./vistas/facturas.php?accion=verfacturas">Facturas</a></li>
HTML;
    //}

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


function Menus_responsive($ruta_css = "./css/estilos8.css")
{
    session_start();
    echo <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>
    <!-- Materialize CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link rel="stylesheet" href="$ruta_css">
    <!-- Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!-- Inicialización de Materialize -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elemsDropdown = document.querySelectorAll('.dropdown-trigger');
            M.Dropdown.init(elemsDropdown, { hover: true, constrainWidth: false });

            var elemsSidenav = document.querySelectorAll('.sidenav');
            M.Sidenav.init(elemsSidenav);
        });
    </script>
</head>
<body>
    <!-- Barra de Navegación -->
    <nav class="blue-grey darken-4">
        <div class="nav-wrapper container">
            <a href="#" data-target="mobile-menu" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
HTML;

    // Mostrar el correo si el usuario está logueado
    if (isset($_SESSION["correo"])) {
        echo '<li><a href="#!">' . htmlspecialchars($_SESSION["correo"]) . '</a></li>';
    } else {
        echo '<li><a href="./vistas/pagina-principal/login.php?accion=login">Login</a></li>';
    }

    // Submenús para Administradores
    if (isset($_SESSION["descripcion"]) && $_SESSION["descripcion"] === "Administrador") {
        echo <<<HTML
            <li><a href="./vistas/usuarios/perfil.php?accion=perfil">Perfil</a></li>
            <li><a class="dropdown-trigger" href="#!" data-target="dropdownEstadisticas">Estadísticas<i class="material-icons right"></i></a></li>
            <li><a class="dropdown-trigger" href="#!" data-target="dropdownProductos">Productos<i class="material-icons right"></i></a></li>
            <li><a class="dropdown-trigger" href="#!" data-target="dropdownUsuarios">Usuarios<i class="material-icons right"></i></a></li>
            <li><a href="./vistas/mapa.php?accion=mapa">Mapa</a></li>
            <li><a href="./vistas/facturas.php?accion=verfacturas">Facturas</a></li>
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

    <!-- Dropdown Menús -->
    <ul id="dropdownEstadisticas" class="dropdown-content">
        <li><a href="./vistas/productos/estadisticas.php?accion=masvendidos">Más Ventas</a></li>
        <li><a href="./vistas/productos/estadisticas.php?accion=ventasxmes">Ventas por Mes</a></li>
        <li><a href="./vistas/productos/estadisticas.php?accion=filtro">Ventas por Día</a></li>
    </ul>
    <ul id="dropdownProductos" class="dropdown-content">
        <li><a href="./vistas/productos/verProductos.php?accion=verproductos">Mostrar Productos</a></li>
        <li><a href="./vistas/productos/Productos.php?accion=aggproductos">Agregar Productos</a></li>
        <li><a href="./vistas/catalogo/catalogo.php?accion=catalogo">Catálogo</a></li>
    </ul>
    <ul id="dropdownUsuarios" class="dropdown-content">
        <li><a href="./vistas/usuarios/usuarios.php?accion=verusuarios">Ver Usuarios</a></li>
        <li><a href="./vistas/usuarios/formulario_registro.php?accion=aggusuarios">Agregar Usuarios</a></li>
    </ul>

    <!-- Menú Móvil -->
    <ul class="sidenav" id="mobile-menu">
HTML;
    echo '<li><a href="#!">' . htmlspecialchars($_SESSION["correo"]) . '</a></li>';
echo <<<HTML
        <li><a href="./vistas/pagina-principal/login.php?accion=login">Login</a></li>
        <li><a href="./vistas/usuarios/perfil.php?accion=perfil">Perfil</a></li>
        <li><a href="./vistas/mapa.php?accion=mapa">Mapa</a></li>
        <li><a href="./vistas/facturas.php?accion=verfacturas">Facturas</a></li>
        <li><a class="dropdown-trigger" href="#!" data-target="dropdownEstadisticas">Estadísticas</a></li>
        <li><a class="dropdown-trigger" href="#!" data-target="dropdownProductos">Productos</a></li>
        <li><a class="dropdown-trigger" href="#!" data-target="dropdownUsuarios">Usuarios</a></li>
        <li><a href="./vistas/usuarios/usuarios.php?accion=cerrar" class="red-text">Cerrar Sesión</a></li>
    </ul>

</body>
</html>
HTML;
}


function Menus12($ruta_css="./css/estilos7.css")
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



function Menu(){
    session_start();

    echo <<<HTML
        <nav class="blue-grey darken-3">
        <div class="container">
            <!--<a href="#" class="brand-logo">Mi Aplicación</a>-->
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="./usuarios.php?accion=verusuarios">Usuarios</a></li>
                <li><a href="../catalogo/catalogo.php?accion=catalogo">Catálogo</a></li>
                <li><a href="#">Cerrar sesion</a></li>
                <li><a href="../productos.php?accion=verproductos">Productos</a></li>
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