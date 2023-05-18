<?php
    //echo json_encode($_POST);

    $nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $reseau = $_POST['reseau'];
    $tel = "";
    $mdp = $_POST['mdp'];
    
    $utilisateurs = json_decode(file_get_contents('../utilisateurs.json'), true) ?: [];

    // Compter le nombre d'utilisateurs déjà enregistrés
    $nombreComptes = count($utilisateurs['jeune']);

    $utilisateur = [
        'id' => $nombreComptes + 1, // L'id est défini en fonction du nombre de comptes existants
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'date' => $date,
        'reseau' => $reseau,
        'tel' => $tel,
        'mdp' => $mdp
    ];
    $utilisateurs = json_decode(file_get_contents('../utilisateurs.json'), true) ?: [];

    // Vérifier si un compte "jeune" existe déjà
    if (isset($utilisateurs['jeune'])) {
    // Ajouter les nouvelles données au compte "jeune" existant
        $utilisateurs['jeune'][] = $utilisateur;
    } else {
    // Créer un tableau avec les nouvelles données pour le compte "jeune"
    $utilisateurs['jeune'] = [$utilisateur];
}
    file_put_contents('../utilisateurs.json', json_encode($utilisateurs,JSON_PRETTY_PRINT));
    
    // Rediriger vers la page de connexion
    //header('Location: connexion.php');
    //exit;
?>

