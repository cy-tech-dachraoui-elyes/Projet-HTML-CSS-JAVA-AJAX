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
            $id = htmlspecialchars(strip_tags($user['id']));
            $prenom = htmlspecialchars(strip_tags($user['prenom']));
            $nom = htmlspecialchars(strip_tags($user['nom']));
            $email = htmlspecialchars(strip_tags($user['email']));
            $date = htmlspecialchars(strip_tags($user['date']));
            $reseau = htmlspecialchars(strip_tags($user['reseau']));
            $tel = htmlspecialchars(strip_tags($user['tel']));
            $mdp = htmlspecialchars(strip_tags($user['mdp']));
            if(!isset($user['references'])){ // Vérifie si aucune référence n'existe, puis met la variable à null
                $nbref = 'null';
            }
        }
    }
} else {
    // Si l'utilisateur n'est pas connecté, le rediriger vers la page de connexion
    //header("Location: connexion.php");
    //exit;
    var_dump($_SESSION);
}
?>
