<?php
class Tid_process_model extends CI_Model {
	protected $roleTable = 'role_mst';
	protected $approverTable = 'client_approver_mst';
	
	public function __construct() {
		parent::__construct();
	}
	
	
	public function month_list() {
		$query = $this->db->query("select distinct (payment_month) from payroll_header;");
        return $query->result();
	}


	
    public function list_payroll_search($months) {



    	$query = $this->db->query("select distinct ph.client_id,ph.payment_month,ph.branch_id,ph.employee_id,ph.designation_id,ph.billing_days,ph.payment_days,ph.hold_flag,cm.client_id,cm.client_name,bi.branch_id,bi.branch_name,em.employee_id,concat(em.employee_code, ' - ', em.first_name, ' ', em.last_name) as employee_name,dm.desig_id,dm.desig_name 
    		from payroll_header as ph 
    		inner join client_mst as cm on ph.client_id = cm.client_id
    		inner join branch_mst as bi on bi.branch_id = ph.branch_id
    		inner join employee_mst as em on em.employee_id = ph.employee_id
    		inner join designation_mst as dm on dm.desig_id = ph.designation_id WHERE hold_flag = 0 AND ph.payment_month = '$months';");
    	 return $query->result();

	
	}


	
	public function list_payroll_proc() {

    	$query = $this->db->query("select distinct ph.client_id,ph.payment_month,ph.branch_id,ph.employee_id,ph.designation_id,ph.billing_days,ph.payment_days,ph.hold_flag,cm.client_id,cm.client_name,bi.branch_id,bi.branch_name,em.employee_id,concat(em.employee_code, ' - ', em.first_name, ' ', em.last_name) as employee_name,dm.desig_id,dm.desig_name 
    		from payroll_header as ph 
    		inner join client_mst as cm on ph.client_id = cm.client_id
    		inner join branch_mst as bi on bi.branch_id = ph.branch_id
    		inner join employee_mst as em on em.employee_id = ph.employee_id
    		inner join designation_mst as dm on dm.desig_id = ph.designation_id WHERE hold_flag = 0;");
    	 return $query->result();

	
	}


	public function list_payroll_checkbox($payroll_checkbox) 
		{
           
            $query = $this->db->query("INSERT INTO holiday_mst (year,event_date,event_name,state_id,active_status,created_by,created_ts)			
					VALUES ('".$year."','".$event_date[$i]."','".$event_name[$i]."','".$state_id."','1','".$user_id."',GETDATE())");


		}


	
	
	
}