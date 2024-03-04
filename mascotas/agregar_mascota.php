<?php
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "veterinaria";

    $conn = new mysqli($servername, $username, $password, $dbname);

?>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>;

<?php

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Recuperar datos del formulario
    $nombre_dueno = $_POST['nombre'];
    $nombre_mascota = $_POST['nombre_mascota'];
    $edad = $_POST['edad'];
    $tipo_mascota = $_POST['tipoMascota'];
    $raza = $_POST['raza'];
    $contacto = $_POST['contacto'];

    $sql = "INSERT INTO mascotas (nombre_dueno, nombre_mascota, edad, tipo_mascota, raza, contacto) 
            VALUES ('$nombre_dueno', '$nombre_mascota', '$edad', '$tipo_mascota', '$raza', '$contacto')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>swal('Registro Exitoso!', 'Bienvenido a la familia peluda', 'success').then(() => { window.location.href = '../mascotas/mascotas_index.php'; });</script>";
    } else {
        echo "Error al registrar la mascota: " . $conn->error;
    }

    $conn->close();
?>
