<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City extends MY_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		$this->load->model('city_model');
		$this->load->library('form_validation');
		
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{

		if(check_uri_permission('city', 'V') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 

        
		$data['list'] = $this->city_model->get_all_city();
		//echo "<pre>"; print_r($list); echo "</pre>";
		//$this->load->view('welcome_message');
		
		$this->template->write('title', 'City Master', TRUE);
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

		if(check_uri_permission('city', 'D') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 

		//print_r($status); exit;
		$this->city_model->change_status($id,$status);
		redirect('city','refresh');
	}
	
	public function add_city(){


		if(check_uri_permission('city', 'A') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 


		
		if(!empty($this->input->post())){
			$this->form_validation->set_rules('city_name','City Name','trim|required|callback_city_name_check');
			$this->form_validation->set_rules('city_st_name','City Short Name','trim|required|callback_st_name_check');
			$this->form_validation->set_rules('state_id','Select State','trim|required');
		
				if ($this->form_validation->run() == TRUE){
						$state_id  = $this->input->post('state_id');
						$city_name  = $this->input->post('city_name');
						$city_st_name  = $this->input->post('city_st_name');
						//print_r($city_name); exit;
						
						$this->city_model->add_city($state_id,$city_name,$city_st_name);	
						redirect('city','refresh');
						}
						
		}
		//print_r('Parthadddddd'); exit;
		$data['state'] = $this->city_model->get_all_state();
		
		//print_r('Partha'); exit;
		 $this->template->write('title', 'Dashboard', TRUE);
		
		
		$this->template->write_view('content', 'add_city', $data, TRUE);
        $this->template->render();
		
		//$this->load->view('add_state.php');
	}
	
	
	public function edit_city(){


		if(check_uri_permission('city', 'E') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 


		
		if(!empty($this->input->post())){
			$this->form_validation->set_rules('city_name','City Name','trim|required|callback_city_name_check');
			$this->form_validation->set_rules('city_st_name','City Short Name','trim|required|callback_st_name_check');
			$this->form_validation->set_rules('state_id','Select State','trim|required');
			
			if ($this->form_validation->run() == TRUE){
				$city_name  = $this->input->post('city_name');
				$city_st_name  = $this->input->post('city_st_name');
				$state_id  = $this->input->post('state_id');
				$ct_id  = $this->input->post('ct_id');
				
				//print_r($ct_id); exit;
				
				$this->city_model->edit_city($city_name,$city_st_name,$state_id,$ct_id);	
				redirect('city','refresh');
			}
		}
		
		$this->template->write('title', 'Dashboard', TRUE);
		
		
		$id = $this->uri->segment(3);
		
		//print_r($id); exit;
		$data['edit_city'] = $this->city_model->editcity($id);
		$data['state'] = $this->city_model->get_all_state();
		
		$this->template->write_view('content', 'edit_city', $data, TRUE);
        $this->template->render();
		
	}
	
	public function city_name_check($str)
        {
                //$str = $this->input->post('city_name');				
                //print_r($str);exit;		
				$state_id = NULL;
                if(!empty($this->input->post('state_id'))){
                    $state_id = $this->input->post('state_id');
                }
				//print_r($state_id);exit;	
				$city_id = NULL;
                if(!empty($this->input->post('ct_id'))){
                    $city_id = $this->input->post('ct_id');
                }
				
                $check = $this-> city_model->checkNameState($str,$state_id,$city_id);
				//print_r($check); exit;
                if($check)
                {
                	$this->form_validation->set_message('city_name_check', 'The {field} field can not be the word ' . $str);
                       return FALSE;
                }
                else
                {
                	return TRUE;
                }
        }
		
		public function st_name_check($str)
        {
                //$str = $this->input->post('city_st_name');				
                	
				$state_id = NULL;
                if(!empty($this->input->post('state_id'))){
                    $state_id = $this->input->post('state_id');
                }
				
				$city_id = NULL;
                if(!empty($this->input->post('ct_id'))){
                    $city_id = $this->input->post('ct_id');
                }
				
                $check = $this-> city_model->checkstState($str,$state_id,$city_id);
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
		
		/*public function state_check($str)
        {
                $str = $this->input->post('state_code');				
                		
				$city_id = NULL;
                if(!empty($this->input->post('ct_id'))){
                    $city_id = $this->input->post('ct_id');
                }
				
                $check = $this-> city_model->checkidState($str,$city_id);
				//print_r($check); exit;
                if($check)
                {
                	$this->form_validation->set_message('state_check', 'The {field} field can not be the word ' . $str);
                       return FALSE;
                }
                else
                {
                	return TRUE;
                }
        }*/
	
}

	