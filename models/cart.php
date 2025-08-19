<?php
class cartsmodel {
    public $id;
    public $user_id;
    public $produit_id;
    public $quantite;
    public $prix_original;
    public $promo_appliquee;
    private $con;

    public function __construct() {
        include 'config/database.php';
        
    }

    /**
     * Sauvegarder ou mettre à jour un produit dans le panier
     */
    public function saveToDb($user_id, $produit_id, $quantite = 1, $prix_original = 0, $promo_appliquee = 0) {
        if (empty($user_id)) {
            throw new Exception("Utilisateur non connecté !");
        }

        try {
            // Vérifier le stock
            $stmtStock = $this->con->prepare("SELECT stock, prix, prix_promo FROM produits WHERE id = :produit_id");
            $stmtStock->execute([':produit_id' => $produit_id]);
            $produit = $stmtStock->fetch(PDO::FETCH_ASSOC);
            if (!$produit || $produit['stock'] < $quantite) {
                throw new Exception("Stock insuffisant pour ce produit");
            }

            // Utiliser le prix de la base de données si non fourni
            if ($prix_original == 0) {
                $prix_original = $produit['prix_promo'] ?? $produit['prix'];
            }

            // Vérifier si le produit existe déjà
            $sqlCheck = "SELECT id, quantite FROM panier WHERE user_id = :user_id AND produit_id = :produit_id";
            $stmtCheck = $this->con->prepare($sqlCheck);
            $stmtCheck->execute([
                ':user_id' => $user_id,
                ':produit_id' => $produit_id
            ]);
            $existing = $stmtCheck->fetch(PDO::FETCH_ASSOC);

            if ($existing) {
                // Mettre à jour la quantité
                $newQty = $existing['quantite'] + $quantite;
                if ($produit['stock'] < $newQty) {
                    throw new Exception("La quantité demandée dépasse le stock disponible");
                }
                $sqlUpdate = "
                    UPDATE panier 
                    SET quantite = :quantite, 
                        prix_original = :prix_original, 
                        promo_appliquee = :promo_appliquee, 
                        updated_at = NOW()
                    WHERE id = :id
                ";
                $stmtUpdate = $this->con->prepare($sqlUpdate);
                $stmtUpdate->execute([
                    ':quantite' => $newQty,
                    ':prix_original' => $prix_original,
                    ':promo_appliquee' => $promo_appliquee,
                    ':id' => $existing['id']
                ]);
            } else {
                // Insérer un nouveau produit
                $sqlInsert = "
                    INSERT INTO panier (user_id, produit_id, quantite, prix_original, promo_appliquee, created_at, updated_at)
                    VALUES (:user_id, :produit_id, :quantite, :prix_original, :promo_appliquee, NOW(), NOW())
                ";
                $stmtInsert = $this->con->prepare($sqlInsert);
                $stmtInsert->execute([
                    ':user_id' => $user_id,
                    ':produit_id' => $produit_id,
                    ':quantite' => $quantite,
                    ':prix_original' => $prix_original,
                    ':promo_appliquee' => $promo_appliquee
                ]);
            }
            return ['success' => true, 'message' => 'Produit ajouté au panier'];
        } catch (PDOException $e) {
            error_log("Erreur dans saveToDb : " . $e->getMessage());
            return ['success' => false, 'message' => "Erreur panier : " . $e->getMessage()];
        }
    }

