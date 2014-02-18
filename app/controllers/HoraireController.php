<?php

class HoraireController extends BaseController {

	public function genere() {
		$creationHoraire = HoraireModel::creeHoraire();

		if ($creationHoraire == "no.ressource") {
			return Redirect::route('horaire')->withFail("Vous devez ajouter des ressources.");
		} else if (!$creationHoraire) {
			return Redirect::route('horaire')->withFail("Il manque d'employé pour combler toute les resssources. Une horaire à tout de même été généré.");
		}

		return Redirect::route('horaire')->withSuccess("L'horaire à bien été généré.");
	}

	public function notif() {
		HoraireModel::notification();
		return Redirect::route('horaire')->withSuccess("Les notifications on bien été envoyé.");
	}

}