<?php

class Client_attendance_model extends CI_Model {

  protected $table_name = 'company_branch_mst';

  public function __construct() {
    parent::__construct();
  }

  public function get_all_client(){
    //$query = $this->db->query("select client_id,client_name from client_mst where active_status=1 and approval_status_1='A' and approval_status_2='A';");
    $query = $this->db->query("select client_id,client_name from client_mst where active_status=1;");
    return $query->result();
  }

  public function getBranch($client_id) {
    $query = $this->db->query("Select branch_id,branch_name from branch_mst where active_status=1 and client_id='". $client_id ."' ORDER BY branch_name;");
    return $query->result_array();
  }

  public function getBranchSubmit($client_id) 
  {
    $query = $this->db->query("Select branch_id,branch_name from branch_mst where active_status=1 and client_id='". $client_id ."' ORDER BY branch_name;");
    return $query->result();
  }

  public function getEmployee($client_id,$branch_id){
    $query = $this->db->query("select em.employee_id, concat(em.employee_code, ' - ', em.first_name, ' ', em.last_name) as employee_name from client_resource_allocation ca inner join employee_mst em on em.employee_id=ca.employee_id where em.job_type='C' and em.active_status=1 and ca.client_id=". $client_id ." and ca.branch_id=". $branch_id);
   return $query->result_array();
  }

  public function getNewEmployee($client_id,$branch_id){
    $query = $this->db->query("select em.employee_id, concat(em.employee_code, ' - ', em.first_name, ' ', em.last_name) as employee_name from employee_mst em left join client_resource_allocation ca on em.employee_id=ca.employee_id where em.job_type='C' and em.active_status=1 and em.employee_id NOT IN(select employee_id from client_resource_allocation where client_id=". $client_id ." and branch_id=". $branch_id .")");
    return $query->result_array();
  }

  public function getDesignation($client_id) {
    $query = $this->db->query("Select distinct d.desig_id,d.desig_name from designation_mst d inner join billing_costing_header bh on d.desig_id = bh.post_id where d.active_status=1 and bh.client_id='". $client_id ."' ORDER BY d.desig_name;");
    //echo $this->db->last_query();die;
    return $query->result_array();
  }

  public function getClient($client_id) {
    $query = $this->db->query("SELECT client_name from client_mst where client_id=". $client_id);
    return $query->row();
  }

  public function getEmployeeDet($emp_id) {
    $query = $this->db->query("SELECT employee_code,concat(first_name, ' ',last_name) as employee_name,father_name from employee_mst where employee_id=". $emp_id);
    return $query->row();
  }

    public function getLocation($branch_id) {
    $query = $this->db->query("SELECT branch_name from branch_mst where branch_id=". $branch_id);
    return $query->row();
  }

  public function getDesignationDet($designation_id) {
    $query = $this->db->query("SELECT desig_name from designation_mst where desig_id=". $designation_id);
    return $query->row();
  }

  public function getBillingCosting($client_id,$designation_id) {
    $query = $this->db->query("SELECT top 1 bill_calculation_days,duty_hrs,commencement_date from billing_costing_header where client_id=". $client_id ." and post_id=" . $designation_id . " and status='Active' and GETDATE() > commencement_date order by commencement_date desc");
    return $query->row();
  }

  public function insertClientAttendance($attendance_month,$client_id,$branch_id,$employee_id,$flag,$designation_id,$calculation_days,$duty_hrs,$duty,$w_o,$leave,$el,$fl,$c_o,$ph,$advance_deduct,$loan_deduct,$uniform_deduct,$fine_deduct,$other_deduct,$ot,$na_duty,$na) {
    //echo $half_day;die;
    $user_id = $this->session->user_id;
    $final_attendance_month = date("Y-m-d", strtotime($attendance_month));
    
    $query = $this->db->query("EXEC add_client_attendance_proc @p_client_id = '".$client_id."', @p_branch_id='". $branch_id ."', @p_employee_id = '".$employee_id."' , @p_flag = '".$flag."', @p_designation_id = '".$designation_id."', @p_attendance_month = '".$final_attendance_month."' ,@p_calculation_days = '".$calculation_days."' , @p_duty_hrs = '".floatval($duty_hrs)."', @p_duty = '".floatval($duty)."', @p_wo = '".floatval($w_o)."', @p_leave = '".floatval($leave)."', @p_el = '".floatval($el)."', @p_fl = '".floatval($fl)."', @p_co = '".floatval($c_o)."', @p_ph = '".floatval($ph)."', @p_ot = '".floatval($ot)."', @p_na_duty = '".floatval($na_duty)."', @p_na = '".floatval($na)."', @p_advance_deduct = '".floatval($advance_deduct)."', @p_loan_deduct = '".floatval($loan_deduct)."', @p_other_deduct = '".floatval($other_deduct)."', @p_uniform_deduct = '".floatval($uniform_deduct)."', @p_fine_deduct = '".floatval($fine_deduct)."', @p_user_id = '".$user_id."'");
    //echo $this->db->last_query();die;

    
    return $query;
  }

