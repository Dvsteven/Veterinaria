<?php
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "veterinaria";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Recuperar datos del formulario
    $nombre_dueño = $_POST['nombre'];
    $nombre_mascota = $_POST['nombre_mascota'];
    $edad = $_POST['edad'];
    $tipo_mascota = $_POST['tipoMascota'];
    $raza = $_POST['raza'];
    $contacto = $_POST['contacto'];

    $sql = "INSERT INTO mascotas (nombre_dueño, nombre_mascota, edad, tipo_mascota, raza, contacto) 
            VALUES ('$nombre_dueño', '$nombre_mascota', '$edad', '$tipo_mascota', '$raza', '$contacto')";

    if ($conn->query($sql) === TRUE) {
        echo "<script type=\"text/javascript\">alert(\"Registro de mascota exitoso! Bienvenid@, $nombre_mascota\");</script>";
        echo "<meta http-equiv='refresh' content='0; url=mascotas_index.html'>";
    } else {
        echo "Error al registrar la mascota: " . $conn->error;
    }

    $conn->close();
?>
