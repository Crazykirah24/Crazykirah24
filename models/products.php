<?php 

class productsmodel{
    public $nom_produit;
    public $description;
    public $prix;
    public $prix_promo;
    public $stock;
    public $marque;
    public $status;
    public $images;
    public $categorie;
    // pour la db
    public $con;

    function __construct(){
        //connexion à la base de donnée
        include 'config/database.php';
    } 

    // Méthode pour récupérer tous les produits
    public function getAllProducts() {
        try {
            $sql = "SELECT * FROM produits ORDER BY created_at DESC";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erreur dans getAllProducts : " . $e->getMessage());
            return [];
        }
    }

    // Méthode pour récupérer un produit par ID
    public function getProductById($id) {
        try {
            $sql = "SELECT * FROM produits WHERE id = :id";
            $stmt = $this->con->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erreur dans getProductById : " . $e->getMessage());
            return false;
        }
    }

    // Méthode pour ajouter un produit
    public function Addproducts() {
        try {
            $sql = "INSERT INTO produits (nom_produit, description, prix, prix_promo, stock, categories, marque, status, images, created_at)
                    VALUES (:nom_produit, :description, :prix, :prix_promo, :stock, :categorie, :marque, :status, :images, NOW())";
            $stmt = $this->con->prepare($sql);
            $images_json = json_encode($this->images); // Stocker les chemins d'images en JSON
            
            return $stmt->execute([
                ':nom_produit' => $this->nom_produit,
                ':description' => $this->description,
                ':prix' => $this->prix,
                ':prix_promo' => $this->prix_promo,
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

    // Méthode pour supprimer un produit
    public function deleteProduct($id) {
        try {
            // Récupérer les images avant suppression pour les nettoyer
            $product = $this->getProductById($id);
            if ($product && !empty($product['images'])) {
                $images = json_decode($product['images'], true);
                if (is_array($images)) {
                    foreach ($images as $image_path) {
                        if (file_exists($image_path)) {
                            unlink($image_path);
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

    // Méthode pour mettre à jour un produit
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
                ':prix' => $this->prix,
                ':prix_promo' => $this->prix_promo,
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
}