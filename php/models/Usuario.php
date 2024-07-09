<?php
require_once __DIR__ . '/../../config.php';

class Usuario {
    public function obtenerUsuarios() {
        global $conn;
        $sql = "SELECT * FROM usuarios";
        $result = $conn->query($sql);
        $usuarios = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $usuarios[] = $row;
            }
        }
        $conn->close();
        return $usuarios;
    }

    public function obtenerUsuarioPorId($id) {
        global $conn;
        $sql = "SELECT * FROM usuarios WHERE id = $id";
        $result = $conn->query($sql);
        $usuario = null;
        if ($result->num_rows > 0) {
            $usuario = $result->fetch_assoc();
        }
        $conn->close();
        return $usuario;
    }

    public function agregarUsuario($nombre, $email, $password) {
        global $conn;
        $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nombre, $email, $password);
        $result = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $result;
    }
}
?>