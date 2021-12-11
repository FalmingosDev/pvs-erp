<?php

class Client_attendance_report_model extends CI_Model 
{

  protected $table_name = 'client_attendance';

  public function __construct() 
  {
    parent::__construct();
  }

  

  public function getMonth() 
  {
    $query = $this->db->query("Select datename(m,attendance_month)+' '+cast(datepart(yyyy,attendance_month) as varchar) as MonthYear,attendance_month from client_attendance where active_status=1;");
    return $query->result();
  }

  public function client_attendance_report_search($month)
  {
    if ($month != '' ){
      $query ="where ca.attendance_month = '".$month."'";
      
    }
    else
    {
      $query = 'where 1=1';
    }
    $qry = $this->db->query("select DISTINCT concat(cm.client_name,' ',ci.city_name,',',sm.state_name,', ',bm.branch_name) as client_name,bm.branch_name
    from client_mst cm
    inner join branch_mst bm on cM.client_id = bm.client_id
    inner join state_mst sm on cm.state_id = sm.state_id
      inner join city_mst ci on cm.city_id = ci.city_id
    where CONCAT(cm.client_id,bm.branch_id)  not in (select concat(ca.client_id,ca.branch_id) 
    from client_attendance ca $query)");
    //echo $this->db->last_query();die;
    return $qry->result();
  }

	public function check_approval_permission()
  {
		$query = $this->db->query("SELECT COUNT(1) has_permission FROM client_approver_mst WHERE employee_id = '" . $this->session->employee_id . "' AND active_status = 1;");
		return $query->row();
	}

}
