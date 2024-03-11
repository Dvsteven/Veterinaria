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

    // Verifica si hay disponibilidad para la fecha y hora seleccionadas
    $sql_disponibilidad = "SELECT * FROM disponibilidad WHERE fecha = '$fecha' AND hora_inicio <= '$hora' AND hora_fin >= '$hora'";
    $result_disponibilidad = $conn->query($sql_disponibilidad);

    if ($result_disponibilidad->num_rows > 0) {
        // Verifica si hay alguna cita programada en la misma hora
        $sql_citas = "SELECT * FROM citas WHERE fecha = '$fecha' AND hora = '$hora'";
        $result_citas = $conn->query($sql_citas);
    
        if ($result_citas->num_rows > 0) {
            // Ya hay una cita programada para esa fecha y hora, muestra un mensaje de error
            echo "<script>swal('Error', 'Ya hay una cita programada para esa fecha y hora.', 'error').then(() => { window.location.href = 'citas.php'; });</script>";
        } else {
            // No hay citas programadas en esa hora, inserta la cita en la tabla 'citas'
            $sql_insert_cita = "INSERT INTO citas (nombre_dueno, nombre_mascota, tipo_mascota, raza, contacto, tipo_cita, motivo, fecha, hora) VALUES ('$nombre', '$nombre_mascota', '$tipo', '$raza', '$contacto', '$cita', '$motivo', '$fecha', '$hora')";
    
            if ($conn->query($sql_insert_cita) === TRUE) {
                echo "<script>swal('Cita solicitada exitosamente!', 'Solicitada por $nombre el $fecha a las $hora, fue almacenada en la base de datos.', 'success').then(() => { window.location.href = '../index.php'; });</script>";
    
            } else {
                echo "Error al almacenar la cita: " . $conn->error;
            }
        }
    } else {
        // No hay disponibilidad para la fecha y hora seleccionadas, muestra un mensaje de error
        echo "<script>swal('Error', 'No hay disponibilidad para la fecha y hora seleccionadas.', 'error').then(() => { window.location.href = 'citas.php'; });</script>";
    }
}

// Cierra la conexión a la base de datos
$conn->close();
?>