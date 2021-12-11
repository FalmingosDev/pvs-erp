<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends MY_Controller {

  public function __construct() {
    parent::__construct();
    if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
      redirect('login');
    }
    $this->load->library("session");
    $this->load->model('staff_model','em');
    $this->load->model('client/client_model','cm');
    $this->load->library('form_validation');
  	$this->load->helper(array('form', 'url'));
  	$this->form_validation->CI =& $this;
  	$this->load->helper('file');
  	$this->load->library('session');
  	//$this->load->library('upload');
    }
  
  public function index(){

     if(check_uri_permission('staff', 'V') == 0){
     $this->session->set_flashdata('error_msg', 'You have no permission on this page');
     redirect(base_url());
     }


    $data = [];
    //$data['list'] = $this->cm->client_list();
    //echo "<pre>"; print_r($data['list']); exit();
    $this->template->write('title', 'Employee', TRUE);

    $user_branch_id = $this->session->user_branch_id;
    $data['employees'] = $this->em->employee_list($user_branch_id);
    //print_r($employees);die;
    
	/**
    * if you have any js to add for this page
  */
        
  $this->template->add_js('assets/js/jquery.dataTables.min.js');
  $this->template->add_js('assets/js/dataTables.bootstrap4.min.js');
  //$this->template->add_js('assets/js/bootstrap-datepicker.min.js');

                
  /**
    * if you have any css to add for this page
  */
  //$this->template->add_css('assets/css/datepicker.css');
  $this->template->add_css('assets/css/dataTables.bootstrap4.min.css');


	$this->template->write_view('content', 'list', $data, TRUE);
	$this->template->render();
  }
  
  
	public function ajax_employee_list(){
		
	}
  
}

?>
