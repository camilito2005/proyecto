<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../css/estilos7.css">
    <link rel="shortcut icon" href="../../fotos/buscador.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAGINA</title>
</head>

<body>
    <h3>Tienda de zapatos</h3>
    <nav>
        <ul class="menu-horizontal">
            <!-- <li>
                <a href="">
                    <i>usuarios</i>
                </a>
            </li> -->

            <!-- <li>
                <a href="usuarios.php">
                    <i>usuarios</i>
                </a>
            </li> -->

            <li>
                <a href="../usuarios/usuarios.php">usuarios</a>
                <ul class="menu-vertical">
                        <li>
                            <a href="../usuarios/formulario_registro.php">registrar</a>
                        </li>
                        <!-- <li>
                            <a href="">bolsos</a>
                        </li> -->
                    </ul>

            </li>

            <!-- <li> mis pedidos
                <a href="">
                    <ul class="menu-vertical">
                        <li>
                            <a href="">deportivos</a>
                        </li>
                        <li>
                            <a href="">elegantes</a>
                        </li>
                    </ul>

                </a>
            </li> -->

            <li>
                <a href="../catalogo/catalogo.php">productos

                    <ul class="menu-vertical">
                        <li>
                            <a href="../productos/verProductos.php">
                                <i>mis productos</i>
                            </a>
                        </li>
                        <li>
                            <a href="../productos/productos.php">
                                <i>agregar productos</i>
                            </a>
                        </li>
                    </ul>

                </a>
            </li>
        </ul>
    </nav>

    <div class="content">

        <div class="formulario">
            <form action="../../controlador/registro.php" method="post">
                <h2> bienvenido </h2>
                <p> inicia sesion </p>
                <input placeholder="nombre" type="text"><br><br>
                <input placeholder="correo" required type="text" name="correo"><br><br>
                <input placeholder="contraseña" required type="password" name="contraseña"><br><b>
                    <!-- <input name="registro" class="btn" type="submit" value="registrar"><br><br> -->
                    <input name="inicio" class="btn" type="submit" value="entrar"><br><br>
                    <a href="../usuarios/formulario_registro.php">registro</a>
                    <!-- <a href="">Gestionar categorias</a>
                    <a href="">Gestionar productos</a> -->
            </form>
        </div>


        <!--<div class="container">
            <div class="car">
                <figure>
                    <img src="../../fotos/zapatillas_mas_vendidas.webp" alt="">
                </figure>
                <div class="contenido">
                    <h3> nike air force one</h3>
                    <p>los nike air force one son los zaopatos que mas se venden en la actualidad, gracias a su belleza, su sencillez y su economico precio, los tenemos en descuento aprovecha ya!!</p>
                    <a href="" target="_blank">leer mas</a> 
                </div>
            </div>
        </div>-->
    </div>


</body>

</html>