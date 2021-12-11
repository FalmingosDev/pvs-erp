<?php
class Qualification_model extends CI_Model {
	protected $qaTable = 'qualification_mst';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_all_list() {
		$query = $this->db->query(" SELECT qualification_id,qualification_name,qualification_short_name,active_status FROM qualification_mst ORDER BY qualification_name;");
		return $query->result();
	}
	
	
	
		public function change_status($id,$status){
			//print_r($status); exit;
		$set = ($status == '1') ? 0 : 1 ;
		$where = [ 'qualification_id' => $id ];

		// print_r($set);die;

		$query = "update " . $this->qaTable . " set active_status=" . $set . " where qualification_id=" . $id;
		//echo $query;die; 
		$res = $this->db->query($query);
		if(!$res) {
			return false;
		} else {
			return true;
		}
	}
	
	public function add_quali($qualification_name,$qualification_short_name){
		//echo $pin; die;
		$query = $this->db->query("insert into qualification_mst (qualification_name,qualification_short_name,created_by,created_ts) values ('".$qualification_name."','".$qualification_short_name."','1',GETDATE());");
		return $this->db->affected_rows();
	}
	
	function view($id){
		$query = $this->db->query('SELECT qualification_id,qualification_name,qualification_short_name,active_status FROM qualification_mst 
		where qualification_id = '.$id);
		return $query->result();
	}
	
	public function edit_quali($qualification_name,$qualification_short_name,$id){
		//echo $id; die;
		
		$query = $this->db->query("UPDATE qualification_mst
		SET qualification_name='".$qualification_name."',qualification_short_name='".$qualification_short_name."' WHERE qualification_id = ".$id);
		
		return $this->db->affected_rows();
	}

}