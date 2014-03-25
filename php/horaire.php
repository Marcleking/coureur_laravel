<?php


$arrayRessource = genererArrayHoraire('ressource');
$arrayDisponibilite = genererArrayHoraire('disponibilite');
$arrayRatio = genererArrayHoraire('ratio');
$arrayHoraire = genererArrayHoraire('horaire');

$listEmployeDisponibilite = lstEmployeHoraire();
$listRessource = lstRessource();


ajouterRessourceArray();
ajouterDisponibiliteArray();


 
while(verifierSiDispo() === false || verifierSiRessource()  === false){

//for($i =0; $i < 40; $i++) {
    echo '-------------------';
	genererRatio();
	$laPlageHoraire = trouverPlagePlusGrande(trouverEmployePlusImportant(trouverRatioPlusPetit()));
	$hrs = ajouterPlageHoraire($laPlageHoraire);

	if($hrs != null) {
	retirerRessource($laPlageHoraire, $hrs);
	retirerDisponibilite($laPlageHoraire, $hrs);
	ajouterHoraire($laPlageHoraire, $hrs);
	}
}


////////////////////////////////////////////////////////////////

function verifierSiDispo() {
	global $arrayDisponibilite;
	//var_dump($arrayDisponibilite[0]);
	$plusTroisJour = false;
	
	foreach($arrayDisponibilite as &$unJour) {
		$i = 0;
		$j = 0;
		$k = 0;
		
		foreach($unJour as &$uneDemiHrs) {
			if($uneDemiHrs['Vetement']['nbDisponibilite'] > 0) {
			 $i++;
			}
			if($uneDemiHrs['Chaussure']['nbDisponibilite'] > 0) {
			 $j++;
			}
			if($uneDemiHrs['Caissier']['nbDisponibilite'] > 0) {
			 $k++;
			}
			
			if($k == 6 || $j == 6 || $i == 6) {
				$plusTroisJour = true;
			}
		}
	}
	return $plusTroisJour;
}

function verifierSiRessource() {
	global $arrayRessource;
	//var_dump($arrayRessource[0]);
	$plusTroisJour = false;
	
	foreach($arrayRessource as &$unJour) {
		$i = 0;
		$j = 0;
		$k = 0;
		
		foreach($unJour as &$uneDemiHrs) {
			if($uneDemiHrs['Vetement'] > 0) {
			 $i++;
			}
			if($uneDemiHrs['Chaussure'] > 0) {
			 $j++;
			}
			if($uneDemiHrs['Caissier'] > 0) {
			 $k++;
			}
			
			if($k == 6 || $j == 6 || $i == 6) {
				$plusTroisJour = true;
			}
		}
	}
	return $plusTroisJour;
}

////////////////////////////////////////////////////////////////
function ajouterHoraire($plage, $hrs) {
	global $arrayHoraire;
	for($i = (($hrs['hrsDebut']-9)*2); $i < (($hrs['hrsFin']-9)*2); $i++){
		array_push($arrayHoraire[$plage['jour']][$i][$plage['type']],$plage['courriel']);
	}
}

function retirerRessource($plage, $hrs) {
	global $arrayRessource;
	for($i = (($hrs['hrsDebut']-9)*2); $i < (($hrs['hrsFin']-9)*2); $i++){
		$arrayRessource[$plage['jour']][$i][$plage['type']] -= 1;
	}
}

