<?php
// eliminar_producto.php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "veterinaria";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    // Elimina el producto de la tabla 'productos'
    $sql = "DELETE FROM productos WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Producto eliminado exitosamente!";
    } else {
        echo "Error al eliminar el producto: " . $conn->error;
    }
}

// Cierra la conexión a la base de datos
$conn->close();
?>