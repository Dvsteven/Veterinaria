<?php
// Establece la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "veterinaria";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Obtiene los productos de la base de datos
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);

// Cierra la conexión a la base de datos
$conn->close();

// Si hay productos, muestra la sección de productos
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="product-card" data-product="' . $row["nombre"] . '" data-price="' . $row["precio"] . '">';
        echo '<img src="../panel/productos/img' . $row["imagen"] . '" alt="' . $row["nombre"] . '">';
        echo '<h3>' . $row["nombre"] . '</h3>';
        echo '<p>' . $row["descripcion"] . '.</p>';
        echo '<p>Precio: $' . $row["precio"] . '</p>';
        echo '<button class="add-to-cart-button">Añadir al carrito</button>';
        echo '</div>';
    }
} else {
    echo "No hay productos disponibles.";
}
?> 