function retirerDisponibilite($plage, $hrs) {
	global $arrayDisponibilite;
	for($i = (($hrs['hrsDebut']-9)*2); $i < (($hrs['hrsFin']-9)*2); $i++){
		$j =0;
		$index = 0;
		
		$arrayDisponibilite[$plage['jour']][$i]["Chaussure"]['nbDisponibilite'] -= 1;
		$arrayDisponibilite[$plage['jour']][$i]["Vetement"]['nbDisponibilite'] -= 1;
		$arrayDisponibilite[$plage['jour']][$i]["Caissier"]['nbDisponibilite'] -= 1;
		foreach($arrayDisponibilite[$plage['jour']][$i][$plage['type']]['listeEmployeDisponible'] as &$employe) {
			if($employe['courriel'] == $plage['courriel']) {
				$index = $j;
				
			}
			$j++;
		}
		
		unset($arrayDisponibilite[$plage['jour']][$i]["Chaussure"]['listeEmployeDisponible'][$index]);
		unset($arrayDisponibilite[$plage['jour']][$i]["Vetement"]['listeEmployeDisponible'][$index]);
		unset($arrayDisponibilite[$plage['jour']][$i]["Caissier"]['listeEmployeDisponible'][$index]);
		$arrayDisponibilite[$plage['jour']][$i]["Chaussure"]['listeEmployeDisponible'] = array_values($arrayDisponibilite[$plage['jour']][$i]["Chaussure"]['listeEmployeDisponible']);
		$arrayDisponibilite[$plage['jour']][$i]["Vetement"]['listeEmployeDisponible'] = array_values($arrayDisponibilite[$plage['jour']][$i]["Vetement"]['listeEmployeDisponible']);
		$arrayDisponibilite[$plage['jour']][$i]["Caissier"]['listeEmployeDisponible'] = array_values($arrayDisponibilite[$plage['jour']][$i]["Caissier"]['listeEmployeDisponible']);
	}
}
////////////////////////////////////////////////////////////////
function ajouterPlageHoraire($plage) {


	if($plage != null) {
		$hrsDebut = ($plage['horaire'][0]/2 + 9);
		$hrsFin = ((($plage['horaire'][count($plage['horaire']) - 1] + 1)/2) + 9);
		if(($hrsDebut - (int)$hrsDebut) == 0.5) {
			$hrsDebutTime = (int)$hrsDebut . ":30:00";
		} else {
			$hrsDebutTime = (int)$hrsDebut . ":00:00";
		}
		
		if(($hrsFin - (int)$hrsFin) == 0.5) {
			$hrsFinTime = (int)$hrsFin . ":30:00";
		} else {
			$hrsFinTime = (int)$hrsFin . ":00:00";
		}
		
		
		
		//Connexion a la BD(à changer de place)
		$connBD = new PDO('mysql:host=localhost;dbname=coureur_nordique', 'user_coureur', 'qweqwe');
		$sql = 'Call ajouterPlageHoraire(:jour, :typeTravail, :hrsDebut, :hrsDeFin, :courriel)';
		$prep = $connBD->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$prep->execute(array(':jour' =>  $plage['jour'], ':typeTravail' =>   $plage['type'], 'hrsDebut' =>  $hrsDebutTime , 'hrsDeFin' => $hrsFinTime, 'courriel'=>$plage['courriel']));
	return array('hrsDebut'=>$hrsDebut, 'hrsFin' => $hrsFin);
	}
}

