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

	try{
		//Options pour la gestion et messages d'erreur.
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	
		//Connexion à la BD.
		$bdd = new PDO("mysql:host=$dbHote;dbname=$dbNom", $dbUser, $dbPwd, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
		
		//echo $_POST['courriel'];

		// GetSchedulesByUser
		if(isset($_POST['courriel'])){
			$sql = 'Call getSchedulesByUser(?)';
			$req = $bdd->prepare($sql);
			$req->bindParam(1,$_POST['courriel']);
			$req->execute();

			$resultat = $req->fetchAll();
			$json = array();

			foreach ($resultat as $plage) {
				$json[] = array("jour" => $plage["jour"], "type" => $plage["typeTravail"], 
					"debut" => $plage["heureDebut"], "fin" => $plage["heureFin"]);
			}

			echo json_encode($json);
		}
		// GetAllSchedules
		else
		{
			$sql = 'Call getSchedules()';
			$req = $bdd->prepare($sql);
			$req->execute();

			$resultat = $req->fetchAll();
			$json = array();
			$user = "";
			$userNo = -1;
			
			for ($i = 0 ; $i < count($resultat); $i++) {
				if ($user != $resultat[$i]['courriel']){
					
					$user = $resultat[$i]['courriel'];
					$userNo++;
					
					$sql = 'Call Utilisateur(?)';
					$req = $bdd->prepare($sql);
					$req->bindParam(1,$user);
					$req->execute();

					$utilisateur = $req->fetch();

					$json[] = array("courriel" => $resultat[$i]["courriel"],"nom" => $utilisateur['nom'], "prenom" => $utilisateur['prenom']);

				}

				$json[$userNo]["plages"][] = array("jour" => $resultat[$i]["jour"], "type" => $resultat[$i]["typeTravail"], 
					"debut" => $resultat[$i]["heureDebut"], "fin" => $resultat[$i]["heureFin"] );
			}

			echo json_encode($json);
		}

	}
	catch(PDOException $e){
		echo "Erreur lors de la recherche des groupes.";
	}

?>