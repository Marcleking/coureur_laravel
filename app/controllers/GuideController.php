<?php

class GuideController extends BaseController {
	public function index()
	{
		if (Auth::User()->type == "Employe")
			return View::make('guide.employe');
		else
			return View::make('guide.gestionnaire');
	}
}

?>