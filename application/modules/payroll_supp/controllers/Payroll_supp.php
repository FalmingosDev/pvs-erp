<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payroll_supp extends MY_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id)
		{
			redirect('login');
		}
		
		$this->load->model('Payroll_supp_model','psm');
		$this->load->library('form_validation');
		
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$data = array();			
		$this->template->write('title', 'Payroll Supliment', TRUE);       
		$data['months'] = $this->psm->month_list('');

		$this->template->write('title', 'Payroll Supliment', TRUE);
		/**
		 * if you have any js to add for this page
		 */
		if(!empty($this->input->post()))
		{
			$this->form_validation->set_rules('month_drp','Month','required');
			if($this->form_validation->run())
			{
			 	$months = $this->input->post('month_drp');
				$data['count_tid_ck'] = $this->psm->count_tid_ck();
				$data['payroll_search'] = $this->psm->list_payroll_search($months);
				//pr($data);
			}
			else
			{
				$this->session->set_flashdata('error','You Do Not Select Month & Year');
			}
        }

		$this->template->add_js('assets/js/jquery.dataTables.min.js');
		$this->template->add_js('assets/js/dataTables.bootstrap4.min.js');
		/**
		 * if you have any css to add for this page
		 */
		$this->template->add_css('assets/css/dataTables.bootstrap4.min.css');
		//pr($data);
		$this->template->write_view('content', 'list', $data, TRUE);
		$this->template->render();
	}

	public function update()
	{
		if(!empty($this->input->post()))
		{
			$this->form_validation->set_rules('payroll_checkbox[]','Payroll checkbox','required');
			if ($this->form_validation->run())
			{
				$payroll_checkbox=$this->input->post('payroll_checkbox');
				//pr($payroll_checkbox);
				for($i=0; $i<count($payroll_checkbox); $i++)
				{
					$payroll_row = explode("#**#", $payroll_checkbox[$i]);
					//pr($payroll_row);
					//$payroll_supp_id_ck=$payroll_row[0];
					$count_tid_ck=$payroll_row[0];
					$employee_id_ckh=$payroll_row[1];
					$branch_id_ckh=$payroll_row[2];
					$month_ck=$payroll_row[3];

					$lastday =  date("Ynj", strtotime("last day of previous month"));         
					$tid =  $lastday . '/' .$count_tid_ck;
					$data['payroll_checkbox'] = $this->psm->payroll_checkbox_ck($employee_id_ckh,$branch_id_ckh,$tid,$month_ck);
		 	
				}
				$this->session->set_flashdata('success','Lock process update successfully.');
				redirect('payroll_supp/','refresh');


			}
			else
			{
				$this->session->set_flashdata('error','You Do Not Select Any Lock Payrol');
				redirect('payroll_supp/','refresh');
			}
        }
		//pr($this->input->post());
		

	}

}

	