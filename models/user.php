<?php 

class usermodel {
	public $nom;
	public $email;
	public $telephone;
	public $mdp;
	public $photo_profil;
	public $type_photo;
	public $statut; 
	// pour la db
	public $con;

	//constructeur
	function __construct(){
		//connexion à la base de donnée
		include 'config/database.php';
	} 

	//Methodes
	public function AjouterUser(){
		$req = $this->con->prepare("INSERT INTO users Values(null, :nom, :email, :telephone, :mdp, :photo_profil, :statut )");
		$req->BindParam(":nom", $this->nom);
		$req->BindParam(":email", $this->email);
		$req->BindParam(":telephone", $this->telephone);
		$req->BindParam(":mdp", $this->mdp);
		$req->BindParam(":photo_profil", $this->photo_profil);
		$req->BindParam(":statut", $this->statut);
		$sol = $req->execute();
		return $sol;
 

	}

	public function connexion()
	{

		$req = $this->con->prepare("SELECT * FROM users WHERE email=:email and mdp=:mdp");
		$req->bindparam(":email",$this->email);
		$req->bindparam(":mdp",$this->mdp);
		$req->execute();
		$sol=$req->fetchall();
		return $sol;

	} 
}

?>