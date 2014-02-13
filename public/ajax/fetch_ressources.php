<?php
	header('Content-Type: application/json');
	
	// Retourne du contenu en format JSON.
	header("Content-type: text/html; charset=utf-8");

	// Force l'expiration immédiate de la page au niveau du navigateur Web; elle n'est pas conservée en cache.
	header("Expires: Thu, 19 Nov 1981 08:52:00 GMT");
	header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
	header("Pragma: no-cache");
	
	if(isset($_POST['type'])){
		$dbHote = "localhost";
		$dbNom = "coureur_nordique";
		$dbUser = "user_coureur";
		$dbPwd = "qweqwe";
		
		try{
			//Options pour la gestion et messages d'erreur.
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		
			//Connexion à la BD.
			$bdd = new PDO("mysql:host=$dbHote;dbname=$dbNom", $dbUser, $dbPwd, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
		}
		catch(PDOException $e){
			echo "Erreur lors de la recherche des groupes.";
		}
		// Load des groupes
		if ($_POST['type'] == "groupes" ){
			try{
				$sql = 'Call getRessourcesMere';
				$prep = $bdd->prepare($sql);
				$prep->execute();
				
				$resultats = $prep->fetchAll();
				$json = array();
				
				foreach($resultats as $groupe){
					$json[] = array("id" => $groupe["idBlocRessource"], "nom" => $groupe["nomBloc"], "description" => $groupe["description"], "actif" => $groupe["used"]);
				}
				
				echo json_encode($json);
			}
			catch(PDOException $e){
				echo "Erreur lors de la recherche des groupes.";
			}
		}
		// Load des bloc
		else if ($_POST['type'] == "blocs" ){
			try{
				$sql = 'Call getRessourcesFromBloc(?)';
				$prep = $bdd->prepare($sql);
				$prep->bindParam(1,$_POST['idGroup']);
				$prep->execute();
				
				$resultats = $prep->fetchAll();
				$json = array();
				
				foreach ($resultats as $bloc){
					$json[] = array("id" => $bloc["id"], "jour" => $bloc["jour"], "heureDebut" => $bloc["heureDebut"], "heureFin" => $bloc["heureFin"], "nbChaussures" => $bloc["nbEmpChaussures"], "nbVetements" => $bloc["nbEmpVetements"], "nbCaisses" => $bloc["nbEmpCaissier"]);
				}
				
				echo json_encode($json);
			}
			catch(PDOException $e){
				echo "Erreur lors de la recherche des blocs";
			}
		}
	}
?>