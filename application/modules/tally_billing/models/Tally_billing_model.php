<?php
class Tally_billing_model extends CI_Model 
{
	protected $billingTallyTable = 'billing_tally_mst';
	
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
	
	public function get_all_list() 
	{
		$query = $this->db->query("select cm.client_name,bm.branch_name,bt.*
		from billing_tally_mst bt 
		inner join client_mst cm on bt.client_id = cm.client_id 
		inner join branch_mst bm on bt.branch_id = bm.branch_id
		ORDER BY bt.billing_tally_id");
		return $query->result();
	}
	
	
	
	public function change_status($id,$status)
	{
		//print_r($status); exit;
		$set = ($status == '1') ? 0 : 1 ;
		$where = [ 'esi_organisation_id' => $id ];

		// print_r($set);die;

		$query = "update " . $this->billingTallyTable . " set active_status=" . $set . " where billing_tally_id=" . $id;
		//echo $query;die; 
		$res = $this->db->query($query);
		if(!$res) {
			return false;
		} else {
			return true;
		}
	}
	
	public function add_tb($client_id,$branch_id,$customer_ledger_code,$igst_code,$cost_category,$cast_center,$sales_head_code,$round_of,$cgst_code,$sgst_code,$ugst_code,$add_text_code)
	{
		//echo $pin; die;
		$query = $this->db->query("insert into billing_tally_mst (client_id,branch_id,customer_ledger_code,igst_code,cost_category,cast_center,sales_head_code,round_off,cgst_code,sgst_code,utgst_code,add_tax_code,active_status,created_ts) values ('".$client_id."','".$branch_id."','".$customer_ledger_code."','".$igst_code."','".$cost_category."','".$cast_center."','".$sales_head_code."','".$round_of."','".$cgst_code."','".$sgst_code."','".$ugst_code."','".$add_text_code."','1',GETDATE());");
		return $this->db->affected_rows();
	}
	
	function view($id)
	{
		$query = $this->db->query('SELECT * FROM billing_tally_mst
		where billing_tally_id = '.$id);
		return $query->row();
	}
	
	public function edit_tb($client_id,$branch_id,$customer_ledger_code,$igst_code,$cost_category,$cast_center,$sales_head_code,$round_of,$cgst_code,$sgst_code,$ugst_code,$add_text_code,$billing_tally_id)
	{
		//echo $id; die;
		
		$query = $this->db->query("UPDATE billing_tally_mst
		SET client_id='".$client_id."',branch_id='".$branch_id."',customer_ledger_code='".$customer_ledger_code."',igst_code='".$igst_code."',cost_category='".$cost_category."',cast_center='".$cast_center."',sales_head_code='".$sales_head_code."',round_off='".$round_of."',cgst_code='".$cgst_code."',sgst_code='".$sgst_code."',utgst_code='".$ugst_code."',add_tax_code='".$add_text_code."' WHERE billing_tally_id = ".$billing_tally_id);
		
		return $this->db->affected_rows();
	}

}