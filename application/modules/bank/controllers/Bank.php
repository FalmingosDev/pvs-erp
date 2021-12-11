<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends MY_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		$this->load->model('bank_model');
		$this->load->library('form_validation');
		$this->form_validation->CI =& $this;
		$this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{

		if(check_uri_permission('bank', 'V') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 
		
		$data['banks'] = $this->bank_model->get_all_bank();
		$this->template->write('title', 'Bank', TRUE);
        /**
         * if you have any js to add for this page
         */

        $this->template->add_js('assets/js/jquery.dataTables.min.js');
        $this->template->add_js('assets/js/dataTables.bootstrap4.min.js');
        /**
         * if you have any css to add for this page
         */
        $this->template->add_css('assets/css/dataTables.bootstrap4.min.css');
        $this->template->write_view('content', 'bank', $data, TRUE);
        $this->template->render();
	}
	
	public function status($id, $status){

		if(check_uri_permission('bank', 'D') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 


		$this->bank_model->status($id,$status);
		redirect('bank','refresh');
	}

	public function addBank(){

		if(check_uri_permission('bank', 'A') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 

		$this->template->write('title', 'Bank', TRUE);
        $this->template->write_view('content', 'add_bank', '', TRUE);
        $this->template->render();
        
		
		//$this->load->view('add_department.php');
	}

	public function insertBank()
	{		

		// $this->form_validation->set_rules('bank_name','Bank Name','trim|required|callback_department_name_check');
		// $this->form_validation->set_rules('department_short_name','Department Short Name','trim|required|callback_short_name_check');

		$this->form_validation->set_rules('bank_name','Bank Short Name','trim|required');
		// $this->form_validation->set_rules('branch_name','Branch Name','trim|required');
		$this->form_validation->set_rules('address','Bank Name','trim|required');

		 if ($this->form_validation->run() == TRUE)
		 {
		 	$bank_short_name = $this->input->post('bank_name');
			// $branch_name = $this->input->post('branch_name');
			$bank_name = $this->input->post('address');
			
			$this->bank_model->insertBank($bank_short_name,$bank_name);
			redirect('bank', 'refresh');
		 }
		 else
		 {
		 	$this->template->write('title', 'Bank', TRUE);
			
	        $this->template->write_view('content', 'add_bank', '', TRUE);
	        $this->template->render();
		 }
	}

	public function editbank($id){

		if(check_uri_permission('bank', 'E') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 
        
		$data['bank'] = $this->bank_model->get_bank($id);
        $this->template->write_view('content', 'edit_bank', $data, TRUE);
        $this->template->render();
		
	}

	public function UpdateBank()
	{

		$this->load->library("security");
		$this->form_validation->set_rules('bank_name','Bank Short Name','trim|required');
		// $this->form_validation->set_rules('branch_name','Branch Name','trim|required');
		$this->form_validation->set_rules('address','Bank Name','trim|required');

		 if ($this->form_validation->run() == TRUE)
		 {
			$bank_short_name = $this->input->post('bank_name');
			// $branch_name = $this->input->post('branch_name');
			$bank_name = $this->input->post('address');
			$bank_id = $this->input->post('bank_id');
			
			$this->bank_model->UpdateBank($bank_short_name,$bank_name,$bank_id);
			redirect('bank', 'refresh');
		 }
		 else
		 {
		 	$dept_id = $this->input->post('bank_id');
		 	$data['bank'] = $this->bank_model->get_bank($bank_id);
		 	$this->template->write_view('content', 'edit_bank', $data, TRUE);
		 	$this->template->render();
		 }
	}


}

?>
