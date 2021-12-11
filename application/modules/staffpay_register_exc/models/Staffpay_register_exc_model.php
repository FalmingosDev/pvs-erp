<?php
class Staffpay_register_exc_model extends CI_Model {
	
	protected $table_name = 'employee_mst';
	

	
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
	}
	
	
	
	public function fetch_month()
  {
    $query = $this->db->query("select DISTINCT payment_month from staff_payroll_header;");
    return $query->result();
  }
  
  public function branch_search($month_id) {
		
		$query = $this->db->query("select DISTINCT bm.company_branch_id,bm.branch_name
  FROM  company_branch_mst bm
  LEFT JOIN staff_payroll_header ph ON ph.branch_id = bm.company_branch_id
  WHERE ph.payment_month = '".$month_id."' ");
		return $query->result();
	}
 	
	public function employee($branch_id) {
		 
		$query = $this->db->query(" SELECT DISTINCT em.employee_id, em.first_name +' '+ em.last_name +' - '+ em.employee_code as emp_name
		  FROM employee_mst em 
		  INNER JOIN staff_payroll_header ph ON ph.employee_id = em.employee_id
		  WHERE ph.branch_id = '".$branch_id."'");
		return $query->result();
	}
	
	public function list_proc($month_id,$client_id,$emp_id,$branch_id){
		/*echo $aa = "EXEC staffpay_hold_proc @p_month_id= '". $month_id ."',@p_client_id= '". $client_id ."',@p_emp_id= '". $emp_id ."',@p_branch_id= '". $branch_id ."'  "; die;*/
		$query = $this->db->query("EXEC staffpay_hold_proc @p_month_id= '". $month_id ."',@p_client_id= '". $client_id ."',@p_emp_id= '". $emp_id ."',@p_branch_id= '". $branch_id ."'  ");
		
		return $query->result();
		
		
	}
	
	public function paysupp_update($user_id,$payroll_id,$checkbox_id,$remarks){
		
				
		$query = $this->db->query("UPDATE staff_payroll_header SET 
				hold_flag = '".$checkbox_id."',
				remarks = '".$remarks."'
				WHERE payroll_id = '".$payroll_id."';");
		
	}
	
}
