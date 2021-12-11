<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advance_entry extends MY_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		$this->load->model('advance_entry_model', 'am');
		$this->load->library('form_validation');
		
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{
		if(check_uri_permission('advance_entry', 'V') == 0){
	     $this->session->set_flashdata('error_msg', 'You have no permission on this page');
	     redirect(base_url());
	     }

		//$data['list'] = array();
		
		$this->template->write('title', 'Advance/Loan/Tds Entry', TRUE);
        /**
         * if you have any js to add for this page
         */
		$this->template->add_js('assets/js/jquery.dataTables.min.js');
        $this->template->add_js('assets/js/dataTables.bootstrap4.min.js');
        /**
         * if you have any css to add for this page
         */
		 $data['list'] = $this->am->list('');
		 
        $this->template->add_css('assets/css/dataTables.bootstrap4.min.css');
        $this->template->write_view('content', 'list', $data, TRUE);
        $this->template->render();
	}
	
	public function add(){

		if(check_uri_permission('advance_entry', 'A') == 0){
	     $this->session->set_flashdata('error_msg', 'You have no permission on this page');
	     redirect(base_url());
	     }
		
		$employee_id  = $this->input->post('employee_id');
		$paid_date  = $this->input->post('start');
		$deduction_date  = $this->input->post('end');
		$remarks  = $this->input->post('remarks');
		$type  = $this->input->post('type');
		$amount  = $this->input->post('amount');
		$installment  = $this->input->post('installment');
		$emi  = $this->input->post('emi');
		
		
		if(!empty($employee_id)){
			//print_r($paid_date); exit;
			//print_r($emi); exit;
			$query =  $this->am->addloan($employee_id,$paid_date,$deduction_date,$remarks,$type,$amount,$installment,$emi);
			
			if($query){
				redirect('advance_entry','refresh');
				}
				else{
			//print_r('ssss');exit;
			$this->session->set_flashdata('msg', 'Data Already Exists');
			
			redirect('advance_entry/add');
			
			
				}
			
			//redirect('advance_entry','refresh');
		}
		$data['employee'] = $this->am->employee('');
		
		//print_r('Partha'); exit;
		$this->template->write('title', 'Advance/Loan/Tds Entry', TRUE);
		$this->template->write_view('content', 'add', $data, TRUE);
        $this->template->render();
		
		//$this->load->view('add_state.php');
	}
	
	public function edit($id){

		if(check_uri_permission('advance_entry', 'E') == 0){
	     $this->session->set_flashdata('error_msg', 'You have no permission on this page');
	     redirect(base_url());
	     }
		 
		//print_r($id); exit;
		
		if(!empty($this->input->post())){
			
			$this->form_validation->set_rules('id','Amount','required');
			
			
			if ($this->form_validation->run() == TRUE)
            {
				$id  = $this->input->post('id');
				$remarks  = $this->input->post('remarks');
				$amount  = $this->input->post('amount');
				$installment  = $this->input->post('installment');
				$emi  = $this->input->post('emi');
				
				$this->am->editadvance($id,$remarks,$amount,$installment,$emi);
				
					redirect('advance_entry','refresh');
				
			}
		}
		
		
		
		$data['edit_list'] = $this->am->edit_list($id);
		
		//print_r($data); exit;
		
		$this->template->write('title', 'Dashboard', TRUE);
		$this->template->write_view('content','edit',$data, TRUE);
		$this->template->render();
		
		
	}
	
	public function employee_list()
	{
		$employee_id = $this->input->post('employee_id');
		
		$data = array();
		//$data['list'] = $this->am->emp_list($employee_id);
		$list = $this->am->emp_list($employee_id);
		foreach($list as $list){
			$data[] = array(
					'employee_loan_id' => $list->employee_loan_id, 'employee_id' => $list->employee_id, 'type' =>  $list->type, 
					'paid_date' => date('d/m/Y', strtotime($list->paid_date)), 'amount' => $list->amount, 'installment' => $list->installment, 'emi' => $list->emi, 'deducted_amount' => $list->deducted_amount, 'balance' => $list->balance);
				//print_r($data); exit;
		}
		echo json_encode(array('list' => $data, 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}
	
	public function status($id, $status){

		if(check_uri_permission('advance_entry', 'D') == 0){
	     $this->session->set_flashdata('error_msg', 'You have no permission on this page');
	     redirect(base_url());
	     }

        $this->am->status($id,$status);
        redirect('advance_entry','refresh');
    }
	
}

	