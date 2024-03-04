<?php
    session_start();
    $_SESSION['nombre'];
    $_SESSION['apellido'];
    
    // Conexión a la base de datos
    $conn = new mysqli("localhost", "root", "", "veterinaria");

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta SQL para obtener información de la tabla usuarios
    $sql = "SELECT * FROM usuarios";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Dashboard</title>
    <!-- BOX ICONS -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- CSS -->
    <link rel="stylesheet" href="./css/estilos.css">
    <!-- JS -->
    <script src="./js/app.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
                <a href="productos/form_prod.html">
                    <i class="bx bx-grid-alt"></i>
                    <span>Productos</span>
                </a>
            </div>
            
            <div class="enlace">
                <a href="productos/list_prod.php">
                    <i class="bx bx-grid-alt"></i>
                    <span>Listar Productos</span>
                </a>
            </div>

            <div class="enlace">
                <a href="indexreg.html">
                    <i class="bx bx-grid-alt"></i>
                    <span>Registro personal</span>
                </a>
            </div>


            <div class="enlace">
                <i class="bx bx-user"></i>
                <span>Informes Citas Generales</span>
            </div>

            <div class="enlace">
                <a href="../index.php">
                    <i class="bx bx-file-blank"></i>
                    <span>Sitio Principal</span>
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
        <!-- Sección 1 -->
        <div class="section1">
            <h2>Información de Clientes Registrados</h2>
            <div class="box">
                <!-- Tabla para mostrar la información de usuarios -->
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Tipo de Documento</th>
                            <th>Documento</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>Correo Electrónico</th>
                            <th>Usuario</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Iterar sobre los resultados de la consulta y mostrar cada fila en la tabla
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["id"] . "</td>";
                                    echo "<td>" . $row["nombre"] . "</td>";
                                    echo "<td>" . $row["apellido"] . "</td>";
                                    echo "<td>" . $row["tipo_documento"] . "</td>";
                                    echo "<td>" . $row["documento"] . "</td>";
                                    echo "<td>" . $row["telefono"] . "</td>";
                                    echo "<td>" . $row["direccion"] . "</td>";
                                    echo "<td>" . $row["correo_electronico"] . "</td>";
                                    echo "<td>" . $row["usuario"] . "</td>";
                                    echo "<td>" . $row["estado"] . "</td>";
                                    echo "<td>";
                                    echo "<button class='editar-btn' onclick='editarRegistro(" . $row['id'] . ")'>Editar</button>";
                                    echo "<button class='eliminar-btn' onclick='eliminarRegistro(" . $row['id'] . ")'>Eliminar</button>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='11'>No hay usuarios registrados</td></tr>";
                            }
                        ?>
                        <script>
                            // Función para eliminar un registro
                            function eliminarRegistro(id) {
                                // Mostrar una alerta de SweetAlert2 para confirmar la eliminación
                                Swal.fire({
                                    title: '¿Estás seguro?',
                                    text: 'Esta acción no se puede revertir',
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonText: 'Sí, eliminar',
                                    cancelButtonText: 'Cancelar'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Si el usuario confirma, enviar una solicitud AJAX para eliminar el registro
                                        $.ajax({
                                            url: 'acciones/eliminar_usuario.php',
                                            type: 'POST',
                                            data: { id: id },
                                            success: function(response) {
                                                // Si la eliminación fue exitosa, mostrar una alerta y recargar la página
                                                Swal.fire({
                                                    title: 'Eliminación exitosa!',
                                                    text: 'El usuario se ha eliminado correctamente',
                                                    icon: 'success'
                                                }).then(() => { window.location.reload(); });
                                            },
                                            error: function() {
                                                // Si hubo un error al eliminar, mostrar una alerta de error
                                                Swal.fire({
                                                    title: 'Error!',
                                                    text: 'Ocurrió un error al eliminar el usuario',
                                                    icon: 'error'
                                                });
                                            }
                                        });
                                    }
                                });
                            }
                            function editarRegistro(id) {
                                window.location.href="acciones/editar_usuario.php?id=" + id;
                            }
                        </script>
                    </tbody>
                </table>
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
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                        <script>
                            // Función para eliminar un registro
                            function eliminarRegistro(id) {
                                // Mostrar una alerta de SweetAlert2 para confirmar la eliminación
                                Swal.fire({
                                    title: '¿Estás seguro?',
                                    text: 'Esta acción no se puede revertir',
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonText: 'Sí, eliminar',
                                    cancelButtonText: 'Cancelar'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Si el usuario confirma, redirige a una página para procesar la eliminación del registro
                                        window.location.href = "eliminar_usuario.php?id=" + id;
                                    }
                                });
                            }
                        </script>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Sección 3 -->
        <div class="section3">
            <h2>Información del Personal</h2>
            <div class="box">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Domicilio</th>
                            <th>Rol</th>
                            <th>Especialidad</th>
                            <th>Deberes</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Consulta SQL para obtener los datos del personal
                            $sql = "SELECT * FROM personal";
                            $result = $conn->query($sql);
                            // Verificar si hay resultados y mostrarlos en la tabla
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["nombre"] . "</td>";
                                    echo "<td>" . $row["apellido"] . "</td>";
                                    echo "<td>" . $row["email"] . "</td>";
                                    echo "<td>" . $row["telefono"] . "</td>";
                                    echo "<td>" . $row["direccion"] . "</td>";
                                    echo "<td>" . $row["rol"] . "</td>";
                                    echo "<td>" . $row["especialidad"] . "</td>";
                                    echo "<td>" . $row["deber"] . "</td>";
                                    echo "<td>";
                                    echo "<button class='editar-btn' href='editar_usuario.php(" . $row['id'] . ")'>Editar</button>";
                                    echo "<button class='eliminar-btn' onclick='eliminarRegistro(" . $row['id'] . ")'>Eliminar</button>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td>No hay personal registrado.</td></tr>";
                            }
                            // Cerrar la conexión a la base de datos
                            $conn->close();
                        ?>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                        <script>
                            // Función para eliminar un registro
                            function eliminarRegistro(id) {
                                // Mostrar una alerta de SweetAlert2 para confirmar la eliminación
                                Swal.fire({
                                    title: '¿Estás seguro?',
                                    text: 'Esta acción no se puede revertir',
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonText: 'Sí, eliminar',
                                    cancelButtonText: 'Cancelar'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Si el usuario confirma, redirige a una página para procesar la eliminación del registro
                                        window.location.href = "eliminar_usuario.php?id=" + id;
                                    }
                                });
                            }
                        </script>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>