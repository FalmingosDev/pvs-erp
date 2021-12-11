<?php
class Lwf_model extends CI_Model {
	// protected $roleTable = 'role_mst';
	
	
	public function __construct() {
		parent::__construct();
	}
	
	public function lwflist(){
		$query = $this->db->query("SELECT lm.lwf_id,sm.state_name,lm.period_from,lm.period_to,
		(CASE
		WHEN lm.period = 'H' THEN 'Half Yearly'
		WHEN lm.period = 'Y' THEN 'Yearly'
		WHEN lm.period = 'M' THEN 'Monthly'
		ELSE 'Quarterly' END) as period,lm.employee_contribution,lm.employer_contribution,
	  lm.total,lm.active_status,lm.date_y,lm.date_h 
	  FROM lwf_mst lm
	  INNER JOIN state_mst sm ON sm.state_id = lm.state_id
	  ORDER BY sm.state_name,lm.period_from;");
		return $query->result();
	}

	public function get_all_state() {
		$query = $this->db->query("Select state_id,state_name from state_mst WHERE active_status = 1 ORDER BY state_name;");
		return $query->result();
	}
	
	public function insertlwf($state_id,$date_year,$date_half,$period,$employee_contribution,$employer_contribution,$total)
	{
		//$tot_emp = count($employee_contribution);
		$detail_data = '';	
		
			
		//for($i=0; $i<$tot_emp; $i++)
		//{
			if ($period == 'Y'){
			$date_y = $date_year;
			$date_h = '';
		}
		else if($period == 'H'){
			$date_y = $date_year;
			$date_h = $date_half;
		}
		else if ($period == 'M' || ($period == 'Q')){
			
			$date_y = '';
			$date_h = '';
			//print_r ($date_y[$i]);exit;
		}
			//print_r ($period);
			
				//print_r ($date_y[$i]);exit;	
				
		//$detail_data .= $period[$i].'|~|'.$date_y[$i].'|~|'.$date_h[$i].'|~|'.$employee_contribution[$i].'|~|'.$employer_contribution[$i].'|~|'.$total[$i] .'|#|';
		//}
		//print_r($detail_data);die;
		 $detail_data = rtrim($detail_data, "|#|");
		
		$user_id = $this->session->user_id;
			/*echo $aa = " INSERT INTO lwf_mst (state_id,employee_contribution,employer_contribution,total,active_status,created_by,created_ts,period,date_y,date_h) values ('".$state_id."','".$employee_contribution."','".$employer_contribution."','".$total."',1,'".$user_id."','".$period."','".$date_y."','".$date_h."')"; exit;*/
		/*echo $aa = "EXEC add_lwf_proc  @p_state_id = '".$state_id."',@p_user_id = '".$user_id."', @p_detail_data = '". $detail_data."'"; exit;*/
	
		$query = $this->db->query("INSERT INTO lwf_mst (state_id,employee_contribution,employer_contribution,total,active_status,created_by,created_ts,period,date_y,date_h) values ('".$state_id."','".$employee_contribution."','".$employer_contribution."','".$total."',1,'".$user_id."',GETDATE(),'".$period."','".$date_y."','".$date_h."')");
		
		//return $this->db->affected_rows();
		//return $query->row();
		
		if(!$query) {
			return false;
		} else {
			return true;
		}
		
		
	}
	 
	
	public function lwfeditdetail($lwf_id){
		//echo $lwf_id; die;
		$query = $this->db->query("SELECT lm.lwf_id,lm.state_id,sm.state_name,lm.period_from,lm.period_to,lm.employee_contribution,lm.employer_contribution,(CASE
		WHEN lm.period = 'H' THEN 'Half Yearly'
		WHEN lm.period = 'Y' THEN 'Yearly'
		WHEN lm.period = 'M' THEN 'Monthly'
		ELSE 'Quarterly' END) as period,lm.date_y,lm.date_h,
	lm.total,lm.active_status FROM lwf_mst lm
	INNER JOIN state_mst sm ON sm.state_id = lm.state_id
	WHERE lm.lwf_id = '". $lwf_id."';");
	
		return $query->row();
	}
	
	
	public function editlwf($state_id,$period,$period_from,$period_to,$employee_contribution,$employer_contribution,$total,$lwf_id){
		
		
		// $check_event_date = $this->db->query("SELECT lwf_id FROM lwf_mst WHERE state_id= '".$state_id."' AND period_from 
		// 		BETWEEN '".$period_from."' AND '".$period_to."'" );
		$check_event_date = $this->db->query("SELECT lwf_id FROM lwf_mst WHERE lwf_id= '".$lwf_id."'" );
		
		$rows = $check_event_date->num_rows();
				//echo $rows; die;
		if($rows > 0)
		{
			$qry = $this->db->query(" UPDATE lwf_mst SET date_y = '".$period_from."', date_h = '".$period_to."', employee_contribution = '".$employee_contribution."', employer_contribution = '".$employer_contribution."', total = '".$employer_contribution."', period='". $period ."' WHERE  lwf_id = '".$lwf_id."'" );
			if($qry){
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{					
			return false;
		}

	}
	
}
