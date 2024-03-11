<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo de Citas</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="../login/img/pet.png">
</head>
<body>
<div class="calendar-container">
        <h2>Calendario de Disponibilidad</h2>
        <h4>Horario de atencion General:</h4>
        <h6>6:00 AM - 7:00 PM</h6>
        <table class="calendario">
            <thead>
                <tr>
                    <th>Lun</th>
                    <th>Mar</th>
                    <th>Mié</th>
                    <th>Jue</th>
                    <th>Vie</th>
                    <th>Sáb</th>
                    <th>Dom</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Obtener el primer día del mes actual
                $primerDiaMes = strtotime(date('Y-m-01'));

                // Obtener el último día del mes actual
                $ultimoDiaMes = strtotime(date('Y-m-t'));

                // Conexión a la base de datos
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "veterinaria";
                $conn = new mysqli($servername, $username, $password, $dbname);
                
                // Verificar la conexión
                if ($conn->connect_error) {
                    die("Error de conexión a la base de datos: " . $conn->connect_error);
                }

                // Consulta para obtener las fechas disponibles
                $sql = "SELECT DISTINCT fecha FROM disponibilidad";
                $result = $conn->query($sql);

                // Inicializar la variable para el día actual
                $diaActual = $primerDiaMes;

                // Iterar sobre cada semana del mes
                while ($diaActual <= $ultimoDiaMes) {
                    echo "<tr>";

                    // Iterar sobre los días de la semana (Lun a Dom)
                    for ($i = 1; $i <= 7; $i++) {
                        // Construir la fecha del día actual
                        $fechaActual = date('Y-m-d', $diaActual);

                        // Verificar si la fecha está dentro del mes actual
                        if (date('Y-m', $diaActual) == date('Y-m', $primerDiaMes)) {
                            // Verificar si la fecha actual está disponible
                            $esFechaDisponible = false;
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    if ($row["fecha"] == $fechaActual) {
                                        $esFechaDisponible = true;
                                        break;
                                    }
                                }
                                // Reiniciar el puntero de resultados
                                $result->data_seek(0);
                            }

                            // Agregar la clase 'fecha-disponible' si la fecha está disponible
                            $claseFecha = $esFechaDisponible ? 'fecha-disponible' : '';

                            // Agregar el día actual al calendario
                            echo "<td class='$claseFecha'>" . date('j', $diaActual) . "</td>";

                            // Avanzar al siguiente día
                            $diaActual = strtotime('+1 day', $diaActual);
                        } else {
                            // Agregar una celda vacía para los días fuera del mes
                            echo "<td></td>";
                        }
                    }

                    echo "</tr>";
                }

                // Cerrar la conexión a la base de datos
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <div class="container">
        <h2>Solicitar una Cita</h2>
        <form action="procesar_cita.php" method="post">
            <label for="nombre">Nombre del Dueño:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="nombrep">Nombre del Peludito:</label>
            <input type="text" id="nombrep" name="nombrep" required>

            <label for="tipo">Tipo de Mascota:</label>
            <select id="tipo" name="tipo" required>
                <option value="Perro">Perro</option>
                <option value="Gato">Gato</option>
                <option value="Ave">Ave</option>
                <option value="Roedor">Roedor</option>
                <option value="Otro">Otro</option>
            </select>            

            <label for="raza">Raza:</label>
            <input type="text" id="raza" name="raza" required>

            <label for="contacto">Contacto:</label>
            <input type="text" id="contacto" name="contacto" required>

            <label for="cita">Tipo de Cita:</label>
            <select id="cita" name="cita" required>
                <option value="Primera Vez">Primera Vez</option>
                <option value="Medicina General">Medico General</option>
                <option value="Seguimiento">Seguimiento</option>
                <option value="Procedimiento_g">Procedimiento Quirurgico</option>
                <option value="Medicamentos">Medicamentos</option>
            </select>

            <label for="motivo">Motivo:</label>
            <input type="text" id="motivo" name="motivo" required>

            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" required onchange="obtenerHorasDisponibles()">

            <label for="hora">Hora:</label>
            <select id="hora" name="hora" required>

            </select>

            <script>
            function obtenerHorasDisponibles() {
                var fechaSeleccionada = document.getElementById('fecha').value;

                // Realizar una solicitud al servidor para obtener las horas ocupadas para la fecha seleccionada
                fetch('hora_cita.php?fecha=' + fechaSeleccionada)
                    .then(response => response.json())
                    .then(data => {
                        // Obtener el elemento select de la hora
                        var selectHora = document.getElementById('hora');

                        // Limpiar el select de cualquier opción anterior
                        selectHora.innerHTML = '';

                        // Definir el rango de horas disponibles (de 6:00 AM a 7:00 PM)
                        var horaInicio = 6;
                        var horaFin = 19;

                        // Generar las opciones de hora en el select
                        for (var hora = horaInicio; hora <= horaFin; hora++) {
                            for (var minuto = 0; minuto < 60; minuto += 30) {
                                var horaString = ('0' + hora).slice(-2) + ':' + ('0' + minuto).slice(-2);
                                if (!data.includes(horaString)) {
                                    var option = new Option(horaString, horaString);
                                    selectHora.appendChild(option);
                                }
                            }
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
            </script>
            <button type="submit">Solicitar Cita</button>
            <a href="../index.php">Regresar a la pagina principal</a>
        </form>
    </div>
</body>
</html>