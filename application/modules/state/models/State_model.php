<?php
class State_model extends CI_Model {
	protected $stateTable = 'state_mst';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_all_state() {
		$query = $this->db->query("Select state_id,state_name,state_short_name,state_code,active_status from state_mst ORDER BY state_name;");
		return $query->result();
	}
	
	public function checkState($state_name,$state_id){
		
		$condition = '';
		if(!empty($state_id)){
			$condition = " AND state_id != '" . $state_id . "'";
		}
		
		//$aa= "select state_name from state_mst where state_name='". $state_name . "'" . $condition;
		 //echo $aa; die;
		$check_state = $this->db->query("select state_name from state_mst where state_name='". $state_name . "'" . $condition);
		$rows = $check_state->num_rows();
		//echo $rows; die;
		if($rows > 0)
		{
			return true;
		}
		else
		{
			//echo $rows;die;
			return false;
		}
	}
	
	public function checkstState($state_st_name,$state_id){
		
		$condition = '';
		if(!empty($state_id)){
			$condition = " AND state_id != '" . $state_id . "'";
		}
		
		$check_state = $this->db->query("select state_name from state_mst where state_short_name='". $state_st_name . "'" . $condition);
		$rows = $check_state->num_rows();
		if($rows > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function checkcodeState($state_code_name,$state_id){
		
		$condition = '';
		if(!empty($state_id)){
			$condition = " AND state_id != '" . $state_id . "'";
		}
		
		$check_state = $this->db->query("select state_name from state_mst where state_code='". $state_code_name . "'" . $condition);
		$rows = $check_state->num_rows();
		if($rows > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
		public function change_status($id,$status){
			//print_r($status); exit;
		$set = ($status == '1') ? 0 : 1 ;
		$where = [ 'state_id' => $id ];

		// print_r($set);die;

		$query = "update " . $this->stateTable . " set active_status=" . $set . " where state_id=" . $id;
		//echo $query;die;
		$res = $this->db->query($query);
		if(!$res) {
			return false;
		} else {
			return true;
		}
	}
	
	public function add_state($state_name,$state_st_name,$state_code){
		$query = $this->db->query("insert into state_mst (state_name,state_short_name,state_code,created_by,created_ts) values ('".$state_name."','".$state_st_name."','".$state_code."','1',GETDATE());");
		
		return $this->db->affected_rows();
	}
	
	function editstate($id){
		//$aa="Select state_id,state_name,state_short_name,state_code from state_mst WHERE state_id = ".$id;;
		//echo $aa; exit;
		$query = $this->db->query('Select state_id,state_name,state_short_name,state_code from state_mst WHERE state_id = '.$id);
		return $query->result();
	}
	
	public function edit_state($state_name,$state_st_name,$state_code,$st_id){
		//echo $st_id; die;
		
		$query = $this->db->query("UPDATE state_mst
		SET state_name='".$state_name."',state_code='".$state_code."',state_short_name='".$state_st_name."' WHERE state_id = ".$st_id);
		
		return $this->db->affected_rows();
	}

}