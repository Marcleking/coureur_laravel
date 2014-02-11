<?php

class MessageController extends BaseController {

	public function message() {
		return View::make('message.index');
	}

	public function sendMessageIndex() {
		return View::make('message.send');
	}

	public function sendMessage() {
		
	}

}