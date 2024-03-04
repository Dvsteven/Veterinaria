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
        <section class="pet">
            <h1>Nuestros Servicios de AlegreCola</h1>
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
            <form id="consultaForm" action="procesamiento.php" method="post">
                <label for="nombre">Nombre completo:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="telefono">Teléfono de contacto:</label>
                <input type="tel" id="telefono" name="telefono" required>

                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>

                <label for="mascota">Nombre de la mascota:</label>
                <input type="text" id="mascota" name="mascota" required>

                <label for="tipoMascota">Tipo de mascota:</label>
                <select id="tipoMascota" name="tipoMascota" required>
                    <option value="perro">Perro</option>
                    <option value="gato">Gato</option>
                    <option value="otro">Otro</option>
                </select>

                <label for="edadMascota">Edad de la mascota:</label>
                <input type="number" id="edadMascota" name="edadMascota" required>

                <label for="consulta">Motivo de la consulta:</label>
                <textarea id="consulta" name="consulta" required></textarea>

                <input type="submit" value="Enviar Consulta">
                <button type="button" onclick="cancelForm('form1')">Cancelar</button>
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
            <form id="vacunasForm" action="procesamiento.php" method="post">
                <label for="nombrePropietario">Nombre completo:</label>
                <input type="text" id="nombrePropietario" name="nombrePropietario" required>

                <label for="telefono">Teléfono de contacto:</label>
                <input type="tel" id="telefono" name="telefono" required>

                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>

                <label for="mascota">Nombre de la mascota:</label>
                <input type="text" id="mascota" name="mascota" required>

                <label for="tipoMascota">Tipo de mascota:</label>
                <select id="tipoMascota" name="tipoMascota" required>
                    <option value="perro">Perro</option>
                    <option value="gato">Gato</option>
                    <option value="otro">Otro</option>
                </select>

                <label for="edadMascota">Edad de la mascota:</label>
                <input type="number" id="edadMascota" name="edadMascota" required>

                <label for="vacuna">Nombre de la Vacuna:</label>
                <input type="text" id="vacuna" name="vacuna" required>

                <label for="fechaCita">Fecha preferida para la cita:</label>
                <input type="date" id="fechaCita" name="fechaCita" required>

                <label for="historial">Historial de vacunación previa (si aplica):</label>
                <textarea id="historial" name="historial"></textarea>

                <input type="submit" value="Solicitar Servicio de Vacunas">
                <button type="button" onclick="cancelForm('form2')">Cancelar</button>
            </form>
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
            <form id="cirugiasForm" action="procesamiento.php" method="post">
                <label for="nombre">Nombre completo del propietario:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="telefono">Teléfono de contacto:</label>
                <input type="tel" id="telefono" name="telefono" required>

                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>

                <label for="mascota">Nombre de la mascota:</label>
                <input type="text" id="mascota" name="mascota" required>

                <label for="tipoMascota">Tipo de mascota:</label>
                <select id="tipoMascota" name="tipoMascota" required>
                    <option value="perro">Perro</option>
                    <option value="gato">Gato</option>
                    <option value="otro">Otro</option>
                </select>

                <label for="edad">Edad de la mascota:</label>
                <input type="number" id="edad" name="edad" required>

                <label for="tipoCirugia">Tipo de cirugía:</label>
                <input type="text" id="tipoCirugia" name="tipoCirugia" required>

                <label for="fecha">Fecha preferida para la cirugía:</label>
                <input type="date" id="fecha" name="fecha" required>

                <label for="historial">Historial médico de la mascota:</label>
                <textarea id="historial" name="historial" required></textarea>

                <label for="comentarios">Comentarios adicionales:</label>
                <textarea id="comentarios" name="comentarios"></textarea>

                <input type="submit" value="Solicitar Servicio de Cirugías">
                <button type="button" onclick="cancelForm('form3')">Cancelar</button>
            </form>
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
            <form id="examenForm" action="procesamiento.php" method="post">
                <label for="nombre">Nombre completo del propietario:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="telefono">Teléfono de contacto:</label>
                <input type="tel" id="telefono" name="telefono" required>

                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>

                <label for="mascota">Nombre de la mascota:</label>
                <input type="text" id="mascota" name="mascota" required>

                <label for="tipoMascota">Tipo de mascota:</label>
                <select id="tipoMascota" name="tipoMascota" required>
                    <option value="perro">Perro</option>
                    <option value="gato">Gato</option>
                    <option value="otro">Otro</option>
                </select>

                <label for="edad">Edad de la mascota:</label>
                <input type="number" id="edad" name="edad" required>

                <label for="tipoExamen">Tipo de examen:</label>
                <input type="text" id="tipoExamen" name="tipoExamen" required>

                <label for="fecha">Fecha preferida para el examen:</label>
                <input type="date" id="fecha" name="fecha" required>

                <label for="historial">Historial médico de la mascota:</label>
                <textarea id="historial" name="historial" required></textarea>

                <label for="comentarios">Comentarios adicionales:</label>
                <textarea id="comentarios" name="comentarios"></textarea>

                <input type="submit" value="Solicitar Servicio de Cirugías">
                <button type="button" onclick="cancelForm('form4')">Cancelar</button>
            </form>
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
            <form id="examenForm" action="procesamiento.php" method="post">
                <label for="nombre">Nombre completo del propietario:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="telefono">Teléfono de contacto:</label>
                <input type="tel" id="telefono" name="telefono" required>

                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>

                <label for="mascota">Nombre de la mascota:</label>
                <input type="text" id="mascota" name="mascota" required>

                <label for="tipoMascota">Tipo de mascota:</label>
                <select id="tipoMascota" name="tipoMascota" required>
                    <option value="perro">Perro</option>
                    <option value="gato">Gato</option>
                    <option value="otro">Otro</option>
                </select>

                <label for="edad">Edad de la mascota:</label>
                <input type="number" id="edad" name="edad" required>

                <label for="fechaInicio">Fecha de inicio del servicio:</label>
                <input type="date" id="fechaInicio" name="fechaInicio" required>

                <label for="diasReserva">Días de reserva:</label>
                <input type="number" id="diasReserva" name="diasReserva" required>

                <label for="adicional">Servicios adicionales solicitados:</label>
                <textarea id="adicional" name="adicional"></textarea>

                <label for="comentarios">Comentarios adicionales:</label>
                <textarea id="comentarios" name="comentarios"></textarea>

                <input type="submit" value="Solicitar Servicio de Guardería">
                <button type="button" onclick="cancelForm('form5')">Cancelar</button>
            </form>
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
        <script>
            function cancelForm(formId) {
                var form = document.getElementById(formId);
                form.style.display = 'none';
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
