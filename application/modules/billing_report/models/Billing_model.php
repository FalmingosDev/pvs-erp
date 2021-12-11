<?php
class Billing_model extends CI_Model 
{
	public function __construct() 
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function getMonth() 
	{
		$query = $this->db->query("Select datename(m,attendance_month)+' '+cast(datepart(yyyy,attendance_month) as varchar) as MonthYear,attendance_month from client_attendance where active_status=1;");
		return $query->result();
	}
	
	public function getClientName() 
	{
		$query = $this->db->query("Select cm.client_name,cm.client_id from client_attendance ca inner join client_mst cm on cm.client_id = ca.client_id where ca.active_status=1 ORDER BY cm.client_name;");
		return $query->result();
	}

	public function getClientBillingMethod($client_id)
	{
		$query = $this->db->query("select billing_method from client_mst where client_id =". $client_id);
	   // echo $this->db->last_query();die;
		return $query->row();
	}

	public function getBranch($client_id)
	{
		$query = $this->db->query("Select distinct c.branch_id,b.branch_name from client_attendance c inner join branch_mst b on b.branch_id = c.branch_id inner join sales_billing_mst sb on sb.branch_id = b.branch_id where c.active_status=1 and c.client_id = ". $client_id);
		//echo $this->db->last_query();die;
		return $query->result_array();
	}

	public function getState($client_id)
	{
		$query = $this->db->query("Select distinct st.state_id,st.state_name from client_attendance c 
		inner join branch_mst b on b.branch_id = c.branch_id 
		inner JOIN state_mst st ON b.state_id = st.state_id
		inner join sales_billing_mst sb on sb.branch_state_id = st.state_id
		where c.active_status=1 and c.client_id = ". $client_id);
		//echo $this->db->last_query();die;
		return $query->result_array();
	}

	public function getBillingList($month,$client_id,$branch_id,$state_id)
	{
		$salary_month = strtotime($month);
		$month=date("m",$salary_month);
		$year=date("Y",$salary_month);
		$billing_method = $this->db->query("select billing_method from client_mst where client_id =". $client_id)->row();
		$billing = $billing_method->billing_method;
		// echo "EXEC billing_report_proc @p_client_id= '". $client_id ."',@p_branch_id= '". $branch_id ."',@p_state_id= '". $state_id ."',@p_year= '". $year ."',@p_month= '". $month ."',@p_billing_method= '". $billing ."' ";
		// die;
		$query = $this->db->query("EXEC billing_report_proc @p_client_id= '". $client_id ."',@p_branch_id= '". $branch_id ."',@p_state_id= '". $state_id ."',@p_year= '". $year ."',@p_month= '". $month ."',@p_billing_method= '". $billing ."' " );
		//echo $this->db->last_query();
		return $query->result();
		
	}
 	
}
