<?php
//include_once "../../Librerias/lib_menu.php";
function Formulario_clientes()
{
    session_start();
    echo <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../../css/cargando.css">
    <link rel="shortcut icon" href="../../fotos/agregar-usuario.png" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="../../js/cargando.js"></script>
    <title>Registro de Clientes</title>
</head>
<body>
HTML;

    if (isset($_SESSION["nombre"])) {
        echo <<<HTML
<div id="loading" style="display: none;">Cargando...</div>
<div class="container">
    <div class="row">
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="card">
                <div class="card-content">
                    <h4 class="center-align grey-text">Registro de Clientes</h4>
                    <form id="myForm" onsubmit="showLoading()" action="usuarios.php?accion=registrar" method="post">
                        
                        <div class="input-field">
                            <input id="dni" type="text" name="dni" required>
                            <label for="dni">DNI</label>
                        </div>
HTML;

        if (isset($_SESSION['descripcion']) && $_SESSION['descripcion'] === "Administrador") {
            echo <<<HTML
                        <div class="input-field">
                            <select name="rol" required>
                                <option value="1">Administrador</option>
                                <option value="2">Cliente</option>
                            </select>
                            <label for="rol">Rol</label>
                        </div>
HTML;
        } else {
            echo <<<HTML
                        <div class="input-field">
                            <select name="rol" required>
                                <option value="2">Cliente</option>
                            </select>
                            <label for="rol">Rol</label>
                        </div>
HTML;
        }

        echo <<<HTML
                        <div class="input-field">
                            <input id="nombre" type="text" name="nombre" required>
                            <label for="nombre">Nombre</label>
                        </div>

                        <div class="input-field">
                            <input id="apellido" type="text" name="apellido" required>
                            <label for="apellido">Apellidos</label>
                        </div>

                        <div class="input-field">
                            <input id="telefono" type="tel" name="telefono" required>
                            <label for="telefono">Número Telefónico</label>
                        </div>

                        <div class="input-field">
                            <input id="direccion" type="text" name="direccion" required>
                            <label for="direccion">Dirección</label>
                        </div>

                        <div class="input-field">
                            <input id="correo" type="email" name="correo" required>
                            <label for="correo">Correo Electrónico</label>
                        </div>

                        <div class="input-field">
                            <input id="contraseña" type="password" name="contraseña" required>
                            <label for="contraseña">Contraseña</label>
                        </div>

                        <div class="input-field">
                            <input id="confirmar_contraseña" type="password" name="confirmar_contraseña" required>
                            <label for="confirmar_contraseña">Confirmar Contraseña</label>
                        </div>

                        <div class="center-align">
                            <button class="btn waves-effect waves-light" type="submit" name="registro">
                                Registrar
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-action center-align">
                    <form action="../usuarios/usuarios.php?accion=verusuarios" onsubmit="showLoading()" method="post">
                        <button class="btn-flat waves-effect">
                            <i class="material-icons left">Usuarios</i> 
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
HTML;
    } elseif ((!isset($_SESSION["cargo_id"]))) {
        echo <<<HTML
<div class="container">
    <div class="row">
        <div class="col s12">
            <p class="center-align">Para continuar, inicia sesión.</p>
            <div class="center-align">
                <a href="../pagina-principal/login.php?accion=login" class="btn waves-effect waves-light">
                    Iniciar sesión
                </a>
            </div>
        </div>
    </div>
</div>
HTML;
    }

    echo <<<HTML
<div class="container center-align">
    <form action="../../index.php" onsubmit="showLoading()" method="post">
        <button class="btn-flat waves-effect">
            <i class="material-icons left">Inicio</i> 
        </button>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        M.FormSelect.init(elems);
    });
</script>
</body>
</html>
HTML;
}


