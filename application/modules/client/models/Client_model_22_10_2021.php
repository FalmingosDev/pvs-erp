<?php
class Client_model extends CI_Model {
	
	protected $table_name = 'client_mst';
	protected $client_contact = 'client_contact_mst';

	
	public function __construct() {
		parent::__construct();
	}
	
	public function client_list() {
		$qry = "SELECT cm.client_id, cm.client_code, cm.client_name, cm.agreement_start_date, cm.agreement_end_date, CONCAT(cm.address_1, ', ', ct.city_name, ', ', st.state_name, ' Pin - ', cm.pincode) AS address, 
		cm.contact_no, CASE WHEN cm.location_type = 'S' THEN 'Single' WHEN cm.location_type = 'M' THEN 'Multiple' ELSE '' END AS location_type, cm.active_status, cm.approval_status_1, 
		ISNULL(CONCAT(em1.employee_code, ' - ', em1.first_name, ' ', em1.last_name), '') approval_level_1, ISNULL(cm.approval_remarks_1, '') approval_remarks_1, cm.approval_status_2, 
		ISNULL(CONCAT(em2.employee_code, ' - ', em2.first_name, ' ', em2.last_name), '') approval_level_2, ISNULL(cm.approval_remarks_2, '') approval_remarks_2, 
		ISNULL(sbm.sales_billing_id, 0) sales_billing_id, ISNULL(sbm.contact_name, '') contact_name, 
		ISNULL(sbm.address_1, '') contact_address_1, ISNULL((CASE sbm.bill_type WHEN 'F' THEN 'Fixed' WHEN 'M' THEN 'Muster' ELSE '' END), '') bill_type, 
		ISNULL(bm.branch_id, 0) branch_id, ISNULL(bm.branch_name, '') branch_name, ISNULL(CONCAT(bm.address_1, ', ', bct.city_name, ', ', bst.state_name, ' Pin - ', bm.pincode), '') AS branch_address, ISNULL(bm.sole_id, '') sole_id, 
		ISNULL(bch.billing_costing_cost_id, 0) billing_costing_cost_id, ISNULL(bch.post_id, 0) post_id, ISNULL(dm.desig_short_name, '') desig_short_name, 
		ISNULL(bch.gross_pay, 0) gross_pay, ISNULL(bch.monthly_ctc, 0) monthly_ctc, ISNULL(bch.annual_ctc, 0) annual_ctc, ISNULL(bch.total_bill_amt, 0) total_bill_amt, ISNULL(bch.gross_profit, 0) gross_profit, 
		ISNULL(bch.hsn_no, '') hsn_no, ISNULL(bch.status, '') billing_status 
		FROM client_mst cm 
		LEFT JOIN state_mst st ON cm.state_id = st.state_id 
		LEFT JOIN city_mst ct ON cm.city_id = ct.city_id 
		LEFT JOIN sales_billing_mst sbm ON cm.client_id = sbm.client_id 
		LEFT JOIN branch_mst bm ON cm.client_id = bm.client_id 
		LEFT JOIN state_mst bst ON bm.state_id = bst.state_id 
		LEFT JOIN city_mst bct ON bm.city_id = bct.city_id 
		LEFT JOIN billing_costing_header bch ON cm.client_id = bch.client_id 
		LEFT JOIN designation_mst dm ON bch.post_id = dm.desig_id 
		LEFT JOIN employee_mst em1 ON cm.approve_by_1 = em1.employee_id 
		LEFT JOIN employee_mst em2 ON cm.approve_by_2 = em2.employee_id 
		ORDER BY cm.client_name, cm.client_id;";
		//echo $qry;die;

		
		$query = $this->db->query($qry);
		//exit(json_encode($this->db->last_query()));
		return $query->result();
	}

	public function get_all_type()
	{
		$query = $this->db->query("Select industry_type_id,industry_type_name from industry_type_mst where active_status=1 ORDER BY industry_type_name ;");
		return $query->result();
	}

	public function get_all_rating()
	{
		$query = $this->db->query("Select rating_id,rating_short_name from rating_mst where active_status=1 ORDER BY rating_short_name;");
		return $query->result();
	}

