<?php
class Companybranch_model extends CI_Model {
	protected $branchTable = 'company_branch_mst';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_all_list() {
		$query = $this->db->query(" SELECT cm.company_branch_id,cm.branch_name,cm.branch_short_name,cm.company_id,
		cm.address_1,cm.state_id,cm.city_id,cm.active_status,  cmt.city_name,sm.state_name
		  FROM company_branch_mst cm
		  LEFT JOIN state_mst sm ON sm.state_id = cm.state_id  
		  LEFT JOIN city_mst cmt ON cmt.city_id = cm.city_id
		  ORDER BY sm.state_name ,cmt.city_name;");
		return $query->result();
	}
	
	public function checkNameState($city_name,$state_id,$city_id){
		$condition = '';
		if(!empty($city_id)){
			$condition = " AND city_id != '" . $city_id . "' AND state_id = '" . $state_id . " AND active_status = 1'";
		}
		
		$check_desig = $this->db->query("select city_name from city_mst where city_name='". $city_name . "'". $condition);
		$rows = $check_desig->num_rows();
		//echo $rows;die;
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
	
	
	
	public function get_all_state() {
		$query = $this->db->query("Select state_id,state_name from state_mst WHERE active_status = 1 ORDER BY state_name;");
		return $query->result();
	}
	
		public function change_status($id,$status){
			//print_r($status); exit;
		$set = ($status == '1') ? 0 : 1 ;
		$where = [ 'company_branch_id' => $id ];

		// print_r($set);die;

		$query = "update " . $this->branchTable . " set active_status=" . $set . " where company_branch_id=" . $id;
		//echo $query;die; 
		$res = $this->db->query($query);
		if(!$res) {
			return false;
		} else {
			return true;
		}
	}
	
	public function add_cbranch($state_id,$city_id,$branch_name,$branch_short_name,$address_1,$address_2,$address_3,$pin){
		//echo $pin; die;
		$query = $this->db->query("insert into company_branch_mst (state_id,city_id,branch_name,branch_short_name,address_1,address_2,address_3,pincode,created_by,created_ts) values ('".$state_id."','".$city_id."','".$branch_name."','".$branch_short_name."','".$address_1."','".$address_2."','".$address_3."','".$pin."','1',GETDATE());");
		return $this->db->affected_rows();
	}
	
	function cbranchview($id){
		//print_r($id); exit;
		$query = $this->db->query("SELECT cm.company_branch_id,cm.branch_name,cm.branch_short_name,cm.company_id,		cm.address_1,cm.address_2,cm.address_3,cm.pincode,cm.state_id,cm.city_id,cm.active_status,  cmt.city_name,sm.state_name
		  FROM company_branch_mst cm
		  LEFT JOIN state_mst sm ON sm.state_id = cm.state_id  
		  LEFT JOIN city_mst cmt ON cmt.city_id = cm.city_id 
		  where cm.company_branch_id = ".$id." ");
		return $query->result();
	}
	
	public function edit_cbranch($state_id,$city_id,$branch_name,$branch_short_name,$address_1,$address_2,$address_3,$pin,$id){
		//echo $id; die;
		
		$query = $this->db->query("UPDATE company_branch_mst
		SET city_id='".$city_id."',state_id='".$state_id."',branch_name='".escape_str($branch_name)."',branch_short_name='".escape_str($branch_short_name)."',address_2='".escape_str($address_2)."',address_3='".escape_str($address_3)."',pincode='".($pin)."',address_1='".escape_str($address_1)."' WHERE company_branch_id = ".$id);
		
		return $this->db->affected_rows();
	}

}