function Formulario_clientes12()
{

    session_start();
    echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../css/cargando.css">
    <link rel="stylesheet" href="../../css/formulario_clientes.css">
    <link rel="shortcut icon" href="../../fotos/agregar-usuario.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d6ecbc133f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="../../js/cargando.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
HTML;
    if (isset($_SESSION["nombre"])) {
        echo <<<HTML

<div id="loading">Cargando...</div>
<div class="contenedor">
    <div class="formulario_registro">
        <form id="myForm" onsubmit="showLoading()" class="col-12 p-3" action="usuarios.php?accion=registrar" method="post">
            <h3 class="text-center text-secondary">Registro de Clientes</h3>

            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input class="form-control" required type="text" name="dni" placeholder="Introduzca su DNI">
            </div>
HTML;

if (isset($_SESSION['descripcion']) && $_SESSION['descripcion'] === "Administrador") {
    echo <<<HTML
            <div class="mb-3">
                <label for="rol" class="form-label">Rol</label>
                <select name="rol" class="form-control" required>
                    <option value="1">Administrador</option>
                    <option value="2">Cliente</option>
                </select>
            </div>
HTML;
} else {
    // Si la sesión no está iniciada o el usuario no es administrador
    echo <<<HTML
            <div class="mb-3">
                <label for="rol" class="form-label">Rol</label>
                <select name="rol" class="form-control" required>
                    <option value="2">Cliente</option>
                </select>
            </div>
HTML;
}

echo <<<HTML
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
                <label for="confirmar_contraseña" class="form-label">Confirmar Contraseña</label>
                <input class="form-control" required type="password" name="confirmar_contraseña" placeholder="Confirmar contraseña">
            </div>

            <input class="btn btn-primary" type="submit" name="registro" value="Registrar"><br><br>
        </form>

        <form action="../usuarios/usuarios.php?accion=verusuarios" onsubmit="showLoading()" method="post">
            <button class="btn btn-outline-secondary">
                <i class="fa-duotone fa-solid fa-users-viewfinder"></i> Usuarios
            </button>
        </form>
    </div>
</div>

</body>
</html>
HTML;
    }
    /*elseif ((isset($_SESSION["cargo_id"]) && $_SESSION["cargo_id"] == 2)) {
        echo $_SESSION["nombre"].":  empleado";
    }*/
    elseif ((!isset($_SESSION["cargo_id"])) ) {
        echo <<<HTML
        <p>Para continuar, inicia sesión.</p>
        <a href="../pagina-principal/login.php?accion=login" class="btn blue btn-login">Iniciar sesión</a>
HTML;
    }
    echo <<<HTML
    <form action="../../index.php" onsubmit="showLoading()" method="post">
            <button class="btn btn-outline-secondary">
                <i class="fa-solid fa-house"></i> Inicio
            </button>
        </form>
HTML;
}




