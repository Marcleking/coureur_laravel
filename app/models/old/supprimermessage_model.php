<?php
	class supprimerMessage_model extends TinyMVC_Model
	{
		function SupprimerMessage ($idMessage) {
			$row = $this->db->query_one('Call SupprimerMessage(?)', array($idMessage));

			if($row != null) {
				echo true;
				return true;
			}
    		return false;
		}
	}
?>