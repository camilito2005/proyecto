<?php 
echo <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <style>
        /* CSS personalizado */
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            background-color: #343a40;
            color: #ffffff;
            height: 100vh;
        }
        .sidebar a {
            color: #ffffff;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            padding: 20px;
        }
    </style>
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 sidebar">
                <h3 class="text-center my-3">Menú</h3>
                <a href="#usuarios">Usuarios</a>
                <a href="#productos">Productos</a>
                <a href="#facturas">Facturas</a>
                <!-- Agrega más enlaces según tus necesidades -->
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 col-lg-10 content">
                <!-- Sección Usuarios -->
                <section id="usuarios">
                    <h2>Usuarios</h2>
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>DNI</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                <th>Cargo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aquí deberás insertar los datos de los usuarios desde PHP -->
                        </tbody>
                    </table>
                </section>

                <!-- Sección Productos -->
                <section id="productos">
                    <h2>Productos</h2>
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>Categoría</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aquí deberás insertar los datos de los productos desde PHP -->
                        </tbody>
                    </table>
                </section>
            </main>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
HTML;
?>