function Mostrar_usuarios122() {

    session_start();
    echo <<<HTML
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <link rel="stylesheet" href="../../css/cargando.css">
        <link rel="stylesheet" href="../../css/mostrar_usuarios.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <title>Tabla de Usuarios</title>
    </head>
HTML;

    if (isset($_SESSION["correo"])) {
echo <<<HTML
        <body>
            <h3 class="text-center text-secondary">Usuarios</h3>
            
            <div class="input-search text-center">
                <input type="search" id="search" class="form-control" placeholder="Buscar" style="width: 300px; display: inline-block;">
            </div>
        
            <div class="table-container mx-auto col-12 col-md-8">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>Correo</th>
                            <th>Contraseña</th>
                            <th>Cargo</th>
                            <th>Modificar/Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="resultados-usuarios">
HTML;
        
            include_once "../../conexion.php";
            $conexion = Conexion();
            $consulta1 = "SELECT u.id, u.dni, u.nombre, u.apellido, u.telefono, u.direccion, u.correo,u.contraseña, c.descripcion AS cargo
                          FROM usuarios u
                          INNER JOIN cargo c ON u.cargo_id = c.id";
            $query = pg_query($conexion, $consulta1);
            $usuarios = pg_fetch_all($query);
        
            if ($usuarios) {
                foreach ($usuarios as $fila) {
                    $id_encriptado = base64_encode($fila['id']);
                    echo "<tr>";
                    echo "<td>{$fila['id']}</td>";
                    echo "<td>{$fila['dni']}</td>";
                    echo "<td>{$fila['nombre']}</td>";
                    echo "<td>{$fila['apellido']}</td>";
                    echo "<td>{$fila['telefono']}</td>";
                    echo "<td>{$fila['direccion']}</td>";
                    echo "<td>{$fila['correo']}</td>";
                    echo "<td>{$fila['contraseña']}</td>";
                    echo "<td>{$fila['cargo']}</td>";
                    echo "<td>
                            <a href='usuarios.php?accion=modificar&id={$id_encriptado}'><i class='fa-solid fa-pen'>m</i></a>
                            <a href='usuarios.php?accion=eliminar&id={$id_encriptado}' onclick='return pregunta()'><i class='fa-solid fa-trash'>e</i></a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No hay usuarios registrados.</td></tr>";
            }
        
            echo <<<HTML
                    </tbody>
                </table>
            </div>
            <div class="mx-auto col-12 col-md-8">
                <form id="myForm" action="./formulario_registro.php?accion=aggusuarios" onsubmit="showLoading()" method="post">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fa-solid fa-user-plus"></i> Agregar Usuarios
                    </button>
                </form>
            </div>
HTML;
    }
    else{
        echo <<<HTML
        <p>Para continuar, inicia sesión.</p>
        <a href="../pagina-principal/login.php?accion=login" class="btn blue btn-login">Iniciar sesión</a>
HTML;
    }


echo <<<HTML
    <script src="../../js/buscador.js">
    </script>
    <script src="../../js/pregunta.js">
    </script>
    <div class="mx-auto col-12 col-md-8">

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

function Mostrar_usuarios()
{
    session_start();
    echo <<<HTML
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <title>Tabla de Usuarios</title>
    </head>
HTML;

    if (isset($_SESSION["correo"])) {
        echo <<<HTML
        <body>
            <div class="container mt-4">
                <h3 class="text-center text-secondary">Usuarios</h3>

                <!-- Barra de búsqueda -->
                <div class="input-group my-4 justify-content-center">
                    <input type="search" id="search" class="form-control w-50" placeholder="Buscar...">
                </div>

                <!-- Tabla de usuarios -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle text-center">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>DNI</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Teléfono</th>
                                <th>Dirección</th>
                                <th>Correo</th>
                                <th>Contraseña</th>
                                <th>Cargo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="resultados-usuarios">
HTML;

        include_once "../../conexion.php";
        $conexion = Conexion();
        $consulta1 = "SELECT u.id, u.dni, u.nombre, u.apellido, u.telefono, u.direccion, u.correo, u.contraseña, c.descripcion AS cargo
                      FROM usuarios u
                      INNER JOIN cargo c ON u.cargo_id = c.id";
        $query = pg_query($conexion, $consulta1);
        $usuarios = pg_fetch_all($query);

        if ($usuarios) {
            foreach ($usuarios as $fila) {
                $id_encriptado = base64_encode($fila['id']);
                echo <<<HTML
                <tr>
                    <td>{$fila['id']}</td>
                    <td>{$fila['dni']}</td>
                    <td>{$fila['nombre']}</td>
                    <td>{$fila['apellido']}</td>
                    <td>{$fila['telefono']}</td>
                    <td>{$fila['direccion']}</td>
                    <td>{$fila['correo']}</td>
                    <td>{$fila['contraseña']}</td>
                    <td>{$fila['cargo']}</td>
                    <td>
                        <a href="usuarios.php?accion=modificar&id={$id_encriptado}" class="btn btn-sm btn-primary">
                            <i class="fas fa-pen"></i>
                        </a>
                        <a href="usuarios.php?accion=eliminar&id={$id_encriptado}" onclick="return pregunta()" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
HTML;
            }
        } else {
            echo <<<HTML
            <tr>
                <td colspan="10" class="text-center">No hay usuarios registrados.</td>
            </tr>
HTML;
        }

        echo <<<HTML
                        </tbody>
                    </table>
                </div>

                <!-- Botón para agregar usuarios -->
                <div class="text-center my-4">
                    <form action="./formulario_registro.php?accion=aggusuarios" onsubmit="showLoading()" method="post">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="fas fa-user-plus"></i> Agregar Usuarios
                        </button>
                    </form>
                </div>

                <!-- Botón para volver al inicio -->
                <div class="text-center">
                    <form action="../../index.php" onsubmit="showLoading()" method="post">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="fas fa-house"></i> Inicio
                        </button>
                    </form>
                </div>
            </div>

            <!-- Scripts -->
            <script src="../../js/buscador.js"></script>
            <script src="../../js/pregunta.js"></script>
        </body>
HTML;
    } else {
        echo <<<HTML
        <body>
            <div class="container mt-5 text-center">
                <p>Para continuar, inicia sesión.</p>
                <a href="../pagina-principal/login.php?accion=login" class="btn btn-primary">Iniciar sesión</a>
            </div>
        </body>
HTML;
    }

    echo <<<HTML
    </html>
HTML;
}



function Login_html1()
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
function Login_html() {
    $html = <<<HTML
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d6ecbc133f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/cargando.css">
    <link rel="stylesheet" href="../../css/login.css">
    <script src="../../js/cargando.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia Sesión</title>
</head>

<body>
    <div id="loading">Cargando...</div>
    <div class="mx-auto contenedor">
        <div class="formulario_registro">
            <form id="myForm" class="mx-auto" action="../pagina-principal/login.php?accion=login" onsubmit="showLoading()" method="post">
                <h2 class="text-center text-secondary">Bienvenido</h2>
                <p class="text-center text-secondary">Inicia sesión</p>
                <input class="form-control" placeholder="Correo" required type="text" name="correo">
                <br>
                <input class="form-control" placeholder="Contraseña" required type="password" name="contraseña">
                <br>
                <input class="btn btn-primary" name="inicio" type="submit" value="Entrar">
                <br>
                <a class="link-recuperar" href="../usuarios/usuarios.php?accion=recuperar">¿Olvidaste tu contraseña?</a>
            </form>
        </div>
    </div>
    <form id="myForm" action="../usuarios/formulario_registro.php?accion=aggusuarios" onsubmit="showLoading()" method="post">
        <button class="btn btn-outline-secondary" value="inicio">
            <i class="fa-solid fa-user-plus"></i> Agregar usuarios
        </button>
    </form>
    <form id="myForm" action="../../index.php" onsubmit="showLoading()" method="post">
        <button class="btn btn-outline-secondary" value="inicio">
            <i class="fa-solid fa-house"></i> Inicio
        </button>
    </form>
</body>

</html>
HTML;
    echo $html;
}

function Formulario_productos000()
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

    <form id="myForm" action="../catalogo/catalogo.php?accion=catalogo" onsubmit="showLoading()" method="post">
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


function Formulario_productos()
{
    echo <<<HTML
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="shortcut icon" href="../../fotos/comercio-electronico.png" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="../../js/cargando.js"></script>
    <title>Agregar Productos</title>
</head>

<body>
<div id="loading" style="display: none;">Cargando...</div>

<div class="container">
    <div class="row">
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="card">
                <div class="card-content">
                    <h4 class="center-align grey-text">Agregar Productos</h4>
                    <form id="myForm" action="../productos/productos.php?accion=registrar_productos" method="post" enctype="multipart/form-data" onsubmit="showLoading()">
                        
                        <div class="input-field">
                            <input id="nombre" type="text" name="nombre" required>
                            <label for="nombre">Nombre del producto</label>
                        </div>

                        <div class="input-field">
                            <textarea id="descripcion" name="descripcion" class="materialize-textarea" required></textarea>
                            <label for="descripcion">Descripción</label>
                        </div>

                        <div class="input-field">
                            <input id="precio" type="number" name="precio" required>
                            <label for="precio">Precio</label>
                        </div>

                        <div class="input-field">
                            <input id="cantidad" type="number" name="cantidad" required>
                            <label for="cantidad">Cantidad</label>
                        </div>

                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Foto</span>
                                <input type="file" name="foto" accept="image/*" required>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Seleccione la foto">
                            </div>
                        </div>

                        <div class="center-align">
                            <button class="btn waves-effect waves-light" type="submit" name="enviar">
                                Agregar
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-action center-align">
                    <form id="myForm" action="../catalogo/catalogo.php?accion=catalogo" onsubmit="showLoading()" method="post">
                        <button class="btn-flat waves-effect">
                            <i class="material-icons left">Ver catálogo</i> 
                        </button>
                    </form>
                    <form id="myForm" action="../../index.php" onsubmit="showLoading()" method="post">
                        <button class="btn-flat waves-effect">
                            <i class="material-icons left">Inicio</i> 
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        M.AutoInit();
    });
</script>
</body>
</html>
HTML;
}

