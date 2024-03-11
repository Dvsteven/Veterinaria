<?php
// Establecer la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "veterinaria";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Obtener la fecha seleccionada del parámetro GET
$fechaSeleccionada = $_GET['fecha'];

// Consultar la base de datos para obtener las fechas disponibles para citas en la fecha seleccionada
$sql = "SELECT DISTINCT fecha FROM disponibilidad WHERE fecha = '$fechaSeleccionada'";
$result = $conn->query($sql);

$fechasDisponibles = array();

if ($result->num_rows > 0) {
    // Si se encontraron resultados, agregar las fechas disponibles al array
    while ($row = $result->fetch_assoc()) {
        $fechasDisponibles[] = $row['fecha'];
    }
}

// Devolver las fechas disponibles en formato JSON
echo json_encode($fechasDisponibles);

// Cerrar la conexión a la base de datos
$conn->close();
?>