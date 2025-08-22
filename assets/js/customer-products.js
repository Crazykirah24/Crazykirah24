document.addEventListener('DOMContentLoaded', function () {
    // Afficher un toast pour les messages
    function showToast(message, type = 'success') {
        const toast = document.createElement('div');
        toast.className = `toast ${type === 'success' ? 'toast-success' : 'toast-error'}`;
        toast.textContent = message;
        document.body.appendChild(toast);
        setTimeout(() => {
            toast.classList.add('animate-fade-out');
            setTimeout(() => toast.remove(), 500);
        }, 3000);
    }

    // Charger les produits depuis la base de données
    async function loadProducts(category = '') {
        try {
            const url = category ? `/projet_web/products/filter/${encodeURIComponent(category)}` : '/projet_web/products/all';
            console.log(`Chargement des produits depuis ${url}`);
            const response = await fetch(url, {
                method: 'GET',
                headers: { 'Accept': 'application/json' }
            });
            console.log(`Réponse reçue: status=${response.status}`);
            const text = await response.text();
            console.log(`Contenu brut: ${text.substring(0, 200)}...`);
            if (!response.ok) {
                throw new Error(`Erreur HTTP : ${response.status}`);
            }
            const data = JSON.parse(text);
            if (data.success) {
                console.log('Données reçues:', data.data);
                renderProducts(data.data);
            } else {
                showToast(data.message || 'Erreur lors du chargement des produits', 'error');
            }
        } catch (error) {
            console.error('Erreur dans loadProducts:', error);
            showToast(`Erreur réseau : ${error.message}`, 'error');
        }
    }

    // Afficher les produits dans les différentes sections
    function renderProducts(products) {
        console.log('Rendu des produits:', products);
        
        const categoriesContainer = document.getElementById('categories-container');
        const offersContainer = document.getElementById('offers-container');
        const recommendedContainer = document.getElementById('recommended-container');
        const bestSellersContainer = document.getElementById('best-sellers-container');

        // Vérifier que les conteneurs existent
        if (!categoriesContainer || !offersContainer || !recommendedContainer || !bestSellersContainer) {
            console.error('Un ou plusieurs conteneurs sont introuvables');
            return;
        }

        categoriesContainer.innerHTML = '';
        offersContainer.innerHTML = '';
        recommendedContainer.innerHTML = '';
        bestSellersContainer.innerHTML = '';

        // Catégories populaires (corrigé: utiliser 'categories' au lieu de 'categorie')
        const popularCategories = ['cahiers', 'stylos', 'livres', 'calculatrices'];
        popularCategories.forEach(category => {
            const product = products.find(p => p.categories && p.categories.toLowerCase() === category);
            if (product) {
                categoriesContainer.appendChild(createProductCard(product, true));
            }
        });

        // Offres du moment (produits avec prix_promo > 0 ET prix_promo < prix)
        const offerProducts = products.filter(p => {
            const prixPromo = parseFloat(p.prix_promo) || 0;
            const prix = parseFloat(p.prix) || 0;
            return prixPromo > 0 && prixPromo < prix;
        }).slice(0, 3);
        
        console.log('Produits en promotion:', offerProducts);
        offerProducts.forEach(product => {
            offersContainer.appendChild(createProductCard(product));
        });

        // Produits recommandés (aléatoires)
        const recommendedProducts = [...products].sort(() => 0.5 - Math.random()).slice(0, 4);
        recommendedProducts.forEach(product => {
            recommendedContainer.appendChild(createProductCard(product, true));
        });

        // Meilleures ventes (basé sur stock bas)
        const bestSellers = [...products]
            .filter(p => parseFloat(p.stock) >= 0)
            .sort((a, b) => parseFloat(a.stock) - parseFloat(b.stock))
            .slice(0, 3);
        
        bestSellers.forEach(product => {
            bestSellersContainer.appendChild(createProductCard(product));
        });
    }

    // Créer une carte produit (VERSION CORRIGÉE)
    // Créer une carte produit style Jumia
function createProductCard(product, isSmall = false) {
    console.log('Création carte pour produit:', product);
    
    const div = document.createElement('div');
    
    // Classes style Jumia avec tailles fixes
    const cardClasses = `bg-white rounded-lg shadow-md overflow-hidden product-card ${isSmall ? 'small-card' : ''} cursor-pointer transform transition-all duration-300 hover:scale-102 hover:shadow-lg flex flex-col`;
    
    div.className = cardClasses;
    div.dataset.productId = product.id;
    
    // Parsing sécurisé des images
    let images = [];
    try {
        images = product.images ? JSON.parse(product.images) : [];
    } catch (e) {
        console.warn('Erreur parsing images pour produit', product.id, ':', e);
        images = [];
    }
    
    // Construction du chemin d'image
    const imageSrc = images.length > 0 
        ? `/projet_web/${images[0]}` 
        : 'https://via.placeholder.com/280x200/f8f9fa/6c757d?text=Image+indisponible';
    
    // Conversion sécurisée des prix
    const prix = parseFloat(product.prix) || 0;
    const prixPromo = parseFloat(product.prix_promo) || 0;
    
    // Déterminer le prix à afficher
    const prixAffiche = (prixPromo > 0 && prixPromo < prix) ? prixPromo : prix;
    const aPromotion = prixPromo > 0 && prixPromo < prix;
    const pourcentageReduction = aPromotion ? Math.round(((prix - prixPromo) / prix) * 100) : 0;
    
    // Sécuriser les données textuelles
    const nomProduit = product.nom_produit || 'Nom indisponible';
    const description = product.description || 'Aucune description disponible';
    const descriptionTruncated = description.length > 45 
        ? description.substring(0, 45) + '...' 
        : description;
    
    // Générer les étoiles (note entre 3.5 et 5)
    const rating = Math.random() > 0.5 ? 5 : 4;
    const starsHtml = generateStarsJumia(rating);
    const reviewCount = Math.floor(Math.random() * 200) + 10;
    
    div.innerHTML = `
        <!-- Container image avec dimensions fixes -->
        <div class="product-image-container bg-gray-50 relative">
            <img src="${imageSrc}" 
                 alt="${nomProduit}" 
                 class="w-full h-full object-contain p-2 transition-transform duration-300 hover:scale-105"
                 onerror="this.src='https://via.placeholder.com/280x200/f8f9fa/6c757d?text=Image+non+disponible'">
            
            <!-- Badge promotion style Jumia -->
            ${aPromotion ? `
                <div class="absolute top-2 left-2 bg-orange-500 text-white text-xs font-bold px-2 py-1 rounded shadow">
                    -${pourcentageReduction}%
                </div>
            ` : ''}
            
            <!-- Coeur favoris (style Jumia) -->
            <div class="absolute top-2 right-2 w-8 h-8 bg-white rounded-full shadow-sm flex items-center justify-center cursor-pointer hover:bg-gray-50 transition-colors">
                <svg class="w-4 h-4 text-gray-400 hover:text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                </svg>
            </div>
        </div>
        
        <!-- Contenu de la carte style Jumia -->
        <div class="flex-1 p-3 flex flex-col">
            <!-- Nom du produit (limité à 2 lignes) -->
            <h3 class="font-medium text-gray-900 text-sm leading-5 line-clamp-2 mb-2 min-h-[2.5rem]">
                ${nomProduit}
            </h3>
            
            <!-- Prix section -->
            <div class="mb-2">
                ${aPromotion ? `
                    <div class="flex items-baseline space-x-2">
                        <span class="text-lg font-bold text-orange-600">${prixAffiche.toFixed(2)} €</span>
                        <span class="text-sm text-gray-500 line-through">${prix.toFixed(2)} €</span>
                    </div>
                ` : `
                    <div>
                        <span class="text-lg font-bold text-gray-900">${prixAffiche.toFixed(2)} €</span>
                    </div>
                `}
            </div>
            
            <!-- Étoiles et avis -->
            <div class="flex items-center mb-2">
                <div class="flex items-center mr-1">
                    ${starsHtml}
                </div>
                <span class="text-xs text-gray-500">(${reviewCount})</span>
            </div>
            
            <!-- Livraison gratuite / Stock (style Jumia) -->
            <div class="mt-auto space-y-1">
                ${Math.random() > 0.5 ? `
                    <div class="flex items-center text-green-600 text-xs">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
                        </svg>
                        Livraison gratuite
                    </div>
                ` : ''}
                
                <!-- Indicateur de stock discret -->
                ${product.stock <= 5 && product.stock > 0 ? `
                    <div class="text-xs text-orange-600">
                        Plus que ${product.stock} en stock
                    </div>
                ` : product.stock <= 0 ? `
                    <div class="text-xs text-red-600">
                        Rupture de stock
                    </div>
                ` : ''}
            </div>
        </div>
    `;
    
    // Event listener pour la navigation
    div.addEventListener('click', (e) => {
        // Empêcher le clic si c'est sur le coeur favoris
        if (!e.target.closest('.cursor-pointer') || e.target.closest('svg')) return;
        
        if (product.stock > 0) {
            window.location.href = `/projet_web/products/details/${product.id}`;
        }
    });
    
    // Gestion du coeur favoris
    const heartIcon = div.querySelector('.w-8.h-8');
    if (heartIcon) {
        heartIcon.addEventListener('click', (e) => {
            e.stopPropagation();
            const svg = heartIcon.querySelector('svg');
            if (svg.classList.contains('text-red-500')) {
                svg.classList.remove('text-red-500');
                svg.classList.add('text-gray-400');
            } else {
                svg.classList.remove('text-gray-400');
                svg.classList.add('text-red-500');
            }
        });
    }
    
    // Désactiver si rupture de stock
    if (product.stock <= 0) {
        div.classList.add('opacity-60', 'cursor-not-allowed');
        div.classList.remove('hover:scale-102', 'hover:shadow-lg');
    }
    
    return div;
}

// Fonction pour générer les étoiles style Jumia
function generateStarsJumia(rating) {
    let starsHtml = '';
    for (let i = 1; i <= 5; i++) {
        if (i <= rating) {
            starsHtml += '<span class="text-yellow-400 text-xs">★</span>';
        } else {
            starsHtml += '<span class="text-gray-300 text-xs">★</span>';
        }
    }
    return starsHtml;
}
    // Gestion des clics sur les catégories
    document.querySelectorAll('.category-link, .subcategory-link').forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const category = link.dataset.category;
            console.log(`Filtrage par catégorie: ${category}`);
            loadProducts(category);
        });
    });

    // Charger tous les produits au démarrage
    console.log('Démarrage du chargement des produits');
    loadProducts();
});