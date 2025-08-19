!<DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Votre Panier - EduSupplies</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
    include 'config/home.php';
    
    // Récupérer le panier depuis la variable passée par le contrôleur
    $panier = $panier ?? [];
    ?>
  
</head>
<body class="bg-gray-50">
    <?php include 'config/menu/customers/header.php'; ?>

    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <div class="w-full lg:w-2/3">
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold">Votre Panier</h1>
                        <span class="text-gray-600" id="cart-item-count"><?= array_sum(array_column($panier, 'quantite')) ?> article(s)</span>
                    </div>

                    <div id="cart-content">
                        <?php if (!empty($panier)): ?>
                            <?php $sous_total = 0; ?>
                            <div class="divide-y" id="cart-items">
                                <?php foreach ($panier as $item):
                                    $prix_utile = isset($item['promo_appliquee']) && $item['promo_appliquee'] > 0 ? $item['prix_original'] - $item['promo_appliquee'] : $item['prix_original'];
                                    $total_item = $prix_utile * $item['quantite'];
                                    $sous_total += $total_item;
                                    $economie = ($item['prix_original'] - $prix_utile) * $item['quantite'];
                                ?>
                                    <div class="py-6 flex flex-col sm:flex-row gap-4 items-center product-card" data-produit-id="<?= htmlspecialchars($item['id_produit']) ?>">
                                        <div class="flex-shrink-0 relative w-24 h-24">
                                            <?php if ($economie > 0): ?>
                                                <span class="promo-badge">PROMO</span>
                                            <?php endif; ?>
                                            <img src="<?= htmlspecialchars($item['image_url'] ?? 'https://via.placeholder.com/100') ?>" 
                                                 alt="<?= htmlspecialchars($item['nom'] ?? 'Produit') ?>" 
                                                 class="w-full h-full object-contain rounded border">
                                        </div>
                                        <div class="flex-grow min-w-0">
                                            <div class="flex justify-between items-start">
                                                <div class="min-w-0">
                                                    <h3 class="text-lg font-medium truncate"><?= htmlspecialchars($item['nom'] ?? 'Produit') ?></h3>
                                                    <?php if (isset($item['stock'])): ?>
                                                        <p class="text-sm <?= $item['stock'] > 0 ? 'text-green-600' : 'text-red-600' ?> truncate">
                                                            <?= $item['stock'] > 0 ? 'En stock' : 'Rupture de stock' ?>
                                                        </p>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="text-right min-w-max">
                                                    <?php if ($economie > 0): ?>
                                                        <span class="text-gray-400 line-through text-sm block"><?= number_format($item['prix_original'], 0, ',', ' ') ?> FCFA</span>
                                                        <span class="text-lg font-semibold text-red-600"><?= number_format($total_item, 0, ',', ' ') ?> FCFA</span>
                                                    <?php else: ?>
                                                        <span class="text-lg font-semibold"><?= number_format($total_item, 0, ',', ' ') ?> FCFA</span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <p class="text-gray-600 text-sm mt-1 truncate">Réf: <?= htmlspecialchars($item['id_produit']) ?></p>
                                            <?php if ($economie > 0): ?>
                                                <p class="text-green-600 text-sm mt-1 truncate">
                                                    Économisez <?= number_format($economie, 0, ',', ' ') ?> FCFA
                                                </p>
                                            <?php endif; ?>
                                            <div class="flex items-center mt-4 space-x-4">
                                                <div class="quantity-control flex items-center">
                                                    <button type="button" class="quantity-btn decrement-btn" data-produit-id="<?= htmlspecialchars($item['id_produit']) ?>">-</button>
                                                    <input type="number" value="<?= $item['quantite'] ?>" min="1" class="quantity-input" data-produit-id="<?= htmlspecialchars($item['id_produit']) ?>" readonly>
                                                    <button type="button" class="quantity-btn increment-btn" data-produit-id="<?= htmlspecialchars($item['id_produit']) ?>">+</button>
                                                </div>
                                                <button class="remove-btn text-red-600 text-sm hover:underline" data-produit-id="<?= htmlspecialchars($item['id_produit']) ?>">Supprimer</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <div class="text-center py-12" id="empty-cart">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <h3 class="mt-4 text-lg font-medium text-gray-900">Votre panier est vide</h3>
                                <p class="mt-1 text-gray-500">Commencez vos achats pour découvrir nos produits</p>
                                <a href="/projet_web/" class="mt-6 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-primary-dark">
                                    Commencer mes achats
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <?php if (!empty($panier)): ?>
                <div class="w-full lg:w-1/3" id="cart-summary">
                    <div class="bg-white rounded-lg shadow-sm p-6 sticky top-4">
                        <h3 class="text-xl font-semibold mb-4">Récapitulatif</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Sous-total (<span id="summary-count"><?= array_sum(array_column($panier, 'quantite')) ?></span> article(s))</span>
                                <span id="summary-subtotal"><?= number_format($sous_total, 0, ',', ' ') ?> FCFA</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Livraison</span>
                                <span>1 000 FCFA</span>
                            </div>
                            <?php $total_economie = array_sum(array_map(function($item) {
                                return ($item['prix_original'] - (isset($item['promo_appliquee']) && $item['promo_appliquee'] > 0 ? $item['prix_original'] - $item['promo_appliquee'] : $item['prix_original'])) * $item['quantite'];
                            }, $panier)); ?>
                            <?php if ($total_economie > 0): ?>
                                <div class="flex justify-between text-green-600">
                                    <span>Économie totale</span>
                                    <span id="total-savings">-<?= number_format($total_economie, 0, ',', ' ') ?> FCFA</span>
                                </div>
                            <?php endif; ?>
                            <div class="border-t pt-3 flex justify-between font-medium">
                                <span>Total TTC</span>
                                <span class="text-lg text-primary" id="summary-total"><?= number_format($sous_total + 1000, 0, ',', ' ') ?> FCFA</span>
                            </div>
                        </div>
                        <button class="mt-6 w-full bg-primary hover:bg-primary-dark text-white py-3 px-4 rounded-md font-medium transition duration-150" id="checkout-btn">
                            Passer la commande
                        </button>
                        <div class="mt-4 flex items-center text-sm text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Livraison estimée sous 3-5 jours
                        </div>
                        <div class="mt-6 pt-6 border-t">
                            <h4 class="font-medium mb-2">Moyens de paiement sécurisés</h4>
                            <div class="flex flex-wrap gap-2">
                                <img src="https://via.placeholder.com/40x25" alt="Visa" class="h-6">
                                <img src="https://via.placeholder.com/40x25" alt="Mastercard" class="h-6">
                                <img src="https://via.placeholder.com/40x25" alt="Orange Money" class="h-6">
                                <img src="https://via.placeholder.com/40x25" alt="Wave" class="h-6">
                                <img src="https://via.placeholder.com/40x25" alt="Mobile Money" class="h-6">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php include 'config/menu/customers/footer.php'; ?>

    
    
</body>
</html>