<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave extends MY_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		$this->load->model('employee_details/employee_details_model','em');
		$this->load->model('leave_model','lm');
		$this->load->library('form_validation');
		
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{

         if(check_uri_permission('leave', 'V') == 0){
         $this->session->set_flashdata('error_msg', 'You have no permission on this page');
         redirect(base_url());
         }
         
		$data = [];
        $data['employee_id'] = $this->session->employee_id;
        $employee_id = $data['employee_id'];
        //echo $user_id = $this->session->user_id;die;
        $data['user_list'] = $this->lm->getUserList($employee_id);
        $data['approval_list'] = $this->lm->getApprovalList($employee_id);
        //print_r($data['approval_list']);die;
        $this->template->write('title', 'My Leaves', TRUE);
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
	
	public function apply(){
		$url_emp_id = $this->session->employee_id;
		if(!empty($this->input->post())){
             $this->form_validation->set_rules('leave_type','Leave Type','required');
			 $this->form_validation->set_rules('employee_id','Employee Code','required|callback_employee_check');
             $this->form_validation->set_rules('no_leave','No of Leave','trim|required');
             $this->form_validation->set_rules('leave_address','Address During Leave','trim|required');
             $this->form_validation->set_rules('leave_reason','Leave Reason','trim|required');
             $this->form_validation->set_rules('approver_id','Approver Name','required');
             
             
             if ($this->form_validation->run() == TRUE)
             {
                $half_day = NULL;
                $employee_id = $this->input->post('employee_id');
                $department_id = $this->input->post('department_id');
                $leave_type = $this->input->post('leave_type');
                $half_day = $this->input->post('half_day');
                $leave_from = $this->input->post('leave_from');
                if(!$half_day)
                {
                    $half_day = 0;
                    $leave_to = $this->input->post('leave_to');
                }
                else
                {
                    $leave_to = $leave_from;
                }
                //echo $half_day;die;
                $no_leave = $this->input->post('no_leave');
                $leave_address = $this->input->post('leave_address');
                $home_address = $this->input->post('home_address');
                $leave_reason = $this->input->post('leave_reason');
                $approver_id = $this->input->post('approver_id');
                
               
                
                $qry = $this->lm->insertDetails($employee_id,$department_id,$leave_type,$half_day,$leave_from,$leave_to,$no_leave,$leave_address,$home_address,$leave_reason,$approver_id);

             //    $empd_id = $qry['empd_id'];
                if($qry)
                {
                    $this->session->set_flashdata('msg', 'Data Saved Successfully');
                    redirect(base_url().'leave/apply/'.$employee_id);
                }
                
            }
	 }
		$data['employee'] = $this->em->EmpDetails($url_emp_id);

		$data['dept'] = $this->lm->EmpDept($url_emp_id);
       // print_r($data['employee']);die;
		$approver_obj = $this->lm->approverName($url_emp_id);
		//print_r($data['approver']);die;
		$approver_list = array('' => 'Select Approver Name');
        foreach($approver_obj as $approver){
            $approver_list[$approver->employee_id] = $approver->first_name . ' '.$approver->last_name;
        }
        $data['approver'] = $approver_list;
		
		$this->template->write('title', 'Apply Leave', TRUE);
        
        
		
        $this->template->write_view('content', 'apply', $data, TRUE);
        $this->template->render();
	}

     public function employee_check($str) {
        $str = $this->input->post('employee_id');

        $from_date = NULL;
        if(!empty($this->input->post('leave_from'))){
            $from_date = $this->input->post('leave_from');
        }

        $check = $this->lm->checkEmployee($str,$from_date);
        if($check)
        {
            $this->form_validation->set_message('employee_check', 'The {field} field with From Date is already exist');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    public function approve_action($leave_id, $approver_level){
        $data['leave_details'] = $this->lm->GetLeaveDetails($leave_id);
        $data['approver_level'] = $approver_level;

        if(!empty($this->input->post())){
            $this->load->library("security");
            //echo "1";die;
             $this->form_validation->set_rules('approve_remarks','Approve/ Reject Remarks','trim|required');
             if ($this->form_validation->run() == TRUE){
                 $leave_id = $this->input->post('leave_id');
                 $approver_level = $this->input->post('approver_level');
                 $approve_remarks = $this->input->post('approve_remarks');
                 $action = $this->input->post('action');
                
                $qry = $this->lm->updateLeaveApproval($leave_id, $approver_level, $approve_remarks,$action);
                if($qry) {
                    //$this->session->set_flashdata('msg', 'Successfully Updated');
                    redirect(base_url().'leave');
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
        $this->template->write_view('content', 'approve_action', $data, TRUE);
        $this->template->render();
    }
	
}

	