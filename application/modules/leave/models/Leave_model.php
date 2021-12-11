<?php
class Leave_model extends CI_Model {
	protected $roleTable = 'role_mst';
	
	public function __construct() {
		parent::__construct();
	}

	public function approverName($url_emp_id)
	{
		$query = $this->db->query("EXEC get_approver_proc  @p_employee_id='".$url_emp_id."'");
		return $query->result();
	}	
	
	
	public function checkEmployee($employee_id,$from_date){
			
			$condition = '';
			if(!empty($from_date)){
				$condition = " AND leave_from = '" . $from_date . "'";
			}
			$check_client = $this->db->query("select leave_id from leave_apply where employee_id='". $employee_id . "'". $condition);
			//echo $check_client = "select client_name from client_mst where client_name='". $client_name . "'". $condition;die;
			//echo $this->db->last_query();die;
			$rows = $check_client->num_rows();

			if($rows > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

	public function insertDetails($employee_id,$department_id,$leave_type,$half_day,$leave_from,$leave_to,$no_leave,$leave_address,$home_address,$leave_reason,$approver_id) {
		//echo $half_day;die;
		$user_id = $this->session->user_id;
		$final_leave_from = date("Y-m-d", strtotime($leave_from));
		$final_leave_to = date("Y-m-d", strtotime($leave_to));
		
		$query = $this->db->query("EXEC add_leave_proc @p_employee_id = '".$employee_id."', @p_department_id='". $department_id ."', @p_leave_type = '".$leave_type."', @p_half_day = '".$half_day."', @p_leave_from = '".$final_leave_from."' ,@p_leave_to = '".$final_leave_to."' , @p_no_leave = '".$no_leave."', @p_leave_address = '".$leave_address."', @p_leave_reason = '".$leave_reason."', @p_approver_id = '".$approver_id."',@p_user_id = '".$user_id."'");
		//echo $this->db->last_query();die;

		
		return $query;
	}

	public function EmpDept($id){
		
		$query = $this->db->query("Select ISNULL(sh.department_id, 0) department_id from employee_mst em left join staff_salary_structure_header sh on em.employee_id=sh.employee_id WHERE em.employee_id = ".$id);
		return $query->row();
	}

	public function getUserList($employee_id){
		$qry = $this->db->query("SELECT l.leave_id,em.employee_code,em.first_name,em.last_name,l.leave_from,l.leave_to,l.leave_days,l.reason,[dbo].getLeaveStatus(l.leave_id, 0) as status,l.leave_type from leave_apply l inner join employee_mst em on em.employee_id=l.employee_id where l.employee_id=". $employee_id." and l.active_status=1");
		//echo $this->db->last_query();die;
		return $qry->result_array();
	}

	public function getApprovalList($employee_id){
		$qry = $this->db->query("SELECT l.leave_id,em.employee_code,em.first_name,em.last_name,l.leave_from,l.leave_to,l.leave_days,l.address,l.reason,[dbo].getLeaveStatus(l.leave_id, 1) as status,'1' as approver_id,l.leave_type from leave_apply l inner join employee_mst em on em.employee_id=l.employee_id where l.approver_id_1=". $employee_id." and l.active_status=1 
			UNION SELECT l.leave_id,em.employee_code,em.first_name,em.last_name,l.leave_from,l.leave_to,l.leave_days,l.address,l.reason,[dbo].getLeaveStatus(l.leave_id, 2) as status,'2' as approver_id,l.leave_type from leave_apply l inner join employee_mst em on em.employee_id=l.employee_id where (l.approver_id_2=". $employee_id." or l.approver_id_21=".$employee_id." or l.approver_id_22=".$employee_id.") and l.active_status=1 
			UNION SELECT l.leave_id,em.employee_code,em.first_name,em.last_name,l.leave_from,l.leave_to,l.leave_days,l.address,l.reason,[dbo].getLeaveStatus(l.leave_id, 3) as status,'3' as approver_id,l.leave_type from leave_apply l inner join employee_mst em on em.employee_id=l.employee_id where (l.approver_id_3=". $employee_id." or l.approver_id_31=".$employee_id." or l.approver_id_32=".$employee_id.") and l.active_status=1");
		//echo $this->db->last_query();die;
		return $qry->result_array();
	}

	public function GetLeaveDetails($leave_id){
		$qry = $this->db->query("select la.leave_id,la.leave_type,la.leave_from,la.leave_to,la.half_day,la.leave_days,la.address,la.reason,em.first_name,em.last_name,ISNULL(em.opening_el - em.el, '0') el,ISNULL(em.opening_sl - em.sl, '0') sl,ISNULL(em.opening_cl - em.cl, '0') cl,em.employee_code from leave_apply la inner join employee_mst em on em.employee_id=la.employee_id where la.leave_id=".$leave_id);
		//echo $this->db->last_query();die;
			return $qry->row();
	}

	public function updateLeaveApproval($leave_id, $approver_level, $approve_remarks,$action) {
		$query = $this->db->query("EXEC update_leave_approval_proc @p_leave_id = '". $leave_id ."', @p_approver_level = '".$approver_level."', @p_approval_remarks = '".$approve_remarks."', @p_action = '".$action."', @p_user_id = '". $this->session->user_id ."';");
		return $query;
	}
	
}