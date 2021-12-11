<?php
class Salary_head_model extends CI_Model {
	protected $shmTable = 'salary_head_mst';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_salary_head() {
		$query = $this->db->query("select head_id,CASE WHEN head_type = 'E' THEN 'Earnings' ELSE 'Deductions' END as head_type,min_prcntg,max_prcntg,  head_name,head_short_name,active_status,tally_head_name FROM salary_head_mst ORDER BY head_type desc,head_name;");
		// echo $query = "select head_id,CASE WHEN head_type = 'E' THEN 'Earnings' ELSE 'Deductions' END as head_type,min_prcntg,max_prcntg,  head_name,head_short_name,active_status,tally_head_name FROM salary_head_mst ORDER BY head_type desc,head_name;";die;
		return $query->result();
	}
	
	public function checHeadName($head_name,$head_id){
		
		$condition = '';
		if(!empty($head_id)){
			$condition = " AND head_id != '" . $head_id . "'";
		}
		
		
		$check_state = $this->db->query("select head_name from salary_head_mst where head_name='". $head_name . "'" . $condition);
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
	
	public function checStName($headst_name,$head_id){
		
		$condition = '';
		if(!empty($head_id)){
			$condition = " AND head_id != '" . $head_id . "'";
		}
		
		
		$check_state = $this->db->query("select head_short_name from salary_head_mst where head_short_name='". $headst_name . "'" . $condition);
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
		$where = [ 'head_id' => $id ];
		$query = "update " . $this->shmTable . " set active_status=" . $set . " where head_id=" . $id;
		$res = $this->db->query($query);
		if(!$res) {
			return false;
		} else {
			return true;
		}
	}
	
	public function add_salary_head($type_id,$head_name,$head_st_name,$min_prcntg,$max_prcntg,$tally_head_name){
		$query = $this->db->query("insert into salary_head_mst (head_name,head_short_name,head_type,created_by,created_ts,max_prcntg,min_prcntg,tally_head_name) values ('".$head_name."','".$head_st_name."','".$type_id."','".$this->session->user_id."',GETDATE(),'".$max_prcntg."','".$min_prcntg."','".$tally_head_name."');");
		return $this->db->affected_rows();
	}
	
	function editsalary($id){
		$query = $this->db->query("select head_id, head_type,  head_name,head_short_name,active_status,max_prcntg,min_prcntg,tally_head_name FROM salary_head_mst where  head_id = ".$id);
		return $query->result();
	}
	
	public function edit_sh_head($head_name,$head_st_name,$sh_id,$head_id,$max_prcntg,$min_prcntg,$tally_head_name){
		
		$query = $this->db->query("UPDATE salary_head_mst SET head_name='".$head_name."',head_short_name='".$head_st_name."',head_type='".$head_id."',max_prcntg='".$max_prcntg."',min_prcntg='".$min_prcntg."',updated_by='".$this->session->user_id."',updated_ts=GETDATE(),tally_head_name='".$tally_head_name."' WHERE head_id = ".$sh_id);
		
		return $this->db->affected_rows();
	}

}