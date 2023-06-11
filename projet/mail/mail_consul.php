<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


////Traitement des références cochées

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $referencesSelectionnees = $_POST["reference"];
        
        // Mettre à jour le fichier JSON avec les références modifiées
        $jsonString = file_get_contents('../utilisateurs.json');
        $data = json_decode($jsonString, true);
        
        // Parcourir les utilisateurs et mettre à jour les références
        foreach ($data["jeune"] as &$jeune) {
            if ($jeune['id'] == $id) {
                foreach ($jeune["references"] as &$reference) {
                    // Vérifier si l'email de la référence correspond à l'email de la référence sélectionnée
                    if (in_array($reference["email_ref"], $referencesSelectionnees)) {
                        $reference["cochee"] = true; // Marquer la référence comme sélectionnée
                    } else {
                        $reference["cochee"] = false; // Marquer la référence comme non sélectionnée
                    }
                }
            }
        }
        
        // Enregistrer les modifications dans le fichier JSON
        $updatedJsonString = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE );
        file_put_contents('../utilisateurs.json', $updatedJsonString);
        

}


// Création d'une nouvelle instance de PHPMailer
$mail = new PHPMailer(true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $emailC = $_POST['emailC'] ?? '';
    $id = $_POST['id'] ?? '';

    $emailC_encoded = urlencode($emailC);
    $id_encoded = urlencode($id);
    $lien = "http://localhost:8080/Consultant/consultant.php?emailC=$emailC_encoded&id=$id_encoded";
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
    header('Location: /Jeune/liste_reference.php');
    

} catch (Exception $e) {
    echo 'Une erreur s\'est produite lors de l\'envoi de l\'e-mail : ' . $mail->ErrorInfo;
    }
}
?>
