<?php
class Emp_doc_type_model extends CI_Model {
	protected $docTable = 'emp_doc_type_mst';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_all_list() {
		$query = $this->db->query("SELECT emp_doc_type_id,doc_name,doc_short_name,active_status FROM emp_doc_type_mst ORDER BY doc_name;");
		return $query->result();
	}
	
	
	
		public function change_status($id,$status){
			//print_r($status); exit;
		$set = ($status == '1') ? 0 : 1 ;
		$where = [ 'emp_doc_type_id' => $id ];

		// print_r($set);die;

		$query = "update " . $this->docTable . " set active_status=" . $set . " where emp_doc_type_id=" . $id;
		//echo $query;die; 
		$res = $this->db->query($query);
		if(!$res) {
			return false;
		} else {
			return true;
		}
	}
	
	public function add_doc($doc_name,$doc_short_name){
		//echo $pin; die;
		$query = $this->db->query("insert into emp_doc_type_mst (doc_name,doc_short_name,created_by,created_ts) values ('".$doc_name."','".$doc_short_name."','1',GETDATE());");
		return $this->db->affected_rows();
	}
	
	function view($id){
		$query = $this->db->query('SELECT emp_doc_type_id,doc_name,doc_short_name,active_status FROM emp_doc_type_mst
		where emp_doc_type_id = '.$id);
		return $query->result();
	}
	
	public function edit_doc($doc_name,$doc_short_name,$id){
		//echo $id; die;
		
		$query = $this->db->query("UPDATE emp_doc_type_mst
		SET doc_name='".$doc_name."',doc_short_name='".$doc_short_name."' WHERE emp_doc_type_id = ".$id);
		
		return $this->db->affected_rows();
	}

}