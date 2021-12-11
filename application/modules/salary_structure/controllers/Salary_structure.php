<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salary_structure extends MY_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
        $this->load->library("session");
        $this->load->model('salary_structure_model','ssm');
    		$this->load->model('billing_costing/billingcosting_model','bcm');
    		$this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->form_validation->CI =& $this;
	}
	
	public function index() {
		$data = [];
		$this->template->write('title', 'Employee Details', TRUE);
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
		
        $this->template->write_view('content', 'list', $data, TRUE);
        $this->template->render();
	}

	public function add(){
    $url_emp_id = $this->uri->segment(3);
	 if(!empty($this->input->post())){
		//print_r($this->input->post()); exit();
		$this->form_validation->set_rules('dept_id','Department','required');
        $this->form_validation->set_rules('eff_date','Effective Date','required|callback_eff_date_check');
        $this->form_validation->set_rules('gross_pay','Gross Pay','required');
        $this->form_validation->set_rules('pf_wage','PF wage','required');
        //$this->form_validation->set_rules('ot_rate','OT Rate','required');
        
        if ($this->form_validation->run() == TRUE)
        {
                   $dept_id = $this->input->post('dept_id');
                   $employee_id = $this->input->post('employee_id');
                   $eff_date = $this->input->post('eff_date');
                   $gross_pay = $this->input->post('gross_pay');
                   $pf_wage = $this->input->post('pf_wage');
                   $ot_rate = $this->input->post('ot_rate');
                   $email = $this->input->post('email');
                   $monthly_ctc = $this->input->post('monthly_ctc');
                   $annual_ctc = $this->input->post('annual_ctc');

                   $head_id = $this->input->post('head_id');
                   $type_id = $this->input->post('type_id');
                   $rate = $this->input->post('rate');
                   $basis = $this->input->post('basis');
                   $limit = $this->input->post('limit');
                   $criteria = $this->input->post('criteria');
                   $periodicity = $this->input->post('periodicity');
                   $salary_head_amnt = $this->input->post('salary_head_amount');
				   
                   $designation_id = $this->input->post('designation_id');
				   $applicable_for = $this->input->post('applicable_for');
  
                
                $qry = $this->ssm->insertSalary($dept_id, $employee_id, $eff_date, $gross_pay, $pf_wage, $ot_rate, $email, $monthly_ctc, $annual_ctc, $head_id, $type_id, $rate, $basis, $limit, $criteria, $periodicity, $salary_head_amnt, $designation_id, $applicable_for);
                if($qry)
                {
                    //echo "1";die;
                    $this->session->set_flashdata('msg', 'Data Saved Successfully');
                    redirect(base_url().'salary_structure/add/'.$employee_id);
                }
                
              }
             else{
                
                if(!empty($this->input->post('head_id')))
                {
                    $head_obj = $this->input->post('head_id');
                    $data['salary_structure']['head_id'] = $head_obj;
                }

                if(!empty($this->input->post('type_id')))
                {
                    $type_obj = $this->input->post('type_id');
                    $data['salary_structure']['type_id'] = $type_obj;
                }

                if(!empty($this->input->post('rate')))
                {
                    $rate_obj = $this->input->post('rate');
                    $data['salary_structure']['rate'] = $rate_obj;
                }

                if(!empty($this->input->post('basis')))
                {
                    $basis_obj = $this->input->post('basis');
                    $data['salary_structure']['basis'] = $basis_obj;
                }

                if(!empty($this->input->post('limit')))
                {
                    $limit_obj = $this->input->post('limit');
                    $data['salary_structure']['limit'] = $limit_obj;
                }

                if(!empty($this->input->post('criteria')))
                {
                    $criteria_obj = $this->input->post('criteria');
                    $data['salary_structure']['criteria'] = $criteria_obj;
                }

                if(!empty($this->input->post('periodicity')))
                {
                    $periodicity_obj = $this->input->post('periodicity');
                    $data['salary_structure']['periodicity'] = $periodicity_obj;
                }

                if(!empty($this->input->post('detail_id')))
                {
                    $detail_obj = $this->input->post('detail_id');
                    $data['salary_structure']['detail_id'] = $detail_obj;
                }

                if(!empty($this->input->post('max_prcnt')))
                {
                    $max_prcnt_obj = $this->input->post('max_prcnt');
                    $data['salary_structure']['max_prcnt'] = $max_prcnt_obj;
                }

                if(!empty($this->input->post('min_prcnt')))
                {
                    $min_prcnt_obj = $this->input->post('min_prcnt');
                    $data['salary_structure']['min_prcnt'] = $min_prcnt_obj;
                }

                //print_r($data['client_contact']);

                $this->template->write('title', 'Dashboard', TRUE);
                $this->template->add_js('assets/js/select2.min.js');
                $this->template->add_js('assets/js/bootstrap-select.js');
                $this->template->add_js('assets/js/bootstrap-datepicker.min.js');

                $this->template->add_css('assets/css/datepicker.css');
                $this->template->add_css('assets/css/select2.css');
                $this->template->add_css('assets/css/bootstrap-select.css');


                $this->template->write_view('content', 'add_salary_structure', $data, TRUE);
                $this->template->render();
             }
		 }

	 $data['employee'] = $this->ssm->EmpDetails($url_emp_id);
     $data['salary_data'] = $this->ssm->EmpSalary($url_emp_id);
     //print_r($data['salary_data']);die;

    $department_obj = $this->ssm->get_all_department();
    $department_list = array("" => "Select Department");
    foreach($department_obj as $department){
        $department_list[$department->dept_id] = $department->dept_name;
    }    
    $data['department'] = $department_list;
	
	$desig_obj = $this->ssm->get_all_desig();
	foreach($desig_obj as $desig){
		$desig_list[$desig->desig_id] = $desig->desig_name;
	}
	$data['desig'] = $desig_list;

		
    $this->template->write('title', 'Dashboard', TRUE);
		$this->template->add_js('assets/js/select2.min.js');
    $this->template->add_js('assets/js/bootstrap-select.js');
    $this->template->add_js('assets/js/bootstrap-datepicker.min.js');

    $this->template->add_css('assets/css/datepicker.css');
		$this->template->add_css('assets/css/select2.css');
    $this->template->add_css('assets/css/bootstrap-select.css');


    $this->template->write_view('content', 'add_salary_structure', $data , TRUE);
    $this->template->render();
	}

  public function salaryhead_list(){
    //echo "1";die;
    //$state_id = $this->input->post('state_id');
    $data['salaryhead_list'] = $this->bcm->getSalaryHeadName();
    echo json_encode(array('salaryhead_list' => $data['salaryhead_list'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
  }

    public function edit($salary_structure_id,$employee_id)
    {
        $data['edit_salary'] = $this->ssm->editSalary($salary_structure_id);
        $data['edit_sal_detail'] = $this->ssm->editSalDetail($salary_structure_id);
        //print_r($data['edit_sal_detail']);die;
		$data['employee'] = $this->ssm->EmpDetails($employee_id);

        $department_obj = $this->ssm->get_all_department();
        $department_list = array();
        foreach($department_obj as $department){
            $department_list[$department->dept_id] = $department->dept_name;
        }    
        $data['department'] = $department_list;
		
		$desig_obj = $this->ssm->get_all_desig();
		foreach($desig_obj as $desig){
			$desig_list[$desig->desig_id] = $desig->desig_name;
		}
		$data['desig'] = $desig_list;
		

         if(!empty($this->input->post())){

        $this->form_validation->set_rules('dept_id','Department','required');
        $this->form_validation->set_rules('eff_date','Effective Date','required|callback_edit_eff_date_check');
        $this->form_validation->set_rules('gross_pay','Gross Pay','required');
        $this->form_validation->set_rules('pf_wage','PF wage','required');
        //$this->form_validation->set_rules('ot_rate','OT Rate','required');

        if ($this->form_validation->run() == TRUE){
                   $dept_id = $this->input->post('dept_id');
                   $employee_id = $this->input->post('employee_id');
                   $eff_date = $this->input->post('eff_date');
                   $gross_pay = $this->input->post('gross_pay');
                   $pf_wage = $this->input->post('pf_wage');
                   $ot_rate = $this->input->post('ot_rate');
                   $email = $this->input->post('email');
                   $salary_structure_id = $this->input->post('salary_structure_id');
                   $monthly_ctc = $this->input->post('monthly_ctc');
                   $annual_ctc = $this->input->post('annual_ctc');

                   $head_id = $this->input->post('head_id');
                   $type_id = $this->input->post('type_id');
                   $rate = $this->input->post('rate');
                   $basis = $this->input->post('basis');
                   $limit = $this->input->post('limit');
                   $criteria = $this->input->post('criteria');
                   $periodicity = $this->input->post('periodicity');
                   $detail_id = $this->input->post('detail_id');
                   $salary_head_amnt = $this->input->post('salary_head_amount');
				   
                   $designation_id = $this->input->post('designation_id');
				   $applicable_for = $this->input->post('applicable_for');
                
                 $qry = $this->ssm->UpdateSalaryStructure($salary_structure_id,$dept_id,$employee_id,$eff_date,$gross_pay,$pf_wage,$ot_rate,$email,$monthly_ctc,$annual_ctc,$detail_id,$head_id,$type_id,$rate,$basis,$limit,$criteria,$periodicity,$salary_head_amnt, $designation_id, $applicable_for);
                if($qry)
                {
                    $this->session->set_flashdata('msg', 'Data Saved Successfully');
                    redirect(base_url().'salary_structure/edit/'.$salary_structure_id. '/' . $employee_id);
                }
            }
            else
            {
                if(!empty($this->input->post('head_id')))
                {
                    $head_obj = $this->input->post('head_id');
                    $data['salary_structure']['head_id'] = $head_obj;
                }

                if(!empty($this->input->post('type_id')))
                {
                    $type_obj = $this->input->post('type_id');
                    $data['salary_structure']['type_id'] = $type_obj;
                }

                if(!empty($this->input->post('rate')))
                {
                    $rate_obj = $this->input->post('rate');
                    $data['salary_structure']['rate'] = $rate_obj;
                }

                if(!empty($this->input->post('basis')))
                {
                    $basis_obj = $this->input->post('basis');
                    $data['salary_structure']['basis'] = $basis_obj;
                }

                if(!empty($this->input->post('limit')))
                {
                    $limit_obj = $this->input->post('limit');
                    $data['salary_structure']['limit'] = $limit_obj;
                }

                if(!empty($this->input->post('criteria')))
                {
                    $criteria_obj = $this->input->post('criteria');
                    $data['salary_structure']['criteria'] = $criteria_obj;
                }

                if(!empty($this->input->post('periodicity')))
                {
                    $periodicity_obj = $this->input->post('periodicity');
                    $data['salary_structure']['periodicity'] = $periodicity_obj;
                }

                if(!empty($this->input->post('detail_id')))
                {
                    $detail_obj = $this->input->post('detail_id');
                    $data['salary_structure']['detail_id'] = $detail_obj;
                }

                if(!empty($this->input->post('max_prcnt')))
                {
                    $max_prcnt_obj = $this->input->post('max_prcnt');
                    $data['salary_structure']['max_prcnt'] = $max_prcnt_obj;
                }

                if(!empty($this->input->post('min_prcnt')))
                {
                    $min_prcnt_obj = $this->input->post('min_prcnt');
                    $data['salary_structure']['min_prcnt'] = $min_prcnt_obj;
                }

                //print_r($data['client_contact']);

                $this->template->write('title', 'Dashboard', TRUE);
                $this->template->add_js('assets/js/select2.min.js');
                $this->template->add_js('assets/js/bootstrap-select.js');
                $this->template->add_js('assets/js/bootstrap-datepicker.min.js');

                $this->template->add_css('assets/css/datepicker.css');
                $this->template->add_css('assets/css/select2.css');
                $this->template->add_css('assets/css/bootstrap-select.css');


                $this->template->write_view('content', 'edit_client', $data, TRUE);
                $this->template->render();
            }
         }

        $this->template->write('title', 'Dashboard', TRUE);
    	$this->template->add_js('assets/js/select2.min.js');
    	$this->template->add_js('assets/js/bootstrap-select.js');
        $this->template->add_js('assets/js/bootstrap-datepicker.min.js');
        
    	$this->template->add_css('assets/css/select2.css');
    	$this->template->add_css('assets/css/bootstrap-select.css');
        $this->template->add_css('assets/css/datepicker.css');
        $this->template->write_view('content', 'edit_salary_structure', $data, TRUE);
        $this->template->render();  
    }

    public function eff_date_check($str)
    {
        $str = $this->input->post('eff_date');
       // $employee_id = $this->input->post('employee_id');

        $employee_id = NULL;
        if(!empty($this->input->post('employee_id'))){
            $employee_id = $this->input->post('employee_id');
        }

        $check = $this->ssm->checkEmployee($str,$employee_id);
        if($check)
        {
            $this->form_validation->set_message('eff_date_check', 'The {field} field should be different from ' . $str);
            return FALSE;
        }
        else
        {
            return TRUE;
         }
    }

    public function edit_eff_date_check($str)
    {
        $str = $this->input->post('eff_date');
        $employee_id = $this->input->post('employee_id');

        $salary_structure_id = NULL;
        if(!empty($this->input->post('salary_structure_id'))){
            $salary_structure_id = $this->input->post('salary_structure_id');
        }

        $check = $this->ssm->editcheckEmployee($str,$employee_id,$salary_structure_id);
        if($check)
        {
            $this->form_validation->set_message('eff_date_check', 'The {field} field should be different from ' . $str);
            return FALSE;
        }
        else
        {
            return TRUE;
         }
    }
	
}

?>
