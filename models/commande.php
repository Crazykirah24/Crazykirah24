<?php 

class shopmodel{
	public $nom_produit;
	public $description;
	public $prix;
	public $prix_promo;
	public $stock;
	// pour la db
	public $con;

	function __construct(){
		//connexion à la base de donnée
		include 'config/database.php';
	} 

	//Methodes
	public function Addproducts()
	{
		$req = $this->con->prepare("INSERT INTO products Values(null, :nom_produit, :description, :prix, :prix_promo, :stock)");
		$req->BindParam(":nom_produit", $this->nom_produit);
		$req->BindParam(":description", $this->description);
		$req->BindParam(":prix", $this->prix);
		$req->BindParam(":prix_promo", $this->prix_promo);
		$req->BindParam(":stock", $this->stock);
		$sol->$req = execute();
		return $sol;
	}
	  
}

?>