<?php

include_once "../../Librerias/lib_HTML-U.php";
session_start();

echo <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
        }
        .card {
            margin-top: 20px;
        }
        .btn-login {
            margin-top: 20px;
        }
    </style>
</head>
<body>
HTML;

Menu();
if ($_SESSION["descripcion"]=== "Administrador") {
    echo "hola admin";
}
elseif ($_SESSION["descripcion"]==="Empleado") {
    echo "hola empleado";
}
    echo <<<HTML

    <div class="container">
        <h1 class="center-align">Perfil de Usuario</h1>
        <div class="card">
            <div class="card-content">
                <span class="card-title">Información del Usuario</span>
HTML;

                 if (isset($_SESSION["correo"])){

                echo <<<HTML
                    <p><strong>Hola  {$_SESSION["descripcion"]}</p>
                    <p><strong>Correo:{$_SESSION["correo"]}</p>
                    <p><strong>Nombre:{$_SESSION["nombre"]}</p>
                    <p><strong>documento:{$_SESSION["dni"]}</p>
                    <div class="card-action">
                        <a href="#" class="btn blue">Editar</a>
                        <!--<a href="logout.php" class="btn red">Cerrar sesión</a>-->
                        <a href="../usuarios/usuarios.php?accion=cerrar" class="btn red">Cerrar sesión</a>
                    </div>
HTML;
                }

else {

        echo <<<HTML
                    <p>Para continuar, inicia sesión.</p>
                    <a href="../pagina-principal/login.php" class="btn blue btn-login">Iniciar sesión</a>
HTML;
}
echo <<<HTML
            </div>
        </div>
    </div>
    <form id="myForm" action="../../index.php" onsubmit="showLoading()" method="post">
    <button class="btn btn-outline-secondary" value="inicio">
        <i class="fa-solid fa-house"></i>inicio
    </button>
</form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>

HTML;

?>
