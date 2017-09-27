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
                    <th>numero de vol</th>
                    <th>pdf</th>
                </tr>
                
<?php
foreach ($lesReservations as $reservation){
    $nom=$reservation['nom'];
    $prenom=$reservation['prenom'];
    $numVol=$reservation['nbVoyageur'];
?>
              
                <tr>
                    <td><?php echo $nom ?></td>
                    <td><?php echo $prenom ?></td>
                    <td><?php echo $numVols ?></td>
                    <td><?php echo $nbVoyageur ?></td>
                    
                </tr>
<?php

}
?>
            </table>


