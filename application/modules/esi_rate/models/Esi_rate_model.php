<?php
class Esi_rate_model extends CI_Model {
	
	protected $esiTable = 'esi_rate';
	
	public function __construct() {
		parent::__construct();
	}
	
	
	public function get_all_esi_rate($effective_date,$percentage,$comp_percentage) {
		$query = $this->db->query("SELECT esi_rate_id,effective_date, percentage, comp_percentage from esi_rate;");
		// echo($this->db->last_query());die;
		return $query->result();
	}
	

	public function add_esi($esi_rate_id,$effective_date,$percentage,$comp_percentage) {

		$user_id = $this->session->user_id;
		//print_r($event_name_count);exit;
						
		$query = $this->db->query("INSERT INTO esi_rate (effective_date, percentage, comp_percentage,active_status,created_by,created_ts)
		VALUES ('".$effective_date."','".$percentage."','".$comp_percentage."','1','".$user_id."',GETDATE())");
					
		return true;
   }


   public function esi_edit($esi_rate_id,$effective_date,$percentage,$comp_percentage,$id) {

		$user_id = $this->session->user_id;
		$query = $this->db->query("UPDATE esi_rate SET effective_date = '".$effective_date."', percentage = '".$percentage."', comp_percentage = '".$comp_percentage."',updated_by = ".$user_id.",updated_ts= GETDATE() WHERE esi_rate_id = ".$id."");
		return true;
	
	}

   public function checkDate($effective_date,$esi_rate_id){
			
		$condition = '';
		if(!empty($esi_rate_id)){
			$condition = " AND esi_rate_id != '" . $esi_rate_id . "'";
		}
		$check_date = $this->db->query("select effective_date from esi_rate where effective_date='". $effective_date . "'". $condition);
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
	
		$query = $this->db->query("SELECT esi_rate_id,effective_date, percentage, comp_percentage FROM esi_rate WHERE active_status = 1 AND esi_rate_id = '".$id."';");

			return $query->row();
		}
	
	
	
	
}
