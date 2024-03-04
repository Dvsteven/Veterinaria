<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style_list.css">
    <title>Admin productos</title>
</head>
<body>
    <h2>Administrar Productos</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Cantidad  </th>
                <th>Movimiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "veterinaria";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Error de conexión a la base de datos: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM productos";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['nombre'] . "</td>";
                    echo "<td>" . $row['descripcion'] . "</td>";
                    echo "<td>" . $row['precio'] . "</td>";
                    echo "<td><img src='img/" . $row['imagen'] . "' alt='Imagen del producto' width='100'></td>";
                    echo "<td>" . $row['cantidad'] . "</td>";
                    echo "<td>" . $row['movimiento'] . "</td>";
                    echo "<td>";
                    echo "<a href='crud/editar_producto.php?id=" . $row['id'] . "'>Editar</a>";
                    echo "<a href='crud/eliminar_producto.php?id=" . $row['id'] . "'>Eliminar</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No hay productos disponibles</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>