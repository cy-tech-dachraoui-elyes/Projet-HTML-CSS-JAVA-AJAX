<?php
session_start();

if (isset($_POST['email']) && isset($_POST['mdp'])) {
    $email = strtolower($_POST['email']);
    $mdp = $_POST['mdp'];

    // Récupérer les données des utilisateurs depuis le fichier JSON
    $utilisateurs = json_decode(file_get_contents("../utilisateurs.json"), true);

    // Vérifier si les informations de connexion sont correctes
    foreach ($utilisateurs['jeune'] as $utilisateur) {
        if ($utilisateur['email'] === $email && $utilisateur['mdp'] === $mdp) {
            $_SESSION['user'] = $utilisateur['id'];
            header("Location: /profil/profil.php");
            exit;
        }
    }

    // Si les informations de connexion sont incorrectes, afficher un message d'erreur
    $msg = "Adresse email ou mot de passe incorrect";
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Connexion</title>
    <link href="connexion.css" type="text/css" rel="stylesheet">
    <script src="../fonction.js" type="text/javascript"></script>
</head>

<body>
    <div class="bande-grise">
        <div class="contenu">
            <a href="../accueil.html">
                <img src="/image/jeunes.PNG" alt="Image">
            </a>
            <div class="texte">
                <p>Connexion</p>
            </div>
        </div>
    </div><br>

    <div class="Accueil">
        <a href="../accueil.html" class="button">Retour Accueil</a>
    </div>
    
    <form method="POST">
        <div class="zone-inscription">
            <div class="inscription">
                <?php if (isset($msg)): ?>
                    <!-- Affichage d'un message d'erreur en cas d'identifiant ou de mot de passe incorrect. -->
                    <p class="erreur"><?php echo $msg; ?></p>
                <?php endif; ?>
                <h2>Se connecter</h2>
                <div class="champ-saisie">
                    <span>Email</span>
                    <img class="imgs" width="16px" height="16px" src="/boutton/email.png" alt="email">
                    <input type="email" class="input" placeholder="Entre ton email..." id="email" name="email" required>
                </div>
                <div class="champ-saisie">
                    <span>Mot de passe</span>
                    <img class="imgs" width="16px" height="16px" src="/boutton/lock.png" alt="password" onclick="affichage()">
                    <input type="password" class="input" placeholder="Entre ton mot de passe..." id="mdp" name="mdp" required>
                </div>
                <input type="submit" value="Se connecter">

                <div class="compte">
                    <span class="texte">Pas de compte? </span><span class="texte"><a href="/inscription/Inscription.html">Créez-en un !</a></span>
                </div>
            </div>
        </div>
    </form>

    <style>
        /* Style CSS qui met en rouge le message "adresse ou mot de passe incorrect" 
           pour signaler une erreur à l'utilisateur */

        .erreur {
            position: absolute;
            top: 170px;
            color: red;
            font-size: 0.9em;
            padding: 0.5em;
        }
    </style>
</body>

</html>
