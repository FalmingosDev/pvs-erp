<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lwf_mst extends MY_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		
		$this->load->model('lwf_model','lm');
		$this->load->library('form_validation');
		
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{

		$this->template->write('title', 'Holiday List', TRUE);
        
		
		
		$data['list'] = $this->lm->lwflist();
		
		
        $this->template->add_js('assets/js/jquery.dataTables.min.js');
        $this->template->add_js('assets/js/dataTables.bootstrap4.min.js');
        
        $this->template->add_css('assets/css/dataTables.bootstrap4.min.css');
		
        $this->template->write_view('content', 'list', $data, TRUE);
		
        $this->template->render();
		/////////////////////////////////////////////////////////////////////////////
		
	}
	
	public function add()
	{
		if(!empty($this->input->post())){
			
			$this->form_validation->set_rules('state_id','State Name','required');
			
			
			if ($this->form_validation->run() == TRUE)
            {
				$state_id = $this->input->post('state_id');
				$period_from = $this->input->post('period_from');
				$period_to = $this->input->post('period_to');
				$employee_contribution = $this->input->post('employee_contribution');
				$employer_contribution = $this->input->post('employer_contribution');
				$total = $this->input->post('total');
				
				
				$query = $this->lm->insertlwf($state_id,$period_from,$period_to,$employee_contribution,$employer_contribution,$total);
				
				if($query->massage == 'Successfully Added'){
					redirect('lwf_mst');
				}
				$this->session->set_flashdata('msg', $query->massage);
				redirect('lwf_mst/add');
				
				//print_r($query); exit;
				/*
				if($query)
				{
					redirect('lwf_mst','refresh');
				}
				else
				{
					//print_r('ssss');exit;
					$this->session->set_flashdata('msg', 'Data Already Exists');
					redirect('lwf_mst/add');
				}*/
				//redirect('lwf_mst','refresh');
			}
		}		
		
		$data['state'] = $this->lm->get_all_state();
		$this->template->write('title', 'Dashboard', TRUE);
		$this->template->write_view('content','add',$data, TRUE);
		$this->template->render();
	
	}
	
	
	public function edit()
	{
		$url_event_id = $this->uri->segment(3);
		
		if(!empty($this->input->post())){
			
			$this->form_validation->set_rules('state_id','State Name','required');
			
			
			if ($this->form_validation->run() == TRUE)
            {
				$state_id = $this->input->post('state_id');
				$period_from = $this->input->post('period_from');
				$period_to = $this->input->post('period_to');
				$employee_contribution = $this->input->post('employee_contribution');
				$employer_contribution = $this->input->post('employer_contribution');
				$total = $this->input->post('total');
				$lwf_id = $this->input->post('lwf_id');
				
				//print_r ($lwf_id);
				$query = $this->lm->editlwf($state_id,$period_from,$period_to,$employee_contribution,$employer_contribution,$total,$lwf_id);
				
				//print_r($query); exit;
				
				if($query)
				{
					redirect('lwf_mst','refresh');
				}
				else
				{
					
					$this->session->set_flashdata('msg', 'Data Already Exists');
					redirect('lwf_mst/edit/'.$lwf_id);
				}
				//redirect('lwf_mst','refresh');
			}
		}		
		
		$data['state'] = $this->lm->get_all_state();
		
		$data['lwfeditdetail'] = $this->lm->lwfeditdetail($url_event_id);
		
		$this->template->write('title', 'Dashboard', TRUE);
		$this->template->write_view('content','edit',$data, TRUE);
		$this->template->render();
	
	}
	
}

