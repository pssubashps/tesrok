<?php
Class MY_Controller extends CI_Controller {
	protected $data = array ();
	protected $noSessionClass = array ('login','myerror');
	public function __construct() {
		parent::__construct ();
		
		/*$role = $this->session->userdata('userrole');
		$this->data['userrole'] = $role;
		
		$currentClass =  $this->router->fetch_class();
		if(!in_array($currentClass, $this->noSessionClass)) {
			if(!$this->session->userdata('useremail')) {
				redirect('/login','refresh');
			}
		}*/
		
		$this->authenticate();
		$this->buildsettings ();
	}
	public function authenticate () {
		$controllerName = strtolower($this->router->fetch_class());
		//print $controllerName;
		if(!in_array($controllerName, $this->noSessionClass)) {
			if(!$this->session->userdata('userdetails')) {
				redirect('login/index','refresh');
			}
		}
	}
	protected function _renderView ($viewname,$data) {
		
		$controllerName = strtolower($this->router->fetch_class());
		$this->load->view($controllerName."/".$viewname,$data);
	}
	
	protected function buildsettings() {
		$this->load->model('Model_Settings','settings');
		if(!$this->session->userdata('gensettings')) {
			$gensettings = $this->settings->getGeneralSettings ();
			$this->session->set_userdata ( 'gensettings', $gensettings );
		}
		
	}
}

?>