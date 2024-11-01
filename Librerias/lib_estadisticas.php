<?php
    function Estadisticas(){
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

    function Masventas_old() {
        include_once "../../conexion.php";
        $conexion = Conexion();
    
        $query = "
            SELECT 
                f.producto_id,
                p.nombre AS nombre_producto,
                SUM(f.stock) AS total_vendido
            FROM 
                facturas f
            JOIN 
                productos p ON f.producto_id = p.id
            GROUP BY 
                f.producto_id, p.nombre
            ORDER BY 
                total_vendido DESC
            LIMIT 10;
        ";
    
        $resultado = pg_query($conexion, $query);
        if (!$resultado) {
            die("Error en la consulta: " . pg_last_error($conexion));
        }
    
        $productos_mas_vendidos = pg_fetch_all($resultado);
    
        echo <<<HTML
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Estadísticas de Productos Más Vendidos</title>
        </head>
        <body>
            <h2>Top 5 Productos Más Vendidos</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID Producto</th>
                        <th>Nombre Producto</th>
                        <th>Total Vendido</th>
                    </tr>
                </thead>
                <tbody>
HTML;
    
        if ($productos_mas_vendidos) {
            foreach ($productos_mas_vendidos as $producto) {
                echo <<<HTML
                    <tr>
                        <td>{$producto['producto_id']}</td>
                        <td>{$producto['nombre_producto']}</td>
                        <td>{$producto['total_vendido']}</td>
                    </tr>
HTML;
            }
        } else {
            echo <<<HTML
                <tr>
                    <td colspan="3">No se encontraron resultados.</td>
                </tr>
HTML;
        }
    
        echo <<<HTML
                </tbody>
            </table>
        </body>
        </html>
HTML;
    
        pg_close($conexion);
    }

    function Masventas() {
        include_once "../../conexion.php";
        $conexion = Conexion();
    
        $query = "
            SELECT 
                p.nombre AS nombre_producto,
                SUM(f.stock) AS total_vendido
            FROM 
                facturas f
            JOIN 
                productos p ON f.producto_id = p.id
            GROUP BY 
                p.nombre
            ORDER BY 
                total_vendido DESC
            LIMIT 10;
        ";
    
        $resultado = pg_query($conexion, $query);
        if (!$resultado) {
            die("Error en la consulta: " . pg_last_error($conexion));
        }
    
        $productos_mas_vendidos = pg_fetch_all($resultado);
        
        // Preparar datos para Chart.js
        $productos = [];
        $totales = [];
        
        if ($productos_mas_vendidos) {
            foreach ($productos_mas_vendidos as $producto) {
                $productos[] = $producto['nombre_producto'];
                $totales[] = $producto['total_vendido'];
            }
        }
    
        // Convertir los datos a JSON
        $productos_json = json_encode($productos);
        $totales_json = json_encode($totales);
    
        pg_close($conexion);
    
        echo <<<HTML
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Estadísticas de Productos Más Vendidos</title>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        </head>
        <body>
            <h2>Top 10 Productos Más Vendidos</h2>
            <canvas id="chartProductos"></canvas>
            <script>
                var ctx = document.getElementById('chartProductos').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'bar', // Puedes cambiar a 'line', 'pie', etc.
                    data: {
                        labels: $productos_json,
                        datasets: [{
                            label: 'Total Vendido',
                            data: $totales_json,
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
    
    
?>