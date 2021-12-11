<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends MY_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		$this->load->model('department_model');
		$this->load->library('form_validation');
		$this->form_validation->CI =& $this;
		$this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{

		if(check_uri_permission('department', 'V') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 
		
		$data['departments'] = $this->department_model->get_all_dept();
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
        $this->template->write_view('content', 'department', $data, TRUE);
        $this->template->render();
	}
	
	public function status($id, $status){

		if(check_uri_permission('department', 'D') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 


		$this->department_model->status($id,$status);
		redirect('department','refresh');
	}

	public function addDepartment(){

		if(check_uri_permission('department', 'A') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 

		$this->template->write('title', 'Dashboard', TRUE);
        $this->template->write_view('content', 'add_department', '', TRUE);
        $this->template->render();
        
		
		//$this->load->view('add_department.php');
	}

	public function insertDepartment()
	{		

		$this->form_validation->set_rules('department_name','Department Name','trim|required|callback_department_name_check');
		$this->form_validation->set_rules('department_short_name','Department Short Name','trim|required|callback_short_name_check');

		 if ($this->form_validation->run() == TRUE)
		 {
		 	$dept_name = $this->input->post('department_name');
			$dept_shrt_name = $this->input->post('department_short_name');
			
			$this->department_model->insertDepartment($dept_name,$dept_shrt_name);
			redirect('department', 'refresh');
		 }
		 else
		 {
		 	$this->template->write('title', 'Dashboard', TRUE);
			
	        $this->template->write_view('content', 'add_department', '', TRUE);
	        $this->template->render();
		 }
	}

	public function editdepartment($id){

		if(check_uri_permission('department', 'E') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 
        
		$data['department'] = $this->department_model->get_dept($id);
        $this->template->write_view('content', 'edit_department', $data, TRUE);
        $this->template->render();

	}

	public function UpdateDepartment()
	{

		//$data['department'] = $this->department_model->get_dept($id);
		$this->load->library("security");
		$this->form_validation->set_rules('department_name','Department Name','trim|required|callback_department_name_check');
		$this->form_validation->set_rules('department_short_name','Department Short Name','trim|required|callback_short_name_check');

		 if ($this->form_validation->run() == TRUE)
		 {
		 	$dept_name = $this->input->post('department_name');
			$dept_shrt_name = $this->input->post('department_short_name');
			$dept_id = $this->input->post('dept_id');
			
			$this->department_model->UpdateDepartment($dept_name,$dept_shrt_name,$dept_id);
			redirect('department', 'refresh');
		 }
		 else
		 {
		 	$dept_id = $this->input->post('dept_id');
		 	$data['department'] = $this->department_model->get_dept($dept_id);
		 	$this->template->write_view('content', 'edit_department', $data, TRUE);
		 	$this->template->render();
		 }
	}

	public function department_name_check($str)
        {
                $str = $this->input->post('department_name');

                $dept_id = NULL;
                if(!empty($this->input->post('dept_id'))){
                    $dept_id = $this->input->post('dept_id');
                }

                $check = $this->department_model->checkDept($str,$dept_id);
                if($check)
                {
                	$this->form_validation->set_message('department_name_check', 'The {field} is already exist');
                    return FALSE;
                }
                else
                {
                	return TRUE;
                }
        }

    public function short_name_check($str)
        {
                $str = $this->input->post('department_short_name');

                $dept_id = NULL;
                if(!empty($this->input->post('dept_id'))){
                    $dept_id = $this->input->post('dept_id');
                }

                $check = $this->department_model->checkShrtDept($str,$dept_id);
                if($check)
                {
                	$this->form_validation->set_message('short_name_check', 'The {field} is already exist ');
                    return FALSE;
                }
                else
                {
                	return TRUE;
                }
        }
}

?>
