<?php
session_start();
require 'controllers/Carts.php';

$controller = new Carts();

// Lire le JSON brut envoyé par fetch()
$data = json_decode(file_get_contents('php://input'), true);
$action = $data['action'] ?? '';

if ($action === 'update') {
    $controller->updateQuantity($data);
} elseif ($action === 'remove') {
    $controller->removeItem($data);
} else {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Action invalide']);
}
