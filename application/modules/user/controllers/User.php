<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
		$this->load->library('form_validation');
		$this->form_validation->CI =& $this;
	}
	
	public function index()
	{


		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		// echo $this->session->userdata['employee_id'];
		// die;
		
		$users = $this->user_model->get_all_user();
		$data['tot_emp'] = $this->user_model->get_all_emp();
		$data['tot_new_join'] = $this->user_model->get_all_new_emp();
		$data['tot_pending_approval'] = $this->user_model->get_all_emp_pending_approval();
		$data['tot_client'] = $this->user_model->get_all_client();
		$data['tot_new_join_client'] = $this->user_model->get_new_client();
		$count_pending_approval_client=0;
		$level=0;
		if(!empty($this->session->userdata['employee_id']))
		{
			$employee_id=$this->session->userdata['employee_id'];
			$approve_level1=$this->user_model->get_all_client_approve_level($employee_id,1);
			$approve_level2=$this->user_model->get_all_client_approve_level($employee_id,2);
			$recruitment_approver=$this->user_model->get_recruitment_approver_mst($employee_id);
			if(!empty($recruitment_approver))
			{
				$data['employee_recruitment_approval'] = $this->user_model->get_employee_recruitment_approval();
			}

			if(!empty($approve_level1))
			{
				$count_pending_approval_client = $this->user_model->get_pending_approval1_client();
				$level=1; 
				$data['client_attendance_approval'] = $this->user_model->get_pending_approval_attendance_client();
				$data['client_supp_attendance_approval'] = $this->user_model->get_pending_approval_supp_attendance_client();
				$data['client_recruitment_approval'] = $this->user_model->get_pending_recruitment_approval();
			}
			elseif(!empty($approve_level2))
			{
				$count_pending_approval_client = $this->user_model->get_pending_approval2_client();
				$level=2;
				$data['client_attendance_approval'] = $this->user_model->get_pending_approval_attendance_client();
				$data['client_supp_attendance_approval'] = $this->user_model->get_pending_approval_supp_attendance_client();
				$data['client_recruitment_approval'] = $this->user_model->get_pending_recruitment_approval();
				// echo $this->db->last_query();
				// pr($count_pending_approval_client);
			}
			elseif(!empty($approve_level1) && !empty($approve_level2))
			{
				$count_pending_approval_client = $this->user_model->get_pending_approval_client();
				$level='both';
				$data['client_attendance_approval'] = $this->user_model->get_pending_approval_attendance_client();
				$data['client_supp_attendance_approval'] = $this->user_model->get_pending_approval_supp_attendance_client();
				$data['client_recruitment_approval'] = $this->user_model->get_pending_recruitment_approval();
			}
			
		}
		 
		//pr($count_pending_approval_client);
		//die;
		$data['client_level']=$level;
		if(is_object($count_pending_approval_client) )
		{
			
			$data['tot_pending_approval_client'] = $count_pending_approval_client;
		}
		else
		{
			$ar1=array('tot_pending_client'=>$count_pending_approval_client);
			$data['tot_pending_approval_client'] = (object)$ar1;
			

		}
		//pr($data['tot_pending_approval_client']);
		
		$data['leave_approval'] = $this->user_model->get_pending_approval_leave();
		
		//print_r($tot_emp);die;
		//echo "<pre>"; print_r($users); echo "</pre>";
		//$this->load->view('welcome_message');

		//pr($data);
		$data['session_data'] = $this->session->all_userdata();
		
		$this->template->write('title', 'Dashboard', TRUE);
        /**
         * if you have any css to add for this page
         */
        $this->template->add_css('assets/css/fullcalendar.css');
        /**
         * if you have any js to add for this page
         */
        $this->template->add_js('assets/js/excanvas.min.js');
        $this->template->add_js('assets/js/jquery.flot.min.js');
        $this->template->add_js('assets/js/jquery.flot.resize.min.js');
        $this->template->add_js('assets/js/jquery.peity.min.js');
        $this->template->add_js('assets/js/fullcalendar.min.js');
        $this->template->add_js('assets/js/maruti.dashboard.js');
        $this->template->add_js('assets/js/maruti.chat.js');
        $this->template->write_view('content', 'dashboard', $data, TRUE);
        $this->template->render();
	}
	
	public function login()
	{
		if($this->session->has_userdata('user_id')){
			redirect(base_url());
		}
		$this->load->library('form_validation');
		$this->load->library("security");
		
		if(!empty($this->input->post())){
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if ($this->form_validation->run() == TRUE){
				$data = $this->input->post();
				$data = $this->security->xss_clean($data);
				//print_r($data); exit();
				$userdata = $this->user_model->user_login($data);
				//pr($userdata);
				//var_dump($userdata); exit();
				if(!empty($userdata)){
					$this->session->set_userdata($userdata);
					redirect(base_url());
				}
				else{
					$this->session->set_flashdata('error_msg','Invalid Username or Password.');
				}
			}
		}
		$this->load->view('login');
	}
	public function change_password()
	{
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		if(!empty($this->input->post()))
		{
			$this->form_validation->set_rules('current_password','Current Password','trim|required|callback_current_password_check');
			$this->form_validation->set_rules('new_password','New Password','trim|required');
			$this->form_validation->set_rules('confirm_password','Confirm Password','trim|required|matches[new_password]');

			if ($this->form_validation->run() == TRUE)
			{
				$new_password = $this->input->post('new_password');
				$result = $this->user_model->changePassword($this->session->user_id, $new_password);
				
				//var_dump($userdata); exit();
				if($result){
					$this->session->set_flashdata('success_msg', 'Password changed successfully');
				}
				else{
					$this->session->set_flashdata('error_msg','Unable to change the password');
				}
				redirect('user/change_password');
			}
		}
		
		$this->template->write('title', 'Dashboard', TRUE);
        $this->template->write_view('content', 'change_password', '', TRUE);
        $this->template->render();
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

	public function current_password_check()
	{
		$user_id = $this->session->user_id;
		$check = $this->user_model->checkCurrentPassword($user_id, $this->input->post('current_password'));
		if($check['cnt'] == 0)
		{
			$this->form_validation->set_message('current_password_check', "The {field} does't match with your password");
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
}