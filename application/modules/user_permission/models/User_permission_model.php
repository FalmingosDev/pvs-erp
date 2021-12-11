<?php
class User_permission_model extends CI_Model {
	protected $docTable = 'emp_doc_type_mst';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_all_role() {
		$query = $this->db->query("Select role_id,role_name from role_mst where active_status=1 ORDER BY role_name;");
		return $query->result();
	}
	
	public function permission_list($role_id) {
		$query = $this->db->query("SELECT mm.menu_id, mm.menu_name, mm.menu_rank, mm.application_type, ISNULL(up.permission_id, '') permission_id, 
		ISNULL(up.add_flag, 0) add_flag, ISNULL(up.edit_flag, 0) edit_flag, ISNULL(up.delete_flag, 0) delete_flag, ISNULL(up.download_flag, 0) download_flag 
		FROM menu_master mm 
		LEFT JOIN user_permission up ON mm.menu_id = up.menu_id AND up.role_id=  '".$role_id."' 
		WHERE ISNULL(mm.menu_link,'') != '' AND mm.active_status = '1' ORDER BY mm.menu_name;");
		return $query->result();
	}
	
	public function all_list_add($user_id,$role_id,$add_value,$edit_value,$delete_value,$print_value,$menu_id,$det_cnt) {
		$query = $this->db->query("INSERT INTO user_permission (role_id, menu_id, add_flag, edit_flag, delete_flag, download_flag, created_by, created_ts) VALUES 
		('".$role_id."', '".$menu_id."', '".$add_value."', '".$edit_value."', '".$delete_value."', '".$print_value."', '".$user_id."', GETDATE());");
	}
	
	public function all_list_update($user_id,$role_id,$add_value,$edit_value,$delete_value,$print_value,$menu_id,$permission_id,$det_cnt) {
		$query = $this->db->query("UPDATE user_permission SET 
				role_id = '".$role_id."',
				menu_id = '".$menu_id."',
				add_flag = '".$add_value."',
				edit_flag = '".$edit_value."',
				delete_flag = '".$delete_value."',
				download_flag = '".$print_value."',
				updated_by = '".$user_id."',
				updated_ts = GETDATE()
				WHERE permission_id = '".$permission_id."';");
	}
	
	public function single_add($user_id,$role_id,$add_value,$edit_value,$delete_value,$print_value,$menu_id) {
		//print_r($menu_id);exit;
		return $this->db->query("INSERT INTO user_permission (role_id, menu_id, add_flag, edit_flag, delete_flag, download_flag, created_by, created_ts) VALUES 
		('".$role_id."', '".$menu_id."', '".$add_value."', '".$edit_value."', '".$delete_value."', '".$print_value."', '".$user_id."', GETDATE());");
	}
	
	public function single_update($user_id,$role_id,$add_value,$edit_value,$delete_value,$print_value,$menu_id,$permission_id) {
		//print_r($menu_id);exit;
		return $this->db->query("UPDATE user_permission SET 
			role_id = '".$role_id."',
			menu_id = '".$menu_id."',
			add_flag = '".$add_value."',
			edit_flag = '".$edit_value."',
			delete_flag = '".$delete_value."',
			download_flag = '".$print_value."',
			updated_by = '".$user_id."',
			updated_ts = GETDATE()
			WHERE permission_id = '".$permission_id."';");
	}
}