<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_attendance extends MY_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		$this->load->library('form_validation');
		
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url')); 
        $this->load->model('Client_attendance_model','cam');
	}
	
	public function index() {
        
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
	
	public function client() {
		if(check_uri_permission('client_attendance/client', 'V') == 0){
			$this->session->set_flashdata('error_msg', 'You have no permission on this page');
			redirect(base_url());
		}
		$data = array();

		if (!empty($this->input->post('month')) || !empty($this->input->post('client_id'))){
			$month = $this->input->post('month');
			$client_id = $this->input->post('client_id');
			$data['client_attendance'] = $this->cam->client_attendance_search($month, $client_id);
		}
		else{
			$data['client_attendance'] = '';
		}
		
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
	
	public function add_client_attendance($client_id='',$branch_id='',$month_year=''){


        if(check_uri_permission('client_attendance/client', 'A') == 0){
         $this->session->set_flashdata('error_msg', 'You have no permission on this page');
         redirect(base_url());
         }


        if(!empty($this->input->post()))
        {
            //echo "1";die;
             $this->form_validation->set_rules('month_year','Month & Year','required');
             $this->form_validation->set_rules('duty','Duty','required');
             $this->form_validation->set_rules('client_id','Client Name','required');
             $this->form_validation->set_rules('branch_id','Branch Name','required');
             $this->form_validation->set_rules('employee_id','Employee Name','required');
             $this->form_validation->set_rules('designation_id','Designation Name','required|callback_client_check');
             
             
              if ($this->form_validation->run() == TRUE)
              {
                    $employee_id = NULL;
                    $flag = 0;
                    $month_year = $this->input->post('month_year');
                    $attendance_month = $month_year.'-01';
                    $client_id = $this->input->post('client_id');
                    $branch_id = $this->input->post('branch_id');
                    $employee_id = $this->input->post('employee_id');
                    if($employee_id == 'N')
                    {
                        $employee_id = $this->input->post('new_employee_id');
                        $flag = 1;
                    }
                    
                    $designation_id = $this->input->post('designation_id');
                    $calculation_days = $this->input->post('calculation_days');
                    $duty_hrs = $this->input->post('duty_hrs');
                    $duty = $this->input->post('duty');
                    $w_o = $this->input->post('w_o');
                    $leave = $this->input->post('leave');
                    $el = $this->input->post('el');
                    $fl = $this->input->post('fl');
                    $c_o = $this->input->post('c_o');
                    $ph = $this->input->post('ph');
                    $advance_deduct = $this->input->post('advance_deduct');
                    //$advance_fix = $this->input->post('advance_fix');
                    $loan_deduct = $this->input->post('loan_deduct');
                    //$loan_fix = $this->input->post('loan_fix');
                    $uniform_deduct = $this->input->post('uniform_deduct');
                    //$uniform_fix = $this->input->post('uniform_fix');
                    $fine_deduct = $this->input->post('fine_deduct');
                    //$fine_fix = $this->input->post('fine_fix');
                    $other_deduct = $this->input->post('other_deduct');
                    //$other_fix = $this->input->post('other_fix');
                    $ot = $this->input->post('ot');
                    $na_duty = $this->input->post('na_duty');
                    $na = $this->input->post('na');
                
               
                
                    $qry = $this->cam->insertClientAttendance($attendance_month,$client_id,$branch_id,$employee_id,$flag,$designation_id,$calculation_days,$duty_hrs,$duty,$w_o,$leave,$el,$fl,$c_o,$ph,$advance_deduct,$loan_deduct,$uniform_deduct,$fine_deduct,$other_deduct,$ot,$na_duty,$na);

            //  //    $empd_id = $qry['empd_id'];
                if($qry)
                {
                    
                    $this->session->set_flashdata('msg', 'Data Saved Successfully');
                    redirect(base_url().'client_attendance/add_client_attendance/'.$client_id.'/'.$branch_id.'/'.$month_year);
                }
                
             }
        }

        if(!empty($client_id) &&  !empty($branch_id) && !empty($month_year))
        {
            $branch_obj= $this->cam->getBranchSubmit($client_id);
            $branch_list = array('' => 'Select Branch');
            foreach($branch_obj as $branch)
            {
                $branch_list[$branch->branch_id] = $branch->branch_name;
            }
            $data['branch'] = $branch_list;

            $designation_obj = $this->cam->getDesignationSubmit($client_id);
            $designation_list = array('' => 'Select designation');
            foreach($designation_obj as $designation)
            {
                $designation_list[$designation->desig_id] = $designation->desig_name;
            }
            $data['designation'] = $designation_list;

            $employee_obj = $this->cam->getEmployeeSubmit($client_id,$branch_id);
            $employee_list= array('' => 'Select Employee');
            foreach($employee_obj as $employee)
            {
                $employee_list[$employee->employee_id] = $employee->employee_name;
            }

            $employee_list['N'] = 'New Employee';

            $data['employee'] = $employee_list;

            $this->cam->getEmployee($client_id,$branch_id);

            $data['attendance_list']=$this->cam->attendance_list($client_id,$branch_id,$month_year);
        }
        
        $data['salary_process_month'] = $this->cam->salary_process_month();

        $client_obj = $this->cam->get_all_client();
        $client_list = array('' => 'Select Client');
        foreach($client_obj as $client)
        {
            $client_list[$client->client_id] = $client->client_name;
        }
        $data['client'] = $client_list;

        // echo "<pre>";
        // print_r($data);
        // die;

        $this->template->write('title', 'Dashboard', TRUE);
        $this->template->write_view('content', 'add_client_attendance', $data, TRUE);
        $this->template->render();
    }

	public function branch_list(){
		$client_id = $this->input->post('client_id');
		$data['branch_list'] = $this->cam->getBranch($client_id);
		echo json_encode(array('branch_list' => $data['branch_list'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}

	public function employee_list(){
		$client_id = $this->input->post('client_id');
		$branch_id = $this->input->post('branch_id');
		$data['employee_list'] = $this->cam->getEmployee($client_id,$branch_id);
		echo json_encode(array('employee_list' => $data['employee_list'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}

	public function employee_mst_list(){
		$client_id = $this->input->post('client_id_new');
		$branch_id = $this->input->post('branch_id_new');
		$data['new_employee_list'] = $this->cam->getNewEmployee($client_id,$branch_id);
		echo json_encode(array('new_employee_list' => $data['new_employee_list'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}

	public function designation_list(){
		$client_id = $this->input->post('client_id');
		$data['designation_list'] = $this->cam->getDesignation($client_id);
		echo json_encode(array('designation_list' => $data['designation_list'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}

	public function client_emp_details(){
        $client_id = $this->uri->segment(3);
        $emp_id = $this->uri->segment(4);
        $branch_id = $this->uri->segment(5);
        $designation_id = $this->uri->segment(6);
        //$gross_pay = $this->input->post('gross_pay');
        $client= $this->cam->getClient($client_id);
        $emp= $this->cam->getEmployeeDet($emp_id);
        $branch= $this->cam->getLocation($branch_id);
        $designation = $this->cam->getDesignationDet($designation_id);
        $billing_costing = $this->cam->getBillingCosting($client_id,$designation_id);
        $advance = $this->cam->getAdvance($emp_id);
        $loan = $this->cam->getLoan($emp_id);
        $misc = $this->cam->getMisc($emp_id);

        echo json_encode(array('client_name' => $client->client_name, 'emp_code' => $emp->employee_code, 'emp_name' => $emp->employee_name, 'father_name' => $emp->father_name,'branch_name' => $branch->branch_name, 'desig_name' => $designation->desig_name, 'bill_calculation_days' => $billing_costing->bill_calculation_days, 'salary_type' => $billing_costing->salary_type, 'billing_type' => $billing_costing->billing_type, 'salary_days' => $billing_costing->salary_days, 'duty_hrs' => $billing_costing->duty_hrs,'cnt_advance' => $advance->cnt,'advance' => $advance->balance, 'fix' => $advance->emi,'cnt_loan' => $loan->cnt, 'advance_loan' => $loan->balance, 'fix_loan' => $loan->emi, 'cnt_misc' => $misc->cnt,'advance_misc' => $misc->balance, 'fix_misc' => $misc->emi, 'status' => 1));
    }

    public function edit_client_attendance($client_attendance_id)
    {


        if(check_uri_permission('client_attendance/client', 'E') == 0){
         $this->session->set_flashdata('error_msg', 'You have no permission on this page');
         redirect(base_url());
         }

        $data['client_details'] = $this->cam->getClientDetails($client_attendance_id);
        $emp_id = $data['client_details']->employee_id;
        $data['advance'] = $this->cam->getAdvance($emp_id);
        $data['loan'] = $this->cam->getLoan($emp_id);
        $data['misc'] = $this->cam->getMisc($emp_id);
		
		$data['action_type'] = 'edit';
		$data['mode'] = 'editable';
       

      if(!empty($this->input->post())){

            $this->form_validation->set_rules('duty','Duty','required');

            if ($this->form_validation->run() == TRUE){
                    $client_attendance_id = $this->input->post('client_attendance_id');
                    $duty = $this->input->post('duty');
                    $w_o = $this->input->post('w_o');
                    $leave = $this->input->post('leave');
                    $el = $this->input->post('el');
                    $fl = $this->input->post('fl');
                    $c_o = $this->input->post('c_o');
                    $ph = $this->input->post('ph');
                    $advance_deduct = $this->input->post('advance_deduct');
                    $loan_deduct = $this->input->post('loan_deduct');
                    $uniform_deduct = $this->input->post('uniform_deduct');
                    $fine_deduct = $this->input->post('fine_deduct');
                    $other_deduct = $this->input->post('other_deduct');
                    $ot = $this->input->post('ot');
                    $na_duty = $this->input->post('na_duty');
                    $na = $this->input->post('na');
                
                    $qry = $this->cam->UpdateClientAttendance($client_attendance_id,$duty,$w_o,$leave,$el,$fl,$c_o,$ph,$advance_deduct,$loan_deduct,$uniform_deduct,$fine_deduct,$other_deduct,$ot,$na_duty,$na);
                    if($qry)
                    {
                        $this->session->set_flashdata('msg', 'Data Saved Successfully');
                        redirect(base_url().'client_attendance/edit_client_attendance/'.$client_attendance_id);
                    }
              }
        
         }

        $this->template->write('title', 'Dashboard', TRUE);
    	$this->template->add_js('assets/js/select2.min.js');
    	$this->template->add_js('assets/js/bootstrap-select.js');
        $this->template->add_js('assets/js/bootstrap-datepicker.min.js');
        
    	$this->template->add_css('assets/css/select2.css');
    	$this->template->add_css('assets/css/bootstrap-select.css');
        $this->template->add_css('assets/css/datepicker.css');
        $this->template->write_view('content', 'edit_client_attendance', $data, TRUE);
        $this->template->render();  
    }
	
	public function approve($client_attendance_id){
        if(check_uri_permission('client_attendance/client', 'D') == 0){
			$this->session->set_flashdata('error_msg', 'You have no permission on this page');
			redirect(base_url());
        }

        $data['client_details'] = $this->cam->getClientDetails($client_attendance_id);
        $emp_id = $data['client_details']->employee_id;
        $data['advance'] = $this->cam->getAdvance($emp_id);
        $data['loan'] = $this->cam->getLoan($emp_id);
        $data['misc'] = $this->cam->getMisc($emp_id);
		
		$data['action_type'] = 'approve';
		$data['mode'] = 'readonly';
		$data['approval'] = $this->cam->check_approval_permission();
		
		if(!empty($this->input->post())){
			$this->form_validation->set_rules('approval_remarks','Approve/ Reject Remarks','trim|required');
			if ($this->form_validation->run() == TRUE){
				$client_attendance_id = $this->input->post('client_attendance_id');
				$approval_remarks = $this->input->post('approval_remarks');
				$action = $this->input->post('action');
				
				$qry = $this->cam->updateAttendanceApproval($client_attendance_id, $approval_remarks, $action);
				if($qry) {
					$this->session->set_flashdata('msg', 'Data Saved Successfully');
					redirect(base_url('client_attendance/client'));
				}
				
			}
		}
		
        $this->template->write('title', 'Dashboard', TRUE);
    	$this->template->add_js('assets/js/select2.min.js');
    	$this->template->add_js('assets/js/bootstrap-select.js');
        $this->template->add_js('assets/js/bootstrap-datepicker.min.js');
        
    	$this->template->add_css('assets/css/select2.css');
    	$this->template->add_css('assets/css/bootstrap-select.css');
        $this->template->add_css('assets/css/datepicker.css');
        $this->template->write_view('content', 'edit_client_attendance', $data, TRUE);
        $this->template->render();  
    }

    public function attendance_list()
    {
        $client_id = $this->input->post('client_id');
        $branch_id = $this->input->post('branch_id');
        $attendance_month = $this->input->post('attendance_month');
        $attendance_list=$this->cam->attendance_list($client_id,$branch_id,$attendance_month);
        echo json_encode(array('attendance_list' => $attendance_list,'newHash' => $this->security->get_csrf_hash(), 'status' => 1));

    }

    public function client_check($str) {

    	$str = $this->input->post('designation_id');

        $client_id = NULL;
        if(!empty($this->input->post('client_id'))){
            $client_id = $this->input->post('client_id');
        }

        $branch_id = NULL;
        if(!empty($this->input->post('branch_id'))){
            $branch_id = $this->input->post('branch_id');
        }

        $employee_id = NULL;
        if(!empty($this->input->post('employee_id'))){
            $employee_id = $this->input->post('employee_id');
        }

        $new_employee_id = NULL;
        if(!empty($this->input->post('employee_id')) && $employee_id == 'N')
        {
            $new_employee_id = $this->input->post('new_employee_id');
        }

        $month_year = NULL;
        if(!empty($this->input->post('month_year'))){
            $month_year = $this->input->post('month_year');
        }

        $check = $this->cam->checkClient($str,$client_id,$branch_id,$month_year,$employee_id,$new_employee_id);
        if($check)
        {
            $this->form_validation->set_message('client_check', ' Client Name, Branch Name, Designation , Attendance Month and Employee Name should not be same ');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }   
	
}
