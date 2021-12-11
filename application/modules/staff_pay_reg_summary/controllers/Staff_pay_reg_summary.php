<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Staff_pay_reg_summary extends MY_Controller {

  public function __construct() {
    parent::__construct();
    if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
      redirect('login');
    }
	
    $this->load->model('Staff_pay_reg_summary_model','pm');
	
    $this->load->library('form_validation');
  	$this->load->helper(array('form', 'url'));
  	$this->form_validation->CI =& $this;
  }
  
  public function index(){
    $data = [];
    //$data['list'] = $this->cm->client_list();
    //echo "<pre>"; print_r($data['list']); exit();
    if(check_uri_permission('staffpay_hold', 'V') == 0){
	     $this->session->set_flashdata('error_msg', 'You have no permission on this page');
	     redirect(base_url());
	     }

    $this->template->write('title', 'Pay Register Report', TRUE);
	/**
	 * if you have any css to add for this page
	 */

	$this->template->add_css('assets/css/dataTables.bootstrap4.min.css');


	/**
	 * if you have any js to add for this page
	 */
	$this->template->add_js('assets/js/jquery.dataTables.min.js');
	$this->template->add_js('assets/js/dataTables.bootstrap4.min.js');
	$this->template->add_js('assets/js/bootstrap-select.js');

	$data['months'] = $this->pm->fetch_month('');
	//$data['list'] = $this->pm->paylist('');
	
	
	$this->template->write_view('content', 'list', $data, TRUE);
	$this->template->render();
  }
  
   	
	public function branch()
	{
		$month_id  = $this->input->post('month_id');
		//print_r ($month_id); exit;
		$data['branch'] = $this->pm->branch_search($month_id);
		//print_r ($data); exit;
		echo json_encode(array('branch' => $data['branch'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}
	
	public function emp()
	{
		
		$branch_id  = $this->input->post('branch_id');
		
		$data['emp'] = $this->pm->employee($branch_id);
		//print_r ($data); exit;
		echo json_encode(array('emp' => $data['emp'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}


	public function search()
	{
		$month_id  = $this->input->post('month_id');
		$branch_id  = $this->input->post('branch_id');
		//pr($this->input->post());
		
		//print_r ($client_id); exit;
		
		$data['list'] = $this->pm->list_proc($month_id,$branch_id);

		//pr($data);

		
		//$this->template->write_view('content', 'list', $data, TRUE);
        //$this->template->render();
		//print_r ($data); exit;
		echo json_encode(array('list' => $data['list'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}
	

	public function Staffpay_hold_excel()
	{
			 
		$month_id  = $this->input->post('month_id');
		$branch_id  = $this->input->post('branch_id');
		//print_r ($month_id); exit;
		
		 $spreadsheet = new Spreadsheet();
		 $spreadsheet->setActiveSheetIndex(0);  
		 $sheet = $spreadsheet->getActiveSheet();
		 
		 $sheet->setCellValue('A1', 'Date - '.date('d/m/Y', strtotime($month_id)));
		 
		 
		 $sheet->setCellValue('A2', 'Employee Name');
		 $sheet->setCellValue('B2', 'Location');
		 $sheet->setCellValue('C2', 'Basic');
		 $sheet->setCellValue('D2', 'HRA');
		 $sheet->setCellValue('E2', 'CONV');
		 $sheet->setCellValue('F2', 'Otpay');
		 $sheet->setCellValue('G2', 'Gross');
		 $sheet->setCellValue('H2', 'ADV');
		 $sheet->setCellValue('I2', 'PF');
		 $sheet->setCellValue('J2', 'ESI');
		 $sheet->setCellValue('K2', 'LWF');
		 $sheet->setCellValue('L2', 'PT');
		 $sheet->setCellValue('M2', 'tot_dedt');
		 $sheet->setCellValue('N2', 'Net pay');
		 $sheet->setCellValue('O2', 'Salmonth');

		$styleArray = array(
		'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000000'),
			));
			
		
		
		$list = $data['list'] = $this->pm->list_proc($month_id,$branch_id);
		//die;
		//print_r($data);exit;
		
		$sheet->getStyle('A1:O1')->applyFromArray($styleArray);
	
		foreach(range('A','O') as $columnID)
		{
			$sheet->getColumnDimension($columnID)->setAutoSize(true);
		}
	
	
		$StCount = 3;

		$total_basic=0;
		$total_hra=0;
		$total_conv=0;

		$total_otpay=0;
		$total_gross_sal=0;
		$total_adv=0;
		$total_pf=0;
		$total_esi=0;
		$total_lwf=0;
		$total_pt=0;
		$total_tot_dedt=0;
		$total_net_pay=0; 
		foreach($list as $list)
		{
			$total_basic=$total_basic+$list->basic;
			$total_hra=$total_hra+$list->hra;
			$total_conv=$total_conv+$list->conv;
			$total_otpay=$total_otpay+$list->otpay;
			$total_gross_sal=$total_gross_sal+$list->gross_sal;
			$total_adv=$total_adv+$list->adv;
			$total_esi=$total_esi+$list->esi;
			$total_lwf=$total_lwf+$list->lwf;
			$total_pt=$total_pt+$list->pt;
			$total_tot_dedt=$total_tot_dedt+$list->tot_dedt;
			$total_net_pay=$total_net_pay+$list->net_pay;

			$sheet->setCellValue('A'.$StCount, $list->emp_name);
			$sheet->setCellValue('B'.$StCount, $list->location);
			$sheet->setCellValue('C'.$StCount, $list->basic);
			$sheet->setCellValue('D'.$StCount, $list->hra);
			$sheet->setCellValue('E'.$StCount, $list->conv);
			$sheet->setCellValue('F'.$StCount, $list->otpay);
			$sheet->setCellValue('G'.$StCount, $list->gross_sal);
			$sheet->setCellValue('H'.$StCount, $list->adv);
			$sheet->setCellValue('I'.$StCount, $list->pf);
			$sheet->setCellValue('J'.$StCount, $list->esi);
			$sheet->setCellValue('K'.$StCount, $list->lwf);
			$sheet->setCellValue('L'.$StCount, $list->pt);
			$sheet->setCellValue('M'.$StCount, $list->tot_dedt);
			$sheet->setCellValue('N'.$StCount, $list->net_pay);
			$sheet->setCellValue('O'.$StCount, $list->salmonth);

			$StCount++;
		} 
		
		if($StCount!=0)
		{
			$StCount++;
			$sheet->setCellValue('A'.$StCount,'Total');
			$sheet->setCellValue('B'.$StCount, '');
			$sheet->setCellValue('C'.$StCount,$total_basic);
			$sheet->setCellValue('D'.$StCount, $total_hra);
			$sheet->setCellValue('E'.$StCount, $total_conv);
			$sheet->setCellValue('F'.$StCount, $total_otpay);
			$sheet->setCellValue('G'.$StCount, $total_gross_sal);
			$sheet->setCellValue('H'.$StCount, $total_adv);
			$sheet->setCellValue('I'.$StCount, $total_pf);
			$sheet->setCellValue('J'.$StCount, $total_esi);
			$sheet->setCellValue('K'.$StCount, $total_lwf);
			$sheet->setCellValue('L'.$StCount, $total_pt);
			$sheet->setCellValue('M'.$StCount, $total_tot_dedt);
			$sheet->setCellValue('N'.$StCount, $total_net_pay);
			$sheet->setCellValue('O'.$StCount, '');
		}
		 
		 
		 $writer = new Xlsx($spreadsheet);
		 
		 $filename = 'Staff_Payroll_Register_Excel';
		 
		 header('Content-Type: application/vnd.ms-excel');
		 header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		 header('Cache-Control: max-age=0');
		 
		 $writer->save('php://output'); // download file 
		 
	}
  
}

?>
