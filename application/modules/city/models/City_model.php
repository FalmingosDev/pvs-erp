<?php
class City_model extends CI_Model {
	protected $ctTable = 'city_mst';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_all_city() {
		$query = $this->db->query("SELECT cm.city_id,cm.city_name,cm.city_short_name,cm.active_status,sm.state_name 
		FROM city_mst cm
		INNER JOIN state_mst sm ON sm.state_id = cm.state_id ORDER BY sm.state_name,cm.city_name;");
		return $query->result();
	}
	
	public function checkNameState($city_name,$state_id,$city_id){
		$condition = '';
		if(!empty($city_id)){
			$condition = " AND city_id != '" . $city_id . "' AND state_id = '" . $state_id . "'";
		}
		//$ss= "select city_name from city_mst where city_name='". $city_name . "'". $condition;
		//echo $ss; die;
		$check_desig = $this->db->query("select city_name from city_mst where city_name='". $city_name . "'". $condition);
		$rows = $check_desig->num_rows();
		//echo $rows;die;
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
	public function checkstState($shot_name,$state_id,$city_id){
		$condition = '';
		if(!empty($city_id)){
			$condition = " AND city_id != '" . $city_id . "' AND state_id = '" . $state_id . "'";
		}
		$check_desig = $this->db->query("select city_name from city_mst where city_short_name='". $shot_name . "'". $condition);
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
	/*public function checkidState($state_id,$city_id){
		$condition = '';
		if(!empty($city_id)){
			$condition = " AND city_id != '" . $city_id . "'";
		}
		$check_desig = $this->db->query("select city_name from city_mst where state_id='". $state_id . "'". $condition);
		$rows = $check_desig->num_rows();
		//echo $rows;die;
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
	
	public function get_all_state() {
		$query = $this->db->query("Select state_id,state_name from state_mst ORDER BY state_name;");
		return $query->result();
	}
	
		public function change_status($id,$status){
			//print_r($status); exit;
		$set = ($status == '1') ? 0 : 1 ;
		$where = [ 'city_id' => $id ];

		// print_r($set);die;

		$query = "update " . $this->ctTable . " set active_status=" . $set . " where city_id=" . $id;
		//echo $query;die;
		$res = $this->db->query($query);
		if(!$res) {
			return false;
		} else {
			return true;
		}
	}
	
	public function add_city($state_id,$city_name,$city_st_name){
		
		$query = $this->db->query("insert into city_mst (city_name,city_short_name,state_id,created_by,created_ts) values ('".$city_name."','".$city_st_name."','".$state_id."','1',GETDATE());");
		return $this->db->affected_rows();
	}
	
	function editcity($id){
		$query = $this->db->query('SELECT cm.city_id,cm.city_name,cm.city_short_name,cm.active_status,sm.state_name,sm.state_id 
		FROM city_mst cm
		INNER JOIN state_mst sm ON sm.state_id = cm.state_id where cm.city_id = '.$id);
		return $query->result();
	}
	
	public function edit_city($city_name,$city_st_name,$state_id,$ct_id){
		
		
		$query = $this->db->query("UPDATE city_mst
		SET city_name='".$city_name."',state_id='".$state_id."',city_short_name='".$city_st_name."' WHERE city_id = ".$ct_id);
		
		return $this->db->affected_rows();
	}

}