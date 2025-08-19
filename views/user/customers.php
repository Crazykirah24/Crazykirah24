<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Clients</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3b82f6',
                        secondary: '#6366f1'
                    },
                    borderRadius: {
                        'none': '0px',
                        'sm': '4px',
                        DEFAULT: '8px',
                        'md': '12px',
                        'lg': '16px',
                        'xl': '20px',
                        '2xl': '24px',
                        '3xl': '32px',
                        'full': '9999px',
                        'button': '8px'
                    }
                }
            }
        }
    </script>
    <style>
        :where([class^="ri-"])::before {
            content: "\f3c2";
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-sm border-r border-gray-200">
            <div class="p-6">
                <div class="font-['Pacifico'] text-2xl text-primary">logo</div>
            </div>
            <nav class="mt-8">
                <div class="px-6 py-2">
                    <div class="text-xs font-semibold text-gray-400 uppercase tracking-wide">MENU PRINCIPAL</div>
                </div>
                <ul class="mt-4 space-y-1">
                    <li>
                        <div class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 cursor-pointer">
                            <div class="w-5 h-5 flex items-center justify-center mr-3">
                                <i class="ri-dashboard-line"></i>
                            </div>
                            Tableau de bord
                        </div>
                    </li>
                    <li>
                        <a href="https://readdy.ai/home/0315292c-8b12-4203-b5b3-638795f6d717/cc896652-0f08-41ea-b053-86dac8aa98db" data-readdy="true" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                            <div class="w-5 h-5 flex items-center justify-center mr-3">
                                <i class="ri-box-line"></i>
                            </div>
                            Produits
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center px-6 py-3 text-primary bg-blue-50 border-r-2 border-primary">
                            <div class="w-5 h-5 flex items-center justify-center mr-3">
                                <i class="ri-user-line"></i>
                            </div>
                            Clients
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 cursor-pointer">
                            <div class="w-5 h-5 flex items-center justify-center mr-3">
                                <i class="ri-shopping-cart-line"></i>
                            </div>
                            Commandes
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 cursor-pointer">
                            <div class="w-5 h-5 flex items-center justify-center mr-3">
                                <i class="ri-bar-chart-line"></i>
                            </div>
                            Analyses
                        </div>
                    </li>
                </ul>
                <div class="px-6 py-2 mt-8">
                    <div class="text-xs font-semibold text-gray-400 uppercase tracking-wide">PARAMÈTRES</div>
                </div>
                <ul class="mt-4 space-y-1">
                    <li>
                        <div class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 cursor-pointer">
                            <div class="w-5 h-5 flex items-center justify-center mr-3">
                                <i class="ri-settings-line"></i>
                            </div>
                            Configuration
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 cursor-pointer">
                            <div class="w-5 h-5 flex items-center justify-center mr-3">
                                <i class="ri-user-settings-line"></i>
                            </div>
                            Profil
                        </div>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <header class="bg-white border-b border-gray-200 px-6 py-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div>
                            <h1 class="text-2xl font-semibold text-gray-900">Clients</h1>
                            <div class="flex items-center text-sm text-gray-500 mt-1">
                                <span>Accueil</span>
                                <div class="w-4 h-4 flex items-center justify-center mx-2">
                                    <i class="ri-arrow-right-s-line text-xs"></i>
                                </div>
                                <span>Clients</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <input type="text" placeholder="Rechercher des clients..." class="w-80 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                            <div class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 flex items-center justify-center">
                                <i class="ri-search-line text-gray-400 text-sm"></i>
                            </div>
                        </div>
                        <button class="p-2 text-gray-400 hover:text-gray-600 rounded-lg hover:bg-gray-100">
                            <div class="w-5 h-5 flex items-center justify-center">
                                <i class="ri-notification-line"></i>
                            </div>
                        </button>
                        <button class="p-2 text-gray-400 hover:text-gray-600 rounded-lg hover:bg-gray-100">
                            <div class="w-5 h-5 flex items-center justify-center">
                                <i class="ri-settings-line"></i>
                            </div>
                        </button>
                    </div>
                </div>
            </header>

            <!-- Action Bar -->
            <div class="bg-white border-b border-gray-200 px-6 py-4">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-600">
                        Jeudi 17 juillet 2025
                    </div>
                    <div class="flex items-center space-x-3">
                        <button class="flex items-center px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-button hover:bg-gray-50 whitespace-nowrap !rounded-button">
                            <div class="w-4 h-4 flex items-center justify-center mr-2">
                                <i class="ri-download-line text-sm"></i>
                            </div>
                            Exporter
                        </button>
                        <button id="addClientBtn" class="flex items-center px-4 py-2 text-white bg-primary border border-primary rounded-button hover:bg-blue-600 whitespace-nowrap !rounded-button">
                            <div class="w-4 h-4 flex items-center justify-center mr-2">
                                <i class="ri-add-line text-sm"></i>
                            </div>
                            Ajouter un client
                        </button>
                    </div>
                </div>
            </div>

            <!-- Filters -->
            <div class="bg-white border-b border-gray-200 px-6 py-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <select class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-primary focus:border-transparent pr-8">
                            <option>Tous les statuts</option>
                            <option>Actif</option>
                            <option>Inactif</option>
                        </select>
                        <select class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-primary focus:border-transparent pr-8">
                            <option>Type de client</option>
                            <option>Particulier</option>
                            <option>Professionnel</option>
                        </select>
                        <select class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-primary focus:border-transparent pr-8">
                            <option>Pays</option>
                            <option>France</option>
                            <option>Belgique</option>
                            <option>Suisse</option>
                            <option>Canada</option>
                        </select>
                        <select class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-primary focus:border-transparent pr-8">
                            <option>Trier par</option>
                            <option>Nom A-Z</option>
                            <option>Nom Z-A</option>
                            <option>Date d'inscription</option>
                            <option>Dernière activité</option>
                        </select>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-button hover:bg-gray-50 whitespace-nowrap !rounded-button">
                            Réinitialiser
                        </button>
                        <button class="px-4 py-2 text-white bg-primary border border-primary rounded-button hover:bg-blue-600 whitespace-nowrap !rounded-button">
                            Appliquer
                        </button>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="flex-1 p-6">
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <!-- Table Header -->
                    <div class="px-6 py-4 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-medium text-gray-900">Liste des clients</h3>
                            <div class="text-sm text-gray-500">
                                1 247 clients au total
                            </div>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="w-12 px-6 py-3 text-left">
                                        <input type="checkbox" class="rounded border-gray-300 text-primary focus:ring-primary">
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Téléphone</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date d'inscription</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <input type="checkbox" class="rounded border-gray-300 text-primary focus:ring-primary">
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                                <span class="text-sm font-medium text-blue-600">ML</span>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">Marie Lefebvre</div>
                                                <div class="text-sm text-gray-500">Particulier</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900">marie.lefebvre@email.com</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">+33 1 23 45 67 89</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">15 mars 2024</td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Actif</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center space-x-2">
                                            <button class="p-1 text-gray-400 hover:text-blue-600 rounded">
                                                <div class="w-4 h-4 flex items-center justify-center">
                                                    <i class="ri-edit-line text-sm"></i>
                                                </div>
                                            </button>
                                            <button class="p-1 text-gray-400 hover:text-red-600 rounded delete-btn">
                                                <div class="w-4 h-4 flex items-center justify-center">
                                                    <i class="ri-delete-bin-line text-sm"></i>
                                                </div>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <input type="checkbox" class="rounded border-gray-300 text-primary focus:ring-primary">
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center mr-3">
                                                <span class="text-sm font-medium text-purple-600">JD</span>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">Jean Dupont</div>
                                                <div class="text-sm text-gray-500">Professionnel</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900">jean.dupont@entreprise.fr</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">+33 1 98 76 54 32</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">28 février 2024</td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Actif</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center space-x-2">
                                            <button class="p-1 text-gray-400 hover:text-blue-600 rounded">
                                                <div class="w-4 h-4 flex items-center justify-center">
                                                    <i class="ri-edit-line text-sm"></i>
                                                </div>
                                            </button>
                                            <button class="p-1 text-gray-400 hover:text-red-600 rounded delete-btn">
                                                <div class="w-4 h-4 flex items-center justify-center">
                                                    <i class="ri-delete-bin-line text-sm"></i>
                                                </div>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <input type="checkbox" class="rounded border-gray-300 text-primary focus:ring-primary">
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-3">
                                                <span class="text-sm font-medium text-green-600">SM</span>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">Sophie Martin</div>
                                                <div class="text-sm text-gray-500">Particulier</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900">sophie.martin@gmail.com</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">+33 6 12 34 56 78</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">10 janvier 2024</td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Inactif</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center space-x-2">
                                            <button class="p-1 text-gray-400 hover:text-blue-600 rounded">
                                                <div class="w-4 h-4 flex items-center justify-center">
                                                    <i class="ri-edit-line text-sm"></i>
                                                </div>
                                            </button>
                                            <button class="p-1 text-gray-400 hover:text-red-600 rounded delete-btn">
                                                <div class="w-4 h-4 flex items-center justify-center">
                                                    <i class="ri-delete-bin-line text-sm"></i>
                                                </div>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <input type="checkbox" class="rounded border-gray-300 text-primary focus:ring-primary">
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center mr-3">
                                                <span class="text-sm font-medium text-orange-600">PB</span>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">Pierre Bernard</div>
                                                <div class="text-sm text-gray-500">Professionnel</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900">p.bernard@consulting.be</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">+32 2 123 45 67</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">5 décembre 2023</td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Actif</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center space-x-2">
                                            <button class="p-1 text-gray-400 hover:text-blue-600 rounded">
                                                <div class="w-4 h-4 flex items-center justify-center">
                                                    <i class="ri-edit-line text-sm"></i>
                                                </div>
                                            </button>
                                            <button class="p-1 text-gray-400 hover:text-red-600 rounded delete-btn">
                                                <div class="w-4 h-4 flex items-center justify-center">
                                                    <i class="ri-delete-bin-line text-sm"></i>
                                                </div>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <input type="checkbox" class="rounded border-gray-300 text-primary focus:ring-primary">
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-pink-100 rounded-full flex items-center justify-center mr-3">
                                                <span class="text-sm font-medium text-pink-600">AR</span>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">Anne Rousseau</div>
                                                <div class="text-sm text-gray-500">Particulier</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900">anne.rousseau@outlook.fr</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">+41 22 345 67 89</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">22 novembre 2023</td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Actif</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center space-x-2">
                                            <button class="p-1 text-gray-400 hover:text-blue-600 rounded">
                                                <div class="w-4 h-4 flex items-center justify-center">
                                                    <i class="ri-edit-line text-sm"></i>
                                                </div>
                                            </button>
                                            <button class="p-1 text-gray-400 hover:text-red-600 rounded delete-btn">
                                                <div class="w-4 h-4 flex items-center justify-center">
                                                    <i class="ri-delete-bin-line text-sm"></i>
                                                </div>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="px-6 py-4 border-t border-gray-200">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <span class="text-sm text-gray-700">Afficher</span>
                                <select class="px-3 py-1 border border-gray-300 rounded text-sm focus:ring-2 focus:ring-primary focus:border-transparent pr-8">
                                    <option>10</option>
                                    <option>25</option>
                                    <option>50</option>
                                    <option>100</option>
                                </select>
                                <span class="text-sm text-gray-700">clients par page</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="text-sm text-gray-700">1-10 sur 1 247 clients</span>
                                <div class="flex items-center space-x-1 ml-4">
                                    <button class="p-2 text-gray-400 hover:text-gray-600 rounded">
                                        <div class="w-4 h-4 flex items-center justify-center">
                                            <i class="ri-arrow-left-s-line"></i>
                                        </div>
                                    </button>
                                    <button class="px-3 py-1 text-white bg-primary rounded">1</button>
                                    <button class="px-3 py-1 text-gray-700 hover:bg-gray-100 rounded">2</button>
                                    <button class="px-3 py-1 text-gray-700 hover:bg-gray-100 rounded">3</button>
                                    <span class="px-2 text-gray-500">...</span>
                                    <button class="px-3 py-1 text-gray-700 hover:bg-gray-100 rounded">125</button>
                                    <button class="p-2 text-gray-400 hover:text-gray-600 rounded">
                                        <div class="w-4 h-4 flex items-center justify-center">
                                            <i class="ri-arrow-right-s-line"></i>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Client Modal -->
    <div id="addClientModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl mx-4">
            <div class="flex items-center justify-between p-6 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Ajouter un nouveau client</h3>
                <button id="closeAddModal" class="text-gray-400 hover:text-gray-600">
                    <div class="w-6 h-6 flex items-center justify-center">
                        <i class="ri-close-line"></i>
                    </div>
                </button>
            </div>
            <div class="p-6">
                <form class="space-y-6">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Prénom</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nom</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Téléphone</label>
                            <input type="tel" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Type de client</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-sm pr-8">
                                <option>Particulier</option>
                                <option>Professionnel</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Adresse</label>
                        <textarea rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-sm"></textarea>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Ville</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Pays</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-sm pr-8">
                                <option>France</option>
                                <option>Belgique</option>
                                <option>Suisse</option>
                                <option>Canada</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="flex items-center justify-end space-x-3 p-6 border-t border-gray-200">
                <button id="cancelAddClient" class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-button hover:bg-gray-50 whitespace-nowrap !rounded-button">
                    Annuler
                </button>
                <button class="px-4 py-2 text-white bg-primary border border-primary rounded-button hover:bg-blue-600 whitespace-nowrap !rounded-button">
                    Enregistrer
                </button>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-md mx-4">
            <div class="p-6">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mr-4">
                        <div class="w-6 h-6 flex items-center justify-center">
                            <i class="ri-alert-line text-red-600"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Supprimer le client</h3>
                        <p class="text-sm text-gray-500 mt-1">Cette action est irréversible</p>
                    </div>
                </div>
                <p class="text-gray-700 mb-6">
                    Êtes-vous sûr de vouloir supprimer ce client ? Toutes les données associées seront définitivement perdues.
                </p>
                <div class="flex items-center justify-end space-x-3">
                    <button id="cancelDelete" class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-button hover:bg-gray-50 whitespace-nowrap !rounded-button">
                        Annuler
                    </button>
                    <button id="confirmDelete" class="px-4 py-2 text-white bg-red-600 border border-red-600 rounded-button hover:bg-red-700 whitespace-nowrap !rounded-button">
                        Supprimer
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script id="modal-functionality">
        document.addEventListener('DOMContentLoaded', function() {
            const addClientBtn = document.getElementById('addClientBtn');
            const addClientModal = document.getElementById('addClientModal');
            const closeAddModal = document.getElementById('closeAddModal');
            const cancelAddClient = document.getElementById('cancelAddClient');

            addClientBtn.addEventListener('click', function() {
                addClientModal.classList.remove('hidden');
            });

            closeAddModal.addEventListener('click', function() {
                addClientModal.classList.add('hidden');
            });

            cancelAddClient.addEventListener('click', function() {
                addClientModal.classList.add('hidden');
            });

            addClientModal.addEventListener('click', function(e) {
                if (e.target === addClientModal) {
                    addClientModal.classList.add('hidden');
                }
            });
        });
    </script>

    <script id="delete-functionality">
        document.addEventListener('DOMContentLoaded', function() {
            const deleteModal = document.getElementById('deleteModal');
            const cancelDelete = document.getElementById('cancelDelete');
            const confirmDelete = document.getElementById('confirmDelete');
            const deleteBtns = document.querySelectorAll('.delete-btn');

            deleteBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    deleteModal.classList.remove('hidden');
                });
            });

            cancelDelete.addEventListener('click', function() {
                deleteModal.classList.add('hidden');
            });

            confirmDelete.addEventListener('click', function() {
                deleteModal.classList.add('hidden');
            });

            deleteModal.addEventListener('click', function(e) {
                if (e.target === deleteModal) {
                    deleteModal.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>