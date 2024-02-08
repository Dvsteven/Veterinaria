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
    $nombre_mascota = $_POST["nombrep"];
    $tipo = $_POST["tipo"];
    $raza = $_POST["raza"];
    $contacto = $_POST["contacto"];
    $cita = $_POST["cita"];
    $motivo = $_POST["motivo"];
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];

    // Inserta la cita en la tabla 'citas'
    $sql = "INSERT INTO citas (nombre_dueno, nombre_mascota, tipo_mascota, raza, contacto, tipo_cita, motivo, fecha, hora) VALUES ('$nombre', '$nombre_mascota', '$tipo', '$raza', '$contacto', '$cita', '$motivo', '$fecha', '$hora')";

    if ($conn->query($sql) === TRUE) {
        echo "<script type=\"text/javascript\">alert(\"Cita solicitada por $nombre el $fecha a las $hora. Almacenada en la base de datos.\");</script>";

        echo "<meta http-equiv='refresh' content='0; url=../index.php'>";

    } else {
        echo "Error al almacenar la cita: " . $conn->error;
    }
}

// Cierra la conexión a la base de datos
$conn->close();
?>
