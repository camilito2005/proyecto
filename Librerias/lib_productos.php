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
        $fecha_Actual = date('Y-d-m H:i:s');


        if (isset($_FILES["foto"])) {
            if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
                $archivo_temporal = $_FILES["foto"]["tmp_name"];
                $foto_nombre = basename($_FILES["foto"]["name"]);
                $directorio_destino = "../../ti/fotos/";
                echo realpath('../../ti/fotos/');

                //include "/Applications/XAMPP/htdocs/ti/fotos";
                //Aquí se verifica si se ha subido un archivo con el nombre 'foto'. Si es así, se obtienen el nombre del archivo y su ruta temporal. Se define el directorio destino donde se guardará el archivo.

                if (move_uploaded_file($archivo_temporal, $directorio_destino . $foto_nombre)) {
                    $foto = $directorio_destino . $foto_nombre;

                    include "../conexion.php";
                    $conexion = Conexion();

                    $consulta = <<<SQL
                    INSERT INTO productos (nombre,descripcion,precio,stock,imagen,fecha_creacion)VALUES('$nombre','$descripcion','$precio','$cantidad','$foto','$fecha_actual')
SQL;
echo $query;
                    $resultado = pg_query($conexion, $consulta);
                    if ($resultado) {
                        header("Location: ../vistas/catalogo/catalogo.php");
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

    include("../conexion.php");
    $conexion = Conexion();
    $id = $_GET["id"];
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
            <form class="col-4 p-3 m-auto" action="lib_productos.php?accion=actualizar&id=$id" method="post">
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

                <button class="btn btn-outline-secondary">
                    <a href="../productos/verProductos.php"><i class="fa-solid fa-backward"></i></a>regresar
                </button>

                <!-- <button class="btn btn-outline-secondary">
                    <a href="../index.php"><i class="fa-solid fa-house"></i></a>inicio
                </button> -->
            </form>
        </div>
    </body>
    
    </html>
HTML;
echo $html;
}
function Actualizar_productos(){

    include_once "../conexion.php";
    $conexion = Conexion();

    $id = $_GET["id"];
    $nombre_producto = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $cantidad = $_POST["cantidad"];

    $sql=<<<SQL
    UPDATE productos SET nombre = '$nombre_producto', descripcion = '$descripcion', precio = '$precio', stock = '$cantidad' WHERE id = '$id'
SQL;
$consulta = pg_query($conexion,$sql);
if ($consulta) {
    header("Location: ../../ti/vistas/productos/verProductos.php");
}
else {
    echo "error";
}
}

function Eliminar_productos()
{
    include_once "../conexion.php";
    $conexion = Conexion();
    $id = $_GET['id'];
    $consulta = <<<SQL
        DELETE FROM productos WHERE id = '$id'
SQL;

    $resultado = pg_query($conexion, $consulta);
    if ($resultado) {
        header("Location: ../vistas/productos/verProductos.php");
        exit;
    } else {
        echo "error";
    }
}
function Excel (){

// Crear el archivo Excel

    header ( "Pragma: " );
	header ( "Cache-Control: cache" );
	header ( "Content-type: application/x-msexcel" );
	header ( "Content-Disposition: attachment; filename=productos.xls" );
}

function Pdf(){

    //require "../fpdf/fpdf.php";
    require '../fpdf17/fpdf.php';

    /*$pdf = new FPDF();
    $pdf->AddPage();


    // Establecer fuente
    $pdf->SetFont('Arial', 'B', 16);

    // Agregar un título
    $pdf->Cell(40, 10, 'prueba ');

    // Salida del archivo PDF
    $pdf->Output();*/
    // Títulos y encabezado

    /*$pdf = new FPDF();
    $pdf->AddPage();
    
    // Establecer la fuente
    $pdf->SetFont('Arial', 'B', 12);
    
    // Títulos y encabezado
    $pdf->Cell(0, 10, 'CERTIFICADO DE RETENCIÓN EN LA FUENTE', 0, 1, 'C');
    $pdf->Ln(10); // Espacio entre líneas
    
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, 'BIBLIOTECA PÚBLICA PILOTO DE MEDELLIN PARA AMERICA LATINA', 0, 1, 'C');
    $pdf->Ln(10);
    
    $pdf->Cell(0, 10, 'CERTIFICA:', 0, 1);
    $pdf->Ln(10);
    
    $pdf->Cell(0, 10, 'Que durante el período gravable comprendido entre 01-Ene-2019 hasta 31-Dic-2019 efectuamos retención:', 0, 1);
    $pdf->Ln(10);
    
    // Detalles
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(40, 10, 'A:', 0, 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, '[Nombre del Beneficiario]', 0, 1);
    $pdf->Ln(5);
    
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(40, 10, 'NIT:', 0, 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, '[Número de Identificación Tributaria del Beneficiario]', 0, 1);
    $pdf->Ln(5);
    
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(40, 10, 'CONCEPTO:', 0, 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, 'ReteFuente Compras 2.5%', 0, 1);
    $pdf->Ln(5);
    
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(40, 10, 'BASE:', 0, 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, '$[Monto de la Base]', 0, 1);
    $pdf->Ln(5);
    
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(40, 10, 'VALOR RETENIDO:', 0, 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, '($ [Monto del Valor Retenido])', 0, 1);
    $pdf->Ln(10);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
    $pdf->Cell(0, 10, 'El presente certificado se expide únicamente para efectos tributarios en MEDELLIN, al [Fecha de Expidición].', 0, 1);
    
    // Salida del PDF
    $pdf->Output('certificado_retenido.pdf', 'I');*/


$pdf = new FPDF();
$pdf->AddPage();

// Establecer fuente
$pdf->SetFont('Arial', '', 12);

// Obtener la posición X actual
$x_ini = $pdf->GetX();

// Añadir una celda
$pdf->Cell(100, 10, 'Texto en la primera celda');

// Obtener la nueva posición X después de añadir la celda
$x_fin = $pdf->GetX();

// Calcular el ancho restante
$ancho_restante = $pdf->GetPageWidth() - $x_fin;

// Usar el ancho restante para ajustar la siguiente celda
$pdf->Cell($ancho_restante, 10, 'Texto en la segunda celda', 0, 1);

$pdf->Output();

}

if ($accion == "registrar_productos") {
    Insertar_productos();
}
if ($accion == "eliminar") {
    Eliminar_productos();
}
if ($accion== "modificar") {
    Modificar_Productos();
}
if ($accion == "actualizar") {
    Actualizar_productos();
}
if ($accion == "excel") {
    include_once "./lib_HTML-U.php";
    Mostrar_productos_excel();
    //Excel();
}
if ($accion == "pdf") {
    Pdf();
}
?>