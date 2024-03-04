<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</head>
<body>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Incluir archivo de conexión
        require_once "conexion.php";
        // Recibir datos del formulario
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $tipo_documento = $_POST["tipo_documento"];
        $documento = $_POST["documento"];
        $telefono = $_POST["telefono"];
        $direccion = $_POST["direccion"];
        $correo_electronico = $_POST["correo_electronico"];
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];
        $confirmar_contrasena = $_POST["confirmar_contrasena"];

        // Variable para almacenar la alerta
        $alerta = "";

        if($contrasena === $confirmar_contrasena) {
            $sql = "INSERT INTO usuarios (nombre, apellido, tipo_documento, documento, telefono, direccion, correo_electronico, usuario, contrasena) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssssss", $nombre, $apellido, $tipo_documento, $documento, $telefono, $direccion, $correo_electronico, $usuario, $contrasena);

            if($stmt->execute()) {
                // Alerta de éxito
                $alerta = "<script>
                            Swal.fire({
                            title: 'Inicio de sesión exitoso!',
                            text: 'Bienvenido, ahora puedes iniciar sesión',
                            icon: 'success'
                            }).then(() => {
                            window.location.href = '../index.php';
                            });
                        </script>";
            } else {
                // Alerta de error al registrar usuario
                $alerta = "<script>
                            Swal.fire({
                            title: 'Error al registrar el usuario:',
                            text: '" . $conn->error . "',
                            icon: 'error'
                            });
                        </script>";
            }

            $stmt->close();
        } else {
            // Alerta de contraseñas no coinciden
            $alerta = "<script>
                        Swal.fire({
                        title: 'Las contraseñas no coinciden.',
                        icon: 'error'
                        });
                    </script>";
        }

        $conn->close();
    } else {
        // Alerta de acceso incorrecto
        $alerta = "<script>
                    Swal.fire({
                    title: 'Acceso incorrecto.',
                    icon: 'error'
                    }).then(() => {
                    window.location.href = '';
                    });
                </script>";
    }

    echo $alerta; // Imprimir la alerta
?>
</body>
</html>