<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave_approver extends MY_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		
		$this->load->model('Leave_approver_model','lm');
		
		
		$this->load->library('form_validation');
		
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{

		if(check_uri_permission('leave_approver', 'V') == 0){
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
		
		$data['list'] = $this->lm->approver_list('');
		
        $this->template->write_view('content', 'list', $data, TRUE);
        $this->template->render();
	}
	
	public function add()
	{

		if(check_uri_permission('leave_approver', 'A') == 0){
	     $this->session->set_flashdata('error_msg', 'You have no permission on this page');
	     redirect(base_url());
	     }


			$department_id = $this->input->post('department_id');

			
		if(!empty($department_id)){

			$employee_id = $this->input->post('employee1_id1');
			$employee_id2 = $this->input->post('employee2_id1');
			$employee_id3 = $this->input->post('employee3_id1');

			
			$this->lm->addleave($employee_id,$employee_id2,$employee_id3,$department_id);
			$this->session->set_flashdata('msg', 'Leave Approve Submit Successfully');
			
			redirect('leave_approver','refresh');
		}
		
		$this->template->add_js('assets/js/jquery.dataTables.min.js');
        $this->template->add_js('assets/js/dataTables.bootstrap4.min.js');
        /**
         * if you have any css to add for this page
         */
        $this->template->add_css('assets/css/dataTables.bootstrap4.min.css');
		
		
		$data['department'] = $this->lm->department('');
		
		
        $this->template->write_view('content', 'leave_approver', $data, TRUE);
        $this->template->render();		
	}
	
	
	
	public function department()
	{
		$department_id = $this->input->post('department_id');
		
		$data['approver1'] = $this->lm->approver1($department_id);
		$data['approver2'] = $this->lm->approver2($department_id);
		$data['approver3'] = $this->lm->approver3($department_id);
		
		
		echo json_encode(array_merge($data, array('newHash' => $this->security->get_csrf_hash(),'status' => 1)));
	}
	
	
	public function status($id, $status){

		if(check_uri_permission('leave_approver', 'D') == 0){
	     $this->session->set_flashdata('error_msg', 'You have no permission on this page');
	     redirect(base_url());
	     }

        $this->lm->status($id,$status);
        redirect('leave_approver','refresh');
    }
	
	
	
}

	