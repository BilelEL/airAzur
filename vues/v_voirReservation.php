
<html>
    <head>
        <meta charset="ISO-8859-1">
        <title></title>
    </head>
    <body>
        <div id="bandeau">
            <h1></h1>
            <div id="conteneur">
                <table id="reservations">
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Adresse</th>
                    <th>Mail</th>
                    <th>Nombre de place</th>
                    <th>Numero de vol</th>
                    <th>Supprimer</th>
                    <th>Pdf</th>
                </tr>
                
<?php
foreach ($lesReservations as $reservation){
    
    $nom=$reservation['nom'];
    $prenom=$reservation['prenom'];
    $adresse=$reservation['adresse'];
    $mail=$reservation['mail'];
    $nombreVoyageur=$reservation['nombreVoyageur'];
    $numero=$reservation['numero'];
   // $indice=$reservation['No'];
    
?>
              
                <tr>
                    <td><?php echo $nom ?></td>
                    <td><?php echo $prenom ?></td>
                    <td><?php echo $adresse ?></td>
                    <td><?php echo $mail ?></td>
                    <td><?php echo $nombreVoyageur ?></td>
                    <td><?php echo $numero ?></td>
                    <td><a href=index.php?action=supprimerReservation&numReservation=".$numero."><img src='images/suprimer.jpg'></a></td>
                    <td><a href=index.php?action=pdfReservation&numReservation=".$numero."><img src='images/PDF_icon.jpg'></a></td>
                </tr>
<?php

}
?>
            </table>


