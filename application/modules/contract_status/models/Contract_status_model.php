<?php
class Contract_status_model extends CI_Model {
	protected $conTable = 'contract_status_mst';
	//protected $created_by = 1;

	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_all_contract() {
		return $this->db->select('contract_status_id,contract_status_name,active_status')->from($this->conTable)->get()->result_array();
	}

	public function status($id,$status){
		// $set = [ 'active_status' => ($status == '1') ? 0 : 1 ];
		$set = ($status == '1') ? 0 : 1 ;
		$where = [ 'contract_status_id' => $id ];

		// print_r($set);die;

		$query = "update " . $this->conTable . " set active_status=" . $set . " where contract_status_id=" . $id;
		//echo $query;die;
		$res = $this->db->query($query);
		if(!$res) {
			return false;
		} else {
			return true;
		}
	}

	public function insertContract($contract_name){

		$query = "insert into " . $this->conTable . " (contract_status_name,active_status,created_by,created_ts) values ('".$contract_name."','1','". $this->session->user_id ."',GETDATE());";
		
		//echo $query;die; 
		$res = $this->db->query($query);
		if(!$res) {
			return false;
		} else {
			return true;
		}
	}

	public function get_contract($id) {
		//echo $id;
		$query = $this->db->query("select contract_status_id,contract_status_name,active_status from ". $this->conTable . " where contract_status_id = ". $id);
		return $query->result_array($query);
	}

	public function UpdateContract($contract_name,$contract_id){
		$query = "update " . $this->conTable . " set contract_status_name='" . $contract_name . "' ,updated_by='". $this->session->user_id ."',updated_ts=GETDATE() where contract_status_id=" . $contract_id;
		// echo $query;die;
		$res = $this->db->query($query);
		if(!$res) {
			return false;
		} else {
			return true;
		}
	}

	public function checkContract($contract_name,$contract_status_id){

		$condition = '';
		if(!empty($contract_status_id)){
			$condition = " AND contract_status_id != '" . $contract_status_id . "'";
		}

		$check_dept = $this->db->query("select contract_status_name from contract_status_mst where contract_status_name='". $contract_name . "'". $condition);
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

