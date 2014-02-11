<?php
	class Connexion_Model extends TinyMVC_Model
	{
		function seConnecter($noEmploye, $pwd, $ip) {
			$row = $this->db->query_one('Call Connexion(?, ?, ?, ?)', 
											array($noEmploye, $pwd, $ip, date('Y-m-d')));

    		if($row != null) {
    			$_SESSION['user'] = new User();
		  		$_SESSION['user']->setNom($row["courriel"]);
		  		$_SESSION['user']->setType($row["typeEmploye"]);
    		}
		}
	}
?>