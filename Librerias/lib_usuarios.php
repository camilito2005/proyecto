<?php

$accion = $_GET["accion"];

function Guardar()
{
    if (!empty($_POST["dni"]) && !empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["telefono"]) && !empty($_POST["direccion"]) && !empty($_POST["correo"]) && !empty($_POST["contraseña"])) {
        $datos = [
            "dni" => $_POST['dni'],
            "nombre" => $_POST["nombre"],
            "apellido" => $_POST["apellido"],
            "telefono" => $_POST["telefono"],
            "direccion" => $_POST["direccion"],
            "correo" => $_POST["correo"],
            "contraseña" => $_POST["contraseña"],
            "comfirm_contraseña" => $_POST["comfirm_contraseña"],
            "id_rol" => $_POST["rol"],

        ];

        include_once "../../conexion.php";
        $conexion = Conexion();

        $dni = pg_escape_string($datos['dni']);
        $nombre = pg_escape_string($datos['nombre']);
        $apellido = pg_escape_string($datos['apellido']);
        $telefono = pg_escape_string($datos['telefono']);
        $direccion = pg_escape_string($datos['direccion']);
        $correo = pg_escape_string($datos['correo']);
        $contraseña = pg_escape_string($datos['contraseña']); // el pg_escape_string es para que la base de datos no tenga problemas con caracteres especiales como comillas y otros caracteres y para evitar que los datos del usuario puedan modificar la estructura de la consulta SQL de manera maliciosa.
        $comfirm_contraseña = pg_escape_string($datos['comfirm_contraseña']);

        if ($contraseña !== $comfirm_contraseña) {
            echo "Las contraseñas no coinciden. Por favor, intente de nuevo.";
            exit;
        }

        if (strlen($contraseña) < 6) {
            echo "La contraseña debe tener al menos 6 caracteres.";
            exit;
        }
        $consultaCorreo = <<<SQL
        SELECT count(*) FROM usuarios WHERE correo = '$correo'
SQL;
        $consultaCorreo = pg_query($conexion, $consultaCorreo);
        $resultadoCorreo = pg_fetch_result($consultaCorreo, 0, 0);
        if ($resultadoCorreo) {
            echo "este correo" . "'$correo'" . "ya existe";
            exit;
        }

        $consultadni = <<<SQL
        SELECT count(*) FROM usuarios WHERE dni = '$dni'
SQL;
        $querydni = pg_query($conexion, $consultadni);
        $resultadoDni = pg_fetch_result($querydni, 0, 0); //Es una función que se usa para recuperar un valor específico de un recurso de consulta obtenido a través de pg_query.
        if ($resultadoDni > 0) {
            echo "este dni " . "'$dni'" . " ya existe";
            exit;
        }

        $consultaContraseña = <<<SQL
        SELECT count(*) FROM usuarios WHERE contraseña = '$contraseña'
SQL;
        $resultadoContraseña = pg_query($conexion, $consultaContraseña);
        $countcontraseña = pg_fetch_result($resultadoContraseña, 0, 0);
        if ($countcontraseña > 0) {
            echo "la contraseña " . "'$contraseña'" . " ya existe";

            exit;
        }

        $consulta = <<<SQL
            INSERT INTO usuarios (dni, nombre, apellido, telefono, direccion, correo, contraseña) VALUES ('$dni','$nombre','$apellido','$telefono','$direccion','$correo','$contraseña')
SQL;

        $resultadoc = pg_query($conexion, $consulta);

        if ($resultadoc) {
            //header("Location: ./usuarios.php");
            echo "usuario registrado correctamente";
        } else {
            if (!$resultadoc) {
                echo "error";
            }
        }
    } else {
        echo "campos vacios, porfavor llene los campos";
    }
}

function Actualizar_usuarios(){
    $id = $_GET["id"];
    // $dni = $_POST["dni"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];
    $correo = $_POST["correo"];
    $contraseña = $_POST["contraseña"];

    include_once "../../conexion.php";
    $conexion = Conexion();

    $consulta = <<<SQL
    UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido',telefono = '$telefono', direccion = '$direccion' ,correo = '$correo',contraseña = '$contraseña' WHERE id = '$id'
SQL;

$resultado_consulta = pg_query($conexion,$consulta);

if ($resultado_consulta) {
    header("Location: ./usuarios.php");
}
else {
    echo "error al realizar la operacion ";
}
}

function Eliminar()
{
    include_once "../../conexion.php";
    $conexion = Conexion();

    $id = $_GET["id"];

    $id = pg_escape_string($id); // Asegúrate de escapar el ID para evitar inyecciones SQL

    $consulta = <<<SQL
        DELETE FROM usuarios WHERE id = $id
SQL;
    $resultado = pg_query($conexion, $consulta);
    if ($resultado) {
        echo "el registro de id " . $id . " eliminado correctamente";
        exit;
    } else {
        echo "error ";
    }
}

