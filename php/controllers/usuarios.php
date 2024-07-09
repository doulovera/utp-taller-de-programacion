<?php
require_once __DIR__ . '/../models/Usuario.php';

class UsuariosController {
	private $usuarioModel;

	public function __construct() {
		$this->usuarioModel = new Usuario();
	}

	public function obtenerUsuarioPorId($id) {
		return $this->usuarioModel->obtenerUsuarioPorId($id);
	}

	public function registrarUsuario($nombre, $email, $password) {
		return $this->usuarioModel->agregarUsuario($nombre, $email, $password);
	}
}