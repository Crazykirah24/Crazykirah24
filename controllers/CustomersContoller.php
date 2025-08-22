<?php
require 'models/customers.php';

class Customers {
    public function enregister() {
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Méthode non autorisée']);
            exit;
        }

        $customers = new customersmodel();

        $customers->nom_prenom = $_POST['sai_nom_prenom'] ?? '';
        $customers->email = $_POST['sai_email'] ?? '';
        $customers->adresse = $_POST['sai_adresse'] ?? '';
        $customers->telephone = $_POST['sai_telephone'] ?? '';
        $customers->ville = $_POST['sai_ville'] ?? '';
        $customers->pays = $_POST['sai_pays'] ?? '';

        if (empty($customers->nom_prenom) || empty($customers->email)) {
            echo json_encode(['success' => false, 'message' => 'Nom ou email manquant']);
            exit;
        }

        $result = $customers->Ajoutercustomers();
        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Client ajouté avec succès']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'ajout du client']);
        }
        exit;
    }

    public function index() {
        $productController = new products();
        $categories = [
            'papeterie' => ['cahiers', 'stylos', 'surligneurs'],
            'livres' => ['manuels', 'romans'],
            'electronique' => ['calculatrices', 'casques'],
            'accessoires' => ['sacs', 'organisateurs']
        ];
        include 'views/customers/dashboard-customers.php';
    }
}
?>