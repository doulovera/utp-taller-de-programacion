<?php
session_start();
require_once __DIR__ . '/../controllers/productos.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? null;

    if ($id === null) {
        echo json_encode(['success' => false, 'message' => 'Falta el ID del producto.']);
        exit;
    }
    $productosController = new ProductosController();
    $existingProduct = $productosController->obtenerProducto($id);

    $nombre = $_POST['nombre'] ?? $existingProduct['name'];
    $precio = $_POST['precio'] ?? $existingProduct['price'];
    $descripcion = $_POST['descripcion'] ?? $existingProduct['description'];
    $brand = $_POST['brand'] ?? $existingProduct['brand'];
    $discount = $_POST['discount'] ?? $existingProduct['discount'] ?? '0';
    $image = $_POST['image'] ?? $existingProduct['image'];
    $tags = $_POST['tags'] ?? $existingProduct['tags'];

    $productosController = new ProductosController();
    $result = $productosController->actualizarProducto($id, $nombre, $precio, $descripcion, $brand, $discount, $image, $tags);

    if ($result) {
  			header('Location: /oechsle-web/exito.html?type=editar-producto-exito');
    } else {
      $_SESSION['error'] = 'Error al actualizar el producto.' . $result;
      header('Location: /oechsle-web/form-producto.php?id=' . $id);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método no soportado.']);
}
?>
