<?php

function Formulario_clientes()
{
    $formulario = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../../css/registro.css"> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <body>

    <title>Registro</title>
     <div class="contenedor">
        <div class="formulario_registro">
            <form class="col-4 p-3 m-auto" action="?accion=registrar" method="post">
                <h3 class="text-center text-secondary">registro de clientes</h3>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">dni</label>
                    <input class="form-control" required type="text" name="dni" placeholder=" introduzca su dni">
                </div>
               <!--  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">rol</label>
                    <section>
                        <select name="rol" id="">
                            <option value="1">admin</option>
                            <option value="2">cliente</option>
                        </select>
                    </section>
                    <input class="form-control" required type="text" name="rol" placeholder=" introduzca su dni"> 
                </div>-->

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">nombre</label>
                    <input class="form-control" required type="text" name="nombre" placeholder=" introduzca su nombre">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">apellidos</label>
                    <input class="form-control" required type="text" name="apellido" placeholder=" introduzca su apellidos">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">numero telefonico</label>
                    <input class="form-control" required type="phone" value="" name="telefono" placeholder="introduzca su numero telefonico">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">direccion</label>
                    <input class="form-control" required type="text" name="direccion" placeholder="direccion">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">correo electronico</label>
                    <input class="form-control" required type="email" name="correo" placeholder="introduzca su correo electronico">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">contraseña</label>
                    <input class="form-control" required type="password" name="contraseña" placeholder="contraseña">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">comfirmar contraseña</label>
                    <input class="form-control" required type="password" name="comfirm_contraseña" placeholder="contraseña">
                </div>

                <input class="btn btn-primary" type="submit" name="registro" value="registrar"><br><br>
                <button class="btn btn-outline-secondary">
                    <a href="../usuarios/usuarios.php">ver registros</a>
                </button><br><br>

                <button class="btn btn-outline-secondary">
                    <a href="../../index.php">inicio</a>
                </button>
            </form>
        </div>
    </div>
    
        
    </body>
    </head>
</html>
HTML;

    echo $formulario;
}

function Mostrar_usuarios()
{

    $mostrar = <<<HTML

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d6ecbc133f.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tabla</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>

<body>
    <h3 class="text-center text-secondary">usuarios</h3>
    <div class="mx-auto col-8 p-4">
        <table class="table">
            <thead class="bs-info">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">DNI</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">APELLIDOS</th>
                    <th scope="col">TELEFONO</th>
                    <th scope="col">DIRECCION</th>
                    <th scope="col">CORREO</th>
                    <th scope="col">CONTRASEÑA</th>
                    <th>EDITAR/ELIMINAR</th>
                </tr>
            </thead>
            <tbody>            
HTML;
    include_once "../../conexion.php";
    $conexion = Conexion();
    $consulta1 = <<<SQL
    SELECT * FROM usuarios
SQL;
    $query = pg_query($conexion, $consulta1);


    $areglo = [];

    while ($fila = pg_fetch_object($query)) {
        // $arreglo[] = [
        //     "dni" => $fila->dni,
        //     "nombre" => $fila->nombre,
        //     "apellido" => $fila->apellido,
        //     "telefono" => $fila->telefono,
        //     "direccion" => $fila->direccion,
        //     "correo" => $fila->correo,
        //     "contraseña" => $fila->contraseña
        // ];
        $id = $fila->id;
        $dni = $fila->dni;
        $nombre = $fila->nombre;
        $apellido = $fila->apellido;
        $telefono = $fila->telefono;
        $direccion = $fila->direccion;
        $correo = $fila->correo;
        $contraseña = $fila->contraseña;

        $mostrar .= <<<HTML
            <tbody>
                <tr>
                    <td>$id</td>
                    <td>$dni</td>
                    <td>$nombre</td>
                    <td>$apellido</td>
                    <td>$telefono</td>
                    <td>$direccion</td>
                    <td>$correo</td>
                    <td>$contraseña</td>
                    <td>
                    <a href="../../Librerias/lib_usuarios.php?accion=modificar&id=$id">modificar</a>
                    <a href="usuarios.php?accion=eliminar&id=$id">eliminar</a>
                    </td>
                </tr>
            </tbody>
HTML;
        echo $html;
    }
    $mostrar .= <<<HTML
    
        </tbody>
        </table>
    </div>
    <button class="btn btn-outline-secondary">
        <a href="../../index.php">inicio</a>
    </button>

    <button class="btn btn-outline-secondary">
        <a href="./formulario_registro.php">registrar</a>
    </button>
HTML;
    echo $mostrar;
}

