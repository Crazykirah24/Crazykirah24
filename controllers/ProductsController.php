<?php 
require 'models/products.php';

class products {
    
    // Méthode pour afficher la liste des produits
    public function index() {
        // Récupérer les produits depuis la base de données
        $productModel = new productsmodel();
        $products = $productModel->getAllProducts();
        
        // Inclure la vue avec les données
        include "views/products/formulaire-products.php";
    }
    
    public function enregister() {
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Méthode non autorisée']);
            exit;
        }

        // Récupérer les données du formulaire
        $nom_produit = $_POST['sai_nom_produit'] ?? '';
        $description = $_POST['sai_description'] ?? '';
        $prix = isset($_POST['sai_prix']) ? (float)$_POST['sai_prix'] : 0;
        $prix_promo = isset($_POST['sai_prix_promo']) ? (float)$_POST['sai_prix_promo'] : 0;
        $stock = isset($_POST['sai_stock']) ? (int)$_POST['sai_stock'] : 0;
        $categorie = $_POST['sai_categorie'] ?? '';
        $marque = $_POST['sai_marque'] ?? '';
        $statut = $_POST['sai_statut'] ?? 'draft';

        // Validation des champs obligatoires
        if (empty($nom_produit) || $prix <= 0 || $stock < 0) {
            echo json_encode(['success' => false, 'message' => 'Champs obligatoires manquants ou invalides']);
            exit;
        }

        // Gestion des fichiers images
        $image_paths = [];
        $upload_dir = 'uploads/products/';
        
        // Créer le dossier s'il n'existe pas
        if (!is_dir($upload_dir)) {
            if (!mkdir($upload_dir, 0755, true)) {
                echo json_encode(['success' => false, 'message' => 'Impossible de créer le dossier d\'upload']);
                exit;
            }
        }

        // Traitement des fichiers uploadés
        foreach ($_FILES as $key => $file) {
            if ($file['error'] === UPLOAD_ERR_OK && strpos($key, 'sai_image_') === 0) {
                // Vérification du type de fichier
                $allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mime_type = finfo_file($finfo, $file['tmp_name']);
                finfo_close($finfo);
                
                if (!in_array($mime_type, $allowed_types)) {
                    echo json_encode(['success' => false, 'message' => 'Type de fichier non autorisé: ' . $file['name']]);
                    exit;
                }
                
                // Générer un nom de fichier unique
                $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                $filename = uniqid('product_') . '_' . time() . '.' . $ext;
                $destination = $upload_dir . $filename;
                
                if (move_uploaded_file($file['tmp_name'], $destination)) {
                    $image_paths[] = $destination;
                } else {
                    echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'upload de l\'image: ' . $file['name']]);
                    exit;
                }
            }
        }

        // Vérifier qu'au moins une image a été uploadée (optionnel)
        if (empty($image_paths)) {
            echo json_encode(['success' => false, 'message' => 'Veuillez ajouter au moins une image']);
            exit;
        }

        // Instanciation du modèle
        $productModel = new productsmodel();
        $productModel->nom_produit = $nom_produit;
        $productModel->description = $description;
        $productModel->prix = $prix;
        $productModel->prix_promo = $prix_promo;
        $productModel->stock = $stock;
        $productModel->categorie = $categorie;
        $productModel->marque = $marque;
        $productModel->status = $statut;
        $productModel->images = $image_paths;

        // Ajout du produit
        try {
            $result = $productModel->Addproducts();
            if ($result) {
                echo json_encode(['success' => true, 'message' => 'Produit ajouté avec succès']);
            } else {
                // Nettoyer les images uploadées en cas d'échec
                foreach ($image_paths as $image_path) {
                    if (file_exists($image_path)) {
                        unlink($image_path);
                    }
                }
                echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'ajout du produit en base de données']);
            }
        } catch (Exception $e) {
            // Nettoyer les images uploadées en cas d'erreur
            foreach ($image_paths as $image_path) {
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            error_log("Erreur dans enregister : " . $e->getMessage());
            echo json_encode(['success' => false, 'message' => 'Erreur serveur : ' . $e->getMessage()]);
        }
        exit;
    }
} 