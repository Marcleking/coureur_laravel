<?php

class affichageUtilisateurs_model extends TinyMVC_Model
{
	public function AfficherUtilisateurs()
	{
		$row = $this->db->query('Call Utilisateurs()');

		while ($row = $this->db->next()) {
			if ($row["courriel"] != $_SESSION['user']->getNom()) {
				$results[] = $row;
			}
		}

		return $results;
	}
}
