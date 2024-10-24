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
    <form method="GET">
        <label for="fecha_inicio">Fecha Inicio:</label>
        <input type="date" id="fecha_inicio" name="fecha_inicio" value="<?php echo htmlspecialchars($fecha_inicio); ?>" required>
        
        <label for="fecha_fin">Fecha Fin:</label>
        <input type="date" id="fecha_fin" name="fecha_fin" value="<?php echo htmlspecialchars($fecha_fin); ?>" required>
        
        <button type="submit">Filtrar</button>
    </form>

    <!-- Tabla de resultados -->
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad Vendida</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($resultados)) : ?>
                <?php foreach ($resultados as $fila) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($fila['nombre_producto']); ?></td>
                        <td><?php echo htmlspecialchars($fila['productos_vendidos']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="2">No se encontraron productos vendidos en este rango de fechas.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>