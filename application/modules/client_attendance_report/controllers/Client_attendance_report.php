<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_attendance_report extends MY_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		$this->load->library('form_validation');
		
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url'));
        $this->load->model('Client_attendance_report_model','cam');
	}
	
	public function index() 
    {
        if(check_uri_permission('client_attendance/client', 'V') == 0){
			$this->session->set_flashdata('error_msg', 'You have no permission on this page');
			redirect(base_url());
		}
		$data = array();

		if (!empty($this->input->post('month')) || !empty($this->input->post('client_id'))){
			$month = $this->input->post('month');
			$client_id = $this->input->post('client_id');
			$data['client_attendance'] = $this->cam->client_attendance_report_search($month, $client_id);
		}
		else{
           
			$data['client_attendance'] = '';/*$this->cam->client_attendance_report_list();*/
		}
		
		$data['approval'] = $this->cam->check_approval_permission();
		
		$client_obj = $this->cam->getClientName();
        $client_list = array('' => 'Select Client');
        foreach($client_obj as $client){
            $client_list[$client->client_id] = $client->client_name;
        }
        $data['client'] = $client_list;

        $month_obj = $this->cam->getMonth();
        $month_list = array('' => 'Select Month & Year');
        foreach($month_obj as $month){
            $month_list[$month->attendance_month] = $month->MonthYear;
        }
        $data['month'] = $month_list;
		// echo "<pre>";
		// print_r($data);
        // die;
        $this->template->write('title', 'Client Attendance Report', TRUE);
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
		
        $this->template->write_view('content', 'list', $data, TRUE);
        $this->template->render();
    
	}
	
	public function pf_pdf($id = NULL)
	{
        $month=$this->input->get('month');
        $client_id=$this->input->get('client_id');
        if(!empty($month) || !empty($client_id))
        {
          $data['client_attendance'] =$this->cam->client_attendance_report_search($month,$client_id);
          //pr($data);
          $mpdf = new \Mpdf\Mpdf();
          $date = date('d-m-Y');
          $time = date('H-i-s');
          $pdf_name=$date.'_'.$time.'.pdf';
          $html = $this->load->view('pf_pdf',$data,true);
          $mpdf->WriteHTML($html);
          //$mpdf->Output(); // opens in browser
          $mpdf->Output($pdf_name,'D'); // it downloads the file into the user system, with give name
          
        }
        else
        {
         redirect('client_attendance_report');
        }
       
	}
	
}
