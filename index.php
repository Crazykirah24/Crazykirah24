<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fournitures Universitaires en Ligne</title>
    <?php include 'config/home.php'; ?>   
</head>
<body class="bg-white min-h-screen">
    
    <?php include 'config/menu/customers/header.php'; ?>
    <main>
        <section class="hero-section py-20">
            <div class="container mx-auto px-6">
                <div class="max-w-2xl">
                    <h1 class="text-5xl font-bold text-gray-900 mb-6">Tout pour réussir vos études</h1>
                    <p class="text-xl text-gray-600 mb-8">Découvrez notre large sélection de fournitures universitaires de qualité. Livraison rapide et garantie satisfaction.</p>
                    <div class="flex space-x-4">
                        <a href="/projet_web/customers/index" class="!rounded-button bg-primary text-white px-8 py-3 font-medium hover:bg-primary/90">
                            Découvrir
                        </a>
                        <a href="infos.html" class="!rounded-button border-2 border-gray-900 px-8 py-3 font-medium hover:bg-gray-100">
                            En savoir plus
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-16 bg-gray-50">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-center mb-12">Catégories populaires</h2>
                <div class="grid grid-cols-4 gap-8">
                    <div class="bg-white rounded-lg p-6 shadow-sm hover:shadow-md transition-shadow">
                        <div class="w-12 h-12 flex items-center justify-center bg-primary/10 rounded-lg mb-4">
                            <i class="ri-pencil-line text-xl text-primary"></i>
                        </div>
                        <h3 class="font-semibold mb-2">Papeterie</h3>
                        <p class="text-sm text-gray-600">Cahiers, stylos, marqueurs et plus</p>
                    </div>
                    
                    <div class="bg-white rounded-lg p-6 shadow-sm hover:shadow-md transition-shadow">
                        <div class="w-12 h-12 flex items-center justify-center bg-primary/10 rounded-lg mb-4">
                            <i class="ri-book-line text-xl text-primary"></i>
                        </div>
                        <h3 class="font-semibold mb-2">Livres</h3>
                        <p class="text-sm text-gray-600">Manuels et ouvrages de référence</p>
                    </div>
                    
                    <div class="bg-white rounded-lg p-6 shadow-sm hover:shadow-md transition-shadow">
                        <div class="w-12 h-12 flex items-center justify-center bg-primary/10 rounded-lg mb-4">
                            <i class="ri-computer-line text-xl text-primary"></i>
                        </div>
                        <h3 class="font-semibold mb-2">Électronique</h3>
                        <p class="text-sm text-gray-600">Calculatrices et accessoires</p>
                    </div>
                    
                    <div class="bg-white rounded-lg p-6 shadow-sm hover:shadow-md transition-shadow">
                        <div class="w-12 h-12 flex items-center justify-center bg-primary/10 rounded-lg mb-4">
                            <i class="ri-briefcase-line text-xl text-primary"></i>
                        </div>
                        <h3 class="font-semibold mb-2">Accessoires</h3>
                        <p class="text-sm text-gray-600">Sacs et matériel d'organisation</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-16">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-center mb-12">Produits en vedette</h2>
                <div class="grid grid-cols-4 gap-8">
                    <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                        <img src="https://readdy.ai/api/search-image?query=professional%20modern%20notebook%20with%20pen%20on%20clean%20white%20background%2C%20minimalist%20office%20supplies%20photography&width=400&height=300&seq=2&orientation=landscape" alt="Cahier premium" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="font-semibold mb-2">Cahier Premium A4</h3>
                            <p class="text-sm text-gray-600 mb-4">Papier de qualité supérieure, 200 pages</p>
                            <div class="flex justify-between items-center">
                                <span class="font-bold text-lg">12,99 €</span>
                                
                                    <input type="hidden" name="user_id" value="<?= $_SESSION['id'] ?? '' ?>">
                                    <input type="hidden" name="produit_id" value="1">
                                    <input type="hidden" name="quantite" value="1">
                                    <input type="hidden" name="prix_original" value="12.99">
                                    <input type="hidden" name="promo_appliquee" value="0">
        
                                    <button class="add-to-cart-btn" 
                                        data-id="1" 
                                        data-nom="Cahier Premium A4" 
                                        data-prix-original="12.99" 
                                        data-promo="0" 
                                        data-quantite="1"
                                        type="button">
                                        <span class="btn-text">Ajouter au panier</span>
                                        <span class="btn-loader" style="display:none;">⏳</span>
                                    </button>

                               
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                        <img src="https://readdy.ai/api/search-image?query=modern%20minimalist%20pen%20set%20arranged%20on%20clean%20white%20background%2C%20luxury%20stationery%20photography&width=400&height=300&seq=3&orientation=landscape" alt="Set de stylos" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="font-semibold mb-2">Set de Stylos Deluxe</h3>
                            <p class="text-sm text-gray-600 mb-4">Pack de 5 stylos premium</p>
                            <div class="flex justify-between items-center">
                                <span class="font-bold text-lg">24,99 €</span>
                                <button class="!rounded-button bg-primary text-white px-4 py-2 text-sm">
                                    Ajouter au panier
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                        <img src="https://readdy.ai/api/search-image?query=modern%20minimalist%20calculator%20on%20clean%20white%20background%2C%20professional%20office%20equipment%20photography&width=400&height=300&seq=4&orientation=landscape" alt="Calculatrice" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="font-semibold mb-2">Calculatrice Scientifique</h3>
                            <p class="text-sm text-gray-600 mb-4">Modèle avancé pour études supérieures</p>
                            <div class="flex justify-between items-center">
                                <span class="font-bold text-lg">49,99 €</span>
                                <button class="!rounded-button bg-primary text-white px-4 py-2 text-sm">
                                    Ajouter au panier
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                        <img src="https://readdy.ai/api/search-image?query=modern%20minimalist%20backpack%20on%20clean%20white%20background%2C%20student%20bag%20photography&width=400&height=300&seq=5&orientation=landscape" alt="Sac à dos" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="font-semibold mb-2">Sac à Dos Étudiant</h3>
                            <p class="text-sm text-gray-600 mb-4">Design ergonomique, grande capacité</p>
                            <div class="flex justify-between items-center">
                                <span class="font-bold text-lg">39,99 €</span>
                                <button class="!rounded-button bg-primary text-white px-4 py-2 text-sm">
                                    Ajouter au panier
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-gray-50 py-16">
            <div class="container mx-auto px-6">
                <div class="max-w-4xl mx-auto text-center">
                    <h2 class="text-3xl font-bold mb-8">Pourquoi nous choisir ?</h2>
                    <div class="grid grid-cols-3 gap-8">
                        <div class="p-6">
                            <div class="w-12 h-12 mx-auto flex items-center justify-center bg-primary/10 rounded-full mb-4">
                                <i class="ri-truck-line text-xl text-primary"></i>
                            </div>
                            <h3 class="font-semibold mb-2">Livraison Rapide</h3>
                            <p class="text-sm text-gray-600">Livraison en 24/48h sur toute la France</p>
                        </div>
                        
                        <div class="p-6">
                            <div class="w-12 h-12 mx-auto flex items-center justify-center bg-primary/10 rounded-full mb-4">
                                <i class="ri-shield-check-line text-xl text-primary"></i>
                            </div>
                            <h3 class="font-semibold mb-2">Garantie Qualité</h3>
                            <p class="text-sm text-gray-600">Produits sélectionnés et testés</p>
                        </div>
                        
                        <div class="p-6">
                            <div class="w-12 h-12 mx-auto flex items-center justify-center bg-primary/10 rounded-full mb-4">
                                <i class="ri-customer-service-2-line text-xl text-primary"></i>
                            </div>
                            <h3 class="font-semibold mb-2">Support Client</h3>
                            <p class="text-sm text-gray-600">Service client disponible 7j/7</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
  <?php include 'config/menu/customers/footer.php'; ?>

</body>
</html>