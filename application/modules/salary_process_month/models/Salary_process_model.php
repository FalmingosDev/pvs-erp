<?php

class Salary_process_model extends CI_Model {

  

  public function __construct() {
    parent::__construct();
  }

 

  public function salary_process_month()
  {
    $query = $this->db->query("select datename(m,month)+' '+cast(datepart(yyyy,month) as varchar) as MonthYear,month,month_id from salary_process_month 
    where active_status=1");
		return $query->row();
  }
  public function salary_process_month_uddate($month_id,$month_year)
  {
    $query = $this->db->query("UPDATE salary_process_month SET month ='".$month_year."' WHERE month_id=$month_id");
		return $query;
  }

  
  
}
