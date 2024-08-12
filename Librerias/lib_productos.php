<?php
$accion = $_GET["accion"];

function Insertar_productos(){
    if (!empty($_POST["nombre"])&& !empty($_POST["descripcion"])&&!empty($_POST["precio"])&&!empty($_POST["cantidad"])) {
        date_default_timezone_set('America/Bogota');
        $datos =[
            "nombre"=>$_POST["nombre"],
            "descripcion"=>$_POST["descripcion"],
            "precio"=>$_POST["precio"],
            "cantidad"=>$_POST["cantidad"],
            "fecha" => date('d-m-y H:i:s')
        ];
        $nombre = pg_escape_string($datos["nombre"]);
        $descripcion = pg_escape_string($datos["descripcion"]);
        $precio = pg_escape_string($datos["precio"]);
        $cantidad = pg_escape_string($datos["cantidad"]);
        $fecha_actual = $datos["fecha"];


        if (isset($_FILES["foto"])) {
            $foto_nombre = $_FILES["foto"]["name"];
            $archivo_temporal= $_FILES["foto"]["tmp_name"];
            $directorio_destino = "../../ti/fotos/";

            //Aquí se verifica si se ha subido un archivo con el nombre 'foto'. Si es así, se obtienen el nombre del archivo y su ruta temporal. Se define el directorio destino donde se guardará el archivo.
            
            if (move_uploaded_file($archivo_temporal,$directorio_destino.$foto_nombre)) {
                $foto = $directorio_destino . $foto_nombre;

                include "../conexion.php";
                $conexion = Conexion();

                $consulta = <<<SQL
                    INSERT INTO productos (nombre,descripcion,precio,stock,imagen,fecha_creacion)VALUES('$nombre','$descripcion','$precio','$cantidad','$foto','$fecha_actual')
SQL;
echo $consulta;
            if ($consulta) {
                echo "producto ingresado exitosamente";
            }
            else {
                if (!$consulta) {
                    echo "error";
                }
                
            }

            }
            else {
                echo "error al subir la foto";
            }
        }
    }
    else {
        echo "campos vacios , por favor llene los campos";
    }
}

if ($accion=="registrar") {
    Insertar_productos();
}

?>