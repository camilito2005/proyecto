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
            "cantidad" => $_POST["cantidad"],
            "fecha" => date('d-m-y H:i:s')
        ];
        $nombre = pg_escape_string($datos["nombre"]);
        $descripcion = pg_escape_string($datos["descripcion"]);
        $precio = pg_escape_string($datos["precio"]);
        $cantidad = pg_escape_string($datos["cantidad"]);
        $fecha_actual = $datos["fecha"];


        if (isset($_FILES["foto"])) {
            if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
                $archivo_temporal = $_FILES["foto"]["tmp_name"];
                $foto_nombre = basename($_FILES["foto"]["name"]);
                $directorio_destino = "../../ti/fotos/";
                //include "/Applications/XAMPP/htdocs/ti/fotos";
                //Aquí se verifica si se ha subido un archivo con el nombre 'foto'. Si es así, se obtienen el nombre del archivo y su ruta temporal. Se define el directorio destino donde se guardará el archivo.

                if (move_uploaded_file($archivo_temporal, $directorio_destino . $foto_nombre)) {
                    $foto = $directorio_destino . $foto_nombre;

                    include "../conexion.php";
                    $conexion = Conexion();

                    $consulta = <<<SQL
                    INSERT INTO productos (nombre,descripcion,precio,stock,imagen,fecha_creacion)VALUES('$nombre','$descripcion','$precio','$cantidad','$foto','$fecha_actual')
SQL;
                    $resultado = pg_query($conexion, $consulta);
                    if ($resultado) {
                        header("Location: ../vistas/catalogo/catalogo.php");
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
                <input type="submit" class="btn btn-primary" name="modificar" value="modificar productos"></input>
                <button class="btn btn-outline-secondary">
                    <a href="../productos/verProductos.php">regresar</a>
                </button>
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
    require "Classes/PHPExcel.php";

    include_once "../conexion.php";
    $conexion = Conexion();
    if (!$conexion) {
        die("Conexión fallida: ");
    }
    $sql = <<<SQL
    SELECT * FROM productos
SQL;
$resultado = pg_query($conexion, $sql);

if (!$resultado) {
    die ("error en la consulta");
}

$objPHPExcel = new PHPExcel();
$objPHPExcel->getActiveSheet()->setTitle('Productos');

$headers = ['ID', 'nombre del producto', 'descripcion','precio','cantidad', 'imagen']; // Ajusta según tus columnas
$col = 'A';
foreach ($headers as $header) {
    $objPHPExcel->getActiveSheet()->setCellValue($col . '1', $header);
    $col++;
}

// Agregar los datos a la hoja de cálculo
$rowNumber = 2;
while ($row = pg_fetch_assoc($resultado)) {
    $col = 'A';
    foreach ($row as $data) {
        $objPHPExcel->getActiveSheet()->setCellValue($col . $rowNumber, $data);
        $col++;
    }
    $rowNumber++;
}
// Crear el archivo Excel
header ( "Pragma: " );
	header ( "Cache-Control: cache" );
	header ( "Content-type: application/x-msexcel" );
	header ( "Content-Disposition: attachment; filename=productos.xls" );


// Guardar el archivo Excel y forzar la descarga
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;

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
    Excel();
}
?>