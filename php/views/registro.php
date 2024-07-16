<?php
require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../controllers/usuarios.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $confirmPassword = $conn->real_escape_string($_POST['confirmPassword']);

    if (empty($nombre) || empty($email) || empty($password) || empty($confirmPassword)) {
        $_SESSION['error'] = 'Por favor, complete todos los campos.';
        header('Location: /oechsle-web/register.php');
        exit;
    }

    if ($password !== $confirmPassword) {
        $_SESSION['error'] = 'Las contraseñas no coinciden.';
        header('Location: /oechsle-web/register.php');
        exit;
    }

    $usuariosController = new UsuariosController();
    $registroExitoso = $usuariosController->registrarUsuario($nombre, $email, $password);

    if ($registroExitoso) {
        $_SESSION['success'] = 'Registro exitoso. Por favor, inicie sesión.';
        header('Location: /oechsle-web/login.php');
        exit;
    } else {
        $_SESSION['error'] = 'Error al registrar el usuario. Es posible que el correo electrónico ya esté en uso.';
        header('Location: /oechsle-web/register.php');
        exit;
    }
}
?>