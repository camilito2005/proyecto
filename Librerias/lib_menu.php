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
                <a href="./vistas/usuarios/perfil.php">Perfil</a>
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
                <a class="dropdown-trigger" href="#!" data-target="productos-dropdown">Productos</a>
                <ul id="productos-dropdown" class="dropdown-content">
                    <li><a href="./vistas/productos/verProductos.php">Mis Productos</a></li>
                    <li><a href="./vistas/productos/Productos.php">Agregar Productos</a></li>
                </ul>
            </li>
HTML;
    } elseif (isset($_SESSION["descripcion"]) && $_SESSION["descripcion"] === "Empleado") {
        // Menú para Empleados
        echo <<<HTML
            <li>
                <a href="./vistas/mapa.php">Mapa</a>
            </li>
            <li><a href="./vistas/catalogo/catalogo.php">Catálogo</a></li>
            <li><a href="./vistas/facturas.php">Facturas</a></li>
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

    <canvas id="myChart" width="400" height="200"></canvas>
    <script>
        // Datos de estadísticas
        const labels = ["Enero", "Febrero", "Marzo", "Abril", "Mayo"];
        const data = [10, 20, 30, 40, 50]; // Cambia esto por los datos reales que tengas

        // Crear el gráfico
        var ctx = document.getElementById('myChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Meses',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
HTML;
}



function Menus1($ruta_css="./css/estilos7.css")
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
    <title>P</title>
</head>

<body>
    <nav class="blue-grey darken-4">
        <div class="nav-wrapper">
            <!--<a href="#" class="brand-logo">Mi Sitio</a>-->
            <ul id="nav-mobile" class="right hide-on-med-and-down">
HTML;

if (isset($_SESSION["correo"])) {

    echo '<li>' . htmlspecialchars($_SESSION["correo"]) . '</li>';
}

echo <<<HTML
            <li>
                <a href="./vistas/usuarios/perfil1.php">Perfil</a>
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
HTML;

if (!isset($_SESSION["correo"])) {
    echo <<<HTML
            <li>
                <a href="./vistas/pagina-principal/login.php">Iniciar Sesión</a>
                <ul class="dropdown-content">
                    <li><a href="./vistas/usuarios/formulario_registro.php">Regístrate</a></li>
                </ul>
            </li>
HTML;
}

echo <<<HTML
            <li><a href="./vistas/facturas.php">Facturas</a></li>
            <li>
                <a class="dropdown-trigger" href="#!" data-target="productos-dropdown">Productos</a>
                <ul id="productos-dropdown" class="dropdown-content">
                    <li><a href="./vistas/productos/verProductos.php">Mis Productos</a></li>
                    <li><a href="./vistas/productos/Productos.php">Agregar Productos</a></li>
                </ul>
            </li>
        </ul>
    </div>
    </nav>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.dropdown-trigger');
            var instances = M.Dropdown.init(elems);
        });
    </script>

    <canvas id="myChart" width="400" height="200"></canvas>
    <script>
        // Datos estáticos
        const labels = ["enero", "febrero", "marzo", "Abril", "Mayo"];
        const data = [10, 20, 30, 40, 50];

        // Crear el gráfico
        var ctx = document.getElementById('myChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'meses ',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
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