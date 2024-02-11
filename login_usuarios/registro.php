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
    $cargo = "CLIENTE";

    if($contrasena === $confirmar_contrasena) {
        $sql = "INSERT INTO usuarios (nombre, apellido, tipo_documento, documento, telefono, direccion, correo_electronico, usuario, contrasena) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssss", $nombre, $apellido, $tipo_documento, $documento, $telefono, $direccion, $correo_electronico, $usuario, $contrasena);

        if($stmt->execute()) {

            echo "¡Registro exitoso!";
        } else {

            echo "Error al registrar el usuario: " . $conn->error;
        }


        $stmt->close();
    } else {

        echo "Las contraseñas no coinciden.";
    }

    $conn->close();
} else {

    echo "Acceso incorrecto.";
}
?>
