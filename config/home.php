 <script src="http://cdn.tailwindcss.com/3.4.16"></script>
 <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
 <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
 <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2563eb',
                        secondary: '#0f172a'
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
        :where([class^="ri-"])::before { content: "\f3c2"; }
        .search-input::-webkit-search-cancel-button { display: none; }
        .hero-section {
            background-image: linear-gradient(to right, rgba(255,255,255,1) 30%, rgba(255,255,255,0.8) 60%, rgba(255,255,255,0.4) 80%), url('https://readdy.ai/api/search-image?query=modern%20minimalist%20study%20desk%20setup%20with%20laptop%2C%20books%2C%20and%20stationery%20items%20arranged%20neatly.%20Natural%20lighting%20from%20large%20windows%2C%20creating%20a%20bright%20and%20inspiring%20atmosphere.%20Clean%20and%20organized%20workspace%20with%20white%20and%20wood%20tones.&width=1920&height=800&seq=1&orientation=landscape');
            background-size: cover;
            background-position: center;
        }
    </style>
    <style>

    /* Animations pour les notifications */
@keyframes fade-in-up {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes fade-out {
    from { opacity: 1; transform: translateY(0); }
    to { opacity: 0; transform: translateY(-20px); }
}

.animate-fade-in-up {
    animation: fade-in-up 0.3s ease-out forwards;
}

.animate-fade-out {
    animation: fade-out 0.5s ease-in forwards;
}

input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

input[type="number"] {
    -moz-appearance: textfield;
}
</style>

<style>
    .product-image {
      max-width: 100%;
      height: auto;
      object-fit: cover;
      transition: transform 0.3s ease;
    }
    .product-image:hover {
      transform: scale(1.05);
    }
    .thumbnail {
      border: 2px solid transparent;
      transition: border-color 0.3s ease;
    }
    .thumbnail.active {
      border-color: #ff6b35;
    }
    .thumbnail:hover {
      border-color: #ff6b35;
      opacity: 0.8;
    }
    .quantity-input {
      border: 1px solid #e5e7eb;
      border-radius: 4px;
      text-align: center;
    }
    .quantity-btn {
      background: #f3f4f6;
      border: 1px solid #e5e7eb;
      padding: 8px 12px;
      cursor: pointer;
      transition: background-color 0.2s;
    }
    .quantity-btn:hover {
      background: #e5e7eb;
    }
    .shipping-info {
      background: #f8f9fa;
      border-left: 4px solid #28a745;
    }
    .price-badge {
      background: linear-gradient(135deg, #ff6b35, #ff8c42);
      color: white;
      padding: 2px 8px;
      border-radius: 4px;
      font-size: 12px;
      font-weight: bold;
    }
    .stock-indicator {
      height: 4px;
      background: #e5e7eb;
      border-radius: 2px;
      overflow: hidden;
    }
    .stock-bar {
      height: 100%;
      background: linear-gradient(90deg, #22c55e, #16a34a);
      transition: width 0.3s ease;
    }
    .add-to-cart-btn {
      background: linear-gradient(135deg, #ff6b35, #ff8c42);
      border: none;
      color: white;
      padding: 12px 24px;
      border-radius: 8px;
      font-weight: 600;
      transition: all 0.3s ease;
      box-shadow: 0 4px 12px rgba(255, 107, 53, 0.3);
    }
    .add-to-cart-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 16px rgba(255, 107, 53, 0.4);
    }
    .add-to-cart-btn:disabled {
      background: #9ca3af;
      cursor: not-allowed;
      transform: none;
      box-shadow: none;
    }
    .btn-loader {
      display: none;
    }
    .add-to-cart-btn:disabled .btn-text {
      opacity: 0.7;
    }
    .breadcrumb {
      background: white;
      padding: 12px 0;
      border-bottom: 1px solid #e5e7eb;
    }
    .rating-stars {
      display: inline-flex;
      gap: 2px;
    }
    .star {
      color: #fbbf24;
      font-size: 18px;
    }
    .feature-icon {
      width: 24px;
      height: 24px;
      background: #f3f4f6;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
    }
  </style>

<style>
        :root {
            --primary-color: #3b82f6;
            --primary-dark: #1d4ed8;
            --danger-color: #ef4444;
            --success-color: #059669;
            --bg-gradient: linear-gradient(135deg, #f8fafc, #e2e8f0);
            --shadow-sm: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        .cart-container {
            background: var(--bg-gradient);
            min-height: 100vh;
            padding: 2rem 0;
        }
        .cart-card {
            background: white;
            border-radius: 1rem;
            box-shadow: var(--shadow-md);
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        .cart-card:hover {
            transform: translateY(-2px);
        }
        .cart-header {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            padding: 1.5rem;
            border-radius: 1rem 1rem 0 0;
        }
        .product-card {
            background: #fafbfc;
            border: 2px solid #e2e8f0;
            border-radius: 0.75rem;
            margin: 1rem 0;
            padding: 1rem;
            position: relative;
            transition: all 0.3s ease;
        }
        .product-card:hover {
            border-color: var(--primary-color);
            box-shadow: var(--shadow-sm);
        }
        .promo-badge {
            position: absolute;
            top: -4px;
            right: -4px;
            background: var(--danger-color);
            color: white;
            font-size: 0.75rem;
            font-weight: bold;
            padding: 0.25rem 0.5rem;
            border-radius: 0.375rem;
            text-transform: uppercase;
            box-shadow: var(--shadow-sm);
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }
        .quantity-control {
            display: flex;
            border: 2px solid #e2e8f0;
            border-radius: 0.5rem;
            overflow: hidden;
        }
        .quantity-btn {
            background: #f8fafc;
            padding: 0.5rem 1rem;
            font-weight: bold;
            color: var(--primary-color);
            transition: all 0.2s ease;
        }
        .quantity-btn:hover {
            background: var(--primary-color);
            color: white;
        }
        .quantity-input {
            width: 3rem;
            text-align: center;
            border: none;
            font-weight: 600;
            background: white;
        }
        .remove-btn {
            background: var(--danger-color);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.25rem;
            transition: all 0.3s ease;
        }
        .remove-btn:hover {
            background: #dc2626;
            box-shadow: var(--shadow-sm);
        }
        .summary-card {
            background: white;
            border: 2px solid #e2e8f0;
            border-radius: 1rem;
            padding: 1.5rem;
            position: sticky;
            top: 2rem;
            box-shadow: var(--shadow-md);
        }
        .summary-header {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            padding: 1rem;
            margin: -1.5rem -1.5rem 1rem;
            border-radius: 0.75rem 0.75rem 0 0;
            font-weight: bold;
        }
        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 0.5rem 0;
            border-bottom: 1px solid #f1f5f9;
        }
        .checkout-btn {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.75rem;
            font-weight: bold;
            width: 100%;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .checkout-btn:hover {
            background: linear-gradient(135deg, #2563eb, #1e40af);
            box-shadow: var(--shadow-sm);
        }
        .loading-overlay {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
            z-index: 10;
        }
        .loading-spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid var(--primary-color);
            border-radius: 50%;
            width: 2rem;
            height: 2rem;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>


<style>
    .sidebar {
      flex-shrink: 0;
    }
    .category-link, .subcategory-link {
      cursor: pointer;
      transition: color 0.3s;
    }
    .category-link:hover, .subcategory-link:hover {
      color: #3182ce;
    }
    .product-card {
      cursor: pointer;
      transition: transform 0.3s, box-shadow 0.3s;
    }
    .product-card:hover {
      transform: scale(1.05);
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }
    .toast {
      position: fixed;
      bottom: 1rem;
      right: 1rem;
      padding: 0.5rem 1rem;
      border-radius: 0.375rem;
      color: white;
      z-index: 1000;
    }
    .toast-success { background-color: #10b981; }
    .toast-error { background-color: #ef4444; }
    @keyframes fade-in-up {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    @keyframes fade-out {
      from { opacity: 1; }
      to { opacity: 0; }
    }
    .animate-fade-in-up { animation: fade-in-up 0.5s ease-out; }
    .animate-fade-out { animation: fade-out 0.5s ease-out; }
  </style>

<style>
    /* CSS pour les cartes produits optimisées */

/* Limitation du nombre de lignes pour le titre */
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    word-break: break-word;
}

/* Styles de base pour les cartes */
.product-card {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
    border: 1px solid rgba(0, 0, 0, 0.05);
}

/* Effet hover pour les cartes style Jumia */
.product-card:hover {
    box-shadow: 0 8px 25px -5px rgba(0, 0, 0, 0.15), 0 8px 10px -5px rgba(0, 0, 0, 0.1);
    border-color: rgba(0, 0, 0, 0.1);
}

/* Classe pour l'effet hover scale réduit */
.hover\:scale-102:hover {
    transform: scale(1.02);
}

/* Animation pour les images */
.product-card img {
    transition: transform 0.5s ease;
}

.product-card:hover img {
    transform: scale(1.05);
}

/* Styles pour les grilles responsives */
.grid-responsive {
    display: grid;
    gap: 1.5rem;
}

/* Grille pour catégories populaires (4 colonnes sur desktop) */
.categories-grid {
    grid-template-columns: repeat(2, 1fr);
}

@media (min-width: 768px) {
    .categories-grid {
        grid-template-columns: repeat(4, 1fr);
    }
}

/* Grille pour offres et meilleures ventes (3 colonnes) */
.offers-grid, .bestsellers-grid {
    grid-template-columns: repeat(1, 1fr);
}

@media (min-width: 640px) {
    .offers-grid, .bestsellers-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (min-width: 1024px) {
    .offers-grid, .bestsellers-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

/* Grille pour recommandations (4 colonnes) */
.recommended-grid {
    grid-template-columns: repeat(2, 1fr);
}

@media (min-width: 640px) {
    .recommended-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (min-width: 1024px) {
    .recommended-grid {
        grid-template-columns: repeat(4, 1fr);
    }
}

/* Badges promotionnels */
.promotion-badge {
    background: linear-gradient(135deg, #ef4444, #dc2626);
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: 0.8;
    }
}

/* Indicateur de stock */
.stock-indicator {
    font-weight: 500;
    font-size: 0.75rem;
}

/* Étoiles avec animation au hover */
.star-rating span {
    transition: transform 0.2s ease;
}

.product-card:hover .star-rating span {
    transform: scale(1.1);
}

/* Prix avec animation */
.price-display {
    font-weight: 700;
    letter-spacing: -0.025em;
}

/* Animation pour les badges de stock */
.stock-badge {
    animation: slideInRight 0.3s ease-out;
}

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(10px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Tailles des cartes style Jumia */
.product-card {
    height: 380px;
    width: 100%;
    max-width: 280px;
    margin: 0 auto;
}

.product-card.small-card {
    height: 340px;
    max-width: 260px;
}

/* Image container avec ratio fixe */
.product-image-container {
    height: 200px;
    position: relative;
    overflow: hidden;
}

.product-card.small-card .product-image-container {
    height: 180px;
}

/* Responsive pour mobile */
@media (max-width: 640px) {
    .product-card {
        height: 320px;
        max-width: 100%;
        min-width: 160px;
    }
    
    .product-card.small-card {
        height: 300px;
        max-width: 100%;
        min-width: 150px;
    }

    .product-image-container {
        height: 160px;
    }

    .product-card.small-card .product-image-container {
        height: 140px;
    }
}

@media (min-width: 641px) and (max-width: 1023px) {
    .product-card {
        height: 360px;
        max-width: 250px;
    }
    
    .product-card.small-card {
        height: 320px;
        max-width: 230px;
    }

    .product-image-container {
        height: 180px;
    }

    .product-card.small-card .product-image-container {
        height: 160px;
    }
}

/* État désactivé pour les produits en rupture */
.product-card.disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

.product-card.disabled:hover {
    transform: none;
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
}

/* Overlay moderne */
.modern-overlay {
    background: linear-gradient(
        180deg,
        rgba(0, 0, 0, 0) 0%,
        rgba(0, 0, 0, 0.05) 100%
    );
    transition: all 0.3s ease;
}
</style>

 <style>
    .product-image {
      max-width: 100%;
      height: auto;
      object-fit: cover;
      transition: transform 0.3s ease;
    }
    .product-image:hover {
      transform: scale(1.05);
    }
    .thumbnail {
      border: 2px solid transparent;
      transition: border-color 0.3s ease;
    }
    .thumbnail.active {
      border-color: #ff6b35;
    }
    .thumbnail:hover {
      border-color: #ff6b35;
      opacity: 0.8;
    }
    .quantity-input {
      border: 1px solid #e5e7eb;
      border-radius: 4px;
      text-align: center;
    }
    .quantity-btn {
      background: #f3f4f6;
      border: 1px solid #e5e7eb;
      padding: 8px 12px;
      cursor: pointer;
      transition: background-color 0.2s;
    }
    .quantity-btn:hover {
      background: #e5e7eb;
    }
    .shipping-info {
      background: #f8f9fa;
      border-left: 4px solid #28a745;
    }
    .price-badge {
      background: linear-gradient(135deg, #ff6b35, #ff8c42);
      color: white;
      padding: 2px 8px;
      border-radius: 4px;
      font-size: 12px;
      font-weight: bold;
    }
    .stock-indicator {
      height: 4px;
      background: #e5e7eb;
      border-radius: 2px;
      overflow: hidden;
    }
    .stock-bar {
      height: 100%;
      background: linear-gradient(90deg, #22c55e, #16a34a);
      transition: width 0.3s ease;
    }
    .add-to-cart-btn {
      background: linear-gradient(135deg, #ff6b35, #ff8c42);
      border: none;
      color: white;
      padding: 12px 24px;
      border-radius: 8px;
      font-weight: 600;
      transition: all 0.3s ease;
      box-shadow: 0 4px 12px rgba(255, 107, 53, 0.3);
    }
    .add-to-cart-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 16px rgba(255, 107, 53, 0.4);
    }
    .add-to-cart-btn:disabled {
      background: #9ca3af;
      cursor: not-allowed;
      transform: none;
      box-shadow: none;
    }
    .breadcrumb {
      background: white;
      padding: 12px 0;
      border-bottom: 1px solid #e5e7eb;
    }
    .rating-stars {
      display: inline-flex;
      gap: 2px;
    }
    .star {
      color: #fbbf24;
      font-size: 18px;
    }
    .feature-icon {
      width: 24px;
      height: 24px;
      background: #f3f4f6;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
    }
  </style>

 <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sales Chart
            const salesChartDom = document.getElementById('sales-chart');
            const salesChart = echarts.init(salesChartDom);
            const salesOption = {
                animation: false,
                tooltip: {
                    trigger: 'axis',
                    backgroundColor: 'rgba(255, 255, 255, 0.8)',
                    borderColor: '#e5e7eb',
                    textStyle: {
                        color: '#1f2937'
                    }
                },
                grid: {
                    left: '0',
                    right: '0',
                    bottom: '0',
                    top: '10',
                    containLabel: true
                },
                xAxis: {
                    type: 'category',
                    data: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
                    axisLine: {
                        lineStyle: {
                            color: '#e5e7eb'
                        }
                    },
                    axisLabel: {
                        color: '#1f2937'
                    }
                },
                yAxis: {
                    type: 'value',
                    axisLine: {
                        show: false
                    },
                    axisLabel: {
                        color: '#1f2937'
                    },
                    splitLine: {
                        lineStyle: {
                            color: '#f3f4f6'
                        }
                    }
                },
                series: [
                    {
                        name: 'Ventes',
                        type: 'line',
                        smooth: true,
                        symbol: 'none',
                        lineStyle: {
                            width: 3,
                            color: 'rgba(87, 181, 231, 1)'
                        },
                        areaStyle: {
                            color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [
                                { offset: 0, color: 'rgba(87, 181, 231, 0.2)' },
                                { offset: 1, color: 'rgba(87, 181, 231, 0.05)' }
                            ])
                        },
                        data: [1200, 1500, 2800, 2350, 2900, 3500, 2450]
                    }
                ]
            };
            salesChart.setOption(salesOption);

            // Category Chart
            const categoryChartDom = document.getElementById('category-chart');
            const categoryChart = echarts.init(categoryChartDom);
            const categoryOption = {
                animation: false,
                tooltip: {
                    trigger: 'item',
                    backgroundColor: 'rgba(255, 255, 255, 0.8)',
                    borderColor: '#e5e7eb',
                    textStyle: {
                        color: '#1f2937'
                    }
                },
                legend: {
                    bottom: '0',
                    left: 'center',
                    textStyle: {
                        color: '#1f2937'
                    }
                },
                series: [
                    {
                        name: 'Catégories',
                        type: 'pie',
                        radius: ['40%', '70%'],
                        center: ['50%', '45%'],
                        avoidLabelOverlap: false,
                        itemStyle: {
                            borderRadius: 8,
                            borderColor: '#fff',
                            borderWidth: 2
                        },
                        label: {
                            show: false
                        },
                        emphasis: {
                            label: {
                                show: false
                            }
                        },
                        labelLine: {
                            show: false
                        },
                        data: [
                            { value: 35, name: 'Chaussures', itemStyle: { color: 'rgba(87, 181, 231, 1)' } },
                            { value: 25, name: 'Vêtements', itemStyle: { color: 'rgba(141, 211, 199, 1)' } },
                            { value: 20, name: 'Accessoires', itemStyle: { color: 'rgba(251, 191, 114, 1)' } },
                            { value: 20, name: 'Électronique', itemStyle: { color: 'rgba(252, 141, 98, 1)' } }
                        ]
                    }
                ]
            };
            categoryChart.setOption(categoryOption);

            // Resize charts when window is resized
            window.addEventListener('resize', function() {
                salesChart.resize();
                categoryChart.resize();
            });

            // Modal functionality
            const productModal = document.getElementById('productModal');
            const closeProductModal = document.getElementById('closeProductModal');
            const cancelProductBtn = document.getElementById('cancelProductBtn');

            // Function to open modal
            function openProductModal() {
                productModal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }

            // Function to close modal
            function closeModal() {
                productModal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }

            // Event listeners for modal
            closeProductModal.addEventListener('click', closeModal);
            cancelProductBtn.addEventListener('click', closeModal);

            // Close modal when clicking outside
            productModal.addEventListener('click', function(e) {
                if (e.target === productModal) {
                    closeModal();
                }
            });

            // Custom form elements functionality
            const promotionToggle = document.getElementById('promotionToggle');
            const discountFields = document.querySelectorAll('#discountType, #discountValue, #discountEndDate');
            promotionToggle.addEventListener('change', function() {
                discountFields.forEach(field => {
                    field.disabled = !this.checked;
                    if (this.checked) {
                        field.parentElement.classList.remove('opacity-50');
                    } else {
                        field.parentElement.classList.add('opacity-50');
                    }
                });
            });
            // Initialize state
            discountFields.forEach(field => {
                field.disabled = !promotionToggle.checked;
                if (!promotionToggle.checked) {
                    field.parentElement.classList.add('opacity-50');
                }
            });
        });
    </script>