////////////////////////////////////////////////////////////////
function trouverPlagePlusGrande($lEmploye) {

	//si on a pas d'employé
	if($lEmploye["courriel"] != '') {
	
		global $arrayDisponibilite, $arrayRessource;
		$demiHrsDeEmploye = array();
		$demiHrsDeRessource = array();
		$i = 0;
		
		//pour chaque demihrs d'une journée
		foreach($arrayDisponibilite[$lEmploye['jour']] as &$uneDemiHrs) {
			
			//pour chaque employe d'une demiHrs
			foreach($uneDemiHrs[$lEmploye["type"]]['listeEmployeDisponible'] as &$unEmploye) {
				//si l'employe est disponible pour cette demihrs
				if($unEmploye['courriel'] == $lEmploye['courriel']) {
					//On ajoute la demiHrs au array des dispos de lemploye
					array_push($demiHrsDeEmploye, $i);
				}
			}
			$i++;
		}
		$i = 0;
		
		//pour chaque demiHrs des ressources d'une journée
		foreach($arrayRessource[$lEmploye['jour']] as &$uneDemiHrsRes) {
			
			//si il y a plus que 0 ressource dispo pour ce type
			if($uneDemiHrsRes[$lEmploye["type"]] > 0) {
				array_push($demiHrsDeRessource, $i);
			}
			
			$i++;
		}

		$arrayLesDispos = array();
		$arraylaDispo = array();
		$noDispo= 999999;
		
		//Pour chaque demiHrs selectionner 
		for($i = 0; $i < count($demiHrsDeEmploye); $i++) {
			
			//si nous sommes au premier passage
			if($i == 0) {
				$dernierChiffre = $demiHrsDeEmploye[$i];
				array_push($arraylaDispo, $demiHrsDeEmploye[$i]);
				
			//si on est au dernier passage
			} else if ($i == count($demiHrsDeEmploye)-1){
				array_push($arraylaDispo, $demiHrsDeEmploye[$i]);
				array_push($arrayLesDispos,$arraylaDispo);
			//si le chiffre est un nombre suivant de celui avant
			}else if(($dernierChiffre + 1) == $demiHrsDeEmploye[$i]) {
				$dernierChiffre = $demiHrsDeEmploye[$i];
				array_push($arraylaDispo, $demiHrsDeEmploye[$i]);
			//aussi non on ajoute la plage de dispo (avec les dispos qui sont une après l'autre)
			}else{
				array_push($arrayLesDispos,$arraylaDispo);
				$arraylaDispo = array($demiHrsDeEmploye[$i]);
				$dernierChiffre = $demiHrsDeEmploye[$i];
			}
			
		}
		
		//on vérifie quel plage de dispo a a l'intérieur le ratio en problème
		for($i =0; $i < count($arrayLesDispos); $i++) {
			if(in_array($lEmploye['demiHrs'], $arrayLesDispos[$i])) {
				$noDispo = $i;
			}
		}
		
		$arrayLesRessources = array();
		$arraylaRessource = array();

		//pour tout les demihrs de la plage de dispo critique
		for($i = 0; $i < count($arrayLesDispos[$noDispo]); $i++) {
			
			//on vérifie si la ressource est diponible pour cette demiHrs
			if(array_search($arrayLesDispos[$noDispo][$i], $demiHrsDeRessource) === false && !empty($arraylaRessource)) {
				array_push($arrayLesRessources,$arraylaRessource);
				$arraylaRessource = array();
			//si on arrive a la dernière demiHrs
			} else if($i == count($arrayLesDispos[$noDispo]) - 1) {
				array_push($arraylaRessource, $demiHrsDeRessource[array_search($arrayLesDispos[$noDispo][$i], $demiHrsDeRessource)]);
				array_push($arrayLesRessources,$arraylaRessource);
			//si la ressource est dispo pour cette demiHrs donc on l'ajoute à la liste des demiHrs des ressources
			} else if(array_search($arrayLesDispos[$noDispo][$i], $demiHrsDeRessource) !==false) {
				array_push($arraylaRessource, $demiHrsDeRessource[array_search($arrayLesDispos[$noDispo][$i], $demiHrsDeRessource)]);
			}
		}
		
		//si la demiHrs critique est 0 alors on ajoute le premier chiffre car le 0 va se trouver dedans
		if($lEmploye['demiHrs'] == 0) {

			$lEmploye = $lEmploye + array( "horaire"=>  $arrayLesRessources[0]);
		
		//si la demiHrs critique est 23 on ajoure alors le dernier chiffre
		} else if($lEmploye['demiHrs'] == 23) {
			$lEmploye = $lEmploye + array( "horaire"=>  $arrayLesRessources[count($arrayLesRessources)-1]);
		
		
		//aussi non on ajoute le chiffre le plus grand
		} else {
		
			$lePlusGrand = 0;
			$important = 0;
			foreach($arrayLesRessources as &$uneRessource) {
				
				if($lePlusGrand < count($uneRessource)) {
					$important = $uneRessource;
				}
			}
			$lEmploye = $lEmploye + array( "horaire"=>  $important);
		}

		return $lEmploye;
	} else {
	
		return null;
	
	}
	
}



