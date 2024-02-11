<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style.css">
    <title>Formulario de Inicio de sesion y Registro </title>
</head>
<body>

    <div class="container-form login ">
        <div class="information">
            <div class="info-childs">
                <h2>¡¡Bienvenido nuevamente!!</h2>
                <p>Para unirte a nuestra familia por favor Inicia Sesión con tus datos</p>
                <input type="button" value="Registrarse" id="sign-up">
            </div>
        </div>
        <div class="form-information">
            <div class="form-information-childs">
                <h2>Iniciar Sesión</h2>
                <div class="icons">
                </div>
                <p>o Iniciar Sesión con una cuenta</p>

                <form method="post" class="form" action="validacion.php">
                    <label >
                        <i class='bx bx-envelope' ></i>
                        <input type="usuario" name="usuario" placeholder=" Usuario" required>
                    </label>
                    <label>
                        <i class='bx bx-lock-alt' ></i>
                        <input type="password" name="contrasena" placeholder="Contraseña" required>
                    </label>
                    <input type="submit" value="Iniciar Sesión">
                </form>
            </div>
        </div>
    </div>



    <div class="container-form register hide">
        <div class="information">
            <div class="info-childs">
                <h2>Bienvenido</h2>
                <p>Para unirte a nuestra comunidad por favor Inicia Sesión con tus datos</p>
                <input type="button" value="Iniciar Sesión" id="sign-in">
            </div>
        </div>
        <div class="form-information">
            <div class="form-information-childs">
                <h2>Crear una Cuenta</h2>
                <div class="icons">
                </div>
                <form class="form" action="registro.php" method="POST">
                    <label>
                        <i class='bx bx-user' ></i>
                        <input type="text" name="nombre" placeholder="Nombre" required>
                    </label>
                    <label>
                        <i class='bx bx-user' ></i>
                        <input type="text" name="apellido" placeholder="Apellido" required>
                    </label>
                    <label>
                        <i class='bx bx-user' ></i>

                        <select name="tipo_documento" id="tipo_documento" required>
                            <option value="CC" >CC</option>
                            <option value="TI">TI</option>
                        </select>

                    </label>
                    <label>
                        <i class='bx bx-user' ></i>
                        <input type="text" name="documento" placeholder="Documento" required>
                    </label>
                    <label>
                        <i class='bx bx-user' ></i>
                        <input type="text" name="telefono" placeholder="Teléfono" required>
                    </label>
                    <label>
                        <i class='bx bx-user' ></i>
                        <input type="text" name="direccion" placeholder="Dirección" required>
                    </label>
                    <label >
                        <i class='bx bx-envelope' ></i>
                        <input type="email" name="correo_electronico" placeholder="Correo Electrónico" required>
                    </label>
                    <label>
                        <i class='bx bx-user' ></i>
                        <input type="text" name="usuario" placeholder="Usuario" required>
                    </label>
                    <label>
                        <i class='bx bx-lock-alt' ></i>
                        <input type="password" name="contrasena" placeholder="Contraseña" required>
                    </label>
                    <label>
                        <i class='bx bx-lock-alt' ></i>
                        <input type="password" name="confirmar_contrasena" placeholder="Confirmar Contraseña" required>
                    </label>
                    <input type="submit" value="Registrarse">
                </form>
            </div>
        </div>
    </div>
    <script src="script/script.js"></script>
	<div class="switch-button">
        <!-- Checkbox -->
        <input type="checkbox" name="switch-button" id="switch-label" class="switch-button__checkbox">
        <!-- Botón -->
        <label for="switch-label" class="switch-button__label"></label>
    </div>
    <script>
        document.getElementById('switch-label').addEventListener('change', function() {
            if (this.checked) {
                window.location.href = '../login/indexlogin.php?switch=on'; // Redirigir a la página 2 con el switch activado
            } else {
                window.location.href = './login/indexlogin.php'; // Redirigir a la página 2 con el switch desactivado
            }
        });
    </script>
</body>
</html>