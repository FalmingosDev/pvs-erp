<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_list extends MY_Controller 
{

	public function __construct() 
	{
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
	
	public function index() 
    {
		if(check_uri_permission('client', 'V') == 0){
			$this->session->set_flashdata('error_msg', 'You have no permission on this page');
			redirect(base_url());
		}
		$data = [];
        $data['client'] = $this->cm->get_all_client();
		$flag=0;
        if(!empty($this->input->post()))
		{

            //pr($this->input->post());
			$this->form_validation->set_rules('client_id','client id','required');
            //$this->form_validation->set_rules('branch_state_id','branch state id','required');
            
			if ($this->form_validation->run() == TRUE)
            {
				$client_id=$this->input->post('client_id');
				$branch_state_id=$this->input->post('branch_state_id');
                if(empty($client_id))
                {
                    $client_id='NULL';
                }
                if(empty($branch_state_id))
                {
                    $branch_state_id='NULL';
                }
				$data['show_client_id']=$client_id;
                $data['show_branch_state_id']=$branch_state_id;
				$data['client_list']=$this->cm->client_list($client_id,$branch_state_id); 
                $data['branch_list'] = $this->cm->getBranch($client_id);
				$data['detail_client'] = $this->cm->client_row($client_id);
				if(!empty($data['detail_client']))
				{
					$flag=1;
				}
                // echo $this->db->last_query();
                // die;
				//pr($data);
				
			}
			else
			{
				$this->session->set_flashdata('error', 'Pleace enter client id  and branch state id !.');
				redirect('client_list', 'refresh');
			}

	 	}
		$data['flag']=$flag;
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

    public function branch_list()
	{
		$client_id = $this->input->post('client_id');
		$data['branch_list'] = $this->cm->getBranch($client_id);
		echo json_encode(array('branch_list' => $data['branch_list'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}
	


	
}

?>
