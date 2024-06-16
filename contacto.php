<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombres = $conn->real_escape_string($_POST['nombres']);
    $email = $conn->real_escape_string($_POST['email']);
    $telefono = $conn->real_escape_string($_POST['telefono']);    

    if(strlen($telefono) != 9) {
        echo "Error: El número es inválido.";
        exit();
    }

    $mensaje = $conn->real_escape_string($_POST['mensaje']);

    $sql = "INSERT INTO mails (nombres, email, telefono, mensaje) VALUES ('$nombres', '$email', '$telefono', '$mensaje')";

    if ($conn->query($sql) === TRUE) {
        header("Location: /oechsle-web/exito.html?type=email");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
