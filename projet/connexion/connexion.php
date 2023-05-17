<?php
session_start();

if(isset($_POST['email']) && isset($_POST['mdp'])){
    $email = strtolower($_POST['email']);
    $mdp = $_POST['mdp'];

    // Récupérer les données des utilisateurs depuis le fichier JSON
    $users = json_decode(file_get_contents("../utilisateurs.json"), true);

    // Vérifier si les informations de connexion sont correctes
    foreach($users['jeune'] as $user){
        if($user['email'] === $email && $user['mdp'] === $mdp ){
            $_SESSION['user'] = $user['prenom'];
            header("Location: ../jeune.php");
            exit;
        }
         //else {
            //var_dump($email);
            //var_dump($user['email']);}
    
    
    } 
   // Si les informations de connexion sont incorrectes, afficher un message d'erreur[{"nom":"sw","prenom":"ss","email":"a@gmail.com","date":"2023-05-15","reseau":"Instagram","mdp":"ok"}]
        $msg = "Adresse email ou mot de passe incorrect";

}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <link href="connexion.css" type="text/css" rel="stylesheet">
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

   

    <form method="POST">
        <div class="gradient"></div>
        <div class="sign-up-wrapper">
            <div class="sign-up">
                <?php if(isset($msg)): ?>
                <p class="erreur"><?php echo $msg; ?></p>
                <?php endif; ?>
                <h2>Se connecter</h2>
                <div class="input-box">
                    <span>Email</span>
                    <img class="imgs" width="16px" height="16px" src="/boutton/email.png" alt="email">
                    <input type="email" class="input" placeholder="Entre ton email..." id="email" name="email" required>
                </div>
                <div class="input-box">
                    <span>Mot de passe</span>
                    <img class="imgs" width="16px" height="16px" src="/boutton/lock.png" alt="password" onclick="affichage()">
                    <input type="password" class="input" placeholder="Entre ton mot de passe..." id="mdp" name="mdp" required>
                </div>
                <input type="submit" value="Se connecter">
            </div>
            
        </div>
    </form>
    
    <style>
        
        /*Style CSS qui met en rouge le message "adresse  ou mot de passe incorrect" 
        pour signaler une erreur à l'utilisateur*/

        .erreur{
            position  : absolute;
            top : 170px;
            color: red;
            font-size: 0.9em;
            padding: 0.5em;
        }

    </style>
</body>
</html>


<script>

// Cette fonction affiche le mot de passe 

        function affichage(){
            var afficher = document.getElementById("mdp");
            if(afficher.type === "password"){
                afficher.type = "texte";
            }
            else{
                afficher.type = "password";
            }
        }

</script>
