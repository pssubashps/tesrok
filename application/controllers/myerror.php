<?php
class Myerror extends MY_Controller {
	public function __construct() {
		parent::__construct ();
	}
	public function index() {
		$messageitem = $this->uri->segment ( 3 );
		$this->data['message'] = $this->config->item ( $messageitem );
		if(!$this->session->userdata('userdetails')) {
			$this->_renderView('index_nosession', $this->data);
		}else {
			$this->_renderView('index', $this->data);
		}
		
	}
}