<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_role extends MY_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		
		$this->load->model('User_role_model','um');
		$this->load->library('form_validation');
		
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{

		if(check_uri_permission('user_role', 'V') == 0){
	     $this->session->set_flashdata('error_msg', 'You have no permission on this page');
	     redirect(base_url());
	     }

		$data = array();
		
		
		$this->template->write('title', 'User Role', TRUE);
        /**
         * if you have any js to add for this page
         */
        
		$data['list'] = $this->um->resource_list('');	
		
		
        $this->template->add_js('assets/js/jquery.dataTables.min.js');
        $this->template->add_js('assets/js/dataTables.bootstrap4.min.js');
        /**
         * if you have any css to add for this page
         */
        $this->template->add_css('assets/css/dataTables.bootstrap4.min.css');
		
        $this->template->write_view('content', 'list', $data, TRUE);
        $this->template->render();
	}
	
	
	
	
	public function add(){


		if(check_uri_permission('user_role', 'A') == 0){
	     $this->session->set_flashdata('error_msg', 'You have no permission on this page');
	     redirect(base_url());
	     }
		
		if(!empty($this->input->post())){
			$this->form_validation->set_rules('role_id','Select Client','trim|required');
			
			
			if ($this->form_validation->run() == TRUE){
				$role_id  = $this->input->post('role_id');
				$resource_id  = $this->input->post('resource_id');
				
				$this->um->addrole($role_id,$resource_id);
				
				redirect('user_role','refresh');
				
				
			}
			
		}
		
		$role_id  = $this->input->post('role_id');
		//print_r($role_id);exit;
		$data['role'] = $this->um->role('');
		//print_r($data['client']);exit;		
		$data['user'] = $this->um->userlist();
        
		
		$this->template->write('title', 'Dashboard', TRUE);
		$this->template->write_view('content', 'add', $data, TRUE);
        $this->template->render();
	}
	
	public function desi_list(){
		
		$resource_id = $this->input->post('resource_id');		
	
		$data['designation'] = $this->um->designation($resource_id);
			
			
		echo json_encode(array('designation' => $data['designation'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}
	
	public function delete($id){

		if(check_uri_permission('user_role', 'D') == 0){
	     $this->session->set_flashdata('error_msg', 'You have no permission on this page');
	     redirect(base_url());
	     }

		//print_r($id); exit;
		$this->um->delete($id);
		redirect('user_role','refresh');
	}
	
	
}

	