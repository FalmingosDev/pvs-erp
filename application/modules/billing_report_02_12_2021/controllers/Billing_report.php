<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Billing_report extends MY_Controller 
{
	
	public function __construct() 
	{
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id)
		{
			redirect('login');
    	}
	
		// $this->load->model('Inv_process_model','im');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		$this->form_validation->CI =& $this;
		$this->load->model('Billing_model','bm');
	}
  
	public function index()
  	{
		$data = [];
		$month_obj = $this->bm->getMonth();
		$month_list = array('' => 'Select Month & Year');
		foreach($month_obj as $month){
			$month_list[$month->attendance_month] = $month->MonthYear;
		}
		$data['month'] = $month_list;

		$client_obj = $this->bm->getClientName();
		$client_list = array('' => 'Select Client');
		foreach($client_obj as $client)
		{
			$client_list[$client->client_id] = $client->client_name;
		}
		$data['client'] = $client_list;
		//$data['list'] = $this->cm->client_list();
		//echo "<pre>"; print_r($data['list']); exit();
		$this->template->write('title', 'Billing Report', TRUE);
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
		$this->template->write_view('content', 'list', $data , TRUE);
		$this->template->render();
	}

	public function check_client()
	{
		$client_id = $this->uri->segment(3);
		$billing_method= $this->bm->getClientBillingMethod($client_id);
	 	//print_r($data['ptax']);die;
	 	echo json_encode(array('billing_method' => $billing_method->billing_method, 'status' => 1));
 	}

  	public function branch_list()
  	{
		$client_id = $this->input->post('client_id');
		//$branch_id = $this->input->post('branch_id');
		$data['branch_list'] = $this->bm->getBranch($client_id);
		//print_r($data['designation_list']);die;
		echo json_encode(array('branch_list' => $data['branch_list'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
		//echo json_encode(array('newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}

	public function state_list()
	{
		$client_id = $this->input->post('client_id');
		//$branch_id = $this->input->post('branch_id');
		$data['state_list'] = $this->bm->getState($client_id);
		//print_r($data['designation_list']);die;
		echo json_encode(array('state_list' => $data['state_list'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
		//echo json_encode(array('newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}

	public function generate_excel()
	{
		if (!empty($this->input->post('month')) && !empty($this->input->post('client_id')))
		{
			$month = $this->input->post('month'); 
			$client_id = $this->input->post('client_id');
			$branch_id = $this->input->post('branch_id');
			$state_id = $this->input->post('state_id');
			$billing_method = $this->bm->getClientBillingMethod($client_id);
		
			$billing = $billing_method->billing_method;
			if ($billing == 'B')
			{
				if(empty($branch_id))
				{
					$this->session->set_flashdata('msg', 'You do not select Branch!');
					redirect(base_url().'billing_report');
				}
				
			}
			elseif ($billing == 'S')
			{
				if(empty($state_id))
				{
					$this->session->set_flashdata('msg', 'You do not select state!');
					redirect(base_url().'billing_report');
				}
			}	

					
			$list = $this->bm->getBillingList($month,$client_id,$branch_id,$state_id);

			//pr($list);
			
			$spreadsheet = new Spreadsheet();
			$spreadsheet->setActiveSheetIndex(0);  
			$sheet = $spreadsheet->getActiveSheet();

	
			$sheet->setCellValue('A1', 'Sr.No.');
			$sheet->setCellValue('B1', 'State');
			$sheet->setCellValue('C1', 'Address of the Branch');
			$sheet->setCellValue('D1', 'Branch Name');
			$sheet->setCellValue('E1', 'Branch ID as per Bank');
			$sheet->setCellValue('F1', 'Branch Category as per Bank');
			$sheet->setCellValue('G1', 'Category of City as per labour notification');
			$sheet->setCellValue('H1', 'Applicability of Wages as per (Central / State)');
			$sheet->setCellValue('I1', 'Contractual Manpower Cost (Wages Per Day)');
			$sheet->setCellValue('J1', 'No. of Staff');
			$sheet->setCellValue('K1', 'No. of Days present');
			$sheet->setCellValue('L1', 'Wages to be paid ');
			$sheet->setCellValue('M1', 'EPF @ 13%');
			$sheet->setCellValue('N1', 'ESIC on Basic wages  @ 3.15%');
			$sheet->setCellValue('O1', 'Uniform');
			$sheet->setCellValue('P1', 'Bonus @ 8.33% on MW');
			$sheet->setCellValue('Q1', 'Sub Total');
			$sheet->setCellValue('R1', 'Mangement Fee');  
			$sheet->setCellValue('S1', 'Gross Amount');
			$sheet->setCellValue('T1', 'SGST');
			$sheet->setCellValue('U1', 'CGST');
			$sheet->setCellValue('V1', 'IGST');
			$sheet->setCellValue('W1', 'UGST');
			$sheet->setCellValue('X1', 'Total Billing Amount');
			$styleArray = array(
				'font'  => array(
				'bold'  => true,
				'color' => array('rgb' => '000000'),
			));
			
			$sheet->getStyle('A1:X1')->applyFromArray($styleArray);
		
			foreach(range('A','X') as $columnID)
			{
				$sheet->getColumnDimension($columnID)->setAutoSize(true);
			}
			$total_gross_pay=0;
			$total_epf=0;
			$total_esi=0;
			$total_uniform_deduct=0;
			$total_bonus=0;
			$total_services_free=0;
			$total_gross_amount=0;
			$total_sgst=0;
			$total_cgst=0;
			$total_igst=0;
			$total_ugst=0;
			$total_subtotal=0;
			$total_billing_ammount=0;
			$StCount = 2;
			$sn=1;
			foreach($list as $list_row)
			{
				$total_gross_pay=$total_gross_pay+$list_row->total_gross_pay;
				$total_epf=$total_epf+$list_row->epf;
				$total_esi=$total_esi+$list_row->esi;
				$total_uniform_deduct=$total_uniform_deduct+$list_row->uniform_deduct;
				$total_bonus=$total_bonus+$list_row->bonus;

				$total_subtotal=$total_subtotal+$list_row->sub_total;
				$total_services_free=$total_services_free+$list_row->services_free;
				$total_gross_amount=$total_gross_amount+$list_row->gross_amount;
				$total_sgst=$total_sgst+$list_row->sgst;
				$total_cgst=$total_cgst+$list_row->cgst;
				$total_igst=$total_igst+$list_row->igst;
				$total_ugst=$total_ugst+$list_row->ugst;
				$total_billing_ammount=$total_billing_ammount+$list_row->total_billing_ammount;

				$sheet->setCellValue('A'.$StCount, $sn);
				$sheet->setCellValue('B'.$StCount, $list_row->state_name);
				$sheet->setCellValue('C'.$StCount, $list_row->address);
				$sheet->setCellValue('D'.$StCount, $list_row->branch_name);
				$sheet->setCellValue('E'.$StCount, $list_row->branch_code);
				$sheet->setCellValue('F'.$StCount, $list_row->branch_category);
				$sheet->setCellValue('G'.$StCount, '');
				$sheet->setCellValue('H'.$StCount, $list_row->gross_pay);
				$sheet->setCellValue('I'.$StCount, $list_row->gross_pay_per_day);
				$sheet->setCellValue('J'.$StCount, $list_row->nu_of_staff);
				$sheet->setCellValue('K'.$StCount, $list_row->payment_days);
				$sheet->setCellValue('L'.$StCount, $list_row->total_gross_pay);
				$sheet->setCellValue('M'.$StCount, $list_row->epf);
				$sheet->setCellValue('N'.$StCount, $list_row->esi);
				$sheet->setCellValue('O'.$StCount, $list_row->uniform_deduct);
				$sheet->setCellValue('P'.$StCount, $list_row->bonus);
				$sheet->setCellValue('Q'.$StCount, $list_row->sub_total);
				$sheet->setCellValue('R'.$StCount, $list_row->services_free);
				$sheet->setCellValue('S'.$StCount, $list_row->gross_amount);
				$sheet->setCellValue('T'.$StCount, $list_row->sgst);
				$sheet->setCellValue('U'.$StCount, $list_row->cgst);
				$sheet->setCellValue('V'.$StCount, $list_row->igst);
				$sheet->setCellValue('W'.$StCount, $list_row->ugst);
				$sheet->setCellValue('X'.$StCount, $list_row->total_billing_ammount);
				$StCount++;
				$sn++;
			} 
			
			$StCount++;
			$sheet->getStyle('A'.$StCount.':X'.$StCount)->applyFromArray($styleArray);
			$sheet->setCellValue('A'.$StCount, 'TOTAL');
			$sheet->setCellValue('B'.$StCount, '');
			$sheet->setCellValue('C'.$StCount, '');
			$sheet->setCellValue('D'.$StCount,'');
			$sheet->setCellValue('E'.$StCount, '');
			$sheet->setCellValue('F'.$StCount, '');
			$sheet->setCellValue('G'.$StCount, '');
			$sheet->setCellValue('H'.$StCount, '');
			$sheet->setCellValue('I'.$StCount, '');
			$sheet->setCellValue('J'.$StCount, '');
			$sheet->setCellValue('K'.$StCount, '');
			$sheet->setCellValue('L'.$StCount, $total_gross_pay);
			$sheet->setCellValue('M'.$StCount, $total_epf);
			$sheet->setCellValue('N'.$StCount, $total_esi);
			$sheet->setCellValue('O'.$StCount, $total_uniform_deduct);
			$sheet->setCellValue('P'.$StCount, $total_bonus);
			$sheet->setCellValue('Q'.$StCount, $total_subtotal);
			$sheet->setCellValue('R'.$StCount, $total_services_free);
			$sheet->setCellValue('S'.$StCount, $total_gross_amount);
			$sheet->setCellValue('T'.$StCount, $total_sgst);
			$sheet->setCellValue('U'.$StCount, $total_cgst);
			$sheet->setCellValue('V'.$StCount, $total_igst);
			$sheet->setCellValue('W'.$StCount, $total_ugst);
			$sheet->setCellValue('X'.$StCount, $total_billing_ammount);
			
			$writer = new Xlsx($spreadsheet);
			$filename = 'Billing_excel';
			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
			header('Cache-Control: max-age=0');
			$writer->save('php://output'); // download file 


		}
		else
		{
			$this->session->set_flashdata('msg', 'You do not select any!');
			redirect(base_url().'billing_report');
		}
	}
}

?>
