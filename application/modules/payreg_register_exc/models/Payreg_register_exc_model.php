<?php
class Payreg_register_exc_model extends CI_Model {
	
	protected $table_name = 'employee_mst';
	protected $emp_fmly_table = 'employee_family_mst';
	protected $emp_fmly_pf_table = 'employee_family_pf_mst';

	
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
	
	public function employee($id) {
		 
		$query = $this->db->query(" SELECT DISTINCT em.employee_id, em.first_name +' '+ em.last_name +' - '+ em.employee_code as emp_name
		  FROM employee_mst em 
		  INNER JOIN payroll_header ph ON ph.employee_id = em.employee_id
		  WHERE  ph.client_id = '".$id."' ");
		return $query->result();
	}
	
	public function list_proc($month_id,$client_id,$emp_id,$branch_id){
		/*echo "EXEC payreg_report_proc @p_month_id= '". $month_id ."',@p_client_id= '". $client_id ."',@p_emp_id= '". $emp_id ."',@p_branch_id= '". $branch_id ."'  "; die;*/
		$query = $this->db->query("EXEC payreg_report_proc @p_month_id= '". $month_id ."',@p_client_id= '". $client_id ."',@p_emp_id= '". $emp_id ."',@p_branch_id= '". $branch_id ."'  ");
		
		return $query->result();
		
		
	}
	
	
	
}
