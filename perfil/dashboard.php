<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/style.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="dashboard-container">
        <!-- Columna izquierda: Compras, Citas, Mascotas, Historial -->
        <div class="sidebar">
            <h2>Mi Perfil</h2>
            <ul>
                <li><a href="#compras">Mis Compras</a></li>
                <li><a href="#citas">Mis Citas</a></li>
                <li><a href="#mascotas">Mis Mascotas</a></li>
                <li><a href="#historial">Historial Médico</a></li>
            </ul>
        </div>
        <!-- Contenido principal: Datos personales, Modificar datos -->
        <div class="main-content">
            <a href="#" onclick="window.history.back();">
                <img src="./img/back.png" alt="Regresar" height="45px">
            </a>
            <div id="datosPersonales">
            <h1>Bienvenido a tu Dashboard</h1>

            </div>
            <!-- Sección de Modificar Datos -->
            <div class="dashboard-card">
                <h2>Datos Personales</h2>

                <!-- Icono y enlace para modificar datos -->
                <a href="pagina_modificacion_datos.html">
                    <img src="../img/mod-perfil.png" alt="Modificar Datos">
                    Modificar Datos
                </a>
            </div>
        </div>
    </div>
    <!-- Carga el script JavaScript -->
    <script src="script.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Hacer la solicitud al servidor para obtener los datos del usuario
            fetch('get_user_data.php')
                .then(response => response.json())
                .then(data => {
                    // Actualizar los elementos HTML con los datos del usuario
                    if (data.error) {
                        // Muestra un mensaje de error si hay un problema
                        document.getElementById('datosPersonales').innerHTML = `<p>${data.error}</p>`;
                    } else {
                        // Muestra los datos del usuario
                        document.getElementById('datosPersonales').innerHTML = `
                            <p>Nombre: ${data.nombre}</p>
                            <p>Apellido: ${data.apellido}</p>
                            <p>Tipo de Documento: ${data.tipo_documento}</p>
                            <!-- Agrega otros campos según sea necesario -->
                        `;
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>
