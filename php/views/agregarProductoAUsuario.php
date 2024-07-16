<?php
require_once __DIR__ . '/../controllers/usuarios.php';

if(isset($_POST['productId']) && isset($_POST['userId'])) {
    $productId = $_POST['productId'];
    $userId = $_POST['userId'];

    $usuariosController = new UsuariosController();
    $result = $usuariosController->agregarProductosAUsuario($userId, $productId);

    echo json_encode(['success' => $result]);
} else {
    echo json_encode(['success' => false, 'message' => 'Missing parameters.']);
}
?>