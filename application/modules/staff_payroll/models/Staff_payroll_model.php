<?php

class Staff_payroll_model extends CI_Model
{

  protected $table_name = 'company_branch_mst';

  public function __construct()
  {
    parent::__construct();
  }
 
  public function branch_name()
  {

    $sql = "SELECT company_branch_id, branch_name FROM company_branch_mst WHERE active_status IN (1);";
    $query = $this->db->query($sql);
    return $query->result();
  }
  // public function employee_list($id)
  // {
  //   $query = $this->db->query("select employee_id, concat(employee_code, ' - ', first_name, ' ', last_name) as employee_name from employee_mst where company_branch_id = ".$id.";");
  //   return $query->result();
  // }
  public function add_staff($attendance_month, $branch_id, $employee_id, $lop, $ot_hrs, $incentive, $el, $cl, $sl, $pf_amount, $area_others)
  {
	  
    $query = $this->db->query("insert into staff_attendance (attendance_month,branch_id,employee_id,lop,ot_hrs,incentive,el,cl,sl,area_pf,area_others) values ('".$attendance_month."','".$branch_id."','".$employee_id."','".$lop."','".$ot_hrs."','".$incentive."','".$el."','".$cl."','".$sl."','".$pf_amount."','".$area_others."');");
    //echo $this->db->last_query();die();
    return $query;
  }
  
  public function edit_staff($lop, $ot_hrs, $incentive,$pf_amount, $area_others,$id)
  {
	  
    $query = $this->db->query("UPDATE staff_attendance SET lop = '".$lop."', ot_hrs = '".$ot_hrs."',incentive = '".$incentive."',area_pf = '".$pf_amount."', area_others = '".$area_others."' WHERE attendance_id = '".$id."' ");
    //echo $this->db->last_query();die();
    //return $query;
  }
  public function list_staff()
  {
	  
    $query = $this->db->query("select sa.attendance_id,cm.branch_name, concat(em.employee_code, ' - ', em.first_name, ' ', em.last_name) as employee_name, dm.desig_name, sa.attendance_month, sa.lop, sa.ot_hrs 
	from employee_mst as em 
	INNER join designation_mst as dm on em.designation_id = dm.desig_id 
	INNER join company_branch_mst as cm on em.company_branch_id = cm.company_branch_id 
	INNER join staff_attendance as sa on em.employee_id = sa.employee_id where sa.salary_processed_flag !=1");
    return $query->result();
  }
  public function list_staff_search($b_id,$m_id)
  {
       if ($m_id != '' && $b_id != ''){
      $query = " where cm.company_branch_id = '".$b_id ."' and sa.attendance_month = '" . $m_id . "' and sa.salary_processed_flag !=1";
      
    }

    else if ($m_id == '' && $b_id != ''){
      $query = " where cm.company_branch_id = '".$b_id ."' and sa.salary_processed_flag !=1";
      
    }
    else if ($month != '' && $client_id == ''){
      $query = " where sa.attendance_month = '" . $m_id . "' and sa.salary_processed_flag !=1";
      
    }
    else
    {
      $query = ' where sa.salary_processed_flag !=1';
    }
    
    $query = $this->db->query("select cm.branch_name, concat(em.employee_code, ' - ', em.first_name, ' ', em.last_name) as employee_name, dm.desig_name, sa.attendance_month, sa.lop, sa.ot_hrs from employee_mst as em join designation_mst as dm on em.designation_id = dm.desig_id join company_branch_mst as cm on em.company_branch_id = cm.company_branch_id join staff_attendance as sa on em.employee_id = sa.employee_id" . $query);
    return $query->result_array();
  }
  public function fetch_desig($id)
  {
    $query = $this->db->query("select dm.desig_name from employee_mst as em join designation_mst as dm on em.designation_id = dm.desig_id where em.employee_id = $id;");
    return $query->row();
  }
  public function fetch_month()
  {
    $query = $this->db->query("select distinct(attendance_month) from staff_attendance;");
    return $query->result();
  }
  
  public function attendance_detail($id){
	  //echo $aa = ""; die;
	  $query = $this->db->query("SELECT sa.attendance_id,sa.attendance_month,sa.branch_id,bm.branch_name,sa.employee_id,
 em.first_name +' '+ em.last_name +' - '+ em.employee_code as empname,sa.lop,sa.ot_hrs,
 sa.incentive,sa.el,sa.cl,sa.sl,sa.area_pf,sa.area_others,dm.desig_name
  FROM staff_attendance sa
  LEFT JOIN company_branch_mst bm ON bm.company_branch_id = sa.branch_id
  LEFT JOIN employee_mst em ON em.employee_id = sa.employee_id  
  LEFT JOIN designation_mst dm ON em.designation_id = dm.desig_id 
  WHERE sa.attendance_id = ".$id." ");
    return $query->row();
  }
	
	// public function get_leaves($employee_id, $attendance_month){
	// 	$qry = "EXEC calculate_leave_days_proc @p_employee_id = '". $employee_id ."', @p_from_date = '". $attendance_month . '-01' ."', @p_to_date = '". date('Y-m-t', strtotime($attendance_month . '-01')) ."';";
	// 	$query = $this->db->query($qry);
	// 	return $query->row();
	// }
	
	
	// public function delete($id) {
		
	// 	$query = $this->db->query("DELETE FROM  staff_attendance WHERE attendance_id = '".$id."'");
	// 	//return $query->result();
	// }

  public function processStaffPayroll($month, $branch_id){
    //echo "1";die;
    $user_id = $this->session->user_id;

    $query = $this->db->query("EXEC processStaffPayroll_proc @p_month = '".$month."', @p_branch_id='". $branch_id ."', @p_user_id = '".$user_id."'");

    //echo $this->db->last_query();die;
    return $query->row();
    //return $query;

  }
}
