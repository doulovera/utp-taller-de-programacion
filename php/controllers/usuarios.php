<?php
require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/productos.php';

class UsuariosController {
	private $usuarioModel;
	private $productosController;

	public function __construct() {
		$this->usuarioModel = new Usuario();
		$this->productosController = new ProductosController();
	}

	public function obtenerUsuarioPorId($id) {
		return $this->usuarioModel->obtenerUsuarioPorId($id);
	}

	public function registrarUsuario($nombre, $email, $password) {
		return $this->usuarioModel->agregarUsuario($nombre, $email, $password);
	}

	public function obtenerProductosPorUsuario($id) {
		return $this->usuarioModel->obtenerProductosDelUsuario($id, $this->productosController);
	}

	public function agregarProductosAUsuario($idUsuario, $idProducto) {
		return $this->usuarioModel->agregarProductosAUsuario($idUsuario, $idProducto);
	}

	public function eliminarProductoDeUsuario($idUsuario, $idProducto) {
		return $this->usuarioModel->eliminarProductoAUsuario($idUsuario, $idProducto);
	}
}