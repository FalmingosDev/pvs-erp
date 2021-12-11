<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends MY_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
        $this->load->library("session");
		$this->load->model('client_model','cm');
		$this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->form_validation->CI =& $this;
		$this->load->library('user_agent');
	}
	
	public function index() {
		if(check_uri_permission('client', 'V') == 0){
			$this->session->set_flashdata('error_msg', 'You have no permission on this page');
			redirect(base_url());
		}
		$data = [];
		//$data['list'] = $this->cm->client_list();
		//echo "<pre>"; print_r($data['list']); exit();
		$this->template->write('title', 'Client', TRUE);
        /**
         * 
         * 
         * if you have any css to add for this page
         */
		//pr($data);  

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
	
	public function ajax_client_list() 
    {
		$clients = $this->cm->client_list();
		$approval_level = $this->cm->getApprovalLevel($this->session->user_id);
		$client_list = array();
		$i = -1;
		$tmp_client_id = NULL;
        //pr($clients);
		foreach($clients as $client)
        {
            if($client->approval_remarks_1 !='Approved' && $client->approval_remarks_2 !='Approved')
            {
			// Main Client info
			if($tmp_client_id != $client->client_id){
				$i++;
				$status = '';
				if($client->active_status == 1){
					$status_txt = 'Active';
					$status_title = 'Mark as Inactive';
				}
				else{
					$status_txt = 'Inactive';
					$status_title = 'Mark as Active';
				}
				$status = $status_txt . ' <label class="switch" title="' . $status_title . '"> <input type="checkbox"' . (($client->active_status == 1) ? ' checked="checked"' : '') . ' onclick="if(confirm(\'Are you sure want to change the status?\')){ window.location.assign(\'' . base_url('client/change_status/'.$client->client_id.'/'.$client->active_status) . '\'); } else{ return false; }"> <span class="switch-slider round"></span> </label>';
				$approved_by = '';
				if(!empty($client->approval_level_1)){
					if($client->approval_status_1 == 'A'){
						$approved_by .= 'Approved level 1: ' . $client->approval_level_1;
					}
					else if($client->approval_status_1 == 'R'){
						$approved_by .= 'Rejected level 1: ' . $client->approval_level_1;
					}
				}
				if(!empty($client->approval_level_2)){
					$approved_by .= '<br />';
					if($client->approval_status_2 == 'A'){
						$approved_by .= 'Approved level 2: ' . $client->approval_level_2;
					}
					else if($client->approval_status_2 == 'R'){
						$approved_by .= 'Rejected level 2: ' . $client->approval_level_2;
					}
				}
				$buttons = '<a class="vd-ed-2" href="' . base_url("client/edit/" . $client->client_id) . '"><i class="fa fa-eye" aria-hidden="true"></i></a> &nbsp; <a class="vd-ed-2" href="' . base_url("client/edit/" . $client->client_id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
				if(($client->approval_status_1 . $client->approval_status_2) != 'AA' && !empty($approval_level->my_approval_level)){
					$buttons .= ' &nbsp; <a class="vd-ed-2" href="' . base_url("client/approve/" . $client->client_id) . '"> Approve</a>';
				}
				$client_list[$i] = array(
					'client_id' => $client->client_id, 'client_code' => $client->client_code, 'client_name' =>  $client->client_name, 
					'contract_period' => date('d/m/Y', strtotime($client->agreement_start_date)) . ' <br />to <br />' . date('d/m/Y', strtotime($client->agreement_end_date)), 'approved_by' => $approved_by, 'address' => $client->address, 'contact_no' => $client->contact_no, 'location_type' => $client->location_type, 
					'buttons' => $buttons, 
					'status' => $status, 
					'sales_billing' => array(), 'branch' => array(), 'billing_costing' => array()
				);
			}
			//	Sales - Billing info
			if($client->sales_billing_id != 0){
				$client_list[$i]['sales_billing'][$client->sales_billing_id] = array('sales_billing_id' => $client->sales_billing_id, 'contact_name' => $client->contact_name, 'contact_address_1' => $client->contact_address_1, 'bill_type' => $client->bill_type);
			}
			//	Branch info
			if($client->branch_id != 0){
				$client_list[$i]['branch'][$client->branch_id] = array('branch_id' => $client->branch_id, 'branch_name' => $client->branch_name, 'branch_address' => $client->branch_address, 'sole_id' => $client->sole_id);
			}
			//	Billing & Costing Sheet info
			if($client->billing_costing_cost_id != 0){
				$client_list[$i]['billing_costing'][$client->billing_costing_cost_id] = array('billing_costing_cost_id' => $client->billing_costing_cost_id, 'desig_short_name' => $client->desig_short_name, 'gross_pay' => number_format((float) $client->gross_pay, 2, '.', ''), 'monthly_ctc' => number_format((float) $client->monthly_ctc, 2, '.', ''), 'annual_ctc' => number_format((float) $client->annual_ctc, 2, '.', ''), 'total_bill_amt' => number_format((float) $client->total_bill_amt, 2, '.', ''), 'gross_profit' => number_format((float) $client->gross_profit, 2, '.', ''), 'billing_status' => $client->billing_status);
			}
			//	increment the variable if client change
			$tmp_client_id = $client->client_id;
            }
		}
		
		header('Content-Type: application/json');
        //pr($client_list);
		//exit(json_encode($clients));
		exit(json_encode(array('data' => $client_list)));
	}

	public function add(){
		if(check_uri_permission('client', 'A') == 0){
			$this->session->set_flashdata('error_msg', 'You have no permission on this page');
			redirect(base_url());
		}
		if(!empty($this->input->post())){
			$this->form_validation->set_rules('client_name','Client Name','trim|required|callback_client_name_check');
            $this->form_validation->set_rules('client_code','Client Code','trim|required|callback_client_code_check');
            $this->form_validation->set_rules('old_client_code','Old Client Code','trim');
			$this->form_validation->set_rules('address_line_1','Address Line 1','trim|required');
			$this->form_validation->set_rules('agreemnt_start_date','Agreement Start Date','required');
			$this->form_validation->set_rules('type_id','Type Name','required');
			$this->form_validation->set_rules('rating_id','Rating Name','required');
			$this->form_validation->set_rules('state_id','State Name','required');
			$this->form_validation->set_rules('location','Location','required');
			$this->form_validation->set_rules('city_id','City Name','required');
			$this->form_validation->set_rules('tel_nos','Telephone Number','trim|required');
			$this->form_validation->set_rules('pincode','Pincode','required');
			//$this->form_validation->set_rules('foundation_day','Foundation Day','required');
			$this->form_validation->set_rules('client_email','Client Email','trim|required');
			$this->form_validation->set_rules('mw_type_id','MW Type Name','required');
			$this->form_validation->set_rules('source_id','Source Name','required');
			$this->form_validation->set_rules('contract_status_id','Contract Status','required');
            //$this->form_validation->set_rules('source_ref','Source Reference','trim|required');
			$this->form_validation->set_rules('billing_method','Billing Method','required');


			$this->form_validation->set_rules('name[]','Contact Name','trim|required');
			$this->form_validation->set_rules('designation[]','Contact Designation','trim|required');
			$this->form_validation->set_rules('contact_no[]','Contact Phone Number','trim|required');
			$this->form_validation->set_rules('email[]','Contact Email','trim|required');
			//$this->form_validation->set_rules('birthday[]','Contact Birthday','trim|required');
			//$this->form_validation->set_rules('anniversary[]','Contact Anniversary','trim');
            if ($this->form_validation->run() == TRUE)
            {
                $client_name = $this->input->post('client_name');
                $client_code = $this->input->post('client_code');
                $old_client_code = $this->input->post('old_client_code');
                $address_line_1 = $this->input->post('address_line_1');
                $agreemnt_start_date = $this->input->post('agreemnt_start_date');
                $agreemnt_end_date = $this->input->post('agreemnt_end_date');
                $address_line_2 = $this->input->post('address_line_2');
                $type_id = $this->input->post('type_id');
                $address_line_3 = $this->input->post('address_line_3');
                $rating_id = $this->input->post('rating_id');
                $state_id = $this->input->post('state_id');
                $location = $this->input->post('location');
                $city_id = $this->input->post('city_id');
                $tel_nos = $this->input->post('tel_nos');
                $pincode = $this->input->post('pincode');
                $fax = $this->input->post('fax');
                $foundation_day = $this->input->post('foundation_day');
                $client_email = $this->input->post('client_email');
                $mw_type_id = $this->input->post('mw_type_id');
                $website = $this->input->post('website');
                $source_id = $this->input->post('source_id');
                $contract_status_id = $this->input->post('contract_status_id');
                $source_ref = $this->input->post('source_ref');
                $name = $this->input->post('name');
                $designation = $this->input->post('designation');
                $contact_no = $this->input->post('contact_no');
                $email = $this->input->post('email');
                $birthday = $this->input->post('birthday');
                //print_r($birthday);die;
                $anniversary = $this->input->post('anniversary');
                $remarks = $this->input->post('remarks');
                $billing_method = $this->input->post('billing_method');
                // $new_birthday = date("Y-m-d", strtotime($birthday));
                 //print_r($name);die;
                
                $qry = current($this->cm->insertClient($client_name,$client_code,$old_client_code,$address_line_1,$agreemnt_start_date,$agreemnt_end_date,$address_line_2,$type_id,$address_line_3,$rating_id,$state_id,$location,$city_id,$tel_nos,$pincode,$fax,$foundation_day,$client_email,$mw_type_id,$website,$source_id,$contract_status_id,$source_ref,$name,$designation,$contact_no,$email,$birthday,$anniversary,$remarks,$billing_method));

                $client_id = $qry['client_id'];
                if($client_id)
                {
                    $this->session->set_flashdata('msg', 'Data Saved Successfully');
                    redirect(base_url().'client/edit/'.$client_id);
                }
                
            }
            else{
                
                if(!empty($this->input->post('name')))
                {
                    $name_obj = $this->input->post('name');
                    $data['client_contact']['name'] = $name_obj;
                }

                if(!empty($this->input->post('designation')))
                {
                    $designation_obj = $this->input->post('designation');
                    $data['client_contact']['designation'] = $designation_obj;
                }

                if(!empty($this->input->post('contact_no')))
                {
                    $contact_no_obj = $this->input->post('contact_no');
                    $data['client_contact']['contact_no'] = $contact_no_obj;
                }

                if(!empty($this->input->post('email')))
                {
                    $email_obj = $this->input->post('email');
                    $data['client_contact']['email'] = $email_obj;
                }

                if(!empty($this->input->post('birthday')))
                {
                    $birthday_obj = $this->input->post('birthday');
                    $data['client_contact']['birthday'] = $birthday_obj;
                }

                if(!empty($this->input->post('anniversary')))
                {
                    $anniversary_obj = $this->input->post('anniversary');
                    $data['client_contact']['anniversary'] = $anniversary_obj;
                }

                //print_r($data['client_contact']);

                $this->template->write('title', 'Dashboard', TRUE);
                $this->template->add_js('assets/js/select2.min.js');
                $this->template->add_js('assets/js/bootstrap-select.js');
                $this->template->add_js('assets/js/bootstrap-datepicker.min.js');

                $this->template->add_css('assets/css/datepicker.css');
                $this->template->add_css('assets/css/select2.css');
                $this->template->add_css('assets/css/bootstrap-select.css');


                $this->template->write_view('content', 'add_client', $data, TRUE);
                $this->template->render();
            }
		}

		$type_obj = $this->cm->get_all_type();
        $type_list = array('' => 'Select Type');
        foreach($type_obj as $type){
            $type_list[$type->industry_type_id] = $type->industry_type_name;
        }
        $data['type'] = $type_list;

        $rate_obj = $this->cm->get_all_rating();
        $rate_list = [];
        $rate_list = array('' => 'Select Rating');
        foreach($rate_obj as $rate){
            $rate_list[$rate->rating_id] = $rate->rating_short_name;
        }
        $data['rating'] = $rate_list;
		
        $state_obj = $this->cm->get_all_state();
        $state_list = array('' => 'Select State');
        foreach($state_obj as $state){
            $state_list[$state->state_id] = $state->state_name;
        }
        $data['state'] = $state_list;
        $city_list = array('' => 'Select City');
		
        if(!empty($this->input->post('state_id'))){
            $city_obj = $this->cm->getCity($this->input->post('state_id'));

           foreach($city_obj as $city){
                $city_list[$city['city_id']] = $city['city_name'];
            }
            

        }

        $data['city'] = $city_list;

        $mw_type_obj = $this->cm->get_all_mwType();
        $mwType_list = array('' => 'Select MW Type');
        foreach($mw_type_obj as $mw_type){
            $mwType_list[$mw_type->mw_type_id] = $mw_type->mw_type_name;
        }
        $data['mw_type'] = $mwType_list;

        $source_obj = $this->cm->get_all_source();
        $source_list = array('' => 'Select Source');
        foreach($source_obj as $source){
            $source_list[$source->source_id] = $source->source_name;
        }
        $data['source'] = $source_list;

        $contract_status_obj = $this->cm->get_all_contractStatus();
        $contract_status_list = array('' => 'Select Contact Status');
        foreach($contract_status_obj as $contract_status){
            $contract_status_list[$contract_status->contract_status_id] = $contract_status->contract_status_name;
        }
        $data['contract_status'] = $contract_status_list;

        $data['client_code']= $this->cm->getClientCode();

                //$this->template->write_view('content', 'add_client', $data, TRUE);
                //$this->template->render();
		
        $this->template->write('title', 'Dashboard', TRUE);
		$this->template->add_js('assets/js/select2.min.js');
        $this->template->add_js('assets/js/bootstrap-select.js');
        $this->template->add_js('assets/js/bootstrap-datepicker.min.js');

        $this->template->add_css('assets/css/datepicker.css');
		$this->template->add_css('assets/css/select2.css');
        $this->template->add_css('assets/css/bootstrap-select.css');


        $this->template->write_view('content', 'add_client', $data, TRUE);
        $this->template->render();
	}

	public function city_list(){
		$state_id = $this->input->post('state_id');
		$data['city_list'] = $this->cm->getCity($state_id);
		echo json_encode(array('city_list' => $data['city_list'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}

    public function edit($id = null)
    {
        if(check_uri_permission('client', 'E') == 0){
			$this->session->set_flashdata('error_msg', 'You have no permission on this page');
			redirect(base_url());
		}
		$data['client'] = $this->cm->editclient($id);
        $data['edit_client_contact'] = $this->cm->editclientContact($id);

        $type_obj = $this->cm->get_all_type();
        $type_list = array();
        foreach($type_obj as $type){
            $type_list[$type->industry_type_id] = $type->industry_type_name;
        }
        //print_r($type_list);
        $data['type'] = $type_list;

        $rate_obj = $this->cm->get_all_rating();
        $rate_list = array();
        foreach($rate_obj as $rate){
            $rate_list[$rate->rating_id] = $rate->rating_short_name;
        }
        $data['rating'] = $rate_list;

        $state_obj = $this->cm->get_all_state();
        $state_list = array('' => 'Select State');
        foreach($state_obj as $state){
            $state_list[$state->state_id] = $state->state_name;
        }
        $data['state'] = $state_list;

        $state_id = ($data['client']->state_id);

        $city_list = array('' => 'Select City');
        if(!empty($this->input->post('state_id'))){
            $city_obj = $this->cm->getCity($this->input->post('state_id'));

           foreach($city_obj as $city){
                $city_list[$city['city_id']] = $city['city_name'];
            }
            

        }
        else
        {
            $city_obj = $this->cm->get_city($state_id);
            
            foreach($city_obj as $city){
                $city_list[$city->city_id] = $city->city_name;
            }
        }


        $data['city'] = $city_list;
        
        $mw_type_obj = $this->cm->get_all_mwType();
        $mw_type_list = array();
        foreach($mw_type_obj as $mw_type){
            $mw_type_list[$mw_type->mw_type_id] = $mw_type->mw_type_name;
        }
        $data['mw_type'] = $mw_type_list;

        $source_obj = $this->cm->get_all_source();
        $source_list = array();
        foreach($source_obj as $source){
            $source_list[$source->source_id] = $source->source_name;
        }
        $data['source'] = $source_list;

        $contract_status_obj = $this->cm->get_all_contractStatus();
        $contractStatus_list = array();
        foreach($contract_status_obj as $contractStatus){
            $contractStatus_list[$contractStatus->contract_status_id] = $contractStatus->contract_status_name;
        }
        $data['contract_status'] = $contractStatus_list;
        //$data['contract_status'] = $this->cm->get_all_contractStatus();

        if(!empty($this->input->post())){
			$this->load->library("security");
			$this->form_validation->set_rules('client_name','Client Name','trim|required|callback_client_name_check');
            $this->form_validation->set_rules('client_code','Client Code','trim|required|callback_client_code_check');
            $this->form_validation->set_rules('old_client_code','Old Client Code','trim');
			$this->form_validation->set_rules('address_line_1','Address Line 1','trim|required');
			$this->form_validation->set_rules('agreemnt_start_date','Agreement Start Date','required');
			$this->form_validation->set_rules('type_id','Type Name','required');
			$this->form_validation->set_rules('rating_id','Rating Name','required');
			$this->form_validation->set_rules('state_id','State Name','required');
			$this->form_validation->set_rules('location','Location','required');
			$this->form_validation->set_rules('city_id','City Name','required');
			$this->form_validation->set_rules('tel_nos','Telephone Number','trim|required');
			$this->form_validation->set_rules('pincode','Pincode','required');
			//$this->form_validation->set_rules('foundation_day','Foundation Day','required');
			$this->form_validation->set_rules('client_email','Client Email','trim|required');
			$this->form_validation->set_rules('mw_type_id','MW Type Name','required');
			$this->form_validation->set_rules('source_id','Source Name','required');
			$this->form_validation->set_rules('contract_status_id','Contract Status','required');
            //$this->form_validation->set_rules('source_ref','Source Reference','trim|required');
			$this->form_validation->set_rules('billing_method','Billing Method','required');

			$this->form_validation->set_rules('name[]','Contact Name','trim|required');
			$this->form_validation->set_rules('designation[]','Contact Designation','trim|required');
			$this->form_validation->set_rules('contact_no[]','Contact Phone Number','trim|required');
			$this->form_validation->set_rules('email[]','Contact Email','trim|required');
			//$this->form_validation->set_rules('birthday[]','Contact Birthday','trim|required');
			//$this->form_validation->set_rules('anniversary[]','Contact Anniversary','trim');

			if ($this->form_validation->run() == TRUE){
                $client_id = $this->input->post('client_id');
                $client_name = $this->input->post('client_name');
                $client_code = $this->input->post('client_code');
                $old_client_code = $this->input->post('old_client_code');
                $address_line_1 = $this->input->post('address_line_1');
                $agreemnt_start_date = $this->input->post('agreemnt_start_date');
                $agreemnt_end_date = $this->input->post('agreemnt_end_date');
                $address_line_2 = $this->input->post('address_line_2');
                $type_id = $this->input->post('type_id');
                $address_line_3 = $this->input->post('address_line_3');
                $rating_id = $this->input->post('rating_id');
                $state_id = $this->input->post('state_id');
                $location = $this->input->post('location');
                $city_id = $this->input->post('city_id');
                $tel_nos = $this->input->post('tel_nos');
                $pincode = $this->input->post('pincode');
                $fax = $this->input->post('fax');
                $foundation_day = $this->input->post('foundation_day');
                $client_email = $this->input->post('client_email');
                $mw_type_id = $this->input->post('mw_type_id');
                $website = $this->input->post('website');
                $source_id = $this->input->post('source_id');
                $contract_status_id = $this->input->post('contract_status_id');
                $source_ref = $this->input->post('source_ref');
                $name = $this->input->post('name');
                $designation = $this->input->post('designation');
                $contact_no = $this->input->post('contact_no');
                $email = $this->input->post('email');
                $birthday = $this->input->post('birthday');
                $anniversary = $this->input->post('anniversary');
                $remarks = $this->input->post('remarks');
                $detail_id = $this->input->post('contact_id');
                $action = $this->input->post('action');
                $billing_method = $this->input->post('billing_method');
				
                $qry = $this->cm->UpdateClient($client_id,$client_name,$client_code,$old_client_code,$address_line_1,$agreemnt_start_date,$agreemnt_end_date,$address_line_2,$type_id,$address_line_3,$rating_id,$state_id,$location,$city_id,$tel_nos,$pincode,$fax,$foundation_day,$client_email,$mw_type_id,$website,$source_id,$contract_status_id,$source_ref,$name,$designation,$contact_no,$email,$birthday,$anniversary,$remarks,$detail_id, $action, $billing_method);
                if($qry)
                {
                    $this->session->set_flashdata('msg', 'Data Saved Successfully');
                    redirect(base_url().'client/edit/'.$client_id);
                }
            }
            else
            {
                if(!empty($this->input->post('name')))
                {
                    $name_obj = $this->input->post('name');
                    $data['client_contact']['name'] = $name_obj;
                }

                if(!empty($this->input->post('designation')))
                {
                    $designation_obj = $this->input->post('designation');
                    $data['client_contact']['designation'] = $designation_obj;
                }

                if(!empty($this->input->post('contact_no')))
                {
                    $contact_no_obj = $this->input->post('contact_no');
                    $data['client_contact']['contact_no'] = $contact_no_obj;
                }

                if(!empty($this->input->post('email')))
                {
                    $email_obj = $this->input->post('email');
                    $data['client_contact']['email'] = $email_obj;
                }

                if(!empty($this->input->post('birthday')))
                {
                    $birthday_obj = $this->input->post('birthday');
                    $data['client_contact']['birthday'] = $birthday_obj;
                }

                if(!empty($this->input->post('anniversary')))
                {
                    $anniversary_obj = $this->input->post('anniversary');
                    $data['client_contact']['anniversary'] = $anniversary_obj;
                }

                if(!empty($this->input->post('contact_id')))
                {
                    $contact_id_obj = $this->input->post('contact_id');
                    $data['client_contact']['contact_id'] = $contact_id_obj;
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
		
		$data['action_type'] = 'edit';
		$data['mode'] = 'editable';
		if($data['client']->submit_for_approval == 1){
			$data['mode'] = 'readonly';
		}
		
		$data['others_info'] = $this->cm->client_others_info($data['client']->client_id);
		//pr($data);
        $this->template->write('title', 'Dashboard', TRUE);
		$this->template->add_js('assets/js/custom_functions.js');
		$this->template->add_js('assets/js/select2.min.js');
		$this->template->add_js('assets/js/bootstrap-select.js');
        $this->template->add_js('assets/js/bootstrap-datepicker.min.js');
        
		$this->template->add_css('assets/css/select2.css');
		$this->template->add_css('assets/css/bootstrap-select.css');
        $this->template->add_css('assets/css/datepicker.css');
        $this->template->write_view('content', 'edit_client', $data, TRUE);
        $this->template->render();  
    }
	
	public function approve($id = null) {
        $data['client'] = $this->cm->editclient($id);
        $data['edit_client_contact'] = $this->cm->editclientContact($id);

        $type_obj = $this->cm->get_all_type();
        $type_list = array();
        foreach($type_obj as $type){
            $type_list[$type->industry_type_id] = $type->industry_type_name;
        }
        //print_r($type_list);
        $data['type'] = $type_list;

        $rate_obj = $this->cm->get_all_rating();
        $rate_list = array();
        foreach($rate_obj as $rate){
            $rate_list[$rate->rating_id] = $rate->rating_short_name;
        }
        $data['rating'] = $rate_list;

        $state_obj = $this->cm->get_all_state();
        $state_list = array('' => 'Select State');
        foreach($state_obj as $state){
            $state_list[$state->state_id] = $state->state_name;
        }
        $data['state'] = $state_list;

        $state_id = ($data['client']->state_id);

        $city_list = array('' => 'Select City');
        if(!empty($this->input->post('state_id'))){
            $city_obj = $this->cm->getCity($this->input->post('state_id'));

           foreach($city_obj as $city){
                $city_list[$city['city_id']] = $city['city_name'];
            }
            

        }
        else
        {
            $city_obj = $this->cm->get_city($state_id);
            
           foreach($city_obj as $city){
                $city_list[$city->city_id] = $city->city_name;
            }
        }


        $data['city'] = $city_list;
        
        $mw_type_obj = $this->cm->get_all_mwType();
        $mw_type_list = array();
        foreach($mw_type_obj as $mw_type){
            $mw_type_list[$mw_type->mw_type_id] = $mw_type->mw_type_name;
        }
        $data['mw_type'] = $mw_type_list;

        $source_obj = $this->cm->get_all_source();
        $source_list = array();
        foreach($source_obj as $source){
            $source_list[$source->source_id] = $source->source_name;
        }
        $data['source'] = $source_list;

        $contract_status_obj = $this->cm->get_all_contractStatus();
        $contractStatus_list = array();
        foreach($contract_status_obj as $contractStatus){
            $contractStatus_list[$contractStatus->contract_status_id] = $contractStatus->contract_status_name;
        }
        $data['contract_status'] = $contractStatus_list;
        //$data['contract_status'] = $this->cm->get_all_contractStatus();

        if(!empty($this->input->post())){
			$this->load->library("security");
			//exit($this->input->post('action'));
			$this->form_validation->set_rules('approval_remarks','Approve/ Reject Remarks','trim|required');
			if ($this->form_validation->run() == TRUE){
				$client_id = $this->input->post('client_id');
				$approval_level = $this->input->post('approval_level');
				$approval_remarks = $this->input->post('approval_remarks');
				$action = $this->input->post('action');
				//exit($action);
				
				$qry = $this->cm->updateClientApproval($client_id, $approval_level, $approval_remarks, $action);
				if($qry) {
					$this->session->set_flashdata('msg', 'Successfully Updated');
					redirect(base_url().'client/approve/'.$client_id);
				}
			}
        }
		
		$data['action_type'] = 'approve';
		$data['mode'] = 'editable';
		if($data['client']->submit_for_approval == 1){
			$data['mode'] = 'readonly';
		}
		$data['approval_level'] = $this->cm->getApprovalLevel($this->session->user_id);
		
        $this->template->write('title', 'Dashboard', TRUE);
		$this->template->add_js('assets/js/custom_functions.js');
		$this->template->add_js('assets/js/select2.min.js');
		$this->template->add_js('assets/js/bootstrap-select.js');
        $this->template->add_js('assets/js/bootstrap-datepicker.min.js');
        
		$this->template->add_css('assets/css/select2.css');
		$this->template->add_css('assets/css/bootstrap-select.css');
        $this->template->add_css('assets/css/datepicker.css');
        $this->template->write_view('content', 'edit_client', $data, TRUE);
        $this->template->render();  
    }
	
	public function change_status($id, $status){

    	if(check_uri_permission('client', 'D') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        } 

        $this->cm->change_status($id,$status);
        redirect('client','refresh');
    }
	
    public function client_name_check($str) {
  
		$str = $this->input->post('client_name');

		$client_id = NULL;
		if(!empty($this->input->post('client_id'))){
			$client_id = $this->input->post('client_id');
		}

		$check = $this->cm->checkClient($str,$client_id);
		if($check)
		{
			$this->form_validation->set_message('client_name_check', 'The {field} field can not be the word ' . $str);
			return FALSE;
		}
		else
		{
			return TRUE;
		}
    }

    public function client_code_check($str) {
  
		$str = $this->input->post('client_code');

		$client_id = NULL;
		if(!empty($this->input->post('client_id'))){
			$client_id = $this->input->post('client_id');
		}

		$check = $this->cm->checkClientCode($str,$client_id);
		if($check)
		{
			$this->form_validation->set_message('client_code_check', 'The {field} field can not be the word ' . $str);
			return FALSE;
		}
		else
		{
			return TRUE;
		}
    }

    public function refresh_city_list(){
        $state_id = $this->uri->segment(3);
        $data['city_list'] = $this->cm->getCity($state_id);
        echo json_encode(array('city_list' => $data['city_list'],'status' => 1));
    }
	
}

?>
