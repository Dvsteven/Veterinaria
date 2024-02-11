<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];

        // Conecta con la base de datos y realiza la consulta para validar el login
        // Asegúrate de establecer la conexión a tu base de datos
        $conn = new mysqli("localhost", "root", "", "veterinaria");

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contrasena='$contrasena'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            session_start(); // Inicia la sesión si no está iniciada
            // Usuario válido, inicia sesión y redirige
            //Esto se usa para mostrar los datos en el perfil
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['usuario']; 
            $_SESSION['nombre'] = $row['nombre']; 
            
            // Obtiene el nombre de la persona
            $row = $result->fetch_assoc();
            $nombre = $row["nombre"]; // Ajusta esto según la estructura de tu tabla

            // Imprime la alerta con el nombre de la persona
            echo "<script type=\"text/javascript\">alert(\"Inicio de sesión exitoso! Bienvenido, $nombre\");</script>";
            // Redirige a la página principal
            echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
        } else {
            // Usuario inválido, muestra un mensaje de error
            echo "Nombre de usuario o contraseña incorrectos.";
        }

        $conn->close();
    }
?>