	public function get_all_state() {
		$query = $this->db->query("Select state_id,state_name from state_mst where active_status=1 ORDER BY state_name;");
		return $query->result();
	}
	
	public function get_all_category() {
		$query = $this->db->query("SELECT gst_category_id,gst_category_name FROM gst_category_mst where active_status=1 ORDER BY gst_category_name;");
		return $query->result();
	}
	
	public function get_ser_category() {
		$query = $this->db->query("SELECT gst_service_category_id as ser_id,gst_service_category_name as ser_name  FROM gst_service_category_mst where active_status=1 ORDER BY gst_service_category_name;");
		return $query->result();
	}

	public function get_all_mwType() {
		$query = $this->db->query("Select mw_type_id,mw_type_name from mw_type_mst where active_status=1 ORDER BY mw_type_name;");
		return $query->result();
	}

	public function get_all_source() {
		$query = $this->db->query("Select source_id,source_name from source_mst where active_status=1 ORDER BY source_name;");
		return $query->result();
	}

	public function get_all_contractStatus() {
		$query = $this->db->query("Select contract_status_id,contract_status_name from contract_status_mst where active_status=1 ORDER BY contract_status_name;");
		return $query->result();
	}

	public function getCity($state_id) {
		$query = $this->db->query("Select city_id,city_name from city_mst where state_id='". $state_id ."' and active_status=1 ORDER BY city_name;");
		//echo $query = "Select city_id,city_name from city_mst where state_id='". $state_id ."' and active_status=1 ORDER BY city_name;";die;
		return $query->result_array();
	}

	public function insertClient($client_name,$client_code,$address_line_1,$agreemnt_start_date,$agreemnt_end_date,$address_line_2,$type_id,$address_line_3,$rating_id,$state_id,$location,$city_id,$tel_nos,$pincode,$fax,$foundation_day,$client_email,$mw_type_id,$website,$source_id, $contract_status_id,$source_ref,$name,$designation,$contact_no,$email,$birthday,$anniversary,$remarks,$billing_method)
	{
		$tot_name = count($name);
		$detail_data = '';
		//$new_birthday = date("Y-m-d", strtotime($birthday));

		for($i=0; $i<$tot_name; $i++)
		{
			$detail_data .= $name[$i].'|~|'.$designation[$i].'|~|'.$contact_no[$i].'|~|'.$email[$i].'|~|'.'2000-' .$birthday[$i] . '|~|'.'2000-' .$anniversary[$i]. '#';
		}
		//print_r($detail_data);die;
		 $detail_data = rtrim($detail_data, "#");

		 //print_r($detail_data);die;


		$user_id = $this->session->user_id;
		$start_date = date("Y-m-d", strtotime($agreemnt_start_date));
		$end_date = date("Y-m-d", strtotime($agreemnt_end_date));
		$foundation_date = date("Y-m-d", strtotime($foundation_day));

		if($foundation_date == '1970-01-01')
		{
			$foundation_date = '';
		}

		$query = $this->db->query("EXEC add_client_proc @p_client_name = '" . escape_str($client_name) . "',@p_client_code = '" .$client_code. "', @p_agreement_start_date = '".$start_date."', @p_agreement_end_date = '".$end_date."', @p_address_1 = '".escape_str($address_line_1)."' ,@p_industry_type_id = '".$type_id."' , @p_rating_id = '".$rating_id."', @p_location_type = '".$location."',@p_address_2 = '".escape_str($address_line_2)."', @p_address_3 = '".escape_str($address_line_3)."', @p_state_id = '".$state_id."', @p_city_id = '".$city_id."', @p_pincode = '". escape_str($pincode)."', @p_contact_no = '".escape_str($tel_nos)."', @p_fax_no = '".escape_str($fax)."',@p_email = '".escape_str($client_email)."', @p_website = '".escape_str($website)."', @p_foundation_date = '".$foundation_date."', @p_contract_status_id = '".$contract_status_id."', @p_mw_type_id = '".$mw_type_id."', @p_source_id = '".$source_id."', @p_source_reference = '".escape_str($source_ref)."',@p_user_id = '".$user_id."',@p_remarks = '".escape_str($remarks)."',@p_billing_method = '".$billing_method."', @p_detail_data = '". $detail_data."'");

		
		return $query->result_array();
	}

