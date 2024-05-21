
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../../css/card.css"> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>catalogo</title>
</head>

<body>
    <div class="row">
        <h4 class="text-center text-secondary">
            productos
        </h4>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul>
                    <li>
                        <a href=""></a>
                    </li>
                </ul>
            </div>
            <div class="container-fluid">
                <!-- <form method="post" action="../../controlador/controlerBuscar.php"> -->
                    <input name="busqueda" type="search" id="buscador">
                    <!-- <input name="buscar" type="submit" > -->
                    <!-- <button>search</button> -->
                <!-- </form> -->

            </div>

        </nav>
        <?php
        session_start();
        if (isset($_SESSION["correo"])) {
            $_SESSION["correo"];
            echo '  <form action="../../controlador/carrito.php" method="post">
        <input type="submit" name="cerrar"value="cerrar sesion">
        </form>' . $_SESSION["correo"];
        } else { ?>
            <!-- <form class="mx-auto col-4 p-3 " action="../../controlador/registro.php" method="post">
            <h2 class="text-center text-secondary"> bienvenido </h2>
            <p class="text-center text-secondary"> inicia sesion </p>
            <input class="form-control" placeholder="correo" required type="text" name="correo"><br><br>
            <input class="form-control" placeholder="contraseña" required type="password" name="contraseña"><br><b>
                <input class="btn btn-primary" name="inicio" class="btn" type="submit" value="entrar"><br><br>
                <a class="mr-auto navbar-brand" href="../usuarios/formulario_registro.php">registro</a>

        </form> -->
            <a href="../pagina-principal/login.php">
                <i>iniciar sesion </i>
            </a>
        <?php
        }
        ?>
    </div>

    <div class="container">
        <div class="row">

            <?php
            include "../../conexion.php";
            $ramdom = mysqli_query($conexion, "SELECT * FROM productos");
            $total = mysqli_num_rows($ramdom);
            while ($filas = mysqli_fetch_assoc($ramdom)) {
                # code...
                // }
                // $ramdom = $conexion->query("SELECT * FROM productos");
                // while ($filas = $ramdom->fetch_assoc()) { 
            ?>

                <div class="card mx-4 mt-4 mx-auto" style="width: 21rem;">

                <td><?= $filas['id'] ?></td>

                    <img src="/<?php echo $filas['imagen'] ?>" height="100%" width="100%" class="card-img-top" alt=""><br>

                    <div class="card-title">
                        <?= $filas['nombre'] ?>

                    </div>
                    <div class="card-body">
                        <p>
                            <?= $filas['descripcion'] ?>
                        </p>

                        <p>precio: $
                            <?= $filas['precio'] ?>
                        </p>
                        <p>
                            disponibles:
                            <?= $filas['stock'] ?>
                        </p>

                    </div>
                    <div class="card-footer">
                        <button class="btn-buy button1">COMPRALO YA¡</button>
                        <form action="../../controlador/carrito.php?carri=agregar" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $filas['id'] ?>">
                            <input name="nombre" type="hidden" value="<?= $filas['nombre'] ?>">
                            <input name="descripcion" type="hidden" value="<?= $filas['descripcion'] ?>">
                            <input name="precio" type="hidden" value="<?= $filas['precio']  ?>">
                            <input name="stock" type="hidden" value="<?= $filas['stock']  ?>">
                            <input name="foto" type="hidden" value="<?= $filas['imagen'] ?>">
                            <input name="carrito" type="submit" class="btn btn-primary" value="agregar al carrito">
                        </form>
                    </div>

                </div>



            <?php }
            ?>
            <div>
                <form action="../../controlador/carrito.php?carri=ver" method="post">
                    <button>ver carrito</button>
                </form>
            </div>
            <!-- <a href="">ver carrito</a> -->
        </div>
        <p> resultado : <?php echo $total ?></p>
    </div>
    <a href="../pagina-principal/index.php">inicio</a>
    <script src="../../js/script.js"></script>
</body>

</html>