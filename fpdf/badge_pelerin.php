<?php
require ('../public/database/bd.php');

//verifier si le id existe
if (isset($_GET['ids'])){
    # code...
    $ids = $_GET['ids'];
    //selectionner tous les informations du pelerin pour realiser le badge
    $reqpel = $db->prepare("SELECT * FROM tshajj_pelerin WHERE id_pel = ? ");
    $reqpel->execute(array($ids));
    $pelerin = $reqpel->fetch();

    //echo json_encode($pelerin);

    
require('fpdf.php');

  
class PDF extends FPDF {
    // En-tête
    function Header() {
        //Logo
        $this->SetFont('Arial', '', 10);
        $this->SetXY(0, 0);
        $this->SetDrawColor(24, 126, 58);
        $this->SetFillColor(24, 126, 58);
        $this->SetTextColor(255, 255, 255);
        $this->Image('image/logo.jpg', 20, 5, 50, 8);
        $this->Cell(100, 5, '', 0, 0, 'C', 1);
        
    }
    /*
      function Header() {
        //Logo
        
        $this->Image('image/logo.jpg', 20, 5, 50, 8);
        $this->SetFont('Arial','B',6);
        $this->SetXY(0,11.5);
        $this->SetTextColor(0,72,138);
        
    }
     */
    // Pied de page
    function Footer() {
        //Logo
        $this->SetFont('Arial', '', 7);
        $this->SetXY(0, 60);
        $this->SetDrawColor(24, 126, 58);
        $this->SetFillColor(24, 126, 58);
        $this->SetTextColor(255, 255, 255);
        $this->Cell(100, 5, '@TasnimVoyage', 0, 0, 'C', 1);
    }
 
    function ConstPDF($nom, $prenom, $ville, $contact,$date_naissance,$qrcode,$grp_sangin,$photo) {
        $this->Image($photo);
        $this->SetXY(30,13);
        $this->SetFont('Times', 'B', 14);
        $this->Image("image/".$qrcode."", 5, 20, 20, 20);
        $this->SetXY(30,22);
        $this->SetFont('Times', 'B', 14);
        $this->SetTextColor(9, 14, 11);
        $this->Cell(60, 5,'Nom:    '. $nom);
        $this->SetXY(30,29);
        $this->Cell(60, 5, 'Prenom:  '.$prenom);
        $this->SetXY(30,36);
        $this->Cell(60, 5, 'Contact: '.$contact);
        $this->SetXY(30,44);
        $this->Cell(60, 5, 'Domicile: '.$ville);
        $this->SetXY(30,53);
        $this->Cell(60, 5, 'Groupe sanguin: '.$grp_sangin);
         //$this->Cell(65, 20, '', 0, 0, 'C', 0, $this->Image('images/aiesec_logo.png', 65, 20));
    }
}
   
// Creation du PDF
$dimensions = array(100, 100);
$pdf=new PDF('P', 'mm', $dimensions); // on instancie un nouveau PDF
$pdf->posXlocale = 0;
$pdf->posYlocale = 0;
$pdf->setMargins(0, 0, 0);
$pdf->AddPage(); // on y ajoute une première page

$pdf->SetFont('Arial','',14); // Type de police
$pdf->SetAutoPageBreak(false,0); // Creation d'une nouvelle page auto à false
$photo="../photoPelerin/".$pelerin['photo_pel'];
$qrcode=$pelerin['identifiant'];
$nom = $pelerin['nom_pel'];
$prenom= $pelerin['prenom_pel'];
$ville = $pelerin['ville_pel'];
$date_naissance=$pelerin['dat_nais_pel'];
$contact = $pelerin['cont_pel'];
$grp_sangin = $pelerin['gp_sang_pel'];
     
// Appel a la fonction ConstPDF
$pdf->ConstPDF($nom, $prenom,  $ville,$contact,$date_naissance,$qrcode,$grp_sangin,$photo);
 
// Sortie du FPDF
$pdf->Output();
$pdf->Close();

}else{
    header('location:home.php');
}


   