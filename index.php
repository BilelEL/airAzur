
<?php
if(!isset($_REQUEST['action']))
    $action = 'accueil';
else
    $action = $_REQUEST['action'];

// vue qui crée l’en-tête de la page
include("vues/v_entete.php") ;

switch($action)
{
    case 'accueil':
	  // vue qui crée le contenu de la page d’accueil
        include("vues/v_accueil.php");
        break;
    case 'catalogue':
        include("modele/m_fonction.php");
        $lesVols = getLesVols();
        
        include("vues/v_catalogue.php");
        break;
    case 'reserver':
        include("modele/m_fonction.php");
        $numero=reserverVol();
        include("vues/v_formulaireReserv.php");
    break;
    case 'validerReservation':
        include("modele/m_fonction.php");
        $reservation=validerReservation();
        include("vues/v_confirmeReservation.php");
    break;
    case 'voirReservation':
        include ("modele/m_fonction.php");
        $lesReservations=getReservation();
        include("vues/v_voirReservation.php");
    break;
}

// vue qui crée le pied de page
include("vues/v_pied.php") ;
?>