function trouverEmployePlusImportant($laPlageCritique) {
	global $arrayDisponibilite, $arrayHoraire;
	$lEmploye = array("courriel"=> "", "indicePriorite" => 9999, "type" => "type", "jour" => 0, "demiHrs" => 0, "ratio" => 99999, "cle" => 0);
	foreach($arrayDisponibilite[$laPlageCritique["jour"]][$laPlageCritique["demiHrs"]][$laPlageCritique["type"]]['listeEmployeDisponible'] as &$unEmploye) {
		if($laPlageCritique["ratio"] == 0.00001 && $unEmploye["possesseurCle"] == 1 && $unEmploye["indPriorite"] < $lEmploye["indicePriorite"]) {
			$lEmploye["courriel"] = $unEmploye["courriel"];
			$lEmploye["indicePriorite"] = $unEmploye["indPriorite"];
			$lEmploye["cle"] = $unEmploye["possesseurCle"];
		}
		
		
		if($unEmploye["indPriorite"] < $lEmploye["indicePriorite"] && $laPlageCritique["ratio"] != 0.00001 ) {
			$lEmploye["courriel"] = $unEmploye["courriel"];
			$lEmploye["indicePriorite"] = $unEmploye["indPriorite"];
		}
	}
	
	
	
	
	

	
			
	if($laPlageCritique["ratio"] == 0.00001 && $lEmploye["indicePriorite"] == 9999 && $laPlageCritique["type"] != "Caissier") {
		$laPlageCritique["ratio"] = 999;
		
		
		return trouverEmployePlusImportant($laPlageCritique);
	} else if($laPlageCritique["ratio"] == 0.00001 && $lEmploye["indicePriorite"] == 9999) {
		$laPlageCritique["ratio"] = 999;
		$arrayHoraire[$laPlageCritique["jour"]][$laPlageCritique["demiHrs"]]['siCle'] = 2;
		
		
		
		return trouverEmployePlusImportant($laPlageCritique);
	}
	if($laPlageCritique["ratio"] == 0.00001 && $lEmploye["indicePriorite"] != 9999) {
		$arrayHoraire[$laPlageCritique["jour"]][$laPlageCritique["demiHrs"]]['siCle'] = 1;

	}
	$lEmploye["type"] = $laPlageCritique["type"];
	$lEmploye["jour"] = $laPlageCritique["jour"];
	$lEmploye["demiHrs"] = $laPlageCritique["demiHrs"];	
	
	if($lEmploye['courriel'] == '') {
		$arrayHoraire[$laPlageCritique["jour"]][$laPlageCritique["demiHrs"]]['siCle'] = 2;
		if($laPlageCritique["type"]== "Vetement")
			$arrayHoraire[$laPlageCritique["jour"]][$laPlageCritique["demiHrs"]]['siCle'] = 3;
		if($laPlageCritique["type"]== "Chaussure")
			$arrayHoraire[$laPlageCritique["jour"]][$laPlageCritique["demiHrs"]]['siCle'] = 4;
	}
	return $lEmploye;
}


////////////////////////////////////////////////////////////////
function trouverRatioPlusPetit() {
	global $arrayRatio;
	$leRatio = array("jour" =>0, "demiHrs" => 0, "ratio" => 99,"type" => "type");

	for($i = 0;$i < count($arrayRatio); $i++) {
		
		for($j = 0;$j < count($arrayRatio[$i]); $j++) {
			
			
			
			if($arrayRatio[$i][$j]["Vetement"] < $leRatio["ratio"] && $arrayRatio[$i][$j]["Vetement"] > 0) {
				$leRatio["jour"] = $i;
				$leRatio["demiHrs"] = $j;
				$leRatio["ratio"] = $arrayRatio[$i][$j]["Vetement"];
				$leRatio["type"] = "Vetement";
			}
			if($arrayRatio[$i][$j]["Chaussure"] < $leRatio["ratio"] && $arrayRatio[$i][$j]["Chaussure"] > 0) {
				$leRatio["jour"] = $i;
				$leRatio["demiHrs"] = $j;
				$leRatio["ratio"] = $arrayRatio[$i][$j]["Chaussure"];
				$leRatio["type"] = "Chaussure";
			}
			if($arrayRatio[$i][$j]["Caissier"] < $leRatio["ratio"] && $arrayRatio[$i][$j]["Caissier"] > 0) {
				$leRatio["jour"] = $i;
				$leRatio["demiHrs"] = $j;
				$leRatio["ratio"] = $arrayRatio[$i][$j]["Caissier"];
				$leRatio["type"] = "Caissier";
			}
		}	
	}
		
	var_dump($leRatio);
	return $leRatio;
	
}



