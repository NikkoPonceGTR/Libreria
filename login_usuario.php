<?php
session_start();

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
$email = $_POST['email'];
$password = $_POST['password'];

// Consultar la base de datos
$sql = "SELECT * FROM USUARIOS WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Verificar la contraseña
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['contraseña'])) {
        // Iniciar sesión
        $_SESSION['usuario_id'] = $row['ID'];
        $_SESSION['nombre'] = $row['nombre'];
        echo "Inicio de sesión exitoso";
    } else {
        echo "Contraseña incorrecta";
    }
} else {
    echo "Correo electrónico no encontrado";
}

$conn->close();
?>
