<?php
session_start();

// Vérifier si l'utilisateur est connecté
if(isset($_SESSION['user'])){
    // Récupérer les données des utilisateurs depuis le fichier JSON
    $users = json_decode(file_get_contents("../utilisateurs.json"), true);

    // Trouver l'utilisateur connecté dans le tableau des utilisateurs
    foreach($users['jeune'] as $user){
        if($user['id'] === $_SESSION['user']){
            // Afficher les informations de l'utilisateur
            $id = $user['id'];
            $prenom = $user['prenom'];
            $nom = $user['nom'];
            $email = $user['email'];
            $date = $user['date'];
            $reseau = $user['reseau'];
            $tel = $user['tel'];
            $mdp = $user['mdp'];

            // Récupérer les références de l'utilisateur
            $references = $user['references'];
        }
    }
} else {
    // Si l'utilisateur n'est pas connecté, le rediriger vers la page de connexion
    header("Location: /connexion/connexion.php");
    exit;
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Jeunes 6.4</title>
    <link rel="stylesheet" type="text/css" href="liste_reference.css">
    <script src="../fonction.js" type="text/javascript"> </script>
</head>

<body>
    <div class="bande-grise">
        <div class="contenu">
            <a href="../accueil.html">
                <img src="/image/jeunes.PNG" alt="Image">
            </a>
            <div class="texte">
                <p>JEUNE</p>
            </div>
            <div class="t2">
                <p>Mes références</p>
            </div>
        </div>
        <div class="commande">
 
            <div class="pdf"> 
                <a href="/pdf/generer.php" class="button">Générer PDF</a>
            </div>
           
            <div class="profil">
                <a href="/profil/profil.php" class="button">Profil</a>
            </div>

            <div class="deconnexion">
                <a href="/deconnexion/deconnexion.php" class="button">Déconnexion</a>
            </div>
        </div>
    </div>

    <img src="/image/traitRose.jpg" alt="traitrose" class="traitrose">

    <form action="../mail/mail_consul.php" method="POST">
    <div class="references-container">

    <input type="hidden" name="id" value="<?php echo $id; ?>">

        <?php foreach($references as $reference): ?>
            <?php if ($reference['valide']): ?>
                <label class="reference-label">
                    <span class="reference-checkbox">
                        <input type="checkbox" name="reference[]" value="<?php echo $reference['email_ref']; ?>">
                    </span>
                </label>
            <?php endif; ?>
            <div class="reference <?php if ($reference['valide']) echo 'reference-validee'; ?>" onclick="MontrerDetails(this)">
                <p><b>Référent:</b> <?php echo $reference['nom_ref']; echo " "; echo $reference['prenom_ref']; ?></p>
                <p><b>Engagement :</b> <?php echo $reference['engagement']; ?></p>
              
                <div class="reference-details <?php if ($reference['valide']) echo 'reference-validee-details'; ?>" style="display: none;">
                    <p><b>Email du référent:</b> <?php echo $reference['email_ref']; ?></p>
                    <p><b>Durée :</b> <?php echo $reference['duree']; ?></p>
                    <p><b>Milieu :</b> <?php echo $reference['milieu']; ?></p>
                    <p><b>Qualités :</b> <?php echo implode(", ", $reference['qualites']); ?></p>
                    <p><b>Statut :</b> <?php if ($reference['valide']==true){
                        echo "Validée par le référent.";
                    }
                    else{
                        echo "Non validée par le référent"; 
                    }?></p>

                    <?php if ($reference['valide']==true){
                        echo "<p><b>Commentaire du référent : </b>"; echo $reference['Commentaire'];
                        echo "<p><b>Qualités confirmées par le référent : </b>"; echo implode(", ", $reference['qualites_ref']);;
                    }
                   ?>
                   <br><button class="supprimer-reference" data-reference-id="<?php echo $reference['email_ref']; ?>"><b>Supprimer</b></button>


                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="envoyer">
        <label for="email"> Veuillez entrer l'email du Consultant: </label><br>
        <input type="email" id="emailC" name="emailC" value="" required><br>
        <button type="submit" class="bouton" onclick="envoyer()">Envoyer</button>
    </div>
    </form>

</body>
</html>
