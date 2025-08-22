<?php
require 'controllers/UserController.php';
require 'controllers/CustomersContoller.php';
require 'controllers/ProductsController.php';
require 'controllers/CartsController.php';

// Log pour débogage
error_log("URI reçue : " . $_SERVER['REQUEST_URI']);
error_log("Paramètres GET : " . json_encode($_GET));

if (isset($_GET['c']) && isset($_GET['a'])) {
    $controller = $_GET['c'];
    $action = $_GET['a'];
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    if (class_exists($controller)) {
        $class = new $controller();
        
        if ($action === 'get' && $id !== null && method_exists($class, 'get')) {
            $class->get($id);
        } elseif ($action === 'update' && $id !== null && method_exists($class, 'update')) {
            $class->update($id);
        } elseif ($action === 'delete' && $id !== null && method_exists($class, 'delete')) {
            $class->delete($id);
        } elseif ($action === 'filter' && $id !== null && method_exists($class, 'filter')) {
            $class->filter($id);
        } elseif ($action === 'details' && $id !== null && method_exists($class, 'details')) {
            $class->details($id);
        } elseif (method_exists($class, $action)) {
            $class->$action();
        } else {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => "Action '$action' non trouvée pour le contrôleur '$controller'"]);
            exit;
        }
    } else {
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'message' => "Contrôleur '$controller' non trouvé"]);
        exit;
    }
} else {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Contrôleur ou action non spécifié']);
    exit;
}
?>