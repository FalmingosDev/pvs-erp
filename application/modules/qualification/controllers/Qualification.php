<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class qualification extends MY_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		$this->load->model('qualification_model','qm');
		$this->load->model('client/client_model','cd');
		$this->load->library('form_validation');
		
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{

		if(check_uri_permission('qualification', 'V') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 


		$data['list'] = $this->qm->get_all_list();
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

		if(check_uri_permission('qualification', 'D') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 

		//print_r($status); exit;
		$this->qm->change_status($id,$status);
		redirect('qualification','refresh');
	}
	
	public function add_quali(){


		if(check_uri_permission('qualification', 'A') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 

			
		if(!empty($this->input->post())){
			$this->form_validation->set_rules('qualification_name','Qualification Name','trim|required');
			$this->form_validation->set_rules('qualification_short_name','Qualification Short Name','trim|required');
			
				if ($this->form_validation->run() == TRUE){
						$qualification_name  = $this->input->post('qualification_name');
						$qualification_short_name  = $this->input->post('qualification_short_name');
						
						$this->qm->add_quali($qualification_name,$qualification_short_name);	
						redirect('qualification','refresh');
						}
						
		}
		
		 $this->template->write('title', 'Dashboard', TRUE);
		
		
		$this->template->write_view('content', 'add_quali', '', TRUE);
        $this->template->render();
		
		//$this->load->view('add_state.php');
	}
	
	
	public function edit_quali(){


		if(check_uri_permission('qualification', 'E') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 

		
		if(!empty($this->input->post())){
			$this->form_validation->set_rules('qualification_name','Qualification Name','trim|required');
			$this->form_validation->set_rules('qualification_short_name','Qualification Short Name','trim|required');
			
			
			
			
			if ($this->form_validation->run() == TRUE){
						$qualification_name  = $this->input->post('qualification_name');
						$qualification_short_name  = $this->input->post('qualification_short_name');
						
						$id  = $this->input->post('id');
				
				//print_r($id); exit;
				
				$this->qm->edit_quali($qualification_name,$qualification_short_name,$id);	
				redirect('qualification','refresh');
			}
			
		}
		
		$this->template->write('title', 'Dashboard', TRUE);
		
		
		$id = $this->uri->segment(3);
		
		//print_r($id); exit;
		$data['view'] = $this->qm->view($id);
		
		//print_r($state_id); die;
		
		$this->template->write_view('content', 'edit_quali', $data, TRUE);
        $this->template->render();
		
	}
	
		
		
	
}

	