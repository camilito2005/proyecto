<?php
    class Registro{
        
            public function registrar($dni,$nombre,$apellido,$telefono,$direccion,$correo,$contraseña,$rol){
                include "../conexion.php";
                
                // $conexion =new mysqli("localhost","root","","pagina");
                if (strlen($contraseña)<6) { ?>
                    <script>
                        alert("la contraseña debe tener mas de 6 digitos")
                    </script>

                    <?php
                } 
                
                else {
                    if (strlen($contraseña)>=6) {
                        $query = mysqli_query($conexion,"INSERT INTO usuarios (dni,nombre,apellido,telefono,direccion,correo,contraseña,id_rol) VALUES ('$dni','$nombre','$apellido','$telefono','$direccion','$correo','$contraseña','$rol')");

                        // $query = $conexion->query("");
    
                        if ($query==1) {
                            header("Location:../vistas/pagina-principal/index.php");
                        }
                        else {
                            echo("error");
                        }
                    }
                }
                
            }
            public function actualizar_usuarios($id,$nombre,$apellido,$telefono,$direccion,$correo,$contraseña,$rol){
                include "../conexion.php";
    
                $sql = $conexion->query("UPDATE usuarios SET nombre= '$nombre',apellido='$apellido',telefono='$telefono',direccion ='$direccion',correo='$correo',contraseña ='$contraseña',id_rol = '$rol' WHERE id = $id");
    
                if ($sql==1) {
                    header("Location:../vistas/usuarios/usuarios.php");
                    echo "registro de productos exitoso";
                }
                else {
                    echo ("<div class='alert alert-warning'>campos vacios</div>");
                }
    
            }
            public function Eliminar($id){
                include "../conexion.php";
                $consulta = mysqli_query($conexion,"DELETE FROM usuarios WHERE id = $id");
    
                // $consulta = $conexion->query(" DELETE FROM usuarios WHERE id = $id ");
    
                if ($consulta == 1) {
                   header("Location:../vistas/usuarios/usuarios.php") ;
                    echo ('<div class="alert alert-success"> se elimino correctamente </div>');
                } 
                else {
                    echo ('<div class="alert alert-danger"> error al eliminar </div>');
                }
            }
            public function mostrar(){
                include "../../conexion.php";
                $sql = mysqli_query($conexion,"SELECT * FROM usuarios");
                $total = mysqli_num_rows($sql);
                $usuarios = [];
                while ($row = mysqli_fetch_object($sql)){
                $usuarios [] = $row;

                }
                return $usuarios;


            }
    }
    
    
?>
<!-- // header("location:../vistas/index.php"); -->