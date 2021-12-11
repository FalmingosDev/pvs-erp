<?php
class Inv_process_model extends CI_Model {
	
	
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
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

  public function getBranch($client_id){
  	$query = $this->db->query("Select distinct c.branch_id,b.branch_name from client_attendance c inner join branch_mst b on b.branch_id = c.branch_id inner join sales_billing_mst sb on sb.branch_id = b.branch_id where c.active_status=1 and c.client_id = ". $client_id);
  	//echo $this->db->last_query();die;
    return $query->result_array();
  }

  public function getInvList($month,$client_id,$branch_id,$state_id){
  		$salary_month = strtotime($month);
    	$month=date("m",$salary_month);
    	$year=date("Y",$salary_month);
    	$billing_sql = '';
    	

    	$billing_method = $this->db->query("select billing_method from client_mst where client_id =". $client_id)->row();
    	$billing = $billing_method->billing_method;

	if ($billing == 'C'){
		$billing_sql = "select c.designation_id,d.desig_name, sum(c.duty+c.wo+c.leave+c.el+c.fl+c.co+c.ph) total_att,bch.status,
			c.client_id,c.branch_id, c.attendance_month, 0 as state_id, concat(cm.client_code ,' - ', cm.client_name) as client_name,'' as branch_name,'' as state_name,
			cm.billing_method
			from client_attendance c 
			inner join client_mst cm on cm.client_id = c.client_id
			inner join designation_mst d on d.desig_id = c.designation_id 
			inner join billing_costing_header bch on bch.client_id = c.client_id and bch.post_id = c.designation_id and c.branch_id = bch.branch_id
			where c.client_id = ". $client_id." and DATEPART(YEAR, c.attendance_month) = ". $year."
			and DATEPART(MONTH, c.attendance_month) = ". $month." GROUP BY c.designation_id,d.desig_name,bch.status,c.client_id,
			c.branch_id,c.attendance_month,cm.client_code,cm.client_name,cm.billing_method";
	}
		
	else if ($billing == 'B'){
		$billing_sql = "select c.designation_id,d.desig_name, sum(c.duty+c.wo+c.leave+c.el+c.fl+c.co+c.ph) total_att,bch.status,
			c.client_id,c.branch_id, c.attendance_month, 0 as state_id,concat(cm.client_code ,' - ', cm.client_name) as client_name,'' as branch_name,'' as state_name,
			cm.billing_method
			from client_attendance c 
			inner join client_mst cm on cm.client_id = c.client_id
			inner join designation_mst d on d.desig_id = c.designation_id 
			inner join billing_costing_header bch on bch.client_id = c.client_id and bch.post_id = c.designation_id 
			where c.client_id = ". $client_id ." and c.branch_id = ". $branch_id ." and DATEPART(YEAR, c.attendance_month) = ". $year ." 
			and DATEPART(MONTH, c.attendance_month) = ". $month ." GROUP BY c.designation_id,d.desig_name,bch.status,c.client_id,
			c.branch_id,c.attendance_month,cm.client_code,cm.client_name,cm.billing_method";
	}
		else if ($billing == 'S'){
			$billing_sql = "select c.designation_id,d.desig_name, sum(c.duty+c.wo+c.leave+c.el+c.fl+c.co+c.ph) total_att,bch.status,
			c.client_id,sm.state_id as state_id,c.attendance_month,concat(cm.client_code ,' - ', cm.client_name) as client_name,'' as branch_name,sm.state_name,0 as branch_id,
			cm.billing_method
			from client_attendance c 
			inner join client_mst cm on cm.client_id = c.client_id
			inner join designation_mst d on d.desig_id = c.designation_id 
			inner join billing_costing_header bch on bch.client_id = c.client_id and bch.post_id = c.designation_id 
			inner join branch_mst bm on bm.branch_id = bch.branch_id
			inner join state_mst sm on sm.state_id = bm.state_id
			where c.client_id = ". $client_id ." and DATEPART(YEAR, c.attendance_month) = ". $year ." 
			and DATEPART(MONTH, c.attendance_month) = ". $month ." GROUP BY c.designation_id,d.desig_name,bch.status,c.client_id,
			c.attendance_month,sm.state_id,cm.client_code,cm.client_name,cm.billing_method,sm.state_name";
		}

		//echo $billing_sql;die;

		$billing_qry = $this->db->query($billing_sql);
  	
  	//$query = $this->db->query("EXEC get_bill_proc @p_month= '". $month ."',@p_year = '". $year ."',@p_client_id= '". $client_id ."',@p_branch_id= '". $branch_id ."',@p_state_id= '". $state_id ."'");

 //  	$res = $query->result_array();
	// $query->next_result();
	// $query->free_result();

   	//echo $this->db->last_query();die;
   	return $billing_qry->result();
   	//$query->next_result();
  }

