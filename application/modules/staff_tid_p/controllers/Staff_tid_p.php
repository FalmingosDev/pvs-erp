<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff_tid_p extends MY_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		
		$this->load->model('Staff_tid_p_model');
		$this->load->library('form_validation');
		
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url'));
	}
	

	public function index()
	{

		if(check_uri_permission('Staff_tid_p', 'V') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 
        // $data['payment_month_pdf']  = $this->input->get('month');
        // $data['payment_year_pdf']  = $this->input->get('year');	
		// $data['tid_pdf']  = $this->input->get('tid');


		$data['payment_month']  = $this->input->get('month');	
		$data['payment_year']  = $this->input->get('year');	
		$data['tid']  = $this->input->get('tid');
		
		if(!empty($data['payment_year']) || !empty($data['payment_month']) || !empty($data['tid']))
		{
		$data['list'] = $this->Staff_tid_p_model->get_all_records($data['payment_year'], $data['payment_month'],$data['tid']);
		}
		else{
			$data['list'] = array();
		}
		
		$month_obj = $this->Staff_tid_p_model->get_all_month();
		//print_r($month_obj);die;
		$month_list = array('' => 'Select Month');
		foreach($month_obj as $payment_month)
		{
			$month_list[$payment_month->payment_month] = $payment_month->payment_month;
		}
		$data['payment_month'] = $month_list;

		$year_obj = $this->Staff_tid_p_model->get_all_year();
		//print_r($year_obj);die;
		$year_list = array('' => 'Select Year');
		foreach($year_obj as $payment_year)
		{
			$year_list[$payment_year->payment_year] = $payment_year->payment_year;
		}
		$data['payment_year'] = $year_list;

		$tid_obj = $this->Staff_tid_p_model->get_all_tid();
		//print_r($tid_obj);die;
		$tid_num = array('' => 'Select TID');
		//print_r($tid_num);die;
		foreach($tid_obj as $tid)
		{
			$tid_num[$tid->tid] = $tid->tid;
		}
		//print_r($tid_num);die;
		$data['tid'] = $tid_num;
       
		
		$this->template->write('title', 'Staff Payment TID List', TRUE);
        
        $this->template->add_js('assets/js/jquery.dataTables.min.js');
        $this->template->add_js('assets/js/dataTables.bootstrap4.min.js');
        
        $this->template->add_css('assets/css/dataTables.bootstrap4.min.css');
		
        $this->template->write_view('content', 'list', $data, TRUE);
		
        $this->template->render();
		
		
	}


	public function staff_tid_p_list()
	{
		$account_no = $this->input->post('account_no');
		$net_pay = $this->input->post('net_pay');
		$bank_name = $this->input->post('bank_name');
		$reference_no = $this->input->post('reference_no');
		$employee = $this->input->post('employee');
		$unit = $this->input->post('unit');
		$payment_month = $this->input->post('payment_month');
		$payment_year = $this->input->post('payment_year');
		$tid=$this->input->post('tid');


		
		$data = array();

		$list = $this->Staff_tid_p_model->staff_tid_p_list($account_no,$reference_no,$net_pay,$bank_name,$employee,$unit,$payment_month,$payment_year,$tid);
		//print_r($list);exit();
		foreach($list as $list){
			$data[] = array(
					'account_no' => $list->account_no, 'reference_no' => $list->reference_no,  
					'net_pay' => $list->net_pay, 'bank_name' => $list->bank_name,'employee' => $list->employee,'unit' => $list->unit);
				//	print_r($data); exit;
				
		}
		echo json_encode(array('list' => $data, 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}


	public function search()
	{
		$month  = $this->input->post('month');
		$year  = $this->input->post('year');
		$tid  = $this->input->post('tid');
		
		$data['list'] = $this->Staff_tid_p_model->get_all_records($year,$month,$tid);
		//print_r($data['list']);die;
		echo json_encode(array('list' => $data['list'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}
	


	public function staff_tid_p_pdf(){	

		$year =  $this->input->get('year', TRUE);
		$month =  $this->input->get('month', TRUE);
		$tid =  $this->input->get('tid', TRUE);


    	$account_no = $this->input->post('account_no');
		$net_pay = $this->input->post('net_pay');
		$bank_name = $this->input->post('bank_name');
		$reference_no = $this->input->post('reference_no');
		$employee = $this->input->post('employee');
		$unit = $this->input->post('unit');
		$payment_month = $this->input->post('payment_month');
		$payment_year = $this->input->post('payment_year');
		$tid_number = $this->input->post('tid');
		
		$data = array();

           if(!empty($year) || !empty($month) || !empty($tid))
           {
			$list = $data['list'] = $this->Staff_tid_p_model->get_all_records($year,$month,$tid);
			// print_r($data); exit;
			$data['tid'] = $data['list'][0]->tid;
			$data['total'] = $this->Staff_tid_p_model->get_unit_total($year,$month,$tid);
		   }
		   else
		   {

	    	$list = $data['list'] = $this->Staff_tid_p_model->staff_tid_p_list($account_no,$reference_no,$net_pay,$bank_name,$employee,$unit,$payment_month,$payment_year,$tid);
	       }

		foreach($list as $list){
			$data[] = array(
					'account_no' => $list->account_no, 'reference_no' => $list->reference_no,  
					'net_pay' => $list->net_pay, 'bank_name' => $list->bank_name,'employee' => $list->employee,'unit' => $list->unit);
				//	print_r($data); exit;
				
			}

        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('staff_tid_p_pdf',$data,true);
		// $html = $this->load->view('staff_tid_p_pdf','',true);
         $mpdf->WriteHTML($html);
         $mpdf->Output(); // opens in browser
        // $mpdf->Output('staff_tid_p.pdf','D'); // it downloads the file into the user system, with give name

    }



	
	
	
}

