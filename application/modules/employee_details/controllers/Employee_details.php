<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_details extends MY_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
        $this->load->library("session");
    $this->load->model('employee_details_model','edm');
		$this->load->model('client/client_model','cm');
		$this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->form_validation->CI =& $this;
	}
	
	public function index() {
		$data = [];
		$this->template->write('title', 'Employee Details', TRUE);
        /**
         * if you have any css to add for this page
         */
		
        $this->template->add_css('assets/css/dataTables.bootstrap4.min.css');

		
        /**
         * if you have any js to add for this page
         */
        $this->template->add_js('assets/js/jquery.dataTables.min.js');
        $this->template->add_js('assets/js/dataTables.bootstrap4.min.js');
        $this->template->add_js('assets/js/bootstrap-select.js');
		
        $this->template->write_view('content', 'list', $data, TRUE);
        $this->template->render();
	}

  public function get_all_training(){
    $data['training_list'] = $this->edm->get_all_training();
    echo json_encode(array('training_list' => $data['training_list'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
  }


	public function add(){
		$url_emp_id = $this->uri->segment(3);
		$check_exists = $this->edm->checkExists($url_emp_id);
		if(!empty($check_exists->employee_detail_id)){
			redirect('employee_details/edit/' . $url_emp_id . '/'. $check_exists->employee_detail_id, 'refresh');
		}
		
		if(!empty($this->input->post())){
			 $this->form_validation->set_rules('qualification_id','Educational Qualification','required');
             $this->form_validation->set_rules('document_submitted','Document Submitted','trim|required');
             $this->form_validation->set_rules('pending_document','Pending Document','trim|required');
             $this->form_validation->set_rules('name','Name','trim|required');
             $this->form_validation->set_rules('address','Address','trim|required');
             $this->form_validation->set_rules('mobile_no','Mobile Number','trim|required');
             $this->form_validation->set_rules('esi_id','Organization ESI Address','required'); 
             $this->form_validation->set_rules('pv_submit_flag','Application for PV form submitted');
             $this->form_validation->set_rules('police_stn','Police STN Submitted');
             $this->form_validation->set_rules('pv_date','Date Submitted');
             $this->form_validation->set_rules('pv_exp_date','PV Expiry Date');
             //$this->form_validation->set_rules('training_id[]','Training Name','required');
             //$this->form_validation->set_rules('training_date[]','Training Date','required');
             //$this->form_validation->set_rules('due_date[]','Training Due Date','required');
             
             if ($this->form_validation->run() == TRUE)
              {
                $employee_id = $this->input->post('employee_id');
                $qualification_id = $this->input->post('qualification_id');
                $army_date1 = $this->input->post('army_date1');
                $army_date2 = $this->input->post('army_date2');
                $regiment = $this->input->post('regiment');
                $character_on_discharge = $this->input->post('character_on_discharge');
                $reason_discharge = $this->input->post('reason_discharge');
                $medical_category = $this->input->post('medical_category');
                $civil_experience = $this->input->post('civil_experience');
                $document_submitted = $this->input->post('document_submitted');
                $pending_document = $this->input->post('pending_document');
                $gun_lic_expiry_date = $this->input->post('gun_lic_expiry_date');
                $driving_license_no = $this->input->post('driving_license_no');
                $gun_area = $this->input->post('gun_area');
                $renewal = $this->input->post('renewal');
                $gun_no = $this->input->post('gun_no');
                $type_id = $this->input->post('type_id');
                $gun_issue_auth = $this->input->post('gun_issue_auth');
                $issuing_rto = $this->input->post('issuing_rto');
                $gun_fitness_validity = $this->input->post('gun_fitness_validity');
                $dob = $this->input->post('dob');
                $gun_lic_no = $this->input->post('gun_lic_no');
                $address_license = $this->input->post('address_license');
                $description = $this->input->post('description');
                $dl_first_issue_date = $this->input->post('dl_first_issue_date');
                $issue_district = $this->input->post('issue_district');
                $driving_record_of_accid = $this->input->post('driving_record_of_accid');
                $uin_no = $this->input->post('uin_no');
                $dl_fit_certification = $this->input->post('dl_fit_certification');
                $state_id = $this->input->post('state_id');
                $name = $this->input->post('name');
                $covicted_by_law = $this->input->post('covicted_by_law');
                $address = $this->input->post('address');
                $criminal_proceeding = $this->input->post('criminal_proceeding');
                $mobile_no = $this->input->post('mobile_no');
                $person_related_to = $this->input->post('person_related_to');
                $esi_id = $this->input->post('esi_id');
                $pv_submit_flag = $this->input->post('pv_submit_flag');
                $police_stn = $this->input->post('police_stn');
                $pv_date = $this->input->post('pv_date');
                $pv_exp_date = $this->input->post('pv_exp_date');

                $training_id = $this->input->post('training_id');
                $training_date = $this->input->post('training_date');
                $due_date = $this->input->post('due_date');
                 
                $qry = current($this->edm->insertDetails($employee_id,$qualification_id,$army_date1,$army_date2,$regiment,$character_on_discharge,$reason_discharge,$medical_category,$civil_experience,$training_id,$training_date,$due_date,$document_submitted,$pending_document,$gun_lic_expiry_date,$driving_license_no,$gun_area,$renewal,$gun_no,$type_id,$gun_issue_auth,$issuing_rto,$gun_fitness_validity,$dob,$gun_lic_no,$address_license,$description,$dl_first_issue_date,$issue_district,$driving_record_of_accid,$uin_no,$dl_fit_certification,$state_id,$name,$covicted_by_law,$address,$criminal_proceeding,$mobile_no,$person_related_to,$esi_id,$pv_submit_flag,$police_stn,$pv_date,$pv_exp_date));

                $empd_id = $qry['empd_id'];
                if($empd_id)
                {
                    $this->session->set_flashdata('msg', 'Successfully Inserted');
                    redirect(base_url().'employee_details/edit/'.$employee_id. '/'. $empd_id);
                }
                
              }
              else
              {
                if(!empty($this->input->post('training_id')))
                {
                    $training_id_obj = $this->input->post('training_id');
                    $data['employee_det']['training_id'] = $training_id_obj;
                }

                if(!empty($this->input->post('training_date')))
                {
                    $training_date_obj = $this->input->post('training_date');
                    $data['employee_det']['training_date'] = $training_date_obj;
                }

                if(!empty($this->input->post('due_date')))
                {
                    $due_date_obj = $this->input->post('due_date');
                    $data['employee_det']['due_date'] = $due_date_obj;
                }

                $this->template->write('title', 'Dashboard', TRUE);
                $this->template->add_js('assets/js/select2.min.js');
                $this->template->add_js('assets/js/bootstrap-select.js');
                $this->template->add_js('assets/js/bootstrap-datepicker.min.js');

                $this->template->add_css('assets/css/datepicker.css');
                $this->template->add_css('assets/css/select2.css');
                $this->template->add_css('assets/css/bootstrap-select.css');


                $this->template->write_view('content', 'add_employee_details', $data , TRUE);
                $this->template->render();
              }
	 }

		$data['employee'] = $this->edm->EmpDetails($url_emp_id);

    $qualification_obj = $this->edm->get_all_qualification();
    $qualification_list = array();
    foreach($qualification_obj as $qualification){
        $qualification_list[$qualification->qualification_id] = $qualification->qualification_name;
    }    
    $data['qualification'] = $qualification_list;


    $type_obj = $this->edm->get_all_type();
    $type_list = array();
    foreach($type_obj as $type){
        $type_list[$type->lookup_id] = $type->lookup_desc;
    }    
    $data['type'] = $type_list;

    $state_obj = $this->cm->get_all_state();
    foreach($state_obj as $state){
      $state_list[$state->state_id] = $state->state_name;
    }
    $data['state'] = $state_list;

    $esi_obj = $this->edm->get_all_esi();
    foreach($esi_obj as $esi){
      $esi_list[$esi->esi_organisation_id] = $esi->organisation_name;
    }
    $data['esi'] = $esi_list;

    $training_obj = $this->edm->get_all_training();
      $training_list = array();
      foreach($training_obj as $training){
          $training_list[$training['training_type_id']] = $training['training_name'];
      }    
      $data['training'] = $training_list;

		
    $this->template->write('title', 'Dashboard', TRUE);
		$this->template->add_js('assets/js/select2.min.js');
    $this->template->add_js('assets/js/bootstrap-select.js');
    $this->template->add_js('assets/js/bootstrap-datepicker.min.js');

    $this->template->add_css('assets/css/datepicker.css');
		$this->template->add_css('assets/css/select2.css');
    $this->template->add_css('assets/css/bootstrap-select.css');


    $this->template->write_view('content', 'add_employee_details', $data , TRUE);
    $this->template->render();
	}

    public function edit($employee_id, $id)
    {
        $data['edit_employee_details'] = $this->edm->getEmployeeDetails($id);
        $data['edit_employee'] = $this->edm->EmpDetails($employee_id);
        $data['edit_training'] = $this->edm->editTraining($id);
        //print_r($data['edit_training']);die;

        $qualification_obj = $this->edm->get_all_qualification();
      $qualification_list = array();
      foreach($qualification_obj as $qualification){
          $qualification_list[$qualification->qualification_id] = $qualification->qualification_name;
      }    
      $data['qualification'] = $qualification_list;

      $training_obj = $this->edm->get_all_training();
      $training_list = array("" => "Select Training");
      foreach($training_obj as $training){
          $training_list[$training['training_type_id']] = $training['training_name'];
      }    
      $data['training'] = $training_list;

      $type_obj = $this->edm->get_all_type();
      $type_list = array();
      foreach($type_obj as $type){
          $type_list[$type->lookup_id] = $type->lookup_desc;
      }    
      $data['type'] = $type_list;

      $state_obj = $this->cm->get_all_state();
      foreach($state_obj as $state){
        $state_list[$state->state_id] = $state->state_name;
      }
      $data['state'] = $state_list;

      $esi_obj = $this->edm->get_all_esi();
      foreach($esi_obj as $esi){
        $esi_list[$esi->esi_organisation_id] = $esi->organisation_name;
      }
      $data['esi'] = $esi_list;

     if(!empty($this->input->post())){

             $this->form_validation->set_rules('qualification_id','Educational Qualification','required');
             $this->form_validation->set_rules('document_submitted','Document Submitted','trim|required');
             $this->form_validation->set_rules('pending_document','Pending Document','trim|required');
             $this->form_validation->set_rules('name','Name','trim|required');
             $this->form_validation->set_rules('address','Address','trim|required');
             $this->form_validation->set_rules('mobile_no','Mobile Number','trim|required');
             $this->form_validation->set_rules('esi_id','Organization ESI Address','required');
			       $this->form_validation->set_rules('pv_submit_flag','Application for PV form submitted');
             $this->form_validation->set_rules('police_stn','Police STN Submitted');
             $this->form_validation->set_rules('pv_date','Date Submitted');
             $this->form_validation->set_rules('pv_exp_date','PV Expiry Date');

         if ($this->form_validation->run() == TRUE){
                $employee_id = $this->input->post('employee_id');
                $qualification_id = $this->input->post('qualification_id');
                $army_date1 = $this->input->post('army_date1');
                $army_date2 = $this->input->post('army_date2');
                $regiment = $this->input->post('regiment');
                $character_on_discharge = $this->input->post('character_on_discharge');
                $reason_discharge = $this->input->post('reason_discharge');
                $medical_category = $this->input->post('medical_category');
                $civil_experience = $this->input->post('civil_experience');
                $document_submitted = $this->input->post('document_submitted');
                $pending_document = $this->input->post('pending_document');
                $gun_lic_expiry_date = $this->input->post('gun_lic_expiry_date');
                $driving_license_no = $this->input->post('driving_license_no');
                $gun_area = $this->input->post('gun_area');
                $renewal = $this->input->post('renewal');
                $gun_no = $this->input->post('gun_no');
                $type_id = $this->input->post('type_id');
                $gun_issue_auth = $this->input->post('gun_issue_auth');
                $issuing_rto = $this->input->post('issuing_rto');
                $gun_fitness_validity = $this->input->post('gun_fitness_validity');
                $dob = $this->input->post('dob');
                $gun_lic_no = $this->input->post('gun_lic_no');
                $address_license = $this->input->post('address_license');
                $description = $this->input->post('description');
                $dl_first_issue_date = $this->input->post('dl_first_issue_date');
                $issue_district = $this->input->post('issue_district');
                $driving_record_of_accid = $this->input->post('driving_record_of_accid');
                $uin_no = $this->input->post('uin_no');
                $dl_fit_certification = $this->input->post('dl_fit_certification');
                $state_id = $this->input->post('state_id');
                $name = $this->input->post('name');
                $covicted_by_law = $this->input->post('covicted_by_law');
                $address = $this->input->post('address');
                $criminal_proceeding = $this->input->post('criminal_proceeding');
                $mobile_no = $this->input->post('mobile_no');
                $person_related_to = $this->input->post('person_related_to');
                $esi_id = $this->input->post('esi_id');
				$pv_submit_flag = $this->input->post('pv_submit_flag');
                $police_stn = $this->input->post('police_stn');
                $pv_date = $this->input->post('pv_date');
                $pv_exp_date = $this->input->post('pv_exp_date');
                $employee_detail_id = $this->input->post('employee_detail_id');

                $training_id = $this->input->post('training_id');
                $training_date = $this->input->post('training_date');
                $due_date = $this->input->post('due_date');
                $employee_training_id = $this->input->post('employee_training_id');
                
                 $qry = $this->edm->UpdateDetails($employee_id,$qualification_id,$army_date1,$army_date2,$regiment,$character_on_discharge,$reason_discharge,$medical_category,$civil_experience,$document_submitted,$pending_document,$gun_lic_expiry_date,$driving_license_no,$gun_area,$renewal,$gun_no,$type_id,$gun_issue_auth,$issuing_rto,$gun_fitness_validity,$dob,$gun_lic_no,$address_license,$description,$dl_first_issue_date,$issue_district,$driving_record_of_accid,$uin_no,$dl_fit_certification,$state_id,$name,$covicted_by_law,$address,$criminal_proceeding,$mobile_no,$person_related_to,$esi_id,$employee_detail_id,$pv_submit_flag,$police_stn,$pv_date,$pv_exp_date,$training_id,$training_date,$due_date,$employee_training_id);
                if($qry)
                {
                    $this->session->set_flashdata('msg', 'Data Saved Successfully');
                    redirect(base_url().'employee_details/edit/'.$employee_id. '/'. $employee_detail_id);
                }
             }
             else
             {
             	if(!empty($this->input->post('employee_training_id')))
                {
                    $employee_training_id_obj = $this->input->post('employee_training_id');
                    $data['employee_det']['employee_training_id'] = $employee_training_id_obj;
                }
             	if(!empty($this->input->post('training_id')))
                {
                    $training_id_obj = $this->input->post('training_id');
                    $data['employee_det']['training_id'] = $training_id_obj;
                }

                if(!empty($this->input->post('training_date')))
                {
                    $training_date_obj = $this->input->post('training_date');
                    $data['employee_det']['training_date'] = $training_date_obj;
                }

                if(!empty($this->input->post('due_date')))
                {
                    $due_date_obj = $this->input->post('due_date');
                    $data['employee_det']['due_date'] = $due_date_obj;
                }

                $this->template->write('title', 'Dashboard', TRUE);
                $this->template->add_js('assets/js/select2.min.js');
                $this->template->add_js('assets/js/bootstrap-select.js');
                $this->template->add_js('assets/js/bootstrap-datepicker.min.js');

                $this->template->add_css('assets/css/datepicker.css');
                $this->template->add_css('assets/css/select2.css');
                $this->template->add_css('assets/css/bootstrap-select.css');


                $this->template->write_view('content', 'edit_employee_details', $data , TRUE);
                $this->template->render();
             }
        
         }

        $this->template->write('title', 'Dashboard', TRUE);
    	$this->template->add_js('assets/js/select2.min.js');
    	$this->template->add_js('assets/js/bootstrap-select.js');
        $this->template->add_js('assets/js/bootstrap-datepicker.min.js');
        
    	$this->template->add_css('assets/css/select2.css');
    	$this->template->add_css('assets/css/bootstrap-select.css');
        $this->template->add_css('assets/css/datepicker.css');
        $this->template->write_view('content', 'edit_employee_details', $data, TRUE);
        $this->template->render();  
    }
	
}

?>
