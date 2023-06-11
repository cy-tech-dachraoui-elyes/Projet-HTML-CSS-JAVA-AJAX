<?php
// Vérifier si les données POST ont été soumises
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $email = htmlspecialchars(strip_tags($_POST['mail'])) ?? '';
    $id = htmlspecialchars(strip_tags($_POST['id'])) ?? '';
    $nomR = htmlspecialchars(strip_tags($_POST['nomR'])) ?? '';
    $prenomR = htmlspecialchars(strip_tags($_POST['prenomR'])) ?? '';
    $emailR = htmlspecialchars(strip_tags($_POST['mailR'])) ?? '';
    $engagement = htmlspecialchars(strip_tags($_POST['engagement'])) ?? '';
    $duree = htmlspecialchars(strip_tags($_POST['duree'])) ?? '';
    $milieu = htmlspecialchars(strip_tags($_POST['milieu'])) ?? '';
    $qualites = $_POST['qualites'];


    // Charger le contenu du fichier utilisateurs.json dans une variable
    $json = file_get_contents('../utilisateurs.json');

    // Convertir le contenu JSON en tableau associatif PHP
    $utilisateurs = json_decode($json, true);

    // Parcourir le tableau des utilisateurs pour trouver celui correspondant à l'utilisateur actuel
    foreach ($utilisateurs['jeune'] as $key => $utilisateur) {
        if ($utilisateur['email'] == $email) {
            // Vérifier si l'utilisateur a déjà des demandes de référence existantes
            if (!isset($utilisateurs['jeune'][$key]['references'])) {
                // Créer un tableau vide pour stocker les demandes de référence
                $utilisateurs['jeune'][$key]['references'] = array();
            }

            // Ajouter la nouvelle demande de référence au tableau des références de l'utilisateur
            $reference = array(
                'nom_ref' => $nomR,
                'prenom_ref' => $prenomR,
                'email_ref' => $emailR,
                'engagement' => $engagement,
                'duree' => $duree,
                'milieu' => $milieu,
                'qualites' => $qualites,
                'valide' => false, // par défaut la demande de référence est non validée.
                'Commentaire' => "" ,
                'qualites_ref' => "",
                'cochee' => false // par défaut la référence n'est pas cochée.
            );
            $utilisateurs['jeune'][$key]['references'][] = $reference;

            // Enregistrer les modifications dans le fichier utilisateurs.json
            $json = json_encode($utilisateurs, JSON_UNESCAPED_UNICODE| JSON_PRETTY_PRINT);
            file_put_contents('../utilisateurs.json', $json);

            // Afficher un message de confirmation

	        include("mail/mail.php"); // Inclusion du fichier PHP pour l'envoi de l'e-mail au référent 

            header('Location: Jeune.php');
            break;
        }
    }
} else {
    // Rediriger vers la page d'accueil si les données POST ne sont pas soumises
    header('Location: accueil.php');
    exit;
}
?>
