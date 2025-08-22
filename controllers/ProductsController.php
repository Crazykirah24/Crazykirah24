<?php
require 'models/products.php';

class products {
    
    // Afficher la liste des produits (pour l'admin)
    public function index() {
        $productModel = new productsmodel();
        $products = $productModel->getAllProducts();
        include "views/products/formulaire-products.php";
    }
    
    // Ajouter un produit
    public function enregister() {
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Méthode non autorisée']);
            exit;
        }

        $nom_produit = $_POST['sai_nom_produit'] ?? '';
        $description = $_POST['sai_description'] ?? '';
        $prix = isset($_POST['sai_prix']) ? (float)$_POST['sai_prix'] : 0;
        $prix_promo = isset($_POST['sai_prix_promo']) ? (float)$_POST['sai_prix_promo'] : 0;
        $stock = isset($_POST['sai_stock']) ? (int)$_POST['sai_stock'] : 0;
        $categorie = $_POST['sai_categorie'] ?? '';
        $marque = $_POST['sai_marque'] ?? '';
        $statut = $_POST['sai_statut'] ?? 'draft';

        if (empty($nom_produit) || $prix <= 0 || $stock < 0) {
            echo json_encode(['success' => false, 'message' => 'Champs obligatoires manquants ou invalides']);
            exit;
        }

        $image_paths = [];
        $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/projet_web/uploads/products/';
        
        if (!is_dir($upload_dir)) {
            if (!mkdir($upload_dir, 0755, true)) {
                echo json_encode(['success' => false, 'message' => 'Impossible de créer le dossier d\'upload']);
                exit;
            }
        }

