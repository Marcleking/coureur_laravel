<?php

class MessagesModel extends Eloquent {

	public static function afficherMessages()
	{
		return DB::table('message')->paginate(10);
	}

	public static function envoieMessage($titre, $message, $courriel){
		return DB::select('Call AjouterMessage(?, ?, ?)',
			array($titre, $message, $courriel));
	}

	public static function supprimerMessage ($idMessage) {
		$row = DB::select('Call SupprimerMessage(?)', array($idMessage));

		if($row != null) {
			return true;
		}
		return false;
	}

}