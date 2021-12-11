<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Payreg_register_exc extends MY_Controller {

  public function __construct() {
    parent::__construct();
    if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
      redirect('login');
    }
	
    $this->load->model('Payreg_register_exc_model','pm');
	
    $this->load->library('form_validation');
  	$this->load->helper(array('form', 'url'));
  	$this->form_validation->CI =& $this;
  }
  
  public function index(){
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
	
	public function emp()
	{
		$client_id  = $this->input->post('client_id');
		
		$data['emp'] = $this->pm->employee($client_id);
		//print_r ($data); exit;
		echo json_encode(array('emp' => $data['emp'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}
	
	public function search()
	{
		$month_id  = $this->input->post('month_id');
		$client_id  = $this->input->post('client_id');
		$emp_id  = $this->input->post('emp_id');
		
		//print_r ($client_id); exit;
		
		$data['list'] = $this->pm->list_proc($month_id,$client_id,$emp_id);
		
		//$this->template->write_view('content', 'list', $data, TRUE);
        //$this->template->render();
		//print_r ($data); exit;
		echo json_encode(array('list' => $data['list'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}
	 
	 
	public function update()
	{

		    if(check_uri_permission('payreg_report', 'E') == 0){
		     $this->session->set_flashdata('error_msg', 'You have no permission on this page');
		     redirect(base_url());
		     }


			$payroll_cnt = count($this->input->post('count'));	
			
			$user_id = $this->session->user_id;
			//print_r ($payroll_cnt); exit;
			
			for($y=0;$y<=$payroll_cnt;$y++){
				$payroll_id = $this->input->post('payroll_id_' . $y);
				$checkbox_id = $this->input->post('hold_flag_' . $y);
				$remarks = $this->input->post('remarks_' . $y);
				
				
				$data['update'] = $this->pm->payreg_update($user_id,$payroll_id,$checkbox_id,$remarks);
				
			}
			redirect('payreg_report','refresh');
	}
	
	
	 public function Clielt_hold_excel()
		 {
			 
		$month_id  = $this->input->post('month_id');
		$client_id  = $this->input->post('client_id');
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
		 $sheet->setCellValue('D2', 'Unit Code');
		 $sheet->setCellValue('E2', 'Unit Name');
		 $sheet->setCellValue('F2', 'Location');
		 $sheet->setCellValue('G2', 'Zone');
		 $sheet->setCellValue('H2', 'Bank');
		 $sheet->setCellValue('I2', 'A/C No');
		 $sheet->setCellValue('J2', 'Ref No');
		 $sheet->setCellValue('K2', 'PF No');
		 $sheet->setCellValue('L2', 'UAN');
		 $sheet->setCellValue('M2', 'ESI No');
		 $sheet->setCellValue('N2', 'Basrt');
		 $sheet->setCellValue('O2', 'Vdart');
		 $sheet->setCellValue('P2', 'Hrart');
		 $sheet->setCellValue('Q2', 'Convrt');
		 $sheet->setCellValue('R2', 'Edurt');
		 $sheet->setCellValue('S2', 'Supvrt');
		 $sheet->setCellValue('T2', 'Gunrt');
		 $sheet->setCellValue('U2', 'Splrt');
		 $sheet->setCellValue('V2', 'Unirt');
		 $sheet->setCellValue('W2', 'Washrt');	
		 $sheet->setCellValue('X2', 'Bonrt');
		 $sheet->setCellValue('Y2', 'Nhrt');
		 $sheet->setCellValue('Z2', 'Lvrt');
		 $sheet->setCellValue('AA2', 'Rate');
		 $sheet->setCellValue('AB2', 'OT Rate');
		 $sheet->setCellValue('AC2', 'Duties');
		 $sheet->setCellValue('AD2', 'OT Duty');
		 $sheet->setCellValue('AE2', 'Basic');
		 $sheet->setCellValue('AF2', 'vda');
		 $sheet->setCellValue('AG2', 'hra');
		 $sheet->setCellValue('AH2', 'conv');
		 $sheet->setCellValue('AI2', 'supv');
		 $sheet->setCellValue('AJ2', 'gun');
		 $sheet->setCellValue('AK2', 'spl');
		 $sheet->setCellValue('AL2', 'Unifrm');
		 $sheet->setCellValue('AM2', 'Wssh');
		 $sheet->setCellValue('AN2', 'Bonus');
		 $sheet->setCellValue('AO2', 'nh');
		 $sheet->setCellValue('AP2', 'leave');
		 $sheet->setCellValue('AQ2', 'na');
		 $sheet->setCellValue('AR2', 'otpay');
		 $sheet->setCellValue('AS2', 'gross');
		 $sheet->setCellValue('AT2', 'adv');
		 $sheet->setCellValue('AU2', 'PF');
		 $sheet->setCellValue('AV2', 'ESI');
		 $sheet->setCellValue('AW2', 'LWF');
		 $sheet->setCellValue('AX2', 'P Tax');
		 $sheet->setCellValue('AY2', 'totded');
		 $sheet->setCellValue('AZ2', 'Net Pay');
		 $sheet->setCellValue('BA2', 'DOB');
		 $sheet->setCellValue('BB2', 'DOJ');
		 $sheet->setCellValue('BC2', 'Gender');
		 $sheet->setCellValue('BD2', 'User Name');
		 $sheet->setCellValue('BE2', 'Sdate');
		 $sheet->setCellValue('BF2', 'Stime');
		 $sheet->setCellValue('BG2', 'Branch');
		 $sheet->setCellValue('BH2', 'Phyatt');
		 $sheet->setCellValue('BI2', 'EL');
		 $sheet->setCellValue('BJ2', 'FL');
		 $sheet->setCellValue('BK2', 'CO');
		 $sheet->setCellValue('BL2', 'PAN');
		 $sheet->setCellValue('BM2', 'Aadhaar');
		 $sheet->setCellValue('BN2', 'Gun Lic No');
		 $sheet->setCellValue('BO2', 'Gun Expiry');
		 $sheet->setCellValue('BP2', 'DL No');
		 $sheet->setCellValue('BQ2', 'DL Expiry');
		 $sheet->setCellValue('BR2', 'Pasprt No');
		 $sheet->setCellValue('BS2', 'Pasprt Exp');
		 $sheet->setCellValue('BT2', 'PV Appdt');
		 $sheet->setCellValue('BU2', 'PV Expiry');
		 $sheet->setCellValue('BV2', 'Army No');
		 $sheet->setCellValue('BW2', 'Army Rank');
		 $sheet->setCellValue('BX2', 'Voter Id');
		 $sheet->setCellValue('BY2', 'Mobile');
		 $sheet->setCellValue('BZ2', 'unitlinked');
		 $sheet->setCellValue('CA2', 'unitloc');
		 $sheet->setCellValue('CB2', 'salmonth');
		 
		 $styleArray = array(
		'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000000'),
			));
			
		
		
		$list = $data['list'] = $this->pm->list_proc($month_id,$client_id,$emp_id,$branch_id);
		//print_r($data);exit;
		
		$sheet->getStyle('A1:CA2')->applyFromArray($styleArray);
	
		foreach(range('A','CA') as $columnID)
		{
			$sheet->getColumnDimension($columnID)->setAutoSize(true);
		}
	
	
		$StCount = 3;
		foreach($list as $list){
			$sheet->setCellValue('A'.$StCount, $list->employee_code);
			$sheet->setCellValue('B'.$StCount, $list->emp_name);
			$sheet->setCellValue('C'.$StCount, $list->desig_name);
			$sheet->setCellValue('D'.$StCount, $list->branch_id);
			$sheet->setCellValue('E'.$StCount, $list->branch_name);
			$sheet->setCellValue('F'.$StCount, $list->address);
			$sheet->setCellValue('G'.$StCount, $list->zone);
			$sheet->setCellValue('H'.$StCount, $list->bank_name);
			$sheet->setCellValue('I'.$StCount, $list->account_no);
			$sheet->setCellValue('J'.$StCount, $list->ifsc_code);
			$sheet->setCellValue('K'.$StCount, $list->epf);
			$sheet->setCellValue('L'.$StCount, $list->uan);
			$sheet->setCellValue('M'.$StCount, $list->esi);
			$sheet->setCellValue('N'.$StCount, $list->basrt);
			$sheet->setCellValue('O'.$StCount, $list->vdart);
			$sheet->setCellValue('P'.$StCount, $list->hrart);
			$sheet->setCellValue('Q'.$StCount, $list->convrt);
			$sheet->setCellValue('R'.$StCount, $list->edurt);
			$sheet->setCellValue('S'.$StCount, $list->supvrt);
			$sheet->setCellValue('T'.$StCount, $list->gunrt);
			$sheet->setCellValue('U'.$StCount, $list->splrt);
			$sheet->setCellValue('V'.$StCount, $list->unirt);
			$sheet->setCellValue('W'.$StCount, $list->washrt);
			$sheet->setCellValue('X'.$StCount, $list->bonrt);
			$sheet->setCellValue('Y'.$StCount, $list->nhrt);
			$sheet->setCellValue('Z'.$StCount, $list->lvrt);
			$sheet->setCellValue('AA'.$StCount, $list->rate);
			$sheet->setCellValue('AB'.$StCount, $list->ot_rt);
			$sheet->setCellValue('AC'.$StCount, $list->duties);
			$sheet->setCellValue('AD'.$StCount, $list->otduty);
			$sheet->setCellValue('AE'.$StCount, $list->basic);
			$sheet->setCellValue('AF'.$StCount, $list->vda);
			$sheet->setCellValue('AG'.$StCount, $list->hra);
			$sheet->setCellValue('AH'.$StCount, $list->conv);
			$sheet->setCellValue('AI'.$StCount, $list->supv);
			$sheet->setCellValue('AJ'.$StCount, $list->gun);
			$sheet->setCellValue('AK'.$StCount, $list->spl);
			$sheet->setCellValue('AL'.$StCount, $list->uniform);
			$sheet->setCellValue('AM'.$StCount, $list->wash);
			$sheet->setCellValue('AN'.$StCount, $list->bonus);
			$sheet->setCellValue('AO'.$StCount, $list->nh);
			$sheet->setCellValue('AP'.$StCount, $list->leave);
			$sheet->setCellValue('AQ'.$StCount, $list->na);
			$sheet->setCellValue('AR'.$StCount, $list->otpay);
			$sheet->setCellValue('AS'.$StCount, $list->gross);
			$sheet->setCellValue('AT'.$StCount, $list->adv);
			$sheet->setCellValue('AU'.$StCount, $list->pf);
			$sheet->setCellValue('AV'.$StCount, $list->esi_amt);
			$sheet->setCellValue('AW'.$StCount, $list->lwf);
			$sheet->setCellValue('AX'.$StCount, $list->ptax);
			$sheet->setCellValue('AY'.$StCount, $list->total_deduction);
			$sheet->setCellValue('AZ'.$StCount, $list->netpay);
			$sheet->setCellValue('BA'.$StCount, $list->dob);
			$sheet->setCellValue('BB'.$StCount, $list->doj);
			$sheet->setCellValue('BC'.$StCount, $list->gender);
			$sheet->setCellValue('BD'.$StCount, $list->name);
			$sheet->setCellValue('BE'.$StCount, $list->created_ts);
			$sheet->setCellValue('BF'.$StCount, '');
			$sheet->setCellValue('BG'.$StCount, $list->c_branch_name);
			$sheet->setCellValue('BH'.$StCount, $list->phyatt);
			$sheet->setCellValue('BI'.$StCount, $list->el);
			$sheet->setCellValue('BJ'.$StCount, $list->fl);
			$sheet->setCellValue('BK'.$StCount, $list->co);
			$sheet->setCellValue('BL'.$StCount, $list->pan);
			$sheet->setCellValue('BM'.$StCount, $list->aadhaar_card_no);
			$sheet->setCellValue('BN'.$StCount, $list->gun_lic_no);
			$sheet->setCellValue('BO'.$StCount, $list->gun_license_expiry_date);
			$sheet->setCellValue('BP'.$StCount, $list->dl_no);
			$sheet->setCellValue('BQ'.$StCount, $list->dl_expiry);
			$sheet->setCellValue('BR'.$StCount, $list->pasprt_no);
			$sheet->setCellValue('BS'.$StCount, $list->pasprt_exp);
			$sheet->setCellValue('BT'.$StCount, $list->pv_appdt);
			$sheet->setCellValue('BU'.$StCount, $list->pv_expiry);
			$sheet->setCellValue('BV'.$StCount, $list->army_no);
			$sheet->setCellValue('BW'.$StCount, $list->army_rank);
			$sheet->setCellValue('BX'.$StCount, $list->voterid);
			$sheet->setCellValue('BY'.$StCount, $list->mobile);
			$sheet->setCellValue('BZ'.$StCount, $list->unitlinked);
			$sheet->setCellValue('CA'.$StCount, $list->unitloc);
			$sheet->setCellValue('CB'.$StCount, $list->payment_month);
			
			$StCount++;
		} 
		//print_r($data);exit;
		// $sheet->setCellValue('B', $row['order_no']);
		 //$sheet->setCellValue();
		 
		 
		 $writer = new Xlsx($spreadsheet);
		 
		 $filename = 'Client_Pay_Register_Excel_Report';
		 
		 header('Content-Type: application/vnd.ms-excel');
		 header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		 header('Cache-Control: max-age=0');
		 
		 $writer->save('php://output'); // download file 
		 
		 }
  
}

?>
