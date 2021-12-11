<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Companybranch extends MY_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		$this->load->model('companybranch_model','cm');
		$this->load->model('client/client_model','cd');
		$this->load->library('form_validation');
		
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{

		if(check_uri_permission('companybranch', 'V') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 
		
		
		$data['list'] = $this->cm->get_all_list();
		//echo "<pre>"; print_r($list); echo "</pre>";
		//$this->load->view('welcome_message');
		
		$this->template->write('title', 'City Master', TRUE);
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

		if(check_uri_permission('companybranch', 'D') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 
		
		//print_r($status); exit;
		$this->cm->change_status($id,$status);
		redirect('companybranch','refresh');
	}
	
	public function add_cbranch(){

		if(check_uri_permission('companybranch', 'A') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 

			
		if(!empty($this->input->post())){
			$this->form_validation->set_rules('city_id','City','trim|required');
			$this->form_validation->set_rules('state_id','State','trim|required');
			$this->form_validation->set_rules('branch_name','Branch Name','trim|required');
			$this->form_validation->set_rules('branch_short_name','Branch Short Name','trim|required');
			$this->form_validation->set_rules('address_1','Address 1','trim|required');
			$this->form_validation->set_rules('pin','Pin','trim|required|numeric');
			
				if ($this->form_validation->run() == TRUE){
						$state_id  = $this->input->post('state_id');
						$city_id  = $this->input->post('city_id');
						$branch_name  = $this->input->post('branch_name');
						$branch_short_name  = $this->input->post('branch_short_name');
						$address_1  = $this->input->post('address_1');
						$address_2  = $this->input->post('address_2');
						$address_3  = $this->input->post('address_3');
						$pin  = $this->input->post('pin');
						
						//print_r($state_id); exit;
						
						$this->cm->add_cbranch($state_id,$city_id,$branch_name,$branch_short_name,$address_1,$address_2,$address_3,$pin);	
						redirect('companybranch','refresh');
						}
						
		}
		//print_r('Parthadddddd'); exit;
		$state_obj = $this->cm->get_all_state();
        $state_list = array('' => 'Select State');
        foreach($state_obj as $state){
            $state_list[$state->state_id] = $state->state_name;
        }
        $data['state'] = $state_list;
		
		//$state_id = ($data['edit_client'][0]->state_id);

        $city_list = array('' => 'Select City');
		
        if(!empty($this->input->post('state_id'))){
            $city_obj = $this->cd->getCity($this->input->post('state_id'));

           foreach($city_obj as $city){
                $city_list[$city['city_id']] = $city['city_name'];
            }
            

        }

        $data['city'] = $city_list;
		
		//print_r('Partha'); exit;
		 $this->template->write('title', 'Dashboard', TRUE);
		
		
		$this->template->write_view('content', 'add_cbranch', $data, TRUE);
        $this->template->render();
		
		//$this->load->view('add_state.php');
	}
	
	
	public function edit_cbranch(){

		if(check_uri_permission('companybranch', 'E') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 


		
		if(!empty($this->input->post())){
			$this->form_validation->set_rules('city_id','City','trim|required');
			$this->form_validation->set_rules('state_id','State','trim|required');
			$this->form_validation->set_rules('branch_name','Branch Name','trim|required');
			$this->form_validation->set_rules('branch_short_name','Branch Short Name','trim|required');
			$this->form_validation->set_rules('address_1','Address 1','trim|required');
			$this->form_validation->set_rules('pin','Pin','trim|required|numeric');
			
			
			
			
			if ($this->form_validation->run() == TRUE){
						$state_id  = $this->input->post('state_id');
						$city_id  = $this->input->post('city_id');
						$branch_name  = $this->input->post('branch_name');
						$branch_short_name  = $this->input->post('branch_short_name');
						$address_1  = $this->input->post('address_1');
						$address_2  = $this->input->post('address_2');
						$address_3  = $this->input->post('address_3');
						$pin  = $this->input->post('pin');
						$id  = $this->input->post('id');
						
						//$id  = $this->input->post('id');
				
				//print_r($id); exit;
				
				$this->cm->edit_cbranch($state_id,$city_id,$branch_name,$branch_short_name,$address_1,$address_2,$address_3,$pin,$id);	
				redirect('companybranch','refresh');
			}
		}
		
		$this->template->write('title', 'Dashboard', TRUE);
		
		
		$id = $this->uri->segment(3);
		
		//print_r($id); exit;
		$data['cbranchview'] = $this->cm->cbranchview($id);
		$state_obj = $this->cm->get_all_state();
        $state_list = array('' => 'Select State');
        foreach($state_obj as $state){
            $state_list[$state->state_id] = $state->state_name;
        }
        $data['state'] = $state_list;
		
		$state_id = ($data['cbranchview'][0]->state_id);

        $city_list = array('' => 'Select City');
		if(!empty($this->input->post('state_id'))){
            $city_obj = $this->cd->getCity($this->input->post('state_id'));

           foreach($city_obj as $city){
                $city_list[$city['city_id']] = $city['city_name'];
            }
            

        }
        else
        {
            $city_obj = $this->cd->get_city($state_id);
            
           foreach($city_obj as $city){
                $city_list[$city->city_id] = $city->city_name;
            }
        }

        $data['city'] = $city_list;
		//print_r($state_id); die;
		
		$this->template->write_view('content', 'edit_cbranch', $data, TRUE);
        $this->template->render();
		
	}
	
		
		
	
}

	