<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_documents extends MY_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		
		$this->load->model('Employee_documents_model','edm');
		
		$this->load->library('form_validation');
		
		$this->load->helper(array('form', 'url'));
        $this->form_validation->CI =& $this;
		
		
		
	}
	
	
	public function index(){
		redirect('document_uplode/upload');
	}
	
	
	
	
	
	public function upload(){
		$url_client_id = $this->uri->segment(3);
		
		if(!empty($this->input->post())){
			
			
			  
			    $config['upload_path']          = './uploads/employee/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx'; 
				
				 $this->load->library('upload', $config);
				 
				 $uploaded_files = array();
				 $count=0;
				$file_count = $this->input->post('file_count[]');
				//print_r($file_count); exit();
				foreach($file_count as $file_cnt){
					if ( $this->upload->do_upload('fileuplode_' . $file_cnt)){
						$uploaded_files[] = $this->upload->file_name;
						
						
					}
					
				}
				  
				
						//$clientid = 1;
						$doc_name = $this->input->post('doc_name');
						$employee_id = $this->input->post('employee_id');
						$doc_id = $this->input->post('doc_id');
						$doc_expiry = $this->input->post('doc_expiry');
						//print_r($doc_name); exit();  
						$doc_count = count($doc_name);
						//print_r($doc_count); exit();  
						$url_client_id = $this->uri->segment(3);
						//print_r('sss'); exit();  
						
						$query = $this->edm->adddoc($employee_id,$doc_id,$doc_name,$doc_expiry,$uploaded_files,$doc_count);
						
						//echo $query; die;
						if($query){
							//redirect('employee_documents/upload/'.$employee_id, 'refresh');
							//redirect(base_url().'employee_documents/upload/'.$employee_id);
							 echo json_encode(array('status' => true));die;
						}
						
						
						
						//redirect('refresh');
							//redirect(site_url('employee_documents/upload/'.$employee_id,'refresh'));
						print_r('sss'); exit();  
						//redirect('employee_documents/upload/'.$employee_id);
						
						//redirect('employee_documents/upload/'.$employee_id, 'refresh');
				
		
		}
		
		$data['emp'] = $this->edm->ClientName($url_client_id);
		$data['doc'] = $this->edm->DocList('');
		$id = $this->uri->segment(3);
		$data['emplist'] = $this->edm->emplist($id); 
		//print_r ($url_client_id); exit;
		//print_r ($data); exit;
		$this->template->add_js('assets/js/select2.min.js');
        $this->template->add_js('assets/js/bootstrap-select.js');
        $this->template->add_js('assets/js/bootstrap-datepicker.min.js');

        $this->template->add_css('assets/css/datepicker.css');
		$this->template->add_css('assets/css/select2.css');
        $this->template->add_css('assets/css/bootstrap-select.css');
		
		
		$this->template->write_view('content', 'upload', $data, TRUE);
        $this->template->render();
	}
	
	
	
}

	