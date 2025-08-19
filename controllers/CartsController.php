<?php
require 'models/cart.php';

class Carts {
    private $cartModel;

    public function __construct() {
        $this->cartModel = new cartsmodel();
    }

    /**
     * Ajouter un produit au panier
     */
    public function enregister() {
    header('Content-Type: application/json');
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        echo json_encode(['success' => false, 'message' => 'Méthode non autorisée']);
        exit;
    }
    $data = json_decode(file_get_contents('php://input'), true);
    $produit_id = isset($data['produit_id']) ? (int)$data['produit_id'] : null;
    $nom = $data['nom'] ?? '';
    $prix_original = (float)($data['prix_original'] ?? 0);
    $promo_appliquee = (float)($data['promo_appliquee'] ?? 0);
    $quantite = isset($data['quantite']) ? max(1, (int)$data['quantite']) : 1;
    if (!$produit_id || !$nom) {
        echo json_encode(['success' => false, 'message' => 'Données manquantes']);
        exit;
    }
    try {
        error_log("Données reçues dans enregister : " . print_r(compact('produit_id', 'nom', 'quantite', 'prix_original', 'promo_appliquee'), true));
        if (isset($_SESSION['id'])) {
            $this->cartModel->user_id = $_SESSION['id'];
            $result = $this->cartModel->saveToDb($_SESSION['id'], $produit_id, $quantite, $prix_original, $promo_appliquee);
            if (!$result['success']) {
                echo json_encode($result);
                exit;
            }
            $panier_db = $this->cartModel->loadFromDb($_SESSION['id']);
            $_SESSION['panier'] = [];
            foreach ($panier_db as $item) {
                $_SESSION['panier'][$item['id_produit']] = $item;
            }
            $_SESSION['panier_synchronized'] = true; // Marquer comme synchronisé
            $totaux = $this->cartModel->calculTotaux($panier_db);
            $_SESSION['cart_count'] = $totaux['cart_count'];
        } else {
            if (!isset($_SESSION['panier'])) {
                $_SESSION['panier'] = [];
            }
            if (isset($_SESSION['panier'][$produit_id])) {
                $_SESSION['panier'][$produit_id]['quantite'] += $quantite;
            } else {
                $_SESSION['panier'][$produit_id] = [
                    'id_produit' => $produit_id,
                    'nom' => $nom,
                    'quantite' => $quantite,
                    'prix_original' => $prix_original,
                    'promo_appliquee' => $promo_appliquee
                ];
            }
            $totaux = $this->cartModel->calculTotaux(array_values($_SESSION['panier']));
            $_SESSION['cart_count'] = $totaux['cart_count'];
        }
        echo json_encode([
            'success' => true,
            'cart_count' => $_SESSION['cart_count'],
            'sous_total' => $totaux['sous_total'],
            'total' => $totaux['total'],
            'message' => "$nom ajouté au panier"
        ]);
    } catch (Exception $e) {
        error_log("Erreur dans enregister : " . $e->getMessage());
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
    exit;
}

    /**
     * Afficher le panier
     */
    public function afficher() {
    $panier = [];
    $totaux = ['sous_total' => '0', 'total' => '0', 'cart_count' => 0];

    if (isset($_SESSION['id'])) {
        $this->cartModel->user_id = $_SESSION['id'];
        // Fusionner uniquement si nécessaire (par exemple, après connexion)
        if (!empty($_SESSION['panier']) && !isset($_SESSION['panier_synchronized'])) {
            $this->cartModel->fusionnerPaniers($_SESSION['panier']);
            $_SESSION['panier'] = [];
            $_SESSION['panier_synchronized'] = true; // Marquer comme synchronisé
        }
        // Charger le panier depuis la base
        $panier = $this->cartModel->loadFromDb($_SESSION['id']);
        $_SESSION['panier'] = [];
        foreach ($panier as $item) {
            $_SESSION['panier'][$item['id_produit']] = $item;
        }
        $totaux = $this->cartModel->calculTotaux($panier);
        $_SESSION['cart_count'] = $totaux['cart_count'];
    } else {
        $panier = array_values($_SESSION['panier'] ?? []);
        $totaux = $this->cartModel->calculTotaux($panier);
        $_SESSION['cart_count'] = $totaux['cart_count'];
    }

    $sous_total = str_replace(' ', '', $totaux['sous_total']);
    include 'views/cart/cart.php';
}

    /**
     * Mettre à jour la quantité d'un produit
     */
    public function updateQuantity() {
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Méthode non autorisée']);
            exit;
        }

