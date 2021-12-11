<?php 

class Designation_model extends CI_Model {
	protected $desigTable = 'designation_mst';

	public function __construct() {
		parent::__construct();
	}

	public function get_all_desig() {
		return $this->db->select('desig_id,desig_name,desig_short_name,rank,active_status')->from($this->desigTable)->get()->result_array();
	}

	public function checkDesig($desig_name,$desig_id){
		$condition = '';
		if(!empty($desig_id)){
			$condition = " AND desig_id != '" . $desig_id . "'";
		}
		$check_desig = $this->db->query("select desig_name from designation_mst where desig_name='". $desig_name . "'". $condition);
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

	public function checkDesigShrt($desig_shrt_name,$desig_id){
		$condition = '';
		if(!empty($desig_id)){
			$condition = " AND desig_id != '" . $desig_id . "'";
		}
		$check_desig = $this->db->query("select desig_short_name from designation_mst where desig_short_name='". $desig_shrt_name . "'". $condition);
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

	public function insertDesignation($desig_name,$desig_short_name,$rank){

		$query = "insert into " . $this->desigTable . " (desig_name,desig_short_name,rank,active_status,created_by,created_ts) values ('".escape_str($desig_name)."','".escape_str($desig_short_name)."','". $rank ."','1','". $this->session->user_id ."',GETDATE());";
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

        $query = "update " . $this->desigTable . " set active_status=" . $set . " where desig_id=" . $id;
        $res = $this->db->query($query);
        if(!$res) {
            return false;
        } else {
            return true;
        }
    }

    public function get_desig($id) {
		$query = $this->db->query("select desig_id,desig_name,desig_short_name,rank,active_status from ". $this->desigTable . " where desig_id = ". $id);
		return $query->result_array($query);
	}

	public function UpdateDesignation($desig_name,$desig_short_name,$rank,$desig_id){
		$query = "update " . $this->desigTable . " set desig_name='" . escape_str($desig_name) . "' , desig_short_name='". escape_str($desig_short_name) ."',rank='". $rank ."',updated_by='". $this->session->user_id ."',updated_ts=GETDATE() where desig_id=" . $desig_id;
		//echo $query;die;
		$res = $this->db->query($query);
		if(!$res) {
			return false;
		} else {
			return true;
		}
	}
}






























?>