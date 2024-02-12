<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica Veterinaria AlegreCola</title>
    <link rel="stylesheet" href="stylesheets/estilo.css">
    <link rel="shortcut icon" href="../login/img/pet.png">
    <script src="carrito.js"></script>
</head>
<body>
  <header>
      <nav>
          <ul class="data-container">
            <li class="btn" onclick="navigateTo('../index.php')">Inicio</li>
            <li class="btn" onclick="navigateTo('#')">Mascotas</li>
            <li class="btn" onclick="navigateTo('../servicios/servicios.php')">Servicios</li>
            <li class="btn" onclick="navigateTo('../profile/index.php')">Perfil</li> 
            <li class="btn" onclick="navigateTo('../login_usuarios/login.php')">Ingresar</li>
            <li class="btn" onclick="navigateTo('../login_usuarios/login.php')">Registro</a></li>   
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
            <h1>Bienvenido a la Clínica Veterinaria AlegreCola</h1>
            <p>Donde cuidamos y amamos a tus mascotas.</p>
        </section>
        <div class="container">
            <div class="slider">
                <div class="slider-container">
                    <img src="../img/cat.jpg" alt="Mascota 1">
                    <img src="../img/pug-black.jpg" alt="Mascota 2">
                    <img src="../img/Cama-cachorro.jpg" alt="Mascota 3">
                    <span class="prev" onclick="changeSlide(-1)">&#10094;</span>
                    <span class="next" onclick="changeSlide(1)">&#10095;</span>
                </div>
            </div>
    
            <div class="info-column">
                <div class="registration-box">
                    <!-- Contenido del formulario de registro de mascotas -->
                    <h2>Registrar Mascota</h2>
                    <form action="agregar_mascota.php" method="POST">                        <!-- Agrega campos del formulario según tus necesidades -->
                        <label for="nombre">Nombre Dueño:</label>
                        <input type="text" id="nombre" name="nombre" required>
                        <br>
                        <label for="nombre_mascota">Nombre Peludito:</label>
                        <input type="text" id="nombre_mascota" name="nombre_mascota" required>
                        <br>
                        <label for="edad">Edad:</label>
                        <input type="text" id="edad" name="edad" placeholder="Años" required>
                        <br>
                        <label for="tipoMascota">Tipo de Mascota:</label>
                        <select id="tipoMascota" name="tipoMascota">
                          <option value="Perro">Perro</option>
                          <option value="Gato">Gato</option>
                          <option value="Ave">Ave</option>
                          <option value="Otro">Otro</option>
                        </select>
                        <br>
                        <label for="raza">Raza:</label>
                        <input type="text" id="raza" name="raza" required>
                        <br>
                        <label for="contacto">Contacto:</label>
                        <input type="number" id="contacto" name="contacto" required>
                        <br>
                        <button type="submit">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="product-section">
            <h2>Descubre nuestros productos para mascotas de AlegreCola</h2>
            <div class="product-container">
                <div class="product-card" data-product="Producto 1" data-price="25000">
                    <img src="../img/productos/juguete-dental.jpg" alt="Producto 1">
                    <h3>Producto 1</h3>
                    <p>Descripción del Producto 1.</p>
                    <p>Precio: $25000</p>
                    <button class="add-to-cart-button">Añadir al carrito</button>
                </div>

                <div class="product-card" data-product="Producto 2" data-price="25000">
                    <img src="../img/productos/collar-perro.jpg" alt="Producto 1">
                    <h3>Producto 2</h3>
                    <p>Descripción del Producto 2.</p>
                    <p>Precio: $25000</p>
                    <button class="add-to-cart-button">Añadir al carrito</button>
                </div>

                <div class="product-card" data-product="Producto 3" data-price="30000">
                    <img src="../img/productos/cat-food.png" alt="Producto 3" width="78%">
                    <h3>Producto 3</h3>
                    <p>Descripción del Producto 3.</p>
                    <p>Precio: $30000</p>
                    <button class="add-to-cart-button">Añadir al carrito</button>
                </div>

                <div class="product-card" data-product="Producto 4" data-price="30000">
                    <img src="../img/productos/alpiste-aves.jpg" alt="Producto 4">
                    <h3>Producto 4</h3>
                    <p>Descripción del Producto 4.</p>
                    <p>Precio: $30000</p>
                    <button class="add-to-cart-button">Añadir al carrito</button>
                </div>
                <button class="go-to-store-button" onclick="goToStore()">Ir a tienda</button>
                <script>
                    function goToStore() {
                        window.location.href = 'tienda.html';
                    }
                </script>
            </div>
                <!-- Sección del carrito -->
            <div class="cart-section">
                <h3>Carrito de compras</h3>
                <ul id="cart-items"></ul>
                <p>Total: $<span id="cart-total">0.00</span></p>
                <button class="checkout-button" onclick="goToPayment()">Ir al pago</button>
            </div>
            <!-- Página de pago (simulación) -->
            <div id="payment-page" style="display: none;">
                <h2>Sitio de Pago Seguro</h2>
                <form id="payment-form">
                    <label for="card-number">Número de tarjeta:</label>
                    <input type="text" id="card-number" placeholder="XXXX-XXXX-XXXX-XXXX" required>

                    <label for="expiry-date">Fecha de caducidad:</label>
                    <input type="text" id="expiry-date" placeholder="MM/YY" required>

                    <label for="cvv">CVV:</label>
                    <input type="text" id="cvv" placeholder="XXX" required>

                    <button type="button" onclick="completePayment()">Pagar ahora</button>
                    <button class="cancel-button" onclick="cancelPayment()">Cancelar</button>
                </form>
            </div>
            <script>
                function goToPayment() {
                    // Ocultar la sección del carrito
                    document.querySelector('.cart-section').style.display = 'none';
                
                    // Mostrar la página de pago
                    document.getElementById('payment-page').style.display = 'block';
                }
                
                function completePayment() {
                    // Obtener los valores de los campos de pago (simulación)
                    const cardNumber = document.getElementById('card-number').value;
                    const expiryDate = document.getElementById('expiry-date').value;
                    const cvv = document.getElementById('cvv').value;
                
                    // Aquí podrías realizar acciones adicionales, como enviar la información de pago a un servidor.
                    // En esta simulación, simplemente redireccionamos a una página de confirmación.
                    window.location.href = 'confirmacion-pago.html';
                }
                function cancelPayment() {
                    // Ocultar la página de pago y volver a la sección de la tienda
                    document.getElementById('payment-page').style.display = 'none';
                    document.querySelector('.cart-section').style.display = 'block';
                }
            </script>   
        </div>
        <section class="citas">
          <h2>Solicita una Cita Médica</h2>
          <p>Garantizamos un servicio de alta calidad para tu mascota. Agenda una cita con nuestros expertos:</p>
          <a href="../citas/citas.html" class="boton-cita">Agenda una cita</a>
        </section>
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
        <script>
            let currentSlide = 0;
            const totalSlides = document.querySelectorAll('.slider img').length;

            function changeSlide(direction) {
                currentSlide += direction;

                if (currentSlide >= totalSlides) {
                    currentSlide = 0;
                } else if (currentSlide < 0) {
                    currentSlide = totalSlides - 1;
                }

                showSlide(currentSlide);
            }

            function showSlide(index) {
                const slides = document.querySelectorAll('.slider img');
                slides.forEach((slide, i) => {
                    slide.style.display = i === index ? 'block' : 'none';
                });
            }

            function autoSlide() {
                changeSlide(1);
            }

            // Inicia automáticamente el slider después de 2 segundos y luego cambia cada 5 segundos
            setTimeout(autoSlide, 0);
            setInterval(autoSlide, 3500);
        </script>
    </main>
    <footer>
        <p>&copy; 2023 Clínica Veterinaria</p>
    </footer>
</body>
</html>
