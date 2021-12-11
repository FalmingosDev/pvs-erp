<?php
class Income_tax_model extends CI_Model 
{
	
	protected $fyTable = 'financial_year_mst';
	protected $itTable = 'income_tax_mst';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_all_income_tax() {
		$query = $this->db->query("SELECT im.income_tax_id,fm.fy_name, im.financial_year_id,im.salary_from,im.salary_to,
		CASE WHEN im.citizen_type = 'I' THEN 'Individual' WHEN im.citizen_type = 'S' THEN 'Senior Citizen' ELSE '' END AS citizen_type, 
		im.tax_percentage,im.active_status 
		FROM income_tax_mst im
		INNER JOIN financial_year_mst fm ON fm.financial_year_id = im.financial_year_id ORDER BY fm.fy_name;");
		return $query->result();
	}

	public function get_all_financial_year() {
		$query = $this->db->query("Select financial_year_id,fy_name from financial_year_mst ORDER BY fy_name;");
		return $query->result();
	}
	
	public function change_status($income_tax_id,$status){
			//print_r($status); exit;
		$set = ($status == '1') ? 0 : 1 ;
		$where = [ 'income_tax_id' => $income_tax_id ];

		// print_r($set);die;

		$query = "update " . $this->itTable . " set active_status=" . $set . " where income_tax_id=" . $income_tax_id;
		//echo $query;die;
		$res = $this->db->query($query);
		if(!$res) {
			return false;
		} else {
			return true;
		}
	}
	
	public function add($financial_year_id,$citizen_type,$salary_from,$salary_to,$tax_percentage){
		
		
		$query = $this->db->query("insert into income_tax_mst (salary_from,salary_to,citizen_type,tax_percentage,financial_year_id,created_by,created_ts) values ('".$salary_from."','".$salary_to."','".$citizen_type."','".$tax_percentage."','".$financial_year_id."','1',GETDATE());");
		return $this->db->affected_rows();
	}
	
	
	public function edit($income_tax_id,$financial_year_id,$citizen_type,$salary_from,$salary_to,$tax_percentage){
	
		
		$query = $this->db->query("UPDATE income_tax_mst
		SET citizen_type='".$citizen_type."',financial_year_id='".$financial_year_id."',salary_from='".$salary_from."',salary_to='".$salary_to."',tax_percentage='".$tax_percentage."',updated_by= '".$this->session->user_id."', updated_ts= GETDATE()  WHERE income_tax_id = ".$income_tax_id);
		
		return $this->db->affected_rows();
	}

	public function income_tax_view($income_tax_id){
		$query = $this->db->query("SELECT im.income_tax_id,fm.fy_name,im.financial_year_id,im.salary_from,im.salary_to, CASE WHEN im.citizen_type = 'I' THEN 'Individual' WHEN im.citizen_type = 'S' THEN 'Senior Citizen' ELSE '' END AS citizen_type, im.tax_percentage,im.active_status 
  			FROM income_tax_mst im INNER JOIN financial_year_mst fm ON fm.financial_year_id = im.financial_year_id WHERE income_tax_id = ".$income_tax_id);
		return $query->result();
	}

	public function checkSalaryConflict($val, $financial_year_id, $citizen_type, $income_tax_id = NULL){
		$condition = "";
		if(!empty($income_tax_id)){
			$condition = " AND income_tax_id != '". $income_tax_id ."' ";
		}
		$query = $this->db->query("SELECT COUNT(1) cnt FROM income_tax_mst WHERE $val BETWEEN salary_from AND salary_to AND financial_year_id='".$financial_year_id."' AND citizen_type = '".$citizen_type."'" . $condition);
		return $query->row_array();
	}

	// public function checkNameState($city_name,$state_id,$city_id)
	//{
	// 	$condition = '';
	// 		if(!empty($city_id))
	// 		{
	// 			$condition = " AND city_id != '" . $city_id . "' AND state_id = '" . $state_id . "'";
	// 		}
		
	// 			$check_desig = $this->db->query("select city_name from city_mst where city_name='". $city_name . "'". $condition);
	// 			$rows = $check_desig->num_rows();
	// 			//echo $rows;die;
	// 		if($rows > 0)
	// 		{
	// 			return true;
	// 		}
	// 		else
	// 		{
	// 			//echo $rows;die;
	// 			return false;
	// 		}
	// }

}