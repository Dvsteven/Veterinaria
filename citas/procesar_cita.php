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
    $nombre = $_POST["nombre"];
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];

    // Inserta la cita en la tabla 'citas'
    $sql = "INSERT INTO citas (nombre_dueño, fecha, hora) VALUES ('$nombre', '$fecha', '$hora')";

    if ($conn->query($sql) === TRUE) {
        echo "Cita solicitada por $nombre el $fecha a las $hora. Almacenada en la base de datos.";
    } else {
        echo "Error al almacenar la cita: " . $conn->error;
    }
}

// Cierra la conexión a la base de datos
$conn->close();
?>
