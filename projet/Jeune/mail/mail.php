<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Création d'une nouvelle instance de PHPMailer
$mail = new PHPMailer(true);

$emailR_encoded = urlencode($emailR);
$id_encoded = urlencode($id);
$lien = "http://localhost:8080/referent.html?emailR=$emailR_encoded&id=$id_encoded";


try {
    // Paramètres du serveur SMTP de Laposte
    $mail->isSMTP();
    $mail->Host = 'smtp.laposte.net';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';

    // Informations d'authentification
    $mail->SMTPAuth = true;
    $mail->Username = 'engagementjeunes6.4@laposte.net';
    $mail->Password = '@Jeunes6.4cytech';

    // Paramètres de l'e-mail
    $mail->setFrom('engagementjeunes6.4@laposte.net', 'Votre Nom');
    $mail->addAddress($emailR, $nomR . ' ' . $prenomR);
    $mail->Subject = 'Jeune.engagement6.4';
    $mail->Body = utf8_decode('Bonjour ' . $prenomR . ", \n\n" .
    "Nous tenions à vous présenter le site Jeunes 6.4, une plateforme dédiée à reconnaître et valoriser l'engagement des jeunes âgés de 16 à 30 ans, qu'il soit associatif ou informel.\n" .
    "Nous croyons fermement que toute expérience d'engagement mérite d'être reconnue à sa juste valeur.\n\n" .

    "Jeunes 6.4 offre une opportunité pour ces jeunes engagés de faire valoir leurs compétences et leur savoir-être acquis au travers de leur investissement dans des actions citoyennes.\n" .
    "Nous souhaitons offrir une reconnaissance et une valorisation de ces engagements, en les considérant comme une véritable richesse pour la société.\n\n" .

    "Ce site s'adresse également à vous, responsables de structures ou référents, qui avez été témoins de l'engagement de ces jeunes.\n" .
    "Nous vous encourageons à vous engager à votre tour en confirmant leur valeur et en participant à la mise en lumière de leurs accomplissements.\n\n" .
    
    "Nous vous invitons donc à cliquer sur le lien suivant pour accéder au site Jeunes 6.4 :\n" .
    $lien .".\n\n" .

    "Nous espérons que cette initiative vous intéressera et que vous rejoindrez notre démarche de reconnaissance de l'engagement des jeunes.\n\n" .

    "Cordialement,\n" .
    "L'équipe Jeunes 6.4");



    $mail->send();
    //echo 'L\'e-mail a été envoyé avec succès';
} catch (Exception $e) {
    echo 'Une erreur s\'est produite lors de l\'envoi de l\'e-mail : ' . $mail->ErrorInfo;
}
?>
