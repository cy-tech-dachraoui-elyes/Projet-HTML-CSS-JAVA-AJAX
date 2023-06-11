<?php
session_start();

// Vérifier si l'utilisateur est connecté et s'il est un administrateur
if($_SESSION['role'] === 'admin') {
    $users = json_decode(file_get_contents("../utilisateurs.json"), true);

    $userId = intval($_GET['id']);  // convertir l'id en un entier

    // Trouver l'utilisateur à supprimer et le supprimer
    foreach($users['jeune'] as $index => $user) {
        if($user['id'] === $userId){
            unset($users['jeune'][$index]);
            file_put_contents("../utilisateurs.json", json_encode($users,JSON_UNESCAPED_UNICODE| JSON_PRETTY_PRINT));
            break;
        }
    }
} else {
    header("Location: ../accueil.html");
    exit;
}
?>

<!-- Affiche un message de confirmation -->
<p>L'utilisateur a été supprimé.</p>
<button onclick="location.href='admin.php'">Retour à la page administrateur</button>
