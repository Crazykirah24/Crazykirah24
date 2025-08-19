
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

<style>
/* Pour barrer les produits en rupture de stock */
.out-of-stock {
    opacity: 0.6;
    text-decoration: line-through;
    pointer-events: none;
}

/* Animations pour les toasts */
@keyframes fade-in-up {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
@keyframes fade-out {
    from { opacity: 1; transform: translateY(0); }
    to { opacity: 0; transform: translateY(20px); }
}
.animate-fade-in-up { animation: fade-in-up 0.5s ease-out; }
.animate-fade-out { animation: fade-out 0.5s ease-out; }

.toast { z-index: 1000; max-width: 300px; }

.remove-animation {
    animation: fade-out 0.5s ease-out;
    opacity: 0;
}
</style>

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

    // Fonction pour mettre à jour l'affichage
    function updateCartDisplay(data) {
        const cartCount = document.getElementById('cart-count');
        const cartItemCount = document.getElementById('cart-item-count');
        const summaryItemCount = document.getElementById('summary-item-count');
        const summarySubtotal = document.getElementById('summary-subtotal');
        const summaryTotal = document.getElementById('summary-total');

        if (cartCount) cartCount.textContent = data.cart_count;
        if (cartItemCount) cartItemCount.textContent = data.cart_count + ' article(s)';
        if (summaryItemCount) summaryItemCount.textContent = data.cart_count;
        if (summarySubtotal) summarySubtotal.textContent = data.sous_total + ' FCFA';
        if (summaryTotal) summaryTotal.textContent = data.total + ' FCFA';
    }

    // Gestion de l'ajout au panier
    document.querySelectorAll('.add-to-cart-btn').forEach(button => {
        button.addEventListener('click', async function() {
            const btnText = this.querySelector('.btn-text');
            const btnLoader = this.querySelector('.btn-loader');
            if (btnText) btnText.style.display = 'none';
            if (btnLoader) btnLoader.style.display = 'inline-block';

            const produitId = parseInt(this.dataset.id);
            const nom = this.dataset.nom;
            const prixOriginal = parseFloat(this.dataset.prixOriginal) || 0;
            const promo = parseFloat(this.dataset.promo) || 0;
            const quantite = parseInt(this.dataset.quantite) || 1;

            if (!produitId || !nom || isNaN(prixOriginal)) {
                showToast("Données du produit manquantes", 'error');
                if (btnText) btnText.style.display = 'inline';
                if (btnLoader) btnLoader.style.display = 'none';
                return;
            }

            console.log("Envoi des données :", { produit_id: produitId, nom, prix_original: prixOriginal, promo_appliquee: promo, quantite });

            try {
                const response = await fetch('/projet_web/Carts/enregister', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        produit_id: produitId,
                        nom: nom,
                        prix_original: prixOriginal,
                        promo_appliquee: promo,
                        quantite: quantite
                    })
                });

                if (!response.ok) {
                    throw new Error(`Erreur HTTP : ${response.status} ${response.statusText}`);
                }

                const data = await response.json();
                console.log("Réponse du serveur :", data);

                if (data.success) {
                    updateCartDisplay(data);
                    showToast(`${nom} a été ajouté au panier`);
                } else {
                    showToast(data.message || "Erreur lors de l'ajout au panier", 'error');
                }
            } catch (error) {
                console.error("Erreur réseau :", error);
                showToast(`Erreur réseau : ${error.message}`, 'error');
            } finally {
                if (btnText) btnText.style.display = 'inline';
                if (btnLoader) btnLoader.style.display = 'none';
            }
        });
    });

    // Gestion des boutons d'incrémentation
    document.querySelectorAll('.increment-btn').forEach(btn => {
        btn.addEventListener('click', async function() {
            const produitId = parseInt(this.dataset.produitId);
            const input = this.previousElementSibling;
            const newQty = parseInt(input.value) + 1;
            const stock = parseInt(input.dataset.stock) || 999;

            if (newQty > stock) {
                showToast('Stock insuffisant', 'error');
                return;
            }

            input.value = newQty;
            try {
                const response = await fetch('/projet_web/Carts/updateQuantity', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ produit_id: produitId, quantite: newQty })
                });

                if (!response.ok) {
                    throw new Error(`Erreur HTTP : ${response.status} ${response.statusText}`);
                }

                const data = await response.json();
                if (data.success) {
                    updateCartDisplay(data);
                    showToast('Quantité mise à jour');
                } else {
                    input.value = parseInt(input.value) - 1;
                    showToast(data.message || 'Erreur de mise à jour', 'error');
                }
            } catch (error) {
                console.error("Erreur réseau :", error);
                input.value = parseInt(input.value) - 1;
                showToast(`Erreur réseau : ${error.message}`, 'error');
            }
        });
    });

    // Gestion des boutons de décrémentation
    document.querySelectorAll('.decrement-btn').forEach(btn => {
        btn.addEventListener('click', async function() {
            const produitId = parseInt(this.dataset.produitId);
            const input = this.nextElementSibling;
            const newQty = parseInt(input.value) - 1;

            if (newQty < 1) return;

            input.value = newQty;
            try {
                const response = await fetch('/projet_web/Carts/updateQuantity', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ produit_id: produitId, quantite: newQty })
                });

                if (!response.ok) {
                    throw new Error(`Erreur HTTP : ${response.status} ${response.statusText}`);
                }

                const data = await response.json();
                if (data.success) {
                    updateCartDisplay(data);
                    showToast('Quantité mise à jour');
                } else {
                    input.value = parseInt(input.value) + 1;
                    showToast(data.message || 'Erreur de mise à jour', 'error');
                }
            } catch (error) {
                console.error("Erreur réseau :", error);
                input.value = parseInt(input.value) + 1;
                showToast(`Erreur réseau : ${error.message}`, 'error');
            }
        });
    });

    // Gestion de la suppression
    document.querySelectorAll('.remove-btn').forEach(btn => {
        btn.addEventListener('click', async function() {
            if (!confirm('Voulez-vous vraiment supprimer ce produit de votre panier ?')) return;

            const produitId = parseInt(this.dataset.produitId);
            const productCard = this.closest('.product-card');

            try {
                const response = await fetch('/projet_web/Carts/removeItem', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ produit_id: produitId })
                });

                if (!response.ok) {
                    throw new Error(`Erreur HTTP : ${response.status} ${response.statusText}`);
                }

                const data = await response.json();
                if (data.success) {
                    productCard.classList.add('remove-animation');
                    setTimeout(() => {
                        productCard.remove();
                        updateCartDisplay(data);
                        showToast('Produit supprimé');
                        if (data.cart_count === 0) {
                            setTimeout(() => location.reload(), 600);
                        }
                    }, 500);
                } else {
                    showToast(data.message || 'Erreur de suppression', 'error');
                }
            } catch (error) {
                console.error("Erreur réseau :", error);
                showToast(`Erreur réseau : ${error.message}`, 'error');
            }
        });
    });
});
</script>


