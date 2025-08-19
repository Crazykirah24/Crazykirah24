<?php 
session_start();
require 'models/user.php';

class user {
    function enregister() {
        $user = new usermodel();

        if (isset($_POST['btn-ajouter'])) {
            $user->email = $_POST['sai_email'] ?? '';
            $user->telephone = $_POST['sai_telephone'] ?? '';
            $user->mdp = $_POST['sai_mdp'] ?? '';
            
            if (!empty($_FILES['sai_photo']['name'])) {
                $user->photo_profil = file_get_contents($_FILES['sai_photo']['tmp_name']);
                $user->type_photo = $_FILES['sai_photo']['type'];
            } else {
                $user->photo_profil = "";
                $user->type_photo = "";
            }

            $sol = $user->AjouterUser();
            if ($sol) {
                echo 'Succes';
            } else {
                echo '404';
            }
        }

        // Sécurité
        if (!isset($_SESSION['email']) || !isset($_SESSION['role']) || $_SESSION['role'] != "super_admin") {
            session_destroy();
            header("Location: http://localhost/projet_web/user/connexion");
            exit;
        }

        include 'views/user/formulaire-user.php';
    }

    public function connexion() {
    $user = new usermodel();
    $cart = new cartsmodel();
    $message = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_valider'])) {
        $email = filter_input(INPUT_POST, 'sai_email', FILTER_SANITIZE_EMAIL);
        $password = $_POST['sai_mdp'] ?? '';

        if (!$email || !$password) {
            $message = "Veuillez remplir tous les champs";
            include "views/connexion/connexion.php";
            return;
        }

        $user->email = $email;
        $user->mdp = $password;
        $sol = $user->connexion();

        if (!empty($sol)) {
            // Initialiser les sessions utilisateur
            $_SESSION['id'] = $sol[0]["id"];
            $_SESSION['email'] = $sol[0]["email"];
            $_SESSION['telephone'] = $sol[0]["telephone"];
            $_SESSION['role'] = $sol[0]["role"];
            $_SESSION['photo_profil'] = $sol[0]["photo_profil"];
            $_SESSION['type_photo'] = $sol[0]["type"];
            $_SESSION['statut'] = $sol[0]["statut"];
            $_SESSION['date_inscription'] = $sol[0]["date_inscription"];
            $_SESSION['derniere_connexion'] = $sol[0]["derniere_connexion"];

            // Fusionner le panier de la session avec la base de données
            $cart->user_id = $_SESSION['id'];
            if (!empty($_SESSION['panier'])) {
                $cart->fusionnerPaniers($_SESSION['panier']);
            }

            // Charger le panier depuis la base de données
            $panier_db = $cart->loadFromDb($_SESSION['id']);
            $_SESSION['panier'] = [];
            foreach ($panier_db as $item) {
                $_SESSION['panier'][$item['id_produit']] = $item;
            }
            $_SESSION['panier_totaux'] = $cart->calculTotaux($panier_db);
            $_SESSION['cart_count'] = $_SESSION['panier_totaux']['cart_count'];
            $_SESSION['panier_synchronized'] = true; // Marquer comme synchronisé

            // Redirection selon le rôle
            if ($_SESSION['role'] === "super_admin" || $_SESSION['role'] === "admin") {
                header("Location: /projet_web/user/dashboard");
                exit;
            } elseif ($_SESSION['role'] === "client") {
                header("Location: /projet_web/customers/enregister");
                exit;
            } else {
                session_destroy();
                header("Location: /projet_web/user/connexion?error=role_invalide");
                exit;
            }
        } else {
            $message = "Email ou mot de passe incorrect";
            include "views/connexion/connexion.php";
            return;
        }
    }

    include "views/connexion/connexion.php";
}
    
	public function deconnexion()
	{	

		session_destroy();
		header("location:http://localhost/projet_web/");
  	}

	public function dashboard()
	{
   		//instanciation de la classe
  		$user = new usermodel();

  		if(!isset($_SESSION['email']) and !isset($_SESSION['mdp']))
  		{
  			session_destroy();
  			header("location:http://localhost/projet_web/user/connexion");
  		}

  		if($_SESSION['role']!="admin" AND $_SESSION['role']!="super_admin")
  		{
  			session_destroy();
  			header("location:http://localhost/projet_web/user/connexion");
  		}

   		include "views/user/tableau-bord.php";
  	}

  	public function dashboard_customers()
	{
   		//instanciation de la classe
  		$user = new usermodel();

  		if(!isset($_SESSION['email']) and !isset($_SESSION['mdp']))
  		{
  			session_destroy();
  			header("location:http://localhost/projet_web/user/connexion");
  		}

  		if($_SESSION['role']!="admin" AND $_SESSION['role']!="super_admin")
  		{
  			session_destroy();
  			header("location:http://localhost/projet_web/user/connexion");
  		}

   		include "views/user/customers.php";
  	}	
}

?>