  public function getAdvance($emp_id) {
   // $query = $this->db->query("SELECT balance,emi from employee_loan where employee_id=". $emp_id ." and active_status=1 and type='A'");
    $query = $this->db->query("SELECT COUNT(1) cnt, ISNULL(SUM(balance), 0) balance, ISNULL(SUM(emi),0) emi FROM employee_loan WHERE employee_id = ". $emp_id ." AND type='A' AND deduction_date <= getdate() AND active_status = 1;");
    //echo $this->db->last_query();die;
    return $query->row();
  }

  public function getLoan($emp_id) {
    $query = $this->db->query("SELECT COUNT(1) cnt, ISNULL(SUM(balance), 0) balance, ISNULL(SUM(emi),0) emi FROM employee_loan WHERE employee_id = ". $emp_id ." AND type='L' AND deduction_date <= getdate() AND active_status = 1;");
    return $query->row();
  }

    public function getMisc($emp_id) {
    $query = $this->db->query("SELECT COUNT(1) cnt, ISNULL(SUM(balance), 0) balance, ISNULL(SUM(emi),0) emi FROM employee_loan WHERE employee_id = ". $emp_id ." AND type='O' AND deduction_date <= getdate() AND active_status = 1;");
    return $query->row();
  }

  public function client_attendance_list() {
    
    $qry = "select ca.client_attendance_id,datename(m,ca.attendance_month)+' '+cast(datepart(yyyy,ca.attendance_month) as varchar) as MonthYear,ca.duty,ca.wo,ca.leave,ca.ph,ca.ot,cm.client_name, concat(em.employee_code, ' - ', em.first_name, ' ', em.last_name) as employee_name,dm.desig_name,ca.salary_processed_flag, ca.approval_required, ISNULL(ca.approval_status, '') approval_status 
	from client_attendance ca 
	inner join client_mst cm on ca.client_id = cm.client_id 
	inner join employee_mst em on ca.employee_id = em.employee_id 
	inner join designation_mst dm on ca.designation_id = dm.desig_id";
    
    $query = $this->db->query($qry);
    return $query->result();
  }

  public function getClientName() {
    $query = $this->db->query("Select cm.client_name,cm.client_id from client_attendance ca inner join client_mst cm on cm.client_id = ca.client_id where ca.active_status=1 ORDER BY cm.client_name;");
    return $query->result();
  }

  public function getMonth() {
    $query = $this->db->query("Select datename(m,attendance_month)+' '+cast(datepart(yyyy,attendance_month) as varchar) as MonthYear,attendance_month from client_attendance where active_status=1;");
    return $query->result();
  }

