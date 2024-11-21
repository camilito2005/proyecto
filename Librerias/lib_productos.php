<?php
$accion = $_GET["accion"];


function Insertar_productos()
{
    if (!empty($_POST["nombre"]) && !empty($_POST["descripcion"]) && !empty($_POST["precio"]) && !empty($_POST["cantidad"])) {
        date_default_timezone_set('America/Bogota');
        $datos = [
            "nombre" => $_POST["nombre"],
            "descripcion" => $_POST["descripcion"],
            "precio" => $_POST["precio"],
            "cantidad" => $_POST["cantidad"]
        ];
        $nombre = pg_escape_string($datos["nombre"]);
        $descripcion = pg_escape_string($datos["descripcion"]);
        $precio = pg_escape_string($datos["precio"]);
        $cantidad = pg_escape_string($datos["cantidad"]);
        $fecha_Actual = date('Y-m-d H:i');


        if (isset($_FILES["foto"])) {
            if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
                $archivo_temporal = $_FILES["foto"]["tmp_name"];
                $foto_nombre = basename($_FILES["foto"]["name"]);
                $directorio_destino = "../../../ti/fotos/";
                echo realpath('../../../ti/fotos/');

                //include "/Applications/XAMPP/htdocs/ti/fotos";
                //Aquí se verifica si se ha subido un archivo con el nombre 'foto'. Si es así, se obtienen el nombre del archivo y su ruta temporal. Se define el directorio destino donde se guardará el archivo.

                if (move_uploaded_file($archivo_temporal, $directorio_destino . $foto_nombre)) {
                    $foto = $directorio_destino . $foto_nombre;

                    include "../../conexion.php";
                    $conexion = Conexion();

                    $consulta = <<<SQL
                    INSERT INTO productos (nombre,descripcion,precio,stock,imagen,fecha_creacion)VALUES('$nombre','$descripcion','$precio','$cantidad','$foto','$fecha_Actual')
SQL;
echo $query;
                    $resultado = pg_query($conexion, $consulta);
                    if ($resultado) {
                        header("Location: ../catalogo/catalogo.php?accion=catalogo");
                        exit;
                    } else {
                        if (!$resultado)
                            echo "error";
                    }
                } else {
                    echo "error al subir la foto";
                }
            }
        }
    } else {
        echo "campos vacios , por favor llene los campos";
    }
}function Modificar_Productos()
{

    include("../../conexion.php");
    $conexion = Conexion();
    //$id = $_GET["id"];
    if (isset($_GET['id'])) {
        $id = base64_decode($_GET['id']);
        // Valida el id descifrado antes de usarlo en la consulta
    }
    $sql = <<<SQL
        SELECT * FROM productos WHERE id=$id
SQL;
    $consulta = pg_query($conexion, $sql);

    $html = <<<HTML
    
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d6ecbc133f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="../../css/fomu_productos.css"> -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modificar productos</title>
    </head>
    
    <body>
        <div class="contenedor">
            <form class="col-4 p-3 m-auto" action="productos.php?accion=actualizar&id=$id" method="post">
                <h3>modificar productos</h3>
                <input type="hidden" name="id" value="{$_GET['id']}">
HTML;
    while ($camilo = pg_fetch_object($consulta)) {
        $html .= <<<HTML
                    <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">id</label>
                            <input type="text" disabled class="form-control" name="id" value="{$camilo->id}" >
                        </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">nombre del producto</label>
                        <input type="text" class="form-control" name="nombre" value="{$camilo->nombre}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">descrpcion</label>
                        <input type="text" class="form-control" name="descripcion" value="{$camilo->descripcion}">
                    </div>
                    <div class="col-md-4">
                        <label for="precio" class="form-label">Precio:</label>
                        <input type="number" class="form-control" name="precio" value="{$camilo->precio}" id="precio"><br>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">cantidad</label>
                        <input type="number" class="form-control" name="cantidad"  value="{$camilo->stock}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label" required>foto</label>
                        <input type="file" class="form-control" disabled name="foto" value="{$camilo->imagen}">
                    </div>
    
                
HTML;
    }
    $html .= <<<HTML
                <button type="submit" class="btn btn-primary" name="modificar" value="modificar productos" class="btn btn-outline-secondary">
                    <i class="fa-solid fa-pen"></i>modificar
                </button>

                <!-- <button class="btn btn-outline-secondary">
                    <a href="../index.php"><i class="fa-solid fa-house"></i></a>inicio
                </button> -->
            </form>
            <button class="btn btn-outline-secondary">
                    <a href="../productos/verProductos.php?accion=verproductos"><i class="fa-solid fa-backward"></i></a>regresar
                </button>
        </div>
    </body>
    
    </html>
HTML;
echo $html;
}
function Actualizar_productos(){

    include_once "../../conexion.php";
    $conexion = Conexion();

    $id = $_GET["id"];
    $nombre_producto = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $cantidad = $_POST["cantidad"];
    $fecha_Actual = date('Y-m-d H:i');

    $sql=<<<SQL
    UPDATE productos SET nombre = '$nombre_producto', descripcion = '$descripcion', precio = '$precio', stock = '$cantidad',fecha_actualizacion ='$fecha_Actual' WHERE id = '$id'
SQL;
    $consulta = pg_query($conexion,$sql);
    if ($consulta) {
        header("Location: ./verProductos.php?accion=verproductos");
        exit;
    }
    else {
        echo "error";
    }
}

