<?php
class Model_Settings extends CI_Model {
	
	private $_tblGenSettings = "settings_general";
	
	private $_tblPasswordSettings = "settings_password";
	
	public function __construct() {
		parent::__construct();
	}
	
	public function getGeneralSettings () {
		
		$select = array ();
		
		$select[] = "gs_register";
		$select[] = "gs_user_act";
		$select[] = "gs_notify_user_reg";
		
		$select[] = "gs_unreg_delete";
		$select[] = "gs_default_blog";
		$select[] = "gs_is_auto_logoff";
		
		$select[] = "gs_logoff";
		$select[] = "gs_display_ticker";
		
		$this->db->select($select);
		$this->db->from($this->_tblGenSettings);
		$result = $this->db->get();
		return $result->row_array();
	}
	
	
	
	public function updateGeneralSettings($data,$id = 1) {
		
		$this->db->where('gs_id',$id);
		$this->db->update($this->_tblGenSettings,$data);
	}
	
	public function updatePasswordSettings ($data,$id = 1) {				
		$this->db->where('ps_id',$id);
		$this->db->update($this->_tblPasswordSettings,$data);
	}
	
	public function getPasswordSettings () {
		$select = array ();
		
		$select[] = "ps_enabled";
		$select[] = "ps_max_attempt";
		$select[] = "ps_max_password_reset";
		
		$select[] = "ps_max_security_question_have";
		$select[] = "ps_max_security_quation_ask";
		$select[] = "ps_max_password_reset_time";
		
		$select[] = "ps_password_strength";
		$select[] = "ps_password_letter_count";
		
		$select[] = "ps_password_upper_letter_count";
		$select[] = "ps_password_num_count";
		$select[] = "ps_password_char_count";
		
		$this->db->select($select);
		$this->db->from($this->_tblPasswordSettings);
		$result = $this->db->get();
		return $result->row_array();
	}
}