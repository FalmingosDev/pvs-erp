<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document_uplode extends MY_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		//$this->load->model('state_model');
		$this->load->model('Document_uplode_model','dum');
		//$this->load->model('branch/Branch_model','bm');
		$this->load->library('form_validation');
		
		$this->load->helper(array('form', 'url'));
        $this->form_validation->CI =& $this;
		
		
		
	}
	
	public function docupload(){
		$url_client_id = $this->uri->segment(3);
		//print_r($url_client_id);exit;
		
		if(!empty($this->input->post())){
			
			  
			    $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx'; 
				
				 $this->load->library('upload', $config);
				 
				 $uploaded_files = array();
				 $count=0;
				$file_count = $this->input->post('file_count[]');
				//print_r($file_count); exit();
				foreach($file_count as $file_cnt){
					if ( $this->upload->do_upload('fileuplode_' . $file_cnt)){
						$uploaded_files[] = $this->upload->file_name;
						
						//print_r('ss');exit;
						
					}
					else{
						//print_r('ss');exit;
						redirect('document_uplode/add_document_uplode/'.$url_client_id, 'refresh');
					}
					
				}
				  
				
						//$clientid = 1;
						$doc_name = $this->input->post('loc_doc_name');
						$client_id = $this->uri->segment(3);
						$billstartdate = $this->input->post('loc_billstartdate');
						$billenddate = $this->input->post('loc_billenddate');
						$branch_id = $this->input->post('branch_id');
						//print_r($branch_id); exit();  
						$this->dum->Locadddoc($client_id,$doc_name,$branch_id,$billstartdate,$billenddate,$uploaded_files);
						redirect('document_uplode/add_document_uplode/'.$url_client_id, 'refresh');
			
		}
		else{
		
				redirect('document_uplode/add_document_uplode/'.$url_client_id, 'refresh');
		}
		
	}
	
	public function index(){
		redirect('document_uplode/add_document_uplode');
	}
	
	public function add_document_uplode_list(){
		$url_client_id = $this->input->post('client_id');
		
		$data['doclist'] = $this->dum->DocUpList($url_client_id);
		//print_r($data);exit;
		//echo $this->security->get_csrf_hash();die;
		echo json_encode(array('doclist' => $data['doclist'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}
	
	public function loc_document_uplode_list(){
		$url_client_id = $this->input->post('client_id');
		
		$data['loclist'] = $this->dum->loc_up_doc($url_client_id);
		//print_r($data);exit;
		//echo $this->security->get_csrf_hash();die;
		echo json_encode(array('loclist' => $data['loclist'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}
	
	
	public function add_document_uplode(){
		$url_client_id = $this->uri->segment(3);
		
		if(!empty($this->input->post())){
			
			
			  
			    $config['upload_path']          = './uploads/';
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
						$client_id = $this->input->post('client_id');
						$billstartdate = $this->input->post('billstartdate');
						$remarks = $this->input->post('remarks');
						//print_r($doc_name); exit();  
						$this->dum->adddoc($client_id,$doc_name,$remarks,$billstartdate,$uploaded_files);
						redirect('document_uplode/add_document_uplode/'.$url_client_id, 'refresh');
				
		//}
			/*else{
                 $this->load->view('add_client');
             }*/
		}
		
		
		$data['list'] = $this->dum->get_up_doc($url_client_id);
		$data['doclist'] = $this->dum->loc_up_doc($url_client_id);
		$data['client'] = $this->dum->ClientName($url_client_id);
		$data['bank'] = $this->dum->BankList($url_client_id);
		 
		//print_r ($data); exit;
		$this->template->add_js('assets/js/select2.min.js');
        $this->template->add_js('assets/js/bootstrap-select.js');
        $this->template->add_js('assets/js/bootstrap-datepicker.min.js');

        $this->template->add_css('assets/css/datepicker.css');
		$this->template->add_css('assets/css/select2.css');
        $this->template->add_css('assets/css/bootstrap-select.css');
		
		
		$this->template->write_view('content', 'add_document_uplode', $data, TRUE);
        $this->template->render();
	}
	
	
	
}

	