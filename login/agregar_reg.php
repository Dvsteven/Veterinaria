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
    $tipoDocumento = $_POST["Tipo_Documento"];
    $documento = $_POST["Documento"];
    $telefono = $_POST["Telefono"];
    $direccion = $_POST["Direccion"];
    $noMascotas = $_POST["No_Mascotas"];
    $correoElectronico = $_POST["Correo_Electronico"];
    $usuario = $_POST["Usuario"];
    $contrasena = $_POST["Contrasena"];

    $sql = "INSERT INTO usuarios (nombre, apellido, tipo_documento, documento, telefono, direccion, no_mascotas, correo_electronico, usuario, contrasena) 
        VALUES ('$nombre', '$apellido', '$tipoDocumento', '$documento', '$telefono', '$direccion', '$noMascotas', '$correoElectronico', '$usuario', '$contrasena')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<script type=\"text/javascript\">alert(\"Registro Guardado Exitosamente!\");</script>";
            //Permite que se envíe la información y regrese al formulario de Ingreso de Clientes
            echo "<meta http-equiv='refresh' content='0; url=../login/indexlogin.html'>";
            // content es el tiempo de espera
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
        

?>