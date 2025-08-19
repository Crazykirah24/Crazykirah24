<?php 
require 'models/products.php';
class products {

	public function enregister(){
		 $nom_produit="";
		 $description="";
		 $prix="";
		 $prix_promo="";
		 $stock="";

	// instantiation de la classe
	$user = new productsmodel();

		if (isset($_POST['btn_ajouter'])) {
			$user->nom_produit = $_POST['sai_nom_produit'];
			$user->description = $_POST['sai_description'];
			$user->prix = $_POST['sai_prix'];
			$user->prix_promo = $_POST['sai_prix_promo'];
			$user->stock = $_POST['sai_stock'];				
			$sol = $user->Addproducts();

			if ($sol==true) {
				echo'Succes';
			}else{
				echo'404';
			}
		}
		include'views/products/formulaire-products.php';
	}
}	

?>