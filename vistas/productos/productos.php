<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../../css/fomu_productos.css"> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>

<body>
    <!-- <div class="contenedor">
        <h3 class="text-center text-secondary">registro de productos</h3><br><br>
        <form class="col-4 p-3 m-auto" action="../../controlador/productos.php" method="post" enctype="multipart/form-data" >
            <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input class="form-control" type="text" name="nombre" id="nombre" required>
                </div>
                <div class="col-12">
                    <label for="descripcion" class="form-label">Descripción:</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" required></textarea>
                </div>
                <div class="col-md-4">
                    <label for="precio" class="form-label">Precio:</label>
                    <input class="form-control" type="text" name="precio" required id="precio"><br>
                </div>
                <div class="col-md-3">
                    <label for="cantidad" class="form-label">Cantidad:</label>
                    <input class="form-control" type="number" name="cantidad" required><br>
                </div>

             <label for="">nombre del producto</label>
            <input name="" type="text" placeholder="ingrese el nombre del producto"><br><br>

            <label for="">descripcion</label>
            <input name="" type="text"><br><br>

            <label for="">precio</label>
            <input name="" type="number"><br><br>

            <label for="">cantidad</label>
            <input name="" type="number"><br><br> -->

    <!-- <div class="col-md-3">
                <label class="form-label" for="">selecione la foto</label>
                <input class="" name="foto" type="file" id="foto" accept="image/*"><br><br>
            </div>

            <input class="btn btn-primary" name="enviar" type="submit" value="agregar">
        </form>
    </div> -->


    <div class="contenedor">
        <form class="col-4 p-3 m-auto" action="../../controlador/CONTROLADOR-Productos.php" method="post" enctype="multipart/form-data">
            <h3>agregar productos</h3>
            <!-- <div class="mb-3"disabled>
                        <label for="exampleInputEmail1" class="form-label">id</label>
                        <input type="text"  class="form-control" name="dni" " >
                    </div> -->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">nombre del producto</label>
                <input type="text" class="form-control" name="nombre">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">descripcion</label>
                <textarea class="form-control" name="descripcion" id="descripcion" required></textarea>
                <!-- <input type="text" class="form-control" name="descripcion"> -->
            </div>
            <div class="col-md-4">
                <label for="precio" class="form-label">Precio:</label>
                <input type="number" class="form-control" name="precio" required id="precio"><br>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">cantidad</label>
                <input type="number" class="form-control" name="cantidad">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" required> seleccione la foto</label>
                <input type="file" class="form-control" name="foto" accept="image/*">
            </div>

            <input class="btn btn-primary" name="enviar" type="submit" value="agregar"><br><br>

            <!-- <input type="submit" class="btn btn-primary" name="modificar" value="modificar productos"></input>
            <button class="btn btn-outline-secondary">
                <a href="../usuarios/usuarios.php">regresar</a>
            </button> -->
            <button class="btn btn-outline-secondary">
                <a href="../catalogo/catalogo.php">ver productos</a>
            </button><br><br>
        </form>
    </div>
</body>

</html>