        $data = json_decode(file_get_contents('php://input'), true);
        $produit_id = isset($data['produit_id']) ? (int)$data['produit_id'] : 0;
        $quantite = isset($data['quantite']) ? max(1, (int)$data['quantite']) : 1;

        if (!$produit_id || $quantite <= 0) {
            echo json_encode(['success' => false, 'message' => 'Données invalides']);
            exit;
        }

        try {
            if (isset($_SESSION['id'])) {
                $this->cartModel->user_id = $_SESSION['id'];
                $result = $this->cartModel->update($produit_id, $quantite);
                if ($result) {
                    $_SESSION['panier'][$produit_id]['quantite'] = $quantite;
                    $totaux = $this->cartModel->calculTotaux($this->cartModel->loadFromDb($_SESSION['id']));
                    $_SESSION['cart_count'] = $totaux['cart_count'];
                    echo json_encode([
                        'success' => true,
                        'cart_count' => $_SESSION['cart_count'],
                        'sous_total' => $totaux['sous_total'],
                        'total' => $totaux['total'],
                        'message' => 'Quantité mise à jour'
                    ]);
                } else {
                    throw new Exception('Erreur lors de la mise à jour');
                }
            } else {
                if (isset($_SESSION['panier'][$produit_id])) {
                    $_SESSION['panier'][$produit_id]['quantite'] = $quantite;
                    $totaux = $this->cartModel->calculTotaux(array_values($_SESSION['panier']));
                    $_SESSION['cart_count'] = $totaux['cart_count'];
                    echo json_encode([
                        'success' => true,
                        'cart_count' => $_SESSION['cart_count'],
                        'sous_total' => $totaux['sous_total'],
                        'total' => $totaux['total'],
                        'message' => 'Quantité mise à jour'
                    ]);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Produit non trouvé']);
                }
            }
        } catch (Exception $e) {
            error_log("Erreur dans updateQuantity : " . $e->getMessage());
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
        exit;
    }

    /**
     * Supprimer un produit du panier
     */
    public function removeItem() {
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Méthode non autorisée']);
            exit;
        }

        $data = json_decode(file_get_contents('php://input'), true);
        $produit_id = isset($data['produit_id']) ? (int)$data['produit_id'] : null;

        if (!$produit_id) {
            echo json_encode(['success' => false, 'message' => 'ID produit manquant']);
            exit;
        }

        try {
            if (isset($_SESSION['id'])) {
                $this->cartModel->user_id = $_SESSION['id'];
                $result = $this->cartModel->remove($produit_id);
                if ($result) {
                    unset($_SESSION['panier'][$produit_id]);
                    $totaux = $this->cartModel->calculTotaux($this->cartModel->loadFromDb($_SESSION['id']));
                    $_SESSION['cart_count'] = $totaux['cart_count'];
                    echo json_encode([
                        'success' => true,
                        'cart_count' => $_SESSION['cart_count'],
                        'sous_total' => $totaux['sous_total'],
                        'total' => $totaux['total'],
                        'message' => 'Produit supprimé du panier'
                    ]);
                } else {
                    throw new Exception('Erreur lors de la suppression');
                }
            } else {
                if (isset($_SESSION['panier'][$produit_id])) {
                    unset($_SESSION['panier'][$produit_id]);
                    $totaux = $this->cartModel->calculTotaux(array_values($_SESSION['panier']));
                    $_SESSION['cart_count'] = $totaux['cart_count'];
                    echo json_encode([
                        'success' => true,
                        'cart_count' => $_SESSION['cart_count'],
                        'sous_total' => $totaux['sous_total'],
                        'total' => $totaux['total'],
                        'message' => 'Produit supprimé du panier'
                    ]);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Produit non trouvé']);
                }
            }
        } catch (Exception $e) {
            error_log("Erreur dans removeItem : " . $e->getMessage());
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
        exit;
    }

    /**
     * Vider complètement le panier
     */
    public function clearCart() {
        header('Content-Type: application/json');

        try {
            $_SESSION['panier'] = [];
            $_SESSION['cart_count'] = 0;

            if (isset($_SESSION['id'])) {
                $this->cartModel->user_id = $_SESSION['id'];
                $result = $this->cartModel->clear($_SESSION['id']);
                if (!$result) {
                    throw new Exception('Erreur lors du vidage du panier');
                }
            }

            echo json_encode([
                'success' => true,
                'cart_count' => 0,
                'sous_total' => '0',
                'total' => '0',
                'message' => 'Panier vidé avec succès'
            ]);
        } catch (Exception $e) {
            error_log("Erreur dans clearCart : " . $e->getMessage());
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
        exit;
    }
}
?>