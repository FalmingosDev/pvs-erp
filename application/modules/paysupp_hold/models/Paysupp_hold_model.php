<?php
class Paysupp_hold_model extends CI_Model {
	
	protected $table_name = 'employee_mst';
	

	
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
	}
	
	public function paylist($user_branch_id = 1, $searched_data = NULL) {
		$conditions = "";
		$conditions = " WHERE 1 = 1";
		
		$qry = "SELECT em.employee_id,em.employee_code, em.first_name +' '+ em.last_name as emp_name,dm.desig_name,
		  bm.branch_id,bm.branch_name, bm.address_1 +' '+ bm.address_2 +' '+ bm.address_3 as address,
		  ph.bank_name,ph.account_no,ph.epf,ph.esi
		  FROM  " . $this->table_name . "  em
		  INNER JOIN designation_mst dm ON dm.desig_id = em.designation_id
		  INNER JOIN payroll_supp_header ph ON ph.employee_id = em.employee_id
		  INNER JOIN branch_mst bm ON bm.branch_id = ph.branch_id
		" . $conditions . "
		ORDER BY em.employee_code, em.first_name;";
		
		$query = $this->db->query($qry);
		return $query->result();
	}
	
	public function fetch_month()
  {
    $query = $this->db->query("select DISTINCT payment_month from payroll_supp_header;");
    return $query->result();
  }
  
  public function client($date) {
		 
		$query = $this->db->query("select DISTINCT cm.client_id,cm.client_name +' - '+  cm.client_code as client_name
  FROM  client_mst cm
  INNER JOIN payroll_supp_header ph ON ph.client_id = cm.client_id
WHERE ph.payment_month = '".$date."' ");
		return $query->result();
	}
	public function branch_search($date) {
		
		$query = $this->db->query("select DISTINCT bm.branch_id,bm.branch_name
  FROM  branch_mst bm
  INNER JOIN payroll_header ph ON ph.branch_id = bm.branch_id
  WHERE ph.client_id = '".$date."' ");
		return $query->result();
	}
	public function employee($client_id,$branch_id) {
		 
		$query = $this->db->query(" SELECT DISTINCT em.employee_id, em.first_name +' '+ em.last_name +' - '+ em.employee_code as emp_name
		  FROM employee_mst em 
		  INNER JOIN payroll_supp_header ph ON ph.employee_id = em.employee_id
		  WHERE  ph.client_id = '".$client_id."' AND ph.branch_id = '".$branch_id."'");
		return $query->result();
	}
	
	public function list_proc($month_id,$client_id,$emp_id,$branch_id){
		
		/*echo $aa = "EXEC paysupp_hold_proc @p_month_id= '". $month_id ."',@p_client_id= '". $client_id ."',@p_emp_id= '". $emp_id ."',@p_branch_id= '". $branch_id ."' " ; die;*/
		
		$query = $this->db->query("EXEC paysupp_hold_proc @p_month_id= '". $month_id ."',@p_client_id= '". $client_id ."',@p_emp_id= '". $emp_id ."',@p_branch_id= '". $branch_id ."' ");
		
		return $query->result();
		
		
	}
	
	public function paysupp_update($user_id,$payroll_supp_id,$checkbox_id,$remarks){
		
		/*echo $aa= "UPDATE payroll_supp_header SET 
				hold_flag = '".$checkbox_id."',
				remarks = '".$remarks."'
				WHERE payroll_supp_id = '".$payroll_supp_id."';"; die;*/
		
		$query = $this->db->query("UPDATE payroll_supp_header SET 
				hold_flag = '".$checkbox_id."',
				remarks = '".$remarks."'
				WHERE payroll_supp_id = '".$payroll_supp_id."';");
		
	}
	
}