function Login_html()
{
    $html = <<<HTML

    
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inicia sesion</title>
</head>

<body>
    <div class="mx-auto contenedor">
        <div class="formulario_registro">
            <form class="mx-auto col-4 p-3 " action="../../Librerias/lib_usuarios.php?accion=login" method="post">
                <h2 class="text-center text-secondary"> bienvenido </h2>
                <p class="text-center text-secondary"> inicia sesion </p>
                <input class="form-control" placeholder="correo" required type="text" name="correo"><br><br>
                <input class="form-control" placeholder="contraseña" required type="password" name="contraseña"><br><b>
                    <input class="btn btn-primary" name="inicio" class="btn" type="submit" value="entrar"><br><br>
                    <a class="mr-auto navbar-brand" href="../usuarios/formulario_registro.php">registro</a>
            </form>
        </div>
    </div>
    <a href="../../index.php">inicio</a>
</body>

</html>

HTML;

    echo $html;
}
function Formulario_productos()
{
    $html = <<<HTML
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
<div class="contenedor">
        <form class="col-4 p-3 m-auto" action="../../librerias/lib_productos.php?accion=registrar_productos" method="post" enctype="multipart/form-data">
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
HTML;
    echo $html;
}
function Mostrar_productos()
{

    date_default_timezone_set('America/Bogota');
    $fecha = date('d-m-Y g:i:s A');
    session_start();
    if (isset($_SESSION["correo"])) {
        echo $_SESSION["correo"];
        $html = <<<HTML
<form action='../../Librerias/lib_usuarios.php?accion=sesion' method='post'>
    <input type='submit' value="cerrar sesion">
</form>
HTML;
    }
    $html .= <<<HTML
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
    <a href="../../Librerias/lib_productos.php?accion=excel" class="btn btn-small btn-warning">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>
    <h3 class="text-center text-secondary">productos</h3>
    <div class="mx-auto col-8 p-6" id="resultados-conainer">
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
HTML;
    include "../../conexion.php";
    $conexion = Conexion();
    $mostrar = pg_query($conexion, "SELECT * FROM productos");
    $numero = pg_num_rows($mostrar);

    while ($filas = pg_fetch_assoc($mostrar)) {
        $html .= <<<HTML
<tr>
<td>{$filas["id"]}</td>
<td>
    <div class="card mx-4 mt-4 mx-auto" style="width: 10rem;">
        <img src="/{$filas['imagen']}" height="70%" width="100%" class="card-img-top">
    </div>
</td>
<td>{$filas["nombre"]}</td>
<th>{$filas["descripcion"]}</th>
<td>{$filas["precio"]}</td>
<td>{$filas["stock"]}</td>

<td>
    <a href="../../Librerias/lib_productos.php?accion=modificar&id={$filas['id']}" class="btn btn-small btn-warning">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>
    <form action="/ti/librerias/lib_Productos.php?accion=eliminar&id={$filas['id']}" method="post">
        <button name="eliminar" class="btn btn-small btn-danger" type="submit" onclick="return Pregunta()">
            <i class="fa-solid fa-trash">

            </i>
        </button>
    </form>
</td>



</tr>
</div>
</div>
HTML;
    }
    $html .= <<<HTML
    <p>total : {$numero}</p>
    <p>fecha y hora : {$fecha}</p>
    
</tbody>
</table>
</div>
<button class="btn btn-secondary">
    <a href="../catalogo/catalogo.php">catalogo</a>
</button>
<button class="btn btn-secondary">
    <a href="../productos/productos.php">agregar productos</a>
</button>
<a href="../../index.php">inicio</a>
HTML;
    echo $html;
}
function Catalogo()
{
    $html = <<<HTML
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
HTML;
    session_start();
    if (isset($_SESSION["correo"])) {
        $html .= <<<HTML
              <form action="../../controlador/carrito.php" method="post">
        <input type="submit" name="cerrar"value="cerrar sesion">
        </form> {$_SESSION["correo"]}

        
HTML;
    } else {
        $html .= <<<HTML
            <a href='../pagina-principal/login.php'>
                <i>iniciar sesion </i>
            </a>
HTML;
    }
    $html .= <<<HTML
 </div>

<div class="container">
    <div class="row">

HTML;
    include "../../conexion.php";
    $conexion = Conexion();
    $ramdom = pg_query($conexion, "SELECT * FROM productos");
    $total = pg_num_rows($ramdom);
    while ($filas = pg_fetch_assoc($ramdom)) {
        $html .= <<<HTML
                <div class="card mx-4 mt-4 mx-auto" style="width: 21rem;">

                <td>{$filas['id']}</td>

                    <img src="/{$filas['imagen']}" height="100%" width="100%" class="card-img-top" alt=""><br>

                    <div class="card-title">
                        {$filas['nombre']}
                    </div>
                    <div class="card-body">
                        <p>
                            {$filas['descripcion']}
                        </p>

                        <p>precio: $
                            {$filas['precio']}
                        </p>
                        <p>
                            disponibles:
                            {$filas['stock']}
                        </p>

                    </div>
                    <div class="card-footer">
                        <button class="btn-buy button1">COMPRALO YA¡</button>
                        <form action="../../Librerias/lib_carrito.php?accion=agregar" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="{$filas['id']}">
                            <input name="nombre" type="hidden" value="{$filas['nombre']}">
                            <input name="descripcion" type="hidden" value="{$filas['descripcion']}">
                            <input name="precio" type="hidden" value="{$filas['precio']}">
                            <input name="stock" type="hidden" value="{$filas['stock']}">
                            <input name="foto" type="hidden" value="{$filas['imagen']}">
                            <input name="carrito" type="submit" class="btn btn-primary" value="agregar al carrito">
                        </form>
                        
                    </div>

                </div>
HTML;
    }
    $html .= <<<HTML
    <div>
                <form action="../../Librerias/lib_carrito.php?accion=ver" method="post">
                    <button>ver carrito</button>
                </form>
            </div>
            <!-- <a href="">ver carrito</a> -->
        </div>
        <p> resultado : {$total}</p>
    </div>
    <a href="../../index.php">inicio</a>
HTML;
    echo $html;
}

