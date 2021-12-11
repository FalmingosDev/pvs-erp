<?php
class Esi_organisation_model extends CI_Model {
	protected $esiTable = 'esi_organisation_mst';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_all_list() {
		$query = $this->db->query("SELECT esi_organisation_id,organisation_name,esi_no,active_status FROM esi_organisation_mst ORDER BY organisation_name;");
		return $query->result();
	}
	
	
	
		public function change_status($id,$status){
			//print_r($status); exit;
		$set = ($status == '1') ? 0 : 1 ;
		$where = [ 'esi_organisation_id' => $id ];

		// print_r($set);die;

		$query = "update " . $this->esiTable . " set active_status=" . $set . " where esi_organisation_id=" . $id;
		//echo $query;die; 
		$res = $this->db->query($query);
		if(!$res) {
			return false;
		} else {
			return true;
		}
	}
	
	public function add_esi($training_name,$organisation_number){
		//echo $pin; die;
		$query = $this->db->query("insert into esi_organisation_mst (organisation_name,esi_no,created_by,created_ts) values ('".$training_name."','".$organisation_number."','1',GETDATE());");
		return $this->db->affected_rows();
	}
	
	function view($id){
		$query = $this->db->query('SELECT esi_organisation_id,organisation_name,esi_no,active_status FROM esi_organisation_mst
		where esi_organisation_id = '.$id);
		return $query->result();
	}
	
	public function edit_esi($organisation_name,$id,$organisation_number){
		//echo $id; die;
		
		$query = $this->db->query("UPDATE esi_organisation_mst
		SET organisation_name='".$organisation_name."', esi_no='".$organisation_number."' WHERE esi_organisation_id = ".$id);
		
		return $this->db->affected_rows();
	}

	public function checkEsi($organisation_name,$esi_organisation_id )
	{
		$condition = '';
		if(!empty($esi_organisation_id)){
			$condition = " AND esi_organisation_id  != '" . $esi_organisation_id  . "'";
		}
		$check_desig = $this->db->query("select organisation_name from esi_organisation_mst where organisation_name='". $organisation_name . "'". $condition);
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

}