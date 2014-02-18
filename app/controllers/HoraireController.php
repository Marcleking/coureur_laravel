<?php

class HoraireController extends BaseController {

	public function genere() {
		$creationHoraire = HoraireModel::creeHoraire();

		if ($creationHoraire) {
			return Redirect::route('horaire')->withSuccess("L'horaire à bien été généré.");
		} else if ($creationHoraire == "no.ressource") {
			return Redirect::route('horaire')->withFail("Vous devez ajouter des ressources.");
		}
		return Redirect::route('horaire')->withFail("Il manque d'employé pour combler toute les resssources. Une horaire à tout de même été généré.");
	}

	public function notif() {
		HoraireModel::notification();
		return Redirect::route('horaire')->withSuccess("Les notifications on bien été envoyé.");
	}

}