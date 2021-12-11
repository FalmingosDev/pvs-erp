<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Staff_tid_xl extends MY_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		
		$this->load->model('Staff_tid_xl_model');
		$this->load->library('form_validation');
		
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url'));
	}
	

	public function index()
	{

		if(check_uri_permission('staff_tid_xl', 'V') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 
		// $data['payment_month_pdf']  = $this->input->get('month');
        // $data['payment_year_pdf']  = $this->input->get('year');	
		// $data['tid_pdf']  = $this->input->get('tid');

		$data['payment_month']  = $this->input->get('payment_month');
		$data['payment_year']  = $this->input->get('payment_year');
		$data['tid']  = $this->input->get('tid');

		$data['list'] = $this->Staff_tid_xl_model->get_all_records($data['payment_year'], $data['payment_month'],$data['tid']);
		
		$month_obj = $this->Staff_tid_xl_model->get_all_month();
		//print_r($month_obj);die;
		$month_list = array('' => 'Select Month');
		foreach($month_obj as $payment_month)
		{
			$month_list[$payment_month->payment_month] = $payment_month->payment_month;
		}
		$data['payment_month'] = $month_list;

		$year_obj = $this->Staff_tid_xl_model->get_all_year();
		//print_r($year_obj);die;
		$year_list = array('' => 'Select Year');
		foreach($year_obj as $payment_year)
		{
			$year_list[$payment_year->payment_year] = $payment_year->payment_year;
		}
		$data['payment_year'] = $year_list;

		$tid_obj = $this->Staff_tid_xl_model->get_all_tid();
		//print_r($tid_obj);die;
		$tid_list = array('' => 'Select TID');
		foreach($tid_obj as $tid)
		{
			$tid_list[$tid->tid] = $tid->tid;
		}
		$data['tid'] = $tid_list;
		
		$this->template->write('title', 'Staff Payment TID List', TRUE);
        
        $this->template->add_js('assets/js/jquery.dataTables.min.js');
        $this->template->add_js('assets/js/dataTables.bootstrap4.min.js');
        
        $this->template->add_css('assets/css/dataTables.bootstrap4.min.css');
		
        $this->template->write_view('content', 'list', $data, TRUE);
		
        $this->template->render();
		
		
	}


	public function client_tid_list()
	{
		
		$account_no = $this->input->post('account_no');
		$net_pay = $this->input->post('net_pay');
		$bank_name = $this->input->post('bank_name');
		$reference_no = $this->input->post('reference_no');
		$employee_code = $this->input->post('employee_code');
		$employee_name = $this->input->post('employee_name');
		$employee_desig = $this->input->post('employee_desig');
		$payment_month = $this->input->post('payment_month');
		$payment_year = $this->input->post('payment_year');
		$payment_date = $this->input->post('payment_date');
		$tid=$this->input->post('tid');
		$unit_code=$this->input->post('unit_code');
		$unit=$this->input->post('unit');
		$location=$this->input->post('location');
		// $tid=$this->input->post('tid');
		// $tid=$this->input->post('tid');
		$data = array();
		$list = $this->Staff_tid_xl_model->client_tid_list($account_no,$reference_no,$net_pay,$bank_name,$employee_code,$payment_month,$payment_year,$tid,$employee_name,$employee_desig,$payment_date,$unit_code,$unit,$location);
		//print_r($list);exit();
		foreach($list as $list){
			$data[] = array(
					'payroll_id' => $list->payroll_id,'account_no' => $list->account_no, 'reference_no' => $list->reference_no,  
					'net_pay' => $list->net_pay, 'bank_name' => $list->bank_name,'employee_code' => $list->employee_code,'employee_name' => $list->employee_name,'employee_desig' => $list->employee_desig,'unit_code' => $list->unit_code,'unit' => $list->unit,'payment_date' => $list->payment_date,'location' => $list->location,'tid' => $list->tid);
				//	print_r($data); exit;
				
		}
		echo json_encode(array('list' => $data, 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}


	public function search_data()
	{
		$month  = $this->input->post('month');
		$year  = $this->input->post('year');
		$tid  = $this->input->post('tid');
		 
		// print_r ($tid); exit;
		
		$data['list'] = $this->Staff_tid_xl_model->get_all_records($year,$month,$tid);
		// print_r($data['list']);die;
		
		//$this->template->write_view('content', 'list', $data, TRUE);
        //$this->template->render();
		//print_r ($data); exit;
		echo json_encode(array('list' => $data['list'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}


	
	public function staff_tid_xl_excel()
	{	 
		
		$year =  $this->input->post('year');
		$month =  $this->input->post('month');
		$tid =  $this->input->post('tid');
		
		//print_r ($month_id); exit;
		
		 $spreadsheet = new Spreadsheet();
		 $spreadsheet->setActiveSheetIndex(0);  
		 $sheet = $spreadsheet->getActiveSheet();
		 
		 $sheet->setCellValue('A1', 'Date - '.date('d/m/Y'));
		 
		 
		 $sheet->setCellValue('A2', 'TID');
		 $sheet->setCellValue('B2', 'Unit Code');
		 $sheet->setCellValue('C2', 'Unit');
		 $sheet->setCellValue('D2', 'Location');
		 $sheet->setCellValue('E2', 'Employee Code');
		 $sheet->setCellValue('F2', 'Employee Name');
		 $sheet->setCellValue('G2', 'Employee Designation');
		 $sheet->setCellValue('H2', 'A/C No');
		 $sheet->setCellValue('I2', 'Ref No');
		 $sheet->setCellValue('J2', 'Bank Name');
		 $sheet->setCellValue('K2', 'Net Pay');
		 $sheet->setCellValue('L2', 'Pay Date');
		//  $sheet->setCellValue('M2', 'Company Location');
		//  $sheet->setCellValue('N2', 'Com Cash');
		//  $sheet->setCellValue('O2', 'Com Bank');
		//  $sheet->setCellValue('P2', 'Com Corpid');
		//  $sheet->setCellValue('Q2', 'Com Dbcr');
		//  $sheet->setCellValue('R2', 'Com Narr');
		//  $sheet->setCellValue('S2', 'Com Scat');
		//  $sheet->setCellValue('T2', 'Com Regi');
		
		 
		 $styleArray = array(
		'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000000'),
			));
			
		$list = $data['list'] = $this->Staff_tid_xl_model->get_all_records($year,$month,$tid);
		//print_r($data);exit;
		
		$sheet->getStyle('A1:T2')->applyFromArray($styleArray);
	
		foreach(range('A','T') as $columnID)
		{
			$sheet->getColumnDimension($columnID)->setAutoSize(true);
		}
	
	
		$StCount = 3;
		foreach($list as $list){
			$sheet->setCellValue('A'.$StCount, $list->tid);
			$sheet->setCellValue('B'.$StCount, $list->unit_code);
			$sheet->setCellValue('C'.$StCount, $list->unit);
			$sheet->setCellValue('D'.$StCount, $list->location);
			$sheet->setCellValue('E'.$StCount, $list->employee_code);
			$sheet->setCellValue('F'.$StCount, $list->employee_name);
			$sheet->setCellValue('G'.$StCount, $list->employee_desig);
			$sheet->setCellValue('H'.$StCount, $list->account_no);
			$sheet->setCellValue('I'.$StCount, $list->reference_no);
			$sheet->setCellValue('J'.$StCount, $list->bank_name);
			$sheet->setCellValue('K'.$StCount, $list->net_pay);
			$sheet->setCellValue('L'.$StCount, $list->payment_date);
			// $sheet->setCellValue('M'.$StCount,'' );
			// $sheet->setCellValue('N'.$StCount, );
			// $sheet->setCellValue('O'.$StCount, );
			// $sheet->setCellValue('P'.$StCount, );
			// $sheet->setCellValue('Q'.$StCount, );
			// $sheet->setCellValue('R'.$StCount, );
			// $sheet->setCellValue('S'.$StCount, );
			// $sheet->setCellValue('T'.$StCount, );
			
			
			$StCount++;
		} 
		//print_r($data);exit;
		// $sheet->setCellValue('B', $row['order_no']);
		 //$sheet->setCellValue();
		 
		 
		 $writer = new Xlsx($spreadsheet);
		 
		 $filename = 'staff_tid_xl_excel';
		 
		 header('Content-Type: application/vnd.ms-excel');
		 header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		 header('Cache-Control: max-age=0');
		 
		 $writer->save('php://output'); // download file 
		 
	}
	
	
}

