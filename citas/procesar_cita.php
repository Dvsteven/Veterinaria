<?php
// Establece la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "veterinaria";

$conn = new mysqli($servername, $username, $password, $dbname);

?>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>;

<?php
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

    // Verifica si ya existe una cita en la misma fecha y hora
    $sql = "SELECT * FROM citas WHERE fecha = '$fecha' AND hora = '$hora'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<script>swal('Error', 'Ya hay una cita programada para esa fecha y hora.', 'error').then(() => { window.location.href = 'citas.html'; });</script>";
    } else {
        // Inserta la cita en la tabla 'citas'
        $sql = "INSERT INTO citas (nombre_dueno, nombre_mascota, tipo_mascota, raza, contacto, tipo_cita, motivo, fecha, hora) VALUES ('$nombre', '$nombre_mascota', '$tipo', '$raza', '$contacto', '$cita', '$motivo', '$fecha', '$hora')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>swal('Cita solicitada exitosamente!', 'Solicitada por $nombre el $fecha a las $hora, fue almacenada en la base de datos.', 'success').then(() => { window.location.href = '../index.php'; });</script>";

        } else {
            echo "Error al almacenar la cita: " . $conn->error;
        }
    }
}

// Cierra la conexión a la base de datos
$conn->close();
?>