///////////////////////////////////////////////////////////////
function genererRatio() {
global $arrayRessource, $arrayDisponibilite, $arrayRatio, $arrayHoraire;

	for($i = 0; $i < count($arrayDisponibilite); $i++) {
		for($j = 0; $j < count($arrayDisponibilite[$i]); $j++) {
			
			
			if($arrayRessource[$i][$j]["Vetement"] != 0) {
				$arrayRatio[$i][$j]["Vetement"] = $arrayDisponibilite[$i][$j]["Vetement"]['nbDisponibilite'] / $arrayRessource[$i][$j]["Vetement"];
			} else {
				$arrayRatio[$i][$j]["Vetement"] = 0;
			}
				
			if($arrayRessource[$i][$j]["Chaussure"] != 0) {
				$arrayRatio[$i][$j]["Chaussure"] = $arrayDisponibilite[$i][$j]["Chaussure"]['nbDisponibilite'] / $arrayRessource[$i][$j]["Chaussure"];
			} else {
				$arrayRatio[$i][$j]["Chaussure"] = 0;
			}
			
			if($arrayRessource[$i][$j]["Caissier"] != 0) {
				$arrayRatio[$i][$j]["Caissier"] = $arrayDisponibilite[$i][$j]["Caissier"]['nbDisponibilite'] / $arrayRessource[$i][$j]["Caissier"];
			} else {
				$arrayRatio[$i][$j]["Caissier"] = 0;
			}
			

			if(($j == 0 ||$j == 23) && ($arrayHoraire[$i][$j]['siCle'] == 0 || $arrayHoraire[$i][$j]['siCle'] == 3 || $arrayHoraire[$i][$j]['siCle'] == 4)) {


				if(count($arrayHoraire[$i][$j]["Vetement"]) == 0 && $arrayHoraire[$i][$j]['siCle'] != 3 && $arrayHoraire[$i][$j]['siCle'] != 4 ) {
					$arrayRatio[$i][$j]["Vetement"] =  0.00001;
					}
				if(count($arrayHoraire[$i][$j]["Chaussure"]) == 0 && $arrayHoraire[$i][$j]['siCle'] != 4) {
					$arrayRatio[$i][$j]["Chaussure"] = 0.00001;
					}
				if(count($arrayHoraire[$i][$j]["Caissier"]) == 0) {
					$arrayRatio[$i][$j]["Caissier"] =  0.00001;
					}
			}
			
		}
	}
	
}
///////////////////////////////////////////////////////////////

function ajouterRessourceArray() {
	global $arrayRessource, $listRessource;

	foreach($listRessource as &$laRessource) {
		$lesHrsChiffre = gestionHrs($laRessource['heureDebut'], $laRessource['heureFin']);
		for($j = ($lesHrsChiffre[0]-9)*2; $j <= (($lesHrsChiffre[0]-9)*2 + ($lesHrsChiffre[1] - $lesHrsChiffre[0]) * 2 )-1 ; $j++) { 
			$arrayRessource[$laRessource['jour']][$j]["Vetement"] = $laRessource['nbEmpVetements'];
			$arrayRessource[$laRessource['jour']][$j]["Chaussure"] = $laRessource['nbEmpChaussures'];
			$arrayRessource[$laRessource['jour']][$j]["Caissier"] = $laRessource['nbEmpCaissier'];
		}
	}
}


