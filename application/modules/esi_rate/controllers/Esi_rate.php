<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Esi_rate extends MY_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		
		$this->load->model('Esi_rate_model');
		// $this->load->model('Esi_rate_model','rm');
		$this->load->library('form_validation');
		
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{

		if(check_uri_permission('esi_rate', 'V') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 

		$effective_date  = $this->input->post('effective_date[]');
		$percentage  = $this->input->post('percentage');
		$comp_percentage  = $this->input->post('comp_percentage');

		$data['list'] = $this->Esi_rate_model->get_all_esi_rate($effective_date,$percentage,$comp_percentage);
		
		$this->template->write('title', 'Esi Rate', TRUE);
        
        $this->template->add_js('assets/js/jquery.dataTables.min.js');
        $this->template->add_js('assets/js/dataTables.bootstrap4.min.js');
        
        $this->template->add_css('assets/css/dataTables.bootstrap4.min.css');
		
        $this->template->write_view('content', 'list', $data, TRUE);
		
        $this->template->render();
		
	}

	public function add_esi()
	{

		if(check_uri_permission('esi_rate', 'A') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 
		
		if(!empty($this->input->post()))
		{
			
			$this->form_validation->set_rules('effective_date','Effective Date','trim|required|callback_effective_date_check');
			$this->form_validation->set_rules('percentage','Employee Contribution','trim|required');
			$this->form_validation->set_rules('comp_percentage','Employer Contribution','trim|required');
			
			if ($this->form_validation->run() == TRUE)
			{
				
				$esi_rate_id = $this->input->post('esi_rate_id');
				$effective_date  = $this->input->post('effective_date');
				$percentage  = $this->input->post('percentage');
				$comp_percentage  = $this->input->post('comp_percentage');
				//print_r($event_name);exit;
				$query =  $this->Esi_rate_model->add_esi($esi_rate_id,$effective_date,$percentage,$comp_percentage);	
				if($query)
				{
					redirect('esi_rate','refresh');
				}
				else
				{
					//print_r('ssss');exit;
					$this->session->set_flashdata('msg', 'Data Already Exists');
					redirect('esi_rate/add_esi');
				}
			}				
		}
		//print_r('Partha'); exit;
		$this->template->write('title', 'Dashboard', TRUE);
		$this->template->write_view('content','add_esi','', TRUE);
		$this->template->render();
	
	}

	public function effective_date_check($str) {
  
		$str = $this->input->post('effective_date');

		$esi_rate_id = NULL;
		if(!empty($this->input->post('esi_rate_id'))){
			$esi_rate_id = $this->input->post('esi_rate_id');
		}

		$check = $this->Esi_rate_model->checkDate($str,$esi_rate_id);
		if($check)
		{
			$this->form_validation->set_message('effective_date_check', 'The {field} is already exists ');
			
			return FALSE;
		}
		else
		{
			return TRUE;
		}
    }

	public function edit()
	{

		if(check_uri_permission('esi_rate', 'E') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 
		$url_event_id = $this->uri->segment(3);
		
		if(!empty($this->input->post()))
		{
			
			$this->form_validation->set_rules('effective_date','Effective Date','trim|required|callback_effective_date_check');
			$this->form_validation->set_rules('percentage','Employee Contribution','trim|required');
			$this->form_validation->set_rules('comp_percentage','Employer Contribution','trim|required');

			if ($this->form_validation->run() == TRUE)
			{
				$esi_rate_id = $this->input->post('esi_rate_id');
				$effective_date  = $this->input->post('effective_date');
				$percentage  = $this->input->post('percentage');
				$comp_percentage  = $this->input->post('comp_percentage');
								
				$query = $this->Esi_rate_model->esi_edit($esi_rate_id,$effective_date,$percentage,$comp_percentage,$url_event_id);
				//print_r($query);exit;
				if($query)
				{
					redirect('esi_rate','refresh');
				}
				else
				{
					//print_r('ssss');exit;
					$this->session->set_flashdata('msg', 'Data Already Exists');
					redirect('esi_rate/edit/'.$id);
				}
			}
		}
		$data = array();
		$data['edit_esi'] = $this->Esi_rate_model->get_edit_data($url_event_id);
		$this->template->write('title', 'Dashboard', TRUE);
		$this->template->write_view('content', 'edit', $data, TRUE);
        $this->template->render();
	}
	
	// public function holiday_list()
	// {
	// 	$state_id = $this->input->post('state_id');
	// 	$year = $this->input->post('year');
		
	// 	$data = array();
	// 	$list = $this->Esi_rate_model->holiday_list($state_id,$year);
	// 	//print_r($list);exit();
	// 	foreach($list as $list){
	// 		$data[] = array(
	// 				'holiday_id' => $list->holiday_id,'year' => $list->year, 'state_name' => $list->state_name,  
	// 				'event_date' => date('d/m/Y', strtotime($list->event_date)), 'event_name' => $list->event_name);
	// 			//	print_r($data); exit;
				
	// 	}
	// 	echo json_encode(array('list' => $data, 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	// }
}

