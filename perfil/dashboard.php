<?php
    session_start();
    $_SESSION['nombre'];
    $_SESSION['apellido'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Dashboard</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./stylesheet/style.css">

    <script src="./js/app.js" defer></script>
</head>
<body>

    <div class="menu-dashboard">
        <!-- TOP MENU -->
        <div class="top-menu">
            <div class="logo">
                <img src="./img/logo.svg" alt="">
                <span><?php echo $_SESSION['nombre'], ' ', $_SESSION['apellido']; ?></span>
            </div>
            <div class="toggle">
                <i class='bx bx-menu'></i>
            </div>
        </div>
        <a href="cerrar_sesion.php" class="logout-btn">Cerrar sesión</a>
        <!-- INPUT SEARCH -->
        <div class="input-search">
            <i class='bx bx-search'></i>
            <input type="text" class="input" placeholder="Buscar">
        </div>
        <!-- MENU -->
        <div class="menu">
            <div class="enlace">
                <i class="bx bx-grid-alt"></i>
                <span>Dashboard</span>
            </div>

            <div class="enlace">
                <i class="bx bx-grid-alt"></i>
                <span>Info del perfil</span>
            </div>

            <div class="enlace">
                <i class="bx bx-user"></i>
                <span>Usuario</span>
            </div>

            <div class="enlace">
                <i class="bx bx-message-square"></i>
                <span>Citas</span>
            </div>

            <div class="enlace">
                <i class="bx bx-file-blank"></i>
                <span>Archivos</span>
            </div>

            <div class="enlace">
                <i class="bx bx-cart"></i>
                <span>Pedidos</span>
            </div>

            <div class="enlace">
                <i class="bx bx-heart"></i>
                <span>Favoritos</span>
            </div>

            <div class="enlace">
                <i class="bx bx-cog"></i>
                <span>Configuración</span>
            </div>
        </div>
    </div>
    
    <!-- Contenedor principal -->
    <div class="main-container">
        <!-- Sección 1 -->
        <div class="section1">
            <h2>Información de Clientes Registrados</h2>
            <div class="box">
                <!-- Tabla para mostrar la información de usuarios -->
            </div>
        </div>
        <div class="content-section">
        <!-- Sección 2 -->
        <div class="section2">
            <h2>Información de Mascotas</h2>
            <div class="box">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre Dueño</th>
                            <th>Nombre Peludito</th>
                            <th>Edad</th>
                            <th>Tipo de Mascota</th>
                            <th>Raza</th>
                            <th>Contacto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aquí se agregarán las filas con la información de las mascotas -->
                        <?php
                            // Consulta SQL para obtener los datos de las mascotas
                            $sql = "SELECT * FROM mascotas";
                            $result = $conn->query($sql);

                            // Verificar si hay resultados y mostrarlos en la tabla
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["nombre_dueno"] . "</td>";
                                    echo "<td>" . $row["nombre_mascota"] . "</td>";
                                    echo "<td>" . $row["edad"] . "</td>";
                                    echo "<td>" . $row["tipo_mascota"] . "</td>";
                                    echo "<td>" . $row["raza"] . "</td>";
                                    echo "<td>" . $row["contacto"] . "</td>";
                                    echo "<td>";
                                    echo "<button class='editar-btn' href='editar_usuario.php(" . $row['id'] . ")'>Editar</button>";
                                    echo "<button class='eliminar-btn' onclick='eliminarRegistro(" . $row['id'] . ")'>Eliminar</button>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6'>No hay mascotas registradas.</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Sección 3 -->
        <div class="section3">
            <h2>Información del Personal</h2>
            <div class="box">
            </div>
        </div>
    </div>
</body>
</html>