<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
            redirect('login');
        }
        $this->load->model('client_model','cm');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->form_validation->CI =& $this;
    }
    
    public function index()
    {
        $data = [];
        //$data['list'] = $this->cm->client_list();
        //echo "<pre>"; print_r($data['list']); exit();
        $this->template->write('title', 'Client', TRUE);
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
    
    public function ajax_client_list()
    {
        $clients = $this->cm->client_list();
        $client_list = [];
        $i = 0;
        $tmp_client_id = NULL;
        foreach($clients as $client){
            // Main Client info
            if($tmp_client_id != $client->client_id){
                $client_list[$i] = array(
                    'client_id' => $client->client_id, 'client_code' => $client->client_code, 'client_name' =>  $client->client_name, 
                    'contract_period' => $client->agreement_start_date . ' to ' . $client->agreement_end_date, 'approved_by' => '', 
                    'buttons' => '<a class="vd-ed-1" href="#"><i class="fa fa-eye" aria-hidden="true"></i></a><a class="vd-ed-2" href="' . base_url("client/edit/" . $client->client_id) . '"><i class="fa fa-pencil" aria-hidden="true"></i></a><a class="vd-ed-1" href="#"> Approve</a>'
                );
            }
            //  Sales - Billing info
            if($client->sales_billing_id != 0){
                $client_list[$i]['sales_billing'][] = array('sales_billing_id' => $client->sales_billing_id, 'contact_location' => $client->contact_location, 'bill_type' => $client->bill_type);
            }
            //  Branch info
            if($client->branch_id != 0){
                $client_list[$i]['branch'][] = array('branch_id' => $client->branch_id, 'branch_name' => $client->branch_name, 'sole_id' => $client->sole_id);
            }
            //  Billing & Costing Sheet info
            if($client->billing_costing_cost_id != 0){
                $client_list[$i]['billing_costing'][] = array('billing_costing_cost_id' => $client->billing_costing_cost_id, 'post_id' => $client->post_id, 'gross_pay' => $client->gross_pay);
            }
            //  increment the variable if client change
            if($tmp_client_id != $client->client_id){
                $i++;
            }
            $tmp_client_id = $client->client_id;
        }
        
        header('Content-Type: application/json');
        //exit(json_encode($clients));
        exit(json_encode(array('data' => $client_list)));
    }

    public function add(){

        if(!empty($this->input->post())){
             $this->form_validation->set_rules('client_name','Client Name','trim|required|callback_client_name_check');
             $this->form_validation->set_rules('address_line_1','Address Line 1','trim|required');
             $this->form_validation->set_rules('agreemnt_start_date','Agreement Start Date','required');
             $this->form_validation->set_rules('type_id','Type Name','required');
             $this->form_validation->set_rules('rating_id','Rating Name','required');
             $this->form_validation->set_rules('state_id','State Name','required');
             $this->form_validation->set_rules('location','Location','required');
             $this->form_validation->set_rules('city_id','City Name','required');
             $this->form_validation->set_rules('tel_nos','Telephone Number','trim|required');
             $this->form_validation->set_rules('foundation_day','Foundation Day','required');
             $this->form_validation->set_rules('client_email','Client Email','trim|required');
             $this->form_validation->set_rules('mw_type_id','MW Type Name','required');
             $this->form_validation->set_rules('source_id','Source Name','required');
             $this->form_validation->set_rules('contract_status_id','Contract Status','required');
             $this->form_validation->set_rules('source_ref','Source Reference','trim|required');
             $this->form_validation->set_rules('name[]','Contact Name','trim|required');
             $this->form_validation->set_rules('designation[]','Contact Designation','trim|required');
             $this->form_validation->set_rules('contact_no[]','Contact Phone Number','trim|required');
             $this->form_validation->set_rules('email[]','Contact Email','trim|required');
             $this->form_validation->set_rules('birthday[]','Contact Birthday','trim|required');
             $this->form_validation->set_rules('anniversary[]','Contact Anniversary','trim|required');
            if ($this->form_validation->run() == TRUE)
             {
                $client_name = $this->input->post('client_name');
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
                // $new_birthday = date("Y-m-d", strtotime($birthday));
                 //print_r($name);die;
                
                $this->cm->insertClient($client_name,$address_line_1,$agreemnt_start_date,$agreemnt_end_date,$address_line_2,$type_id,$address_line_3,$rating_id,$state_id,$location,$city_id,$tel_nos,$pincode,$fax,$foundation_day,$client_email,$mw_type_id,$website,$source_id,$contract_status_id,$source_ref,$name,$designation,$contact_no,$email,$birthday,$anniversary,$remarks);
                redirect('client', 'refresh');
             }
             else{
                 $this->load->view('add_client');
             }
        }

        $data['type'] = $this->cm->get_all_type();
        $data['rating'] = $this->cm->get_all_rating();
        $data['state'] = $this->cm->get_all_state();
        $data['mw_type'] = $this->cm->get_all_mwType();
        $data['source'] = $this->cm->get_all_source();
        $data['contract_status'] = $this->cm->get_all_contractStatus();
        //print_r($data);die;
        $this->template->write('title', 'Dashboard', TRUE);
        $this->template->add_js('assets/js/select2.min.js');
        $this->template->add_js('assets/js/bootstrap-select.js');
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

    public function edit()
    {
        $this->load->library("security");


        if(!empty($this->input->post())){
            $this->form_validation->set_rules('client_name','Client Name','trim|required|callback_client_name_check');
            $this->form_validation->set_rules('address_line_1','Address Line 1','trim|required');
            $this->form_validation->set_rules('agreemnt_start_date','Agreement Start Date','required');
            $this->form_validation->set_rules('type_id','Type Name','required');
            $this->form_validation->set_rules('rating_id','Rating Name','required');
            $this->form_validation->set_rules('state_id','State Name','required');
            $this->form_validation->set_rules('location','Location','required');
            $this->form_validation->set_rules('city_id','City Name','required');
            $this->form_validation->set_rules('tel_nos','Telephone Number','trim|required');
            $this->form_validation->set_rules('foundation_day','Foundation Day','required');
            $this->form_validation->set_rules('client_email','Client Email','trim|required');
            $this->form_validation->set_rules('mw_type_id','MW Type Name','required');
            $this->form_validation->set_rules('source_id','Source Name','required');
            $this->form_validation->set_rules('contract_status_id','Contract Status','required');
            $this->form_validation->set_rules('source_ref','Source Reference','trim|required');
            $this->form_validation->set_rules('name[]','Contact Name','trim|required');
            $this->form_validation->set_rules('designation[]','Contact Designation','trim|required');
            $this->form_validation->set_rules('contact_no[]','Contact Phone Number','trim|required');
            $this->form_validation->set_rules('email[]','Contact Email','trim|required');
            $this->form_validation->set_rules('birthday[]','Contact Birthday','trim|required');
            $this->form_validation->set_rules('anniversary[]','Contact Anniversary','trim|required');
            
            if ($this->form_validation->run() == TRUE){
                $client_name = $this->input->post('client_name');
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
                
                $this->cm->UpdateClient($client_name,$address_line_1,$agreemnt_start_date,$agreemnt_end_date,$address_line_2,$type_id,$address_line_3,$rating_id,$state_id,$location,$city_id,$tel_nos,$pincode,$fax,$foundation_day,$client_email,$mw_type_id,$website,$source_id,$contract_status_id,$source_ref,$name,$designation,$contact_no,$email,$birthday,$anniversary,$remarks);
                redirect('client', 'refresh');
            }
        }
        $this->template->write('title', 'Dashboard', TRUE);
        
        
        $id = $this->uri->segment(3);
        $data['edit_client'] = $this->cm->editclient($id);
        $data['edit_client_contact'] = $this->cm->editclientContact($id);
        $data['type'] = $this->cm->get_all_type();
        $data['rating'] = $this->cm->get_all_rating();
        $data['state'] = $this->cm->get_all_state();
        $state_id = ($data['edit_client'][0]->state_id);
        $data['city'] = $this->cm->get_city($state_id);
        $data['mw_type'] = $this->cm->get_all_mwType();
        $data['source'] = $this->cm->get_all_source();
        $data['contract_status'] = $this->cm->get_all_contractStatus();

        $this->template->write('title', 'Dashboard', TRUE);
        $this->template->add_js('assets/js/select2.min.js');
        $this->template->add_js('assets/js/bootstrap-select.js');
        $this->template->add_css('assets/css/select2.css');
        $this->template->add_css('assets/css/bootstrap-select.css');
        $this->template->write_view('content', 'edit_client', $data, TRUE);
        $this->template->render();  
    }

      public function client_name_check($str)
        {
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
    
}

?>