function ajouterDisponibiliteArray() {
	global $arrayDisponibilite, $listEmployeDisponibilite;
	foreach($listEmployeDisponibilite as &$lEmploye) {
		if(isset($lEmploye['listeDispoSemaine']) && count($lEmploye['listeDispoSemaine']) != 0) {
			foreach($lEmploye['listeDispoSemaine'] as &$laDisponibilite) {
				$lesHrsChiffre = gestionHrs($laDisponibilite['heureDebut'],$laDisponibilite['heureFin']);
				for($i = (($lesHrsChiffre[0]-9)*2); $i <= ((($lesHrsChiffre[0]-9)*2 + ($lesHrsChiffre[1] - $lesHrsChiffre[0]) * 2 ) - 1) ; $i++) {
					
					switch ($laDisponibilite['jour']) {
						case "dimanche":
							if($lEmploye['formationVetement'] == 1) {
								$arrayDisponibilite[0][$i]['Vetement']['nbDisponibilite'] += 1;
								array_push($arrayDisponibilite[0][$i]['Vetement']['listeEmployeDisponible'], $lEmploye);
							}
							
							if($lEmploye['formationChaussure'] == 1) {
								$arrayDisponibilite[0][$i]['Chaussure']['nbDisponibilite'] += 1;
								array_push($arrayDisponibilite[0][$i]['Chaussure']['listeEmployeDisponible'], $lEmploye);
							}
							
							if($lEmploye['formationCaissier'] == 1) {
								$arrayDisponibilite[0][$i]['Caissier']['nbDisponibilite'] += 1;
								array_push($arrayDisponibilite[0][$i]['Caissier']['listeEmployeDisponible'], $lEmploye);
							}
						break;
						case "lundi":
							if($lEmploye['formationVetement'] == 1) {
								$arrayDisponibilite[1][$i]['Vetement']['nbDisponibilite'] += 1;
								array_push($arrayDisponibilite[1][$i]['Vetement']['listeEmployeDisponible'], $lEmploye);
							}
							
							if($lEmploye['formationChaussure'] == 1) {
								$arrayDisponibilite[1][$i]['Chaussure']['nbDisponibilite'] += 1;
								array_push($arrayDisponibilite[1][$i]['Chaussure']['listeEmployeDisponible'], $lEmploye);
							}
							
							if($lEmploye['formationCaissier'] == 1) {
								$arrayDisponibilite[1][$i]['Caissier']['nbDisponibilite'] += 1;
								array_push($arrayDisponibilite[1][$i]['Caissier']['listeEmployeDisponible'], $lEmploye);
							}
						break;
						case "mardi":	
							if($lEmploye['formationVetement'] == 1) {
								$arrayDisponibilite[2][$i]['Vetement']['nbDisponibilite'] += 1;
								array_push($arrayDisponibilite[2][$i]['Vetement']['listeEmployeDisponible'], $lEmploye);
							}
							
							if($lEmploye['formationChaussure'] == 1) {
								$arrayDisponibilite[2][$i]['Chaussure']['nbDisponibilite'] += 1;
								array_push($arrayDisponibilite[2][$i]['Chaussure']['listeEmployeDisponible'], $lEmploye);
							}
							
							if($lEmploye['formationCaissier'] == 1) {
								$arrayDisponibilite[2][$i]['Caissier']['nbDisponibilite'] += 1;
								array_push($arrayDisponibilite[2][$i]['Caissier']['listeEmployeDisponible'], $lEmploye);
							}
						break;
						case "mercredi":
							if($lEmploye['formationVetement'] == 1) {
								$arrayDisponibilite[3][$i]['Vetement']['nbDisponibilite'] += 1;
								array_push($arrayDisponibilite[3][$i]['Vetement']['listeEmployeDisponible'], $lEmploye);
							}
							
							if($lEmploye['formationChaussure'] == 1) {
								$arrayDisponibilite[3][$i]['Chaussure']['nbDisponibilite'] += 1;
								array_push($arrayDisponibilite[3][$i]['Chaussure']['listeEmployeDisponible'], $lEmploye);
							}
							
							if($lEmploye['formationCaissier'] == 1) {
								$arrayDisponibilite[3][$i]['Caissier']['nbDisponibilite'] += 1;
								array_push($arrayDisponibilite[3][$i]['Caissier']['listeEmployeDisponible'], $lEmploye);
							}
						break;
						case "jeudi":
							if($lEmploye['formationVetement'] == 1) {
								$arrayDisponibilite[4][$i]['Vetement']['nbDisponibilite'] += 1;
								array_push($arrayDisponibilite[4][$i]['Vetement']['listeEmployeDisponible'], $lEmploye);
							}
							
							if($lEmploye['formationChaussure'] == 1) {
								$arrayDisponibilite[4][$i]['Chaussure']['nbDisponibilite'] += 1;
								array_push($arrayDisponibilite[4][$i]['Chaussure']['listeEmployeDisponible'], $lEmploye);
							}
							
							if($lEmploye['formationCaissier'] == 1) {
								$arrayDisponibilite[4][$i]['Caissier']['nbDisponibilite'] += 1;
								array_push($arrayDisponibilite[4][$i]['Caissier']['listeEmployeDisponible'], $lEmploye);
							}
						break;
						case "vendredi":
							if($lEmploye['formationVetement'] == 1) {
								$arrayDisponibilite[5][$i]['Vetement']['nbDisponibilite'] += 1;
								array_push($arrayDisponibilite[5][$i]['Vetement']['listeEmployeDisponible'], $lEmploye);
							}
							
							if($lEmploye['formationChaussure'] == 1) {
								$arrayDisponibilite[5][$i]['Chaussure']['nbDisponibilite'] += 1;
								array_push($arrayDisponibilite[5][$i]['Chaussure']['listeEmployeDisponible'], $lEmploye);
							}
							
							if($lEmploye['formationCaissier'] == 1) {
								$arrayDisponibilite[5][$i]['Caissier']['nbDisponibilite'] += 1;
								array_push($arrayDisponibilite[5][$i]['Caissier']['listeEmployeDisponible'], $lEmploye);
							}
						break;
						case "samedi":
							if($lEmploye['formationVetement'] == 1) {
								$arrayDisponibilite[6][$i]['Vetement']['nbDisponibilite'] += 1;
								array_push($arrayDisponibilite[6][$i]['Vetement']['listeEmployeDisponible'], $lEmploye);
							}
							
							if($lEmploye['formationChaussure'] == 1) {
								$arrayDisponibilite[6][$i]['Chaussure']['nbDisponibilite'] += 1;
								array_push($arrayDisponibilite[6][$i]['Chaussure']['listeEmployeDisponible'], $lEmploye);
							}
							
							if($lEmploye['formationCaissier'] == 1) {
								$arrayDisponibilite[6][$i]['Caissier']['nbDisponibilite'] += 1;
								array_push($arrayDisponibilite[6][$i]['Caissier']['listeEmployeDisponible'], $lEmploye);
							}
						break;
					}
				}
			}			
		}	
	}
	
	return $arrayDisponibilite;
}







