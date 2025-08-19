<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Product Modal Elements
        const productModal = document.getElementById('productModal');
        const addProductBtn = document.getElementById('addProductBtn');
        const closeProductModal = document.getElementById('closeProductModal');
        const cancelProductBtn = document.getElementById('cancelProductBtn');

        // Fonction pour ouvrir la modal
        function openProductModal() {
            console.log("Opening product modal");
            productModal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        // Fonction pour fermer la modal
        function closeProductModalFunc() {
            productModal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Écouteurs d'événements
        addProductBtn.addEventListener('click', openProductModal);
        closeProductModal.addEventListener('click', closeProductModalFunc);
        cancelProductBtn.addEventListener('click', closeProductModalFunc);

        // Fermer la modal en cliquant à l'extérieur
        productModal.addEventListener('click', function(e) {
            if (e.target === productModal) {
                closeProductModalFunc();
            }
        });


        // Vérification que les éléments existent
        if (!productModal) console.error("Modal element not found");
        if (!addProductBtn) console.error("Add product button not found");
        if (!closeProductModal) console.error("Close modal button not found");
        if (!cancelProductBtn) console.error("Cancel button not found");
    });
    function editProduct(productRow) {
    // Récupération des données depuis la ligne du tableau
    const productName = productRow.querySelector('.text-gray-900').textContent;
    const productReference = productRow.querySelector('td:nth-child(2)').textContent;
    const productDescription = productRow.querySelector('td:nth-child(3)').textContent;
    const productCategory = productRow.querySelector('td:nth-child(4)').textContent;
    const productBrand = productRow.querySelector('td:nth-child(5)').textContent;
    const productPrice = productRow.querySelector('td:nth-child(6)').textContent;
    const productPromoPrice = productRow.querySelector('td:nth-child(7)').textContent;
    const productStock = productRow.querySelector('td:nth-child(8)').textContent;
    const productStatus = productRow.querySelector('td:nth-child(9) span').textContent.trim().toLowerCase();
    const productMaterial = productRow.getAttribute('data-material');
    const productColor = productRow.getAttribute('data-color');
    const productDimensions = productRow.getAttribute('data-dimensions');
    const productWeight = productRow.getAttribute('data-weight');
    const availability = productRow.getAttribute('data-availability');

    // Remplissage du formulaire
    document.getElementById('productName').value = productName;
    document.getElementById('productReference').value = productReference;
    document.getElementById('productDescription').value = productDescription;
    document.getElementById('productCategory').value = productCategory.toLowerCase();
    document.getElementById('productBrand').value = productBrand.toLowerCase();
    document.getElementById('productPrice').value = parseFloat(productPrice.replace(' €', '').replace(',', '.'));
    document.getElementById('productPromoPrice').value = productPromoPrice ? parseFloat(productPromoPrice.replace(' €', '').replace(',', '.')) : '';
    document.getElementById('productStock').value = parseInt(productStock);
    document.getElementById('productStatus').value = productStatus === 'actif' ? 'active' : productStatus === 'inactif' ? 'inactive' : 'draft';
    document.getElementById('productMaterial').value = productMaterial || '';
    document.getElementById('productColor').value = productColor || '';
    document.getElementById('productDimensions').value = productDimensions || '';
    document.getElementById('productWeight').value = productWeight || '';
    
    // Gestion de la disponibilité
    const availabilityRadios = {
        'now': 'availableNow',
        'soon': 'availableSoon', 
        'preorder': 'availablePreorder'
    };
    if (availability && availabilityRadios[availability]) {
        document.getElementById(availabilityRadios[availability]).checked = true;
    }
</script>