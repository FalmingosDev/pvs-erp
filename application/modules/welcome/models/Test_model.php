<?php
class Test_model extends CI_Model {
	
	protected $table_name = 'user_mst';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_all_user() {
		//$query = $this->db->get('test_tbl');
		$query = $this->db->query("SELECT * FROM " . $this->table_name . " ORDER BY name DESC OFFSET 1 ROWS FETCH NEXT 2 ROWS ONLY;");
		return $query->result();
	}
	
	public function user_login($postdata){
		$query = $this->db->query("SELECT user_id, name, username FROM " . $this->table_name . " WHERE username = '" . addslashes($postdata['username']) . "' AND password = '" . md5($postdata['password']) . "' AND active_status = 1;");
		return $query->row_array();
	}
	
	public function call_test_proc(){
		/*$query = $this->db->query("EXEC test_proc @param1 = 'count', @param2 = 0;");
		return $query->row();*/
		$query = $this->db->query("EXEC test_proc @param1 = 'list', @param2 = 0;");
		return $query->result();
	}
}