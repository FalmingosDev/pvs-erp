<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class client_pay_reg_summary extends MY_Controller {

  public function __construct() 
  {
    parent::__construct();
    if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
      redirect('login');
    }
	
    $this->load->model('Client_pay_reg_summary_model','pm');
	
    $this->load->library('form_validation');
  	$this->load->helper(array('form', 'url'));
  	$this->form_validation->CI =& $this;
  }
  
  public function index()
  {
    $data = [];
    //$data['list'] = $this->cm->client_list();
    //echo "<pre>"; print_r($data['list']); exit();

    if(check_uri_permission('payreg_report', 'V') == 0){
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
  
   	public function client()
	{
		$month_id  = $this->input->post('month_id');
		
		$data['client'] = $this->pm->client($month_id);
		//print_r ($data); exit;
		echo json_encode(array('client' => $data['client'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}
	
	
	
	public function search()
	{
		$month_id  = $this->input->post('month_id');
		$client_id  = $this->input->post('client_id');
		$branch_id  = $this->input->post('branch_id');
		//pr($this->input->post());
		
		//print_r ($client_id); exit;
		
		$data['list'] = $this->pm->list_proc($month_id,$client_id,$branch_id);

		//pr($data);
		
		//$this->template->write_view('content', 'list', $data, TRUE);
        //$this->template->render();
		//print_r ($data); exit;
		echo json_encode(array('list' => $data['list'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}
	 
	
	public function Clielt_hold_excel()
	{
			 
		$month_id  = $this->input->post('month_id');
		$client_id  = $this->input->post('client_id');
		$branch_id  = $this->input->post('branch_id');
		
		//print_r ($month_id); exit;
		
		 $spreadsheet = new Spreadsheet();
		 $spreadsheet->setActiveSheetIndex(0);  
		 $sheet = $spreadsheet->getActiveSheet();
		 
		 $sheet->setCellValue('A1', 'Date - '.date('d/m/Y', strtotime($month_id)));
		 
		 
		 $sheet->setCellValue('A2', 'Client Name');
		 $sheet->setCellValue('B2', '          ');
		 $sheet->setCellValue('C2', 'Unit Name');
		 $sheet->setCellValue('D2', 'Location');
		 $sheet->setCellValue('E2', 'Zone');
		 $sheet->setCellValue('F2', 'Basic');
		 $sheet->setCellValue('G2', 'vda');
		 $sheet->setCellValue('H2', 'hra');
		 $sheet->setCellValue('I2', 'conv');
		 $sheet->setCellValue('J2', 'supv');
		 $sheet->setCellValue('K2', 'gun');
		 $sheet->setCellValue('L2', 'spl');
		 $sheet->setCellValue('M2', 'Unifrm');
		 $sheet->setCellValue('N2', 'Wssh');
		 $sheet->setCellValue('O2', 'Bonus');
		 $sheet->setCellValue('P2', 'nh');
		 $sheet->setCellValue('Q2', 'leave');
		 $sheet->setCellValue('R2', 'na');
		 $sheet->setCellValue('S2', 'otpay');
		 $sheet->setCellValue('T2', 'gross');
		 $sheet->setCellValue('U2', 'adv');
		 $sheet->setCellValue('V2', 'PF');
		 $sheet->setCellValue('W2', 'ESI');
		 $sheet->setCellValue('X2', 'LWF');
		 $sheet->setCellValue('Y2', 'P Tax');
		 $sheet->setCellValue('Z2', 'totded');
		 $sheet->setCellValue('AA2', 'Net Pay');
		 $sheet->setCellValue('AB2', 'salmonth');
		 
		 $styleArray = array(
		'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000000'),
			));
			
		
		
		$list = $data['list'] = $this->pm->list_proc($month_id,$client_id,$branch_id);
		//print_r($data);exit;
		
		$sheet->getStyle('A1:AB2')->applyFromArray($styleArray);
	
		foreach(range('A','AB') as $columnID)
		{
			$sheet->getColumnDimension($columnID)->setAutoSize(true);
		}

		$total_basic=0;
		$total_vda=0;
		$total_hra=0;
		$total_conv=0;
		$total_supv=0;
		$total_gun=0;
		$total_spl=0;
		$total_uniform=0;
		$total_wash=0;
		$total_bonus=0;
		$total_nh=0;
		$total_leave=0;
		$total_na=0;
		$total_otpay=0;
		$total_gross=0;
		$total_adv=0;
		$total_pf=0;
		$total_esi_amt=0;
		$total_lwf=0;
		$total_ptax=0;
		$total_total_deduction=0;
		$total_netpay=0;
	
	
		$StCount = 3;
		foreach($list as $list)
		{
			$total_basic=$total_basic+$list->basic;
			$total_vda=$total_vda+$list->vda;
			$total_hra=$total_hra+$list->hra;
			$total_conv=$total_conv+$list->conv;
			$total_supv=$total_supv+$list->supv;
			$total_gun=$total_gun+$list->gun;
			$total_spl=$total_spl+$list->spl;
			$total_uniform=$total_uniform+$list->uniform;
			$total_wash=$total_wash+$list->wash;
			$total_bonus=$total_bonus+$list->bonus;
			$total_nh=$total_nh+$list->nh;
			$total_leave=$total_leave+$list->leave;
			$total_na=$total_na+$list->na;
			$total_otpay=$total_otpay+$list->otpay;
			$total_gross=$total_gross+$list->gross;
			$total_adv=$total_adv+$list->adv;
			$total_pf=$total_pf+$list->pf;
			$total_esi_amt=$total_esi_amt+$list->esi_amt;
			$total_lwf=$total_lwf+$list->lwf;
			$total_ptax=$total_ptax+$list->ptax;
			$total_total_deduction=$total_total_deduction+$list->total_deduction;
			$total_netpay=$total_netpay+$list->netpay;

			$sheet->setCellValue('A'.$StCount, $list->client_name);
			$sheet->setCellValue('B'.$StCount, '');
			$sheet->setCellValue('C'.$StCount, $list->branch_name);
			$sheet->setCellValue('D'.$StCount, $list->address);
			$sheet->setCellValue('E'.$StCount, $list->zone);
			$sheet->setCellValue('F'.$StCount, $list->basic);
			$sheet->setCellValue('G'.$StCount, $list->vda);
			$sheet->setCellValue('H'.$StCount, $list->hra);
			$sheet->setCellValue('I'.$StCount, $list->conv);
			$sheet->setCellValue('J'.$StCount, $list->supv);
			$sheet->setCellValue('K'.$StCount, $list->gun);
			$sheet->setCellValue('L'.$StCount, $list->spl);
			$sheet->setCellValue('M'.$StCount, $list->uniform);
			$sheet->setCellValue('N'.$StCount, $list->wash);
			$sheet->setCellValue('O'.$StCount, $list->bonus);
			$sheet->setCellValue('P'.$StCount, $list->nh);
			$sheet->setCellValue('Q'.$StCount, $list->leave);
			$sheet->setCellValue('R'.$StCount, $list->na);
			$sheet->setCellValue('S'.$StCount, $list->otpay);
			$sheet->setCellValue('T'.$StCount, $list->gross);
			$sheet->setCellValue('U'.$StCount, $list->adv);
			$sheet->setCellValue('V'.$StCount, $list->pf);
			$sheet->setCellValue('W'.$StCount, $list->esi_amt);
			$sheet->setCellValue('X'.$StCount, $list->lwf);
			$sheet->setCellValue('Y'.$StCount, $list->ptax);
			$sheet->setCellValue('Z'.$StCount, $list->total_deduction);
			$sheet->setCellValue('AA'.$StCount, $list->netpay);
			$sheet->setCellValue('AB'.$StCount, $list->payment_month);
			
			$StCount++;
		} 
		$StCount++;

		$sheet->setCellValue('A'.$StCount, 'Total');
		$sheet->setCellValue('B'.$StCount, '');
		$sheet->setCellValue('C'.$StCount, '');
		$sheet->setCellValue('D'.$StCount, '');
		$sheet->setCellValue('E'.$StCount, '');
		$sheet->setCellValue('F'.$StCount, $total_basic);
		$sheet->setCellValue('G'.$StCount, $total_vda);
		$sheet->setCellValue('H'.$StCount, $total_hra);
		$sheet->setCellValue('I'.$StCount, $total_conv);
		$sheet->setCellValue('J'.$StCount, $total_supv);
		$sheet->setCellValue('K'.$StCount, $total_gun);
		$sheet->setCellValue('L'.$StCount, $total_spl);
		$sheet->setCellValue('M'.$StCount, $total_uniform);
		$sheet->setCellValue('N'.$StCount, $total_wash);
		$sheet->setCellValue('O'.$StCount, $total_bonus);
		$sheet->setCellValue('P'.$StCount, $total_nh);
		$sheet->setCellValue('Q'.$StCount, $total_leave);
		$sheet->setCellValue('R'.$StCount, $total_na);
		$sheet->setCellValue('S'.$StCount, $total_otpay);
		$sheet->setCellValue('T'.$StCount, $total_gross);
		$sheet->setCellValue('U'.$StCount, $total_adv);
		$sheet->setCellValue('V'.$StCount, $total_pf);
		$sheet->setCellValue('W'.$StCount, $total_esi_amt);
		$sheet->setCellValue('X'.$StCount, $total_lwf);
		$sheet->setCellValue('Y'.$StCount, $total_ptax);
		$sheet->setCellValue('Z'.$StCount, $total_total_deduction);
		$sheet->setCellValue('AA'.$StCount, $total_netpay);
		$sheet->setCellValue('AB'.$StCount, '');
		//print_r($data);exit;
		// $sheet->setCellValue('B', $row['order_no']);
		 //$sheet->setCellValue();
		 
		 
		 $writer = new Xlsx($spreadsheet);
		 
		 $filename = 'Client_Pay_Register_Summary_Excel_Report';
		 
		 header('Content-Type: application/vnd.ms-excel');
		 header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		 header('Cache-Control: max-age=0');
		 
		 $writer->save('php://output'); // download file 
		 
	}
  
}

?>
