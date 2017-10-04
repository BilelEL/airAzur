<html>
    <head>
        <meta charset="ISO-8859-1">
        <title></title>
    </head>
    <body>
        <div id="contenu"> 
    
            <?php
            
            /* 
             * To change this license header, choose License Headers in Project Properties.
             * To change this template file, choose Tools | Templates
             * and open the template in the editor.
             */

            foreach ($lesVols as $unVol)
            {
                $numero=$unVol['numero'];
                $numAeroportDepart=$unVol['aeDep'];
                $numAeroportArrivee=$unVol['aeArr'];
                $dateDepart=$unVol['dateDepart'];
                $dateArrivee=$unVol['dateArrivee'];
                $prix=$unVol['prix'];
                //$place=$unVol['place'];


            echo""
            . "<table>"
                  ."<fieldset>  "   
                    . "<tr>"
                         . "<td>$numero</td>"
                    ."</tr>"
                    ."<tr>"
                         ."<td>$numAeroportDepart</td>"
                         ."<td>$dateDepart</td>"
                    ."</tr>"
                    ."<tr>"
                         ."<td>$numAeroportArrivee</td>"
                         ."<td>$dateArrivee</td>"
                    ."</tr>"
                    ."<tr>"     
                         ."<td>$prix</td>"
                         ."<td><a href=index.php?action=reserver&numero=".$numero."> Reserver </a></td>"
                    ."</tr>"
                    ."</br>"
                   ."</fieldset>"; 
                 "</table>";

            }
            ?>
        </div>
    </body>
</html>
        