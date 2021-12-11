<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff_payroll extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('user_id') || !$this->session->user_id) {
			redirect('login');
		}
		$this->load->library('form_validation');

		$this->form_validation->CI = &$this;
		$this->load->helper(array('form', 'url'));
		$this->load->model('Staff_payroll_model','am');
	}

	public function index()
	{

	 if(check_uri_permission('attendance/staff', 'V') == 0){
     $this->session->set_flashdata('error_msg', 'You have no permission on this page');
     redirect(base_url());
     }


		$data = array();
		//$data['list'] = $this->ptax_model->get_all_ptax();
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

	public function staff()
	{
		$data = array();
		if(!empty($this->input->post())){

			//echo "1";die;
			$month = $this->input->post('month_drp');
			$branch_id = $this->input->post('branch_drp');
			
			$qry = $this->am->processStaffPayroll($month, $branch_id);
			if($qry) 
			{
				//print_r($qry);die;
               $this->session->set_flashdata('status', $qry->status);
               $this->session->set_flashdata('msg', $qry->msg);
               //print_r($this->session_data);die;
               redirect(base_url('staff_payroll/staff'));
            }
		}
		//else{
		$data['staffs'] = $this->am->list_staff();
		//$data['staffs'] = [];
		
		$data['branches'] = $this->am->branch_name();
		$data['months'] = $this->am->fetch_month();
		
		

	

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

		$this->template->write_view('content', 'staff_list', $data, TRUE);
		$this->template->render();
	}

	public function client()
	{
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

		$this->template->write_view('content', 'client_list', $data, TRUE);
		$this->template->render();
	}

	public function add_client_attendance()
	{
		$data = array();
		$this->template->write('title', 'Dashboard', TRUE);
		$this->template->write_view('content', 'add_client_attendance', $data, TRUE);
		$this->template->render();
	}
	public function add_desig()
	{
		$desig = $this->input->post('desig');
		$data['deg_name'] = $this->am->fetch_desig($desig);
		//echo json_encode(['desig_name' => $desig->desig_name]);
		echo json_encode(array('deg_name' => $data['deg_name'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
		 //print_r($desig); die();
	}
	public function add_employee()
	{
		$employee = $this->input->post('employee');
	//print_r($employee);exit;
		$data['employee'] =  $this->am->employee_list($employee);
		echo json_encode(array('emp_list' => $data['employee'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}
	
	function ajax_get_leaves(){
		//exit(json_encode(array('post_data' => $this->input->post(), 'newHash' => $this->security->get_csrf_hash(),'status' => 1)));
		$leave_details = $this->am->get_leaves($this->input->post('employee_id'), $this->input->post('attendance_month'));
		echo json_encode(array('leaves' => $leave_details, 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}
	
	public function delete($id){

		if(check_uri_permission('attendance/staff', 'D') == 0){
	     $this->session->set_flashdata('error_msg', 'You have no permission on this page');
	     redirect(base_url());
	     }

		//print_r($id); exit;
		$this->am->delete($id);
		redirect('attendance/staff','refresh');
	}

	public function search_list()
	{
        $month = $this->input->post('month');
        $branch_id = $this->input->post('branch_id');

        $data['staffs'] = $this->am->list_staff_search($branch_id,$month);
        //print_r($checkHeader);die;
        echo json_encode(array('attendance_list' => $data['staffs'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
    }
	
}
