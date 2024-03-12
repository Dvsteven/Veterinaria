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

    // Obtener la fecha de la solicitud
    $fecha = $_GET['fecha'];

    // Consulta SQL para obtener las horas ocupadas para la fecha especificada
    $sql = "SELECT DATE_FORMAT(hora, '%H:%i') AS hora_format FROM citas WHERE fecha = '$fecha'";
    $result = $conn->query($sql);

    // Array para almacenar las horas ocupadas
    $horasOcupadas = [];

    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        // Recorrer los resultados y almacenar las horas en el array
        while ($row = $result->fetch_assoc()) {
            $horasOcupadas[] = $row['hora_format'];
        }
    }
    
    // Devolver las horas ocupadas como JSON
    echo json_encode($horasOcupadas);
    // Cerrar la conexión a la base de datos
    $conn->close();
?>