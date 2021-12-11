<?php
class Staff_model extends CI_Model {
	
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
			$branch_condition = ' AND e.company_branch_id = ' . $user_branch_id;
		}
		$qry = "SELECT cm.branch_name,e.employee_id, ISNULL(e.employee_code, '') AS employee_code, CONCAT(e.first_name, ' ', e.last_name) AS employee_name, e.dob, e.doj, e.approval_status, 
		ISNULL(ed.employee_detail_id, 0) employee_detail_id, ISNULL(q.qualification_name, '') qualification, ISNULL(ed.gun_license_expiry_date, '') gun_license_expiry_date, ISNULL(ed.driving_license_renewal_date, '') driving_license_renewal_date, ISNULL(ed.accidental_contact_name, '') accidental_contact_name, ISNULL(ed.accidental_contact_no, '') accidental_contact_no, dm.desig_name,sh.salary_structure_id 
		FROM employee_mst e
		LEFT JOIN employee_detail_mst ed ON e.employee_id = ed.employee_id
		LEFT JOIN qualification_mst q ON q.qualification_id = ed.qualification_id
		LEFT JOIN staff_salary_structure_header sh ON sh.employee_id=e.employee_id AND sh.salary_structure_id = (SELECT MAX(sh2.salary_structure_id) FROM staff_salary_structure_header sh2 WHERE sh2.employee_id = sh.employee_id)
		LEFT JOIN designation_mst dm ON dm.desig_id = e.designation_id INNER JOIN company_branch_mst cm ON cm.company_branch_id = e.company_branch_id WHERE e.job_type='G' or e.job_type='B'
		" . $branch_condition . "
		ORDER BY e.first_name, e.last_name;";
		
		$query = $this->db->query($qry);
		return $query->result();
	}

	

}

