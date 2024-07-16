<?php
require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../controllers/productos.php';

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
        return $usuario;
    }

    public function agregarUsuario($nombre, $email, $password) {
        global $conn;
        $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nombre, $email, $password);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function obtenerProductosDelUsuario($id, $productosController) {
        global $conn;
        $sql = "SELECT productos FROM usuarios WHERE id = $id";
        $result = $conn->query($sql);
        $productosDelUsuario = [];

        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $productosIds = json_decode($row['productos']);

            if (is_array($productosIds)) {
                foreach ($productosIds as $productoId) {
                    $producto = $productosController->obtenerProducto($productoId);
                    if ($producto) {
                        $productosDelUsuario[] = $producto;
                    }
                }
            }
        }
        return $productosDelUsuario;
    }

    public function agregarProductosAUsuario($idUsuario, $idProducto) {
        global $conn;
        
        $sqlSelect = "SELECT productos FROM usuarios WHERE id = ?";
        $stmtSelect = $conn->prepare($sqlSelect);
        if (!$stmtSelect) {
            return false;
        }
        $stmtSelect->bind_param("i", $idUsuario);
        $stmtSelect->execute();
        $stmtSelect->bind_result($productosJson);
        $stmtSelect->fetch();
        $stmtSelect->close();
        
        $productos = json_decode($productosJson, true);
        if (!is_array($productos)) {
            $productos = [];
        }
        
        $productos[] = $idProducto;
        
        $productosJsonActualizado = json_encode($productos);
        
        $sqlUpdate = "UPDATE usuarios SET productos = ? WHERE id = ?";
        $stmtUpdate = $conn->prepare($sqlUpdate);
        if (!$stmtUpdate) {
            return false;
        }
        
        $stmtUpdate->bind_param("si", $productosJsonActualizado, $idUsuario);
        $result = $stmtUpdate->execute();
        
        $stmtUpdate->close();
        
        return $result;
    }

    public function eliminarProductoAUsuario($idUsuario, $idProducto) {
        global $conn;
        
        $sqlSelect = "SELECT productos FROM usuarios WHERE id = ?";
        $stmtSelect = $conn->prepare($sqlSelect);
        if (!$stmtSelect) {
            return false;
        }
        $stmtSelect->bind_param("i", $idUsuario);
        $stmtSelect->execute();
        $stmtSelect->bind_result($productosJson);
        $stmtSelect->fetch();
        $stmtSelect->close();
        
        $productos = json_decode($productosJson, true);
        if (!is_array($productos)) {
            $productos = [];
        }
        
        $productos = array_filter($productos, function($productoId) use ($idProducto) {
            return $productoId != $idProducto;
        });

        $productos = array_values($productos);

        $productosJsonActualizado = json_encode($productos);
        
        $sqlUpdate = "UPDATE usuarios SET productos = ? WHERE id = ?";
        $stmtUpdate = $conn->prepare($sqlUpdate);
        if (!$stmtUpdate) {
            return false;
        }
        
        $stmtUpdate->bind_param("si", $productosJsonActualizado, $idUsuario);
        $result = $stmtUpdate->execute();
        
        $stmtUpdate->close();
        
        return $result;
    }

}
?>