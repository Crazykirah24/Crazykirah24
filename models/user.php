<?php 
class usermodel {
    public $nom;
    public $email;
    public $login;
    public $telephone;
    public $mdp;
    public $photo_profil;
    public $type_photo;
    public $statut;
    public $con;

    // Constructeur
    function __construct() {
        include 'config/database.php';
        // Assurez-vous que config/database.php définit $this->con comme un objet PDO
    }

    // Empêche la sérialisation de $con
    

    

    // Méthodes existantes
    public function AjouterUser() {
        $req = $this->con->prepare("INSERT INTO users VALUES (NULL, :nom, :email, :telephone, :mdp, :photo_profil, :statut)");
        $req->bindParam(":nom", $this->nom);
        $req->bindParam(":email", $this->email);
        $req->bindParam(":telephone", $this->telephone);
        $req->bindParam(":mdp", $this->mdp);
        $req->bindParam(":photo_profil", $this->photo_profil);
        $req->bindParam(":statut", $this->statut);
        $sol = $req->execute();
        return $sol;
    }

    public function login() {
    $req = $this->con->prepare("SELECT * FROM users WHERE login = :login AND mdp = :mdp");
    $req->bindParam(":login", $this->login);
    $req->bindParam(":mdp", $this->mdp);
    $req->execute();
    $sol = $req->fetch(PDO::FETCH_ASSOC);
    
    return $sol;
    }
  

}
?>