<?php
	class envoyerMessage_model extends TinyMVC_Model
	{
		function AjoutMessage($titre, $message, $courriel){
			$row = $this->db->query_one('Call AjouterMessage(?, ?, ?)',
			array($titre, $message, $courriel));
		}
	}
?>