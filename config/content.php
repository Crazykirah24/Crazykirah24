<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.tailwindcss.com/3.4.16"></script>
 <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
 <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css" rel="stylesheet">
    <script>tailwind.config={theme:{extend:{colors:{primary:'#4f46e5',secondary:'#6366f1'},borderRadius:{'none':'0px','sm':'4px',DEFAULT:'8px','md':'12px','lg':'16px','xl':'20px','2xl':'24px','3xl':'32px','full':'9999px','button':'8px'}}}}</script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.5.0/echarts.min.js"></script>
   
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

    /* --- Checkboxes personnalisées --- */
    .custom-checkbox {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        width: 18px;
        height: 18px;
        border: 2px solid #d1d5db;
        border-radius: 4px;
        position: relative;
        cursor: pointer;
        display: inline-block;
        vertical-align: middle;
        transition: all 0.2s;
        background-color: #fff;
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

    /* --- Radios personnalisés --- */
    .custom-radio {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        width: 18px;
        height: 18px;
        border: 2px solid #d1d5db;
        border-radius: 50%;
        position: relative;
        cursor: pointer;
        display: inline-block;
        vertical-align: middle;
        transition: all 0.2s;
        background-color: #fff;
    }

    .custom-radio:checked {
        border-color: #4f46e5;
    }

    .custom-radio:checked::before {
        content: '';
        position: absolute;
        left: 4px;
        top: 4px;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background-color: #4f46e5;
    }

    /* --- Switch personnalisé --- */
    .custom-switch {
        position: relative;
        display: inline-block;
        width: 44px;
        height: 24px;
    }

    .custom-switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .switch-slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #e5e7eb;
        transition: .4s;
        border-radius: 24px;
    }

    .switch-slider:before {
        position: absolute;
        content: "";
        height: 18px;
        width: 18px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: .4s;
        border-radius: 50%;
    }

    input:checked + .switch-slider {
        background-color: #4f46e5;
    }

    input:checked + .switch-slider:before {
        transform: translateX(20px);
    }

    /* --- Range Slider personnalisé --- */
    .custom-range {
        -webkit-appearance: none;
        width: 100%;
        height: 6px;
        background: #e5e7eb;
        border-radius: 5px;
        outline: none;
    }

    .custom-range::-webkit-slider-thumb {
        -webkit-appearance: none;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background: #4f46e5;
        cursor: pointer;
    }

    .custom-range::-moz-range-thumb {
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background: #4f46e5;
        cursor: pointer;
        border: none;
    }

    /* --- Tabs --- */
    .tab-button {
        border-bottom: 2px solid transparent;
    }

    .tab-button.active {
        border-bottom-color: #4f46e5;
        color: #4f46e5;
    }

    /* --- Modal --- */
    .modal {
        transition: opacity 0.3s ease;
    }

    /* --- Input number --- */
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none; 
        margin: 0; 
    }

    input[type=number] {
        -moz-appearance: textfield;
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