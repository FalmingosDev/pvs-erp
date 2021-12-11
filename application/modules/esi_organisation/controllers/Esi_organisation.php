<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class esi_organisation extends MY_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		$this->load->model('esi_organisation_model','esi');
		$this->load->library('form_validation');
		
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{

		if(check_uri_permission('esi_organisation', 'V') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        }


		$data['list'] = $this->esi->get_all_list();
		
		
		$this->template->write('title', 'City Master', TRUE);
        
        $this->template->add_js('assets/js/jquery.dataTables.min.js');
        $this->template->add_js('assets/js/dataTables.bootstrap4.min.js');
       
        $this->template->add_css('assets/css/dataTables.bootstrap4.min.css');
		
        $this->template->write_view('content', 'list', $data, TRUE);
        $this->template->render();
	}
	
	
	
	
	public function change_status($id, $status){

		if(check_uri_permission('esi_organisation', 'D') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        }

		//print_r($status); exit;
		$this->esi->change_status($id,$status);
		redirect('esi_organisation','refresh');
	}
	
	public function add_esi(){


		if(check_uri_permission('esi_organisation', 'A') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        }

			
		if(!empty($this->input->post()))
		{
			$this->form_validation->set_rules('organisation_name','ESI Organisation Name','trim|required');
			$this->form_validation->set_rules('organisation_number','ESI Organisation Number','trim|required');
			
				if ($this->form_validation->run() == TRUE)
				{
						$organisation_name  = $this->input->post('organisation_name');
						$organisation_number  = $this->input->post('organisation_number');
						$org_row=$this->esi->checkEsi($organisation_name,'');
						if(empty($org_row))
						{
							$this->esi->add_esi($organisation_name,$organisation_number);
							$this->session->set_flashdata('success', 'Organisation added successfully.');	
							redirect('esi_organisation','refresh');
						}
						else
						{
							$this->session->set_flashdata('error', 'Organisation name already exists!.');
							redirect('esi_organisation/add_esi','refresh');
						}
					
				}
						
		}
		
		 $this->template->write('title', 'Dashboard', TRUE);
		
		
		$this->template->write_view('content', 'add_esi', '', TRUE);
        $this->template->render();
		
		//$this->load->view('add_state.php');
	} 
	
	
	public function edit_esi(){


		if(check_uri_permission('esi_organisation', 'E') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        }

		
		if(!empty($this->input->post()))
		{
			$this->form_validation->set_rules('organisation_name','ESI Organisation Name','trim|required');
			$this->form_validation->set_rules('organisation_number','ESI Organisation Number','trim|required');
			
			if ($this->form_validation->run() == TRUE)
			{
				$organisation_name  = $this->input->post('organisation_name');
				$organisation_number  = $this->input->post('organisation_number');
				$id  = $this->input->post('id');

				$org_row=$this->esi->checkEsi($organisation_name,$id );
				if(empty($org_row))
				{
					$this->esi->edit_esi($organisation_name,$id,$organisation_number);
					$this->session->set_flashdata('success', 'Organisation updated successfully.');	
					redirect('esi_organisation','refresh');
				}
				else
				{
					$this->session->set_flashdata('error', 'Organisation name already exists!.');
					redirect('esi_organisation/edit_esi/'.$id,'refresh');
				}
				
				
				
					
				redirect('esi_organisation','refresh');
			}
			
		}
		
		$this->template->write('title', 'Dashboard', TRUE);
		
		
		$id = $this->uri->segment(3);
		
		//print_r($id); exit;
		$data['view'] = $this->esi->view($id);
		
		//print_r($state_id); die;
		
		$this->template->write_view('content', 'edit_esi', $data, TRUE);
        $this->template->render();
		
	}
	
		
		
	
}

	