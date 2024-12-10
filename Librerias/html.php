<?php
ob_start();

require_once("../../fpdf17/fpdf.php");
function filtro($nombre_titulo = "Estadísticas de Productos Vendidos",$ruta_css="../../css/estadisticas.css", $titulo="Estadísticas de Productos Vendidos") {
    session_start();

date_default_timezone_set('America/Bogota');
    include_once "../../conexion.php";
    $conexion = Conexion();

    // Definir variables iniciales
    $fecha_inicio = '';
    $fecha_final = '';



    if ($_SESSION["descripcion"] === "Administrador") {
        $usuario = $_SESSION["nombre"];
    } elseif ($_SESSION["descripcion"] === "Empleado") {
        $usuario = $_SESSION["nombre"];
    }
    // Solo procesar si se ha enviado el formulario con GET
    if (isset($_POST['fecha_inicio']) && isset($_POST['fecha_final'])) {
        $fecha_inicio = $_POST['fecha_inicio'];
        $fecha_final = $_POST['fecha_final'];

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

    // Mostrar el formulario siempre, ya sea antes o después de la consulta
    echo <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>$nombre_titulo</title>
    <link rel="stylesheet" href="$ruta_css">
    <style>
    </style>
</head>
<body>

    <h2>$titulo</h2>

    <!-- Formulario para seleccionar fechas -->
    <form action="estadisticas.php?accion=filtro" method="POST">
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

                $precio = number_format($fila["precio"]);
                $total = number_format($fila["total"]);
                echo <<<HTML
                <tr>
                    <td>{$fila['factura_id']}</td>
                    <td>{$fila['nombre_producto']}</td>
                    <td>{$fila['stock']}</td>
                    <td>{$precio}</td>
                    <td>{$total}</td>
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

    <form action="estadisticas.php?accion=pdf" method="post" target="_blank">
        <input type="hidden" name="fecha_inicio" value="{$fecha_inicio}">
        <input type="hidden" name="fecha_final" value="{$fecha_final}">
        <button>pdf</button>
    </form>

    <form action="estadisticas.php?accion=Masventas" method="post">
        <button>mas ventas</button>
    </form>
HTML;

    }

    echo <<<HTML
    <form id="myForm" action="../../index.php" onsubmit="showLoading()" method="post">
            <button class="btn btn-outline-secondary" type="submit">
                <i class="fa-solid fa-house"></i> Inicio
            </button>
        </form>
</body>
</html>
HTML;
}

function Pdf1(){
ob_start();
    require_once("../../fpdf17/fpdf.php");

    session_start();
    include_once "../../conexion.php";
    $conexion = Conexion();

    if ($_SESSION["descripcion"] === "Administrador") {
        $usuario = $_SESSION["nombre"];
    } elseif ($_SESSION["descripcion"] === "Empleado") {
        $usuario = $_SESSION["nombre"];
    }

    // Verifica si se han pasado fechas en la sesión o por POST
if (isset($_POST['fecha_inicio']) && isset($_POST['fecha_final'])) {
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_final = $_POST['fecha_final'];

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

    $resultado = pg_query($conexion, $consulta);
    $resultados_array = pg_fetch_all($resultado);

    // Crear un nuevo PDF
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'Reporte de Productos Vendidos', 0, 1, 'C');

    // Cabecera de la tabla
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(20, 10, 'ID', 1);
    $pdf->Cell(40, 10, 'Producto', 1);
    $pdf->Cell(30, 10, 'Cantidad', 1);
    $pdf->Cell(25, 10, 'Precio', 1);
    $pdf->Cell(25, 10, 'Total', 1);
    $pdf->Cell(30, 10, 'Fecha', 1);
    $pdf->Cell(50, 10, 'Cliente', 1);
    $pdf->Cell(50, 10, 'usuario', 1);
    $pdf->Ln();

    $pdf->SetFont('Arial', '', 10);

    if ($resultados_array) {
        foreach ($resultados_array as $fila) {
            $pdf->Cell(20, 10, $fila['factura_id'], 1);
            $pdf->Cell(40, 10, $fila['nombre_producto'], 1);
            $pdf->Cell(30, 10, $fila['stock'], 1);
            $pdf->Cell(25, 10, $fila['precio'], 1);
            $pdf->Cell(25, 10, $fila['total'], 1);
            $pdf->Cell(30, 10, $fila['fecha'], 1);
            $pdf->Cell(50, 10, $fila['cliente_correo'], 1);
            $pdf->Cell(50, 10, $usuario, 1);
            $pdf->Ln();
        }
    } else {
        $pdf->Cell(0, 10, 'No se encontraron productos vendidos en este rango de fechas.', 1, 1, 'C');
    }
    $pdf->Output( 'usuarios.pdf','I');
    ob_end_flush(); 
}
}


function Pdf($fecha_inicio, $fecha_fin, $titulo) {
    // Crear instancia de FPDF
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    
    // Título del documento
    $pdf->Cell(200, 10, "$titulo", 0, 1, 'C');
    
    // Subtítulo con las fechas seleccionadas
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(200, 10, "Rango de Fechas: $fecha_inicio a $fecha_fin", 0, 1, 'C');
    
    // Espacio antes de la tabla
    $pdf->Ln(10);
    
    // Encabezado de la tabla
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(80, 10, 'Producto', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Total Vendido', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Total Dinero', 1, 1, 'C');
    
    // Inicializar variables para los totales
    $total_productos = 0;
    $total_dinero = 0;
    
    // Consultar los productos vendidos en el rango de fechas
    include_once "../../conexion.php";
    $conexion = Conexion();

    // Escapar las fechas para evitar inyecciones SQL
    $fecha_inicio = pg_escape_string($conexion, $fecha_inicio);
    $fecha_fin = pg_escape_string($conexion, $fecha_fin);

    $query = "SELECT 
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
                  p.nombre, p.precio 
              ORDER BY 
                  total_vendido DESC";
    
    $resultado = pg_query($conexion, $query);
    
    if (!$resultado) {
        $pdf->Cell(200, 10, "Error en la consulta: " . pg_last_error($conexion), 0, 1, 'C');
    } else {
        // Mostrar los resultados en la tabla
        $pdf->SetFont('Arial', '', 12);

        // Usar foreach para recorrer los resultados
        $productos_vendidos = pg_fetch_all($resultado);
        
        foreach ($productos_vendidos as $producto) {
            // Mostrar el nombre del producto, total vendido y total dinero
            $pdf->Cell(80, 10, $producto['nombre_producto'], 1, 0, 'C');
            $pdf->Cell(40, 10, $producto['total_vendido'], 1, 0, 'C');
            $pdf->Cell(40, 10, '$' . number_format($producto['total_dinero'], 2), 1, 1, 'C');
            
            // Acumular los totales
            $total_productos += $producto['total_vendido'];
            $total_dinero += $producto['total_dinero'];
        }
    }
    
    // Cerrar la conexión con la base de datos
    pg_close($conexion);

    // Espacio antes de los totales
    $pdf->Ln(10);

    // Mostrar el total de productos y el total de dinero
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(120, 10, 'Total Productos Vendidos:', 1, 0, 'C');
    $pdf->Cell(40, 10, $total_productos, 1, 1, 'C');

    $pdf->Cell(120, 10, 'Total Dinero Generado:', 1, 0, 'C');
    $pdf->Cell(40, 10, '$' . number_format($total_dinero, 2), 1, 1, 'C');

    // Generar el PDF
    $pdf->Output();
}

?>
