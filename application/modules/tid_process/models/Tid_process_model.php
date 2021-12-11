<?php
class Tid_process_model extends CI_Model 
{
	protected $roleTable = 'role_mst';
	protected $approverTable = 'client_approver_mst';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function month_list() 
	{
		$query = $this->db->query("select distinct (payment_month) from payroll_header;");
        return $query->result();
	}
	public function list_payroll_search($months) 
	{
    	/*$query = $this->db->query("select ph.payroll_id,ph.client_id,ph.payment_month,ph.gross_pay,ph.branch_id,ph.employee_id,ph.designation_id,ph.billing_days,ph.payment_days,ph.hold_flag,cm.client_id,cm.client_name,bi.branch_id,bi.branch_name,em.employee_id,concat(em.employee_code, ' - ', em.first_name, ' ', em.last_name) as employee_name,dm.desig_id,dm.desig_name 
    		from payroll_header as ph 
    		inner join client_mst as cm on ph.client_id = cm.client_id
    		inner join branch_mst as bi on bi.branch_id = ph.branch_id
    		inner join employee_mst as em on em.employee_id = ph.employee_id
    		inner join designation_mst as dm on dm.desig_id = ph.designation_id WHERE hold_flag = 0 AND ph.payment_month = '$months' and ph.tid is NULL;");*/

		$query = $this->db->query("select distinct ph.client_id,ph.payment_month,ph.branch_id,cm.client_name,bi.branch_name
    		from payroll_header as ph 
    		inner join client_mst as cm on ph.client_id = cm.client_id
    		inner join branch_mst as bi on bi.branch_id = ph.branch_id
    		inner join employee_mst as em on em.employee_id = ph.employee_id
    		inner join designation_mst as dm on dm.desig_id = ph.designation_id WHERE isnull(hold_flag,0) = 0 AND ph.payment_month = '$months' and ph.tid is NULL");

			/*select distinct ph.client_id,ph.payment_month,ph.branch_id,cm.client_name,bi.branch_name
from payroll_header as ph 
inner join client_mst as cm on ph.client_id = cm.client_id 
inner join branch_mst as bi on bi.branch_id = ph.branch_id 
inner join employee_mst as em on em.employee_id = ph.employee_id 
inner join designation_mst as dm on dm.desig_id = ph.designation_id 
WHERE hold_flag = 0 AND ph.payment_month = '2021-06-01' and ph.tid is NULL;*/
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
		
		$res = $this->db->query("EXEC add_tid_proc @p_employee_id_ckh= '". $employee_id_ckh ."',@p_branch_id_ckh= '". $branch_id_ckh ."',@p_tid= '". $tid ."',@p_month_ck= '". $month_ck ."',@p_payroll_type= 'CR'");
		//echo $this->db->last_query();die;

		if(!$res) 
		{
			return false;
		} 
		else 
		{
			return true;
		}
	}

	public function payroll_update($tid,$payroll_id_ck) 
	{
		$query = $this->db->query("UPDATE payroll_header SET tid='".$tid."' WHERE payroll_id = '".$payroll_id_ck."'");
		return $this->db->affected_rows();
	}

	
	
}