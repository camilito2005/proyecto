<?php

function conexion(){
    $servidor = "localhost";
    $usuario = "root";
    $pass = "";
    $bd = "crud";

    $conexion = mysqli_connect($servidor,$usuario,$pass);

    mysqli_select_bd($conexion,$bd);

    return $conexion;

};
    


?>