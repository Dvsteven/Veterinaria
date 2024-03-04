<?php
session_start();

// Verificar si los datos del formulario se enviaron
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar y limpiar los datos del formulario según sea necesario
    $nombre = htmlspecialchars($_POST['nombre']);
    $apellido = htmlspecialchars($_POST['apellido']);
    $correo_electronico = filter_var($_POST['correo_electronico'], FILTER_SANITIZE_EMAIL);
    $telefono = htmlspecialchars($_POST['telefono']);
    $direccion = htmlspecialchars($_POST['direccion']);

    // Actualizar las variables de sesión
    $_SESSION['nombre'] = $nombre;
    $_SESSION['apellido'] = $apellido;
    $_SESSION['correo_electronico'] = $correo_electronico;
    $_SESSION['telefono'] = $telefono;
    $_SESSION['direccion'] = $direccion;

    // Conexión a la base de datos
    $tuServidor = "localhost";
    $tuUsuario = "root";
    $tuClave = "";
    $tuBaseDeDatos = "veterinaria";

    $tuConexion = new mysqli($tuServidor, $tuUsuario, $tuClave, $tuBaseDeDatos);

    // Verificar si la conexión fue exitosa
    if ($tuConexion->connect_error) {
        die("Error en la conexión a la base de datos: " . $tuConexion->connect_error);
    }

    // Construir la consulta SQL con consulta preparada
    $tuConsultaSQL = "UPDATE usuarios SET nombre=?, apellido=?, correo_electronico=?, telefono=?, direccion=? WHERE id=7";

    // Preparar la consulta
    $stmt = $tuConexion->prepare($tuConsultaSQL);

    // Vincular los parámetros
    $stmt->bind_param("sssss", $nombre, $apellido, $correo_electronico, $telefono, $direccion);

    // Ejecutar la consulta
    $stmt->execute();

    // Verificar si hay errores en la consulta
    if ($stmt->error) {
        die("Error en la consulta: " . $stmt->error);
    }

    // Cerrar la conexión a la base de datos
    $tuConexion->close();

    // Redirigir a la página del perfil después de actualizar los datos
    header("Location: alerta.php");
    exit();
} else {
    // Redirigir a la página del perfil si se intenta acceder directamente a este script
    header("Location: index.php");
    exit();
}
?>
<?php
session_start();

// Verificar si los datos del formulario se enviaron
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar y limpiar los datos del formulario según sea necesario
    $nombre = htmlspecialchars($_POST['nombre']);
    $apellido = htmlspecialchars($_POST['apellido']);
    $correo_electronico = filter_var($_POST['correo_electronico'], FILTER_SANITIZE_EMAIL);
    $telefono = htmlspecialchars($_POST['telefono']);
    $direccion = htmlspecialchars($_POST['direccion']);

    // Actualizar las variables de sesión
    $_SESSION['nombre'] = $nombre;
    $_SESSION['apellido'] = $apellido;
    $_SESSION['correo_electronico'] = $correo_electronico;
    $_SESSION['telefono'] = $telefono;
    $_SESSION['direccion'] = $direccion;

    // Conexión a la base de datos
    $tuServidor = "localhost";
    $tuUsuario = "root";
    $tuClave = "";
    $tuBaseDeDatos = "veterinaria";

    $tuConexion = new mysqli($tuServidor, $tuUsuario, $tuClave, $tuBaseDeDatos);

    // Verificar si la conexión fue exitosa
    if ($tuConexion->connect_error) {
        die("Error en la conexión a la base de datos: " . $tuConexion->connect_error);
    }

    // Construir la consulta SQL con consulta preparada
    $tuConsultaSQL = "UPDATE usuarios SET nombre=?, apellido=?, correo_electronico=?, telefono=?, direccion=? WHERE id=7";

    // Preparar la consulta
    $stmt = $tuConexion->prepare($tuConsultaSQL);

    // Vincular los parámetros
    $stmt->bind_param("sssss", $nombre, $apellido, $correo_electronico, $telefono, $direccion);

    // Ejecutar la consulta
    $stmt->execute();

    // Verificar si hay errores en la consulta
    if ($stmt->error) {
        die("Error en la consulta: " . $stmt->error);
    }

    // Cerrar la conexión a la base de datos
    $tuConexion->close();

    // Redirigir a la página del perfil después de actualizar los datos
    header("Location: alerta.php");
    exit();
} else {
    // Redirigir a la página del perfil si se intenta acceder directamente a este script
    header("Location: index.php");
    exit();
}
?>