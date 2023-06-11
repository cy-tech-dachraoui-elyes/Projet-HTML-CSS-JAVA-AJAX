<?php
session_start();

// Vérifier si l'utilisateur est connecté et s'il est un administrateur
if($_SESSION['role'] === 'admin') {
    // Récupérer les données des utilisateurs depuis le fichier JSON
    $users = json_decode(file_get_contents("../utilisateurs.json"), true);
} else {
    header("Location: ../accueil.html");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Administration - Jeunes 6.4</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
    <div class="bande-grise">
        <div class="contenu">
            <a href="../accueil.html">
                <img src="/image/jeunes.PNG" alt="Image">
            </a>
            <div class="texte">
                <p>ADMINISTRATEUR</p>
            </div>
            <div class="t2">
                <p>Gestion des utilisateurs</p>
            </div>
        </div>
        <div class="commande">
           

            <div class="deconnexion">
                <a href="/deconnexion/deconnexion.php" class="button">Déconnexion</a>
            </div>
        </div>
    </div>

    <img src="/image/traitRose.jpg" alt="traitrose" class="traitrose">

    <div class="users-container">
        <?php foreach($users['jeune'] as $user): ?>
            <div class="user">
                <p><b>Nom:</b> <?php echo $user['nom']; echo " "; echo $user['prenom']; ?></p>
                <p><b>Email:</b> <?php echo $user['email']; ?></p>
                <p><b>Date de naissance:</b> <?php echo $user['date']; ?></p>
                <p><b>Réseau:</b> <?php echo $user['reseau']; ?></p>
                <!-- Remarque : N'affichez jamais les mots de passe en clair, même pour un administrateur -->
                <!-- <p><b>Mot de passe:</b> <?php echo $user['mdp']; ?></p> -->
                <a href="modif_profil.php?id=<?php echo $user['id']; ?>">Modifier</a>
                <a href="supp_profil.php?id=<?php echo $user['id']; ?>">Supprimer</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
