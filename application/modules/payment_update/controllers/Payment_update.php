<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_update extends MY_Controller 
{
	public function __construct() 
	{
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
		redirect('login');
		}
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		$this->form_validation->CI =& $this;
		$this->load->model('Payment_update_model','pm');
    }
  
	public function index()
	{
		$data = [];
		$data['client'] = $this->pm->get_all_client();
		$data['show_client_id']='';
		if(!empty($this->input->post()))
		{
            $client_id=$this->input->post('client_id');
			$branch_id=$this->input->post('branch_id');
			$form_date=$this->input->post('form_date');
			$to_date=$this->input->post('to_date');
			//pr($this->input->post()); 
			if(!empty($client_id) || !empty($branch_id) || !empty($form_date) && !empty($to_date))
			{
				$data['show_client_id']=$client_id;
				$data['payment_list'] = $this->pm->payment_update_list($client_id,$branch_id,$form_date,$to_date); 
				// echo $this->db->last_query();
				// die;
			}
			else
			{
				$this->session->set_flashdata('msg', 'Pleace enter Invoice Period start and end date Otherwise enter client name and branch name ');
			}
	 	}
		else
		{
			$data['payment_list']='';
		}
		//pr($data);

		$this->template->write('title', 'Pay Register Report', TRUE);
		/**
		 * if you have any css to add for this page
		 */
		$this->template->add_css('assets/css/dataTables.bootstrap4.min.css');
		/**
		 * if you have any js to add for this page
		 */
		$this->template->add_js('assets/js/jquery.dataTables.min.js');
		$this->template->add_js('assets/js/dataTables.bootstrap4.min.js');
		$this->template->add_js('assets/js/bootstrap-select.js');



		$this->template->write_view('content', 'list',$data, TRUE);
		$this->template->render();
	}
	public function add($invoice_id)
	{
		$data = [];
		$data['payment_list']=$this->pm->payment_payment_list($invoice_id);
		
		if(!empty($this->input->post()))
		{
			$this->form_validation->set_rules('invoice_id','Invoice id','required');
            $this->form_validation->set_rules('payment_date','payment date','required');
            $this->form_validation->set_rules('payment_amount','payment amount','required');
			if ($this->form_validation->run() == TRUE)
            {
				$invoice_id=$this->input->post('invoice_id');
				$payment_date=$this->input->post('payment_date');
				$payment_amount=$this->input->post('payment_amount');
				$this->pm->payment_insert($invoice_id,$payment_date,$payment_amount); 
				$this->session->set_flashdata('success', 'Payment updated successfully.');
			}
			else
			{
				$this->session->set_flashdata('error', 'Pleace enter payment date and payment amount !.');
				redirect('payment_update/add/'.$invoice_id, 'refresh');
			}

	 	}
		$data['payment_all_list']=$this->pm->payment_sum($invoice_id);
		//pr($data);
		$this->template->write('title', 'Pay Register Report', TRUE);
		/**
		 * if you have any css to add for this page
		 */

		$this->template->add_css('assets/css/dataTables.bootstrap4.min.css');
		/**
		 * if you have any js to add for this page
		 */
		$this->template->add_js('assets/js/jquery.dataTables.min.js');
		$this->template->add_js('assets/js/dataTables.bootstrap4.min.js');
		$this->template->add_js('assets/js/bootstrap-select.js');
		$this->template->write_view('content', 'add',$data, TRUE);
		$this->template->render();
	}

	public function branch_list()
	{
		$client_id = $this->input->post('client_id');
		$data['branch_list'] = $this->pm->getBranch($client_id);
		echo json_encode(array('branch_list' => $data['branch_list'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}

  
}

?>
