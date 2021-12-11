<?php
class User_model extends CI_Model {
	
	protected $table_name = 'user_mst';
	protected $emp_table_name = 'employee_mst';
	protected $client_table_name = 'client_mst';
	
	public function __construct() {
		parent::__construct();
	}
	

	public function get_recruitment_approver_mst($employee_id) {
		//$query = $this->db->get('test_tbl');
		$query = $this->db->query("select level from recruitment_approver_mst where employee_id='" .$employee_id . "'");
		return $query->row();
	}
	public function get_all_client_approve_level($employee_id,$level) {
		//$query = $this->db->get('test_tbl');
		$query = $this->db->query("select level from client_approver_mst where employee_id='" .$employee_id . "' and level='".$level."'");
		return $query->row();
	}
	
	public function get_all_user() {
		//$query = $this->db->get('test_tbl');
		$query = $this->db->query("SELECT * FROM " . $this->table_name . " ORDER BY name DESC OFFSET 1 ROWS FETCH NEXT 2 ROWS ONLY;");
		return $query->result();
	}

	public function get_all_emp() {
		$query = $this->db->query("SELECT count(*) tot_emp FROM " . $this->emp_table_name . " where active_status = 1;");
		return $query->row();
	}

	public function get_all_new_emp() {
		$curr_date = date("Y-m-d");
		$query = $this->db->query("SELECT count(*) tot_new FROM " . $this->emp_table_name . " where active_status = 1 and cast(created_ts as date) ='". $curr_date . "'");
		return $query->row();
	}

	public function get_all_emp_pending_approval() {
		$query = $this->db->query("SELECT count(*) tot_pending_emp FROM " . $this->emp_table_name . " where active_status = 1 and approval_status='I'");
		
		return $query->row();
	}

	public function get_all_client() {
		$query = $this->db->query("SELECT count(*) tot_client FROM " . $this->client_table_name . " where active_status = 1;");
		//echo $this->db->last_query();die;
		return $query->row();
	}

	public function get_new_client() {
		$curr_date = date("Y-m-d");
		$query = $this->db->query("SELECT count(*) tot_new_client FROM " . $this->client_table_name . " where active_status = 1 and cast(created_ts as date) ='". $curr_date . "'");
		return $query->row();
	}

	public function get_pending_approval1_client() {
		$query = $this->db->query("SELECT count(*) tot_pending_client FROM " . $this->client_table_name . " where active_status = 1 and approval_status_1='I' and ISNULL(approve_by_1, '') = ''");
		return $query->row();
	}

	public function get_pending_approval2_client() {
		$query = $this->db->query("SELECT count(*) tot_pending_client FROM " . $this->client_table_name . " where active_status = 1 and approval_status_2='I' and ISNULL(approve_by_2, '') = ''");
		return $query->row();
	}

	public function get_pending_approval_client() {
		$query = $this->db->query("SELECT count(*) tot_pending_client FROM " . $this->client_table_name . " where active_status = 1 and approval_status_1='I' and ISNULL(approve_by_1, '') = '' and approval_status_2='I' and ISNULL(approve_by_2, '') = ''");
		return $query->row();
	}

	public function get_pending_approval_attendance_client() {
		$query = $this->db->query("SELECT count(*) tot_pending_client FROM client_attendance where active_status = 1 and approval_required=1 and ISNULL(approval_status, '') = '' and ISNULL(approved_by, '') = ''");
		return $query->row();
	}

	public function get_pending_approval_supp_attendance_client() { 
		$query = $this->db->query("SELECT count(*) tot_pending_client FROM client_supp_attendance where active_status = 1 and approval_required=1 and ISNULL(approval_status, '') = '' and ISNULL(approved_by, '') = ''");
		return $query->row();
	}

	public function get_pending_recruitment_approval()
	{
		$query = $this->db->query("SELECT count(*) tot_pending_client FROM client_supp_attendance where active_status = 1 and approval_required=1 and ISNULL(approval_status, '') = '' and ISNULL(approved_by, '') = ''");
		return $query->row();
	}

	public function get_employee_recruitment_approval()
	{
		$query = $this->db->query("SELECT count(*) tot_pending_client FROM employee_mst where active_status = 1 and approval_status= 'I' and ISNULL(approved_by, '') = ''");
		return $query->row();
	}
	
	public function get_pending_approval_leave() {
		$sql = "SELECT SUM(z.cnt) pending_leave_approvals FROM (
			SELECT COUNT(1) cnt FROM leave_apply WHERE approver_id_1 = ". $this->session->employee_id." AND active_status = 1 AND ISNULL(approve_status_1, '') = '' 
			UNION ALL 
			SELECT COUNT(1) cnt FROM leave_apply WHERE approver_id_2 = ". $this->session->employee_id." AND active_status = 1 AND ISNULL(approve_status_2, '') = '' 
			UNION ALL
			SELECT COUNT(1) cnt FROM leave_apply WHERE approver_id_3 = ". $this->session->employee_id." AND active_status = 1 AND ISNULL(approve_status_3, '') = '' 
		) z;";
		$query = $this->db->query($sql);
		return $query->row();
	}
	
	public function user_login($postdata){
		$query = $this->db->query("SELECT u.user_id, u.name, u.username, ISNULL(u.employee_id, 0) AS employee_id, ISNULL(e.company_branch_id, 1) AS user_branch_id 
			FROM " . $this->table_name . " u LEFT JOIN employee_mst e ON e.employee_id = u.employee_id 
			WHERE u.username = '" . addslashes($postdata['username']) . "' AND u.password = '" . md5($postdata['password']) . "' AND u.active_status = 1;");
		// echo $query = "SELECT u.user_id, u.name, u.username, ISNULL(u.employee_id, 0) AS employee_id, ISNULL(e.company_branch_id, 1) AS user_branch_id 
		// 	FROM " . $this->table_name . " u LEFT JOIN employee_mst e ON e.employee_id = u.employee_id 
		// 	WHERE u.username = '" . addslashes($postdata['username']) . "' AND u.password = '" . md5($postdata['password']) . "' AND u.active_status = 1;";die;


		return $query->row_array();
	}

	
	public function checkCurrentPassword($user_id, $password){
		$query = $this->db->query("SELECT COUNT(1) AS cnt 
			FROM " . $this->table_name . " WHERE user_id = " . $user_id . " AND password = '" . md5($password) . "';");
		return $query->row_array();
	}
	 
	public function changePassword($user_id, $new_password){
		$query = $this->db->query("UPDATE " . $this->table_name . " SET password = '" . md5($new_password) . "' WHERE user_id = " . $user_id ." ;");
		return $this->db->affected_rows();
	}



}