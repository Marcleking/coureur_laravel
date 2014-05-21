<?php

class GuideController extends BaseController {
	public function index()
	{
		if (Auth::User()->type != "Gestionnaire")
			return View::make('guide.employe');
		else
			return View::make('guide.gestionnaire');
	}
}

?>