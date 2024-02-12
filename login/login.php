<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST["email"];
        $contrasena = $_POST["contrasena"];

        // Conecta con la base de datos y realiza la consulta para validar el login
        $conn = new mysqli("localhost", "root", "", "veterinaria");

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Consulta SQL para verificar el login
        $sql = "SELECT * FROM personal WHERE email='$usuario' AND password='$contrasena'";
        $result = $conn->query($sql);
?>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>;

<?php

        if ($result->num_rows == 1) {
            // Usuario válido, inicia sesión y redirige
            // Obtiene los datos del usuario
            $row = $result->fetch_assoc();
            $nombre = $row["nombre"];
            $email = $row["email"];
            $apellido = $row["apellido"];
            $rol = $row["rol"];

            // Guarda los datos del usuario en las variables de sesión
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['nombre'] = $nombre;
            $_SESSION['apellido'] = $apellido;
            $_SESSION['rol'] = $rol;

            // Redirige a diferentes paneles según el rol del usuario
            if ($rol == "Administrador") {
                echo "<script>swal('Inicio de sesión exitoso!', 'Bienvenido, SuperAdmin $nombre $apellido', 'success').then(() => { window.location.href = '../panel/index.php'; });</script>";
            } elseif ($rol == "Medico") {
                echo "<script>swal('Inicio de sesión exitoso!', 'Bienvenido, $nombre $apellido', 'success').then(() => { window.location.href = '../perfil/dashboard.php'; });</script>";
            } else {
                // Rol no reconocido, redirige a un error o página de inicio común
                echo "<script>swal('Error', 'Rol de usuario no reconocido', 'error').then(() => { window.location.href = '../error.php'; });</script>";
            }
        } else {
            // Si las credenciales son incorrectas, muestra un mensaje de error
            echo "<script>swal('Error', 'Email o contraseña incorrectos', 'error').then(() => { window.location.href = 'indexlogin.php'; });</script>";
        }

        $conn->close();
    }
?>