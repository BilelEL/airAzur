<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

foreach ($lesVols as $unVol)
{
    $numVol=$unVol['numVol'];
    $numAeroportDepart=$unVol['numAeroportDepart'];
    $numAeroportArrivee=$unVol['numAeroportArrivee'];
    $dateDepart=$unVol['dateDepart'];
    $dateArrivee=$unVol['dateArrivee'];
    $prix=$unVol['prix'];
    $place=$unVol['place'];


echo""
. "<table>"
        . "<tr>"
             . "<td>$numVol</td>"
             ."<td>$numAeroportDepart</td>"
             ."<td>$numAeroportArrivee</td>"
             ."<td>$dateDepart</td>"
             ."<td>$dateArrivee</td>"
             ."<td>$prix</td>"
             ."<td>$place</td>"
        ."</tr>"
."</table>";

}

echo"bonjour"
?>
        