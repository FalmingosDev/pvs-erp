<?php
class Delete_supp_salary_model extends CI_Model {
	protected $tidTable = 'payroll_supp_header';
	protected $cTable = 'client_mst';
	protected $bTable = 'branch_mst';
	
	public function __construct() {
		parent::__construct();
	}
	


	public function get_all_records($month_year,$client_name,$branch_name) {
		
		$condition = " WHERE (pm.tid is NULL or pm.tid ='') " ;
		
		if(!empty($month_year)){
			// $condition .= " AND datename(m,pm.payment_month)+' '+cast(datepart(yyyy,pm.payment_month) as varchar) = '" . $month_year . "'AND pm.tid is NULL ";
			$condition .= " AND pm.payment_month = '" . $month_year . "'AND (pm.tid is NULL or pm.tid ='') ";
		}
		if(!empty($client_name)){
			$condition .= " AND pm.client_id = '" . $client_name . "'AND (pm.tid is NULL or pm.tid ='') ";
		}

		if(!empty($branch_name)){
			$condition .= " AND pm.branch_id = '" . $branch_name . "' AND (pm.tid is NULL or pm.tid ='') ";
		}

		$query = $this->db->query("SELECT DISTINCT pm.tid,pm.client_id,pm.branch_id,fm.client_name,bm.branch_name,
		pm.payment_month AS month,
		datename(m,pm.payment_month)+' '+cast(datepart(yyyy,pm.payment_month) as varchar) as month_year 
		FROM payroll_supp_header pm
		INNER JOIN client_mst fm ON fm.client_id = pm.client_id 
		INNER JOIN branch_mst bm ON bm.branch_id = pm.branch_id " . $condition . " ;");

	//  echo $this->db->last_query();die;
		return $query->result();
	}


	public function get_all_month() {
		$query = $this->db->query("Select datename(m,payment_month)+' '+cast(datepart(yyyy,payment_month) as varchar) as month_year, payment_month FROM payroll_supp_header ;");
		return $query->result();
	}


	public function get_all_branch($month_year) {
		$query = $this->db->query("Select Distinct bm.branch_id,bm.branch_name from branch_mst bm 
		INNER JOIN payroll_supp_header pm ON pm.branch_id = bm.branch_id WHERE pm.payment_month ='". $month_year ."'
		ORDER BY branch_name;");
		return $query->result();
	}

	public function get_all_client($month_year) {
		$query = $this->db->query("Select Distinct cm.client_id,cm.client_name from client_mst cm
		INNER JOIN payroll_supp_header pm ON pm.client_id = cm.client_id WHERE pm.payment_month ='". $month_year ."'
		ORDER BY client_name;");
		return $query->result();
	}


	public function delete($payment_month,$client_id,$branch_id) {
		echo $branch_id ;die;
	$query = $this->db->query("EXEC delete_supp_payroll_proc @p_payment_month = '".$payment_month."', @p_client_id = '".$client_id."', @p_branch_id='". $branch_id ."'");
	
	return $query->result();
	}


	

}
