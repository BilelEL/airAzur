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
 $requete= "select numVols, A1.nomAeroport as aeDep, A2.nomAeroport as aeArr, dateDepart, dateArrivee, prix from vol 
JOIN aeroport as A1 on vol.numAeroportDepart=A1.id
JOIN aeroport as A2 on vol.numAeroportArrivee=A2.id";
// Remplissage du tableau $unVol

$bdd= connect();
                $i=0;
                try 
                {	
                    $sql = $bdd->prepare($requete);
                    $sql->execute();
                    
                    while($ligne=$sql->fetch(PDO::FETCH_OBJ))
                    { 
                        
                        $unVol[$i]= ["numVols"=>$ligne->numVols,
                            "aeDep"=>$ligne->aeDep,
                            "dateDepart"=>$ligne->dateDepart,
                            "aeArr"=>$ligne->aeArr,
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

function getReservation(){
    
             $reservations = array();

              // Appel au fichier permettant la connection � la BD
             require dirname(__FILE__)."/connect.php";
             // Selection de la base de donn�es et requete SQL
                $requete="select * from reservation ";
            // Remplissage d'un tableau correspondant � chaque reservation
                $bdd= connect();
                $i=0;
                try 
                {	
                    $sql = $bdd->prepare($requete);
                    $sql->execute();
                    
                    while($ligne=$sql->fetch(PDO::FETCH_OBJ))
                    { 
                        
                        $uneResa[$i]= [
                            "nom"=>$ligne->nomClient,
                            "prenom"=>$ligne->prenomClient,
                            "numVols"=>$ligne->numVol,
                            "place"=>$ligne->place
                        ];
                        $i++;
                    } 
                    
                }
                catch(PDOException $e)
                {
                    echo "Erreur dans la requ�te" . $e->getMessage();
                }

             // Remplissage du tableau multi-dimensionnel $vols avec chacun des vols

                for($r=0;$r<$i;$r++){
                    array_push($reservations,$uneResa[$r]);
                }

            // Retourner le tableau

            return $reservations;
            
}

?>

