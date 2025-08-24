<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($product['nom_produit']); ?> - Fournitures Universitaires</title>
  <?php include 'config/home.php'; ?>
  
  <style>
    
  </style>
</head>
<body class="bg-gray-50 min-h-screen">
  <?php include 'config/menu/customers/header.php'; ?>
  
  <!-- Breadcrumb -->
  <div class="breadcrumb">
    <div class="max-w-7xl mx-auto px-4">
      <nav class="text-sm text-gray-600">
        <a href="/" class="hover:text-blue-600">Accueil</a>
        <span class="mx-2">/</span>
        <a href="/categories" class="hover:text-blue-600"><?php echo htmlspecialchars($product['categories']); ?></a>
        <span class="mx-2">/</span>
        <span class="text-gray-900"><?php echo htmlspecialchars($product['nom_produit']); ?></span>
      </nav>
    </div>
  </div>

  <div class="max-w-7xl mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-6">
        
        <!-- Section Images -->
        <div class="image-gallery">
          <?php
          $images = json_decode($product['images'], true) ?: [];
          $mainImage = !empty($images) ? '/projet_web/' . $images[0] : 'https://via.placeholder.com/400x400?text=Image+indisponible';
          ?>
          
          <!-- Miniatures -->
          <div class="thumbnails-container">
            <?php if (!empty($images)): ?>
              <?php foreach ($images as $index => $image): ?>
                <img src="/projet_web/<?php echo htmlspecialchars($image); ?>" 
                     alt="Thumbnail <?php echo $index + 1; ?>" 
                     class="thumbnail w-16 h-16 object-cover rounded cursor-pointer <?php echo $index === 0 ? 'active' : ''; ?>"
                     onclick="changeMainImage(this.src, this)">
              <?php endforeach; ?>
            <?php else: ?>
              <!-- Images par défaut si aucune image -->
              <img src="https://via.placeholder.com/80x80?text=1" 
                   alt="Thumbnail 1" 
                   class="thumbnail w-16 h-16 object-cover rounded cursor-pointer active"
                   onclick="changeMainImage('https://via.placeholder.com/400x400?text=Image+1', this)">
              <img src="https://via.placeholder.com/80x80?text=2" 
                   alt="Thumbnail 2" 
                   class="thumbnail w-16 h-16 object-cover rounded cursor-pointer"
                   onclick="changeMainImage('https://via.placeholder.com/400x400?text=Image+2', this)">
            <?php endif; ?>
          </div>
          
          <!-- Image principale -->
          <div class="main-image-container">
            <div class="bg-gray-50 rounded-lg p-4 border">
              <img id="mainImage" src="<?php echo htmlspecialchars($mainImage); ?>" 
                   alt="<?php echo htmlspecialchars($product['nom_produit']); ?>" 
                   class="product-image-main w-full rounded">
            </div>
          </div>
        </div>

        <!-- Section Détails -->
        <div class="space-y-6">
          <div>
            <h1 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-3">
              <?php echo htmlspecialchars($product['nom_produit']); ?>
            </h1>
            
            <!-- Évaluation -->
            <div class="flex items-center gap-3 mb-4">
              <div class="rating-stars">
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">☆</span>
              </div>
              <span class="text-sm text-gray-600">(4.2/5 - 127 avis)</span>
            </div>
          </div>

          <!-- Prix -->
          <div class="space-y-2">
            <div class="flex items-center gap-3">
              <?php if ($product['prix_promo'] > 0): ?>
                <span class="text-3xl font-bold text-red-600">
                  <?php echo number_format($product['prix_promo'], 2); ?> €
                </span>
                <span class="text-lg text-gray-500 line-through">
                  <?php echo number_format($product['prix'], 2); ?> €
                </span>
                <span class="price-badge">
                  -<?php echo round((($product['prix'] - $product['prix_promo']) / $product['prix']) * 100); ?>%
                </span>
              <?php else: ?>
                <span class="text-3xl font-bold text-gray-900">
                  <?php echo number_format($product['prix'], 2); ?> €
                </span>
              <?php endif; ?>
            </div>
          </div>

          <!-- Informations produit -->
          <div class="space-y-3">
            <div class="flex items-center gap-3">
              <span class="feature-icon">📦</span>
              <span class="text-gray-700">Marque: <strong><?php echo htmlspecialchars($product['marque']); ?></strong></span>
            </div>
            <div class="flex items-center gap-3">
              <span class="feature-icon">📂</span>
              <span class="text-gray-700">Catégorie: <strong><?php echo htmlspecialchars($product['categories']); ?></strong></span>
            </div>
          </div>

          <!-- Stock -->
          <div class="space-y-2">
            <?php 
            $stockLevel = $product['stock'];
            $stockPercentage = min(($stockLevel / 100) * 100, 100);
            $stockStatus = $stockLevel > 10 ? 'En stock' : ($stockLevel > 0 ? 'Stock limité' : 'Rupture de stock');
            $stockColor = $stockLevel > 10 ? 'text-green-600' : ($stockLevel > 0 ? 'text-orange-600' : 'text-red-600');
            ?>
            <div class="flex items-center justify-between">
              <span class="font-medium <?php echo $stockColor; ?>">
                <?php echo $stockStatus; ?>
                <?php if ($stockLevel > 0): ?>
                  (<?php echo $stockLevel; ?> disponible<?php echo $stockLevel > 1 ? 's' : ''; ?>)
                <?php endif; ?>
              </span>
            </div>
            <?php if ($stockLevel > 0): ?>
            <div class="stock-indicator">
              <div class="stock-bar" style="width: <?php echo $stockPercentage; ?>%"></div>
            </div>
            <?php endif; ?>
          </div>

          <!-- Panier -->
          <div class="space-y-4">
            <button class="add-to-cart-btn w-full"
                    data-id="<?php echo $product['id']; ?>"
                    data-nom="<?php echo htmlspecialchars($product['nom_produit']); ?>"
                    data-prix-original="<?php echo $product['prix']; ?>"
                    data-promo="<?php echo $product['prix_promo'] > 0 ? $product['prix_promo'] : 0; ?>"
                    data-quantite="1"
                    data-max-stock="<?php echo $product['stock']; ?>"
                    <?php echo $product['stock'] <= 0 ? 'disabled' : ''; ?>>
              <span class="btn-text"><?php echo $product['stock'] > 0 ? 'Ajouter au panier' : 'Rupture de stock'; ?></span>
              <span class="btn-loader" style="display: none;">
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Ajout en cours...
              </span>
            </button>
          </div>

          <!-- Informations livraison -->
          <div class="shipping-info p-4 rounded">
            <h3 class="font-semibold text-gray-900 mb-2">Informations de livraison</h3>
            <div class="space-y-2 text-sm text-gray-600">
              <div class="flex items-center gap-2">
                <span>🚚</span>
                <span>Livraison gratuite dès 50€ d'achat</span>
              </div>
              <div class="flex items-center gap-2">
                <span>⏰</span>
                <span>Expédition sous 24-48h</span>
              </div>
              <div class="flex items-center gap-2">
                <span>🔄</span>
                <span>Retour gratuit sous 30 jours</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Description détaillée -->
      <div class="border-t border-gray-200 p-6">
        <h2 class="text-xl font-bold text-gray-900 mb-4">Description du produit</h2>
        <div class="description-section">
          <div class="text-gray-600 leading-relaxed">
            <?php echo nl2br(htmlspecialchars($product['description'])); ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include 'config/menu/customers/footer.php'; ?>
  
</body>
</html>