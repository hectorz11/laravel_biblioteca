<?php

class PageController extends BaseController {

	public function getIndex()
	{
		if(Sentry::check()) {
			$sentry = Sentry::getUser();
			$user = User::find($sentry->id);
			return View::make('page.index')->with('user', $user);
		} else {
			return View::make('page.index');
		}
	}
}