<?php
include("../../conexion.php");
$id = $_GET["id"];
$sql = $conexion->query(" SELECT * FROM usuarios WHERE id_personas = $id ");
$query = $conexion->query(" SELECT * FROM cargo ");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modificar registro</title>
</head>

<body>
    <div class="contenedor">
        <form class="col-4 p-3 m-auto" action="../../controlador/Controlador-Usuarios.php" method="post">
            <h3>modificar registro de usuarios</h3>
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            <?php
            // include "../../controlador/actualizar-usuarios.php";
            while ($camilo = $sql->fetch_object()) { ?>
                <div class="mb-3" disabled>
                    <label for="exampleInputEmail1" class="form-label">dni</label>
                    <input type="text" class="form-control" disabled name="dni" value="<?= $camilo->dni ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">nombres</label>
                    <input type="text" class="form-control" name="nombre" value="<?= $camilo->nombre ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">apellido</label>
                    <input type="text" class="form-control" name="apellido" value="<?= $camilo->apellido ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">telefono</label>
                    <input type="number" class="form-control" name="telefono" value="<?= $camilo->telefono ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" required>direccion</label>
                    <input type="text" class="form-control" name="direccion" value="<?= $camilo->direccion ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" required>correo</label>
                    <input type="email" class="form-control" name="correo" value="<?= $camilo->correo ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" required>contraseña</label>
                    <input type="password" class="form-control" name="contraseña" value="<?= $camilo->contraseña ?>">
                </div>



            <?php  } ?>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" required>rol</label>
                <select name="rol" id="">

                    <?php
                    while ($roles = $query->fetch_object()) { ?>

                        <option class="form-control" value="<?=$roles->id?>"><?= $roles->rol ?></option>

                    <?php }
                    ?>
                </select>
            </div>
            <input type="submit" class="btn btn-primary" name="modificar" value="modificar productos"></input><br><br>
            <button class="btn btn-outline-secondary">
                <a href="../usuarios/usuarios.php">regresar</a>
            </button><br><br>
            <button class="btn btn-outline-secondary">
                <a href="../pagina-principal/index.php">inicio</a>
            </button>
        </form>
    </div>
</body>

</html>