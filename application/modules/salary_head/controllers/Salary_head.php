<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salary_head extends MY_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		$this->load->model('salary_head_model');
		$this->load->library('form_validation');
		
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{

		 if(check_uri_permission('salary_head', 'V') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 
        
		$data['list'] = $this->salary_head_model->get_salary_head();
		//echo "<pre>"; print_r($list); echo "</pre>";
		//$this->load->view('welcome_message');
		
		$this->template->write('title', 'Salary Head Master', TRUE);
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
	
	
	
	
	public function change_status($id, $status){

		if(check_uri_permission('salary_head', 'D') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 


		$this->salary_head_model->change_status($id,$status);
		redirect('salary_head','refresh');
	}
	
	public function add_salary_head(){

		if(check_uri_permission('salary_head', 'A') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 


		if(!empty($this->input->post())){
			$this->form_validation->set_rules('head_id','Head Type','trim|required');
			$this->form_validation->set_rules('head_name','Head Name','trim|required|callback_head_name_check');
			$this->form_validation->set_rules('head_st_name','Head Short Name','trim|required|callback_st_name_check');
			//$this->form_validation->set_rules('min_prcntg','Min Percentage','trim|required|numeric');
			$this->form_validation->set_rules('tally_head_name','Tally Head Name','trim|required');
			$min_prcntg  = $this->input->post('min_prcntg');
			if($min_prcntg){
				$this->form_validation->set_rules('max_prcntg','Max Percentage','trim|numeric|greater_than_equal_to['.$min_prcntg.']',  array('greater_than_equal_to' => '{field} should be greater than or equalto Min Percentage'));
			}
			else{
				$this->form_validation->set_rules('max_prcntg','Max Percentage','trim|numeric');
			}
		
			if ($this->form_validation->run() == TRUE){
				$head_id  = $this->input->post('head_id');
				$head_name  = $this->input->post('head_name');
				$head_st_name  = $this->input->post('head_st_name');
				if ($this->input->post('min_prcntg') == ''){
					$min_prcntg  = 0;
				}
				else{
				$min_prcntg  = $this->input->post('min_prcntg');
				}
				if ($this->input->post('max_prcntg') == ''){
					$max_prcntg  = 0;
				}
				else{
				$max_prcntg  = $this->input->post('max_prcntg');
				}
				$tally_head_name  = $this->input->post('tally_head_name');
				//print_r($type_id); exit;
				
				$this->salary_head_model->add_salary_head($head_id,$head_name,$head_st_name,$min_prcntg,$max_prcntg,$tally_head_name);	
				redirect('salary_head','refresh');
			}
		}
		
		$this->template->write('title', 'Dashboard', TRUE);
		$this->template->write_view('content', 'add_salary_head', '', TRUE);
        $this->template->render();
	}
	
	public function edit_salary_head(){

		if(check_uri_permission('salary_head', 'E') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 


		if(!empty($this->input->post())){
			$this->form_validation->set_rules('head_id','Head Type','trim|required');
			$this->form_validation->set_rules('head_name','Salary Head Name','trim|required|callback_head_name_check');
			$this->form_validation->set_rules('head_st_name','Salary Head Short Name','trim|required|callback_st_name_check');
			//$this->form_validation->set_rules('min_prcntg','Min Percentage','trim|required|numeric');
			$this->form_validation->set_rules('tally_head_name','Tally Head Name','trim|required');
			//$this->form_validation->set_rules('max_prcntg','Max Prcntg','trim|required|numeric');
			$min_prcntg  = $this->input->post('min_prcntg');
			if($min_prcntg){
				$this->form_validation->set_rules('max_prcntg','Max Percentage','trim|numeric|greater_than_equal_to['.$min_prcntg.']',  array('greater_than_equal_to' => '{field} should be greater than or equalto Min Percentage'));
			}
			else{
				$this->form_validation->set_rules('max_prcntg','Max Percentage','trim|numeric');
			}
			//$this->form_validation->set_rules('head_id','Select Type','trim|required');
			if ($this->form_validation->run() == TRUE){
				$head_name  = $this->input->post('head_name');
				$head_st_name  = $this->input->post('head_st_name');
				$head_id  = $this->input->post('head_id');
				if ($this->input->post('min_prcntg') == ''){
					$min_prcntg  = 0;
				}
				else{
				$min_prcntg  = $this->input->post('min_prcntg');
				}
				if ($this->input->post('max_prcntg') == ''){
					$max_prcntg  = 0;
				}
				else{
				$max_prcntg  = $this->input->post('max_prcntg');
				}
				$sh_id  = $this->input->post('sh_id');
				$tally_head_name  = $this->input->post('tally_head_name');
				$this->salary_head_model->edit_sh_head($head_name,$head_st_name,$sh_id,$head_id,$max_prcntg,$min_prcntg,$tally_head_name);	
				redirect('salary_head','refresh');
			}
		}
		$this->template->add_js('assets/js/bootstrap-colorpicker.js');
        $this->template->add_js('assets/js/bootstrap-datepicker.js');
        $this->template->add_js('assets/js/jquery.uniform.js');
        $this->template->add_js('assets/js/select2.min.js');
        $this->template->add_js('assets/js/jquery.ui.custom.js');
        $this->template->add_js('assets/js/jquery.validate.js');
        $this->template->add_js('assets/js/maruti.form_validation.js');
		
		
		$this->template->add_css('assets/css/colorpicker.css');
        $this->template->add_css('assets/css/datepicker.css');
		$this->template->add_css('assets/css/uniform.css');
        $this->template->add_css('assets/css/select2.css');
        $this->template->add_css('assets/css/maruti-style.css');
		
		
		$id = $this->uri->segment(3);
		$data['edit_salary_head'] = $this->salary_head_model->editsalary($id);
		
		$this->template->write_view('content', 'edit_salary_head', $data, TRUE);
        $this->template->render();
		
	}
	
	public function head_name_check($str){
		$sh_id = NULL;
		if(!empty($this->input->post('sh_id'))){
			$sh_id = $this->input->post('sh_id');
		}
		
		$check = $this->salary_head_model->checHeadName($str,$sh_id);
		//print_r($check); exit;
		if($check)
		{
			$this->form_validation->set_message('head_name_check', 'The {field} field can not be the word ' . $str);
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
		
	public function st_name_check($str){
		$sh_id = NULL;
		if(!empty($this->input->post('sh_id'))){
			$sh_id = $this->input->post('sh_id');
		}
		
		$check = $this->salary_head_model->checStName($str,$sh_id);
		//print_r($check); exit;
		if($check)
		{
			$this->form_validation->set_message('st_name_check', 'The {field} field can not be the word ' . $str);
			   return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
}

	