<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ptax extends MY_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		$this->load->model('ptax_model');
		$this->load->library('form_validation');
		
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{

		if(check_uri_permission('ptax', 'V') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 


		$data['list'] = $this->ptax_model->get_all_ptax();
		//echo "<pre>"; print_r($list); echo "</pre>";
		//$this->load->view('welcome_message');
		
		$this->template->write('title', 'City Master', TRUE);
        /**
         * if you have any js to add for this page
         */
        
        $this->template->add_js('assets/js/jquery.dataTables.min.js');
        $this->template->add_js('assets/js/dataTables.bootstrap4.min.js');
        /**
         * if you have any css to add for this page
         */
		 $state_obj = $this->ptax_model->get_all_state();
        $state_list = array('' => 'Select State');
        foreach($state_obj as $state){
            $state_list[$state->state_id] = $state->state_name;
        }
        $data['state'] = $state_list;
        $this->template->add_css('assets/css/dataTables.bootstrap4.min.css');
		
        $this->template->write_view('content', 'list', $data, TRUE);
        $this->template->render();
	}
	
	
	
	
	public function change_status($id, $status){

		if(check_uri_permission('ptax', 'D') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 


		//print_r($status); exit;
		$this->ptax_model->change_status($id,$status);
		redirect('ptax','refresh');
	}
	
	public function add_ptax(){

		if(check_uri_permission('ptax', 'A') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 
		//print_r('Parthadddddd'); exit;
		$state_obj = $this->ptax_model->get_all_state();
        $state_list = array('' => 'Select State');
        foreach($state_obj as $state){
            $state_list[$state->state_id] = $state->state_name;
        }
        $data['state'] = $state_list;
		
		//print_r('Partha'); exit;
		 $this->template->write('title', 'Dashboard', TRUE);
		
		
		$this->template->write_view('content', 'add_ptax', $data, TRUE);
        $this->template->render();
		
		//$this->load->view('add_state.php');
	}
	
	public function add(){	


		if(!empty($this->input->post())){
			$this->form_validation->set_rules('eff_start_date','Affected Start Date','trim|required');
			$this->form_validation->set_rules('salary_from','Salary From','trim|required|numeric');
			$this->form_validation->set_rules('tax_amount','Tax Amount','trim|required|numeric');
			
			$salary_to  = $this->input->post('salary_to');
			$salary_from  = $this->input->post('salary_from');
			
			$this->form_validation->set_rules('state_id','Select State','trim|required');
			if($salary_to > 0){				
				$this->form_validation->set_rules('salary_to','Salary To','trim|required|numeric|greater_than['.$salary_from.']',  array('greater_than' => '{field} should be greater than Salary From'));
			}
			else{
				$this->form_validation->set_rules('salary_to','Salary To','trim|required|numeric');
			}
			
		
				if ($this->form_validation->run() == TRUE){
						$state_id  = $this->input->post('state_id');
						$eff_start_date  = $this->input->post('eff_start_date');
						$salary_from  = $this->input->post('salary_from');
						$salary_to  = $this->input->post('salary_to');
						$tax_amount  = $this->input->post('tax_amount');
						
						//print_r($state_id); exit;
						
						$this->ptax_model->add_ptax($state_id,$eff_start_date,$salary_from,$salary_to,$tax_amount);	
						
						echo json_encode(array('newHash' => $this->security->get_csrf_hash(),'status' => 1));
						
						//redirect('ptax/add_ptax','refresh');
						}
						
		}
	}
	
	public function edit_ptax(){


		if(check_uri_permission('ptax', 'E') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 


		
		if(!empty($this->input->post())){
			$this->form_validation->set_rules('eff_start_date','Affected Start Date','trim|required');
			$this->form_validation->set_rules('salary_from','Salary From','trim|required|numeric');
			$this->form_validation->set_rules('tax_amount','Tax Amount','trim|required|numeric');
			
			$salary_to  = $this->input->post('salary_to');
			$salary_from  = $this->input->post('salary_from');
			
			$this->form_validation->set_rules('state_id','Select State','trim|required');
			if($salary_to > 0){				
				$this->form_validation->set_rules('salary_to','Salary To','trim|required|numeric|greater_than['.$salary_from.']',  array('greater_than' => '{field} should be greater than Salary From'));
			}
			else{
				$this->form_validation->set_rules('salary_to','Salary To','trim|required|numeric');
			}
			
			$this->form_validation->set_rules('state_id','Select State','trim|required');
			
			if ($this->form_validation->run() == TRUE){
						$ptax_id  = $this->input->post('ptax_id');
						$state_id  = $this->input->post('state_id');
						$eff_start_date  = $this->input->post('eff_start_date');
						$salary_from  = $this->input->post('salary_from');
						$salary_to  = $this->input->post('salary_to');
						$tax_amount  = $this->input->post('tax_amount');
				
				//print_r($ct_id); exit;
				
				$this->ptax_model->edit_ptax($ptax_id,$state_id,$eff_start_date,$salary_from,$salary_to,$tax_amount);	
				redirect('ptax','refresh');
				
				
			}
		}
		
		$this->template->write('title', 'Dashboard', TRUE);
		
		
		$id = $this->uri->segment(3);
		
		//print_r($id); exit;
		$data['ptaxview'] = $this->ptax_model->ptaxview($id);
		$state_obj = $this->ptax_model->get_all_state();
        $state_list = array('' => 'Select State');
        foreach($state_obj as $state){
            $state_list[$state->state_id] = $state->state_name;
        }
        $data['state'] = $state_list;
		
		$this->template->write_view('content', 'edit_ptax', $data, TRUE);
        $this->template->render();
		
	}
	
	
	public function ptax_list()
	{
		$state_id = $this->input->post('state_id');
		
		$data = array();
		$list = $this->ptax_model->tax_list($state_id);
		//print_r($list);exit();
		foreach($list as $list){
			$data[] = array(
					'ptax_id' => $list->ptax_id, 'state_name' => $list->state_name, 'salary_from' =>  $list->salary_from, 'salary_to' =>  $list->salary_to, 
					'eff_start_date' => date('d/m/Y', strtotime($list->eff_start_date)), 'tax_amount' => $list->tax_amount);
				//print_r($data); exit;
		}
		echo json_encode(array('list' => $data, 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}
	
}

	