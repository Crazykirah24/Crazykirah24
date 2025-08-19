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
                    <div class="text-sm font-medium text-gray-500">Mercredi, 21 Mai 2025</div>
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
                            <label for="statusFilter" class="block text-xs font-medium text-gray-500 mb-1">Statut</label>
                            <div class="relative">
                                <select id="statusFilter" class="w-full px-3 py-2 pr-8 border border-gray-300 rounded text-sm appearance-none focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                    <option value="">Tous les statuts</option>
                                    <option value="active">Actif</option>
                                    <option value="inactive">Inactif</option>
                                    <option value="draft">Brouillon</option>
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
                        <div class="text-sm text-gray-500">125 produits au total</div>
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
        <!-- Exemple de ligne de produit -->
        <tr class="hover:bg-gray-50">
            <td class="px-6 py-4 whitespace-nowrap">
                <input type="checkbox" class="custom-checkbox product-checkbox">
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="h-10 w-10 flex-shrink-0 rounded overflow-hidden bg-gray-100">
                        <img src="chemin/vers/image.jpg" alt="Nom du produit" class="h-full w-full object-cover">
                    </div>
                    <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">Cahier A4 200 pages</div>
                    </div>
                </div>
            </td>
            <td class="px-6 py-4 text-sm text-gray-500">
                Cahier grand format avec couverture rigide
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                Cahiers
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">
                12,99 €
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">
                9,99 €
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-green-600 font-medium">45</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full status-active">
                    Actif
                </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <div class="flex justify-end space-x-2">
                    <button class="w-8 h-8 flex items-center justify-center rounded hover:bg-gray-100 text-primary" title="Modifier">
                        <i class="ri-pencil-line"></i>
                    </button>
                    <button class="w-8 h-8 flex items-center justify-center rounded hover:bg-gray-100 text-gray-600" title="Dupliquer">
                        <i class="ri-file-copy-line"></i>
                    </button>
                    <button class="delete-product-btn w-8 h-8 flex items-center justify-center rounded hover:bg-gray-100 text-red-500" title="Supprimer" data-product-id="1" data-product-name="Cahier A4 200 pages">
                        <i class="ri-delete-bin-line"></i>
                    </button>
                </div>
            </td>
        </tr>
        <!-- Autres lignes de produits... -->
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
            </div>
        </main>
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
               <form>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div>
            <label for="productName" class="block text-sm font-medium text-gray-700 mb-1">Nom du produit</label>
            <input type="text" id="productName" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
        </div>
        <div>
            <label for="productDescription" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
            <textarea id="productDescription" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"></textarea>
        </div>
        <div>
            <label for="productCategory" class="block text-sm font-medium text-gray-700 mb-1">Catégorie</label>
            <div class="relative">
                <select id="productCategory" class="w-full px-4 py-2 pr-8 border border-gray-300 rounded appearance-none focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
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
            <input type="text" id="productBrand" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
        </div>
        <div>
            <label for="productPrice" class="block text-sm font-medium text-gray-700 mb-1">Prix (€)</label>
            <input type="number" id="productPrice" step="0.01" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
        </div>
        <div>
            <label for="productPromoPrice" class="block text-sm font-medium text-gray-700 mb-1">Prix promotionnel (€)</label>
            <input type="number" id="productPromoPrice" step="0.01" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
        </div>
        <div>
            <label for="productStock" class="block text-sm font-medium text-gray-700 mb-1">Stock</label>
            <input type="number" id="productStock" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
        </div>
        <div>
            <label for="productStatus" class="block text-sm font-medium text-gray-700 mb-1">Statut</label>
            <div class="relative">
                <select id="productStatus" class="w-full px-4 py-2 pr-8 border border-gray-300 rounded appearance-none focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    <option value="active">Actif</option>
                    <option value="inactive">Inactif</option>
                    <option value="draft">Brouillon</option>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                    <i class="ri-arrow-down-s-line text-gray-400"></i>
                </div>
            </div>
        </div>
    </div>
                       <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
    <div>
        <label for="productName" class="block text-sm font-medium text-gray-700 mb-1">Nom du produit</label>
        <input type="text" id="productName" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
    </div>
    <div>
        <label for="productReference" class="block text-sm font-medium text-gray-700 mb-1">Référence</label>
        <input type="text" id="productReference" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
    </div>
    <div>
        <label for="productCategory" class="block text-sm font-medium text-gray-700 mb-1">Catégorie</label>
        <div class="relative">
            <select id="productCategory" class="w-full px-4 py-2 pr-8 border border-gray-300 rounded appearance-none focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                <option value="">Sélectionner une catégorie</option>
                <option value="papeterie">Papeterie</option>
                <option value="cahiers">Cahiers</option>
                <option value="stylos">Stylos</option>
                <option value="surligneurs">Surligneurs</option>
                <option value="livres">Livres</option>
                <option value="manuels">Manuels scolaires</option>
                <option value="romans">Romans</option>
                <option value="electronique">Électronique</option>
                <option value="calculatrices">Calculatrices</option>
                <option value="casques">Casques audio</option>
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
        <div class="relative">
            <select id="productBrand" class="w-full px-4 py-2 pr-8 border border-gray-300 rounded appearance-none focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                <option value="">Sélectionner une marque</option>
                <option value="bic">Bic</option>
                <option value="oxford">Oxford</option>
                <option value="clairefontaine">Clairefontaine</option>
                <option value="maped">Maped</option>
                <option value="staedtler">Staedtler</option>
                <option value="parker">Parker</option>
                <option value="casio">Casio</option>
                <option value="texas">Texas Instruments</option>
                <option value="sony">Sony</option>
                <option value="samsung">Samsung</option>
            </select>
            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                <i class="ri-arrow-down-s-line text-gray-400"></i>
            </div>
        </div>
    </div>
    <div>
        <label for="productPrice" class="block text-sm font-medium text-gray-700 mb-1">Prix (€)</label>
        <input type="number" id="productPrice" step="0.01" min="0" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
    </div>
    <div>
        <label for="productPromoPrice" class="block text-sm font-medium text-gray-700 mb-1">Prix promotionnel (€)</label>
        <input type="number" id="productPromoPrice" step="0.01" min="0" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
    </div>
    <div>
        <label for="productStock" class="block text-sm font-medium text-gray-700 mb-1">Stock disponible</label>
        <input type="number" id="productStock" min="0" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
    </div>
    <div>
        <label for="productStatus" class="block text-sm font-medium text-gray-700 mb-1">Statut</label>
        <div class="relative">
            <select id="productStatus" class="w-full px-4 py-2 pr-8 border border-gray-300 rounded appearance-none focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                <option value="active">Actif</option>
                <option value="inactive">Inactif</option>
                <option value="draft">Brouillon</option>
            </select>
            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                <i class="ri-arrow-down-s-line text-gray-400"></i>
            </div>
        </div>
    </div>
