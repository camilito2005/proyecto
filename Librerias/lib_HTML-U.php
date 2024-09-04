<?php

function Formulario_clientes()
{
    $formulario = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../../css/cargando.css">
<!--<link rel="shortcut icon" href="../../fotos/agregar-usuario.png" type="image/x-icon">-->
<link rel="shortcut icon" href="../../fotos/agregar-usuario.png" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d6ecbc133f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="../../css/registro.css"> -->
    <script src="../../js/cargando.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <body>

    <title>Registro</title>
    
<div id="loading">Cargando...</div>
    <div class="contenedor">
        <div class="formulario_registro">
            <form id="myForm" onsubmit="showLoading()"  class="col-4 p-3 m-auto" action="?accion=registrar" method="post">
                <h3 class="text-center text-secondary">registro de clientes</h3>
                <div id="loading">Cargando...</div>

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
                
            </form>

            <script src="../js/cargando.js"></script>

            <form id="myForm" action="../usuarios/usuarios.php" onsubmit="showLoading()" method="post">
                <button class="btn btn-outline-secondary" value="inicio">
                <i class="fa-duotone fa-solid fa-users-viewfinder"></i>usuarios
                </button>
            </form>

            <form id="myForm" action="../../index.php" onsubmit="showLoading()" method="post">
                <button class="btn btn-outline-secondary" value="inicio">
                    <i class="fa-solid fa-house"></i>inicio
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
<link rel="shortcut icon" href="../../fotos/mostrar-contraseña.png" type="image/x-icon">

<link rel="stylesheet" href="../../css/cargando.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d6ecbc133f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="../../js/cargando.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tabla</title>
</head>

<body>
    
<div id="loading">Cargando...</div>
    <h3 class="text-center text-secondary">usuarios</h3>
    <div class="input-search">
        <nav>
            <form method="post">
                <input  type="search" id="search" placeholder="search">
            </form>
        </nav>
    </div>
    <!--<form class="mx-auto col-4 p-3" action="../../Librerias/lib_usuarios.php?accion=search" method="post">
    </form>-->
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
                    <th scope="col">modificar/ELIMINAR</th>
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
                    <a href="../../Librerias/lib_usuarios.php?accion=modificar&id=$id"><i class="fa-solid fa-pen"></i></a>
                    <a href="usuarios.php?accion=eliminar&id=$id"><i class="fa-sharp-duotone fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            </tbody>
HTML;
    }
    $mostrar .= <<<HTML
    
        </tbody>
        </table>
    </div>

    <form id="myForm" action="./formulario_registro.php" onsubmit="showLoading()" method="post">
        <button class="btn btn-outline-secondary" value="inicio">
        <i class="fa-solid fa-user-plus"></i>agregar usuarios
        </button>
    </form>

    <form id="myForm" action="../../index.php" onsubmit="showLoading()" method="post">
        <button class="btn btn-outline-secondary" value="inicio">
            <i class="fa-solid fa-house"></i>inicio
        </button>
    </form>

    
    <script src="../../js/script.js"></script>
HTML;
    echo $mostrar;
}

