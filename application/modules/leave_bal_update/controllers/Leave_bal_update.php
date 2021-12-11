<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave_Bal_Update extends MY_Controller {

  public function __construct() {
    parent::__construct();
    if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
      redirect('login');
    }
    $this->load->library("session");
    $this->load->model('leave_bal_update_model','em');
    $this->load->model('client/client_model','cm');
    $this->load->library('form_validation');
  	$this->load->helper(array('form', 'url'));
  	$this->form_validation->CI =& $this;
  	$this->load->helper('file');
  	$this->load->library('session');
  	
    }
  
  public function index(){

    if(check_uri_permission('leave_bal_update', 'V') == 0){
    $this->session->set_flashdata('error_msg', 'You have no permission on this page');
    redirect(base_url());
    }

    $data = [];
    
    $this->template->write('title', 'Leave Balance', TRUE);

    $user_branch_id = $this->session->user_branch_id;
    $data['employees'] = $this->em->employee_list($user_branch_id);
    
        
  $this->template->add_js('assets/js/jquery.dataTables.min.js');
  $this->template->add_js('assets/js/dataTables.bootstrap4.min.js');
  
  $this->template->add_css('assets/css/dataTables.bootstrap4.min.css');


	$this->template->write_view('content', 'list', $data, TRUE);
	$this->template->render();
  }
  
  
	public function ajax_employee_list(){
		
	}

  public function edit($employee_id)
    {

        if(check_uri_permission('leave_bal_update', 'E') == 0){
        $this->session->set_flashdata('error_msg', 'You have no permission on this page');
        redirect(base_url());
        }


      $data['edit_leave'] = $this->em->editLeave($employee_id);
         if(!empty($this->input->post())){
        $this->form_validation->set_rules('opening_el','Opening Balance EL','trim');
        $this->form_validation->set_rules('opening_sl','Opening Balance SL','trim');
        $this->form_validation->set_rules('opening_cl','Opening Balance CL','trim');
        $this->form_validation->set_rules('el','Leave Taken EL','trim');
        $this->form_validation->set_rules('sl','Leave Taken SL','trim');
        $this->form_validation->set_rules('cl','Leave Taken CL','trim');

        if ($this->form_validation->run() == TRUE){
                   $employee_id = $this->input->post('employee_id');
                   $op_el = $this->input->post('opening_el');
                   $op_sl = $this->input->post('opening_sl');
                   $op_cl = $this->input->post('opening_cl');
                   $lt_el = $this->input->post('el');
                   $lt_sl = $this->input->post('sl');
                   $lt_cl = $this->input->post('cl');
                   
                    $qry = $this->em->UpdateLeave($employee_id, $op_el, $op_sl, $op_cl, $lt_el, $lt_sl, $lt_cl);
                if($qry)
                {
                    $this->session->set_flashdata('msg', 'Successfully Updated');
                    redirect(base_url().'leave_bal_update/edit/'. $employee_id);
                }
            }
            else
            {
              if(!empty($this->input->post('opening_el')))
                {
                    // $op_el_obj = $this->input->post('opening_el');
                    // $data['leave_bal_update']['opening_el'] = $op_el_obj;
                    $data['leave_bal_update']['opening_el'] = $this->input->post('opening_el');

                }
                if(!empty($this->input->post('opening_sl')))
                {
                    // $op_sl_obj = $this->input->post('opening_sl');
                    // $data['leave_bal_update']['opening_sl'] = $op_sl_obj;
                    $data['leave_bal_update']['opening_sl'] = $this->input->post('opening_sl');
                }
                if(!empty($this->input->post('opening_cl')))
                {
                    // $op_cl_obj = $this->input->post('opening_cl');
                    // $data['leave_bal_update']['opening_cl'] = $op_cl_obj;
                    $data['leave_bal_update']['opening_cl'] = $this->input->post('opening_cl');
                }
                if(!empty($this->input->post('el')))
                {
                    // $lt_el_obj = $this->input->post('el');
                    // $data['leave_bal_update']['el'] = $lt_el_obj;
                    $data['leave_bal_update']['el'] = $this->input->post('el');
                }
                if(!empty($this->input->post('sl')))
                {
                    // $lt_sl_obj = $this->input->post('sl');
                    // $data['leave_bal_update']['sl'] = $lt_sl_obj;
                    $data['leave_bal_update']['sl'] = $this->input->post('sl');
                  
                }
                if(!empty($this->input->post('cl')))
                {
                    // $lt_cl_obj = $this->input->post('cl');
                    // $data['leave_bal_update']['cl'] = $lt_cl_obj;
                    $data['leave_bal_update']['cl'] = $this->input->post('cl');
                }
            
            }
          }
            $this->template->write('title', 'Dashboard', TRUE);
            $this->template->add_js('assets/js/select2.min.js');
            $this->template->add_js('assets/js/bootstrap-select.js');
            $this->template->add_js('assets/js/bootstrap-datepicker.min.js');

            $this->template->add_css('assets/css/datepicker.css');
            $this->template->add_css('assets/css/select2.css');
            $this->template->add_css('assets/css/bootstrap-select.css');


            $this->template->write_view('content', 'edit', $data, TRUE);
            $this->template->render();
     }


 }