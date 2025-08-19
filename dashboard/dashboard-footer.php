<footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-4 gap-8">
                <div>
                    <h4 class="font-bold mb-4">À propos</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Qui sommes-nous</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Nos magasins</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Blog</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-bold mb-4">Service Client</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Contact</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Livraison</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Retours</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-bold mb-4">Légal</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">CGV</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Confidentialité</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Mentions légales</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-bold mb-4">Newsletter</h4>
                    <p class="text-gray-400 mb-4">Restez informé de nos dernières offres</p>
                    <div class="flex">
                        <input type="email" placeholder="Votre email" class="flex-1 px-4 py-2 rounded-l-button text-gray-900 text-sm">
                        <button class="!rounded-r-button !rounded-l-none bg-primary px-4 py-2 hover:bg-primary/90">
                            S'abonner
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-12 pt-8 flex justify-between items-center">
                <p class="text-gray-400">&copy; 2025 EduSupplies. Tous droits réservés.</p>
                <div class="flex space-x-4">
                    <i class="ri-visa-line text-2xl text-gray-400"></i>
                    <i class="ri-mastercard-line text-2xl text-gray-400"></i>
                    <i class="ri-paypal-line text-2xl text-gray-400"></i>
                </div>
            </div>
        </div>
    </footer>

    <script>
document.querySelectorAll('.add-to-cart-form').forEach(form => {
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        const formData = new FormData(form);
        const productName = form.dataset.productName;
        
        try {
            const response = await fetch('http://localhost/projet_web/carts/enregister', {
                method: 'POST',
                body: formData
            });
            
            const result = await response.json();
            
            if (result.success) {
                // Afficher une notification style Jumia
                showToast(`${productName} a été ajouté au panier`);
                
                // Mettre à jour le compteur du panier (optionnel)
                updateCartCounter(result.cartCount);
            } else {
                showToast("Erreur : " + (result.message || "Impossible d'ajouter au panier"), 'error');
            }
        } catch (error) {
            showToast("Erreur réseau", 'error');
        }
    });
});

// Fonction pour afficher les notifications
function showToast(message, type = 'success') {
    const toast = document.createElement('div');
    toast.className = `fixed bottom-4 right-4 px-6 py-3 rounded-lg shadow-lg text-white ${
        type === 'success' ? 'bg-green-500' : 'bg-red-500'
    } animate-fade-in-up`;
    toast.textContent = message;
    document.body.appendChild(toast);
    
    setTimeout(() => {
        toast.classList.add('animate-fade-out');
        setTimeout(() => toast.remove(), 500);
    }, 3000);
}

</script>