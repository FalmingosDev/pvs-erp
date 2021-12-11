<?php
class Billingcosting_model extends CI_Model {
	
	protected $table_name = 'client_mst';
	protected $client_contact = 'client_contact_mst';
	protected $salary_head = 'salary_head_mst';

	
	public function __construct() {
		parent::__construct();
	}
	
	public function billing_costing_list() {
		return array();
	}

	public function ClientName($id){
		
		$query = $this->db->query("SELECT client_id, client_code, client_name, state_id, ISNULL(submit_for_approval, 0) submit_for_approval FROM client_mst WHERE client_id = ".$id);
		return $query->row();
	}

	public function getBillingCostingList($id){
		$query = $this->db->query("SELECT bch.billing_costing_cost_id,bch.client_id,bch.post_id,bch.gross_pay,bch.monthly_ctc,bch.annual_ctc,bch.total_bill_amt,bch.gross_profit,dm.desig_name,bch.status,CONVERT(DATE,commencement_date) commencement_date FROM billing_costing_header bch
		inner join designation_mst dm on dm.desig_id = bch.post_id where bch.client_id='".$id."' order by commencement_date asc");
		//echo $this->db->last_query();die;
		return $query->result_array();
	}

	public function get_all_branch($url_client_id)
	{
		$query = $this->db->query("Select branch_id,branch_name from branch_mst where client_id =" .$url_client_id);
		//echo $this->db->last_query();die;
		return $query->result();
	}

	public function get_all_post()
	{
		$query = $this->db->query("Select head_id,head_name from salary_head_mst where active_status=1 ORDER BY head_name desc ;");
		return $query->result();
	}

	public function get_all_desig()
	{
		$query = $this->db->query("Select desig_id,desig_name from designation_mst where active_status=1 ORDER BY desig_name ;");
		return $query->result();
	}

	public function get_all_zone()
	{
		$query = $this->db->query("Select lookup_id,lookup_desc from lookup_table where active_status=1 and lookup_type='ZONE' ORDER BY lookup_desc desc ;");
		return $query->result();
	}

	public function getSalaryHeadName() {
		$query = $this->db->query("Select head_id,head_name,isnull(max_prcntg,0) max_prcntg,isnull(min_prcntg, 0) min_prcntg from " . $this->salary_head . " where active_status=1 and not head_id=1 ORDER BY head_name;");
		return $query->result_array();
	}

	public function get_pf_percentage(){
		
		$query = $this->db->query("SELECT top 1 percentage FROM pf_rate WHERE effective_date < GETDATE() order by effective_date desc;");
		return $query->row();
	}

	public function get_esi_percentage(){
		
		$query = $this->db->query("SELECT top 1 percentage FROM esi_rate WHERE effective_date < GETDATE() order by effective_date desc;");
		return $query->row();
	}

	

	public function insertBilligCosting($client_id,$post_id,$zone_id,$commencement_date,$contract_type,$status,$termination_date,$bill_calculation_days,$gross_pay,$hsn_no,$person_number,$duty_hrs,$releiver_chrg,$monthly_ctc,$annual_ctc,$round_off,$service_chrg_prcnt,$service_chrg,$total_bill_amt,$total_ctc_amt,$gross_profit,$epf,$esi,$lwf,$ptax,$tot_dedn,$net_pay,$pay_hrs,$ot_rate_type,$ot_rt,$esi_wage,$ot_esi_wage,$pf_wage,$branch_id,$head_id,$type_id,$rate,$basis,$limit,$criteria,$periodicity,$method,$salary_head_amnt,$salary_type,$salary_days,$billing_type,$basic_highly_skilled,$basic_skilled,$basic_semi_skilled,$basic_un_skilled,$da_highly_skilled,$da_skilled,$da_semi_skilled,$da_un_skilled,$overtime_highly_skilled,$overtime_skilled,$overtime_semi_skilled,$overtime_un_skilled,$effective_date)
	{
		 $tot_head = count($head_id);
		 $detail_data = '';
		
		for($i=0; $i<$tot_head; $i++)
		{
			$detail_data .= $head_id[$i].'|~|'.$type_id[$i].'|~|'.$rate[$i].'|~|'.$basis[$i].'|~|'.$limit[$i].'|~|'.$criteria[$i].'|~|'.$periodicity[$i].'|~|'.$method[$i].'|~|'.$salary_head_amnt[$i].'#';
		}
		
		$detail_data = rtrim($detail_data, "#");

		//echo $detail_data;die;

		


		$user_id = $this->session->user_id;
		$com_date = date("Y-m-d", strtotime($commencement_date));
		$term_date = date("Y-m-d", strtotime($termination_date));

		if($term_date == '1970-01-01')
		{
			$term_date = '';  
		}
 
		$query = $this->db->query("EXEC add_billing_costing_proc @p_client_id = '".$client_id."', @p_post_id = '".$post_id."', @p_zone_id = '". $zone_id ."',@p_com_date = '".$com_date."', @p_contract_type = '".$contract_type."' ,@p_status = '".$status."' , @p_term_date = '".$term_date."', @p_bill_calculation_days = '".$bill_calculation_days."',@p_gross_pay = '".$gross_pay."',@p_hsn_no = '".$hsn_no."',@p_person_number = '".$person_number."',@p_duty_hrs = '".$duty_hrs."',@p_releiver_chrg = '".$releiver_chrg."',@p_monthly_ctc = '".$monthly_ctc."',@p_annual_ctc = '".$annual_ctc."',@p_round_off = '".$round_off."',@p_service_chrg_prcnt = '".$service_chrg_prcnt."',@p_service_chrg = '".$service_chrg."',@p_total_bill_amt = '".$total_bill_amt."',@p_total_ctc_amt = '".$total_ctc_amt."',@p_gross_profit = '".$gross_profit."',@p_epf = '".$epf."',@p_esi = '".$esi."',@p_lwf = '".$lwf."',@p_ptax = '".$ptax."',@p_tot_dedn = '".$tot_dedn."',@p_net_pay = '".$net_pay."',@p_pay_hrs = '".$pay_hrs."',@p_ot_rate_type = '".$ot_rate_type."',@p_ot_rt = '".$ot_rt."',@p_esi_wage = '".$esi_wage."',@p_ot_esi_wage = '".$ot_esi_wage."',@p_pf_wage = '".$pf_wage."',@p_branch_id ='". $branch_id ."',@p_user_id='". $user_id ."',@p_salary_type='". $salary_type ."',@p_salary_days='". $salary_days ."',@p_billing_type='". $billing_type ."', @p_detail_data = '". $detail_data."', @p_basic_highly_skilled = '". $basic_highly_skilled."', @p_basic_skilled = '". $basic_skilled."', @p_basic_semi_skilled = '". $basic_semi_skilled."', @p_basic_un_skilled = '". $basic_un_skilled."', @p_da_highly_skilled= '". $da_highly_skilled."', @p_da_skilled = '". $da_skilled."', @p_da_semi_skilled = '". $da_semi_skilled."', @p_da_un_skilled = '". $da_un_skilled."', @p_overtime_highly_skilled = '". $overtime_highly_skilled."', @p_overtime_skilled = '". $overtime_skilled."', @p_overtime_semi_skilled = '". $overtime_semi_skilled."', @p_overtime_un_skilled = '". $overtime_un_skilled."', @p_effective_date = '". $effective_date."'");

		
		return $query->result_array();
	}
	

	public function getPtax($gross_pay,$state_id) {
		//echo $state_id;die;
		//$query = $this->db->query("SELECT [dbo].[gross_pay_func] ('".$gross_pay."') as ptax");
		$query = $this->db->query("SELECT [dbo].[get_pTax_func] ('".$gross_pay."','". $state_id ."') as ptax");
		// $query = "SELECT [dbo].[gross_pay_func] (100) as abc";
		// echo $query;die;
		return $query->row();
	}

	public function getMaxmin() {
		$query = $this->db->query("SELECT max_prcntg,min_prcntg from salary_head_mst where head_id=1");
		return $query->row();
	}

		public function edit_billing_costing($client_id,$billing_costing_id){
			$qry = $this->db->query("SELECT billing_costing_cost_id,branch_id,client_id,post_id,zone_id,hsn_no,contract_type,CONVERT(DATE,commencement_date) commencement_date,CONVERT(DATE,termination_date)termination_date,status,gross_pay,bill_calculation_days,person_number,duty_hrs,releiver_chrg,monthly_ctc,annual_ctc,round_off,service_chrg_prcnt,service_chrg,total_bill_amt,total_ctc_amt
      ,gross_profit,epf,esi,lwf,ptax,tot_dedn,net_pay,pay_hrs,ot_rate_type,ot_rt,esi_wage,ot_esi_wage,pf_wage,salary_type,salary_days,billing_type FROM billing_costing_header where active_status=1 and client_id=".$client_id." and billing_costing_cost_id=".$billing_costing_id);
			return $qry->result();
			
		}

		public function edit_billing_costing_detail($client_id,$billing_costing_id){
			//$qry = $this->db->query("SELECT billing_costing_detail_id,billing_costing_header_id,salary_head_id,type,rate,basis,limit,criteria,periodicity FROM billing_costing_detail where active_status=1 and billing_costing_header_id=".$billing_costing_id);
			$qry = $this->db->query("SELECT bcd.billing_costing_detail_id,bcd.billing_costing_header_id,bcd.salary_head_id,bcd.type,isnull(bcd.rate,'0') rate,bcd.basis,bcd.limit,bcd.criteria,bcd.periodicity,isnull(bcd.method,'') method,shm.max_prcntg,shm.min_prcntg FROM billing_costing_detail bcd inner join salary_head_mst shm on shm.head_id=bcd.salary_head_id where bcd.active_status=1 and bcd.billing_costing_header_id=".$billing_costing_id);

			
			return $qry->result_array();
			
		}

		public function edit_billing_costing_skilled($billing_costing_id)
		{
			
			$qry = $this->db->query("SELECT * from billing_costing_skilled where  billing_costing_header_id=".$billing_costing_id);

			
			return $qry->row();
			
		}

	public function UpdateBillingCosting($client_id,$billing_costing_id,$post_id,$zone_id,$commencement_date,$contract_type,$status,$termination_date,$bill_calculation_days,$gross_pay,$hsn_no,$person_number,$duty_hrs,$releiver_chrg,$monthly_ctc,$annual_ctc,$round_off,$service_chrg_prcnt,$service_chrg,$total_bill_amt,$total_ctc_amt,$gross_profit,$epf,$esi,$lwf,$ptax,$tot_dedn,$net_pay,$pay_hrs,$ot_rate_type,$ot_rt,$esi_wage,$ot_esi_wage,$pf_wage,$branch_id,$head_id,$type_id,$rate,$basis,$limit,$criteria,$periodicity,$method,$detail_id,$salary_head_amnt,$salary_type,$salary_days,$billing_type,$basic_highly_skilled,$basic_skilled,$basic_semi_skilled,$basic_un_skilled,$da_highly_skilled,$da_skilled,$da_semi_skilled,$da_un_skilled,$overtime_highly_skilled,$overtime_skilled,$overtime_semi_skilled,$overtime_un_skilled,$effective_date,$billing_costing_skilled_id)
	{
		$tot_head = count($head_id);
		$detail_data = '';
		
		for($i=0; $i<$tot_head; $i++)
		{
			$detail_data .= $detail_id[$i].'|~|'.$head_id[$i].'|~|'.$type_id[$i].'|~|'.$rate[$i].'|~|'.$basis[$i].'|~|'.$limit[$i].'|~|'.$criteria[$i].'|~|'.$periodicity[$i].'|~|'.$method[$i].'|~|'.$salary_head_amnt[$i].'#';
		}
		 
		 //print_r($detail_data);die;
		 $detail_data = rtrim($detail_data, "#");

		 //echo $detail_data;die;

		 
		$user_id = $this->session->user_id;
		$com_date = date("Y-m-d", strtotime($commencement_date));
		$term_date = date("Y-m-d", strtotime($termination_date));

		if($term_date == '1970-01-01')
		{
			$term_date = '';
		}

		$query = $this->db->query("EXEC edit_billing_costing_proc @p_client_id = '".$client_id."',@p_billing_costing_id='". $billing_costing_id ."', @p_post_id = '".$post_id."', @p_zone_id = '". $zone_id ."',@p_com_date = '".$com_date."', @p_contract_type = '".$contract_type."' ,@p_status = '".$status."' , @p_term_date = '".$term_date."', @p_bill_calculation_days = '".$bill_calculation_days."',@p_gross_pay = '".$gross_pay."',@p_hsn_no = '".$hsn_no."',@p_person_number = '".$person_number."',@p_duty_hrs = '".$duty_hrs."',@p_releiver_chrg = '".$releiver_chrg."',@p_monthly_ctc = '".$monthly_ctc."',@p_annual_ctc = '".$annual_ctc."',@p_round_off = '".$round_off."',@p_service_chrg_prcnt = '".$service_chrg_prcnt."',@p_service_chrg = '".$service_chrg."',@p_total_bill_amt = '".$total_bill_amt."',@p_total_ctc_amt = '".$total_ctc_amt."',@p_gross_profit = '".$gross_profit."',@p_epf = '".$epf."',@p_esi = '".$esi."',@p_lwf = '".$lwf."',@p_ptax = '".$ptax."',@p_tot_dedn = '".$tot_dedn."',@p_net_pay = '".$net_pay."',@p_pay_hrs = '".$pay_hrs."',@p_ot_rate_type = '".$ot_rate_type."',@p_ot_rt = '".$ot_rt."',@p_esi_wage = '".$esi_wage."',@p_ot_esi_wage = '".$ot_esi_wage."',@p_pf_wage = '".$pf_wage."',@p_branch_id = '".$branch_id."',@p_user_id='". $user_id ."',@p_salary_type='". $salary_type ."',@p_salary_days='". $salary_days ."',@p_billing_type='". $billing_type ."', @p_detail_data = '". $detail_data."', @p_basic_highly_skilled = '". $basic_highly_skilled."', @p_basic_skilled = '". $basic_skilled."', @p_basic_semi_skilled = '". $basic_semi_skilled."', @p_basic_un_skilled = '". $basic_un_skilled."', @p_da_highly_skilled= '". $da_highly_skilled."', @p_da_skilled = '". $da_skilled."', @p_da_semi_skilled = '". $da_semi_skilled."', @p_da_un_skilled = '". $da_un_skilled."', @p_overtime_highly_skilled = '". $overtime_highly_skilled."', @p_overtime_skilled = '". $overtime_skilled."', @p_overtime_semi_skilled = '". $overtime_semi_skilled."', @p_overtime_un_skilled = '". $overtime_un_skilled."', @p_effective_date = '". $effective_date."',@p_billing_costing_skilled_id = '". $billing_costing_skilled_id."' ");
		// echo $this->db->last_query();
		// exit();
		
		return $query;
	}

	public function checkHeader($status,$desig_name,$commencement_date,$client_id,$branch_id) {
		$query = $this->db->query("SELECT count(*) cnt from billing_costing_header where commencement_date ='". $commencement_date ."' and post_id='". $desig_name ."' and status='". $status ."' and client_id='". $client_id."' and branch_id='". $branch_id."'");
		//echo $this->db->last_query();die;
		return $query->row();
	}

	public function get_all_conType()
	{
		$query = $this->db->query("Select contract_type_id,contract_type_name from contract_type_mst where active_status=1;");
		return $query->result();
	}

}

