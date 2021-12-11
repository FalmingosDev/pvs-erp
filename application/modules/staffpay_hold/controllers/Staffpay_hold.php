<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Staffpay_hold extends MY_Controller {

  public function __construct() {
    parent::__construct();
    if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
      redirect('login');
    }
	
    $this->load->model('Staffpay_hold_model','pm');
	
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
		//print_r ($client_id); exit;
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
		$client_id  = '';
		$emp_id  = $this->input->post('emp_id');
		$branch_id  = $this->input->post('branch_id');
		
		//print_r ($client_id); exit;
		
		$data['list'] = $this->pm->list_proc($month_id,$client_id,$emp_id,$branch_id);
		
		
		
		echo json_encode(array('list' => $data['list'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}
	 
	 
	public function update()
	{

		    if(check_uri_permission('staffpay_hold', 'E') == 0){
		     $this->session->set_flashdata('error_msg', 'You have no permission on this page');
		     redirect(base_url());
		     }

			$payroll_cnt = count($this->input->post('count'));	
			
			$user_id = $this->session->user_id;
			//print_r ($payroll_cnt); exit;
			
			for($y=1;$y<=$payroll_cnt;$y++){
				$payroll_id = $this->input->post('payroll_id_' . $y);
				$checkbox_id = $this->input->post('hold_flag_' . $y);
				$remarks = $this->input->post('remarks_' . $y);
				
				
				$data['update'] = $this->pm->paysupp_update($user_id,$payroll_id,$checkbox_id,$remarks);
				
			}
			redirect('staffpay_hold','refresh');
	}
	
	public function Staffpay_hold_excel()
		 {
			 
		$month_id  = $this->input->post('month_id');
		$client_id  = '';
		$emp_id  = $this->input->post('emp_id');
		$branch_id  = $this->input->post('branch_id');
		//print_r ($month_id); exit;
		
		 $spreadsheet = new Spreadsheet();
		 $spreadsheet->setActiveSheetIndex(0);  
		 $sheet = $spreadsheet->getActiveSheet();
		 
		 $sheet->setCellValue('A1', 'Date - '.date('d/m/Y', strtotime($month_id)));
		 
		 
		 $sheet->setCellValue('A2', 'Empl Code');
		 $sheet->setCellValue('B2', 'Empl Name');
		 $sheet->setCellValue('C2', 'Emp Desig');
		 $sheet->setCellValue('D2', 'Deptt');
		 $sheet->setCellValue('E2', 'Unit Code');
		 $sheet->setCellValue('F2', 'Project Name');
		 $sheet->setCellValue('G2', 'Location');
		 $sheet->setCellValue('H2', 'Bank Name');
		 $sheet->setCellValue('I2', 'Bank Id ');
		 $sheet->setCellValue('J2', 'Ref No');
		 $sheet->setCellValue('K2', 'PF No');
		 $sheet->setCellValue('L2', 'ESI No');
		 $sheet->setCellValue('M2', 'PAN No');
		 $sheet->setCellValue('N2', 'LOP');
		 $sheet->setCellValue('O2', 'norm');
		 $sheet->setCellValue('P2', 'OT');
		 $sheet->setCellValue('Q2', 'EL');
		 $sheet->setCellValue('R2', 'CL');
		 $sheet->setCellValue('S2', 'SL');
		 $sheet->setCellValue('T2', 'Basic');
		 $sheet->setCellValue('U2', 'HRA');
		 $sheet->setCellValue('V2', 'conv');	
		 $sheet->setCellValue('W2', 'medi');
		 $sheet->setCellValue('X2', 'hazard	');
		 $sheet->setCellValue('Y2', 'splall');
		 $sheet->setCellValue('Z2', 'VA');
		 $sheet->setCellValue('AA2', 'OA');
		 $sheet->setCellValue('AB2', 'eduall');
		 $sheet->setCellValue('AC2', 'OT PAy');
		 $sheet->setCellValue('AD2', 'arr1');
		 $sheet->setCellValue('AE2', 'arr2');
		 $sheet->setCellValue('AF2', 'gross_sal');
		 $sheet->setCellValue('AG2', 'PF');
		 $sheet->setCellValue('AH2', 'ESI');
		 $sheet->setCellValue('AI2', 'PT');
		 $sheet->setCellValue('AJ2', 'Unifrm');
		 $sheet->setCellValue('AK2', 'WF');
		 $sheet->setCellValue('AL2', 'IT');
		 $sheet->setCellValue('AM2', 'ADV');
		 $sheet->setCellValue('AN2', 'loan');
		 $sheet->setCellValue('AO2', 'oth');
		 $sheet->setCellValue('AP2', 'tot_dedt');
		 $sheet->setCellValue('AQ2', 'net_pay');
		 $sheet->setCellValue('AR2', 'DOJ');
		 $sheet->setCellValue('AS2', 'DOL');
		 $sheet->setCellValue('AT2', 'uan');
		 $sheet->setCellValue('AU2', 'salmonth');
		 
		 $styleArray = array(
		'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000000'),
			));
			
		
		
		$list = $data['list'] = $this->pm->list_proc($month_id,$client_id,$emp_id,$branch_id);
		//print_r($data);exit;
		
		$sheet->getStyle('A1:AV2')->applyFromArray($styleArray);
	
		foreach(range('A','AV') as $columnID)
		{
			$sheet->getColumnDimension($columnID)->setAutoSize(true);
		}
	
	
		$StCount = 3;
		foreach($list as $list){
			$sheet->setCellValue('A'.$StCount, $list->employee_code);
			$sheet->setCellValue('B'.$StCount, $list->emp_name);
			$sheet->setCellValue('C'.$StCount, $list->desig_name);
			$sheet->setCellValue('D'.$StCount, $list->deptt);
			$sheet->setCellValue('E'.$StCount, $list->unitcode);
			$sheet->setCellValue('F'.$StCount, $list->project_nm);
			$sheet->setCellValue('G'.$StCount, $list->location);
			$sheet->setCellValue('H'.$StCount, $list->bank_name);
			$sheet->setCellValue('I'.$StCount, $list->account_no);
			$sheet->setCellValue('J'.$StCount, $list->refno);
			$sheet->setCellValue('K'.$StCount, $list->pfno);
			$sheet->setCellValue('L'.$StCount, $list->esino);
			$sheet->setCellValue('M'.$StCount, $list->panno);
			$sheet->setCellValue('N'.$StCount, $list->lop);
			$sheet->setCellValue('O'.$StCount, $list->norm);
			$sheet->setCellValue('P'.$StCount, $list->el);
			$sheet->setCellValue('Q'.$StCount, $list->el);
			$sheet->setCellValue('R'.$StCount, $list->cl);
			$sheet->setCellValue('S'.$StCount, $list->sl);
			$sheet->setCellValue('T'.$StCount, $list->basic);
			$sheet->setCellValue('U'.$StCount, $list->hra);
			$sheet->setCellValue('V'.$StCount, $list->conv);
			$sheet->setCellValue('W'.$StCount, $list->medi);
			$sheet->setCellValue('X'.$StCount, $list->hazard);
			$sheet->setCellValue('Y'.$StCount, $list->hazard);
			$sheet->setCellValue('Z'.$StCount, $list->va);
			$sheet->setCellValue('AA'.$StCount, $list->oa);
			$sheet->setCellValue('AB'.$StCount, $list->eduall);
			$sheet->setCellValue('AC'.$StCount, $list->otpay);
			$sheet->setCellValue('AD'.$StCount, $list->arr1);
			$sheet->setCellValue('AE'.$StCount, $list->arr2);
			$sheet->setCellValue('AF'.$StCount, $list->gross_sal);
			$sheet->setCellValue('AG'.$StCount, $list->pf);
			$sheet->setCellValue('AH'.$StCount, $list->esi);
			$sheet->setCellValue('AI'.$StCount, $list->pt);
			$sheet->setCellValue('AJ'.$StCount, $list->unifrom);
			$sheet->setCellValue('AK'.$StCount, $list->lwf);
			$sheet->setCellValue('AL'.$StCount, $list->it);
			$sheet->setCellValue('AM'.$StCount, $list->adv);
			$sheet->setCellValue('AN'.$StCount, $list->loan);
			$sheet->setCellValue('AO'.$StCount, $list->oth);
			$sheet->setCellValue('AP'.$StCount, $list->tot_dedt);
			$sheet->setCellValue('AQ'.$StCount, $list->net_pay);
			$sheet->setCellValue('AR'.$StCount, $list->doj);
			$sheet->setCellValue('AS'.$StCount, $list->dol);
			$sheet->setCellValue('AT'.$StCount, $list->uan);
			$sheet->setCellValue('AU'.$StCount, $list->salmonth);
			
			$StCount++;
		} 
		//print_r($data);exit;
		// $sheet->setCellValue('B', $row['order_no']);
		 //$sheet->setCellValue();
		 
		 
		 $writer = new Xlsx($spreadsheet);
		 
		 $filename = 'Staff_Payroll_hold_excel';
		 
		 header('Content-Type: application/vnd.ms-excel');
		 header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		 header('Cache-Control: max-age=0');
		 
		 $writer->save('php://output'); // download file 
		 
		 }
  
}

?>
