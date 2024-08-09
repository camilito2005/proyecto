<?php
    class Productos{
        public function registrarP($nombre,$descripcion,$precio,$cantidad,$foto,$fecha_actual ){
            include "../conexion.php";

            $sql=$conexion->query("INSERT INTO productos (nombre,descripcion,precio,stock,imagen,fecha_creacion) VALUEs ('$nombre','$descripcion','$precio','$cantidad','$foto','$fecha_actual')");

            if ($sql==1) {
                header("Location:../vistas/catalogo/catalogo.php");
                echo "registro de productos exitoso";
            }
            else {
                echo "error";
            }

        } 

        public function ActualizarP($id,$nombre_producto, $descripcion, $precio, $cantidad){

            include "../conexion.php";
            // UPDATE `productos` SET `nombre` = ' $nombre_producto', `descripcion` = '$descripcion', `precio` = '$precio', `stock` = '$cantidad' WHERE `productos`.`id` = $id;
            // $sql = mysqli_query($conexion,"UPDATE productos SET nombre = $nombre_producto , descripcion = $descripcion , precio = $precio stock = $cantidad WHERE id = $id ");
            // $sql = $conexion->query("UPDATE productos SET nombre = '$nombre_producto' , descripcion = '$descripcion' , precio = '$precio' stock = '$cantidad'  WHERE id = $id ");
            $sql = $conexion->query("UPDATE `productos` SET `nombre` = ' $nombre_producto', `descripcion` = '$descripcion', `precio` = '$precio', `stock` = '$cantidad' WHERE `productos`.`id` = $id");
    
            if ($sql == 1) {
                header("Location:../vistas/productos/verProductos.php");
                echo "registro de productos exitoso";
            } else {
                echo "error";
            }
        }
        public function EliminarP($id){
            include "../conexion.php";
            $consulta = $conexion->query(" DELETE FROM productos WHERE id = $id ");
    
            if ($consulta == 1) {
                header("Location:../vistas/productos/verProductos.php");
                echo ('<div class="alert alert-success"> se elimino correctamente </div>');
            } else {
                echo ('<div class="alert alert-danger"> error al eliminar </div>');
            }
        }
    }
    
function Login()
{
    if (!empty($_POST["dni"]) && !empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["telefono"]) && !empty($_POST["direccion"]) && !empty($_POST["correo"]) && !empty($_POST["contraseña"])) {
    session_start();

} else {
    echo "campos vacios, porfavor llene los campos";
}

    include_once "../conexion.php";

    $conexion = Conexion();

    /*$datos = [
        "correo" => $_POST['correo'],
        "contraseña" => $_POST['contraseña'],
    ];*/

    $correo = $_POST["correo"];
    $contraseña = $_POST["contrseña"];

    $correo = pg_escape_string($datos['correo']);
    $contraseña = pg_escape_string($datos["contraseña"]);

    $consulta = <<<SQL
        SELECT correo,contraseña FROM usuarios WHERE correo = $correo AND contraseña = $contraseña
SQL;

    $resultado = pg_query($conexion, $consulta);
    $filas = pg_fetch_array($resultado);
}

?>