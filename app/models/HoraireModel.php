<?php

class HoraireModel extends Eloquent {

	public static function creeHoraire()
	{

		//Liste des disponibilités qui reste à combler
		$listUtilhoraire = HoraireModel::lstUtilHoraire();

		//Liste des ressources qui reste à combler
		$listRessource = Horairemodel::lstRessource();

		//dd($listRessource);

		//Tri de la liste des dispos selon l'indice de priorité de l'employé
		$listUtilhoraire = array_values(array_sort($listUtilhoraire, function($value)
		{
			if ($value['indPriorite'] == 0)
				return 0;

		    return 1/$value['indPriorite'];
		}));

		$cleDebut = false;
		$cleFin = false;


		//Création de l'array de l'horaire
        $horaire = [];
        //Parcours de toute les ressources
        if (!isset($listRessource))
        	return "no.ressource";


       

        // On sépare les blocks en demie heures
        $listRessourceDiviser = [];
        foreach ($listRessource as $ressource) {
        	// dd($ressource);

        	// 12 heure dans une journée
        	$heureDebut = (int)explode(':', $ressource['heureDebut'])[0];
        	$minuteDebut = (int)explode(':', $ressource['heureDebut'])[1];
        	
        	$heureFin = (int)explode(':', $ressource['heureFin'])[0];
        	$minuteFin = (int)explode(':', $ressource['heureFin'])[1];

        	if ($minuteFin == 30) {
        		$heureDebut++;
        	}

        	for ($i = $heureDebut; $i < $heureFin; $i++) {

        		$heure = $i;
        		if ($i < 10) {
        			$heure = "0"+$i;
        		}

        		$heureUn = $i+1;
        		if ($i+1 < 10) {
        			$heureUn = "0"+($i+1);
        		}

        		if ($minuteDebut == 30) {
        			$info = [
	    				'heureDebut' => $heure.':30:00',
	    				'heureFin' => $heureUn.':00:00',
	    				'id' => $ressource['id'],
	    				'noBlocRessource' => $ressource['noBlocRessource'],
	    				'jour' => $ressource['jour'],
	    				'nbEmpChaussures' => $ressource['nbEmpChaussures'],
	    				'employeDisponibleChaussure' => 0,
	    				'nbEmpVetements' => $ressource['nbEmpVetements'],
	    				'employeDisponibleVetement' => 0,
	    				'nbEmpCaissier' => $ressource['nbEmpCaissier'],
	    				'employeDisponibleCaissier' => 0,
	    				'heureMin' => $ressource['heureDebut'],
	    				'heureMax' => $ressource['heureFin'],
	    				'cleOuverture' => 0,
	    				'cleFermeture' => 0,
	    			];

	    			$listRessourceDiviser[] = $info;

	    			$info = [
	    				'heureDebut' => $heureUn.':00:00',
	    				'heureFin' => $heureUn.':30:00',
	    				'id' => $ressource['id'],
	    				'noBlocRessource' => $ressource['noBlocRessource'],
	    				'jour' => $ressource['jour'],
	    				'nbEmpChaussures' => $ressource['nbEmpChaussures'],
	    				'employeDisponibleChaussure' => 0,
	    				'nbEmpVetements' => $ressource['nbEmpVetements'],
	    				'employeDisponibleVetement' => 0,
	    				'nbEmpCaissier' => $ressource['nbEmpCaissier'],
	    				'employeDisponibleCaissier' => 0,
	    				'heureMin' => $ressource['heureDebut'],
	    				'heureMax' => $ressource['heureFin'],
	    				'cleOuverture' => 0,
	    				'cleFermeture' => 0,
	    			];

	    			if ($i+1 < $heureFin || $minuteFin == 30)
	    				$listRessourceDiviser[] = $info;
        		} else {
        			$info = [
	    				'heureDebut' => $heureUn.':00:00',
	    				'heureFin' => $heureUn.':30:00',
	    				'id' => $ressource['id'],
	    				'noBlocRessource' => $ressource['noBlocRessource'],
	    				'jour' => $ressource['jour'],
	    				'nbEmpChaussures' => $ressource['nbEmpChaussures'],
	    				'employeDisponibleChaussure' => 0,
	    				'nbEmpVetements' => $ressource['nbEmpVetements'],
	    				'employeDisponibleVetement' => 0,
	    				'nbEmpCaissier' => $ressource['nbEmpCaissier'],
	    				'employeDisponibleCaissier' => 0,
	    				'heureMin' => $ressource['heureDebut'],
	    				'heureMax' => $ressource['heureFin'],
	    				'cleOuverture' => 0,
	    				'cleFermeture' => 0,
	    			];

	    			$listRessourceDiviser[] = $info;

	    			$info = [
	    				'heureDebut' => $heureUn.':30:00',
	    				'heureFin' => $heureUn.':00:00',
	    				'id' => $ressource['id'],
	    				'noBlocRessource' => $ressource['noBlocRessource'],
	    				'jour' => $ressource['jour'],
	    				'nbEmpChaussures' => $ressource['nbEmpChaussures'],
	    				'employeDisponibleChaussure' => 0,
	    				'nbEmpVetements' => $ressource['nbEmpVetements'],
	    				'employeDisponibleVetement' => 0,
	    				'nbEmpCaissier' => $ressource['nbEmpCaissier'],
	    				'employeDisponibleCaissier' => 0,
	    				'heureMin' => $ressource['heureDebut'],
	    				'heureMax' => $ressource['heureFin'],
	    				'cleOuverture' => 0,
	    				'cleFermeture' => 0,
	    			];

	    			$listRessourceDiviser[] = $info;
        		}
        	}
        }



 		// dd($listRessourceDiviser);
 		// On reparcours la liste des ressources pour trouvé les employés disponibles

        // On parcours toute les ressources
        foreach ($listRessourceDiviser as &$ressource) {
	        
	        $heureDebut = (int)explode(':', $ressource['heureDebut'])[0];
			$minuteDebut = (int)explode(':', $ressource['heureDebut'])[1];

			$heureFin = (int)explode(':', $ressource['heureFin'])[0];
			$minuteFin = (int)explode(':', $ressource['heureFin'])[1];

        	// On parcours tout les employés
        	foreach ($listUtilhoraire as $employe) {
        		
        		
        		// On vérifie si la personne à la formation (chaussure)
        		if ((int)$ressource['nbEmpChaussures'] > 0 && $employe['formationChaussure'] == "1") {

        			// On verifie si la personne peut à ce moment

        			$disponible = false;
        			foreach ($employe['listeDispoSemaine'] as $dispoEmploye) {
        				// On vérifie si l'employé est disponible pour cette journée
        				if (HoraireModel::idEgualJour($ressource['jour'], $dispoEmploye['jour'])) {
        					// On vérifie si l'employé est dispo avant ou en même temps que le début de la ressource

        					$heureDebutEmploye = (int)explode(':', $dispoEmploye['heureDebut'])[0];
		        			$minuteDebutEmploye = (int)explode(':', $dispoEmploye['heureDebut'])[1];

		        			$heureFinEmploye = (int)explode(':', $dispoEmploye['heureFin'])[0];
		        			$minuteFinEmploye = (int)explode(':', $dispoEmploye['heureFin'])[1];

		        			if (
		        				$heureDebutEmploye + $minuteDebutEmploye / 60 <= $heureDebut + $minuteDebut / 60 && 
		        				$heureFinEmploye + $minuteFinEmploye / 60 >= $heureFin + $minuteFin / 60
		        			) {
		        				$disponible = true;
		        			}

        					

        				}
        			}
        			// Si l'employé est disponible pour les chaussures on l'ajoute dans la liste des employés
        			// disponible pour faire les chaussures à ce moment
        			if ($disponible) {
        				$ressource['employeDisponibleChaussure']++;
        			}

        		}

        		// On vérifie si la personne à la formation (chaussure)
        		if ((int)$ressource['nbEmpVetements'] > 0 && $employe['formationVetement'] == "1") {

        			// On verifie si la personne peut à ce moment
        			
        			$disponible = false;
        			foreach ($employe['listeDispoSemaine'] as $dispoEmploye) {
        				// On vérifie si l'employé est disponible pour cette journée
        				if (HoraireModel::idEgualJour($ressource['jour'], $dispoEmploye['jour'])) {
        					// On vérifie si l'employé est dispo avant ou en même temps que le début de la ressource

        					$heureDebutEmploye = (int)explode(':', $dispoEmploye['heureDebut'])[0];
		        			$minuteDebutEmploye = (int)explode(':', $dispoEmploye['heureDebut'])[1];

		        			$heureFinEmploye = (int)explode(':', $dispoEmploye['heureFin'])[0];
		        			$minuteFinEmploye = (int)explode(':', $dispoEmploye['heureFin'])[1];

		        			if (
		        				$heureDebutEmploye + $minuteDebutEmploye / 60 <= $heureDebut + $minuteDebut / 60 && 
		        				$heureFinEmploye + $minuteFinEmploye / 60 >= $heureFin + $minuteFin / 60
		        			) {
		        				$disponible = true;
		        			}

        				}
        			}
        			// Si l'employé est disponible pour les chaussures on l'ajoute dans la liste des employés
        			// disponible pour faire les chaussures à ce moment
        			if ($disponible) {
        				$ressource['employeDisponibleVetement']++;
        			}

        		}

        		// On vérifie si la personne à la formation (chaussure)
        		if ((int)$ressource['nbEmpCaissier'] > 0 && $employe['formationCaissier'] == "1") {

        			// On verifie si la personne peut à ce moment

        			$disponible = false;
        			foreach ($employe['listeDispoSemaine'] as $dispoEmploye) {
        				// On vérifie si l'employé est disponible pour cette journée
        				if (HoraireModel::idEgualJour($ressource['jour'], $dispoEmploye['jour'])) {
        					// On vérifie si l'employé est dispo avant ou en même temps que le début de la ressource

        					$heureDebutEmploye = (int)explode(':', $dispoEmploye['heureDebut'])[0];
		        			$minuteDebutEmploye = (int)explode(':', $dispoEmploye['heureDebut'])[1];

		        			$heureFinEmploye = (int)explode(':', $dispoEmploye['heureFin'])[0];
		        			$minuteFinEmploye = (int)explode(':', $dispoEmploye['heureFin'])[1];

		        			if (
		        				$heureDebutEmploye + $minuteDebutEmploye / 60 <= $heureDebut + $minuteDebut / 60 && 
		        				$heureFinEmploye + $minuteFinEmploye / 60 >= $heureFin + $minuteFin / 60
		        			) {
		        				$disponible = true;
		        			}
        				}
        			}
        			// Si l'employé est disponible pour les chaussures on l'ajoute dans la liste des employés
        			// disponible pour faire les chaussures à ce moment
        			if ($disponible) {
        				$ressource['employeDisponibleCaissier']++;
        			}

        		}

        	}
        }

        

        // On trie la liste des ressources selon celle qui doive être completé en premier


        $listRessourceDiviser = array_values(array_sort($listRessourceDiviser, function($value)
		{
			$ratioChaussure = $value['employeDisponibleChaussure'] / (int)$value['nbEmpChaussures'];
			$ratioVetement = $value['employeDisponibleVetement'] / (int)$value['nbEmpVetements'];
			$ratioCaissier = $value['employeDisponibleCaissier'] / (int)$value['nbEmpCaissier'];

			$ratioMin = -9999;
			if ($ratioChaussure > $ratioMin) {
				$ratioMin = $ratioChaussure;
			}

			if ($ratioVetement > $ratioMin) {
				$ratioMin = $ratioVetement;
			}

			if ($ratioCaissier > $ratioMin) {
				$ratioMin = $ratioCaissier;
			}

			return $ratioMin;

		}));



		// dd($listRessourceDiviser);

		// Maintenant on parcours toute les ressources et on les assignes à des employés
		foreach ($listRessourceDiviser as &$ressource) {
			
			// On parcours tout les employés
			
			foreach ($listUtilhoraire as &$employe) {

				// var_dump($ressource);
				// dd($employe);

				if ($ressource['nbEmpChaussures'] == 0) {
					$ratio = 1000;
				} else {
					$ratio = $ressource['employeDisponibleChaussure'] / $ressource['nbEmpChaussures'];
				}
				$ratioEmploye = [];

				$ratioEmploye[] = [
					'nbEmpLabel' => 'nbEmpChaussures',
					'formation' => 'formationChaussure',
					'ratio' => $ratio,
					'typeTravail' => 'Chaussure',
				];

				if ($ressource['nbEmpVetements'] == 0) {
					$ratio = 1000;
				} else {
					$ratio = $ressource['employeDisponibleChaussure'] / $ressource['nbEmpVetements'];
				}

				$ratioEmploye[] = [
					'nbEmpLabel' => 'nbEmpVetements',
					'formation' => 'formationVetement',
					'ratio' => $ratio,
					'typeTravail' => 'Vetement',
				];

				if ($ressource['nbEmpCaissier'] == 0) {
					$ratio = 1000;
				} else {
					$ratio = $ressource['employeDisponibleChaussure'] / $ressource['nbEmpCaissier'];
				}

				$ratioEmploye[] = [
					'nbEmpLabel' => 'nbEmpCaissier',
					'formation' => 'formationCaissier',
					'ratio' => $ratio,
					'typeTravail' => 'Caissier',
				];

				// dd($ressource);

				// on fait la ressource avec le ratio le plus bas en premier
				$ratioEmploye = array_values(array_sort($ratioEmploye, function($value)
				{
					return $value['ratio'];
				}));

				
				foreach ($ratioEmploye as $unType) {

					// Si l'employé peut faire la ressource de chaussure
					if ((int)$ressource[$unType['nbEmpLabel']] > 0 && $employe[$unType['formation']] == "1") {
						// on lui assigne tout de suite
						

						// On parcours les horaires pour voir s'il faut agrandir un horaire déjà existant
						
						
						// On lui retire sa dispo

						foreach ($employe['listeDispoSemaine'] as &$dispo) {
							

							if (HoraireModel::idEgualJour($ressource['jour'], $dispo['jour'])) {
								
								// Si c'est une dispo valable
								$heureDebut = (int)explode(':', $ressource['heureDebut'])[0];
								$minuteDebut = (int)explode(':', $ressource['heureDebut'])[1];

								$heureFin = (int)explode(':', $ressource['heureFin'])[0];
								$minuteFin = (int)explode(':', $ressource['heureFin'])[1];

								$heureDebutEmploye = (int)explode(':', $dispo['heureDebut'])[0];
			        			$minuteDebutEmploye = (int)explode(':', $dispo['heureDebut'])[1];

			        			$heureFinEmploye = (int)explode(':', $dispo['heureFin'])[0];
			        			$minuteFinEmploye = (int)explode(':', $dispo['heureFin'])[1];

			        			if (
			        				$heureDebutEmploye + $minuteDebutEmploye / 60 <= $heureDebut + $minuteDebut / 60 && 
			        				$heureFinEmploye + $minuteFinEmploye / 60 >= $heureFin + $minuteFin / 60
			        			) {
			        				//var_dump($ressource);
									//var_dump($employe['listeDispoSemaine']);

									// On modifie le chiffre
									$avant = [
										'idDispoJours' => $dispo['idDispoJours'],
										'jour' => $dispo['jour'],
										'idDispoSemaine' => $dispo['idDispoSemaine'],
										'heureDebut' => $dispo['heureDebut'],
										'heureFin' => $ressource['heureDebut'],
									];

									$apres = [
										'idDispoJours' => $dispo['idDispoJours'],
										'jour' => $dispo['jour'],
										'idDispoSemaine' => $dispo['idDispoSemaine'],
										'heureDebut' => $ressource['heureFin'],
										'heureFin' => $dispo['heureFin'],
									];


									$dispo = $avant;
									
									array_push($employe['listeDispoSemaine'], $apres);

									$ressource[$unType['nbEmpLabel']] = (int)$ressource[$unType['nbEmpLabel']]-1;
									$valCritique = true;

									array_push($horaire, array(
										'courriel' => $employe['courriel'],
										'typeTravail' => $unType['typeTravail'],
										'jour' => $ressource['jour'],
										'heureDebut' => $ressource['heureDebut'],
										'heureFin' => $ressource['heureFin']
									));
			        			}

							}
						}


					}
				}
				
				
				
			}

			
		}
		// var_dump("SDDF");
		// dd($horaire);
		$horaireTempo = $horaire;
		$amelioration = true;
		while ($amelioration) {
			$amelioration = false;
			foreach ($horaireTempo as $keyTempo => &$momentTempo) {
				foreach ($horaire as $key => $moment) {
					// Si on trouve un moment avant on modifie le tempo
					if ($momentTempo['courriel'] == $moment['courriel'] && $momentTempo['typeTravail'] == 'Chaussure' && $momentTempo['jour'] == $moment['jour']) {
						

						if ($momentTempo['heureDebut'] == $moment['heureFin']) {

							$momentTempo['heureDebut'] = $moment['heureDebut'];
							
							unset($horaireTempo[$key]);
							unset($horaire[$key]);
							$amelioration = true;

						} else if ($momentTempo['heureFin'] == $moment['heureDebut']) {
							$momentTempo['heureFin'] = $moment['heureFin'];
							unset($horaireTempo[$key]);
							unset($horaire[$key]);
							$amelioration = true;

						}
					}

					// Si on trouve un moment avant on modifie le tempo
					if ($momentTempo['courriel'] == $moment['courriel'] && $momentTempo['typeTravail'] == 'Vetement' && $momentTempo['jour'] == $moment['jour']) {
												
						if ($momentTempo['heureDebut'] == $moment['heureFin']) {

							$momentTempo['heureDebut'] = $moment['heureDebut'];
							
							unset($horaireTempo[$key]);
							unset($horaire[$key]);
							$amelioration = true;

						} else if ($momentTempo['heureFin'] == $moment['heureDebut']) {
							$momentTempo['heureFin'] = $moment['heureFin'];
							unset($horaireTempo[$key]);
							unset($horaire[$key]);
							$amelioration = true;

						}
					}

					// Si on trouve un moment avant on modifie le tempo
					if ($momentTempo['courriel'] == $moment['courriel'] && $momentTempo['typeTravail'] == 'Caissier' && $momentTempo['jour'] == $moment['jour']) {
												
						if ($momentTempo['heureDebut'] == $moment['heureFin']) {

							$momentTempo['heureDebut'] = $moment['heureDebut'];
							
							unset($horaireTempo[$key]);
							unset($horaire[$key]);
							$amelioration = true;

						} else if ($momentTempo['heureFin'] == $moment['heureDebut']) {
							$momentTempo['heureFin'] = $moment['heureFin'];
							unset($horaireTempo[$key]);
							unset($horaire[$key]);
							$amelioration = true;

						}
					}


				}
			}
		
			$horaire = $horaireTempo;
		}



		// on fusionne si ya juste 30 min entre
		$horaireTempo = $horaire;
		$amelioration = true;
		while ($amelioration) {
			$amelioration = false;
			foreach ($horaireTempo as $keyTempo => &$momentTempo) {
				foreach ($horaire as $key => $moment) {
					// Si on trouve un moment avant on modifie le tempo
					if ($momentTempo['courriel'] == $moment['courriel'] && $momentTempo['typeTravail'] == 'Chaussure' && $momentTempo['jour'] == $moment['jour']) {
						

						if (explode(':', $momentTempo['heureDebut'])[0] == explode(':', $moment['heureFin'])[1]) {

							$momentTempo['heureDebut'] = $moment['heureDebut'];
							
							unset($horaireTempo[$key]);
							unset($horaire[$key]);
							$amelioration = true;

						} else if (explode(':', $momentTempo['heureFin'])[0] == explode(':', $moment['heureDebut'])[0]) {
							$momentTempo['heureFin'] = $moment['heureFin'];
							unset($horaireTempo[$key]);
							unset($horaire[$key]);
							$amelioration = true;

						}
					}

					// Si on trouve un moment avant on modifie le tempo
					if ($momentTempo['courriel'] == $moment['courriel'] && $momentTempo['typeTravail'] == 'Vetement' && $momentTempo['jour'] == $moment['jour']) {
												
						if (explode(':', $momentTempo['heureDebut'])[0] == explode(':', $moment['heureFin'])[1]) {

							$momentTempo['heureDebut'] = $moment['heureDebut'];
							
							unset($horaireTempo[$key]);
							unset($horaire[$key]);
							$amelioration = true;

						} else if (explode(':', $momentTempo['heureFin'])[0] == explode(':', $moment['heureDebut'])[0]) {
							$momentTempo['heureFin'] = $moment['heureFin'];
							unset($horaireTempo[$key]);
							unset($horaire[$key]);
							$amelioration = true;

						}
					}

					// Si on trouve un moment avant on modifie le tempo
					if ($momentTempo['courriel'] == $moment['courriel'] && $momentTempo['typeTravail'] == 'Caissier' && $momentTempo['jour'] == $moment['jour']) {
							
						

						if (explode(':', $momentTempo['heureDebut'])[0] == explode(':', $moment['heureFin'])[1]) {

							$momentTempo['heureDebut'] = $moment['heureDebut'];
							
							unset($horaireTempo[$key]);
							unset($horaire[$key]);
							$amelioration = true;

						} else if (explode(':', $momentTempo['heureFin'])[0] == explode(':', $moment['heureDebut'])[0]) {
							$momentTempo['heureFin'] = $moment['heureFin'];
							unset($horaireTempo[$key]);
							unset($horaire[$key]);
							$amelioration = true;

						}
					}


				}
			}
		
			$horaire = $horaireTempo;
		}


		// On clean les moments de moins de 3 heure
		foreach ($horaire as $key => $moment) {
			$heureDebut = (int)explode(':', $moment['heureDebut'])[0];
			$minuteDebut = (int)explode(':', $moment['heureDebut'])[1];

			$heureFin = (int)explode(':', $moment['heureFin'])[0];
			$minuteFin = (int)explode(':', $moment['heureFin'])[1];

			if ($heureDebut + 3 + $minuteDebut / 60 > $heureFin + $minuteFin / 60) {
				unset($horaire[$key]);
			}
		}

		//var_dump($horaire);
		HoraireModel::ajoutHoraireDansBd($horaire);
		
		$erreur = false;
		 //Parcours de toute les ressources
		foreach ($listRessource as $ressource) {
			foreach ($ressource['typeEmp'] as $typeEmp) {
				if ($typeEmp[array_keys($typeEmp)[0]] > 0) {
					$erreur = true;
				}
			}
		}

		if ($erreur) {
			return false;
			//Envoie d'un courriel à l'approbateur, il manque du monde O_O
			
		} else {
			//Envoie d'un courriel à l'approbateur sa bien marcher
			
			
			//Envoie d'un courriel à toute les employés abonnée au notif: sa la marcher
		}

		return true;
	}

