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
}

?>

