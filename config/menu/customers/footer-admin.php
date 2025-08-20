<script>
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

        // Gestion du modal
        const addProductBtn = document.getElementById('addProductBtn');
        const productModal = document.getElementById('productModal');
        const closeProductModal = document.getElementById('closeProductModal');
        const cancelProductBtn = document.getElementById('cancelProductBtn');
        const productForm = document.getElementById('productForm');
        const fileInput = document.getElementById('product-image-upload');
        const uploadContainer = document.querySelector('.border-2.border-dashed');
        const imagePreviewContainer = document.getElementById('image-preview-container');

        // Tableau pour stocker les fichiers sélectionnés
        let selectedFiles = [];

        if (addProductBtn) {
            addProductBtn.addEventListener('click', function() {
                productModal.classList.remove('hidden');
                productForm.reset();
                imagePreviewContainer.innerHTML = '';
                selectedFiles = [];
                fileInput.value = '';
            });
        }

        if (closeProductModal) {
            closeProductModal.addEventListener('click', function() {
                productModal.classList.add('hidden');
                selectedFiles = [];
                fileInput.value = '';
            });
        }

        if (cancelProductBtn) {
            cancelProductBtn.addEventListener('click', function() {
                productModal.classList.add('hidden');
                selectedFiles = [];
                fileInput.value = '';
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

        // Soumission AJAX
        if (productForm) {
            productForm.addEventListener('submit', async function(e) {
                e.preventDefault();
                const formData = new FormData(productForm);
                selectedFiles.forEach((file, index) => {
                    formData.append(`sai_image_${index}`, file);
                });

                try {
                    const response = await fetch('/projet_web/products/enregister', {
                        method: 'POST',
                        body: formData
                    });

                    if (!response.ok) {
                        throw new Error(`Erreur HTTP : ${response.status} ${response.statusText}`);
                    }

                    const data = await response.json();
                    if (data.success) {
                        showToast('Produit ajouté avec succès !');
                        productModal.classList.add('hidden');
                        location.reload();
                    } else {
                        showToast(data.message || 'Erreur lors de l\'ajout du produit', 'error');
                    }
                } catch (error) {
                    console.error('Erreur réseau :', error);
                    showToast(`Erreur réseau : ${error.message}`, 'error');
                }
            });
        }
    });
    </script>