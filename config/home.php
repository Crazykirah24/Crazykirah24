 <script src="http://cdn.tailwindcss.com/3.4.16"></script>
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
   


    /* Sidebar Categorie */
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


        /* Styles spécifiques pour la vue panier - Alignement à gauche */
        
        /* Reset du centrage global */
        
        
        /* Product Items - Alignement à gauche */
        .product-card { 
            display: flex; 
            gap: 1rem; 
            padding: 1rem; 
            border: 1px solid #e5e7eb; 
            border-radius: 0.5rem; 
            background: white; 
            transition: all 0.3s;
            text-align: left !important;
        }
        
        .product-card:hover { 
            box-shadow: 0 4px 12px rgba(0, 91, 187, 0.1); 
        }
        
        .product-image { 
            width: 5rem; 
            height: 5rem; 
            object-fit: cover; 
            border-radius: 0.25rem; 
            border: 1px solid #e5e7eb;
            flex-shrink: 0;
            margin-right: 7px;
        }
        
        .product-info {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            text-align: left !important;
            min-width: 0;
        }
        
        .product-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1rem;
            gap: 1rem;
        }
        
        /* Quantity Controls - Alignement à gauche */
        .quantity-control { 
            display: flex; 
            align-items: center; 
            gap: 0.25rem; 
        }
        
        .quantity-btn { 
            background: #e5f0ff; 
            border: 1px solid #93c5fd; 
            padding: 0.5rem; 
            border-radius: 0.375rem; 
            cursor: pointer; 
            transition: all 0.2s;
            width: 2rem;
            height: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .quantity-btn:hover { 
            background: #bfdbfe; 
            transform: translateY(-1px); 
        }
        
        .quantity-input { 
            width: 3rem; 
            text-align: center; 
            border: 1px solid #d1d5db; 
            border-radius: 0.375rem; 
            padding: 0.375rem;
            height: 2rem;
        }
        
        .remove-btn { 
            display: flex; 
            align-items: center; 
            gap: 0.5rem; 
            color: #ef4444; 
            transition: color 0.2s; 
            cursor: pointer;
            background: none;
            border: none;
            padding: 0.5rem;
            border-radius: 0.375rem;
        }
        
        .remove-btn:hover { 
            color: #b91c1c;
            background: #fee2e2;
        }
        
        /* Summary Card - Alignement à gauche */
        .summary-card { 
            background: white; 
            border-radius: 0.5rem; 
            box-shadow: 0 1px 3px rgba(0,0,0,0.1); 
            padding: 1.5rem;
            text-align: center !important;
        }
        
        .summary-header { 
            font-weight: bold; 
            font-size: 1.125rem; 
            margin-bottom: 1rem;
            text-align: center !important;
        }
        
        .summary-row { 
            display: flex; 
            justify-content: space-between; 
            margin-bottom: 0.5rem;
            align-items: center;
        }
        
        .checkout-btn { 
            width: 100%; 
            background: linear-gradient(135deg, #005bb7, #3b82f6); 
            color: white; 
            padding: 0.75rem; 
            border-radius: 0.5rem; 
            font-weight: 600; 
            transition: all 0.3s; 
            box-shadow: 0 4px 12px rgba(0,91,187,0.3);
            border: none;
            cursor: pointer;
            text-align: center !important;
        }
        
        .checkout-btn:hover { 
            transform: translateY(-2px); 
            box-shadow: 0 6px 16px rgba(0,91,187,0.4); 
        }
        
        /* Empty Cart - Centré seulement pour ce cas */
        .empty-cart { 
            text-align: center !important; 
            padding: 3rem; 
            background: white; 
            border-radius: 0.5rem; 
        }
        
        /* Stock badges */
        .stock-badge { 
            padding: 0.25rem 0.5rem; 
            border-radius: 9999px; 
            font-size: 0.75rem;
            display: inline-block;
        }
        
        .bg-green-100 { 
            background: #dcfce7; 
            color: #15803d; 
        }
        
        .bg-red-100 { 
            background: #fee2e2; 
            color: #b91c1c; 
        }
        
        /* Price styling */
        .price-container {
            text-align: right;
            margin-bottom: 0.5rem;
        }
        
        .price-original {
            text-decoration: line-through;
            color: #9ca3af;
            font-size: 0.875rem;
        }
        
        .price-current {
            color: #2563eb;
            font-weight: bold;
            font-size: 1.125rem;
        }
        
        /* Product header info */
        .product-header {
            margin-bottom: 1rem;
        }
        
        .product-title {
            font-size: 1rem;
            font-weight: 600;
            color: #111827;
            margin-bottom: 0.5rem;
        }
        
        .product-meta {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.5rem;
        }
        
        .product-reference {
            font-size: 0.75rem;
            color: #6b7280;
        }
        
        .savings-info {
            font-size: 0.875rem;
            color: #059669;
            font-weight: 500;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .product-card {
                flex-direction: column;
            }
            
            .product-image {
                width: 100%;
                height: 200px;
                object-fit: cover;
            }
            
            .product-actions {
                justify-content: space-between;
            }
            
            .price-container {
                text-align: left;
                margin-bottom: 1rem;
            }
        }
        
        /* Animation pour les suppressions */
        .remove-animation {
            animation: fade-out 0.5s ease-out forwards;
        }
        
        @keyframes fade-out {
            from { opacity: 1; transform: translateX(0); }
            to { opacity: 0; transform: translateX(-100%); }
        }
        
        /* Toast notifications */
        .toast {
            position: fixed;
            bottom: 1rem;
            right: 1rem;
            padding: 1rem 1.5rem;
            border-radius: 0.5rem;
            color: white;
            z-index: 50;
            max-width: 300px;
            font-weight: 500;
        }
        
        .toast-success { background: #10b981; }
        .toast-error { background: #ef4444; }
        
        @keyframes fade-in-up {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-fade-in-up {
            animation: fade-in-up 0.5s ease-out;
        }
 
/* style detail produit */
.product-image-main {
      max-height: 300px;
      object-fit: contain;
      background: white;
    }
    
    .thumbnail {
      border: 2px solid transparent;
      transition: all 0.2s ease;
    }
    
    .thumbnail:hover {
      border-color: #3b82f6;
      transform: scale(1.05);
    }
    
    .thumbnail.active {
      border-color: #3b82f6;
      box-shadow: 0 0 0 1px #3b82f6;
    }
    
    .rating-stars .star {
      color: #fbbf24;
      font-size: 16px;
    }
    
    .price-badge {
      background: #ef4444;
      color: white;
      padding: 2px 8px;
      border-radius: 4px;
      font-size: 12px;
      font-weight: 600;
    }
    
    .feature-icon {
      font-size: 16px;
    }
    
    .stock-indicator {
      width: 100%;
      height: 4px;
      background: #e5e7eb;
      border-radius: 2px;
      overflow: hidden;
    }
    
    .stock-bar {
      height: 100%;
      background: linear-gradient(90deg, #ef4444 0%, #f59e0b 50%, #10b981 100%);
      transition: width 0.3s ease;
    }
    
    .add-to-cart-btn {
      background: linear-gradient(135deg, #3b82f6, #1d4ed8);
      color: white;
      padding: 12px 24px;
      border: none;
      border-radius: 8px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.2s ease;
      position: relative;
      overflow: hidden;
    }
    
    .add-to-cart-btn:hover:not(:disabled) {
      transform: translateY(-1px);
      box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
    }
    
    .add-to-cart-btn:disabled {
      background: #9ca3af;
      cursor: not-allowed;
    }
    
    .shipping-info {
      background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
      border: 1px solid #bae6fd;
    }
    
    .breadcrumb {
      background: white;
      border-bottom: 1px solid #e5e7eb;
      padding: 12px 0;
    }
    
   
    .image-gallery {
      display: flex;
      gap: 12px;
      flex-direction: column-reverse;
    }
    
    .thumbnails-container {
      display: flex;
      gap: 8px;
      flex-wrap: wrap;
    }
    
    @media (min-width: 1024px) {
      .image-gallery {
        flex-direction: row;
      }
      
      .thumbnails-container {
        flex-direction: column;
        max-width: 80px;
      }
      
      .main-image-container {
        flex: 1;
      }
    }
    
    .description-section {
      max-width: 800px;
    }
    
    .description-section p {
      line-height: 1.6;
      margin-bottom: 12px;
    }

/* Styles consolidés pour la vue Panier - Thème Bleu Propre */

/* Global */
body { font-family: sans-serif; background: #f3f4f6; }
.container { max-width: 1280px; margin: 0 auto; padding: 1rem; }

/* Breadcrumb */
nav.breadcrumb { background: white; border-bottom: 1px solid #e5e7eb; }
nav.breadcrumb a { color: #005bb7; transition: color 0.2s; }
nav.breadcrumb a:hover { color: #1d4ed8; }



/* Footer */
footer { background: #1f2937; }
footer a { transition: color 0.2s; }
footer a:hover { color: white; }
footer input { border-radius: 0.5rem 0 0 0.5rem; }
footer button { border-radius: 0 0.5rem 0.5rem 0; }

/* Responsive */
@media (min-width: 1024px) { .flex-row { flex-direction: row; } .w-2/3 { width: 66.666%; } .w-1/3 { width: 33.333%; } }
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