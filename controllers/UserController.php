<?php 
session_start();
require 'models/user.php';
require "libraries/PHPMailer-master/src/PHPMailer.php";
require "libraries/PHPMailer-master/src/Exception.php";
require "libraries/PHPMailer-master/src/SMTP.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
    
    $error = '';
    $success = '';
    $showMfaModal = false;

    $mailConfig = [
        'host' => 'smtp.gmail.com',
        'username' => 'marcsanhin7@gmail.com',
        'password' => 'ctlw rnaa wdgi pwab',
        'port' => 587,
        'from_email' => 'marcsanhin7@gmail.com',
        'from_name' => 'EduSuplie'
    ];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        // Valider l'entrée (username ne doit pas être vide)
        if (empty($username)) {
            $error = 'Veuillez entrer un identifiant valide';
        } else {
            $user->login = $username; // Utiliser la propriété login
            $user->mdp = $password;

            try {
                $sol = $user->login(); // Appeler la méthode login()

                if ($sol) { // Vérifier si un utilisateur est trouvé
                    // Stocker les données de l'utilisateur dans la session
                    foreach ($sol as $key => $value) {
                        $_SESSION[$key] = $value;
                    }
                    
                    $_SESSION['temp_username'] = $username;
                    $_SESSION['temp_password'] = $password;

                    // Générer et envoyer l'OTP à l'email de l'utilisateur
                    $otp = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
                    $_SESSION['otp'] = $otp;
                    $_SESSION['otp_expiry'] = time() + 300;

                    $mail = new PHPMailer(true);
                    try {
                        $mail->isSMTP();
                        $mail->Host = $mailConfig['host'];
                        $mail->SMTPAuth = true;
                        $mail->Username = $mailConfig['username'];
                        $mail->Password = $mailConfig['password'];
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                        $mail->Port = $mailConfig['port'];
                        $mail->setFrom($mailConfig['from_email'], $mailConfig['from_name']);
                        $mail->addAddress($sol['email'], ($sol['nom'] ?? '') . ' ' . ($sol['prenom'] ?? '')); // Utiliser l'email de la BD
                        $mail->isHTML(true);
                        $mail->Subject = 'Votre code OTP pour Optima CBS';
                        $mail->Body = "
                            <p>Bonjour " . htmlspecialchars($sol['nom'] ?? '') . " " . htmlspecialchars($sol['prenom'] ?? '') . ",</p>
                            <p>Votre code OTP pour l'authentification à deux facteurs est : <strong>$otp</strong></p>
                            <p>Ce code est valable pendant 5 minutes.</p>
                            <p>Si vous n'avez pas demandé ce code, veuillez ignorer cet email.</p>
                            <p>Cordialement,<br>L'équipe EduSuplie</p>
                        ";
                        $mail->AltBody = "Votre code OTP : $otp. Valable 5 minutes.";
                        $mail->send();
                        $success = 'Un code OTP a été envoyé à votre email.';
                        $showMfaModal = true;
                    } catch (Exception $e) {
                        $error = 'Erreur lors de l\'envoi de l\'OTP : ' . $mail->ErrorInfo;
                    }
                } else {
                    $error = 'Identifiant ou mot de passe incorrect';
                }
            } catch (PDOException $e) {
                $error = 'Erreur lors de la vérification : ' . $e->getMessage();
            }
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['resend_otp'])) {
        if (isset($_SESSION['temp_username']) && isset($_SESSION['temp_password'])) {
            $username = $_SESSION['temp_username'];
            $password = $_SESSION['temp_password'];

            $user->login = $username; // Utiliser la propriété login
            $user->mdp = $password;

            try {
                $sol = $user->login();

                if ($sol) {
                    $otp = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
                    $_SESSION['otp'] = $otp;
                    $_SESSION['otp_expiry'] = time() + 300;

                    $mail = new PHPMailer(true);
                    try {
                        $mail->isSMTP();
                        $mail->Host = $mailConfig['host'];
                        $mail->SMTPAuth = true;
                        $mail->Username = $mailConfig['username'];
                        $mail->Password = $mailConfig['password'];
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                        $mail->Port = $mailConfig['port'];
                        $mail->setFrom($mailConfig['from_email'], $mailConfig['from_name']);
                        $mail->addAddress($sol['email'], ($sol['nom'] ?? '') . ' ' . ($sol['prenom'] ?? '')); // Utiliser l'email de la BD
                        $mail->isHTML(true);
                        $mail->Subject = 'Nouveau code OTP pour Optima CBS';
                        $mail->Body = "
                            <p>Bonjour " . htmlspecialchars($sol['nom'] ?? '') . " " . htmlspecialchars($sol['prenom'] ?? '') . ",</p>
                            <p>Votre nouveau code OTP pour l'authentification à deux facteurs est : <strong>$otp</strong></p>
                            <p>Ce code est valable pendant 5 minutes.</p>
                            <p>Si vous n'avez pas demandé ce code, veuillez ignorer cet email.</p>
                            <p>Cordialement,<br>L'équipe Optima CBS</p>
                        ";
                        $mail->AltBody = "Votre nouveau code OTP : $otp. Valable 5 minutes.";
                        $mail->send();
                        $success = 'Un nouveau code OTP a été envoyé à votre email.';
                        $showMfaModal = true;
                    } catch (Exception $e) {
                        $error = 'Erreur lors de l\'envoi du nouvel OTP : ' . $mail->ErrorInfo;
                    }
                } else {
                    $error = 'Erreur : identifiants invalides pour le renvoi.';
                }
            } catch (PDOException $e) {
                $error = 'Erreur lors de la vérification : ' . $e->getMessage();
            }
        } else {
            $error = 'Erreur : aucune session de connexion active.';
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mfa_code'])) {
        $mfaCode = trim($_POST['mfa_code']);
        if (isset($_SESSION['otp']) && isset($_SESSION['otp_expiry'])) {
            if (time() > $_SESSION['otp_expiry']) {
                $error = 'Le code OTP a expiré. Veuillez demander un nouveau code.';
                unset($_SESSION['otp']);
                unset($_SESSION['otp_expiry']);
                $showMfaModal = true;
            } elseif ($mfaCode === $_SESSION['otp']) {
                unset($_SESSION['otp']);
                unset($_SESSION['otp_expiry']);
                unset($_SESSION['temp_username']);
                unset($_SESSION['temp_password']);

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
                    header("Location: /projet_web/customers/index");
                    exit;
                } else {
                    session_destroy();
                    header("Location: /projet_web/user/connexion?error=role_invalide");
                    exit;
                }
            } else {
                $error = 'Code OTP invalide';
                $showMfaModal = true;
            }
        } else {
            $error = 'Aucun code OTP en cours. Veuillez vous reconnecter.';
        }
    }

    include "views/connexion/connexion.php";
}
    
    public function deconnexion() {
        session_destroy();
        header("location:http://localhost/projet_web/");
    }

    public function dashboard() {
        //instanciation de la classe
        $user = new usermodel();

        if(!isset($_SESSION['email']) and !isset($_SESSION['mdp'])) {
            session_destroy();
            header("location:http://localhost/projet_web/user/connexion");
        }

        if($_SESSION['role']!="admin" AND $_SESSION['role']!="super_admin") {
            session_destroy();
            header("location:http://localhost/projet_web/user/connexion");
        }

        include "views/user/tableau-bord.php";
    }

    public function dashboard_customers() {
        //instanciation de la classe
        $user = new usermodel();

        if(!isset($_SESSION['email']) and !isset($_SESSION['mdp'])) {
            session_destroy();
            header("location:http://localhost/projet_web/user/connexion");
        }

        if($_SESSION['role']!="admin" AND $_SESSION['role']!="super_admin") {
            session_destroy();
            header("location:http://localhost/projet_web/user/connexion");
        }

        include "views/user/customers.php";
    }   
}
?>