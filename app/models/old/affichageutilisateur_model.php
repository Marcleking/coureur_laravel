<?php
class affichageutilisateur_model extends TinyMVC_Model
{
	public function afficherutilisateur($courriel)
	{
		$row = $this->db->query_one('Call Utilisateur(?)', array($courriel));
		return $row;
	}

	public function affichertelehpone($courriel)
	{
		$row = $this->db->query('Call AfficheTelephone(?)', array($courriel));

		$result = null;
		while ($row = $this->db->next()) {
			$result[] = $row;
		}

		if (!empty($result)) {
			return $result;
		}

	}
}
