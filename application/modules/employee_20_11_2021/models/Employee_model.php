<?php
class Employee_model extends CI_Model {
	
	protected $table_name = 'employee_mst';
	protected $emp_fmly_table = 'employee_family_mst';
	protected $emp_fmly_pf_table = 'employee_family_pf_mst';

	
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
	}
	
	public function employee_list($user_branch_id = 1, $searched_data = NULL) {
		//echo $user_branch_id;die;
		$conditions = "";
		$conditions = " WHERE 1 = 1";
		if(($user_branch_id != 21) AND ($user_branch_id != 22) AND ($user_branch_id != 23) AND ($user_branch_id != 24) AND ($user_branch_id != 25) AND ($user_branch_id != 26) AND ($user_branch_id != 27) AND ($user_branch_id != 1)){
		
			$conditions = " WHERE e.company_branch_id = " . $user_branch_id;
			//$conditions = " WHERE e.company_branch_id = " . $user_branch_id;
		}
		if(!empty($searched_data['doj_from']) && !empty($searched_data['doj_to'])){
			$conditions .= " AND e.doj BETWEEN '" . $searched_data['doj_from'] . "' AND '" . $searched_data['doj_to'] . "'";
		}
		if(!empty($searched_data['job_type'])){
			$conditions .= " AND e.job_type = '" . $searched_data['job_type'] . "'";
		}
		$qry = "SELECT e.employee_id, ISNULL(e.employee_code, '') AS employee_code, CONCAT(e.first_name, ' ', e.last_name) AS employee_name, e.dob, e.doj, CASE WHEN e.job_type = 'G' THEN 'Staff' WHEN e.job_type = 'C' THEN 'Contractual' ELSE '' END AS job_type, e.approval_status, ISNULL(e.submit_for_approval, 0) submit_for_approval, e.telephone_no, dg.desig_name, 
		ISNULL(ed.employee_detail_id, 0) employee_detail_id, ISNULL(q.qualification_name, '') qualification, ISNULL(ed.gun_license_expiry_date, '') gun_license_expiry_date, ISNULL(ed.driving_license_renewal_date, '') driving_license_renewal_date, ISNULL(ed.accidental_contact_name, '') accidental_contact_name, ISNULL(ed.accidental_contact_no, '') accidental_contact_no,aadhaar_card_no 
		FROM " . $this->table_name . "  e
		INNER JOIN designation_mst dg ON e.designation_id = dg.desig_id
		LEFT JOIN employee_detail_mst ed ON e.employee_id = ed.employee_id
		LEFT JOIN qualification_mst q ON q.qualification_id = ed.qualification_id
		" . $conditions . "
		ORDER BY e.first_name, e.last_name;";

		//echo $qry;die;
		
		$query = $this->db->query($qry);
		return $query->result();
	}

	public function get_all_branch()
	{
		$query = $this->db->query("Select company_branch_id,branch_name from company_branch_mst where active_status=1 ORDER BY branch_name ;");
		return $query->result();
	}

	public function get_all_bank()
	{
		$query = $this->db->query("Select bank_id,bank_name as address from bank_mst where active_status=1 order by bank_name");
		return $query->result();
	}

	public function get_all_desig()
	{
		$query = $this->db->query("Select desig_id,desig_name from designation_mst where active_status=1 ORDER BY desig_name ;");
		return $query->result();
	}

	public function get_blood_grp()
	{
		$query = $this->db->query("Select lookup_id,lookup_desc from lookup_table where active_status=1 and lookup_type='BLOOD_GROUP' ORDER BY lookup_desc ;");
		return $query->result();
	}

	public function get_marrital_status()
	{
		$query = $this->db->query("Select lookup_id,lookup_desc from lookup_table where active_status=1 and lookup_type='MARITAL_STATUS' ORDER BY lookup_desc ;");
		return $query->result();
	}

	public function get_gender()
	{
		$query = $this->db->query("Select lookup_id,lookup_desc from lookup_table where active_status=1 and lookup_type='GENDER' ORDER BY lookup_desc ;");
		return $query->result();
	}

	public function get_relation()
	{
		$query = $this->db->query("Select lookup_id,lookup_desc from lookup_table where active_status=1 and lookup_type='RELATION' ORDER BY lookup_desc ;");
		return $query->result();
	}

	public function getCompanyBranchName($user_branch_id){
		$query = $this->db->query("Select company_branch_id,branch_name from company_branch_mst where active_status=1 and company_branch_id='". $user_branch_id."';");
		return $query->row();
	}

	public function getRelation() {
		$query = $this->db->query("Select lookup_id,lookup_desc from lookup_table where active_status=1 and lookup_type='RELATION' ORDER BY lookup_desc;");
		return $query->result_array();
	}

	public function insertEmployee($job_type,$company_branch_id,$desig_id,$fname,$lname,$old_code,$father_name,$old_name,$mother_name,$army_no,$spouse_name,$rank,$birth_place,$chest,$dob,$height,$weight,$pf_no,$hair_color,$eye_color,$esi_no,$sex,$blood_group_id,$marital_status,$doj,$complexion,$doa,$uan,$id_mark,$language,$caste,$religion,$tenure_date_1,$tenure_date_2,$nationality,$nomminee_name,$age,$bank_name,$account_number,$aadhaar_number,$ifsc_code,$p_address_1,$c_address_1,$p_address_2,$c_address_2,$p_address_3,$c_address_3,$p_state_id,$c_state_id,$p_city_id,$c_city_id,$residing_since,$tel_nos,$dispensery,$background_check,$notes,$name,$family_dob,$family_age,$aadhaar_no,$relation,$with_fam,$uploaded_files,$user_branch_id)
	{
		if(!empty($name))
		{
			$tot_name = count($name);
		}
		if(!empty($pf_name))
		{
			$tot_pf_name = count($pf_name);
		}
		$detail_family_data = '';
		//$detail_pf_data = '';
		//$new_birthday = date("Y-m-d", strtotime($birthday));

		for($i=0; $i<$tot_name; $i++)
		{
			$detail_family_data .= $name[$i].'|~|'.$family_dob[$i].'|~|'.$family_age[$i].'|~|'.$aadhaar_no[$i].'|~|'.$relation[$i].'|~|'.$with_fam[$i]. '#';
		}
		 $detail_family_data = rtrim($detail_family_data, "#");

		
		//  for($i=0; $i<$tot_pf_name; $i++)
		// {
		// 	$detail_pf_data .= $pf_name[$i].'|~|'.$pf_family_dob[$i].'|~|'.$pf_relation[$i]. '|#|';
		// }
		
		// $detail_pf_data = rtrim($detail_pf_data, "|#|");


		$user_id = $this->session->user_id;
		$final_dob = date("Y-m-d", strtotime($dob));
		$final_doj = date("Y-m-d", strtotime($doj));
		$final_doa = date("Y-m-d", strtotime($doa));
		$final_residing_since = date("Y-m-d", strtotime($residing_since));
		$final_tenure_date_1 = date("Y-m-d", strtotime($tenure_date_1));
		$final_tenure_date_2 = date("Y-m-d", strtotime($tenure_date_2));
		

		$query = $this->db->query("EXEC add_employee_proc @p_job_type= '". $job_type ."',@p_company_branch_id = '".$company_branch_id."', @p_desig_id = '".$desig_id."', @p_fname = '".$fname."', @p_lname = '".$lname."' ,@p_old_code = '".$old_code."' , @p_father_name = '".$father_name."', @p_old_name = '".$old_name."',@p_mother_name = '".$mother_name."', @p_army_no = '".$army_no."', @p_spouse_name = '".$spouse_name."', @p_rank = '".$rank."', @p_birth_place = '". $birth_place."', @p_chest = '".escape_str($chest)."', @p_dob = '".$final_dob."',@p_height = '".escape_str($height)."', @p_weight = '".escape_str($weight)."', @p_pf_no = '".$pf_no."', @p_hair_color = '".$hair_color."', @p_eye_color = '".$eye_color."', @p_esi_no = '".$esi_no."', @p_sex = '".$sex."',@p_blood_group_id = '". $blood_group_id."',@p_marital_status = '". $marital_status."',@p_doj = '". $final_doj."',@p_complexion = '". $complexion."',@p_final_doa = '". $final_doa."',@p_uan = '". $uan."',@p_id_mark = '". $id_mark."',@p_language = '". $language."',@p_caste = '". $caste."',@p_religion = '". $religion."',@p_tenure_date_1 = '". $final_tenure_date_1."',@p_tenure_date_2 = '". $final_tenure_date_2."',@p_nationality = '". $nationality."',@p_nomminee_name = '". $nomminee_name."',@p_age = '". $age."',@p_bank_name = '". $bank_name."',@p_account_number = '". $account_number."',@p_aadhaar_number = '". $aadhaar_number."',@p_ifsc_code = '". $ifsc_code."',@p_p_address_1 = '". escape_str($p_address_1)."',@p_c_address_1 = '". escape_str($c_address_1)."',@p_p_address_2 = '". escape_str($p_address_2)."',@p_c_address_2 = '". escape_str($c_address_2)."',@p_p_address_3 = '". escape_str($p_address_3)."',@p_c_address_3 = '". escape_str($c_address_3)."',@p_p_state_id = '". $p_state_id."',@p_c_state_id = '". $c_state_id."',@p_p_city_id = '". $p_city_id."',@p_c_city_id = '". $c_city_id."',@p_residing_since = '".$final_residing_since."',@p_tel_nos = '".$tel_nos."',@p_dispensery = '".$dispensery."',@p_background_check = '". $background_check."', @p_notes = '". $notes."', @p_user_id = '".$user_id."', @p_uploaded_files = '". $uploaded_files."', @p_user_branch_id ='". $user_branch_id ."', @p_detail_family_data = '". $detail_family_data."'");

		//echo $this->db->last_query();die;

		
		return $query->result_array();
	}

	

		public function editEmployee($id){
			$qry = $this->db->query("SELECT employee_id,aadhaar_card_no, employee_code, company_branch_id, old_code, job_type, designation_id, first_name, last_name, father_name, mother_name, spouse_name, old_name, army_no, rank, employee_image, birth_place, chest, dob, height, weight, hair_color, eye_color, pf_no, esi_no, gender_id, blood_group_id, merital_status_id, complexion, doj, doa, dol, uan, id_mark, language_spoken, caste, religion, nationality, tenure_date_1, tenure_date_2, nominee_name, nominee_age, bank_name, account_no, ifsc_code, p_address_1, p_address_2, p_address_3, p_state_id, p_city_id, p_pincode, c_address_1, c_address_2, c_address_3, c_state_id, c_city_id, c_pincode, residing_since, telephone_no, dispensary, approval_status, approved_by, approved_on, background_check, background_check_notes, submit_for_approval 
			FROM " . $this->table_name . " 
			WHERE employee_id = ".$id);
			//echo $this->db->last_query();die;
			return $qry->result();
			
		}

	public function editFamily($id){
			$qry = $this->db->query("SELECT family_id,member_name,dob,relation,stay_with,age, aadhaar_card_no from " . $this->emp_fmly_table . " where active_status=1 and employee_id=".$id);
			return $qry->result_array();
			
		}

	public function editFamilyPf($id){
			$qry = $this->db->query("SELECT family_pf_id,member_name,dob,relation from " . $this->emp_fmly_pf_table . " where active_status=1 and employee_id=".$id);
			return $qry->result_array();
			
		}

	public function UpdateEmployee($job_type,$company_branch_id,$desig_id,$fname,$lname,$old_code,$father_name,$old_name,$mother_name,$army_no,$spouse_name,$rank,$birth_place,$chest,$dob,$height,$weight,$pf_no,$hair_color,$eye_color,$esi_no,$sex,$blood_group_id,$marital_status,$doj,$complexion,$doa,$dol,$uan,$id_mark,$language,$caste,$religion,$tenure_date_1,$tenure_date_2,$nationality,$nomminee_name,$age,$bank_name,$account_number,$aadhaar_number,$ifsc_code,$p_address_1,$c_address_1,$p_address_2,$c_address_2,$p_address_3,$c_address_3,$p_state_id,$c_state_id,$p_city_id,$c_city_id,$residing_since,$tel_nos,$dispensery,$background_check,$notes,$name,$family_dob,$family_age,$aadhaar_no,$relation,$with_fam,$uploaded_files,$user_branch_id,$employee_id,$family_id, $action)
	{

		if(!empty($name))
		{
			$tot_name = count($name);
		}
		if(!empty($pf_name))
		{
			$tot_pf_name = count($pf_name);
		}
		$detail_family_data = '';
		//$detail_pf_data = '';
		

		for($i=0; $i<$tot_name; $i++)
		{ 
			//echo $family_dob[$i] . '<br />';
			$detail_family_data .= $family_id[$i]. '|~|'. $name[$i].'|~|'.date("Y-m-d",strtotime($family_dob[$i])).'|~|'.$family_age[$i].'|~|'.$aadhaar_no[$i].'|~|'.$relation[$i].'|~|'.$with_fam[$i]. '#';
		}
		 $detail_family_data = rtrim($detail_family_data, "#");

		 //echo '<br />'.$detail_family_data;die;

		
		//  for($i=0; $i<$tot_pf_name; $i++)
		// {
		// 	$detail_pf_data .= $pf_id[$i]. '|~|' .$pf_name[$i].'|~|'.date('Y-m-d',strtotime($pf_family_dob[$i])).'|~|'.$pf_relation[$i]. '|#|';
		// }
		
		// $detail_pf_data = rtrim($detail_pf_data, "|#|");

		


		$user_id = $this->session->user_id;
		$final_dob = date("Y-m-d", strtotime($dob));
		$final_doj = date("Y-m-d", strtotime($doj));
		$final_doa = date("Y-m-d", strtotime($doa));
		$final_dol = date("Y-m-d", strtotime($dol));
		$final_tenure_date_1 = date("Y-m-d", strtotime($tenure_date_1));
		$final_tenure_date_2 = date("Y-m-d", strtotime($tenure_date_2));
		$final_residing_since = date("Y-m-d", strtotime($residing_since));

		$query = $this->db->query("EXEC edit_employee_proc @p_employee_id = '". $employee_id ."',@p_job_type= '". $job_type ."',@p_company_branch_id = '".$company_branch_id."', @p_desig_id = '".$desig_id."', @p_fname = '".$fname."', @p_lname = '".$lname."' ,@p_old_code = '".$old_code."' , @p_father_name = '".$father_name."', @p_old_name = '".$old_name."',@p_mother_name = '".$mother_name."', @p_army_no = '".$army_no."', @p_spouse_name = '".$spouse_name."', @p_rank = '".$rank."', @p_birth_place = '". $birth_place."', @p_chest = '".escape_str($chest)."', @p_dob = '".$final_dob."',@p_height = '".escape_str($height)."', @p_weight = '".escape_str($weight)."', @p_pf_no = '".$pf_no."', @p_hair_color = '".$hair_color."', @p_eye_color = '".$eye_color."', @p_esi_no = '".$esi_no."', @p_sex = '".$sex."',@p_blood_group_id = '". $blood_group_id."',@p_marital_status = '". $marital_status."',@p_doj = '". $final_doj."',@p_complexion = '". $complexion."',@p_final_doa = '". $final_doa."',@p_dol = '". $final_dol."',@p_uan = '". $uan."',@p_id_mark = '". $id_mark."',@p_language = '". $language."',@p_caste = '". $caste."',@p_religion = '". $religion."',@p_tenure_date_1 = '". $final_tenure_date_1."',@p_tenure_date_2 = '". $final_tenure_date_2."',@p_nationality = '". $nationality."',@p_nomminee_name = '". $nomminee_name."',@p_age = '". $age."',@p_bank_name = '". $bank_name."',@p_account_number = '". $account_number."',@p_aadhaar_number = '". $aadhaar_number."',@p_ifsc_code = '". $ifsc_code."',@p_p_address_1 = '". escape_str($p_address_1)."',@p_c_address_1 = '". escape_str($c_address_1)."',@p_p_address_2 = '". escape_str($p_address_2)."',@p_c_address_2 = '". escape_str($c_address_2)."',@p_p_address_3 = '". escape_str($p_address_3)."',@p_c_address_3 = '". escape_str($c_address_3)."',@p_p_state_id = '". $p_state_id."',@p_c_state_id = '". $c_state_id."',@p_p_city_id = '". $p_city_id."',@p_c_city_id = '". $c_city_id."',@p_residing_since = '".$final_residing_since."',@p_tel_nos = '".$tel_nos."',@p_dispensery = '".$dispensery."', @p_background_check = '". $background_check."', @p_notes = '". $notes."',@p_user_id = '".$user_id."', @p_uploaded_files = '". $uploaded_files."', @p_detail_family_data = '". $detail_family_data."', @p_action = '".$action."'");

			
		return $query;
	}
	
	public function employee_others_info_check($employee_id){
		$qry_1 = "SELECT COUNT(1) AS detail_cnt FROM employee_detail_mst WHERE employee_id = " . $employee_id;
		$qry_2 = "SELECT COUNT(1) AS doc_cnt FROM employee_document_mst WHERE employee_id = " . $employee_id;
		$data = array();
		$rs_1 = $this->db->query($qry_1);
		$cnt_1 = $rs_1->row();
		$data['detail_cnt'] = $cnt_1->detail_cnt;
		$rs_2 = $this->db->query($qry_2);
		$cnt_2 = $rs_2->row();
		$data['doc_cnt'] = $cnt_2->doc_cnt;
		return $data;
	}
	
	public function updateEmployeeApproval($employee_id, $approval_remarks, $action) {
		$query = $this->db->query("EXEC update_employee_approval_proc @p_employee_id = '". $employee_id ."', @p_approval_remarks = '".$approval_remarks."', @p_action = '".$action."', @p_user_id = '". $this->session->user_id ."';");
		//exit($this->db->last_query());
		return $query;
	}
	
	public function checkApprovalPermission($employee_id){
		$query = $this->db->query("SELECT COUNT(1) cnt FROM recruitment_approver_mst WHERE active_status = 1 AND employee_id = '". $employee_id."';");
		return $query->row();
	}

	public function declaration($id){

		$query = $this->db->query("SELECT e.employee_id, CONCAT(e.first_name, ' ',e. last_name) AS employee_name, e.doj, ISNULL(e.father_name, '') father_name, 
		ISNULL(e.c_address_1, '')c_address_1 ,ISNULL (e.c_address_2, '')c_address_2, ISNULL(e.c_address_3, '')c_address_3,e.c_city_id,e.c_pincode, e.c_state_id, ISNULL(sm.state_name,'')state_name, ISNULL(lk.lookup_desc,'') AS gender FROM employee_mst e
		LEFT JOIN state_mst sm ON e.c_state_id = sm.state_id 
		LEFT JOIN lookup_table lk on lk.lookup_id = e.gender_id AND lk.lookup_type = 'GENDER'
		WHERE e.employee_id = ".$id);
		return $query->row();
	}
	

	public function appointment_letter($id){

		$query = $this->db->query("SELECT e.employee_id, CONCAT(e.first_name, ' ',e. last_name) AS employee_name, e.doj, ISNULL(e.c_address_1, '')c_address_1 ,ISNULL (e.c_address_2, '')c_address_2, ISNULL(e.c_address_3, '')c_address_3,e.c_city_id,e.c_pincode, e.c_state_id, ISNULL(sm.state_name,'')state_name, dg.desig_name,ISNULL(lk.lookup_desc,'') AS gender FROM employee_mst e
		LEFT JOIN state_mst sm ON e.c_state_id = sm.state_id 
		LEFT JOIN lookup_table lk on lk.lookup_id = e.gender_id AND lk.lookup_type = 'GENDER'
		INNER JOIN designation_mst dg ON e.designation_id = dg.desig_id
		WHERE e.employee_id = ".$id);
		return $query->row();
	}

	public function confidentiality_declaration($id){

		$query = $this->db->query("SELECT e.employee_id, CONCAT(e.first_name, ' ',e. last_name) AS employee_name, ISNULL(e.employee_code, '') AS employee_code, dg.desig_name, ISNULL(lk.lookup_desc,'') AS gender FROM employee_mst e
		LEFT JOIN lookup_table lk on lk.lookup_id = e.gender_id AND lk.lookup_type = 'GENDER'
		INNER JOIN designation_mst dg ON e.designation_id = dg.desig_id
		WHERE e.employee_id = ".$id);
		return $query->row();
	}

	public function home_verif($id){

		$query = $this->db->query("SELECT e.employee_id, CONCAT(e.first_name, ' ',e. last_name) AS employee_name, ISNULL(e.father_name, '') father_name, 
		ISNULL(e.c_address_1, '')c_address_1 ,ISNULL (e.c_address_2, '')c_address_2, ISNULL(e.c_address_3, '')c_address_3,e.c_city_id,e.c_pincode, e.c_state_id, ISNULL(sm.state_name,'')state_name FROM employee_mst e
		LEFT JOIN state_mst sm ON e.c_state_id = sm.state_id 
		WHERE e.employee_id = ".$id);
		return $query->row();
	}

	public function training_certificate($id){

		$query = $this->db->query("SELECT e.employee_id, CONCAT(e.first_name, ' ',e. last_name) AS employee_name, e.doj,e.tenure_date_2, ISNULL(e.father_name, '') father_name, 
		ISNULL(e.c_address_1, '')c_address_1 ,ISNULL (e.c_address_2, '')c_address_2, ISNULL(e.c_address_3, '')c_address_3,e.c_city_id,e.c_pincode, e.c_state_id, ISNULL(sm.state_name,'')state_name,ISNULL(lk.lookup_desc,'') AS gender FROM employee_mst e
		LEFT JOIN state_mst sm ON e.c_state_id = sm.state_id
		LEFT JOIN lookup_table lk on lk.lookup_id = e.gender_id AND lk.lookup_type = 'GENDER' 
		WHERE e.employee_id = ".$id);
		return $query->row();
	}

	public function personal_declaration($id){

		$query = $this->db->query("SELECT e.employee_id, CONCAT(e.first_name, ' ',e. last_name) AS employee_name, e.doj, dg.desig_name, ISNULL(e.father_name, '') father_name, 
		ISNULL(e.c_address_1, '')c_address_1 ,ISNULL (e.c_address_2, '')c_address_2, ISNULL(e.c_address_3, '')c_address_3,e.c_city_id,e.c_pincode, e.c_state_id, ISNULL(sm.state_name,'')state_name, ISNULL(lk.lookup_desc,'') AS gender,cmb.address_1 FROM employee_mst e
		LEFT JOIN state_mst sm ON e.c_state_id = sm.state_id 
		INNER JOIN designation_mst dg ON e.designation_id = dg.desig_id
		LEFT JOIN lookup_table lk on lk.lookup_id = e.gender_id AND lk.lookup_type = 'GENDER'
		INNER JOIN company_branch_mst cmb ON cmb.company_branch_id = e.company_branch_id
		WHERE e.employee_id = ".$id);
		return $query->row();
	}

	public function empCard($id){
			
		$query = $this->db->query("SELECT em.employee_id, em.first_name +' '+ em.first_name +' - '+em.p_address_1 +' '+em.p_address_2 +' '
		  + em.p_address_3 +' '+sm.state_name   as name_address	,dm.desig_name +' - '+ cmb.branch_name as designame
		  FROM employee_mst em
		  INNER JOIN state_mst sm ON sm.state_id = em.p_state_id
		  INNER JOIN designation_mst dm ON dm.desig_id = em.designation_id
		  INNER JOIN company_branch_mst cmb ON cmb.company_branch_id = em.company_branch_id

		  Where em.employee_id =".$id);	
		return $query->row();
	}

	public function penalty_clause($id){
			
		$query = $this->db->query("SELECT em.employee_id, CONCAT(em.first_name, ' ',em. last_name) AS employee_name, ISNULL(em.c_address_1, '')c_address_1 ,ISNULL (em.c_address_2, '')c_address_2, ISNULL(em.c_address_3, '')c_address_3,em.c_city_id,em.c_pincode, em.c_state_id, sm.state_name FROM employee_mst em
		  INNER JOIN state_mst sm ON  em.c_state_id = sm.state_id 
		  INNER JOIN company_branch_mst cmb ON cmb.company_branch_id = em.company_branch_id
		  

		  Where em.employee_id =".$id);	
		return $query->row();
	}

	public function service_certificate($id){
			
		$query = $this->db->query("SELECT em.employee_id, CONCAT(em.first_name, ' ',em. last_name) AS employee_name,ISNULL(em.father_name, '') father_name, 
		em.doj, em.dob, ef.age, ISNULL(em.c_address_1, '')c_address_1 ,ISNULL (em.c_address_2, '')c_address_2, 
		ISNULL(em.c_address_3, '')c_address_3,em.c_city_id,em.c_pincode, em.c_state_id, sm.state_name,em.tenure_date_2,
		dm.desig_name,em.id_mark, cmb.address_1, cmb.address_2, cmb.address_3,cmb.pincode,
		cmb.branch_name FROM employee_mst em
				  INNER JOIN state_mst sm ON  em.c_state_id = sm.state_id 
				  
				  INNER JOIN designation_mst dm ON dm.desig_id = em.designation_id
				  INNER JOIN employee_family_mst ef ON em.employee_id = ef.employee_id
				  LEFT JOIN company_branch_mst cmb ON cmb.company_branch_id = em.company_branch_id
				   
				  Where em.employee_id =".$id);	
		return $query->row();
	}

	public function biodata($id){
			
		$query = $this->db->query("SELECT em.employee_id, CONCAT(em.first_name, ' ',em. last_name) AS employee_name, em.employee_image, em.religion, em.nationality, ISNULL(em.father_name, '') father_name, ISNULL(em.mother_name, '') mother_name, em.spouse_name, em.height, em.weight, em.chest, em.id_mark, ISNULL(em.c_address_1, '')c_address_1 ,ISNULL (em.c_address_2, '')c_address_2, ISNULL(em.c_address_3, '')c_address_3,em.c_city_id,em.c_pincode, em.dob, em.c_state_id, ISNULL(em.p_address_1, '')p_address_1 ,ISNULL (em.p_address_2, '')p_address_2, ISNULL(em.p_address_3, '')p_address_3,em.p_city_id,em.p_pincode, em.p_state_id, sm.state_name,em.telephone_no, em.pf_no,em.esi_no,ed.regiment,ed.accidental_contact_name,ed.accidental_contact_no, ed.gun_no, ed.gun_lic_no, ed.gun_license_expiry_date, ed.gun_area,ed.uin_no,ISNULL(lk.lookup_desc,'') AS blood_group, ISNULL(l.lookup_desc,'') AS marital_status, ISNULL(q.qualification_name, '') qualification FROM employee_mst em
		  INNER JOIN state_mst sm ON  em.c_state_id = sm.state_id 
		  LEFT JOIN lookup_table lk on lk.lookup_id = em.blood_group_id AND lk.lookup_type = 'BLOOD_GROUP' 
		  INNER JOIN lookup_table l on l.lookup_id = em.merital_status_id AND l.lookup_type = 'MARITAL_STATUS'
		  LEFT JOIN employee_detail_mst ed ON em.employee_id = ed.employee_id
		  INNER JOIN company_branch_mst cmb ON cmb.company_branch_id = em.company_branch_id
		  LEFT JOIN qualification_mst q ON q.qualification_id = ed.qualification_id

		  Where em.employee_id =".$id);	
		return $query->row();
	}

	public function pf($id){
			
		$query = $this->db->query("SELECT em.employee_id, CONCAT(em.first_name, ' ',em. last_name) AS employee_name, em.employee_code, em.doj, em.employee_image, em.religion, em.nationality, ISNULL(em.father_name, '') father_name, em.uan, em.bank_name, em.account_no, em.ifsc_code,em. aadhaar_card_no, ISNULL(em.mother_name, '') mother_name, em.spouse_name, em.height, em.weight, em.chest, em.id_mark, ISNULL(em.c_address_1, '')c_address_1 ,ISNULL (em.c_address_2, '')c_address_2, ISNULL(em.c_address_3, '')c_address_3,em.c_city_id,em.c_pincode, em.dob, em.c_state_id, ISNULL(em.p_address_1, '')p_address_1 ,ISNULL (em.p_address_2, '')p_address_2, ISNULL(em.p_address_3, '')p_address_3,em.p_city_id,em.p_pincode, em.p_state_id, sm.state_name,em.telephone_no, em.pf_no,em.esi_no, ed.gun_no, ed.gun_lic_no, ed.gun_license_expiry_date, ed.gun_area,ed.uin_no,ISNULL(lk.lookup_desc,'') AS blood_group, ISNULL(l.lookup_desc,'') AS marital_status, ISNULL(lt.lookup_desc,'') AS gender, ISNULL(q.qualification_name, '') qualification FROM employee_mst em
		  INNER JOIN state_mst sm ON  em.c_state_id = sm.state_id 
		  LEFT JOIN lookup_table lk on lk.lookup_id = em.blood_group_id AND lk.lookup_type = 'BLOOD_GROUP' 
		  INNER JOIN lookup_table l on l.lookup_id = em.merital_status_id AND l.lookup_type = 'MARITAL_STATUS'
		  LEFT JOIN lookup_table lt on lt.lookup_id = em.gender_id AND lt.lookup_type = 'GENDER'
		  LEFT JOIN employee_detail_mst ed ON em.employee_id = ed.employee_id
		  INNER JOIN company_branch_mst cmb ON cmb.company_branch_id = em.company_branch_id
		  LEFT JOIN qualification_mst q ON q.qualification_id = ed.qualification_id

		  Where em.employee_id =".$id);	
		return $query->row();
	}
	
	public function epf_header($id)
	{
		$query = $this->db->query("SELECT em.employee_id,em.employee_code,em.doj,em.first_name,em.last_name,
		em.father_name,em.first_name +' '+em.last_name as name, em.dob,em.account_no,em.aadhaar_card_no,ISNULL(lk.lookup_desc,'') AS gender,
		ISNULL(l.lookup_desc,'') AS MARITAL_STATUS, em.p_address_1 +', '+ em.p_address_2 +', '+ em.p_address_3 +', '+ 
		sm.state_name as p_address, em.c_address_1 +', '+ em.c_address_2 +', '+ em.c_address_3 +', '+ 
		sm.state_name as c_address,em.nominee_name +' Address - '+ em.p_address_1 +', '+ em.p_address_2 +', '+ em.p_address_3 +', '+ 
		sm.state_name as nominee_name_address
		FROM employee_mst em
		INNER JOIN lookup_table lk on lk.lookup_id = em.gender_id AND lk.lookup_type = 'GENDER'
		INNER JOIN lookup_table l on l.lookup_id = em.merital_status_id AND l.lookup_type = 'MARITAL_STATUS'
		INNER JOIN state_mst sm ON sm.state_id = em.p_state_id
		WHERE em.employee_id=".$id);	
		return $query->row();
	}
	
	public function epf_family($id)
	{
	  $query = $this->db->query("  SELECT row_number() over(partition by emf.member_name order by emf.member_name) as slno, 
	  emf.family_id, emf.employee_id,emf.member_name +' Address - '+ em.p_address_1 +', '+ em.p_address_2 +', '+ em.p_address_3 +', '+ sm.state_name as member_name_address,emf.dob,ISNULL(l.lookup_desc,'') AS relation
	  FROM employee_family_mst emf
	  INNER JOIN employee_mst em ON em.employee_id = emf.employee_id
	  INNER JOIN state_mst sm ON sm.state_id = em.p_state_id
	  INNER JOIN lookup_table l on l.lookup_id = emf.relation AND l.lookup_type = 'RELATION'
	  WHERE emf.employee_id =".$id);	
		return $query->result();
	}
	
}
