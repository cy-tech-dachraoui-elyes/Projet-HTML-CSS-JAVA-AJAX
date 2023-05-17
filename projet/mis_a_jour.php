<?php
// Vérifier si les données POST ont été soumises
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $email = $_POST['email'] ?? '';
    $date = $_POST['date'] ?? '';
    $reseau = $_POST['reseau'] ?? '';
    $engagement = $_POST['engagement'] ?? '';
    $duree = $_POST['duree'] ?? '';
    $qualites = implode(', ', $_POST['qualites']);

    // Charger le contenu du fichier utilisateurs.json dans une variable
    $json = file_get_contents('utilisateurs.json');

    // Convertir le contenu JSON en tableau associatif PHP
    $utilisateurs = json_decode($json, true);

    // Parcourir le tableau des utilisateurs pour trouver celui correspondant à l'utilisateur actuel
    foreach ($utilisateurs['jeune'] as &$utilisateur) {
        if ($utilisateur['email'] == $email) {
            $utilisateur['nom'] = $nom;
            $utilisateur['prenom'] = $prenom;
            $utilisateur['date'] = $date;
            $utilisateur['reseau'] = $reseau;
            $utilisateur['engagement'] = $engagement;
            $utilisateur['duree'] = $duree;
            $utilisateur['qualites'] = $qualites;

            break;
        }
    }

    // Enregistrer les modifications dans le fichier utilisateurs.json
    $json = json_encode($utilisateurs, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    file_put_contents('utilisateurs.json', $json);

    // Afficher un message de confirmation
    header('Location: jeune.php');
} else {
    // Rediriger vers la page d'accueil si les données POST ne sont pas soumises
    header('Location: accueil.html');
    exit;
}

?>