  public function client_attendance_search($month,$client_id)
  {
    if ($month != '' && $client_id != ''){
      $query = " where ca.attendance_month = '".$month."' and ca.client_id = '".$client_id."' ";
      
    }

    else if ($month == '' && $client_id != ''){
      $query = " where ca.client_id = '".$client_id."'";
      
    }
    else if ($month != '' && $client_id == ''){
      $query = " where ca.attendance_month = '".$month."'";
      
    }
    else
    {
      $query = ' where 1=1';
    }
    $query = $this->db->query("select ca.client_attendance_id,datename(m,ca.attendance_month)+' '+cast(datepart(yyyy,ca.attendance_month) as varchar) as MonthYear,ca.duty,ca.wo,ca.leave,ca.ph,ca.ot,cm.client_name, concat(em.employee_code, ' - ', em.first_name, ' ', em.last_name) as employee_name,dm.desig_name,ca.salary_processed_flag, ca.approval_required, ISNULL(ca.approval_status, '') approval_status 
	from client_attendance ca 
	inner join client_mst cm on ca.client_id = cm.client_id 
	inner join employee_mst em on ca.employee_id = em.employee_id 
	inner join designation_mst dm on ca.designation_id = dm.desig_id". $query);
    //echo $this->db->last_query();die;
    return $query->result();
  }

  public function getClientDetails($id){
      $qry = $this->db->query("SELECT ca.employee_id,ca.client_attendance_id,datename(m,ca.attendance_month)+' '+cast(datepart(yyyy,ca.attendance_month) as varchar) as MonthYear,bm.branch_name,ca.calculation_days,ca.duty_hrs,ca.duty,ca.wo,ca.leave,ISNULL(ca.el,'0.00') el,ca.fl,ca.co,ca.ph,ca.ot,ca.na_duty,ca.na,ca.advance_deduct,ca.loan_deduct,ca.other_deduct,ca.uniform_deduct,ca.fine_deduct,cm.client_name, concat(em.employee_code, ' - ', em.first_name, ' ', em.last_name) as employee_name,dm.desig_name,em.father_name from client_attendance ca inner join client_mst cm on ca.client_id = cm.client_id inner join employee_mst em on ca.employee_id = em.employee_id inner join designation_mst dm on ca.designation_id = dm.desig_id inner join branch_mst bm on ca.branch_id = bm.branch_id where ca.client_attendance_id=".$id);
      //echo $this->db->last_query();die;
      return $qry->row();
      
    }

    public function UpdateClientAttendance($client_attendance_id,$duty,$w_o,$leave,$el,$fl,$c_o,$ph,$advance_deduct,$loan_deduct,$uniform_deduct,$fine_deduct,$other_deduct,$ot,$na_duty,$na) 
    {
    //echo $half_day;die;
    $user_id = $this->session->user_id;
    
    $query = $this->db->query("EXEC edit_client_attendance_proc @p_client_attendance_id = '". $client_attendance_id ."' ,@p_duty = '".floatval($duty)."', @p_wo = '".floatval($w_o)."', @p_leave = '".floatval($leave)."', @p_el = '".floatval($el)."', @p_fl = '".floatval($fl)."', @p_co = '".floatval($c_o)."', @p_ph = '".floatval($ph)."', @p_ot = '".floatval($ot)."', @p_na_duty = '".floatval($na_duty)."', @p_na = '".floatval($na)."', @p_advance_deduct = '".floatval($advance_deduct)."', @p_loan_deduct = '".floatval($loan_deduct)."', @p_other_deduct = '".floatval($other_deduct)."', @p_uniform_deduct = '".floatval($uniform_deduct)."', @p_fine_deduct = '".floatval($fine_deduct)."', @p_user_id = '".$user_id."'");
    //echo $this->db->last_query();die;

    
    return $query;
  }
  
	public function check_approval_permission(){
		$query = $this->db->query("SELECT COUNT(1) has_permission FROM client_approver_mst WHERE employee_id = '" . $this->session->employee_id . "' AND active_status = 1;");
		return $query->row();
	}
	public function updateAttendanceApproval($client_attendance_id, $approval_remarks, $action) {
		$query = $this->db->query("EXEC update_attendance_approval_proc @p_client_attendance_id = '". $client_attendance_id ."', @p_approval_remarks = '".$approval_remarks."', @p_action = '".$action."', @p_user_id = '". $this->session->user_id ."';");
		//exit($this->db->last_query());
		return $query;
	}

  public function salary_process_month()
  {
    $query = $this->db->query("select datename(m,month)+' '+cast(datepart(yyyy,month) as varchar) as MonthYear,month from salary_process_month 
    where active_status=1");
    return $query->row();
  }
  public function attendance_list($client_id,$branch_id,$attendance_month)
  {

    $query = $this->db->query("select concat(em.employee_code, ' - ', em.first_name, ' ', em.last_name) as employee_name,dm.desig_name,ca.duty
    from client_attendance ca
    inner join employee_mst em on em.employee_id=ca.employee_id
    inner join designation_mst dm on dm.desig_id=ca.designation_id
    where ca.client_id='".$client_id."' and ca.branch_id='".$branch_id."' and ca.attendance_month='".$attendance_month."'");
    return $query->result();

  } 

  public function checkClient($designation_id,$client_id,$branch_id,$month_year){
      //echo $client_id;die;
      $condition = '';
      if(!empty($client_id)){
        $condition .= " AND client_id = '" . $client_id . "'";
      }

      if(!empty($branch_id)){
        $condition .= " AND branch_id = '" . $branch_id . "'";
      }

      if(!empty($month_year)){
        $condition .= " AND attendance_month = '" . $month_year . "'";
      }
      $check_client = $this->db->query("select client_attendance_id from client_attendance where designation_id ='". $designation_id . "'". $condition);
      //echo $this->db->last_query();die;
      $rows = $check_client->num_rows();

      if($rows > 0)
      {
        return true;
      }
      else
      {
        return false;
      }
    }
}
