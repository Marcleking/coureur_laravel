<?php

class HoraireModel extends Eloquent {

	public static function creeHoraire()
	{
		//Liste des disponibilités qui reste à combler
		$listUtilhoraire = HoraireModel::lstUtilHoraire();

		//Liste des ressources qui reste à combler
		$listRessource = Horairemodel::lstRessource();

		//Liste des demi-heure qui comporte un ratio en dessous de 1
		$listRatioErreur = array();


		Horairemodel::genererRatio();

		//var_dump($listRessource);

		//Tri de la liste des dispos selon l'indice de priorité de l'employé
		$listUtilhoraire = array_values(array_sort($listUtilhoraire, function($value)
		{
		    return 1/$value['indPriorite'];
		}));

		//Création de l'array de l'horaire
        $horaire = [];
        //Parcours de toute les ressources
		foreach ($listRessource as $ressource) {
			//Parcours de tout les types d'employés
			foreach ($ressource['typeEmp'] as & $typeRessource) {
				// Si la ressource reste encore à être comblé
				if ($typeRessource > 0) {
					// Parcours de tout les utilisateurs
					foreach ($listUtilhoraire as $users) {
						// Si l'employé a la formation pour la ressource demander actuel
						if(!HoraireModel::empEstTypeRessource($typeRessource, $users))
						{
							// Parcours de la liste des disponibilité de l'employé
							foreach ($users['listeDispoSemaine'] as &$dispo) {
								// Si l'employé est disponible pour la journée actuelle
								if(HoraireModel::idEgualJour($ressource['jour'], $dispo['jour'])) {

									$heuresDebut = HoraireModel::gestionHrs($ressource['heureDebut'], $dispo['heureDebut']);
									$heuresFin = HoraireModel::gestionHrs($ressource['heureFin'], $dispo['heureFin']);

									// Si l'employé est disponible avant ou en même temps que le début du chiffre demander
									// et si l'employé peux faire un chiffre le 3 heures minimum
									if ($heuresDebut[0] >= $heuresDebut[1] && $heuresDebut[0]+3 <= $heuresFin[1]) {
										// Aide pour le débuguage
										//var_dump("Ressource");
										//var_dump($ressource);
										//var_dump("Dispo");
										//var_dump($dispo);
										
										// On ajoute le chiffre à l'horaire
										array_push($horaire, array(
											'courriel' => $users['courriel'],
											'typeTravail' => array_keys($typeRessource)[0],
											'jour' => $ressource['jour'],
											'heureDebut' => $ressource['heureDebut'],
											'heureFin' => $dispo['heureFin']
										));
										// On modifie la dispo de l'employé (s'il est sur l'horaire il est pu dispo ein!)
										$dispo['heureDebut'] = $dispo['heureFin'];
										// On modifie la ressource (elle a été complé pour le temps max que l'employé pouvait donnée)
										$ressource['heureDebut'] = $dispo['heureFin'];
										// On diminue le nombre de ressource demander pour ce chiffre
                                        $typeRessource[array_keys($typeRessource)[0]]--;

                                        // Aide pour le débuguage
										//var_dump("Ressource");
										//var_dump($ressource);
										//var_dump("Dispo");
										//var_dump($dispo);
									}
								}
							}
						}
					}
				}
			}
		}

		// var_dump($horaire);
		HoraireModel::ajoutHoraireDansBd($horaire);

		Horairemodel::lstRatioErreur();

		var_dump($listRatioErreur);

		
	}

	public static function ajoutHoraireDansBd($horaire)
	{
		DB::table('plagedetravail')->delete();
		foreach ($horaire as $plage) {
			DB::table('plagedetravail')->insert($plage);
		}
	}

	public static function empEstTypeRessource($typeRessource, $employe)
	{
		if (array_keys($typeRessource) == "chaussure" && $employe['formationChaussure'] == "1")
			return true;
		elseif (array_keys($typeRessource) == "caissier" && $employe['formationCaissier'] == "1")
			return true;
		elseif (array_keys($typeRessource) == "vetement" && $employe['formationVetement'] == "1")
			return true;
		else
			return false;
	}