  // public function processBillGenerate($client_attendance_id){
  // 	$query = $this->db->query("EXEC processBillGenerate_proc @p_client_attendance_id = '".$client_attendance_id."', @p_user_id = '".$user_id."'");
  //   //echo $this->db->last_query();die;
    
  //   return $query;
  // }

  public function getInvoice(){
    $doc_type = 'INVOICE';
    $query = $this->db->query("select [dbo].[generateSerialNo] ('". $doc_type."') as invoice_no ");
    //echo $this->db->last_query();die;
    return $query->row();
  }

  public function getClientData($designation_id,$total_att,$client_id,$branch_id = 0,$attendance_month,$billing_method,$state_id = 0)
  {
  	$query = '';
  	if($billing_method == 'B'){
  		$query = "select distinct bch.round_off,b.branch_id,cm.client_name,ca.client_id, ca.designation_id,
		bch.releiver_chrg,bch.epf,bch.esi,bch.service_chrg_prcnt,bch.service_chrg,bch.bill_calculation_days,bch.gross_pay 
		from client_attendance ca 
		inner join client_mst cm on cm.client_id = ca.client_id 
		inner join billing_costing_header bch on bch.client_id = ca.client_id z 
		inner join branch_mst b on b.branch_id = ca.branch_id 
		inner join state_mst s on s.state_id = b.state_id inner join city_mst c on c.city_id = b.city_id
		where ca.client_id =". $client_id ." and bch.post_id=". $designation_id ." and bch.branch_id =". $branch_id;
  	}
  	if($billing_method == 'C'){
  		$query = "select distinct bch.round_off,b.branch_id,cm.client_name,ca.client_id, ca.designation_id,
		bch.releiver_chrg,bch.epf,bch.esi,bch.service_chrg_prcnt,bch.service_chrg,bch.bill_calculation_days,bch.gross_pay 
		from client_attendance ca 
		inner join client_mst cm on cm.client_id = ca.client_id 
		inner join billing_costing_header bch on bch.client_id = ca.client_id and bch.post_id = ca.designation_id 
		inner join branch_mst b on b.branch_id = ca.branch_id 
		inner join state_mst s on s.state_id = b.state_id inner join city_mst c on c.city_id = b.city_id
		where ca.client_id =". $client_id ." and bch.post_id=". $designation_id;
  	}
  	if($billing_method == 'S'){
  		$query = "select distinct bch.round_off,b.branch_id,cm.client_name,ca.client_id, ca.designation_id,
		bch.releiver_chrg,bch.epf,bch.esi,bch.service_chrg_prcnt,bch.service_chrg,bch.bill_calculation_days,bch.gross_pay 
		from client_attendance ca 
		inner join client_mst cm on cm.client_id = ca.client_id 
		inner join billing_costing_header bch on bch.client_id = ca.client_id and bch.post_id = ca.designation_id 
		inner join branch_mst b on b.branch_id = ca.branch_id 
		inner join state_mst s on s.state_id = b.state_id inner join city_mst c on c.city_id = b.city_id
		where ca.client_id =". $client_id ." and bch.post_id=". $designation_id ." and bch.branch_id in (select nbr.branch_id from branch_mst nbr where nbr.state_id = ". $state_id .")";
  	}

  	//echo $billing_method;die;

    $billing_qry = $this->db->query($query);

  	//bch.branch_id in (select nbr.branch_id from branch_mst nbr where nbr.state_id = 19)
    // $query = $this->db->query("select distinct bch.round_off,sm.cess,sm.sgst,sm.cgst,sm.igst,sm.ugst,cm.client_name,ca.client_id, concat(sm.address_1,' ',sm.address_2,' ',sm.address_3, ' , ', s.state_name, ' , ', c.city_name, ' , ', sm.pincode) address,ca.designation_id,bch.releiver_chrg,bch.epf,bch.esi,bch.service_chrg_prcnt,bch.service_chrg,bch.bill_calculation_days,bch.gross_pay from client_attendance ca inner join client_mst cm on cm.client_id = ca.client_id inner join billing_costing_header bch on bch.client_id = ca.client_id and bch.post_id = ca.designation_id inner join sales_billing_mst sm on sm.client_id = ca.client_id inner join state_mst s on s.state_id = sm.state_id inner join city_mst c on c.city_id = sm.city_id where ca.client_id = ". $client_id ." and ca.designation_id=". $designation_id);
    //echo $this->db->last_query();die;
    return $billing_qry->row();
  }

  public function getEpfRate(){
    $query = $this->db->query("select percentage from pf_rate where pf_rate_id = 1");
    return $query->row();
  }

  public function getEsiRate(){
    $query = $this->db->query("select percentage from esi_rate where esi_rate_id = 1");
    return $query->row();
  }

