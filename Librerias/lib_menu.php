<?php
function Menus()
{
    $menu = <<<HTML
    <!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/estilos7.css">
    <link rel="shortcut icon" href="fotos/buscador.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAGINA</title>
</head>

<body>
    <nav>
        <ul class="menu-horizontal">
            <li>
                <a href="./vistas/usuarios/usuarios.php">usuarios</a>
                <ul class="menu-vertical">
                    <li>
                        <a href="./vistas/usuarios/formulario_registro.php">registrar</a>
                    </li>

                </ul>

            </li>
            <li>
                <a href="./vistas/catalogo/catalogo.php">
                    <i>catalogo</i>
                </a>
            </li>

            <li>
                <a href="./vistas/pagina-principal/login.php">
                    <i>iniciar sesion </i>
                    <ul class="menu-vertical">
                        <li>
                            <a href="./vistas/usuarios/formulario_registro.php">
                                <i>registrate</i>
                            </a>
                        </li>
                    </ul>

                </a>
            </li>

            <li>
                <a href="./vistas/facturas.php">
                    <i>facturas</i>
                </a>
            </li>
            <li>
                <a href="./vistas/catalogo/catalogo.php">productos

                    <ul class="menu-vertical">
                        <li>
                            <a href="./vistas/productos/verProductos.php">
                                <i>mis productos</i>
                            </a>
                        </li>
                    </ul>

                </a>
            </li>

        </ul>

    </nav>
        
    
    </div>
</body>
</html>
HTML;
    echo $menu;
}
?>