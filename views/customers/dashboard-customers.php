<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fournitures Universitaires en Ligne</title>
  <?php include 'config/home.php'; ?>
  <style>
    .sidebar {
      flex-shrink: 0;
    }
  </style>
</head>
<body class="bg-gray-50 min-h-screen">

  <?php include 'config/menu/customers/header.php'; ?>

  <div class="flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow p-4 hidden md:block sidebar">
      <h2 class="text-xl font-semibold mb-4">Catégories</h2>
      <ul class="space-y-3 text-gray-700">
        <li>
          <strong>Papeterie</strong>
          <ul class="ml-4 text-sm text-gray-600 space-y-1">
            <li><a href="#">Cahiers</a></li>
            <li><a href="#">Stylos</a></li>
            <li><a href="#">Surligneurs</a></li>
          </ul>
        </li>
        <li>
          <strong>Livres</strong>
          <ul class="ml-4 text-sm text-gray-600 space-y-1">
            <li><a href="#">Manuels</a></li>
            <li><a href="#">Romans</a></li>
          </ul>
        </li>
        <li>
          <strong>Électronique</strong>
          <ul class="ml-4 text-sm text-gray-600 space-y-1">
            <li><a href="#">Calculatrices</a></li>
            <li><a href="#">Casques</a></li>
          </ul>
        </li>
        <li>
          <strong>Accessoires</strong>
          <ul class="ml-4 text-sm text-gray-600 space-y-1">
            <li><a href="#">Sacs</a></li>
            <li><a href="#">Organisateurs</a></li>
          </ul>
        </li>
      </ul>
    </aside>

    <!-- Contenu principal -->
    <main class="flex-1 px-4 md:px-10 py-6 space-y-16">

      <!-- Bannière -->
      <div class="w-full rounded-lg overflow-hidden shadow transform transition duration-600 hover:scale-120 hover:shadow-lg">
        <img src="https://via.placeholder.com/1200x300?text=Bienvenue+à+la+librairie+universitaire" class="w-full h-auto object-cover" alt="Bannière">
      </div>

      <!-- Catégories populaires -->
      <section>
        <h2 class="text-2xl font-bold mb-4">Catégories populaires</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
          <div class="bg-white p-4 rounded shadow text-center transform transition duration-600 hover:scale-120 hover:shadow-lg">
            <img src="https://via.placeholder.com/150?text=Cahiers" class="mx-auto mb-2">
            <p class="font-semibold">Cahiers</p>
          </div>
          <div class="bg-white p-4 rounded shadow text-center transform transition duration-600 hover:scale-120 hover:shadow-lg">
            <img src="https://via.placeholder.com/150?text=Stylos" class="mx-auto mb-2">
            <p class="font-semibold">Stylos</p>
          </div>
          <div class="bg-white p-4 rounded shadow text-center transform transition duration-600 hover:scale-120 hover:shadow-lg">
            <img src="https://via.placeholder.com/150?text=Livres" class="mx-auto mb-2">
            <p class="font-semibold">Livres</p>
          </div>
          <div class="bg-white p-4 rounded shadow text-center transform transition duration-600 hover:scale-120 hover:shadow-lg">
            <img src="https://via.placeholder.com/150?text=Calculatrices" class="mx-auto mb-2">
            <p class="font-semibold">Calculatrices</p>
          </div>
        </div>
      </section>

      <!-- Offres du moment -->
      <section>
        <h2 class="text-2xl font-bold mb-4">Offres du moment</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div class="bg-white rounded shadow overflow-hidden transform transition duration-600 hover:scale-120 hover:shadow-lg">
            <img src="https://via.placeholder.com/300x200?text=Cahier+Promo" class="w-full">
            <div class="p-4">
              <h3 class="font-semibold">Cahier A4 -50%</h3>
              <p class="text-gray-600 text-sm mb-2">200 pages, haute qualité</p>
              <p class="text-primary font-bold">6,99 €</p>
            </div>
          </div>
          <div class="bg-white rounded shadow overflow-hidden transform transition duration-600 hover:scale-120 hover:shadow-lg">
            <img src="https://via.placeholder.com/300x200?text=Stylos+Promo" class="w-full">
            <div class="p-4">
              <h3 class="font-semibold">Pack stylos couleurs</h3>
              <p class="text-gray-600 text-sm mb-2">Idéal pour la prise de notes</p>
              <p class="text-primary font-bold">3,49 €</p>
            </div>
          </div>
          <div class="bg-white rounded shadow overflow-hidden transform transition duration-600 hover:scale-120 hover:shadow-lg">
            <img src="https://via.placeholder.com/300x200?text=Sac+à+Dos" class="w-full">
            <div class="p-4">
              <h3 class="font-semibold">Sac à dos étudiant</h3>
              <p class="text-gray-600 text-sm mb-2">Ergonomique et pratique</p>
              <p class="text-primary font-bold">19,99 €</p>
            </div>
          </div>
        </div>
      </section>

      <!-- Produits recommandés -->
      <section>
        <h2 class="text-2xl font-bold mb-4">Recommandés pour vous</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
          <div class="bg-white p-4 rounded shadow text-center transform transition duration-600 hover:scale-120 hover:shadow-lg">
            <img src="https://via.placeholder.com/150?text=Agendas" class="mx-auto mb-2">
            <p class="font-semibold">Agenda 2024</p>
          </div>
          <div class="bg-white p-4 rounded shadow text-center transform transition duration-600 hover:scale-120 hover:shadow-lg">
            <img src="https://via.placeholder.com/150?text=Marqueurs" class="mx-auto mb-2">
            <p class="font-semibold">Marqueurs effaçables</p>
          </div>
          <div class="bg-white p-4 rounded shadow text-center transform transition duration-600 hover:scale-120 hover:shadow-lg">
            <img src="https://via.placeholder.com/150?text=Clé+USB" class="mx-auto mb-2">
            <p class="font-semibold">Clé USB 32 Go</p>
          </div>
          <div class="bg-white p-4 rounded shadow text-center transform transition duration-600 hover:scale-120 hover:shadow-lg">
            <img src="https://via.placeholder.com/150?text=Lampe+de+bureau" class="mx-auto mb-2">
            <p class="font-semibold">Lampe de bureau LED</p>
          </div>
        </div>
      </section>

      <!-- Meilleures ventes -->
      <section>
        <h2 class="text-2xl font-bold mb-4">Meilleures ventes</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div class="bg-white rounded shadow overflow-hidden transform transition duration-600 hover:scale-120 hover:shadow-lg">
                        <img src="https://readdy.ai/api/search-image?query=professional%20modern%20notebook%20with%20pen%20on%20clean%20white%20background%2C%20minimalist%20office%20supplies%20photography&width=400&height=300&seq=2&orientation=landscape" alt="Cahier premium" class="w-full h-48 object-cover">
            <div class="p-4">
              <h3 class="font-semibold">Stylo Bille Bleu</h3>
              <div class="text-yellow-500 text-sm mb-1">
  ★★★★★
