<?php
function filtro() {

date_default_timezone_set('America/Bogota');
    include_once "../../conexion.php";
    $conexion = Conexion();

    // Definir variables iniciales
    $fecha_inicio = '';
    $fecha_final = '';

    // Solo procesar si se ha enviado el formulario con GET
    if (isset($_GET['fecha_inicio']) && isset($_GET['fecha_final'])) {
        $fecha_inicio = $_GET['fecha_inicio'];
        $fecha_final = $_GET['fecha_final'];

        // Validar que las fechas no estén vacías
        if (empty($fecha_inicio) || empty($fecha_final)) {
            echo "Por favor, seleccione un rango de fechas válido.";
            return;
        }

        // Formatear las fechas
        $fecha_inicio = date('Y-m-d', strtotime($fecha_inicio));
        $fecha_final = date('Y-m-d', strtotime($fecha_final));

    }

    $hora = date('H');  // Hora en formato 24h
    $minutos = date('i');  // Minutos
    $segundos = date('s');  // Segundos
    
    // Mostrar los valores
    echo "<br>hora: " . $hora;
    echo "<br>minuto: " . $minutos;
    echo "<br>segundo: " . $segundos;

    // Mostrar el formulario siempre, ya sea antes o después de la consulta
    echo <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas de Productos Vendidos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            font-size: 16px;
            margin-right: 10px;
        }
        input[type="date"] {
            padding: 8px;
            font-size: 14px;
            margin-right: 10px;
        }
        button {
            padding: 10px 15px;
            font-size: 14px;
            background-color: #5cb85c;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #4cae4c;
        }
        table {
            width: 60%;
            margin: 0 auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

    <h2>Estadísticas de Productos Vendidos</h2>

    <!-- Formulario para seleccionar fechas -->
    <form action="estadisticas.php" method="GET">
        <label for="fecha_inicio">Fecha Inicio:</label>
        <input type="date" id="fecha_inicio" name="fecha_inicio" value="{$fecha_inicio}" required>
        
        <label for="fecha_final">Fecha Fin:</label>
        <input type="date" id="fecha_final" name="fecha_final" value="{$fecha_final}" required>
        
        <button type="submit">Filtrar</button>
    </form>
HTML;

    // Solo ejecutar la consulta si se han enviado las fechas
    if (!empty($fecha_inicio) && !empty($fecha_final)) {
        // Consulta SQL con las fechas pasadas como variables
        $consulta = <<<SQL
            SELECT 
                f.id AS factura_id,
                f.producto_id,
                p.nombre AS nombre_producto,
                f.stock,
                f.precio,
                f.total,
                f.fecha,
                f.cliente_correo
            FROM 
                facturas f
            JOIN 
                productos p
            ON 
                f.producto_id = p.id
            WHERE 
                f.fecha BETWEEN '$fecha_inicio' AND '$fecha_final';
SQL;
//echo $consulta;

        // Ejecutar la consulta
        $resultado = pg_query($conexion, $consulta);

        // Convertir resultados a un array para usar con foreach
        $resultados_array = pg_fetch_all($resultado);

        // Mostrar la tabla de resultados
        echo <<<HTML
        <table>
            <thead>
                <tr>
                    <th>ID Factura</th>
                    <th>Producto</th>
                    <th>Cantidad Vendida</th>
                    <th>Precio</th>
                    <th>Total</th>
                    <th>Fecha</th>
                    <th>Cliente</th>
                </tr>
            </thead>
            <tbody>
HTML;

        // Verificar si hay resultados
        if ($resultados_array) {
            // Iterar sobre los resultados con foreach
            foreach ($resultados_array as $fila) {
                echo <<<HTML
                <tr>
                    <td>{$fila['factura_id']}</td>
                    <td>{$fila['nombre_producto']}</td>
                    <td>{$fila['stock']}</td>
                    <td>{$fila['precio']}</td>
                    <td>{$fila['total']}</td>
                    <td>{$fila['fecha']}</td>
                    <td>{$fila['cliente_correo']}</td>
                </tr>
HTML;
            }
        } else {
            // Si no hay resultados
            echo <<<HTML
                <tr>
                    <td colspan="7">No se encontraron productos vendidos en este rango de fechas.</td>
                </tr>
HTML;
        }

        echo <<<HTML
            </tbody>
        </table>
HTML;
    }

    echo <<<HTML
</body>
</html>
HTML;
}

//filtro();
?>
