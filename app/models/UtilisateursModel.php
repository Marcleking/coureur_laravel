<?php

class UtilisateursModel extends Eloquent {

	public static function test()
	{
		return 1; 
	}

	public static function afficherUtilisateur($courriel)
	{
		$row = DB::select('Call Utilisateur(?)', [$courriel]);
		return $row[0];
	}

	public static function afficherTelehpone($courriel)
	{
		$rows = DB::select('Call AfficheTelephone(?)', array($courriel));

		$result = null;
		foreach ($rows as $row) {
			$result[] = $row;
		}

		if (!empty($result)) {
			return $result;
		}

	}
	
	public static function modifierUtilisateur($nom, $prenom, $motPasse, $motDePasseAncien, $courriel, $numerocivique, $rue, $ville, $codePostal, $notifHoraire, $notifRemplacement) {

		$row = DB::select('Call ModifierUtilisateur( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', array($courriel, $nom, $prenom, $motPasse, $motDePasseAncien, $numerocivique, $rue, $ville, $codePostal, $notifHoraire, $notifRemplacement));
		return $row;
	}

	public static function modifierUtilisateurAdmin($courriel, $nom, $prenom, $numerocivique, $rue, $ville, $codePostal,  $possesseurCle, $typeEmploye, $priorite, $hrsMin, $hrsMax, $formationVetement, $formationChaussure, $formationCaissier, $respHoraireConflit) {

		$row = DB::select('Call ModifierUtilisateurAdmin( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', array($courriel, $nom, $prenom, $numerocivique, $rue, $ville, $codePostal,  $possesseurCle, $typeEmploye, $priorite, $hrsMin, $hrsMax, $formationVetement, $formationChaussure, $formationCaissier, $respHoraireConflit));
	
			if(count($row) != 0)
				return $row;
			else
				return 'erreur';
	}

	public static function ajoutTelephone($type, $numero, $courriel) {
		
		$row = DB::select('Call AjoutTelephone(?, ?, ?)', array($numero, $type, $courriel));
		return $row;
	}

	public static function supprimerTelephone($courriel) {
		return DB::select('Call SupprimerTelephone(?)', array($courriel));
	}

	public static function afficherUtilisateurs()
	{
		$rows = DB::select('Call Utilisateurs()');

		foreach ($rows as $row) {
			if ($row->courriel != Auth::User()->id) {
				$results[] = $row;
			}
		}
		
		return $results;
	}

	public static function supprimerUtilisateur($courriel) {
		if ($courriel != Auth::User()->id) {
			$row = DB::select('Call SupprimerUtilisateur(?)', array($courriel));

			if($row != null) {
				return true;
			}
		}

		return false;
	}

	public static function ajoutUilisateur($courriel, $typeEmploye, $formationVetement, $formationChaussure, $formationCaissier, $possesseurCle, $respHoraireConflit)
	{
		$row = DB::select('Call AjouterUtilisateur(?, ?, ?, ?, ?, ?, ?)',
			array($courriel, $typeEmploye, $formationVetement, $formationChaussure, $formationCaissier, $possesseurCle, $respHoraireConflit));

		if($row != null) {
			//Envoie du courriel au nouveau membre
			$sujet = "Votre compte – Le Coureur Nordique";
			$message =  "<h3>Félicitation</h3>" .
						"<p>Vous avez maintenant un compte sur le site de gestion du Coureur Nordique</p>" .
	    				"<p>Voici les informations de votre compte : </p>" .
	    				"<p><strong>Nom d'utilisateur</strong> : " . $courriel . "</p>" .
	    				"<p><strong>Mot de passe : </strong>" . $courriel . "</p>";

			$headers = "From: \"Le Coureur Nordique\"<noreply@bouchardm.com>\n";
			$headers .= "Reply-To: noreply@bouchardm.com\n";
			$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"";

			if (mail($courriel,$sujet,$message,$headers)){
				return true;
			}

			return null;
		}
	}
}