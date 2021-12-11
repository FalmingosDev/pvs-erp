<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class training_type extends MY_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		$this->load->model('training_type_model','tm');
		$this->load->library('form_validation');
		
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{

		if(check_uri_permission('training_type', 'V') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 


		$data['list'] = $this->tm->get_all_list();
		
		
		$this->template->write('title', 'City Master', TRUE);
        
        $this->template->add_js('assets/js/jquery.dataTables.min.js');
        $this->template->add_js('assets/js/dataTables.bootstrap4.min.js');
       
        $this->template->add_css('assets/css/dataTables.bootstrap4.min.css');
		
        $this->template->write_view('content', 'list', $data, TRUE);
        $this->template->render();
	}
	
	
	
	
	public function change_status($id, $status){


		if(check_uri_permission('training_type', 'D') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 

		//print_r($status); exit;
		$this->tm->change_status($id,$status);
		redirect('training_type','refresh');
	}
	
	public function add_traning(){


		if(check_uri_permission('training_type', 'A') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 

			
		if(!empty($this->input->post())){
			$this->form_validation->set_rules('training_name','Training Name','trim|required');
			
				if ($this->form_validation->run() == TRUE){
						$training_name  = $this->input->post('training_name');
						//print_r($training_name); exit;
						$this->tm->add_traning($training_name);	
						redirect('training_type','refresh');
						}
						
		}
		
		 $this->template->write('title', 'Dashboard', TRUE);
		
		
		$this->template->write_view('content', 'add_traning', '', TRUE);
        $this->template->render();
		
		//$this->load->view('add_state.php');
	} 
	
	
	public function edit_traning(){


		if(check_uri_permission('training_type', 'E') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 

		
		if(!empty($this->input->post())){
			$this->form_validation->set_rules('training_name','Training Name','trim|required');
			
			
			if ($this->form_validation->run() == TRUE){
						$training_name  = $this->input->post('training_name');
						
						
						$id  = $this->input->post('id');
				
				//print_r($id); exit;
				
				$this->tm->edit_traning($training_name,$id);	
				redirect('training_type','refresh');
			}
			
		}
		
		$this->template->write('title', 'Dashboard', TRUE);
		
		
		$id = $this->uri->segment(3);
		
		//print_r($id); exit;
		$data['view'] = $this->tm->view($id);
		
		//print_r($state_id); die;
		
		$this->template->write_view('content', 'edit_traning', $data, TRUE);
        $this->template->render();
		
	}
	
		
		
	
}

	