<?php
require_once __DIR__ . '/../controllers/productos.php';

if(isset($_POST['productId'])) {
	$productId = $_POST['productId'];
	$productosController = new ProductosController();
	$result = $productosController->eliminarProducto($productId);
	if($result) {
		echo json_encode(['success' => true, 'message' => 'Producto eliminado exitosamente.']);
	} else {
		echo json_encode(['success' => false, 'message' => 'No se pudo eliminar el producto.']);
	}
} else {
	echo json_encode(['success' => false, 'message' => 'Falta el parámetro productId.']);
}