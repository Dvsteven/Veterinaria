<?php
    session_start();

    // Verificar si el usuario está logueado
    $usuarioLogueado = isset($_SESSION['nombre']) && isset($_SESSION['apellido']);

    // Si se hace clic en el botón de cerrar sesión, cerrar la sesión y redirigir a la página de inicio
    if (isset($_POST['cerrar_sesion'])) {
        session_destroy();
        header("Location: ../index.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica Veterinaria</title>
    <link rel="stylesheet" href="./stylesheets/estilo.css">
    <link rel="shortcut icon" href="../login/img/pet.png">
</head>
<body>
  <header>
  <nav>
          <ul class="data-container">
            <li class="btn" onclick="navigateTo('../index.php')">Inicio</li>
            <li class="btn" onclick="navigateTo('../mascotas/mascotas_index.php')">Mascotas</li>
            <li class="btn" onclick="navigateTo('servicios.php')">Servicios</li>
            <li class="btn" onclick="navigateToProfile('../profile/index.php')">Perfil</li>
            <?php if ($usuarioLogueado) : ?>
            <form action="../index.php" method="post">
                <button class="cierre-sesion" type="submit" name="cerrar_sesion">Cerrar Sesión</button>
            </form>
            <?php else : ?>
                <li class="btn" onclick="navigateTo('../login_usuarios/login.php')">Ingresar</li>
                <li class="btn" onclick="navigateTo('../login_usuarios/login.php')">Registro</a></li>
            <?php endif; ?>
          </ul>
      </nav>
  </header>
    <!-- Alternativa JavaScript para manejar la barra de navegacion -->
    <script>
      function navigateTo(url) {
          window.location.href = url;
      }
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function navigateToProfile(url) {
            // Verifica si el usuario está iniciado sesión
            <?php if (isset($_SESSION['nombre']) && isset($_SESSION['apellido'])) : ?>
                window.location.href = url; // Si está iniciado sesión, redirige al perfil
            <?php else : ?>
                swal('Inicia sesión primero', 'Debes iniciar sesión para acceder a tu perfil', 'warning'); // Si no está iniciado sesión, muestra el Sweet Alert
            <?php endif; ?>
        }
    </script>
    <main>
        <section class="pet">
            <h1>Nuestros Servicios</h1>
        </section>

        <section class="service" id="consultaMedica">
            <h2>Consulta Medica</h2>
          <p>¿Quieres cuidar la salud de tu mascota con profesionales cualificados y equipados? En nuestra clínica veterinaria te ofrecemos un servicio de consulta médica que incluye:</p>
          <br>
            <p>- Examen físico completo</p>
            <p>- Diagnóstico y tratamiento de enfermedades</p>
            <p>- Prevención de enfermedades</p>
            <p>- Educación y orientación</p>
            <p>Contáctanos y reserva tu cita hoy mismo. Tu mascota te lo agradecerá</p>
          <button onclick="showForm('form1')">Solicitar Servicio</button>
        </section>

        <div id="form1" class="hidden-form">
            <h2>Formulario para Solicitar Servicio 1</h2>
            <!-- Aquí coloca los campos del formulario para el Servicio 1 -->

            <style>
                form {
                    max-width: 600px;
                    margin: auto;
                }
                label {
                    display: block;
                    margin-bottom: 8px;
                }
                input, select {
                    width: 100%;
                    padding: 8px;
                    margin-bottom: 16px;
                    box-sizing: border-box;
                }
                button {
                    background-color: #4caf50;
                    color: white;
                    padding: 10px 15px;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                }
                button:hover {
                    background-color: #45a049;
                }
            </style>

            <form action="procesamiento_forms/procesamiento.php" method="post">
                <label for="nombre_dueño">Nombre del Dueño:</label>
                <input type="text" id="nombre_dueño" name="nombre_dueño" required>
        
                <label for="nombre_mascota">Nombre de la Mascota:</label>
                <input type="text" id="nombre_mascota" name="nombre_mascota" required>
        
                <label for="fecha_cita">Fecha de la Cita:</label>
                <input type="date" id="fecha_cita" name="fecha_cita" required>
        
                <label for="razon_cita">Razón de la Cita:</label>
                <textarea id="razon_cita" name="razon_cita" rows="4" required></textarea>
        
                <button type="submit">Enviar Cita</button>
            </form>
        </div>

        <section class="service" id="vacunas">
            <h2>Servicio de Vacunas</h2>
                <p>Protege a tu mascota de enfermedades graves con vacunas seguras y personalizadas. Te ofrecemos:</p>
                <br>
                  <p>- Asesoramiento profesional</p>
                  <p>- Administración de vacunas</p>
                  <p>- Registro y certificación</p>
                  <p>Contáctanos y reserva tu cita hoy mismo. Tu mascota te lo agradecerá</p>
            <button onclick="showForm('form2')">Solicitar Servicio</button>
        </section>

        <div id="form2" class="hidden-form">
            <h2>Formulario para Solicitar Servicio 2</h2>
            <!-- Aquí coloca los campos del formulario para el Servicio 2 -->
            
            <style>
/* Estilos para el formulario */
            .form-container {
                max-width: 400px;
                margin: 20px auto;
                padding: 30px;
                background-color: #fff;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
            }

            .form-label {
                display: block;
                margin-bottom: 8px;
                font-weight: bold;
            }

            .form-input,
            .form-textarea {
                width: 100%;
                padding: 10px;
                margin-bottom: 16px;
                box-sizing: border-box;
                border: 1px solid #ccc;
                border-radius: 4px;
            }

            .form-textarea {
                resize: vertical; /* Permite redimensionar verticalmente */
            }

            .form-submit {
                background-color: #4CAF50;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
                transition: background-color 0.3s;
            }

            .form-submit:hover {
                background-color: #45a049;
            }

        </style>

            <form action="procesamiento_forms/procesamiento.php" method="post">
                <label for="nombre_dueño">Nombre del Dueño:</label>
                <input type="text" id="nombre_dueño" name="nombre_dueño" required>
        
                <label for="nombre_mascota">Nombre de la Mascota:</label>
                <input type="text" id="nombre_mascota" name="nombre_mascota" required>
        
                <label for="fecha_cita">Fecha de la Cita:</label>
                <input type="date" id="fecha_cita" name="fecha_cita" required>
        
                <label for="razon_cita">Razón de la Cita:</label>
                <textarea id="razon_cita" name="razon_cita" rows="4" required></textarea>
        
                <button type="submit">Enviar Cita</button>
            </form>
        </div>

        </div>

        <section class="service" id="cirugias">
            <h2>Servicio de Cirugias</h2>
            <p> Cuida la salud y la calidad de vida de tu mascota con nuestro servicio de salud y Cirugías. Te ofrecemos:</p>

            <p>- Consulta médica</b>
            <p>- Pruebas diagnósticas</b>
            <p>- Cirugías</b>
            <p>- Cuidados postoperatorios</b>
            <p>- Educación y orientación</b>
            
            <p>Contáctanos y reserva tu cita hoy mismo. Tu mascota te lo agradecerá.</p>
            <button onclick="showForm('form3')">Solicitar Servicio</button>
        </section>

        <div id="form3" class="hidden-form">
            <h2>Formulario para Solicitar Servicio 3</h2>
            <!-- Aquí coloca los campos del formulario para el Servicio 2 -->
            <style>
                form {
                    max-width: 600px;
                    margin: auto;
                }
                label {
                    display: block;
                    margin-bottom: 8px;
                }
                input, select {
                    width: 100%;
                    padding: 8px;
                    margin-bottom: 16px;
                    box-sizing: border-box;
                }
                button {
                    background-color: #4caf50;
                    color: white;
                    padding: 10px 15px;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                }
                button:hover {
                    background-color: #45a049;
                }
            </style>

            <form action="procesamiento_forms/procesamiento.php" method="post">
                <label for="nombre_dueño">Nombre del Dueño:</label>
                <input type="text" id="nombre_dueño" name="nombre_dueño" required>
        
                <label for="nombre_mascota">Nombre de la Mascota:</label>
                <input type="text" id="nombre_mascota" name="nombre_mascota" required>
        
                <label for="fecha_cita">Fecha de la Cita:</label>
                <input type="date" id="fecha_cita" name="fecha_cita" required>
        
                <label for="razon_cita">Razón de la Cita:</label>
                <textarea id="razon_cita" name="razon_cita" rows="4" required></textarea>
        
                <button type="submit">Enviar Cita</button>
            </form>
        </div>

        </div>

        <section class="service" id="examenesLaboratorio">
            <h2>Servicio de Examenes de laboratorio</h2>
            <p>En nuestra clínica veterinaria contamos con un laboratorio equipado para realizar exámenes de diagnóstico y seguimiento de la salud de tus mascotas. Te ofrecemos:</p>

            <p>- Análisis de sangre, orina y heces</p>
            <p>- Radiografías, ecografías y endoscopias</p>
            <p>- Resultados oportunos y de calidad</p>
            <p>- Interpretación y asesoramiento profesional</p>
            
            <p>Contáctanos y reserva tu cita hoy mismo. Tu mascota te lo agradecerá.</p>
            <button onclick="showForm('form4')">Solicitar Servicio</button>
        </section>

        <div id="form4" class="hidden-form">
            <h2>Formulario para Solicitar Servicio 4</h2>
            <!-- Aquí coloca los campos del formulario para el Servicio 2 -->
            <style>
                form {
                    max-width: 600px;
                    margin: auto;
                }
                label {
                    display: block;
                    margin-bottom: 8px;
                }
                input, select {
                    width: 100%;
                    padding: 8px;
                    margin-bottom: 16px;
                    box-sizing: border-box;
                }
                button {
                    background-color: #4caf50;
                    color: white;
                    padding: 10px 15px;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                }
                button:hover {
                    background-color: #45a049;
                }
            </style>

            <form action="procesamiento_forms/procesamiento.php" method="post">
                <label for="nombre_dueño">Nombre del Dueño:</label>
                <input type="text" id="nombre_dueño" name="nombre_dueño" required>
        
                <label for="nombre_mascota">Nombre de la Mascota:</label>
                <input type="text" id="nombre_mascota" name="nombre_mascota" required>
        
                <label for="fecha_cita">Fecha de la Cita:</label>
                <input type="date" id="fecha_cita" name="fecha_cita" required>
        
                <label for="razon_cita">Razón de la Cita:</label>
                <textarea id="razon_cita" name="razon_cita" rows="4" required></textarea>
        
                <button type="submit">Enviar Cita</button>
            </form>
        </div>

        </div>

        <section class="service" id="guarderia">
            <h2>Servicio de Guarderia</h2>
            <p>¡Necesitas dejar a tu mascota en buenas manos mientras trabajas o viajas? En nuestra clínica veterinaria te ofrecemos un servicio de guardería que garantiza el cuidado, la seguridad y la diversión de tu animal. Te ofrecemos:</p>

            <p>- Personal calificado y amante de los animales</p>
            <p>- Instalaciones seguras y funcionales</p>
            <p>- Alimentación sana y balanceada</p>
            <p>- Actividades recreativas y educativas</p>
            <p>- Seguimiento a la salud de tu mascota</p>
            
            <p>Contáctanos y reserva tu cupo hoy mismo. Tu mascota te lo agradecerá.</p>
            <button onclick="showForm('form5')">Solicitar Servicio</button>
        </section>

        <div id="form5" class="hidden-form">
            <h2>Formulario para Solicitar Servicio 5</h2>
            <!-- Aquí coloca los campos del formulario para el Servicio 2 -->
            <style>
                form {
                    max-width: 600px;
                    margin: auto;
                }
                label {
                    display: block;
                    margin-bottom: 8px;
                }
                input, select {
                    width: 100%;
                    padding: 8px;
                    margin-bottom: 16px;
                    box-sizing: border-box;
                }
                button {
                    background-color: #4caf50;
                    color: white;
                    padding: 10px 15px;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                }
                button:hover {
                    background-color: #45a049;
                }
            </style>

            <form action="procesamiento_forms/procesamiento.php" method="post">
                <label for="nombre_dueño">Nombre del Dueño:</label>
                <input type="text" id="nombre_dueño" name="nombre_dueño" required>
        
                <label for="nombre_mascota">Nombre de la Mascota:</label>
                <input type="text" id="nombre_mascota" name="nombre_mascota" required>
        
                <label for="fecha_cita">Fecha de la Cita:</label>
                <input type="date" id="fecha_cita" name="fecha_cita" required>
        
                <label for="razon_cita">Razón de la Cita:</label>
                <textarea id="razon_cita" name="razon_cita" rows="4" required></textarea>
        
                <button type="submit">Enviar Cita</button>
            </form>
        </div>

        </div>

      <section class="citas">
          <h2>Solicita una Cita Médica</h2>
          <p>Garantizamos un servicio de alta calidad para tu mascota. Agenda una cita con nuestros expertos:</p>
          <a href="../citas/citas.html" class="boton-cita">Agenda una cita</a>
      </section>
        <script>
            function showForm(formId) {
                var forms = document.querySelectorAll('.hidden-form');
                forms.forEach(form => {
                    form.style.display = 'none';
                });

                var specificForm = document.getElementById(formId);
                if (specificForm) {
                    specificForm.style.display = 'block';
                }
            }
        </script>
        <button onclick="scrollToTop()" id="scrollToTopBtn" title="Volver Arriba">↑</button>
        <script>
            // Función para desplazarse suavemente hacia arriba
            function scrollToTop() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            }
        
            // Muestra u oculta el botón dependiendo de la posición de desplazamiento
            window.onscroll = function () {
                var btn = document.getElementById("scrollToTopBtn");
        
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    btn.style.display = "block";
                } else {
                    btn.style.display = "none";
                }
            };
        </script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            function navigateToProfile(url) {
                // Verifica si el usuario está iniciado sesión
                <?php if (isset($_SESSION['nombre']) && isset($_SESSION['apellido'])) : ?>
                    window.location.href = url; // Si está iniciado sesión, redirige al perfil
                <?php else : ?>
                    swal('Inicia sesión primero', 'Debes iniciar sesión para acceder a tu perfil', 'warning'); // Si no está iniciado sesión, muestra el Sweet Alert
                <?php endif; ?>
            }
        </script>
    </main>
    <footer>
        <p>&copy; 2023 Clínica Veterinaria</p>
    </footer>
</body>
</html>
