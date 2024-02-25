<?php
// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Realiza la conexión a la base de datos (debes proporcionar tus propios datos de conexión)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "veterinaria";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica la conexión a la base de datos
    if ($conn->connect_error) {
        die("Error en la conexión a la base de datos: " . $conn->connect_error);
    }
}
    // Tomando datos del formulario para luego ser enviados a la base de datos
    $nombre = $_POST["Nombre"];
    $apellido = $_POST["Apellido"];
    $correoElectronico = $_POST["correo_electronico"];
    $contrasena = $_POST["Contrasena"];
    $telefono = $_POST["Telefono"];
    $direccion = $_POST["Direccion"];
    $rol = $_POST["rol"];
    $especialidad = $_POST["especialidad"];

    $sql = "INSERT INTO personal (nombre, apellido, email, password, telefono, direccion, rol, especialidad) 
        VALUES ('$nombre', '$apellido', '$correoElectronico', '$contrasena', '$telefono', '$direccion', '$rol','$especialidad')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<script type=\"text/javascript\">alert(\"Registro Guardado Exitosamente!\");</script>";
            //Permite que se envíe la información y regrese al formulario de Ingreso de Clientes
            echo "<meta http-equiv='refresh' content='0; url=../login/indexlogin.php'>";
            // content es el tiempo de espera
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
        

?>