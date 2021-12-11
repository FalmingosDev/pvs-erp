<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Attendance extends MY_Controller
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
		$this->load->model('Attendance_model','am');
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
		//$data['list'] = $this->ptax_model->get_all_ptax();
		//echo "<pre>"; print_r($list); echo "</pre>";
		//$this->load->view('welcome_message');
		
		if (!empty($this->input->post('branch_drp')) || !empty($this->input->post('month_drp'))){
			$branches = $this->input->post('branch_drp');
			$months = $this->input->post('month_drp');
			$data['staffs'] = $this->am->list_staff_search($branches,$months);
			// $data['branch_id'] = $branches;
			// $data['month_id'] = $months;
		}
		else{
			$data['staffs'] = $this->am->list_staff();
			// $data['branch_id'] = '';
			// $data['month_id'] = '';
		}
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
	public function add_staff_attendance()
	{

		if(check_uri_permission('attendance/staff', 'A') == 0){
	     $this->session->set_flashdata('error_msg', 'You have no permission on this page');
	     redirect(base_url());
	     }

		$data = array();
		$data['branches'] = $this->am->branch_name();
		if (!empty($this->input->post())) {
			// $this->load->library("security");
			$this->form_validation->set_rules('month', 'Months', 'trim|required');
			$this->form_validation->set_rules('lop', 'LOP', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
				$month = $this->input->post('month');
				$attendance_month = $month . '-01';
				$branch_id = $this->input->post('branch');
				$employee_id = $this->input->post('employee');
				$lop = $this->input->post('lop');
				$ot_hrs = $this->input->post('ot_hrs');
				$incentive = $this->input->post('incentive');
				$el = $this->input->post('el');
				$cl = $this->input->post('cl');
				$sl = $this->input->post('sl');
				$pf_amount = $this->input->post('pf_amount');
				$area_others = $this->input->post('area_others');
//print_r($branch_id);exit;
				$qry = $this->am->add_staff($attendance_month, $branch_id, $employee_id, floatval($lop), floatval($ot_hrs), floatval($incentive), floatval($el), floatval($cl), floatval($sl), floatval($pf_amount), floatval($area_others));
				redirect('attendance/staff','refresh');
			}
		}
		
		$this->template->write('title', 'Dashboard', TRUE);
		$this->template->write_view('content', 'add_staff_attendance', $data, TRUE);
		$this->template->render();
	}
	
	public function edit()
	{

		if(check_uri_permission('attendance/staff', 'E') == 0){
	     $this->session->set_flashdata('error_msg', 'You have no permission on this page');
	     redirect(base_url());
	     }

		$data = array();
		//$data['branches'] = $this->am->branch_name();
		if (!empty($this->input->post())) {
			// $this->load->library("security");
			//$this->form_validation->set_rules('month', 'Months', 'trim|required');
			//$this->form_validation->set_rules('lop', 'LOP', 'trim|required');
			//if ($this->form_validation->run() == TRUE) {
				
				$id = $this->input->post('id');
				
				
				$lop = $this->input->post('lop');
				$ot_hrs = $this->input->post('ot_hrs');
				$incentive = $this->input->post('incentive');
				
				
				$pf_amount = $this->input->post('pf_amount');
				$area_others = $this->input->post('area_others');

				$qry = $this->am->edit_staff(floatval($lop), floatval($ot_hrs), floatval($incentive), floatval($pf_amount), floatval($area_others),$id);
				redirect('attendance/staff','refresh');
			//}
		}
		
		$id = $this->uri->segment(3);
		$data['detail'] = $this->am->attendance_detail($id);
		$data['detail']->attendance_month = date('M, Y', strtotime($data['detail']->attendance_month));
		
		$this->template->write('title', 'Dashboard', TRUE);
		$this->template->write_view('content', 'edit_staff_attendance', $data, TRUE);
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
	
}
