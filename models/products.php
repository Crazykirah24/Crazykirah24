<?php
class productsmodel {
    public $nom_produit;
    public $description;
    public $prix;
    public $prix_promo;
    public $stock;
    public $marque;
    public $status;
    public $images;
    public $categorie;
    public $con;

    public function __construct() {
        include 'config/database.php';
    }

    public function getAllProducts() {
        try {
            $sql = "SELECT * FROM produits WHERE status = 'publié' ORDER BY created_at DESC";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // Convertir prix et prix_promo en nombres
            $results = array_map(function($product) {
                $product['prix'] = (float)$product['prix'];
                $product['prix_promo'] = (float)$product['prix_promo'];
                return $product;
            }, $results);
            error_log("getAllProducts - Résultats bruts: " . json_encode($results));
            foreach ($results as $product) {
                if (!isset($product['categorie']) || empty($product['categorie'])) {
                    error_log("Produit avec categorie manquante ou vide: " . json_encode($product));
                }
                if (!is_numeric($product['prix']) || !is_numeric($product['prix_promo'])) {
                    error_log("Produit avec prix ou prix_promo non numérique: " . json_encode($product));
                }
            }
            return $results;
        } catch (PDOException $e) {
            error_log("Erreur dans getAllProducts : " . $e->getMessage());
            return [];
        }
    }

    public function getProductById($id) {
        try {
            $sql = "SELECT * FROM produits WHERE id = :id AND status = 'publié'";
            $stmt = $this->con->prepare($sql);
            $stmt->execute([':id' => $id]);
            $product = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($product) {
                $product['prix'] = (float)$product['prix'];
                $product['prix_promo'] = (float)$product['prix_promo'];
            }
            error_log("getProductById($id): " . json_encode($product));
            return $product;
        } catch (PDOException $e) {
            error_log("Erreur dans getProductById : " . $e->getMessage());
            return false;
        }
    }

    public function Addproducts() {
        try {
            $sql = "INSERT INTO produits (nom_produit, description, prix, prix_promo, stock, categories, marque, status, images, created_at)
                    VALUES (:nom_produit, :description, :prix, :prix_promo, :stock, :categorie, :marque, :status, :images, NOW())";
            $stmt = $this->con->prepare($sql);
            $images_json = json_encode($this->images);
            return $stmt->execute([
                ':nom_produit' => $this->nom_produit,
                ':description' => $this->description,
                ':prix' => (float)$this->prix,
                ':prix_promo' => (float)$this->prix_promo,
                ':stock' => $this->stock,
                ':categorie' => $this->categorie,
                ':marque' => $this->marque,
                ':status' => $this->status,
                ':images' => $images_json
            ]);
        } catch (PDOException $e) {
            error_log("Erreur dans Addproducts : " . $e->getMessage());
            return false;
        }
    }

    public function deleteProduct($id) {
        try {
            $product = $this->getProductById($id);
            if ($product && !empty($product['images'])) {
                $images = json_decode($product['images'], true);
                if (is_array($images)) {
                    foreach ($images as $image_path) {
                        $full_path = $_SERVER['DOCUMENT_ROOT'] . '/projet_web/' . $image_path;
                        if (file_exists($full_path)) {
                            unlink($full_path);
                        }
                    }
                }
            }

            $sql = "DELETE FROM produits WHERE id = :id";
            $stmt = $this->con->prepare($sql);
            return $stmt->execute([':id' => $id]);
        } catch (PDOException $e) {
            error_log("Erreur dans deleteProduct : " . $e->getMessage());
            return false;
        }
    }

    public function updateProduct($id) {
        try {
            $sql = "UPDATE produits SET 
                    nom_produit = :nom_produit,
                    description = :description,
                    prix = :prix,
                    prix_promo = :prix_promo,
                    stock = :stock,
                    categories = :categorie,
                    marque = :marque,
                    status = :status,
                    images = :images
                    WHERE id = :id";
            $stmt = $this->con->prepare($sql);
            $images_json = json_encode($this->images);
            return $stmt->execute([
                ':id' => $id,
                ':nom_produit' => $this->nom_produit,
                ':description' => $this->description,
                ':prix' => (float)$this->prix,
                ':prix_promo' => (float)$this->prix_promo,
                ':stock' => $this->stock,
                ':categorie' => $this->categorie,
                ':marque' => $this->marque,
                ':status' => $this->status,
                ':images' => $images_json
            ]);
        } catch (PDOException $e) {
            error_log("Erreur dans updateProduct : " . $e->getMessage());
            return false;
        }
    }

    public function getProductsByCategory($category) {
    try {
        $sql = "SELECT * FROM produits WHERE categories = :categorie AND status = 'publié'";
        $stmt = $this->con->prepare($sql);
        $stmt->execute([':categorie' => $category]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Convertir prix et prix_promo en nombres
        $results = array_map(function($product) {
            $product['prix'] = (float)$product['prix'];
            $product['prix_promo'] = (float)$product['prix_promo'];
            return $product;
        }, $results);

        return $results;

    } catch (Exception $e) {
        error_log("Erreur dans getProductsByCategory($category): " . $e->getMessage());
        return [];
    }
}

}