function Mostrar_productos(){
    
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../js/cargando.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>

<body>
    
<div id="loading">Cargando...</div>
<div class="container">
        <h3 class="text-center">Productos</h3>
        <!--<div class="input-field">
            <input type="search" id="search" placeholder="Buscar">
            <label for="search">Buscar</label>
        </div>-->
    <div class="input-search text-center">
        <input type="search" id="search" class="form-control" placeholder="Buscar" style="width: 300px; display: inline-block;">
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
            <tbody id="resultados-usuarios">
HTML;
    include "../../conexion.php";
    $conexion = Conexion();
    $mostrar = pg_query($conexion, "SELECT * FROM productos");
    $numero = pg_num_rows($mostrar);

    $mostrar_producto = pg_fetch_all($mostrar);

    //$productos_json = json_encode($mostrar_producto);

//echo "<br><br><br><br>".$productos_json."</br></br></br></br>";
    if ($mostrar_producto) {
        foreach ($mostrar_producto as $value) {
            $precio = number_format($value["precio"]);
            $id_encriptado = base64_encode($value['id']);
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
        <a href="../productos/productos.php?accion=modificar&id={$id_encriptado}" class="btn yellow"><i class="fa-solid fa-pen-to-square"></i></a>
        <form action="../productos/productos.php?accion=eliminar&id={$id_encriptado}" method="post" style="display:inline;">
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

<script src="../../js/busqueda.js">
    </script>
    <script src="../../js/pregunta.js">
    </script>

<form id="myForm" action="../catalogo/catalogo.php?accion=catalogo" onsubmit="showLoading()" method="post">
    <button class="btn btn-outline-secondary"  value="catalogo">
        <i class="fa-solid fa-shop"></i>ver catalogo
    </button>
</form>

<form id="myForm" action="../productos/productos.php?accion=aggproductos" onsubmit="showLoading()" method="post">
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

function Catalogo1() {

    $html = <<<HTML
    <!DOCTYPE html>
<html lang="es">

<head>
    <link rel="shortcut icon" href="../fotos/imagen-del-producto.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d6ecbc133f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/cargando.css">
    <link rel="stylesheet" href="../../css/catalogo.css">
    <script src="../../js/cargando.js"></script>
    <script src="../../js/cargando2.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>
    <style>
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
            <!--<span>{$_SESSION["cargo_id"]}</span>
            <span>{$_SESSION["nombre"]}</span>
            <span>nombre:{$_SESSION["nombre"]}</span>
            <span>contraseña{$_SESSION["contraseña"]}</span>-->
            <span>{$_SESSION["correo"]}</span>
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


function Catalogo() {

    session_start();
$html = <<<HTML
<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="shortcut icon" href="../fotos/imagen-del-producto.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d6ecbc133f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="../../css/cargando.css">
    <link rel="stylesheet" href="../../css/catalogo2.css">
    <script src="../../js/cargando.js"></script>
    <script src="../../js/cargando2.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>
    
</head>

<body>

    <div id="loading">Cargando...</div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Catálogo</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categorías</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#carrito">Carrito</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="input-search text-center">
        <input type="search" id="search" class="form-control" placeholder="Buscar" style="width: 300px; display: inline-block;">
    </div>

    <h4 class="text-center text-secondary">Productos</h4> 

HTML;

if (isset($_SESSION["correo"])) {
    $html .= <<<HTML
    <div class="container-fluid text-end">
        <span>{$_SESSION["correo"]}</span>
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
        <form id="myForm" action="../pagina-principal/login.php?accion=login" onsubmit="showLoading()" method="post" class="d-inline">
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
        <div class="col-md-3">
        <a href="catalogo.php?accion=detalles&id={$id}">
            <div class="card mx-4 mt-4">
                <img src="/{$imagen}" class="card-img-top" alt="{$nombre}">
                <div class="card-body">
                    <h5 class="card-title">{$nombre}</h5>
                    <!--<p class="card-text">{$descripcion}</p>-->
                    <p class="card-text"><strong>Precio: $ {$precio_number_format}</strong></p>
                    <!--<p class="card-text">Disponibles: {$disponible} {$mensaje_agotado}</p>-->
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
            </a>
        </div>
HTML;
}
}
else {
     echo "<tbody><tr><td colspan='8'>No hay productos registrados.</td></tr></tbody>";
}

$html .= <<<HTML
    </div>
    <div class="text-center">
        <form action="../../Librerias/lib_carrito.php?accion=ver" onsubmit="showLoading()" method="post" class="mt-4">
            <button id="carrito" class="btn btn-info"><i class="fa-solid fa-cart-shopping"></i> Ver carrito</button>
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


function ProductoDetalles()
{
    $html = <<<HTML
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Detalles del Producto</title>
        <!-- Materialize CSS -->
        <link rel="stylesheet" href="../../css/detalles_productos.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
        <!-- Materialize JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </head>
    <style>
        .product-details {
            margin: 45px auto;
            max-width: 10000px;
        }
        .details-content {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .details-image {
            flex: 1;
            max-width: 40%; /* Imagen ocupa hasta el 40% */
        }
        .details-image img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .details-info {
            flex: 2; /* Contenido ocupa el 60% restante */
        }
        .details-info h4 {
            margin-bottom: 20px;
        }
        .details-info p {
            margin: 10px 0;
        }
        .quantity-input {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 15px;
        }
        .quantity-input input {
            max-width: 80px;
        }
        .btn-back {
            margin-top: 20px;
        }

        /* Diseño responsive para pantallas pequeñas */
        @media screen and (max-width: 768px) {
            .details-content {
                flex-direction: column;
                align-items: center;
            }
            .details-image, .details-info {
                max-width: 100%; /* Ambos ocupan el ancho completo */
                flex: none;
            }
            .details-info {
                text-align: center;
            }
            .quantity-input {
                flex-direction: column;
            }
        }
    </style>
    <body>
        <div class="container">
HTML;

    include "../../conexion.php";
    $conexion = Conexion();

    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $consulta = pg_query($conexion, "SELECT * FROM productos WHERE id = $id");
        $producto = pg_fetch_assoc($consulta);

        if ($producto) {
            $nombre = $producto["nombre"];
            $imagen = $producto["imagen"];
            $descripcion = $producto["descripcion"];
            $precio = number_format($producto["precio"], 2);
            $stock = $producto["stock"];
            
            $html .= <<<HTML
            <div class="card product-details">
                <div class="card-content">
                    <div class="details-content">
                        <div class="details-image">
                            <img src="/{$imagen}" alt="{$nombre}">
                        </div>
                        <div class="details-info">
                            <h3>{$nombre}</h3>
                            <p><strong>Descripción:</strong> {$descripcion}</p>
                            <p><strong>Cop:</strong> $ {$precio}</p>
                            <p><strong>Disponibles:</strong> {$stock}</p>
                            <form action="carrito.php?accion=catalogo" method="post" class="quantity-input">
                                <input type="hidden" name="id_producto" value="{$id}">
                                <label for="cantidad">Cantidad:</label>
                                <input type="number" name="cantidad" id="cantidad" value="1" min="1" max="{$stock}" required>
                                <button type="submit" class="btn waves-effect waves-light blue">
                                    <i class="material-icons left">Agregar al carrito</i> 
                                </button>
                            </form>
                            <p><strong>Referencia:</strong> {$descripcion}</p>
                            <p><strong>Categoria:</strong>N/A</p>
                            <p><strong>Subcategoria:</strong> N/A</p>
                            <p><strong>Envio:</strong> N/A</p>
                            <!--<a href="#" class="btn waves-effect waves-light blue btn-back">
                                <i class="material-icons left">Comprar</i> 
                            </a>-->
                        </div>
                    </div>
                </div>
            </div>
HTML;
        } else {
            $html .= "<p class='red-text center-align'>Producto no encontrado.</p>";
        }
    } else {
        $html .= "<p class='red-text center-align'>No se especificó un producto.</p>";
    }

    $html .= <<<HTML
    <a href="catalogo.php?accion=catalogo" class="btn waves-effect waves-light blue btn-back">
        <i class="material-icons left">Volver al catálogo</i> 
    </a>
        </div>
    </body>
    </html>
HTML;

    echo $html;
}







function Carrito_HTML1()
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
    $precio = $zapatico['precio'];
    $precio_format = number_format($precio , 2);

        $html .= <<<HTML
            <div class="container">
                <div class="card mx-4 mt-4 mx-auto" style="width: 23rem;">
                    <div>
                        <img src="/{$zapatico['foto']}" height="100%" width="100%" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">

                        <h4 class="card-title ">numero de ferencia :{$zapatico['id']}</h4>
                            <h4 class="card-title ">nombre :{$zapatico['nombre']}</h4>
                            <p class="">precio $ : {$precio_format}</p> 
        
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
        $precio = $zapatico['precio'];
        $precio_format = number_format($precio , 2);
        $totalProducto = $zapatico['precio'] * $zapatico['cantidad'];


        $html .= <<<HTML
        <div class="card mb-4" style="width: 23rem; margin: auto;">
            <img src="/{$zapatico['foto']}" class="card-img-top" alt="{$zapatico['nombre']}" style="height: 200px; object-fit: cover;">
            <div class="card-body">
                <h5 class="card-title">Referencia: {$zapatico['id']}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Nombre: {$zapatico['nombre']}</h6>
                <p>Precio: \$ {$precio_format}</p>
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

function Formulario_enviar_correo1(){
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

function Formulario_enviar_correo() {
    echo <<<HTML
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d6ecbc133f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/cargando.css">
    <script src="../../js/cargando.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
</head>

<body>
    <div id="loading">Cargando...</div>
    <div class="mx-auto contenedor">
        <div class="formulario_registro">
            <form id="myForm" class="mx-auto" action="../usuarios/usuarios.php?accion=correo_enviado" onsubmit="showLoading()" method="post">
                <h2 class="text-center text-secondary">Restablecer Contraseña</h2>
                <label class="label-instrucciones">Introduce tu correo electrónico al cual le llegará un link:</label>
                <input class="form-control" id="correo" placeholder="Correo" required type="email" name="correo">
                <br>
                <input class="btn btn-primary" name="inicio" type="submit" value="Enviar">
            </form>
        </div>
    </div>

    <form id="myForm" action="../usuarios/formulario_registro.php" onsubmit="showLoading()" method="post">
        <button class="btn btn-outline-secondary" value="inicio">
            <i class="fa-solid fa-user-plus"></i> Agregar usuarios
        </button>
    </form>

    <form id="myForm" action="../../index.php" onsubmit="showLoading()" method="post">
        <button class="btn btn-outline-secondary" value="inicio">
            <i class="fa-solid fa-house"></i> Inicio
        </button>
    </form>
</body>

</html>
HTML;
}


function FormularioFactura(){

    include_once "../conexion.php";
    session_start();

    date_default_timezone_set('America/Bogota');
        $fecha = date('Y-m-d g:i:s');
        echo "fecha y hora : ".$fecha;

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
$productos = pg_fetch_all($datos);

if ($productos) {
    foreach ($productos as $d) {
        $nombre = htmlspecialchars($d["nombre"]);
        echo <<<HTML
            <option value="$nombre">$nombre</option>
HTML;
    }
}else {
    echo "no hay registros";
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


function FormularioFactura00()
{
    include_once "../conexion.php";
    session_start();

    date_default_timezone_set('America/Bogota');
    $fecha = date('Y-m-d g:i:s');
    $correo = isset($_SESSION["correo"]) ? htmlspecialchars($_SESSION["correo"]) : null;
    $nombre_sesion = isset($_SESSION["nombre"]) ? htmlspecialchars($_SESSION["nombre"]) : null;
    $dni_sesion = isset($_SESSION["dni"]) ? htmlspecialchars($_SESSION["dni"]) : null;

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
            body {
                background-color: #f4f4f4;
            }
            .form-container {
                margin: 20px auto;
                max-width: 700px;
                background: white;
                padding: 30px;
                border-radius: 8px;
                box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            }
            .form-title {
                font-size: 24px;
                font-weight: bold;
                text-align: center;
                margin-bottom: 20px;
            }
            .btn-back-home {
                margin-top: 20px;
            }
            footer {
                margin-top: 20px;
                text-align: center;
            }
            @media (max-width: 600px) {
                .form-container {
                    padding: 15px;
                }
                .form-title {
                    font-size: 20px;
                }
            }
        </style>
    </head>
    <body>
        <div class="container">
HTML;

    if ($correo) {
        echo <<<HTML
            <div class="form-container">
                <div class="form-title">Facturas</div>
                <p class="center-align"><strong>Bienvenido:</strong> $nombre_sesion</p>
                <p class="center-align"><strong>Correo:</strong> $correo</p>
                <p class="center-align"><strong>Documento:</strong> $dni_sesion</p>
                <form action="facturas.php?accion=factura" method="post">
                    <div class="input-field">
                        <select id="producto" name="producto" onchange="cargarDatos()" required>
                            <option value="" disabled selected>Seleccionar producto</option>
HTML;
        $conexion = Conexion();
        $datos = pg_query($conexion, "SELECT * FROM productos");
        $productos = pg_fetch_all($datos);

        if ($productos) {
            foreach ($productos as $d) {
                $nombre = htmlspecialchars($d["nombre"]);
                echo <<<HTML
                        <option value="$nombre">$nombre</option>
HTML;
            }
        } else {
            echo <<<HTML
                        <option value="" disabled>No hay productos disponibles</option>
HTML;
        }

        echo <<<HTML
                        </select>
                        <label for="producto">Producto</label>
                    </div>
                    <div class="input-field">
                        <input id="nombre" name="nombre" type="text" readonly>
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="input-field">
                        <input id="descripcion" name="descripcion" type="text" readonly>
                        <label for="descripcion">Descripción</label>
                    </div>
                    <div class="input-field">
                        <input id="cantidad" name="cantidad" type="number" min="1" onchange="calcularTotal()" required>
                        <label for="cantidad">Cantidad</label>
                    </div>
                    <div class="input-field">
                        <input id="precio" name="precio" type="text" readonly>
                        <label for="precio">Precio</label>
                    </div>
                    <div class="input-field">
                        <input id="total" name="total" type="text" readonly>
                        <label for="total">Total</label>
                    </div>
                    <button type="submit" class="btn blue waves-effect waves-light">Realizar Factura</button>
                </form>
                <a href="../index.php" class="btn btn-flat btn-back-home">Regresar al inicio</a>
            </div>
HTML;
    } else {
        echo <<<HTML
            <div class="form-container center-align">
                <p>Por favor, inicia sesión para continuar</p>
                <a href="./pagina-principal/login.php" class="btn blue waves-effect waves-light">
                    Iniciar sesión
                </a>
            </div>
HTML;
    }

    echo <<<HTML
        </div>
        <footer>
            <p>&copy; 2024 Tu Empresa. Todos los derechos reservados.</p>
        </footer>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                M.AutoInit();
            });
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
            <li>
                <a href="./usuarios.php?accion=verusuarios">Usuarios</a>
            </li>
            <li>
                <a href="../catalogo/catalogo.php?accion=catalogo">Catálogo</a>
            </li>
            <li>    
                <a href="#">Cerrar sesion</a>
            </li>
            <li>
                <a href="../productos.php?accion=verproductos">Productos</a>
                </li>
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
