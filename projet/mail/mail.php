<?php
// On accède à notre fichier de base de données JSON
$accesFichier = '../utilisateurs.json';
// On charge les demandes existantes depuis la base de données JSON
$demandesExistantes = json_decode(file_get_contents($accesFichier),true);
// On ajoute la nouvelle demande à la liste des demandes existantes
$demandesExistantes[] = $reference;
// On enregistre les modifications dans le fichier JSON
file_put_contents($accesFichier, json_encode($demandesExistantes));
// Envoi du mail au référent

$referentCourriel = $emailR;
$objet = 'Nouvelle demande de référence de M ou Mme ' . $nomR . ' '. $prenomR;
$message = 'Bonjour,<br><br>';
$message .= 'Vous avez reçu une nouvelle demande de ' . $nomR . ' ' . $prenomR . ' pour le projet Jeunes 6.4.<br><br>';
$message .= 'Pour confirmer cette demande, veuillez cliquer sur le lien suivant :<br>';
$message .= '<a href="lien_de_confirmation">Confirmer la demande</a><br><br>';
$message .= 'Une fois confirmée, vous serez redirigé vers le module "Référent".<br><br>';
$message .= 'Cordialement,<br>';
$message .= 'L\'équipe du projet Jeunes 6.4';

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: MAINE@jeunes-6-4.fr' . "\r\n";//MAINE(Manal/Adam/Imen/Nathan/Elyes)

mail($referentCourriel, $objet, $message, $headers);
?>
