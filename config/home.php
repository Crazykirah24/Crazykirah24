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
        .promo-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #ef4444;
            color: white;
            font-size: 10px;
            padding: 2px 6px;
            border-radius: 10px;
            font-weight: bold;
        }
        
        .quantity-control {
            border: 1px solid #d1d5db;
            border-radius: 6px;
            overflow: hidden;
        }
        
        .quantity-btn {
            background: #f9fafb;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.2s;
        }
        
        .quantity-btn:hover {
            background: #e5e7eb;
        }
        
        .quantity-input {
            border: none;
            text-align: center;
            width: 60px;
            padding: 8px;
            background: white;
        }
        
        .loading {
            opacity: 0.6;
            pointer-events: none;
        }
    </style>