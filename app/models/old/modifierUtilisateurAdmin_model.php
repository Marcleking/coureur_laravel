<?php
	class modifierutilisateuradmin_model extends TinyMVC_Model
	{
		function modifierUnutilisateurAdmin($courriel, $nom, $prenom, $numerocivique, $rue, $ville, $codePostal,  $possesseurCle, $typeEmploye, $priorite, $hrsMin, $hrsMax, $formationVetement, $formationChaussure, $formationCaissier, $respHoraireConflit) {

			$row = $this->db->query_one('Call ModifierUtilisateurAdmin( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', array($courriel, $nom, $prenom, $numerocivique, $rue, $ville, $codePostal,  $possesseurCle, $typeEmploye, $priorite, $hrsMin, $hrsMax, $formationVetement, $formationChaussure, $formationCaissier, $respHoraireConflit));
		
				if(count($row) != 0)
					return $row;
				else
					return 'erreur';
			
			
		}
	}
?>