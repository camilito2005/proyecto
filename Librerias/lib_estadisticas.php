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
        //echo $query;
    
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
            <h2>Top Productos Más Vendidos</h2>
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
                    <form id="myForm" action="../../index.php" onsubmit="showLoading()" method="post">
            <button class="btn btn-outline-secondary" type="submit">
                <i class="fa-solid fa-house"></i> Inicio
            </button>
        </form>
        </body>
        </html>
HTML;
    }
function Ventasxmes($titulo,$subtitulo) {

    $accion = $_REQUEST["accion"];

    if ($accion == "filtro") {
        $tipo_info = "dia";
    }
    elseif ($accion == "ventasxmes") {
        $tipo_info = "mes";
        
    }

    $horas = [];
for ($i = 0; $i < 24; $i++) {
    $horas[] = str_pad($i, 2, "0", STR_PAD_LEFT); // el propósito de "STR_PAD_LEFT" es especificar que el relleno (caracteres adicionales) debe agregarse al inicio (lado izquierdo) de una cadena, de modo que alcance una longitud específica.
}


$minutos = [];
for ($i = 0; $i < 60; $i++) {
    $minutos[] = str_pad($i, 2, "0", STR_PAD_LEFT); // el propósito de "STR_PAD_LEFT" es especificar que el relleno (caracteres adicionales) debe agregarse al inicio (lado izquierdo) de una cadena, de modo que alcance una longitud específica.
}
        echo<<<HTML
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>$titulo</title>
            <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="../../css/ventasxmes1.css">
            <style>
                .card {
                    margin-bottom: 20px;
                }
                .table-responsive {
                    margin-top: 20px;
                }
            </style>
        </head>
        
        <body>
            <div class="container mt-5">
                <h2 class="text-center">$subtitulo</h2>
                <form method="post" class="mt-4">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="fecha_inicio">Fecha de inicio</label>
                            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" required>

                            <label for="">horas iniciales:</label><br>
                            <!-- Crear el select y las opciones -->
                            <select name="horas_iniciales" id="horas-select">
HTML;
                                 foreach ($horas as $hora){
echo <<<HTML
                                    <option value="{$hora}">$hora</option>
HTML;
                                }
echo <<<HTML
                            </select>
                            
                            
                            <label for="">minutos iniciales:</label><br>
                            <!-- Crear el select y las opciones -->
                            <select name="minutos_iniciales" id="minutos-select">
HTML;
                                 foreach ($minutos as $minuto){
echo <<<HTML
                                    <option value="{$minuto}">$minuto</option>
HTML;
                                }
echo <<<HTML
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="fecha_fin">Fecha de fin</label>
                            <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" required>
                            <label for="">horas finales:</label><br>
                            <!-- Crear el select y las opciones -->
                            <select name="horas_finales" id="horas-select">
HTML;
                                 foreach ($horas as $hora){
echo <<<HTML
                                    <option value="{$hora}">$hora</option>
HTML;
                                }
echo <<<HTML
                            </select>
                            
                            
                            <label for="">minutos finales:</label><br>
                            <!-- Crear el select y las opciones -->
                            <select name="minutos_finales" id="minutos-select">
HTML;
                                 foreach ($minutos as $minuto){
echo <<<HTML
                                    <option value="{$minuto}">$minuto</option>
HTML;
                                }
echo <<<HTML
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Filtrar</button><br>
                </form>
    
HTML;
                // Procesar los datos del formulario si se han enviado
                if (isset($_POST['fecha_inicio']) && isset($_POST['fecha_fin'])) {
                    include_once "../../conexion.php";
                    $conexion = Conexion();
        
                    // Escapar las fechas para evitar inyecciones SQL
                    $fecha_inicio = pg_escape_string($conexion, $_POST['fecha_inicio']);
                    $fecha_fin = pg_escape_string($conexion, $_POST['fecha_fin']);
                    $hora_inicio = pg_escape_string($conexion, $_POST['horas_iniciales']);
                    $hora_fin = pg_escape_string($conexion, $_POST['horas_finales']);
                    $minutos_iniciales = pg_escape_string($conexion, $_POST['minutos_iniciales']);
                    $minutos_finales = pg_escape_string($conexion, $_POST['minutos_finales']);

                    $fecha_inicio= $fecha_inicio ." ".$hora_inicio.":".$minutos_iniciales.":00.000";
                    $fecha_fin = $fecha_fin." ".$hora_fin.":".$minutos_finales.":00.000";


                    // Consulta para obtener productos vendidos en el rango de fechas
                    $query = /*"
                        SELECT 
                            p.nombre AS nombre_producto,
                            SUM(f.stock) AS total_vendido
                        FROM 
                            facturas f
                        JOIN 
                            productos p ON f.producto_id = p.id
                        WHERE 
                            f.fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'
                        GROUP BY 
                            p.nombre
                        ORDER BY 
                            total_vendido DESC;
                    ";*/


                    "SELECT 
    p.nombre AS nombre_producto,
    p.precio AS precio_unitario,
    SUM(f.stock) AS total_vendido, 
    SUM(f.total) AS total_dinero
FROM 
    facturas f 
JOIN 
    productos p 
ON 
    f.producto_id = p.id 
WHERE 
    f.fecha >= '$fecha_inicio' 
    AND f.fecha < '$fecha_fin' 
GROUP BY 
    p.nombre,
    p.precio
ORDER BY 
    total_vendido DESC";
                    //echo $query;
        
                    $resultado = pg_query($conexion, $query);
                    if (!$resultado) {
                        echo "<div class='alert alert-danger'>Error en la consulta: " . pg_last_error($conexion) . "</div>";
                        exit;
                    }
        
                    $productos_vendidos = pg_fetch_all($resultado);
                    pg_close($conexion);

                    $total_productos = 0;
                    $total_dinero = 0;
                    
                    // Mostrar los resultados en tarjetas
                    if ($productos_vendidos) {
                        echo "<div class='row'>";
                        foreach ($productos_vendidos as $producto) {
                            $total_productos += $producto['total_vendido'];
                $total_dinero += $producto['total_dinero'];
                $total_formateado = number_format($total_dinero);

                            $Total_precio = number_format($producto['total_dinero']);
                            $precio_unitario = number_format($producto['precio_unitario']);
                            echo <<<HTML
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{$producto['nombre_producto']}</h5>
                                        <p class="card-text">Precio unitario : <strong>{$precio_unitario}</strong></p>
                                        <p class="card-text">Total generado : <strong>{$Total_precio}</strong></p>
                                        <p class="card-text">Total Vendido: <strong>{$producto['total_vendido']}</strong></p>
                                    </div>
                                </div>
                            </div>
HTML;

                        }
                        echo "</div>";
                    } else {
                        echo "<div class='alert alert-info'>No se encontraron productos vendidos en el rango de fechas seleccionado.</div>";
                    }
                }
                echo<<<HTML
                <p>total ventas: {$total_productos }</p>
                <p>total dinero: {$total_formateado}</p>

            <form action="estadisticas.php?accion=pdf" method="post" target="_blank">
                <input type="hidden" name="fecha_inicio" value="{$fecha_inicio}">
                <input type="hidden" name="fecha_fin" value="{$fecha_fin}">
                <input type="hidden" name="tipoinfo" value="{$tipo_info}">
                <button>pdf</button>
            </form>
            <!--<button class="btn btn-outline-secondary" type="submit">
                <i class="fa-solid fa-house"></i> pdf
            </button>-->
        </form>
            </div>
            <form id="myForm" action="../../index.php" onsubmit="showLoading()" method="post">
            <button class="btn btn-outline-secondary" type="submit">
                <i class="fa-solid fa-house"></i> Inicio
            </button>
        </form>
    
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </body>
        </html>
HTML;
}
?>