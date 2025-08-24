<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Produits</title>
    <?php include 'config/content.php'; ?>
</head>
<body class="min-h-screen">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <?php include 'config/sideBar.php'; ?>
        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto bg-gray-50">
            <!-- Header -->
            <header class="bg-white shadow-sm z-10 sticky top-0">
                <div class="flex items-center justify-between px-6 py-4">
                    <div>
                        <h1 class="text-xl font-semibold text-gray-800">Produits</h1>
                        <p class="text-sm text-gray-500 mt-1">Accueil > Catalogue > Produits</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <input type="text" placeholder="Rechercher un produit..." class="w-64 pl-10 pr-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                            <div class="absolute left-3 top-2.5 w-4 h-4 flex items-center justify-center text-gray-400">
                                <i class="ri-search-line"></i>
                            </div>
                        </div>
                        <button class="relative w-10 h-10 flex items-center justify-center rounded-full hover:bg-gray-100">
                            <i class="ri-notification-3-line text-gray-600"></i>
                            <span class="absolute top-1 right-1 w-4 h-4 bg-red-500 rounded-full text-xs text-white flex items-center justify-center">3</span>
                        </button>
                        <button class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-gray-100">
                            <i class="ri-settings-3-line text-gray-600"></i>
                        </button>
                    </div>
                </div>
            </header>

            <!-- Products Content -->
            <div class="p-6">
                <!-- Action Bar -->
                <div class="mb-6 flex justify-between items-center">
                    <div class="text-sm font-medium text-gray-500">Mercredi, 20 Août 2025</div>
                    <div class="flex space-x-2">
                        <button class="px-4 py-2 bg-white border border-gray-300 rounded-button text-sm font-medium text-gray-700 flex items-center whitespace-nowrap">
                            <div class="w-4 h-4 flex items-center justify-center mr-2">
                                <i class="ri-download-line"></i>
                            </div>
                            Exporter
                        </button>
                        <button id="addProductBtn" class="px-4 py-2 bg-primary text-white rounded-button text-sm font-medium flex items-center whitespace-nowrap">
                            <div class="w-4 h-4 flex items-center justify-center mr-2">
                                <i class="ri-add-line"></i>
                            </div>
                            Ajouter un produit
                        </button>
                    </div>
                </div>

                <!-- Filters -->
                <div class="bg-white rounded shadow p-4 mb-6">
                    <div class="flex flex-wrap items-center gap-4">
                        <div class="flex-1 min-w-[200px]">
                            <label for="categoryFilter" class="block text-xs font-medium text-gray-500 mb-1">Catégorie</label>
                            <div class="relative">
                                <select id="categoryFilter" class="w-full px-3 py-2 pr-8 border border-gray-300 rounded text-sm appearance-none focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                    <option value="">Toutes les catégories</option>
                                    <option value="papeterie">Papeterie</option>
                                    <option value="cahiers">Cahiers</option>
                                    <option value="stylos">Stylos</option>
                                    <option value="surligneurs">Surligneurs</option>
                                    <option value="livres">Livres</option>
                                    <option value="manuels">Manuels</option>
                                    <option value="romans">Romans</option>
                                    <option value="electronique">Électronique</option>
                                    <option value="calculatrices">Calculatrices</option>
                                    <option value="casques">Casques</option>
                                    <option value="accessoires">Accessoires</option>
                                    <option value="sacs">Sacs</option>
                                    <option value="organisateurs">Organisateurs</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                    <i class="ri-arrow-down-s-line text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex-1 min-w-[200px]">
                            <label for="statusFilter" class="block text-xs font-medium text-gray-500 mb-1">Status</label>
                            <div class="relative">
                                <select id="statusFilter" class="w-full px-3 py-2 pr-8 border border-gray-300 rounded text-sm appearance-none focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                    <option value="">Tous les statuts</option>
                                    <option value="publié">Publié</option>
                                    <option value="inactive">Inactif</option>
                                    <option value="brouillon">Brouillon</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                    <i class="ri-arrow-down-s-line text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex-1 min-w-[200px]">
                            <label for="sortFilter" class="block text-xs font-medium text-gray-500 mb-1">Trier par</label>
                            <div class="relative">
                                <select id="sortFilter" class="w-full px-3 py-2 pr-8 border border-gray-300 rounded text-sm appearance-none focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                    <option value="name_asc">Nom (A-Z)</option>
                                    <option value="name_desc">Nom (Z-A)</option>
                                    <option value="price_asc">Prix (croissant)</option>
                                    <option value="price_desc">Prix (décroissant)</option>
                                    <option value="stock_asc">Stock (croissant)</option>
                                    <option value="stock_desc">Stock (décroissant)</option>
                                    <option value="date_desc">Date (récent)</option>
                                    <option value="date_asc">Date (ancien)</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                    <i class="ri-arrow-down-s-line text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                        <div class="ml-auto flex items-end space-x-2">
                            <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-button text-sm font-medium whitespace-nowrap">
                                Réinitialiser
                            </button>
                            <button class="px-4 py-2 bg-primary text-white rounded-button text-sm font-medium whitespace-nowrap">
                                Appliquer
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Products Table -->
                <div class="bg-white rounded shadow mb-6 overflow-hidden">
                    <div class="flex justify-between items-center px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-800">Liste des produits</h3>
                        <div class="text-sm text-gray-500"><?php echo count($products); ?> produits au total</div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left">
                                        <div class="flex items-center">
                                            <input type="checkbox" id="selectAll" class="custom-checkbox">
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Produit
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Description
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Catégorie
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Prix
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Prix Promo
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Stock
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Statut
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php if (!empty($products)): ?>
 <?php
    // Configuration des chemins pour WampServer
    $webBasePath = '/projet_web/'; // URL de base pour le navigateur
    $serverBasePath = $_SERVER['DOCUMENT_ROOT'] . '/projet_web/'; // Chemin physique sur le serveur
    
    foreach ($products as $product): 
        // Décodage JSON des images
        $images = !empty($product['images']) ? json_decode($product['images'], true) : [];
        
        // Gestion des erreurs JSON
        if (json_last_error() !== JSON_ERROR_NONE) {
            error_log("Erreur JSON pour produit ID {$product['id']}: " . json_last_error_msg());
            $images = [];
        }
        
        // Définir l'image par défaut
        $defaultImage = $webBasePath . 'assets/images/placeholder-product.jpeg';
        $firstImage = $defaultImage;
        
        // Traitement de la première image
        if (!empty($images) && is_array($images) && !empty($images[0])) {
            $imageRelativePath = $images[0]; // Ex: "uploads/products/product_xxx.png"
            
            // Construction du chemin physique complet pour vérifier l'existence
            $imagePhysicalPath = $serverBasePath . $imageRelativePath;
            
            // Construction du chemin web pour l'affichage
            $imageWebPath = $webBasePath . $imageRelativePath;
            
            // Vérifier si le fichier existe physiquement
            if (file_exists($imagePhysicalPath)) {
                $firstImage = $imageWebPath;
                error_log("Image trouvée pour produit ID {$product['id']}: $imageWebPath");
            } else {
                error_log("Image introuvable pour produit ID {$product['id']}: $imagePhysicalPath");
                
                // Essayer d'autres emplacements possibles
                $alternativePaths = [
                    $_SERVER['DOCUMENT_ROOT'] . '/' . $imageRelativePath,
                    __DIR__ . '/../../' . $imageRelativePath,
                    '../' . $imageRelativePath,
                ];
                
                foreach ($alternativePaths as $altPath) {
                    if (file_exists($altPath)) {
                        $firstImage = $imageWebPath;
                        error_log("Image trouvée dans chemin alternatif: $altPath");
                        break;
                    }
                }
            }
        }
        
        // Préparation des autres données
        $nom_produit = $product['nom_produit'] ?? 'Produit sans nom';
        $description = $product['description'] ?? 'Aucune description';
        $categorie = $product['categories'] ?? 'Non catégorisé';
        $prix = is_numeric($product['prix']) ? (float)$product['prix'] : 0;
        $prix_promo = is_numeric($product['prix_promo']) ? (float)$product['prix_promo'] : 0;
        $stock = is_numeric($product['stock']) ? (int)$product['stock'] : 0;
        $status = $product['status'] ?? 'draft';
        $product_id = $product['id'] ?? 0;
    ?>
    
    <tr class="hover:bg-gray-50">
        <td class="px-6 py-4 whitespace-nowrap">
            <input type="checkbox" class="custom-checkbox product-checkbox">
        </td>
        <td class="px-6 py-4 whitespace-nowrap">
            <div class="flex items-center">
                <div class="h-10 w-10 flex-shrink-0 rounded overflow-hidden bg-gray-100">
                    <img src="<?php echo htmlspecialchars($firstImage); ?>" 
                         alt="<?php echo htmlspecialchars($nom_produit); ?>" 
                         class="h-full w-full object-cover"
                         onerror="console.error('Erreur image:', this.src); this.src='<?php echo htmlspecialchars($defaultImage); ?>'; this.onerror=null;">
                </div>
                <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">
                        <?php echo htmlspecialchars($nom_produit); ?>
                    </div>
                    <?php if (count($images) > 1): ?>
                        <div class="text-xs text-gray-500">
                            +<?php echo count($images) - 1; ?> image<?php echo count($images) > 2 ? 's' : ''; ?>
                        </div>
                    <?php endif; ?>
                    <!-- Debug info (à supprimer en production) -->
                    <div class="text-xs text-blue-500" style="font-size: 10px;">
                        Debug: <?php echo htmlspecialchars($firstImage); ?>
                    </div>
                </div>
            </div>
        </td>
        
        <!-- Colonnes suivantes identiques à votre code original -->
        <td class="px-6 py-4 text-sm text-gray-500">
            <div class="max-w-xs truncate">
                <?php echo htmlspecialchars($description); ?>
            </div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            <?php echo htmlspecialchars($categorie); ?>
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">
            <?php echo number_format($prix, 2, ',', ' '); ?> €
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">
            <?php echo $prix_promo > 0 ? number_format($prix_promo, 2, ',', ' ') . ' €' : '-'; ?>
        </td>
        <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm <?php echo $stock > 0 ? 'text-green-600' : ($stock == 0 ? 'text-orange-600' : 'text-red-600'); ?> font-medium">
                <?php echo $stock; ?>
                <?php if ($stock == 0): ?>
                    <span class="text-xs">(Rupture)</span>
                <?php endif; ?>
            </div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap">
            <?php
            $status_class = '';
            $status_text = '';
            switch (strtolower($status)) {
                case 'publié':
                    $status_class = 'bg-green-100 text-green-800';
                    $status_text = 'Publié';
                    break;
                case 'inactive':
                    $status_class = 'bg-red-100 text-red-800';
                    $status_text = 'Inactif';
                    break;
                case 'brouillon':
                    $status_class = 'bg-gray-100 text-gray-800';
                    $status_text = 'Brouillon';
                    break;
                default:
                    $status_class = 'bg-gray-100 text-gray-800';
                    $status_text = ucfirst($status);
            }
            ?>
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?php echo $status_class; ?>">
                <?php echo htmlspecialchars($status_text); ?>
            </span>
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
            <div class="flex justify-end space-x-2">
                <button class="w-8 h-8 flex items-center justify-center rounded hover:bg-gray-100 text-primary" 
                        title="Modifier"
                        onclick="editProduct(<?php echo $product_id; ?>)">
                    <i class="ri-pencil-line"></i>
                </button>
                <button class="w-8 h-8 flex items-center justify-center rounded hover:bg-gray-100 text-gray-600" 
                        title="Dupliquer"
                        onclick="duplicateProduct(<?php echo $product_id; ?>)">
                    <i class="ri-file-copy-line"></i>
                </button>
                <button class="delete-product-btn w-8 h-8 flex items-center justify-center rounded hover:bg-gray-100 text-red-500" 
                        title="Supprimer" 
                        data-product-id="<?php echo $product_id; ?>" 
                        data-product-name="<?php echo htmlspecialchars($nom_produit); ?>">
                    <i class="ri-delete-bin-line"></i>
                </button>
            </div>
        </td>
    </tr>
    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="9" class="px-6 py-12 text-center">
                                            <div class="flex flex-col items-center">
                                                <div class="w-16 h-16 rounded-full bg-gray-100 flex items-center justify-center mb-4">
                                                    <i class="ri-box-3-line ri-2x text-gray-400"></i>
                                                </div>
                                                <h3 class="text-sm font-medium text-gray-900 mb-1">Aucun produit</h3>
                                                <p class="text-sm text-gray-500">Commencez par ajouter votre premier produit.</p>
                                                <button onclick="document.getElementById('addProductBtn').click()" class="mt-3 px-4 py-2 bg-primary text-white rounded-button text-sm font-medium hover:bg-primary-dark transition-colors">
                                                    Ajouter un produit
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
                        <div class="flex items-center">
                            <span class="text-sm text-gray-700">Afficher</span>
                            <div class="relative mx-2">
                                <select class="appearance-none bg-white border border-gray-300 rounded px-3 py-1 pr-8 text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                    <option>10</option>
                                    <option selected>20</option>
                                    <option>50</option>
                                    <option>100</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                    <i class="ri-arrow-down-s-line text-gray-400"></i>
                                </div>
                            </div>
                            <span class="text-sm text-gray-700">produits par page</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button class="px-3 py-1 border border-gray-300 rounded text-sm text-gray-500 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                                <i class="ri-arrow-left-s-line"></i>
                            </button>
                            <button class="px-3 py-1 border border-gray-300 rounded text-sm bg-primary text-white">1</button>
                            <button class="px-3 py-1 border border-gray-300 rounded text-sm text-gray-700 hover:bg-gray-50">2</button>
                            <button class="px-3 py-1 border border-gray-300 rounded text-sm text-gray-700 hover:bg-gray-50">3</button>
                            <button class="px-3 py-1 border border-gray-300 rounded text-sm text-gray-700 hover:bg-gray-50">4</button>
                            <button class="px-3 py-1 border border-gray-300 rounded text-sm text-gray-700 hover:bg-gray-50">5</button>
                            <button class="px-3 py-1 border border-gray-300 rounded text-sm text-gray-700 hover:bg-gray-50">
                                <i class="ri-arrow-right-s-line"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Modal (Hidden by default) -->
                <div id="productModal" class="modal fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
                    <div class="bg-white rounded-lg w-full max-w-4xl max-h-[90vh] overflow-y-auto">
                        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center sticky top-0 bg-white z-10">
                            <h3 class="text-lg font-semibold text-gray-800">Ajouter un produit</h3>
                            <button id="closeProductModal" class="text-gray-500 hover:text-gray-700">
                                <i class="ri-close-line ri-lg"></i>
                            </button>
                        </div>
                        <div class="p-6">
                            <form id="productForm">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                    <div>
                                        <label for="productName" class="block text-sm font-medium text-gray-700 mb-1">Nom du produit</label>
                                        <input type="text" id="productName" name="sai_nom_produit" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required>
                                    </div>
                                    <div>
                                        <label for="productDescription" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                        <textarea id="productDescription" name="sai_description" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"></textarea>
                                    </div>
                                    <div>
                                        <label for="productCategory" class="block text-sm font-medium text-gray-700 mb-1">Catégorie</label>
                                        <div class="relative">
                                            <select id="productCategory" name="sai_categorie" class="w-full px-4 py-2 pr-8 border border-gray-300 rounded appearance-none focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                                <option value="">Sélectionner une catégorie</option>
                                                <option value="papeterie">Papeterie</option>
                                                <option value="cahiers">Cahiers</option>
                                                <option value="stylos">Stylos</option>
                                                <option value="surligneurs">Surligneurs</option>
                                                <option value="livres">Livres</option>
                                                <option value="manuels">Manuels</option>
                                                <option value="romans">Romans</option>
                                                <option value="electronique">Électronique</option>
                                                <option value="calculatrices">Calculatrices</option>
                                                <option value="casques">Casques</option>
                                                <option value="accessoires">Accessoires</option>
                                                <option value="sacs">Sacs</option>
                                                <option value="organisateurs">Organisateurs</option>
                                            </select>
                                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                                <i class="ri-arrow-down-s-line text-gray-400"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="productBrand" class="block text-sm font-medium text-gray-700 mb-1">Marque</label>
                                        <input type="text" id="productBrand" name="sai_marque" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                    </div>
                                    <div>
                                        <label for="productPrice" class="block text-sm font-medium text-gray-700 mb-1">Prix (€)</label>
                                        <input type="number" id="productPrice" name="sai_prix" step="0.01" min="0" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required>
                                    </div>
                                    <div>
                                        <label for="productPromoPrice" class="block text-sm font-medium text-gray-700 mb-1">Prix promotionnel (€)</label>
                                        <input type="number" id="productPromoPrice" name="sai_prix_promo" step="0.01" min="0" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                    </div>
                                    <div>
                                        <label for="productStock" class="block text-sm font-medium text-gray-700 mb-1">Stock</label>
                                        <input type="number" id="productStock" name="sai_stock" min="0" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required>
                                    </div>
                                    <div>
                                        <label for="productStatus" class="block text-sm font-medium text-gray-700 mb-1">Statut</label>
                                        <div class="relative">
                                            <select id="productStatus" name="sai_statut" class="w-full px-4 py-2 pr-8 border border-gray-300 rounded appearance-none focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                                <option value="publié">publié</option>
                                                <option value="inactive">Inactif</option>
                                                <option value="brouillon">Brouillon</option>
                                            </select>
                                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                                <i class="ri-arrow-down-s-line text-gray-400"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Images du produit</label>
                                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 flex flex-col items-center justify-center text-center cursor-pointer hover:bg-gray-50">
                                            <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 mb-2">
                                                <i class="ri-upload-2-line ri-lg"></i>
                                            </div>
                                            <p class="text-sm text-gray-500">Glisser ou cliquer pour ajouter</p>
                                            <input type="file" class="hidden" id="product-image-upload" name="sai_image" accept="image/*" multiple>
                                        </div>
                                        <div id="image-preview-container" class="grid grid-cols-2 md:grid-cols-4 gap-4"></div>
                                    </div>
                                </div>
                                <div class="flex justify-end space-x-3">
                                    <button type="button" id="cancelProductBtn" class="px-4 py-2 border border-gray-300 rounded-button text-sm font-medium text-gray-700 whitespace-nowrap hover:bg-gray-50 transition-colors">
                                        Annuler
                                    </button>
                                    <button type="button" id="saveAsDraftBtn" class="px-4 py-2 border border-gray-300 rounded-button text-sm font-medium text-gray-700 whitespace-nowrap hover:bg-gray-50 transition-colors">
                                        Enregistrer comme brouillon
                                    </button>
                                    <button type="submit" id="publishProductBtn" class="px-4 py-2 bg-primary text-white rounded-button text-sm font-medium whitespace-nowrap hover:bg-primary-dark transition-colors">
                                        Publier le produit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Delete Confirmation Modal -->
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
            </div>
        </main>
    </div>

    <?php include 'config/menu/customers/footer-admin.php'; ?>
    
</body>
</html>