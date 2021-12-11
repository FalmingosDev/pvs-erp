<?php

class Supp_payroll_model extends CI_Model {

  protected $table_name = 'company_branch_mst';

  public function __construct() {
    parent::__construct();
  }

    public function client_attendance_list() {
    
    $qry = "select bm.branch_name,ca.client_supp_attendance_id,datename(m,ca.attendance_month)+' '+cast(datepart(yyyy,ca.attendance_month) as varchar) as MonthYear,ca.duty,ca.wo,ca.leave,ca.ph,ca.ot,cm.client_name, concat(em.employee_code, ' - ', em.first_name, ' ', em.last_name) as employee_name,dm.desig_name,ca.salary_processed_flag, ca.approval_required, ISNULL(ca.approval_status, '') approval_status 
  from client_supp_attendance ca 
  inner join client_mst cm on ca.client_id = cm.client_id 
  inner join branch_mst bm on ca.branch_id = bm.branch_id
  inner join employee_mst em on ca.employee_id = em.employee_id 
  inner join designation_mst dm on ca.designation_id = dm.desig_id where ca.pay_process_flag = 0";
    
    $query = $this->db->query($qry);
    return $query->result();
  }

  public function client_attendance_search($month,$client_id,$branch_id)
  {
    $query = '';
    if($month != '')
    {
      $query .= " and ca.attendance_month = '".$month."'";
    }

    if($client_id != '')
    {
      $query .= " and ca.client_id = '".$client_id."'";
    }

    if($branch_id != '')
    {
      $query .= " and ca.branch_id = '".$branch_id."'";
    }

    $query = $this->db->query("select bm.branch_name,ca.client_supp_attendance_id,datename(m,ca.attendance_month)+' '+cast(datepart(yyyy,ca.attendance_month) as varchar) as MonthYear,ca.duty,ca.wo,ca.leave,ca.ph,ca.ot,cm.client_name, concat(em.employee_code, ' - ', em.first_name, ' ', em.last_name) as employee_name,dm.desig_name,ca.salary_processed_flag, ca.approval_required, ISNULL(ca.approval_status, '') approval_status 
	from client_supp_attendance ca 
	inner join client_mst cm on ca.client_id = cm.client_id 
   inner join branch_mst bm on ca.branch_id = bm.branch_id
	inner join employee_mst em on ca.employee_id = em.employee_id 
	inner join designation_mst dm on ca.designation_id = dm.desig_id where ca.pay_process_flag = 0". $query);
    //echo $this->db->last_query();die;
    return $query->result_array();
  }

  public function processPayroll($month, $client_id,$branch_id){
    //echo "1";die;
    $user_id = $this->session->user_id;

    $query = $this->db->query("EXEC processSuppPayroll_proc @p_month = '".$month."', @p_client_id='". $client_id ."', @p_branch_id='". $branch_id ."', @p_user_id = '".$user_id."'");

    //echo $this->db->last_query();die;

    return $query;

  }

  public function getBranch($client_id) {
    $query = $this->db->query("Select distinct bm.branch_id,bm.branch_name from branch_mst bm inner join client_supp_attendance ca on ca.branch_id = bm.branch_id where ca.active_status=1 and ca.client_id='". $client_id ."' ORDER BY branch_name;");
    //echo $this->db->last_query();die;
    return $query->result_array();
  }
}
