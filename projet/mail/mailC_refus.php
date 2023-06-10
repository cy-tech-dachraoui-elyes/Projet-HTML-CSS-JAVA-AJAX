<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Création d'une nouvelle instance de PHPMailer
$mail = new PHPMailer(true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $message = $_POST['message'] ?? '';

    $email_encoded = urlencode($email);

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
    $mail->addAddress($email, $nom . ' ' . $prenom);
    $mail->Subject = 'Jeune.engagement6.4';
    $mail->Body = utf8_decode('Bonjour ' . $prenom . ", \n\n" .

    "Nous regrettons de vous informer que suite à l'évaluation de votre dossier, nous avons pris la décision de ne pas retenir votre candidature.\n\n" .
    "Nous avons soigneusement examiné votre profil et vos qualifications, et bien que nous reconnaissions vos compétences, d'autres candidats ayant une expérience plus proche de ce que nous souhaitons ont été retenus pour poursuivre le processus de recrutement.\n\n".
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