</div>

<div class="mb-6">
    <label for="productDescription" class="block text-sm font-medium text-gray-700 mb-1">Description détaillée</label>
    <textarea id="productDescription" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"></textarea>
</div>

<div class="mb-6">
    <label class="block text-sm font-medium text-gray-700 mb-2">Images du produit</label>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 flex flex-col items-center justify-center text-center cursor-pointer hover:bg-gray-50">
            <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 mb-2">
                <i class="ri-upload-2-line ri-lg"></i>
            </div>
            <p class="text-sm text-gray-500">Glisser ou cliquer pour ajouter</p>
            <input type="file" class="hidden" id="productImageUpload" accept="image/*">
        </div>
        <!-- Les images existantes seraient générées dynamiquement ici -->
    </div>
</div>

<div class="mb-6">
    <label class="block text-sm font-medium text-gray-700 mb-2">Caractéristiques</label>
    <div class="border border-gray-200 rounded-lg p-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="productMaterial" class="block text-sm font-medium text-gray-700 mb-1">Matière</label>
                <input type="text" id="productMaterial" class="w-full px-3 py-2 border border-gray-300 rounded text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
            </div>
            <div>
                <label for="productColor" class="block text-sm font-medium text-gray-700 mb-1">Couleur principale</label>
                <input type="text" id="productColor" class="w-full px-3 py-2 border border-gray-300 rounded text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
            </div>
            <div>
                <label for="productDimensions" class="block text-sm font-medium text-gray-700 mb-1">Dimensions</label>
                <input type="text" id="productDimensions" placeholder="ex: 21x29.7cm" class="w-full px-3 py-2 border border-gray-300 rounded text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
            </div>
            <div>
                <label for="productWeight" class="block text-sm font-medium text-gray-700 mb-1">Poids (g)</label>
                <input type="number" id="productWeight" class="w-full px-3 py-2 border border-gray-300 rounded text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
            </div>
        </div>
    </div>
</div>

<div class="mb-6">
    <label class="block text-sm font-medium text-gray-700 mb-2">Disponibilité</label>
    <div class="flex items-center space-x-4">
        <div class="flex items-center">
            <input type="radio" id="availableNow" name="availability" value="now" class="custom-radio mr-2" checked>
            <label for="availableNow" class="text-sm text-gray-700">Disponible immédiatement</label>
        </div>
        <div class="flex items-center">
            <input type="radio" id="availableSoon" name="availability" value="soon" class="custom-radio mr-2">
            <label for="availableSoon" class="text-sm text-gray-700">Disponible sous 48h</label>
        </div>
        <div class="flex items-center">
            <input type="radio" id="availablePreorder" name="availability" value="preorder" class="custom-radio mr-2">
            <label for="availablePreorder" class="text-sm text-gray-700">Précommande</label>
        </div>
    </div>
</div>

<div class="flex justify-end space-x-3">
    <button type="button" id="cancelProductBtn" class="px-4 py-2 border border-gray-300 rounded-button text-sm font-medium text-gray-700 whitespace-nowrap hover:bg-gray-50 transition-colors">
        Annuler
    </button>
    <button type="button" id="saveAsDraftBtn" class="px-4 py-2 border border-gray-300 rounded-button text-sm font-medium text-gray-700 whitespace-nowrap hover:bg-gray-50 transition-colors">
        Enregistrer comme brouillon
    </button>
    <button type="submit" class="px-4 py-2 bg-primary text-white rounded-button text-sm font-medium whitespace-nowrap hover:bg-primary-dark transition-colors">
        Publier le produit
    </button>
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

    <?php include 'config/menu/customers/footer-admin.php'; ?>
</body>
</html>