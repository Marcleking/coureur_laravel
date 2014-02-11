<?php 
	header('Content-Type: application/json');
	include 'user.php';
	session_start();
	
	$date = $_POST['date'];
	$dateDiviser = explode("/", $date);
	
	$dbh = new PDO('mysql:host=localhost;dbname=coureur_nordique', 'user_coureur', 'qweqwe');


	$sql = 'Call dispoChoisie(:cour, :noSem, :annee)';
	$prep = $dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$prep->execute(array(':cour' =>  $_SESSION['user']->getNom() , ':noSem' => $dateDiviser[1], ':annee' => $dateDiviser[0]));
	
	$red = $prep->fetchAll();
	$json = array();
	
	
	foreach($red as $red1)
	{
		$json[] = array("jour" => $red1["jour"], "debut" => $red1["heureDebut"], "fin" => $red1["heureFin"]) ;
	}
	
	echo json_encode($json);
?>