/////////////////////////////////////////////////////////////
function genererArrayHoraire($source) {

	$arraySemaine =array();
	for($i = 0; $i < 7; $i++) {
		
		$arrayJour = array();
		
		for($j = 0; $j < 24 ; $j++) {
			$arrayJour[$j] = array("Vetement" => array(),"Chaussure" => array(),"Caissier" => array()) ;
			
			if($source == 'disponibilite') {
				$arrayJour[$j]["Vetement"] = array('nbDisponibilite' => 0, 'listeEmployeDisponible' => array());
				$arrayJour[$j]["Chaussure"] = array( 'nbDisponibilite' => 0, 'listeEmployeDisponible' => array());
				$arrayJour[$j]["Caissier"] = array( 'nbDisponibilite' => 0, 'listeEmployeDisponible' => array());
			}
			if($source == 'ressource' || $source == 'ratio') {
				$arrayJour[$j]["Vetement"] = 0;
				$arrayJour[$j]["Chaussure"] = 0;
				$arrayJour[$j]["Caissier"] = 0;
			}
			
			if($source == 'horaire') {
				if($j == 0 || $j == 23) {
					$arrayJour[$j] += array('siCle' => 0);
					$arrayJour[$j]["Vetement"] = array();
					$arrayJour[$j]["Chaussure"] = array();
					$arrayJour[$j]["Caissier"] = array();
				}
			}
			
		}
		$arraySemaine[$i] = $arrayJour;
	}


	return $arraySemaine;
}

function gestionHrs($hrsDebut, $hrsFin) {
	$hrsDebutExp = explode(":", $hrsDebut);
	$hrsFinExp = explode(":", $hrsFin);
	
	$hrsDebutNb = intval($hrsDebutExp[0]);
	if($hrsDebutExp[1] == "30") {
		$hrsDebutNb = $hrsDebutNb +0.5;
	}
	
	$hrsFinNb = intval($hrsFinExp[0]);
	if($hrsFinExp[1] == "30") {
		$hrsFinNb = $hrsFinNb +0.5;
	}
	
	return array($hrsDebutNb, $hrsFinNb);
}

///////////////////////////////////////////////////////////////////////////////////

