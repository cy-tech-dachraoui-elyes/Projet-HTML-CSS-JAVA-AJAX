<?php
require('FPDF/fpdf.php');

class PDF_Document extends FPDF {
    function __construct() {
        parent::__construct('P', 'mm', 'A4', true, 'ISO-8859-1'); // Utilisez ISO-8859-1 au lieu de utf-8
    }

    function Header() {
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(0, 10, utf8_decode('Expérience'), 0, 1, 'C'); // Titre "Expérience" centré
        $this->Ln(10); // Espacement après le titre
    }
    
    function Footer() {
        // Votre code pour personnaliser le pied de page du PDF
    }
    
    function Content($reference) {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, utf8_decode('Référent: ' . $reference['nom_ref'] . ' ' . $reference['prenom_ref']), 0, 1); // Affiche le nom et prénom du référent
        
        $this->SetFillColor(245, 245, 245); // Couleur de fond blanche pour le fieldset
        $this->SetDrawColor(34, 139, 34); // Couleur de bordure rouge pour le fieldset
        $this->Rect(10, $this->GetY(), 190, 40, 'DF'); // Dessine le fieldset
        
        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 10, utf8_decode('Engagement: ' . $reference['engagement']), 0, 1);
        $this->Cell(0, 10, utf8_decode('Milieu: ' . $reference['milieu']), 0, 1);
        $this->Cell(0, 10, utf8_decode('Durée: ' . $reference['duree']), 0, 1);
        
        $this->SetFont('Arial', '', 10);
        $qualites = implode(', ', $reference['qualites']);
        $this->MultiCell(0, 10, utf8_decode('Qualités: ' . $qualites), 0, 'L');
        
        $this->Ln(10); // Espacement après chaque fieldset
    }
}

function getReferences() {
    $users = json_decode(file_get_contents("../utilisateurs.json"), true);
    session_start();

    if(isset($_SESSION['user'])){
        foreach($users['jeune'] as $user){
            if($user['id'] === $_SESSION['user']){
                return $user['references'];
            }
        }
    } else {
        header("Location: ../connexion.php");
        exit;
    }
}

$pdf = new PDF_Document();
$pdf->AddPage(); // Ajoutez une nouvelle page

$references = getReferences(); // Récupérez les références

foreach($references as $reference) {
    $pdf->Content($reference); // Ajoutez le contenu au PDF pour chaque référence
}

$pdf->Output('F', '../livret_experience.pdf'); // Enregistrez le PDF sur le serveur
