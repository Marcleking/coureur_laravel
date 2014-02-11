<?php
class ajoutUtilisateur_Model extends TinyMVC_Model
{
	public function Ajoututilisateur($courriel, $typeEmploye, $formationVetement, $formationChaussure, $formationCaissier, $possesseurCle, $respHoraireConflit)
	{
		$row = $this->db->query_one('Call AjouterUtilisateur(?, ?, ?, ?, ?, ?, ?)',
			array($courriel, $typeEmploye, $formationVetement, $formationChaussure, $formationCaissier, $possesseurCle, $respHoraireConflit));

		if($row != null) {
			$arrayUtil = array (
				"nom"  => $row["nom"],
				"prenom" => $row["prenom"]);

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
				return $arrayUtil;
			}

			return null;
		}
	}
}
