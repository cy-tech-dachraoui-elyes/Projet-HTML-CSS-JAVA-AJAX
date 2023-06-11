<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Création d'une nouvelle instance de PHPMailer
$mail = new PHPMailer(true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars(strip_tags($_POST['email'])) ?? '';
    $nom = htmlspecialchars(strip_tags($_POST['nom'])) ?? '';
    $prenom = htmlspecialchars(strip_tags($_POST['prenom'])) ?? '';

    $email_encoded = urlencode($email);
    $objet = utf8_decode('Validation recrutement');

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
    $mail->setFrom('engagementjeunes6.4@laposte.net', $objet);
    $mail->addAddress($email, $nom . ' ' . $prenom);
    $mail->Subject = 'Jeune.engagement6.4';
    $mail->Body = utf8_decode('Bonjour ' . $prenom . ", \n\n" .

    "Nous sommes ravis de vous informer que votre candidature a été retenue pour passer à la prochaine étape du processus de sélection.\n\n" .
    "Nous avons examiné attentivement votre profil, vos qualifications et votre expérience, et nous sommes convaincus que vous possédez les compétences et les aptitudes nécessaires pour contribuer de manière significative à notre équipe.\n".
    "Nous aimerions poursuivre le processus de sélection en organisant une entrevue avec vous. Nous vous contacterons dans les prochains jours pour convenir d'une date et d'une heure qui vous conviennent.\n".
    "Pendant l'entretien, nous discuterons plus en détail de votre expérience, de vos compétences et de la manière dont vous pourriez contribuer à notre équipe.\n".
    "Si vous avez des questions ou souhaitez obtenir de plus amples informations, n'hésitez pas à nous contacter.\n\n".
    "Cordialement,\n" .
    "L'équipe Jeunes 6.4");



    $mail->send();
    //echo 'L\'e-mail a été envoyé avec succès';
    header('Location: ../page0.html');

} catch (Exception $e) {
    echo 'Une erreur s\'est produite lors de l\'envoi de l\'e-mail : ' . $mail->ErrorInfo;
    }
}
?>
