<?php
class Contract_type_model extends CI_Model {
	protected $contractTable = 'contract_type_mst';

	//protected $created_by = 1;

	
	public function __construct() {
		parent::__construct();
	}

	public function get_all_contract() {
		return $this->db->select('contract_type_id, contract_type_name, active_status')->from($this->contractTable)->get()->result_array();
	}

	public function status($id,$status){
		
		$set = ($status == '1') ? 0 : 1 ;
		$where = [ 'contract_type_id' => $id ];

		// print_r($set);die;

		$query = "update " . $this->contractTable . " set active_status=" . $set . " where contract_type_id=" . $id;
		
		$res = $this->db->query($query);
		if(!$res) {
			return false;
		} else {
			return true;
		}
	}

	public function insertContract($contract_type_name){

		$query = "insert into " . $this->contractTable . " (contract_type_name,active_status,created_by,created_ts) values ('".$contract_type_name."','1','". $this->session->user_id ."',GETDATE());";
		
		
		$res = $this->db->query($query);
		if(!$res) {
			return false;
		} else {
			return true;
		}
	}

	public function get_contract_type($id) {
		
		$query = $this->db->query("select contract_type_id, contract_type_name, active_status from ". $this->contractTable . " where contract_type_id = ". $id);
		return $query->result_array($query);
	}

	public function UpdateContract($contract_type_name,$contract_type_id){
		$query = "update " . $this->contractTable . " set contract_type_name='" . $contract_type_name . "' , updated_by='". $this->session->user_id ."',updated_ts=GETDATE() where contract_type_id=" . $contract_type_id;
	
		
		$res = $this->db->query($query);

		if(!$res) {
			return false;
		} else {
			return true;
		}
	}

	


}