</div>

              <p class="text-gray-600 text-sm mb-2">Le préféré des étudiants</p>
              <p class="text-primary font-bold">0,99 €</p>
            </div>
          </div>
          <div class="bg-white rounded shadow overflow-hidden transform transition duration-600 hover:scale-120 hover:shadow-lg">
            <img src="https://readdy.ai/api/search-image?query=modern%20minimalist%20pen%20set%20arranged%20on%20clean%20white%20background%2C%20luxury%20stationery%20photography&width=400&height=300&seq=3&orientation=landscape" alt="Set de stylos" class="w-full h-48 object-cover">
            <div class="p-4">
              <h3 class="font-semibold">Calculatrice Casio FX</h3>
              <div class="text-yellow-500 text-sm mb-1">
  ★★★★★
</div>
              <p class="text-gray-600 text-sm mb-2">Fonctions scientifiques</p>
              <p class="text-primary font-bold">24,99 €</p>
            </div>
          </div>
          <div class="bg-white rounded shadow overflow-hidden transform transition duration-600 hover:scale-120 hover:shadow-lg
">
             <img src="https://readdy.ai/api/search-image?query=modern%20minimalist%20calculator%20on%20clean%20white%20background%2C%20professional%20office%20equipment%20photography&width=400&height=300&seq=4&orientation=landscape" alt="Calculatrice" class="w-full h-48 object-cover">
            <div class="p-4">
              <h3 class="font-semibold">Sac imperméable</h3>
              <div class="text-yellow-500 text-sm mb-1">
  ★★★★★
</div>
              <p class="text-gray-600 text-sm mb-2">Ultra résistant, multi-poches</p>
              <p class="text-primary font-bold">29,99 €</p>
            </div>
          </div>
        </div>
      </section>

    </main>
  </div>
  <?php include 'config/menu/customers/footer.php'; ?>
</body>
</html>