  public function insertInvProcess($client_id,$designation_id,$client_attendance_id,$total_att,$branch_id,$attendance_month,$invoice_no,$invoice_date,$date_to_print,$billing_address,$total,$releiving,$pf_percentage,$pf_amnt,$esi_percentage,$esi_amnt,$service_chrg_prcnt,$final_service_chrg_amnt,$subtotal_amnt,$service_tax_prcnt,$service_tax_with_subtotal,$cess,$round_off,$grand_total,$bill_month,$ref_no,$note_to_print,$covering,$narration)
  {
    $user_id = $this->session->user_id;

    $final_attendance_month = date("Y-m-d", strtotime($attendance_month));
    $final_invoice_date = date("Y-m-d", strtotime($invoice_date));
    $final_date_to_print = date("Y-m-d", strtotime($date_to_print));
    
    $query = $this->db->query("EXEC invoiceProcess_proc @p_client_id = '". $client_id ."' ,@p_designation_id = '".$designation_id."', @p_client_attendance_id = '".$client_attendance_id."', @p_total_att = '".$total_att."', @p_branch_id = '".$branch_id."', @p_final_attendance_month = '".$final_attendance_month."', @p_invoice_no = '".$invoice_no."', @p_final_invoice_date = '". $final_invoice_date ."', @p_date_to_print = '". $final_date_to_print ."', @p_billing_address = '". escape_str($billing_address) ."', @p_total = '".$total."', @p_releiving = '". $releiving ."', @p_pf_percentage = '".$pf_percentage."', @p_pf_amnt = '".$pf_amnt."', @p_esi_percentage = '".$esi_percentage."', @p_esi_amnt = '".$esi_amnt."', @p_service_chrg_prcnt = '".$service_chrg_prcnt."' , @p_final_service_chrg_amnt = '".$final_service_chrg_amnt."', @p_subtotal_amnt = '".$subtotal_amnt."' , @p_service_tax_prcnt = '".$service_tax_prcnt."' , @p_service_tax_with_subtotal = '".$service_tax_with_subtotal."' , @p_cess = '".$cess."' , @p_round_off = '".$round_off."', @p_grand_total = '".$grand_total."',@p_bill_month = '".$bill_month."',@p_ref_no = '".$ref_no."',@p_note_to_print = '".$note_to_print."',@p_covering = '".$covering."',@p_narration = '".$narration."', @p_user_id = '".$user_id."'");
    //echo $this->db->last_query();die;

    
    return $query;
  }

  public function getProcessedInvList(){
    $query = $this->db->query("select i.invoice_no, i.invoice_date,i.grand_total,cm.client_name,bm.branch_name from invoice i 
inner join client_mst cm on cm.client_id = i.client_id inner join branch_mst bm on bm.branch_id = i.branch_id");
    return $query->result();
  }

  public function getClientBillingMethod($client_id){
    $query = $this->db->query("select billing_method from client_mst where client_id =". $client_id);
   // echo $this->db->last_query();die;
    return $query->row();
  }

  public function getState($client_id){
    $query = $this->db->query("Select distinct st.state_id,st.state_name from client_attendance c 
inner join branch_mst b on b.branch_id = c.branch_id 
inner JOIN state_mst st ON b.state_id = st.state_id
inner join sales_billing_mst sb on sb.branch_state_id = st.state_id
where c.active_status=1 and c.client_id = ". $client_id);
    //echo $this->db->last_query();die;
    return $query->result_array();
  }

  public function getGstData($client_id,$branch_id,$state_id,$billing_method){
    $query = '';
    if($billing_method == 'C'){
      $query = "select distinct sm.cess,sm.sgst,sm.cgst,sm.igst,sm.ugst,concat(sm.address_1,' ',sm.address_2,' ',sm.address_3, ' , ', s.state_name, ' , ', c.city_name, ' , ', sm.pincode) address
        from sales_billing_mst sm 
        inner join state_mst s on s.state_id = sm.state_id 
        inner join city_mst c on c.city_id = sm.city_id 
        where sm.client_id =" . $client_id;
    }
    else if ($billing_method == 'B'){
      $query = "select distinct sm.cess,sm.sgst,sm.cgst,sm.igst,sm.ugst,concat(sm.address_1,' ',sm.address_2,' ',sm.address_3, ' , ', s.state_name, ' , ', c.city_name, ' , ', sm.pincode) address
        from sales_billing_mst sm 
        inner join state_mst s on s.state_id = sm.state_id 
        inner join city_mst c on c.city_id = sm.city_id 
        where sm.client_id =" . $client_id ." and sm.branch_id =" . $branch_id;
    }
    else if ($billing_method == 'S'){
      $query = "select distinct sm.cess,sm.sgst,sm.cgst,sm.igst,sm.ugst,concat(sm.address_1,' ',sm.address_2,' ',sm.address_3, ' , ', s.state_name, ' , ', c.city_name, ' , ', sm.pincode) address
        from sales_billing_mst sm 
        inner join state_mst s on s.state_id = sm.state_id 
        inner join city_mst c on c.city_id = sm.city_id 
        where sm.client_id =" . $client_id ." and sm.branch_state_id =" . $state_id;
    }
    $billing_qry = $this->db->query($query);
    return $billing_qry->row();
  }
	
}
