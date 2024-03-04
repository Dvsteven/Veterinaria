<?php
session_start();

// Asignar valores a las variables de sesión si están disponibles
$nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : '';
$apellido = isset($_SESSION['apellido']) ? $_SESSION['apellido'] : '';
$correo_electronico = isset($_SESSION['correo_electronico']) ? $_SESSION['correo_electronico'] : '';
$telefono = isset($_SESSION['telefono']) ? $_SESSION['telefono'] : '';
$direccion = isset($_SESSION['direccion']) ? $_SESSION['direccion'] : '';

?>

<link rel="stylesheet" type="text/css" href="css/estilo.css">

<form action="actualizar.php" method="post" class="topbar">
    <h2>Actualizar perfil</h2>
    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
    </div>
    <div class="form-group">
        <label for="apellido">Apellido:</label>
        <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $apellido; ?>">
    </div>
    <div class="form-group">
        <label for="correo_electronico">Correo electrónico:</label>
        <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" value="<?php echo $correo_electronico; ?>">
    </div>
    <div class="form-group">
        <label for="telefono">Teléfono:</label>
        <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo $telefono; ?>">
    </div>
    <div class="form-group">
        <label for="direccion">Dirección:</label>
        <textarea class="form-control" id="direccion" name="direccion" rows="3"><?php echo $direccion; ?></textarea>
    </div>
    <div class="button-container">
        <button type="submit" class="btn btn-primary">Actualizar perfil</button>
    </div>
    <br>
<div class="boton">
    <button href="index.php" class="btn btn-primary">Volver</button>
</div>

</form>
