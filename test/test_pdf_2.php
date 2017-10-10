<?php
//permet d'inclure la bibli fpdf
require('../fpdf/fpdf.php');
//instancie un objet de type FPDF qui permet de créer le PDF
$pdf=new FPDFF();
//ajoute une page
$pdf->AddPage();
//définit la police courante
$pdf->SetFont('Arial','B',16);
//affiche du texte
$pdf->Cell(40,10,'Voici un Pdf !');
//affiche un image
$pdf->Image('../images/avion1.jpg',10,10, 64, 48);
$pdf->Cell(40,10,'Voici votre reservation !');
//Enfin, le document est termnié et envoyé au navigateur grâce à Output()
$pdf->Output();
?>