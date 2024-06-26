<?php
session_start();
if (isset($_SESSION["correo"])) {
    echo $_SESSION["correo"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../css/facturas2.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>facturas</title>
</head>
<?php
if (isset($_SESSION["correo"])) {
    echo '<form action="../controlador/carrito.php" method="post">
    <input type="submit" name="cerrar" value="cerra sesion">
    </form>';
}
?>


<body>
    <div class="centrar">
        <div class="container">
            <h4 style="text-align: center;">facturas</h4>
            <div class="formulario">
                <form action="" method="post">
                    <label for="">telefono</label>
                    <input type="text"><br>
                    <label for="">direccion</label>
                    <input type="text"><br>
                    <label for="">correo</label>
                    <input type="text"><br>
                    <label for="">hora</label>
                    <input type="text"><br>
                    <label for="">vendedor</label>
                    <input type="text"><br>

                    <label for="">cliente</label>
                    <select name="" id="">
                        <?php
                        include "../conexion.php";
                        $personas = mysqli_query($conexion, "SELECT * FROM usuarios");
                        while ($usuarios = mysqli_fetch_assoc($personas)) { ?>
                            <option value=""><?= $usuarios["nombre"] ?></option>
                        <?php   }
                        ?>
                    </select>

                    <!-- <label for="">pago</label> -->

                    <!-- <input type="text">
            <input type="text"> -->
                    <section>
                        <option value="1" disabled selected>productos</option>
                        <select value="" name="" id="">
                            <?php

                            // $conexion = new mysqli("localhost", "root", "", "pagina");
                            include_once "../conexion.php";
                            $datos = mysqli_query($conexion, "SELECT * from productos");
                            $total = mysqli_fetch_row($datos);

                            while ($d = mysqli_fetch_assoc($datos)) { ?>

                                <option value=""><?= $d["nombre"] ?></option>

                                <label>
                                    <input type="checkbox" name="productos[<?= $d["id_productos"] ?>]" value="<?= $d["precio"] ?>">
                                    <?= $d["nombre"] ?> - <?= $d["precio"] ?> $
                                </label>



                            <?php }

                            ?>
                            <input type="number" name="cantidades[<?= $d["id_productos"] ?>]" min="1" max="<?= $d["stock"] ?>" placeholder="Cantidad">

                        </select>
                    </section>
                    <button type="submit" value="realizar factura">
                        <a href="">realizar factura</a>
                    </button>
                </form>
            </div>

        </div>
    </div>
    <a href="./pagina-principal/login.php">inicio de session</a>
</body>

</html>