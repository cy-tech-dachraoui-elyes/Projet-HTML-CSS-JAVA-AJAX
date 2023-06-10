<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Création d'une nouvelle instance de PHPMailer
$mail = new PHPMailer(true);

$emailR = $_POST['email'];
$id = $_POST['id'];
$nomR = $_POST['nom'];
$prenomR = $_POST['prenom'];
$engagement = $_POST['engagement'];
$duree = $_POST['duree'];
$milieu = $_POST['milieu'];
$qualites = $_POST['qualites'];
$commentaire = $_POST['commentaire'];

// Charger le contenu du fichier utilisateurs.json dans une variable
$json = file_get_contents('../utilisateurs.json');

// Convertir le contenu JSON en tableau associatif PHP
$utilisateurs = json_decode($json, true);

foreach ($utilisateurs['jeune'] as &$utilisateur) {
    if ($utilisateur['id'] == $id) {
        $email =$utilisateur['email'];
        $nom =$utilisateur['nom'];
        $prenom =$utilisateur['prenom'];
        foreach ($utilisateur['references'] as &$referent) {
            if ($referent['email_ref'] == $emailR ) {
                $referent['valide'] = true;
                $referent['Commentaire'] = $commentaire;
                $referent['qualites_ref'] = $qualites;
                $referent['nom_ref'] = $nomR;
                $referent['prenom_ref'] = $prenomR;
                $referent['engagement'] = $engagement;
                $referent['duree'] = $duree;
                $referent['milieu'] = $milieu;
                
            }
        }
    }
}

// Convertir le tableau associatif PHP en JSON
$json_updated = json_encode($utilisateurs,JSON_UNESCAPED_UNICODE| JSON_PRETTY_PRINT);

// Écrire le JSON mis à jour dans le fichier utilisateurs.json
file_put_contents('../utilisateurs.json', $json_updated);


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

    "Nous sommes ravis de vous informer que votre demande à été validé par le référent.\n\n" .
    "Si vous avez des questions ou souhaitez obtenir de plus amples informations, n'hésitez pas à nous contacter.\n\n".
    "Cordialement,\n" .
    "L'équipe Jeunes 6.4");



    $mail->send();
    //echo 'L\'e-mail a été envoyé avec succès';
    header('Location: /referent/remerciement.php');

} catch (Exception $e) {
    echo 'Une erreur s\'est produite lors de l\'envoi de l\'e-mail : ' . $mail->ErrorInfo;
    }
//}
?>
