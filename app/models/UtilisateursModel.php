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

	public static function ajoutTelephone($type, $numero) {
		
		$row = DB::select('Call AjoutTelephone(?, ?, ?)', array($numero, $type, Auth::User()->id));
		return $row;
	}

	public static function supprimerTelephone() {
		return DB::select('Call SupprimerTelephone(?)', array(Auth::User()->id));
	}


}