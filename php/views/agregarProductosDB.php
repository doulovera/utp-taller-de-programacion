<?php
require_once __DIR__ . '/../controllers/productos.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
	$precio = isset($_POST['precio']) ? $_POST['precio'] : null;
	$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : null;
	$marca = isset($_POST['marca']) ? $_POST['marca'] : null;
	$descuento = isset($_POST['descuento']) ? $_POST['descuento'] : '0';
	$imagen = isset($_POST['imagen']) ? $_POST['imagen'] : null;
	$tags = isset($_POST['tags']) ? $_POST['tags'] : null;

	if ($nombre && $precio && $descripcion && $marca !== null && $descuento !== null && $imagen && $tags) {
		$productosController = new ProductosController();
		$result = $productosController->agregarProducto($nombre, $precio, $descripcion, $marca, $descuento, $imagen, $tags);

		if ($result) {
			header('Location: /oechsle-web/exito.html?type=agregar-producto-exito');
		} else {
			$_SESSION['error'] = 'Error al agregar el producto.';
      header('Location: /oechsle-web/form-producto.php');
		}
	} else {
		$_SESSION['error'] = 'Faltan datos.';
		header('Location: /oechsle-web/form-producto.php');
	}
} else {
	header('Location: /oechsle-web/exito.html?type=agregar-producto-error');
}
