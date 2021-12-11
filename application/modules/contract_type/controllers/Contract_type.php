<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contract_type extends MY_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		$this->load->model('contract_type_model');
		$this->load->library('form_validation');
		$this->form_validation->CI =& $this;
		$this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{
		//echo "1";die;

		if(check_uri_permission('contract_type', 'V') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 
		
		$data['contracts'] = $this->contract_type_model->get_all_contract();
		$this->template->write('title', 'Contract_type', TRUE);
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
	
	public function status($id, $status){

		if(check_uri_permission('contract_type', 'D') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 


		$this->contract_type_model->status($id,$status);
		redirect('contract_type','refresh');
	}

	public function add(){

		if(check_uri_permission('contract_type', 'A') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 

		$this->template->write('title', 'Contract_type', TRUE);
        $this->template->write_view('content', 'add', '', TRUE);
        $this->template->render();
        
		
		
	}

	public function insertContract()
	{		

		
		$this->form_validation->set_rules('contract_type_name','Contract Type Name','trim|required');
		
		 if ($this->form_validation->run() == TRUE)
		 {
		 	$contract_type_name = $this->input->post('contract_type_name');
			
			$this->contract_type_model->insertContract($contract_type_name);
			redirect('contract_type', 'refresh');
		 }
		 else
		 {
		 	$this->template->write('title', 'Contract_type', TRUE);
			
	        $this->template->write_view('content', 'add', '', TRUE);
	        $this->template->render();
		 }
	}

	public function edit($id){

		if(check_uri_permission('contract_type', 'E') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 
        
		$data['contract_type'] = $this->contract_type_model->get_contract_type($id);
        $this->template->write_view('content', 'edit', $data, TRUE);
        $this->template->render();
		
	}

	public function UpdateContract()
	{

		$this->load->library("security");
		$this->form_validation->set_rules('contract_type_name','Contract type Name','trim|required');
		
		 if ($this->form_validation->run() == TRUE)
		 {
			$contract_type_name = $this->input->post('contract_type_name');
			
			$contract_type_id = $this->input->post('contract_type_id');
			
			$this->contract_type_model->UpdateContract($contract_type_name,$contract_type_id);
			redirect('contract_type', 'refresh');
		 }
		 else
		 {
		 	$dept_id = $this->input->post('contract_type_id');
		 	$data['contract_type'] = $this->contract_type_model->get_contract_type($contract_type_id);
		 	$this->template->write_view('content', 'edit', $data, TRUE);
		 	$this->template->render();
		 }
	}


}

?>
