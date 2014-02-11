<?php
	class motdepasse_model extends TinyMVC_Model
	{

		function randstring($longeur) {
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		    $randomString = '';
		    for ($i = 0; $i < $longeur; $i++) {
		        $randomString .= $characters[rand(0, strlen($characters) - 1)];
		    }

		    return $randomString;
		}

		function demandeReinit($courriel) {
		    $randomString = sha1($this->randstring(20));
		    $row = $this->db->query_one('Call demandeReinitMdp(?, ?)', array($courriel, $randomString));

			$sujet = "Votre compte – Le Coureur Nordique";
			$message =  "<h3>Réinisialisation</h3>" .
						"<p>Une demande de réinisialisation à été fait pour votre compte.</p>" .
	    				"<p>Si vous voulez réinisialisé votre mot de passe cliquer sur ce lien ou copier coller le dans votre navigateur favori : </p>".
	    				"<a href='".url."/motDePasse/reinitMdp?courriel=".$courriel."&str=".$randomString."'>".url."/motDePasse/reinitMdp?courriel=".$courriel."&str=".$randomString."</a>" .
	    				"<p>Si vous ne voulez pas réinisialisé votre mot de passe, ne faite rien.</p>";

			$headers = "From: \"Le Coureur Nordique\"<noreply@bouchardm.com>\n";
			$headers .= "Reply-To: noreply@bouchardm.com\n";
			$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"";

			if ($row != null) {
				if (mail($courriel,$sujet,$message,$headers)){
					return true;
				}
			}

			return false;
		}

		function bonneDemande($courriel, $str) {
			$row = $this->db->query_one('Call bonneDemandeReinit(?, ?)', array($courriel, $str));

			if ($row != null) {
				return true;
			}

			return false;
		}

		function reinitialisation($courriel, $str, $newMdp) {

			$row = $this->db->query_one('Call reinitMdp(?, ?, ?)', array($courriel, $str, $newMdp));

			if ($row != null) {
				return true;
			}

			return false;
		}
	}
?>