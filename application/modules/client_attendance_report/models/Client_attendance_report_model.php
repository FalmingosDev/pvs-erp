<?php

class Client_attendance_report_model extends CI_Model 
{

  protected $table_name = 'client_attendance';

  public function __construct() 
  {
    parent::__construct();
  }
  public function client_attendance_report_list() 
  {  
    $qry = "select ca.created_ts,sm.state_name,ci.city_name,concat(cm.client_name,' ',ci.city_name,',',sm.state_name) as client_name,ca.salary_processed_flag 
    from client_attendance ca 
    inner join client_mst cm on ca.client_id = cm.client_id 
    inner join employee_mst em on ca.employee_id = em.employee_id 
    inner join designation_mst dm on ca.designation_id = dm.desig_id
    inner join state_mst sm on cm.state_id = sm.state_id
    inner join city_mst ci on cm.city_id = ci.city_id";
    
    $query = $this->db->query($qry);
    return $query->result();
  }

  public function getClientName() 
  {
    $query = $this->db->query("Select cm.client_name,cm.client_id from client_attendance ca inner join client_mst cm on cm.client_id = ca.client_id where ca.active_status=1 ORDER BY cm.client_name;");
    return $query->result();
  }

  public function getMonth() 
  {
    $query = $this->db->query("Select datename(m,attendance_month)+' '+cast(datepart(yyyy,attendance_month) as varchar) as MonthYear,attendance_month from client_attendance where active_status=1;");
    return $query->result();
  }

  public function client_attendance_report_search($month,$client_id)
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
    $qry = $this->db->query("select ca.created_ts,sm.state_name,ci.city_name,concat(cm.client_name,' ',ci.city_name,',',sm.state_name) as client_name,ca.salary_processed_flag    
    from client_attendance ca 
    inner join client_mst cm on ca.client_id = cm.client_id 
    inner join employee_mst em on ca.employee_id = em.employee_id 
    inner join designation_mst dm on ca.designation_id = dm.desig_id
    inner join state_mst sm on cm.state_id = sm.state_id
    inner join city_mst ci on cm.city_id = ci.city_id".$query);
    //echo $this->db->last_query();die;
    return $qry->result();
  }

	public function check_approval_permission()
  {
		$query = $this->db->query("SELECT COUNT(1) has_permission FROM client_approver_mst WHERE employee_id = '" . $this->session->employee_id . "' AND active_status = 1;");
		return $query->row();
	}

}
