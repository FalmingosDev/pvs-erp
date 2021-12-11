<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends MY_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		$this->load->model('role_model');
		$this->load->library('form_validation');
		
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{

		if(check_uri_permission('role', 'V') == 0){
	     $this->session->set_flashdata('error_msg', 'You have no permission on this page');
	     redirect(base_url());
	     }

		$data['list'] = $this->role_model->get_role_list();
		//echo "<pre>"; print_r($data); echo "</pre>";
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

		if(check_uri_permission('role', 'D') == 0){
	     $this->session->set_flashdata('error_msg', 'You have no permission on this page');
	     redirect(base_url());
	     }

		$this->role_model->change_status($id,$status);
		redirect('role','refresh');
	}
	
	public function add_role(){

		if(check_uri_permission('role', 'A') == 0){
	     $this->session->set_flashdata('error_msg', 'You have no permission on this page');
	     redirect(base_url());
	     }
		
		if(!empty($this->input->post())){
			//print_r('Partha'); exit;
			$this->form_validation->set_rules('role_name','Role Name','trim|required');
			$this->form_validation->set_rules('role_st_name','Role Short Name','trim|required|callback_st_name_check');
		
				if ($this->form_validation->run() == TRUE){
						$role_name  = $this->input->post('role_name');
						$role_st_name  = $this->input->post('role_st_name');
						//print_r($role_name); exit;
						
						$this->role_model->add_role($role_name,$role_st_name);	
						redirect('role','refresh');
						}
						
		}
		/*else{
			print_r('Partha'); exit;
		}*/
		$this->template->write('title', 'Dashboard', TRUE);
		
		
		$this->template->write_view('content', 'add_role', '', TRUE);
        $this->template->render();
	}
	
	
	public function edit_role(){

		if(check_uri_permission('role', 'E') == 0){
	     $this->session->set_flashdata('error_msg', 'You have no permission on this page');
	     redirect(base_url());
	     }


		if(!empty($this->input->post())){
			$this->form_validation->set_rules('role_name','Role Name','trim|required');
			$this->form_validation->set_rules('role_st_name','Role Short Name','trim|required|callback_st_name_check');
			if ($this->form_validation->run() == TRUE){
				$role_name  = $this->input->post('role_name');
				$role_st_name  = $this->input->post('role_st_name');
				$role_id  = $this->input->post('role_id');
				$this->role_model->edit_role($role_name,$role_st_name,$role_id);	
				redirect('role','refresh');
			}
		}
		$this->template->write('title', 'Dashboard', TRUE);
		
		
		$id = $this->uri->segment(3);
		//print_r($id); exit;
		$data['edit_role'] = $this->role_model->editrole($id);
		
		$this->template->write_view('content', 'edit_role', $data, TRUE);
        $this->template->render();
		
	}
	
	
	public function st_name_check($str)
        {
                $role_id = NULL;
                if(!empty($this->input->post('role_id'))){
                    $role_id = $this->input->post('role_id');
                }
				
                $check = $this-> role_model->checkstRoleName($str,$role_id);
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


		/*public function role_name_check($str)
        {
                
				
                $check = $this-> role_model->checkRoleName($str);
				//print_r($check); exit;
                if($check)
                {
                	$this->form_validation->set_message('role_name_check', 'The {field} field can not be the word ' . $str);
                       return FALSE;
                }
                else
                {
                	return TRUE;
                }
        }*/
}
	