	public static function idEgualJour($id, $jour)
	{
		if ($id == 0 && $jour == "dimanche")
			return true;
		elseif ($id == 1 && $jour == "lundi")
			return true;
		elseif ($id == 2 && $jour == "mardi")
			return true;
		elseif ($id == 3 && $jour == "mercredi")
			return true;
		elseif ($id == 4 && $jour == "jeudi")
			return true;
		elseif ($id == 5 && $jour == "vendredi")
			return true;
		elseif ($id == 6 && $jour == "samedi")
			return true;
		else
			return false;
	}

	public static function genererRatio() 
	{
		global $RatioDemiHrs, $listUtilhoraire, $listRessource;
		
		if(!isset($RatioDemiHrs)) {
			$RatioDemiHrs = HoraireModel::arrayRatioSemaine();
		}
		HoraireModel::ajoutDispo($listUtilhoraire);
		HoraireModel::divisionParRessource($listRessource);
		//var_dump(HoraireModel::trouverRatioPlusPetit());
	}

	public static function TrouverEmploye()
	{ 
		global $RatioDemiHrs;

		return $RatioDemiHrs[HoraireModel::trouverRatioPlusPetit()[3]][HoraireModel::trouverRatioPlusPetit()[0]][HoraireModel::trouverRatioPlusPetit()[1]];
		//return HoraireModel::trouverRatioPlusPetit();

	}

