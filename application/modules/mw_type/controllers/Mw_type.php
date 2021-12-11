<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mw_type extends MY_Controller {

	public function __construct() {
		parent::__construct();
        if(!$this->session->has_userdata('user_id') || !$this->session->user_id)
        {
            redirect('login');
        }
		$this->load->model('mw_type_model','mw');
		$this->load->library('form_validation');
        $this->form_validation->CI =& $this;
        $this->load->helper(array('form', 'url'));
	}

	public function index()
	{

        if(check_uri_permission('mw_type', 'V') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        }


		$data['mw_type_list'] = $this->mw->get_all_mw_type();
        //print_r($data);die;
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
        $this->template->write_view('content', 'mw_type', $data, TRUE);
        $this->template->render();
	}

	public function addMwType(){


        if(check_uri_permission('mw_type', 'A') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        }


        if(!empty($this->input->post())){
            
            $this->form_validation->set_rules('mw_type_name','Mw Type Name','trim|required|callback_mwType_name_check');
            $this->form_validation->set_rules('mwtype_short_name','Mw Type Short Name','trim|required|callback_short_name_check');
            if ($this->form_validation->run() == TRUE)
             {
                $mw_type_name = $this->input->post('mw_type_name');
                $mw_type_short_name = $this->input->post('mwtype_short_name');
                
                $this->mw->insertMwType($mw_type_name,$mw_type_short_name);
                redirect('mw_type', 'refresh');
             }
                        
        }


		$this->template->write('title', 'Dashboard', TRUE);
		$this->template->write_view('content', 'add_mw_type', '', TRUE);
        $this->template->render();
	}

    public function status($id, $status){

        if(check_uri_permission('mw_type', 'D') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        }


        $this->mw->status($id,$status);
        redirect('mw_type','refresh');
    }

    public function editMwType($id){

        if(check_uri_permission('mw_type', 'E') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        }
        //echo $id;die;
        $data['mwType'] = $this->mw->get_mwtype($id);
        $this->template->write_view('content', 'edit_mw_type', $data, TRUE);
        $this->template->render();

    }

    public function UpdateMwType()
    {        

        $this->load->library("security");
        $this->form_validation->set_rules('mw_type_name','Mw Type Name','trim|required|callback_mwType_name_check');
        $this->form_validation->set_rules('mwtype_short_name','Mw Type Short Name','trim|required|callback_short_name_check');
        if ($this->form_validation->run() == TRUE)
         {
            $mw_type_name = $this->input->post('mw_type_name');
            $mwtype_short_name = $this->input->post('mwtype_short_name');
            $mw_id = $this->input->post('mw_id');
            
            $this->mw->UpdateMwType($mw_type_name,$mwtype_short_name,$mw_id);
            redirect('mw_type', 'refresh');
         }
         else
         {
            $mw_id = $this->input->post('mw_id');
            $data['mwType'] = $this->mw->get_mwType($mw_id);
            $this->template->write_view('content', 'edit_mw_type', $data, TRUE);
            $this->template->render();
         }
    }

    public function mwType_name_check($str)
        {
                $str = $this->input->post('mw_type_name');

                $mw_id = NULL;
                if(!empty($this->input->post('mw_id'))){
                    $mw_id = $this->input->post('mw_id');
                }

                $check = $this->mw->checkMwType($str,$mw_id);
                if($check)
                {
                    $this->form_validation->set_message('mwType_name_check', 'The {field} field can not be the word ' . $str);
                    return FALSE;
                }
                else
                {
                    return TRUE;
                }
        }

    public function short_name_check($str)
        {
                $str = $this->input->post('mwtype_short_name');

                $mw_id = NULL;
                if(!empty($this->input->post('mw_id'))){
                    $mw_id = $this->input->post('mw_id');
                }

                $check = $this->mw->checkMwShrt($str,$mw_id);
                if($check)
                {
                    $this->form_validation->set_message('short_name_check', 'The {field} field can not be the word ' . $str);
                    return FALSE;
                }
                else
                {
                    return TRUE;
                }
        }



}







?> 