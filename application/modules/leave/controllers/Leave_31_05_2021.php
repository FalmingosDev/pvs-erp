<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave extends MY_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		$this->load->model('employee/employee_model','em');
		$this->load->library('form_validation');
		
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{
		$data = [];
		$this->template->write('title', 'My Leaves', TRUE);
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
	
	public function apply(){
		$data = [];
		$this->template->write('title', 'Apply Leave', TRUE);
        
        
		
        $this->template->write_view('content', 'apply', $data, TRUE);
        $this->template->render();
	}
	
}

	