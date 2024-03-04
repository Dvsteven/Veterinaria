<?php
$servername = "localhost";
$username = "";
$password = "";
$database = "veterinaria";


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
