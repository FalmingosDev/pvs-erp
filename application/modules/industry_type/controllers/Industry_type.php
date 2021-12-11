<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Industry_Type extends MY_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		$this->load->model('industry_type_model');
		$this->load->library('form_validation');
		
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{

		if(check_uri_permission('industry_type', 'V') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        }

		$data['list'] = $this->industry_type_model->get_all_industry();
		
		//echo "<pre>"; print_r($list); echo "</pre>";
		//$this->load->view('welcome_message');
		
		$this->template->write('title', 'Industry Type', TRUE);
        /**
         * if you have any js to add for this page
         */
        
        
		$this->template->add_js('assets/js/jquery.dataTables.min.js');
        $this->template->add_js('assets/js/dataTables.bootstrap4.min.js');
        /**
         * if you have any css to add for this page
         */
        $this->template->add_css('assets/css/dataTables.bootstrap4.min.css');
        $this->template->write_view('content', 'list', $data, TRUE);
        $this->template->render();
	}
	
	public function change_status($id, $status){

		if(check_uri_permission('industry_type', 'D') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        }

		//print_r($status); exit;
		$this->industry_type_model->change_status($id,$status);
		redirect('industry_type','refresh');
	}
	
	public function add_industry_page(){

		if(check_uri_permission('industry_type', 'A') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        }
		//print_r('Partha'); exit;
		$this->template->write('title', 'Dashboard', TRUE);
		$this->template->write_view('content', 'add_industry', '', TRUE);
        $this->template->render();
		

	}
	
	
	public function addIndustry(){
			
		$this->form_validation->set_rules('industry_type_name','Industry Type Name','trim|required|callback_industry_type_name_check');
		$this->form_validation->set_rules('industry_type_short_name','Industry Type Short Name','trim|required|callback_industry_type_short_name_check');
		
		
		if ($this->form_validation->run() == TRUE){
				$industry_type_name  = $this->input->post('industry_type_name');
				$industry_type_short_name  = $this->input->post('industry_type_short_name');
				
				$this->industry_type_model->add_industry($industry_type_name,$industry_type_short_name);	
				redirect('industry_type','refresh');
				}
				
				else{
					$this->template->add_js('assets/js/jquery.uniform.js');
					$this->template->add_js('assets/js/select2.min.js');
					$this->template->add_js('assets/js/jquery.dataTables.min.js');
					
					
					$this->template->add_css('assets/css/uniform.css');
					$this->template->add_css('assets/css/select2.css');
					
					$this->template->write_view('content', 'add_industry', '', TRUE);
					$this->template->render();
				}
	}
	
	public function edit_industry_page(){

		            if(check_uri_permission('industry_type', 'E') == 0){
		            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
		            redirect(base_url());
		        }
					$this->template->add_js('assets/js/jquery.uniform.js');
					$this->template->add_js('assets/js/select2.min.js');
					$this->template->add_js('assets/js/jquery.dataTables.min.js');
					
					
					$this->template->add_css('assets/css/uniform.css');
					$this->template->add_css('assets/css/select2.css');
		
		
		$id = $this->uri->segment(3);
		
		//print_r($id); exit;
		$data['edit_industry'] = $this->industry_type_model->editindustry($id);		
		$this->template->write_view('content', 'edit_industry', $data, TRUE);
        $this->template->render();
		
	}
	
	public function edit_industry(){
		
		$this->form_validation->set_rules('industry_type_name','Industry Type Name','trim|required|callback_industry_type_name_check');
		$this->form_validation->set_rules('industry_type_short_name','Industry Type Short Name','trim|required|callback_industry_type_short_name_check');
		
		
		
		if ($this->form_validation->run() == TRUE){
				$industry_type_name  = $this->input->post('industry_type_name');
				$industry_type_short_name  = $this->input->post('industry_type_short_name');
				$industry_type_id  = $this->input->post('industry_type_id');
				//print_r($industry_type_id); exit;
				
					
				$this->industry_type_model->edit_industry($industry_type_name,$industry_type_short_name,$industry_type_id);
				redirect('industry_type','refresh');
		}
		else{
					$industry_type_id  = $this->input->post('industry_type_id');
					$data['edit_industry'] = $this->industry_type_model->editindustry($industry_type_id);
					
					$this->template->add_js('assets/js/jquery.uniform.js');
					$this->template->add_js('assets/js/select2.min.js');
					$this->template->add_js('assets/js/jquery.dataTables.min.js');
					
					
					$this->template->add_css('assets/css/uniform.css');
					$this->template->add_css('assets/css/select2.css');
					
					$this->template->write_view('content', 'edit_industry', $data, TRUE);
					$this->template->render();	
				}
		
		
	}
	
	public function industry_type_name_check($str)
        {
                $str = $this->input->post('industry_type_name');				
                		
				$industry_type_id = NULL;
                if(!empty($this->input->post('industry_type_id'))){
                    $industry_type_id = $this->input->post('industry_type_id');
                }
				//print_r($$industry_type_id); exit;
                $check = $this->industry_type_model->checkIndustry($str,$industry_type_id);
				//print_r($check); exit;
                if($check)
                {
                	$this->form_validation->set_message('industry_type_name_check', 'The {field} field can not be the word ' . $str);
					
                       return FALSE;
                }
                else
                {
                	return TRUE;
                }
        }
		
		public function industry_type_short_name_check($str)
        {
                $str = $this->input->post('industry_type_short_name');				
                		
				$industry_type_id = NULL;
                if(!empty($this->input->post('industry_type_id'))){
                    $industry_type_id = $this->input->post('industry_type_id');
                }
				
                $check = $this->industry_type_model->checkStIndustry($str,$industry_type_id);
				//print_r($check); exit;
                if($check)
                {
                	$this->form_validation->set_message('industry_type_short_name_check', 'The {field} field can not be the word ' . $str);
                       return FALSE;
                }
                else
                {
                	return TRUE;
                }
        }
		
		
}
