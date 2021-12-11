<?php

class Area_payment_model extends CI_Model {

  protected $table_name = 'company_branch_mst';

  public function __construct() {
    parent::__construct();
  }

  public function get_all_client(){
    $query = $this->db->query("select cm.client_id,cm.client_name from client_mst cm inner join payroll_header ph on ph.client_id = cm.client_id where ph.client_id = cm.client_id and cm.active_status = 1");
    return $query->result();
  }

  public function getBranch() {
    $query = $this->db->query("Select bm.branch_id,bm.branch_name from branch_mst bm inner join payroll_header ph on ph.branch_id = bm.branch_id where bm.active_status=1 and ph.branch_id = bm.branch_id ORDER BY branch_name;");
    return $query->result();
  }

  public function getDesignation($client_id,$branch_id){
    $query = $this->db->query("select distinct dm.desig_id,dm.desig_name from payroll_header ph 
inner join designation_mst dm on dm.desig_id=ph.designation_id where dm.active_status=1 and ph.client_id=". $client_id ."
and ph.branch_id=". $branch_id);
   return $query->result_array();
  }

 public function getClient($client_id) {
    $query = $this->db->query("SELECT client_name from client_mst where client_id=". $client_id);
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

    public function getArrear() {
    $query = $this->db->query("SELECT serial_no from doc_serial_count where doc_type='ARREAR'");
    return $query->row();
  }

   public function insertAreaPayment($client_id,$branch_id,$designation_id,$arrear,$arrear_to_salary,$arrear_from_salary,$salary_month,$new_gross,$old_gross,$new_basic,$old_basic,$new_ot,$old_ot,$areear_gross,$arr_bon,$areear_basic,$arr_gra) 
   {
 //  	//echo "1";die;
      //echo $half_day;die;
      $user_id = $this->session->user_id;
      $final_arrear_to_salary = date("Y-m-d", strtotime($arrear_to_salary));
      $final_arrear_from_salary = date("Y-m-d", strtotime($arrear_from_salary));
      $final_salary_month = date("Y-m-d", strtotime($salary_month));
      
      $query = $this->db->query("EXEC add_areaPayment_proc @p_client_id = '".$client_id."', @p_branch_id='". $branch_id ."', @p_designation_id = '".$designation_id."' , @p_arrear = '".$arrear."', @p_arrear_from_salary = '".$final_arrear_from_salary."' , @p_arrear_to_salary = '".$final_arrear_to_salary."', @p_salary_month = '".$final_salary_month."' , @p_new_gross = '".floatval($new_gross)."', @p_old_gross = '".floatval($old_gross)."', @p_new_basic = '".floatval($new_basic)."', @p_old_basic = '".floatval($old_basic)."', @p_new_ot = '".floatval($new_ot)."', @p_old_ot = '".floatval($old_ot)."', @p_areear_gross = '".floatval($areear_gross)."', @p_arr_bon = '".floatval($arr_bon)."', @p_areear_basic = '".floatval($areear_basic)."', @p_arr_gra = '".floatval($arr_gra)."', @p_user_id = '".$user_id."'");
      //echo $this->db->last_query();die;
      
      return $query->row();
    }

    public function client_arrear_payment($client_id,$salary_month){
    	$salary_month = strtotime($salary_month);
    	$month=date("m",$salary_month);
    	$year=date("Y",$salary_month);
      //echo $year;die;
      if ($salary_month != '' && $client_id != '')
      {
        $query = " where DATEPART(YEAR, ce.salary_month) = " . intval($year) ." and DATEPART(MONTH, ce.salary_month) = " . intval($month) ." and ce.client_id = '".$client_id."'";
      
      }
      else if ($salary_month == '' && $client_id != ''){
        $query = " where ca.client_id = '".$client_id."'";
        
      }
      else if ($salary_month != '' && $client_id == ''){
        $query = " where DATEPART(YEAR, ce.salary_month) = " . intval($year) ." and DATEPART(MONTH, ce.salary_month) = " . intval($month) ."'";
        
      }
      else
      {
        $query = ' where 1=1';
      }
     $query = $this->db->query("select concat(em.employee_code, ' ', em.first_name,' ', em.last_name) name, ce.salary_month, ah.ot,ah.epf, ah.esi, ah.billing_days,ah.net_pay from client_arrear_entry ce inner join arrear_pay_header ah on ah.client_id = ce.client_id and ah.branch_id = ce.branch_id and ah.designation_id = ce.designation_id inner join employee_mst em on em.employee_id = ah.employee_id ". $query);
    
    //echo $this->db->last_query();die;
    return $query->result();
    }

 //  public function getAdvance($emp_id) {
 //   // $query = $this->db->query("SELECT balance,emi from employee_loan where employee_id=". $emp_id ." and active_status=1 and type='A'");
 //    $query = $this->db->query("SELECT COUNT(1) cnt, ISNULL(SUM(balance), 0) balance, ISNULL(SUM(emi),0) emi FROM employee_loan WHERE employee_id = ". $emp_id ." AND type='A' AND deduction_date <= getdate() AND active_status = 1;");
 //    //echo $this->db->last_query();die;
 //    return $query->row();
 //  }

 //  public function getLoan($emp_id) {
 //    $query = $this->db->query("SELECT COUNT(1) cnt, ISNULL(SUM(balance), 0) balance, ISNULL(SUM(emi),0) emi FROM employee_loan WHERE employee_id = ". $emp_id ." AND type='L' AND deduction_date <= getdate() AND active_status = 1;");
 //    return $query->row();
 //  }

 //    public function getMisc($emp_id) {
 //    $query = $this->db->query("SELECT COUNT(1) cnt, ISNULL(SUM(balance), 0) balance, ISNULL(SUM(emi),0) emi FROM employee_loan WHERE employee_id = ". $emp_id ." AND type='O' AND deduction_date <= getdate() AND active_status = 1;");
 //    return $query->row();
 //  }

 //  public function client_attendance_list() {
    
 //    $qry = "select ca.client_supp_attendance_id,datename(m,ca.attendance_month)+' '+cast(datepart(yyyy,ca.attendance_month) as varchar) as MonthYear,ca.duty,ca.wo,ca.leave,ca.ph,ca.ot,cm.client_name, concat(em.employee_code, ' - ', em.first_name, ' ', em.last_name) as employee_name,dm.desig_name,ca.salary_processed_flag, ca.approval_required, ISNULL(ca.approval_status, '') approval_status 
	// from client_supp_attendance ca 
	// inner join client_mst cm on ca.client_id = cm.client_id 
	// inner join employee_mst em on ca.employee_id = em.employee_id 
	// inner join designation_mst dm on ca.designation_id = dm.desig_id";
    
 //    $query = $this->db->query($qry);
 //    return $query->result();
 //  }

 //  public function getClientName() {
 //    $query = $this->db->query("Select cm.client_name,cm.client_id from client_attendance ca inner join client_mst cm on cm.client_id = ca.client_id where ca.active_status=1 ORDER BY cm.client_name;");
 //    return $query->result();
 //  }

 //  public function getMonth() {
 //    $query = $this->db->query("Select datename(m,attendance_month)+' '+cast(datepart(yyyy,attendance_month) as varchar) as MonthYear,attendance_month from client_attendance where active_status=1;");
 //    return $query->result();
 //  }

 //  public function client_attendance_search($month,$client_id)
 //  {
 //    if ($month != '' && $client_id != ''){
 //      $query = " where ca.attendance_month = '".$month."' and ca.client_id = '".$client_id."' and ca.pay_process_flag !=1";
      
 //    }

 //    else if ($month == '' && $client_id != ''){
 //      $query = " where ca.client_id = '".$client_id."' and ca.pay_process_flag !=1";
      
 //    }
 //    else if ($month != '' && $client_id == ''){
 //      $query = " where ca.attendance_month = '".$month."' and ca.pay_process_flag !=1";
      
 //    }
 //    else
 //    {
 //      $query = ' where 1=1';
 //    }
 //    $query = $this->db->query("select ca.client_supp_attendance_id,datename(m,ca.attendance_month)+' '+cast(datepart(yyyy,ca.attendance_month) as varchar) as MonthYear,ca.duty,ca.wo,ca.leave,ca.ph,ca.ot,cm.client_name, concat(em.employee_code, ' - ', em.first_name, ' ', em.last_name) as employee_name,dm.desig_name,ca.salary_processed_flag, ca.approval_required, ISNULL(ca.approval_status, '') approval_status 
	// from client_supp_attendance ca 
	// inner join client_mst cm on ca.client_id = cm.client_id 
	// inner join employee_mst em on ca.employee_id = em.employee_id 
	// inner join designation_mst dm on ca.designation_id = dm.desig_id". $query);
 //    //echo $this->db->last_query();die;
 //    return $query->result();
 //  }

 //  public function getClientDetails($id){
 //      $qry = $this->db->query("SELECT ca.employee_id,ca.client_supp_attendance_id,datename(m,ca.attendance_month)+' '+cast(datepart(yyyy,ca.attendance_month) as varchar) as MonthYear,bm.branch_name,ca.calculation_days,ca.duty_hrs,ca.duty,ca.wo,ca.leave,ISNULL(ca.el,'0.00') el,ca.fl,ca.co,ca.ph,ca.ot,ca.na_duty,ca.na,cm.client_name, concat(em.employee_code, ' - ', em.first_name, ' ', em.last_name) as employee_name,dm.desig_name,em.father_name from client_supp_attendance ca inner join client_mst cm on ca.client_id = cm.client_id inner join employee_mst em on ca.employee_id = em.employee_id inner join designation_mst dm on ca.designation_id = dm.desig_id inner join branch_mst bm on ca.branch_id = bm.branch_id where ca.client_supp_attendance_id=".$id);
 //      //echo $this->db->last_query();die;
 //      return $qry->row();
      
 //    }

 //    public function UpdateClientAttendance($client_attendance_id,$duty,$w_o,$leave,$el,$fl,$c_o,$ph,$ot,$na_duty,$na) 
 //    {
 //    //echo $half_day;die;
 //    $user_id = $this->session->user_id;
    
 //    $query = $this->db->query("EXEC edit_client_supp_attendance_proc @p_client_supp_attendance_id = '". $client_attendance_id ."' ,@p_duty = '".floatval($duty)."', @p_wo = '".floatval($w_o)."', @p_leave = '".floatval($leave)."', @p_el = '".floatval($el)."', @p_fl = '".floatval($fl)."', @p_co = '".floatval($c_o)."', @p_ph = '".floatval($ph)."', @p_ot = '".floatval($ot)."', @p_na_duty = '".floatval($na_duty)."', @p_na = '".floatval($na)."', @p_user_id = '".$user_id."'");
 //    //echo $this->db->last_query();die;

    
 //    return $query;
 //  }
  
	// public function check_approval_permission(){
	// 	$query = $this->db->query("SELECT COUNT(1) has_permission FROM client_approver_mst WHERE employee_id = '" . $this->session->employee_id . "' AND active_status = 1;");
	// 	return $query->row();
	// }
	// public function updateAttendanceApproval($client_attendance_id, $approval_remarks, $action) {
	// 	$query = $this->db->query("EXEC update_attendance_approval_proc @p_client_attendance_id = '". $client_attendance_id ."', @p_approval_remarks = '".$approval_remarks."', @p_action = '".$action."', @p_user_id = '". $this->session->user_id ."';");
	// 	//exit($this->db->last_query());
	// 	return $query;
	// }
  public function area_payment_list($client_id,$month,$year)
  {
    if ($month != '' && $month != '' && $client_id != '')
      {
        $qry = " where DATEPART(YEAR, aph.payment_month) = " . intval($year) ." and DATEPART(MONTH, aph.payment_month) = " . intval($month) ." and aph.client_id = '".$client_id."'";
      
      }


    $query = $this->db->query("select  em.employee_code,concat(em.first_name,' ', em.last_name) name,em.last_name,concat(em.father_name,' ', em.last_name) father_name, 
    dm.desig_name,aph.billing_days,aph.gross_pay,aph.epf,aph.esi,aph.ptax,aph.total_deduction,aph.net_pay,aph.account_no,
    aph.bank_name,aph.ifsc_code,em.pf_no,em.esi_no,em.uan,aph.basic,ah.arrear_salary_range_from,ah.arrear_salary_range_to,ah.salary_month,
    ah.arrear_no,cm.client_code,cm.client_name,ah.new_basic,ah.old_basic,ah.new_gross,ah.old_gross,ah.new_ot,ah.old_ot	
    from arrear_pay_header aph
    inner join client_arrear_entry ah on ah.client_id = aph.client_id 
    inner join branch_mst bm on bm.branch_id = aph.branch_id 
    inner join client_mst cm on cm.client_id = aph.client_id 
    inner join employee_mst em on em.employee_id = aph.employee_id 
    inner join designation_mst dm on dm.desig_id = aph.designation_id".$qry);
    return $query->result();
  }
}
