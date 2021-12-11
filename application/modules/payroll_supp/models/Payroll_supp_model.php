<?php
class Payroll_supp_model extends CI_Model {
	protected $roleTable = 'role_mst';
	protected $approverTable = 'client_approver_mst';
	
	public function __construct() 
	{
		parent::__construct();
	}
	
	public function month_list() 
	{
		$query = $this->db->query("select distinct (payment_month) from payroll_supp_header;");
        return $query->result();
	}

	public function list_payroll_search($months) 
	{
    	$query = $this->db->query("select distinct ph.client_id,ph.payment_month,ph.branch_id,cm.client_name,bi.branch_name
    		from payroll_supp_header as ph 
    		inner join client_mst as cm on ph.client_id = cm.client_id
    		inner join branch_mst as bi on bi.branch_id = ph.branch_id
    		inner join employee_mst as em on em.employee_id = ph.employee_id
    		inner join designation_mst as dm on dm.desig_id = ph.designation_id WHERE isnull(hold_flag,0) = 0 and ph.tid is NULL AND ph.payment_month = '$months';");
    	 return $query->result();
	}

	public function count_tid_ck() 
	{

    	$query = $this->db->query("select * from doc_serial_count where doc_type = 'TID'");
    	return $query->row();
	}

	public function payroll_checkbox_ck($employee_id_ckh,$branch_id_ckh,$tid,$month_ck) 
	{
		
		$res = $this->db->query("EXEC add_payroll_supp_proc @p_employee_id_ckh= '". $employee_id_ckh ."',@p_branch_id_ckh= '". $branch_id_ckh ."',@p_tid= '". $tid ."',@p_month_ck= '". $month_ck ."',@p_payroll_type= 'CS'");
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