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

    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
    $result = $conn->query($sql);
?>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>;

<?php
    if ($result->num_rows > 0) {
        // Obtiene los datos del usuario
        $row = $result->fetch_assoc();
        $nombre = $row["nombre"];
        $apellido = $row["apellido"];
        $email = $row["correo_electronico"];
        $telefono = $row["telefono"];
        $direccion = $row["direccion"];

        // Guarda los datos del usuario en las variables de sesión
        $_SESSION['nombre'] = $nombre;
        $_SESSION['apellido'] = $apellido;
        $_SESSION['correo_electronico'] = $email;
        $_SESSION['telefono'] = $telefono;
        $_SESSION['direccion'] = $direccion;

        echo "<script>swal('Inicio de sesión exitoso!', 'Bienvenido, $nombre $apellido', 'success').then(() => { window.location.href = '../profile/index.php'; });</script>";
        exit();
    } else {
        // Autenticación fallida
        echo "Usuario o contraseña incorrectos";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
?>
