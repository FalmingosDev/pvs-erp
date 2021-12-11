<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class State extends MY_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		$this->load->model('state_model');
		$this->load->library('form_validation');
		
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{

		if(check_uri_permission('state', 'V') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 

        
		$data['list'] = $this->state_model->get_all_state();
		
		//echo "<pre>"; print_r($list); echo "</pre>";
		//$this->load->view('welcome_message');
		
		$this->template->write('title', 'State Master', TRUE);
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

		if(check_uri_permission('state', 'D') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 


		//print_r($status); exit;
		$this->state_model->change_status($id,$status);
		redirect('state','refresh');
	}
	
	public function add_state_page(){

		if(check_uri_permission('state', 'A') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 


		//print_r('Partha'); exit;
		$this->template->write('title', 'Dashboard', TRUE);
		$this->template->write_view('content', 'add_state', '', TRUE);
        $this->template->render();
		
		//$this->load->view('add_state.php');
	}
	
	
	public function addstate(){
		
		$this->form_validation->set_rules('state_name','State Name','trim|required|callback_state_name_check');
		$this->form_validation->set_rules('state_st_name','State Short Name','trim|required|callback_st_name_check');
		$this->form_validation->set_rules('state_code','State Code','trim|required|numeric|callback_code_name_check');
		
		if ($this->form_validation->run() == TRUE){
				$state_name  = $this->input->post('state_name');
				$state_st_name  = $this->input->post('state_st_name');
				$state_code  = $this->input->post('state_code');
				//print_r($state_name); exit;
				
				$this->state_model->add_state($state_name,$state_st_name,$state_code);	
				redirect('state','refresh');
				}
				
				else{
					$this->template->add_js('assets/js/jquery.uniform.js');
					$this->template->add_js('assets/js/select2.min.js');
					$this->template->add_js('assets/js/jquery.dataTables.min.js');
					
					
					$this->template->add_css('assets/css/uniform.css');
					$this->template->add_css('assets/css/select2.css');
					
					$this->template->write_view('content', 'add_state', '', TRUE);
					$this->template->render();
				}
	}
	
	public function edit_state_page(){

		if(check_uri_permission('state', 'E') == 0){
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
		$data['edit_state'] = $this->state_model->editstate($id);		
		$this->template->write_view('content', 'edit_state', $data, TRUE);
        $this->template->render();
		
	}
	
	public function edit_state(){		
		
		$this->form_validation->set_rules('state_name','State Name','trim|required|callback_state_name_check');
		$this->form_validation->set_rules('state_st_name','State Short Name','trim|required|callback_st_name_check');
		$this->form_validation->set_rules('state_code','State Code','trim|required|numeric|callback_code_name_check');
		
		
		if ($this->form_validation->run() == TRUE){
				$state_name  = $this->input->post('state_name');
				$state_st_name  = $this->input->post('state_st_name');
				$state_code  = $this->input->post('state_code');
				$st_id  = $this->input->post('st_id');
				//print_r($st_id); exit;
				
				$this->state_model->edit_state($state_name,$state_st_name,$state_code,$st_id);	
				redirect('state','refresh');
		}
		else{
					$st_id  = $this->input->post('st_id');
					$data['edit_state'] = $this->state_model->editstate($st_id);
					
					$this->template->add_js('assets/js/jquery.uniform.js');
					$this->template->add_js('assets/js/select2.min.js');
					$this->template->add_js('assets/js/jquery.dataTables.min.js');
					
					
					$this->template->add_css('assets/css/uniform.css');
					$this->template->add_css('assets/css/select2.css');
					
					$this->template->write_view('content', 'edit_state', $data, TRUE);
					$this->template->render();	
				}
		
		
	}
	
	public function state_name_check($str)
        {
                $str = $this->input->post('state_name');				
                		
				$state_id = NULL;
                if(!empty($this->input->post('st_id'))){
                    $state_id = $this->input->post('st_id');
                }
				//print_r($state_id); exit;
                $check = $this->state_model->checkState($str,$state_id);
				//print_r($check); exit;
                if($check)
                {
                	$this->form_validation->set_message('state_name_check', 'The {field} field can not be the word ' . $str);
                       return FALSE;
                }
                else
                {
                	return TRUE;
                }
        }
		
		public function st_name_check($str)
        {
                $str = $this->input->post('state_st_name');				
                		
				$state_id = NULL;
                if(!empty($this->input->post('st_id'))){
                    $state_id = $this->input->post('st_id');
                }
				
                $check = $this->state_model->checkstState($str,$state_id);
				//print_r($check); exit;
                if($check)
                {
                	$this->form_validation->set_message('st_name_check', 'The {field} field can not be the word ' . $str);
                       return FALSE;
                }
                else
                {
                	return TRUE;
                }
        }
		
		public function code_name_check($str)
        {
                $str = $this->input->post('state_code');				
                		
				$state_id = NULL;
                if(!empty($this->input->post('st_id'))){
                    $state_id = $this->input->post('st_id');
                }
				
                $check = $this->state_model->checkcodeState($str,$state_id);
				//print_r($check); exit;
                if($check)
                {
                	$this->form_validation->set_message('state_code', 'The {field} field can not be the word ' . $str);
                       return FALSE;
                }
                else
                {
                	return TRUE;
                }
        }
}

	