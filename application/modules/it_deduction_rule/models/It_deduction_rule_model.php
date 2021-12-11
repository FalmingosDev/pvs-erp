<?php
class It_deduction_rule_model extends CI_Model {
	
	protected $it_deduction_rule_Table = 'it_deduction_rule_header';
	protected $it_deduction_detail_table = 'it_deduction_rule_detail';
	
	public function __construct() {
		parent::__construct();
	}
	
	
	

	


	public function add($financial_year_id,$section,$criteria,$header_calculation_type,$header_max_limit,$sub_head_name,$calculation_type,$max_limit)
	{
		$tot_name = count($sub_head_name);
		$detail_data = '';
		for($i=0; $i<$tot_name; $i++)
		{
			$detail_data .= $sub_head_name[$i].'|~|'.$calculation_type[$i] . '|~|' .$max_limit[$i]. '[#]';
		}
		//print_r($detail_data);die;
		 $detail_data = rtrim($detail_data, "[#]");
		 $user_id = $this->session->user_id;
		 $sql = "EXEC add_it_deduction_proc @p_financial_year_id = '". $financial_year_id ."', @p_section = '".escape_str($section)."' ,@p_criteria = '".escape_str($criteria)."',@p_calculation_type = '".$header_calculation_type."',@p_max_limit = '".floatval($header_max_limit)."',@p_user_id='".$user_id."', @p_detail_data = '". $detail_data."'";
		//exit($sql);
		$query = $this->db->query($sql);
		return $query->row();
	}




	public function get_all_financial_year() 
	{
		$query = $this->db->query("Select financial_year_id,fy_name from financial_year_mst ORDER BY fy_name;");
		return $query->result();
	}

	public function get_all_it_deduction($financial_year)
	{
			$condition = " WHERE 1 = 1 ";
			if(!empty($financial_year)){
				$condition .= " AND im.financial_year_id = " . intval($financial_year);
			}
			$query = $this->db->query("SELECT im.it_deduction_id,fm.fy_name, im.financial_year_id,im.section,im.criteria,CASE WHEN im.calculation_type = 'A' THEN 'Amount' WHEN im.calculation_type = 'P' THEN 'Percentage' WHEN im.calculation_type = 'N' THEN 'N/A' ELSE '' END AS calculation_type,im.max_limit,
			im.active_status 
			FROM it_deduction_rule_header im
			INNER JOIN financial_year_mst fm ON fm.financial_year_id = im.financial_year_id 
			" . $condition . "
			ORDER BY im.section;");
			//exit($this->db->last_query());
			return $query->result();
	}

	public function it_deduction_list($financial_year_id,$financial_year,$section,$criteria,$calculation_type,$max_limit)
	{
		//print_r($year);exit;
		
		$query = $this->db->query("SELECT im.it_deduction_id,im.financial_year_id,fm.fy_name,im.section,im.criteria,im.calculation_type,im.max_limit,im.active_status 
		FROM it_deduction_rule_header im
		INNER JOIN financial_year_mst fm ON fm.financial_year_id = im.financial_year_id ORDER BY im.section;");
		return $query->result();
	}





	
// 	public function event_edit($section,$criteria,$header_calculation_type,$header_max_limit,$sub_head_name,$calculation_type,$max_limit,$id) {
		 
// 		 $count = 1;
// 		 $user_id = $this->session->user_id;
// 		 //print_r($client_id);exit;
// 		 for($i=0; $i<$count; $i++)
// 		{
// 			//echo $aa = ""; die;
// 			$check_resourc = $this->db->query("SELECT it_deduction_id FROM it_deduction_rule_header WHERE event_date = '".$event_date."'AND event_name = '".$event_name."' AND holiday_id != " . $id );
// 				//echo $check_resourc->num_rows(); die;
// 			$rows = $check_resourc->num_rows();
// 			//echo $rows;die;
// 			if($rows > 0)
// 					{
						
// 						return false;
// 					}
// 					else
// 					{
						
// 			$query = $this->db->query("UPDATE holiday_mst SET event_date = '".$event_date."', event_name = '".$event_name."', updated_by = ".$user_id.",updated_ts= GETDATE() WHERE holiday_id = ".$id."");
// 			return true;
// 					}
// 		}
		
		
// 	}
	
	
// 	public function get_edit_data($id) {
		
// 	// $query = $this->db->query("SELECT im.holiday_id,im.year,fm.state_name, im.state_id,im.event_date,im.event_name,
// 	// 	im.active_status FROM holiday_mst im INNER JOIN state_mst fm ON fm.state_id = im.state_id 
// 	// 	WHERE im.active_status = 1 AND holiday_id = '".$id."' ORDER BY im.event_date ;");

// $query = $this->db->query("SELECT im.it_deduction_id,im.financial_year_id,fm.fy_name,im.section,im.criteria,im.calculation_type,im.max_limit,im.active_status 
// FROM it_deduction_rule_header im
// INNER JOIN financial_year_mst fm ON fm.financial_year_id = im.financial_year_id ORDER BY im.section;");

// 		return $query->row();
// 	}
	
	
		public function edit_it_deduction_rule($id){

			$query = $this->db->query("SELECT im.it_deduction_id,im.financial_year_id,fm.fy_name,im.section,im.criteria,im.calculation_type,im.max_limit,im.active_status 
			FROM " . $this->it_deduction_rule_Table . " im 
			INNER JOIN financial_year_mst fm ON fm.financial_year_id = im.financial_year_id WHERE im.active_status = 1 AND im.it_deduction_id = " . $id );
			return $query->row();
			
		}

		public function edit_it_deduction($id){
			//echo $qry = "SELECT client_contact_id,client_id,name,designation,contact_no,email,birth_date      ,anniversary_date from " . $this->client_contact . " where active_status=1 and client_id=".$id;die;
			$query = $this->db->query("SELECT it_deduction_detail_id,it_deduction_id,sub_head_name,calculation_type,max_limit from " . $this->it_deduction_detail_table . " where active_status=1 and it_deduction_id=".$id);
			return $query->result_array();
			
		}


		public function Update($it_deduction_id,$financial_year_id,$section,$criteria,$header_calculation_type,$header_max_limit,$sub_head_name,$calculation_type,$max_limit,$details_id)
	{
		$tot_name = count($sub_head_name);
		$detail_data = '';
		//$new_birthday = date("Y-m-d", strtotime($birthday));
		// echo "<pre>";
		// print_r($tot_name); //4
		// print_r($details_id);
		// print_r($sub_head_name);
		// print_r($calculation_type);die;
		for($i=0; $i<$tot_name; $i++)
		{
			$detail_data .= $details_id[$i].'|~|'. $sub_head_name[$i].'|~|'.$calculation_type[$i].'|~|'.$max_limit[$i].'[#]';
		}
		//echo $detail_data;die;
		 $detail_data = rtrim($detail_data, "[#]");

		 //print_r($detail_data);die;


		$user_id = $this->session->user_id;
		
		$sql = "EXEC edit_it_deduction_proc @p_it_deduction_id= '". $it_deduction_id ."', @p_financial_year_id = '". $financial_year_id ."', @p_section = '".escape_str($section)."' ,@p_criteria = '".escape_str($criteria)."',@p_calculation_type = '".$header_calculation_type."',@p_max_limit = '".floatval($header_max_limit)."',@p_user_id='".$user_id."', @p_detail_data = '". $detail_data."'";
		//echo $sql;die;
		// exit($sql);
		$query = $this->db->query($sql);

		
		return $query->row();

		
		// return $query;
	}
	
	
}
