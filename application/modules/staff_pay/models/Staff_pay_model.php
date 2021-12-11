<?php
class Staff_pay_model extends CI_Model {
	protected $roleTable = 'role_mst';
	protected $approverTable = 'client_approver_mst';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function month_list() 
	{
		$query = $this->db->query("select distinct (payment_month) from staff_payroll_header;");
        return $query->result();
	}

	public function list_payroll_search($months) 
	{
    	$query = $this->db->query("select distinct ph.client_id,ph.payment_month,ph.branch_id,ph.employee_id,bi.branch_name 
    		from staff_payroll_header as ph 
    		
    		inner join company_branch_mst as bi on bi.company_branch_id = ph.branch_id
    		
    		 WHERE  ph.payment_month = '$months' and ph.tid='';");
    	//echo $this->db->last_query();die;

		

    	 return $query->result();
	}
	
	public function count_tid_ck() 
	{
    	$query = $this->db->query("select * from doc_serial_count where doc_type = 'TID'");
    	return $query->row();
	}

	public function payroll_checkbox_ck($employee_id_ckh,$branch_id_ckh,$tid,$month_ck) 
	{
		$res = $this->db->query("EXEC add_staff_proc @p_employee_id_ckh= '". $employee_id_ckh ."',@p_branch_id_ckh= '". $branch_id_ckh ."',@p_tid= '". $tid ."',@p_month_ck= '". $month_ck ."',@p_payroll_type= 'SP'");
		if(!$res) 
		{
			return false;
		} 
		else 
		{
			return true;
		}
	}
	
}