<?php
// Archivo: validacion.php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "veterinaria";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}


$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    header("Location: index.php");
    exit();
} else {
    // Autenticación fallida
    echo "Usuario o contraseña incorrectos";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>