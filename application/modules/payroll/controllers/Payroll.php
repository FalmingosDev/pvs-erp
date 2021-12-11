<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payroll extends MY_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		$this->load->library('form_validation');
		
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url'));
        $this->load->model('client_attendance/Client_attendance_model','cam');
        $this->load->model('Payroll_model','pm');
	}
	
	public function index() {
        
		if(check_uri_permission('payroll', 'V') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        }
        $data = array();

        if(!empty($this->input->post())){
            //$this->form_validation->set_rules('approval_remarks','Approve/ Reject Remarks','trim|required');
            //if ($this->form_validation->run() == TRUE){
                $month = $this->input->post('month'); 
                $client_id = $this->input->post('client_id');
                $branch_id = $this->input->post('branch_id');
                
                
                $qry = $this->pm->processPayroll($month, $client_id,$branch_id);
                //print_r($qry);die;
                if($qry) {
                 $this->session->set_flashdata('msg', 'Salary Processed Successfully');
                 redirect(base_url('payroll'));
                }
                
            //}
        }

        //$data['client_attendance'] = $this->pm->client_attendance_list();
        $data['client_attendance'] = [];
        
        $data['approval'] = $this->cam->check_approval_permission();
        
        $client_obj = $this->cam->getClientName();
        $client_list = array('' => 'Select Client');
        foreach($client_obj as $client){
            $client_list[$client->client_id] = $client->client_name;
        }
        $data['client'] = $client_list;

        $month_obj = $this->cam->getMonth();
        $month_list = array('' => 'Select Month');
        foreach($month_obj as $month){
            $month_list[$month->attendance_month] = $month->MonthYear;
        }
        $data['month'] = $month_list;
        
        
        $this->template->write('title', 'Client Attendance', TRUE);
        /**
         * if you have any js to add for this page
         */
        
        $this->template->add_js('assets/js/jquery.dataTables.min.js');
        $this->template->add_js('assets/js/dataTables.bootstrap4.min.js');
        //$this->template->add_js('assets/js/bootstrap-datepicker.min.js');

                
        /**
         * if you have any css to add for this page
         */
        //$this->template->add_css('assets/css/datepicker.css');
        $this->template->add_css('assets/css/dataTables.bootstrap4.min.css');
        
        $this->template->write_view('content', 'client_list', $data, TRUE);
        $this->template->render();
	}

    public function search_list(){
        $month = $this->input->post('month');
        $client_id = $this->input->post('client_id');
        $branch_id = $this->input->post('branch_id');

        $data['attendance_list'] = $this->pm->client_attendance_search($month, $client_id, $branch_id);
        //print_r($checkHeader);die;
        echo json_encode(array('attendance_list' => $data['attendance_list'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
    }

    public function branch_list(){
        $client_id = $this->input->post('client_id');
        $data['branch_list'] = $this->pm->getBranch($client_id);
        echo json_encode(array('branch_list' => $data['branch_list'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
    }
	
	// public function payroll_process(){
 //        //echo "1";die;
 //        if(check_uri_permission('payroll', 'D') == 0){
	// 		$this->session->set_flashdata('error_msg', 'You have no permission on this page');
	// 		redirect(base_url());
 //        }
		
	// 	if(!empty($this->input->post())){
	// 		//$this->form_validation->set_rules('approval_remarks','Approve/ Reject Remarks','trim|required');
	// 		if ($this->form_validation->run() == TRUE){
	// 			$month = $this->input->post('month'); 
 //                $client_id = $this->input->post('client_id');
				
				
	// 			$qry = $this->pm->updateAttendanceApproval($month, $client_id);
	// 			if($qry) {
	// 				$this->session->set_flashdata('msg', 'Data Saved Successfully');
	// 				//redirect(base_url('client_attendance/client'));
	// 			}
				
	// 		}
	// 	}
		
 //        $this->template->write('title', 'Dashboard', TRUE);
 //    	$this->template->add_js('assets/js/select2.min.js');
 //    	$this->template->add_js('assets/js/bootstrap-select.js');
 //        $this->template->add_js('assets/js/bootstrap-datepicker.min.js');
        
 //    	$this->template->add_css('assets/css/select2.css');
 //    	$this->template->add_css('assets/css/bootstrap-select.css');
 //        $this->template->add_css('assets/css/datepicker.css');
 //        $this->template->write_view('content', 'client_list', '', TRUE);
 //        $this->template->render();  
 //    }
	
}
