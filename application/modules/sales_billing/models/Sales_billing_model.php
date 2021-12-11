<?php
class sales_billing_model extends CI_Model 
{
	protected $roleTable = 'role_mst';
	
	public function __construct() 
	{
		parent::__construct();
	}

	public function get_state_all()
	{
		$query = $this->db->query("SELECT state_name FROM state_mst where active_status=1");
		return $query->result();
	}

	public function get_state_code($state_name)
	{
		$query = $this->db->query("SELECT state_code FROM state_mst where active_status=1 AND state_name='".$state_name."' ");
		return $query->row();
	}
	
	public function billing_method($client_id)
	{
		$query = $this->db->query("SELECT billing_method FROM client_mst where client_id='".$client_id."'");
		return $query->row();
	}

	public function entry_check_branch($client_id,$branch_id)
	{
		$query = $this->db->query("SELECT * FROM sales_billing_mst where client_id='".$client_id."' AND branch_id='".$branch_id."'");
		return $query->row();
	}

	public function entry_check_state($client_id,$branch_state_id)
	{
		$query = $this->db->query("SELECT * FROM sales_billing_mst where client_id='".$client_id."' AND branch_state_id='".$branch_state_id."'");
		return $query->row();
	}

	public function update_entry_check_branch($client_id,$sales_billing_id,$branch_id)
	{
		$query = $this->db->query("SELECT * FROM sales_billing_mst where client_id='".$client_id."' AND sales_billing_id!='".$sales_billing_id."' AND branch_id='".$branch_id."'");
		return $query->row();
	}

	public function update_entry_check_state($client_id,$sales_billing_id,$branch_state_id)
	{
		$query = $this->db->query("SELECT * FROM sales_billing_mst where client_id='".$client_id."' AND sales_billing_id!='".$sales_billing_id."' AND branch_state_id='".$branch_state_id."'");
		return $query->row();
	}

