<?php if(!empty($_SESSION['role'])){ if($_SESSION['role']=="super_admin"){ ?>
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md z-10 flex flex-col">
            <div class="p-4 border-b flex items-center">
                <span class="text-2xl font-['Pacifico'] text-primary">logo</span>
                <button class="ml-auto w-8 h-8 flex items-center justify-center text-gray-500 hover:text-gray-700">
                    <i class="ri-menu-fold-line ri-lg"></i>
                </button>
            </div>
            <div class="flex-1 overflow-y-auto py-4">
                <nav class="px-2 space-y-1">
                    <a href="/projet_web/user/dashboard" class="sidebar-item active flex items-center px-3 py-3 text-sm font-medium rounded-md">
                        <div class="w-5 h-5 flex items-center justify-center mr-3">
                            <i class="ri-dashboard-line"></i>
                        </div>
                        <span>Tableau de bord</span>
                    </a>
                    <a href="/projet_web/products/index" class="sidebar-item flex items-center px-3 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-md">
                        <div class="w-5 h-5 flex items-center justify-center mr-3">
                            <i class="ri-shopping-bag-line"></i>
                        </div>
                        <span>Produits</span>
                    </a>
                    <a href="/projet_web/user/dashboard_customers" class="sidebar-item flex items-center px-3 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-md">
                        <div class="w-5 h-5 flex items-center justify-center mr-3">
                            <i class="ri-user-line"></i>
                        </div>
                        <span>Clients</span>
                    </a>
                    <a href="/projet_web/shop/dashboard_shop" class="sidebar-item flex items-center px-3 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-md">
                        <div class="w-5 h-5 flex items-center justify-center mr-3">
                            <i class="ri-shopping-cart-line"></i>
                        </div>
                        <span>Commandes</span>
                    </a>
                    <a href="#" class="sidebar-item flex items-center px-3 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-md">
                        <div class="w-5 h-5 flex items-center justify-center mr-3">
                            <i class="ri-bar-chart-line"></i>
                        </div>
                        <span>Rapports</span>
                    </a>
                    <a href="#" class="sidebar-item flex items-center px-3 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-md">
                        <div class="w-5 h-5 flex items-center justify-center mr-3">
                            <i class="ri-file-text-line"></i>
                        </div>
                        <span>Contenu</span>
                    </a>
                    <a href="#" class="sidebar-item flex items-center px-3 py-3 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-md">
                        <div class="w-5 h-5 flex items-center justify-center mr-3">
                            <i class="ri-settings-line"></i>
                        </div>
                        <span>Paramètres</span>
                    </a>
                </nav>
            </div>
            <div class="p-4 border-t">
                <div class="flex items-center">
                    <?php if(empty($_SESSION['photo_profil'])){  ?>
                    <img class="h-8 w-8 rounded-full" src="https://readdy.ai/api/search-image?query=professional%20headshot%20of%20a%20young%20business%20man%20with%20short%20hair%2C%20wearing%20a%20business%20suit%2C%20high%20quality%20portrait%20photo&width=200&height=200&seq=123&orientation=squarish" alt="Photo de profil">
                     <?php }else{ ?>
                     <img class="h-8 w-8 rounded-full" src="data:<?php echo $_SESSION['type_photo']; ?>;base64,<?php echo base64_encode($_SESSION['photo_profil']); ?>"  alt="Photo de profil">
                      <?php } ?>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-700"> <?php echo $_SESSION['email'];?></p>
                        <p class="text-xs font-medium text-gray-500"><?php echo $_SESSION['role'];?></p>
                    </div>
                    <button class="ml-auto w-8 h-8 flex items-center justify-center text-gray-500 hover:text-gray-700">
                        <i class="ri-logout-box-line"></i>
                    </button>
                </div>
            </div>
        </aside>
       <?php }} ?>