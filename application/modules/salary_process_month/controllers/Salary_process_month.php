<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salary_process_month extends MY_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		$this->load->library('form_validation');
		
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url'));
        $this->load->model('Salary_process_model','spm');
	}
	
	
	
	public function index()
    {


        // if(check_uri_permission('client_attendance/client', 'A') == 0){
        //  $this->session->set_flashdata('error_msg', 'You have no permission on this page');
        //  redirect(base_url());
        //  }


		if(!empty($this->input->post()))
        {
			
            $this->form_validation->set_rules('month_year','Month & Year','required'); 
            if ($this->form_validation->run() == TRUE)
            {
             	$month_year = $this->input->post('month_year'); 
                $month_year_old= $this->input->post('month_year_old');
                $year=date('Y', strtotime($month_year));
                $old_year=date('Y', strtotime($month_year_old));

                $month=date('m', strtotime($month_year));
                $old_month=date('m', strtotime($month_year_old));
                // echo 'y'.$year.'oy'.$old_year.'m'.$month.'om'.$old_month;
                // die;

                if($old_year<=$year)
                {
                    if($old_month<$month)
                    {
                        $month_id = $this->input->post('month_id');
                        $attendance_month = $month_year.'-01';
                        $this->spm->salary_process_month_uddate($month_id,$attendance_month);
                        $this->session->set_flashdata('msg', 'Data Updated Successfully');
                        redirect(base_url().'salary_process_month');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Please select month greater than previus month.');
                        redirect(base_url().'salary_process_month'); 
                        
                    }
                }
                else
                {
                    $this->session->set_flashdata('error', 'Please select year greater than previus year.');
                    redirect(base_url().'salary_process_month');
                    
                }
            }
	    }

        
        
        $data['salary_process_month'] = $this->spm->salary_process_month();

		
        $this->template->add_js('assets/js/jquery.dataTables.min.js');
        $this->template->add_js('assets/js/dataTables.bootstrap4.min.js');
        //$this->template->add_js('assets/js/bootstrap-datepicker.min.js');

                
        /**
         * if you have any css to add for this page
         */
        //$this->template->add_css('assets/css/datepicker.css');
        $this->template->add_css('assets/css/dataTables.bootstrap4.min.css');
		
        // echo "<pre>";
        // print_r($data);
        // die;

		$this->template->write('title', 'Dashboard', TRUE);
		$this->template->write_view('content', 'salary_process_mounth', $data, TRUE);
        $this->template->render();
	}

		
}
