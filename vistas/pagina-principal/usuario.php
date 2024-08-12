<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="../../fotos/buscador.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAGINA</title>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION["correo"])) {
        echo "hola ".$_SESSION['correo'];
        echo  "<form action='../../Librerias/lib_usuarios.php?accion=sesion' method='post'>
    <input type='submit'>
</form>";
echo session_status();
    }
    
    ?>


   
</body>

</html>