        foreach ($_FILES as $key => $file) {
            if ($file['error'] === UPLOAD_ERR_OK && strpos($key, 'sai_image_') === 0) {
                $allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mime_type = finfo_file($finfo, $file['tmp_name']);
                finfo_close($finfo);
                
                if (!in_array($mime_type, $allowed_types)) {
                    echo json_encode(['success' => false, 'message' => 'Type de fichier non autorisé: ' . $file['name']]);
                    exit;
                }
                
                $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                $filename = uniqid('product_') . '_' . time() . '.' . $ext;
                $destination = $upload_dir . $filename;
                $relative_path = 'uploads/products/' . $filename;
                
                if (move_uploaded_file($file['tmp_name'], $destination)) {
                    $image_paths[] = $relative_path;
                } else {
                    echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'upload de l\'image: ' . $file['name']]);
                    exit;
                }
            }
        }

        if (empty($image_paths)) {
            echo json_encode(['success' => false, 'message' => 'Veuillez ajouter au moins une image']);
            exit;
        }

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

        try {
            $result = $productModel->Addproducts();
            if ($result) {
                echo json_encode(['success' => true, 'message' => 'Produit ajouté avec succès']);
            } else {
                foreach ($image_paths as $image_path) {
                    if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/projet_web/' . $image_path)) {
                        unlink($_SERVER['DOCUMENT_ROOT'] . '/projet_web/' . $image_path);
                    }
                }
                echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'ajout du produit']);
            }
        } catch (Exception $e) {
            foreach ($image_paths as $image_path) {
                if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/projet_web/' . $image_path)) {
                    unlink($_SERVER['DOCUMENT_ROOT'] . '/projet_web/' . $image_path);
                }
            }
            error_log("Erreur dans en Ascertainable: enregister : " . $e->getMessage());
            echo json_encode(['success' => false, 'message' => 'Erreur serveur : ' . $e->getMessage()]);
        }
        exit;
    }

    // Récupérer un produit par ID
    public function get($id) {
        header('Content-Type: application/json');
        error_log("Appel de get avec ID: $id");
        $productModel = new productsmodel();
        $product = $productModel->getProductById($id);
        if ($product) {
            // Convertir en nombres
            $product['prix'] = (float)$product['prix'];
            $product['prix_promo'] = (float)$product['prix_promo'];
            echo json_encode(['success' => true, 'data' => $product]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Produit non trouvé']);
        }
        exit;
    }

    // Mettre à jour un produit
    public function update($id) {
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Méthode non autorisée']);
            exit;
        }

        $productModel = new productsmodel();
        $existingProduct = $productModel->getProductById($id);
        if (!$existingProduct) {
            echo json_encode(['success' => false, 'message' => 'Produit non trouvé']);
            exit;
        }

        $nom_produit = $_POST['sai_nom_produit'] ?? '';
        $description = $_POST['sai_description'] ?? '';
        $prix = isset($_POST['sai_prix']) ? (float)$_POST['sai_prix'] : 0;
        $prix_promo = isset($_POST['sai_prix_promo']) ? (float)$_POST['sai_prix_promo'] : 0;
        $stock = isset($_POST['sai_stock']) ? (int)$_POST['sai_stock'] : 0;
        $categorie = $_POST['sai_categorie'] ?? '';
        $marque = $_POST['sai_marque'] ?? '';
        $statut = $_POST['sai_statut'] ?? 'draft';

        if (empty($nom_produit) || $prix <= 0 || $stock < 0) {
            echo json_encode(['success' => false, 'message' => 'Champs obligatoires manquants ou invalides']);
            exit;
        }

        $image_paths = json_decode($existingProduct['images'], true) ?: [];
        $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/projet_web/uploads/products/';

        if (!is_dir($upload_dir)) {
            if (!mkdir($upload_dir, 0755, true)) {
                echo json_encode(['success' => false, 'message' => 'Impossible de créer le dossier d\'upload']);
                exit;
            }
        }

        foreach ($_FILES as $key => $file) {
            if ($file['error'] === UPLOAD_ERR_OK && strpos($key, 'sai_image_') === 0) {
                $allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mime_type = finfo_file($finfo, $file['tmp_name']);
                finfo_close($finfo);
                
                if (!in_array($mime_type, $allowed_types)) {
                    echo json_encode(['success' => false, 'message' => 'Type de fichier non autorisé: ' . $file['name']]);
                    exit;
                }
                
                $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                $filename = uniqid('product_') . '_' . time() . '.' . $ext;
                $destination = $upload_dir . $filename;
                $relative_path = 'uploads/products/' . $filename;
                
                if (move_uploaded_file($file['tmp_name'], $destination)) {
                    $image_paths[] = $relative_path;
                } else {
                    echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'upload de l\'image: ' . $file['name']]);
                    exit;
                }
            }
        }

        $productModel->nom_produit = $nom_produit;
        $productModel->description = $description;
        $productModel->prix = $prix;
        $productModel->prix_promo = $prix_promo;
        $productModel->stock = $stock;
        $productModel->categorie = $categorie;
        $productModel->marque = $marque;
        $productModel->status = $statut;
        $productModel->images = $image_paths;

        try {
            $result = $productModel->updateProduct($id);
            if ($result) {
                echo json_encode(['success' => true, 'message' => 'Produit mis à jour avec succès']);
            } else {
                foreach ($image_paths as $image_path) {
                    if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/projet_web/' . $image_path)) {
                        unlink($_SERVER['DOCUMENT_ROOT'] . '/projet_web/' . $image_path);
                    }
                }
                echo json_encode(['success' => false, 'message' => 'Erreur lors de la mise à jour du produit']);
            }
        } catch (Exception $e) {
            foreach ($image_paths as $image_path) {
                if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/projet_web/' . $image_path)) {
                    unlink($_SERVER['DOCUMENT_ROOT'] . '/projet_web/' . $image_path);
                }
            }
            error_log("Erreur dans update : " . $e->getMessage());
            echo json_encode(['success' => false, 'message' => 'Erreur serveur : ' . $e->getMessage()]);
        }
        exit;
    }

    // Supprimer un produit
    public function delete($id) {
        header('Content-Type: application/json');
        error_log("Appel de delete avec ID: $id");
        $productModel = new productsmodel();
        try {
            $result = $productModel->deleteProduct($id);
            if ($result) {
                echo json_encode(['success' => true, 'message' => 'Produit supprimé avec succès']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Erreur lors de la suppression du produit']);
            }
        } catch (Exception $e) {
            error_log("Erreur dans delete : " . $e->getMessage());
            echo json_encode(['success' => false, 'message' => 'Erreur serveur : ' . $e->getMessage()]);
        }
        exit;
    }

    // Récupérer tous les produits (pour les clients)
    public function all() {
        header('Content-Type: application/json');
        $productModel = new productsmodel();
        $products = $productModel->getAllProducts();
        // Convertir prix et prix_promo en nombres
        $products = array_map(function($product) {
            $product['prix'] = (float)$product['prix'];
            $product['prix_promo'] = (float)$product['prix_promo'];
            return $product;
        }, $products);
        echo json_encode(['success' => true, 'data' => $products]);
        exit;
    }

    // Filtrer les produits par catégorie
    public function filter($category) {
        header('Content-Type: application/json');
        error_log("Filtrage par catégorie: $category");
        $productModel = new productsmodel();
        $products = $productModel->getProductsByCategory($category);
        // Convertir prix et prix_promo en nombres
        $products = array_map(function($product) {
            $product['prix'] = (float)$product['prix'];
            $product['prix_promo'] = (float)$product['prix_promo'];
            return $product;
        }, $products);
        echo json_encode(['success' => true, 'data' => $products]);
        exit;
    }

    // Afficher les détails d'un produit
    public function details($id) {
        $productModel = new productsmodel();
        $product = $productModel->getProductById($id);
        if ($product) {
            // Convertir en nombres
            $product['prix'] = (float)$product['prix'];
            $product['prix_promo'] = (float)$product['prix_promo'];
            include 'views/products/product-details.php';
        } else {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Produit non trouvé']);
            exit;
        }
    }
}
?>