<?php
class Department_model extends CI_Model {
	protected $depTable = 'department_mst';
	//protected $created_by = 1;

	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_all_dept() {
		return $this->db->select('dept_id, dept_name, dept_short_name, active_status')->from($this->depTable)->get()->result_array();
	}

	public function status($id,$status){
		// $set = [ 'active_status' => ($status == '1') ? 0 : 1 ];
		$set = ($status == '1') ? 0 : 1 ;
		$where = [ 'dept_id' => $id ];

		// print_r($set);die;

		$query = "update " . $this->depTable . " set active_status=" . $set . " where dept_id=" . $id;
		//echo $query;die;
		$res = $this->db->query($query);
		if(!$res) {
			return false;
		} else {
			return true;
		}
	}

	public function insertDepartment($dept_name,$dept_shrt_name){

		$query = "insert into " . $this->depTable . " (dept_name,dept_short_name,active_status,created_by,created_ts) values ('".escape_str($dept_name)."','".escape_str($dept_shrt_name)."','1','". $this->session->user_id ."',GETDATE());";
		
		//echo $query;die; 
		$res = $this->db->query($query);
		if(!$res) {
			return false;
		} else {
			return true;
		}
	}

	public function get_dept($id) {
		//echo $id;
		$query = $this->db->query("select dept_id, dept_name, dept_short_name, active_status from ". $this->depTable . " where dept_id = ". $id);
		return $query->result_array($query);
	}

	public function UpdateDepartment($dept_name,$dept_shrt_name,$dept_id){
		$query = "update " . $this->depTable . " set dept_name='" . escape_str($dept_name) . "' , dept_short_name='". escape_str($dept_shrt_name) ."',updated_by='". $this->session->user_id ."',updated_ts=GETDATE() where dept_id=" . $dept_id;
		// echo $query;die;
		$res = $this->db->query($query);
		if(!$res) {
			return false;
		} else {
			return true;
		}
	}

	public function checkDept($dept_name,$dept_id){

		$condition = '';
		if(!empty($dept_id)){
			$condition = " AND dept_id != '" . $dept_id . "'";
		}

		$check_dept = $this->db->query("select dept_name from department_mst where dept_name='". $dept_name . "'". $condition);
		$rows = $check_dept->num_rows();

		if($rows > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function checkShrtDept($dept_shrt_name,$dept_id){

		$condition = '';
		if(!empty($dept_id)){
			$condition = " AND dept_id != '" . $dept_id . "'";
		}
		$check_dept = $this->db->query("select dept_short_name from department_mst where dept_short_name='". $dept_shrt_name . "'" . $condition);
		$rows = $check_dept->num_rows();

		if($rows > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}


}

