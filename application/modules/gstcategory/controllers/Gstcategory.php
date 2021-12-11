<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gstcategory extends MY_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		$this->load->model('gstcategory_model','gm');
		$this->load->library('form_validation');
		
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{

		if(check_uri_permission('gstcategory', 'V') == 0){
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

		if(check_uri_permission('gstcategory', 'D') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        }

		$this->gm->change_status($id,$status);
		redirect('gstcategory','refresh');
	}
	
	public function add_gstcat(){


		if(check_uri_permission('gstcategory', 'A') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        }

		
		if(!empty($this->input->post())){
			//print_r('Partha'); exit;
			$this->form_validation->set_rules('gstcat_name','GST Category Name','trim|required|callback_gstcat_name_check');
		
				if ($this->form_validation->run() == TRUE){
						$gstcat_name  = $this->input->post('gstcat_name');
						//print_r($gstcat_name); exit;
						
						$this->gm->addgstcategory($gstcat_name);	
						redirect('gstcategory','refresh');
						}
						
		}
		/*else{
			print_r('Partha'); exit;
		}*/
		$this->template->write('title', 'Dashboard', TRUE);
		
		
		$this->template->write_view('content', 'add_gstcat', '', TRUE);
        $this->template->render();
	}
	
	
	
	public function edit_gstcat(){

		if(check_uri_permission('gstcategory', 'E') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        }



		if(!empty($this->input->post())){
			$this->form_validation->set_rules('gst_cat_name','GST Category Name','trim|required|callback_gstcat_name_check');
			
			if ($this->form_validation->run() == TRUE){
				$gst_cat_name  = $this->input->post('gst_cat_name');
				$gst_cat_id  = $this->input->post('gst_cat_id');
				//print_r($gst_cat_id);exit;
				$this->gm->edit_role($gst_cat_name,$gst_cat_id);	
				redirect('gstcategory','refresh');
			}
		}
		$this->template->write('title', 'Dashboard', TRUE);
		
		
		$id = $this->uri->segment(3);
		//print_r($id); exit;
		$data['edit_gstcat'] = $this->gm->editgstcat($id);
		
		$this->template->write_view('content', 'edit_gstcat', $data, TRUE);
        $this->template->render();
		
	}
	public function gstcat_name_check($str)
        {
                
				$gst_cat_id = NULL;
                if(!empty($this->input->post('gst_cat_id'))){
                    $gst_cat_id = $this->input->post('gst_cat_id');
                }
				
                $check = $this->gm->checkgstCat($str,$gst_cat_id);
				//print_r($check); exit;
                if($check)
                {
                	$this->form_validation->set_message('gstcat_name_check', 'The {field} field can not be the word ' . $str);
                       return FALSE;
                }
                else
                {
                	return TRUE;
                }
        }
	
}

	