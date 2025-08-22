document.addEventListener('DOMContentLoaded', function() {
    // Fonction pour afficher les toasts
    function showToast(message, type = 'success') {
        const toast = document.createElement('div');
        toast.className = `toast ${type === 'success' ? 'toast-success' : 'toast-error'} fixed bottom-4 right-4 px-4 py-2 rounded-md text-white ${type === 'success' ? 'bg-green-500' : 'bg-red-500'} animate-fade-in-up`;
        toast.textContent = message;
        document.body.appendChild(toast);
        setTimeout(() => {
            toast.classList.add('animate-fade-out');
            setTimeout(() => toast.remove(), 500);
        }, 3000);
    }

    // Gestion du modal d'ajout/modification
    const addProductBtn = document.getElementById('addProductBtn');
    const productModal = document.getElementById('productModal');
    const closeProductModal = document.getElementById('closeProductModal');
    const cancelProductBtn = document.getElementById('cancelProductBtn');
    const productForm = document.getElementById('productForm');
    const fileInput = document.getElementById('product-image-upload');
    const uploadContainer = document.querySelector('.border-2.border-dashed');
    const imagePreviewContainer = document.getElementById('image-preview-container');
    const publishProductBtn = document.getElementById('publishProductBtn');
    const saveAsDraftBtn = document.getElementById('saveAsDraftBtn');

    // Modal de confirmation de suppression
    const deleteConfirmModal = document.getElementById('deleteConfirmModal');
    const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');
    const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
    const deleteConfirmText = document.getElementById('deleteConfirmText');

    // Tableau pour stocker les fichiers sélectionnés
    let selectedFiles = [];
    let currentProductId = null; // Pour suivre si on modifie un produit

    // Ouvrir le modal pour ajouter un produit
    if (addProductBtn) {
        addProductBtn.addEventListener('click', function() {
            productModal.classList.remove('hidden');
            productForm.reset();
            imagePreviewContainer.innerHTML = '';
            selectedFiles = [];
            fileInput.value = '';
            currentProductId = null; // Nouvelle création
            document.querySelector('h3.text-lg.font-semibold').textContent = 'Ajouter un produit';
            publishProductBtn.textContent = 'Publier le produit';
        });
    }

    // Fermer le modal
    if (closeProductModal) {
        closeProductModal.addEventListener('click', function() {
            productModal.classList.add('hidden');
            selectedFiles = [];
            fileInput.value = '';
            currentProductId = null;
        });
    }

    if (cancelProductBtn) {
        cancelProductBtn.addEventListener('click', function() {
            productModal.classList.add('hidden');
            selectedFiles = [];
            fileInput.value = '';
            currentProductId = null;
        });
    }

    // Gestion de l'upload d'images multiples
    if (uploadContainer && fileInput) {
        uploadContainer.addEventListener('click', function() {
            fileInput.click();
        });

        fileInput.addEventListener('change', function(event) {
            const newFiles = Array.from(event.target.files);
            const validFiles = newFiles.filter(file => file.type.startsWith('image/'));
            if (validFiles.length !== newFiles.length) {
                showToast('Certains fichiers ne sont pas des images valides.', 'error');
            }

            selectedFiles = [...selectedFiles, ...validFiles];

            validFiles.forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.createElement('div');
                    preview.classList.add('relative', 'rounded-lg', 'overflow-hidden');
                    preview.dataset.fileName = file.name;
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('w-full', 'h-32', 'object-cover');
                    preview.appendChild(img);
                    const removeBtn = document.createElement('button');
                    removeBtn.classList.add('absolute', 'top-1', 'right-1', 'bg-red-500', 'text-white', 'rounded-full', 'w-6', 'h-6', 'flex', 'items-center', 'justify-center');
                    removeBtn.innerHTML = '<i class="ri-close-line"></i>';
                    removeBtn.addEventListener('click', function() {
                        preview.remove();
                        selectedFiles = selectedFiles.filter(f => f.name !== file.name);
                        const dataTransfer = new DataTransfer();
                        selectedFiles.forEach(f => dataTransfer.items.add(f));
                        fileInput.files = dataTransfer.files;
                    });
                    preview.appendChild(removeBtn);
                    imagePreviewContainer.appendChild(preview);
                };
                reader.readAsDataURL(file);
            });

            const dataTransfer = new DataTransfer();
            selectedFiles.forEach(file => dataTransfer.items.add(file));
            fileInput.files = dataTransfer.files;
        });

        uploadContainer.addEventListener('dragover', function(e) {
            e.preventDefault();
            uploadContainer.classList.add('bg-gray-100');
        });

        uploadContainer.addEventListener('dragleave', function(e) {
            e.preventDefault();
            uploadContainer.classList.remove('bg-gray-100');
        });

        uploadContainer.addEventListener('drop', function(e) {
            e.preventDefault();
            uploadContainer.classList.remove('bg-gray-100');
            fileInput.files = e.dataTransfer.files;
            fileInput.dispatchEvent(new Event('change'));
        });
    }

    // Fonction pour pré-remplir le formulaire (Modifier ou Dupliquer)
    async function fillProductForm(productId, mode = 'edit') {
        try {
            const response = await fetch(`/projet_web/products/get/${productId}`, {
                method: 'GET',
                headers: { 'Accept': 'application/json' }
            });
            if (!response.ok) {
                throw new Error(`Erreur HTTP : ${response.status}`);
            }
            const product = await response.json();
            if (product.success) {
                document.getElementById('productName').value = product.data.nom_produit || '';
                document.getElementById('productDescription').value = product.data.description || '';
                document.getElementById('productCategory').value = product.data.categories || '';
                document.getElementById('productBrand').value = product.data.marque || '';
                document.getElementById('productPrice').value = product.data.prix || 0;
                document.getElementById('productPromoPrice').value = product.data.prix_promo || 0;
                document.getElementById('productStock').value = product.data.stock || 0;
                document.getElementById('productStatus').value = product.data.status || 'draft';

                // Afficher les images existantes
                imagePreviewContainer.innerHTML = '';
                selectedFiles = [];
                if (product.data.images && Array.isArray(JSON.parse(product.data.images))) {
                    JSON.parse(product.data.images).forEach(imagePath => {
                        const preview = document.createElement('div');
                        preview.classList.add('relative', 'rounded-lg', 'overflow-hidden');
                        const img = document.createElement('img');
                        img.src = `/${imagePath}`;
                        img.classList.add('w-full', 'h-32', 'object-cover');
                        preview.appendChild(img);
                        imagePreviewContainer.appendChild(preview);
                    });
                }

                productModal.classList.remove('hidden');
                document.querySelector('h3.text-lg.font-semibold').textContent = mode === 'edit' ? 'Modifier le produit' : 'Dupliquer le produit';
                publishProductBtn.textContent = mode === 'edit' ? 'Mettre à jour le produit' : 'Publier le produit';
                currentProductId = mode === 'edit' ? productId : null;
            } else {
                showToast(product.message || 'Erreur lors de la récupération du produit', 'error');
            }
        } catch (error) {
            showToast(`Erreur réseau : ${error.message}`, 'error');
        }
    }

    // Modifier un produit
    window.editProduct = function(productId) {
        fillProductForm(productId, 'edit');
    };

    // Dupliquer un produit
    window.duplicateProduct = function(productId) {
        fillProductForm(productId, 'duplicate');
    };

    // Soumission AJAX pour ajout/modification
    if (productForm) {
        productForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            const formData = new FormData(productForm);
            selectedFiles.forEach((file, index) => {
                formData.append(`sai_image_${index}`, file);
            });
            formData.append('sai_statut', document.getElementById('productStatus').value);

            const url = currentProductId ? `/projet_web/products/update/${currentProductId}` : '/projet_web/products/enregister';
            try {
                const response = await fetch(url, {
                    method: 'POST',
                    body: formData
                });

                if (!response.ok) {
                    throw new Error(`Erreur HTTP : ${response.status} ${response.statusText}`);
                }

                const data = await response.json();
                if (data.success) {
                    showToast(currentProductId ? 'Produit mis à jour avec succès !' : 'Produit ajouté avec succès !');
                    productModal.classList.add('hidden');
                    location.reload();
                } else {
                    showToast(data.message || 'Erreur lors de l\'opération', 'error');
                }
            } catch (error) {
                console.error('Erreur réseau :', error);
                showToast(`Erreur réseau : ${error.message}`, 'error');
            }
        });

        // Enregistrer comme brouillon
        if (saveAsDraftBtn) {
            saveAsDraftBtn.addEventListener('click', async function() {
                document.getElementById('productStatus').value = 'draft';
                productForm.dispatchEvent(new Event('submit'));
            });
        }
    }

    // Gestion de la suppression
    const deleteButtons = document.querySelectorAll('.delete-product-btn');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.dataset.productId;
            const productName = this.dataset.productName;
            deleteConfirmText.textContent = `Êtes-vous sûr de vouloir supprimer le produit "${productName}" ? Cette action est irréversible.`;
            deleteConfirmModal.classList.remove('hidden');

            confirmDeleteBtn.onclick = async function() {
                try {
                    const response = await fetch(`/projet_web/products/delete/${productId}`, {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' }
                    });
                    if (!response.ok) {
                        throw new Error(`Erreur HTTP : ${response.status}`);
                    }
                    const data = await response.json();
                    if (data.success) {
                        showToast('Produit supprimé avec succès !');
                        deleteConfirmModal.classList.add('hidden');
                        location.reload();
                    } else {
                        showToast(data.message || 'Erreur lors de la suppression', 'error');
                    }
                } catch (error) {
                    showToast(`Erreur réseau : ${error.message}`, 'error');
                }
            };
        });
    });

    if (cancelDeleteBtn) {
        cancelDeleteBtn.addEventListener('click', function() {
            deleteConfirmModal.classList.add('hidden');
        });
    }
});