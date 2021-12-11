<?php
class User_role_model extends CI_Model {
	protected $roleTable = 'role_mst';
	protected $approverTable = 'client_approver_mst';
	
	public function __construct() {
		parent::__construct();
	}
	
	
	public function resource_list() {
		 
		$query = $this->db->query("SELECT um.user_role_map_id, uum.name+' - '+ uum.username as user_name,
  dm.desig_name,rm.role_name,dms.dept_name,dms.dept_id 
  FROM user_role_mapping um
  INNER JOIN user_mst uum ON uum.employee_id = um.user_id
  INNER JOIN employee_mst em ON em.employee_id = uum.employee_id
  INNER JOIN designation_mst dm ON dm.desig_id = em.designation_id
  INNER JOIN role_mst rm ON rm.role_id = um.role_id  
  INNER JOIN staff_salary_structure_header ssh ON ssh.employee_id = em.employee_id
  INNER JOIN department_mst dms ON dms.dept_id = ssh.department_id;");
		return $query->result();
	}
	
	
	public function role() {
		$query = $this->db->query("select role_id,role_name FROM  role_mst WHERE active_status = 1;");
		return $query->result();
	}
	
	public function delete($id) {
		
		$query = $this->db->query("DELETE FROM  user_role_mapping WHERE user_role_map_id = '".$id."'");
		//return $query->result();
	}
	
	public function userlist() {
		 
		$query = $this->db->query("SELECT em.employee_id user_id,um.name+' - '+um.username as emp_name 
  FROM user_mst um
  INNER JOIN employee_mst em ON em.employee_id = um.employee_id
  WHERE um.active_status = 1 
  AND um.user_id not in (SELECT user_id FROM user_role_mapping) AND (um.username !='012059') ORDER BY um.name;");
		return $query->result();
	}
	
	public function designation($resource_id) {
		 
		$query = $this->db->query("SELECT em.employee_id,em.designation_id,dm.desig_name 
	  FROM employee_mst em
	  INNER JOIN user_mst um ON um.employee_id = em.employee_id
	  INNER JOIN designation_mst dm ON dm.desig_id = em.designation_id = '".$resource_id."';");
		return $query->row();
	}
	
	
	public function addrole($role_id,$resource_id) {
		 //print_r($resource_id);exit;
		 $tot_count = count($resource_id);
		 $user_id = $this->session->user_id;
		 //print_r($tot_count);exit;
		 for($i=0; $i<$tot_count; $i++)
		{
			//print_r ($i);exit;
			$query = $this->db->query("INSERT INTO user_role_mapping (user_id,role_id,created_by,created_ts)			
			VALUES (".$resource_id[$i].",'".$role_id."',".$user_id.",GETDATE())");
					
					 
		}
		
		 return true;
		
	}
	
	 
	
	
	
	
}