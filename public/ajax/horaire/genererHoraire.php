<?php
include('utilGenererHoraire.php');

//Liste des disponibilités qui reste à combler
$listUtilhoraire = lstUtilHoraire();

//Liste des ressources qui reste à combler
$listRessource = lstRessource();

//Liste des demi-heure qui comporte un ratio en dessous de 1
$listRatioErreur = array();


genererRatio();

//var_dump($listRessource);

lstRatioErreur();
function genererRatio() {
	global $RatioDemiHrs, $listUtilhoraire, $listRessource ;
	
	if(!isset($RatioDemiHrs)) {
		$RatioDemiHrs = arrayRatioSemaine();
	}
		ajoutDispo($listUtilhoraire );
		divisionParRessource($listRessource);
		var_dump(trouverRatioPlusPetit());
	
	
}

function TrouverEmploye(){ 
global $RatioDemiHrs;

return $RatioDemiHrs[trouverRatioPlusPetit()[3]][trouverRatioPlusPetit()[0]][trouverRatioPlusPetit()[1]];
//return trouverRatioPlusPetit();

}


?>