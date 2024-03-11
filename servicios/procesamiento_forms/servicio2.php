<?php
// Establece la conexión a la base de datos
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
    $telefono = $_POST["telefono"] ?? ''; 
    $email = $_POST["email"] ?? ''; 
    $nombre_mascota = $_POST["nombre_mascota"];
    $tipo_mascota = $_POST["tipo_mascota"] ?? '';
    $edad_mascota = $_POST["edad_mascota"] ?? 0;
    $vacuna = $_POST["vacuna"] ?? ''; 
    $historial = $_POST["historial"];

    
    $sql = "INSERT INTO servicio2 (nombrePropietario, telefono, email, mascota, tipoMascota, edadMascota, vacuna, fechaCita, historial) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Verificar si la consulta preparada fue exitosa
    if ($stmt) {
        $stmt->bind_param("sssssisss", $nombre_propietario, $telefono, $email, $nombre_mascota, $tipo_mascota, $edad_mascota, $vacuna, $fecha_cita, $historial);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "¡Cita registrada exitosamente!";
        } else {
            echo "Error al registrar la cita: " . $stmt->error;
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