	public function getBranch($client_id) 
	{
		$query = $this->db->query("select DISTINCT st.state_id,st.state_name from  branch_mst bm
		LEFT JOIN client_mst cm ON bm.client_id = cm.client_id 
		LEFT JOIN state_mst st ON bm.state_id = st.state_id 
		where bm.client_id='". $client_id ."' ORDER BY st.state_name");
		return $query->result_array(); 
	}

	public function getBillingBranch($client_id) 
	{
		$query = $this->db->query("select DISTINCT bm.branch_name,bm.branch_id from  branch_mst bm
		LEFT JOIN client_mst cm ON bm.client_id = cm.client_id 
		where bm.client_id='". $client_id ."' ORDER BY bm.branch_name");
		return $query->result_array(); 
	}

	public function get_all_billing($client_id) 
	{
		//echo $client_id; die;
		$query = $this->db->query("SELECT DISTINCT sb.sales_billing_id,sb.contact_name,sb.contact_number,sb.contact_email,CONCAT(sb.address_1, ', ', sb.address_2, ',', sb.address_2) AS address,CONCAT(bm.branch_name, ' ', sm.state_name) AS branch_state
		FROM sales_billing_mst sb
		LEFT JOIN branch_mst bm ON bm.branch_id = sb.branch_id
		LEFT JOIN state_mst sm ON sm.state_id = sb.branch_state_id	
		WHERE sb.client_id =".$client_id);
		return $query->result();
	}

	public function insert_sales_billing($client_id,$branch_state_id,$billing_branch_id,$billstartdate,$addressline1,$addressline2,$addressline3,$state_id,$city_id,$tel_nos,$pincode,$agreementvalidity,$contract_value,$fax,$dateofcontract,$pf,$esi,$contractrewexp,$cars,$bonus,$agreementsummary,$rc_charge,$bill_pre,$site_at,$po_no,$gstin,$hsn,$cgst,$sgst,$igst,$statecode,$statename,$c_pan,$utgst,$rcm,$cess,$p_supply,$ad_tax,$gst_status,$created_by,$contact_name,$contact_no,$email,$servicecharges,$fixed,$q_gen_by,$cont_agre,$cat_id,$ser_cat_id,$clause,$enclosuers,$cont_agri_date){
		//echo $contract_value; die;
		$start_date = date("Y-m-d", strtotime($billstartdate));
		$contractrewexp_date = date("Y-m-d", strtotime($contractrewexp));
		$agreementvalidity_date = date("Y-m-d", strtotime($agreementvalidity));
		$dateofcontract_date = date("Y-m-d", strtotime($dateofcontract));
		$cont_agri_date_date = date("Y-m-d", strtotime($cont_agri_date));

		$query = $this->db->query("EXEC add_sales_billing_proc @p_created_by = '".$created_by."', @p_client_id = '".$client_id."',@p_branch_state_id = '".$branch_state_id."',@p_billing_branch_id = '".$billing_branch_id."',@p_addressline1 = '".escape_str($addressline1)."',@p_addressline2 = '".escape_str($addressline2)."', @p_addressline3 ='".escape_str($addressline3)."', @p_state_id = '".$state_id."', @p_city_id='".$city_id."', @p_pincode='".$pincode."', @p_contact_name ='".escape_str($contact_name)."', @p_contact_no ='".$contact_no."',@p_email='".$email."',@p_servicecharges ='".$servicecharges."',@p_fixed='".$fixed."',@p_pf='".$pf."',@p_esi='".$esi."',@p_bonus='".$bonus."',@p_rc_charge='".$rc_charge."',@p_bill_pre='".$bill_pre."',@p_site_at='".$site_at."',@p_po_no='".$po_no."',@p_billstartdate='".$start_date."',@p_q_gen_by='".escape_str($q_gen_by)."',@p_cont_agre='".$cont_agre."',@p_contractrewexp='".$contractrewexp_date."',@p_agreementvalidity='".$agreementvalidity_date."',@p_dateofcontract='".$dateofcontract_date."',@p_cars='".$cars."',@p_agreementsummary='".escape_str($agreementsummary)."',@p_gstin='".$gstin."',@p_hsn='".$hsn."',@p_gst_category_id='".$cat_id."',@p_gst_service_category_id='".$ser_cat_id."',@p_statecode='".$statecode."',@p_statename='".$statename."',@p_c_pan='".$c_pan."',@p_rcm='".$rcm."',@p_supply='".$p_supply."',@p_gst_status='".$gst_status."',@p_sgst='".$sgst."',@p_cgst='".$cgst."',@p_igst='".$igst."',@p_utgst='".$utgst."',@p_cess='".$cess."',@p_ad_tax='".$ad_tax."',@p_contract_agreement_date='".$cont_agri_date_date."',@p_agreement_clause='".$clause."',@p_contract_value='".$contract_value."',@p_enclosures='".$clause."'");
		return $this->db->affected_rows();
	}
	
	public function update_sales_billing($sales_billing_id, $client_id,$branch_state_id,$billing_branch_id, $billstartdate, $addressline1, $addressline2, $addressline3, $state_id, $city_id, $tel_nos, $pincode, $agreementvalidity,$contract_value, $fax, $dateofcontract, $pf, $esi, $contractrewexp, $cars, $bonus, $agreementsummary, $rc_charge, $bill_pre, $site_at, $po_no, $gstin, $hsn, $cgst, $sgst, $igst, $statecode, $statename, $c_pan, $utgst, $rcm, $cess, $supply, $ad_tax, $gst_status, $logged_user_id, $contact_name, $contact_no, $contact_email, $servicecharges, $fixed, $q_gen_by, $cont_agre, $cat_id, $ser_cat_id, $clause, $enclosuers, $cont_agri_date){
		//echo $city_id; die;
		$start_date = date("Y-m-d", strtotime($billstartdate));
		$contractrewexp_date = date("Y-m-d", strtotime($contractrewexp));
		$agreementvalidity_date = date("Y-m-d", strtotime($agreementvalidity));
		$dateofcontract_date = date("Y-m-d", strtotime($dateofcontract));
		$cont_agri_date_date = date("Y-m-d", strtotime($cont_agri_date));
		
		
		$query = $this->db->query("EXEC edit_sales_billing_proc @p_sales_billing_id = '".$sales_billing_id."', @p_client_id = '".$client_id."',@p_branch_state_id = '".$branch_state_id."',@p_branch_id = '".$billing_branch_id."',@p_billstartdate='".$start_date."',@p_addressline1 = '".escape_str($addressline1)."',@p_addressline2 = '".escape_str($addressline2)."', @p_addressline3 ='".escape_str($addressline3)."', @p_state_id = '".$state_id."', @p_city_id='".$city_id."', @p_pincode='".$pincode."', @p_contact_name ='".escape_str($contact_name)."', @p_contact_no ='".$contact_no."',@p_email='".$contact_email."',@p_servicecharges ='".$servicecharges."',@p_fixed='".$fixed."',@p_pf='".$pf."',@p_esi='".$esi."',@p_bonus='".$bonus."',@p_rc_charge='".$rc_charge."',@p_bill_pre='".$bill_pre."',@p_site_at='".$site_at."',@p_po_no='".$po_no."',@p_q_gen_by='".escape_str($q_gen_by)."',@p_cont_agre='".$cont_agre."',@p_contractrewexp='".$contractrewexp_date."',@p_agreementvalidity='".$agreementvalidity_date."',@p_dateofcontract='".$dateofcontract_date."',@p_cars='".$cars."',@p_agreementsummary='".escape_str($agreementsummary)."',@p_gstin='".$gstin."',@p_hsn='".$hsn."',@p_gst_category_id='".$cat_id."',@p_gst_service_category_id='".$ser_cat_id."',@p_statecode='".$statecode."',@p_statename='".$statename."',@p_c_pan='".$c_pan."',@p_rcm='".$rcm."',@p_supply='".$supply."',@p_gst_status='".$gst_status."',@p_sgst='".$sgst."',@p_cgst='".$cgst."',@p_igst='".$igst."',@p_utgst='".$utgst."',@p_cess='".$cess."',@p_ad_tax='".$ad_tax."',@p_contract_agreement_date='".$cont_agri_date_date."',@p_agreement_clause='".$clause."',@p_enclosures='".$clause."',@p_contract_value='".$contract_value."', @p_logged_user_id = '".$logged_user_id."'");
		return $this->db->affected_rows();
	}
	
	public function get_details($sales_billing_id){
		$query = $this->db->query("SELECT sales_billing_id, client_id, address_1, address_2, address_3, state_id, city_id, pincode, contact_name, contact_number, contact_email, contact_location, service_charges, bill_type, pf,contract_value, esi, bonus, releiving_charges, bill_prefix, site_at, po_no, bill_start_date, query_generated_by, contract_agreement_status, contract_agreement_date, agreement_clause, agreement_validity, contract_date, contract_expiry_date, contract_type, agreement_summery, enclosures, gstin_no, hsn_no, gst_category_id, gst_service_category_id, state_code, state_name, client_pan_no, rcn_applicable, supply_place, gst_status, sgst, cgst, igst, ugst, cess, additional_tax, active_status,branch_id,branch_state_id, created_by, created_ts, updated_by, updated_ts FROM sales_billing_mst WHERE  sales_billing_id = " . $sales_billing_id);
		return $query->row();
	}
	
	public function getSalesBillingId($clientId){
		$query = $this->db->query("SELECT sales_billing_id FROM sales_billing_mst WHERE client_id = " . $clientId);
		return $query->row();
	}
}