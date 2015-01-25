<?php

class HomeController extends BaseController {

	protected $layout = 'layouts.master';

	public function dashboard()
	{
		$this->layout->content = View::make('dashboard');
	}

}
