<?php 
require 'models/customers.php';
class customers {

	public function enregister()
	{
		 $nom_prenom="";
		 $email="";
		 $adresse="";
		 $telephone="";
		 $ville="";
		 $pays="";

		// instantiation de la classe
		$customers = new customersmodel();

		if (isset($_POST['btn-ajouter'])) 
		{
			$customers->nom_prenom = $_POST['sai_nom_prenom'];
			$customers->email = $_POST['sai_email'];
			$customers->adresse = $_POST['sai_adresse'];
			$customers->telephone = $_POST['sai_telephone'];
			$customers->ville = $_POST['sai_ville'];
			$customers->pays = $_POST['sai_pays'];
			$sol = $customers->Ajoutercustomers();

			if ($sol==true) {
				echo'Succes';
			}else{
				echo'404';
			}
		}
		// securite --debut

		// securite --fin--
			include'views/customers/dashboard-customers.php';
		
	}

	public function Addcart(){
		 $user_id="";             
		 $produit_id="";
		 $quantite="";
		 $prix_original="";
		 $promo_appliquee="";

	// instantiation de la classe
	$carts = new cartsmodel();

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$carts->user_id = $_POST['user_id'];
			$carts->produit_id = $_POST['produit_id'];
			$carts->quantite = $_POST['quantite'];
			$carts->prix_original = $_POST['prix_original'];
			$carts->promo_appliquee = $_POST['promo_appliquee'];				
			$sol = $carts->Addcarts();

			if ($sol==true) {
				echo'Succes';
			}else{
				echo'404';
			}
		}
		if(!isset($_SESSION['email']) and !isset($_SESSION['mdp']))
  		{
  			session_destroy();
  			header("location:http://localhost/projet_web/user/connexion");
		}

  		if($_SESSION['role']!="admin" || $_SESSION['role']!="super_admin" AND $_SESSION['role']!="client")
  		{
  			session_destroy();
  			header("location:http://localhost/projet_web/user/connexion");
  		}
		include'views/cart/cart.php';
	}
}	

?>