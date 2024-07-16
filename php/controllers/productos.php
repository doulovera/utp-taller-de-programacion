<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../models/Producto.php';

class ProductosController {
  private $producto;

  public function __construct() {
    $this->producto = new Producto();
  }

  public function listarProductos() {
    return $this->producto->obtenerProductos();
  }

  public function obtenerProducto($id) {
    return $this->producto->obtenerProducto($id);
  }

  public function agregarProducto($nombre, $precio, $descripcion, $brand, $discount, $image, $tags) {
    return $this->producto->agregarProducto($nombre, $precio, $descripcion, $brand, $discount, $image, $tags);
  }

  public function actualizarProducto($id, $nombre, $precio, $descripcion, $brand, $discount, $image, $tags) {
    return $this->producto->actualizarProducto($id, $nombre, $precio, $descripcion, $brand, $discount, $image, $tags);
  }

  public function eliminarProducto($id) {
    return $this->producto->eliminarProducto($id);
  }
}

?>

