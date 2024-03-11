<?php
    session_start();
    $_SESSION['nombre'];
    $_SESSION['apellido'];

    // Conexión a la base de datos
    $conn = new mysqli("localhost", "root", "", "veterinaria");

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Dashboard</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                <a href="citas/citas.html">
                    <i class="bx bx-calendar"></i>
                    <span>Citas</span>
                </a>
            </div>

            <div class="enlace">
                <i class="bx bx-cog"></i>
                <span>Configuración</span>
            </div>
        </div>
    </div>
    
    <!-- Contenedor principal -->
    <div class="main-container">
        <div class="content-section">
        <!-- Sección 1 -->
        <div class="section1">
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
        <!--Seccion 2-->
        <div class="section2">
            <h2>Citas</h2>
            <div class="box">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre Dueño</th>
                            <th>Nombre Peludito</th>
                            <th>Tipo de Mascota</th>
                            <th>Raza</th>
                            <th>Contacto</th>
                            <th>Tipo Cita</th>
                            <th>Motivo</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Estado cita</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aquí se agregarán las filas con la información de las mascotas -->
                        <?php
                            // Consulta SQL para obtener los datos de las mascotas
                            $sql = "SELECT * FROM citas";
                            $result = $conn->query($sql);

                            // Verificar si hay resultados y mostrarlos en la tabla
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["nombre_dueno"] . "</td>";
                                    echo "<td>" . $row["nombre_mascota"] . "</td>";
                                    echo "<td>" . $row["tipo_mascota"] . "</td>";
                                    echo "<td>" . $row["raza"] . "</td>";
                                    echo "<td>" . $row["contacto"] . "</td>";
                                    echo "<td>" . $row["tipo_cita"] . "</td>";
                                    echo "<td>" . $row["motivo"] . "</td>";
                                    echo "<td>" . $row["fecha"] . "</td>";
                                    echo "<td>" . $row["hora"] . "</td>";
                                    echo "<td>" . $row["estado"] . "</td>";
                                    echo "<td>";
                                    echo "<button class='editar-btn' onclick='aceptarCita(" . $row['id'] . ")'>Aceptar</button>";
                                    echo "<button class='cancelar-btn' onclick='cancelarCita(" . $row['id'] . ")'>Cancelar</button>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='10'>No hay citas agendadas.</td></tr>";
                            }
                        ?>
                        <script>
                            function aceptarCita(id) {
                                // Hacer una solicitud AJAX para aceptar la cita
                                var xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        // Mostrar SweetAlert con la respuesta del servidor
                                        swal({
                                            title: 'Aceptada Exitosamente',
                                            text: 'La cita se ha aceptado correctamente',
                                            icon: 'success'
                                        }).then(() => {
                                            // Redirigir a la página principal
                                            window.location.href = 'dashboard.php';
                                        });
                                    }
                                };
                                xhttp.open('GET', 'acciones/aceptar_cita.php?id=' + id, true);
                                xhttp.send();
                            }

                            function cancelarCita(id) {
                                // Hacer una solicitud AJAX para cancelar la cita
                                var xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        // Mostrar SweetAlert con la respuesta del servidor
                                        swal({
                                            title: 'Cita Cancelada',
                                            text: 'La cita se ha cancelado correctamente',
                                            icon: 'success'
                                        }).then(() => {
                                            // Redirigir a la página principal
                                            window.location.href = 'dashboard.php';
                                        });
                                    }
                                };
                                xhttp.open('GET', 'acciones/cancelar_cita.php?id=' + id, true);
                                xhttp.send();
                            }

                        </script>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>