<?php
// _Model extends TinyMVC_Model
	class User
	{
		private $nom;
		private $type;

		function setNom($nom) {
			$this->nom = $nom;
		}

		function setType($type) {
			$this->type = $type;
		}

		function getNom() {
			return $this->nom;
		}

		function getType() {
			return $this->type;
		}
	}
?>