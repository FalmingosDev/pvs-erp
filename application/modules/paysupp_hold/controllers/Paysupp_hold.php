<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Paysupp_hold extends MY_Controller {

  public function __construct() {
    parent::__construct();
    if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
      redirect('login');
    }
	
    $this->load->model('Paysupp_hold_model','pm');
	
    $this->load->library('form_validation');
  	$this->load->helper(array('form', 'url'));
  	$this->form_validation->CI =& $this;
  }
  
  public function index(){
    $data = [];

    if(check_uri_permission('paysupp_hold', 'V') == 0){
	     $this->session->set_flashdata('error_msg', 'You have no permission on this page');
	     redirect(base_url());
	     }


    //$data['list'] = $this->cm->client_list();
    //echo "<pre>"; print_r($data['list']); exit();
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
	
	public function branch()
	{

		$client_id  = $this->input->post('client_id');
		//print_r ($client_id); exit;
		$data['branch'] = $this->pm->branch_search($client_id);
		//print_r ($data); exit;
		echo json_encode(array('branch' => $data['branch'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}
	
	public function emp_list()
	{
		$client_id  = $this->input->post('client_id');
		$branch_id  = $this->input->post('branch_id');
		
		$data['emp'] = $this->pm->employee($client_id,$branch_id);
		//print_r ($data); exit;
		echo json_encode(array('emp' => $data['emp'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}
	
	public function search()
	{
		$month_id  = $this->input->post('month_id');
		$client_id  = $this->input->post('client_id');
		$emp_id  = $this->input->post('emp_id');
		$branch_id  = $this->input->post('branch_id');
		//print_r ($client_id); exit;
		
		$data['list'] = $this->pm->list_proc($month_id,$client_id,$emp_id,$branch_id);
		
		
		
		echo json_encode(array('list' => $data['list'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}
	 
	 
	public function update()
	{

		    if(check_uri_permission('paysupp_hold', 'E') == 0){
		     $this->session->set_flashdata('error_msg', 'You have no permission on this page');
		     redirect(base_url());
		     }

			$payroll_cnt = count($this->input->post('count'));	
			
			$user_id = $this->session->user_id;
			//print_r ($payroll_cnt); exit;
			
			for($y=1;$y<=$payroll_cnt;$y++){
				$payroll_supp_id = $this->input->post('payroll_supp_id_' . $y);
				$checkbox_id = $this->input->post('hold_flag_' . $y);
				$remarks = $this->input->post('remarks_' . $y);
				
				
				$data['update'] = $this->pm->paysupp_update($user_id,$payroll_supp_id,$checkbox_id,$remarks);
				
			}
			redirect('paysupp_hold','refresh');
	}
	
	 public function Clielt_supp_hold_excel()
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
		 $sheet->setCellValue('AA2', 'OT Rate');
		 $sheet->setCellValue('AB2', 'Duties');
		 $sheet->setCellValue('AC2', 'OT Duty');
		 $sheet->setCellValue('AD2', 'Basic');
		 $sheet->setCellValue('AE2', 'vda');
		 $sheet->setCellValue('AF2', 'hra');
		 $sheet->setCellValue('AG2', 'conv');
		 $sheet->setCellValue('AH2', 'supv');
		 $sheet->setCellValue('AI2', 'gun');
		 $sheet->setCellValue('AJ2', 'spl');
		 $sheet->setCellValue('AK2', 'Unifrm');
		 $sheet->setCellValue('AL2', 'Wssh');
		 $sheet->setCellValue('AM2', 'Bonus');
		 $sheet->setCellValue('AN2', 'nh');
		 $sheet->setCellValue('AO2', 'leave');
		 $sheet->setCellValue('AP2', 'na');
		 $sheet->setCellValue('AQ2', 'otpay');
		 $sheet->setCellValue('AR2', 'gross');
		 $sheet->setCellValue('AS2', 'adv');
		 $sheet->setCellValue('AT2', 'PF');
		 $sheet->setCellValue('AU2', 'ESI');
		 $sheet->setCellValue('AV2', 'LWF');
		 $sheet->setCellValue('AW2', 'P Tax');
		 $sheet->setCellValue('AX2', 'totded');
		 $sheet->setCellValue('AY2', 'Net Pay');
		 $sheet->setCellValue('AZ2', 'DOB');
		 $sheet->setCellValue('BA2', 'DOJ');
		 $sheet->setCellValue('BB2', 'Gender');
		 $sheet->setCellValue('BC2', 'User Name');
		 $sheet->setCellValue('BD2', 'Sdate');
		 $sheet->setCellValue('BE2', 'Stime');
		 $sheet->setCellValue('BF2', 'Branch');
		 $sheet->setCellValue('BG2', 'Phyatt');
		 $sheet->setCellValue('BH2', 'EL');
		 $sheet->setCellValue('BI2', 'FL');
		 $sheet->setCellValue('BJ2', 'CO');
		 $sheet->setCellValue('BK2', 'PAN');
		 $sheet->setCellValue('BL2', 'Aadhaar');
		 $sheet->setCellValue('BM2', 'Gun Lic No');
		 $sheet->setCellValue('BN2', 'Gun Expiry');
		 $sheet->setCellValue('BO2', 'DL No');
		 $sheet->setCellValue('BP2', 'DL Expiry');
		 $sheet->setCellValue('BQ2', 'Pasprt No');
		 $sheet->setCellValue('BR2', 'Pasprt Exp');
		 $sheet->setCellValue('BS2', 'PV Appdt');
		 $sheet->setCellValue('BT2', 'PV Expiry');
		 $sheet->setCellValue('BU2', 'Army No');
		 $sheet->setCellValue('BV2', 'Army Rank');
		 $sheet->setCellValue('BW2', 'Voter Id');
		 $sheet->setCellValue('BX2', 'Mobile');
		 $sheet->setCellValue('BY2', 'unitlinked');
		 $sheet->setCellValue('BZ2', 'unitloc');
		 $sheet->setCellValue('CA2', 'salmonth');
		 
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
			$sheet->setCellValue('AB'.$StCount, $list->duties);
			$sheet->setCellValue('AC'.$StCount, $list->otduty);
			$sheet->setCellValue('AD'.$StCount, $list->basic);
			$sheet->setCellValue('AE'.$StCount, $list->vda);
			$sheet->setCellValue('AF'.$StCount, $list->hra);
			$sheet->setCellValue('AG'.$StCount, $list->conv);
			$sheet->setCellValue('AH'.$StCount, $list->supv);
			$sheet->setCellValue('AI'.$StCount, $list->gun);
			$sheet->setCellValue('AJ'.$StCount, $list->spl);
			$sheet->setCellValue('AK'.$StCount, $list->uniform);
			$sheet->setCellValue('AL'.$StCount, $list->wash);
			$sheet->setCellValue('AM'.$StCount, $list->bonus);
			$sheet->setCellValue('AN'.$StCount, $list->nh);
			$sheet->setCellValue('AO'.$StCount, $list->leave);
			$sheet->setCellValue('AP'.$StCount, $list->na);
			$sheet->setCellValue('AQ'.$StCount, $list->otpay);
			$sheet->setCellValue('AR'.$StCount, $list->gross);
			$sheet->setCellValue('AS'.$StCount, $list->adv);
			$sheet->setCellValue('AT'.$StCount, $list->pf);
			$sheet->setCellValue('AU'.$StCount, '');
			$sheet->setCellValue('AV'.$StCount, $list->lwf);
			$sheet->setCellValue('AW'.$StCount, $list->ptax);
			$sheet->setCellValue('AX'.$StCount, $list->total_deduction);
			$sheet->setCellValue('AY'.$StCount, $list->netpay);
			$sheet->setCellValue('AZ'.$StCount, $list->dob);
			$sheet->setCellValue('BA'.$StCount, $list->doj);
			$sheet->setCellValue('BB'.$StCount, $list->gender);
			$sheet->setCellValue('BC'.$StCount, $list->name);
			$sheet->setCellValue('BD'.$StCount, $list->created_ts);
			$sheet->setCellValue('BE'.$StCount, '');
			$sheet->setCellValue('BF'.$StCount, $list->c_branch_name);
			$sheet->setCellValue('BG'.$StCount, $list->phyatt);
			$sheet->setCellValue('BH'.$StCount, $list->el);
			$sheet->setCellValue('BI'.$StCount, $list->fl);
			$sheet->setCellValue('BJ'.$StCount, $list->co);
			$sheet->setCellValue('BK'.$StCount, $list->pan);
			$sheet->setCellValue('BL'.$StCount, $list->aadhaar_card_no);
			$sheet->setCellValue('BM'.$StCount, $list->gun_lic_no);
			$sheet->setCellValue('BN'.$StCount, $list->gun_license_expiry_date);
			$sheet->setCellValue('BO'.$StCount, $list->dl_no);
			$sheet->setCellValue('BP'.$StCount, $list->dl_expiry);
			$sheet->setCellValue('BQ'.$StCount, $list->pasprt_no);
			$sheet->setCellValue('BR'.$StCount, $list->pasprt_exp);
			$sheet->setCellValue('BS'.$StCount, $list->pv_appdt);
			$sheet->setCellValue('BT'.$StCount, $list->pv_expiry);
			$sheet->setCellValue('BU'.$StCount, $list->army_no);
			$sheet->setCellValue('BV'.$StCount, $list->army_rank);
			$sheet->setCellValue('BW'.$StCount, $list->voterid);
			$sheet->setCellValue('BX'.$StCount, $list->mobile);
			$sheet->setCellValue('BY'.$StCount, $list->unitlinked);
			$sheet->setCellValue('BZ'.$StCount, $list->unitloc);
			$sheet->setCellValue('CA'.$StCount, $list->payment_month);
			
			$StCount++;
		} 
		//print_r($data);exit;
		// $sheet->setCellValue('B', $row['order_no']);
		 //$sheet->setCellValue();arup
		 
		 
		 $writer = new Xlsx($spreadsheet);
		 
		 $filename = 'Clielt_Suplimente_hold_excel';
		 
		 header('Content-Type: application/vnd.ms-excel');
		 header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		 header('Cache-Control: max-age=0');
		 
		 $writer->save('php://output'); // download file 
		 
		 }
  
}

?>
