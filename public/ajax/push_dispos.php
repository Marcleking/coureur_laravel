<?php 
	header('Content-Type: application/json');
	
	// Retourne du contenu en format JSON.
	header("Content-type: text/html; charset=utf-8");

	// Force l'expiration immédiate de la page au niveau du navigateur Web; elle n'est pas conservée en cache.
	header("Expires: Thu, 19 Nov 1981 08:52:00 GMT");
	header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
	header("Pragma: no-cache");
	
	$dbHote = "localhost";
	$dbNom = "coureur_nordique";
	$dbUser = "user_coureur";
	$dbPwd = "qweqwe";
	
	$message = "";
	
	if (isset($_POST['horaire']['disponibilites']))
	{
		if (ValiderHeures($_POST['horaire']['disponibilites'], $message))
		{
			
			try{
				
				//Options pour la gestion et messages d'erreur.
				$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			
				//Connexion à la BD.
				$bdd = new PDO("mysql:host=$dbHote;dbname=$dbNom", $dbUser, $dbPwd, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
			}
			catch(PDOException $e){
				echo "Erreur lors de l'envoi des données.";
			}
			
			try{
				// Ajout de l'entrée pour disponibilitesemaine
				$noDispoSemaine = $_POST['horaire']['noSemaine'];
				$annee = $_POST['horaire']['annee'];
				$nbHeureSouhaite = $_POST['nbDesire'];
				$courriel = $_POST['User'];
				
				$req = $bdd->prepare("Call ajoutModifDisposSemaine(?,?,?,?)");
				$req->bindParam(1,$noDispoSemaine);
				$req->bindParam(2,$annee);
				$req->bindParam(3,$nbHeureSouhaite);
				$req->bindParam(4,$courriel);
				
				$req->execute();
				
				// Récupère le no de la semaine
				$valeurAjoute = $req->fetch(PDO::FETCH_NUM);
				
				$idDispoSemaine = $valeurAjoute[0];
				// Ajout des entrées pour chaque disponibilitejour
				
				$disponibilites = $_POST['horaire']['disponibilites'];
				
				for($i = 0; $i < count($disponibilites); $i++){
					
					$jour = $disponibilites[$i]['jour'];
					$heureDebut = $disponibilites[$i]['lowerTime'][0]['hour'] . ":" . $disponibilites[$i]['lowerTime'][0]['minutes'];
					$heureFin = $disponibilites[$i]['upperTime'][0]['hour'] . ":" . $disponibilites[$i]['upperTime'][0]['minutes'];
					
					$req = $bdd->prepare("Call ajoutDispoBloc(?,?,?,?)");
					$req->bindParam(1,$jour);
					$req->bindParam(2,$heureDebut);
					$req->bindParam(3,$heureFin);
					$req->bindParam(4,$idDispoSemaine);
					$req->execute();
				}
				
				// Ajout des semaines copiées
				for ($i = 1; $i <= $_POST['repetition'] && $i <= 52; $i++){
					
					$noSemaine = 0;
					$val_annee = 0;
					
					$req = $bdd->prepare("Call ajoutDisposSemainesCopie(?,?,?)");
					$req->bindParam(1,$idDispoSemaine);
					
					if(($noDispoSemaine + $i) <= 52){
						$noSemaine = $noDispoSemaine + $i;
						$val_annee = $annee;
					}
					else {
						$noSemaine = $i;
						$val_annee = $annee + 1;
					}
					
					$req->bindParam(2,$noSemaine);
					$req->bindParam(3,$val_annee);
					
					$req->execute();
				}
				
				echo "Disponibilités ajoutées avec succès!";
				
			}
			catch(PDOException $e){
				echo "Erreur lors de l'envoi des données.";
			}
		}
		else
		{
			echo $message;
		}
	}
	else
	{
		echo "vide";
	}
		
	function ValiderHeures($disponibilites, &$message){
		
		$valid = true;
		$totalTimelapse = 0;
		$i = 0;
		
		while($i < count($disponibilites) && $valid){
			
			$timelapse = $disponibilites[$i]['upperTime'][0]['hour'] - $disponibilites[$i]['lowerTime'][0]['hour'];
			
			$minutes = $disponibilites[$i]['upperTime'][0]['minutes'] - $disponibilites[$i]['lowerTime'][0]['minutes'];
			
			if ($minutes > 0){
				$timelapse += 0.5;
			}
			else if ($minutes < 0)
			{
				$timelapse -= 0.5;
			}
			
			if ($timelapse < 3 )
			{
				$valid = false;
				$message = "Les périodes de disponibilités doivent avoir une durée minimale de trois heures.";
			}
			
			$totalTimelapse = $totalTimelapse + $timelapse;
			
			$i++;
		}
		
		$different = false;
		for($j = 0; $j < count($disponibilites); $j++) {
			if($j == 0) {
				$jour = $disponibilites[$j]['jour'];
			}
			
			if($j != 0 && $jour != $disponibilites[$j]['jour']) 
				$different = true;
			
		}
		
		if($valid){
		
			if($different == false) {
				$valid = false;
				$message = "Les disponibilités doivent être placées sur au moins deux jours.";
			}
			elseif($totalTimelapse < 10){
				$valid = false;
				$message = "Le total des disponibilités doit faire au moins dix heures.";
			}
		}
				
		return $valid;
	}
?>