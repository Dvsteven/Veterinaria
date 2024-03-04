<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Eliminar Producto</title>
</head>
<body>
    <h2>Eliminar Producto</h2>

    <?php
    // Verificar si se ha enviado una solicitud GET y si se ha especificado el ID del producto
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
        // Obtener el ID del producto desde la solicitud GET
        $id = $_GET["id"];
    ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                swal({
                    title: '¿Estás seguro?',
                    text: '¿Deseas eliminar este producto?',
                    icon: 'warning',
                    buttons: ['Cancelar', 'Eliminar'],
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        // Si el usuario confirma la eliminación, redireccionar a eliminar.php
                        window.location.href = 'eliminar.php?id=<?= $id ?>';
                    } else {
                        // Si el usuario cancela, redireccionar a la página anterior
                        window.history.back();
                    }
                });
            });
        </script>
    <?php
    } else {
        // Si no se ha enviado una solicitud GET o no se ha especificado el ID del producto, mostrar un mensaje de error
        echo "Error: No se ha especificado un ID de producto para eliminar.";
    }
    ?>
</body>
</html>