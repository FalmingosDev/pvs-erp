<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_tid extends MY_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
	
		$this->load->model('Client_tid_model');
		$this->load->library('form_validation');
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url'));

	}
	

	public function index()
	{

		if(check_uri_permission('client_tid', 'V') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 
		
		$data['month']  = $this->input->get('month');
		$data['year']  = $this->input->get('year');
		$data['tid']  = $this->input->get('tid');

		if(!empty($data['year']) || !empty($data['month']) || !empty($data['tid']))
		{
		$data['list'] = $this->Client_tid_model->get_all_records($data['year'], $data['month'],$data['tid']);
		}
		else{
			$data['list'] = array();
		}
		
		$month_obj = $this->Client_tid_model->get_all_month();
		//print_r($month_obj);die;
		$month_list = array('' => 'Select Month');
		foreach($month_obj as $month)
		{
			$month_list[$month->payment_month_number] = $month->month;
		}
		$data['month'] = $month_list;

		$year_obj = $this->Client_tid_model->get_all_year();
		//print_r($year_obj);die;
		$year_list = array('' => 'Select Year');
		foreach($year_obj as $year)
		{
			$year_list[$year->year] = $year->year;
		}
		$data['year'] = $year_list;
		//print_r($data['year']);die;

		/*$tid_obj = $this->Client_tid_model->get_all_tid();
		//print_r($tid_obj);die;
		$tid_num = array('' => 'Select TID');
		//print_r($tid_num);die;
		foreach($tid_obj as $tid)
		{
			$tid_num[$tid->tid] = $tid->tid;
		}
		//print_r($tid_num);die;
		$data['tid'] = $tid_num;*/

		//print_r($data['tid']);die;
		
		$this->template->write('title', 'Client TID List', TRUE);
        
        $this->template->add_js('assets/js/jquery.dataTables.min.js');
        $this->template->add_js('assets/js/dataTables.bootstrap4.min.js');
        
        $this->template->add_css('assets/css/dataTables.bootstrap4.min.css');
		
        $this->template->write_view('content', 'list', $data, TRUE);
		
        $this->template->render();
		
		
	}
	
	public function tidlist()
	{
		$month_id  = $this->input->post('month_id');
		$data['tidlist'] = $this->Tid_model->get_all_tid($month_id);
		
		echo json_encode(array('tidlist' => $data['tidlist'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}


	public function client_tid_list()
	{
		
		$account_no = $this->input->post('account_no');
		$net_pay = $this->input->post('net_pay');
		$bank_name = $this->input->post('bank_name');
		$reference_no = $this->input->post('reference_no');
		$employee = $this->input->post('employee');
		$client = $this->input->post('client');
		$month = $this->input->post('month');
		$year = $this->input->post('year');
		$tid=$this->input->post('tid');


		
		$data = array();
		$list = $this->Client_tid_model->client_tid_list($account_no,$reference_no,$net_pay,$bank_name,$employee,$client,$month,$year,$tid);
		//print_r($list);exit();
		foreach($list as $list){
			$data[] = array(
					'payroll_id' => $list->payroll_id,'account_no' => $list->account_no, 'reference_no' => $list->reference_no,  
					'net_pay' => $list->net_pay, 'bank_name' => $list->bank_name,'employee' => $list->employee,'client' => $list->client);
				//	print_r($data); exit;
				
		}
		echo json_encode(array('list' => $data, 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}


	public function search()
	{
		$month  = $this->input->post('month');
		$year  = $this->input->post('year');
		$tid  = $this->input->post('tid');
		
		$data['list'] = $this->Client_tid_model->get_all_records($year,$month,$tid);
		//print_r($data['list']);die;
		echo json_encode(array('list' => $data['list'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}



	public function client_tid_pdf(){	

		

		$year =  $this->input->get('year', TRUE);
		$month =  $this->input->get('month', TRUE);
		$tid =  $this->input->get('tid', TRUE);
		// print_r($year); exit;
    	$account_no = $this->input->post('account_no');
		$net_pay = $this->input->post('net_pay');
		$bank_name = $this->input->post('bank_name');
		$reference_no = $this->input->post('reference_no');
		$employee = $this->input->post('employee');
		$client = $this->input->post('client');
		$payment_month = $this->input->post('payment_month');
		$payment_year = $this->input->post('payment_year');
		$tid_number = $this->input->post('tid');
		
		$data = array();
		
           if(!empty($year) || !empty($month) || !empty($tid))
           {
			$list = $data['list'] = $this->Client_tid_model->get_all_records($year,$month,$tid);
			
			// print_r($data); exit;
			$data['tid'] = $data['list'][0]->tid;
			$data['total'] = $this->Client_tid_model->get_unit_total($year,$month,$tid);
			//print_r($data['total']);die;
			
		   }
		   else
		   {

	    	 $data['list'] = $this->Client_tid_model->client_tid_list($account_no,$reference_no,$net_pay,$bank_name,$employee,$client,$payment_month,$payment_year,$tid);
			//  print_r($data['list']);die;
	       }

		foreach($list as $list){
			$data[] = array(
					'account_no' => $list->account_no, 'reference_no' => $list->reference_no,  
					'net_pay' => $list->net_pay, 'bank_name' => $list->bank_name,'employee' => $list->employee,'client' => $list->client);
					// print_r($data); exit;
				
			}
			// print_r($data); exit;
			$mpdf = new \Mpdf\Mpdf();
			$html = $this->load->view('client_tid_pdf', $data,true);
			$mpdf->WriteHTML($html);
			$mpdf->Output(); // opens in browser
         	// $mpdf->Output('client_tid.pdf','D'); // it downloads the file into the user system, with give name

    }



	
	
	
}

