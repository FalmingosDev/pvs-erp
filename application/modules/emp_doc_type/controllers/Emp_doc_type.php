<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class emp_doc_type extends MY_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		$this->load->model('emp_doc_type_model','doc');
		$this->load->library('form_validation');
		
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{

		if(check_uri_permission('emp_doc_type', 'V') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 


		$data['list'] = $this->doc->get_all_list();
		
		
		$this->template->write('title', 'EMP Doc Master', TRUE);
        
        $this->template->add_js('assets/js/jquery.dataTables.min.js');
        $this->template->add_js('assets/js/dataTables.bootstrap4.min.js');
       
        $this->template->add_css('assets/css/dataTables.bootstrap4.min.css');
		
        $this->template->write_view('content', 'list', $data, TRUE);
        $this->template->render();
	}
	
	
	
	
	public function change_status($id, $status){

		if(check_uri_permission('emp_doc_type', 'D') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 

		//print_r($status); exit;
		$this->doc->change_status($id,$status);
		redirect('emp_doc_type','refresh');
	}
	
	public function add_doc(){


		if(check_uri_permission('emp_doc_type', 'A') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 


			
		if(!empty($this->input->post())){
			$this->form_validation->set_rules('doc_name','Document Name','trim|required');
			$this->form_validation->set_rules('doc_short_name','Document Short Name','trim|required');
			
				if ($this->form_validation->run() == TRUE){
						$doc_name  = $this->input->post('doc_name');
						$doc_short_name  = $this->input->post('doc_short_name');
						
						$this->doc->add_doc($doc_name,$doc_short_name);	
						redirect('emp_doc_type','refresh');
						}
						
		}
		
		 $this->template->write('title', 'Dashboard', TRUE);
		
		
		$this->template->write_view('content', 'add_doc', '', TRUE);
        $this->template->render();
		
		//$this->load->view('add_state.php');
	} 
	
	
	public function edit_doc(){


		if(check_uri_permission('emp_doc_type', 'E') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 


		
		if(!empty($this->input->post())){
			$this->form_validation->set_rules('doc_name','Document Name','trim|required');
			$this->form_validation->set_rules('doc_short_name','Document Short Name','trim|required');
			
			
			if ($this->form_validation->run() == TRUE){
						$doc_name  = $this->input->post('doc_name');
						$doc_short_name  = $this->input->post('doc_short_name');
						
						
						$id  = $this->input->post('id');
				
				//print_r($id); exit;
				
				$this->doc->edit_doc($doc_name,$doc_short_name,$id);	
				redirect('emp_doc_type','refresh');
			}
			
		}
		
		$this->template->write('title', 'Dashboard', TRUE);
		
		
		$id = $this->uri->segment(3);
		
		//print_r($id); exit;
		$data['view'] = $this->doc->view($id);
		
		//print_r($state_id); die;
		
		$this->template->write_view('content', 'edit_doc', $data, TRUE);
        $this->template->render();
		
	}
	
		
		
	
}

	