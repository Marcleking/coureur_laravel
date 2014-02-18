<?php
	header('Content-Type: application/json');
	
	// Retourne du contenu en format JSON.
	header("Content-type: text/html; charset=utf-8");

	// Force l'expiration immédiate de la page au niveau du navigateur Web; elle n'est pas conservée en cache.
	header("Expires: Thu, 19 Nov 1981 08:52:00 GMT");
	header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
	header("Pragma: no-cache");
	
	if (isset($_POST['type'])){
		
		$dbHote = "localhost";
		$dbNom = "coureur_nordique";
		$dbUser = "user_coureur";
		$dbPwd = "qweqwe";
		
		$message = "";
		
		try{
			//Options pour la gestion et messages d'erreur.
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		
			//Connexion à la BD.
			$bdd = new PDO("mysql:host=$dbHote;dbname=$dbNom", $dbUser, $dbPwd, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
			
			if($_POST['type'] == "addGroup"){
			addGroup($bdd);
			}
			else if($_POST['type'] == "modifGroup" ){
				modifGroup($bdd);
			}
			else if($_POST['type'] == "suppGroup" ){
				suppGroup($bdd);
			}
			else if($_POST['type'] == "changeActif"){
				changeActif($bdd);
			}
			else if($_POST['type'] == "ajoutBlocs"){
				ajoutBlocs($bdd);
			}
		}
		catch(PDOException $e){
			echo "Erreur lors de la recherche des groupes.";
		}
	}
	
	function addGroup($bdd){

		if (isset($_POST['nom']) && trim($_POST['nom']) != ""){
			
			if (isset($_POST['description']) && trim($_POST['description']) != ""){
				$nom = $_POST['nom'];
				$desc = $_POST['description'];
				
				$sql = 'Call saveBlocRessource(?,?)';
				$req = $bdd->prepare($sql);
				$req->bindParam(1,$nom);
				$req->bindParam(2,$desc);
				
				$req->execute();
				
				$resultat = $req->fetch();
				
				$json = array('id' => $resultat['idBlocRessource'], 'nom' => $resultat['nomBloc'], 'description' => $resultat['description'], 'actif' => $resultat['used']);
				
				echo json_encode($json);
			}
			else{
				echo json_encode(array("message" => "Un bloc d'horaire doit avoir une description."));
			}
		}
		else{
			echo json_encode(array("message" => "Un bloc d'horaire doit avoir un nom."));
		}
	}
	
	function modifGroup($bdd){

		if (isset($_POST['id'],$_POST['nom']) && trim($_POST['nom']) != ""){
			if(isset($_POST['description']) && trim($_POST['description']) != ""){
				$id = $_POST['id'];
				$nom = $_POST['nom'];
				$desc = $_POST['description'];
				
				$sql = 'Call editBlocRessource(?,?,?)';
				$req = $bdd->prepare($sql);
				$req->bindParam(1,$id);
				$req->bindParam(2,$nom);
				$req->bindParam(3,$desc);
				
				$req->execute();
				
				$resultat = $req->fetch();
				
				$json = array('id' => $resultat['idBlocRessource'], 'nom' => $resultat['nomBloc'], 'description' => $resultat['description'], 'actif' => $resultat['used']);
				
				echo json_encode($json);
			}
			else{
				echo json_encode(array("message" => "Un groupe de ressources doit avoir une description."));
			}
		}
		else{
			echo json_encode(array("message" => "Un groupe de ressources doit avoir un nom."));
		}

	}

	function suppGroup($bdd){
		if(isset($_POST['id'])){
			$id = $_POST['id'];
			$sql = 'Call SupprimeBlocRessource(?)';
			$req = $bdd->prepare($sql);
			$req->bindParam(1,$id);

			$req->execute();

			echo json_encode(array("message" => "Le groupe a été supprimé avec succès."));
		}
		else {
			echo json_encode(array("message" => "Une erreur est survenue."));
		}
	}
	
	function changeActif($bdd){
		if (isset($_POST['noGroupe'])){

			$id = $_POST['noGroupe'];
			
			$sql = 'Call setUsedMere(?)';
			$req = $bdd->prepare($sql);
			$req->bindParam(1,$id);
			
			$req->execute();
		}
		else{
			echo json_encode(array("message" => "Une erreur est survenue."));
		}
	}
	
	function ajoutBlocs($bdd){

		if(isset($_POST['groupId'])){
			if(isset($_POST['lesBlocs'])){
				$id = $_POST['groupId'];
				$sql = 'Call deleteResourcesByGroup(?)';
				$req = $bdd->prepare($sql);
				$req->bindParam(1,$id);
				$req->execute();
				
				foreach($_POST['lesBlocs'] as $bloc){
					$jour = $bloc['jour'];
					$debut = $bloc['heureDebut'];
					$fin = $bloc['heureFin'];
					$chaussures = $bloc['nbChaussures'];
					$vetements = $bloc['nbVetements']; 
					$caissiers = $bloc['nbCaisses'];
					
					$sql = 'Call addRessource(?,?,?,?,?,?,?)';
					$req = $bdd->prepare($sql);
					$req->bindParam(1,$id);
					$req->bindParam(2,$jour);
					$req->bindParam(3,$debut);
					$req->bindParam(4,$fin);
					$req->bindParam(5,$chaussures);
					$req->bindParam(6,$vetements);
					$req->bindParam(7,$caissiers);
					$req->execute();
				}
			}
			else{
				echo json_encode(array("message" => "Il faut ajouter des blocs de ressource pour pouvoir enregistrer des ressources.", "type" => "success"));
			}
		}
		else{
			echo json_encode(array("message" => "Il faut d'abord créer un groupe de ressources pour enregistrer des blocs de ressource.", "type" => "error"));
		}		
	}
	
?>