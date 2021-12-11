<?php
class Industry_type_model extends CI_Model {
	protected $industryTable = 'industry_type_mst';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_all_industry() {
		$query = $this->db->query("Select industry_type_id,industry_type_name,industry_type_short_name,active_status from industry_type_mst ORDER BY industry_type_name;");
		return $query->result();
	}
	
	public function checkIndustry($industry_type_name,$industry_type_id){
		
		$condition = '';
		if(!empty($industry_type_id)){
			$condition = " AND  industry_type_id != '" . $industry_type_id . "'";
		}
		
		$check_industry = $this->db->query("select industry_type_name from industry_type_mst where industry_type_name='". $industry_type_name . "'" . $condition);
		$rows = $check_industry->num_rows();
		//echo $rows; die;
		if($rows > 0)
		{
			return true;
		}
		else
		{
			//echo $rows;die;
			return false;
		}
	}
	
	public function checkStIndustry($industry_type_short_name,$industry_type_id){
		
		$condition = '';
		if(!empty($industry_type_id)){
			$condition = " AND industry_type_id != '" . $industry_type_id . "'";
		}
		
		$check_industry = $this->db->query("select industry_type_name from industry_type_mst where industry_type_short_name='". $industry_type_short_name . "'" . $condition);
		$rows = $check_industry->num_rows();
		if($rows > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
		public function change_status($id,$status){
			//print_r($status); exit;
		$set = ($status == '1') ? 0 : 1 ;
		$where = [ 'industry_type_id' => $id ];

		// print_r($set);die;

		$query = "update " . $this->industryTable . " set active_status=" . $set . " where industry_type_id=" . $id;
		//echo $query;die;
		$res = $this->db->query($query);
		if(!$res) {
			return false;
		} else {
			return true;
		}
	}
	


	public function add_industry($industry_type_name,$industry_type_short_name){
		$query = $this->db->query("insert into industry_type_mst (industry_type_name,industry_type_short_name,created_by,created_ts) values ('".$industry_type_name."','".$industry_type_short_name."','1',GETDATE());");
		
		return $this->db->affected_rows();
	}
	function editindustry($id){
		
		$query = $this->db->query('Select industry_type_id,industry_type_name,industry_type_short_name from industry_type_mst WHERE industry_type_id = '.$id);
		return $query->result();
	}
	
	
	public function edit_industry($industry_type_name,$industry_type_short_name,$industry_type_id){
		//echo $industry_type_id; die;
		$user_id = $this->session->user_id;
		$query = $this->db->query("UPDATE industry_type_mst
		SET industry_type_name='".$industry_type_name."',industry_type_short_name='".$industry_type_short_name."',updated_by = ".$user_id.",updated_ts= GETDATE() WHERE industry_type_id = ".$industry_type_id);
		
		return $this->db->affected_rows();
	}

}