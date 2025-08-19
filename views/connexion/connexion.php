<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title> 
    <?php include 'config/style_connexion.php'; ?>
</head>
<body>
    <div class="login-container">


        <div class="logo">
            <?php if (isset($message)) echo "<p style='color:red;'>$message</p>"; ?>
            <h1>MonApplication</h1>
        </div>
        
        <form class="login-form" method="POST">

            <div class="input-group">
                <label for="email">Adresse email ou numéro de téléphone</label>
                <input type="text" name="sai_email" placeholder="Entrez votre email ou numéro de téléphone" required>
            </div>
            
            <div class="input-group">
                <label for="mdp">Mot de passe</label>
                <input type="password" name="sai_mdp" placeholder="Entrez votre mot de passe" required>
            </div>
            
            <button name="btn_valider">Se connecter</button>
            
            <div class="forgot-password">
                <a href="#">Mot de passe oublié ?</a>
            </div>
            
            <div class="divider">OU</div>
            
            <div class="alternative-login">
                <p>Vous n'avez pas de compte ?</p>
                <button name="" style="background-color: white; color: #0077b6; border: 2px solid #0077b6;">Créer un compte</button>
            </div>
        </form>
    </div>
</body>
</html>