<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "veterinaria";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $precio = $_POST["precio"];
        $imagen = $_FILES["imagen"]["name"];
        $movimiento = $_POST["movimiento"];
        $id = $_POST["id"];

        // Mueve la imagen a la carpeta de imágenes
        $target_dir = "../img";
        $target_file = $target_dir . basename($imagen);
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);

        // Actualiza el producto en la tabla 'productos'
        $sql = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio='$precio', imagen='$imagen', movimiento='$movimiento' WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            echo "Producto actualizado exitosamente!";
        } else {
            echo "Error al actualizar el producto: " . $conn->error;
        }
    }

    // Cierra la conexión a la base de datos
    $conn->close();
?>