	/**
	* lstUtilHoraire permet d'avoir accès aux informations utile à la génération d'une 
	* horaire
	* 
	* @return Array des informations utile pour gênérer un horaire 
	*/
	public static function lstUtilHoraire() {
		date_default_timezone_set('UTC');

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


	/**
	* lstRessource permet d'avoir accès aux ressources utile selon la bonne semaine
	* 
	* @return Array des informations utile pour gênérer un horaire 
	*/
	public static function lstRessource() {
		date_default_timezone_set('UTC');

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


		foreach ($listeRessource as &$ressource) {
			$ressource['typeEmp']['chaussure'] = ['chaussure' => $ressource['nbEmpChaussures']];
            $ressource['typeEmp']['vetement'] = ['vetement' => $ressource['nbEmpVetements']];
			$ressource['typeEmp']['caissier'] = ['caissier' => $ressource['nbEmpCaissier']];
		}
		

		return $listeRessource;
		
	}

	/**
	* arraySemaine permet de generer le array des ratios de chaque case
	* 
	* @return Array avec un ratio de 1 à toute les cases 
	*/
	public static function arrayRatioSemaine() {
		$arraySemaine =  array("ratioVetement" => array(), "ratioChaussure" => array(), "ratioCaissier" => array() );

		for($i = 0; $i < 7; $i++) {
			
			$arrayJour = array();
			
			for($j = 0; $j < 24 ; $j++) {
				$arrayJour[$j]['ratio'] = 0;
				$arrayJour[$j]['listEmploye'] = array();
			}
			$arraySemaine["ratioVetement"][$i] = $arrayJour;
			$arraySemaine["ratioChaussure"][$i] = $arrayJour;
			$arraySemaine["ratioCaissier"][$i] = $arrayJour;
		}


		return $arraySemaine;
	}

	/**
	* gestionHrs permet de divisier les heures de début et de fin
	* 
	* @return Array avec les heures divisés
	* @param String heure de début
	* @param String heure de fin
	*/
	public static function gestionHrs($hrsDebut, $hrsFin) {
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


	/**
	* divisionParRessource permet de diviser les dispos par les ressources
	* 
	* @param Array des ressources
	*/
	public static function divisionParRessource($listRessource) {
		//Permet d'avoir accès a la variable
		global $RatioDemiHrs;
		
		
		for($i = 0; $i < count($listRessource); $i++) {
			
			$lesHrsChiffre = HoraireModel::gestionHrs($listRessource[$i]['heureDebut'], $listRessource[$i]['heureFin']);
			for($j = ($lesHrsChiffre[0]-9)*2; $j <= (($lesHrsChiffre[0]-9)*2 + ($lesHrsChiffre[1] - $lesHrsChiffre[0]) * 2 )-1 ; $j++) {
				
				switch ($listRessource[$i]['jour']) {
				case 0:
					//echo [0][$j]["ratio"];
	                $RatioDemiHrs["ratioVetement"][0][$j]["ratio"]  /= $listRessource[$i]['nbEmpVetements'];
	                $RatioDemiHrs["ratioChaussure"][0][$j]["ratio"] /= $listRessource[$i]['nbEmpChaussures'];
	                $RatioDemiHrs["ratioCaissier"][0][$j]["ratio"]  /= $listRessource[$i]['nbEmpCaissier'];
					//echo $RatioDemiHrs["ratioVetement"][0][$j]["ratio"] ;
					break;
	            case 1:                                             
	                $RatioDemiHrs["ratioVetement"][1][$j]["ratio"]  /= $listRessource[$i]['nbEmpVetements'];
	                $RatioDemiHrs["ratioChaussure"][1][$j]["ratio"] /= $listRessource[$i]['nbEmpChaussures'];
	                $RatioDemiHrs["ratioCaissier"][1][$j]["ratio"]  /= $listRessource[$i]['nbEmpCaissier'];
					break;
				case 2:	
	                $RatioDemiHrs["ratioVetement"][2][$j]["ratio"]  /= $listRessource[$i]['nbEmpVetements'];
	                $RatioDemiHrs["ratioChaussure"][2][$j]["ratio"] /= $listRessource[$i]['nbEmpChaussures'];
	                $RatioDemiHrs["ratioCaissier"][2][$j]["ratio"]  /= $listRessource[$i]['nbEmpCaissier'];
					break;
	            case 3:                                             
	                $RatioDemiHrs["ratioVetement"][3][$j]["ratio"]  /= $listRessource[$i]['nbEmpVetements'];
	                $RatioDemiHrs["ratioChaussure"][3][$j]["ratio"] /= $listRessource[$i]['nbEmpChaussures'];
	                $RatioDemiHrs["ratioCaissier"][3][$j]["ratio"]  /= $listRessource[$i]['nbEmpCaissier'];
					break;
	            case 4:                                             
	                $RatioDemiHrs["ratioVetement"][4][$j]["ratio"]  /= $listRessource[$i]['nbEmpVetements'];
	                $RatioDemiHrs["ratioChaussure"][4][$j]["ratio"] /= $listRessource[$i]['nbEmpChaussures'];
	                $RatioDemiHrs["ratioCaissier"][4][$j]["ratio"]  /= $listRessource[$i]['nbEmpCaissier'];
					break;
	            case 5:                                             
	                $RatioDemiHrs["ratioVetement"][5][$j]["ratio"]  /= $listRessource[$i]['nbEmpVetements'];
	                $RatioDemiHrs["ratioChaussure"][5][$j]["ratio"] /= $listRessource[$i]['nbEmpChaussures'];
	                $RatioDemiHrs["ratioCaissier"][5][$j]["ratio"]  /= $listRessource[$i]['nbEmpCaissier'];
					break;
	            case 6:                                             
	                $RatioDemiHrs["ratioVetement"][6][$j]["ratio"]  /= $listRessource[$i]['nbEmpVetements'];
	                $RatioDemiHrs["ratioChaussure"][6][$j]["ratio"] /= $listRessource[$i]['nbEmpChaussures'];
	                $RatioDemiHrs["ratioCaissier"][6][$j]["ratio"]  /= $listRessource[$i]['nbEmpCaissier'];
					break;
				}
			}
			
		}

	}



	/**
	* ajoutDispo permet d'ajouter les dispos au ratio
	* 
	* @param Array des dispo
	*/
	public static function ajoutDispo($listDispo) {
		//Permet d'avoir accès a la variable
		global $RatioDemiHrs;
		
		
		for($k = 0; $k < count($listDispo); $k++) {
			
			if(isset($listDispo[$k]['listeDispoSemaine']) && count($listDispo[$k]['listeDispoSemaine']) != 0) {
				
				for($l = 0; $l < count($listDispo[$k]['listeDispoSemaine']); $l++) {	
					
					
					$lesHrsChiffre = HoraireModel::gestionHrs($listDispo[$k]['listeDispoSemaine'][$l]['heureDebut'], $listDispo[$k]['listeDispoSemaine'][$l]['heureFin']);
					
					for($i = (($lesHrsChiffre[0]-9)*2); $i <= ((($lesHrsChiffre[0]-9)*2 + ($lesHrsChiffre[1] - $lesHrsChiffre[0]) * 2 ) - 1) ; $i++) {
						switch ($listDispo[$k]['listeDispoSemaine'][$l]['jour'] ) {
						case "dimanche":
							if(HoraireModel::verifierSiRessource(0,$i)){
								if($listDispo[$k]['formationVetement'] == 1) {
									$RatioDemiHrs["ratioVetement"][0][$i]["ratio"] += 1;
									$RatioDemiHrs["ratioVetement"][0][$i]['listEmploye'] = $listDispo[$k];
								}

								
								if($listDispo[$k]['formationChaussure'] == 1){
									$RatioDemiHrs["ratioChaussure"][0][$i]["ratio"]  += 1;
									$RatioDemiHrs["ratioChaussure"][0][$i]['listEmploye'] = $listDispo[$k];
								}
								
								if($listDispo[$k]['formationCaissier'] == 1){
									$RatioDemiHrs["ratioCaissier"][0][$i]["ratio"]  += 1;
									$RatioDemiHrs["ratioCaissier"][0][$i]['listEmploye'] = $listDispo[$k];
								}
							}
							break;
						case "lundi":
							if(HoraireModel::verifierSiRessource(1,$i)){
								if($listDispo[$k]['formationVetement'] == 1){
									$RatioDemiHrs["ratioVetement"][1][$i]["ratio"]  += 1;
									$RatioDemiHrs["ratioVetement"][1][$i]['listEmploye'] = $listDispo[$k];
								}
								
								if($listDispo[$k]['formationChaussure'] == 1){
									$RatioDemiHrs["ratioChaussure"][1][$i]["ratio"]  += 1;
									$RatioDemiHrs["ratioChaussure"][1][$i]['listEmploye'] = $listDispo[$k];
								}
								
								if($listDispo[$k]['formationCaissier'] == 1){
									$RatioDemiHrs["ratioCaissier"][1][$i]["ratio"]  += 1;
									$RatioDemiHrs["ratioCaissier"][1][$i]['listEmploye'] = $listDispo[$k];
								}
							}
							break;
						case "mardi":	
							if(HoraireModel::verifierSiRessource(2,$i)){
								if($listDispo[$k]['formationVetement'] == 1){
									$RatioDemiHrs["ratioVetement"][2][$i]["ratio"]  += 1;	
									$RatioDemiHrs["ratioVetement"][2][$i]['listEmploye'] = $listDispo[$k];
								}
								
								if($listDispo[$k]['formationChaussure'] == 1){
									$RatioDemiHrs["ratioChaussure"][2][$i]["ratio"]  += 1;	
									$RatioDemiHrs["ratioChaussure"][2][$i]['listEmploye'] = $listDispo[$k];
								}
								
								if($listDispo[$k]['formationCaissier'] == 1){
									$RatioDemiHrs["ratioCaissier"][2][$i]["ratio"]  += 1;	
									$RatioDemiHrs["ratioCaissier"][2][$i]['listEmploye'] = $listDispo[$k];
								}
							}
							break;
						case "mercredi":
							if(HoraireModel::verifierSiRessource(3,$i)){
								if($listDispo[$k]['formationVetement'] == 1){
									$RatioDemiHrs["ratioVetement"][3][$i]["ratio"]  += 1;	
									$RatioDemiHrs["ratioVetement"][3][$i]['listEmploye'] = $listDispo[$k];
								}
								
								if($listDispo[$k]['formationChaussure'] == 1){
									$RatioDemiHrs["ratioChaussure"][3][$i]["ratio"]  += 1;	
									$RatioDemiHrs["ratioChaussure"][3][$i]['listEmploye'] = $listDispo[$k];
								}
								
								if($listDispo[$k]['formationCaissier'] == 1){
									$RatioDemiHrs["ratioCaissier"][3][$i]["ratio"]  += 1;
									$RatioDemiHrs["ratioCaissier"][3][$i]['listEmploye'] = $listDispo[$k];
								}
							}
							break;
						case "jeudi":
							if(HoraireModel::verifierSiRessource(4,$i)){
								if($listDispo[$k]['formationVetement'] == 1){
									$RatioDemiHrs["ratioVetement"][4][$i]["ratio"]  += 1;
									$RatioDemiHrs["ratioVetement"][4][$i]['listEmploye'] = $listDispo[$k];
								}
								
								if($listDispo[$k]['formationChaussure'] == 1){
									$RatioDemiHrs["ratioChaussure"][4][$i]["ratio"]  += 1;	
									$RatioDemiHrs["ratioChaussure"][4][$i]['listEmploye'] = $listDispo[$k];
								}
								
								if($listDispo[$k]['formationCaissier'] == 1){
									$RatioDemiHrs["ratioCaissier"][4][$i]["ratio"]  += 1;
									$RatioDemiHrs["ratioCaissier"][4][$i]['listEmploye'] = $listDispo[$k];
								}
							}
							break;
						case "vendredi":
							if(HoraireModel::verifierSiRessource(5,$i)){
								if($listDispo[$k]['formationVetement'] == 1){
									$RatioDemiHrs["ratioVetement"][5][$i]["ratio"]  += 1;
									$RatioDemiHrs["ratioVetement"][5][$i]['listEmploye'] = $listDispo[$k];
								}
								
								if($listDispo[$k]['formationChaussure'] == 1){
									$RatioDemiHrs["ratioChaussure"][5][$i]["ratio"]  += 1;
									$RatioDemiHrs["ratioChaussure"][5][$i]['listEmploye'] = $listDispo[$k];
								}
								
								if($listDispo[$k]['formationCaissier'] == 1){
									$RatioDemiHrs["ratioCaissier"][5][$i]["ratio"]  += 1;	
									$RatioDemiHrs["ratioCaissier"][5][$i]['listEmploye'] = $listDispo[$k];
								}
							}
							break;
						case "samedi":
							if(HoraireModel::verifierSiRessource(6,$i)){
								if($listDispo[$k]['formationVetement'] == 1){
									$RatioDemiHrs["ratioVetement"][6][$i]["ratio"]  += 1;	
									$RatioDemiHrs["ratioVetement"][6][$i]['listEmploye'] = $listDispo[$k];
								}
								
								if($listDispo[$k]['formationChaussure'] == 1){
									$RatioDemiHrs["ratioChaussure"][6][$i]["ratio"]  += 1;
									$RatioDemiHrs["ratioChaussure"][6][$i]['listEmploye'] = $listDispo[$k];
								}
								
								if($listDispo[$k]['formationCaissier'] == 1){
									$RatioDemiHrs["ratioCaissier"][6][$i]["ratio"]  += 1;
									$RatioDemiHrs["ratioCaissier"][6][$i]['listEmploye'] = $listDispo[$k];
								}
							}
							break;
						}
					}
					//echo "<br />";
				}
				
			}	
		}
		

	}


	/**
	* lstRatioErreur permet de generer la liste des ratios qui sont inférieur à 1 ressource pour une disponibilité
	* 
	* 
	*/
	public static function lstRatioErreur() {
		global $listRatioErreur, $RatioDemiHrs;

		if(!isset($listRatioErreur))
       		$listRatioErreur = [];

		for($i = 0;$i < count($RatioDemiHrs["ratioVetement"]); $i++) {
			for($j = 0;$j < count($RatioDemiHrs["ratioVetement"][$i]); $j++) {
				if($RatioDemiHrs["ratioCaissier"][$i][$j]["ratio"] < 1) {
					if(!HoraireModel::vrfRatioErreur($i,$j,"ratioCaissier"))
					array_push($listRatioErreur, array("ratioCaissier",$i, $j, $RatioDemiHrs["ratioCaissier"][$i][$j]["ratio"]));
				}
				if($RatioDemiHrs["ratioVetement"][$i][$j]["ratio"] < 1) {
					if(!HoraireModel::vrfRatioErreur($i,$j,"ratioVetement"))
					array_push($listRatioErreur, array("ratioVetement",$i, $j, $RatioDemiHrs["ratioVetement"][$i][$j]["ratio"]));
				}
				if($RatioDemiHrs["ratioChaussure"][$i][$j]["ratio"] < 1) {
					if(!HoraireModel::vrfRatioErreur($i,$j,"ratioChaussure"))
					array_push($listRatioErreur, array("ratioChaussure",$i, $j, $RatioDemiHrs["ratioChaussure"][$i][$j]["ratio"]));
				}
			}	
		}

	}

	/*
	* vrfRatioErreur permet de vérifier que le ratio est dans la list des erreur
	* 
	* @param numero de jour
	* @param numero de la demi heure
	* @param poste
	*/
	public static function vrfRatioErreur($jour,$laDemi,$poste) {
		global $listRatioErreur;

		for($i = 0; $i < count($listRatioErreur); $i++) {

			if($jour == $listRatioErreur[$i][1] && $laDemi == $listRatioErreur[$i][2] && $poste == $listRatioErreur[$i][0]) {
				return true;
			}

		}
		return false;
	}


	public static function trouverRatioPlusPetit() {
		global $RatioDemiHrs;
		$leRatio = array(0,0,99,"type");
		
		
		for($i = 0;$i < count($RatioDemiHrs["ratioVetement"]); $i++) {
			
			for($j = 0;$j < count($RatioDemiHrs["ratioVetement"][$i]); $j++) {
				//echo $RatioDemiHrs["ratioCaissier"][$i][$j]["ratio"] . " < " . $leRatio[2] . "<br />";
				if($RatioDemiHrs["ratioCaissier"][$i][$j]["ratio"] < $leRatio[2] && $RatioDemiHrs["ratioCaissier"][$i][$j]["ratio"] > 0) {
					$leRatio = array($i,$j, $RatioDemiHrs["ratioCaissier"][$i][$j]["ratio"], "ratioCaissier");
				}
				if($RatioDemiHrs["ratioChaussure"][$i][$j]["ratio"] < $leRatio[2] && $RatioDemiHrs["ratioChaussure"][$i][$j]["ratio"] > 0) {
					$leRatio = array($i,$j, $RatioDemiHrs["ratioChaussure"][$i][$j]["ratio"], "ratioChaussure");
				}
				if($RatioDemiHrs["ratioVetement"][$i][$j]["ratio"] < $leRatio[2] && $RatioDemiHrs["ratioVetement"][$i][$j]["ratio"] > 0) {
					$leRatio = array($i,$j, $RatioDemiHrs["ratioVetement"][$i][$j]["ratio"], "ratioVetement");
				}
			}	
		}
		return $leRatio;
		
	}

	/*
	* verifierSiRessource verifie si il y a une ressource selon sa journée et sa demi-heure
	* 
	* @param jour est normalement entre 0 et 6
	* @param demi est normalement entre 0 et 23 
	* @return 1 ou 0 où 1 veut dire qu'il y a une ressource existante
	*/
	public static function verifierSiRessource($jour, $demi) {

		global $listRessource, $RatioDemiHrs;
		$ressource = false;
		
		for($k=0; $k < count($listRessource); $k++) {
			$lesHrs = HoraireModel::gestionHrs($listRessource[$k]['heureDebut'],$listRessource[$k]['heureFin']);
			if($listRessource[$k]['jour'] == $jour && HoraireModel::convertionChiffreHeure($demi) >=$lesHrs[0] && HoraireModel::convertionChiffreHeure($demi) < $lesHrs[1] ) {
				$ressource = true;
			}
		}
		
		return  intval($ressource);
		
	}


	/*
	* convertionChiffreHeure transforme par exemple 1 par 9.5 et 2 par 10
	* 
	* @param nombre est normalement entre 0 et 23 
	* @return un nombre qui est entre 9 et 21 avec des demi ex. 9.5
	*/
	public static function convertionChiffreHeure($nombre) {

		$heure= 9;
		for($i = 0; $i < $nombre; $i++) {
			$heure = $heure + 0.5;

		}

		return $heure;
	}


}