<?php
class Leave_bal_update_model extends CI_Model {
	
	protected $table_name = 'employee_mst';
	protected $emp_fmly_table = 'employee_family_mst';
	protected $emp_fmly_pf_table = 'employee_family_pf_mst';

	
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
	}
	
	public function employee_list($user_branch_id = 1) {
		$branch_condition = ' AND 1 = 1';
		if($user_branch_id != 1){
			$branch_condition = ' WHERE e.company_branch_id = ' . $user_branch_id;
		}
		
		$qry = "SELECT e.employee_id, ISNULL(e.employee_code, '') AS employee_code, CONCAT(e.first_name, ' ', e.last_name) AS employee_name,
		e.approval_status, dm.desig_name, e.opening_el, e.opening_sl, e.opening_cl, e.el , e.sl , 
		e.cl, (ISNULL (e.opening_el,0)-ISNULL (e.el,0)) As b_el, (ISNULL (e.opening_sl,0)-ISNULL (e.sl,0)) As b_sl, (ISNULL (e.opening_cl,0)-ISNULL (e.cl,0)) As b_cl FROM employee_mst e
		LEFT JOIN designation_mst dm ON dm.desig_id = e.designation_id ORDER BY e.first_name, e.last_name;";

		$query = $this->db->query($qry);
		return $query->result();
	}

	public function editLeave($employee_id){
	
		$qry = $this->db->query("SELECT em.employee_id, CONCAT(em.first_name, ' ', em.last_name) AS employee_name,
		em.employee_code,dsm.desig_name,ISNULL(em.opening_el, '0') opening_el,ISNULL(em.opening_sl, '0') opening_sl,ISNULL(em.opening_cl, '0') opening_cl, 
		ISNULL(em.el, '0') el,ISNULL(em.sl, '0') sl,ISNULL(em.cl, '0') cl
		 FROM employee_mst em INNER JOIN designation_mst dsm ON
		em.designation_id=dsm.desig_id  WHERE em.active_status=1 AND em.employee_id= ".$employee_id);
		return $qry->row();
		
	}

	public function UpdateLeave($employee_id, $op_el, $op_sl, $op_cl,  $lt_el, $lt_sl, $lt_cl)
	{
		
		$user_id = $this->session->user_id;
		 
		$query = $this->db->query("UPDATE employee_mst SET opening_el= '".floatval($op_el)."', opening_sl= '".floatval($op_sl)."', opening_cl= '".floatval($op_cl)."', 
		el= '".floatval($lt_el)."',sl= '".floatval($lt_sl)."',cl= '".floatval($lt_cl)."',
		updated_by= '".$this->session->user_id."', updated_ts= GETDATE() 
		WHERE employee_id= ".$employee_id);
		return $query;

	

	}
}