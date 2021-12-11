<?php
class Gstcategory_model extends CI_Model {
	//echo 'ddd'; die;
	protected $gstcatTable = 'gst_category_mst';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_role_list() {
		$query = $this->db->query("select gst_category_id,gst_category_name,active_status from gst_category_mst ORDER BY gst_category_name;");
		return $query->result();
	}
	
	public function checkgstCat($cat_name,$gst_cat_id){
		
		$condition = '';
		if(!empty($gst_cat_id)){
			$condition = " AND gst_category_id != '" . $gst_cat_id . "'";
		}
		
		
		$check_state = $this->db->query("select gst_category_name from gst_category_mst where gst_category_name='". $cat_name . "'" . $condition);
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
	
	
		public function change_status($id,$status){
		$set = ($status == '1') ? 0 : 1 ;
		$where = [ 'gst_category_id' => $id ];
		$query = "update " . $this->gstcatTable . " set active_status=" . $set . " where gst_category_id=" . $id;
		$res = $this->db->query($query);
		if(!$res) {
			return false;
		} else {
			return true;
		}
	}
	
	public function addgstcategory($gstcat_name){
		
		$query = $this->db->query("insert into gst_category_mst (gst_category_name,created_by,created_ts) values ('".$gstcat_name."','".$this->session->user_id."',GETDATE());");
		return $this->db->affected_rows();
	}
	
	function editgstcat($id){
		$query = $this->db->query("select gst_category_id,gst_category_name,active_status from gst_category_mst where  gst_category_id = ".$id);
		return $query->result();
	}
	
	public function edit_role($gst_cat_name,$gst_cat_id){
		//echo $gst_cat_id; die;
		$query = $this->db->query("UPDATE gst_category_mst SET gst_category_name='".$gst_cat_name."',updated_by='".$this->session->user_id."',updated_ts=GETDATE() WHERE gst_category_id = ".$gst_cat_id);
		
		return $this->db->affected_rows();
	}

}