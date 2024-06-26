<?php
include("../../conexion.php");
$id = $_GET["id"];
$sql = $conexion->query(" SELECT * FROM productos WHERE id_productos=$id");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../../css/fomu_productos.css"> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="contenedor">
        <form class="col-4 p-3 m-auto" action="../../controlador/CONTROLADOR-Productos.php" method="post">
            <h3>modificar productos</h3>
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            <?php
            // include "../../controlador/actualizar-usuarios.php";
            while ($camilo = $sql->fetch_object()) { ?>
                <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">id</label>
                        <input type="text" disabled class="form-control" name="id" value="<?= $camilo->id_productos ?>" >
                    </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">nombre del producto</label>
                    <input type="text" class="form-control" name="nombre" value="<?= $camilo->nombre ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">descrpcion</label>
                    <input type="text" class="form-control" name="descripcion" value="<?= $camilo->descripcion ?>">
                </div>
                <div class="col-md-4">
                    <label for="precio" class="form-label">Precio:</label>
                    <input type="number" class="form-control" name="precio" value="<?= $camilo->precio ?>" id="precio"><br>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">cantidad</label>
                    <input type="number" class="form-control" name="cantidad"  value="<?= $camilo->stock ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" required>foto</label>
                    <input type="file" class="form-control" disabled name="foto" value="<?= $camilo->imagen ?>">
                </div>


            <?php }
            ?>
            <input type="submit" class="btn btn-primary" name="modificar" value="modificar productos"></input>
            <button class="btn btn-outline-secondary">
                <a href="../productos/verProductos.php">regresar</a>
            </button>
        </form>
    </div>
</body>

</html>