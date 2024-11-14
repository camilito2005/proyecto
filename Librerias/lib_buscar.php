<?php
$accion = $_REQUEST["accion"];
function Buscar($search){

    $search = $_REQUEST["buscador"];
    echo $search;

    if (!empty($search)) {
        include_once "../conexion.php";
        $conexion = Conexion();
    
        if (!$conexion) {
            die("Error al conectar con la base de datos");
        }
    
        $consulta = "SELECT dni, nombre, apellido, telefono, direccion, correo, contraseña, fecha_ingreso FROM usuarios WHERE nombre ILIKE $1";
        $resultado_consulta = pg_query_params($conexion, $consulta, ["%$search%"]);
        //var_dump($consulta);
    
        if (!$resultado_consulta) {
            die("Error en la consulta");
        }
    
        $array = [];
    
        if (pg_num_rows($resultado_consulta) > 0) {
            while ($fila = pg_fetch_assoc($resultado_consulta)) {
                $array[] = [
                    "dni"      => $fila["dni"],
                    "nombre"      => $fila["nombre"],
                    "apellidos"   => $fila["apellidos"],
                    "telefono"    => $fila["telefono"],
                    "direccion"   => $fila["direccion"],
                    "correo"      => $fila["correo"],
                    "contraseña"  => $fila["contraseña"],
                    "fecha_ingreso"  => $fila["fecha_ingreso"]
                ];
            }
            echo json_encode($array);
        } else {
            echo json_encode([]); // Retorna un array vacío si no hay resultados
        }
    }else {
        echo "vacia";
    }
}

if ($accion == "search") {
    Buscar();
}

?>