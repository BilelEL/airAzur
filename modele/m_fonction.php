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
 $requete= "select numero, A1.nomAeroport as aeDep, A2.nomAeroport as aeArr, dateDepart, dateArrivee, prix from vol 
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
                        
                        $unVol[$i]= ["numero"=>$ligne->numero,
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

function reserverVol() {
    // récup numéro vol
    $numero = $_REQUEST["numero"];
    return $numero;
}

function validerReservation(){
    $reservation = array();
	// récupération du numéro
$numero = $_REQUEST["numero"];
$reservation["numero"] =  $numero;
// faire de même les autres paramètres…
$nom = $_REQUEST["nom"];
$reservation["nom"] =  $nom;

$prenom = $_REQUEST["prenom"];
$reservation["prenom"] =  $prenom;

$adresse = $_REQUEST["adresse"];
$reservation["adresse"] =  $adresse;

$mail = $_REQUEST["mail"];
$reservation["mail"] =  $mail;

$nbVoyageur = $_REQUEST["nbVoyageur"];
$reservation["nbVoyageur"] =  $nbVoyageur;

// fonction qui initialise le panier
// le panier est un tableau indexé mis en session avec la clé "reservations"
function initPanier() {
    if(!isset($_SESSION['reservations']))
	$_SESSION['reservations']= array();
}

// fonction qui ajoute une réservation au panier
function ajouterAuPanier($reservation) {    
    $_SESSION['reservations'][]= $reservation;
}

function creerReservation(){
    require dirname(__FILE__). "/connect.php";
    // ouverture du fichier en écriture (mode w)

   if ($connexion)
{
  // connexion réussie
  mysql_select_db("gestion de vols",$connexion);
             
      $requete="insert into reservation values('','$reservation[numero]','".htmlspecialchars($reservation['nom'])."','".htmlspecialchars($reservation['prenom'])."','".htmlspecialchars($reservation['adresse'])."','".htmlspecialchars($reservation['mail'])."',$reservation[nbVoyageurs])";  
}
}

return $reservation;

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

