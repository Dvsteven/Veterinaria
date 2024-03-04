<?php
    session_start();

    // Verificar si el usuario está logueado
    $usuarioLogueado = isset($_SESSION['nombre']) && isset($_SESSION['apellido']);

    // Si se hace clic en el botón de cerrar sesión, cerrar la sesión y redirigir a la página de inicio
    if (isset($_POST['cerrar_sesion'])) {
        session_destroy();
        header("Location: index.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica Veterinaria AlegreCola</title>
    <link rel="stylesheet" href="./css/estilo.css">
    <link rel="shortcut icon" href="./login/img/pet.png">
</head>
<body> 
  <header>
      <nav>
          <ul class="data-container">
            <li class="btn" onclick="navigateTo('index.php')">Inicio</li>
            <li class="btn" onclick="navigateTo('./mascotas/mascotas_index.php')">Mascotas</li>
            <li class="btn" onclick="navigateTo('./servicios/servicios.php')">Servicios</li>
            <li class="btn" onclick="navigateToProfile('./profile/index.php')">Perfil</li>
            <?php if ($usuarioLogueado) : ?>
            <form action="index.php" method="post">
                <button type="submit" name="cerrar_sesion">Cerrar Sesión</button>
            </form>
            <?php else : ?>
                <li class="btn" onclick="navigateTo('./login_usuarios/login.php')">Ingresar</li>
                <li class="btn" onclick="navigateTo('./login_usuarios/login.php')">Registro</a></li>
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
    <div class="fondo-pet"> </div>
    <!-- <img src="../img/background/huella.png" alt=""> -->
    <main>
        <section class="pet">
            <h1>Bienvenido a la Clínica Veterinaria AlegreCola</h1>
            <p>Donde cuidamos y amamos a tus mascotas.</p>
            <img src="./img/puppy_happy.jpg" alt="Mascota feliz">
          </section>

        <section class="servicios" onmouseover="cambiarFondo(this)" onmouseout="restaurarFondo(this)">
          <h2>Nuestros Servicios</h2>
          <p>Ofrecemos una amplia gama de servicios para cuidar de la salud y el bienestar de tus mascotas:</p>
          
          <div class="servicio">
          <a href="./servicios/servicios.php#consultaMedica">Consulta Medica</a>
          </div>
  
          <div class="servicio">
          <a href="./servicios/servicios.php#vacunas">Vacunas</a>
          </div>
  
          <div class="servicio">
            <a href="./servicios/servicios.php">Cirugías</a>
          </div>
  
          <div class="servicio">
          <a href="./servicios/servicios.php#examenesLaboratorio">Exámenes de Laboratorio</a>
          </div>
  
          <div class="servicio">
          <a href="./servicios/servicios.php#guarderia">Guardería</a>
            </a>
          </div>
      </section>

      <section class="citas">
          <h2>Solicita una Cita Médica</h2>
          <p>Garantizamos un servicio de alta calidad para tu mascota. Agenda una cita con nuestros expertos:</p>
          <a class="boton-cita" onclick="navigateToSchedule('./citas/citas.html')">Agenda una cita</a>
      </section>
      <script>
        function cambiarFondo(elemento) {
            elemento.style.backgroundColor = "#e6f7ff";  // Cambia el fondo al poner el cursor sobre la sección de servicios
        }

        function restaurarFondo(elemento) {
            elemento.style.backgroundColor = "";  // Restaura el fondo al quitar el cursor de la sección de servicios
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
        function navigateToSchedule(url) {
            <?php if (isset($_SESSION['nombre']) && isset($_SESSION['apellido'])) : ?>
                window.location.href = url;
            <?php else : ?>
                swal('Inicia sesión primero', 'Debes iniciar sesión para solicitar citas', 'warning');
            <?php endif; ?>
        }
    </script>
    </main>
    <footer>
        <p>&copy; 2023 Clínica Veterinaria</p>
    </footer>
</body>
</html>