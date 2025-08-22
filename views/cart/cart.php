<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Panier - EduSupplies</title>
    <?php include 'config/home.php'; ?>
</head>
<body class="bg-gray-100">
    <?php 
    include 'config/menu/customers/header.php'; 
    
    $base_url = '/projet_web/'; // Chemin de base pour les images
    ?>

    <!-- Breadcrumb -->
    <nav class="bg-white py-4 px-6 border-b">
        <div class="max-w-7xl mx-auto">
            <a href="<?= $base_url ?>" class="text-gray-600 hover:text-blue-600">Accueil</a>
            <span class="mx-2 text-gray-400">/</span>
            <span class="text-gray-900 font-semibold">Mon Panier</span>
        </div>
    </nav>

    <div class="cart-container">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8">
                <div class="w-full lg:w-2/3">
                    <div class="cart-card relative">
                        <div class="cart-header">
                            <div class="flex justify-between items-center">
                                <h1 class="text-2xl font-bold text-white">🛒 Votre Panier</h1>
                                <span class="bg-white bg-opacity-20 px-4 py-1 rounded-full font-semibold" id="cart-item-count">
                                    <?= array_sum(array_column($panier, 'quantite')) ?> article(s)
                                </span>
                            </div>
                        </div>

                        <div class="loading-overlay" id="cart-loading">
                            <div class="loading-spinner"></div>
                        </div>

                        <div id="cart-content" class="p-6">
                            <?php if (!empty($panier)): ?>
                                <?php $sous_total = 0; ?>
                                <div class="space-y-4" id="cart-items">
                                    <?php foreach ($panier as $item):
                                        // Décoder le champ images si c'est une chaîne JSON
                                        $images = isset($item['images']) && is_string($item['images']) ? json_decode($item['images'], true) : (is_array($item['images']) ? $item['images'] : []);
                                        $image_url = !empty($images) ? $images[0] : null; // Prendre la première image
                                        $prix_utile = isset($item['promo_appliquee']) && $item['promo_appliquee'] > 0 ? $item['prix_original'] - $item['promo_appliquee'] : $item['prix_original'];
                                        $total_item = $prix_utile * $item['quantite'];
                                        $sous_total += $total_item;
                                        $economie = ($item['prix_original'] - $prix_utile) * $item['quantite'];
                                    ?>
                                        <div class="product-card flex flex-col sm:flex-row gap-4 items-start" data-produit-id="<?= htmlspecialchars($item['id_produit']) ?>">
                                            <div class="flex-shrink-0 relative">
                                                <?php if ($economie > 0): ?>
                                                    <span class="promo-badge">-<?= round((($item['prix_original'] - $prix_utile) / $item['prix_original']) * 100) ?>%</span>
                                                <?php endif; ?>
                                                <img src="<?= htmlspecialchars($image_url ? $base_url . $image_url : '/projet_web/assets/images/placeholder-product.jpeg') ?>" 
                                                     alt="<?= htmlspecialchars($item['nom'] ?? 'Produit') ?>" 
                                                     class="w-24 h-24 object-cover rounded-lg border border-gray-200"
                                                     onerror="this.src='/projet_web/assets/images/placeholder-product.jpeg'">
                                            </div>
                                            
                                            <div class="flex-grow min-w-0 space-y-2">
                                                <div class="flex justify-between items-start">
                                                    <div class="min-w-0 flex-grow pr-4">
                                                        <h3 class="text-lg font-semibold text-gray-900"><?= htmlspecialchars($item['nom'] ?? 'Produit') ?></h3>
                                                        <div class="flex items-center gap-2 mt-1">
                                                            <?php if (isset($item['stock'])): ?>
                                                                <span class="stock-status px-2 py-1 rounded-full text-xs font-semibold <?= $item['stock'] > 0 ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' ?>">
                                                                    <?= $item['stock'] > 0 ? '✅ En stock' : '❌ Rupture' ?>
                                                                </span>
                                                            <?php endif; ?>
                                                            <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded">
                                                                Réf: <?= htmlspecialchars($item['id_produit']) ?>
                                                            </span>
                                                        </div>
                                                        <?php if ($economie > 0): ?>
                                                            <p class="text-sm text-green-600 font-semibold mt-1">
                                                                🎉 Économisez <?= number_format($economie, 0, ',', ' ') ?> FCFA
                                                            </p>
                                                        <?php endif; ?>
                                                    </div>
                                                    
                                                    <div class="text-right">
                                                        <?php if ($economie > 0): ?>
                                                            <span class="text-gray-400 line-through text-sm block">
                                                                <?= number_format($item['prix_original'] * $item['quantite'], 0, ',', ' ') ?> FCFA
                                                            </span>
                                                            <span class="text-blue-600 font-bold text-lg">
                                                                <?= number_format($total_item, 0, ',', ' ') ?> FCFA
                                                            </span>
                                                        <?php else: ?>
                                                            <span class="text-blue-600 font-bold text-lg">
                                                                <?= number_format($total_item, 0, ',', ' ') ?> FCFA
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                
                                                <div class="flex items-center justify-between flex-wrap gap-4">
                                                    <div class="quantity-control">
                                                        <button type="button" class="quantity-btn decrement-btn" data-produit-id="<?= htmlspecialchars($item['id_produit']) ?>" aria-label="Diminuer la quantité">-</button>
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
                                    <?php endforeach; ?>
                                </div>
                            <?php else: ?>
                                <div class="text-center py-12 bg-white rounded-lg">
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

                <?php if (!empty($panier)): ?>
                    <div class="w-full lg:w-1/3">
                        <div class="summary-card">
                            <div class="summary-header">
                                💳 Récapitulatif de la commande
                            </div>
                            
                            <div class="space-y-2">
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
                            
                            <div class="mt-4 pt-4 border-t border-gray-200">
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
                                    <img src="<?= $base_url ?>assets/images/placeholder-product.jpeg" alt="Visa" class="h-6" onerror="this.src='/projet_web/assets/images/placeholder-product.jpeg'">
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php include 'config/menu/customers/footer.php'; ?>
</body>
</html>