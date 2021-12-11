<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Rating extends MY_Controller {

	public function __construct() {
		parent::__construct();
        if(!$this->session->has_userdata('user_id') || !$this->session->user_id)
        {
            redirect('login');
        }
		$this->load->model('rating_model','rm');
		$this->load->library('form_validation');
        $this->form_validation->CI =& $this;
        $this->load->helper(array('form', 'url'));
	}

	public function index()
	{

        if(check_uri_permission('rating', 'V') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        }


		$data['rating_list'] = $this->rm->get_all_rating();
		//print_r($data);die;
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
        $this->template->write_view('content', 'rating', $data, TRUE);
        $this->template->render();
	}

	public function addRating(){

        if(check_uri_permission('rating', 'A') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        }


        if(!empty($this->input->post())){
            
            $this->form_validation->set_rules('rating_shrt_name','Rating Short Name','trim|required|callback_rating_check');
            $this->form_validation->set_rules('desc','Description','trim|required');
            if ($this->form_validation->run() == TRUE)
             {
                $rating_shrt_name = $this->input->post('rating_shrt_name');
                $desc = $this->input->post('desc');
                
                $this->rm->insertRating($rating_shrt_name,$desc);
                redirect('rating', 'refresh');
             }
                        
        }

		$this->template->write('title', 'Dashboard', TRUE);
        $this->template->write_view('content', 'add_rating', '', TRUE);
        $this->template->render();
	}

	public function status($id, $status){

        if(check_uri_permission('rating', 'D') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        }


        $this->rm->status($id,$status);
        redirect('rating','refresh');
    }

    public function editRating($id){

         if(check_uri_permission('rating', 'E') == 0){
            $this->session->set_flashdata('error_msg', 'You have no permission on this page');
            redirect(base_url());
        }
        
        $data['rating'] = $this->rm->get_rating($id);
        
        $this->template->write_view('content', 'edit_rating', $data, TRUE);
        $this->template->render();

    }

    public function UpdateRating()
    {

       

        $this->load->library("security");
        $this->form_validation->set_rules('rating_shrt_name','Rating Short Name','trim|required|callback_rating_check');
        $this->form_validation->set_rules('desc','Rating Description','trim|required');
        if ($this->form_validation->run() == TRUE)
         {
            $rating_shrt_name = $this->input->post('rating_shrt_name');
            $desc = $this->input->post('desc');
            $rating_id = $this->input->post('rating_id');
            
            $this->rm->UpdateRating($rating_shrt_name,$desc,$rating_id);
            redirect('rating', 'refresh');
         }
         else
         {
            $rating_id = $this->input->post('rating_id');
            $data['rating'] = $this->rm->get_rating($rating_id);
            
            $this->template->write_view('content', 'edit_rating', $data, TRUE);
            $this->template->render();
         }
    }

    public function rating_check($str)
        {
                $str = $this->input->post('rating_shrt_name');

                $rating_id = NULL;
                if(!empty($this->input->post('rating_id'))){
                    $rating_id = $this->input->post('rating_id');
                }

                $check = $this->rm->checkRating($str,$rating_id);
                if($check)
                {
                    $this->form_validation->set_message('rating_check', 'The {field} field can not be the word ' . $str);
                    return FALSE;
                }
                else
                {
                    return TRUE;
                }
        }
}



?>