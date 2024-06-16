<?php
$servername = "localhost";
$username = "root"; // El usuario por defecto es "root"
$password = ""; // Por defecto, la contraseña es vacía
$dbname = "oechsle-db"; // El nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
