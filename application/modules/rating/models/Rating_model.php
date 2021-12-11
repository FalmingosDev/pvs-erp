<?php 

class Rating_model extends CI_Model {
	protected $ratingTable = 'rating_mst';

	public function __construct() {
		parent::__construct();
	}

	public function get_all_rating() {
		return $this->db->select('rating_id,rating_short_name,rating_desc,active_status')->from($this->ratingTable)->get()->result_array();
	}

	public function insertRating($rating_shrt_name,$desc){

		$query = "insert into " . $this->ratingTable . " (rating_short_name,rating_desc,active_status,created_by,created_ts) values ('".$rating_shrt_name."','".$desc."','1','". $this->session->user_id ."',GETDATE());";
		$res = $this->db->query($query);
		if(!$res) {
			return false;
		} else {
			return true;
		}
	}

	public function status($id,$status){
        $set = ($status == '1') ? 0 : 1 ;
        $where = [ 'rating_id' => $id ];

        $query = "update " . $this->ratingTable . " set active_status=" . $set . " where rating_id=" . $id;
        $res = $this->db->query($query);
        if(!$res) {
            return false;
        } else {
            return true;
        }
    }

    public function get_rating($id) {
		$query = $this->db->query("select rating_id,rating_short_name,rating_desc,active_status from ". $this->ratingTable . " where rating_id = ". $id);
		return $query->result_array($query);
	}

	public function UpdateRating($rating_shrt_name,$desc,$rating_id){
		$query = "update " . $this->ratingTable . " set rating_short_name='" . $rating_shrt_name . "' , rating_desc='". $desc ."',updated_by='". $this->session->user_id ."',updated_ts=GETDATE() where rating_id=" . $rating_id;
		$res = $this->db->query($query);
		if(!$res) {
			return false;
		} else {
			return true;
		}
	}

		public function checkRating($rating,$rating_id){

			$condition = '';
			if(!empty($rating_id)){
				$condition = " AND rating_id != '" . $rating_id . "'";
			}
			//echo $dept_name;die;
			$check_dept = $this->db->query("select rating_short_name from rating_mst where rating_short_name='". $rating . "'" . $condition);
			$rows = $check_dept->num_rows();

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