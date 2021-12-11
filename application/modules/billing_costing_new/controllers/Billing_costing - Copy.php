<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billing_costing extends MY_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		$this->load->library("session");
		$this->load->model('billingcosting_model','bcm');
        $this->load->model('client/client_model','cm');
		$this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->form_validation->CI =& $this;
	}
	
	public function index()
	{
		
		$data['list'] = $this->bcm->billing_costing_list();
		$this->template->write('title', 'Billing Costing', TRUE);
        /**
         * if you have any js to add for this page
         */
        //$this->template->add_js('assets/js/jquery.dataTables.min.js');
        //$this->template->add_js('assets/js/maruti.tables.js');
        /**
         * if you have any css to add for this page
         */
        $this->template->write_view('content', 'list', $data, TRUE);
        $this->template->render();
	}

	public function add(){
        $url_client_id = $this->uri->segment(3);
        //echo $url_client_id;die;
		 if(!empty($this->input->post()))
         {
			 $this->form_validation->set_rules('client_name','Client Name','trim|required');
             $this->form_validation->set_rules('post_id','Post Name','required');
             $this->form_validation->set_rules('branch_id','Branch Name','required');
             $this->form_validation->set_rules('zone_id','Zone Name','required');
             $this->form_validation->set_rules('hsn_no','HSN No.','required');
             $this->form_validation->set_rules('commencement_date','Commencement Date','required');
             $this->form_validation->set_rules('contract_type','Contract Type','required');
             $this->form_validation->set_rules('status','Status','required');
             $this->form_validation->set_rules('bill_calculation_days','Bill Calculation Day','required|trim');
             $this->form_validation->set_rules('gross_pay','Gross Pay','required|trim');
             $this->form_validation->set_rules('person_number','No. of Person','required|trim');
             $this->form_validation->set_rules('duty_hrs','Duty Hrs','required|trim');
             $this->form_validation->set_rules('service_chrg_prcnt','Service Chrg Prcnt','trim|callback_service_chrg_check');
             $this->form_validation->set_rules('pf_wage','PF Wage','required');
             $this->form_validation->set_rules('esi_wage','ESI Wage','required');
             
            if ($this->form_validation->run() == TRUE)
             {
             	$client_id = $this->input->post('client_id');
                $client_name = $this->input->post('client_name');
                $post_id = $this->input->post('post_id');
                $zone_id = $this->input->post('zone_id');
                $commencement_date = $this->input->post('commencement_date');
                $contract_type = $this->input->post('contract_type');
                $status = $this->input->post('status');
                $termination_date = $this->input->post('termination_date');
                $bill_calculation_days = $this->input->post('bill_calculation_days');
                $gross_pay = $this->input->post('gross_pay');
                $hsn_no = $this->input->post('hsn_no');
                $person_number = $this->input->post('person_number');
                $duty_hrs = $this->input->post('duty_hrs');
                $releiver_chrg = $this->input->post('releiver_chrg');
                $monthly_ctc = $this->input->post('monthly_ctc');
                $annual_ctc = $this->input->post('annual_ctc');
                $round_off = $this->input->post('round_off');
                $service_chrg_prcnt = $this->input->post('service_chrg_prcnt');
                //$service_chrg = $this->input->post('service_chrg');
                $total_bill_amt = $this->input->post('total_bill_amt');
                $total_ctc_amt = $this->input->post('total_ctc_amt');
                $gross_profit = $this->input->post('gross_profit');
                $epf = $this->input->post('epf');
                $esi = $this->input->post('esi');
                $lwf = $this->input->post('lwf');
                $ptax = $this->input->post('ptax');
                $tot_dedn = $this->input->post('tot_dedn');
                $net_pay = $this->input->post('net_pay');
                $pay_hrs = $this->input->post('pay_hrs');
                $ot_rate_type = $this->input->post('ot_rate_type');
                $ot_rt = $this->input->post('ot_rt');
                $esi_wage = $this->input->post('esi_wage');
                $ot_esi_wage = $this->input->post('ot_esi_wage');
                $pf_wage = $this->input->post('pf_wage');
                $branch_id = $this->input->post('branch_id');

                //detail

                $head_id = $this->input->post('head_id');
                $type_id = $this->input->post('type_id');
                $rate = $this->input->post('rate');
                $basis = $this->input->post('basis');
                $limit = $this->input->post('limit');
                $criteria = $this->input->post('criteria');
                $periodicity = $this->input->post('periodicity');
                $method = $this->input->post('method');
                $salary_head_amnt = $this->input->post('salary_head_amount');
                //print_r($salary_head_amnt);die;
                

                if($service_chrg_prcnt == '')
                {
                	$service_chrg = $this->input->post('service_chrg');
                }
                else
                {
                	$service_chrg = '';
                }

                $salary_type = $this->input->post('salary_type');
                if($salary_type == 'd')
                {
                    $salary_days = $this->input->post('salary_days');
                }
                else
                {
                    $salary_days = '';
                }

                $query = current($this->bcm->insertBilligCosting($client_id,$post_id,$zone_id,$commencement_date,$contract_type,$status,$termination_date,$bill_calculation_days,$gross_pay,$hsn_no,$person_number,$duty_hrs,$releiver_chrg,$monthly_ctc,$annual_ctc,$round_off,$service_chrg_prcnt,$service_chrg,$total_bill_amt,$total_ctc_amt,$gross_profit,$epf,$esi,$lwf,$ptax,$tot_dedn,$net_pay,$pay_hrs,$ot_rate_type,$ot_rt,$esi_wage,$ot_esi_wage,$pf_wage,$branch_id,$head_id,$type_id,$rate,$basis,$limit,$criteria,$periodicity,$method,$salary_head_amnt,$salary_type,$salary_days));

                $header_id = $query['header_id'];
                if($header_id)
                {
                	$this->session->set_flashdata('msg', 'Data Saved Successfully');
                    redirect(base_url().'billing_costing/edit/'.$client_id . '/'. $header_id);
                }
             }
             else
             {
                 if(!empty($this->input->post('head_id')))
                {
                    $head_obj = $this->input->post('head_id');
                    $data['billing_costing']['head_id'] = $head_obj;
                }

                if(!empty($this->input->post('type_id')))
                {
                    $type_obj = $this->input->post('type_id');
                    $data['billing_costing']['type_id'] = $type_obj;
                }

                if(!empty($this->input->post('rate')))
                {
                    $rate_obj = $this->input->post('rate');
                    $data['billing_costing']['rate'] = $rate_obj;
                }

                if(!empty($this->input->post('basis')))
                {
                    $basis_obj = $this->input->post('basis');
                    $data['billing_costing']['basis'] = $basis_obj;
                }

                if(!empty($this->input->post('limit')))
                {
                    $limit_obj = $this->input->post('limit');
                    $data['billing_costing']['limit'] = $limit_obj;
                }

                if(!empty($this->input->post('criteria')))
                {
                    $criteria_obj = $this->input->post('criteria');
                    $data['billing_costing']['criteria'] = $criteria_obj;
                }

                if(!empty($this->input->post('periodicity')))
                {
                    $periodicity_obj = $this->input->post('periodicity');
                    $data['billing_costing']['periodicity'] = $periodicity_obj;
                }

                if(!empty($this->input->post('method')))
                {
                    $method_obj = $this->input->post('periodicity');
                    $data['billing_costing']['method'] = $method_obj;
                }

                if(!empty($this->input->post('detail_id')))
                {
                    $detail_obj = $this->input->post('detail_id');
                    $data['billing_costing']['detail_id'] = $detail_obj;
                }

                if(!empty($this->input->post('max_prcnt')))
                {
                    $max_prcnt_obj = $this->input->post('max_prcnt');
                    $data['billing_costing']['max_prcnt'] = $max_prcnt_obj;
                }

                if(!empty($this->input->post('min_prcnt')))
                {
                    $min_prcnt_obj = $this->input->post('min_prcnt');
                    $data['billing_costing']['min_prcnt'] = $min_prcnt_obj;
                }


        		//print_r($data['billing_costing']);die;

                $this->template->write('title', 'Dashboard', TRUE);
                $this->template->add_js('assets/js/select2.min.js');
                $this->template->add_js('assets/js/bootstrap-select.js');
                $this->template->add_js('assets/js/bootstrap-datepicker.min.js');

                $this->template->add_css('assets/css/datepicker.css');
                $this->template->add_css('assets/css/select2.css');
                $this->template->add_css('assets/css/bootstrap-select.css');


                $this->template->write_view('content', 'add_billing_costing', $data, TRUE);
                $this->template->render();
             }
		 }

        $data['client'] = $this->bcm->ClientName($url_client_id);
		
		$data['mode'] = 'editable';
		if($data['client']->submit_for_approval == 1){
			$data['mode'] = 'readonly';
		}
		
        $data['list'] = $this->bcm->getBillingCostingList($url_client_id);
        //print_r($data['list']);die;

        $branch_obj = $this->bcm->get_all_branch($url_client_id);
       
        $branch_list = array('' => 'Select Branch');
        foreach($branch_obj as $branch){
            $branch_list[$branch->branch_id] = $branch->branch_name;
        }
        $data['branch'] = $branch_list;

        $post_obj = $this->bcm->get_all_post();
       
        $post_list = array('' => 'Select Post');
        foreach($post_obj as $post){
            $post_list[$post->head_id] = $post->head_name;
        }
        $data['post'] = $post_list;

        $designation_obj = $this->bcm->get_all_desig();
        $designation_list = array('' => 'Select Designation');
        foreach($designation_obj as $designation){
            $designation_list[$designation->desig_id] = $designation->desig_name;
        }
        $data['designation'] = $designation_list;

        $zone_obj = $this->bcm->get_all_zone();
        
        $zone_list = array('' => 'Select Zone');
        foreach($zone_obj as $zone){
            $zone_list[$zone->lookup_id] = $zone->lookup_desc;
        }
        $data['zone'] = $zone_list;

        $contract_Type_obj = $this->bcm->get_all_conType();
        
        $contract_type_list = array('' => 'Select Contract Type');
        foreach($contract_Type_obj as $contract_type){
            $contract_type_list[$contract_type->contract_type_id] = $contract_type->contract_type_name;
        }
        $data['contract_type'] = $contract_type_list;
		
        $data['pf_percentage'] = $this->bcm->get_pf_percentage();
        $data['esi_percentage'] = $this->bcm->get_esi_percentage();
        //print_r($data['pf_percentage']);die;
		
		//print_r($data);die;
		$this->template->write('title', 'Dashboard', TRUE);
		$this->template->add_js('assets/js/bootstrap-datepicker.js');
        $this->template->add_js('assets/js/select2.min.js');
        $this->template->add_js('assets/js/bootstrap-select.js');
		
		
		$this->template->add_css('assets/css/datepicker.css');
        $this->template->add_css('assets/css/select2.css');
        $this->template->add_css('assets/css/bootstrap-select.css');
        $this->template->write_view('content', 'add_billing_costing', $data, TRUE);
        $this->template->render();
	}

	public function salaryhead_list(){
    //echo "1";die;
		//$state_id = $this->input->post('state_id');
		$data['salaryhead_list'] = $this->bcm->getSalaryHeadName();
		echo json_encode(array('salaryhead_list' => $data['salaryhead_list'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}

    public function get_ptax(){
           $gross_pay = $this->uri->segment(3);
           $state_id = $this->uri->segment(4);
        //$gross_pay = $this->input->post('gross_pay');
        $ptax= $this->bcm->getPtax($gross_pay,$state_id);
        //print_r($data['ptax']);die;
        echo json_encode(array('ptax' => $ptax->ptax, 'status' => 1));
    }

      public function get_maxmin(){
           //$gross_pay = $this->uri->segment(3);
        //$gross_pay = $this->input->post('gross_pay');
        $maxmin= $this->bcm->getMaxmin();
        //print_r($data['ptax']);die;
        echo json_encode(array('max' => $maxmin->max_prcntg, 'min' => $maxmin->min_prcntg ,'status' => 1));
    }

    public function edit()
    {
        $client_id = $this->uri->segment(3);
        $billing_costing_id = $this->uri->segment(4);
        $data['billing_costing_id'] = $billing_costing_id;
        $data['client'] = $this->bcm->ClientName($client_id);
		
		$data['mode'] = 'editable';
		if($data['client']->submit_for_approval == 1){
			$data['mode'] = 'readonly';
		}
		
        $data['edit_billing_costing'] = $this->bcm->edit_billing_costing($client_id,$billing_costing_id);
        $data['edit_billing_costing_detail'] = $this->bcm->edit_billing_costing_detail($client_id,$billing_costing_id);
        $data['pf_percentage'] = $this->bcm->get_pf_percentage();
        $data['esi_percentage'] = $this->bcm->get_esi_percentage();

        $post_obj = $this->bcm->get_all_post();
       
        $post_list = array('' => 'Select Post');
        foreach($post_obj as $post){
            $post_list[$post->head_id] = $post->head_name;
        }
        $data['post'] = $post_list;

        $branch_obj = $this->bcm->get_all_branch($client_id);
       
        $branch_list = array('' => 'Select Branch');
        foreach($branch_obj as $branch){
            $branch_list[$branch->branch_id] = $branch->branch_name;
        }
        $data['branch'] = $branch_list;
        
        $designation_obj = $this->bcm->get_all_desig();
        $designation_list = array('' => 'Select Designation');
        foreach($designation_obj as $designation){
            $designation_list[$designation->desig_id] = $designation->desig_name;
        }
        $data['designation'] = $designation_list;

        $zone_obj = $this->bcm->get_all_zone();
        $zone_list = array('' => 'Select Zone');
        foreach($zone_obj as $zone){
            $zone_list[$zone->lookup_id] = $zone->lookup_desc;
        }
        $data['zone'] = $zone_list;

        $contract_Type_obj = $this->bcm->get_all_conType();
        
        $contract_type_list = array('' => 'Select Contract Type');
        foreach($contract_Type_obj as $contract_type){
            $contract_type_list[$contract_type->contract_type_id] = $contract_type->contract_type_name;
        }
        $data['contract_type'] = $contract_type_list;

        //print_r($data['contract_type']);die;

        $data['salaryhead_list'] = $this->bcm->getSalaryHeadName();

        if(!empty($this->input->post()))
        {

            $this->load->library("security");
            $this->form_validation->set_rules('client_name','Client Name','trim|required');
            $this->form_validation->set_rules('post_id','Post Name','required');
            $this->form_validation->set_rules('branch_id','Branch Name','required');
            $this->form_validation->set_rules('zone_id','Zone Name','required');
            $this->form_validation->set_rules('hsn_no','HSN No.','required');
            $this->form_validation->set_rules('commencement_date','Commencement Date','required');
            $this->form_validation->set_rules('contract_type','Contract Type','required');
            $this->form_validation->set_rules('status','Status','required');
            $this->form_validation->set_rules('bill_calculation_days','Bill Calculation Day','required|trim');
            $this->form_validation->set_rules('gross_pay','Gross Pay','required|trim');
            $this->form_validation->set_rules('person_number','No. of Person','required|trim');
            $this->form_validation->set_rules('duty_hrs','Duty Hrs','required|trim');
            $this->form_validation->set_rules('service_chrg_prcnt','Service Chrg Prcnt','trim|callback_service_chrg_check');
            $this->form_validation->set_rules('pf_wage','PF Wage','required');
            $this->form_validation->set_rules('esi_wage','ESI Wage','required');

            if ($this->form_validation->run() == TRUE)
            {
                    $client_id = $this->input->post('client_id');
                    $billing_costing_id = $this->input->post('billing_costing_id');
                    $post_id = $this->input->post('post_id');
                    $zone_id = $this->input->post('zone_id');
                    $commencement_date = $this->input->post('commencement_date');
                    $contract_type = $this->input->post('contract_type');
                    $status = $this->input->post('status');
                    $termination_date = $this->input->post('termination_date');
                    $bill_calculation_days = $this->input->post('bill_calculation_days');
                    $gross_pay = $this->input->post('gross_pay');
                    $hsn_no = $this->input->post('hsn_no');
                    $person_number = $this->input->post('person_number');
                    $duty_hrs = $this->input->post('duty_hrs');
                    $releiver_chrg = $this->input->post('releiver_chrg');
                    $monthly_ctc = $this->input->post('monthly_ctc');
                    $annual_ctc = $this->input->post('annual_ctc');
                    $round_off = $this->input->post('round_off');
                    $service_chrg_prcnt = $this->input->post('service_chrg_prcnt');
                    $total_bill_amt = $this->input->post('total_bill_amt');
                    $total_ctc_amt = $this->input->post('total_ctc_amt');
                    $gross_profit = $this->input->post('gross_profit');
                    $epf = $this->input->post('epf');
                    $esi = $this->input->post('esi');
                    $lwf = $this->input->post('lwf');
                    $ptax = $this->input->post('ptax');
                    $tot_dedn = $this->input->post('tot_dedn');
                    $net_pay = $this->input->post('net_pay');
                    $pay_hrs = $this->input->post('pay_hrs');
                    $ot_rate_type = $this->input->post('ot_rate_type');
                    $ot_rt = $this->input->post('ot_rt');
                    $esi_wage = $this->input->post('esi_wage');
                    $ot_esi_wage = $this->input->post('ot_esi_wage');
                    $pf_wage = $this->input->post('pf_wage');
                    $branch_id = $this->input->post('branch_id');

                    //detail

                    $head_id = $this->input->post('head_id');
                    $type_id = $this->input->post('type_id');
                    $rate = $this->input->post('rate');
                    $basis = $this->input->post('basis');
                    $limit = $this->input->post('limit');
                    $criteria = $this->input->post('criteria');
                    $periodicity = $this->input->post('periodicity');
                    $method = $this->input->post('method');
                    $detail_id = $this->input->post('detail_id');
                    $salary_head_amnt = $this->input->post('salary_head_amount');
                    //print_r($salary_head_amnt);die;

                    if($service_chrg_prcnt == '')
                    {
                        $service_chrg = $this->input->post('service_chrg');
                    }
                    else
                    {
                        $service_chrg = '';
                    }

                   $salary_type = $this->input->post('salary_type');
                   if($salary_type == 'd'){
                        $salary_days = $this->input->post('salary_days');
                   }
                   else{
                    $salary_days = '';
                   }

                    $qry = $this->bcm->UpdateBillingCosting($client_id,$billing_costing_id,$post_id,$zone_id,$commencement_date,$contract_type,$status,$termination_date,$bill_calculation_days,$gross_pay,$hsn_no,$person_number,$duty_hrs,$releiver_chrg,$monthly_ctc,$annual_ctc,$round_off,$service_chrg_prcnt,$service_chrg,$total_bill_amt,$total_ctc_amt,$gross_profit,$epf,$esi,$lwf,$ptax,$tot_dedn,$net_pay,$pay_hrs,$ot_rate_type,$ot_rt,$esi_wage,$ot_esi_wage,$pf_wage,$branch_id,$head_id,$type_id,$rate,$basis,$limit,$criteria,$periodicity,$method,$detail_id,$salary_head_amnt,$salary_type,$salary_days);
                    if($qry)
                    {
                        $this->session->set_flashdata('msg', 'Data Saved Successfully');
                        redirect(base_url().'billing_costing/edit/'.$client_id .'/'. $billing_costing_id);
                    }
            }
            else
            {
                    if(!empty($this->input->post('head_id')))
                    {
                        $head_obj = $this->input->post('head_id');
                        $data['billing_costing']['head_id'] = $head_obj;
                    }

                    if(!empty($this->input->post('type_id')))
                    {
                        $type_obj = $this->input->post('type_id');
                        $data['billing_costing']['type_id'] = $type_obj;
                    }

                    if(!empty($this->input->post('rate')))
                    {
                        $rate_obj = $this->input->post('rate');
                        $data['billing_costing']['rate'] = $rate_obj;
                    }

                    if(!empty($this->input->post('basis')))
                    {
                        $basis_obj = $this->input->post('basis');
                        $data['billing_costing']['basis'] = $basis_obj;
                    }

                    if(!empty($this->input->post('limit')))
                    {
                        $limit_obj = $this->input->post('limit');
                        $data['billing_costing']['limit'] = $limit_obj;
                    }

                    if(!empty($this->input->post('criteria')))
                    {
                        $criteria_obj = $this->input->post('criteria');
                        $data['billing_costing']['criteria'] = $criteria_obj;
                    }

                    if(!empty($this->input->post('periodicity')))
                    {
                        $periodicity_obj = $this->input->post('periodicity');
                        $data['billing_costing']['periodicity'] = $periodicity_obj;
                    }

                    if(!empty($this->input->post('method')))
                    {
                        $method_obj = $this->input->post('method');
                        $data['billing_costing']['method'] = $method_obj;
                    }

                    if(!empty($this->input->post('detail_id')))
                    {
                        $detail_obj = $this->input->post('detail_id');
                        $data['billing_costing']['detail_id'] = $detail_obj;
                    }

                    if(!empty($this->input->post('max_prcnt')))
                    {
                        $max_prcnt_obj = $this->input->post('max_prcnt');
                        $data['billing_costing']['max_prcnt'] = $max_prcnt_obj;
                    }

                    if(!empty($this->input->post('min_prcnt')))
                    {
                        $min_prcnt_obj = $this->input->post('min_prcnt');
                        $data['billing_costing']['min_prcnt'] = $min_prcnt_obj;
                    }


                    //print_r($data['billing_costing']);die;

                    $this->template->write('title', 'Dashboard', TRUE);
                    $this->template->add_js('assets/js/select2.min.js');
                    $this->template->add_js('assets/js/bootstrap-select.js');
                    $this->template->add_js('assets/js/bootstrap-datepicker.min.js');

                    $this->template->add_css('assets/css/datepicker.css');
                    $this->template->add_css('assets/css/select2.css');
                    $this->template->add_css('assets/css/bootstrap-select.css');


                    $this->template->write_view('content', 'edit_billing_costing', $data, TRUE);
                    $this->template->render();
            }
        }
        // echo "<pre>";
        // print_r($data);
        // echo "<pre>";
        // die();
        $this->template->write('title', 'Dashboard', TRUE);
        $this->template->add_js('assets/js/select2.min.js');
        $this->template->add_js('assets/js/bootstrap-select.js');
        $this->template->add_js('assets/js/bootstrap-datepicker.min.js');
        
        $this->template->add_css('assets/css/select2.css');
        $this->template->add_css('assets/css/bootstrap-select.css');
        $this->template->add_css('assets/css/datepicker.css');
        $this->template->write_view('content', 'edit_billing_costing', $data, TRUE);
        $this->template->render();  
    }

    public function service_chrg_check($str)
    {
        $service_chrg_prcnt = $this->input->post('service_chrg_prcnt');
        $service_chrg = $this->input->post('service_chrg');

        if($service_chrg_prcnt != '' && $service_chrg !='')
        {
            $this->form_validation->set_message('service_chrg_check', 'Please choose any one of the field {field} and Service Chrg ');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    public function checkHeader()
    {
        $status = $this->input->post('status');
        $desig_name = $this->input->post('desig_name');
        $commencement_date = $this->input->post('commencement_date');
        $client_id = $this->input->post('client_id');
        $branch_id = $this->input->post('branch_id');
        
        $checkHeader = $this->bcm->checkHeader($status,$desig_name,$commencement_date,$client_id,$branch_id);
        echo json_encode(array('cnt' => $checkHeader->cnt, 'status' => 1, 'newHash' => $this->security->get_csrf_hash()));
    }
	
}

?>