function Login()
{
    session_start();

    include_once "../../conexion.php";

    $conexion = Conexion();

    /*$datos = [
        "correo" => $_POST['correo'],
        "contraseña" => $_POST['contraseña'],
    ];*/

    $correo = $_POST["correo"];
    $contraseña = $_POST["contraseña"];

    $correo = pg_escape_string($correo);
    $contraseña = pg_escape_string($contraseña);

    $consulta = <<<SQL
        SELECT correo,contraseña FROM usuarios WHERE correo = '$correo' AND contraseña = '$contraseña'
SQL;


    $resultado = pg_query($conexion, $consulta);
    $filas = pg_fetch_array($resultado);

    if ($filas) {
        $_SESSION["correo"] = $correo;

        header("Location: ../catalogo/catalogo.php");
    } else {
        echo "contraseña incorrecta ";
    }
}

function Modificar_usuarios()
{

    include_once "../../conexion.php";
    $conexion = Conexion();
    $id = $_GET["id"];

    $consulta = <<<SQL
        SELECT * FROM usuarios WHERE id = '$id'
SQL;
    $resultado = pg_query($conexion, $consulta);
    
    $html = <<<HTML
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d6ecbc133f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modificar registro</title>
</head>

<body>
    <div class="contenedor">
        <form class="col-4 p-3 m-auto" action="usuarios.php?accion=actualizar&id=$id" method="post">
            <h3>modificar registro de usuarios</h3>
                <input type="hidden" name="id" value="{$id}">
HTML;
    while ($filas = pg_fetch_object($resultado)) {
        $html .= <<<HTML
                <div class="mb-3" disabled>
                    <label for="exampleInputEmail1" class="form-label">dni</label>
                    <input type="text" class="form-control" disabled name="dni" value="{$filas->dni}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">nombres</label>
                    <input type="text" class="form-control" name="nombre" value="{$filas->nombre}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">apellido</label>
                    <input type="text" class="form-control" name="apellido" value="{$filas->apellido}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">telefono</label>
                    <input type="number" class="form-control" name="telefono" value="{$filas->telefono}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" required>direccion</label>
                    <input type="text" class="form-control" name="direccion" value="{$filas->direccion}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" required>correo</label>
                    <input type="email" disabled class="form-control" name="correo" value="{$filas->correo}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" required>contraseña</label>
                    <input type="password" disabled class="form-control" name="contraseña" value="{$filas->contraseña}">
                </div>
                <!-- <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" required>rol</label>
                    <input type="text" class="form-control" name="rol" value="{$filas->id_rol}">
                </div> -->

HTML;
    }
    $html .= <<<HTML
            <button type="submit" class="btn btn-primary" name="modificar" class="btn btn-outline-secondary">
                <i class="fa-solid fa-pen"></i>modificar
            </button>

            <button class="btn btn-outline-secondary">
                <a href="../usuarios/usuarios.php"><i class="fa-solid fa-backward"></i></a>regresar
            </button><br><br>
            <button class="btn btn-outline-secondary">
                <a href="../pagina-principal/index.php"><i class="fa-solid fa-house"></i></a>inicio
            </button>
        </form>
    </div>
</body>
</html>

HTML;
    echo $html;
}

function Buscar($search){
    if(!empty($search)){
        include_once "../conexion.php";
        $conexion = Conexion();
        $consulta = <<<SQL
        SELECT * FROM usuarios WHERE nombre LIKE '%$search%'
SQL;
        $resultado_consulta = pg_query($conexion, $consulta);
        if (pg_num_rows($resultado_consulta) == 0) {
            echo "no se encuentran resultados";
        }
        if (!$resultado_consulta) {
            die("query failed");
        }
    
        $array=[];
    
        if (pg_num_rows($resultado_consulta) > 0) {
            while ($fila = pg_fetch_array($resultado_consulta)) {
                $array[]=[
                "nombre"	=> $filas["nombre"],
                "apellidos"	=> $fila["apellidos"],
                "telefono"=> $fila["telefono"],
                "direccion"	=> $fila["direccion"],
                "correo"	=> $fila["correo"],
                "contraseña" => $fila["contraseña"]
                ];
               
            }
            $jsonstring = json_encode($array);
            echo $jsonstring;
    
        }
        
    }
}
function Cerrar_sesion()
{
    session_start();
    session_destroy();
    header("Location: ../pagina-principal/login.php");
}