function lstEmployeHoraire() {
	date_default_timezone_set('America/Montreal');
	
	

	//Numero de la semaine que nous sommes présentement
	$semaine = intval(date("W"));
	$annee = intval(date("Y"));

	//Connexion a la BD(à changer de place)
	$connBD = new PDO('mysql:host=localhost;dbname=coureur_nordique', 'user_coureur', 'qweqwe');

	//Information sur un Utilisateurs
	$sql = 'Call Utilisateurs()';
	$prep = $connBD->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$prep->execute();

	//Array des utilisateurs
	$listUtilisateur = $prep->fetchAll();


	//Information sur les disponibilités d'une semaine selon le critère
	$sql = 'Call listeDispoSemaine(:semaine, :annee)';
	$prep = $connBD->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$prep->execute(array(':semaine' =>  $semaine, ':annee' =>  $annee  ));
	
	//Array des dispoSemaines selectionnés
	$listeDispoSemaine = $prep->fetchAll();


	//Array des Utilisateurs joint avec les dispoSemaines selectionnés
	$listeModifie = array();	



	for($i = 0;$i < count($listUtilisateur); $i++) {

		//DispoSemaine pour le bon utilisateur
		$DispoSem = null;
		
		for($j = 0;$j < count($listeDispoSemaine); $j++) {
			if($listeDispoSemaine[$j]['courriel'] == $listUtilisateur[$i]['courriel']) {
				$DispoSem = $listeDispoSemaine[$j];
			}
		}

		if($DispoSem != null) {
			
			$idSemaine = $DispoSem['idDispoSemaine'];
			
			if($DispoSem['refIdSemaineACopier'] >= 0) {

				$idSemaine = $DispoSem['refIdSemaineACopier'];
			}
			//Information sur les disponibilités des jours selon ID de la semaine
			$sql = 'Call listeDispoJours(:id)';
			$prep = $connBD->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
			$prep->execute(array(':id' =>  $idSemaine));
			//Array des dispo des jours
			$listeDispoJours = $prep->fetchAll(PDO::FETCH_ASSOC);

			
			array_push($listeModifie, array("courriel" =>$listUtilisateur[$i]['courriel'], "indPriorite" => $listUtilisateur[$i]['indPriorite'], "hrsMin" => $listUtilisateur[$i]['hrsMin']
			, "hrsMax" => $listUtilisateur[$i]['hrsMax'], "possesseurCle" => $listUtilisateur[$i]['possesseurCle'], "formationChaussure" => $listUtilisateur[$i]['formationChaussure']
			, "formationCaissier" => $listUtilisateur[$i]['formationCaissier'], "formationVetement" => $listUtilisateur[$i]['formationVetement']
			, "nbHeureSouhaite" => $DispoSem['nbHeureSouhaite'], "idDispoSemaine" => $DispoSem['idDispoSemaine'], "refIdSemaineACopier" => $DispoSem['refIdSemaineACopier'], "listeDispoSemaine" => $listeDispoJours));
		} else {
			array_push($listeModifie, array("courriel" =>$listUtilisateur[$i]['courriel'], "indPriorite" => $listUtilisateur[$i]['indPriorite'], "hrsMin" => $listUtilisateur[$i]['hrsMin']
			, "hrsMax" => $listUtilisateur[$i]['hrsMax'], "possesseurCle" => $listUtilisateur[$i]['possesseurCle'], "formationChaussure" => $listUtilisateur[$i]['formationChaussure']
			, "formationCaissier" => $listUtilisateur[$i]['formationCaissier'], "formationVetement" => $listUtilisateur[$i]['formationVetement']));
		}
	}
	return $listeModifie;
}


function lstRessource() {
	date_default_timezone_set('America/Montreal');

	//Connexion a la BD(à changer de place)
	$connBD = new PDO('mysql:host=localhost;dbname=coureur_nordique', 'user_coureur', 'qweqwe');


	//Information sur les disponibilités d'une semaine selon le critère
	$sql = 'Call getUsedMere()';
	$prep = $connBD->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$prep->execute();
	
	//Array des dispoSemaines selectionnés
	$getUsedMere = $prep->fetchAll(PDO::FETCH_ASSOC);
	
	
	$sql = 'Call getRessourcesFromBloc(:id)';
	$prep = $connBD->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$prep->execute(array(':id' => $getUsedMere[0]['idBlocRessource']));
	
	$listeRessource = $prep->fetchAll(PDO::FETCH_ASSOC);
	
	return $listeRessource;
	
}


//////////////////////////////////////////////////////////////////
?>