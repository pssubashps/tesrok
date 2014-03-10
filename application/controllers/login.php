<?php
class Login extends MY_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'Model_Users', 'user' );
		$this->load->model('Model_Settings','settings');
	}
	public function index() {
		$this->load->view ( 'login/index', $this->data );
	}
	public function register() {
		$this->load->helper ( 'captcha' );
		$this->load->helper('general_settings');
		if(is_allow_newuser_register() === false) {
			redirect('myerror/index/no_new_registration_allowed','refresh');
		}
		$this->load->library('email');
		$this->form_validation->set_message ( 'validatecaptcha', 'You entered answer is worong.' );
		$this->form_validation->set_message ( 'isemailunique', 'The Email field must contain a unique value1.' );
		// $this->load->library('mathscaptcha');
		//
		if ($this->form_validation->run () != FALSE) {
			
			$paramArray = $this->input->post ();
			$this->session->unset_userdata ( 'captchaWord' );
			unset ( $paramArray ['captcha'] );
			unset ( $paramArray ['usr_confirm_password'] );
			$paramArray['usr_dob'] = date('Y-m-d',strtotime($paramArray ['usr_dob']));
			$paramArray['usr_password'] = md5('abcd'.$paramArray['usr_password'] .'1234');
			$paramArray['usr_last_login_ip'] = $this->input->ip_address();
			$paramArray['usr_verification_key'] = md5(time());
			$this->user->signup ( $paramArray );
			print "Sign Up successfuly";
			
			/*
			 * Email Section
			 */
			$this->email->clear();
			
			$this->email->to($paramArray['usr_email']);
			$this->email->from('info@jmor.com');
			
			$this->email->subject("Welcome to TESORK – Registration Details");
			$message = "Please verify your email<br/>";
			$message .= base_url()."index.php/login/verify/".$paramArray['usr_verification_key'];
					
			//print $message;exit;
			$this->email->message($message);
			$this->email->set_mailtype("html");
			$this->email->send();
			exit ();
		}
		/* Generate the captcha */
		$captchNums = create_math_captcha ();
		$vals = array (
				'word' => $captchNums ['first'] . '  ' . $captchNums ['operator'] . '  ' . $captchNums ['second'] . " = ",
				'img_path' => './captcha/',
				'img_url' => base_url () . "captcha/" 
		);
		$this->session->set_userdata ( 'captchaWord', $captchNums ['ans'] );
		$this->data ['captcha'] = create_captcha ( $vals );
		$this->data ['timezone_identifiers'] = DateTimeZone::listIdentifiers ();
		// echo "<pre>";print_r($this->data['timezone_identifiers']);exit;
		// $this->data['mathcaptcha'] = $this->mathscaptcha->generateCaptcha();
		$this->load->view ( 'login/register', $this->data );
	}
	public function deleteusers() {
		$this->user->deleteusers ();
	}
	public function getallusers() {
		$this->user->getallusers ();
	}
	public function isemailunique() {
		$email = $this->input->post ( 'usr_email' );
		$isu = $this->user->isemailunique ( $email );
		if ($this->input->is_ajax_request ()) {
			echo json_encode ( $isu );
		} else {
			return $isu;
		}
	}
	public function validatecaptcha() {
		$usercaptcha = $this->input->post ( 'captcha' );
		$systemcatcha = $this->session->userdata ( 'captchaWord' );
		if ($usercaptcha != $systemcatcha) {
			return false;
		}
		return true;
	}
	public function matchpassword() {
		$password = $this->input->post ( 'usr_password' );
		$confirm_password = $this->input->post ( 'usr_confirm_password' );
		
		if ($confirm_password == $password) {
			return true;
		} else {
			return false;
		}
	}

	/*
	 * Login Email 
	 */
	public function logine () {
		$notactive = "<br/>Please <a id ='resend' href='".base_url()."index.php/login/resendverification/'>click here </a> to send verification code again.";
		$this->form_validation->set_message ( 'isloginactive', "Your Email is not active." .$notactive);
		$this->form_validation->set_message ( 'isloginexists', 'Your email doesn\'t  registered with us.' );
		if ($this->form_validation->run () != FALSE) {
			$this->session->set_userdata ( 'loginusername', $this->input->post ( 'usr_email' ) );
			redirect('login/loginp');
		}
		$this->_renderView('logine', $this->data);
	}
	
	public function resendverification () {
		$update['usr_last_login_ip'] = $this->input->ip_address();
		$update['usr_verification_key'] = md5(time());
		$email = trim($this->uri->segment(3));
		if(empty($email)) {
			print "You are not autorized to do this";exit;
		}
		/*
		 * Email Section
		*/
		$this->email->clear();
			
		$this->email->to($email);
		$this->email->from('info@jmor.com');
			
		$this->email->subject("Welcome to TESORK – Registration Details");
		$message = "Please verify your email<br/>";
		$message .= base_url()."index.php/login/verify/".$update['usr_verification_key'];
			
		//print $message;exit;
		$this->email->message($message);
		$this->email->set_mailtype("html");
		$this->email->send();
		$this->user->updateuserbyemail($update,$email);
		$this->session->set_userdata ( 'sucess_message', "Verification code sent successfuly sent to your email ." );
		redirect('login/success');
	}
	public function success () {
		$this->data['sucess_message'] = $this->session->userdata ( 'sucess_message' );
		$this->session->unset_userdata ( 'sucess_message' );
		$this->_renderView('success', $this->data);
	}
	public function loginp() {
		$this->data['usr_email'] = $this->session->userdata ( 'loginusername' );
		$this->form_validation->set_message ( 'verifylogin', 'Your Username/Password doesn\'t match.' );
		if ($this->form_validation->run () != FALSE) {
			$this->session->unset_userdata ( 'loginusername' );
			
			redirect('home/index');
		}
		$this->_renderView('loginp', $this->data);
	}
	
	public function verifylogin () {
		$loginemail = $this->session->userdata ( 'loginusername' );
		$loginpassword = $this->input->post ( 'usr_password' );
		$userdetails = $this->user->validateLogin ( $loginemail, md5('abcd'.$loginpassword.'1234'));
		if($userdetails=== false) {
			return false;
			
		}
		$userdata = array();
		$userdata['email'] = $userdetails['email'];
		$userdata['roleid'] = $userdetails['roleid'];
		$this->session->sess_expiration = '300';// expires in 4 hours
		/*
		 * General Settings
		 */
		
		
		$this->session->set_userdata ( 'userdetails', $userdata );
		
		return true;
	}
	public function isloginexists() {
		$email = $this->input->post ( 'usr_email' );
		$isu = $this->user->isLoginExists ( $email );
		if($isu === false) {
			return false;
		}
		return true;
	}
	
	public function isloginactive () {
		
		$email = $this->input->post ( 'usr_email' );
		$isu = $this->user->isLoginActive ( $email );
		if($isu === false) {
			return false;
		}
		if($isu['status'] ==  2) {
			return false;
		}
		return true;
	}
	
	public function logout () {
		$this->session->unset_userdata ( 'userdetails' );
		$this->session->unset_userdata ( 'gensettings' );
		redirect('login/index');
	}
	
	public function verify () {
		$ip = $this->input->ip_address();
		$code = $this->uri->segment(3);
		$u = $this->user->verifyuser($ip,$code);
		if($u === false) {
			$this->session->set_userdata ( 'sucess_message', "Sorry!! Your not a valid user ." );
			
		}else {
			$up = array ();
			$up['usr_status'] =  '1';
			$this->user->updateuserbyemail($up,$u['email']);
			$this->session->set_userdata ( 'sucess_message', "Your Email address successfuly verfied." );
		}
		redirect('login/success');
	}
}