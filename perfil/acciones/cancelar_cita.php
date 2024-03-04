<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <?php
        // Conexión a la base de datos
        $conn = new mysqli("localhost", "root", "", "veterinaria");

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Obtener el ID de la cita desde la solicitud AJAX
        $id = $_GET["id"];

        // Consulta SQL para eliminar la cita
        $sql = "UPDATE citas SET estado = 'cancelada' WHERE id = $id";
        // Ejecutar la consulta
        if ($conn->query($sql) === TRUE) {
            echo "<script>swal('Cancelada Exitosamente', 'La cita se ha cancelado correctamente', 'success').then(() => { window.location.href = '../dashboard.php'; });</script>";
        } else {
            echo "<script>swal('ERROR', 'La cita no pudo ser cancelada correctamente', 'error').then(() => { window.location.href = '../dashboard.php'; });</script>";
        }

        // Cerrar la conexión
        $conn->close();
    ?>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <?php
        // Conexión a la base de datos
        $conn = new mysqli("localhost", "root", "", "veterinaria");

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Obtener el ID de la cita desde la solicitud AJAX
        $id = $_GET["id"];

        // Consulta SQL para eliminar la cita
        $sql = "UPDATE citas SET estado = 'cancelada' WHERE id = $id";
        // Ejecutar la consulta
        if ($conn->query($sql) === TRUE) {
            echo "<script>swal('Cancelada Exitosamente', 'La cita se ha cancelado correctamente', 'success').then(() => { window.location.href = '../dashboard.php'; });</script>";
        } else {
            echo "<script>swal('ERROR', 'La cita no pudo ser cancelada correctamente', 'error').then(() => { window.location.href = '../dashboard.php'; });</script>";
        }

        // Cerrar la conexión
        $conn->close();
    ?>
</body>
</html>
