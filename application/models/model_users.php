<?php



class Model_Users extends CI_Model {
	
	private $_tblUsers = "users";
	public function __construct() {
		parent::__construct ();
	}
	
	public function signup($data) {
		$this->db->insert($this->_tblUsers,$data);
		//echo $this->db->last_query();
		//var_dump($this->db->insert_id());
	}
	
	public function isemailunique ($email) {
		$query = $this->db->limit(1)->get_where($this->_tblUsers, array('usr_email' => $email));
		//print $this->db->last_query();
		//var_dump($query->num_rows());
		if($query->num_rows() > 0){
			return false;
		}else {
			return true;
		}
		
	}
	
	public function deleteusers() {
		$this->db->select('*');
		$this->db->from($this->_tblUsers);
		$result =  $this->db->get();
		echo "<pre>";print_r($result->result_array());
		
		$this->db->empty_table($this->_tblUsers);
		
		$this->db->select('*');
		$this->db->from($this->_tblUsers);
		$result =  $this->db->get();
		echo "<pre>";print_r($result->result_array());exit;
	}
	
	public function getallusers() {
		$this->db->select('*');
		$this->db->from($this->_tblUsers);
		$result =  $this->db->get();
		echo "<pre>";print_r($result->result_array());
	
	}

	public function isLoginExists ($email) { 
		$select =  array ();
		$select [] = 'usr_email as email';
		$select [] = 'usr_status as status';
		$this->db->select($select);
		$this->db->from($this->_tblUsers);
		$this->db->where('usr_email',$email);
		$result =  $this->db->get();
		if($result->num_rows() > 0 ){
			return true;
		}else {
			return false;
		}
		
	}
	
	
	public function isLoginActive ($email) {
		$select =  array ();
		$select [] = 'usr_email as email';
		$select [] = 'usr_status as status';
		$this->db->select($select);
		$this->db->from($this->_tblUsers);
		$this->db->where('usr_email',$email);
		$result =  $this->db->get();
		if($result->num_rows() > 0 ){
			return $result->row_array();
		}else {
			return false;
		}
	
	}
	
	public function validateLogin($username,$password) {
		$select =  array ();
		$select [] = 'usr_email as email';
		$select [] = 'usr_status as status';
		$select [] = 'role_id as roleid';
		$this->db->select($select);
		$this->db->from($this->_tblUsers);
		$this->db->where('usr_email',$username);
		$this->db->where('usr_password',($password));
		$result =  $this->db->get();
		if($result->num_rows() > 0 ){
			return $result->row_array();
		}else {
			return false;
		}
	}
	
	public function updateuserbyemail($data,$email) {
		$this->db->update($this->_tblUsers, $data, "usr_email = '$email'");
	}
	
	public function verifyuser($ip,$code) {
		$select =  array ();
		$select [] = 'usr_email as email';
		$select [] = 'usr_status as status';
		$select [] = 'role_id as roleid';
		$this->db->select($select);
		$this->db->from($this->_tblUsers);
		$this->db->where('usr_last_login_ip',$ip);
		$this->db->where('usr_verification_key',($code));
		$result =  $this->db->get();
		if($result->num_rows() > 0 ){
			
			return $result->row_array();
		}else {
			return false;
		}
	}
}

?>