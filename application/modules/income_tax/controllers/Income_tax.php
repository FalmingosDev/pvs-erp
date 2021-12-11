<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Income_tax extends MY_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		$this->load->model('income_tax_model');
		$this->load->library('form_validation');
		
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{

		if(check_uri_permission('income_tax', 'V') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        }

		$data['list'] = $this->income_tax_model->get_all_income_tax();
		//echo "<pre>"; print_r($list); echo "</pre>";
		//$this->load->view('welcome_message');
		
		$this->template->write('title', 'Income Tax', TRUE);
        /**
         * if you have any js to add for this page
         */
        
        $this->template->add_js('assets/js/jquery.dataTables.min.js');
        $this->template->add_js('assets/js/dataTables.bootstrap4.min.js');
        /**
         * if you have any css to add for this page
         */
        $this->template->add_css('assets/css/dataTables.bootstrap4.min.css');
		
        $this->template->write_view('content', 'list', $data, TRUE);
		
        $this->template->render();
	}
	
	
	
	
	public function change_status($income_tax_id, $status)
	{
		//print_r($status); exit;
		if(check_uri_permission('income_tax', 'D') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        }

		$this->income_tax_model->change_status($income_tax_id,$status);
		redirect('income_tax','refresh');
	}
	
	public function add()
	{
			
			if(check_uri_permission('income_tax', 'A') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        }

		if(!empty($this->input->post()))
		{
			
			$this->form_validation->set_rules('salary_from','Salary From','trim|required|numeric|callback_checkConflict');
			$this->form_validation->set_rules('tax_percentage','Tax Percentage','trim|required|numeric');
			$this->form_validation->set_rules('citizen_type','Citizen Type','required');
			
			$salary_to  = $this->input->post('salary_to');
			$salary_from  = $this->input->post('salary_from');
			$citizen_type  = $this->input->post('citizen_type');
			
			$this->form_validation->set_rules('financial_year_id','Select Financial Year','trim|required');
			if($salary_to > 0){				
				$this->form_validation->set_rules('salary_to','Salary To','trim|required|numeric|callback_checkConflict|greater_than['.$salary_from.']',  array('greater_than' => '{field} should be greater than Salary From'));
			}
			else
			{
				$this->form_validation->set_rules('salary_to','Salary To','trim|required|numeric');
			}
			
		
			if ($this->form_validation->run() == TRUE)
			{
				$financial_year_id  = $this->input->post('financial_year_id');
				$citizen_type = $this->input->post('citizen_type');
				$salary_from  = $this->input->post('salary_from');
				$salary_to  = $this->input->post('salary_to');
				$tax_percentage  = $this->input->post('tax_percentage');
				$this->income_tax_model->add($financial_year_id,$citizen_type,$salary_from,$salary_to,$tax_percentage);	
				redirect('income_tax','refresh');
			}
						
		}
		//print_r('Parthadddddd'); exit;
		$financial_year_obj = $this->income_tax_model->get_all_financial_year();
        $financial_year_list = array('' => 'Select Financial Year');
        foreach($financial_year_obj as $financial_year)
		{
            $financial_year_list[$financial_year->financial_year_id] = $financial_year->fy_name;
        }
        $data['financial_year'] = $financial_year_list;
		
		//print_r('Partha'); exit;
		 $this->template->write('title', 'Dashboard', TRUE);
		
		
		$this->template->write_view('content','add', $data, TRUE);
        $this->template->render();
		
		
	}
	
	
	public function edit()
	{
		if(check_uri_permission('income_tax', 'E') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        }
		if(!empty($this->input->post()))
		{
			$this->form_validation->set_rules('citizen_type','Affected Citizen Type','trim|required');
			$this->form_validation->set_rules('salary_from','Salary From','trim|required|numeric|callback_checkConflict');
			$this->form_validation->set_rules('tax_percentage','Tax Percentage','trim|required|numeric');
			
			$salary_to  = $this->input->post('salary_to');
			$salary_from  = $this->input->post('salary_from');
			
			$this->form_validation->set_rules('financial_year_id','Select Financial Year','trim|required');
			if($salary_to > 0){				
				$this->form_validation->set_rules('salary_to','Salary To','trim|required|numeric|callback_checkConflict|greater_than['.$salary_from.']',  array('greater_than' => '{field} should be greater than Salary From'));
			}
			else{
				$this->form_validation->set_rules('salary_to','Salary To','trim|required|numeric');
			}
			
			$this->form_validation->set_rules('financial_year_id','Select Financial Year','trim|required');
			
			if ($this->form_validation->run() == TRUE)
			{
						$income_tax_id  = $this->input->post('income_tax_id');
						$financial_year_id  = $this->input->post('financial_year_id');
						$citizen_type  = $this->input->post('citizen_type');
						$salary_from  = $this->input->post('salary_from');
						$salary_to  = $this->input->post('salary_to');
						$tax_percentage  = $this->input->post('tax_percentage');
				
				//print_r($ct_id); exit;
				
				$qry =$this->income_tax_model->edit($income_tax_id,$financial_year_id,$citizen_type,$salary_from,$salary_to,$tax_percentage);	
				if($qry)
                {
                    $this->session->set_flashdata('msg', 'Successfully Updated');
                    redirect(base_url().'income_tax/edit/'. $income_tax_id);
                }
			}
			
		}
		
		$this->template->write('title', 'Dashboard', TRUE);
		
		
		$income_tax_id = $this->uri->segment(3);
		
		//print_r($income_tax_id); exit;
		$data['income_tax_view'] = $this->income_tax_model->income_tax_view($income_tax_id);
		$financial_year_obj = $this->income_tax_model->get_all_income_tax();
        $financial_year_list = array('' => 'Select Financial Year');
        foreach($financial_year_obj as $financial_year){
            $financial_year_list[$financial_year->financial_year_id] = $financial_year->fy_name;
        }
        $data['financial_year'] = $financial_year_list;
		
		$this->template->write_view('content', 'edit', $data, TRUE);
        $this->template->render();
		
	}

	public function checkConflict($val)
	{
		$financial_year_id  = $this->input->post('financial_year_id');
		$citizen_type = $this->input->post('citizen_type');
		$income_tax_id  = $this->input->post('income_tax_id');
		$check = $this->income_tax_model->checkSalaryConflict($val, $financial_year_id, $citizen_type, $income_tax_id);
		// SELECT COUNT(1) cnt FROM it_mst WHERE $val BETWEEN salary_from AND salary_to AND financial_year_id = $financial_year_id AND citizen_type = $citizen_type;
		//print_r($check); exit();
		if($check['cnt'] > 0)
		{
			$this->form_validation->set_message('checkConflict', "The {field} conflicts with other records");
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
}

	