<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approver_level extends MY_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		
		$this->load->model('Approver_model','am');
		
		
		$this->load->library('form_validation');
		
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{

		if(check_uri_permission('approver_level', 'V') == 0){
	     $this->session->set_flashdata('error_msg', 'You have no permission on this page');
	     redirect(base_url());
	     }

		$data = [];
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
		
		$data['approver1'] = $this->am->approver1('');
		$data['approver2'] = $this->am->approver2('');
		$data['list'] = $this->am->approver_list('');
		
		
        $this->template->write_view('content', 'approver_level', $data, TRUE);
        $this->template->render();
	}
	
	public function add()
	{

		if(check_uri_permission('approver_level', 'A') == 0){
	     $this->session->set_flashdata('error_msg', 'You have no permission on this page');
	     redirect(base_url());
	     }

		/*$this->form_validation->set_rules('employee_id','Employee Name','trim|required|callback_emp_name_check');
		$this->form_validation->set_rules('employee_id2','Employee Name 2','trim|required|callback_emp_name_check');*/
		
		//if ($this->form_validation->run() == TRUE){
			
		$employee_id = $this->input->post('employee_id_1');
		$employee_id2 = $this->input->post('employee_id_2');
	//	print_r($employee_id);exit;
		$query = $this->am->addapprover($employee_id,$employee_id2);
		
			//print_r($query);exit;
		if($query){
			//$this->session->set_flashdata('msg', 'Successfully Inserted');
			redirect('approver_level','refresh');
			
		}
		else{
			//print_r('ssss');exit;
			$this->session->set_flashdata('msg', 'Data Already Exists');
			
			redirect('approver_level');
			
			
		}
		
		//}
		
	/*	else{
		}*/
						
	}
	
	public function change_status($id, $status){

		if(check_uri_permission('approver_level', 'D') == 0){
	     $this->session->set_flashdata('error_msg', 'You have no permission on this page');
	     redirect(base_url());
	     }

		//print_r($id); exit;
		$this->am->change_status($id,$status);
		redirect('approver_level','refresh');
	}
	
	
	
}

	