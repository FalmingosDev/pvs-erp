<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Tally_report extends MY_Controller {

  public function __construct() {
    parent::__construct();
    if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
      redirect('login');
    }
	
    $this->load->model('Tally_report_model','pm');
	
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
  
   public function client()
	{
		$month_id  = $this->input->post('month_id');
		
		$data['client'] = $this->pm->client($month_id);
		//print_r ($data); exit;
		echo json_encode(array('client' => $data['client'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}
	
	
	
	
	public function Tally_excel()
		 {
			 
		$month_id  = $this->input->post('month_id');
		$client_id  = $this->input->post('client_id');
		
		
		//print_r ($month_id); exit;
		
		 $spreadsheet = new Spreadsheet();
		 $spreadsheet->setActiveSheetIndex(0);  
		 $sheet = $spreadsheet->getActiveSheet();
		 
		 $sheet->setCellValue('A1', 'Date - '.date('d/m/Y', strtotime($month_id)));
		 
		 
		 $sheet->setCellValue('A2', 'tinvno');
		 $sheet->setCellValue('B2', 'ttype');
		 $sheet->setCellValue('C2', 'tdate');
		 $sheet->setCellValue('D2', 'led1');
		 $sheet->setCellValue('E2', 'amt1');
		 $sheet->setCellValue('F2', 'dbcr1');
		 $sheet->setCellValue('G2', 'refno');
		 $sheet->setCellValue('H2', 'narration');
		 $sheet->setCellValue('I2', 'trn_type');
		 $sheet->setCellValue('J2', 'chqno');
		 $sheet->setCellValue('K2', 'chqdate');
		 $sheet->setCellValue('L2', 'banknm');
		 $sheet->setCellValue('M2', 'costcat');
		 $sheet->setCellValue('N2', 'costcen1');
		 $sheet->setCellValue('O2', 'ccnamt1');
		 $sheet->setCellValue('P2', 'costcen2');
		 $sheet->setCellValue('Q2', 'ccnamt2');
		 $sheet->setCellValue('R2', 'costcen3');
		 $sheet->setCellValue('S2', 'ccnamt3');
		 $sheet->setCellValue('T2', 'costcen4');
		 $sheet->setCellValue('U2', 'ccnamt4');
		 $sheet->setCellValue('V2', 'costcen5');	
		 $sheet->setCellValue('W2', 'ccnamt5');
		 
		 $styleArray = array(
		'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000000'),
			));
			
		
		
		$list = $data['list'] = $this->pm->tally_list($month_id,$client_id);
		//print_r($data);exit;
		
		$sheet->getStyle('A1:W2')->applyFromArray($styleArray);
	
		foreach(range('A','W') as $columnID)
		{
			$sheet->getColumnDimension($columnID)->setAutoSize(true);
		}
	
	
		$StCount = 3;
		
		foreach($list as $list){
			$sheet->setCellValue('A'.$StCount, $list->tinvno);
			$sheet->setCellValue('B'.$StCount, $list->ttype);
			$sheet->setCellValue('C'.$StCount, $list->tdate);
			$sheet->setCellValue('D'.$StCount, $list->led1);
			$sheet->setCellValue('E'.$StCount, $list->amt1);
			if($list->dbcr1 == 'E'){
				$sheet->setCellValue('F'.$StCount, 'CR');
			}
			else{
				$sheet->setCellValue('F'.$StCount, 'DR');
			}
			//$sheet->setCellValue('F'.$StCount, $list->dbcr1);
			$sheet->setCellValue('G'.$StCount, $list->refno);
			$sheet->setCellValue('H'.$StCount, $list->narration);
			$sheet->setCellValue('I'.$StCount, $list->trn_type);
			$sheet->setCellValue('J'.$StCount, $list->chqno);
			$sheet->setCellValue('K'.$StCount, $list->chqdate);
			$sheet->setCellValue('L'.$StCount, $list->banknm);
			$sheet->setCellValue('M'.$StCount, $list->costcat);
			$sheet->setCellValue('N'.$StCount, $list->costcen1);
			$sheet->setCellValue('O'.$StCount, $list->ccnamt1);
			$sheet->setCellValue('P'.$StCount, $list->costcen2);
			$sheet->setCellValue('Q'.$StCount, $list->ccnamt2);
			$sheet->setCellValue('R'.$StCount, $list->costcen3);
			$sheet->setCellValue('S'.$StCount, $list->ccnamt3);
			$sheet->setCellValue('T'.$StCount, $list->costcen4);
			$sheet->setCellValue('U'.$StCount, $list->ccnamt4);
			$sheet->setCellValue('V'.$StCount, $list->costcen5);
			$sheet->setCellValue('W'.$StCount, $list->ccnamt5);
			
			$StCount++;
		} 
		//print_r($data);exit;
		// $sheet->setCellValue('B', $row['order_no']);
		 //$sheet->setCellValue();
		 
		 
		 $writer = new Xlsx($spreadsheet);
		 
		 $filename = 'Tally_excel';
		 
		 header('Content-Type: application/vnd.ms-excel');
		 header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		 header('Cache-Control: max-age=0');
		 
		 $writer->save('php://output'); // download file 
		 
		 }
  
}

?>
