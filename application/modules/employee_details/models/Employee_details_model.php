<?php
class Employee_details_model extends CI_Model {
	
	protected $table_name = 'employee_detail_mst';
	//protected $client_contact = 'client_contact_mst';

	
	public function __construct() {
		parent::__construct();
	}

	public function EmpDetails($id){
		
		$query = $this->db->query("Select employee_id,employee_code,first_name,last_name,(ISNULL(opening_el,0) - ISNULL(el,0)) el,(ISNULL(opening_sl,0) - ISNULL(sl,0)) sl,(ISNULL(opening_cl,0) - ISNULL(cl,0)) cl,p_address_1,p_address_2,p_address_3 from employee_mst WHERE employee_id = ".$id);
		return $query->row();
	}
	
	public function get_all_qualification()
	{
		$query = $this->db->query("Select qualification_id,qualification_name from qualification_mst where active_status=1 ORDER BY qualification_name;");
		return $query->result();
	}

	public function get_all_training()
	{
		$query = $this->db->query("Select training_type_id,training_name from training_type_mst where active_status=1 ORDER BY training_name;");
		return $query->result_array();
	}

	public function get_all_esi() {
		$query = $this->db->query("Select esi_organisation_id,organisation_name from esi_organisation_mst where active_status=1 ORDER BY organisation_name;");
		return $query->result();
	}
	
	public function get_all_type() {
		$query = $this->db->query("SELECT lookup_id,lookup_desc FROM lookup_table where active_status=1 and lookup_type='DRIVING_LICENSE_TYPE' ORDER BY serial_no;");
		return $query->result();
	}

	public function insertDetails($employee_id,$qualification_id,$army_date1,$army_date2,$regiment,$character_on_discharge,$reason_discharge,$medical_category,$civil_experience,$training_id,$training_date,$due_date,$document_submitted,$pending_document,$gun_lic_expiry_date,$driving_license_no,$gun_area,$renewal,$gun_no,$type_id,$gun_issue_auth,$issuing_rto,$gun_fitness_validity,$dob,$gun_lic_no,$address_license,$description,$dl_first_issue_date,$issue_district,$driving_record_of_accid,$uin_no,$dl_fit_certification,$state_id,$name,$covicted_by_law,$address,$criminal_proceeding,$mobile_no,$person_related_to,$esi_id,$pv_submit_flag,$police_stn,$pv_date,$pv_exp_date)
	{

		$detail_training_data = '';
		$tot_training_id = count($training_id);
			for($i=0; $i<$tot_training_id; $i++)
			{
				if(!empty($training_id[$i]) && !empty($training_date[$i]))
				{
					$detail_training_data .= $training_id[$i].'|~|'.$training_date[$i].'|~|'.$due_date[$i]. '#';
				}
				
			}

		

		$detail_training_data = rtrim($detail_training_data, "#");

		$user_id = $this->session->user_id;
		$final_army_date1 = date("Y-m-d", strtotime($army_date1));
		$final_army_date2 = date("Y-m-d", strtotime($army_date2));
		// $final_training_date = date("Y-m-d", strtotime($training_date));
		// $final_due_date = date("Y-m-d", strtotime($due_date));
		$final_gun_lic_expiry_date = date("Y-m-d", strtotime($gun_lic_expiry_date));
		$final_dob = date("Y-m-d", strtotime($dob));
		$final_dl_first_issue_date = date("Y-m-d", strtotime($dl_first_issue_date));

		$query = $this->db->query("EXEC add_employee_details_proc @p_employee_id = '".$employee_id."', @p_qualification_id = '".$qualification_id."', @p_army_date1 = '".$final_army_date1."', @p_army_date2 = '".$final_army_date2."' ,@p_regiment = '".$regiment."' , @p_character_on_discharge = '".$character_on_discharge."', @p_reason_discharge = '".$reason_discharge."',@p_medical_category = '".$medical_category."', @p_civil_experience = '".$civil_experience."', @p_document_submitted = '".$document_submitted."', @p_pending_document = '".$pending_document."',@p_gun_lic_expiry_date = '".$final_gun_lic_expiry_date."', @p_driving_license_no = '".$driving_license_no."', @p_gun_area = '".$gun_area."', @p_renewal = '".$renewal."', @p_gun_no = '".$gun_no."', @p_type_id = '".$type_id."', @p_gun_issue_auth = '".$gun_issue_auth."', @p_issuing_rto = '".$issuing_rto."', @p_gun_fitness_validity = '".$gun_fitness_validity."', @p_final_dob = '".$final_dob."', @p_gun_lic_no = '".$gun_lic_no."', @p_address_license = '".$address_license."', @p_description = '".$description."', @p_dl_first_issue_date = '".$final_dl_first_issue_date."', @p_issue_district = '".$issue_district."', @p_driving_record_of_accid = '".$driving_record_of_accid."', @p_uin_no = '".$uin_no."', @p_dl_fit_certification = '".$dl_fit_certification."', @p_state_id = '".$state_id."', @p_name = '".$name."', @p_covicted_by_law = '".$covicted_by_law."', @p_address = '".escape_str($address)."', @p_criminal_proceeding = '".$criminal_proceeding."',@p_mobile_no = '".$mobile_no."',@p_person_related_to = '".$person_related_to."',@p_esi_id = '".$esi_id."',@p_pv_submit_flag = '".$pv_submit_flag."',@p_police_stn = '".$police_stn."',@p_pv_date = '".$pv_date."',@p_pv_exp_date = '".$pv_exp_date."',@p_user_id = '".$user_id."', @p_detail_training_data = '". $detail_training_data."'");

		//echo $this->db->last_query();die;
 
		
		return $query->result_array();
	}