function restablecer_contraseña(){

    try {
        include_once "../../conexion.php";
        $conexion = Conexion();
    
        if (!$conexion) {
            echo ('Error al conectar a la base de datos.');
        }
    
        if (!isset($_POST['correo'])) {
            echo ('Correo electrónico es requerido');
        }
        $correo = $_POST['correo'];
    
        $token = bin2hex(openssl_random_pseudo_bytes(32));
        $hora_expiracion = date('Y-m-d H:i:s', strtotime('+1 hour'));
    
        $query = 'INSERT INTO password_reset (correo, token, expires_at) VALUES ($1, $2, $3)';
        $result = pg_query_params($conexion, $query, [$correo, $token, $hora_expiracion]);
    
        if (!$result) {
            $error = pg_last_error($conexion);
            echo ('Error al insertar en la base de datos: ' . $error);
        }
        if ($result) {
            
        $resetLink = "http://localhost/ti/vistas/usuarios/restablecer_contraseña.php?token=$token";

        echo "este es un simulacro de el link que deberia mandar en caso de llegar al correo, pero como no llega ";

        echo "<a href='http://localhost/ti/vistas/usuarios/usuarios.php?accion=contraseña&token=$token'>formulario para restablecer contraseña</a>";
        echo ' <br>  <a href="../vistas/pagina-principal/login.php">volver </a>';
    
        }
        $to = $correo;
        $subject = 'Restablecer Contraseña';
        $message = "Para restablecer tu contraseña, por favor haz clic en el siguiente enlace: $resetLink";
        $headers = 'From: no-reply@marrugobarrioscamilo2005@gmail.com' . "\r\n" .
                'Reply-To: no-reply@marrugobarrioscamilo2005@gmail.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
    
        $mail_sent = mail($to, $subject, $message, $headers);
    
        if ($mail_sent) {
            echo 'Hemos enviado un enlace para restablecer tu contraseña...';
            echo ' <br>  <a href="../vistas/pagina-principal/login.php">volver </a>';
        } else {
            throw new Exception('Hubo un problema al enviar el correo. Por favor, inténtelo de nuevo más tarde.');
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
    
}


function Formulario_restablecer_contraseña(){

    include_once "../../conexion.php";

    $conexion = conexion();


        $token = $_GET['token'];
        //echo $token;

    if (!isset($_GET['token'])) {
        die('Token es requerido');
    }

    // Usar parámetros de consulta para evitar inyecciones SQL
    $query = 'SELECT * FROM password_reset WHERE token = $1 AND expires_at > NOW()';
    $result = pg_query_params($conexion, $query, array($token));

    if (!$result) {
        die('Error en la consulta: ' . pg_last_error());
    }

    $reset = pg_fetch_assoc($result);

    if (!$reset) {
        die('El token es inválido o ha expirado.');
    }

    pg_free_result($result);
    pg_close($conexion);

    echo <<<HTML
    <html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../js/contraseña.js"></script>
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Restablecer Contraseña</h2>
        <form action="../usuarios/usuarios.php?accion=restablecer" onsubmit="return validateForm()" method="post" class="mt-4">
            <input type="hidden" name="token" value="$token">
            
            <div class="form-group">
                <label for="password">Nueva Contraseña:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirmar Nueva Contraseña:</label>
                <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
                <div id="passwordError" class="error-message"></div>
            </div>
            
            <button type="submit" class="btn btn-primary">Actualizar Contraseña</button>
        </form>
    </div>

    <!-- Incluir Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>
</html>
HTML;
}

function Restablecer(){
    
    include_once "../../conexion.php";

if (isset($_POST['token'], $_POST['password'])) {
    $token = $_POST['token'];
    $password = $_POST['password'];

    $confirmPassword = $_POST['confirm_password'];

    if ($password !== $confirmPassword) {
        echo "Las contraseñas no coinciden.";
        exit;
    }

    $conexion = Conexion();

    echo $token;
    //echo $password;
    
    // Verificar el token
    $result = pg_query_params($conexion, "SELECT correo, expires_at FROM password_reset WHERE token = $1", array($token));
    //echo $result;
    //var_dump($result);
    $reset = pg_fetch_assoc($result);

    if ($reset && $reset['expires_at'] > date('Y-m-d H:i:s')) {
        // Token válido, actualizar la contraseña
        $email = $reset['correo'];
        //$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Actualizar la contraseña del usuario
        pg_query_params($conexion, "UPDATE usuarios SET contraseña = $1 WHERE correo = $2", array($password, $email));

        // Eliminar el token usado
        pg_query_params($conexion, "DELETE FROM password_reset WHERE token = $1", array($token));

        echo "La contraseña ha sido actualizada con éxito.";
        echo '<a href="../usuarios/usuarios.php">ver registros </a>';

    } else {
        echo "El enlace de restablecimiento no es inválido o ha expirado.";
        echo '<a href="../pagina-principal/login.php">volver</a>';

    }

    pg_close($conexion);
}

}







if ($opciones == "search") {
    Buscar($search);
}


?>