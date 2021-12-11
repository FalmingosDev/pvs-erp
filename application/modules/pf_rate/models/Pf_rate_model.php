<?php
class Pf_rate_model extends CI_Model {
	
	protected $pfTable = 'pf_rate';
	
	public function __construct() {
		parent::__construct();
	}
	
	
	public function get_all_pf_rate($effective_date,$percentage,$comp_percentage) {
		$query = $this->db->query("SELECT pf_rate_id,effective_date, percentage, comp_percentage from pf_rate;");
		// echo($this->db->last_query());die;
		return $query->result();
	}
	

	public function add_pf($pf_rate_id,$effective_date,$percentage,$comp_percentage) {

		$user_id = $this->session->user_id;
		//print_r($event_name_count);exit;
						
		$query = $this->db->query("INSERT INTO pf_rate (effective_date, percentage, comp_percentage,active_status,created_by,created_ts)
		VALUES ('".$effective_date."','".$percentage."','".$comp_percentage."','1','".$user_id."',GETDATE())");
					
		return true;
   }


   public function pf_edit($pf_rate_id,$effective_date,$percentage,$comp_percentage,$id) {

		$user_id = $this->session->user_id;
		$query = $this->db->query("UPDATE pf_rate SET effective_date = '".$effective_date."', percentage = '".$percentage."', comp_percentage = '".$comp_percentage."',updated_by = ".$user_id.",updated_ts= GETDATE() WHERE pf_rate_id = ".$id."");
		return true;
	
	}

   public function checkDate($effective_date,$pf_rate_id){
			
		$condition = '';
		if(!empty($pf_rate_id)){
			$condition = " AND pf_rate_id != '" . $pf_rate_id . "'";
		}
		$check_date = $this->db->query("select effective_date from pf_rate where effective_date='". $effective_date . "'". $condition);
		$rows = $check_date->num_rows();

		if($rows > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	


	
	
	public function get_edit_data($id) {
	
		$query = $this->db->query("SELECT pf_rate_id,effective_date, percentage, comp_percentage FROM pf_rate WHERE active_status = 1 AND pf_rate_id = '".$id."';");

			return $query->row();
		}
	
	
	
	
}
