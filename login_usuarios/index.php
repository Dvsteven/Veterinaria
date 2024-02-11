<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica Veterinaria</title>
    <link rel="stylesheet" href="./css/estilo.css">
    <link rel="shortcut icon" href="../login/img/pet.png">
</head>
<body>
  <header>
      <nav>
          <ul class="data-container">
            <li class="btn" onclick="navigateTo('index.html')">Inicio</li>
            <li class="btn" onclick="navigateTo('./mascotas/mascotas_index.html')">Mascotas</li>
            <li class="btn" onclick="navigateTo('./servicios/servicios.html')">Servicios</li>
            <li class="btn" onclick="navigateTo('./perfil/dashboard.html')">Perfil</li> 
            <li class="btn" onclick="navigateTo('login.php')">Ingresar</li>
            <li class="btn" onclick="navigateTo('login.php')">Registro</li>
          </ul>
      </nav>
  </header>
    <!-- Alternativa JavaScript para manejar la barra de navegacion -->
    <script>
      function navigateTo(url) {
          window.location.href = url;
      }
    </script>
    <main>
        <section class="pet">
            <h1>Bienvenido a la Clínica Veterinaria</h1>
            <p>Donde cuidamos y amamos a tus mascotas.</p>
            <img src="./img/puppy_happy.jpg" alt="Mascota feliz">
          </section>

        <section class="servicios" onmouseover="cambiarFondo(this)" onmouseout="restaurarFondo(this)">
          <h2>Nuestros Servicios</h2>
          <p>Ofrecemos una amplia gama de servicios para cuidar de la salud y el bienestar de tus mascotas:</p>
          
          <div class="servicio">
              <a href="./servicios/consultaMedica.html">Consulta Medica</a>
          </div>
  
          <div class="servicio">
            <a href="./servicios/vacunas.html">Vacunas</a>
          </div>
  
          <div class="servicio">
            <a href="./servicios/cirugias.html">Cirugías</a>
          </div>
  
          <div class="servicio">
            <a href="./servicios/examenes.html">Exámenes de Laboratorio</a>
          </div>
  
          <div class="servicio">
            <a href="./servicios/guarderia.html">Guarderia
            </a>
          </div>
      </section>

      <section class="citas">
          <h2>Solicita una Cita Médica</h2>
          <p>Garantizamos un servicio de alta calidad para tu mascota. Agenda una cita con nuestros expertos:</p>
          <a href="./citas/citas.html" class="boton-cita">Agenda una cita</a>
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
    </main>
    <footer>
        <p>&copy; 2023 Clínica Veterinaria</p>
    </footer>
</body>
</html>
