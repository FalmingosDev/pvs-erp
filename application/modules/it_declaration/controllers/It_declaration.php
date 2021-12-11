<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class It_declaration extends MY_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		
		$this->load->model('It_declaration_model');
		// $this->load->model('Holiday_model','rm');
		$this->load->library('form_validation');
		
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{	 


        $data['list'] = $this->It_declaration_model->get_all_it_declaration();
            
		$this->template->write('title', 'Dashboard', TRUE);
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


		/////////////////////////////////////////////////////////////////////////////
		
	}

	public function add()
	{		
		
		$data['year']  = 1;

		$financial_year_obj = $this->It_declaration_model->get_all_financial_year();
        $financial_year_list = array('' => 'Select Financial Year');
        foreach($financial_year_obj as $financial_year)
		{
            $financial_year_list[$financial_year->financial_year_id] = $financial_year->fy_name;
        }
        $data['financial_year'] = $financial_year_list;


        $employee_id_obj = $this->It_declaration_model->get_all_employee_id();
        $employee_id_list = array('' => 'Select Employee');
        foreach($employee_id_obj as $employee_id)
		{
            $employee_id_list[$employee_id->employee_id] = $employee_id->employee_name;


        }
        $data['employee_id'] = $employee_id_list;


        $it_deduction_rule_obj = $this->It_declaration_model->get_all_it_deduction_rule();
        $it_deduction_rule_list = array('' => 'Select It Deduction Section');
        foreach($it_deduction_rule_obj as $it_deduction_rule)
		{
            $it_deduction_rule_list[$it_deduction_rule->it_deduction_id] = $it_deduction_rule->section;
        }
        $data['it_deduction_rule'] = $it_deduction_rule_list;


        $it_deduction_detail_id_obj = $this->It_declaration_model->get_all_it_deduction_detail();
        $it_deduction_detail_id_list = array('' => 'Select It Deduction Section');
        foreach($it_deduction_detail_id_obj as $it_deduction_detail_rule)
		{
            $it_deduction_detail_id_list[$it_deduction_detail_rule->it_deduction_detail_id] = $it_deduction_detail_rule->sub_head_name;
        }
        $data['it_deduction_detail_rule'] = $it_deduction_detail_id_list;

        $data['resource'] = $this->It_declaration_model->get_all_employee_id_new();


      //  $data['deductiondetail'] = $this->It_declaration_model->get_all_deduction_detail();

       // print_r($data['deductiondetail']);exit;


        $this->template->write('title', 'Dashboard', TRUE);	
		$this->template->write_view('content','add', $data, TRUE);
        $this->template->render();


        

       // print_r($data['resource']);exit;
		
	
	}


   public function add_itdeclaration() 
		{
			$it_deduction_rule_dts = $this->input->post('it_deduction_rule_dts');
		    //print_r($employee);
			$data['it_deduction_rule_dts'] =  $this->It_declaration_model->it_declaration($it_deduction_rule_dts);
			echo json_encode(array('emp_list' => $data['it_deduction_rule_dts'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
		}


		public function edit_itdeclaration()
		{
			$it_deduction_rule = $this->input->post('it_deduction_rule');
		    //print_r($employee);
			$data['it_deduction_rule'] =  $this->It_declaration_model->it_declaration($it_deduction_rule);
			echo json_encode(array('emp_list' => $data['it_deduction_rule'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
		}


	public function add_itdeclaration_id()
		{
			$it_deduction_rule_dts_dp = $this->input->post('it_deduction_rule_dts_dp');
		    //print_r($employee);exit;
			$data['it_deduction_rule_dts_dp'] =  $this->It_declaration_model->it_declaration_add($it_deduction_rule_dts_dp);
			echo json_encode(array('emp_list' => $data['it_deduction_rule_dts_dp'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
		}



		

		public function insertitdeclaration()
			{	

				
				 	$financial_year_id = $this->input->post('financial_year_id');
					$employee_id = $this->input->post('employee_id');
					$it_deduction_id = $this->input->post('it_deduction_id[]');
					$it_deduction_rule_dlt = $this->input->post('it_deduction_rule_dts[]');
					//print_r($it_deduction_id);exit;
					$reference = $this->input->post('reference[]');
					$amount = $this->input->post('amount[]');
					$this->It_declaration_model->insertDeduction($financial_year_id,$employee_id,$it_deduction_id,$it_deduction_rule_dlt,$reference,$amount);
					redirect('it_declaration', 'refresh');
				 
			}


			public function change_status($id, $status){
					$this->It_declaration_model->change_status($id,$status);
					redirect('it_declaration','refresh');
				}



		public function edit(){	

		if(!empty($this->input->post())){			
			if ($this->form_validation->run() == TRUE){
				$role_name  = $this->input->post('role_name');
				$role_st_name  = $this->input->post('role_st_name');
				$role_id  = $this->input->post('role_id');
				$this->role_model->edit_role($role_name,$role_st_name,$role_id);	
				redirect('role','refresh');
			}
		}
		$this->template->write('title', 'Dashboard', TRUE);	
		$id = $this->uri->segment(3);


		$data['it_declaration'] = $this->It_declaration_model->get_declaration_data($id);



		$financial_year_obj = $this->It_declaration_model->get_all_financial_year();
        $financial_year_list = array('' => 'Select Financial Year');
        foreach($financial_year_obj as $financial_year)
		{
            $financial_year_list[$financial_year->financial_year_id] = $financial_year->fy_name;
        }
        $data['financial_year_edit'] = $financial_year_list;
        //$data['employee_data'] = $this->It_declaration_model->get_declaration_data($id);
        $employee_id_obj = $this->It_declaration_model->get_all_employee_id();
        $employee_id_list = array('' => 'Select Employee');
        foreach($employee_id_obj as $employee_id)
		{
            $employee_id_list[$employee_id->employee_id] = $employee_id->employee_name;

        }
        $data['employee_id'] = $employee_id_list;

        

       // $data['it_declaration_edit'] = $this->It_declaration_model->get_declaration_data($id);
        $it_deduction_rule_obj = $this->It_declaration_model->get_all_it_deduction_rule();
        $it_deduction_rule_list = array('' => 'Select It Deduction Section');
        foreach($it_deduction_rule_obj as $it_deduction_rule)
		{
            $it_deduction_rule_list[$it_deduction_rule->it_deduction_id] = $it_deduction_rule->section;
        }
        $data['it_deduction_id'] = $it_deduction_rule_list;


        

       // $data['it_deduction_detail_edit'] = $this->It_declaration_model->get_declaration_data($id);
        $it_deduction_detail_id_obj = $this->It_declaration_model->get_all_it_deduction_detail($data['it_declaration']->it_deduction_id);
        $it_deduction_detail_id_list = array('' => 'Select It Deduction Section');
        foreach($it_deduction_detail_id_obj as $it_deduction_detail_rule)
		{
            $it_deduction_detail_id_list[$it_deduction_detail_rule->it_deduction_detail_id] = $it_deduction_detail_rule->sub_head_name;
        }
        $data['it_deduction_detail_id'] = $it_deduction_detail_id_list;


        $data['edit_declaration_data'] = $this->It_declaration_model->get_declaration_data($id);

		
		$this->template->write_view('content', 'edit', $data, TRUE);
        $this->template->render();
		
	}


	

	public function edit_it_declaration(){		


		$financial_year_id = $this->input->post('financial_year_id');
		$employee_id = $this->input->post('employee_id');
		$it_deduction_id = $this->input->post('it_deduction_id');
		$it_deduction_rule_dlt = $this->input->post('it_deduction_rule');
		//print($it_deduction_rule_dlt);exit;
		$reference = $this->input->post('reference');
		$amount = $this->input->post('amount');
		$edit_id = $this->input->post('edit_id');



		$this->It_declaration_model->editDeduction($financial_year_id,$employee_id,$it_deduction_id,$it_deduction_rule_dlt,$reference,$amount,$edit_id);
		redirect('it_declaration', 'refresh');
		
		$this->template->write_view('content', 'edit', $data, TRUE);
        $this->template->render();
		
	}


		
	
}

?>