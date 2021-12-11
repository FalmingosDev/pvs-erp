<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class inv_process extends MY_Controller {

  public function __construct() {
    parent::__construct();
    if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
      redirect('login');
    }
	
    // $this->load->model('Inv_process_model','im');
	
    $this->load->library('form_validation');
  	$this->load->helper(array('form', 'url'));
  	$this->form_validation->CI =& $this;
  	$this->load->model('Inv_process_model','ip');
  }
  
  public function index(){
    $data = [];

    if (!empty($this->input->post('month')) && !empty($this->input->post('client_id')))
    {
    	//print_r($this->input->post());die;
        $month = $this->input->post('month'); 
        $client_id = $this->input->post('client_id');
        $branch_id = $this->input->post('branch_id');
        $state_id = $this->input->post('state_id');
                
        $abc = $this->ip->getInvList($month,$client_id,$branch_id,$state_id);
        $data['InvList'] = count($abc) > 0 ? $abc : array();

    }
    else
    {
    	$data['InvList'] = array();
    }
   //print_r($data['InvList']);
    $data['ProcessedInvoiceList'] = $this->ip->getProcessedInvList();
    // if(empty($data['ProcessedInvoiceList'])){
    // 	$data['ProcessedInvoiceList'] = [];
    // }
   // print_r($data['ProcessedInvoiceList']);


    $month_obj = $this->ip->getMonth();
    $month_list = array('' => 'Select Month & Year');
    foreach($month_obj as $month){
        $month_list[$month->attendance_month] = $month->MonthYear;
    }
    $data['month'] = $month_list;

    $client_obj = $this->ip->getClientName();
    $client_list = array('' => 'Select Client');
    foreach($client_obj as $client){
        $client_list[$client->client_id] = $client->client_name;
    }
    $data['client'] = $client_list;
    //$data['list'] = $this->cm->client_list();
    //echo "<pre>"; print_r($data['list']); exit();
    $this->template->write('title', 'Bill Generation', TRUE);
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

  public function branch_list(){
		$client_id = $this->input->post('client_id');
		//$branch_id = $this->input->post('branch_id');
		$data['branch_list'] = $this->ip->getBranch($client_id);
		//print_r($data['designation_list']);die;
		echo json_encode(array('branch_list' => $data['branch_list'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
		//echo json_encode(array('newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}

	public function state_list(){
		$client_id = $this->input->post('client_id');
		//$branch_id = $this->input->post('branch_id');
		$data['state_list'] = $this->ip->getState($client_id);
		//print_r($data['designation_list']);die;
		echo json_encode(array('state_list' => $data['state_list'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
		//echo json_encode(array('newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}

	public function check_client(){
           $client_id = $this->uri->segment(3);
           
           $billing_method= $this->ip->getClientBillingMethod($client_id);
        //print_r($data['ptax']);die;
        echo json_encode(array('billing_method' => $billing_method->billing_method, 'status' => 1));
    }

	public function generate_bill($designation_id,$total_att,$client_id,$branch_id,$attendance_month,$billing_method,$state_id){
	
	if(!empty($this->input->post())){
		//die;
		$this->form_validation->set_rules('invoice_date','Invoice Date','required');
		// $this->form_validation->set_rules('bill_month','Bill For the Month','required');
		// $this->form_validation->set_rules('ref_no','Ref No.','required');
		// $this->form_validation->set_rules('amount_in_words','Amount In Words','required');
		// $this->form_validation->set_rules('note_to_print','Note to print in Bill','required');
		// $this->form_validation->set_rules('covering','Covering','required');
		// $this->form_validation->set_rules('narration','Narration','required');

		if ($this->form_validation->run() == TRUE)
        {
			$client_id = $this->input->post('client_id');
			$designation_id = $this->input->post('designation_id');
			$client_attendance_id = $this->input->post('client_attendance_id');
			$total_att = $this->input->post('total_att');
			$branch_id = $this->input->post('branch_id');
			$attendance_month = $this->input->post('attendance_month');
			$invoice_no = $this->input->post('invoice_no');
			$invoice_date = $this->input->post('invoice_date');
			$date_to_print = $this->input->post('date_to_print');
			$billing_address = $this->input->post('billing_address');
			$total = $this->input->post('total');
			$releiving = $this->input->post('releiving');
			$pf_percentage = $this->input->post('pf_percentage');
			$pf_amnt = $this->input->post('pf_amnt');
			$esi_percentage = $this->input->post('esi_percentage');
			$esi_amnt = $this->input->post('esi_amnt');
			$service_chrg_prcnt = $this->input->post('service_chrg_prcnt');
			$final_service_chrg_amnt = $this->input->post('final_service_chrg_amnt');
			$subtotal_amnt = $this->input->post('subtotal_amnt');
			$service_tax_prcnt = $this->input->post('service_tax_prcnt');
			$service_tax_with_subtotal = $this->input->post('service_tax_with_subtotal');
			$cess = $this->input->post('cess');
			$round_off = $this->input->post('round_off');
			$bill_month = $this->input->post('bill_month');
			$grand_total = $this->input->post('grand_total');
			$ref_no = $this->input->post('ref_no');
			//$amount_in_words = $this->input->post('amount_in_words');
			$note_to_print = $this->input->post('note_to_print');
			$covering = $this->input->post('covering');
			$narration = $this->input->post('narration');

			$qry = $this->ip->insertInvProcess($client_id,$designation_id,$client_attendance_id,$total_att,$branch_id,$attendance_month,$invoice_no,$invoice_date,$date_to_print,$billing_address,$total,$releiving,$pf_percentage,$pf_amnt,$esi_percentage,$esi_amnt,$service_chrg_prcnt,$final_service_chrg_amnt,$subtotal_amnt,$service_tax_prcnt,$service_tax_with_subtotal,$cess,$round_off,$grand_total,$bill_month,$ref_no,$note_to_print,$covering,$narration);
			if($qry){
				$this->session->set_flashdata('msg', 'Invoice Processed Successfully');
                redirect(base_url().'inv_process');			
            }

		}
	}
	//$data = [];
	//$data['client_attendance_id'] = $client_attendance_id;
	$data['total_att'] = $total_att;
	$data['branch_id'] = $branch_id;
	$data['attendance_month'] = $attendance_month;
	$data['billing_method'] = $billing_method;
	$data['state_id'] = $state_id;
	//print_r($data['state_id']);die;
	$data['invoice_no'] = $this->ip->getInvoice();
	$data['clientData'] = $this->ip->getClientData($designation_id,$total_att,$client_id,$branch_id,$attendance_month,$billing_method,$state_id);
	$data['clientGstData'] = $this->ip->getGstData($client_id,$branch_id,$state_id,$billing_method);
	$data['epf_rate'] = $this->ip->getEpfRate();
	$data['esi_rate'] = $this->ip->getEsiRate();
	//print_r($data['clientData']);die;
	//print_r($data['invoice_no']);die;
    //$data['list'] = $this->cm->client_list();
    //echo "<pre>"; print_r($data['list']); exit();
    $this->template->write('title', 'Bill Generate', TRUE);
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

	
	
	$this->template->write_view('content', 'add', $data , TRUE);
	$this->template->render();
	}
  
   
	 
	 
	public function add()
	{
			 $data = [];
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

	
	
	$this->template->write_view('content', 'add', '', TRUE);
	$this->template->render();
	}
  

}

?>
