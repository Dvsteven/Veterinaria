<?php
    session_start();
    $_SESSION['nombre'];
    $_SESSION['apellido'];
    $_SESSION['correo_electronico'];
    $_SESSION['telefono'];
    $_SESSION['direccion'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <title>Profile</title>
</head>
<body>
    <div class="container">
        <div class="main">
            <div class="topbar">
                <a href="">Historial</a>
                <a href="">Compras</a>
                <a href="">Citas</a>
                <a href="mascota.html">Mascota</a>
            </div>
            <div class="row">
                <div class="col-md-4 mt-1">
                    <div class="card text-center sidebar">
                        <div class="card-body">
                            <img src="image/user.jpg" class="rounded-circle" widht="150">
                            <div class="mt-3">
                                <h3>
                                    <p><?php echo $_SESSION['nombre'], ' ', $_SESSION['apellido']; ?></p>
                                </h3>
                                <a href="../index.php">Inicio</a>
                                <a href="../servicios/servicios.php">Servicios</a>
                                <a href="../citas/citas.php">Citas</a>
                                <a href="../mascotas/mascotas_index.php">Productos</a>
                                <a href="">Editar Perfil</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 mt-1">
                    <div class="card mb-3 content">
                        <h1 class="m-3 pt-3">Resumen</h1>
                        <div  class="card-body">
                            <div class="row">
                                <div class="col md-3">
                                    <h5>Nombres</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                 <p><?php echo $_SESSION['nombre'], ' ',$_SESSION['apellido']; ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Correo Electronico</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    <p><?php echo $_SESSION['correo_electronico'];?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Telefono</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    <p><?php echo $_SESSION['telefono'];?></p>
                                </div>
                                <hr>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Domicilio</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    <p><?php echo $_SESSION['direccion'];?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
