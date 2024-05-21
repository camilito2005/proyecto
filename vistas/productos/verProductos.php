<?php
session_start();
if (isset($_SESSION["correo"])) {
    # code...
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d6ecbc133f.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/busqueda.css">
    <title>Productos</title>
</head>

<body>
    <script src="../../js/busqueda.js" defer></script>

    <div class="input-search">
        <nav>
            <input  type="search" id="search" placeholder="search">
        </nav>
    </div>

    <div class="error">
        <p></p>
    </div>

    <script defer>
        function Pregunta() {
            $p = confirm("¿estas seguro que desea eliminar el producto?");
            return $p;
        }
    </script>
    <h3 class="text-center text-secondary">productos</h3>
    <div class="mx-auto col-8 p-6" style="display: none;" id="resultados-conainer">
        <table class="table" id="resultado">
            <thead class="bs-info">
                <tr>
                    <th scope="col">id</th>
                    <th>imagen</th>
                    <th>nombre del prodcuto</th>
                    <th>descripcion</th>
                    <th>precio</th>
                    <th>cantidad</th>
                    <th>EDITAR/ELIMINAR</th>
                </tr>
            </thead>
            <tbody>
                <div class="container">
                    <?php
                    include "../../conexion.php";
                    $mostrar = mysqli_query($conexion, "SELECT * FROM productos");
                    $numero = mysqli_num_rows($mostrar);

                    while ($filas = mysqli_fetch_assoc($mostrar)) {
                        # code...
                        // }
                        // $ramdom = $conexion->query("SELECT * FROM productos");
                        // while ($filas = $ramdom->fetch_object()) { 
                    ?>
                        <tr>


                            <td><?php echo $filas["id"] ?></td>
                            <td>
                                <div class="card mx-4 mt-4 mx-auto" style="width: 10rem;">
                                    <img src="/<?php echo $filas["imagen"] ?>" height="70%" width="100%" class="card-img-top">
                                </div>
                            </td>
                            <td> <?php echo $filas["nombre"] ?></td>
                            <th> <?php echo $filas["descripcion"] ?> </th>
                            <td> <?php echo $filas["precio"] ?></td>
                            <td> <?php echo  $filas["stock"] ?></td>

                            <td>
                                <a href="./modificar-productos.php?id=<?php echo $filas["id"]  ?>" class="btn btn-small btn-warning">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="../../controlador/CONTROLADOR-Productos.php?id=<?php echo $filas["id"] ?>" method="post">
                                    <button name="eliminar" class="btn btn-small btn-danger" type="submit" onclick="return Pregunta()">
                                        <i class="fa-solid fa-trash">

                                        </i>
                                    </button>
                                </form>
                                <!-- <a href="../../controlador/eliminar_productos.php?id=<?php echo $filas["id"] ?> "  >
                                    
                                </a> -->
                            </td>



                        </tr>
                </div>
    </div>

<?php }
?>
<p> total <?php echo $numero ?> </p>
</tbody>
</table>
</div>
<button class="btn btn-secondary">
    <a href="../catalogo/catalogo.php">catalogo</a>
</button>
<button class="btn btn-secondary">
    <a href="../productos/productos.php">agregar productos</a>
</button>
</body>

</html>