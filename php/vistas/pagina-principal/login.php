<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inicia sesion</title>
</head>

<body>
    <?php if(isset($error)):?>
    <p><?php echo $error;?></p>
    <?php endif; ?>
        
       
    
    
    <div class="mx-auto contenedor">

        <div class="formulario_registro">
            <form class="mx-auto col-4 p-3 " action="../../controlador/ControllerValidacion.php" method="post">
                <h2 class="text-center text-secondary"> bienvenido </h2>
                <p class="text-center text-secondary"> inicia sesion </p>
                <!-- <input placeholder="nombre" type="text"><br><br> -->
                <input class="form-control" placeholder="correo" required type="text" name="correo"><br><br>
                <input class="form-control" placeholder="contraseña" required type="password" name="contraseña"><br><b>
                    <!-- <input name="registro" class="btn" type="submit" value="registrar"><br><br> -->
                    <input class="btn btn-primary" name="inicio" class="btn" type="submit" value="entrar"><br><br>
                    <a class="mr-auto navbar-brand" href="../usuarios/formulario_registro.php">registro</a>

            </form>
        </div>
    </div>
    <a href="../../../index.php">inicio</a>
</body>

</html>