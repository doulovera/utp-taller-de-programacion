<?php

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

