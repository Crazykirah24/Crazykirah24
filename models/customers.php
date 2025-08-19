<?php 

class customersmodel{
	public $nom_prenom;
	public $email;
	public $adresse;
	public $telephone;
	public $ville;
	public $pays;
	// pour la db
	public $con;

	function __construct()
	{
		//connexion à la base de donnée
		include 'config/database.php';
	} 

	//Methodes
	public function Ajoutercustomers()
	{
		$req = $this->con->prepare("INSERT INTO users Values(null, :nom_prenom, :email, :adresse, :telephone, :ville, :pays)");
		$req->BindParam(":nom_prenom", $this->nom_prenom);
		$req->BindParam(":email", $this->email);
		$req->BindParam(":telephone", $this->telephone);
		$req->BindParam(":ville", $this->ville);
		$req->BindParam(":pays", $this->pays);
		$sol->$req = execute();
		return $sol;  
	}
	
}

?>