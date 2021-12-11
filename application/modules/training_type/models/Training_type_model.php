<?php
class Training_type_model extends CI_Model {
	protected $taTable = 'training_type_mst';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_all_list() {
		$query = $this->db->query("SELECT training_type_id,training_name,active_status FROM training_type_mst ORDER BY training_name;");
		return $query->result();
	}
	
	
	
		public function change_status($id,$status){
			//print_r($status); exit;
		$set = ($status == '1') ? 0 : 1 ;
		$where = [ 'training_type_id' => $id ];

		// print_r($set);die;

		$query = "update " . $this->taTable . " set active_status=" . $set . " where training_type_id=" . $id;
		//echo $query;die; 
		$res = $this->db->query($query);
		if(!$res) {
			return false;
		} else {
			return true;
		}
	}
	
	public function add_traning($training_name){
		//echo $pin; die;
		$query = $this->db->query("insert into training_type_mst (training_name, created_by, created_ts) values ('" . escape_str($training_name) . "', '1', GETDATE());");
		return $this->db->affected_rows();
	}
	
	function view($id){
		$query = $this->db->query('SELECT training_type_id, training_name, active_status FROM training_type_mst
		where training_type_id = '.$id);
		return $query->result();
	}
	
	public function edit_traning($training_name,$id){
		//echo $id; die;
		
		$query = $this->db->query("UPDATE training_type_mst SET training_name='" . escape_str($training_name) . "' WHERE training_type_id = ".$id);
		
		return $this->db->affected_rows();
	}

}