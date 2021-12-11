<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Designation extends MY_Controller {

	public function __construct() {
		parent::__construct();
        if(!$this->session->has_userdata('user_id') || !$this->session->user_id)
        {
            redirect('login');
        }
		$this->load->model('designation_model','dm');
		
		//$this->load->library('my_form_validation');
		//$this->form_validation->run($this);
		$this->load->library('form_validation');
		$this->form_validation->CI =& $this;
		
        $this->load->helper(array('form', 'url'));
	}

	public function index()
	{

		if(check_uri_permission('designation', 'V') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 

		$data['designation'] = $this->dm->get_all_desig();
		$this->template->write('title', 'Dashboard', TRUE);
        /**
         * if you have any js to add for this page
         */
        $this->template->add_js('assets/js/jquery.dataTables.min.js');
        $this->template->add_js('assets/js/dataTables.bootstrap4.min.js');
        
        //$this->template->add_js('assets/js/maruti.tables.js');
        /**
         * if you have any css to add for this page
         */
        $this->template->add_css('assets/css/dataTables.bootstrap4.min.css');
        $this->template->write_view('content', 'designation', $data, TRUE);
        $this->template->render();
	}

	public function addDesignation(){

        if(check_uri_permission('designation', 'A') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 

		$this->template->write('title', 'Dashboard', TRUE);
        $this->template->write_view('content', 'add_designation', '', TRUE);
        $this->template->render();
	}

    public function insertDesignation()
    {        
        $this->form_validation->set_rules('designation_name','Designation Name','trim|required|callback_designation_name_check');
        $this->form_validation->set_rules('desig_short_name','Designation Short Name','trim|required|callback_shrt_name_check');
        $this->form_validation->set_rules('rank','Rank','trim|required|numeric');

         if ($this->form_validation->run() == TRUE)
         {
            $desig_name = $this->input->post('designation_name');
            $desig_short_name = $this->input->post('desig_short_name');
            $rank = $this->input->post('rank');
            
            $this->dm->insertDesignation($desig_name,$desig_short_name,$rank);
                redirect('designation', 'refresh');            
         }
         else
         {
            $this->template->write('title', 'Dashboard', TRUE);
            $this->template->write_view('content', 'add_designation', '', TRUE);
            $this->template->render();
         }
    }

    

    public function status($id, $status){

    	if(check_uri_permission('designation', 'D') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 

        $this->dm->status($id,$status);
        redirect('designation','refresh');
    }

    public function editdesignation($id){

    	if(check_uri_permission('designation', 'E') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 

        //echo $id;die;
        $data['designation'] = $this->dm->get_desig($id);
     
        $this->template->write_view('content', 'edit_designation', $data, TRUE);
        $this->template->render();

    }

    public function UpdateDesignation()
    {
         


        //$data['department'] = $this->department_model->get_dept($id);
        $this->load->library("security");
        $this->form_validation->set_rules('designation_name','Designation Name','trim|required|callback_designation_name_check');
        $this->form_validation->set_rules('desig_short_name','Designation Short Name','trim|required|callback_shrt_name_check');
        $this->form_validation->set_rules('rank','Rank','trim|required|numeric');

         if ($this->form_validation->run() == TRUE)
         {
            $desig_name = $this->input->post('designation_name');
            $desig_short_name = $this->input->post('desig_short_name');
            $rank = $this->input->post('rank');
            $desig_id = $this->input->post('desig_id');
            
            $this->dm->UpdateDesignation($desig_name,$desig_short_name,$rank,$desig_id);
            redirect('designation', 'refresh');
         }
         else
         {
            $desig_id = $this->input->post('desig_id');
            $data['designation'] = $this->dm->get_desig($desig_id);
            $this->template->write_view('content', 'edit_designation', $data, TRUE);
            $this->template->render();
         }
    }

     public function designation_name_check($str)
        {
                $str = $this->input->post('designation_name');
                
                $desig_id = NULL;
                if(!empty($this->input->post('desig_id'))){
                    $desig_id = $this->input->post('desig_id');
                }
                $check = $this->dm->checkDesig($str,$desig_id);
                if($check)
                {
                	$this->form_validation->set_message('designation_name_check', 'The {field} is already exists');
                    return FALSE;
                }
                else
                {
                	return TRUE;
                }
        }

        public function shrt_name_check($str)
        {
                $str = $this->input->post('desig_short_name');

                $desig_id = NULL;
                if(!empty($this->input->post('desig_id'))){
                    $desig_id = $this->input->post('desig_id');
                }
                
                $check = $this->dm->checkDesigShrt($str,$desig_id);
                if($check)
                {
                    $this->form_validation->set_message('shrt_name_check', 'The {field} is already exists');
                       return FALSE;
                }
                else
                {
                    return TRUE;
                }
        }


}







?> 