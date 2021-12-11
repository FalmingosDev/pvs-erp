<?php
class Payslip_model extends CI_Model {
	
	protected $table_name = 'employee_mst';
	

	
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
	}
	
	/*public function paylist($user_branch_id = 1, $searched_data = NULL) {
		$conditions = "";
		$conditions = " WHERE 1 = 1";
		
		echo $aa="SELECT em.employee_id,em.employee_code, em.first_name +' '+ em.last_name as emp_name,dm.desig_name,
		  bm.branch_id,bm.branch_name, bm.address_1 +' '+ bm.address_2 +' '+ bm.address_3 as address,
		  ph.bank_name,ph.account_no,ph.epf,ph.esi
		  FROM  " . $this->table_name . "  em
		  INNER JOIN designation_mst dm ON dm.desig_id = em.designation_id
		  INNER JOIN payroll_header ph ON ph.employee_id = em.employee_id
		  INNER JOIN branch_mst bm ON bm.branch_id = ph.branch_id
		" . $conditions . "
		ORDER BY em.employee_code, em.first_name;"; die; 
		
		$qry = "SELECT em.employee_id,em.employee_code, em.first_name +' '+ em.last_name as emp_name,dm.desig_name,
		  bm.branch_id,bm.branch_name, bm.address_1 +' '+ bm.address_2 +' '+ bm.address_3 as address,
		  ph.bank_name,ph.account_no,ph.epf,ph.esi
		  FROM  " . $this->table_name . "  em
		  INNER JOIN designation_mst dm ON dm.desig_id = em.designation_id
		  INNER JOIN payroll_header ph ON ph.employee_id = em.employee_id
		  INNER JOIN branch_mst bm ON bm.branch_id = ph.branch_id
		" . $conditions . "
		ORDER BY em.employee_code, em.first_name;";
		
		$query = $this->db->query($qry);
		return $query->result();
	}*/
	
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
	
	
	
	public function list_proc($month_id,$client_id,$employee_id,$payslip_temp_id){
		
		/*echo $aa="EXEC payslip_proc @p_month_id= '". $month_id ."',@p_client_id= '". $client_id ."',@p_employee_id= '". $employee_id ."',@p_payslip_temp_id= '". $payslip_temp_id ."'"; die;*/
		$query = $this->db->query("EXEC payslip_proc @p_month_id= '". $month_id ."',@p_client_id= '". $client_id ."',@p_employee_id= '". $employee_id ."',@p_payslip_temp_id= '". $payslip_temp_id ."'");
		
		
		return $query->result();
		
		
	}
	
	public function payslip_view($payment_date,$employee_id,$client_id,$payslip_temp_id){
		
		/*echo $aa="EXEC payslip_proc @p_month_id= '". $payment_date ."',@p_client_id= '". $client_id ."',@p_employee_id= '". $employee_id ."',@p_payslip_temp_id= '". $payslip_temp_id ."'"; die;*/
		$query = $this->db->query("EXEC payslip_proc @p_month_id= '". $payment_date ."',@p_client_id= '". $client_id ."',@p_employee_id= '". $employee_id ."',@p_payslip_temp_id= '". $payslip_temp_id ."'");
		
		
		return $query->row();
		
		
	}
	
}
