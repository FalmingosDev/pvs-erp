<?php
class Branch_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_all_bank($client_id) {
		//echo $client_id; die;
		$query = $this->db->query("SELECT bm.branch_id,bm.client_id,bm.branch_name,bm.contact_no,bm.email,sm.state_name,ct.city_name 
  FROM branch_mst bm
  INNER JOIN state_mst sm ON sm.state_id = bm.state_id
  INNER JOIN city_mst ct ON ct.city_id = bm.city_id
  WHERE bm.client_id =".$client_id);
		return $query->result();
	}
	
	public function get_branch_edit($client_id,$branch_id) {
		
		$query = $this->db->query("SELECT bm.branch_id,bm.client_id,bm.branch_name,bm.address_1,bm.address_2,bm.address_3,bm.fax,
  bm.contact_no,bm.state_id,sm.state_name,bm.email,bm.email,cm.city_name,bm.sole_id,bm.pincode,
  bm.approved_by,bm.remarks,bm.city_id,bm.branch_code,bm.branch_category    
  FROM branch_mst bm
  INNER JOIN state_mst sm ON sm.state_id = bm.state_id
  INNER JOIN city_mst cm ON cm.city_id = bm.city_id
  WHERE bm.client_id =".$client_id. " AND bm.branch_id = ".$branch_id);
		return $query->row();
	}
	
	public function editBranchContact($id){
		//echo $aa ="SELECT branch_contact_id,client_id,branch_id,name,designation,contact_no,email,birth_date,anniversary_date FROM branch_contact_mst where active_status=1 and branch_id =".$id; die;
			$qry = $this->db->query("SELECT branch_contact_id,client_id,branch_id,name,designation,contact_no,email,birth_date,anniversary_date FROM branch_contact_mst where active_status=1 and branch_id =".$id);
			return $qry->result_array();
			
		}
	
	function ClientName($id){
		
		$query = $this->db->query("Select client_id,client_code,client_name, ISNULL(submit_for_approval, 0) submit_for_approval from client_mst WHERE client_id = ".$id);
		return $query->row();
	}
	
	function Clienttype($id){
		/*echo $aa= "Select client_id,location_type from client_mst WHERE client_id = ".$id; die;*/
		$query = $this->db->query("Select client_id,location_type from client_mst WHERE client_id = ".$id);
		return $query->row();
	}
	
	
	function getBranchId($clientId){
		$query = $this->db->query("SELECT branch_id FROM branch_mst WHERE client_id = ".$clientId);
		return $query->row();
	}

	public function get_all_state() {
		$query = $this->db->query("Select state_id,state_name from state_mst where active_status=1 ORDER BY state_name;");
		return $query->result();
	}

	
	public function getCity($state_id) {
		$query = $this->db->query("Select city_id,city_name from city_mst where state_id='". $state_id ."' and active_status=1 ORDER BY city_name;");
		
		return $query->result_array();
	}
	
	public function get_all_branch_category()
	{   
		$query = $this->db->query("Select lookup_id,lookup_desc from lookup_table where active_status=1 and lookup_type='BRANCH_CATEGORY' ORDER BY serial_no;");
		
		return $query->result_array();
	}

	public function insertBranch($client_id,$address_line_1,$branch_name,$address_line_2,$fax,$address_line_3,$cont_no,$state_id,$client_email,$city_id,$sole_id,$pincode,$app_by,$name,$designation,$contact_no,$email,$birthday,$anniversary,$remarks,$branch_code,$branch_category_id)
	{
		$tot_name = count($name);
		$detail_data = '';
		//$new_birthday = date("Y-m-d", strtotime($birthday));

		for($i=0; $i<$tot_name; $i++)
		{
			if(!empty($name[$i]) && !empty($designation[$i]) && !empty($contact_no[$i]))
				{
			$detail_data .= escape_str($name[$i]).'|~|'.escape_str($designation[$i]).'|~|'.$contact_no[$i].'|~|'.$email[$i].'|~|'.'2000-'.$birthday[$i].'|~|'.'2000-'.$anniversary[$i].'#';
				}
		} 
		//print_r($detail_data);die;
		 $detail_data = rtrim($detail_data, "#");

		 //print_r($client_id);die;


		$user_id = $this->session->user_id;
		
		$query = $this->db->query("EXEC add_branch_proc @p_client_id='".$client_id."',@p_address_1='".escape_str($address_line_1)."',@p_address_2='".escape_str($address_line_2)."',@p_address_3='".escape_str($address_line_3)."',@p_branch='".escape_str($branch_name)."',@fax='".$fax."',@p_cont_no='".$cont_no."',@p_state_id='".$state_id."',@p_client_email='".$client_email."',@p_city_id='".$city_id."',@p_sole_id='".$sole_id."',@p_pincode='".$pincode."',@p_app_by='".escape_str($app_by)."',@p_remarks='".escape_str($remarks)."',@p_user_id = '".$user_id."', @p_detail_data = '". $detail_data."',@p_branch_code = '". $branch_code."',@p_branch_category = '". $branch_category_id."'");

		
		return $query->result();
	}
	
	public function updateBranch($client_id,$branch_id,$detail_id,$address_line_1,$branch_name,$address_line_2,$fax,$address_line_3,$cont_no,$state_id,$client_email,$city_id,$sole_id,$pincode,$app_by,$name,$designation,$contact_no,$email,$birthday,$anniversary,$remarks,$branch_code,$branch_category_id)
	{
		$tot_name = count($name);
		$detail_data = '';
		//$new_birthday = date("Y-m-d", strtotime($birthday));

		for($i=0; $i<$tot_name; $i++)
		{
			if(!empty($name[$i]) && !empty($designation[$i]) && !empty($contact_no[$i]))
				{
			$detail_data .= $detail_id[$i].'|~|'.escape_str($name[$i]).'|~|'.escape_str($designation[$i]).'|~|'.$contact_no[$i].'|~|'.$email[$i].'|~|'.'2000-'.$birthday[$i].'|~|'.'2000-'.$anniversary[$i].'#';
				}
		}
		//print_r($detail_data);die;
		 $detail_data = rtrim($detail_data, "#");

		 //print_r($client_id);die;


		$user_id = $this->session->user_id;
		
		
		
		$query = $this->db->query("EXEC edit_branch_proc @p_client_id='".$client_id."',@p_branch_id='".$branch_id."',@p_address_1='".escape_str($address_line_1)."',@p_address_2='".escape_str($address_line_2)."',@p_address_3='".escape_str($address_line_3)."',@p_branch='".escape_str($branch_name)."',@fax='".$fax."',@p_cont_no='".$cont_no."',@p_state_id='".$state_id."',@p_client_email='".$client_email."',@p_city_id='".$city_id."',@p_sole_id='".$sole_id."',@p_pincode='".$pincode."',@p_app_by='".escape_str($app_by)."',@p_remarks='".escape_str($remarks)."',@p_user_id = '".$user_id."', @p_detail_data = '". $detail_data."',@p_branch_code = '". $branch_code."',@p_branch_category = '". $branch_category_id."'");

		
		return $query->result();
	}
	
	
	public function checkBranchName($branch_name,$client_id){
		
		$condition = '';
		if(!empty($client_id)){
			$condition = " AND client_id = '" . $client_id . "'";
		}
		
		//$aa= "select branch_name from branch_mst where branch_name='". $branch_name . "'" . $condition;
		// echo $aa; die;
		$check_branch = $this->db->query("select branch_name from branch_mst where branch_name='". $branch_name . "'" . $condition);
		$rows = $check_branch->num_rows();
		//echo $rows; die;
		if($rows > 0)
		{
			return true;
		}
		else
		{
			//echo $rows;die;
			return false;
		}
	}


}

