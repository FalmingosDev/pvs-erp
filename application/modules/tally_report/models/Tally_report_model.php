<?php
class Tally_report_model extends CI_Model {
	
	protected $table_name = 'employee_mst';
	

	
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
	}
	
		
	public function fetch_month()
  {
    $query = $this->db->query("select DISTINCT payment_month from payroll_header;");
    return $query->result();
  }
  
  public function client($date) {
		
		$query = $this->db->query("select DISTINCT cm.client_id,cm.client_name +' - '+  cm.client_code as client_name
  FROM  client_mst cm
  INNER JOIN payroll_header ph ON ph.client_id = cm.client_id
WHERE ph.payment_month = '".$date."' ");
		return $query->result();
	}
	
	
	
	public function tally_list($month_id,$client_id){
		
		//echo $aa="EXEC tally_list_proc @p_month_id= '". $month_id ."',@p_client_id= '". $client_id ."'"; die;
		$query = $this->db->query("EXEC tally_list_proc @p_month_id= '". $month_id ."',@p_client_id= '". $client_id ."'");
		
		return $query->result();
		
		
	}
	
	
}
