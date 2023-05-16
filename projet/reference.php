<?php
// Vérifier si les données POST ont été soumises
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $email = $_POST['mail'] ?? '';
    $nomR = $_POST['nomR'] ?? '';
    $prenomR = $_POST['prenomR'] ?? '';
    $emailR = $_POST['mailR'] ?? '';
    $engagement = $_POST['engagement'] ?? '';
    $duree = $_POST['duree'] ?? '';
    $milieu = $_POST['milieu'] ?? '';
    $qualites = implode(', ', $_POST['qualites']);


    // Charger le contenu du fichier utilisateurs.json dans une variable
    $json = file_get_contents('utilisateurs.json');

    // Convertir le contenu JSON en tableau associatif PHP
    $utilisateurs = json_decode($json, true);

    // Parcourir le tableau des utilisateurs pour trouver celui correspondant à l'utilisateur actuel
    foreach ($utilisateurs as $key => $utilisateur) {
        if ($utilisateur['email'] == $email) {
            // Vérifier si l'utilisateur a déjà des demandes de référence existantes
            if (!isset($utilisateurs[$key]['references'])) {
                // Créer un tableau vide pour stocker les demandes de référence
                $utilisateurs[$key]['references'] = array();
            }

            // Ajouter la nouvelle demande de référence au tableau des références de l'utilisateur
            $reference = array(
                'nom_ref' => $nomR,
                'prenom_ref' => $prenomR,
                'email_ref' => $emailR,
                'engagement' => $engagement,
                'duree' => $duree,
                'milieu' => $milieu,
                'qualites' => $qualites
            );
            $utilisateurs[$key]['references'][] = $reference;

            // Enregistrer les modifications dans le fichier utilisateurs.json
            $json = json_encode($utilisateurs, JSON_UNESCAPED_UNICODE| JSON_PRETTY_PRINT);
            file_put_contents('utilisateurs.json', $json);

            // Afficher un message de confirmation
            echo "La demande de référence a été ajoutée!";
            break;
        }
    }
} else {
    // Rediriger vers la page d'accueil si les données POST ne sont pas soumises
    header('Location: index.html');
    exit;
}
?>