    /**
     * Charger le panier depuis la base de données
     */
    public function loadFromDb($user_id) {
        try {
            $sql = "
                SELECT 
                    c.id AS panier_id,
                    c.quantite,
                    c.prix_original,
                    c.promo_appliquee,
                    p.id AS id_produit,
                    p.nom_produit AS nom,
                    p.prix AS produit_prix,
                    p.prix_promo,
                    p.description,
                    p.stock,
                    i.url AS image_url
                FROM panier c
                JOIN produits p ON c.produit_id = p.id
                LEFT JOIN images_produit i ON p.id = i.produit_id AND i.ordre = 1
                WHERE c.user_id = :user_id
                ORDER BY c.created_at DESC
            ";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erreur dans loadFromDb : " . $e->getMessage());
            throw new Exception("Erreur lors du chargement du panier : " . $e->getMessage());
        }
    }

    /**
     * Fusionner le panier de la session avec la base de données
     */
   public function fusionnerPaniers($panier_session) {
    if (empty($panier_session)) {
        return true;
    }

    try {
        foreach ($panier_session as $item) {
            if (!isset($item['id_produit']) || empty($item['id_produit'])) {
                continue;
            }

            // Vérifier le stock
            $stmtStock = $this->con->prepare("SELECT stock, prix, prix_promo FROM produits WHERE id = :produit_id");
            $stmtStock->execute([':produit_id' => $item['id_produit']]);
            $produit = $stmtStock->fetch(PDO::FETCH_ASSOC);
            if (!$produit || $produit['stock'] < ($item['quantite'] ?? 1)) {
                continue; // Ignorer si le stock est insuffisant
            }

            $prix_original = $item['prix_original'] ?? ($produit['prix_promo'] ?? $produit['prix']);
            $promo_appliquee = $item['promo_appliquee'] ?? 0;
            $quantite = $item['quantite'] ?? 1;

            // Vérifier si le produit existe déjà dans la base
            $sqlCheck = "SELECT id, quantite FROM panier WHERE user_id = :user_id AND produit_id = :produit_id";
            $stmtCheck = $this->con->prepare($sqlCheck);
            $stmtCheck->execute([
                ':user_id' => $this->user_id,
                ':produit_id' => $item['id_produit']
            ]);
            $existing = $stmtCheck->fetch(PDO::FETCH_ASSOC);

            if ($existing) {
                // Remplacer la quantité existante
                $sqlUpdate = "
                    UPDATE panier 
                    SET quantite = :quantite, 
                        prix_original = :prix_original, 
                        promo_appliquee = :promo_appliquee, 
                        updated_at = NOW()
                    WHERE id = :id
                ";
                $stmtUpdate = $this->con->prepare($sqlUpdate);
                $stmtUpdate->execute([
                    ':quantite' => $quantite,
                    ':prix_original' => $prix_original,
                    ':promo_appliquee' => $promo_appliquee,
                    ':id' => $existing['id']
                ]);
            } else {
                // Insérer un nouveau produit
                $sqlInsert = "
                    INSERT INTO panier (user_id, produit_id, quantite, prix_original, promo_appliquee, created_at, updated_at)
                    VALUES (:user_id, :produit_id, :quantite, :prix_original, :promo_appliquee, NOW(), NOW())
                ";
                $stmtInsert = $this->con->prepare($sqlInsert);
                $stmtInsert->execute([
                    ':user_id' => $this->user_id,
                    ':produit_id' => $item['id_produit'],
                    ':quantite' => $quantite,
                    ':prix_original' => $prix_original,
                    ':promo_appliquee' => $promo_appliquee
                ]);
            }
        }
        return true;
    } catch (Exception $e) {
        error_log("Erreur dans fusionnerPaniers : " . $e->getMessage());
        return false;
    }
}

    /**
     * Calculer les totaux du panier
     */
    public function calculTotaux($panier) {
        $sous_total = 0;
        $cart_count = 0;

        foreach ($panier as $item) {
            if (!isset($item['id_produit']) || empty($item['id_produit'])) {
                continue;
            }
            $prix = $item['promo_appliquee'] > 0 ? ($item['prix_promo'] ?? $item['prix_original']) : $item['prix_original'];
            $sous_total += $prix * $item['quantite'];
            $cart_count += $item['quantite'];
        }

        $total = $sous_total + 1000; // Frais de livraison fixes

        return [
            'sous_total' => number_format($sous_total, 0, ',', ' '),
            'total' => number_format($total, 0, ',', ' '),
            'cart_count' => $cart_count
        ];
    }

    /**
     * Mettre à jour la quantité d'un produit
     */
    public function update($produit_id, $quantite) {
        try {
            // Vérifier le stock
            $stmtStock = $this->con->prepare("SELECT stock FROM produits WHERE id = :produit_id");
            $stmtStock->execute([':produit_id' => $produit_id]);
            $produit = $stmtStock->fetch(PDO::FETCH_ASSOC);
            if (!$produit || $produit['stock'] < $quantite) {
                throw new Exception("La quantité demandée dépasse le stock disponible");
            }

            $stmt = $this->con->prepare("
                UPDATE panier 
                SET quantite = :quantite, updated_at = NOW()
                WHERE user_id = :user_id AND produit_id = :produit_id
            ");
            return $stmt->execute([
                ':quantite' => $quantite,
                ':user_id' => $this->user_id,
                ':produit_id' => $produit_id
            ]);
        } catch (PDOException $e) {
            error_log("Erreur dans update : " . $e->getMessage());
            throw new Exception("Erreur lors de la mise à jour du panier : " . $e->getMessage());
        }
    }

    /**
     * Supprimer un produit du panier
     */
    public function remove($produit_id) {
        if (!$this->user_id) {
            throw new Exception("User ID non défini pour suppression");
        }

        try {
            $stmt = $this->con->prepare("
                DELETE FROM panier 
                WHERE user_id = :user_id AND produit_id = :produit_id
            ");
            return $stmt->execute([
                ':user_id' => $this->user_id,
                ':produit_id' => $produit_id
            ]);
        } catch (PDOException $e) {
            error_log("Erreur dans remove : " . $e->getMessage());
            throw new Exception("Erreur lors de la suppression du produit : " . $e->getMessage());
        }
    }

    /**
     * Vider le panier
     */
    public function clear($user_id) {
        try {
            $stmt = $this->con->prepare("DELETE FROM panier WHERE user_id = :user_id");
            return $stmt->execute([':user_id' => $user_id]);
        } catch (PDOException $e) {
            error_log("Erreur dans clear : " . $e->getMessage());
            throw new Exception("Erreur lors du vidage du panier : " . $e->getMessage());
        }
    }

    /**
     * Compter le nombre total d'articles
     */
    public function countItems($user_id) {
        try {
            $req = $this->con->prepare("
                SELECT COALESCE(SUM(quantite), 0)
                FROM panier
                WHERE user_id = :user_id
            ");
            $req->bindParam(":user_id", $user_id, PDO::PARAM_INT);
            $req->execute();
            return (int) $req->fetchColumn();
        } catch (PDOException $e) {
            error_log("Erreur dans countItems : " . $e->getMessage());
            throw new Exception("Erreur lors du comptage des articles : " . $e->getMessage());
        }
    }
}
?>