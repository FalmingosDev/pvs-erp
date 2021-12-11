<?php
class Role_model extends CI_Model {
	protected $roleTable = 'role_mst';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_role_list() {
		$query = $this->db->query("select role_id,role_name,role_short_name,active_status from role_mst ORDER BY role_name;");
		return $query->result();
	}
	
	
		public function change_status($id,$status){
		$set = ($status == '1') ? 0 : 1 ;
		$where = [ 'role_id' => $id ];
		$query = "update " . $this->roleTable . " set active_status=" . $set . " where role_id=" . $id;
		$res = $this->db->query($query);
		if(!$res) {
			return false;
		} else {
			return true;
		}
	}
	
	public function add_role($role_name,$role_st_name){
		
		$query = $this->db->query("insert into role_mst (role_name,role_short_name,created_by,created_ts) values ('".$role_name."','".$role_st_name."','".$this->session->user_id."',GETDATE());");
		return $this->db->affected_rows();
	}
	
	function editrole($id){
		$query = $this->db->query("select role_id,role_name,role_short_name,active_status from role_mst where  role_id = ".$id);
		return $query->result();
	}
	
	public function edit_role($role_name,$role_st_name,$role_id){
		
		$query = $this->db->query("UPDATE role_mst SET role_name='".$role_name."',role_short_name='".$role_st_name."',updated_by='".$this->session->user_id."',updated_ts=GETDATE() WHERE role_id = ".$role_id);
		
		return $this->db->affected_rows();
	}
	
	public function checkstRoleName($shot_name,$role_id){
		$condition = '';
		if(!empty($role_id)){
			$condition = " AND role_id != '" . $role_id . "'";
		}
		$check_desig = $this->db->query("select role_name from role_mst where role_short_name='". $shot_name . "'". $condition);
		$rows = $check_desig->num_rows();

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
	
	/*public function checkRoleName($role_name){
		
		$check_desig = $this->db->query("select role_name from role_mst where role_name='". $role_name . "'");
		$rows = $check_desig->num_rows();

		if($rows > 0)
		{
			return true;
		}
		else
		{
			//echo $rows;die;
			return false;
		}
	}*/

}