function Login_html()
{
    $html = <<<HTML

    
<!DOCTYPE html>
<html lang="en">

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d6ecbc133f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/cargando.css">
    <script src="../../js/cargando.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inicia sesion</title>
</head>

<body>
<div id="loading">Cargando...</div>
    <div class="mx-auto contenedor">
        <div class="formulario_registro">
            <form id="myForm" class="mx-auto col-4 p-3 " action="../../Librerias/lib_usuarios.php?accion=login" onsubmit="showLoading()" method="post">
                <h2 class="text-center text-secondary"> bienvenido </h2>
                <p class="text-center text-secondary"> inicia sesion </p>
                <input class="form-control" placeholder="correo" required type="text" name="correo"><br><br>
                <input class="form-control" placeholder="contraseña" required type="password" name="contraseña"><br><br>
                    <input class="btn btn-primary" name="inicio" class="btn" type="submit" value="entrar"><br><br>
                    <div>
                        <a class="mr-auto navbar-brand" href="../usuarios/correo_restablecer_contraseña.php?accion=recuperar">olvidaste tu contraseña?</a>
                    </div>
            </form>

        </div>
    </div>
 
    <form id="myForm" action="../usuarios/formulario_registro.php" onsubmit="showLoading()" method="post">
        <button class="btn btn-outline-secondary" value="inicio">
            <i class="fa-solid fa-user-plus"></i>agregar usuarios
        </button>
    </form>


    <form id="myForm" action="../../index.php" onsubmit="showLoading()" method="post">
        <button class="btn btn-outline-secondary" value="inicio">
            <i class="fa-solid fa-house"></i>inicio
        </button>
    </form>
</body>

</html>

HTML;
    echo $html;
}
function Formulario_productos()
{
    echo <<<HTML
        <!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="../../css/cargando.css">
    <link rel="shortcut icon" href="../../fotos/comercio-electronico.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d6ecbc133f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="../../js/cargando.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>

<body>
<div id="loading">Cargando...</div>
<div class="contenedor">
    <form id="myForm" class="col-4 p-3 m-auto" action="../../librerias/lib_productos.php?accion=registrar_productos" method="post" enctype="multipart/form-data" onsubmit="showLoading()">
        <h3>Agregar productos</h3>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del producto</label>
            <input type="text" class="form-control" name="nombre" id="nombre" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" name="descripcion" id="descripcion" required></textarea>
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio:</label>
            <input type="number" class="form-control" name="precio" id="precio" required>
        </div>
        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" class="form-control" name="cantidad" id="cantidad" required>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Seleccione la foto</label>
            <input type="file" class="form-control" name="foto" id="foto" accept="image/*" required>
        </div>
        <input class="btn btn-primary" name="enviar" type="submit" value="Agregar">
    </form>

    <form id="myForm" action="../catalogo/catalogo.php" onsubmit="showLoading()" method="post">
            <button class="btn btn-outline-secondary" >
            <i class="fa-solid fa-eye"></i>ver catalogo
            </button>
    </form>

    <form id="myForm" action="../../index.php" onsubmit="showLoading()" method="post">
        <button class="btn btn-outline-secondary" value="inicio">
            <i class="fa-solid fa-house"></i>inicio
        </button>
    </form>
</div>
</body>

</html>
HTML;

}
function Mostrar_productos()
{

    $sesion = $_SESSION["correo"];
    
    date_default_timezone_set('America/Bogota');
    $fecha = date('d-m-Y g:i:s A');
    if (isset($_SESSION["correo"])) {
        echo $_SESSION["correo"];
        $html = <<<HTML
<form action='../../Librerias/lib_usuarios.php?accion=sesion' method='post'>
    <input type='submit' value="cerrar sesion">cerrar sesion
</form>
HTML;
    }
    $html .= <<<HTML
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="../../css/cargando.css">
<link rel="shortcut icon" href="../../fotos/mostrar_productos.png" type="image/x-icon">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d6ecbc133f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="../../js/cargando.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/busqueda.css">
    <title>Productos</title>
</head>

<body>
    
<div id="loading">Cargando...</div>
    <script src="../../js/busqueda.js" defer></script>

    <div class="input-search">
        <nav>
            <input  type="search" id="search" placeholder="search">
        </nav>
    </div>
    <!--<form id="myForm" action="../../Librerias/lib_productos.php?accion=excel" onsubmit="showLoading()" method="post">
        <button class="btn btn-outline-secondary"  value="agregar productos">
        <i class="fa-solid fa-file-excel"></i>excel
        </button>
    </form>

    <form id="myForm" action="../../Librerias/lib_productos.php?accion=pdf" onsubmit="showLoading()" method="post">
        <button class="btn btn-outline-secondary" target="_blank">
            <i class="fa-solid fa-file-pdf"></i>pdf
        </button>
    </form>-->

    <a href="../../Librerias/lib_productos.php?accion=excel" class="btn btn-small btn-warning">
        <i class="fa-solid fa-file-excel"></i>
    </a>
    <a href="../../Librerias/lib_productos.php?accion=pdf" target="_blank" class="btn btn-success">
        <i class="fa-solid fa-file-pdf"></i>
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
    <form id="myForm" action="/ti/librerias/lib_Productos.php?accion=eliminar&id={$filas['id']}" method="post">
        <button name="eliminar" class="btn btn-small btn-danger" type="submit" onsubmit="showLoading()" onclick="return Pregunta()">
            <i class="fa-solid fa-trash"></i>
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

<form id="myForm" action="../catalogo/catalogo.php" onsubmit="showLoading()" method="post">
    <button class="btn btn-outline-secondary"  value="catalogo">
        <i class="fa-solid fa-shop"></i>ver catalogo
    </button>
</form>

<form id="myForm" action="../productos/productos.php" onsubmit="showLoading()" method="post">
    <button class="btn btn-outline-secondary"  value="agregar productos">
        <i class="fa-sharp fa-solid fa-plus"></i>agregar productos
    </button>
</form>


<form id="myForm" action="../../index.php" onsubmit="showLoading()" method="post">
    <button class="btn btn-outline-secondary" value="inicio">
        <i class="fa-solid fa-house"></i>inicio
    </button>
</form>

HTML;
    echo $html;
}
function Catalogo()
{
    $html = <<<HTML
    <!DOCTYPE html>
<html lang="en">

<head>
<link rel="shortcut icon" href="../fotos/imagen-del-producto.png" type="image/x-icon">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d6ecbc133f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/cargando.css">
    <script src="../../js/cargando.js"></script>
    <script src="../../js/cargando2.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>catalogo</title>
</head>

<body>
    
<div id="loading">Cargando...</div>
    <div class="row">
        
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul>
                    <li>
                        <a href=""></a>
                    </li>
                </ul>
            </div>
            <div class="container-fluid">
                <input name="busqueda" type="search" id="buscador">
            </div>

        </nav>
        <h4 class="text-center text-secondary">
            productos
        </h4>
HTML;
    session_start();
    if (isset($_SESSION["correo"])) {
        $html .= <<<HTML

            <form id="myForm" action="../../Librerias/lib_usuarios.php?accion=sesion" onsubmit="showLoading()" method="post">
                <button type="submit"  name="cerrar"value="cerrar sesion">
                    <i class="fa-solid fa-right-from-bracket"></i>cerrar sesion 
                </button>
            </form> 
            <div class="container-fluid">{$_SESSION["correo"]}

            </div>
HTML;
    } else {
        $html .= <<<HTML
            <form id="myForm" action="../pagina-principal/login.php" onsubmit="showLoading()" method="post">
                <button type="submit"  name="cerrar"value="iniciar">
                    <i class="fa-solid fa-right-from-bracket"></i>iniciar sesion
                </button>
            </form> 
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
                        <form id="myForm" action="../../Librerias/lib_carrito.php?accion=agregar" onsubmit="showLoading()" method="post" enctype="multipart/form-data">
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
                <form action="../../Librerias/lib_carrito.php?accion=ver" onsubmit="showLoading()" id="myForm"  method="post">
                    <button><i class="fa-solid fa-cart-shopping"></i>ver carrito</button>
                </form>
            </div>
            <!--<a href="../../Librerias/lib_carrito.php?accion=ver" id="loadingLink" class="loading-link">
                <i class="fa-solid fa-cart-shopping"></i>
            </a> -->

        <div id="loadingSpinner" class="loading-spinner" style="display: none;">Cargando...</div>
        </div>
        <p> total : {$total}</p>
    </div>
    <form id="myForm" action="../../index.php" onsubmit="showLoading()" method="post">
            <button class="btn btn-outline-secondary" value="inicio">
            <i class="fa-solid fa-house"></i>inicio
            </button>
    </form>
HTML;
    echo $html;
}

function Carrito_HTML()
{   
    $html = <<<HTML
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d6ecbc133f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/cargando.css">
    <script src="../../js/cargando.js"></script>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>carrito</title>
    </head>
    
    <body>
    <div id="loading">Cargando...</div>
        <!-- <div>
            <form action="../../Librerias/lib_carrito.php?accion=eliminarT" method="post">
                <input type="submit" value="">
            </form>
        </div> 
        
        <div>
            <a href="../../Librerias/lib_carrito.php?accion=eliminarT"><i class="fa-solid fa-eraser"></i></a>
        </div>-->

        <form id="myForm" action="../../controlador/carrito.php?carri=eliminarT" onsubmit="showLoading()" method="post">
            <button class="btn btn-outline-secondary" value="inicio">
                <i class="fa-solid fa-eraser"></i>vaciar el carrito
            </button>
        </form>
HTML;
    session_start();
    if (isset($correo)) {
        echo $correo;
    }

    require_once '../../modelo/Modelocarrito.php';
    $modelo = new Carrito();
    $zapatos = $modelo->ver();
    /*include "../../conexion.php";
    $conexion = Conexion();
    $consulta = <<<SQL
        SELECT * FROM productos
SQL;
    $resultado = pg_query($conexion, $consulta);*/

    foreach ($zapatos as $id => $zapatico):
    $totalProducto = $zapatico['precio'] * $zapatico['cantidad'];

        $html .= <<<HTML
            <div class="container">
                <div class="card mx-4 mt-4 mx-auto" style="width: 29rem;">
                    <div>
                        <img src="/{$zapatico['foto']}" height="100%" width="100%" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">

                    <h3 class="card-title ">numero de ferencia :{$zapatico['id']}</h3>
                        <h3 class="card-title ">nombre :{$zapatico['nombre']}
                        </h3>
    
                        <p class="">precio $ : {$zapatico['precio']}</p> 
    
                        <p class="">disponibles : {$zapatico['stock']}</p>
                        <p class="">descripcion : {$zapatico['descripcion']}</p> 
                        <p>Total: \${$totalProducto}</p>
    
    
                    </div>
                    <div class="card-footer">
                    <button class="btn-buy button1">COMPRALO YA¡</button>
                    <form action="../../Librerias/lib_carrito.php?accion=actualizar" onsubmit="showLoading()" id="myForm" method="post" class="form-inline">
                        <input type="hidden" name="id" value="{$id}">
                        <label for="cantidad">Cantidad:</label>
                        <input type="number" name="cantidad" value="{$zapatico['cantidad']}" min="1" max="{$zapatico['stock']}" class="form-control mx-2">
                        <button type="submit" class="btn btn-outline-primary">Actualizar</button>
                    </form>
                        <form action="../../Librerias/lib_carrito.php?accion=eliminarU" onsubmit="showLoading()" id="myForm"  method="post">
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
        <form id="myForm" action="../../Librerias/lib_carrito.php?accion=index" onsubmit="showLoading()" method="post">
            <button class="btn btn-outline-secondary" value="inicio">
                <i class="fa-solid fa-shop"></i>volver a la tienda
            </button>
        </form>
        <!-- <a href="../../Librerias/lib_carrito.php?accion=index"><i class="fa-solid fa-house"></i></a> 
        <a href="../../Librerias/lib_carrito.php?accion=index"><i class="fa-solid fa-shop"></i></a>-->
        
            <!-- <form action="../../Librerias/lib_carrito.php?accion=index" method="post">
                <input type="submit" value="volver a la tienda">
            </form> -->
        </div>
    
    
        <!--  -->
    
    </body>
HTML;
    echo $html;
}
function Formulario_enviar_correo(){
    echo <<<HTML
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
</head>
<body>
    <h2>Restablecer Contraseña</h2>
    <form action="../../Librerias/lib_usuarios.php?accion=correo_enviado" method="post">
        <label for="email">Correo Electrónico:</label>
        <input type="email" name="correo" id="correo" required>
        <input type="submit" value="Enviar Enlace de Restablecimiento">
    </form>
</body>
</html>
HTML;
}
function Form_restablecer_contraseña(){

    $pdo = new PDO('pgsql:host=localhost;dbname=pagina', 'postgres', 'camilo');
    //$conexion = Conexion();

if (!isset($_GET['token'])) {
    die('Token es requerido');
}

$token = $_GET['token'];

echo $token;

$stmt = $pdo->prepare('SELECT * FROM Restablecer_contraseña WHERE token = ? AND expires_at > NOW()');
$stmt->execute([$token]);
$reset = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$reset) {
    die('El token es inválido o ha expirado.');
}

    echo <<<HTML
<form action="reset_password_action.php" method="post">
    <input type="hidden" name="token" value="htmlspecialchars{($token)}">
    <label for="password">Nueva Contraseña:</label>
    <input type="password" id="password" name="password" required>
    <button type="submit">Restablecer Contraseña</button>
</form>
HTML;
}

