<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Holiday extends MY_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		
		$this->load->model('Holiday_model');
		// $this->load->model('Holiday_model','rm');
		$this->load->library('form_validation');
		
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{

		if(check_uri_permission('holiday', 'V') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 


		
		$data['year']  = $this->input->get('year');
		$data['state_id']  = $this->input->get('state_id');

		$data['list'] = $this->Holiday_model->get_all_holiday($data['year'], $data['state_id']);
		
		$state_obj = $this->Holiday_model->get_all_state();
		$state_list = array('' => 'Select State');
		foreach($state_obj as $state)
		{
			$state_list[$state->state_id] = $state->state_name;
		}
		$data['state'] = $state_list;
		
		$this->template->write('title', 'Holiday List', TRUE);
        
        $this->template->add_js('assets/js/jquery.dataTables.min.js');
        $this->template->add_js('assets/js/dataTables.bootstrap4.min.js');
        
        $this->template->add_css('assets/css/dataTables.bootstrap4.min.css');
		
        $this->template->write_view('content', 'list', $data, TRUE);
		
        $this->template->render();
		/////////////////////////////////////////////////////////////////////////////
		
	}

	public function add()
	{

		if(check_uri_permission('holiday', 'A') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 


		
		if(!empty($this->input->post()))
		{
			$this->form_validation->set_rules('year','Select Year','trim|required');
			$this->form_validation->set_rules('state_id','Select State','trim|required');
			$this->form_validation->set_rules('event_date[]','Event Date','trim');
			$this->form_validation->set_rules('event_name[]','Event Name','trim');
			
			if ($this->form_validation->run() == TRUE)
			{
				$year  = $this->input->post('year');
				$state_id  = $this->input->post('state_id');
				// $state_name  = $this->input->post('state_name[]');
				$event_date  = $this->input->post('event_date[]');
				$event_name  = $this->input->post('event_name[]');
				//print_r($event_name);exit;
				$query =  $this->Holiday_model->add($year,$state_id,$event_date,$event_name);	
				if($query)
				{
					redirect('holiday','refresh');
				}
				else
				{
					//print_r('ssss');exit;
					$this->session->set_flashdata('msg', 'Data Already Exists');
					redirect('holiday/add');
				}
			}
							
		}
		//print_r('Parthadddddd'); exit;
		$state_obj = $this->Holiday_model->get_all_state();
		$state_list = array('' => 'Select State');
		foreach($state_obj as $state)
		{
			$state_list[$state->state_id] = $state->state_name;
		}
		$data['state'] = $state_list;
		
		//print_r('Partha'); exit;
		$this->template->write('title', 'Dashboard', TRUE);
		$this->template->write_view('content','add', $data, TRUE);
		$this->template->render();
	
	}

	public function edit()
	{

		if(check_uri_permission('holiday', 'E') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 


		$url_event_id = $this->uri->segment(3);
		
		
		if(!empty($this->input->post()))
		{
			
			$this->form_validation->set_rules('event_date[]','Event Date','trim|required');
			$this->form_validation->set_rules('event_name[]','Event Name','trim|required');
			
			
			
			if ($this->form_validation->run() == TRUE)
			{
				$event_date  = $this->input->post('event_date[]');
				$event_name  = $this->input->post('event_name[]');
								
				$query = $this->Holiday_model->event_edit($event_date,$event_name,$url_event_id);
				//print_r($query);exit;
				if($query)
				{
					redirect('holiday','refresh');
				}
				else
				{
					//print_r('ssss');exit;
					$this->session->set_flashdata('msg', 'Data Already Exists');
					redirect('holiday/edit/'.$id);
				}
			}
		}
		
		// $data['holiday'] = $this->rm->holiday('');
		//print_r($url_client_id);exit;		
		// $data['resource'] = $this->rm->resourcelist('');
		 
		$data = array();
		$data['editdate'] = $this->Holiday_model->get_edit_data($url_event_id);
		$this->template->write('title', 'Dashboard', TRUE);
		$this->template->write_view('content', 'edit', $data, TRUE);
        $this->template->render();
	}
	
	public function holiday_list()
	{
		$state_id = $this->input->post('state_id');
		$year = $this->input->post('year');
		
		$data = array();
		$list = $this->Holiday_model->holiday_list($state_id,$year);
		//print_r($list);exit();
		foreach($list as $list){
			$data[] = array(
					'holiday_id' => $list->holiday_id,'year' => $list->year, 'state_name' => $list->state_name,  
					'event_date' => date('d/m/Y', strtotime($list->event_date)), 'event_name' => $list->event_name);
				//	print_r($data); exit;
				
		}
		echo json_encode(array('list' => $data, 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}
}