function Carrito_HTML()
{
    $correo = $_SESSION["correo"];    
    $html = <<<HTML
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
            <form action="../../Librerias/lib_carrito.php?accion=eliminarT" method="post">
                <input type="submit" value="vaciar el carrito">
            </form>
        </div>
        <!-- <a href="../../controlador/carrito.php?carri=eliminarT"> Vaciar el carrito</a> -->
HTML;
    session_start();
    if (isset($correo)) {
        echo $correo;
    }

    require_once '../../modelo/Modelocarrito.php';
    $modelo = new Carrito();
    $zapatos = $modelo->ver();
    // if (empty($_SESSION['carrito'])) {
    //     // echo 'no hay nada en el carrito';
    //     header('Location: ../catalogo/carrito.php');
    // } else {
    //     return  $_SESSION['carrito'];
    // }
    include "../../conexion.php";
    $conexion = Conexion();
    $consulta = <<<SQL
        SELECT * FROM productos
SQL;
    $resultado = pg_query($conexion, $consulta);

    foreach ($zapatos as $id => $zapatico):
    $totalProducto = $zapatico['precio'] * $zapatico['cantidad'];

        $html .= <<<HTML
            <div class="container">
                <div class="card mx-4 mt-4 mx-auto" style="width: 21rem;">
                    <!-- <div> -->
                    <!--<p>fotico:  {$zapatico['stock']}</p> en la foto sale la descripcion -->
                    <!-- </div> -->
                    <div>
                        <img src="/{$zapatico['foto']}" height="100%" width="100%" class="card-img-top" alt="...">
                    </div>
                    <!-- <img src="{$zapatico['imagen']}alt="" class="card-img-top"> -->
                    <div class="card-body">

                    <h3 class="card-title ">num :{$zapatico['id']}</h3>
                        <h3 class="card-title ">nombre :{$zapatico['nombre']}
                        </h3>
    
                        <p class="">precio $ : {$zapatico['precio']}</p> <!-- en el precio aparece el stcok o disponibles -->
                        <!--<p class="">disponibles : {$zapatico['stock']}p>  en el stock aparece la ruta de la foto -->
    
                        <p class="">disponibles : {$zapatico['stock']}</p> <!-- en la descripcion aparece el precio -->
                        <p class="">descripcion : {$zapatico['descripcion']}</p> <!-- en la descripcion aparece el precio -->
                        <p>Total: \${$totalProducto}</p>
    
    
                    </div>
                    <div class="card-footer">
                    <form action="../../Librerias/lib_carrito.php?accion=actualizar" method="post" class="form-inline">
                        <input type="hidden" name="id" value="{$id}">
                        <label for="cantidad">Cantidad:</label>
                        <input type="number" name="cantidad" value="{$zapatico['cantidad']}" min="1" max="{$zapatico['stock']}" class="form-control mx-2">
                        <button type="submit" class="btn btn-outline-primary">Actualizar</button>
                    </form>
                        <form action="../../Librerias/lib_carrito.php?accion=eliminarU" method="post">
                            <input type="hidden" name="id" value="{$id}">
                            <button type="submit" class="btn btn-outline-danger"> Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
HTML;
    endforeach;
    $html .= <<<HTML
        <div>
            <form action="../../Librerias/lib_carrito.php?accion=index" method="post">
                <input type="submit" value="volver a la tienda">
            </form>
        </div>
    
    
        <!--  -->
    
    </body>
HTML;
    echo $html;
}
