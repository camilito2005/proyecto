<?php

function Estadisticas()
{
    session_start();
    echo <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/estilos7.css">
    <link rel="shortcut icon" href="fotos/house.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Agregar Chart.js -->
    <title>Estadisticas</title>
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
        
    } elseif (isset($_SESSION["descripcion"]) && $_SESSION["descripcion"] === "Empleado") {
        // Menú para Empleados
        
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
     <form id="myForm" action="../../index.php" onsubmit="showLoading()" method="post">
            <button class="btn btn-outline-secondary" value="inicio">
            <i class="fa-solid fa-house"></i>
            </button>
        </form>
</body>
</html>
HTML;
}
function Estadistica(){
    $query = <<<SQL
    SELECT f.id, p.nombre_producto, fd.cantidad, fd.precio_unitario, fd.subtotal
    FROM facturas f
    JOIN factura_detalles fd ON f.id_factura = fd.id_factura
    JOIN productos p ON fd.id_producto = p.id_producto
    WHERE f.id_factura = 1;

SQL;

$filtro= <<<SQL
    SELECT p.nombre_producto, SUM(fd.cantidad) AS productos_vendidos
    FROM facturas f
    JOIN factura_detalles fd ON f.id = fd.id_factura
    JOIN productos p ON fd.id_producto = p.id
    WHERE f.fecha_venta BETWEEN '2024-01-01' AND '2024-12-31'  -- Rango de fechas a filtrar
    GROUP BY p.nombre_producto
    ORDER BY productos_vendidos DESC;

SQL;
}
?>