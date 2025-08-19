<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface Administrateur</title>
    <?php include 'config/content.php'; ?>
</head>
<body class="min-h-screen">
    <div class="flex h-screen overflow-hidden">
        <?php include 'config/sideBar.php'; ?>
        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto bg-gray-50">
            <!-- Header -->
            <header class="bg-white shadow-sm z-10 sticky top-0">
                <div class="flex items-center justify-between px-6 py-4">
                    <h1 class="text-xl font-semibold text-gray-800">Tableau de bord</h1>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <input type="text" placeholder="Rechercher..." class="w-64 pl-10 pr-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
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

            <!-- Dashboard Content -->
            <div class="p-6">
                <!-- Date -->
                <div class="mb-6 flex justify-between items-center">
                    <h2 class="text-sm font-medium text-gray-500">Mercredi, 21 Mai 2025</h2>
                    <div class="flex space-x-2">
                        <button class="px-4 py-2 bg-white border border-gray-300 rounded-button text-sm font-medium text-gray-700 flex items-center whitespace-nowrap">
                            <div class="w-4 h-4 flex items-center justify-center mr-2">
                                <i class="ri-download-line"></i>
                            </div>
                            Exporter
                        </button>
                        <button class="px-4 py-2 bg-primary text-white rounded-button text-sm font-medium flex items-center whitespace-nowrap">
                            <div class="w-4 h-4 flex items-center justify-center mr-2">
                                <i class="ri-refresh-line"></i>
                            </div>
                            Actualiser
                        </button>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <div class="bg-white rounded shadow p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Ventes aujourd'hui</p>
                                <h3 class="text-2xl font-bold text-gray-900">2 845 €</h3>
                            </div>
                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                                <i class="ri-shopping-cart-2-line ri-lg"></i>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <span class="text-green-500 text-sm font-medium flex items-center">
                                <i class="ri-arrow-up-line mr-1"></i>
                                12.5%
                            </span>
                            <span class="text-gray-500 text-sm ml-2">vs hier</span>
                        </div>
                    </div>
                    <div class="bg-white rounded shadow p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Nouvelles commandes</p>
                                <h3 class="text-2xl font-bold text-gray-900">24</h3>
                            </div>
                            <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center text-purple-600">
                                <i class="ri-inbox-line ri-lg"></i>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <span class="text-green-500 text-sm font-medium flex items-center">
                                <i class="ri-arrow-up-line mr-1"></i>
                                8.2%
                            </span>
                            <span class="text-gray-500 text-sm ml-2">vs hier</span>
                        </div>
                    </div>
                    <div class="bg-white rounded shadow p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Nouveaux clients</p>
                                <h3 class="text-2xl font-bold text-gray-900">12</h3>
                            </div>
                            <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center text-green-600">
                                <i class="ri-user-add-line ri-lg"></i>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <span class="text-red-500 text-sm font-medium flex items-center">
                                <i class="ri-arrow-down-line mr-1"></i>
                                3.1%
                            </span>
                            <span class="text-gray-500 text-sm ml-2">vs hier</span>
                        </div>
                    </div>
                    <div class="bg-white rounded shadow p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Produits en rupture</p>
                                <h3 class="text-2xl font-bold text-gray-900">5</h3>
                            </div>
                            <div class="w-10 h-10 rounded-full bg-red-100 flex items-center     justify-center text-red-600">
                                <i class="ri-alert-line ri-lg"></i>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <span class="text-red-500 text-sm font-medium flex items-center">
                                <i class="ri-arrow-up-line mr-1"></i>
                                2
                            </span>
                            <span class="text-gray-500 text-sm ml-2">vs hier</span>
                        </div>
                    </div>
                </div>

                <!-- Charts Section -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                    <div class="bg-white rounded shadow p-6 lg:col-span-2">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-lg font-semibold text-gray-800">Ventes mensuelles</h3>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-full">Jour</button>
                                <button class="px-3 py-1 text-xs font-medium text-white bg-primary rounded-full">Semaine</button>
                                <button class="px-3 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-full">Mois</button>
                                <button class="px-3 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-full">Année</button>
                            </div>
                        </div>
                        <div id="sales-chart" class="h-80"></div>
                    </div>

                    <div class="bg-white rounded shadow p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-lg font-semibold text-gray-800">Répartition des ventes</h3>
                            <button class="text-gray-500 hover:text-gray-700">
                                <i class="ri-more-2-fill"></i>
                            </button>
                        </div>
                        <div id="category-chart" class="h-80"></div>
                    </div>
                </div>

                <!-- Recent Orders & Low Stock -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                    <div class="bg-white rounded shadow lg:col-span-2">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-semibold text-gray-800">Commandes récentes</h3>
                                <a href="#" class="text-sm font-medium text-primary hover:text-primary-dark">Voir tout</a>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produits</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-2458</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Sophie Martin</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">3 articles</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">129,99 €</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Expédiée</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">21/05/2025</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <button class="text-primary hover:text-primary-dark mr-3">
                                                <i class="ri-eye-line"></i>
                                            </button>
                                            <button class="text-gray-500 hover:text-gray-700">
                                                <i class="ri-more-2-fill"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-2457</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Lucas Petit</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1 article</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">59,90 €</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">En préparation</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">21/05/2025</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <button class="text-primary hover:text-primary-dark mr-3">
                                                <i class="ri-eye-line"></i>
                                            </button>
                                            <button class="text-gray-500 hover:text-gray-700">
                                                <i class="ri-more-2-fill"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-2456</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Emma Durand</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2 articles</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">89,95 €</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Payée</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">20/05/2025</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <button class="text-primary hover:text-primary-dark mr-3">
                                                <i class="ri-eye-line"></i>
                                            </button>
                                            <button class="text-gray-500 hover:text-gray-700">
                                                <i class="ri-more-2-fill"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-2455</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Julien Moreau</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">5 articles</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">249,50 €</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Livrée</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">20/05/2025</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <button class="text-primary hover:text-primary-dark mr-3">
                                                <i class="ri-eye-line"></i>
                                            </button>
                                            <button class="text-gray-500 hover:text-gray-700">
                                                <i class="ri-more-2-fill"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-2454</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Camille Leroy</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1 article</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">79,99 €</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Annulée</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">19/05/2025</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <button class="text-primary hover:text-primary-dark mr-3">
                                                <i class="ri-eye-line"></i>
                                            </button>
                                            <button class="text-gray-500 hover:text-gray-700">
                                                <i class="ri-more-2-fill"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="bg-white rounded shadow">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-semibold text-gray-800">Produits en stock faible</h3>
                                <a href="#" class="text-sm font-medium text-primary hover:text-primary-dark">Voir tout</a>
                            </div>
                        </div>
                        <div class="p-6">
                            <ul class="divide-y divide-gray-200">
                                <li class="py-3 flex justify-between items-center">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 flex-shrink-0 bg-gray-100 rounded overflow-hidden">
                                            <img src="https://readdy.ai/api/search-image?query=modern%20minimalist%20white%20sneakers%20on%20plain%20background%2C%20product%20photography&width=100&height=100&seq=1&orientation=squarish" alt="Sneakers" class="w-full h-full object-cover">
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">Sneakers Blanc Premium</p>
                                            <p class="text-xs text-gray-500">SKU: PRD-001</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-sm font-bold text-red-500">2 en stock</p>
                                        <p class="text-xs text-gray-500">Min: 10</p>
                                    </div>
                                </li>
                                <li class="py-3 flex justify-between items-center">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 flex-shrink-0 bg-gray-100 rounded overflow-hidden">
                                            <img src="https://readdy.ai/api/search-image?query=modern%20minimalist%20black%20leather%20wallet%20on%20plain%20background%2C%20product%20photography&width=100&height=100&seq=2&orientation=squarish" alt="Portefeuille" class="w-full h-full object-cover">
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">Portefeuille Cuir Noir</p>
                                            <p class="text-xs text-gray-500">SKU: PRD-042</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-sm font-bold text-red-500">3 en stock</p>
                                        <p class="text-xs text-gray-500">Min: 15</p>
                                    </div>
                                </li>
                                <li class="py-3 flex justify-between items-center">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 flex-shrink-0 bg-gray-100 rounded overflow-hidden">
                                            <img src="https://readdy.ai/api/search-image?query=modern%20minimalist%20wireless%20earbuds%20on%20plain%20background%2C%20product%20photography&width=100&height=100&seq=3&orientation=squarish" alt="Écouteurs" class="w-full h-full object-cover">
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">Écouteurs Sans Fil Pro</p>
                                            <p class="text-xs text-gray-500">SKU: PRD-128</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-sm font-bold text-orange-500">5 en stock</p>
                                        <p class="text-xs text-gray-500">Min: 20</p>
                                    </div>
                                </li>
                                <li class="py-3 flex justify-between items-center">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 flex-shrink-0 bg-gray-100 rounded overflow-hidden">
                                            <img src="https://readdy.ai/api/search-image?query=modern%20minimalist%20smartphone%20case%20on%20plain%20background%2C%20product%20photography&width=100&height=100&seq=4&orientation=squarish" alt="Coque" class="w-full h-full object-cover">
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">Coque Premium iPhone 16</p>
                                            <p class="text-xs text-gray-500">SKU: PRD-256</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-sm font-bold text-orange-500">8 en stock</p>
                                        <p class="text-xs text-gray-500">Min: 25</p>
                                    </div>
                                </li>
                                <li class="py-3 flex justify-between items-center">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 flex-shrink-0 bg-gray-100 rounded overflow-hidden">
                                            <img src="https://readdy.ai/api/search-image?query=modern%20minimalist%20smartwatch%20on%20plain%20background%2C%20product%20photography&width=100&height=100&seq=5&orientation=squarish" alt="Montre" class="w-full h-full object-cover">
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">Montre Connectée Ultra</p>
                                            <p class="text-xs text-gray-500">SKU: PRD-189</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-sm font-bold text-orange-500">4 en stock</p>
                                        <p class="text-xs text-gray-500">Min: 12</p>
                                    </div>
                                </li>
                            </ul>
                            <button class="w-full mt-4 py-2 bg-gray-100 text-gray-700 rounded-button text-sm font-medium whitespace-nowrap">Commander des stocks</button>
                        </div>
                    </div>
                </div>

                <!-- Recent Activities -->
                <div class="bg-white rounded shadow mb-6">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-800">Activités récentes</h3>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 text-xs font-medium text-white bg-primary rounded-full">Tout</button>
                                <button class="px-3 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-full">Commandes</button>
                                <button class="px-3 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-full">Clients</button>
                                <button class="px-3 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-full">Produits</button>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <ul class="space-y-6">
                            <li class="flex">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-900">Nouvelle commande <span class="font-semibold">#ORD-2458</span> de Sophie Martin</p>
                                    <p class="text-sm text-gray-500">3 articles pour un total de 129,99 €</p>
                                    <p class="text-xs text-gray-400 mt-1">Il y a 10 minutes</p>
                                </div>
                            </li>
                            <li class="flex">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center text-green-600">
                                        <i class="ri-user-add-line"></i>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-900">Nouveau client inscrit : Antoine Dupont</p>
                                    <p class="text-sm text-gray-500">Via la page d'inscription</p>
                                    <p class="text-xs text-gray-400 mt-1">Il y a 25 minutes</p>
                                </div>
                            </li>
                            <li class="flex">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-600">
                                        <i class="ri-truck-line"></i>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-900">Commande <span class="font-semibold">#ORD-2452</span> expédiée</p>
                                    <p class="text-sm text-gray-500">Numéro de suivi : TRK-789456123</p>
                                    <p class="text-xs text-gray-400 mt-1">Il y a 1 heure</p>
                                </div>
                            </li>
                            <li class="flex">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center text-purple-600">
                                        <i class="ri-shopping-bag-line"></i>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-900">Produit mis à jour : Sneakers Blanc Premium</p>
                                    <p class="text-sm text-gray-500">Stock ajouté : +15 unités</p>
                                    <p class="text-xs text-gray-400 mt-1">Il y a 2 heures</p>
                                </div>
                            </li>
                            <li class="flex">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center text-red-600">
                                        <i class="ri-close-circle-line"></i>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-900">Commande <span class="font-semibold">#ORD-2454</span> annulée</p>
                                    <p class="text-sm text-gray-500">Raison : Demande client</p>
                                    <p class="text-xs text-gray-400 mt-1">Il y a 3 heures</p>
                                </div>
                            </li>
                        </ul>
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
                            <label for="productSKU" class="block text-sm font-medium text-gray-700 mb-1">SKU</label>
                            <input type="text" id="productSKU" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>
                        <div>
                            <label for="productCategory" class="block text-sm font-medium text-gray-700 mb-1">Catégorie</label>
                            <div class="relative">
                                <select id="productCategory" class="w-full px-4 py-2 pr-8 border border-gray-300 rounded appearance-none focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                    <option value="">Sélectionner une catégorie</option>
                                    <option value="1">Chaussures</option>
                                    <option value="2">Vêtements</option>
                                    <option value="3">Accessoires</option>
                                    <option value="4">Électronique</option>
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
                                    <option value="1">Nike</option>
                                    <option value="2">Adidas</option>
                                    <option value="3">Puma</option>
                                    <option value="4">Apple</option>
                                    <option value="5">Samsung</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                    <i class="ri-arrow-down-s-line text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="productPrice" class="block text-sm font-medium text-gray-700 mb-1">Prix (€)</label>
                            <input type="number" id="productPrice" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>
                        <div>
                            <label for="productStock" class="block text-sm font-medium text-gray-700 mb-1">Stock</label>
                            <input type="number" id="productStock" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="productDescription" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea id="productDescription" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"></textarea>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Images du produit</label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 flex flex-col items-center justify-center text-center">
                                <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 mb-2">
                                    <i class="ri-upload-2-line ri-lg"></i>
                                </div>
                                <p class="text-sm text-gray-500">Glisser ou cliquer pour ajouter</p>
                            </div>
                            <div class="relative border border-gray-200 rounded-lg overflow-hidden">
                                <img src="https://readdy.ai/api/search-image?query=modern%20minimalist%20white%20sneakers%20on%20plain%20background%2C%20product%20photography&width=200&height=200&seq=10&orientation=squarish" alt="Aperçu produit" class="w-full h-full object-cover">
                                <button class="absolute top-2 right-2 w-6 h-6 rounded-full bg-white shadow flex items-center justify-center text-red-500">
                                    <i class="ri-delete-bin-line"></i>
                                </button>
                            </div>
                            <div class="relative border border-gray-200 rounded-lg overflow-hidden">
                                <img src="https://readdy.ai/api/search-image?query=modern%20minimalist%20white%20sneakers%20side%20view%20on%20plain%20background%2C%20product%20photography&width=200&height=200&seq=11&orientation=squarish" alt="Aperçu produit" class="w-full h-full object-cover">
                                <button class="absolute top-2 right-2 w-6 h-6 rounded-full bg-white shadow flex items-center justify-center text-red-500">
                                    <i class="ri-delete-bin-line"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Variations</label>
                        <div class="border border-gray-200 rounded-lg p-4">
                            <div class="flex justify-between items-center mb-4">
                                <h4 class="text-sm font-medium text-gray-700">Tailles disponibles</h4>
                                <button type="button" class="text-primary hover:text-primary-dark text-sm font-medium">+ Ajouter</button>
                            </div>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <div class="flex items-center">
                                    <input type="checkbox" id="size38" class="custom-checkbox mr-2">
                                    <label for="size38" class="text-sm text-gray-700">38</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="size39" class="custom-checkbox mr-2" checked>
                                    <label for="size39" class="text-sm text-gray-700">39</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="size40" class="custom-checkbox mr-2" checked>
                                    <label for="size40" class="text-sm text-gray-700">40</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="size41" class="custom-checkbox mr-2" checked>
                                    <label for="size41" class="text-sm text-gray-700">41</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="size42" class="custom-checkbox mr-2" checked>
                                    <label for="size42" class="text-sm text-gray-700">42</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="size43" class="custom-checkbox mr-2">
                                    <label for="size43" class="text-sm text-gray-700">43</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="size44" class="custom-checkbox mr-2">
                                    <label for="size44" class="text-sm text-gray-700">44</label>
                                </div>
                            </div>

                            <div class="flex justify-between items-center mb-4">
                                <h4 class="text-sm font-medium text-gray-700">Couleurs disponibles</h4>
                                <button type="button" class="text-primary hover:text-primary-dark text-sm font-medium">+ Ajouter</button>
                            </div>
                            <div class="flex flex-wrap gap-3 mb-4">
                                <div class="flex items-center">
                                    <input type="checkbox" id="colorWhite" class="custom-checkbox mr-2" checked>
                                    <div class="w-4 h-4 rounded-full bg-white border border-gray-300 mr-1"></div>
                                    <label for="colorWhite" class="text-sm text-gray-700">Blanc</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="colorBlack" class="custom-checkbox mr-2">
                                    <div class="w-4 h-4 rounded-full bg-black mr-1"></div>
                                    <label for="colorBlack" class="text-sm text-gray-700">Noir</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="colorBlue" class="custom-checkbox mr-2">
                                    <div class="w-4 h-4 rounded-full bg-blue-500 mr-1"></div>
                                    <label for="colorBlue" class="text-sm text-gray-700">Bleu</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="colorRed" class="custom-checkbox mr-2">
                                    <div class="w-4 h-4 rounded-full bg-red-500 mr-1"></div>
                                    <label for="colorRed" class="text-sm text-gray-700">Rouge</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Promotion</label>
                        <div class="flex items-center mb-4">
                            <label class="custom-switch mr-3">
                                <input type="checkbox" id="promotionToggle">
                                <span class="switch-slider"></span>
                            </label>
                            <label for="promotionToggle" class="text-sm text-gray-700">Activer la promotion</label>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label for="discountType" class="block text-sm font-medium text-gray-700 mb-1">Type de remise</label>
                                <div class="relative">
                                    <select id="discountType" class="w-full px-4 py-2 pr-8 border border-gray-300 rounded appearance-none focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                        <option value="percentage">Pourcentage (%)</option>
                                        <option value="fixed">Montant fixe (€)</option>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                        <i class="ri-arrow-down-s-line text-gray-400"></i>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="discountValue" class="block text-sm font-medium text-gray-700 mb-1">Valeur</label>
                                <input type="number" id="discountValue" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                            </div>
                            <div>
                                <label for="discountEndDate" class="block text-sm font-medium text-gray-700 mb-1">Date de fin</label>
                                <input type="date" id="discountEndDate" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">SEO</label>
                        <div class="space-y-4">
                            <div>
                                <label for="metaTitle" class="block text-sm font-medium text-gray-700 mb-1">Méta-titre</label>
                                <input type="text" id="metaTitle" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                            </div>
                            <div>
                                <label for="metaDescription" class="block text-sm font-medium text-gray-700 mb-1">Méta-description</label>
                                <textarea id="metaDescription" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3">
                        <button type="button" id="cancelProductBtn" class="px-4 py-2 border border-gray-300 rounded-button text-sm font-medium text-gray-700 whitespace-nowrap">Annuler</button>
                        <button type="button" id="saveAsDraftBtn" class="px-4 py-2 border border-gray-300 rounded-button text-sm font-medium text-gray-700 whitespace-nowrap">Enregistrer comme brouillon</button>
                        <button type="submit" class="px-4 py-2 bg-primary text-white rounded-button text-sm font-medium whitespace-nowrap">Publier le produit</button>
                    </div>
                </form>
            </div>
        </div>
    
    </div>
</body>
</html>

<?php include 'config/content.php'; ?>