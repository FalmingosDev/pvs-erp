<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tally_billing extends MY_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		$this->load->model('Tally_billing_model','tb');
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
		$data['list'] = $this->tb->get_all_list();
		//pr($data);
		$this->template->write('title', 'Tally Billing', TRUE);
        $this->template->add_js('assets/js/jquery.dataTables.min.js');
        $this->template->add_js('assets/js/dataTables.bootstrap4.min.js');
       
        $this->template->add_css('assets/css/dataTables.bootstrap4.min.css');
		
        $this->template->write_view('content', 'list', $data, TRUE);
        $this->template->render();
	}
	
	public function change_status($id, $status)
	{

		if(check_uri_permission('esi_organisation', 'D') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        }

		//print_r($status); exit;
		$this->tb->change_status($id,$status);
		redirect('tally_billing','refresh');
	}
	
	public function add()
	{
		if(check_uri_permission('esi_organisation', 'A') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        }
		$data['client'] = $this->tb->get_all_client();
			
		if(!empty($this->input->post()))
		{
			$this->form_validation->set_rules('client_id','Client Name','trim|required');
			$this->form_validation->set_rules('branch_id','Branch Number','trim|required');
			$this->form_validation->set_rules('customer_ledger_code','Customer Ledger Code','trim|required');
			//$this->form_validation->set_rules('igst_code','Igst Code','trim|required');
			$this->form_validation->set_rules('cost_category','Cost Category','trim|required');
			$this->form_validation->set_rules('cast_center','Cast Center','trim|required');
			// $this->form_validation->set_rules('sales_head_code','Sales Head Code','trim|required');
			// $this->form_validation->set_rules('cgst_code','Cgst Code','trim|required');
			// $this->form_validation->set_rules('sgst_code','Sgst Code','trim|required');
			// $this->form_validation->set_rules('ugst_code','Ugst Code','trim|required');
			// $this->form_validation->set_rules('add_text_code','Add Text Code','trim|required');
				if ($this->form_validation->run() == TRUE)
				{
					$client_id  = $this->input->post('client_id');
					$branch_id  = $this->input->post('branch_id');
					$customer_ledger_code  = $this->input->post('customer_ledger_code');
					$igst_code  = $this->input->post('igst_code');
					$cost_category  = $this->input->post('cost_category');
					$cast_center  = $this->input->post('cast_center');
					$sales_head_code  = $this->input->post('sales_head_code');
					$round_of = $this->input->post('round_of');
					$cgst_code  = $this->input->post('cgst_code');
					$sgst_code  = $this->input->post('sgst_code');
					$ugst_code  = $this->input->post('ugst_code');
					$add_text_code  = $this->input->post('add_text_code');
					$this->tb->add_tb($client_id,$branch_id,$customer_ledger_code,$igst_code,$cost_category,$cast_center,$sales_head_code,$round_of,$cgst_code,$sgst_code,$ugst_code,$add_text_code);	
					$this->session->set_flashdata('success', 'Tally billing added successfully.');
					redirect('tally_billing','refresh');
				}
						
		}
		
		$this->template->write('title', 'Tally Billing', TRUE);
		
		
		$this->template->write_view('content', 'add',$data, TRUE);
        $this->template->render();
		
		//$this->load->view('add_state.php');
	} 
	
	
	public function edit()
	{
		if(check_uri_permission('esi_organisation', 'E') == 0)
		{
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        }

		
		if(!empty($this->input->post()))
		{
			$this->form_validation->set_rules('client_id','Client Name','trim|required');
			$this->form_validation->set_rules('branch_id','Branch Number','trim|required');
			$this->form_validation->set_rules('customer_ledger_code','Customer Ledger Code','trim|required');
			//$this->form_validation->set_rules('igst_code','Igst Code','trim|required');
			$this->form_validation->set_rules('cost_category','Cost Category','trim|required');
			$this->form_validation->set_rules('cast_center','Cast Center','trim|required');
			$this->form_validation->set_rules('sales_head_code','Sales Head Code','trim|required');
			// $this->form_validation->set_rules('cgst_code','Cgst Code','trim|required');
			// $this->form_validation->set_rules('sgst_code','Sgst Code','trim|required');
			// $this->form_validation->set_rules('ugst_code','Ugst Code','trim|required');
			// $this->form_validation->set_rules('add_text_code','Add Text Code','trim|required');
				if ($this->form_validation->run() == TRUE)
				{
					$client_id  = $this->input->post('client_id');
					$branch_id  = $this->input->post('branch_id');
					$customer_ledger_code  = $this->input->post('customer_ledger_code');
					$igst_code  = $this->input->post('igst_code');
					$cost_category  = $this->input->post('cost_category');
					$cast_center  = $this->input->post('cast_center');
					$sales_head_code  = $this->input->post('sales_head_code');
					$round_of = $this->input->post('round_of');
					$cgst_code  = $this->input->post('cgst_code');
					$sgst_code  = $this->input->post('sgst_code');
					$ugst_code  = $this->input->post('ugst_code');
					$add_text_code  = $this->input->post('add_text_code');
					$billing_tally_id  = $this->input->post('billing_tally_id');
				
				//print_r($id); exit;
				
				$this->tb->edit_tb($client_id,$branch_id,$customer_ledger_code,$igst_code,$cost_category,$cast_center,$sales_head_code,$round_of,$cgst_code,$sgst_code,$ugst_code,$add_text_code,$billing_tally_id);	
				$this->session->set_flashdata('success', 'Tally billing updated successfully.');
				redirect('tally_billing','refresh');
			}
			
		}
		
		$this->template->write('title', 'Tally Billing', TRUE);
		
		
		$id = $this->uri->segment(3);
		
		//print_r($id); exit;
		$data['view'] = $this->tb->view($id);
		$data['client'] = $this->tb->get_all_client();
		$data['branch_list'] = $this->tb->getBranch($data['view']->client_id);
		
		//pr($data);
		
		$this->template->write_view('content', 'edit', $data, TRUE);
        $this->template->render();
		
	}

	public function branch_list()
	{
		$client_id = $this->input->post('client_id');
		$data['branch_list'] = $this->tb->getBranch($client_id);
		echo json_encode(array('branch_list' => $data['branch_list'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}
	
		
		
	
}

	