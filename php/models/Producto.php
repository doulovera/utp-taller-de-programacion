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

    public function agregarProducto($name, $price, $description, $brand, $discount, $image, $tags) {
        global $conn;
        $slug = strtolower(str_replace(' ', '-', $name));
        $sql = "INSERT INTO productos (name, price, description, brand, discount, image, tags,slug) VALUES ('$name', $price, '$description', '$brand', $discount, '$image', '$tags','$slug')";

        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizarProducto($id, $name, $price, $description, $brand, $discount, $image, $tags) {
        global $conn;
        $sql = "UPDATE productos SET name = '$name', price = $price, description = '$description', brand = '$brand', discount = $discount, image = '$image', tags = '$tags' WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarProducto($id) {
        global $conn;
        $sql = "DELETE FROM productos WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
?>
