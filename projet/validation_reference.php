<?php
$emailR = $_POST['email'];
$id = $_POST['id'];
$nomR = $_POST['nom'];
$qualites = $_POST['qualites'];
$commentaire = $_POST['commentaire'];

// Charger le contenu du fichier utilisateurs.json dans une variable
$json = file_get_contents('utilisateurs.json');

// Convertir le contenu JSON en tableau associatif PHP
$utilisateurs = json_decode($json, true);

foreach ($utilisateurs['jeune'] as &$utilisateur) {
    if ($utilisateur['id'] == $id) {
        foreach ($utilisateur['references'] as &$referent) {
            if ($referent['email_ref'] == $emailR && $referent['nom_ref'] == $nomR) {
                $referent['valide'] = true;
                $referent['Commentaire'] = $commentaire;
                $referent['qualites_ref'] = $qualites;
                
            }
        }
    }
}

// Convertir le tableau associatif PHP en JSON
$json_updated = json_encode($utilisateurs,JSON_UNESCAPED_UNICODE| JSON_PRETTY_PRINT);

// Écrire le JSON mis à jour dans le fichier utilisateurs.json
file_put_contents('utilisateurs.json', $json_updated);

echo "La référence a été validée avec succès.";
?>
