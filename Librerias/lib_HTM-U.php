<?php

function Registro_clientes()
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
            <form class="col-4 p-3 m-auto" action="../../Librerias/lib_usuarios.php?accion=registrar" method="post">
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
                    <input class="form-control" required type="phone" name="telefono" placeholder="introduzca su numero telefonico">
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
    <title>Document</title>
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
                    <th scope="col">ROL</th>
                    <th>EDITAR/ELIMINAR</th>
                </tr>
            </thead>
HTML;

    Ver();
    $mostrar .= <<<HTML
        </table>
    </div>
    <button class="btn btn-outline-secondary">
        <a href="../../index.php">inicio</a>
    </button>
HTML;
    echo $mostrar;
}

function Estilos()
{
    $Estilos = <<<HTML
     <link rel="stylesheet" href="../../css/estilos7.css">
HTML;
    echo $Estilos;
}

function Ver()
{
    include_once "../../conexion.php";
    $conexion = Conexion();
    $consulta1 = <<<SQL
        "SELECT * FROM usuarios"
SQL;
    $query = pg_query($conexion, $consulta1);


    $areglo = [];

    while ($fila = pg_fetch_object($query)) {
        $arreglo[] = [
            "dni" => $fila->dni,
            "nombre" => $fila->nombre,
            "apellido" => $fila->apellido,
            "telefono" => $fila->telefono,
            "direccion" => $fila->direccion,
            "correo" => $fila->correo,
            "contraseña" => $fila->contraseña
        ];
        $html = <<<HTML
                <tr>
                    <td>$fila->dni</td>
                    <td>$fila->nombre</td>
                    <td>$fila->apellido</td>
                    <td>$fila->telefono</td>
                    <td>$fila->direccion</td>
                    <td>$fila->correo</td>
                    <td>$fila->contraseña</td>
                </tr>
HTML;
    }

    echo $html;
}

?>