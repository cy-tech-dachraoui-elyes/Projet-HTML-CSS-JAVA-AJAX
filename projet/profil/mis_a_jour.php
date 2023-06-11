<?php
// Vérifier si les données POST ont été soumises
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $nom = htmlspecialchars(strip_tags($_POST['nom'])) ?? '';
    $prenom = htmlspecialchars(strip_tags($_POST['prenom'])) ?? '';
    $email = htmlspecialchars(strip_tags($_POST['email'])) ?? '';
    $date = htmlspecialchars(strip_tags($_POST['date'])) ?? '';
    $reseau = htmlspecialchars(strip_tags($_POST['reseau'])) ?? '';
    $tel = htmlspecialchars(strip_tags($_POST['telephone'])) ?? '';
    $mdp = htmlspecialchars(strip_tags($_POST['mdp'])) ?? '';
    $id = htmlspecialchars(strip_tags($_POST['id'])) ?? '';

    // Récupération de l'ID de l'utilisateur actuel depuis la session

    // Charger le contenu du fichier utilisateurs.json dans une variable
    $json = file_get_contents('../utilisateurs.json');

    // Convertir le contenu JSON en tableau associatif PHP
    $utilisateurs = json_decode($json, true);

    // Parcourir le tableau des utilisateurs pour trouver celui correspondant à l'utilisateur actuel
    foreach ($utilisateurs['jeune'] as &$utilisateur) {
        if ($utilisateur['id'] == $id) {
            $utilisateur['nom'] = $nom;
            $utilisateur['prenom'] = $prenom;
            $utilisateur['date'] = $date;
            $utilisateur['reseau'] = $reseau;
            $utilisateur['email'] = $email;
            $utilisateur['tel'] = $tel;
            $utilisateur['mdp'] = $mdp;

            break;
        }
    }

    // Enregistrer les modifications dans le fichier utilisateurs.json
    $json = json_encode($utilisateurs, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    file_put_contents('../utilisateurs.json', $json);

    // Afficher un message de confirmation
    header('Location: profil.php');
} else {
    // Rediriger vers la page d'accueil si les données POST ne sont pas soumises
    header('Location: ../accueil.php');
    exit;
}

?>
