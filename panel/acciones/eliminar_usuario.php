<?php
    // Incluir el archivo de conexión a la base de datos
    $conn = new mysqli("localhost", "root", "", "veterinaria");

    // Obtener el ID del usuario a eliminar
    $id = $_GET['id'];

    // Eliminar el usuario de la base de datos
    $sql = "UPDATE usuarios SET estado='eliminado' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        // Si la eliminación fue exitosa, devolver un mensaje de éxito
        echo "<script>swal('Eliminación exitosa!', 'El usuario se ha eliminado correctamente', 'success').then(() => { window.location.href = 'index.php'; });</script>";
    } else {
        // Si hubo un error al eliminar, devolver un mensaje de error
        echo "<script>swal('Error!', 'Ocurrió un error al eliminar el usuario', 'error');</script>";
    }
?>

<?php
    // Incluir el archivo de conexión a la base de datos
    $conn = new mysqli("localhost", "root", "", "veterinaria");

    // Obtener el ID del usuario a eliminar
    $id = $_GET['id'];

    // Eliminar el usuario de la base de datos
    $sql = "UPDATE usuarios SET estado='eliminado' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        // Si la eliminación fue exitosa, devolver un mensaje de éxito
        echo "<script>swal('Eliminación exitosa!', 'El usuario se ha eliminado correctamente', 'success').then(() => { window.location.href = 'index.php'; });</script>";
    } else {
        // Si hubo un error al eliminar, devolver un mensaje de error
        echo "<script>swal('Error!', 'Ocurrió un error al eliminar el usuario', 'error');</script>";
    }
?>
