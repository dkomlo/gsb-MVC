<?php
include("vues/v_sommaire.php");
$action = $_REQUEST['action'];
$idVisiteur = $_SESSION['idVisiteur'];
switch($action){
	case 'selectionnerMois':{
		$lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
		// Afin de sélectionner par défaut le dernier mois dans la zone de liste
		// on demande toutes les clés, et on prend la première,
		// les mois étant triés décroissants
		$lesCles = array_keys( $lesMois );
		$moisASelectionner = $lesCles[0];
		include("vues/v_listeMois.php");
		break;
	}
	case 'voirEtatFrais':{
		$leMois = $_REQUEST['lstMois']; 
		$lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
		$moisASelectionner = $leMois;
		include("vues/v_listeMois.php");
		$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$leMois);
		$lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur,$leMois);
		$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur,$leMois);
		$numAnnee =substr( $leMois,0,4);
		$numMois =substr( $leMois,4,2);
		$libEtat = $lesInfosFicheFrais['libEtat'];
		$montantValide = $lesInfosFicheFrais['montantValide'];
		$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
		$dateModif =  $lesInfosFicheFrais['dateModif'];
		$dateModif =  dateAnglaisVersFrancais($dateModif);
		include("vues/v_etatFrais.php");
                                    break;
	}
                  case 'validerFicheFrais':{
                                    include('vues/v_validFrais.php');
                                    break;
                  }
                  case 'obtenirFicheFrais':{
                                    $id=$_POST['lstVis'];
                                    $mois=$_POST['lstMois'];
                                    $infosFrais=$pdo->getLesInfosFicheFrais($id,$mois);
                                    $infosForfait=$pdo->getLesFraisForfait($id,$mois);
                                    $infosHorsForfait=$pdo->getLesFraisHorsForfait($id,$mois);
                                    include('vues/v_validFrais.php');
                                    include('vues/v_ficheFrais.php');
                                    break;
                  }
        case 'updateligne':{

                $infosForfait=$pdo->getLesFraisForfait($_POST["id"],$_POST["mois"]);
                $tab=array($_POST[0],$_POST[1],$_POST[2],$_POST[3],$_POST["id"],$_POST["mois"]);
                $pdo->UpdateLigneFraisForfait($tab,$infosForfait);//utiliser majFraisForfait
                            	include('vues/v_validFrais.php');
		break;
        }
}
?>