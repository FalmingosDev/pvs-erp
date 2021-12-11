<?php
class Supp_tid_xl_model extends CI_Model {
	protected $client_tidTable = 'payroll_supp_header';
	protected $client_tid_cTable = 'client_mst';
	protected $client_tid_bTable = 'branch_mst';
	protected $client_tid_dTable = 'designation_mst';
	
	public function __construct() {
		parent::__construct();
	}
	


	public function client_tid_list($account_no,$reference_no,$net_pay,$bank_name,$employee_code,$payment_month,$payment_year,$tid,$employee_name,$employee_desig,$payment_date,$client_code,$client_name,$branch_name)
	{
		//print_r($year);exit;

		$query = $this->db->query("SELECT pm.payroll_supp_id,pm.tid,fm.client_code,pm.client_id,pm.branch_id,fm.client_name,bm.branch_name,pm.designation_id,
		(dm.desig_name) AS employee_desig,pm.payment_month,isnull(pm.account_no,'')as account_no, 
		isnull(pm.ifsc_code,'')AS reference_no,
		isnull(bankm.bank_name,'')AS bank_name,pm.net_pay,pm.employee_id,em.employee_code,
		concat(em.first_name,' ',em.last_name) AS employee_name,(pm.payment_month) AS payment_date, 
		DATEPART(YEAR, pm.payment_month) AS payment_year,
		DATEPART(MONTH, pm.payment_month) AS payment_month
		FROM payroll_supp_header pm
		INNER JOIN client_mst fm ON fm.client_id = pm.client_id 
		INNER JOIN branch_mst bm ON bm.branch_id = pm.branch_id
		INNER JOIN bank_mst bankm ON bankm.bank_id = pm.bank_name
		INNER JOIN designation_mst dm ON dm.desig_id = pm.designation_id
		INNER JOIN employee_mst em ON em.employee_id = pm.employee_id ;");
		
		return $query->result();
	}

	
	public function get_all_records($payment_year,$payment_month,$tid) {
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
		
		// if(empty ($payment_year)){
		// 	$condition .= " WHERE 1! = 1";
		// }

		$query = $this->db->query("SELECT pm.payroll_supp_id,pm.tid,fm.client_code,pm.client_id,pm.branch_id,fm.client_name,bm.branch_name,pm.designation_id,
		(dm.desig_name) AS employee_desig,pm.payment_month,isnull(pm.account_no,'')as account_no, 
		isnull(pm.ifsc_code,'')AS reference_no,
		isnull(bankm.bank_name,'')AS bank_name,pm.net_pay,pm.employee_id,em.employee_code,
		concat(em.first_name,' ',em.last_name) AS employee_name,(pm.payment_month) AS payment_date, 
		DATEPART(YEAR, pm.payment_month) AS payment_year,
		DATEPART(MONTH, pm.payment_month) AS payment_month
		FROM payroll_supp_header pm
		INNER JOIN client_mst fm ON fm.client_id = pm.client_id 
		INNER JOIN branch_mst bm ON bm.branch_id = pm.branch_id
		INNER JOIN designation_mst dm ON dm.desig_id = pm.designation_id
		INNER JOIN bank_mst bankm ON bankm.bank_id = pm.bank_name
		INNER JOIN employee_mst em ON em.employee_id = pm.employee_id " . $condition . ";");
		// echo $payment_month;die;
		// echo $this->db->last_query();die;
		return $query->result();
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
