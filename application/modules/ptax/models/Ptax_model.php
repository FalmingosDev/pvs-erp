<?php
class Ptax_model extends CI_Model {
	protected $ptTable = 'ptax_mst';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_all_ptax() {
		$query = $this->db->query("SELECT pm.ptax_id,sm.state_name,pm.state_id,pm.salary_from,pm.salary_to,pm.eff_start_date,pm.tax_amount,pm.active_status 
  FROM ptax_mst pm
  INNER JOIN state_mst sm ON sm.state_id = pm.state_id  ORDER BY sm.state_name ;");
		return $query->result();
	}
	
	public function checkNameState($city_name,$state_id,$city_id){
		$condition = '';
		if(!empty($city_id)){
			$condition = " AND city_id != '" . $city_id . "' AND state_id = '" . $state_id . "'";
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
		$query = $this->db->query("Select state_id,state_name from state_mst  where active_status = 1 ORDER BY state_name;");
		return $query->result();
	}
	
		public function change_status($id,$status){
			//print_r($status); exit;
		$set = ($status == '1') ? 0 : 1 ;
		$where = [ 'ptax_id' => $id ];

		// print_r($set);die;

		$query = "update " . $this->ptTable . " set active_status=" . $set . " where ptax_id=" . $id;
		//echo $query;die;
		$res = $this->db->query($query);
		if(!$res) {
			return false;
		} else {
			return true;
		}
	}
	
	public function add_ptax($state_id,$eff_start_date,$salary_from,$salary_to,$tax_amount){
		
		$query = $this->db->query("insert into ptax_mst (salary_from,salary_to,eff_start_date,tax_amount,state_id,created_by,created_ts) values ('".$salary_from."','".$salary_to."','".$eff_start_date."','".$tax_amount."','".$state_id."','1',GETDATE());");
		return $this->db->affected_rows();
	}
	
	function ptaxview($id){
		$query = $this->db->query('SELECT pm.ptax_id,sm.state_name,pm.state_id,pm.salary_from,pm.salary_to,pm.eff_start_date,pm.tax_amount,pm.active_status 
  FROM ptax_mst pm
  INNER JOIN state_mst sm ON sm.state_id = pm.state_id where pm.ptax_id = '.$id);
		return $query->result();
	}
	
	public function edit_ptax($ptax_id,$state_id,$eff_start_date,$salary_from,$salary_to,$tax_amount){
		//echo $state_id; die;
		
		$query = $this->db->query("UPDATE ptax_mst
		SET eff_start_date='".$eff_start_date."',state_id='".$state_id."',salary_from='".$salary_from."',salary_to='".$salary_to."',tax_amount='".$tax_amount."' WHERE ptax_id = ".$ptax_id);
		
		return $this->db->affected_rows();
	}
	
	
	
	public function tax_list($state_id)
	{
		//print_r($employee_id);exit;
		$query = $this->db->query("SELECT pm.ptax_id,sm.state_name,pm.state_id,pm.salary_from,pm.salary_to,pm.eff_start_date,pm.tax_amount,pm.active_status 
  FROM ptax_mst pm
  INNER JOIN state_mst sm ON sm.state_id = pm.state_id    
  WHERE pm.state_id = ".$state_id."
  ORDER BY sm.state_name ");
		
		return $query->result();
	}

}