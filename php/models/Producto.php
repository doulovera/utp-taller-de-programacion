<?php
require_once __DIR__ . '/../../config.php';

class Producto {
    public function obtenerProductos() {
        global $conn;
        $sql = "SELECT * FROM productos";

        $result = $conn->query($sql);

        $products = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
        }

        return $products;
    }

    public function obtenerProducto($id) {
        global $conn;
        $sql = "SELECT * FROM productos WHERE id = $id";

        $result = $conn->query($sql);

        $product = [];
        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
        }

        return $product;
    }
}
?>
