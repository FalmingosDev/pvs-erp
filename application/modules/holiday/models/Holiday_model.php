<?php
class Holiday_model extends CI_Model {
	// protected $roleTable = 'role_mst';
	// protected $approverTable = 'client_approver_mst';
	protected $holidayTable = 'holiday_mst';
	
	public function __construct() {
		parent::__construct();
	}
	




	public function get_all_holiday($year, $state) {
		//echo $year . ' | ' . $state . '<br />';
		$condition = " WHERE 1 = 1 ";
		if(!empty($year)){
			$condition .= " AND im.year = " . intval($year);
		}
		if(!empty($state)){
			$condition .= " AND im.state_id = " . intval($state);
		}
		$query = $this->db->query("SELECT im.holiday_id,im.year,fm.state_name, im.state_id,im.event_date,im.event_name,
		im.active_status 
		FROM holiday_mst im
		INNER JOIN state_mst fm ON fm.state_id = im.state_id 
		" . $condition . "
		ORDER BY im.year,fm.state_name,im.event_date;");
		//exit($this->db->last_query());
		return $query->result();
	}
	
	
	public function add($year,$state_id,$event_date,$event_name) {
		 
		 $count = count($event_date);
		 //$event_name_count = count($event_name);
		 $user_id = $this->session->user_id;
		 //print_r($event_name_count);exit;
		 for($i=0; $i<$count; $i++)
		{
			
			$check_event_date = $this->db->query("SELECT holiday_id FROM holiday_mst WHERE event_date = '".$event_date[$i]."' AND state_id= '".$state_id."'" );
			$rows = $check_event_date->num_rows();
			if($rows > 0)
					{
						
						return false;
					}
					else
					{
						
					$query = $this->db->query("INSERT INTO holiday_mst (year,event_date,event_name,state_id,active_status,created_by,created_ts)			
					VALUES ('".$year."','".$event_date[$i]."','".$event_name[$i]."','".$state_id."','1','".$user_id."',GETDATE())");
					}
					 
		}
		return true;
		 
		
	}


	public function get_all_state() {
		$query = $this->db->query("Select state_id,state_name from state_mst ORDER BY state_name;");
		return $query->result();
	}
	
	public function event_edit($event_date,$event_name,$id) {
		 
		 $count = 1;
		 $user_id = $this->session->user_id;
		 //print_r($client_id);exit;
		 for($i=0; $i<$count; $i++)
		{
			//echo $aa = ""; die;
			$check_resourc = $this->db->query("SELECT holiday_id FROM holiday_mst WHERE event_date = '".$event_date."'AND event_name = '".$event_name."' AND holiday_id != " . $id );
				//echo $check_resourc->num_rows(); die;
			$rows = $check_resourc->num_rows();
			//echo $rows;die;
			if($rows > 0)
					{
						
						return false;
					}
					else
					{
						
			$query = $this->db->query("UPDATE holiday_mst SET event_date = '".$event_date."', event_name = '".$event_name."', updated_by = ".$user_id.",updated_ts= GETDATE() WHERE holiday_id = ".$id."");
			return true;
					}
		}
		
		
	}
	
	
	public function get_edit_data($id) {
		
	$query = $this->db->query("SELECT im.holiday_id,im.year,fm.state_name, im.state_id,im.event_date,im.event_name,
		im.active_status FROM holiday_mst im INNER JOIN state_mst fm ON fm.state_id = im.state_id 
		WHERE im.active_status = 1 AND holiday_id = '".$id."' ORDER BY im.event_date ;");

		return $query->row();
	}
	
	
	public function holiday_list($state_id,$year)
	{
		//print_r($year);exit;
		
		$query = $this->db->query("SELECT im.holiday_id,im.year,fm.state_name, im.state_id,im.event_date,im.event_name,
		im.active_status 
		FROM holiday_mst im
		INNER JOIN state_mst fm ON fm.state_id = im.state_id
		WHERE im.year = '".$year."' AND im.state_id = '".$state_id."'
		ORDER BY im.year,fm.state_name,im.event_date;");
		
		return $query->result();
	}
	
	
}
