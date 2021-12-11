<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class It_deduction_rule extends MY_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		
		$this->load->model('It_deduction_rule_model');
		// $this->load->model('It_deduction_rule_model','rm');
		$this->load->library('form_validation');
		
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url'));
	}
	

	public function index() {
		if(check_uri_permission('it_deduction_rule', 'V') == 0){
			$this->session->set_flashdata('error_msg', 'You have no permission on this page');
			redirect(base_url());
		}
		$data = [];
		$data['financial_year_id']  = $this->input->get('financial_year_id');
		$data['list'] = $this->It_deduction_rule_model->get_all_it_deduction($data['financial_year_id']);

		$financial_year_obj = $this->It_deduction_rule_model->get_all_financial_year();
        $financial_year_list = array('' => 'Select Financial Year');
        foreach($financial_year_obj as $financial_year)
		{
            $financial_year_list[$financial_year->financial_year_id] = $financial_year->fy_name;
        }
        $data['financial_year'] = $financial_year_list;
		
		//$data['list'] = $this->cm->client_list();
		//echo "<pre>"; print_r($data['list']); exit();
		$this->template->write('title', 'IT Deduction', TRUE);
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

	

	public function it_deduction_list()
	{
		$financial_year_id = $this->input->post('financial_year_id');
		$section  = $this->input->post('section');
		$criteria  = $this->input->post('criteria');
		$calculation_type  = $this->input->post('calculation_type');
		$max_limit  = $this->input->post('max_limit');
		
		$data = array();
		$list = $this->It_deduction_rule_model->it_deduction_list($financial_year_id,$financial_year,$section,$criteria,$calculation_type,$max_limit);
		// print_r($list);exit();
		foreach($list as $list){
			$data[] = array(
					'it_deduction_id' => $list->it_deduction_id,'financial_year_id' => $list->financial_year_id, 'section' => $list->section,  
					'criteria' => $list->criteria, 'calculation_type' => $list->calculation_type,'max_limit' => $list->max_limit);
				//	print_r($data); exit;
				
		}
		echo json_encode(array('list' => $data, 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}





	public function add()
	{

		if(check_uri_permission('It_deduction_rule', 'A') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        }
		
		if(!empty($this->input->post()))
		{
			$this->form_validation->set_rules('financial_year_id','Select Year','trim|required');
			$this->form_validation->set_rules('section','Section','trim|required');
			$this->form_validation->set_rules('criteria','Description','trim|required');
			$this->form_validation->set_rules('header_calculation_type','Calculation Type','trim');
			$this->form_validation->set_rules('header_max_limit','Max Limit','trim');
			
			
			if ($this->form_validation->run() == TRUE)
			{
				$financial_year_id  = $this->input->post('financial_year_id');
				$section  = $this->input->post('section');
				$criteria  = $this->input->post('criteria');
				$header_calculation_type  = $this->input->post('header_calculation_type');
				$header_max_limit  = $this->input->post('header_max_limit');
				$sub_head_name  = $this->input->post('sub_head_name');
				$calculation_type  = $this->input->post('calculation_type');
				$max_limit  = $this->input->post('max_limit');
				
				$query =  $this->It_deduction_rule_model->add($financial_year_id,$section,$criteria,$header_calculation_type,$header_max_limit,$sub_head_name,$calculation_type,$max_limit);

				$this->session->set_flashdata('msg', $query->msg);
				redirect('it_deduction_rule/add');
				/*if($query)
				{
					redirect('it_deduction_rule','refresh');
				}
				else
				{
					//print_r('ssss');exit;
					
				}*/
			}
			else
			{
					if(!empty($this->input->post('sub_head_name')))
					{
						$name_obj = $this->input->post('sub_head_name');
						$data['it_deduction_detail']['sub_head_name'] = $name_obj;
					}

					if(!empty($this->input->post('calculation_type')))
					{
						$calculation_type_obj = $this->input->post('calculation_type');
						$data['it_deduction_detail']['calculation_type'] = $calculation_type_obj;
					}

					if(!empty($this->input->post('max_limit')))
					{
						$max_limit_obj = $this->input->post('max_limit');
						$data['it_deduction_detail']['max_limit'] = $max_limit_obj;
					}

					$this->template->write('title', 'Dashboard', TRUE);
					$this->template->add_js('assets/js/select2.min.js');
					$this->template->add_js('assets/js/bootstrap-select.js');
					$this->template->add_css('assets/css/select2.css');
					$this->template->add_css('assets/css/bootstrap-select.css');
					$this->template->write_view('content', 'add', $data, TRUE);
					$this->template->render();

				}
					
		}
		//print_r('Parthadddddd'); exit;
		$financial_year_obj = $this->It_deduction_rule_model->get_all_financial_year();
		$financial_year_list = array('' => 'Select Financial Year');
		foreach($financial_year_obj as $financial_year)
		{
			$financial_year_list[$financial_year->financial_year_id] = $financial_year->fy_name;
		}
		$data['financial_year'] = $financial_year_list;

		//print_r('Partha'); exit;
		$this->template->write('title', 'IT Deduction', TRUE);
		$this->template->add_js('assets/js/select2.min.js');
		$this->template->add_js('assets/js/bootstrap-select.js');
		$this->template->add_css('assets/css/select2.css');
		$this->template->add_css('assets/css/bootstrap-select.css');
		$this->template->write_view('content','add', $data, TRUE);
		$this->template->render();

		}


	

// public function edit()
	// {

	// 	if(check_uri_permission('It_deduction_rule', 'E') == 0){
    //         $this->session->set_flashdata('error_msg', 'You have no permission on this page');
    //         redirect(base_url());
    //     } 


	// 	$url_event_id = $this->uri->segment(3);
		
		
	// 	if(!empty($this->input->post()))
	// 	{
			
	// 		// $this->form_validation->set_rules('event_date[]','Event Date','trim|required');
	// 		// $this->form_validation->set_rules('event_name[]','Event Name','trim|required');

	// 		$this->form_validation->set_rules('section','Section','trim|required');
	// 		$this->form_validation->set_rules('criteria','Description','trim|required');
	// 		$this->form_validation->set_rules('header_calculation_type','Calculation Type','trim');
	// 		$this->form_validation->set_rules('header_max_limit','Max Limit','trim');
			
			
			
	// 		if ($this->form_validation->run() == TRUE)
	// 		{
	// 			// $event_date  = $this->input->post('event_date[]');
	// 			// $event_name  = $this->input->post('event_name[]');

	// 			$section  = $this->input->post('section');
	// 			$criteria  = $this->input->post('criteria');
	// 			$header_calculation_type  = $this->input->post('header_calculation_type');
	// 			$header_max_limit  = $this->input->post('header_max_limit');
	// 			$sub_head_name  = $this->input->post('sub_head_name');
	// 			$calculation_type  = $this->input->post('calculation_type');
	// 			$max_limit  = $this->input->post('max_limit');
								
	// 			$query = $this->It_deduction_rule_model->event_edit($section,$criteria,$header_calculation_type,$header_max_limit,$sub_head_name,$calculation_type,$max_limit,$url_event_id);
	// 			//print_r($query);exit;
	// 			if($query)
	// 			{
	// 				redirect('it_deduction_rule','refresh');
	// 			}
	// 			else
	// 			{
	// 				//print_r('ssss');exit;
	// 				$this->session->set_flashdata('msg', 'Data Already Exists');
	// 				redirect('it_deduction_rule/edit/'.$id);
	// 			}
	// 		}
	// 	}
		
	// 	// $data['holiday'] = $this->rm->holiday('');
	// 	//print_r($url_client_id);exit;		
	// 	// $data['resource'] = $this->rm->resourcelist('');
		 
	// 	$data = array();
	// 	$data['editdate'] = $this->It_deduction_rule_model->get_edit_data($url_event_id);
	// 	$this->template->write('title', 'Dashboard', TRUE);
	// 	$this->template->write_view('content', 'edit', $data, TRUE);
    //     $this->template->render();
	// }




	public function edit($id = null)
    {
        if(check_uri_permission('it_deduction_rule', 'E') == 0){
			$this->session->set_flashdata('error_msg', 'You have no permission on this page');
			redirect(base_url());
		}
		$data['it_deduction_rule'] = $this->It_deduction_rule_model->edit_it_deduction_rule($id);
        $data['edit_it_deduction_detail'] = $this->It_deduction_rule_model->edit_it_deduction($id);

        

        if(!empty($this->input->post())){
			$this->load->library("security");
			$this->form_validation->set_rules('section','Section','trim|required');
			$this->form_validation->set_rules('criteria','Description','trim|required');
			$this->form_validation->set_rules('header_calculation_type','Calculation Type','trim');
			$this->form_validation->set_rules('header_max_limit','Max Limit','trim');
			$this->form_validation->set_rules('sub_head_name[]','Sub Head Name','trim|required');
			$this->form_validation->set_rules('calculation_type[]','Calculation Type','trim');
			
			if ($this->form_validation->run() == TRUE)
			{
                $it_deduction_id = $this->input->post('it_deduction_id');
				$financial_year_id  = $this->input->post('financial_year_id');
                $section = $this->input->post('section');
                $criteria = $this->input->post('criteria');
				$header_calculation_type  = $this->input->post('header_calculation_type');
				$header_max_limit  = $this->input->post('header_max_limit');
				$sub_head_name  = $this->input->post('sub_head_name');
				$calculation_type  = $this->input->post('calculation_type');
				$max_limit  = $this->input->post('max_limit');
				$details_id = $this->input->post('detail_id');
				//print_r($calculation_type);die;
                
				
                $query = $this->It_deduction_rule_model->Update($it_deduction_id,$financial_year_id,$section, $criteria,$header_calculation_type,$header_max_limit,$sub_head_name,$calculation_type,$max_limit,$details_id);
                
				$this->session->set_flashdata('msg', $query->msg);
				redirect('it_deduction_rule/edit/'.$it_deduction_id);

            }
            else
            {
                if(!empty($this->input->post('sub_head_name')))
                {
                    $sub_head_name_obj = $this->input->post('sub_head_name');
                    $data['it_deduction_detail']['sub_head_name'] = $sub_head_name_obj;
                }

                if(!empty($this->input->post('calculation_type')))
                {
                    $calculation_type_obj = $this->input->post('calculation_type');
                    $data['it_deduction_detail']['calculation_type'] = $calculation_type_obj;
                }

                if(!empty($this->input->post('max_limit')))
                {
                    $max_limit_obj = $this->input->post('max_limit');
                    $data['it_deduction_detail']['max_limit'] = $max_limit_obj;
                }

                if(!empty($this->input->post('details_id')))
                {
                    $details_id_obj = $this->input->post('details_id');
                    $data['it_deduction_detail']['details_id'] = $details_id_obj;
                }

                //print_r($data['client_contact']);

                $this->template->write('title', 'Dashboard', TRUE);
                $this->template->add_js('assets/js/select2.min.js');
                $this->template->add_js('assets/js/bootstrap-select.js');
                $this->template->add_js('assets/js/bootstrap-datepicker.min.js');

                $this->template->add_css('assets/css/datepicker.css');
                $this->template->add_css('assets/css/select2.css');
                $this->template->add_css('assets/css/bootstrap-select.css');


                $this->template->write_view('content', 'edit', $data, TRUE);
                $this->template->render();
            }
        }
		
		$data['action_type'] = 'edit';
		$data['mode'] = 'editable';
		
		$financial_year_obj = $this->It_deduction_rule_model->get_all_financial_year();
        $financial_year_list = array('' => 'Select Financial Year');
        foreach($financial_year_obj as $financial_year)
		{
            $financial_year_list[$financial_year->financial_year_id] = $financial_year->fy_name;
        }
        $data['financial_year'] = $financial_year_list;
		
        $this->template->write('title', 'Dashboard', TRUE);
		$this->template->add_js('assets/js/custom_functions.js');
		$this->template->add_js('assets/js/select2.min.js');
		$this->template->add_js('assets/js/bootstrap-select.js');
        $this->template->add_js('assets/js/bootstrap-datepicker.min.js');
        
		$this->template->add_css('assets/css/select2.css');
		$this->template->add_css('assets/css/bootstrap-select.css');
        $this->template->add_css('assets/css/datepicker.css');
        $this->template->write_view('content', 'edit', $data, TRUE);
        $this->template->render();  
    }
	

}

