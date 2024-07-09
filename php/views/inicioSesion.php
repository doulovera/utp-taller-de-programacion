<?php
require_once __DIR__ . '/../../config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    if (empty($email) || empty($password)) {
        $_SESSION['error'] = 'Por favor, complete todos los campos.';
        header('Location: /oechsle-web/login.php');
        exit;
    }

    $stmt = $conn->prepare('SELECT * FROM usuarios WHERE email = ?');
    $stmt->bind_param('s', $email);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if ($password == $user['password']) {
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $user['email'];
            $_SESSION['nombre'] = $user['nombre'];
            $_SESSION['avatar'] = $user['avatar'];
            $_SESSION['productos'] = $user['productos'];
            header('Location: /oechsle-web/php/views/exito.php');
            exit;
        } else {
            $_SESSION['error'] = 'Contraseña Inválida.';
            header('Location: /oechsle-web/login.php');
            exit;
        }
    } else {
        $_SESSION['error'] = 'No se encontró ningún usuario con ese correo electrónico.';
        header('Location: /oechsle-web/login.php');
        exit;
    }

    $stmt->close();
    $conn->close();
} else {
    echo 
    header('Location: /oechsle-web/login.php');
    exit;
}
?>