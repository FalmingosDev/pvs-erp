<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recruitment_approval extends MY_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		
		$this->load->model('Recruitment_approval_model','rm');
		
		
		$this->load->library('form_validation');
		
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{

		if(check_uri_permission('recruitment_approval', 'V') == 0){
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
		
		$data['approver1'] = $this->rm->approver1('');
		$data['approver2'] = $this->rm->approver2('');
		$data['list'] = $this->rm->approver_list('');
		
		
        $this->template->write_view('content', 'approver_level', $data, TRUE);
        $this->template->render();
	}
	
	public function add()
	{

		if(check_uri_permission('recruitment_approval', 'A') == 0){
	     $this->session->set_flashdata('error_msg', 'You have no permission on this page');
	     redirect(base_url());
	     }

		
		$employee_id = $this->input->post('employee_id_1');
		//$employee_id2 = $this->input->post('employee_id_2');
		
		$query = $this->rm->addapprover($employee_id);
		
		if($query){
			redirect('recruitment_approval','refresh');
			
		}
		else{
			//print_r('ssss');exit;
			$this->session->set_flashdata('msg', 'Data Already Exists');
			
			redirect('recruitment_approval');
			
			
		}
		
		//}
		
	/*	else{
		}*/
						
	}
	
	public function change_status($id, $status){

		if(check_uri_permission('recruitment_approval', 'D') == 0){
	     $this->session->set_flashdata('error_msg', 'You have no permission on this page');
	     redirect(base_url());
	     }

		//print_r($id); exit;
		$this->rm->change_status($id,$status);
		redirect('recruitment_approval','refresh');
	}
	
	
	
}

	