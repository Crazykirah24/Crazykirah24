<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gestion des Commandes - Interface Administrateur</title>
<script src="https://cdn.tailwindcss.com/3.4.16"></script>
<script>tailwind.config={theme:{extend:{colors:{primary:'#4f46e5',secondary:'#6366f1'},borderRadius:{'none':'0px','sm':'4px',DEFAULT:'8px','md':'12px','lg':'16px','xl':'20px','2xl':'24px','3xl':'32px','full':'9999px','button':'8px'}}}}</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
<style>
:where([class^="ri-"])::before { content: "\f3c2"; }
body {
font-family: 'Inter', sans-serif;
background-color: #f9fafb;
}
.sidebar-item.active {
background-color: rgba(79, 70, 229, 0.1);
color: #4f46e5;
border-left: 3px solid #4f46e5;
}
.custom-checkbox {
appearance: none;
width: 18px;
height: 18px;
border: 2px solid #d1d5db;
border-radius: 4px;
position: relative;
cursor: pointer;
transition: all 0.2s;
}
.custom-checkbox:checked {
background-color: #4f46e5;
border-color: #4f46e5;
}
.custom-checkbox:checked::after {
content: '';
position: absolute;
left: 5px;
top: 2px;
width: 6px;
height: 10px;
border: solid white;
border-width: 0 2px 2px 0;
transform: rotate(45deg);
}
.status-badge {
padding: 4px 12px;
border-radius: 9999px;
font-size: 0.75rem;
font-weight: 500;
}
.status-pending { background-color: #fef3c7; color: #d97706; }
.status-processing { background-color: #dbeafe; color: #2563eb; }
.status-shipped { background-color: #d1fae5; color: #059669; }
.status-delivered { background-color: #dcfce7; color: #16a34a; }
.status-cancelled { background-color: #fee2e2; color: #dc2626; }
.filter-button {
padding: 8px 16px;
border-radius: 8px;
font-size: 0.875rem;
font-weight: 500;
border: 1px solid #e5e7eb;
background-color: white;
color: #6b7280;
cursor: pointer;
transition: all 0.2s;
}
.filter-button.active {
background-color: #4f46e5;
color: white;
border-color: #4f46e5;
}
.filter-button:hover:not(.active) {
background-color: #f9fafb;
border-color: #d1d5db;
}
.bulk-actions {
transform: translateY(-100%);
opacity: 0;
transition: all 0.3s ease;
}
.bulk-actions.show {
transform: translateY(0);
opacity: 1;
}
table th {
position: sticky;
top: 0;
background-color: white;
z-index: 10;
}
</style>
</head>
<body class="min-h-screen">
<div class="flex h-screen overflow-hidden">
<aside class="w-64 bg-white shadow-md z-10 flex flex-col">
<div class="p-4 border-b flex items-center">
<span class="text-2xl font-['Pacifico'] text-primary">logo</span>
<button class="ml-auto w-8 h-8 flex items-center justify-center text-gray-500 hover:text-gray-700">
<i class="ri-menu-fold-line ri-lg"></i>
</button>
</div>
<div class="flex-1 overflow-y-auto py-4">
<nav class="px-2 space-y-1">
<a href="https://readdy.ai/home/0315292c-8b12-4203-b5b3-638795f6d717/2d8b886c-4b4a-4c10-bfcb-68074f22def3" data-readdy="true" class="sidebar-item flex items-center px-3 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-md">
<div class="w-5 h-5 flex items-center justify-center mr-3">
<i class="ri-dashboard-line"></i>
</div>
<span>Tableau de bord</span>
</a>
<a href="#" class="sidebar-item flex items-center px-3 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-md">
<div class="w-5 h-5 flex items-center justify-center mr-3">
<i class="ri-shopping-bag-line"></i>
</div>
<span>Produits</span>
</a>
<a href="#" class="sidebar-item flex items-center px-3 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-md">
<div class="w-5 h-5 flex items-center justify-center mr-3">
<i class="ri-user-line"></i>
</div>
<span>Clients</span>
</a>
<a href="#" class="sidebar-item active flex items-center px-3 py-3 text-sm font-medium rounded-md">
<div class="w-5 h-5 flex items-center justify-center mr-3">
<i class="ri-shopping-cart-line"></i>
</div>
<span>Commandes</span>
</a>
<a href="#" class="sidebar-item flex items-center px-3 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-md">
<div class="w-5 h-5 flex items-center justify-center mr-3">
<i class="ri-bar-chart-line"></i>
</div>
<span>Rapports</span>
</a>
<a href="#" class="sidebar-item flex items-center px-3 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-md">
<div class="w-5 h-5 flex items-center justify-center mr-3">
<i class="ri-file-text-line"></i>
</div>
<span>Contenu</span>
</a>
<a href="#" class="sidebar-item flex items-center px-3 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-md">
<div class="w-5 h-5 flex items-center justify-center mr-3">
<i class="ri-settings-line"></i>
</div>
<span>Paramètres</span>
</a>
</nav>
</div>
<div class="p-4 border-t">
<div class="flex items-center">
<img class="h-8 w-8 rounded-full" src="https://readdy.ai/api/search-image?query=professional%20headshot%20of%20a%20young%20business%20man%20with%20short%20hair%2C%20wearing%20a%20business%20suit%2C%20high%20quality%20portrait%20photo&width=200&height=200&seq=123&orientation=squarish" alt="Photo de profil">
<div class="ml-3">
<p class="text-sm font-medium text-gray-700">Thomas Dubois</p>
<p class="text-xs font-medium text-gray-500">Administrateur</p>
</div>
<button class="ml-auto w-8 h-8 flex items-center justify-center text-gray-500 hover:text-gray-700">
<i class="ri-logout-box-line"></i>
</button>
</div>
</div>
</aside>

<main class="flex-1 overflow-y-auto bg-gray-50">
<header class="bg-white shadow-sm z-20 sticky top-0">
<div class="flex items-center justify-between px-6 py-4">
<div class="flex items-center">
<a href="https://readdy.ai/home/0315292c-8b12-4203-b5b3-638795f6d717/2d8b886c-4b4a-4c10-bfcb-68074f22def3" data-readdy="true" class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-gray-700 mr-4">
<i class="ri-arrow-left-line ri-lg"></i>
</a>
<h1 class="text-xl font-semibold text-gray-800">Gestion des Commandes</h1>
</div>
<button class="px-4 py-2 bg-primary text-white rounded-button text-sm font-medium flex items-center whitespace-nowrap">
<div class="w-4 h-4 flex items-center justify-center mr-2">
<i class="ri-download-line"></i>
</div>
Exporter
</button>
</div>

<div class="grid grid-cols-1 md:grid-cols-4 gap-6 px-6 py-4 bg-white border-b">
<div class="text-center">
<div class="text-2xl font-bold text-gray-900">2,847</div>
<div class="text-sm text-gray-500">Total Commandes</div>
</div>
<div class="text-center">
<div class="text-2xl font-bold text-green-600">€ 184,290</div>
<div class="text-sm text-gray-500">Chiffre d'Affaires</div>
</div>
<div class="text-center">
<div class="text-2xl font-bold text-orange-600">127</div>
<div class="text-sm text-gray-500">En Attente</div>
</div>
<div class="text-center">
<div class="text-2xl font-bold text-blue-600">94.2%</div>
<div class="text-sm text-gray-500">Taux de Conversion</div>
</div>
</div>
</header>

<div class="bulk-actions fixed top-16 left-64 right-0 bg-primary text-white px-6 py-3 z-15" id="bulkActions">
<div class="flex items-center justify-between">
<div class="flex items-center">
<span class="text-sm font-medium mr-4" id="selectedCount">0 commande(s) sélectionnée(s)</span>
<div class="flex space-x-2">
<button class="px-3 py-1 bg-white bg-opacity-20 rounded-button text-sm font-medium whitespace-nowrap">
Modifier le statut
</button>
<button class="px-3 py-1 bg-white bg-opacity-20 rounded-button text-sm font-medium whitespace-nowrap">
Exporter
</button>
<button class="px-3 py-1 bg-red-600 rounded-button text-sm font-medium whitespace-nowrap">
Supprimer
</button>
</div>
</div>
<button class="w-6 h-6 flex items-center justify-center hover:bg-white hover:bg-opacity-20 rounded" id="closeBulkActions">
<i class="ri-close-line"></i>
</button>
</div>
</div>

<div class="p-6">
<div class="bg-white rounded shadow mb-6">
<div class="p-6 border-b">
<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between space-y-4 lg:space-y-0">
<div class="flex-1 max-w-md">
<div class="relative">
<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
<i class="ri-search-line text-gray-400"></i>
</div>
<input type="text" placeholder="Rechercher par numéro, client..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
</div>
</div>
<div class="flex flex-wrap gap-2">
<button class="filter-button active" data-status="all">Tous</button>
<button class="filter-button" data-status="pending">En attente</button>
<button class="filter-button" data-status="processing">En cours</button>
<button class="filter-button" data-status="shipped">Expédiée</button>
<button class="filter-button" data-status="delivered">Livrée</button>
<button class="filter-button" data-status="cancelled">Annulée</button>
</div>
<div class="flex items-center space-x-2">
<div class="relative">
<select class="px-3 py-2 pr-8 border border-gray-300 rounded appearance-none focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
<option>Aujourd'hui</option>
<option>Cette semaine</option>
<option>Ce mois</option>
<option>Personnalisé</option>
</select>
<div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
<i class="ri-arrow-down-s-line text-gray-400"></i>
</div>
</div>
</div>
</div>
</div>

<div class="overflow-x-auto">
<table class="w-full">
<thead>
<tr class="bg-gray-50 border-b">
<th class="px-6 py-3 text-left">
<input type="checkbox" class="custom-checkbox" id="selectAll">
</th>
<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:text-gray-700">
<div class="flex items-center">
N° Commande
<i class="ri-arrow-up-down-line ml-1"></i>
</div>
</th>
<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:text-gray-700">
<div class="flex items-center">
Client
<i class="ri-arrow-up-down-line ml-1"></i>
</div>
</th>
<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:text-gray-700">
<div class="flex items-center">
Date
<i class="ri-arrow-up-down-line ml-1"></i>
</div>
</th>
<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:text-gray-700">
<div class="flex items-center">
Montant
<i class="ri-arrow-up-down-line ml-1"></i>
</div>
</th>
<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
Statut
</th>
<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
Actions
</th>
</tr>
</thead>
<tbody class="bg-white divide-y divide-gray-200">
<tr class="hover:bg-gray-50">
<td class="px-6 py-4">
<input type="checkbox" class="custom-checkbox row-checkbox">
</td>
<td class="px-6 py-4">
<button class="text-primary hover:text-primary-dark font-medium text-sm">#CMD-2024-001</button>
</td>
<td class="px-6 py-4">
<div class="flex items-center">
<img class="h-8 w-8 rounded-full" src="https://readdy.ai/api/search-image?query=professional%20headshot%20of%20a%20young%20woman%20with%20blonde%20hair%2C%20smiling%2C%20business%20casual%20attire&width=100&height=100&seq=301&orientation=squarish" alt="Client">
<div class="ml-3">
<div class="text-sm font-medium text-gray-900">Sophie Moreau</div>
<div class="text-sm text-gray-500">sophie.moreau@email.fr</div>
</div>
</div>
</td>
<td class="px-6 py-4">
<div class="text-sm text-gray-900">15 Jan 2024</div>
<div class="text-sm text-gray-500">14:32</div>
</td>
<td class="px-6 py-4">
<div class="text-sm font-medium text-gray-900">€ 127,50</div>
</td>
<td class="px-6 py-4">
<span class="status-badge status-delivered">Livrée</span>
</td>
<td class="px-6 py-4">
<div class="relative">
<button class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-gray-600 action-menu-btn">
<i class="ri-more-2-line"></i>
</button>
<div class="action-menu absolute right-0 mt-2 w-48 bg-white rounded shadow-lg border z-20 hidden">
<button class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50 flex items-center">
<i class="ri-eye-line mr-2"></i>
Voir les détails
</button>
<button class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50 flex items-center">
<i class="ri-edit-line mr-2"></i>
Modifier le statut
</button>
<button class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50 flex items-center">
<i class="ri-printer-line mr-2"></i>
Imprimer
</button>
<button class="w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-red-50 flex items-center">
<i class="ri-delete-bin-line mr-2"></i>
Supprimer
</button>
</div>
</div>
</td>
</tr>
<tr class="hover:bg-gray-50">
<td class="px-6 py-4">
<input type="checkbox" class="custom-checkbox row-checkbox">
</td>
<td class="px-6 py-4">
<button class="text-primary hover:text-primary-dark font-medium text-sm">#CMD-2024-002</button>
</td>
<td class="px-6 py-4">
<div class="flex items-center">
<img class="h-8 w-8 rounded-full" src="https://readdy.ai/api/search-image?query=professional%20headshot%20of%20a%20middle%20aged%20man%20with%20dark%20hair%2C%20wearing%20a%20polo%20shirt&width=100&height=100&seq=302&orientation=squarish" alt="Client">
<div class="ml-3">
<div class="text-sm font-medium text-gray-900">Antoine Dubois</div>
<div class="text-sm text-gray-500">antoine.dubois@email.fr</div>
</div>
</div>
</td>
<td class="px-6 py-4">
<div class="text-sm text-gray-900">15 Jan 2024</div>
<div class="text-sm text-gray-500">13:45</div>
</td>
<td class="px-6 py-4">
<div class="text-sm font-medium text-gray-900">€ 89,90</div>
</td>
<td class="px-6 py-4">
<span class="status-badge status-shipped">Expédiée</span>
</td>
<td class="px-6 py-4">
<div class="relative">
<button class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-gray-600 action-menu-btn">
<i class="ri-more-2-line"></i>
</button>
<div class="action-menu absolute right-0 mt-2 w-48 bg-white rounded shadow-lg border z-20 hidden">
<button class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50 flex items-center">
<i class="ri-eye-line mr-2"></i>
Voir les détails
</button>
<button class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50 flex items-center">
<i class="ri-edit-line mr-2"></i>
Modifier le statut
</button>
<button class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50 flex items-center">
<i class="ri-printer-line mr-2"></i>
Imprimer
</button>
<button class="w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-red-50 flex items-center">
<i class="ri-delete-bin-line mr-2"></i>
Supprimer
</button>
</div>
</div>
</td>
</tr>
<tr class="hover:bg-gray-50">
<td class="px-6 py-4">
<input type="checkbox" class="custom-checkbox row-checkbox">
</td>
<td class="px-6 py-4">
<button class="text-primary hover:text-primary-dark font-medium text-sm">#CMD-2024-003</button>
</td>
<td class="px-6 py-4">
<div class="flex items-center">
<img class="h-8 w-8 rounded-full" src="https://readdy.ai/api/search-image?query=professional%20headshot%20of%20a%20young%20woman%20with%20brown%20hair%2C%20wearing%20a%20blazer&width=100&height=100&seq=303&orientation=squarish" alt="Client">
<div class="ml-3">
<div class="text-sm font-medium text-gray-900">Camille Laurent</div>
<div class="text-sm text-gray-500">camille.laurent@email.fr</div>
</div>
</div>
</td>
<td class="px-6 py-4">
<div class="text-sm text-gray-900">15 Jan 2024</div>
<div class="text-sm text-gray-500">12:18</div>
</td>
<td class="px-6 py-4">
<div class="text-sm font-medium text-gray-900">€ 245,00</div>
</td>
<td class="px-6 py-4">
<span class="status-badge status-processing">En cours</span>
</td>
<td class="px-6 py-4">
<div class="relative">
<button class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-gray-600 action-menu-btn">
<i class="ri-more-2-line"></i>
</button>
<div class="action-menu absolute right-0 mt-2 w-48 bg-white rounded shadow-lg border z-20 hidden">
<button class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50 flex items-center">
<i class="ri-eye-line mr-2"></i>
Voir les détails
</button>
<button class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50 flex items-center">
<i class="ri-edit-line mr-2"></i>
Modifier le statut
</button>
<button class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50 flex items-center">
<i class="ri-printer-line mr-2"></i>
Imprimer
</button>
<button class="w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-red-50 flex items-center">
<i class="ri-delete-bin-line mr-2"></i>
Supprimer
</button>
</div>
</div>
</td>
</tr>
<tr class="hover:bg-gray-50">
<td class="px-6 py-4">
<input type="checkbox" class="custom-checkbox row-checkbox">
</td>
<td class="px-6 py-4">
<button class="text-primary hover:text-primary-dark font-medium text-sm">#CMD-2024-004</button>
</td>
<td class="px-6 py-4">
<div class="flex items-center">
<img class="h-8 w-8 rounded-full" src="https://readdy.ai/api/search-image?query=professional%20headshot%20of%20a%20man%20with%20beard%2C%20wearing%20a%20casual%20shirt&width=100&height=100&seq=304&orientation=squarish" alt="Client">
<div class="ml-3">
<div class="text-sm font-medium text-gray-900">Julien Rousseau</div>
<div class="text-sm text-gray-500">julien.rousseau@email.fr</div>
</div>
</div>
</td>
<td class="px-6 py-4">
<div class="text-sm text-gray-900">14 Jan 2024</div>
<div class="text-sm text-gray-500">16:22</div>
</td>
<td class="px-6 py-4">
<div class="text-sm font-medium text-gray-900">€ 67,80</div>
</td>
<td class="px-6 py-4">
<span class="status-badge status-pending">En attente</span>
</td>
<td class="px-6 py-4">
<div class="relative">
<button class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-gray-600 action-menu-btn">
<i class="ri-more-2-line"></i>
</button>
<div class="action-menu absolute right-0 mt-2 w-48 bg-white rounded shadow-lg border z-20 hidden">
<button class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50 flex items-center">
<i class="ri-eye-line mr-2"></i>
Voir les détails
</button>
<button class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50 flex items-center">
<i class="ri-edit-line mr-2"></i>
Modifier le statut
</button>
<button class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50 flex items-center">
<i class="ri-printer-line mr-2"></i>
Imprimer
</button>
<button class="w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-red-50 flex items-center">
<i class="ri-delete-bin-line mr-2"></i>
Supprimer
</button>
</div>
</div>
</td>
</tr>
<tr class="hover:bg-gray-50">
<td class="px-6 py-4">
<input type="checkbox" class="custom-checkbox row-checkbox">
</td>
<td class="px-6 py-4">
<button class="text-primary hover:text-primary-dark font-medium text-sm">#CMD-2024-005</button>
</td>
<td class="px-6 py-4">
<div class="flex items-center">
<img class="h-8 w-8 rounded-full" src="https://readdy.ai/api/search-image?query=professional%20headshot%20of%20a%20woman%20with%20red%20hair%2C%20wearing%20a%20sweater&width=100&height=100&seq=305&orientation=squarish" alt="Client">
<div class="ml-3">
<div class="text-sm font-medium text-gray-900">Émilie Bernard</div>
<div class="text-sm text-gray-500">emilie.bernard@email.fr</div>
</div>
</div>
</td>
<td class="px-6 py-4">
<div class="text-sm text-gray-900">14 Jan 2024</div>
<div class="text-sm text-gray-500">15:07</div>
</td>
<td class="px-6 py-4">
<div class="text-sm font-medium text-gray-900">€ 156,30</div>
</td>
<td class="px-6 py-4">
<span class="status-badge status-cancelled">Annulée</span>
</td>
<td class="px-6 py-4">
<div class="relative">
<button class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-gray-600 action-menu-btn">
<i class="ri-more-2-line"></i>
</button>
<div class="action-menu absolute right-0 mt-2 w-48 bg-white rounded shadow-lg border z-20 hidden">
<button class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50 flex items-center">
<i class="ri-eye-line mr-2"></i>
Voir les détails
</button>
<button class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50 flex items-center">
<i class="ri-edit-line mr-2"></i>
Modifier le statut
</button>
<button class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50 flex items-center">
<i class="ri-printer-line mr-2"></i>
Imprimer
</button>
<button class="w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-red-50 flex items-center">
<i class="ri-delete-bin-line mr-2"></i>
Supprimer
</button>
</div>
</div>
</td>
</tr>
<tr class="hover:bg-gray-50">
<td class="px-6 py-4">
<input type="checkbox" class="custom-checkbox row-checkbox">
</td>
<td class="px-6 py-4">
<button class="text-primary hover:text-primary-dark font-medium text-sm">#CMD-2024-006</button>
</td>
<td class="px-6 py-4">
<div class="flex items-center">
<img class="h-8 w-8 rounded-full" src="https://readdy.ai/api/search-image?query=professional%20headshot%20of%20a%20young%20man%20with%20glasses%2C%20wearing%20a%20t-shirt&width=100&height=100&seq=306&orientation=squarish" alt="Client">
<div class="ml-3">
<div class="text-sm font-medium text-gray-900">Nicolas Petit</div>
<div class="text-sm text-gray-500">nicolas.petit@email.fr</div>
</div>
</div>
</td>
<td class="px-6 py-4">
<div class="text-sm text-gray-900">14 Jan 2024</div>
<div class="text-sm text-gray-500">11:33</div>
</td>
<td class="px-6 py-4">
<div class="text-sm font-medium text-gray-900">€ 198,75</div>
</td>
<td class="px-6 py-4">
<span class="status-badge status-processing">En cours</span>
</td>
<td class="px-6 py-4">
<div class="relative">
<button class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-gray-600 action-menu-btn">
<i class="ri-more-2-line"></i>
</button>
<div class="action-menu absolute right-0 mt-2 w-48 bg-white rounded shadow-lg border z-20 hidden">
<button class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50 flex items-center">
<i class="ri-eye-line mr-2"></i>
Voir les détails
</button>
<button class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50 flex items-center">
<i class="ri-edit-line mr-2"></i>
Modifier le statut
</button>
<button class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50 flex items-center">
<i class="ri-printer-line mr-2"></i>
Imprimer
</button>
<button class="w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-red-50 flex items-center">
<i class="ri-delete-bin-line mr-2"></i>
Supprimer
</button>
</div>
</div>
</td>
</tr>
</tbody>
</table>
</div>

<div class="flex items-center justify-between px-6 py-4 border-t">
<div class="text-sm text-gray-500">
Affichage de 1 à 6 sur 2,847 commandes
</div>
<div class="flex items-center space-x-2">
<button class="px-3 py-1 border border-gray-300 rounded text-sm text-gray-500 cursor-not-allowed">
Précédent
</button>
<button class="px-3 py-1 bg-primary text-white rounded text-sm">1</button>
<button class="px-3 py-1 border border-gray-300 rounded text-sm text-gray-700 hover:bg-gray-50">2</button>
<button class="px-3 py-1 border border-gray-300 rounded text-sm text-gray-700 hover:bg-gray-50">3</button>
<span class="px-2 text-gray-500">...</span>
<button class="px-3 py-1 border border-gray-300 rounded text-sm text-gray-700 hover:bg-gray-50">475</button>
<button class="px-3 py-1 border border-gray-300 rounded text-sm text-gray-700 hover:bg-gray-50">
Suivant
</button>
</div>
</div>
</div>
</div>
</main>
</div>

<script id="filterButtons">
document.addEventListener('DOMContentLoaded', function() {
const filterButtons = document.querySelectorAll('.filter-button');
filterButtons.forEach(button => {
button.addEventListener('click', function() {
filterButtons.forEach(btn => btn.classList.remove('active'));
this.classList.add('active');
});
});
});
</script>

<script id="checkboxSelection">
document.addEventListener('DOMContentLoaded', function() {
const selectAllCheckbox = document.getElementById('selectAll');
const rowCheckboxes = document.querySelectorAll('.row-checkbox');
const bulkActions = document.getElementById('bulkActions');
const selectedCount = document.getElementById('selectedCount');
const closeBulkActions = document.getElementById('closeBulkActions');

function updateBulkActions() {
const checkedBoxes = document.querySelectorAll('.row-checkbox:checked');
const count = checkedBoxes.length;

if (count > 0) {
bulkActions.classList.add('show');
selectedCount.textContent = `${count} commande(s) sélectionnée(s)`;
} else {
bulkActions.classList.remove('show');
}
}

selectAllCheckbox.addEventListener('change', function() {
rowCheckboxes.forEach(checkbox => {
checkbox.checked = this.checked;
});
updateBulkActions();
});

rowCheckboxes.forEach(checkbox => {
checkbox.addEventListener('change', function() {
const allChecked = Array.from(rowCheckboxes).every(cb => cb.checked);
const someChecked = Array.from(rowCheckboxes).some(cb => cb.checked);
selectAllCheckbox.checked = allChecked;
selectAllCheckbox.indeterminate = someChecked && !allChecked;
updateBulkActions();
});
});

closeBulkActions.addEventListener('click', function() {
selectAllCheckbox.checked = false;
rowCheckboxes.forEach(checkbox => {
checkbox.checked = false;
});
bulkActions.classList.remove('show');
});
});
</script>

<script id="actionMenus">
document.addEventListener('DOMContentLoaded', function() {
const actionMenuBtns = document.querySelectorAll('.action-menu-btn');
const actionMenus = document.querySelectorAll('.action-menu');

actionMenuBtns.forEach((btn, index) => {
btn.addEventListener('click', function(e) {
e.stopPropagation();
actionMenus.forEach((menu, menuIndex) => {
if (menuIndex === index) {
menu.classList.toggle('hidden');
} else {
menu.classList.add('hidden');
}
});
});
});

document.addEventListener('click', function() {
actionMenus.forEach(menu => {
menu.classList.add('hidden');
});
});

actionMenus.forEach(menu => {
menu.addEventListener('click', function(e) {
e.stopPropagation();
});
});
});
</script>
</body>
</html>