<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch extends MY_Controller 
{

	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		$this->load->model('branch_model','bm');		  
		$this->load->model('client/client_model','cm');
		
		
		$this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->form_validation->CI =& $this;
	}
	
	public function index()
	
	{	
		//$url_client_id = $this->uri->segment(3);
		//$data['list'] = $this->bm->get_all_bank($url_client_id);
		redirect('branch/add');
	}
	
	

	public function add(){ 
		$url_client_id = $this->uri->segment(3);
		$data['client_id'] = $url_client_id;
		$data['client'] = $this->cm->getClientName($url_client_id);
		
		//print_r($data['client']); exit();
		if($data['client']->location_type == 'S'){
			$branch_id = $this->bm->getBranchId($url_client_id);
			if(!empty($branch_id->branch_id)){
				redirect('branch/edit/'.$url_client_id.'/'.$branch_id->branch_id, 'refresh');
			}
		}
		
		$data['mode'] = 'editable';
		if($data['client']->submit_for_approval == 1){
			$data['mode'] = 'readonly';
		}
		
		if(!empty($this->input->post())){
			 
             $this->form_validation->set_rules('address_line_1','Address Line 1','trim|required');
             $this->form_validation->set_rules('branch_name','Branch Name','required|callback_branch_name_check');
             //$this->form_validation->set_rules('app_by','Approved By','required');
             //$this->form_validation->set_rules('fax','Fax','required|numeric');
             $this->form_validation->set_rules('cont_no','Contact No','required|numeric');
             $this->form_validation->set_rules('state_id','State Name','required');
             $this->form_validation->set_rules('client_email','Client Email','required');
             $this->form_validation->set_rules('city_id','City Name','required');
             //$this->form_validation->set_rules('sole_id','TSole ID','trim|required');
             //$this->form_validation->set_rules('pincode','Pin Code','required|numeric');
             //$this->form_validation->set_rules('name[]','Contact Name','trim|required');
             //$this->form_validation->set_rules('designation[]','Contact Designation','trim|required');
             //$this->form_validation->set_rules('contact_no[]','Contact Phone Number','trim|required|numeric');
             //$this->form_validation->set_rules('email[]','Contact Email','trim|required');
             //$this->form_validation->set_rules('birthday[]','Contact Birthday','trim|required');
             //$this->form_validation->set_rules('anniversary[]','Contact Anniversary','trim|required'); 
             $this->form_validation->set_rules('branch_code','Branch Code','required');
             $this->form_validation->set_rules('branch_category_id','Branch Category Id','required');
            if ($this->form_validation->run() == TRUE)
             { 
                $company_branch = $this->input->post('company_branch');
                $client_id = $this->input->post('client_id');
				//$client_id = 1;
                $address_line_1 = $this->input->post('address_line_1');
                $branch_name = $this->input->post('branch_name');
                $address_line_2 = $this->input->post('address_line_2');
                $fax = $this->input->post('fax');
                $address_line_3 = $this->input->post('address_line_3');
                $cont_no = $this->input->post('cont_no');
                $state_id = $this->input->post('state_id');
                $client_email = $this->input->post('client_email');
                $city_id = $this->input->post('city_id');
                $sole_id = $this->input->post('sole_id');
                $pincode = $this->input->post('pincode');
                $app_by = $this->input->post('app_by');
                
                $name = $this->input->post('name');
                $designation = $this->input->post('designation');
                $contact_no = $this->input->post('contact_no');
                $email = $this->input->post('email');
                $birthday = $this->input->post('birthday');
                $anniversary = $this->input->post('anniversary');
                $remarks = $this->input->post('remarks');
                $branch_code = $this->input->post('branch_code');
                $branch_category_id = $this->input->post('branch_category_id');
                // $new_birthday = date("Y-m-d", strtotime($birthday));
                 //print_r($client_id);die;
                
                $this->bm->insertBranch($company_branch,$client_id,$address_line_1,$branch_name,$address_line_2,$fax,$address_line_3,$cont_no,$state_id,$client_email,$city_id,$sole_id,$pincode,$app_by,$name,$designation,$contact_no,$email,$birthday,$anniversary,$remarks,$branch_code,$branch_category_id);
                redirect('branch/add/'.$url_client_id, 'refresh');
             }
             else{
                 if(!empty($this->input->post('name')))
                {
                    $name_obj = $this->input->post('name');
                    $data['client_contact']['name'] = $name_obj;
                }

                if(!empty($this->input->post('designation')))
                {
                    $designation_obj = $this->input->post('designation');
                    $data['client_contact']['designation'] = $designation_obj;
                }

                if(!empty($this->input->post('contact_no')))
                {
                    $contact_no_obj = $this->input->post('contact_no');
                    $data['client_contact']['contact_no'] = $contact_no_obj;
                }

                if(!empty($this->input->post('email')))
                {
                    $email_obj = $this->input->post('email');
                    $data['client_contact']['email'] = $email_obj;
                }

                if(!empty($this->input->post('birthday')))
                {
                    $birthday_obj = $this->input->post('birthday');
                    $data['client_contact']['birthday'] = $birthday_obj;
                }

                if(!empty($this->input->post('anniversary')))
                {
                    $anniversary_obj = $this->input->post('anniversary');
                    $data['client_contact']['anniversary'] = $anniversary_obj;
                }

                if(!empty($this->input->post('company_branch')))
                {
                    $company_branch = $this->input->post('company_branch');
                    $data['client_contact']['company_branch'] = $company_branch;
                }
				
				$this->template->write('title', 'Dashboard', TRUE);
				$this->template->add_js('assets/js/select2.min.js');
				$this->template->add_js('assets/js/bootstrap-select.js');
				$this->template->add_js('assets/js/bootstrap-datepicker.min.js');
                $this->template->add_js('assets/js/jquery.dataTables.min.js');
                $this->template->add_js('assets/js/dataTables.bootstrap4.min.js');

				$this->template->add_css('assets/css/datepicker.css');
				$this->template->add_css('assets/css/select2.css');
				$this->template->add_css('assets/css/bootstrap-select.css');
                $this->template->add_css('assets/css/dataTables.bootstrap4.min.css');
				$this->template->write_view('content', 'add_branch', $data, TRUE);
				$this->template->render();
             }
		}
		
		//pr($data);
		$data['list'] = $this->bm->get_all_bank($url_client_id);
		//$client_id  = $this->input->post('client_id');
		//print_r($data);die;
		
		//$data['state'] = $this->bm->get_all_state();
		$state_obj = $this->cm->get_all_state();
        
        $state_list = array('' => 'Select State');
        foreach($state_obj as $state){
            $state_list[$state->state_id] = $state->state_name;
        }
        $data['state'] = $state_list;
        $city_list = array('' => 'Select City');
		
        if(!empty($this->input->post('state_id'))){
            $city_obj = $this->cm->getCity($this->input->post('state_id'));

           foreach($city_obj as $city){
                $city_list[$city['city_id']] = $city['city_name'];
            }
            

        }

        $data['city'] = $city_list;

        $branch_category_obj = $this->bm->get_all_branch_category();
        $branch_category_list = array('' => 'Select branch category');
        foreach($branch_category_obj as $branch_row){
            $branch_category_list[$branch_row['lookup_id']] = $branch_row['lookup_desc'];
        }
        $data['branch_category'] = $branch_category_list;

        $data['branch_code']= $this->bm->getBranchCode();
        $data['company_branch'] = $this->bm->getCompanyBranch();
		//pr($data);
		$this->template->write('title', 'Dashboard', TRUE);
		$this->template->add_js('assets/js/select2.min.js');
        $this->template->add_js('assets/js/bootstrap-select.js');
		$this->template->add_js('assets/js/bootstrap-datepicker.min.js');
        $this->template->add_js('assets/js/jquery.dataTables.min.js');
        $this->template->add_js('assets/js/dataTables.bootstrap4.min.js');

        $this->template->add_css('assets/css/datepicker.css');
		$this->template->add_css('assets/css/select2.css');
        $this->template->add_css('assets/css/bootstrap-select.css');
        $this->template->add_css('assets/css/dataTables.bootstrap4.min.css');
        $this->template->write_view('content', 'add_branch', $data, TRUE);
        $this->template->render();
	}

	public function city_list(){
		$state_id = $this->input->post('state_id');
		//print_r($state_id);exit;
		$data['city_list'] = $this->bm->getCity($state_id);
		echo json_encode(array('city_list' => $data['city_list'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}

   
        public function branch_name_check($str)
        {
                //$str = $this->input->post('state_code');				
                		//print_r($str);exit;
				$client_id = NULL;
                if(!empty($this->input->post('client_id'))){
                    $client_id = $this->input->post('client_id');
                }
				
                $check = $this->bm->checkBranchName($str,$client_id);
				//print_r($check); exit;
                if($check)
                {
                	$this->form_validation->set_message('branch_name_check', 'The {field} field can not be the word ' . $str);
                       return FALSE;
                }
                else
                {
                	return TRUE;
                }
        }
		
		
		public function edit(){
        $data = [];
		$url_client_id = $this->uri->segment(3);
		$url_branch_id = $this->uri->segment(4);
		//print_r($url_branch_id);exit;
		
		
		
		
		//print_r($data['edit_branch_contact']); exit;
		if(!empty($this->input->post())){
			
             $this->form_validation->set_rules('address_line_1','Address Line 1','trim|required');
			 //$this->form_validation->set_rules('app_by','Approved By','required');
             $this->form_validation->set_rules('branch_name','Branch Name','required');
             //$this->form_validation->set_rules('fax','Fax','required|numeric');
             $this->form_validation->set_rules('cont_no','Contact No','required|numeric');
             $this->form_validation->set_rules('state_id','State Name','required');
             $this->form_validation->set_rules('client_email','Client Email','required');
             $this->form_validation->set_rules('city_id','City Name','required');
             //$this->form_validation->set_rules('sole_id','TSole ID','trim|required');
             //$this->form_validation->set_rules('pincode','Pin Code','required|numeric');
             //$this->form_validation->set_rules('name[]','Contact Name','trim|required');
             //$this->form_validation->set_rules('designation[]','Contact Designation','trim|required');
             //$this->form_validation->set_rules('contact_no[]','Contact Phone Number','trim|required|numeric');
            // $this->form_validation->set_rules('email[]','Contact Email','trim|required');
             //$this->form_validation->set_rules('birthday[]','Contact Birthday','trim|required');
             //$this->form_validation->set_rules('anniversary[]','Contact Anniversary','trim|required'); 
             $this->form_validation->set_rules('branch_code','Branch Code','required');
             $this->form_validation->set_rules('branch_category_id','Branch Category Id','required');
            if ($this->form_validation->run() == TRUE)
             {
                $company_branch = $this->input->post('company_branch');
			
                $client_id = $this->input->post('client_id');
                $branch_id = $this->input->post('branch_id');
				//$client_id = 1;
                $address_line_1 = $this->input->post('address_line_1');
                $branch_name = $this->input->post('branch_name');
                $address_line_2 = $this->input->post('address_line_2');
                $fax = $this->input->post('fax');
                $address_line_3 = $this->input->post('address_line_3');
                $cont_no = $this->input->post('cont_no');
                $state_id = $this->input->post('state_id');
                $client_email = $this->input->post('client_email');
                $city_id = $this->input->post('city_id');
                $sole_id = $this->input->post('sole_id');
                $pincode = $this->input->post('pincode');
                $app_by = $this->input->post('app_by');
                
                $detail_id = $this->input->post('contact_id');
                $name = $this->input->post('name');
                $designation = $this->input->post('designation');
                $contact_no = $this->input->post('contact_no');
                $email = $this->input->post('email');
                $birthday = $this->input->post('birthday');
                $anniversary = $this->input->post('anniversary');
                $remarks = $this->input->post('remarks');
                $branch_code = $this->input->post('branch_code');
                $branch_category_id = $this->input->post('branch_category_id');

				
				//print_r($detail_id);exit;
				$this->bm->updateBranch($company_branch,$client_id,$branch_id,$detail_id,$address_line_1,$branch_name,$address_line_2,$fax,$address_line_3,$cont_no,$state_id,$client_email,$city_id,$sole_id,$pincode,$app_by,$name,$designation,$contact_no,$email,$birthday,$anniversary,$remarks,$branch_category_id);
				
				redirect('branch/add/'.$url_client_id, 'refresh');
			 }
				else{
					if(!empty($this->input->post('name')))
                {
                    $name_obj = $this->input->post('name');
                    $data['client_contact']['name'] = $name_obj;
                }

                if(!empty($this->input->post('designation')))
                {
                    $designation_obj = $this->input->post('designation');
                    $data['client_contact']['designation'] = $designation_obj;
                }

                if(!empty($this->input->post('contact_no')))
                {
                    $contact_no_obj = $this->input->post('contact_no');
                    $data['client_contact']['contact_no'] = $contact_no_obj;
                }

                if(!empty($this->input->post('email')))
                {
                    $email_obj = $this->input->post('email');
                    $data['client_contact']['email'] = $email_obj;
                }

                if(!empty($this->input->post('birthday')))
                {
                    $birthday_obj = $this->input->post('birthday');
                    $data['client_contact']['birthday'] = $birthday_obj;
                }

                if(!empty($this->input->post('anniversary')))
                {
                    $anniversary_obj = $this->input->post('anniversary');
                    $data['client_contact']['anniversary'] = $anniversary_obj;
                }

                if(!empty($this->input->post('contact_id')))
                {
                    $contact_id_obj = $this->input->post('contact_id');
                    $data['client_contact']['contact_id'] = $contact_id_obj;
                }
                if(!empty($this->input->post('company_branch')))
                {
                    $company_branch = $this->input->post('company_branch');
                    $data['client_contact']['company_branch'] = $company_branch;
                }

				$this->template->write('title', 'Dashboard', TRUE);
				$this->template->add_js('assets/js/select2.min.js');
				$this->template->add_js('assets/js/bootstrap-select.js');
				$this->template->add_js('assets/js/bootstrap-datepicker.min.js');
                $this->template->add_js('assets/js/jquery.dataTables.min.js');
                $this->template->add_js('assets/js/dataTables.bootstrap4.min.js');
				
				$this->template->add_css('assets/css/datepicker.css');
				$this->template->add_css('assets/css/select2.css');
				$this->template->add_css('assets/css/bootstrap-select.css');
                $this->template->add_css('assets/css/dataTables.bootstrap4.min.css');
				$this->template->write_view('content', 'edit_branch', $data, TRUE);
				$this->template->render();
				
				}
		}
		
		$data['client'] = $this->bm->ClientName($url_client_id);
		$data['type'] = $this->bm->Clienttype($url_client_id);
		
		$data['mode'] = 'editable';
		if($data['client']->submit_for_approval == 1){
			$data['mode'] = 'readonly';
		}
		
		
		$data['list'] = $this->bm->get_all_bank($url_client_id);
		$data['clientedit'] = $this->bm->get_branch_edit($url_client_id,$url_branch_id);
		$data['edit_branch_contact'] = $this->bm->editBranchContact($url_branch_id);
		//$client_id  = $this->input->post('client_id');
		//print_r($data['clientedit']);die;
		$state_obj = $this->cm->get_all_state();
        $state_list = array('' => 'Select State');
        foreach($state_obj as $state){
            $state_list[$state->state_id] = $state->state_name;
        }
		//print_r($state_list);exit;
        $data['state'] = $state_list;
		
		$city_list = array('' => 'Select City');
		
		$state_id = ($data['clientedit']->state_id);
		 //echo $state_id; die;
        if(!empty($this->input->post('state_id'))){
            $city_obj = $this->cm->getCity($this->input->post('state_id'));

           foreach($city_obj as $city){
                $city_list[$city['city_id']] = $city['city_name'];
            }
            

        }
        else
        {
			//echo $state_id; die;
            $city_obj = $this->cm->get_city($state_id);
            
           foreach($city_obj as $city){
                $city_list[$city->city_id] = $city->city_name;
            }
        }


        $data['city'] = $city_list;

        $branch_category_obj = $this->bm->get_all_branch_category();
        $branch_category_list = array('' => 'Select branch category');
        foreach($branch_category_obj as $branch_row){
            $branch_category_list[$branch_row['lookup_id']] = $branch_row['lookup_desc'];
        }
        $data['branch_category'] = $branch_category_list;
        $data['company_branch'] = $this->bm->getCompanyBranch();
		
		//$data['state'] = $this->bm->get_all_state();
		//pr($data);
		$this->template->write('title', 'Dashboard', TRUE);
		$this->template->add_js('assets/js/select2.min.js');
        $this->template->add_js('assets/js/bootstrap-select.js');
		$this->template->add_js('assets/js/bootstrap-datepicker.min.js');
        $this->template->add_js('assets/js/jquery.dataTables.min.js');
        $this->template->add_js('assets/js/dataTables.bootstrap4.min.js');
		
		$this->template->add_css('assets/css/datepicker.css');
		$this->template->add_css('assets/css/select2.css');
        $this->template->add_css('assets/css/bootstrap-select.css');
        $this->template->add_css('assets/css/dataTables.bootstrap4.min.css');
        $this->template->write_view('content', 'edit_branch', $data, TRUE);
        $this->template->render();
	}
	
}


		
?>
