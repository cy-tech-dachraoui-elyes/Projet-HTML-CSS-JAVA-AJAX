<?php
session_start();

// Vérifier si l'utilisateur est connecté
if(isset($_SESSION['user'])){
    // Récupérer les données des utilisateurs depuis le fichier JSON
    $users = json_decode(file_get_contents("utilisateurs.json"), true);

    // Trouver l'utilisateur connecté dans le tableau des utilisateurs
    foreach($users as $user){
        if($user['prenom'] === $_SESSION['user']){
            // Afficher les informations de l'utilisateur
            $prenom = $user['prenom'];
            $nom = $user['nom'];
            $email = $user['email'];
            $date = $user['date'];
            $reseau = $user['reseau'];
        }
    }
} else {
    // Si l'utilisateur n'est pas connecté, le rediriger vers la page de connexion
    //header("Location: connexion.php");
    //exit;
    var_dump($_SESSION);
}
?>
