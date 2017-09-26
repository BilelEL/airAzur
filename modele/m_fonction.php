<!DOCTYPE html>

<html>
    <head>
        <meta charset="ISO-8859-1">
        <title></title>
    </head>
<?php

function getLesVols()
{
    
// Déclaration d’un tableau

$vols = array();

  // Appel au fichier permettant la connection à la BD
 require dirname(__FILE__). "/connect.php";

 
// Requete bdd
 $requete= "select numVol,id as 'a1',dateDepart,nomAeroportDepart as 'a2' ,dateArrivee,prix from aeroport  join vol join aeroport on id=nomAeroportArrivee and id=nomAeroportDepart where nomAeroport=(select nomAeroport from aeroport where id=nomAeroportDepart) and nomAeroport=(select nomAeroport from aeroport where id=nomAeroportArrivee)";

// Remplissage du tableau $unVol

$bdd= connect();
                $i=0;
                try 
                {	
                    $sql = $bdd->prepare($requete);
                    $sql->execute();
                    
                    while($ligne=$sql->fetch(PDO::FETCH_OBJ))
                    { 
                        
                        $unVol[$i]= ["numVol"=>$ligne->numero,
                            "nomAeroportDepart"=>$ligne->a1,
                            "dateDepart"=>$ligne->dateDepart,
                            "nomAeroportArrivee"=>$ligne->a2,
                            "dateArrivee"=>$ligne->dateArrivee,
                            "prix"=>$ligne->prix];
                        $i++;
                    } 
                    
                }
                catch(PDOException $e)
                {
                    echo "Erreur dans la requ�te" . $e->getMessage();
                }

 // Remplissage du tableau multi-dimensionnel $vols
   
for($r=0;$r<$i;$r++){
                    array_push($vols,$unVol[$r]);
                }



return $vols;

}

?>

