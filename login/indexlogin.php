<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/stylelogin.css">
	<link rel="shortcut icon" href="img/pet.png">
	<script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
	<title>INICIAR SESION</title>
</head>
<body>
	<div class="align">
		<img class="logo" src="img/pet.png">
		<div class="card">
			<div class="head">
				<div></div>
				<a id="login" class="selected">Iniciar sesion</a>
				<div></div>
			</div>
			<div class="tabs">
				<form action="login.php" method="post">
					<div class="inputs">
						<div class="input">
							<input placeholder="Email" type="text" name="email" required>
							<img src="img/user.png">
						</div>
						<div class="input">
							<input placeholder="Contraseña" type="password" name="contrasena" required>
							<img src="img/pass.png">
						</div>
						<label class="checkbox">
							<input type="checkbox">
							<span>Recordar datos de sesion</span>
						</label>
					</div>
					<button type="submit">Iniciar sesión</button>
				</form>
			</div>
		</div>
	</div>
	<div class="switch-button">
        <!-- Checkbox -->
        <input type="checkbox" name="switch-button" id="switch-label" class="switch-button__checkbox">
        <!-- Botón -->
        <label for="switch-label" class="switch-button__label"></label>
    </div>
    <script>
        // Verificar el parámetro 'switch' en la URL al cargar la página
        window.addEventListener('DOMContentLoaded', function() {
            var urlParams = new URLSearchParams(window.location.search);
            var switchState = urlParams.get('switch');

            if (switchState === 'on') {
                // Si el switch está activado, marcar el checkbox y cambiar el color
                document.getElementById('switch-label').checked = true;
                document.querySelector('.switch-button__label').style.backgroundColor = '#3ed145'; // Cambiar a verde
            }
        });

        // Manejar el cambio de estado del switch
        document.getElementById('switch-label').addEventListener('change', function() {
            if (this.checked) {
                window.location.href = '../login_usuarios/login.php?switch=on'; // Redirigir a la página 1 con el switch activado
            } else {
                window.location.href = '../login_usuarios/login.php'; // Redirigir a la página 1 con el switch desactivado
            }
        });
    </script>
</body>
</html>
