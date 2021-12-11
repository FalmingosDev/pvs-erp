<?php
class Bank_model extends CI_Model {
	protected $bankTable = 'bank_mst';
	//protected $created_by = 1;

	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_all_bank() {
		return $this->db->select('bank_id, bank_name, branch_name, address, active_status')->from($this->bankTable)->get()->result_array();
	}

	public function status($id,$status){
		// $set = [ 'active_status' => ($status == '1') ? 0 : 1 ];
		$set = ($status == '1') ? 0 : 1 ;
		$where = [ 'bank_id' => $id ];

		// print_r($set);die;

		$query = "update " . $this->bankTable . " set active_status=" . $set . " where bank_id=" . $id;
		//echo $query;die;
		$res = $this->db->query($query);
		if(!$res) {
			return false;
		} else {
			return true;
		}
	}

	public function insertBank($bank_short_name,$bank_name){

		$query = "insert into " . $this->bankTable . " (bank_name,address,active_status,created_by,created_ts) values ('".$bank_short_name."','".$bank_name."','1','". $this->session->user_id ."',GETDATE());";
		
		//echo $query;die; 
		$res = $this->db->query($query);
		if(!$res) {
			return false;
		} else {
			return true;
		}
	}

	public function get_bank($id) {
		//echo $id;
		$query = $this->db->query("select bank_id, bank_name, address, active_status from ". $this->bankTable . " where bank_id = ". $id);
		return $query->result_array($query);
	}

	public function UpdateBank($bank_short_name,$bank_name,$bank_id){
		$query = "update " . $this->bankTable . " set bank_name='" . $bank_short_name . "' , address='". $bank_name ."',updated_by='". $this->session->user_id ."',updated_ts=GETDATE() where bank_id=" . $bank_id;
		// echo $query;die;
		
		$res = $this->db->query($query);

		if(!$res) {
			return false;
		} else {
			return true;
		}
	}

	


}

