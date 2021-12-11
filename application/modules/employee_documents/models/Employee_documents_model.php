<?php
class Employee_documents_model extends CI_Model {
	protected $roleTable = 'role_mst';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function DocUpList($id) {
		
		$query = $this->db->query("select client_id,document_id,document_type,client_id,period,uplode_file,branch_id from client_documents_mst WHERE branch_id is null AND client_id = ".$id);
		return $query->result();
	}	
	
	function ClientName($id){		
		//print_r($id);exit;
		$query = $this->db->query("SELECT employee_id,employee_code,first_name +' '+ last_name as empname FROM  employee_mst WHERE employee_id =  ".$id);
		return $query->row();
	}
	
	
	public function get_up_doc($id) {
		
		$query = $this->db->query("select client_id,document_id,document_type,client_id,period,uplode_file,branch_id from client_documents_mst WHERE branch_id is null AND client_id = ".$id);
		return $query->result();
	}
	public function emplist($id) {
		//print_r($id);exit;
		//$user_id = $this->session->user_id;
		$query = $this->db->query("Select  em.emp_doc_type_id,em.document_no,em.doc_file,em.created_by,em.created_ts,dc.doc_name 
  FROM employee_document_mst em
  INNER JOIN emp_doc_type_mst dc ON dc.emp_doc_type_id = em.emp_doc_type_id
  WHERE em.employee_id= ".$id);
		return $query->result();
	}
	
	public function DocList() {
		
		$query = $this->db->query("  SELECT emp_doc_type_id,doc_name,doc_short_name FROM emp_doc_type_mst WHERE active_status =1");
		return $query->result();
	}
	
	
	public function adddoc($employee_id,$doc_id,$doc_name,$doc_expiry,$uploaded_files,$doc_count)
	{
		$count = $doc_count;
		//$detail_data = '';
		
		$user_id = $this->session->user_id;
		

		for($i=0; $i<$count; $i++)
		{	
			
			$query = $this->db->query("INSERT INTO employee_document_mst (employee_id,emp_doc_type_id,document_no,doc_expiry,doc_file,created_by,created_ts)			
			VALUES (".$employee_id.",'".$doc_id[$i]."','".$doc_name[$i]."','".$doc_expiry[$i]."','".$uploaded_files[$i]."',".$user_id.",GETDATE())");
				
		}
		////echo $this->db->affected_rows(); die;
			$res = $this->db->affected_rows(); 
		//return $query->result_array();
		if(!$res) {
			//echo 'aa'; die;
			return false;
		} else {
			//echo 'bb'; die;
			//return $query->result();
			return true;
			//die;
		}
	}
	
}