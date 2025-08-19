<?php


// Calcul dynamique du compteur
$cart_count = isset($_SESSION['panier']) ? array_sum(array_column($_SESSION['panier'], 'quantite')) : 0;
?>

<header class="sticky top-0 z-50 bg-white shadow-sm">
    <nav class="flex items-center justify-between px-6 py-4">
        <a href="/projet_web/" class="text-2xl font-['Pacifico'] text-primary">EduSupplies</a>
        
        <div class="flex items-center space-x-8">
            <a href="/projet_web/" class="text-gray-700 hover:text-primary">Accueil</a>
            <a href="#" class="text-gray-700 hover:text-primary">Catégories</a>
            <a href="#" class="text-gray-700 hover:text-primary">Promotions</a>
            <a href="#" class="text-gray-700 hover:text-primary">Contact</a>
        </div>

        <div class="flex items-center space-x-6">
            <!-- Barre de recherche -->
            <div class="relative">
                <input type="search" placeholder="Rechercher..." class="search-input pl-10 pr-4 py-2 w-64 rounded-full bg-gray-100 border-none focus:ring-2 focus:ring-primary/20 text-sm">
                <div class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 flex items-center justify-center text-gray-400">
                    <i class="ri-search-line"></i>
                </div>
            </div>

            <!-- Connexion ou profil selon la session -->
            <?php if (isset($_SESSION['email']) && isset($_SESSION['role']) && $_SESSION['role'] === 'client'): ?>
                <div class="relative" x-data="{ open: false }" @click.away="open = false">
                    <button @click="open = !open" class="flex items-center space-x-1 focus:outline-none">
                        <span class="text-sm font-medium"><?php echo htmlspecialchars($_SESSION['email']); ?></span>
                        <i class="ri-arrow-down-s-line text-gray-500 transition-transform" :class="{'transform rotate-180': open}"></i>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         class="absolute right-0 mt-2 w-56 bg-white rounded-md shadow-lg py-1 z-50 border border-gray-100">
                        <a href="/projet_web/user/profile" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <i class="ri-user-line mr-3 text-gray-500"></i>
                            Votre compte
                        </a>
                        <a href="/projet_web/user/orders" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <i class="ri-shopping-bag-line mr-3 text-gray-500"></i>
                            Vos commandes
                        </a>
                        <a href="/projet_web/user/messages" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <i class="ri-mail-line mr-3 text-gray-500"></i>
                            Boîte de réception
                        </a>
                        <div class="border-t border-gray-200 my-1"></div>
                        <a href="/projet_web/user/deconnexion" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <i class="ri-logout-box-r-line mr-3 text-gray-500"></i>
                            Déconnexion
                        </a>
                    </div>
                </div>
            <?php else: ?>
                <a href="/projet_web/user/connexion">
                    <button class="w-32 h-10 bg-primary text-white text-sm font-medium rounded-full hover:bg-blue-700 transition">
                        Se connecter
                    </button>
                </a>
            <?php endif; ?>

            <div class="relative w-10 h-10 flex items-center justify-center hover:bg-gray-100 rounded-full cursor-pointer">
                <a href="/projet_web/carts/afficher">
                    <i class="ri-shopping-cart-line text-xl text-gray-700"></i>
                </a>
                <span id="cart-count" class="absolute -top-1 -right-1 w-5 h-5 flex items-center justify-center bg-primary text-white text-xs rounded-full">
                    <?= $cart_count ?>
                </span>
            </div>
        </div>
    </nav>
</header>