<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Editar Producto</title>
</head>
<body>
    <h2>Editar Producto</h2>
    <form action="editar.php" method="post" enctype="multipart/form-data">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "veterinaria";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Error de conexión a la base de datos: " . $conn->connect_error);
        }

        $id = $_GET["id"];

        $sql = "SELECT * FROM productos WHERE id='$id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<input type='hidden' id='id' name='id' value='" . $row['id'] . "'>";
                echo "<label for='nombre'>Nombre:</label>";
                echo "<input type='text' id='nombre' name='nombre' value='" . $row['nombre'] . "' required>";

                echo "<label for='descripcion'>Descripción:</label>";
                echo "<textarea id='descripcion' name='descripcion' required>" . $row['descripcion'] . "</textarea>";

                echo "<label for='precio'>Precio:</label>";
                echo "<input type='number' id='precio' name='precio' min='0.00' step='0.01' value='" . $row['precio'] . "' required>";

                echo "<label for='imagen'>Imagen:</label>";
                echo "<input type='file' id='imagen' name='imagen' accept='image/*' required>";

                echo "<label for='movimiento'>Movimiento:</label>";
                echo "<select id='movimiento' name='movimiento' required>";
                echo "<option value='Ingreso'" . ($row['movimiento'] == 'Ingreso' ? ' selected' : '') . ">Ingreso</option>";
                echo "<option value='Salida'" . ($row['movimiento'] == 'Salida' ? ' selected' : '') . ">Salida</option>";
                echo "</select>";

                echo "<button type='submit'>Guardar Cambios</button>";
            }
        } else {
            echo "No se encontró el producto";
        }

        $conn->close();
        ?>
    </form>
</body>
</html>
