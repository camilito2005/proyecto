<?php
//include_once "../../Librerias/lib_menu.php";
function Formulario_clientes()
{
    

    /*Menus($ruta_css="../../css/estilos7.css",$ruta_usuarios="#",$ruta_registra_usuarios="#",
    $ruta_catalogo="#",$ruta_login="#",$ruta_facturas="#",
    $ruta_Verproductos="#",$ruta_aggproductos="#");*/

    echo <<<HTML
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
            <form id="myForm" onsubmit="showLoading()"  class="col-4 p-3 m-auto" action="usuarios.php?accion=registrar" method="post">
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
}
function Formulario_clientes1() {
    echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../css/cargando.css">
    <link rel="shortcut icon" href="../../fotos/agregar-usuario.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d6ecbc133f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="../../js/cargando.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        body {
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .contenedor {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
        }
        .formulario_registro {
            padding: 20px;
        }
        .form-label {
            font-weight: bold;
        }
        .btn-primary {
            width: 100%;
        }
    </style>
</head>
<body>

<div class="contenedor">
    <div class="formulario_registro">
        <form id="myForm" onsubmit="showLoading()" action="usuarios.php?accion=registrar" method="post">
            <h3 class="text-center text-secondary">Registro de Clientes</h3>
            <div id="loading">Cargando...</div>

            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input class="form-control" required type="text" name="dni" placeholder="Introduzca su DNI">
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input class="form-control" required type="text" name="nombre" placeholder="Introduzca su nombre">
            </div>

            <div class="mb-3">
                <label for="apellido" class="form-label">Apellidos</label>
                <input class="form-control" required type="text" name="apellido" placeholder="Introduzca sus apellidos">
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Número Telefónico</label>
                <input class="form-control" required type="tel" name="telefono" placeholder="Introduzca su número telefónico">
            </div>

            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input class="form-control" required type="text" name="direccion" placeholder="Dirección">
            </div>

            <div class="mb-3">
                <label for="correo" class="form-label">Correo Electrónico</label>
                <input class="form-control" required type="email" name="correo" placeholder="Introduzca su correo electrónico">
            </div>

            <div class="mb-3">
                <label for="contraseña" class="form-label">Contraseña</label>
                <input class="form-control" required type="password" name="contraseña" placeholder="Contraseña">
            </div>

            <div class="mb-3">
                <label for="confirm_contraseña" class="form-label">Confirmar Contraseña</label>
                <input class="form-control" required type="password" name="confirm_contraseña" placeholder="Confirmar contraseña">
            </div>

            <input class="btn btn-primary" type="submit" name="registro" value="Registrar"><br><br>

        </form>

        <form action="../usuarios/usuarios.php" onsubmit="showLoading()" method="post">
            <button class="btn btn-outline-secondary" type="submit">
                <i class="fa-duotone fa-solid fa-users-viewfinder"></i> Usuarios
            </button>
        </form>

        <form action="../../index.php" onsubmit="showLoading()" method="post">
            <button class="btn btn-outline-secondary" type="submit">
                <i class="fa-solid fa-house"></i> Inicio
            </button>
        </form>
    </div>
</div>

</body>
</html>
HTML;
}


function Mostrar_usuarios1(){
    echo <<<HTML
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="shortcut icon" href="../../fotos/mostrar-contraseña.png" type="image/x-icon">

<link rel="stylesheet" href="../../css/cargando.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d6ecbc133f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="../../js/cargando.js"></script>
    <script src="../../js/pregunta.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tabla</title>
</head>

<body>
    <script>
</script>
    
<div id="loading">Cargando...</div>
    <h3 class="text-center text-secondary">usuarios</h3>
    <div class="input-search">
        <nav>
            <form method="post">
                <input  type="search" id="search" placeholder="search">
            </form>
        </nav>
    </div>
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

$usuarios = pg_fetch_all($query);

//print_r($usuarios);

if ($usuarios) { // Verifica si hay resultados
    foreach ($usuarios as $fila) {
        $id = $fila['id'];
        $dni = $fila['dni'];
        $nombre = $fila['nombre'];
        $apellido = $fila['apellido'];
        $telefono = $fila['telefono'];
        $direccion = $fila['direccion'];
        $correo = $fila['correo'];
        $contraseña = $fila['contraseña'];

        echo <<<HTML
            <tbody>
                <tr>
                    <td>$id</td>
                    <td>$dni</td>
                    <td>$nombre</td>
                    <td>$apellido</td>
                    <td>$telefono</td>
                    <td>$direccion</td>
                    <td>$correo</td>
                    <!--<td>$contraseña</td>-->
                    <td>
                    <a href="../usuarios/usuarios.php?accion=modificar&id=$id"><i class="fa-solid fa-pen"></i></a>
                    <a href="usuarios.php?accion=eliminar&id=$id" onclick="return pregunta()"><i class="fa-sharp-duotone fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            </tbody>
HTML;
    }
} else {
    echo "<tbody><tr><td colspan='8'>No hay usuarios registrados.</td></tr></tbody>";
}


    //$areglo = [];

    /*while ($fila = pg_fetch_object($query)) {
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

        echo <<<HTML
            <tbody>
                <tr>
                    <td>$id</td>
                    <td>$dni</td>
                    <td>$nombre</td>
                    <td>$apellido</td>
                    <td>$telefono</td>
                    <td>$direccion</td>
                    <td>$correo</td>
                    <!--<td>$contraseña</td>-->
                    <td>
                    <a href="../usuarios/usuarios.php?accion=modificar&id=$id"><i class="fa-solid fa-pen"></i></a>
                    <a href="usuarios.php?accion=eliminar&id=$id" onclick="return pregunta()"><i class="fa-sharp-duotone fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            </tbody>
HTML;
    }*/
    echo <<<HTML
    
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

    
HTML;
}

function Mostrar_usuarios() {
    /*Menus($ruta_css="../../css/estilos7.css",$ruta_usuarios="#",$ruta_registra_usuarios="#",
    $ruta_catalogo="#",$ruta_login="#",$ruta_facturas="#",
    $ruta_Verproductos="#",$ruta_aggproductos="#");*/
    echo <<<HTML
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="../../fotos/mostrar-contraseña.png" type="image/x-icon">
    <link rel="stylesheet" href="../../css/cargando.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d6ecbc133f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="../../js/cargando.js"></script>
    <script src="../../js/pregunta.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Usuarios</title>
    <style>
        body {
            background-color: #f5f5f5;
            padding: 20px;
        }
        .table-container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .input-search {
            margin-bottom: 20px;
        }
        .btn-outline-secondary {
            width: 100%;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div id="loading">Cargando...</div>
    <h3 class="text-center text-secondary">Usuarios</h3>
    
    <div class="input-search text-center">
        <nav>
            <form method="post">
                <input type="search" id="search" class="form-control" placeholder="Buscar" style="width: 300px; display: inline-block;">
            </form>
        </nav>
    </div>

    <div class="table-container mx-auto col-12 col-md-8">
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Modificar/Eliminar</th>
                </tr>
            </thead>
            <tbody>
HTML;

    include_once "../../conexion.php";
    $conexion = Conexion();
    $consulta1 = "SELECT * FROM usuarios";
    $query = pg_query($conexion, $consulta1);
    $usuarios = pg_fetch_all($query);

//print_r($usuarios);

if ($usuarios) { // Verifica si hay resultados
    foreach ($usuarios as $fila) {
        $id = $fila['id'];
        $dni = $fila['dni'];
        $nombre = $fila['nombre'];
        $apellido = $fila['apellido'];
        $telefono = $fila['telefono'];
        $direccion = $fila['direccion'];
        $correo = $fila['correo'];
        $contraseña = $fila['contraseña'];

        echo <<<HTML
            <tbody>
                <tr>
                    <td>$id</td>
                    <td>$dni</td>
                    <td>$nombre</td>
                    <td>$apellido</td>
                    <td>$telefono</td>
                    <td>$direccion</td>
                    <td>$correo</td>
                    <!--<td>$contraseña</td>-->
                    <td>
                    <a href="../usuarios/usuarios.php?accion=modificar&id=$id"><i class="fa-solid fa-pen"></i></a>
                    <a href="usuarios.php?accion=eliminar&id=$id" onclick="return pregunta()"><i class="fa-sharp-duotone fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            </tbody>
HTML;
    }
} else {
    echo "<tbody><tr><td colspan='8'>No hay usuarios registrados.</td></tr></tbody>";
}

    /*while ($fila = pg_fetch_object($query)) {
        $id = $fila->id;
        $dni = $fila->dni;
        $nombre = $fila->nombre;
        $apellido = $fila->apellido;
        $telefono = $fila->telefono;
        $direccion = $fila->direccion;
        $correo = $fila->correo;

        echo <<<HTML
                <tr>
                    <td>$id</td>
                    <td>$dni</td>
                    <td>$nombre</td>
                    <td>$apellido</td>
                    <td>$telefono</td>
                    <td>$direccion</td>
                    <td>$correo</td>
                    <td>
                        <a href="../usuarios/usuarios.php?accion=modificar&id=$id" class="text-primary"><i class="fa-solid fa-pen"></i></a>
                        <a href="usuarios.php?accion=eliminar&id=$id" class="text-danger" onclick="return pregunta()"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
HTML;
    }*/

    echo <<<HTML
            </tbody>
        </table>
    </div>

    <div class="mx-auto col-12 col-md-8">
        <form id="myForm" action="./formulario_registro.php" onsubmit="showLoading()" method="post">
            <button class="btn btn-outline-secondary" type="submit">
                <i class="fa-solid fa-user-plus"></i> Agregar Usuarios
            </button>
        </form>

        <form id="myForm" action="../../index.php" onsubmit="showLoading()" method="post">
            <button class="btn btn-outline-secondary" type="submit">
                <i class="fa-solid fa-house"></i> Inicio
            </button>
        </form>
    </div>
    
</body>
</html>
HTML;
}


function Login_html()
{
    /*Menus($ruta_css="../../css/estilos7.css",$ruta_usuarios="#",$ruta_registra_usuarios="#",
    $ruta_catalogo="#",$ruta_login="#",$ruta_facturas="#",
    $ruta_Verproductos="#",$ruta_aggproductos="#");*/
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
            <form id="myForm" class="mx-auto col-4 p-3 " action="../pagina-principal/login.php?accion=login" onsubmit="showLoading()" method="post">
                <h2 class="text-center text-secondary"> bienvenido </h2>
                <p class="text-center text-secondary"> inicia sesion </p>
                <input class="form-control" placeholder="correo" required type="text" name="correo"><br><br>
                <input class="form-control" placeholder="contraseña" required type="password" name="contraseña"><br><br>
                    <input class="btn btn-primary" name="inicio" class="btn" type="submit" value="entrar"><br><br>
                    <div>
                        <a class="mr-auto navbar-brand" href="../usuarios/usuarios.php?accion=recuperar">olvidaste tu contraseña?</a>
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
    /*Menus($ruta_css="../../css/estilos7.css",$ruta_usuarios="#",$ruta_registra_usuarios="#",
    $ruta_catalogo="#",$ruta_login="#",$ruta_facturas="#",
    $ruta_Verproductos="#",$ruta_aggproductos="#");*/
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
    <form id="myForm" class="col-4 p-3 m-auto" action="../productos/productos.php?accion=registrar_productos" method="post" enctype="multipart/form-data" onsubmit="showLoading()">
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
function Mostrar_productos(){
    /*Menus($ruta_css="../../css/estilos7.css",$ruta_usuarios="#",$ruta_registra_usuarios="#",
    $ruta_catalogo="#",$ruta_login="#",$ruta_facturas="#",
    $ruta_Verproductos="#",$ruta_aggproductos="#");*/
    
    date_default_timezone_set('America/Bogota');
    $fecha = date('d-m-Y g:i:s A');
    if (isset($_SESSION["correo"])) {
        echo $_SESSION["correo"];
        echo <<<HTML
<form action='../usuarios/usuarios.php?accion=cerrar' method='post'>
    <input type='submit' value="cerrar sesion">cerrar sesion
</form>
HTML;
    }
    echo <<<HTML
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="../../css/cargando.css">
    <link rel="shortcut icon" href="../../fotos/mostrar_productos.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../js/cargando.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>

<body>
    
<div id="loading">Cargando...</div>
<div class="container">
        <h3 class="text-center">Productos</h3>
        <div class="input-field">
            <input type="search" id="search" placeholder="Buscar">
            <label for="search">Buscar</label>
        </div>
        <a href="../productos/productos.php?accion=excel" class="btn btn-warning"><i class="fa-solid fa-file-excel"></i></a>
        <a href="../productos/productos.php?accion=pdf" target="_blank" class="btn btn-success"><i class="fa-solid fa-file-pdf"></i></a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Imagen</th>
                    <th>Nombre del Producto</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
HTML;

    include "../../conexion.php";
    $conexion = Conexion();
    $mostrar = pg_query($conexion, "SELECT * FROM productos");
    $numero = pg_num_rows($mostrar);

    $mostrar_producto = pg_fetch_all($mostrar);

    if ($mostrar_producto) {
        foreach ($mostrar_producto as $value) {
            $precio = number_format($value["precio"]);
        echo <<<HTML
<tr>
    <td>{$value["id"]}</td>
    <td>
        <img src="/{$value['imagen']}" height="70" width="100">
    </td>
    <td>{$value["nombre"]}</td>
    <td>{$value["descripcion"]}</td>
    <td>{$precio}</td>
    <td>{$value["stock"]}</td>
    <td>
        <a href="../productos/productos.php?accion=modificar&id={$value['id']}" class="btn yellow"><i class="fa-solid fa-pen-to-square"></i></a>
        <form action="../productos/productos.php?accion=eliminar&id={$value['id']}" method="post" style="display:inline;">
            <button name="eliminar" class="btn red" type="submit" onclick="return Pregunta()">
                <i class="fa-solid fa-trash"></i>
            </button>
        </form>
    </td>
</tr>
HTML;
    }
}
    else {
        echo "<tbody><tr><td colspan='8'>No hay usuarios registrados.</td></tr></tbody>";
    }
    echo <<<HTML
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
}

    
    

/*function Modificar_productos(){
    include("../../conexion.php");
$id = $_GET["id"];
$sql = $conexion->query(" SELECT * FROM productos WHERE id=$id");

echo <<<HTML
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../../css/fomu_productos.css"> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="contenedor">
        <form class="col-4 p-3 m-auto" action="../../controlador/CONTROLADOR-Productos.php" method="post">
            <h3>modificar productos</h3>
            <input type="hidden" name="id" value="{$_GET['id']}">
HTML;
            // include "../../controlador/actualizar-usuarios.php";
            while ($camilo = $sql->fetch_object()) { 

                echo <<<HTML
                <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">id</label>
                        <input type="text" disabled class="form-control" name="id" value="<?= $camilo->id ?>" >
                    </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">nombre del producto</label>
                    <input type="text" class="form-control" name="nombre" value="<?= $camilo->nombre ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">descrpcion</label>
                    <input type="text" class="form-control" name="descripcion" value="<?= $camilo->descripcion ?>">
                </div>
                <div class="col-md-4">
                    <label for="precio" class="form-label">Precio:</label>
                    <input type="number" class="form-control" name="precio" value="<?= $camilo->precio ?>" id="precio"><br>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">cantidad</label>
                    <input type="number" class="form-control" name="cantidad"  value="<?= $camilo->stock ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" required>foto</label>
                    <input type="file" class="form-control" disabled name="foto" value="<?= $camilo->imagen ?>">
                </div>


HTML; }
            echo <<<HTML
            <input type="submit" class="btn btn-primary" name="modificar" value="modificar productos">
            <button class="btn btn-outline-secondary">
                <a href="../productos/verProductos.php">regresar</a>
            </button>
        </form>
    </div>
</body>

</html>
HTML;

}*/


function Mostrar_productos_excel(){
    
    date_default_timezone_set('America/Bogota');
    $fecha = date('d-m-Y g:i:s A');

    echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../../css/cargando.css">
<link rel="shortcut icon" href="../../fotos/mostrar_productos.png" type="image/x-icon">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d6ecbc133f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/busqueda.css">
    <title>Productos</title>
</head>

<body>
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
    $consulta = <<<SQL
    SELECT * FROM productos
SQL;
$resultado_consulta = pg_query($conexion, $consulta);

    $numero = pg_num_rows($resultado_consulta);

    while ($filas = pg_fetch_assoc($resultado_consulta)) {
        $id = $filas["id"];
        $imagen = $filas["imagen"];
        $nombre = $filas["nombre"];
        $descripcion = $filas["descripcion"];
        $precio = $filas["precio"];
        $stock = $filas["stock"];
        echo $id;
        echo $imagen;
        echo $nombre;
        echo $descripcion;
        echo $precio;
        echo $stock;
        $html .= <<<HTML
                <tr>
                <td>{$id}</td>
                <td>
                    <div class="card mx-4 mt-4 mx-auto" style="width: 10rem;">
                        <img src="/{$imagen}" height="70%" width="100%" class="card-img-top">
                    </div>
                        </td>
                        <td>{$nombre}</td>
                        <th>{$descripcion}</th>
                        <td>{$precio}</td>
                        <td>{$stock}</td>
                        </tr>
HTML;
    }
    $html .= <<<HTML
    <p>total : {$numero}</p>
    <p>fecha y hora : {$fecha}</p>
    
                </tbody>
            </table>
        </div>

HTML;
}

function Catalogo() {
    /*Menus($ruta_css="../../css/estilos7.css",$ruta_usuarios="#",$ruta_registra_usuarios="#",
    $ruta_catalogo="#",$ruta_login="#",$ruta_facturas="#",
    $ruta_Verproductos="#",$ruta_aggproductos="#");*/
    //echo $_SESSION['nombre'];
    /*if (empty($_SESSION['nombre'])) {
        echo "esta session esta vacia";
        echo $_SESSION['nombre'];
    }else {
        echo "se salto el if";
        echo $_SESSION['nombre'];
    }*/

    $html = <<<HTML
    <!DOCTYPE html>
<html lang="es">

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
    <title>Catálogo</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            margin-bottom: 20px;
        }
        .card {
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card-img-top {
            height: 300px; /* Altura fija para todas las imágenes */
            object-fit: cover; /* Ajusta la imagen sin distorsionarla */
        }
        .agotado {
            color: red; /* Color para el texto de agotado */
            font-weight: bold;
        }
        .loading-spinner {
            display: none; /* Cambia esto a block para mostrar */
        }
    </style>
</head>

<body>

    <div id="loading">Cargando...</div>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Catálogo</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex" action="#" method="post">
                    <input name="busqueda" class="form-control me-2" type="search" id="buscador" placeholder="Buscar productos">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>

    <h4 class="text-center text-secondary">Productos</h4>
    
HTML;

    session_start();
    if (isset($_SESSION["correo"])) {
        $html .= <<<HTML
        <div class="container-fluid text-end">
            <span>{$_SESSION["correo"]}</span>
            <!--<span>nombre:{$_SESSION["nombre"]}</span>
            <span>contraseña{$_SESSION["contraseña"]}</span>-->
            <form id="myForm" action="../usuarios/usuarios.php?accion=cerrar" onsubmit="showLoading()" method="post" class="d-inline">
                <button type="submit" class="btn btn-danger btn-sm" name="cerrar" value="cerrar sesion">
                    <i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión
                </button>
            </form>
        </div>
HTML;
    } else {
        $html .= <<<HTML
        <div class="container-fluid text-end">
            <form id="myForm" action="../pagina-principal/login.php" onsubmit="showLoading()" method="post" class="d-inline">
                <button type="submit" class="btn btn-primary btn-sm" name="cerrar" value="iniciar">
                    <i class="fa-solid fa-right-from-bracket"></i> Iniciar sesión
                </button>
            </form>
        </div>
HTML;
    }

    $html .= <<<HTML
    <div class="container">
        <div class="row">
HTML;

    include "../../conexion.php";
    $conexion = Conexion();
    $consulta = pg_query($conexion, "SELECT * FROM productos");
    $mostrar_productos = pg_fetch_all($consulta);
    $total = pg_num_rows($consulta);

    if ($mostrar_productos) {

    foreach ($mostrar_productos as $registros) {
        $imagen = $registros["imagen"];
        $nombre = $registros["nombre"];
        $id = $registros["id"];
        $descripcion = $registros["descripcion"];
        $precio = $registros["precio"];
        $disponible = $registros["stock"];
        
        $precio_number_format = number_format($precio, 2);
        
        $mensaje_agotado = $disponible <= 0 ? '<p class="agotado">Agotado</p>' : '';

        $html .= <<<HTML
            <div class="col-md-4">
                <div class="card mx-4 mt-4">
                    <img src="/{$imagen}" class="card-img-top" alt="{$nombre}">
                    <div class="card-body">
                        <h5 class="card-title">{$nombre}</h5>
                        <p class="card-text">{$descripcion}</p>
                        <p class="card-text"><strong>Precio: $ {$precio_number_format}</strong></p>
                        <p class="card-text">Disponibles: {$disponible} {$mensaje_agotado}</p>
                    </div>
                    <div class="card-footer">
                        <form id="myForm" action="../../Librerias/lib_carrito.php?accion=comprar" onsubmit="showLoading()" method="post" enctype="multipart/form-data" class="d-inline">
                            <input type="hidden" name="id" value="{$id}">
                            <input name="nombre" type="hidden" value="{$nombre}">
                            <input name="descripcion" type="hidden" value="{$descripcion}">
                            <input name="precio" type="hidden" value="{$precio}">
                            <input name="stock" type="hidden" value="{$disponible}">
                            <input name="foto" type="hidden" value="{$imagen}">
                            <input name="carrito" type="submit" class="btn btn-success" value="Comprar"{$disponible}>
                        </form>
                        <form id="myForm" action="../../Librerias/lib_carrito.php?accion=agregar" onsubmit="showLoading()" method="post" enctype="multipart/form-data" class="d-inline">
                            <input type="hidden" name="id" value="{$id}">
                            <input name="nombre" type="hidden" value="{$nombre}">
                            <input name="descripcion" type="hidden" value="{$descripcion}">
                            <input name="precio" type="hidden" value="{$precio}">
                            <input name="stock" type="hidden" value="{$disponible}">
                            <input name="foto" type="hidden" value="{$imagen}">
                            <input name="carrito" type="submit" class="btn btn-primary" value="Agregar al carrito" {$disponible}>
                        </form>
                    </div>
                </div>
            </div>
HTML;
    }
}
    else {
         echo "<tbody><tr><td colspan='8'>No hay usuarios registrados.</td></tr></tbody>";
    }

    $html .= <<<HTML
        </div>
        <div class="text-center">
            <form action="../../Librerias/lib_carrito.php?accion=ver" onsubmit="showLoading()" method="post" class="mt-4">
                <button class="btn btn-info"><i class="fa-solid fa-cart-shopping"></i> Ver carrito</button>
            </form>
        </div>
        <p class="text-center">Total de productos: {$total}</p>
    </div>
    <form id="myForm" action="../../index.php" onsubmit="showLoading()" method="post" class="text-center mt-4">
        <button class="btn btn-outline-secondary">
            <i class="fa-solid fa-house"></i> Inicio
        </button>
    </form>
HTML;
    
    echo $html;
}


function Catalogo1()
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

            <form id="myForm" action="../usuarios/usuarios.php?accion=cerrar" onsubmit="showLoading()" method="post">
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
    $consulta = pg_query($conexion, "SELECT * FROM productos");
    $total = pg_num_rows($consulta);
    while ($filas = pg_fetch_assoc($consulta)) {
        $imagen = $filas["imagen"];
        $nombre = $filas["nombre"];
        $id = $filas["id"];
        $descripcion = $filas["descripcion"];
        $precio = $filas["precio"];
        $disponible = $filas["stock"];

        $precio_number_format =number_format($precio);

        //echo $disponible;

        /*if ($disponible<5) {
            $mensaje = "quedan pocos "." $disponible";
        }
        if ($disponible <= 0) {
            $mensaje_0 = "agotado";
        }*/

        $html .= <<<HTML
                <div class="card mx-4 mt-4 mx-auto" style="width: 21rem;">
                <!--<p>{$mensaje}</p>
                <p>{$mensaje_0}</p>-->

                <!--<td>{$id}</td>-->

                    <img src="/{$imagen}" height="100%" width="100%" class="card-img-top" alt=""><br>

                    <div class="card-title">
                        {$nombre}
                    </div>
                    <div class="card-body">
                        <p>
                            {$descripcion}
                        </p>

                        <p>precio: $
                            {$precio_number_format}
                        </p>
                        <p>
                            disponibles:
                            {$disponible}
                        </p>

                    </div>
                    <div class="card-footer">
                        <form id="myForm" action="../../Librerias/lib_carrito.php?accion=comprar" onsubmit="showLoading()" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="{$id}">
                            <input name="nombre" type="hidden" value="{$nombre}">
                            <input name="descripcion" type="hidden" value="{$descripcion}">
                            <input name="precio" type="hidden" value="{$precio}">
                            <input name="stock" type="hidden" value="{$disponible}">
                            <input name="foto" type="hidden" value="{$imagen}">
                            <input name="carrito" type="submit" class="btn-buy button1" value="COMPRALOS YA!">
                        </form>

                        <!--<button class="">COMPRALO YA¡</button>-->
                        <form id="myForm" action="../../Librerias/lib_carrito.php?accion=agregar" onsubmit="showLoading()" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="{$id}">
                            <input name="nombre" type="hidden" value="{$nombre}">
                            <input name="descripcion" type="hidden" value="{$descripcion}">
                            <input name="precio" type="hidden" value="{$precio}">
                            <input name="stock" type="hidden" value="{$disponible}">
                            <input name="foto" type="hidden" value="{$imagen}">
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

function Carrito_HTML1()
{   
    Menus($ruta_css="../../css/estilos7.css",$ruta_usuarios="#",$ruta_registra_usuarios="#",
    $ruta_catalogo="#",$ruta_login="#",$ruta_facturas="#",
    $ruta_Verproductos="#",$ruta_aggproductos="#");
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
        <form id="myForm" action="../../Librerias/lib_carrito.php?accion=eliminarT" onsubmit="showLoading()" method="post">
            <button class="btn btn-outline-secondary" value="inicio">
                <i class="fa-solid fa-eraser"></i>vaciar el carrito
            </button>
        </form>
HTML;
    session_start();
    if (isset($correo)) {
        echo $correo;
    }

    /*require_once '../../modelo/Modelocarrito.php';
    $modelo = new Carrito();
    $zapatos = $modelo->ver();*/
    if (empty($_SESSION['carrito'])) {
        header('Location: ../catalogo/carrito.php');
        exit(); 
    } else {
        $zapatos = $_SESSION['carrito']; 
    }
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
                <div class="card mx-4 mt-4 mx-auto" style="width: 23rem;">
                    <div>
                        <img src="/{$zapatico['foto']}" height="100%" width="100%" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">

                        <h4 class="card-title ">numero de ferencia :{$zapatico['id']}</h4>
                            <h4 class="card-title ">nombre :{$zapatico['nombre']}</h4>
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
    </body>
HTML;
    echo $html;
}
function Carrito_HTML() {
    /*Menus($ruta_css="../../css/estilos7.css",$ruta_usuarios="#",$ruta_registra_usuarios="#",
    $ruta_catalogo="#",$ruta_login="#",$ruta_facturas="#",
    $ruta_Verproductos="#",$ruta_aggproductos="#");*/
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
        <title>Carrito</title>
    </head>
    <body>
        <div id="loading">Cargando...</div>
        <div class="container mt-4">
            <form id="myForm" action="../../Librerias/lib_carrito.php?accion=eliminarT" onsubmit="showLoading()" method="post">
                <button class="btn btn-outline-secondary mb-4" type="submit">
                    <i class="fa-solid fa-eraser"></i> Vaciar el carrito
                </button>
            </form>
HTML;

    session_start();

    if (empty($_SESSION['carrito'])) {
        $html .= '<p class="text-danger">El carrito está vacío.</p>';
        $html .= '<form id="myForm" action="../../Librerias/lib_carrito.php?accion=index" onsubmit="showLoading()" method="post">';
        $html .= '<button class="btn btn-outline-secondary" value="inicio"><i class="fa-solid fa-shop"></i> Volver a la tienda</button>';
        $html .= '</form>';
        $html .= '</div></body></html>';
        echo $html;
        return;
    }

    $zapatos = $_SESSION['carrito'];

    foreach ($zapatos as $id => $zapatico) {
        $totalProducto = $zapatico['precio'] * $zapatico['cantidad'];

        $html .= <<<HTML
        <div class="card mb-4" style="width: 23rem; margin: auto;">
            <img src="/{$zapatico['foto']}" class="card-img-top" alt="{$zapatico['nombre']}" style="height: 200px; object-fit: cover;">
            <div class="card-body">
                <h5 class="card-title">Referencia: {$zapatico['id']}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Nombre: {$zapatico['nombre']}</h6>
                <p>Precio: \$ {$zapatico['precio']}</p>
                <p>Disponibles: {$zapatico['stock']}</p>
                <p>Descripción: {$zapatico['descripcion']}</p>
                <p>Total: \$ {$totalProducto}</p>
            </div>
            <div class="card-footer">
                <form action="../../Librerias/lib_carrito.php?accion=actualizar" onsubmit="showLoading()" method="post" class="form-inline d-inline">
                    <input type="hidden" name="id" value="{$id}">
                    <label for="cantidad" class="mr-2">Cantidad:</label>
                    <input type="number" name="cantidad" value="{$zapatico['cantidad']}" min="1" max="{$zapatico['stock']}" class="form-control mx-2" style="width: 70px;">
                    <button type="submit" class="btn btn-outline-primary">Actualizar</button>
                </form>
                <form action="../../Librerias/lib_carrito.php?accion=eliminarU" onsubmit="showLoading()" method="post" class="d-inline">
                    <input type="hidden" name="id" value="{$id}">
                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                </form>
            </div>
        </div>
HTML;
    }

    $html .= <<<HTML
        <div>
            <form id="myForm" action="../../Librerias/lib_carrito.php?accion=index" onsubmit="showLoading()" method="post">
                <button class="btn btn-outline-secondary" value="inicio">
                    <i class="fa-solid fa-shop"></i> Volver a la tienda
                </button>
            </form>
        </div>
    </body>
    </html>
HTML;

    echo $html;
}

function Formulario_enviar_correo(){
    /*Menus($ruta_css="../../css/estilos7.css",$ruta_usuarios="#",$ruta_registra_usuarios="#",
    $ruta_catalogo="#",$ruta_login="#",$ruta_facturas="#",
    $ruta_Verproductos="#",$ruta_aggproductos="#");*/
    echo <<<HTML
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
    <title>Restablecer contraseña</title>
</head>
<body>
<div id="loading">Cargando...</div>
    <div class="mx-auto contenedor">
        <div class="formulario_registro">
            <form id="myForm" class="mx-auto col-4 p-3 " action="../usuarios/usuarios.php?accion=correo_enviado" onsubmit="showLoading()" method="post">
                <h2 class="text-center text-secondary"> Restablecer Contraseña </h2>
                <label for="">introduce tu correo electronico al cual le llegara un link</label>
                <input class="form-control" id="correo" placeholder="correo" required type="email" name="correo"><br><br>
                    <input class="btn btn-primary" name="inicio" class="btn" type="submit" value="enviar"><br><br>
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
}

function FormularioFactura(){

    
    /*Menus($ruta_css="../css/estilos7.css",$ruta_usuarios="#",$ruta_registra_usuarios="#",
    $ruta_catalogo="#",$ruta_login="#",$ruta_facturas="#",
    $ruta_Verproductos="#",$ruta_aggproductos="#");*/

    include_once "../conexion.php";
    session_start();

    date_default_timezone_set('America/Bogota');
        $fecha = date('Y-m-d g:i:s');
        echo $fecha;

        $correo = isset($_SESSION["correo"]) ? htmlspecialchars($_SESSION["correo"]) : null;
        $nombre_sesion = isset($_SESSION["nombre"]) ? htmlspecialchars($_SESSION["nombre"]) : null;
        $dni_sesion = isset($_SESSION["dni"]) ? htmlspecialchars($_SESSION["dni"]) : null;
        $contraseña = isset($_SESSION["contraseña"]) ? htmlspecialchars($_SESSION["contraseña"]) : null;

    if ($correo) {
        echo <<<HTML
        <form action="./usuarios/usuarios.php?accion=cerrar" onsubmit="showLoading()" method="post" class="mb-4">
            <button type="submit" name="cerrar" class="btn btn-danger">Cerrar sesión</button>
        </form>
        <p class="text-center">Welcome, $nombre_sesion</p>
        <p class="text-center">correo: $correo</p>
        <p class="text-center">documento, $dni_sesion</p>
        <!--<p class="text-center">Bienvenido, $contraseña</p>-->
HTML;

    echo <<<HTML
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Facturas</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/d6ecbc133f.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/cargando.css">
        <script src="../js/cargando.js"></script>
        <script src="../js/facturas1.js"></script>
        <style>
            .form-container {
                max-width: 600px;
                margin: auto;
            }
        </style>
    </head>
    <body>
        
    <div id="loading">Cargando...</div>
        <div class="container mt-5">
HTML;

    echo <<<HTML
        <h4 class="text-center mb-4">Facturas</h4>

        <div class="form-container">
            <form action="facturas.php?accion=factura" method="post" class="bg-light p-4 rounded shadow">
                <div class="form-group">
                    <label for="producto">Producto</label>
                    <select class="form-control" id="producto" name="producto" onchange="cargarDatos()">
                        <option value="" disabled selected>Seleccionar</option>
HTML;

    $conexion = Conexion();
    $datos = pg_query($conexion, "SELECT * FROM productos");

    while ($d = pg_fetch_array($datos)) {
        $nombre = htmlspecialchars($d["nombre"]);
        echo <<<HTML
                        <option value="$nombre">$nombre</option>
HTML;
    }

    echo <<<HTML
                    </select>
                    <div id="datosProducto"></div>

                    <label for="nombre">Nombre:</label>
                    <input class="form-control" type="text" id="nombre" required name="nombre" readonly>

                    <label for="descripcion">Descripción:</label>
                    <input class="form-control" type="text" id="descripcion" required name="descripcion" readonly>

                    <label for="cantidad">Cantidad:</label>
                    <input class="form-control" type="number" id="cantidad" required name="cantidad" min="1" onchange="calcularTotal()">

                    <label for="precio">Precio:</label>
                    <input class="form-control" type="text" id="precio" required name="precio" readonly>

                    <label for="total">Total:</label>
                    <input class="form-control" type="text" id="total" required name="total" readonly>
                </div>
                <button type="submit" class="btn btn-primary">Realizar Factura</button>
            </form>
        </div>
        <form id="myForm" action="../index.php" onsubmit="showLoading()" method="post">
            <button class="btn btn-outline-secondary" value="inicio">
            <i class="fa-solid fa-house"></i>
            </button>
        </form>
HTML;

    echo <<<HTML
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    </html>
HTML;
    }

    if (!$correo) {
        echo <<<HTML
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Facturas</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/d6ecbc133f.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/cargando.css">
        <script src="../js/cargando.js"></script>
        <script src="../js/facturas.js"></script>
    </head>
    <body>
        <p>inicia sesion para continuar</p>
        <div class="mt-4 text-center">
                <a href="./pagina-principal/login.php" class="btn btn-secondary"><i class="fa-solid fa-right-to-bracket"></i>  inicia sesion</a>
            </div>
        </div>

        <form id="myForm" action="../index.php" onsubmit="showLoading()" method="post">
            <button class="btn btn-outline-secondary" value="inicio">
            <i class="fa-solid fa-house"></i>
            </button>
        </form>
HTML;

    echo <<<HTML
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    </html>
HTML;
    }
}
function FormularioFactura2() {
    include_once "../conexion.php";
    session_start();

    date_default_timezone_set('America/Bogota');
    $fecha = date('Y-m-d g:i:s');

    $correo = isset($_SESSION["correo"]) ? htmlspecialchars($_SESSION["correo"]) : null;
    $nombre_sesion = isset($_SESSION["nombre"]) ? htmlspecialchars($_SESSION["nombre"]) : null;
    $contraseña = isset($_SESSION["contraseña"]) ? htmlspecialchars($_SESSION["contraseña"]) : null;



    echo <<<HTML
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Facturas</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <style>
            .form-container {
                max-width: 600px;
                margin: auto;
                padding: 20px;
                border: 1px solid #ccc;
                border-radius: 10px;
                background-color: #fff;
            }
        </style>
    </head>
    <body>
        <nav>
            <div class="nav-wrapper">
                <a href="#" class="brand-logo center">Facturas</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
HTML;

    if ($correo) {
        echo <<<HTML
                <li><form action="./usuarios/usuarios.php?accion=cerrar" onsubmit="showLoading()" method="post" class="mb-0">
                    <button type="submit" name="cerrar" class="btn red">Cerrar sesión</button>
                </form></li>
                <li><span class="white-text">Welcome, $nombre_sesion</span></li>
                <li><span class="white-text">Bienvenido, $correo</span></li>
HTML;
    } else {
        echo <<<HTML
                <li><a href="./pagina-principal/login.php" class="btn grey">Iniciar sesión</a></li>
HTML;
    }

    echo <<<HTML
                </ul>
            </div>
        </nav>

        <div class="container mt-5">
            <h4 class="center-align">Realizar Factura</h4>
            <div class="form-container">
                <form action="facturas.php?accion=factura" method="post" class="bg-light p-4">
                    <div class="input-field">
                        <select id="producto" name="producto" onchange="cargarDatos()">
                            <option value="" disabled selected>Seleccionar</option>
HTML;

    $conexion = Conexion();
    $datos = pg_query($conexion, "SELECT * FROM productos");

    while ($d = pg_fetch_array($datos)) {
        $nombre = htmlspecialchars($d["nombre"]);
        echo <<<HTML
                            <option value="$nombre">$nombre</option>
HTML;
    }

    echo <<<HTML
                        </select>
                        <label for="producto">Producto</label>
                    </div>

                    <div class="input-field">
                        <input type="text" id="nombre" required name="nombre" readonly>
                        <label for="nombre">Nombre</label>
                    </div>

                    <div class="input-field">
                        <input type="text" id="descripcion" required name="descripcion" readonly>
                        <label for="descripcion">Descripción</label>
                    </div>

                    <div class="input-field">
                        <input type="number" id="cantidad" required name="cantidad" min="1" onchange="calcularTotal()">
                        <label for="cantidad">Cantidad</label>
                    </div>

                    <div class="input-field">
                        <input type="text" id="precio" required name="precio" readonly>
                        <label for="precio">Precio</label>
                    </div>

                    <div class="input-field">
                        <input type="text" id="total" required name="total" readonly>
                        <label for="total">Total</label>
                    </div>

                    <button type="submit" class="btn blue">Realizar Factura</button>
                </form>
            </div>
            <form id="myForm" action="../index.php" onsubmit="showLoading()" method="post" class="mt-4">
                <button class="btn btn-outline-secondary" value="inicio">
                    <i class="fa-solid fa-house"></i>
                </button>
            </form>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('select');
                var instances = M.FormSelect.init(elems);
            });

            function cargarDatos() {
                var producto = document.getElementById('producto').value;
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var data = JSON.parse(this.responseText);
                        document.getElementById('nombre').value = data.nombre;
                        document.getElementById('descripcion').value = data.descripcion;
                        document.getElementById('precio').value = data.precio;
                        calcularTotal();
                    }
                };
                xhttp.open("GET", "../Librerias/lib_facturas.php?accion=cargardatos&nombre=" + encodeURIComponent(producto), true);
                xhttp.send();
            }

            function calcularTotal() {
                var cantidad = document.getElementById('cantidad').value;
                var precio = document.getElementById('precio').value;
                var total = cantidad * precio;
                document.getElementById('total').value = total.toFixed(2);
            }
        </script>
    </body>
    </html>
HTML;
}

function Menu(){
echo <<<HTML
    <nav class="blue-grey darken-3">
    <div class="container">
        <!--<a href="#" class="brand-logo">Mi Aplicación</a>-->
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="#">Usuarios</a></li>
            <li><a href="#">Catálogo</a></li>
            <li><a href="#">Cerrar sesion</a></li>
            <li><a href="#">Productos</a></li>
            <li><a href="#">Catálogo</a></li>
        </ul>
    </div>
</nav>
HTML;
}



/*function Form_restablecer_contraseña(){

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
}*/
?>
