<?php
class Gstservice_model extends CI_Model {
	//echo 'ddd'; die;
	protected $gstserTable = 'gst_service_category_mst';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_role_list() {
		$query = $this->db->query("select gst_service_category_id, gst_service_category_name, active_status from gst_service_category_mst ORDER BY gst_service_category_name;");
		return $query->result();
	}
	
	
		public function change_status($id,$status){
		$set = ($status == '1') ? 0 : 1 ;
		$where = [ 'gst_service_category_id' => $id ];
		$query = "update " . $this->gstserTable . " set active_status=" . $set . " where gst_service_category_id=" . $id;
		$res = $this->db->query($query);
		if(!$res) {
			return false;
		} else {
			return true;
		}
	}
	
	public function addgstservice($gstser_name){
		
		$query = $this->db->query("insert into gst_service_category_mst (gst_service_category_name,created_by,created_ts) values ('".$gstser_name."','".$this->session->user_id."',GETDATE());");
		return $this->db->affected_rows();
	}
	
	function editgstser($id){
		$query = $this->db->query("select gst_service_category_id, gst_service_category_name, active_status from gst_service_category_mst where  gst_service_category_id = ".$id);
		return $query->result();
	}
	
	public function edit_gstser($gst_ser_name,$gst_ser_id){
		//echo $gst_ser_id; die;
		$query = $this->db->query("UPDATE gst_service_category_mst SET gst_service_category_name='".$gst_ser_name."',updated_by='".$this->session->user_id."',updated_ts=GETDATE() WHERE gst_service_category_id = ".$gst_ser_id);
		
		return $this->db->affected_rows();
	}
	
	public function checkgstSer($ser_name,$gst_ser_id){
		
		$condition = '';
		if(!empty($gst_ser_id)){
			$condition = " AND gst_service_category_id != '" . $gst_ser_id . "'";
		}
		
		
		$check_state = $this->db->query("select gst_service_category_name from gst_service_category_mst where gst_service_category_name='". $ser_name . "'" . $condition);
		$rows = $check_state->num_rows();
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

}