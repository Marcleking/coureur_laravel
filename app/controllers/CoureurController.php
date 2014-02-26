<?php

class CoureurController extends BaseController {

	public function index() {
		$result = MessagesModel::afficherMessages();
		return View::make('index')->withMessages($result);
	}

	public function document($folder = "") {
		$files = DocumentsModel::getFiles($folder);
		return View::make('document')->withFiles($files);
	}

	public function horaire() {
		return View::make('horaire');
	}

	public function dispo() {
		return View::make('dispo');
	}

	public function ressource() {
		return View::make('ressource');
	}

}

?>