<?php
    // Inicia la sesión
    session_start();

    if (!isset($_SESSION['usuario'])) {
        // Redirecciona o toma alguna acción si el usuario no está autenticado
        echo "<script type=\"text/javascript\">alert(\"No has iniciado sesion\");</script>";

        exit();
    }

    // Obtén el ID del usuario desde la sesión (esto puede variar según tu sistema de autenticación)
    $idUsuario = $_SESSION['id_usuario'];

    // Conecta a tu base de datos (reemplaza con tus propias credenciales)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "veterinaria";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Consulta SQL para obtener los datos del usuario
    $sql = "SELECT * FROM usuarios WHERE id = $idUsuario";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        // Obtiene los datos del usuario
        $datosUsuario = $resultado->fetch_assoc();

        // Devuelve los datos como JSON
        header('Content-Type: application/json');
        echo json_encode($datosUsuario);
    } else {
        // Maneja el caso en el que no se encuentran datos del usuario
        echo json_encode(['error' => 'No se encontraron datos del usuario']);
    }

    // Cierra la conexión a la base de datos
    $conn->close();
?>
