<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Iniciar Sesión</title>
</head>
<body>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <?php
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "veterinaria";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("La conexión a la base de datos falló: " . $conn->connect_error);
    }

    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Verificar si el usuario existe
        $sql_contrasena = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
        $result_contrasena = $conn->query($sql_contrasena);

        if ($result_contrasena->num_rows > 0) {
            // Si las credenciales son correctas, obtener datos del usuario y redireccionar
            $row = $result->fetch_assoc();
            $nombre = $row["nombre"];
            $apellido = $row["apellido"];
            $email = $row["correo_electronico"];
            $telefono = $row["telefono"];
            $direccion = $row["direccion"];

            // Guardar los datos del usuario en las variables de sesión
            $_SESSION['nombre'] = $nombre;
            $_SESSION['apellido'] = $apellido;
            $_SESSION['correo_electronico'] = $email;
            $_SESSION['telefono'] = $telefono;
            $_SESSION['direccion'] = $direccion;

            echo "<script>swal('Inicio de sesión exitoso!', 'Bienvenido, $nombre $apellido', 'success').then(() => { window.location.href = '../profile/index.php'; });</script>";
        } else {
            // Contraseña incorrecta
            echo "<script>swal('Inicio de sesión fallido!', 'Contraseña incorrecta', 'error').then(() => { window.location.href = 'login.php'; });</script>";
        }
    } else {
        // Usuario incorrecto
        echo "<script>swal('Inicio de sesión fallido!', 'Usuario incorrecto', 'error').then(() => { window.location.href = 'login.php'; });</script>";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>
</body>
</html>