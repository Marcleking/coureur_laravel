<?php

class HoraireController extends BaseController {

	public function genere() {
		if (HoraireModel::creeHoraire()) {
			return Redirect::route('horaire')->withSuccess("L'horaire à bien été généré.");
		}
		return Redirect::route('horaire')->withFail("Il manque d'employé pour combler toute les resssources. Une horaire à tout de même été généré.");
	}

	public function notif() {
		HoraireModel::notification();
		return Redirect::route('horaire')->withSuccess("Les notifications on bien été envoyé.");
	}

}