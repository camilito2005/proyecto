<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../../css/registro.css"> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="contenedor">
        <div class="formulario_registro">

            <form class="col-4 p-3 m-auto" action="../../controlador/CONTROLADOR-Usuarios.php" method="post">
                <h3 class="text-center text-secondary">registro de clientes</h3>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">dni</label>
                    <input class="form-control" required type="text" name="dni" placeholder=" introduzca su dni">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">rol</label>
                    <section>
                        <select name="rol" id="">
                            <option value="1">admin</option>
                            <option value="2">cliente</option>
                        </select>
                    </section>
                    <!-- <input class="form-control" required type="text" name="rol" placeholder=" introduzca su dni"> -->
                </div>

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
                    <a href="../../../php/vistas/usuarios/usuarios.php">ver registro</a>
                </button><br><br>
                
                <button class="btn btn-outline-secondary">
                    <a href="../../index.php">inicio</a>
                </button>
        </div>
        </form>
    </div>
    </div>
</body>

</html>