		public function getEmployeeDetails($id){
			$qry = $this->db->query("SELECT employee_detail_id,employee_id,qualification_id,army_service_from    ,army_service_to,regiment,discharge_character,discharge_reason,medical_category,civil_experience     ,training_id,training_date,due_date,document_submitted,pending_document,gun_license_expiry_date      ,gun_area,gun_no,gun_issue_authority,gun_fitness_validity,gun_lic_no,gun_description  ,gun_issue_district,uin_no,driving_license_no,driving_license_renewal_date,driving_license_type_id      ,driving_license_issuing_rto,driving_license_dob,driving_license_address,driving_license_issue_date      ,driving_accident_record,driving_fit_certificate,location_empcrd_id,covicted_by_law    ,criminal_proceeding,related_person,esi_organisation_id,accidental_contact_name  ,accidental_contact_address,accidental_contact_no,pv_submit_flag,police_stn,pv_date,pv_exp_date from employee_detail_mst where employee_detail_id=".$id);
			return $qry->result();
			
		}

		public function editTraining($id){
			$qry = $this->db->query("SELECT etm.employee_training_id,etm.training_date,etm.due_date,etm.training_id from employee_training_mst etm where etm.active_status=1 and etm.employee_id=".$id);

			//echo $this->db->last_query();die;
			return $qry->result_array();
			
		}

		public function UpdateDetails($employee_id,$qualification_id,$army_date1,$army_date2,$regiment,$character_on_discharge,$reason_discharge,$medical_category,$civil_experience,$document_submitted,$pending_document,$gun_lic_expiry_date,$driving_license_no,$gun_area,$renewal,$gun_no,$type_id,$gun_issue_auth,$issuing_rto,$gun_fitness_validity,$dob,$gun_lic_no,$address_license,$description,$dl_first_issue_date,$issue_district,$driving_record_of_accid,$uin_no,$dl_fit_certification,$state_id,$name,$covicted_by_law,$address,$criminal_proceeding,$mobile_no,$person_related_to,$esi_id,$employee_detail_id,$pv_submit_flag,$police_stn,$pv_date,$pv_exp_date,$training_id,$training_date,$due_date,$employee_training_id)
	  {		

	  	if(!empty($training_id))
		{
			$tot_training_id = count($training_id);
		}

		$detail_training_data = '';

		for($i=0; $i<$tot_training_id; $i++)
		{
			if(!empty($training_id[$i]) && $training_date[$i])
			{
				$detail_training_data .= $employee_training_id[$i].'|~|'.$training_id[$i].'|~|'.$training_date[$i].'|~|'.$due_date[$i]. '#';
			}			
		}
		 $detail_training_data = rtrim($detail_training_data, "#");

		$user_id = $this->session->user_id;
		$final_army_date1 = date("Y-m-d", strtotime($army_date1));
		$final_army_date2 = date("Y-m-d", strtotime($army_date2));
		$final_gun_lic_expiry_date = date("Y-m-d", strtotime($gun_lic_expiry_date));
		$final_dob = date("Y-m-d", strtotime($dob));
		$final_dl_first_issue_date = date("Y-m-d", strtotime($dl_first_issue_date));

		$query = $this->db->query("EXEC edit_employee_details_proc @p_employee_id = '".$employee_id."', @p_qualification_id = '".$qualification_id."', @p_army_date1 = '".$final_army_date1."', @p_army_date2 = '".$final_army_date2."' ,@p_regiment = '".$regiment."' , @p_character_on_discharge = '".$character_on_discharge."', @p_reason_discharge = '".$reason_discharge."',@p_medical_category = '".$medical_category."', @p_civil_experience = '".$civil_experience."', @p_document_submitted = '".$document_submitted."', @p_pending_document = '".$pending_document."',@p_gun_lic_expiry_date = '".$final_gun_lic_expiry_date."', @p_driving_license_no = '".$driving_license_no."', @p_gun_area = '".$gun_area."', @p_renewal = '".$renewal."', @p_gun_no = '".$gun_no."', @p_type_id = '".$type_id."', @p_gun_issue_auth = '".$gun_issue_auth."', @p_issuing_rto = '".$issuing_rto."', @p_gun_fitness_validity = '".$gun_fitness_validity."', @p_final_dob = '".$final_dob."', @p_gun_lic_no = '".$gun_lic_no."', @p_address_license = '".$address_license."', @p_description = '".$description."', @p_dl_first_issue_date = '".$final_dl_first_issue_date."', @p_issue_district = '".$issue_district."', @p_driving_record_of_accid = '".$driving_record_of_accid."', @p_uin_no = '".$uin_no."', @p_dl_fit_certification = '".$dl_fit_certification."', @p_state_id = '".$state_id."', @p_name = '".$name."', @p_covicted_by_law = '".$covicted_by_law."', @p_address = '".escape_str($address)."', @p_criminal_proceeding = '".$criminal_proceeding."',@p_mobile_no = '".$mobile_no."',@p_person_related_to = '".$person_related_to."',@p_esi_id = '".$esi_id."',@p_user_id = '".$user_id."',@p_employee_detail_id = '". $employee_detail_id ."', @p_pv_submit_flag = '".$pv_submit_flag."',@p_police_stn = '".$police_stn."',@p_pv_date = '".$pv_date."',@p_pv_exp_date = '".$pv_exp_date."', @p_detail_training_data = '". $detail_training_data."'");

		
		return $query;
	}
	
	public function checkExists($employee_id) {
		$query = $this->db->query("SELECT employee_detail_id FROM employee_detail_mst WHERE employee_id = '" . $employee_id . "';");
		return $query->row();
	}

}

