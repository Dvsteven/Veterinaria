<?php
// Establece la conexión a la base de datos (modifica con tus propios datos)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "veterinaria";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $nombre_propietario = $_POST["nombre_propietario"];
    $telefono = $_POST["telefono"] ?? ''; // Puedes ajustar el valor predeterminado según tus necesidades
    $email = $_POST["email"] ?? ''; // Puedes ajustar el valor predeterminado según tus necesidades
    $nombre_mascota = $_POST["nombre_mascota"];
    $tipo_mascota = $_POST["tipo_mascota"] ?? ''; // Puedes ajustar el valor predeterminado según tus necesidades
    $edad_mascota = $_POST["edad_mascota"] ?? 0; // Puedes ajustar el valor predeterminado según tus necesidades
    $tipo_cirugia = $_POST["tipo_cirugia"];
    $fecha_cirugia = $_POST["fecha_cirugia"];
    $historial_medico = $_POST["historial_medico"];
    $comentarios = $_POST["comentarios"] ?? ''; // Puedes ajustar el valor predeterminado según tus necesidades

    // Inserta la cita en la tabla 'cirugias'
    $sql = "INSERT INTO servicio3 (nombrePropietario, telefono, email, mascota, tipoMascota, edadMascota, tipoCirugia, fechaCirugia, historialMedico, comentarios) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Verificar si la consulta preparada fue exitosa
    if ($stmt) {
        $stmt->bind_param("sssssissss", $nombre_propietario, $telefono, $email, $nombre_mascota, $tipo_mascota, $edad_mascota, $tipo_cirugia, $fecha_cirugia, $historial_medico, $comentarios);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "¡Cirugía registrada exitosamente!";
        } else {
            echo "Error al registrar la cirugía: " . $stmt->error;
        }

        // Cerrar la consulta preparada
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();

} else {
    echo "Acceso incorrecto.";
}
?>