function Eliminar_productos()
{
    include_once "../../conexion.php";
    $conexion = Conexion();
    $id = $_GET['id'];
    if (isset($_GET['id'])) {
        $id = base64_decode($_GET['id']);
        // Valida el id descifrado antes de usarlo en la consulta
    }
    $consulta = <<<SQL
        DELETE FROM productos WHERE id = '$id'
SQL;

    $resultado = pg_query($conexion, $consulta);
    if ($resultado) {
        header("Location: ../productos/verProductos.php?accion=verproductos");
        exit;
    } else {
        echo "error";
    }
}


function Buscar($search) {
    if (!empty($search)) {
        include_once "../../conexion.php";
        $conexion = Conexion();

        if (!$conexion) {
            die("Error al conectar con la base de datos");
        }

        $consulta = <<<SQL
    SELECT 
        productos.id, 
        productos.nombre, 
        productos.descripcion, 
        productos.precio, 
        productos.stock
    FROM 
        productos
    WHERE 
        productos.nombre
         ILIKE $1
SQL;
$resultado_consulta = pg_query_params($conexion, $consulta, ["%$search%"]);

        if (!$resultado_consulta) {
            die("Error en la consulta");
        }

        $array = [];

        if (pg_num_rows($resultado_consulta) > 0) {
            $fila = pg_fetch_all($resultado_consulta);
            foreach ($fila as $filas) {
                $array[] = [
                    "id"      => $filas["id"],
                    "nombre"      => $filas["nombre"],
                    "descripcion"   => $filas["descripcion"],
                    "precio"    => $filas["precio"],
                    "stock"   => $filas["stock"]
                ];
            }
            echo json_encode($array);
        } else {
            echo json_encode([]); // Retorna un array vacío si no hay resultados
        }
    }
}
function Excel (){

// Crear el archivo Excel

    header ( "Pragma: " );
	header ( "Cache-Control: cache" );
	header ( "Content-type: application/x-msexcel" );
	header ( "Content-Disposition: attachment; filename=productos.xls" );
}

