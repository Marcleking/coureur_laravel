<?php
	date_default_timezone_set('America/Montreal');
	
	

	//Numero de la semaine que nous sommes pr�sentement
	$semaine = intval(date("W"));
	$annee = intval(date("Y"));

	//Connexion a la BD(� changer de place)
	$connBD = new PDO('mysql:host=localhost;dbname=coureur_nordique', 'user_coureur', 'qweqwe');

	//Information sur un Utilisateurs
	$sql = 'Call Utilisateurs()';
	$prep = $connBD->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$prep->execute();

	//Array des utilisateurs
	$listUtilisateur = $prep->fetchAll();


	//Information sur les disponibilit�s d'une semaine selon le crit�re
	$sql = 'Call listeDispoSemaine(:semaine, :annee)';
	$prep = $connBD->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$prep->execute(array(':semaine' =>  $semaine, ':annee' =>  $annee  ));
	
	//Array des dispoSemaines selectionn�s
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

		$mail = $listUtilisateur[$i]['courriel']; // D�claration de l'adresse de destination.
		if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
		{
			$passage_ligne = "\r\n";
		}
		else
		{
			$passage_ligne = "\n";
		}
		//=====D�claration des messages au format texte et au format HTML.
		$message_txt = "Salut � tous, voici un e-mail envoy� par un script PHP.";
		$message_html = "<html><head></head><body><b>Bonjour � tous</b>, voici un e-mail pour vous informer que vous n'avez pas rentr� vos disponibilit�s. Il vous reste 48 heures. <br /> <br /> Merci et bonne soir�e.</body></html>";
		//==========
		 
		//=====Cr�ation de la boundary
		$boundary = "-----=".md5(rand());
		//==========
		 
		//=====D�finition du sujet.
		$sujet = "Hey mon ami !";
		//=========
		 
		//=====Cr�ation du header de l'e-mail.
		$header = "From: \"WeaponsB\"<lecoureurnordique@mail.fr>".$passage_ligne;
		$header.= "Reply-to: \"WeaponsB\" <lecoureurnordique@mail.fr>".$passage_ligne;
		$header.= "MIME-Version: 1.0".$passage_ligne;
		$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
		//==========
		 
		//=====Cr�ation du message.
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
?>