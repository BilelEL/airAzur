
<html>
    <head>
        <meta charset="ISO-8859-1">
        <title></title>
    </head>
    <body>
        <div id="contenu"> 
            <table>
                <tr>
                    <th>nom</th>
                    <th>prenom</th>
                    <th>adresse</th>
                    <th>mail</th>
                    <th>nombre de place</th>
                    <th>numero du vol</th>
                    <th>pdf</th>
                </tr>
                
<?php
foreach ($lesReservations as $reservation){
    
    $nom=$reservation['nom'];
    $prenom=$reservation['prenom'];
    $adresse=$reservation['adresse'];
    $mail=$reservation['mail'];
    $nombreVoyageur=$reservation['nombreVoyageur'];
    $numero=$reservation['numero'];
    
?>
              
                <tr>
                    <td><?php echo $nom ?></td>
                    <td><?php echo $prenom ?></td>
                    <td><?php echo $adresse ?></td>
                    <td><?php echo $mail ?></td>
                    <td><?php echo $nombreVoyageur ?></td>
                    <td><?php echo $numero ?></td>
                    
                    <td></td>
                </tr>
<?php

}
?>
            </table>


