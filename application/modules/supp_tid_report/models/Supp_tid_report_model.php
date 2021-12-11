<?php
class Supp_tid_report_model extends CI_Model {
	protected $client_tidTable = 'payroll_supp_header';
	protected $client_tid_cTable = 'client_mst';
	protected $client_tid_bTable = 'branch_mst';
	
	public function __construct() {
		parent::__construct();
	}
	


	public function supp_tid_list($account_no,$reference_no,$net_pay,$bank_name,$employee,$client,$payment_month,$payment_year,$tid)
	{
		//print_r($year);exit;
		
		$query = $this->db->query("SELECT pm.payroll_supp_id,pm.payment_month,pm.tid,pm.account_no,(pm.ifsc_code)AS reference_no,isnull(bankm.bank_name,'') AS bank_name,pm.net_pay,pm.employee_id,concat(em.employee_code,', ',
		concat(em.first_name,' ',em.last_name)) AS employee,pm.client_id,pm.branch_id,concat(fm.client_name,', ',
		bm.branch_name)AS client, DATEPART(YEAR, pm.payment_month) AS payment_year,
		DATEPART(MONTH, pm.payment_month) AS payment_month
		FROM payroll_supp_header pm
		INNER JOIN client_mst fm ON fm.client_id = pm.client_id 
		INNER JOIN branch_mst bm ON bm.branch_id = pm.branch_id 
		INNER JOIN bank_mst bankm ON bankm.bank_id = pm.bank_name
		INNER JOIN employee_mst em ON em.employee_id = pm.employee_id ;");
		// echo $this->db->query();die;
		return $query->result();
	}

	
	public function get_all_records($payment_year,$payment_month,$tid) {
		
		$condition = " ";
		//  $condition = " WHERE pm.tid is not NULL " ;
		
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
		
		
		$query = $this->db->query("SELECT pm.payroll_supp_id,pm.payment_month,pm.tid,isnull(pm.account_no,'') AS account_no,isnull(pm.ifsc_code,'')AS reference_no,isnull(bankm.bank_name,'') AS bank_name,pm.net_pay,pm.employee_id,concat(em.employee_code,', ',
		concat(em.first_name,' ',em.last_name)) AS employee,pm.client_id,pm.branch_id,concat(fm.client_name,', ',
		bm.branch_name)AS client, DATEPART(YEAR, pm.payment_month) AS payment_year,
		DATEPART(MONTH, pm.payment_month) AS payment_month
		FROM payroll_supp_header pm
		INNER JOIN client_mst fm ON fm.client_id = pm.client_id 
		INNER JOIN branch_mst bm ON bm.branch_id = pm.branch_id 
		INNER JOIN bank_mst bankm ON bankm.bank_id = pm.bank_name
		INNER JOIN employee_mst em ON em.employee_id = pm.employee_id " . $condition . " ; ");
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
		FROM payroll_supp_header pm " . $condition . " ; ");

		// echo $this->db->last_query();die;
		
		return $query->row();
	}


	public function get_all_month() {
		$query = $this->db->query("Select DATEPART(MONTH, payment_month) AS payment_month
		FROM payroll_supp_header ;");
		return $query->result();
	}

	public function get_all_year() {
		$query = $this->db->query("Select DATEPART(YEAR, payment_month) AS payment_year
		FROM payroll_supp_header ;");
		return $query->result();
	}

	public function get_all_tid() {
		$query = $this->db->query("Select tid FROM payroll_supp_header ;");
		return $query->result();
	}
	

	
	
}
