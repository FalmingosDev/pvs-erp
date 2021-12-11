<?php
class Delete_staff_salary_model extends CI_Model {
	protected $tidTable = 'staff_payroll_header';
	protected $bTable = 'company_branch_mst';
	
	public function __construct() {
		parent::__construct();
	}
	


	
	public function get_all_records($month_year,$branch_name) {
		// echo $month_year;die;
		
		$condition = " WHERE (pm.tid is NULL or pm.tid ='') " ;
		
		if(!empty($month_year)){
			// $condition .= " AND datename(m,pm.payment_month)+' '+cast(datepart(yyyy,pm.payment_month) as varchar) = '" . $month_year . "'AND pm.tid is NULL ";
			$condition .= " AND pm.payment_month = '" . $month_year . "'AND (pm.tid is NULL or pm.tid ='') ";
		}

		if(!empty($branch_name)){
			$condition .= " AND pm.branch_id = '" . $branch_name . "' AND (pm.tid is NULL or pm.tid ='') ";
		}

		$query = $this->db->query("SELECT DISTINCT pm.tid,pm.branch_id,bm.branch_name,pm.payment_month as month, datename(m,pm.payment_month)+' '+cast(datepart(yyyy,pm.payment_month) as varchar) as month_year FROM staff_payroll_header pm INNER JOIN company_branch_mst bm ON bm.company_branch_id = pm.branch_id  " . $condition . " ;");


		//  echo $this->db->last_query();die;
		
		return $query->result();
	}


	public function get_all_month() {
		$query = $this->db->query("Select datename(m,payment_month)+' '+cast(datepart(yyyy,payment_month) as varchar) as month_year, payment_month FROM staff_payroll_header ;");
		return $query->result();
	}

	public function get_all_branch($month_year) {
		// echo $month_year; die;
		$query = $this->db->query("Select DISTINCT cb.company_branch_id,cb.branch_name from company_branch_mst cb
		INNER JOIN staff_payroll_header pm ON pm.branch_id = cb.company_branch_id WHERE pm.payment_month ='". $month_year ."'
		ORDER BY branch_name;");

		return $query->result();
	}



	 public function delete($payment_month,$branch_id) {
		// echo $branch_id ;die;
	$query = $this->db->query("EXEC delete_staff_payroll_proc @p_payment_month = '".$payment_month."', @p_branch_id='". $branch_id ."'");
	echo $this->db->last_query();die;
	return $query->result();
	 }

	 

}
