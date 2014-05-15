<?php

class GuideController extends BaseController {
	public function employe()
	{
		return View::make('guide.employe');
	}
	public function gestionnaire()
	{
		return View::make('guide.gestionnaire');
	}
}

?>