<?php
	header('Content-Type: application/json');
	include 'user.php';
	session_start();
	
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
		}
		catch(PDOException $e){
			echo "Erreur lors de la recherche des groupes.";
		}
		
		if($_POST['type'] == "addGroup"){
			addGroup($bdd);
		}
		else if($_POST['type'] == "modifGroup" ){
			modifGroup($bdd);
		}
		else if($_POST['type'] == "changeActif"){
			changeActif($bdd);
		}
		else if($_POST['type'] == "ajoutBlocs"){
			ajoutBlocs($bdd);
		}
	}
	
	function addGroup($bdd){
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
	
	function modifGroup($bdd){
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
	
	function changeActif($bdd){
		$id = $_POST['noGroupe'];
		
		$sql = 'Call setUsedMere(?)';
		$req = $bdd->prepare($sql);
		$req->bindParam(1,$id);
		
		$req->execute();
	}
	
	function ajoutBlocs($bdd){
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
	
?>