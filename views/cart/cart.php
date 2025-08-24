<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Panier - EduSupplies</title>
   <?php include 'config/home.php'; ?>
</head>
<body class="bg-gray-100 font-sans">
    <?php 
    include 'config/menu/customers/header.php'; 
    $base_url = '/projet_web/';
    ?>

    <!-- Breadcrumb -->
    <nav class="bg-white py-3 px-6 border-b text-sm">
        <div class="max-w-7xl mx-auto flex items-center space-x-2">
            <a href="<?= $base_url ?>" class="text-gray-600 hover:text-blue-600">Accueil</a>
            <span class="text-gray-400">/</span>
            <span class="text-gray-900 font-semibold">Mon Panier</span>
        </div>
    </nav>

    <div class="cart-container py-6">
        <div class="max-w-10xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Liste des produits -->
                <div class="w-full lg:w-2/3">
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <div class="bg-blue-600 px-6 py-3">
                            <div class="flex justify-between">
                                <h1 class="text-xl font-bold text-white">🛒 Votre Panier</h1>
                                <span class="bg-white text-blue-600 px-3 py-1 rounded-full text-sm font-semibold" id="cart-item-count">
                                    <?= array_sum(array_column($panier, 'quantite')) ?> article(s)
                                </span>
                            </div>
                        </div>

                        <div id="cart-content" class="p-6 space-y-4">
                            <?php if (!empty($panier)): ?>
                                <?php $sous_total = 0; ?>
                                <div class="space-y-4" id="cart-items">
                                    <?php foreach ($panier as $item):
                                        $images = !empty($item['images']) ? (is_string($item['images']) ? json_decode($item['images'], true) : $item['images']) : [];
                                        $image_url = !empty($images) ? $images[0] : null;
                                        $prix_utile = isset($item['promo_appliquee']) && $item['promo_appliquee'] > 0 ? $item['prix_original'] - $item['promo_appliquee'] : $item['prix_original'];
                                        $total_item = $prix_utile * $item['quantite'];
                                        $sous_total += $total_item;
                                        $economie = ($item['prix_original'] - $prix_utile) * $item['quantite'];
                                    ?>
                                        <div class="product-card border rounded-lg bg-gray-50 hover:bg-gray-100 transition" data-produit-id="<?= htmlspecialchars($item['id_produit']) ?>">
                                            <div class="flex">
                                                <!-- Image -->
                                                <div class="relative flex-shrink-0">
                                                    <?php if ($economie > 0): ?>
                                                        <span class="absolute top-2 left-2 bg-red-500 text-white text-xs px-2 py-1 rounded">-<?= round((($item['prix_original'] - $prix_utile) / $item['prix_original']) * 100) ?>%</span>
                                                    <?php endif; ?>
                                                    <img src="<?= htmlspecialchars($image_url ? $base_url . $image_url : '/projet_web/assets/images/placeholder-product.jpeg') ?>" 
                                                         alt="<?= htmlspecialchars($item['nom'] ?? 'Produit') ?>" 
                                                         class="product-image"
                                                         onerror="this.src='/projet_web/assets/images/placeholder-product.jpeg'">
                                                </div>
                                                
                                                <!-- Infos produit -->
                                                <div class="flex-grow min-w-0 product-info">
                                                    <div>
                                                        <h3 class="text-base font-semibold text-gray-900 mb-2"><?= htmlspecialchars($item['nom'] ?? 'Produit') ?></h3>
                                                        <div class="flex flex-wrap items-center gap-2 mb-1">
                                                            <?php if (isset($item['stock'])): ?>
                                                                <span class="stock-badge px-2 py-0.5 rounded-full text-xs font-medium <?= $item['stock'] > 0 ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' ?>">
                                                                    <?= $item['stock'] > 0 ? '✅ En stock' : '❌ Rupture' ?>
                                                                </span>
                                                            <?php endif; ?>
                                                            <span class="text-xs text-gray-500">Réf: <?= htmlspecialchars($item['id_produit']) ?></span>
                                                        </div>
                                                        <?php if ($economie > 0): ?>
                                                            <p class="text-sm text-green-600 font-medium">🎉 Vous économisez <?= number_format($economie, 0, ',', ' ') ?> FCFA</p>
                                                        <?php endif; ?>
                                                    </div>
                                                    
                                                    <div class="text-left sm:text-right mb-2">
                                                        <?php if ($economie > 0): ?>
                                                            <span class="text-gray-400 line-through text-sm block">
                                                                <?= number_format($item['prix_original'] * $item['quantite'], 0, ',', ' ') ?> FCFA
                                                            </span>
                                                        <?php endif; ?>
                                                        <span class="text-blue-600 font-bold text-lg">
                                                            <?= number_format($total_item, 0, ',', ' ') ?> FCFA
                                                        </span>
                                                    </div>

                                                    <!-- Contrôles -->
                                                    <div class="product-actions">
                                                        <div class="quantity-control">
                                                            <button type="button" class="quantity-btn decrement-btn" data-produit-id="<?= htmlspecialchars($item['id_produit']) ?>" aria-label="Diminuer la quantité">−</button>
                                                            <input type="number" value="<?= $item['quantite'] ?>" min="1" max="<?= $item['stock'] ?>" class="quantity-input" data-produit-id="<?= htmlspecialchars($item['id_produit']) ?>" readonly aria-label="Quantité">
                                                            <button type="button" class="quantity-btn increment-btn" data-produit-id="<?= htmlspecialchars($item['id_produit']) ?>" aria-label="Augmenter la quantité">+</button>
                                                        </div>
                                                        
                                                        <button class="remove-btn" data-produit-id="<?= htmlspecialchars($item['id_produit']) ?>" aria-label="Supprimer l'article">
                                                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                                            </svg>
                                                            Supprimer
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php else: ?>
                                <div class="empty-cart text-center bg-white rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 mx-auto mb-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Votre panier est vide</h3>
                                    <p class="text-gray-600 mb-4">Découvrez nos produits et commencez vos achats dès maintenant</p>
                                    <a href="<?= $base_url ?>" class="checkout-btn inline-flex items-center justify-center max-w-xs">
                                        🛍️ Commencer mes achats
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Résumé -->
                <?php if (!empty($panier)): ?>
                    <div class="w-full lg:w-1/3">
                        <div class="summary-card sticky top-6">
                            <div class="summary-header">
                                💳 Récapitulatif de la commande
                            </div>
                            
                            <div class="p-4 space-y-2">
                                <div class="summary-row">
                                    <span class="text-gray-600">Sous-total (<span id="summary-count"><?= array_sum(array_column($panier, 'quantite')) ?></span> article(s))</span>
                                    <span class="font-semibold" id="summary-subtotal"><?= number_format($sous_total, 0, ',', ' ') ?> FCFA</span>
                                </div>
                                
                                <div class="summary-row">
                                    <span class="text-gray-600">🚚 Livraison</span>
                                    <span class="font-semibold">1 000 FCFA</span>
                                </div>
                                
                                <?php $total_economie = array_sum(array_map(function($item) {
                                    return ($item['prix_original'] - (isset($item['promo_appliquee']) && $item['promo_appliquee'] > 0 ? $item['prix_original'] - $item['promo_appliquee'] : $item['prix_original'])) * $item['quantite'];
                                }, $panier)); ?>
                                
                                <?php if ($total_economie > 0): ?>
                                    <div class="summary-row text-green-600">
                                        <span class="font-semibold">🎉 Économie totale</span>
                                        <span class="font-bold" id="total-savings">-<?= number_format($total_economie, 0, ',', ' ') ?> FCFA</span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="px-4 pb-4">
                                <div class="pt-4 border-t border-gray-200">
                                    <div class="flex justify-between items-center">
                                        <span class="text-lg font-bold text-gray-900">Total TTC</span>
                                        <span class="text-xl font-bold text-blue-600" id="summary-total">
                                            <?= number_format($sous_total + 1000, 0, ',', ' ') ?> FCFA
                                        </span>
                                    </div>
                                </div>
                                
                                <button class="checkout-btn mt-4" id="checkout-btn">
                                    🚀 Passer la commande
                                </button>
                                
                                <div class="mt-4 flex items-center gap-2 bg-green-50 p-3 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-sm font-semibold text-gray-700">Livraison estimée sous 3-5 jours ouvrés</span>
                                </div>
                                
                                <div class="mt-4 pt-4 border-t border-gray-200">
                                    <h4 class="font-bold text-gray-900 text-center">🔒 Moyens de paiement sécurisés</h4>
                                    <div class="flex flex-wrap gap-2 mt-2 justify-center">
                                        <i class="ri-visa-line h-6 text-2xl"></i>
                                        <i class="ri-mastercard-line h-6 text-2xl"></i>
                                        <i class="ri-paypal-line h-6 text-2xl"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Modale de confirmation de suppression -->
    <div id="deleteConfirmModal" class="modal fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
                    <div class="bg-white rounded-lg w-full max-w-md p-6">
                        <div class="text-center mb-6">
                            <div class="w-16 h-16 rounded-full bg-red-100 flex items-center justify-center mx-auto mb-4">
                                <i class="ri-delete-bin-line ri-2x text-red-500"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Confirmer la suppression</h3>
                            <p class="text-gray-600" id="deleteConfirmText">Êtes-vous sûr de vouloir supprimer ce produit ? Cette action est irréversible.</p>
                        </div>
                        <div class="flex justify-center space-x-3">
                            <button id="cancelDeleteBtn" class="px-4 py-2 border border-gray-300 rounded-button text-sm font-medium text-gray-700 whitespace-nowrap">Annuler</button>
                            <button id="confirmDeleteBtn" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-button text-sm font-medium whitespace-nowrap">Supprimer</button>
                        </div>
                    </div>
                </div>

    <?php include 'config/menu/customers/footer.php'; ?>

    
</body>
</html>