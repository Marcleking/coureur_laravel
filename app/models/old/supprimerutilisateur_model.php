<?php
	class supprimerUtilisateur_model extends TinyMVC_Model
	{
		function supprimerUser($courriel) {
			if ($courriel != $_SESSION['user']->getNom()) {
				$row = $this->db->query_one('Call SupprimerUtilisateur(?)', array($courriel));

				if($row != null) {
    				return true;
    			}
			}

    		return false;
		}
	}
?>