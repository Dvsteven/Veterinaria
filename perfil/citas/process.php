<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de citas</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <?php
        // Aquí puedes agregar el código para procesar la cita y almacenarla en la base de datos
        $date = $_POST['date'];
        $start_time = $_POST['start-time'];
        $end_time = $_POST['end-time'];

        // Por ejemplo, puedes guardar los datos en una base de datos MySQL
        // Conexión a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "veterinaria";

        // Crear conexión
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Preparar y ejecutar consulta SQL para insertar la cita en la base de datos
        $sql = "INSERT INTO disponibilidad (fecha, hora_inicio, hora_fin) VALUES ('$date', '$start_time', '$end_time')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>swal('Creacion Exitosa!', 'Agenda de Disponibilidad habilitada Exitosamente', 'success').then(() => { window.location.href = '../dashboard.php'; });</script>";
        } else {
            echo "<script>swal('Creacion Fallida!', 'No se pudo crear una Agenda de Disponibilidad', 'error').then(() => { window.location.href = 'citas.html'; });</script>";
        }

        // Cerrar conexión
        $conn->close();
    ?>
</body>
</html>