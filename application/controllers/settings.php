<?php
/*
 * Only Admin Access
 */
class Settings extends MY_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('model_settings');
	}
	
	public function index () {
		//redirect('settings/globalset','refresh');
	}
	
	
	public function globalset () {
		
		if ($this->form_validation->run () != FALSE) {
			$paramArray = $this->input->post();
			$this->model_settings->updateGeneralSettings($paramArray);
			$errorArray['errorflag'] = false;
			$errorArray['message'] = "General Settings Updated.";
		}else {
			
				
			$errors = $this->form_validation->error_array();
			if(count($errors) > 0) {
				$errorArray = array();
				$errorArray['errorflag'] = true;
				$errorArray['errordetail'] = $errors;
			}
			
		
			
		}
		if($this->input->is_ajax_request()) {
			echo json_encode($errorArray);
		}else {
			$this->data['generalsettings'] = $this->model_settings->getGeneralSettings ();
			$this->data['passwordsettings'] = $this->model_settings->getPasswordSettings ();
			$this->_renderView('globalset', $this->data);
		}
		
	}
	
	
	public function pwdset () {
		$paramArray = $this->input->post();
		$this->model_settings->updateGeneralSettings($paramArray);
		$errorArray['errorflag'] = false;
		$errorArray['message'] = "General Settings Updated.";
	}
	public function getsessionexpire () {
		$expire_stamp =date('F d,Y G:i:s',strtotime("+5 minutes"));
		echo $expire_stamp;
	}
}