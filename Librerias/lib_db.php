<?php

    function Ejecutar_consulta($consulta, $parametros = [],$tipoSalida = "json"){
        include_once "../conexion.php";
        $conexion = Conexion();

        if (!$conexion) {
            die("erro en la conexion a la base de datos ");
        }
        $resultado_consulta = pg_query_params($conexion, $consulta, $parametros);

        if (!$resultado_consulta) {
            die("Error en la consulta: " . pg_last_error($conexion));
        }
        if (pg_num_rows($resultado_consulta) > 0) {
            // Convertir resultados a un array
            $filas = pg_fetch_all($resultado_consulta); 
        
            // Usar foreach para iterar las filas
            foreach ($filas as $fila) {
                $resultado[] = $fila;
            }
        }
        if ($tipoSalida === "json") {
            echo json_encode($resultado);
        } elseif ($tipoSalida === "array") {
            return $resultado; // Devuelve el array
        } else {
            die("Tipo de salida no soportado");
        }
    }
?>