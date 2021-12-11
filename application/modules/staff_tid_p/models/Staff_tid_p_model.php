<?php
class Staff_tid_p_model extends CI_Model {
	protected $staff_tidTable = 'staff_payroll_header';
	protected $staff_tid_cTable = 'employee_mst';
	protected $staff_tid_bTable = 'company_branch_mst';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function staff_tid_p_list($account_no,$reference_no,$net_pay,$bank_name,$employee,$unit,$payment_month,$payment_year,$tid)
	{
		//print_r($year);exit;

		$query = $this->db->query("SELECT pm.payroll_id,pm.payment_month,pm.tid,isnull(pm.account_no,'') AS account_no,isnull(pm.ifsc_code,'')AS reference_no,isnull(bankm.bank_name,'') AS bank_name,
		pm.net_pay,pm.employee_id,
		concat(em.employee_code,', ',concat(em.first_name,' ',em.last_name)) AS employee,
		pm.branch_id,bm.state_id,bm.city_id,concat(bm.branch_name,', ',
		bm.address_1,',',sm.state_name,',',cm.city_name,',',bm.pincode)AS unit, 
		DATEPART(YEAR, pm.payment_month) AS payment_year,
		DATEPART(MONTH, pm.payment_month) AS payment_month
		FROM staff_payroll_header pm
		INNER JOIN company_branch_mst bm ON bm.company_branch_id = pm.branch_id 
		INNER JOIN city_mst cm ON cm.city_id = bm.city_id
		INNER JOIN state_mst sm ON sm.state_id = bm.state_id
		INNER JOIN bank_mst bankm ON bankm.bank_id = pm.bank_name
		INNER JOIN employee_mst em ON em.employee_id = pm.employee_id ;");
		
		
		return $query->result();
	}

	
	public function get_all_records($payment_year,$payment_month,$tid) 
	{

		$condition = " ";
		// $condition = " WHERE pm.tid is not NULL " ;
		
		if(!empty($payment_year)){
			// $condition .= " AND DATEPART(YEAR, pm.payment_month) = " . intval($payment_year) ." AND pm.tid is NOT NULL" ;
			$condition .= " AND DATEPART(YEAR, pm.payment_month) = " . intval($payment_year) ." AND pm.tid is NOT NULL" ;
		}
		// else{
		// 	$condition .= " WHERE 1! = 1";
		// }
		if(!empty($payment_month)){
			$condition .= " AND DATEPART(MONTH, pm.payment_month) = " . intval($payment_month) . " AND pm.tid is NOT NULL";
		}

		if(!empty($tid)){
			$condition .= " WHERE pm.tid is not NULL AND pm.tid = '" . $tid . "'";
		}

		$query = $this->db->query("SELECT pm.payroll_id,pm.payment_month,pm.tid,isnull(pm.account_no,'') AS account_no,isnull(pm.ifsc_code,'')AS reference_no,isnull(bankm.bank_name,'') AS bank_name,
		pm.net_pay,pm.employee_id,
		concat(em.employee_code,', ',concat(em.first_name,' ',em.last_name)) AS employee,
		pm.branch_id,bm.state_id,bm.city_id,concat(bm.branch_name,', ',
		bm.address_1,',',sm.state_name,',',cm.city_name,',',bm.pincode)AS unit, 
		DATEPART(YEAR, pm.payment_month) AS payment_year,
		DATEPART(MONTH, pm.payment_month) AS payment_month
		FROM staff_payroll_header pm
		INNER JOIN company_branch_mst bm ON bm.company_branch_id = pm.branch_id 
		INNER JOIN city_mst cm ON cm.city_id = bm.city_id
		INNER JOIN state_mst sm ON sm.state_id = bm.state_id
		INNER JOIN bank_mst bankm ON bankm.bank_id = pm.bank_name
		INNER JOIN employee_mst em ON em.employee_id = pm.employee_id  " . $condition . " ; ");


		// echo $this->db->last_query();die;
		return $query->result();
	}

	public function get_unit_total($year,$month,$tid) {

		$condition = " ";
		// $condition = " WHERE pm.tid is not NULL " ;
		
		if(!empty($payment_year)){
			// $condition .= " AND DATEPART(YEAR, pm.payment_month) = " . intval($payment_year) ." AND pm.tid is NOT NULL" ;
			$condition .= " AND DATEPART(YEAR, pm.payment_month) = " . intval($payment_year) ." AND pm.tid is NOT NULL" ;
		}
		// else{
		// 	$condition .= " WHERE 1! = 1";
		// }
		if(!empty($payment_month)){
			$condition .= " AND DATEPART(MONTH, pm.payment_month) = " . intval($payment_month) . " AND pm.tid is NOT NULL";
		}

		if(!empty($tid)){
			$condition .= " WHERE pm.tid is not NULL AND pm.tid = '" . $tid . "'";
		}

		$query = $this->db->query("SELECT SUM(pm.net_pay)As unit_total
		FROM staff_payroll_header pm " . $condition . " ; ");

		// echo $this->db->last_query();die;
		
		return $query->row();
	}


	public function get_all_month() {
		$query = $this->db->query("Select DATEPART(MONTH, payment_month) AS payment_month
		FROM staff_payroll_header ;");
		return $query->result();
	}

	public function get_all_year() {
		$query = $this->db->query("Select DATEPART(YEAR, payment_month) AS payment_year
		FROM staff_payroll_header ;");
		return $query->result();
	}

	public function get_all_tid() {
		$query = $this->db->query("Select tid FROM staff_payroll_header ;");
		return $query->result();
	}
	

	
	
}
