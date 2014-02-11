<?php

class CoureurController extends BaseController {
	public function index() {
		return View::make('index');
	}

	public function document() {
		return View::make('document');
	}

	public function horaire() {
		return View::make('horaire');
	}

	public function dispo() {
		return View::make('dispo');
	}

	public function gestionCompte() {
		return View::make('gestion.compte');
	}

	public function gestionComptes() {
		return View::make('gestion.comptes');
	}

	public function ressource() {
		return View::make('ressource');
	}

}