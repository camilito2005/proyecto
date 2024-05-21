<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>carrito</title>
</head>

<body>
    <div>
        <form action="../../controlador/carrito.php?carri=eliminarT" method="post">
            <input type="submit" value="vaciar el carrito">
        </form>
    </div>
    <!-- <a href="../../controlador/carrito.php?carri=eliminarT"> Vaciar el carrito</a> -->
    <?php
    session_start();
    if (isset($_SESSION['correo'])) {
        echo $_SESSION['correo'];
    }

    require_once '../../modelo/Modelocarrito.php';
    $modelo = new Carrito();
    $zapatos = $modelo->ver();
    // include "../../conexion.php";
    // $camilo = $conexion->query("SELECT * FROM productos");
    foreach ($zapatos as $id => $zapatico) : ?>
        <div class="container">
            <div class="card mx-4 mt-4 mx-auto" style="width: 21rem;">
                <!-- <div> -->
                <!--<p>fotico:  <?php echo $zapatico['stock'] ?></p> en la foto sale la descripcion -->
                <!-- </div> -->
                <div>
                    <img src="/<?php echo $zapatico['stock'] ?>" height="100%" width="100%" class="card-img-top" alt="...">
                </div>
                <!-- <img src="<?php echo $zapatico['imagen'] ?>" alt="" class="card-img-top"> -->
                <div class="card-body">
                    <h3 class="card-title ">nombre :
                        <?php echo $zapatico['nombre'] ?>
                    </h3>

                    <p class="">precio $ : <?php echo $zapatico['descripcion'] ?></p> <!-- en el precio aparece el stcok o disponibles -->
                    <!--<p class="">disponibles : <?php echo $zapatico['stock'] ?></p>  en el stock aparece la ruta de la foto -->

                    <p class="">disponibles : <?php echo $zapatico['precio'] ?></p> <!-- en la descripcion aparece el precio -->
                    <p class="">descripcion : <?php echo $zapatico['foto'] ?></p> <!-- en la descripcion aparece el precio -->


                </div>
                <div class="card-footer">
                    <p class="">Cantidad: <?php echo $zapatico['precio'] ?></p> <!-- en el stock aparece la ruta de la foto -->
                    <form action="../../controlador/carrito.php?carri=eliminarU" method="post">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <button type="submit" class="btn btn-outline-danger"> Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div>
        <form action="../../controlador/carrito.php?carri=index" method="post">
            <input type="submit" value="volver a la tienda">
        </form>
        <a href="../catalogo/catalogo.php">volver a la tienda</a>
    </div>


    <!--  -->

</body>