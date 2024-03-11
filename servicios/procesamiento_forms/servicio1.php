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
        $nombre_dueño = $_POST["nombre_dueño"];
        $nombre_mascota = $_POST["nombre_mascota"];
        $fecha_cita = $_POST["fecha_cita"];
        $razon_cita = $_POST["razon_cita"];

        // Inserta la cita en la tabla 'consultas'
        $sql = "INSERT INTO servicio1 (nombre, telefono, email, mascota, tipoMascota, edadMascota, motivoConsulta) 
                VALUES (?, '', '', ?, '', 0, ?)";
        $stmt = $conn->prepare($sql);

        // Verificar si la consulta preparada fue exitosa
        if ($stmt) {
            $stmt->bind_param("sss", $nombre_dueño, $nombre_mascota, $razon_cita);

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
