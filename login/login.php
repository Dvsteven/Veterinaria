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

            // Imprime la alerta con el nombre de la persona
            echo "<script type=\"text/javascript\">alert(\"Inicio de sesión exitoso! Bienvenido, $nombre $apellido\");</script>";
            // Redirige a la página principal
            echo "<meta http-equiv='refresh' content='0; url=../panel/index.html'>";
        } else {
            // Si las credenciales son incorrectas, muestra un mensaje de error
            echo "<script>alert('Email o contraseña incorrectos.');</script>";
            echo "<script>window.location.href = 'indexlogin.php';</script>";
        }

        $conn->close();
    }
?>