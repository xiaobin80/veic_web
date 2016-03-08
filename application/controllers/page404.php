<?php

class Page404 extends Frontend_Controller {
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		echo '"' . $_SERVER['HTTP_REFERER'] . '"' . ' Not found, Please contact the site manager!';
	}
	
}
