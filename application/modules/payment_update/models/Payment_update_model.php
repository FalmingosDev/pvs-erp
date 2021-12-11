<?php

class Payment_update_model extends CI_Model {

  protected $table_name = 'company_branch_mst';

  public function __construct() {
    parent::__construct();
  }
  public function get_all_client()
  {
    $query = $this->db->query("select client_id,client_name from client_mst where active_status=1 and approval_status_1='A' and approval_status_2='A';");
    return $query->result();
  }

  public function getBranch($client_id) 
  {
    $query = $this->db->query("Select branch_id,branch_name from branch_mst where active_status=1 and client_id='". $client_id ."' ORDER BY branch_name;");
    return $query->result_array();
  }
  public function payment_update_list($client_id,$branch_id,$form_date,$to_date)
  {
   
    if ($client_id == '')
    {
      $client_id='NULL';
    }
    if ($branch_id == '')
    {
      $branch_id='NULL';
    }
    if ($form_date == '')
    {
      $form_date='NULL';
    }
    if ($to_date == '')
    {
      $to_date='NULL';
    }
    if($form_date=='NULL' and $to_date=='NULL')
    {
      $query="where inv.invoice_date  between isnull(".$form_date.",inv.invoice_date) and  isnull(".$to_date.",inv.invoice_date) and 
      inv.branch_id = isnull(".$branch_id.",inv.branch_id) and inv.client_id = isnull(".$client_id.",inv.client_id) ORDER BY inv.invoice_date DESC";
    }
    else
    {
      $query="where inv.invoice_date  between isnull('".$form_date."',inv.invoice_date) and  isnull('".$to_date."',inv.invoice_date) and 
      inv.branch_id = isnull(".$branch_id.",inv.branch_id) and inv.client_id = isnull(".$client_id.",inv.client_id) ORDER BY inv.invoice_date DESC";
    }
    $qry = $this->db->query("select inv.invoice_id,inv.invoice_no,inv.invoice_date,cm.client_name,bm.branch_name,inv.grand_total
    from invoice inv 
    inner join client_mst cm on inv.client_id = cm.client_id 
	  inner join branch_mst bm on inv.branch_id = bm.branch_id  ".$query);
    
    return $qry->result();
  }

  public function payment_payment_list($invoice_id)
  {
    if ($invoice_id != ''){
      $query = " where inv.invoice_id = '".$invoice_id."' ";
      
    }
    else
    {
      $query = ' where 1=1';
    }
    $qry = $this->db->query("select inv.invoice_id,inv.invoice_no,inv.invoice_date,cm.client_name,bm.branch_name,inv.grand_total
    from invoice inv 
    inner join client_mst cm on inv.client_id = cm.client_id 
	  inner join branch_mst bm on inv.branch_id = bm.branch_id  ".$query);
    return $qry->row();
  }
  

  public function payment_sum($invoice_id)
  {
    
    $qry = $this->db->query("select payment_amnt,payment_date from invoice_payment where invoice_id='".$invoice_id."' ORDER BY payment_date DESC");
    return $qry->result();
  }

  public function payment_insert($invoice_id,$payment_date,$payment_amount)
  {
    $query = "insert into invoice_payment  (invoice_id,payment_date,payment_amnt) values ('".$invoice_id."','".$payment_date."','".$payment_amount."');";			
		$res = $this->db->query($query); 
		if(!$res) 
    {
			return false;
		} 
    else 
    {
			return true;
		}
  }

  //insert into invoice  (invoice_id,client_id,invoice_date,print_date,total_gross) values (100,101,'07-07-2021','07-07-2021',107);
  /*select inv.invoice_id,inv.invoice_no,inv.invoice_date,cm.client_name,bm.branch_name,inv.grand_total,SUM(IsNull(invp.payment_amnt  ,0))
    from invoice inv 
    inner join client_mst cm on inv.client_id = cm.client_id 
	inner join branch_mst bm on inv.branch_id = bm.branch_id 
	LEFT JOIN invoice_payment invp on inv.invoice_id = invp.invoice_id */
}
