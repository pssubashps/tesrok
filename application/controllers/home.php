<?php
class Home extends MY_Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$this->_renderView('index', $this->data);
	}
}