		public function checkClient($client_name,$client_id){
			
			$condition = '';
			if(!empty($client_id)){
				$condition = " AND client_id != '" . $client_id . "'";
			}
			$check_client = $this->db->query("select client_name from client_mst where client_name='". escape_str($client_name) . "'". $condition);
			//echo $check_client = "select client_name from client_mst where client_name='". $client_name . "'". $condition;die;
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

		public function checkClientCode($client_code,$client_id){
			
			$condition = '';
			if(!empty($client_id)){
				$condition = " AND client_id != '" . $client_id . "'";
			}
			$check_client = $this->db->query("select client_code from client_mst where client_code='". escape_str($client_code) . "'". $condition);
			//echo $check_client = "select client_name from client_mst where client_name='". $client_name . "'". $condition;die;
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

		public function editclient($id){
			$qry = $this->db->query("SELECT cm.client_id, cm.client_code, cm.client_name, cm.agreement_start_date, cm.agreement_end_date, cm.industry_type_id, cm.rating_id, cm.location_type, cm.address_1, cm.address_2, cm.address_3, cm.state_id, cm.city_id, cm.pincode, cm.contact_no, cm.fax_no, cm.email, cm.website, cm.foundation_date, cm.contract_status_id, cm.mw_type_id, cm.source_id, cm.source_reference, cm.approval_status_1, cm.approve_by_1, cm.approval_remarks_1, cm.approval_status_2, cm.approve_by_2, cm.approval_remarks_2, cm.active_status, cm.remarks, ISNULL(cm.submit_for_approval, 0) submit_for_approval, ISNULL(CONCAT(em1.employee_code, ' - ', em1.first_name, ' ', em1.last_name), '') approval_level_1, ISNULL(CONCAT(em2.employee_code, ' - ', em2.first_name, ' ', em2.last_name), '') approval_level_2, cm.billing_method
			FROM " . $this->table_name . " cm 
			LEFT JOIN employee_mst em1 ON cm.approve_by_1 = em1.employee_id 
			LEFT JOIN employee_mst em2 ON cm.approve_by_2 = em2.employee_id 
			WHERE cm.active_status = 1 AND cm.client_id = " . $id);
			return $qry->row();
			
		}

		public function editclientContact($id){
			//echo $qry = "SELECT client_contact_id,client_id,name,designation,contact_no,email,birth_date      ,anniversary_date from " . $this->client_contact . " where active_status=1 and client_id=".$id;die;
			$qry = $this->db->query("SELECT client_contact_id,client_id,name,designation,contact_no,email,birth_date      ,anniversary_date from " . $this->client_contact . " where active_status=1 and client_id=".$id);
			return $qry->result_array();
			
		}
		
		public function getApprovalLevel($user_id) {
			$query = $this->db->query("SELECT [dbo].get_user_approval_level_func('" . $user_id . "') AS my_approval_level;");
			return $query->row();
		}
		
		public function client_others_info($client_id){
			$qry_1 = "SELECT COUNT(1) AS branch_cnt FROM branch_mst WHERE client_id = " . $client_id;
			$qry_2 = "SELECT COUNT(1) AS sales_billing_cnt FROM sales_billing_mst WHERE client_id = " . $client_id;
			$qry_3 = "SELECT COUNT(1) AS billing_costing_cnt FROM billing_costing_header WHERE client_id = " . $client_id;
			$data = array();
			$rs_1 = $this->db->query($qry_1);
			$cnt_1 = $rs_1->row();
			$data['branch_cnt'] = $cnt_1->branch_cnt;
			$rs_2 = $this->db->query($qry_2);
			$cnt_2 = $rs_2->row();
			$data['sales_billing_cnt'] = $cnt_2->sales_billing_cnt;
			$rs_3 = $this->db->query($qry_3);
			$cnt_3 = $rs_3->row();
			$data['billing_costing_cnt'] = $cnt_3->billing_costing_cnt;
			return $data;
			
		}
		
		public function get_city($state_id) {
			$query = $this->db->query("Select city_id,city_name from city_mst where state_id='". $state_id ."' and active_status=1 ORDER BY city_name;");
			return $query->result();
		}

	public function UpdateClient($client_id,$client_name,$client_code,$address_line_1,$agreemnt_start_date,$agreemnt_end_date,$address_line_2,$type_id,$address_line_3,$rating_id,$state_id,$location,$city_id,$tel_nos,$pincode,$fax,$foundation_day,$client_email,$mw_type_id,$website,$source_id, $contract_status_id,$source_ref,$name,$designation,$contact_no,$email,$birthday,$anniversary,$remarks,$detail_id, $action,$billing_method)
	{
		$tot_name = count($name);
		$detail_data = '';
		//$new_birthday = date("Y-m-d", strtotime($birthday));

		for($i=0; $i<$tot_name; $i++)
		{
			$detail_data .= $detail_id[$i].'|~|'. $name[$i].'|~|'.$designation[$i].'|~|'.$contact_no[$i].'|~|'.$email[$i].'|~|'.'2000-' .$birthday[$i].'|~|'.'2000-' .$anniversary[$i].'#';
		}
		//print_r($detail_data);die;
		 $detail_data = rtrim($detail_data, "#");

		 //print_r($detail_data);die;


		$user_id = $this->session->user_id;
		$start_date = date("Y-m-d", strtotime($agreemnt_start_date));
		$end_date = date("Y-m-d", strtotime($agreemnt_end_date));
		$foundation_date = date("Y-m-d", strtotime($foundation_day));

		if($foundation_date == '1970-01-01')
		{
			$foundation_date = '';
		}

		$query = $this->db->query("EXEC edit_client_proc @p_client_id= '". $client_id ."',@p_client_name = '" . escape_str($client_name) . "',@p_client_code= '". $client_code ."', @p_agreement_start_date = '".$start_date."', @p_agreement_end_date = '".$end_date."', @p_address_1 = '".escape_str($address_line_1)."' ,@p_industry_type_id = '".$type_id."' , @p_rating_id = '".$rating_id."', @p_location_type = '".$location."',@p_address_2 = '".escape_str($address_line_2)."', @p_address_3 = '".escape_str($address_line_3)."', @p_state_id = '".$state_id."', @p_city_id = '".$city_id."', @p_pincode = '". escape_str($pincode)."', @p_contact_no = '".escape_str($tel_nos)."', @p_fax_no = '".escape_str($fax)."',@p_email = '".escape_str($client_email)."', @p_website = '".escape_str($website)."', @p_foundation_date = '".$foundation_date."', @p_contract_status_id = '".$contract_status_id."', @p_mw_type_id = '".$mw_type_id."', @p_source_id = '".$source_id."', @p_source_reference = '".escape_str($source_ref)."',@p_user_id = '".$user_id."',@p_remarks = '".escape_str($remarks)."', @p_detail_data = '". $detail_data."', @p_action = '".$action."', @p_billing_method = '".$billing_method."'");

		
		return $query;
	}
	
	public function updateClientApproval($client_id, $approval_level, $approval_remarks, $action) {
		$query = $this->db->query("EXEC update_client_approval_proc @p_client_id = '". $client_id ."', @p_approval_level = '".$approval_level."', @p_approval_remarks = '".$approval_remarks."', @p_action = '".$action."', @p_user_id = '". $this->session->user_id ."';");
		//exit($this->db->last_query());
		return $query;
	}
	
	public function getClientName($id){
		$query = $this->db->query("Select client_id, client_code, client_name, location_type, ISNULL(submit_for_approval, 0) submit_for_approval from client_mst WHERE client_id = ".$id);
		return $query->row();
	}
	
	public function change_status($id, $status){
        $set = ($status == '1') ? 0 : 1 ;
        
        $query = "UPDATE " . $this->table_name . " SET active_status=" . $set . " WHERE client_id=" . $id;
        $res = $this->db->query($query);
        if(!$res) {
            return false;
        } else {
            return true;
        }
    }

}

