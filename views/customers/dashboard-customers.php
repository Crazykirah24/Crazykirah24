<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fournitures Universitaires en Ligne</title>
  <?php include 'config/content.php'; ?>
</head>
<body class="bg-gray-50 min-h-screen">

  <?php include 'config/menu/customers/header.php'; ?>

  <div class="flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow p-4 hidden md:block sidebar">
      <h2 class="text-xl font-semibold mb-4">Catégories</h2>
      <ul class="space-y-3 text-gray-700">
        <?php foreach ($categories as $mainCategory => $subCategories): ?>
          <li>
            <strong class="category-link" data-category="<?php echo htmlspecialchars($mainCategory); ?>"><?php echo ucfirst(htmlspecialchars($mainCategory)); ?></strong>
            <ul class="ml-4 text-sm text-gray-600 space-y-1">
              <?php foreach ($subCategories as $subCategory): ?>
                <li><a href="#" class="subcategory-link" data-category="<?php echo htmlspecialchars($subCategory); ?>"><?php echo ucfirst(htmlspecialchars($subCategory)); ?></a></li>
              <?php endforeach; ?>
            </ul>
          </li>
        <?php endforeach; ?>
      </ul>
    </aside>

    <!-- Contenu principal -->
    <main class="flex-1 px-4 md:px-10 py-6 space-y-16">
      <!-- Bannière -->
      <div class="w-full rounded-lg overflow-hidden shadow transform transition duration-600 hover:scale-105 hover:shadow-lg">
        <img src="https://via.placeholder.com/1200x300?text=Bienvenue+à+la+librairie+universitaire" class="w-full h-auto object-cover" alt="Bannière">
      </div>

    <!-- Catégories populaires -->
<section id="popular-categories">
    <h2 class="text-3xl font-bold text-gray-900 mb-6">Catégories populaires</h2>
    <div class="grid-responsive categories-grid" id="categories-container">
        <!-- Rempli dynamiquement via JavaScript -->
    </div>
</section>

<!-- Offres du moment -->
<section id="offers">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-3xl font-bold text-gray-900">Offres du moment</h2>
        <div class="flex items-center text-red-600">
            <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd"></path>
            </svg>
            <span class="text-sm font-medium">Offres limitées</span>
        </div>
    </div>
    <div class="grid-responsive offers-grid" id="offers-container">
        <!-- Rempli dynamiquement via JavaScript -->
    </div>
</section>

<!-- Produits recommandés -->
<section id="recommended">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-3xl font-bold text-gray-900">Recommandés pour vous</h2>
        <button class="text-blue-600 hover:text-blue-800 text-sm font-medium transition-colors duration-200">
            Voir tout →
        </button>
    </div>
    <div class="grid-responsive recommended-grid" id="recommended-container">
        <!-- Rempli dynamiquement via JavaScript -->
    </div>
</section>

<!-- Meilleures ventes -->
<section id="best-sellers">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-3xl font-bold text-gray-900">Meilleures ventes</h2>
        <div class="flex items-center text-green-600">
            <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="text-sm font-medium">Les plus populaires</span>
        </div>
    </div>
    <div class="grid-responsive bestsellers-grid" id="best-sellers-container">
        <!-- Rempli dynamiquement via JavaScript -->
    </div>
</section>
    </main>
  </div>

  <?php include 'config/menu/customers/footer.php'; ?>
  <script src="/projet_web/assets/js/customer-products.js"></script>
</body>
</html>