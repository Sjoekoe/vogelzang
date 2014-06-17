<?php

class HomeController extends BaseController {

	public function index() {
		return View::make('index')->with('title', 'Home');
	}

	public function admin() {
		return View::make('admin.index');
	}

	public function accomodation() {
		return View::make('accomodation')->with('title', 'Accomodatie');
	}

	public function about() {
		return View::make('about')->with('title', 'Over ons');
	}

	public function manege() {
		return View::make('manege')->with('title', 'Manege');
	}

}
