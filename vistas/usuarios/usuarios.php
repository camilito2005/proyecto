
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d6ecbc133f.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <script>
        function pregunta() {
            p = confirm("¿estas seguro que desea eliminar el registro?");
            return p;
        }
    </script>
    <h3 class="text-center text-secondary">usuarios</h3>
    <div class="mx-auto col-8 p-4">
        <table class="table">
            <thead class="bs-info">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">DNI</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">APELLIDOS</th>
                    <th scope="col">TELEFONO</th>
                    <th scope="col">DIRECCION</th>
                    <th scope="col">CORREO</th>
                    <th scope="col">CONTRASEÑA</th>
                    <th scope="col">ROL</th>
                    <th>EDITAR/ELIMINAR</th>


                </tr>
            </thead>
            <tbody>
                <?php
                session_start();
                include '../../modelo/Modelo-Usuarios.php';
                // include '../../controlador/Controlador-Usuarios.php';
                $clases = new Registro;
                $usuarios = $clases->mostrar();
                // $sql = $conexion->query("SELECT * FROM usuarios");
                foreach ($usuarios as $clases) : ?>
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
                                        <!-- <input    > -->
                                    </i>
                                </button>

                            </form>

                            <!-- <a href=    >
                                <i ></i>
                            </a> -->
                        </td>
                    </tr>

                <?php endforeach;
                    ?>
            </tbody>
        </table>
    </div>
    <button class="btn btn-outline-secondary">
        <a href="../pagina-principal/index.php">inicio</a>
    </button>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>