<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends MY_Controller {

  public function __construct() {
    parent::__construct();
    if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
      redirect('login');
    }
    $this->load->library("session");
    $this->load->model('employee_model','em');
    $this->load->model('client/client_model','cm');
    $this->load->library('form_validation');
  	$this->load->helper(array('form', 'url'));
  	$this->form_validation->CI =& $this;
  	$this->load->helper('file');
  	$this->load->library('session');
  	//$this->load->library('upload');
  }
  
  public function index(){
    $data = [];
    //$data['list'] = $this->cm->client_list();
    //echo "<pre>"; print_r($data['list']); exit();
    $this->template->write('title', 'Employee', TRUE);
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
  
  
	public function ajax_employee_list(){
		$user_branch_id = $this->session->user_branch_id;
		$check_approval_permission = $this->em->checkApprovalPermission($this->session->employee_id);
		//echo "<pre>"; print_r($employees); exit();
		//exit(json_encode($this->input->get()));
		$searched_data = array();
		if(!empty($this->input->get())){
			$searched_data['doj_from'] = $this->input->get('doj_from');
			$searched_data['doj_to'] = $this->input->get('doj_to');
			$searched_data['job_type'] = $this->input->get('job_type');
		}
		$employees = $this->em->employee_list($user_branch_id, $searched_data);
		$list = array();
		$i = 0;
		$tmp_employee_id = NULL;
		foreach($employees as $employee){
			// Main Employee info
			if($tmp_employee_id != $employee->employee_id){
				$view_btn = '<a class="vd-ed-2" href="' . base_url("employee/view_list/" . $employee->employee_id) . '"><i class="fa fa-eye" aria-hidden="true"></i></a>';
				
				$buttons = '<a class="vd-ed-2" href="' . base_url("employee/edit/" . $employee->employee_id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
				if($check_approval_permission->cnt > 0 && $employee->approval_status == 'I' && $employee->submit_for_approval == 1){
					$buttons .= '&nbsp;<a class="vd-ed-2" href="' . base_url("employee/approve/" . $employee->employee_id) . '"> Approve</a>';
				}
				$list[$i] = array(
					'employee_id' => $employee->employee_id, 'employee_code' => $employee->employee_code, 'employee_name' => $employee->employee_name, 'desig_name' => $employee->desig_name, 'dob' =>  date('d/m/Y', strtotime($employee->dob)), 'doj' =>  date('d/m/Y', strtotime($employee->doj)), 'job_type' =>  $employee->job_type, 'aadhaar_card_no' =>  $employee->aadhaar_card_no, 'approval_status' =>  $employee->approval_status, 'telephone_no' => $employee->telephone_no, 
					'buttons' => $buttons,'view_btn' => $view_btn
				);
			}
			//	Employee - Detail info
			if($employee->employee_detail_id != 0){
				$list[$i]['employee_detail'][] = array('employee_detail_id' => $employee->employee_detail_id, 'qualification' => $employee->qualification, 'gun_license_expiry_date' => $employee->gun_license_expiry_date, 'driving_license_renewal_date' => $employee->driving_license_renewal_date, 'accidental_contact_name' => $employee->accidental_contact_name, 'accidental_contact_no' => $employee->accidental_contact_no);
			}
			//	increment the variable if employee change
			if($tmp_employee_id != $employee->employee_id){
				$i++;
			}
			$tmp_employee_id = $employee->employee_id;
		}
		
		header('Content-Type: application/json');
		//exit(json_encode($clients));
		exit(json_encode(array('data' => $list)));
	}
  

  public function add(){
    $user_branch_id = $this->session->userdata('user_branch_id');
   if(!empty($this->input->post())){
               $this->form_validation->set_rules('job_type','Job Type','required');
               $this->form_validation->set_rules('company_branch_id','Company Branch','required');
               $this->form_validation->set_rules('desig_id','Designation Name','required');
               $this->form_validation->set_rules('fname','Employee First Name','trim|required');
               $this->form_validation->set_rules('lname','Employee Last Name','trim|required');
               $this->form_validation->set_rules('father_name','Father Name','trim|required');
               $this->form_validation->set_rules('mother_name','Mother Name','trim|required');
               //$this->form_validation->set_rules('rank','Rank','trim|required');
               //$this->form_validation->set_rules('photo','Photo','required');
               if (empty($_FILES['photo']['name']))
               {
                    $this->form_validation->set_rules('photo', 'Document', 'required');
               }
               $this->form_validation->set_rules('birth_place','Birth Place','trim|required');
               $this->form_validation->set_rules('chest','Chest','trim|required');
               $this->form_validation->set_rules('dob','Date Of Birth','required');
               $this->form_validation->set_rules('height','Height','trim|required');
               $this->form_validation->set_rules('weight','Weight','trim|required');
               $this->form_validation->set_rules('pf_no','PF No.','trim|required');
               $this->form_validation->set_rules('hair_color','Hair Color','trim|required');
               $this->form_validation->set_rules('eye_color','Eye Color','trim|required');
               $this->form_validation->set_rules('esi_no','ESI No.','trim|required');
               $this->form_validation->set_rules('sex','Sex','trim|required');
               $this->form_validation->set_rules('blood_group_id','Blood Group','trim|required');
               $this->form_validation->set_rules('marital_status','Marital Status','trim|required');
               $this->form_validation->set_rules('doj','DOJ','required');
               $this->form_validation->set_rules('complexion','Complexion','trim|required');
               $this->form_validation->set_rules('doa','D.O.A','required');
               $this->form_validation->set_rules('id_mark','ID Mark','trim|required');
               $this->form_validation->set_rules('language','Language','trim|required');
               $this->form_validation->set_rules('caste','Caste','trim|required');
               $this->form_validation->set_rules('religion','Religion','trim|required');
               $this->form_validation->set_rules('nationality','Nationality','trim|required');
               $this->form_validation->set_rules('nomminee_name','Nomminee Name','trim|required');
               $this->form_validation->set_rules('age','Age','trim|required');
               $this->form_validation->set_rules('bank_name','Bank Name','trim|required');
               $this->form_validation->set_rules('account_number','Account Number','trim|required');
               $this->form_validation->set_rules('aadhaar_number','Aadhaar Number','trim|required');
               $this->form_validation->set_rules('ifsc_code','IFSC Code','trim|required');
               $this->form_validation->set_rules('p_address_1',' Permanent Vill & Po','trim|required');
               $this->form_validation->set_rules('c_address_1','Current Vill & Po','trim|required');
               $this->form_validation->set_rules('p_address_2','Permanent Tehsil,Police Stn','trim|required');
               $this->form_validation->set_rules('c_address_2','Current Tehsil,Police Stn','trim|required');
               $this->form_validation->set_rules('p_address_3','Permanent District','trim|required');
               $this->form_validation->set_rules('c_address_3','Current District','trim|required');
               $this->form_validation->set_rules('p_state_id','Permanent State','required');
               $this->form_validation->set_rules('c_state_id','Current State','required');
               $this->form_validation->set_rules('p_city_id','Permanent City','required');
               $this->form_validation->set_rules('c_city_id','Current City','required');
               $this->form_validation->set_rules('residing_since','Residing Since','trim|required');
               $this->form_validation->set_rules('tel_nos','Telephone Number','trim|required');
               // $this->form_validation->set_rules('name[]','Family Name','trim|required');
               // $this->form_validation->set_rules('aadhaar_no[]','Adhaar Number','required');
               // $this->form_validation->set_rules('relation[]','Family Relation','trim|required');
               // $this->form_validation->set_rules('with_fam[]','With Family','trim|required');
               
              if ($this->form_validation->run() == TRUE)
              {
                
                $job_type = $this->input->post('job_type');
                $company_branch_id = $this->input->post('company_branch_id');
                $desig_id = $this->input->post('desig_id');
                $fname = $this->input->post('fname');
                $lname = $this->input->post('lname');
                $old_code = $this->input->post('old_code');
                $father_name = $this->input->post('father_name');
                $old_name = $this->input->post('old_name');
                $mother_name = $this->input->post('mother_name');
                $army_no = $this->input->post('army_no');
                $spouse_name = $this->input->post('spouse_name');
                $rank = $this->input->post('rank');
                $birth_place = $this->input->post('birth_place');
                $chest = $this->input->post('chest');
                $dob = $this->input->post('dob');
                $height = $this->input->post('height');
                $weight = $this->input->post('weight');
                $pf_no = $this->input->post('pf_no');
                $hair_color = $this->input->post('hair_color');
                $eye_color = $this->input->post('eye_color');
                $esi_no = $this->input->post('esi_no');
                $sex = $this->input->post('sex');
                $blood_group_id = $this->input->post('blood_group_id');
                $marital_status = $this->input->post('marital_status');
                $doj = $this->input->post('doj');
                $complexion = $this->input->post('complexion');
                $doa = $this->input->post('doa');
                //$dol = $this->input->post('dol');
                $uan = $this->input->post('uan');
                $id_mark = $this->input->post('id_mark');
                $language = $this->input->post('language');
                $caste = $this->input->post('caste');
                $religion = $this->input->post('religion');
                $tenure_date_1 = $this->input->post('tenure_date_1');
                $tenure_date_2 = $this->input->post('tenure_date_2');
                $nationality = $this->input->post('nationality');
                $nomminee_name = $this->input->post('nomminee_name');
                $age = $this->input->post('age');
                $bank_name = $this->input->post('bank_name');
                $account_number = $this->input->post('account_number');
                $aadhaar_number = $this->input->post('aadhaar_number');
                $ifsc_code = $this->input->post('ifsc_code');
                $p_address_1 = $this->input->post('p_address_1');
				//print_r($p_address_1);exit;
                $c_address_1 = $this->input->post('c_address_1');
                $p_address_2 = $this->input->post('p_address_2');
                $c_address_2 = $this->input->post('c_address_2');
                $p_address_3 = $this->input->post('p_address_3');
                $c_address_3 = $this->input->post('c_address_3');
                $p_state_id = $this->input->post('p_state_id');
                $c_state_id = $this->input->post('c_state_id');
                $p_city_id = $this->input->post('p_city_id');
                $c_city_id = $this->input->post('c_city_id');
                $residing_since = $this->input->post('residing_since');
                $tel_nos = $this->input->post('tel_nos');
                $dispensery = $this->input->post('dispensery');
                $background_check = $this->input->post('background_check');
                $notes = $this->input->post('note');

                $name = $this->input->post('name');
                $family_dob = $this->input->post('family_dob');
                $family_age = $this->input->post('family_age');
                $aadhaar_no = $this->input->post('aadhaar_no');
                $relation = $this->input->post('relation');
                $with_fam = $this->input->post('with_fam');
                // $pf_name = $this->input->post('pf_name');
                // $pf_family_dob = $this->input->post('pf_family_dob');
                // $pf_relation = $this->input->post('pf_relation');
                //echo $user_branch_id;die;
                
                

                //image upload
                $uploaded_files  = "";
                $config['upload_path']          = './uploads/employee/';
                $config['allowed_types']        = 'jpg|png|jpeg'; 
                $this->load->library('upload', $config);
                //print_r($config);die;
                if ( $this->upload->do_upload('photo'))
                {
                    //echo "abc";die;
                  $uploaded_files = $this->upload->file_name;
                  //echo "aa";
                  }
                  else
                  {
                    redirect('employee/add', 'refresh');
                  }


        $qry = current($this->em->insertEmployee($job_type,$company_branch_id,$desig_id,$fname,$lname,$old_code,$father_name,$old_name,$mother_name,$army_no,$spouse_name,$rank,$birth_place,$chest,$dob,$height,$weight,$pf_no,$hair_color,$eye_color,$esi_no,$sex,$blood_group_id,$marital_status,$doj,$complexion,$doa,$uan,$id_mark,$language,$caste,$religion,$tenure_date_1,$tenure_date_2,$nationality,$nomminee_name,$age,$bank_name,$account_number,$aadhaar_number,$ifsc_code,$p_address_1,$c_address_1,$p_address_2,$c_address_2,$p_address_3,$c_address_3,$p_state_id,$c_state_id,$p_city_id,$c_city_id,$residing_since,$tel_nos,$dispensery,$background_check,$notes,$name,$family_dob,$family_age,$aadhaar_no,$relation,$with_fam,$uploaded_files,$user_branch_id));

        $emp_id = $qry['emp_id'];
        if($emp_id)
                {
                    $this->session->set_flashdata('msg', 'Data Saved Successfully');
                    redirect(base_url().'employee/edit/'.$emp_id);
                }
                
            }

          else{
                
                if(!empty($this->input->post('name')))
                {
                    $name_obj = $this->input->post('name');
                    $data['employee']['name'] = $name_obj;
                }

                if(!empty($this->input->post('family_dob')))
                {
                    $family_dob_obj = $this->input->post('family_dob');
                    $data['employee']['family_dob'] = $family_dob_obj;
                }

                if(!empty($this->input->post('family_age')))
                {
                    $family_age_obj = $this->input->post('family_age');
                    $data['employee']['family_age'] = $family_age_obj;
                }

                if(!empty($this->input->post('aadhaar_no')))
                {
                    $family_aadhar_obj = $this->input->post('aadhaar_no');
                    $data['employee']['aadhaar_no'] = $family_aadhar_obj;
                }

                if(!empty($this->input->post('relation')))
                {
                    $relation_obj = $this->input->post('relation');
                    $data['employee']['relation'] = $relation_obj;
                    //print_r($relation_obj); exit();
                }

                if(!empty($this->input->post('with_fam')))
                {
                    $with_fam_obj = $this->input->post('with_fam');
                    $data['employee']['with_fam'] = $with_fam_obj;
                }

                // if(!empty($this->input->post('pf_name')))
                // {
                //     $pf_name_obj = $this->input->post('pf_name');
                //     $data['employee_pf']['pf_name'] = $pf_name_obj;
                // }

                // if(!empty($this->input->post('pf_family_dob')))
                // {
                //     $pf_family_dob_obj = $this->input->post('pf_family_dob');
                //     $data['employee_pf']['pf_family_dob'] = $pf_family_dob_obj;
                // }

                // if(!empty($this->input->post('pf_relation')))
                // {
                //     $pf_relation_obj = $this->input->post('pf_relation');
                //     $data['employee_pf']['pf_relation'] = $pf_relation_obj;
                // }

            // print_r($data['employee']);die;

              $this->template->write('title', 'Dashboard', TRUE);
              $this->template->add_js('assets/js/select2.min.js');
              $this->template->add_js('assets/js/bootstrap-select.js');
              $this->template->add_js('assets/js/bootstrap-datepicker.min.js');

              $this->template->add_css('assets/css/datepicker.css');
              $this->template->add_css('assets/css/select2.css');
              $this->template->add_css('assets/css/bootstrap-select.css');


              $this->template->write_view('content', 'add_employee', $data , TRUE);
              $this->template->render();
           }
            
       }

       
       $data['user_branch_id'] = $user_branch_id;


       $data['company_branch'] = $this->em->getCompanyBranchName($user_branch_id);
       //print_r($data['company_branch_name']);die;

        $branch_obj = $this->em->get_all_branch();
        foreach($branch_obj as $branch){
            $branch_list[$branch->company_branch_id] = $branch->branch_name;
        }
        $data['branch'] = $branch_list;

        $bank_obj = $this->em->get_all_bank();
        foreach($bank_obj as $bank){
            $bank_list[$bank->bank_id] = $bank->address;
        }
        $data['bank'] = $bank_list;

        $gender_obj = $this->em->get_gender();
        foreach($gender_obj as $gender){
            $gender_list[$gender->lookup_id] = $gender->lookup_desc;
        }
        $data['gender'] = $gender_list;

        $desig_obj = $this->em->get_all_desig();
        foreach($desig_obj as $desig){
            $desig_list[$desig->desig_id] = $desig->desig_name;
        }
        $data['desig'] = $desig_list;
    
        $state_obj = $this->cm->get_all_state();
        $state_list = array('' => 'Select State');
        foreach($state_obj as $state){
            $state_list[$state->state_id] = $state->state_name;
        }
        $data['state'] = $state_list;
        $p_city_list = array('' => 'Select City');
    
        if(!empty($this->input->post('p_state_id'))){
            $p_city_obj = $this->cm->getCity($this->input->post('p_state_id'));

           foreach($p_city_obj as $p_city){
                $p_city_list[$p_city['city_id']] = $p_city['city_name'];
            }
            

        }

        $data['p_city'] = $p_city_list;

        $c_city_list = array('' => 'Select City');
    
        if(!empty($this->input->post('c_state_id'))){
            $c_city_obj = $this->cm->getCity($this->input->post('c_state_id'));

           foreach($c_city_obj as $c_city){
                $c_city_list[$c_city['city_id']] = $c_city['city_name'];
            }
            

        }
        $data['c_city'] = $c_city_list;

        $bld_grp_obj = $this->em->get_blood_grp();
        foreach($bld_grp_obj as $bld_grp){
            $bld_grp_list[$bld_grp->lookup_id] = $bld_grp->lookup_desc;
        }
        $data['bld_grp'] = $bld_grp_list;

        $marrital_status_obj = $this->em->get_marrital_status();
        foreach($marrital_status_obj as $mstatus){
            $marrital_status_list[$mstatus->lookup_id] = $mstatus->lookup_desc;
        }
        $data['marrital_status'] = $marrital_status_list;

        // if(!empty($this->input->post('relation')))
        // {
        //$relation_list = array('' => 'Select Relation');
        $relation_obj = $this->em->get_relation();
        foreach($relation_obj as $relation){
            $relation_list[$relation->lookup_id] = $relation->lookup_desc;
            
        }
       //}
        $data['relation'] = $relation_list;
  
        $this->template->write('title', 'Dashboard', TRUE);
        $this->template->add_js('assets/js/select2.min.js');
        $this->template->add_js('assets/js/bootstrap-select.js');
        $this->template->add_js('assets/js/bootstrap-datepicker.min.js');

        $this->template->add_css('assets/css/datepicker.css');
        $this->template->add_css('assets/css/select2.css');
        $this->template->add_css('assets/css/bootstrap-select.css');


        $this->template->write_view('content', 'add_employee', $data , TRUE);
        $this->template->render();
  }

  public function city_list(){
    $state_id = $this->input->post('state_id');
    $data['city_list'] = $this->cm->getCity($state_id);
    echo json_encode(array('city_list' => $data['city_list'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
  }

  public function relation_list(){
    $data['relation_list'] = $this->em->getRelation();
    echo json_encode(array('relation_list' => $data['relation_list'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
  }


    public function edit($id = null) {
      $data['edit_employee'] = $this->em->editEmployee($id);
      $data['edit_family'] = $this->em->editFamily($id);
      //print_r($data['edit_family']);die;
      $data['edit_family_pf'] = $this->em->editFamilyPf($id);
      $user_branch_id = $this->session->userdata('user_branch_id');
      $data['user_branch_id'] = $user_branch_id;
      $data['company_branch'] = $this->em->getCompanyBranchName($user_branch_id);

    	$branch_obj = $this->em->get_all_branch();
        foreach($branch_obj as $branch){
            $branch_list[$branch->company_branch_id] = $branch->branch_name;
        }
        $data['branch'] = $branch_list;

        $bank_obj = $this->em->get_all_bank();
        foreach($bank_obj as $bank){
            $bank_list[$bank->bank_id] = $bank->address;
        }
        $data['bank'] = $bank_list;

        $gender_obj = $this->em->get_gender();
        foreach($gender_obj as $gender){
            $gender_list[$gender->lookup_id] = $gender->lookup_desc;
        }
        $data['gender'] = $gender_list;

     	$desig_obj = $this->em->get_all_desig();
        foreach($desig_obj as $desig){
            $desig_list[$desig->desig_id] = $desig->desig_name;
        }
        $data['desig'] = $desig_list;
    
        $state_obj = $this->cm->get_all_state();
        $state_list = array('' => 'Select State');
        foreach($state_obj as $state){
            $state_list[$state->state_id] = $state->state_name;
        }
        $data['state'] = $state_list;
        $p_city_list = array('' => 'Select City');

        $p_state_id = ($data['edit_employee'][0]->p_state_id);
        $c_state_id = ($data['edit_employee'][0]->c_state_id);
        //echo $state_id;die;
    
        if(!empty($this->input->post('p_state_id'))){
            $p_city_obj = $this->cm->getCity($this->input->post('p_state_id'));

           foreach($p_city_obj as $p_city){
                $p_city_list[$p_city['city_id']] = $p_city['city_name'];
            }
            

        }

        else
        {
            $p_city_obj = $this->cm->get_city($p_state_id);
            
           foreach($p_city_obj as $p_city){
                $p_city_list[$p_city->city_id] = $p_city->city_name;
            }
        }

        $data['p_city'] = $p_city_list;

        $c_city_list = array('' => 'Select City');
    
        if(!empty($this->input->post('c_state_id'))){
            $c_city_obj = $this->cm->getCity($this->input->post('c_state_id'));

           foreach($c_city_obj as $c_city){
                $c_city_list[$c_city['city_id']] = $c_city['city_name'];
            }
            

        }

        else
        {
            $c_city_obj = $this->cm->get_city($c_state_id);
            
           foreach($c_city_obj as $c_city){
                $c_city_list[$c_city->city_id] = $c_city->city_name;
            }
        }


        $data['c_city'] = $c_city_list;

        $bld_grp_obj = $this->em->get_blood_grp();
        foreach($bld_grp_obj as $bld_grp){
            $bld_grp_list[$bld_grp->lookup_id] = $bld_grp->lookup_desc;
        }
        $data['bld_grp'] = $bld_grp_list;

        $marrital_status_obj = $this->em->get_marrital_status();
        foreach($marrital_status_obj as $mstatus){
            $marrital_status_list[$mstatus->lookup_id] = $mstatus->lookup_desc;
        }
        $data['marrital_status'] = $marrital_status_list;

        $relation_obj = $this->em->get_relation();
        foreach($relation_obj as $relation){
            $relation_list[$relation->lookup_id] = $relation->lookup_desc;
            
        }

        $data['relation'] = $relation_list;



       if(!empty($this->input->post()))
       {
               $this->form_validation->set_rules('job_type','Job Type','required');
               $this->form_validation->set_rules('company_branch_id','Company Branch','required');
               $this->form_validation->set_rules('desig_id','Designation Name','required');
               $this->form_validation->set_rules('fname','Employee First Name','trim|required');
               $this->form_validation->set_rules('lname','Employee Last Name','trim|required');
               $this->form_validation->set_rules('father_name','Father Name','trim|required');
               $this->form_validation->set_rules('mother_name','Mother Name','trim|required');
               //$this->form_validation->set_rules('rank','Rank','trim|required');
               $this->form_validation->set_rules('birth_place','Birth Place','trim|required');
               $this->form_validation->set_rules('chest','Chest','trim|required');
               $this->form_validation->set_rules('dob','Date Of Birth','required');
               $this->form_validation->set_rules('height','Height','trim|required');
               $this->form_validation->set_rules('weight','Weight','trim|required');
               $this->form_validation->set_rules('pf_no','PF No.','trim|required');
               $this->form_validation->set_rules('hair_color','Hair Color','trim|required');
               $this->form_validation->set_rules('eye_color','Eye Color','trim|required');
               $this->form_validation->set_rules('esi_no','ESI No.','trim|required');
               $this->form_validation->set_rules('sex','Sex','trim|required');
               $this->form_validation->set_rules('blood_group_id','Blood Group','trim|required');
               $this->form_validation->set_rules('marital_status','Marital Status','trim|required');
               $this->form_validation->set_rules('doj','DOJ','required');
               $this->form_validation->set_rules('complexion','Complexion','trim|required');
               $this->form_validation->set_rules('doa','D.O.A','required');
               $this->form_validation->set_rules('uan','UAN','trim|required');
               $this->form_validation->set_rules('id_mark','ID Mark','trim|required');
               $this->form_validation->set_rules('language','Language','trim|required');
               $this->form_validation->set_rules('caste','Caste','trim|required');
               $this->form_validation->set_rules('religion','Religion','trim|required');
               // $this->form_validation->set_rules('tenure_date_1','Tenure Date 1','required');
               // $this->form_validation->set_rules('tenure_date_2','Tenure Date 2','required');
               $this->form_validation->set_rules('nationality','Nationality','trim|required');
               $this->form_validation->set_rules('nomminee_name','Nomminee Name','trim|required');
               $this->form_validation->set_rules('age','Age','trim|required');
               $this->form_validation->set_rules('bank_name','Bank Name','trim|required');
               $this->form_validation->set_rules('account_number','Account Number','trim|required');
               $this->form_validation->set_rules('aadhaar_number','Aadhaar Number','trim|required');
               $this->form_validation->set_rules('ifsc_code','IFSC Code','trim|required');
               $this->form_validation->set_rules('p_address_1',' Permanent Vill & Po','trim|required');
               $this->form_validation->set_rules('c_address_1','Current Vill & Po','trim|required');
               $this->form_validation->set_rules('p_address_2','Permanent Tehsil,Police Stn','trim|required');
               $this->form_validation->set_rules('c_address_2','Current Tehsil,Police Stn','trim|required');
               $this->form_validation->set_rules('p_address_3','Permanent District','trim|required');
               $this->form_validation->set_rules('c_address_3','Current District','trim|required');
               $this->form_validation->set_rules('p_state_id','Permanent State','required');
               $this->form_validation->set_rules('c_state_id','Current State','required');
               $this->form_validation->set_rules('p_city_id','Permanent City','required');
               $this->form_validation->set_rules('c_city_id','Current City','required');
               $this->form_validation->set_rules('residing_since','Residing Since','trim|required');
               $this->form_validation->set_rules('tel_nos','Telephone Number','trim|required');
               //$this->form_validation->set_rules('dispensery','Dispensery','trim|required');
               // $this->form_validation->set_rules('name[]','Family Name','trim|required');
               // $this->form_validation->set_rules('family_dob[]','Family DOB','required');
               // $this->form_validation->set_rules('family_age[]','Age','required');
               // $this->form_validation->set_rules('aadhaar_no[]','Adhaar Number','required');
               // $this->form_validation->set_rules('relation[]','Family Relation','trim|required');
               // $this->form_validation->set_rules('with_fam[]','With Family','trim|required');
               // $this->form_validation->set_rules('pf_name[]','PF Name','trim|required');
               // $this->form_validation->set_rules('pf_family_dob[]','PF Family DOB','required');
               // $this->form_validation->set_rules('pf_relation[]','PF Family Relation','trim|required');

         if ($this->form_validation->run() == TRUE){
                $job_type = $this->input->post('job_type');
                $company_branch_id = $this->input->post('company_branch_id');
                $desig_id = $this->input->post('desig_id');
                $fname = $this->input->post('fname');
                $lname = $this->input->post('lname');
                $old_code = $this->input->post('old_code');
                $father_name = $this->input->post('father_name');
                $old_name = $this->input->post('old_name');
                $mother_name = $this->input->post('mother_name');
                $army_no = $this->input->post('army_no');
                $spouse_name = $this->input->post('spouse_name');
                $rank = $this->input->post('rank');
                $birth_place = $this->input->post('birth_place');
                $chest = $this->input->post('chest');
                $dob = $this->input->post('dob');
                $height = $this->input->post('height');
                $weight = $this->input->post('weight');
                $pf_no = $this->input->post('pf_no');
                $hair_color = $this->input->post('hair_color');
                $eye_color = $this->input->post('eye_color');
                $esi_no = $this->input->post('esi_no');
                $sex = $this->input->post('sex');
                $blood_group_id = $this->input->post('blood_group_id');
                $marital_status = $this->input->post('marital_status');
                $doj = $this->input->post('doj');
                $complexion = $this->input->post('complexion');
                $doa = $this->input->post('doa');
                $dol = $this->input->post('dol');
                $uan = $this->input->post('uan');
                $id_mark = $this->input->post('id_mark');
                $language = $this->input->post('language');
                $caste = $this->input->post('caste');
                $religion = $this->input->post('religion');
                $tenure_date_1 = $this->input->post('tenure_date_1');
                $tenure_date_2 = $this->input->post('tenure_date_2');
                $nationality = $this->input->post('nationality');
                $nomminee_name = $this->input->post('nomminee_name');
                $age = $this->input->post('age');
                $bank_name = $this->input->post('bank_name');
                $account_number = $this->input->post('account_number');
                $aadhaar_number = $this->input->post('aadhaar_number');
                $ifsc_code = $this->input->post('ifsc_code');
                $p_address_1 = $this->input->post('p_address_1');
                $c_address_1 = $this->input->post('c_address_1');
                $p_address_2 = $this->input->post('p_address_2');
                $c_address_2 = $this->input->post('c_address_2');
                $p_address_3 = $this->input->post('p_address_3');
                $c_address_3 = $this->input->post('c_address_3');
                $p_state_id = $this->input->post('p_state_id');
                $c_state_id = $this->input->post('c_state_id');
                $p_city_id = $this->input->post('p_city_id');
                $c_city_id = $this->input->post('c_city_id');
                $residing_since = $this->input->post('residing_since');
                $tel_nos = $this->input->post('tel_nos');
                $dispensery = $this->input->post('dispensery');
                $background_check = $this->input->post('background_check');
                $notes = $this->input->post('note');
                
                $name = $this->input->post('name');
                // $family_dob = date('Y-m-d', strtotime($this->input->post('family_dob'))) ;
                $family_dob = $this->input->post('family_dob');
                $family_age = $this->input->post('family_age');
                $aadhaar_no = $this->input->post('aadhaar_no');
                $relation = $this->input->post('relation');
                $with_fam = $this->input->post('with_fam');
                // $pf_name = $this->input->post('pf_name');
                // $pf_family_dob = $this->input->post('pf_family_dob');
                // $pf_relation = $this->input->post('pf_relation');
                $employee_id = $this->input->post('employee_id');
                $family_id = $this->input->post('family_id');
                //$pf_id = $this->input->post('pf_id');
                //echo $image = $this->input->post('photo');die;
//print_r($family_dob);die;
                //image upload
                if (isset($_FILES)) {
                $uploaded_files  = "";
                $config['upload_path']          = './uploads/employee/';
                $config['allowed_types']        = 'jpg|png|jpeg'; 
                $this->load->library('upload', $config);
                //print_r($config);die;
                if ( $this->upload->do_upload('photo'))
                {
                    //echo "abc";die;
                  $uploaded_files = $this->upload->file_name;
                  //echo "aa";
                  }
                 }
                 if (empty($_FILES['photo']['name'])) {
                    $uploaded_files = $data['edit_employee'][0]->employee_image;
                  }
                  
                $action = $this->input->post('action');
				
                 $qry = $this->em->UpdateEmployee($job_type,$company_branch_id,$desig_id,$fname,$lname,$old_code,$father_name,$old_name,$mother_name,$army_no,$spouse_name,$rank,$birth_place,$chest,$dob,$height,$weight,$pf_no,$hair_color,$eye_color,$esi_no,$sex,$blood_group_id,$marital_status,$doj,$complexion,$doa,$dol,$uan,$id_mark,$language,$caste,$religion,$tenure_date_1,$tenure_date_2,$nationality,$nomminee_name,$age,$bank_name,$account_number,$aadhaar_number,$ifsc_code,$p_address_1,$c_address_1,$p_address_2,$c_address_2,$p_address_3,$c_address_3,$p_state_id,$c_state_id,$p_city_id,$c_city_id,$residing_since,$tel_nos,$dispensery,$background_check,$notes,$name,$family_dob,$family_age,$aadhaar_no,$relation,$with_fam,$uploaded_files,$user_branch_id,$employee_id,$family_id, $action);
                if($qry)
                {
                    $this->session->set_flashdata('msg', 'Data Saved Successfully');
                    redirect(base_url().'employee/edit/'.$employee_id);
                }
            }
            else
            {
            	if(!empty($this->input->post('family_id'))){
            		$family_id_obj = $this->input->post('family_id');
            		$data['employee']['family_id'] = $family_id_obj;
            	}
                if(!empty($this->input->post('name')))
                {
                    $name_obj = $this->input->post('name');
                    $data['employee']['name'] = $name_obj;
                }

                if(!empty($this->input->post('family_dob')))
                {
                    $family_dob_obj = $this->input->post('family_dob');
                    $data['employee']['family_dob'] = $family_dob_obj;
                }

                if(!empty($this->input->post('family_age')))
                {
                    $family_age_obj = $this->input->post('family_age');
                    $data['employee']['family_age'] = $family_age_obj;
                }

                if(!empty($this->input->post('aadhaar_no')))
                {
                    $family_aadhar_obj = $this->input->post('aadhaar_no');
                    $data['employee']['aadhaar_no'] = $family_aadhar_obj;
                }

                if(!empty($this->input->post('relation')))
                {
                    $relation_obj = $this->input->post('relation');
                    $data['employee']['relation'] = $relation_obj;
                    //print_r($relation_obj); exit();
                }

                if(!empty($this->input->post('with_fam')))
                {
                    $with_fam_obj = $this->input->post('with_fam');
                    $data['employee']['with_fam'] = $with_fam_obj;
                }

                //  if(!empty($this->input->post('pf_id')))
                // {
                //     $pf_id_obj = $this->input->post('pf_id');
                //     $data['employee_pf']['pf_id'] = $pf_id_obj;
                // }

                // if(!empty($this->input->post('pf_name')))
                // {
                //     $pf_name_obj = $this->input->post('pf_name');
                //     $data['employee_pf']['pf_name'] = $pf_name_obj;
                // }

                // if(!empty($this->input->post('pf_family_dob')))
                // {
                //     $pf_family_dob_obj = $this->input->post('pf_family_dob');
                //     $data['employee_pf']['pf_family_dob'] = $pf_family_dob_obj;
                // }

                // if(!empty($this->input->post('pf_relation')))
                // {
                //     $pf_relation_obj = $this->input->post('pf_relation');
                //     $data['employee_pf']['pf_relation'] = $pf_relation_obj;
                // }

                //print_r($data['employee_pf']);die;

                $this->template->write('title', 'Dashboard', TRUE);
                $this->template->add_js('assets/js/select2.min.js');
                $this->template->add_js('assets/js/bootstrap-select.js');
                $this->template->add_js('assets/js/bootstrap-datepicker.min.js');

                $this->template->add_css('assets/css/datepicker.css');
                $this->template->add_css('assets/css/select2.css');
                $this->template->add_css('assets/css/bootstrap-select.css');


                $this->template->write_view('content', 'edit_employee', $data, TRUE);
                $this->template->render();
            }
       }
		
		$data['action_type'] = 'edit';
		$data['mode'] = 'editable';
		//print_r($data['edit_employee'][0]); exit();
		if($data['edit_employee'][0]->submit_for_approval == 1 && $data['edit_employee'][0]->approval_status == 'I'){
			$data['mode'] = 'readonly';
		}
		
		$data['others_info'] = $this->em->employee_others_info_check($data['edit_employee'][0]->employee_id);

        $this->template->write('title', 'Dashboard', TRUE);
        $this->template->add_js('assets/js/select2.min.js');
        $this->template->add_js('assets/js/bootstrap-select.js');
        $this->template->add_js('assets/js/bootstrap-datepicker.min.js');
            
        $this->template->add_css('assets/css/select2.css');
        $this->template->add_css('assets/css/bootstrap-select.css');
        $this->template->add_css('assets/css/datepicker.css');
        $this->template->write_view('content', 'edit_employee', $data, TRUE);
        $this->template->render();  
    }
	
	
	
	public function approve($id = null) {
      $data['edit_employee'] = $this->em->editEmployee($id);
      $data['edit_family'] = $this->em->editFamily($id);
      $data['edit_family_pf'] = $this->em->editFamilyPf($id);
      $user_branch_id = $this->session->userdata('user_branch_id');
      $data['user_branch_id'] = $user_branch_id;
      $data['company_branch'] = $this->em->getCompanyBranchName($user_branch_id);
	  
	  $check_approval_permission = $this->em->checkApprovalPermission($this->session->employee_id);
	  $data['approval_permission'] = $check_approval_permission->cnt;

    	$branch_obj = $this->em->get_all_branch();
        foreach($branch_obj as $branch){
            $branch_list[$branch->company_branch_id] = $branch->branch_name;
        }
        $data['branch'] = $branch_list;

        $gender_obj = $this->em->get_gender();
        foreach($gender_obj as $gender){
            $gender_list[$gender->lookup_id] = $gender->lookup_desc;
        }
        $data['gender'] = $gender_list;

     	$desig_obj = $this->em->get_all_desig();
        foreach($desig_obj as $desig){
            $desig_list[$desig->desig_id] = $desig->desig_name;
        }
        $data['desig'] = $desig_list;
    
        $state_obj = $this->cm->get_all_state();
        $state_list = array('' => 'Select State');
        foreach($state_obj as $state){
            $state_list[$state->state_id] = $state->state_name;
        }
        $data['state'] = $state_list;
        $p_city_list = array('' => 'Select City');

        $p_state_id = ($data['edit_employee'][0]->p_state_id);
        $c_state_id = ($data['edit_employee'][0]->c_state_id);
        //echo $state_id;die;
    
        if(!empty($this->input->post('p_state_id'))){
            $p_city_obj = $this->cm->getCity($this->input->post('p_state_id'));

           foreach($p_city_obj as $p_city){
                $p_city_list[$p_city['city_id']] = $p_city['city_name'];
            }
            

        }

        else
        {
            $p_city_obj = $this->cm->get_city($p_state_id);
            
           foreach($p_city_obj as $p_city){
                $p_city_list[$p_city->city_id] = $p_city->city_name;
            }
        }

        $data['p_city'] = $p_city_list;

        $c_city_list = array('' => 'Select City');
    
        if(!empty($this->input->post('c_state_id'))){
            $c_city_obj = $this->cm->getCity($this->input->post('c_state_id'));

           foreach($c_city_obj as $c_city){
                $c_city_list[$c_city['city_id']] = $c_city['city_name'];
            }
            

        }

        else
        {
            $c_city_obj = $this->cm->get_city($c_state_id);
            
           foreach($c_city_obj as $c_city){
                $c_city_list[$c_city->city_id] = $c_city->city_name;
            }
        }


        $data['c_city'] = $c_city_list;

        $bld_grp_obj = $this->em->get_blood_grp();
        foreach($bld_grp_obj as $bld_grp){
            $bld_grp_list[$bld_grp->lookup_id] = $bld_grp->lookup_desc;
        }
        $data['bld_grp'] = $bld_grp_list;

        $marrital_status_obj = $this->em->get_marrital_status();
        foreach($marrital_status_obj as $mstatus){
            $marrital_status_list[$mstatus->lookup_id] = $mstatus->lookup_desc;
        }
        $data['marrital_status'] = $marrital_status_list;

        $relation_obj = $this->em->get_relation();
        foreach($relation_obj as $relation){
            $relation_list[$relation->lookup_id] = $relation->lookup_desc;
            
        }

        $data['relation'] = $relation_list;
		
		if(!empty($this->input->post())){
			$this->load->library("security");
			//exit($this->input->post('action'));
			$this->form_validation->set_rules('approval_remarks','Approve/ Reject Remarks','trim|required');
			if ($this->form_validation->run() == TRUE){
				$employee_id = $this->input->post('employee_id');
				$approval_remarks = $this->input->post('approval_remarks');
				$action = $this->input->post('action');
				//exit($action);
				
				$qry = $this->em->updateEmployeeApproval($employee_id, $approval_remarks, $action);
				if($qry) {
					$this->session->set_flashdata('msg', 'Successfully Updated');
					redirect(base_url().'employee/approve/'.$employee_id);
				}
			}
        }
		
		$data['action_type'] = 'approve';
		$data['mode'] = 'editable';
		//print_r($data['edit_employee'][0]); exit();
		if($data['edit_employee'][0]->submit_for_approval == 1 && $data['edit_employee'][0]->approval_status == 'I'){
			$data['mode'] = 'readonly';
		}
		
		$data['others_info'] = $this->em->employee_others_info_check($data['edit_employee'][0]->employee_id);

        $this->template->write('title', 'Dashboard', TRUE);
        $this->template->add_js('assets/js/select2.min.js');
        $this->template->add_js('assets/js/bootstrap-select.js');
        $this->template->add_js('assets/js/bootstrap-datepicker.min.js');
            
        $this->template->add_css('assets/css/select2.css');
        $this->template->add_css('assets/css/bootstrap-select.css');
        $this->template->add_css('assets/css/datepicker.css');
        $this->template->write_view('content', 'edit_employee', $data, TRUE);
        $this->template->render();  
    }
	
	

	public function client_name_check($str)
	{
			$str = $this->input->post('client_name');

			$client_id = NULL;
			if(!empty($this->input->post('client_id'))){
				$client_id = $this->input->post('client_id');
			}

			$check = $this->cm->checkClient($str,$client_id);
			if($check)
			{
				$this->form_validation->set_message('client_name_check', 'The {field} field can not be the word ' . $str);
				return FALSE;
			}
			else
			{
				return TRUE;
			}
	}

    public function declaration($id = NULL){
        
        $data['declaration'] = $this->em->declaration($id);
		$this->load->view('declaration', $data);
    
	}

    public function print(){
        $data=$this->session->userdata('print_data');
        $this->load->view('printer',$data);
    }
    public function appointment_letter($id = NULL){
        
        $data['appointment_letter'] = $this->em->appointment_letter($id);
		$this->load->view('appointment_letter', $data);
    
	}

    public function appointment_letter_pdf($id = NULL){
        $data['appointment_letter'] = $this->em->appointment_letter($id);
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('appointment_letter_pdf',$data,true);
        $mpdf->WriteHTML($html);
        // $mpdf->Output(); // opens in browser
        $mpdf->Output('appointment_letter.pdf','D'); // it downloads the file into the user system, with give name

    }
	
    Public function confidentiality_declaration_pdf($id = NULL)
    {
        $data['confidentiality_declaration'] = $this->em->confidentiality_declaration($id);
		
		  $mpdf = new \Mpdf\Mpdf();
		  $html = $this->load->view('confidentiality_declaration_pdf',$data,true);
		  $mpdf->WriteHTML($html);
		  //$mpdf->Output(); // opens in browser
		  $mpdf->Output('confidentiality_declaration.pdf','D'); // it downloads the file into the user system, with give name
		
    }
	
	Public function confidentiality_declaration($id = NULL)
    {
        $data['confidentiality_declaration'] = $this->em->confidentiality_declaration($id);
		$this->load->view('confidentiality_declaration', $data);
    }

    Public function home_verification($id = NULL)
    {
        $data['home_verif'] = $this->em->home_verif($id);
		$this->load->view('home_verification', $data);
    }
	
	Public function home_verification_pdf($id = NULL)
    {
		//print_r ($id);
		  $data['home_verif'] = $this->em->home_verif($id);
		  
		  $mpdf = new \Mpdf\Mpdf();
		  $html = $this->load->view('home_verification_pdf',$data,true);
		  $mpdf->WriteHTML($html);
		  //$mpdf->Output(); // opens in browser
		  $mpdf->Output('home_verification.pdf','D'); // it downloads the file into the user system, with give name
	 
    }

    Public function training_certificate($id = NULL)
    {
        $data['training_certificate'] = $this->em->training_certificate($id);
		$this->load->view('training_certificate', $data);
    }

    Public function training_certificate_pdf($id = NULL)
    {
		//print_r ($id);
		  $data['training_certificate'] = $this->em->training_certificate($id);
		  
		  $mpdf = new \Mpdf\Mpdf();
		  $html = $this->load->view('training_certificate_pdf',$data,true);
		  $mpdf->WriteHTML($html);
		//   $mpdf->Output(); // opens in browser
		  $mpdf->Output('training_certificate.pdf','D'); // it downloads the file into the user system, with give name
	 
    }


    public function personal_declaration($id = NULL){
        
        $data['personal_declaration'] = $this->em->personal_declaration($id);
		$this->load->view('personal_declaration', $data);
    
	}

    Public function personal_declaration_pdf($id = NULL)
    {
		//print_r ($id);
		  $data['personal_declaration'] = $this->em->personal_declaration($id);
		  
		  $mpdf = new \Mpdf\Mpdf();
		  $html = $this->load->view('personal_declaration_pdf',$data,true);
		  $mpdf->WriteHTML($html);
		//   $mpdf->Output(); // opens in browser
		  $mpdf->Output('personal_declaration.pdf','D'); // it downloads the file into the user system, with give name
	 
    }
	
	public function employment_card($id = NULL){
        
        $data['empCard'] = $this->em->empCard($id);
		//print_r($data);exit;
		$this->load->view('employment_card', $data);
    
	}

    public function penalty_clause($id = NULL){
        
        $data['penalty_clause'] = $this->em->penalty_clause($id);
		//print_r($data);exit;
		$this->load->view('penalty_clause', $data);
    
	}
	
    public function penalty_clause_pdf($id = NULL){
        $data['penalty_clause'] = $this->em->penalty_clause($id);
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('penalty_clause_pdf',$data,true);
        $mpdf->WriteHTML($html);
        // $mpdf->Output(); // opens in browser
        $mpdf->Output('penalty_clause.pdf','D'); // it downloads the file into the user system, with give name

    }

    public function service_certificate($id = NULL){
        
        $data['service_certificate'] = $this->em->service_certificate($id);
		//print_r($data);exit;
		$this->load->view('service_certificate', $data);
    
	}

    public function service_certificate_pdf($id = NULL){
        $data['service_certificate'] = $this->em->service_certificate($id);
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('service_certificate_pdf',$data,true);
        $mpdf->WriteHTML($html);
        // $mpdf->Output(); // opens in browser
        $mpdf->Output('service_certificate.pdf','D'); // it downloads the file into the user system, with give name

    }
    public function biodata($id = NULL){
        
        $data['biodata'] = $this->em->biodata($id);
		//print_r($data);exit;
		$this->load->view('biodata', $data);
    
	}

    public function biodata_pdf($id = NULL){
        
        $data['biodata'] = $this->em->biodata($id);
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('biodata',$data,true);
        $html = $this->load->view('biodata_pdf',$data,true);
        $mpdf->WriteHTML($html);
        // $mpdf->Output(); // opens in browser
        $mpdf->Output('biodata.pdf','D'); // it downloads the file into the user system, with give name
    
	}


	public function employment_card_pdf($id = NULL)
	 {
		 //print_r ($id);
		  $data['empCard'] = $this->em->empCard($id);
		  
		  $mpdf = new \Mpdf\Mpdf();
		  $html = $this->load->view('employment_card_pdf',$data,true);
		  $mpdf->WriteHTML($html);
		  //$mpdf->Output(); // opens in browser
		  $mpdf->Output('employment_card.pdf','D'); // it downloads the file into the user system, with give name
	 }
	 
	 public function epf($id = NULL){
        
        $data['header'] = $this->em->epf_header($id);
        $data['detail'] = $this->em->epf_family($id);
        $data['f_detail'] = $this->em->epf_family($id);
		//print_r($data['detail']);exit;
		$this->load->view('epf', $data);
    
	}
	
	public function epf_pdf($id = NULL)
	 {
		 //print_r ($id);
		 $data['header'] = $this->em->epf_header($id);
         $data['detail'] = $this->em->epf_family($id);
         $data['f_detail'] = $this->em->epf_family($id);
		  
		  $mpdf = new \Mpdf\Mpdf();
		  $html = $this->load->view('epf_pdf',$data,true);
		  $mpdf->WriteHTML($html);
		//   $mpdf->Output(); // opens in browser
		  $mpdf->Output('epf.pdf','D'); // it downloads the file into the user system, with give name
	 }
	 
	 public function pf($id = NULL){
        
        $data['pf'] = $this->em->pf($id);
		//print_r($data);exit;
		$this->load->view('pf', $data);
    
	}
	
	public function pf_pdf($id = NULL)
	 {
          $data['pf'] = $this->em->pf($id);
          $mpdf = new \Mpdf\Mpdf();
          $html = $this->load->view('pf',$data,true);
          $html = $this->load->view('pf_pdf',$data,true);
          $mpdf->WriteHTML($html);
        //   $mpdf->Output(); // opens in browser
          $mpdf->Output('pf.pdf','D'); // it downloads the file into the user system, with give name
	 }
	 
	 public function view_list($id = NULL){
		 $data['employee_id'] = $id;
    
			$this->template->write('title', 'Employee', TRUE);
			
			$this->template->add_css('assets/css/dataTables.bootstrap4.min.css');

			$this->template->add_js('assets/js/jquery.dataTables.min.js');
			$this->template->add_js('assets/js/dataTables.bootstrap4.min.js');
			$this->template->add_js('assets/js/bootstrap-select.js');
				
				//print_r ($id); exit;
			$this->template->write_view('content', 'view_list', $data, TRUE);
			$this->template->render();
	 }
  
}

?>
