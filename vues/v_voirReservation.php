
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
                    <th>nombre de place</th>
                    <th>pdf</th>
                </tr>
                
<?php
foreach ($lesReservations as $reservation){
    
    $nom=$reservation['nom'];
    $prenom=$reservation['prenom'];
    $numero=$reservation['numero'];
    $nbVoyageur=$reservation['nbVoyageur'];
?>
              
                <tr>
                    <td><?php echo $nom ?></td>
                    <td><?php echo $prenom ?></td>
                    <td><?php echo $numero ?></td>
                    <td><?php echo $nbVoyageur ?></td>
                    
                </tr>
<?php

}
?>
            </table>


