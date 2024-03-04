<?php
    $conn = new mysqli("localhost", "root", "", "veterinaria");
    // // Obtener el ID del usuario a editar
    $id = $_GET['id'];

    // Obtener los datos del usuario de la base de datos
    $sql = "SELECT * FROM usuarios WHERE id=$id";
    $result = $conn->query($sql);

    // Mostrar el formulario de edición
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/stylereg.css">
    <link rel="shortcut icon" href="../../login/img/pet.png">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Editar Usuario</title>
</head>
<body>
    <?php
        // $id = $_SESSION['usuario_id'];
    $conn = new mysqli("localhost", "root", "", "veterinaria");

    // Verificar si se ha enviado el formulario de edición
    if(isset($_POST['editar_usuario'])) {
        // Obtener los datos del formulario
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $tipo_documento = $_POST['tipo_documento'];
        $documento = $_POST['documento'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $correo_electronico = $_POST['correo_electronico'];
        $usuario = $_POST['usuario'];

        // Actualizar los datos del usuario en la base de datos
        $sql = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', tipo_documento='$tipo_documento', documento='$documento', telefono='$telefono', direccion='$direccion', correo_electronico='$correo_electronico', usuario='$usuario' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            // Redirigir a la página principal con un mensaje de éxito
            echo "<script>swal('Edición exitosa!', 'El usuario se ha editado correctamente', 'success').then(() => { window.location.href = '../index.php'; });</script>";
        } else {
            // Mostrar un mensaje de error si no se pudo editar el usuario
            echo "<script>swal('Error!', 'Ocurrió un error al editar el usuario', 'error');</script>";
        }
    }
    ?>
    <div class="align">
        <img class="logo" src="../../login/img/pet.png">
        <div class="card">
            <div class="head">
                <div></div>
                <a id="login" class="selected">Editar Usuario</a>
                <div></div>
            </div>
            <div class="tabs">
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="inputs">
                        <div class="input">
                            <input placeholder="Nombre" type="text" name="nombre" value="<?php echo $row['nombre']; ?>" required>
                        </div>
                        <div class="input">
                            <input placeholder="Apellido" type="text" name="apellido" value="<?php echo $row['apellido']; ?>" required>
                        </div>
                        <div class="input">
                            <input placeholder="Tipo de Documento" type="text" name="tipo_documento" value="<?php echo $row['tipo_documento']; ?>" required>
                        </div>
                        <div class="input">
                            <input placeholder="Documento" type="number" name="documento" value="<?php echo $row['documento']; ?>" required>
                        </div>
                        <div class="input">
                            <input placeholder="Teléfono" type="number" name="telefono" value="<?php echo $row['telefono']; ?>" required>
                        </div>
                        <div class="input">
                            <input placeholder="Dirección" type="text" name="direccion" value="<?php echo $row['direccion']; ?>" required>
                        </div>
                        <div class="input">
                            <input placeholder="Correo Electrónico" type="email" name="correo_electronico" value="<?php echo $row['correo_electronico']; ?>" required>
                        </div>
                        <div class="input">
                            <input placeholder="Usuario" type="text" name="usuario" value="<?php echo $row['usuario']; ?>" required>
                        </div>
                    </div>
                    <button type="submit" name="editar_usuario">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
    } else {
        // Mostrar un mensaje si no se encuentra el usuario
        echo "<script>Swal.fire('Error!', 'No se encontró el usuario', 'error').then(() => { window.location.href = './index.php'; });</script>";
    }
?>