<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "LIBRERIA";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];

// Insertar en la base de datos
$sql = "INSERT INTO USUARIOS (nombre, email, contraseña, dirección, teléfono)
VALUES ('$nombre', '$email', '$password', '$direccion', '$telefono')";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo registro creado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
