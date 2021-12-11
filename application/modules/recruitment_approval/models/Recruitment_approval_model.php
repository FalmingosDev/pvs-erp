<?php
class Recruitment_approval_model extends CI_Model {	
	protected $approverTable = 'recruitment_approver_mst';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function approver_list() {
		 
		$query = $this->db->query(" SELECT rm.recruitment_approver_id,
		  (CASE
			WHEN rm.level=1 THEN 'Level 1'
			ELSE 'Level 2'
		  END) as level,em.first_name +' '+ em.last_name +' - '+ em.employee_code as empname,rm.active_status 
	FROM recruitment_approver_mst rm
	INNER JOIN employee_mst em ON em.employee_id = rm.employee_id 
	ORDER BY rm.level,em.first_name");
		return $query->result();
	}
	
	public function approver1() {
		
		$query = $this->db->query("  SELECT em.employee_id,em.first_name +' '+ em.last_name +' - '+ em.employee_code as empname,
		  dm.desig_id,dm.rank
		  FROM employee_mst em
		  INNER JOIN designation_mst dm ON dm.desig_id = em.designation_id
		  INNER JOIN company_branch_mst cm ON cm.company_branch_id = em.company_branch_id 
		  WHERE dm.rank <= 10;");
		return $query->result();
	}
	public function approver2() {
		
		$query = $this->db->query("  SELECT em.employee_id,em.first_name +' '+ em.last_name +' - '+ em.employee_code as empname,
		  dm.desig_id,dm.rank
		  FROM employee_mst em
		  INNER JOIN designation_mst dm ON dm.desig_id = em.designation_id
		  WHERE dm.rank > 10;");
		return $query->result();
	}
	
	public function addapprover($employee_id) {
		 
		$tot_emp1 = count($employee_id);
		//$tot_emp2 = count($employee_id2);
		
		$user_id = $this->session->user_id;
		//echo $tot_emp1; die;
		
		for($i=0; $i<$tot_emp1; $i++)
		{
			
			if(!empty($employee_id[$i])){
				
				$check_emp = $this->db->query("SELECT employee_id FROM recruitment_approver_mst WHERE employee_id ='". $employee_id[$i] . "'" );
				//echo $check_emp->num_rows(); die;
				$rows = $check_emp->num_rows();
				
					if($rows > 0)
					{
						
						return false;
					}
					else
					{
						
						$query = $this->db->query("INSERT INTO recruitment_approver_mst (level,employee_id,created_by,created_ts) VALUES ('1','".$employee_id[$i]."','".$user_id."',GETDATE())");
						//return true;
					}
					//return true;
				//echo $rows; die;
				//print_r($employee_id[$i]);exit;
								
			}
		}
		
		
		/*for($i=0; $i<$tot_emp2; $i++)
		{
			if(!empty($employee_id2[$i])){
				
				$check_emp = $this->db->query("SELECT employee_id FROM recruitment_approver_mst WHERE employee_id ='". $employee_id2[$i] . "'" );		
					//	echo $aa="SELECT employee_id FROM recruitment_approver_mst WHERE employee_id ='". $employee_id2[$i] . "'";die;
				$rows = $check_emp->num_rows();
				
					if($rows > 0)
					{
						
						return false;
					}
					else
					{
						
				$query = $this->db->query("INSERT INTO recruitment_approver_mst (level,employee_id,created_by,created_ts) VALUES ('2','".$employee_id2[$i]."','".$user_id."',GETDATE())");	
				//return true;
					}
					//return true;
			}
			
		}*/
		return true;
	}	
	
	public function change_status($id,$status){
			//print_r($status); exit;
		$set = ($status == '1') ? 0 : 1 ;
		$where = [ 'recruitment_approver_id' => $id ];

		// print_r($set);die;

		$query = "update " . $this->approverTable . " set active_status=" . $set . " where recruitment_approver_id=" . $id;
		//echo $query;die;
		$res = $this->db->query($query);
		if(!$res) {
			return false;
		} else {
			return true;
		}
	}
	
	
}