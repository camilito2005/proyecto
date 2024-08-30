<?php
function Menus()
{
    session_start();
    $menu = <<<HTML
    <!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/estilos7.css">
    <link rel="shortcut icon" href="fotos/buscador.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>PAGINA</title>
</head>

<body>
    <nav>
        <ul class="menu-horizontal">
HTML;
if (isset($_SESSION["correo"])) {
    $menu .= '<li>' . htmlspecialchars($_SESSION["correo"]) . '</li>';

    //htmlspecialchars Convierte caracteres especiales en entidades HTML
}
    $menu .= <<<HTML
            <li>
                <a href="./vistas/usuarios/usuarios.php">usuarios</a>
                <ul class="menu-vertical">
                    <li>
                        <a href="./vistas/usuarios/formulario_registro.php">registrar</a>
                    </li>

                </ul>

            </li>
            <li>
                <a href="./vistas/catalogo/catalogo.php">
                    <i>catalogo</i>
                </a>
            </li>
HTML;
if (!isset($_SESSION["correo"])) {
    $menu .= <<<HTML
            <li>
                <a href="./vistas/pagina-principal/login.php">
                    <i>iniciar sesión</i>
                    <ul class="menu-vertical">
                        <li>
                            <a href="./vistas/usuarios/formulario_registro.php">
                                <i>regístrate</i>
                            </a>
                        </li>
                    </ul>
                </a>
            </li>
HTML;
}
$menu .= <<<HTML
            <li>
                <a href="./vistas/facturas.php">
                    <i>facturas</i>
                </a>
            </li>
            <li>
                <a href="./vistas/catalogo/catalogo.php">productos

                    <ul class="menu-vertical">
                        <li>
                            <a href="./vistas/productos/verProductos.php">
                                <i>mis productos</i>
                            </a>
                        </li>
                        <li>
                        <a href="./vistas/productos/Productos.php">
                                <i>agregar Productos</i>
                            </a>
                        </li>
                    </ul>

                </a>
            </li>

        </ul>

    </nav>
        
    
    </div>
</body>
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
</html>
HTML;
    echo $menu;
}
function Graficas(){
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
}
?>