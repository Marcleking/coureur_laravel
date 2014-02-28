<?php

class CoureurController extends BaseController {

	public function index() {
		$result = MessagesModel::afficherMessages();
		$info = UtilisateursModel::afficherUtilisateur(Auth::User()->id);

		return View::make('index')->withMessages($result)->withInfo($info);;
	}

	public function document($folder = "") {
		$files = DocumentsModel::getFiles($folder);
		return View::make('document')->withFiles($files)->withLocation($folder);
	}

	public function creeDocument() {
		if (trim(Input::get('name')) == "") {
			return Redirect::back()->withFail("Veuillez entrez un nom de dossier.");
		}

		if (DocumentsModel::createFile(Input::get('name'), Input::get('location'))) {
			return Redirect::back()->withSuccess("Le dossier à bien été créé.");
		} else {
			return Redirect::back()->withFail("Le dossier existe déjà.");
		}
	}

	public function supprimeDocument($location) {
		if (DocumentsModel::deleteFile($location)) {
			return Redirect::back()->withSuccess("Le dossier à bien été supprimer.");
		} else {
			return Redirect::back()->withFail("Le dossier n'existe pas.");
		}
	}

	public function supprimeFichier($location) {
		if (DocumentsModel::deleteFile($location)) {
			return Redirect::back()->withSuccess("Le fichier à bien été supprimer.");
		} else {
			return Redirect::back()->withFail("Le fichier n'existe pas.");
		}
	}

	public function ajoutFichier() {
		if (!Input::hasFile('fichier')) {
			return Redirect::back()->withFail("Vous devez selectionner un fichier.");
		}
		DocumentsModel::addFile(Input::get('location'), Input::file('fichier'));
		return Redirect::back()->withSuccess("Le fichier à bien été ajouté.");
	}

	public function fichier($location) {
		DocumentsModel::downloadFile($location, Auth::User()->id);
		return View::make('document-download')->withDownload($location);
	}

	public function infoFichier($location) {
		$infoDownload = DocumentsModel::getInfoDownloadFile($location);
		return View::make('info-fichier')->withInfo($infoDownload)->withFichier($location);
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