	public static function notification () {
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
		
		
		for($i = 0;$i < count($listUtilisateur); $i++) {
			$siDispo = false;
			for($j = 0;$j < count($listeDispoSemaine); $j++) {
				
				if($listUtilisateur[$i]['courriel'] == $listeDispoSemaine[$j]['courriel']) {
					$siDispo = true;
				}
		
			}
			
			if($siDispo == false) {

			//var_dump($siDispo);
			
		
			
			// $header = "From: \"WeaponsB\"<". .">".$passage_ligne;
			// $header .= "Reply-to: \"WeaponsB\" <". .">".$passage_ligne;
			// $header .= "MIME-Version: 1.0".$passage_ligne;
			// $header .= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

			$mail = $listUtilisateur[$i]['courriel']; // Déclaration de l'adresse de destination.
			if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
			{
				$passage_ligne = "\r\n";
			}
			else
			{
				$passage_ligne = "\n";
			}
			//=====Déclaration des messages au format texte et au format HTML.
			$message_txt = "Bonjour à tous, voici un e-mail pour vous informer que vous n'avez pas rentré vos disponibilités. Il vous reste 48 heures.";
			$message_html = "<html><head></head><body><b>Bonjour à tous</b>, voici un e-mail pour vous informer que vous n'avez pas rentré vos disponibilités. Il vous reste 48 heures. <br /> <br /> Merci et bonne soirée.</body></html>";
			//==========
			 
			//=====Création de la boundary
			$boundary = "-----=".md5(rand());
			//==========
			 
			//=====Définition du sujet.
			$sujet = "Vos disponibilités ne sont pas présente !";
			//=========
			 
			//=====Création du header de l'e-mail.
			$header = "From: \"Coureur Nordique\"<lecoureurnordique@mail.fr>".$passage_ligne;
			$header.= "Reply-to: \"Coureur Nordique\" <lecoureurnordique@mail.fr>".$passage_ligne;
			$header.= "MIME-Version: 1.0".$passage_ligne;
			$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
			//==========
			 
			//=====Création du message.
			$message = $passage_ligne."--".$boundary.$passage_ligne;
			//=====Ajout du message au format texte.
			$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
			$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
			$message.= $passage_ligne.$message_txt.$passage_ligne;
			//==========
			$message.= $passage_ligne."--".$boundary.$passage_ligne;
			//=====Ajout du message au format HTML
			$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
			$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
			$message.= $passage_ligne.$message_html.$passage_ligne;
			//==========
			$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
			$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
			//==========
			 
			//=====Envoi de l'e-mail.
			mail($mail,$sujet,$message,$header);
			//==========
			}
		}
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
		if ($typeRessource == "chaussure" && $employe['formationChaussure'] == "1") {
			return true;
		}
		elseif ($typeRessource  == "caissier" && $employe['formationCaissier'] == "1") {
			return true;
		}
		elseif ($typeRessource  == "vetement" && $employe['formationVetement'] == "1") {
			return true;
		}
		else {
			return false;
		}
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
		$listeRessource = null;
		try {
			$prep->execute(array(':id' => $getUsedMere[0]['idBlocRessource']));
			$listeRessource = $prep->fetchAll(PDO::FETCH_ASSOC);

			foreach ($listeRessource as &$ressource) {
				for ($i=0; $i < $ressource['nbEmpChaussures']; $i++) { 
					$ressource['typeEmp']['chaussure'][] = ['heureDebut' => $ressource['heureDebut'], 'heureFin' => $ressource['heureFin']];
				}

				for ($i=0; $i < $ressource['nbEmpVetements']; $i++) { 
					$ressource['typeEmp']['vetement'][] = ['heureDebut' => $ressource['heureDebut'], 'heureFin' => $ressource['heureFin']];
				}

				for ($i=0; $i < $ressource['nbEmpCaissier']; $i++) { 
					$ressource['typeEmp']['caissier'][] = ['heureDebut' => $ressource['heureDebut'], 'heureFin' => $ressource['heureFin']];
				}
			}
		} catch (Exception $e) {}

		
		

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
