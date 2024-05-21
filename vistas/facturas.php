<?php
session_start();
if (isset($_SESSION["correo"])) {
   echo $_SESSION["correo"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
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
    <div>
        <h4 style="text-align: center;">facturas</h4>
        <form action="" method="post">
            <label for="">telefono</label>
            <input type="text"><br>
            <label for="">direccion</label>
            <input type="text"><br>
            <label for="">correo</label>
            <input type="text"><br>
            <label for="">hora</label>
            <input type="text"><br>
            <label for="">cliente</label>
            <input type="text"><br>
            <label for="">vendedor</label>
            <input type="text">
            <!-- <label for="">pago</label> -->
            
            <!-- <input type="text">
            <input type="text"> -->
            <section>
                <option value="1" disabled selected>Seleccionar</option>
                <select value="<?php echo $d["nombre"] ?>" name="" id="">
                    <?php 
                    
                    $conexion = new mysqli("localhost", "root", "", "pagina");
                    $datos = mysqli_query($conexion, "SELECT * from productos");
                    $total = mysqli_fetch_row($datos);
                    
                        while ($d = mysqli_fetch_assoc($datos)) {?>

                           <option value="<?=$d["nombre"]?>">
                        </option>
    
                          <option value="<?php echo $d["nombre"]?>">
                        </option>
                          
                        </select>
    
    
                         <?php } 
                    ?>
                    
                </select>
            </section>
            <input type="submit" value="realizar factura">
        </form>
    </div>
    <a href="./pagina-principal/login.php">inicio de session</a>
</body>

</html>