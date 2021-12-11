<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delete_supp_salary extends MY_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		
		$this->load->model('Delete_supp_salary_model');
		$this->load->library('form_validation');
		
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url'));
	}
	

	public function index()
	{

		if(check_uri_permission('tid', 'V') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 
		$data['month_year']  = $this->input->get('month_year');
		$data['client_id']  = $this->input->get('client_id');
		$data['branch_id']  = $this->input->get('branch_id');


		if(!empty($data['month_year']) || !empty($data['client_id']) || !empty($data['branch_id']))
		{
			$data['list'] = $this->Delete_supp_salary_model->get_all_records($data['month_year'],$data['client_id'],$data['branch_id']);
		}
		else{
			$data['list'] = array();
		}

		$month_obj = $this->Delete_supp_salary_model->get_all_month();
		//print_r($month_obj);die;
		$month_list = array('' => 'Select Month & Year');
		foreach($month_obj as $month_year)
		{
			$month_list[$month_year->payment_month] = $month_year->month_year;
		}
		$data['month_year'] = $month_list;

		
		$this->template->write('title', 'Delete Supplimentary Salary', TRUE);
        
        $this->template->add_js('assets/js/jquery.dataTables.min.js');
        $this->template->add_js('assets/js/dataTables.bootstrap4.min.js');
        
        $this->template->add_css('assets/css/dataTables.bootstrap4.min.css');
		
        $this->template->write_view('content', 'list', $data, TRUE);
		
        $this->template->render();
		
		
	}

	public function branch_list(){
		$month_year = $this->input->post('month_year');
		// echo $month_year;die;
		// $branch_id = $this->input->post('branch_id');
		$data['branch_list'] = $this->Delete_supp_salary_model->get_all_branch($month_year);
		echo json_encode(array('branch_list' => $data['branch_list'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}


	public function client_list(){
		$month_year = $this->input->post('month_year');
		$data['client_list'] = $this->Delete_supp_salary_model->get_all_client($month_year);
		echo json_encode(array('client_list' => $data['client_list'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}


	public function delete(){

		// print_r($client_id); exit;

		if(check_uri_permission('delete_client_salary', 'D') == 0){
	     $this->session->set_flashdata('error_msg', 'You have no permission on this page');
	     redirect(base_url());
	     }

		 $payment_month = $this->input->post('payment_month');
		$client_id = $this->input->post('client_id');
		$branch_id = $this->input->post('branch_id');
		
		//print_r($id); exit;
		$this->Delete_supp_salary_model->delete($payment_month,$client_id,$branch_id);
		echo json_encode(array('newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}


	

	public function search()
	{
		$month_year = $this->input->post('month_year');
        $client_id = $this->input->post('client_id');
        $branch_id = $this->input->post('branch_id');
		
		$data['list'] = $this->Delete_supp_salary_model->get_all_records($month_year,$client_id,$branch_id);
		
		echo json_encode(array('list' => $data['list'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}



	

	
	
	
	
}

