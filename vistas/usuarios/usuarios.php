<?php
include_once "../../Librerias/lib_HTM-U.php";

Mostrar_usuarios();

   
?>
   
   <!--<tbody>
                //session_start();
                //include '../../modelo/Modelo-Usuarios.php';
                // include '../../controlador/Controlador-Usuarios.php';
                //$clases = new Registro;
                //$usuarios = $clases->mostrar();
                // $sql = $conexion->query("SELECT * FROM usuarios");
                //foreach ($usuarios as $clases): ?>
                    <tr>
                        <td> <?= $clases->id ?> </td>
                        <td> <?= $clases->dni ?></td>
                        <td> <?= $clases->nombre ?> </td>
                        <td> <?= $clases->apellido ?> </td>
                        <td> <?= $clases->telefono ?> </td>
                        <td> <?= $clases->direccion ?> </td>
                        <td> <?= $clases->correo ?> </td>
                        <td> <?= $clases->contraseña ?> </td>
                        <td> <?= $clases->id_rol ?> </td>

                        <td>
                            <a href="./modificar_usuarios.php?id=<?= $clases->id ?>" class="btn btn-small btn-warning">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>

                            <form action="../../controlador/CONTROLADOR-Usuarios.php?id=<?= $clases->id ?>" method="post">
                                <button class="btn btn-small btn-danger" name="borrar" onclick="return pregunta()" type="submit">
                                    <i class='fa-solid fa-trash'>
                                    </i>
                                </button>

                            </form>
                        </td>
                    </tr>

                 endforeach;
                ?>-->

