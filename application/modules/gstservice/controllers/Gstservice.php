<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gstservice extends MY_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		$this->load->model('Gstservice_model','gm');
		$this->load->library('form_validation');
		
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{

		if(check_uri_permission('gstservice', 'V') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        }

		$data['list'] = $this->gm->get_role_list();
		//echo "<pre>"; print_r($data); echo "</pre>";
		//$this->load->view('welcome_message');
		
		$this->template->write('title', 'GST Category', TRUE);
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

		if(check_uri_permission('gstservice', 'D') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        }

		$this->gm->change_status($id,$status);
		redirect('gstservice','refresh');
	}
	
	public function add_gstser(){


		if(check_uri_permission('gstservice', 'A') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        }

		
		if(!empty($this->input->post())){
			//print_r('Partha'); exit;
			$this->form_validation->set_rules('gstser_name','GST Service Name','trim|required|callback_gstser_name_check');
		
				if ($this->form_validation->run() == TRUE){
						$gstser_name  = $this->input->post('gstser_name');
						//print_r($gstser_name); exit;
						
						$this->gm->addgstservice($gstser_name);	
						redirect('gstservice','refresh');
						}
						
		}
		
		$this->template->write('title', 'Dashboard', TRUE);
		
		
		$this->template->write_view('content', 'add_gstser', '', TRUE);
        $this->template->render();
	}
	
	
	
	public function edit_gstser(){

		if(check_uri_permission('gstservice', 'E') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        }

		if(!empty($this->input->post())){
			$this->form_validation->set_rules('gst_ser_name','GST Service Name','trim|required|callback_gstser_name_check');
			
			if ($this->form_validation->run() == TRUE){
				$gst_ser_name  = $this->input->post('gst_ser_name');
				$gst_ser_id  = $this->input->post('gst_ser_id');
				//print_r($gst_ser_id);exit;
				$this->gm->edit_gstser($gst_ser_name,$gst_ser_id);	
				redirect('gstservice','refresh');
			}
		}
		$this->template->write('title', 'Dashboard', TRUE);
		
		
		$id = $this->uri->segment(3);
		//print_r($id); exit;
		$data['edit_gstser'] = $this->gm->editgstser($id);
		
		$this->template->write_view('content', 'edit_gstser', $data, TRUE);
        $this->template->render();
		
	}
	
	public function gstser_name_check($str)
        {
                
				$gst_ser_id = NULL;
                if(!empty($this->input->post('gst_ser_id'))){
                    $gst_ser_id = $this->input->post('gst_ser_id');
                }
				
                $check = $this->gm->checkgstSer($str,$gst_ser_id);
				//print_r($check); exit;
                if($check)
                {
                	$this->form_validation->set_message('gstser_name_check', 'The {field} field can not be the word ' . $str);
                       return FALSE;
                }
                else
                {
                	return TRUE;
                }
        }
	
}

	