function Pdf()
{
    require '../../fpdf17/fpdf.php';
    include "../../conexion.php";
    $conexion = Conexion();

    // Consulta a la base de datos
    $resultado = pg_query($conexion, "SELECT * FROM productos");
    $productos = pg_fetch_all($resultado);

    // Crear un nuevo PDF
    $pdf = new FPDF();
    $pdf->AddPage();

    // Establecer márgenes
    $pdf->SetMargins(10, 10, 10);

    // Encabezado del PDF
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Lista de Productos', 0, 1, 'C');
    $pdf->Ln(10); // Espacio

    // Configuración de la tabla: Encabezados
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(10, 10, 'ID', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Imagen', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Nombre', 1, 0, 'C');
    $pdf->Cell(50, 10, 'Descripción', 1, 0, 'C');
    $pdf->Cell(25, 10, 'Precio', 1, 0, 'C');
    $pdf->Cell(20, 10, 'Stock', 1, 1, 'C');

    // Contenido de la tabla
    $pdf->SetFont('Arial', '', 12);
    if ($productos) {
        foreach ($productos as $producto) {
            // ID
            $pdf->Cell(10, 40, $producto['id'], 1, 0, 'C');

            // Imagen
            $imagen = '
            ' . $producto['imagen']; // Ajusta la ruta según la ubicación de las imágenes
            if (file_exists($imagen)) {
                // Guardar la posición actual
                $x = $pdf->GetX();
                $y = $pdf->GetY();

                // Añadir la imagen (ancho 30, alto 30)
                $pdf->Image($imagen, $x, $y, 30, 30);

                // Mover el cursor después de la imagen
                $pdf->Cell(30, 40, '', 1, 0);
            } else {
                // Si no hay imagen, dejar la celda vacía
                $pdf->Cell(30, 40, 'No Image', 1, 0, 'C');
            }

            // Nombre
            $pdf->Cell(40, 40, utf8_decode($producto['nombre']), 1, 0, 'C');

            // Descripción
            $pdf->Cell(50, 40, utf8_decode($producto['descripcion']), 1, 0, 'C');

            // Precio
            $precio_formateado = number_format($producto['precio'], 2);
            $pdf->Cell(25, 40, '$' . $precio_formateado, 1, 0, 'C');

            // Stock
            $pdf->Cell(20, 40, $producto['stock'], 1, 1, 'C'); // Cambiar a 1 para salto de línea
        }
    } else {
        // Si no hay productos, mostrar mensaje
        $pdf->Cell(155, 10, 'No hay productos disponibles.', 1, 1, 'C');
    }

    // Salida del PDF
    $pdf->Output('productos.pdf', 'I');
}


function Pdf1()
{
    require '../../fpdf17/fpdf.php';
    include "../../conexion.php";
    $conexion = Conexion();

    // Consulta a la base de datos
    $resultado = pg_query($conexion, "SELECT * FROM productos");
    $productos = pg_fetch_all($resultado);

    // Crear un nuevo PDF
    $pdf = new FPDF();
    $pdf->AddPage();

    // Encabezado del PDF
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Lista de Productos', 0, 1, 'C');
    $pdf->Ln(10); // Espacio

    // Configuración de la tabla
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(20, 10, 'ID', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Nombre', 1, 0, 'C');
    $pdf->Cell(80, 10, 'Descripcion', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Precio', 1, 0, 'C');
    $pdf->Cell(20, 10, 'Stock', 1, 1, 'C');

    // Contenido de la tabla
    $pdf->SetFont('Arial', '', 12);
    if ($productos) {
        foreach ($productos as $producto) {
            $precio_formateado = number_format($producto['precio']);
            $pdf->Cell(20, 10, $producto['id'], 1, 0, 'C');
            $pdf->Cell(40, 10, utf8_decode($producto['nombre']), 1, 0, 'C');
            $pdf->Cell(80, 10, utf8_decode($producto['descripcion']), 1, 0, 'C');
            $pdf->Cell(30, 10, $precio_formateado, 1, 0, 'C');
            $pdf->Cell(20, 10, $producto['stock'], 1, 1, 'C');
        }
    } else {
        $pdf->Cell(0, 10, 'No hay productos disponibles.', 1, 1, 'C');
    }

    // Salida del PDF
    $pdf->Output('productos.pdf', 'I');
}

?>