<?php
class Leave_approver_model extends CI_Model {
	protected $leTable = 'leave_approver';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function approver_list() {
		 
		$query = $this->db->query("SELECT la.leave_approver_id,em.first_name +' '+ em.last_name +' - '+ em.employee_code as empname,dm.dept_name,
		(CASE
					WHEN la.approver_level=1 THEN 'Level 1'
					WHEN la.approver_level=2 THEN 'Level 2'
					ELSE 'Level 3'
		END) as level,la.active_status,la.leave_approver_id
		FROM leave_approver la
		INNER JOIN employee_mst em ON em.employee_id = la.employee_id
		INNER JOIN department_mst dm ON dm.dept_id = la.department_id
		ORDER BY dm.dept_name,la.approver_level,em.first_name");
		return $query->result();
	}
	
	public function department() {
		 
		$query = $this->db->query(" SELECT dept_id,dept_name FROM department_mst WHERE active_status = 1  ORDER BY dept_name ASC ");
		return $query->result();
	}
	
	public function approver1($department_id) {
		//print_r($department_id);exit;
		$query = $this->db->query("SELECT em.employee_id, em.first_name +' '+ em.last_name +' - '+ em.employee_code as empname,
			dm.department_id
			FROM employee_mst em
			INNER JOIN staff_salary_structure_header dm ON dm.employee_id = em.employee_id
			WHERE dm.department_id = ".$department_id." 
			AND em.job_type ='G' AND em.approval_status = 'A'
			AND NOT EXISTS(
				SELECT 1 FROM leave_approver la WHERE la.employee_id = em.employee_id AND la.department_id = ".$department_id."
			) ORDER BY 2 ;");
		return $query->result();
	}
	public function approver2($department_id) {
		
		$query = $this->db->query("SELECT em.employee_id,em.first_name +' '+ em.last_name +' - '+ em.employee_code as empname,
			dm.desig_id,dm.rank
			FROM employee_mst em
			INNER JOIN designation_mst dm ON dm.desig_id = em.designation_id
			INNER JOIN staff_salary_structure_header sth ON sth.employee_id = em.employee_id
			WHERE sth.department_id != ".$department_id." AND dm.rank <= 10
			AND em.job_type ='G' AND em.approval_status = 'A'
			AND NOT EXISTS(
				SELECT 1 FROM leave_approver la WHERE la.employee_id = em.employee_id AND la.department_id = ".$department_id." 
			) ORDER BY 2 ;");
		return $query->result();
	}
	
	public function approver3($department_id) {
		
		$query = $this->db->query("SELECT DISTINCT em.employee_id,em.first_name +' '+ em.last_name +' - '+ em.employee_code as empname,
			dm.desig_id,dm.rank
			FROM employee_mst em
			INNER JOIN designation_mst dm ON dm.desig_id = em.designation_id
			INNER JOIN staff_salary_structure_header sth ON sth.employee_id = em.employee_id
			WHERE sth.department_id != ".$department_id." AND dm.rank > 10
			AND em.job_type ='G' AND em.approval_status = 'A'
			AND NOT EXISTS(
				SELECT 1 FROM leave_approver la WHERE la.employee_id = em.employee_id AND la.department_id = ".$department_id." 
			) ORDER BY 2 ;");
		return $query->result();
	}
	
	public function addleave($employee_id,$employee_id2,$employee_id3,$department_id) 
	{
		
		
		// die;	
		// echo "<pre>";
		// print_r($employee_id);
		// echo "<pre>";
		// print_r($employee_id2);
		// echo "<pre>";
		// print_r($employee_id3);
		// echo "<pre>";
		// echo $department_id;
		
		$tot_emp1 = count(array_filter($employee_id));
		$tot_emp2 = count(array_filter($employee_id2));
		$tot_emp3 = count(array_filter($employee_id3));
		
		// echo "<pre>";
		// echo $tot_emp1;
	
		// echo "<pre>";
		// echo $tot_emp2;
		
		// echo "<pre>";
		// echo $tot_emp3;
		// exit;
		$user_id = $this->session->user_id;

		for($i=0; $i<$tot_emp1; $i++)
		{
			
			if(!empty($employee_id[$i])){
						$query = $this->db->query("INSERT INTO leave_approver (department_id,employee_id,approver_level,created_by,created_ts) VALUES ('".$department_id."','".$employee_id[$i]."','1','".$user_id."',GETDATE())");
			}
		}
		
		
		for($i=0; $i<$tot_emp2; $i++)
		{
			if(!empty($employee_id2[$i])){	

									
						$query = $this->db->query("INSERT INTO leave_approver (department_id,employee_id,approver_level,created_by,created_ts) VALUES ('".$department_id."','".$employee_id2[$i]."','2','".$user_id."',GETDATE())");	
			}
		}
		
		for($i=0; $i<$tot_emp3; $i++)
		{
			// echo $test="INSERT INTO leave_approver (department_id,employee_id,approver_level,created_by,created_ts) VALUES ('".$department_id."','".$employee_id3[$i]."','3','".$user_id."',GETDATE())";
			// die();
			if(!empty($employee_id3[$i])){
						$query = $this->db->query("INSERT INTO leave_approver (department_id,employee_id,approver_level,created_by,created_ts) VALUES ('".$department_id."','".$employee_id3[$i]."','3','".$user_id."',GETDATE())");
			}
		}		
		
		return true;
	}	
	
	public function status($id,$status){
        $set = ($status == '1') ? 0 : 1 ;
        $where = [ 'leave_approver_id' => $id ];

        $query = "update " . $this->leTable . " set active_status=" . $set . " where leave_approver_id=" . $id;
        $res = $this->db->query($query);
        if(!$res) {
            return false;
        } else {
            return true;
        }
    }
	
	
}