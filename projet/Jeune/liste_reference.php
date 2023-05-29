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
    header("Location: ../connexion.php");
    exit;
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Jeunes 6.4</title>
    <link rel="stylesheet" type="text/css" href="liste_reference.css">
    <script>
        function MontrerDetails(element) {
            const details = element.querySelector('.reference-details');
            if (details.style.display === 'block') {
                details.style.display = 'none';
            } else {
                details.style.display = 'block';
            }
        }
    </script>
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
            <div class="profil">
                <a href="/profil/profil.php" class="button">Profil</a>
            </div>

            <div class="deconnexion">
                <a href="/deconnexion/deconnexion.php" class="button">Déconnexion</a>
            </div>
        </div>
    </div>

    <img src="/image/traitRose.jpg" alt="traitrose" class="traitrose">

    <div class="references-container">
        <?php foreach($references as $reference): ?>
            <div class="reference" onclick="MontrerDetails(this)">
                <p><b>Référent:</b> <?php echo $reference['nom_ref']; echo " "; echo $reference['prenom_ref']; ?></p>
                <p><b>Engagement :</b> <?php echo $reference['engagement']; ?></p>
                <div class="reference-details" style="display: none;">
                    <p><b>Email du référent:</b> <?php echo $reference['email_ref']; ?></p>
                    <p><b>Durée :</b> <?php echo $reference['duree']; ?></p>
                    <p><b>Milieu :</b> <?php echo $reference['milieu']; ?></p>
                    <p><b>Qualités :</b> <?php echo implode(", ", $reference['qualites']); ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>