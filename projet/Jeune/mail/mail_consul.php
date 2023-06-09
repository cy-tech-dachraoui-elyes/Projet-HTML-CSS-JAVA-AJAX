<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Création d'une nouvelle instance de PHPMailer
$mail = new PHPMailer(true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $emailC = $_POST['emailC'] ?? '';
    $id = $_POST['id'] ?? '';

    $emailC_encoded = urlencode($emailC);
    $id_encoded = urlencode($id);
    $lien = "http://localhost:8080/consultant/consultant.php?emailC=$emailC_encoded&id=$id_encoded";
    $nomC = 'ent';
    $prenomC ='consultant';

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
    $mail->addAddress($emailC, $nomC . ' ' . $prenomC);
    $mail->Subject = 'Jeune.engagement6.4';
    $mail->Body = utf8_decode('Bonjour ' . $prenomC . ", \n\n" .

    "Nous vous invitons donc à cliquer sur le lien suivant pour accéder au site Jeunes 6.4 :\n" .
    $lien .".\n\n" .

    "Cordialement,\n" .
    "L'équipe Jeunes 6.4");



    $mail->send();
    //echo 'L\'e-mail a été envoyé avec succès';
    header('Location: ../liste_reference.php');
    

} catch (Exception $e) {
    echo 'Une erreur s\'est produite lors de l\'envoi de l\'e-mail : ' . $mail->ErrorInfo;
    }
}
?>
