<?php 

class Mw_type_model extends CI_Model {
	protected $mwTable = 'mw_type_mst';

	public function __construct() {
		parent::__construct();
	}

	public function get_all_mw_type() {
		return $this->db->select('mw_type_id,mw_type_name,mw_type_short_name,active_status')->from($this->mwTable)->get()->result_array();
	}

	public function insertMwType($mw_type_name,$mw_type_short_name){

		$query = "insert into " . $this->mwTable . " (mw_type_name,mw_type_short_name,active_status,created_by,created_ts) values ('".$mw_type_name."','".$mw_type_short_name."','1','". $this->session->user_id ."',GETDATE());";
		$res = $this->db->query($query);
		if(!$res) {
			return false;
		} else {
			return true;
		}
	}

	public function status($id,$status){
        $set = ($status == '1') ? 0 : 1 ;
        $where = [ 'desig_id' => $id ];

        $query = "update " . $this->mwTable . " set active_status=" . $set . " where mw_type_id=" . $id;
        $res = $this->db->query($query);
        if(!$res) {
            return false;
        } else {
            return true;
        }
    }

    public function get_mwtype($id) {
		$query = $this->db->query("select mw_type_id,mw_type_name,mw_type_short_name,active_status from ". $this->mwTable . " where mw_type_id = ". $id);
		return $query->result_array($query);
	}

	public function UpdateMwType($mw_type_name,$mwtype_short_name,$mw_id){
		$query = "update " . $this->mwTable . " set mw_type_name='" . $mw_type_name . "' , mw_type_short_name='". $mwtype_short_name ."',updated_by='". $this->session->user_id ."',updated_ts=GETDATE() where mw_type_id=" . $mw_id;
		$res = $this->db->query($query);
		if(!$res) {
			return false;
		} else {
			return true;
		}
	}

		public function checkMwType($mwType_name,$mw_id){

		$condition = '';
		if(!empty($mw_id)){
			$condition = " AND mw_type_id != '" . $mw_id . "'";
		}
		
		$check_mw = $this->db->query("select mw_type_name from mw_type_mst where mw_type_name='". $mwType_name . "'");
		$rows = $check_mw->num_rows();

		if($rows > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function checkMwShrt($mwType_shrt_name,$mw_id){
		
		$condition = '';
		if(!empty($mw_id)){
			$condition = " AND mw_type_id != '" . $mw_id . "'";
		}

		$check_mw = $this->db->query("select mw_type_short_name from mw_type_mst where mw_type_short_name='". $mwType_shrt_name . "'");
		$rows = $check_mw->num_rows();

		if($rows > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}






























?>