<?php
    //echo json_encode($_POST);

    $nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $reseau = $_POST['reseau'];
    $mdp = $_POST['mdp'];
    
    $utilisateur = [
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'date' => $date,
        'reseau' => $reseau,
        'mdp' => $mdp
    ];
    $utilisateurs = json_decode(file_get_contents('../utilisateurs.json'), true) ?: [];
    $utilisateurs[] = $utilisateur;
    file_put_contents('../utilisateurs.json', json_encode($utilisateurs,JSON_PRETTY_PRINT));
    
    // Rediriger vers la page de connexion
    //header('Location: connexion.php');
    //exit;
?>

