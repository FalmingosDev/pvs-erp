<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resource_allocation extends MY_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		
		$this->load->model('Resource_allocation_model','rm');
		$this->load->library('form_validation');
		
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{

		if(check_uri_permission('resource_allocation', 'V') == 0){
			$this->session->set_flashdata('error_msg', 'You have no permission on this page');
			redirect(base_url());
		}


		$data = array();

		if (!empty($this->input->post('client_id'))){
			$client_id = $this->input->post('client_id');
			//$data['client_attendance'] = $this->cam->client_attendance_search($month, $client_id);
			$data['list'] = $this->rm->resource_search($client_id);	
			//print_r($data['list']);die;
		}
		else{
			//$data['client_attendance'] = $this->cam->client_attendance_list();
			$data['list'] = $this->rm->resource_list();	
		 }

		$client_obj = $this->rm->client();
        $client_list = array('' => 'Select Client');
        foreach($client_obj as $client){
            $client_list[$client->client_id] = $client->client_name;
        }
        $data['client'] = $client_list;
		
		
		$this->template->write('title', 'Client Resource Allocation', TRUE);
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
	
	
	
	
	public function add(){


		if(check_uri_permission('resource_allocation', 'A') == 0){
			$this->session->set_flashdata('error_msg', 'You have no permission on this page');
			redirect(base_url());
		}

		
		if(!empty($this->input->post())){
			$this->form_validation->set_rules('client_id','Select Client','trim|required');
			$this->form_validation->set_rules('std_to_date','Effective Start Date','trim|required');
			//$this->form_validation->set_rules('end_to_date','Effective END Date','trim|required');
			//$this->form_validation->set_rules('end_to_date','Effective END Date','trim|required');
			$this->form_validation->set_rules('branch_id','Brach','trim|required');
			
			if ($this->form_validation->run() == TRUE){
				$client_id  = $this->input->post('client_id');
				$std_to_date  = $this->input->post('std_to_date');
				$end_to_date  = $this->input->post('end_to_date');
				$resource_id  = $this->input->post('resource_id');
				$designat_id  = $this->input->post('designat_id');
				$branch_id  = $this->input->post('branch_id');
				
				//print_r($client_id);exit;
				$query = $this->rm->resourcedoc($client_id,$branch_id,$std_to_date,$end_to_date,$resource_id,$designat_id);
				//print_r($query);exit;
				if($query){
				redirect('resource_allocation','refresh');
				}
				else{
			//print_r('ssss');exit;
			$this->session->set_flashdata('msg', 'Data Already Exists');
			
			redirect('resource_allocation/add');
			
			
				}
				
			}
			
		}
		
		$data['client'] = $this->rm->client('');
		//print_r($data['client']);exit;		
		$data['resource'] = $this->rm->resourcelist('');
			
        
		
		$this->template->write('title', 'Dashboard', TRUE);
		$this->template->write_view('content', 'add', $data, TRUE);
        $this->template->render();
	}
	
	public function desi_list(){
		
		$resource_id = $this->input->post('resource_id');		
	
		$data['designation'] = $this->rm->designation($resource_id);
		//print_r($data['designation']);die;
		
			
			
		echo json_encode(array('designation' => $data['designation'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}
	
	
	public function edit(){

		if(check_uri_permission('resource_allocation', 'E') == 0){
			$this->session->set_flashdata('error_msg', 'You have no permission on this page');
			redirect(base_url());
		}

		$url_client_id = $this->uri->segment(3);
		
		
		if(!empty($this->input->post())){
			
			$this->form_validation->set_rules('std_to_date','Effective Start Date','trim|required');
			//$this->form_validation->set_rules('end_to_date','Effective END Date','trim|required');
			
			
			
			if ($this->form_validation->run() == TRUE){
				$id  = $this->input->post('id');
				
				$std_to_date  = $this->input->post('std_to_date');
				$end_to_date  = $this->input->post('end_to_date');
				$emp_id  = $this->input->post('emp_id');
								
				$query = $this->rm->resourceedit($std_to_date,$end_to_date,$id,$emp_id);
				//print_r($query);exit;
				if($query){
				redirect('resource_allocation','refresh');
				}
				else{
			//print_r('ssss');exit;
				$this->session->set_flashdata('msg', 'Data Already Exists');
			
				redirect('resource_allocation/edit/'.$id);
			
			
				}
			}
			
		}
		
		
		$data['client'] = $this->rm->client('');
		//print_r($url_client_id);exit;		
		$data['resource'] = $this->rm->resourcelist('');
		$data['editclient'] = $this->rm->get_edit_data($url_client_id);
		
		//$data = array();
		$this->template->write('title', 'Dashboard', TRUE);
		$this->template->write_view('content', 'edit', $data, TRUE);
        $this->template->render();
	}
	
	public function branch()
	{
		$client_id  = $this->input->post('client_id');
		//print_r ($client_id); exit;
		$data['branch'] = $this->rm->branch_list($client_id);
		//print_r ($data); exit;
		echo json_encode(array('branch' => $data['branch'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}
	
	
}

	