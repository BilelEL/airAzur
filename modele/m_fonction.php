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
                "nom"=>$ligne->nom,
                "prenom"=>$ligne->prenom,
                "adresse"=>$ligne->adresse,
                "mail"=>$ligne->mail,
                "nombreVoyageur"=>$ligne->nombreVoyageur,
                "numero"=>$ligne->numero,
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


    function reserverVol() {
        // récup numéro vol
        $numero = $_REQUEST["numero"];
        return $numero;
    }

    function creerReservation(){
        require dirname(__FILE__). "/connect.php";
        // ouverture du fichier en écriture (mode w)

        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $adresse=$_POST['adresse'];
        $mail=$_POST['mail'];
        $nombreVoyageur=$_POST['nombreVoyageur'];
        $numero=$_POST['numero'];

        $requete="insert into reservation values('$nom','$prenom','$adresse','$mail','$nombreVoyageur','$numero')"; 
          $bdd= connect();
        $i=0;
        try 
        {   
            $sql = $bdd->prepare($requete);
            $sql->execute();
        }

        catch(PDOException $e)
        {
            echo "Erreur dans la requ�te" . $e->getMessage();
        }
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

        $nbVoyageur = $_REQUEST["nombreVoyageur"];
        $reservation["nombreVoyageur"] =  $nombreVoyageur;
        
    }

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
    
    function supprimerReservation() {
        require dirname(__FILE__). "/connect.php";
        // ouverture du fichier en écriture (mode w)

        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $adresse=$_POST['adresse'];
        $mail=$_POST['mail'];
        $nombreVoyageur=$_POST['nombreVoyageur'];
        $numero=$_POST['numero'];

        $requete="delete from reservation where 'nom'='$nom' "; 
          $bdd= connect();
        $i=0;
        try 
        {   
            $sql = $bdd->prepare($requete);
            $sql->execute();
        }

        catch(PDOException $e)
        {
            echo "Erreur dans la requ�te" . $e->getMessage();
        }
    }
    
?>
<?php
    function creerPdfReservation($reservation){
        //permet d'inclure la bibli fpdf
        require('fpdf/fpdf.php');
        //instancie un objet de type FPDF qui permet de créer le PDF
        $pdf=new FPDF();
        //ajoute une page
        $pdf->AddPage();
        //définit la police courante
        $pdf->SetFont('Arial','',16);
        //affiche un image
        $pdf->Image('../images/avion1.jpg',10,10, 64, 48);
        //affiche du texte
        $pdf->Cell(40,110,'Reservation: ');
        $pdf->Ln(5);
        $pdf->Cell(40,115,'Client: '.$reservation['nom']. " ".$reservation['prenom']);
        $pdf->Ln(5);
        $pdf->Cell(40,120,'Numero de vol: '.$reservation['numero']);
        $pdf->Ln(5); 
        $pdf->Cell(40,125,'Nombre de personne: '.$reservation['nbVoyageur']);
        //Enfin, le document est termnié et envoyé au navigateur grâce à Output()
        $pdf->Output();
    }
?>
    


