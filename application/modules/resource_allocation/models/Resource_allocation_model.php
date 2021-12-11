<?php
class Resource_allocation_model extends CI_Model {
	protected $roleTable = 'role_mst';
	protected $approverTable = 'client_approver_mst';
	
	public function __construct() {
		parent::__construct();
	}
	
	
	public function resource_list() {

		$query = $this->db->query("  SELECT cam.resource_allocation_id , cam.effective_start_date,cam.effective_end_date,cam.active_status,
  cm.client_name, em.first_name+' ' +em.last_name+' - '+ em.employee_code as emp_name, dm.desig_name,bm.branch_name
  FROM client_resource_allocation cam
  INNER JOIN client_mst cm ON cm.client_id = cam.client_id
  INNER JOIN employee_mst em ON em.employee_id = cam.employee_id 
  INNER JOIN designation_mst dm ON dm.desig_id = em.designation_id  
  INNER JOIN branch_mst bm ON bm.branch_id = cam.branch_id
  WHERE cam.active_status = 1  ORDER BY cm.client_name,em.first_name;");
		return $query->result();
	}

	public function resource_search($client_id) {

		if ($client_id != ''){
      		$query = " and cm.client_id = '".$client_id."' ";
      
    	}
		 
		$query = $this->db->query("SELECT cam.resource_allocation_id , cam.effective_start_date,cam.effective_end_date,cam.active_status,
  cm.client_name, em.first_name+' ' +em.last_name+' - '+ em.employee_code as emp_name, dm.desig_name,bm.branch_name
  FROM client_resource_allocation cam
  INNER JOIN client_mst cm ON cm.client_id = cam.client_id
  INNER JOIN employee_mst em ON em.employee_id = cam.employee_id 
  INNER JOIN designation_mst dm ON dm.desig_id = em.designation_id  
  INNER JOIN branch_mst bm ON bm.branch_id = cam.branch_id
  WHERE cam.active_status = 1 ". $query ." ORDER BY cm.client_name,em.first_name;");
		return $query->result();
	}
	
	
	public function client() {
		 
		$query = $this->db->query("select client_id,client_name FROM  client_mst WHERE  active_status = 1;");
		return $query->result();

		//approval_status_1 = 'A' AND approval_status_2 = 'A'  AND
	}
	
	public function client_edit($url_client_id) {
		 
		$query = $this->db->query("select client_id,client_name FROM  client_mst WHERE approval_status_1 = 'A' AND approval_status_2 = 'A'  AND active_status = 1 where client_id = '".$url_client_id."'");
		return $query->result();
	}
	
	public function resourcelist() {
		 
		$query = $this->db->query("SELECT employee_id, employee_code, first_name+' '+ last_name+' - '+employee_code as emp_name FROM employee_mst WHERE active_status = 1 AND job_type = 'C';");
		return $query->result();
	}
	
	public function designation($resource_id) {
		/* echo "SELECT em.employee_id,em.designation_id,dm.desig_name,dms.dept_name,dms.dept_id 
	  FROM employee_mst em
	  INNER JOIN user_mst um ON um.employee_id = em.employee_id
	  INNER JOIN designation_mst dm ON dm.desig_id = em.designation_id
	  LEFT JOIN staff_salary_structure_header ssh ON ssh.employee_id = em.employee_id
	  INNER JOIN department_mst dms ON dms.dept_id = ssh.department_id
	  WHERE em.employee_id = '".$resource_id."';"; die;*/

		$query = $this->db->query("SELECT em.employee_id,em.designation_id,dm.desig_name,dms.dept_name,dms.dept_id 
	  FROM employee_mst em
	  INNER JOIN designation_mst dm ON dm.desig_id = em.designation_id
	  LEFT JOIN staff_salary_structure_header ssh ON ssh.employee_id = em.employee_id
	  LEFT JOIN department_mst dms ON dms.dept_id = ssh.department_id
	  WHERE em.employee_id = '".$resource_id."' And em.active_status=1;");
		return $query->result_array();

	}
	
	
	public function resourcedoc($client_id,$branch_id,$std_to_date,$end_to_date,$resource_id,$designat_id) {
		 
		 $tot_count = count($resource_id);
		 $user_id = $this->session->user_id;
		 //print_r($client_id);exit;
		 for($i=0; $i<$tot_count; $i++)
		{
			
			$check_resourc = $this->db->query("SELECT employee_id FROM client_resource_allocation WHERE effective_start_date >= '".$std_to_date."' AND effective_end_date <= '".$end_to_date."' AND employee_id= '".$resource_id[$i]."' " );
				//echo $check_resourc->num_rows(); die;
			$rows = $check_resourc->num_rows();
			if($rows > 0)
					{
						
						return false;
					}
					else
					{
			$query = $this->db->query("INSERT INTO client_resource_allocation (employee_id,effective_start_date,effective_end_date,client_id,branch_id,created_by,created_ts)			
			VALUES (".$resource_id[$i].",'".$std_to_date."','".$end_to_date."',
			'".$client_id."','".$branch_id."',".$user_id.",GETDATE())");
					}
					 
		}
		
		 return true;
		
	}
	
	public function resourceedit($std_to_date,$end_to_date,$id,$emp_id) {
		 
		 $tot_count = 1;
		 $user_id = $this->session->user_id;
		 //print_r($client_id);exit;
		 /*for($i=0; $i<$tot_count; $i++)
		{
			//echo $aa = ""; die;
			$check_resourc = $this->db->query("SELECT employee_id FROM client_resource_allocation WHERE effective_start_date >= '".$std_to_date."' AND effective_end_date <= '".$end_to_date."' AND employee_id= '".$emp_id."' " );
				//echo $check_resourc->num_rows(); die;
			$rows = $check_resourc->num_rows();
			//echo $rows;die;
			if($rows > 0)
					{
						
						return false;
					}
					else
					{*/
						
			$query = $this->db->query("UPDATE client_resource_allocation SET effective_start_date = '".$std_to_date."',effective_end_date ='".$end_to_date."',updated_by= ".$user_id.",updated_ts=GETDATE() WHERE resource_allocation_id = ".$id."");
			return true;
					//}
		//}
		
		
	}
	
	
	public function get_edit_data($id) {
		 
		$query = $this->db->query("SELECT cam.resource_allocation_id , cam.effective_start_date,cam.effective_end_date,cam.active_status,cm.client_id,cam.employee_id,bm.branch_name,
  cm.client_name, em.first_name+' ' +em.last_name+' - '+employee_code as emp_name, dm.desig_name
  FROM client_resource_allocation cam
  INNER JOIN client_mst cm ON cm.client_id = cam.client_id
  INNER JOIN employee_mst em ON em.employee_id = cam.employee_id 
  INNER JOIN designation_mst dm ON dm.desig_id = em.designation_id
  INNER JOIN branch_mst bm ON bm.branch_id = cam.branch_id
  WHERE cam.active_status = 1  
  AND cam.resource_allocation_id = '".$id."' 
  ORDER BY cm.client_name,em.first_name");
		return $query->row();
	}
	
	public function branch_list($client_id) {
		
		//echo $aa=""; die;
		$query = $this->db->query("SELECT branch_id,branch_name FROM branch_mst WHERE client_id= ".$client_id."");
		
		return $query->result_array();
	}
	
	
}