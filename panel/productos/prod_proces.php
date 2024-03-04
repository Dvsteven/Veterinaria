<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>;
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
    $cantidad = $_POST["cantidad"];
    $movimiento = $_POST["movimiento"];

    // Mueve la imagen a la carpeta de imágenes
    $target_dir = "img";
    $target_file = $target_dir . basename($imagen);
    move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);

    // Inserta el producto en la tabla 'productos'
    $sql = "INSERT INTO productos (nombre, descripcion, precio, imagen, cantidad, movimiento) VALUES ('$nombre', '$descripcion', '$precio', '$imagen', '$cantidad', '$movimiento')";

    if ($conn->query($sql) === TRUE) {
        echo "Producto creado exitosamente!";
    } else {
        echo "Error al crear el producto: " . $conn->error;
    }
}

// Cierra la conexión a la base de datos
$conn->close();
?>