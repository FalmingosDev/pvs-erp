<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contract_status extends MY_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		$this->load->model('contract_status_model','cm');
		$this->load->library('form_validation');
		$this->form_validation->CI =& $this;
		$this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{

		if(check_uri_permission('contract_status', 'V') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 
		
		$data['list'] = $this->cm->get_all_contract();
		$this->template->write('title', 'Dashboard', TRUE);
        /**
         * if you have any js to add for this page
         */

        $this->template->add_js('assets/js/jquery.dataTables.min.js');
        $this->template->add_js('assets/js/dataTables.bootstrap4.min.js');
        /**
         * if you have any css to add for this page
         */
        $this->template->add_css('assets/css/dataTables.bootstrap4.min.css');
        $this->template->write_view('content', 'contract_status_list', $data, TRUE);
        $this->template->render();
	}
	
	public function status($id, $status){

		if(check_uri_permission('contract_status', 'D') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 


		$this->cm->status($id,$status);
		redirect('contract_status','refresh');
	}

	public function addContractStatus(){

		if(check_uri_permission('contract_status', 'A') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 

		$this->template->write('title', 'Dashboard', TRUE);
        $this->template->write_view('content', 'add_contract', '', TRUE);
        $this->template->render();
        
		
		//$this->load->view('add_department.php');
	}

	public function insertContract()
	{		

		$this->form_validation->set_rules('contract_name','Contract Status Name','trim|required|callback_contract_name_check');
		
		 if ($this->form_validation->run() == TRUE)
		 {
		 	$contract_name = $this->input->post('contract_name');
			
			$qry = $this->cm->insertContract($contract_name);
			// if($qry){
			// 	$this->session->set_flashdata('msg', 'Successfully Inserted');
			// 	redirect(base_url().'contract_status','refresh');
			// }
			redirect('contract_status', 'refresh');
		 }
		 else
		 {
		 	$this->template->write('title', 'Dashboard', TRUE);
			
	        $this->template->write_view('content', 'add_contract', '', TRUE);
	        $this->template->render();
		 }
	}

	public function editcontract($id){

		if(check_uri_permission('contract_status', 'E') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 
        
		$data['contract_status'] = $this->cm->get_contract($id);
        $this->template->write_view('content', 'edit_contract', $data, TRUE);
        $this->template->render();

	}

	public function UpdateContract()
	{

		//$data['department'] = $this->department_model->get_dept($id);
		$this->load->library("security");
		$this->form_validation->set_rules('contract_name','Contract Status Name','trim|required|callback_contract_name_check');
		
		 if ($this->form_validation->run() == TRUE)
		 {
		 	$contract_name = $this->input->post('contract_name');
			$contract_id = $this->input->post('contract_id');
			
			$this->cm->UpdateContract($contract_name,$contract_id);
			redirect('contract_status', 'refresh');
		 }
		 else
		 {
		 	$contract_id = $this->input->post('contract_id');
		 	$data['contract_status'] = $this->cm->get_contract($contract_id);
		 	$this->template->write_view('content', 'edit_contract', $data, TRUE);
		 	$this->template->render();
		 }
	}

	public function contract_name_check($str)
    {
        $str = $this->input->post('contract_name');

        $contract_status_id = NULL;
        if(!empty($this->input->post('contract_status_id'))){
            $contract_status_id = $this->input->post('contract_status_id');
        }

        $check = $this->cm->checkContract($str,$contract_status_id);
        if($check)
        {
          	$this->form_validation->set_message('contract_name_check', 'The {field} is already exist');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
}

?>
