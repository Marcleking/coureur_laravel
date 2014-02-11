<?php 
	
	class Disponibilites_Model extends TinyMVC_Model{
		/*
		function enregistrerDiponibilitesSemaine($idDispoSemaine, $noDispoSemaine, $annee, $nbHeureSouhaite, $courriel)
		{
			$row = $this->db->query_one('Call ajoutModifDisposSemaine(?,?,?,?,?)',array($idDispoSemaine, $noDispoSemaine, $annee, $nbHeureSouhaite, $courriel));
		}
		
		function enregistreDisponibilitesBloc($idDispoJours, $jour, $heureDebut, $heureFin, $idDispoSemaine){
			$row = $this->db->query_one('Call ajoutModifDispoBloc(?,?,?,?,?)',array($idDispoJours, $jour, $heureDebut, $heureFin, $idDispoSemaine))
		}
		*/
		function AfficherDisponibilites()
		{
			$row = $this->db->query('Call dispoChoisie(noEmp, noSemaine, annee)');
			while($row = $this->db->next())
				$results[] = $row;
			echo json_encode($results);
		}
	}

	
?>