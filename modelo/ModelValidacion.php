<?php
class Validacion
{
    public function Validar($correo, $contraseña)
    {
        include "../conexion.php";
        // $conexion = new mysqli("localhost", "root", "", "pagina");
        // $conexion =new mysqli("localhost","root","","pagina");


        $consulta = <<<SQL
        ("SELECT correo,contraseña,id_rol FROM usuarios WHERE correo='$correo' AND contraseña='$contraseña'");
SQL;

        $resultado = mysqli_query($conexion, $consulta);
        // $filas = mysqli_num_rows($resultado);
        $filas = mysqli_fetch_array($resultado); //array asociativo o array numérico


        if (isset($filas["id_rol"]) == 1) { // si es 1 es admin
            $_SESSION["correo"] = $correo;
            header("Location: ../vistas/catalogo/catalogo.php");
        }

        if (isset($filas["id_rol"]) == 2) { // si es 2 es cliente
            $_SESSION["correo"] = $correo;
            header("Location: ../vistas/catalogo/catalogo.php");

        } else {
            if (isset($filas["id_rol"]) != 1 && isset($filas["id_rol"]) != 2) {
                header("Location: ../vistas/pagina-principal/login.php");
                // include "../vistas/pagina-principal/login.php";  
                // $error = "credenciales erroneas, por favor intentelo de nuevo";
                // echo "credenciales erroneas, por favor intentelo de nuevo";

            }
        }
        mysqli_free_result($resultado);
        mysqli_close($conexion);
    }
}
